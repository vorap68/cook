<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "order_today".
 *
 * @property int $id
 * @property string $login
 * @property string $name_dish
 * @property int $price
 * @property string $order_date
 */
class OrderToday extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_today';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['login', 'name_dish', 'price', 'order_date'], 'required'],
            [['price'], 'integer'],
            [['order_date'], 'safe'],
           
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Login',
            'name_dish' => 'Name Dish',
            'price' => 'Price',
            'order_date' => 'Order Date',
        ];
    }
}
