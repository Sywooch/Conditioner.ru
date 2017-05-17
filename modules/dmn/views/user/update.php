<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $user->username;
$this->params['breadcrumbs'][] = ['label' => 'Пользователи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    
<?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

        <div class="alert alert-success">
            <p>Данные успешно обновлены. <?= Html::a('Вернуться', Url::current())?></p>
        </div>

<?php else: ?>
    <?= $this->render('_form', [
        'model' => $user,
    ]);
endif; ?>
    
</div>