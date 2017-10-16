<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
/* @var $this yii\web\View */
/*
KB2976978, подготавливает систему к обновлению на Windows 10
KB3035583, скачивает бесплатный апгрейд на Windows 10
KB3044374, подготавливает систему к обновлению на Windows 10
KB3075249, телеметрия
KB3080149, телеметрия
KB3102429, не важные
Если кому то эти обновления нужны, они могу всегда обновиться через Центр обновления Windows
 * */
$this->title = 'Фотографии';
$this->params['breadcrumbs'][] = ['label' => 'Галерея', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;?>

        <div class="container gallery-container">

            <div class="tz-gallery">

                <div class="row">
                    <div class="popup-gallery">
                    <?php foreach($model as $photo): ?>

                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <?=
                                Html::a(Html::img(Yii::getAlias('@web/images/' . $photo->img_small), [
                                    'alt' => $photo->alt,
                                    'class' => 'img-thumbnail',
                                ]),
                                    //
                                    [
                                        Yii::getAlias('@web/images/' . $photo->img_big),
                                    ],
                                    //
                                    [
//                                        'class' => 'image-popup-zoom',
                                        'title' => $photo->name,
                                    ]
                                );
                                ?>
                                <div class="caption">
                                    <h3><?= $photo->name ?></h3>
                                    <p><?= $photo->alt ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    </div>

                </div>
                <?= LinkPager::widget([
                    'pagination' => $pages,
                ]);?>
            </div>

        </div>