<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SystemComments */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Отзывы Клиентов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="system-comments-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id_position], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id_position], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id_position',
            'name:ntext',
            'phone:ntext',
            'city:ntext',
            'comment:ntext',
            'answer:ntext',
            'put_date',
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
