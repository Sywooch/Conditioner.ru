<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\SystemNews */
/* @var $form yii\widgets\ActiveForm */
Url::remember();
?>

<div class="system-user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true, 'readonly' => !$model->isNewRecord]) ?>

    <?= $form->field($model, 'email')->textInput(['rows' => 6]) ?>

    <?= (Yii::$app->user->identity->username === $model->username) ?
        '' : $form->field($model, 'status')->dropDownList([ '10' => 'Активен', '1' => 'Не активен', '0' => 'Заблокирован', ]) ?>

    <?= (Yii::$app->user->identity->username === $model->username) ?
        '' : $form->field($model, 'role')->dropDownList([ 'user' => 'Пользователь', 'admin' => 'Администратор',]) ?>

    <div class="form-group">
        <?= Html::a('Изменить пароль', ['user/password', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>