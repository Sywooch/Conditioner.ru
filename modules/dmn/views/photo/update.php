<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SystemPhotoPosition */

$this->title = 'Редактировать: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Каталог', 'url' => ['index', 'id' => $model->id_catalog]];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id_position]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="system-photo-position-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
