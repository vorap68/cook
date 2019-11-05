<?php

namespace app\modules\admin\models;

use Yii;


class Today extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'today';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['login', 'name_dish', 'price'], 'required'],
           // [['login'], 'string', 'max' => 32],
           // [['name_dish', ''], 'string', 'max' => 256],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'сотрудник',
            'name_dish' => 'заказ',
            'price' => 'Сумма',
        ];
    }
}
