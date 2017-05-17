<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SystemNews */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="system-user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->dropDownList([ '10' => 'Активен', '1' => 'Не активен', '0' => 'Заблокирован', ]) ?>
    
    <?= $form->field($model, 'role')->dropDownList([ 'user' => 'Пользователь', 'admin' => 'Администратор',]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>