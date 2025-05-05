<?php

namespace app\models;

use Yii;
use yii\base\Exception;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "APP_USERS".
 *
 * @property int $USER_ID
 * @property string $LOGIN
 * @property string $NAME
 * @property string $PASSWORD
 * @property string $AUTH_KEY
 * @property int $STATUS
 * @property int|null $ROLES
 */
class Users extends ActiveRecord
{
    const STATUS_BLOCKED = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_DELETED = 2;

    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'APP_USERS';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['LOGIN', 'required'],
            ['LOGIN', 'match', 'pattern' => '#^[\w_-]+$#is'],
            ['LOGIN', 'unique', 'targetClass' => self::class, 'message' => 'This username has already been taken.'],
            ['LOGIN', 'string', 'min' => 2, 'max' => 255],

            ['STATUS', 'integer'],
            ['STATUS', 'default', 'value' => self::STATUS_ACTIVE],
            ['STATUS', 'in', 'range' => array_keys(self::getStatusesArray())],

            ['ROLES', 'integer'],
            ['ROLES', 'default', 'value' => '101'],

            [['NAME', 'PASSWORD'], 'required'],
            [['NAME', 'PASSWORD'], 'string', 'max' => 255],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'LOGIN' => 'Имя Пользователя',
            'PASSWORD' => 'Пароль',
            'NAME' => 'name',
            'STATUS' => 'Статус',
            'ROLE' => 'Группа'
        ];
    }

    /**
     * @throws \Exception
     */
    public function getStatusName()
    {
        return ArrayHelper::getValue(self::getStatusesArray(), $this->STATUS);
    }

    public static function getStatusesArray(): array
    {
        return [
            self::STATUS_BLOCKED => 'Заблокирован',
            self::STATUS_ACTIVE => 'Активен',
            self::STATUS_DELETED => 'Ожидает подтверждения'
        ];
    }

    /**
     * @param $login
     * @return Users|null
     */
    public static function findByLogin($login): ?Users
    {
        return static::findOne(['LOGIN' => $login]);
    }

    /**
     * @throws Exception
     */
    public function setPassword($password)
    {
        $this->PASSWORD = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * @throws Exception
     */
    public function generateAuthKey()
    {
        $this->AUTH_KEY = Yii::$app->security->generateRandomString();
    }

    /**
     * @return array|mixed|null
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @throws Exception
     */
    public function beforeSave($insert): bool
    {
        if(isset($this->PASSWORD)){
            $this->setPassword($this->PASSWORD);
        }

        if($insert)
        {
            $this->generateAuthKey();
        }

        return parent::beforeSave($insert);
    }

}
