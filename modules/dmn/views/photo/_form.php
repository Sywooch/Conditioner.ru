<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

//$id ИД каталога в котором фотографии модели SystemPhotoCatalog, для добавления новой записи
//Тоже самое что и $model->id_catalog для редактирования существующей
$id_catalog = $model->isNewRecord ? $id : $model->id_catalog;
/* @var $this yii\web\View */
/* @var $model app\models\SystemPhotoPosition */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="system-photo-position-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput() ?>

    <?= $form->field($model, 'alt')->textInput() ?>

    <?= $form->field($model, 'image')->fileInput() ?>

    <?= $form->field($model, 'hide')->dropDownList([ 'show' => 'Отображать', 'hide' => 'Скрыть', ]) ?>

    <?= $form->field($model, 'id_catalog')->hiddenInput(['value' => $id_catalog])->label('') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Изменить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
