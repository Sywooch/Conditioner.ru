<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $model app\models\Contact */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="site-contact">
    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

        <div class="alert alert-success">
            <h4>Благодарим Вас за обращение к нам. Мы постараемся ответить вам как можно скорее.</h4>
            <p>Наши менеджеры свяжутся с Вами по номеру телефона, который Вы нам сообщили и обсудят с вами дату/время выполнения заказа!</p>
        </div>

    <?php else: ?>

        <p>
            Вы можете заказать услугу монтажа(установка)/чистки/дозаправки, заполнив данными нижние поля.
        </p>

        <div class="row">
            <div class="col-lg-5">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput([
        'autofocus' => true,
        'placeholder' => 'Имя - Обязательно'
    ]) ?>

    <?= $form->field($model, 'phone')->textInput(['placeholder' => 'Телефон - Обязательно'])?>

    <?= $form->field($model, 'subject')->dropDownList([
            'installation' => 'Монтаж',
            'cleaning' => 'Чистка',
            'refuel' => 'Заправка',
            'repair' => 'Ремонт',
       ], ['prompt' => 'Выбрать услугу']) ?>

    <?= $form->field($model, 'message')->textarea([
        'rows' => 6,
        'placeholder' => 'Ваш адресс, марка кондиционера, комментарий к заказу - По желанию'
    ]) ?>
                
    <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
        'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
    ]) ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Заказать' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
   </div>
                <?php ActiveForm::end(); ?>

            </div>
        </div>

    <?php endif; ?>
</div>
