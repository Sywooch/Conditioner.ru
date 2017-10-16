<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\user\SendEmailForm */
/* @var $form ActiveForm */
$this->title = 'Востановление пароля';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-send-email">
    <h1><?= Html::encode($this->title) ?></h1>
    
    <p>Пожалуйста введите ваши данные:</p>
<div class="row">
        <div class="col-lg-5">
    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'email') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>
            </div>
    </div>
</div><!-- user-send-email -->
