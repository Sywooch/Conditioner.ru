<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $model app\models\RegForm */
/* @var $form ActiveForm */
$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-register">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Пожалуйста введите ваши данные:</p>
    <?php $form = ActiveForm::begin(); ?>
    <?php if (Yii::$app->session->hasFlash('error')): ?>
        <div class="alert alert-danger">
            <p>Ошибка регистрации</p>
        </div>
   <?php endif; ?>
    <div class="row">
        <div class="col-lg-5">
        <?= $form->field($model, 'username') ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
        <?= $form->field($model, 'email') ?>
        <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                        'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                    ]) ?>
    
        <div class="form-group">
            <?= Html::submitButton('Регистрация', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>
        </div>
    </div>
</div><!-- user-register -->
