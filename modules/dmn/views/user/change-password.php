<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 17.05.2017
 * Time: 23:57
 */
/* @var $this yii\web\View */
/* @var $model \app\models\ChangePasswordForm */
/* @var $form ActiveForm */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
$this->title = 'Изменить пароль: ' . $model->user;
?>
<div class="user-change-password">

<h1><?= Html::encode($this->title)?></h1>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'new_password')->passwordInput() ?>

    <?= $form->field($model, 'password_confirm')->passwordInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Изменить', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Вернуться', Url::previous(), ['class' => 'btn btn-success'])?>
    </div>

    <?php ActiveForm::end(); ?>

</div>