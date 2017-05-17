<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "system_users".
 *
 * @property string $id
 * @property string $email
 * @property string $username
 * @property string $password
 * @property integer $status
 * @property string $auth_key
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $secret_key
 */
class SystemUsers extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETE = 0;
    const STATUS_NOT_ACTIVE = 1;
    const STATUS_ACTIVE = 10;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'system_users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //
            [['email', 'password', 'username',], 'filter', 'filter' => 'trim'],
            //
            [['email', 'status', 'username', 'role'], 'required'],
            //
            [['role'], 'string'],
            //
            ['email', 'email'],
            //
            ['secret_key', 'unique'],
            //
            ['username', 'string', 'max' => 32, 'min' => 3],
            //
            ['password', 'required', 'on' => 'create'],
            //
            ['username', 'unique', 'message' => 'Это имя уже занято!'],
            //
            ['email', 'unique', 'message' => 'Этот email уже занят!'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'username' => 'Логин',
            'password' => 'Пароль',
            'status' => 'Статус',
            'auth_key' => 'Ключ Авторизации',
            'created_at' => 'Создан',
            'updated_at' => 'Обновлен',
            'role' => 'Привелегии',
        ];
    }
    /*Поведения*/
    public function behaviors() {
        return [
            TimestampBehavior::className()
        ];
    }
    //
    public static function findByUsername($username){
        return static::findOne([
            'username' => $username,
        ]);
    }
    /*Хелперы*/
    public function setPassword($password) {
        $this->password = Yii::$app->security->generatePasswordHash($password);
    }
    //
    public function generateAuthKey() {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }
    //
    public function validatePassword($password) {
        return Yii::$app->security->validatePassword($password, $this->password);
    }
    /*Аутенфикация пользователей*/
    public static function findIdentity($id)
    {
        return static::findOne([
            'id' => $id,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }
    //
    public static function findBySecretKey($key) {
        if (!static::isSecretKeyExpire($key)) {
            return null;
        }
        //
        return static::findOne([
            'secret_key' => $key,
        ]);
    }
    //
    public static function isSecretKeyExpire($key) {
        //
        if (empty($key)) {
            return false;
        }
        //
        $expire = Yii::$app->params['secretKeyExpire'];
        //
        $parts = explode('_', $key);
        //
        $timestamp = (int) end($parts);
        //
        return $timestamp + $expire >= time();
    }
    //
    public function generateSecretKey() {
        $this->secret_key = Yii::$app->security->generateRandomString() . '_' . time();
    }
    //
    public function removeSecretKey() {
        $this->secret_key = null;
    }
}