<?php
/* @var $this yii\web\View */
foreach ($model as $about):
$this->title = $about->name;
$this->params['breadcrumbs'][] = ['label' => 'Информация', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->registerMetaTag(['name' => 'description', 'content' => $about->description]);
$this->registerMetaTag(['name' => 'keywords', 'content' => $about->keywords]);
?>
<div class="container">
    <div class="row-fluid blog-page">
        <!-- Left Sidebar -->
        <div class="span9">
            <div class="blog margin-bottom-30">

    <table class="table table-hover">

    <thead>
        <th><h3><?=$about->name?></h3></th>
    </thead>

    <tr>
        <td>
            <?=$about->info?>
        </td>
    </tr>

</table>
            </div>
        </div><!--/span9-->
    </div><!--/row-fluid-->
</div>
<?php endforeach; ?>