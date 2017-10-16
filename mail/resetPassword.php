<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * @var $user \app\models\SystemUsers
 */

use yii\helpers\Html; ?>

<table class="body-wrap">
    <tr>
        <td></td>
        <td class="container" bgcolor="#FFFFFF">

            <div class="content">
                <table>
                    <tr>
                        <td>
                            <h3><?= 'Привет ' . Html::encode($user->username) . '.'; ?></h3>

                            <p class="lead">Вы получили это письмо, потому Вы (возможно, что кто-то)
                                запросил на сайте "<?=Yii::$app->name?>" </p>
                            <p>
                                восстановление пароля для пользователя <b><?= Html::encode($user->username); ?></b>,
                                зарегистрированного с вашим адресом электронной почты <?= Html::encode($user->email) . '.'; ?>
                            </p>
                            <!-- Callout Panel -->
                            <p class="callout">
                                Для сброса пароля перейдите по <?= Html::a('этой', Yii::$app->urlManager->createAbsoluteUrl([
                                    '/user/reset-password',
                                    'key' => $user->secret_key,
                                ])); ?> ссылке.</br>
                            </p><!-- /Callout Panel -->

                            <p>
                                Если вы не запрашивали изменение пароля или вспомнили свой пароль,
                                просто проигнорируйте это письмо и продолжайте пользоваться своим текущим паролем.
                            </p>

                        </td>
                    </tr>
                </table>
            </div><!-- /content -->

        </td>
        <td></td>
    </tr>
</table>