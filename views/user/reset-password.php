<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ResetPasswordForm */
/* @var $form ActiveForm */
$this->title = 'Изменение пароля';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-reset-password">
    <?php if (Yii::$app->session->hasFlash('warning')): ?>

        <div class="alert alert-success">
           <p>Пароль успешно изменен!</p>
           <?= Html::a('Войти', '/user/login')?>
        </div>
    
    <?php else: ?>
    
    <p>Пожалуйста введите новый пароль:</p>
    <div class="row">
        <div class="col-lg-5">
    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'password')->passwordInput() ?>
    
        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>
        </div>
    </div>
    <?php endif; ?>
</div><!-- user-reset-password -->