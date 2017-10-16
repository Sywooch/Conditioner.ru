<?php
/* @var $this yii\web\View */
/**
 * @property string $name
 * @property string $phone
 * @property string $city
 * @property string $comment
 * @property string $answer
 * @property string $put_date
 * @property string $hide 
 * @var string $pages
 *
 */
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
$this->title = 'Отзывы Клиентов';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">

<?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

        <div class="alert alert-success">
            <p>Благодарим Вас за Ваш отзыв. <?= Html::a('Вернуться', Url::current())?></p>
        </div>

<?php else: ?>

<div class="container">
    <h3 class="color-green"><a href='#add'>Добавить отзыв</a></h3>
    <br/>
</div>

<?php
    if(!empty($comments)):
    foreach ($comments as $comment):?>

<!-- Media -->
            <div class="media">
                <a class="pull-left">
                    <img class="img-circle" src="/images/6.jpg" alt="">
                </a>
                <div class="media-body">
                <h4 class="media-heading"> <?=$comment->name?> </h4>
                
                <?php if(!empty($comment->city)): ?>
                
                <span class="glyphicon glyphicon-globe"></span><b><?=$comment->city?></b>
                
                <?php endif;?>
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
<?=LinkPager::widget([
        'pagination' => $pages,
]);
    else:?>

        <div class="alert alert-info">
            Отзывов пока еще нет, будьте первым!
        </div>

    <?php endif; ?>
    <div class="col-xs-6">
            <!-- Leave a Comment -->
            <div class="post-comment">
                <a name='add'></a>
            	<h3 class="color-green">Добавить отзыв</h3>
                <?php $form = ActiveForm::begin()?>
                
                <?=$form->field($model, 'name')->textInput([
                    'placeholder' => 'Ваше имя - Обязательно',
                ]) ; ?>
                
                <?=$form->field($model, 'phone')->textInput(['placeholder' => 'Телефон( Не публикуется ) - Обязательно']) ; ?>
                
                <?=$form->field($model, 'city')->textInput(['placeholder' => 'Город - По желанию']) ; ?>
                
                <?=$form->field($model, 'comment')->textarea([
                    'rows' => 6,
                    'placeholder' => 'Отзыв, пожелания, комментарии к работе. Спасибо'
                ])?>
                
                <div class="form-group">
                    <?= Html::submitButton($model->isNewRecord ? 'Отправить' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
               </div>
                
                <?php ActiveForm::end()?>
            </div><!--/post-comment-->
    </div>
<?php endif; ?>
</div>