<?php
use yii\helpers\Html;
/* @var $this yii\web\View */
$this->title = 'Статистика по сайту:';
?>
<h1><?= Html::encode($this->title)?></h1>
<div>
	<p>Добро пожаловать! В панель администратирования сайтом, здесь можно редактировать и добавлять:</p>
	<p>Новости, Фото, Категории, Изменять контактную информацию, и настройки сайта.</p>
	<p>Также можно посмотреть статистику, которая находится ниже.</p>
</div>

<br/>
<table class="table table-striped table-bordered">
<tr>
    <td>Заказов:</td><td>&nbsp;<?= Html::a($count['contact'], '/dmn/orders/index')?></td>
</tr>
<tr>
    <td>Отзывов пользователей:</td><td>&nbsp;<?= Html::a($count['comments'], '/dmn/comments/index')?></td>
</tr>
<tr>
    <td>Фотографий в галерее:</td><td>&nbsp;<?= Html::a($count['photo'], '/dmn/gallery/index')?></td>
</tr>
<tr>
	<td>Информационных записей:</td><td>&nbsp;<?= Html::a($count['about'], '/dmn/about/index')?></td>
</tr>
<tr>
    <td>Новостей:</td><td>&nbsp;<?= Html::a($count['news'], '/dmn/news/index')?></td>
</tr>
<tr>
    <td>Пользователей:</td><td>&nbsp;<?= Html::a($count['users'], '/dmn/user/index')?></td>
</tr>
</table>