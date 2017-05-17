<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Contact */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="site-contact">
    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

        <div class="alert alert-success">
            Данные успешно сохранены! 
            <?= Html::a('Вернуться в заказы', '/dmn/orders/index')?>
            <hr/>
            <?= Html::a('Обновить еще раз', ['update', 'id' => $model->id_contact]) ?>
        </div>
    
    <?php else: ?>

        <p>
            Вы можете изменить данную запись, заполнив данными нижние поля.
        </p>
        <p>
            <code>Например: Изменить статус заказа, добавив адрес в строку сообщения и тд...</code>
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
    <?= $form->field($model, 'comment')->textarea([
        'rows' => 6,
        'placeholder' => 'Комментарий к заказу - адрес, другая важная информация о клиенте'
    ]) ?>

    <?= $form->field($model, 'put_date')->textInput([
        'readonly' => 'readonly',
    ]) ?>

    <?= $form->field($model, 'hide')->dropDownList([ 'show' => 'Ожидает', 'hide' => 'Выполнен', 'canceled' => 'Отменен',]) ?>

   <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Заказать' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
   </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>

    <?php endif; ?>
</div>