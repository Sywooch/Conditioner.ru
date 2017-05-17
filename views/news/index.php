<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
/* @var $this yii\web\View */
$this->title = 'Новости/Акции';
$this->params['breadcrumbs'][] = $this->title;
?>
	<div class="row-fluid blog-page">    
        <!-- Left Sidebar -->

    	<div class="span9">
            <?php if(!empty($all_news)):?>
<?php
    foreach ($all_news as $news):
?>
        <div class="panel panel-primary">
            <div class="panel-heading"><h3><?=$news->name?></h3></div>
            <div class="panel-body">

                    <i class="icon-calendar"></i> <?=$news->put_date?>
<hr/>
                <?= Html::limitWords($news->body, 30)?>
            </div>
            <div class="panel-footer">
                <p>
                    <?= Html::a('Читать', '/news/read/'.$news->id_news, ['class' => 'btn btn-primary']) ?>
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
                            Новостей пока, что нет.
                        </div>

            <?php endif;?>
        </div><!--/span9-->

        <!-- Right Sidebar -->
    	
    </div><!--/row-fluid-->