<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\models;
use Yii;
use yii\base\Model;
/**
 * Description of RegForm
 *
 * @author Max
 */
class RegForm extends Model{
    //
    public $username;
    public $password;
    public $email;
    public $status;
    public $verifyCode;
    public $role = 'user';
    //
    public function rules()
    {
        return [
            //
            [['username', 'password', 'email'], 'filter', 'filter' => 'trim'],
            //
            ['verifyCode', 'captcha'],
            //
            [['username', 'password', 'email'], 'required'],
            //
            ['username', 'string', 'max' => 32, 'min' => 3],
            //
            ['password', 'string', 'max' => 32, 'min' => 6],
            //
            ['email', 'email'],
            //
            ['username', 'unique', 'targetClass' => SystemUsers::className(), 'message' => 'Это имя уже занято!'],
            //
            ['email', 'unique', 'targetClass' => SystemUsers::className(), 'message' => 'Этот email уже занят!'],
            //
            [
                'status',
                'default',
                'value' => SystemUsers::STATUS_ACTIVE,
                'on' => 'default',
            ],
            //
            [
                'status',
                'in',
                'range' => [
                    SystemUsers::STATUS_NOT_ACTIVE,
                    SystemUsers::STATUS_ACTIVE,
                ],
            ],
            //
        ];
    }
    //
    public function attributeLabels()
    {
        return [
            'username' => 'Логин',
            'password' => 'Пароль',
            'email' => 'Email',
            'verifyCode' => 'Проверочный код',
        ];
    }
    //
    public function reg() {
        //
        $user = new SystemUsers();
        //
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->status = $this->status;
        $user->role = $this->role;
        $user->generateAuthKey();
        //
        return $user->save() ? $user : NULL;
    }
}
