<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SystemComments */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="system-comments-form">
<?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

        <div class="alert alert-success">
            Данные успешно сохранены! 
            <?= Html::a('Вернуться', '/dmn/comments/index')?>
            <hr/>
            <?= Html::a('Обновить еще раз', ['update', 'id' => $model->id_position]) ?>
        </div>
    <?php else: ?>

        <p>
            Вы можете изменить данную запись, заполнив данными нижние поля.
        </p>
        <p>
            <code>Например: Изменить статус (Скрыть, Показать), добавить ответ на сообщение и тд...</code>
        </p>

        <div class="row">
            <div class="col-lg-5">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput([
        'placeholder' => 'Имя - Обязательно',
    ]) ?>

    <?= $form->field($model, 'phone')->textInput([
        'placeholder' => 'Телефон - Обязательно',
    ]) ?>

    <?= $form->field($model, 'city')->textInput([
        'placeholder' => 'Город',
    ]) ?>

    <?= $form->field($model, 'comment')->textarea([
        'rows' => 6,
        'placeholder' => 'Комментарий клиента',
    ]) ?>

    <?= $form->field($model, 'answer')->textarea([
        'rows' => 6,
        'placeholder' => 'Ответ на комментарий клиента',
    ]) ?>

    <?= $form->field($model, 'put_date')->textInput([
        'readonly' => 'readonly',
    ]) ?>

    <?= $form->field($model, 'hide')->dropDownList([ 'show' => 'Показать', 'hide' => 'Скрыть', ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

        </div>
    </div>

    <?php endif; ?>
</div>