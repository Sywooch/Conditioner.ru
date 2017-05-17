<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
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
        'brandLabel' => 'Вернуться на сайт',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
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
                        <a href='<?= Url::to(['/user/logout'])?>' class='btn btn-danger' data-method='post'>Выйти</a>
                    ">
                <span class="glyphicon glyphicon-user"></span>
            </button>
        </div>  
    <?php
    endif;
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Главная <span class="glyphicon glyphicon-home"></span>', 'url' => ['/dmn/welcome/index']],
            ['label' => 'Заказы <span class="glyphicon glyphicon-phone"></span>', 'url' => ['/dmn/orders/index']],
            ['label' => 'Галерея <span class="glyphicon glyphicon-picture"></span>', 'url' => ['/dmn/gallery/index']],
            ['label' => 'Новости/Акции <span class="glyphicon glyphicon-book"></span>', 'url' => ['/dmn/news/index']],
            ['label' => 'Информация <span class="glyphicon glyphicon-question-sign"></span>', 'url' => ['/dmn/about/index']],
            ['label' => 'Gii', 'url' => ['/gii']],
//            Yii::$app->user->isGuest ? (
//                ['label' => 'Войти', 'url' => ['/user/login']]
//            ) : (
//                '<li>'
//                . Html::beginForm(['/user/logout'], 'post')
//                . Html::submitButton(
//                    'Выйти (' . Yii::$app->user->identity->username . ')',
//                    ['class' => 'btn btn-link logout']
//                )
//                . Html::endForm()
//                . '</li>'
//            )
        ],
        'encodeLabels' => FALSE,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <span class="badge">
        <p class="pull-left">
            2017 - <?= date('Y') ?> &copy; Сайт разработан Максимом Гордиенко. Моя страница 
            <a title="&quot;Вконтакте&quot;" href="https://vk.com/pimpys" target="_blank">&nbsp;"Вконтакте"</a> Моб. тел: +7-978-051-57-37
        </p>
        </span>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>