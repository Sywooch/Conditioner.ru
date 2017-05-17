<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SystemPhotoPosition
 * @var $id_catalog ИД каталога в котором фотографии модели SystemPhotoCatalog*/
$this->title = 'Добавить фотографию';
$this->params['breadcrumbs'][] = ['label' => 'Каталог', 'url' => ['index', 'id' => $id_catalog]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="system-photo-position-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        // $id_catalog ИД каталога в котором фотографии модели SystemPhotoCatalog
        'id' => $id_catalog,
    ]) ?>

</div>
