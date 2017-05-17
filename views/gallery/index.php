<?php

use yii\helpers\Html;

$this->title = 'Галерея';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="gallery-index container">

    <h1><?= Html::encode($this->title) ?></h1>

<p>
    Добро пожаловать в нашу галерею, здесь представленны фотографии наших работ.
</p>
    <?php if(!empty($model)):?>
<p>
    Приятного просмотра.
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
        <td><?= Html::a('Посмотреть', '/gallery/view/' . $gallery->id_catalog, [
            'class' => 'btn btn-info',
        ]) ?></td>
    </tr>
<?php endforeach; ?>
</table>

    <?php else:?>
        <div class="row">
            <div class="col-xs-8">
                <div class="alert alert-info">
                    Галерея пуста.
                </div>
            </div>
        </div>
    <?php endif;?>

</div>