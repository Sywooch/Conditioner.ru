<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\models;
use Yii;
use yii\base\Model;
use yii\base\InvalidParamException;
/**
 * Description of ResetPasswordForm
 *
 * @author Max
 */
class ResetPasswordForm extends Model{
    //
    public $password;
    private $_user;
    //
    public function rules() {
        return [
            ['password', 'required'],
        ];
    }
    //
    public function attributeLabels()
    {
        return [
            'password' => 'Пароль',
        ];
    }
    //
    public function __construct($key, $config = []) {
        //
        if (empty($key) || !is_string($key)) {
            throw new InvalidParamException('Ключ не может быть пустым!');
        }
        //
        $this->_user = SystemUsers::findBySecretKey($key);
        if(!$this->_user){
            throw new InvalidParamException('Ключ не верный!');
        }
        parent::__construct($config);
    }
    //
    public function resetPassword() {
        $user = $this->_user;
        $user->setPassword($this->password);
        $user->removeSecretKey();
        return $user->save();
    }
}
