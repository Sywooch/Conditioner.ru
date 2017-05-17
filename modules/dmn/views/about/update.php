<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SystemAbout */

$this->title = 'Изменить: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Информация', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id_about]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="system-about-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
