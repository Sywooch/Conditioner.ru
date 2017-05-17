<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SystemPhotoCatalog */

$this->title = 'Добавить каталог';
$this->params['breadcrumbs'][] = ['label' => 'Каталоги фотографий', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="system-photo-catalog-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
