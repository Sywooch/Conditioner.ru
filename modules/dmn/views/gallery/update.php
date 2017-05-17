<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SystemPhotoCatalog */

$this->title = 'Изменить каталог: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Каталоги фотографий', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id_catalog]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="system-photo-catalog-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
