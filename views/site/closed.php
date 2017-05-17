<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Сайт закрыт!';

?>

    <div class="site-closed">

        <div class="jumbotron">
            <h1><?= Html::encode($this->title) ?></h1>

            <p class="lead">
                Причина:
                Обновление,
                Реконструкция,
                Испрасление ошибок.
            </p>

        </div>

        <div class="body-content">

            <div class="row">
                <div class="col-lg-4">

                </div>
                <div class="col-lg-4">

                    <p>
                        Извените за предоставленные неудобства!
                    </p>
                    <p>
                        >>>Сайт откроется примерно в:
                        <?= date('H:i:s', time() + 3600); ?>
                    </p>
                    <p>
                        Спасибо за то, что Вы посетили нас, ждем вас снова.
                    </p>

                </div>
                <div class="col-lg-4">

                </div>
            </div>

        </div>
    </div>
