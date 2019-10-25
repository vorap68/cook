<?php

namespace app\models;
use yii\db\ActiveRecord;
use Yii;
//$hash = Yii::$app->getSecurity()->generatePasswordHash('123');
//echo $hash;

class User extends ActiveRecord implements \yii\web\IdentityInterface
{
    
    public static function tableName() {
	return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
         return static::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
    //   return static::findOne(['access_token' => $token]);
    }

   
    public static function findByUsername($login)
    {
         return static::findOne(['login'=>$login]);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
	 {
	//$password = Yii::$app->getSecurity()->generatePasswordHash($password);
         return \Yii::$app->security->validatePassword($password, $this->password);
    }
}
