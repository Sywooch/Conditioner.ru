<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Информация';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="system-about-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить запись', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id_about',
            'name:ntext',
//            'info:ntext',
//            'description:ntext',
//            'keywords:ntext',
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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
