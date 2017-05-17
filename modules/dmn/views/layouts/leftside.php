<?php

use adminlte\widgets\Menu;
use yii\helpers\Html;
use yii\helpers\Url;
?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
<?= Html::img('@web/img/user2-160x160.jpg', ['class' => 'img-circle', 'alt' => 'User Image']) ?>
            </div>
            <div class="pull-left info">
                <p><?=Yii::$app->user->identity->username?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> В сети</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Поиск...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <?=
        Menu::widget(
                [
                    'options' => ['class' => 'sidebar-menu'],
                    'items' => [
                        ['label' => 'Навигация', 'options' => ['class' => 'header']],
                        ['label' => 'Главная', 'icon' => 'fa fa-home',
                            'url' => ['/dmn/welcome/index'], 'active' => $this->context->route == 'dmn/welcome/index'
                        ],
                        ['label' => 'Заказы', 'icon' => 'fa fa-phone',
                            'url' => ['/dmn/orders/index'], 'active' => $this->context->route == 'dmn/orders/index'
                        ],
                        ['label' => 'Галерея', 'icon' => 'fa fa-camera-retro',
                            'url' => ['/dmn/gallery/index'], 'active' => $this->context->route == 'dmn/gallery/index'
                        ],
                        [
                            'label' => 'Материалы',
                            'icon' => 'fa fa-database',
                            'url' => '#',
                            'items' => [
                                [
                                    'label' => 'Новости/Акции',
                                    'icon' => 'fa fa-book',
                                    'url' => '/dmn/news/index',
				    'active' => $this->context->route == 'dmn/news/index'
                                ],
                                [
                                    'label' => 'Информация',
                                    'icon' => 'fa fa-question',
                                    'url' => '/dmn/about/index',
				    'active' => $this->context->route == 'dmn/about/index'
                                ]
                            ]
                        ],
                        [
                            'label' => 'Отзывы Клиентов',
                            'icon' => 'fa fa-comment-o',
                            'url' => ['/dmn/comments/index'],
                            'active' => $this->context->route == 'dmn/comments/index',
                        ],
                        [
                            'label' => 'Пользователи',
                            'icon' => 'fa fa-users',
                            'url' => ['/dmn/user/index'],
                            'active' => $this->context->route == 'dmn/user/index',
                        ],
                        ['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii'],],
                        ['label' => 'Debug', 'icon' => 'fa fa-dashboard', 'url' => ['/debug'],],
                    ],
                ]
        )
        ?>
        
    </section>
    <!-- /.sidebar -->
</aside>
