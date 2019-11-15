<?php

namespace app\modules\admin\models;

use Yii;


class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['login', 'password', 'name',], 'required'],
            [['login'], 'string', 'max' => 32],
            [['password', 'name', 'role', 'history', 'auth_key'], 'string', 'max' => 256],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Логин',
            'password' => 'Пароль',
            'name' => 'Имя',
            'role' => 'Должность',
            'history' => 'История заказов',
            'auth_key' => 'Auth Key',
        ];
    }
    
//    public function setPassword($password)
//{
//    $this->password = Yii::$app->security->generatePasswordHash($password);
//}

public function beforeSave($insert)
{
    if(parent::beforeSave($insert)){
       $this->password=Yii::$app->security->generatePasswordHash($this->password);
       return true;
    }else{
       return false;
    }
}


}
