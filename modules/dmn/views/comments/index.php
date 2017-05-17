<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchComments */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Отзывы Клиентов';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="system-comments-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name:ntext',
            'phone:ntext',
            'city:ntext',
            'comment:ntext',
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
