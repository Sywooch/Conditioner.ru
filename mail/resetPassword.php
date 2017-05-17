<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * @var $user \app\models\SystemUsers
 */

use yii\helpers\Html;

echo 'Привет ' . Html::encode($user->username) . '.';
echo Html::a('Для сброса пароля перейдите по этой ссылке', Yii::$app->urlManager->createAbsoluteUrl([
    '/user/reset-password',
    'key' => $user->secret_key,
])) . '.';