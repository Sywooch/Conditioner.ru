<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\user\ResetPasswordForm */
/* @var $form ActiveForm */
$this->title = 'Изменение пароля';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-reset-password">
    
    <p>Пожалуйста введите новый пароль:</p>
    <div class="row">
        <div class="col-lg-5">
    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'new_password')->passwordInput() ?>

        <?= $form->field($model, 'password_confirm')->passwordInput() ?>

        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>
        </div>
    </div>

</div><!-- user-reset-password -->