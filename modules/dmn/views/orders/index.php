<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchContact */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Заказы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-index">

    <h1><?= Html::encode($this->title) ?></h1>

<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
//            'id_contact',
            'name:ntext',
            'phone:ntext',
            //
            [
                'attribute' => 'subject',
                'value' => function($model){
                    //start function, and start if
                    if ($model->subject == 'installation')
                        return '<span class="text-success">Монтаж</span>';
                    elseif($model->subject == 'cleaning')
                        return '<span class="text-danger"><i>Чистка</i></span>';
                    elseif($model->subject == 'refuel')
                        return '<span class="text-success"><i>Заправка</i></span>';
                    else
                        return '<span class="text-danger"><i>Ремонт!</i></span>';
                //end function
                },
                'format' => 'html',
            ],
            //
//            'message:ntext',
            'put_date',
            [
                'attribute' => 'hide',
                'value' => function($model){
                    //start function, and start if
                    if ($model->hide == 'show')
                        return '<span class="text-danger"><b>Ожидает</b></span>';
                    elseif($model->hide == 'hide')
                        return '<span class="text-success"><b>Выполнен</b></span>';
                    else
                        return '<span class="text-danger"><i>Отменен!</i></span>';
                //end function
                },
                'format' => 'html',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>