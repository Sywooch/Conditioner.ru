<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SystemAbout */

$this->title = 'Добавить запись';
$this->params['breadcrumbs'][] = ['label' => 'Информация', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="system-about-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
