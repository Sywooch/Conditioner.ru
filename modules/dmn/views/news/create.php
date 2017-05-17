<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SystemNews */

$this->title = 'Добавить "Новость/Акцию"';
$this->params['breadcrumbs'][] = ['label' => 'Новости/Акции', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="system-news-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
