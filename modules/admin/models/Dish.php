<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "dish".
 *
 * @property int $id
 * @property string $name
 * @property string $foto
 * @property string $price
 */
class Dish extends \yii\db\ActiveRecord
{
    public $foto;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dish';
    }
    
    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'safe'],
            [['price'], 'number'],
            [[ 'foto'], 'file', 'extensions' => 'png, jpg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'название блюда',
            'foto' => 'фото',
            'price' => 'цена',
	    'count' => '',
        ];
    }

    public function upload(){
        if($this->validate()){
            $path = 'upload/store/' . $this->foto->baseName . '.' . $this->foto->extension;
            $this->foto->saveAs($path);
            $this->attachImage($path, true);
//            @unlink($path);
            return true;
        }else{
            return false;
        }
    }
    
    
    }
