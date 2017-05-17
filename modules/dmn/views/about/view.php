<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SystemAbout */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Информация', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="system-about-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id_about], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id_about], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалть данную запись?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_about',
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
            'name:ntext',
            'info:html',
            'description:ntext',
            'keywords:ntext',
        ],
    ]) ?>

</div>
