<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
//название каталога для вида, чтоб пользователь понимал в какой категории он находиться
$this->title = $catalog;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="system-photo-position-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить фотографию', ['create', 'id' => $id_catalog], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id_position',
            'name:ntext',
            'alt:ntext',
            //
            [
                'attribute' => 'img_small',
                'value' => function($model){
                    return Html::img(Yii::getAlias('@web/images/' . $model->img_small), ['alt' => $model->alt]);
                },
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
            // 'id_catalog',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);?>
</div>
