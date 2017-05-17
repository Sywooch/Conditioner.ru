<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class LoginForm extends Model
{
     //
    public $username;
    public $password;
    public $email;
    public $rememberMe = TRUE;
    public $status;
    private $_user = false;
    //
    public function rules()
    {
        return [
            //
            [['username', 'password'], 'required', 'on' => 'default'],
            //
            ['email', 'email'],
            //
            ['rememberMe', 'boolean'],
            //
            ['password', 'validatePassword'],
            //
            
        ];
    }
    //
    public function validatePassword($attribute) {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Неправильное имя пользователя или пароль!');
            }
        }
    }
    //
    public function attributeLabels()
    {
        return [
            'username' => 'Логин',
            'password' => 'Пароль',
            'rememberMe' => 'Запомнить на 30 дней?',
            //'email' => 'Email',
        ];
    }
    public function login() {
        if ($this->validate()) {
            $this->status = ($user = $this->getUser()) ? $user->status : SystemUsers::STATUS_NOT_ACTIVE;
            if ($this->status === SystemUsers::STATUS_ACTIVE) {
                return Yii::$app->user->login($user, $this->rememberMe ? 3600 * 24 * 30 : 0);
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    //
    public function getUser() {
        if ($this->_user === false) {
            $this->_user = SystemUsers::findByUsername($this->username);
        }
        return $this->_user;
    }
}
