<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SearchNews */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="system-news-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_news') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'body') ?>

    <?= $form->field($model, 'put_date') ?>

    <?= $form->field($model, 'hide') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
