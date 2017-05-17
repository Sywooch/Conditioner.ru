<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
$this->title = 'Новости/Акции';
$this->params['breadcrumbs'][] = $this->title;
?>
   <div class="container">		
	<div class="row-fluid blog-page blog-item">
        <!-- Left Sidebar -->
    	<div class="span9">
                       
<?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

        <div class="alert alert-success">
            <p>Благодарим Вас за обращение к нам. <?= Html::a('Вернуться', Url::current())?></p>
        </div>

<?php else: ?>

<?php
    foreach ($one_news as $news):
?>
        	<div class="blog margin-bottom-30">
                <h3><?= Html::encode($news->name)?></h3>
                <hr/>
<!--            	<ul class="unstyled inline blog-info">-->
<!--                    <li>-->
                        <span class="glyphicon glyphicon-calendar"></span> <?=$news->put_date?>
<!--                    </li>-->
<!--                </ul>-->
                <hr/>
                <?=$news->body?>
                
            </div><!--/blog-->
<?php endforeach; ?>
			<hr>

<h3 class="color-green"><a href='#add'>Добавить отзыв</a></h3>
<br/>

<?php foreach ($comments as $comment):?>

<!-- Media -->
            <div class="media">
                <a class="pull-left">
                    <img class="img-circle" src="/images/5.jpg" alt="">
                </a>
                <div class="media-body">
                <h4 class="media-heading"> <?=$comment->name?> </h4>
                <span class="glyphicon glyphicon-calendar"></span> <?=$comment->put_date?>
                <p>
                    <?=$comment->comment?>
                </p>

                    <hr>
                    <?php if(!empty($comment->answer)):?>
                    <!-- Nested media object -->
                    <div class="media">
                        <a class="pull-left">
                            <img class="img-circle" src="/images/1.jpg" alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">Ответ администратора</h4>
                            <p><?= nl2br($comment->answer);?></p>
                        </div>
                    </div><!--/media-->
                    <hr>
                    <?php endif?>
                </div>
            </div><!--/media-->

<?php endforeach; ?>

            <!-- Leave a Comment -->
            <div class="post-comment">
                <a name='add'></a>
            	<h3 class="color-green">Добавить отзыв</h3>
                <?php $form = ActiveForm::begin()?>
                
                <?=$form->field($model, 'name')->textInput([
                    'placeholder' => 'Ваше имя - Обязательно',
                ]) ; ?>
                
                <?=$form->field($model, 'comment')->textarea([
                    'rows' => 6,
                    'placeholder' => 'Отзыв, Коментарий. Спасибо'
                ])?>
                
                <div class="form-group">
                    <?= Html::submitButton($model->isNewRecord ? 'Отправить' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
               </div>
                
                <?php ActiveForm::end()?>
            </div><!--/post-comment-->
<?php endif; ?>
            <hr>

        </div><!--/span9-->
 
    </div><!--/row-fluid-->        
</div>