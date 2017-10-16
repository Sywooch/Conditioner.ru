<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\base\InvalidParamException;
use app\models\SystemUsers;

/**
 * This is the model class for table "system_users".
 *
 * @property string $id
 * @property string $user
 * @property string $new_password
 * @property string $password_confirm
 */
class ChangePasswordForm extends Model
{
    public $id;
    public $user;
    public $new_password;
    public $password_confirm;
    /**
     * @var \app\models\SystemUsers
     */
    private $_user;
    /**
     * Creates a form model given a token.
     *
     * @param  string                          $token
     * @param  array                           $config name-value pairs that will be used to initialize the object properties
     * @throws \yii\base\InvalidParamException if token is empty or not valid
     */
    public function __construct($id, $config = [])
    {
        $this->_user = SystemUsers::findIdentity($id);
        if (!$this->_user) {
            throw new InvalidParamException('Немогу найти пользователя!');
        }
        $this->id = $this->_user->id;
        $this->user = $this->_user->username;
        parent::__construct($config);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['new_password', 'password_confirm'], 'required'],
            [['new_password', 'password_confirm'], 'string', 'max' => 25],
            ['password_confirm', 'compare', 'compareAttribute' => 'new_password'],
        ];
    }


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'password_confirm' => 'Подтвердите пароль',
            'new_password' => 'Новый пароль',
        ];
    }
    /**
     * Changes password.
     *
     * @return boolean if password was changed.
     */
    public function changePassword()
    {
        $user = $this->_user;
        $user->setPassword($this->new_password);
        return $user->save();
    }
    //
    public function resetForm()
    {
        $this->new_password = null;
        $this->password_confirm = null;
        return true;
    }
}
