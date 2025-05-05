<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

class UserIdentity extends Users implements IdentityInterface
{

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword(string $password): bool
    {
        if(Yii::$app->security->validatePassword($password, $this->PASSWORD))
        {
            return true;
        }
        return false;
    }

    /**
     * @param $id
     * @return UserIdentity|null
     */
    public static function findIdentity($id): UserIdentity|null
    {
        return static::findOne(['USER_ID' => $id, 'STATUS' => self::STATUS_ACTIVE]);
    }

    /**
     * @param $token
     * @param $type
     * @return void
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        // TODO: Implement findIdentityByAccessToken() method.
        return null;
    }

    /**
     * @return void
     */
    public function getAuthKey()
    {
        // TODO: Implement getAuthKey() method.
        return null;
    }

    /**
     * @param $authKey
     * @return void
     */
    public function validateAuthKey($authKey)
    {
        // TODO: Implement validateAuthKey() method.
        return null;
    }

    public function getId(): string
    {
        return $this->USER_ID;
    }
}