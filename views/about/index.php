<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\LinkPager;
$this->title = 'Информация';
$this->params['breadcrumbs'][] = $this->title;
?>
	<div class="row-fluid blog-page">    
        <!-- Left Sidebar -->
    	<div class="span9">
            <?php if(!empty($model)):?>
<?php foreach ($model as $about):?>

                    <div class="panel panel-success">
                        <div class="panel-heading"><h3><?= $about->name?></h3></div>
                        <div class="panel-body">

                            <?= Html::limitWords($about->info, 30)?>
                        </div>
                        <div class="panel-footer">
                            <p>
                                <?= Html::a('Читать', '/about/view/' . $about->id_about, ['class' => 'btn btn-primary']) ?>
                            </p>
                        </div>
                    </div>

<?php endforeach;
echo LinkPager::widget([
    'pagination' => $pages,
]);
?>
            <?php else:?>

                <div class="alert alert-info">
                    Информация отсутствует.
                </div>

            <?php endif;?>
        </div><!--/span9-->

        <!-- Right Sidebar -->
    	
    </div><!--/row-fluid-->