<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SystemPhotoPosition */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Каталог', 'url' => ['index', 'id' => $model->id_catalog]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="system-photo-position-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id_position], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id_position], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить эту фотографию?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_position',
            'name:ntext',
            'alt:ntext',
            //
            [
                'attribute' => 'img_small',
                'value' => Html::img(Yii::getAlias('@web/images/' . $model->img_small), ['alt' => $model->alt]),
                'format' => 'html',
            ],
            //
            [
                'attribute' => 'hide',
                'value' => function($model){
                    //start function, and start if
                    if ($model->hide == 'show')
                        return '<span class="text-success"><b>Нет</b></span>';
                    else
                        return '<span class="text-danger"><b>Да</b></span>';
                    //end function
                },
                'format' => 'html',
            ],
        ],
    ]) ?>

</div>