<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SystemComments */

$this->title = 'Отзыв: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Отзывы Клиентов', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id_position]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="system-comments-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
