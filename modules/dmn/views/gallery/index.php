<?php

use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'Каталоги фотографий';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="system-photo-catalog-index">

    <div class="container">
        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a('Добавить галерею', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
        <table class="table table-hover">
            <thead>
                <th>Название</th>
                <th>Описание</th>
                <th>Действие</th>
            </thead>
        <?php foreach ($model as $gallery):?>
            <tr>
                <td><?= $gallery->name ?></td>
                <td><?= $gallery->description ?></td>
                <td>
                    <?= Html::a('Информация', ['view', 'id' => $gallery->id_catalog], [
                        'class' => 'btn btn-info',
                    ]) ?>
                    <?= Html::a('Изменить', ['update', 'id' => $gallery->id_catalog], [
                        'class' => 'btn btn-warning',
                    ]) ?>
                    <?= Html::a('Посмотреть', ['photo/index', 'id' => $gallery->id_catalog], [
                        'class' => 'btn btn-success',
                    ]) ?>
                    <?= Html::a('Удалить', ['delete', 'id' => $gallery->id_catalog], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => 'Вы уверены, что хотите удалить данный каталог?',
                            'method' => 'post',
                        ],
                    ]) ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </table>
    </div>
    
</div>