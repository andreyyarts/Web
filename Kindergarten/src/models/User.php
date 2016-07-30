<?php

namespace app\models;

use yii\base\Object;
use yii\db\Query;
use yii\web\IdentityInterface;

class User extends Object implements IdentityInterface
{
    public $id;
    public $name;
    public $password;
    public $auth_key;
    public $access_token;

    private static function tableName()
    {
        return 'user';
    }

    /**
     * Finds an identity by the given ID.
     *
     * @param string|integer $id the ID to be looked for
     * @return IdentityInterface|null the identity object that matches the given ID.
     */
    public static function findIdentity($id)
    {
        $identity = self::getQuery()->where(['id' => $id])->limit(1)->one();
        return new static($identity);
    }

    /**
     * Finds an identity by the given token.
     *
     * @param string $token the token to be looked for
     * @return IdentityInterface|null the identity object that matches the given token.
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return new static(self::getQuery()->where(['access_token' => $token])->limit(1)->one());
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        $user = self::getQuery()->where(['name' => $username])->limit(1)->one();
        return new static($user);
    }

    /**
     * @return int|string current user ID
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string current user auth key
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @param string $authKey
     * @return boolean if auth key is valid for current user
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }

    private static function getQuery()
    {
        return (new Query())
            ->select(['id', 'name', 'password', 'auth_key', 'access_token'])
            ->from(self::tableName());
    }
}
