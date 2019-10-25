<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "employee".
 *
 * @property int $id
 * @property string $login
 * @property string $password
 * @property string $name
 * @property string $role
 * @property string $history
 */
class Employee extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employee';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['login', 'password', 'name', 'role', ], 'required'],
            [['login'], 'string', 'max' => 32],
            [['password', 'name', 'role', 'history'], 'string', 'max' => 256],
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
            'role' => 'Role',
            'history' => 'History',
        ];
    }
}
