<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Contact */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Заказы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id_contact], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id_contact], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить данную запись?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_contact',
            'name:ntext',
            'phone:ntext',
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
            'message:ntext',
            'comment:ntext',
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
                        return '<span class="text-danger"><b>Отменен!</b></span>';
                //end function
                },
                'format' => 'html',
            ],
        ],
    ]) ?>

</div>
