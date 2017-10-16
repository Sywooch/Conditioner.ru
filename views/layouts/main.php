<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;
use adminlte\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
	<meta name="yandex-verification" content="3a394982cd629a04" />
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>

    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-default navbar-fixed-top',
            'id' => 'web-bootstrap-menu',
        ],
    ]);
    if (!Yii::$app->user->isGuest):
        ?>
        <div class="navbar-form navbar-right">
            <button class="btn btn-sm btn-default"
                    data-container="body"
                    data-toggle="popover"
                    data-trigger="focus"
                    data-placement="bottom"
                    data-title="<?= Yii::$app->user->identity->username?>"
                    data-content="
                    <?php if(Yii::$app->user->identity->role == 'admin'): ?>
                            <a href='<?= Url::to(['/dmn'])?>' class='btn btn-success' >Админка</a><hr/>
                    <?php endif; ?>
                        <a href='<?= Url::to(['/user/logout'])?>' class='btn btn-danger' data-method='post'>Выйти</a>
                    ">
                <span class="glyphicon glyphicon-user"></span>
            </button>
        </div>
        <?php
    else:
        ?>
        <div class="navbar-form navbar-right">
            <button class="btn btn-sm btn-default"
                    data-container="body"
                    data-toggle="popover"
                    data-trigger="focus"
                    data-placement="bottom"
                    data-title="Авторизация"
                    data-content="
                        <a href='<?= Url::to(['/user/login'])?>' class='btn btn-success'>Вход</a><hr/>
                        <a href='<?= Url::to(['/user/register'])?>'class='btn btn-primary'>Регистрация</a>
                    ">
                <span class="glyphicon glyphicon-log-in"></span>
            </button>
        </div>
        <?php
    endif;
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Главная <span class="glyphicon glyphicon-home"></span>', 'url' => ['/site/index']],
            ['label' => 'Заказать услугу <span class="glyphicon glyphicon-phone"></span>', 'url' => ['/order/index']],
            ['label' => 'Информация <span class="glyphicon glyphicon-question-sign"></span>', 'url' => ['/about/index']],
            ['label' => 'Новости/Акции <span class="glyphicon glyphicon-book"></span>', 'url' => ['/news/index']],
            ['label' => 'Отзывы клиентов <span class="glyphicon glyphicon-comment"></span>', 'url' => ['/comments/index']],
            ['label' => 'Галерея <span class="glyphicon glyphicon-picture"></span>', 'url' => ['/gallery/index']],
        ],
        'encodeLabels' => FALSE,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <span class="badge1">
        <p class="pull-left">
            <?= Yii::$app->name ?>
            <span class="glyphicon glyphicon-copyright-mark"></span>

            2017 - <?= date('Y') ?>

            </p>
        </span>
        <p class="pull-right"></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
