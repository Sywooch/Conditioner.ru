<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use yii\jui\DatePicker;
//$date = date('Y-n-j H:i:s', time());
/* @var $this yii\web\View */
/* @var $model app\models\SystemNews */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="system-news-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'body')->widget(CKEditor::className(),[
        'editorOptions' => [
            'preset' => 'standart',
            'inline' => false,
        ]
    ]) ?>
    <?= $form->field($model, 'put_date')->widget(DatePicker::classname(), [
        'language' => 'ru',
        'dateFormat' => 'yyyy-MM-dd',
    ]) ?>

    <?= $form->field($model, 'hide')->dropDownList([ 'show' => 'Показывать', 'hide' => 'Скрыть', ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
