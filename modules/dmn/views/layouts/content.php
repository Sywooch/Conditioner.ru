<?php
use yii\widgets\Breadcrumbs;
use app\components\AlertWidget;
use adminlte\widgets\Alert;

?>
	  <!-- Content Wrapper. Contains page content -->
	  <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
			<?php if (isset($this->blocks['content-header'])) : ?>
				<h1><?= $this->blocks['content-header'] ?></h1>
			<?php endif;
			echo Breadcrumbs::widget([
				'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
			]) ?>
        </section>

        <!-- Main content -->
        <section class="content">
            <?= Alert::widget() ?>
			<?= $content ?>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
