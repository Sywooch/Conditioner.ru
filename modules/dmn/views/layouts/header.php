<?php
use yii\helpers\Html;
use yii\helpers\Url;
$count = [];
$order = new \app\models\OrdersView();
$allOrder = $order->find()->where(['hide' => 'show'])->all();
$count['order'] = $order->find()->where(['hide' => 'show'])->count();
?>
<header class="main-header">
        <!-- Logo -->
        <a href="/" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b><?=$title?></b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b><?=$title?></b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-envelope-o"></i>
                  <span class="label label-success">4</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">Новых комментариев: 4</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li><!-- start message -->
                        <a href="#">
                          <div class="pull-left">
                            <?= Html::img('@web/img/user2-160x160.jpg', ['class' => 'img-circle', 'alt'=>'User Image']) ?>
                          </div>
                          <h4>
                            Support Team
                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li><!-- end message -->
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <?= Html::img('@web/img/user3-128x128.jpg', ['class' => 'img-circle', 'alt'=>'User Image']) ?>
                          </div>
                          <h4>
                            AdminLTE Design Team
                            <small><i class="fa fa-clock-o"></i> 2 hours</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <?= Html::img('@web/img/user4-128x128.jpg', ['class' => 'img-circle', 'alt'=>'User Image']) ?>
                          </div>
                          <h4>
                            Developers
                            <small><i class="fa fa-clock-o"></i> Today</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <?= Html::img('@web/img/user3-128x128.jpg', ['class' => 'img-circle', 'alt'=>'User Image']) ?>
                          </div>
                          <h4>
                            Sales Department
                            <small><i class="fa fa-clock-o"></i> Yesterday</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>

                    </ul>
                  </li>
                  <li class="footer"><a href="#">Посмотреть все</a></li>
                </ul>
              </li>
              <!-- Notifications: style can be found in dropdown.less -->
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning"><?=$count['order']?></span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">Новых заказов: <?=$count['order']?></li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">

                      <li>


                            <?php foreach ($allOrder as $order): ?>
                          <a href="<?=Url::to('/dmn/orders/view/' . $order->id_contact)?>">
                                <i class="fa fa-warning text-yellow"></i><?php
                                  //start function, and start if
                                  if ($order->subject == 'installation')
                                      echo '<span class="text-success">Монтаж</span>';
                                  elseif($order->subject == 'cleaning')
                                      echo '<span class="text-danger"><i>Чистка</i></span>';
                                  elseif($order->subject == 'refuel')
                                      echo '<span class="text-success"><i>Заправка</i></span>';
                                  else
                                      echo '<span class="text-danger"><i>Ремонт!</i></span>';
                                  //end function
                              ?> <?=$order->phone?>
                          </a>
                            <?php endforeach; ?>


                      </li>

                    </ul>
                  </li>
                  <li class="footer"><?=Html::a('Посмотреть все', '/dmn/orders/index?sort=hide')?></li>
                </ul>
              </li>

              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<?= Html::img('@web/img/user2-160x160.jpg', ['class' => 'user-image', 'alt'=>'User Image']) ?>
                  <span class="hidden-xs"><?=Yii::$app->user->identity->email?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <?= Html::img('@web/img/user2-160x160.jpg', ['class' => 'img-circle', 'alt'=>'User Image']) ?>
                    <p>
                        <?=Yii::$app->user->identity->username?>
                      <small>Зарегистрирован: Nov. 2012</small>
                    </p>
                  </li>

                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                        <?php
                        echo Html::beginForm(['/user/logout'], 'post')
                            . Html::submitButton(
                                'Выход',
                                ['class' => 'btn btn-default btn-flat']
                            )
                            . Html::endForm()
                        ?>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
