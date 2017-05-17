<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
/*

Использование

echo $form->field($post, 'content')->widget(CKEditor::className(),[
    'editorOptions' => [
        'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
        'inline' => false, //по умолчанию false
    ],
]);

 * */
/* @var $this yii\web\View */
/* @var $model app\models\SystemPhotoCatalog */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="system-photo-catalog-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput() ?>

    <?= $form->field($model, 'description')->widget(CKEditor::className(),[
            'editorOptions' => [
                'preset' => 'basic',
                'inline' => false,
            ]
    ]) ?>

    <?= $form->field($model, 'hide')->dropDownList([ 'show' => 'Отображать', 'hide' => 'Скрыт', ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
