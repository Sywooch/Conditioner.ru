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
 * Description of SendEmailForm
 *
 * @author Max
 */
class SendEmailForm extends Model{
    //
    public $email;
    //
    public function rules()
    {
        return [
            //
            ['email', 'filter', 'filter' => 'trim'],
            //
            ['email', 'required'],
            //
            ['email', 'email'],
            //
            ['email', 'exist',
                'targetClass' => SystemUsers::className(),
                'filter' => [
                    'status' => SystemUsers::STATUS_ACTIVE,
                ],
                'message' => 'Email не найден!'
            ],
        ];
    }
    //
    public function attributeLabels()
    {
        return [
            'email' => 'Email',
        ];
    }
    //
    public function sendEmail() {
        /**/
        $user = SystemUsers::findOne([
            'email' => $this->email,
            'status' => SystemUsers::STATUS_ACTIVE,
        ]);
        //
        if ($user) {
            //
            $user->generateSecretKey();
            //
            if ($user->save()) {
                //
                return Yii::$app->mailer->compose('resetPassword', ['user' => $user])
                ->setTo($this->email)
                ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . '(отправлено роботом)'])
                ->setSubject('Сброс пароля для ' . Yii::$app->name)
                ->send();
            }
        }
        //
        return false;
    }
}
