<?php

/* @var $this yii\web\View */
$this->registerMetaTag([
    'name' => 'description',
    'content' => 'Мы предоставляем услуги по Монтажу, Заправке, Чистке сплит систем в городе Керчь и области!'
]);

$this->title = Yii::$app->name;
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Добро пожаловать</h1>
        <p class="lead">На сайт компании <?=$this->title?></p>
    </div>

    <div class="panel panel-success">
        <div class="panel-heading"></div>
        <div class="panel-body">

            <p class="posttitle">Рады приветствовать Вас, мы предоставляем услуги по монтажу(установке) и
                обслуживанию Заправка, Чистка(внутреннего и наружного блоков) кондиционеров, сплит систем в городе Керчь и области!
            </p>
            <p class="posttitle">У нас Вы можете <span style="color: #ff0000;">
                        <a href="<?=\yii\helpers\Url::to('/order/index')?>"><span style="color: #ff0000;">заказать</span></a></span>
                услуги не выходя из дома.
                У нас работают мастера своего дела, поэтому мы гарантируем качественно выполненную работу</p>
            <p class="posttitle">С нашими ценами вы можете ознакомится
                <a href="<?=\yii\helpers\Url::to('/about/view/1')?>"><span style="color: #ff0000;">тут.</span></a></p>
            <p class="posttitle"><strong><span>Заказывайте у нас, мы любим вас!:)</span></strong></p>

        </div>
        <div class="panel-footer">
            <div>

                <h2>Гарантия</h2>

                <p>
                    Мы гарантируем качество монтажей.
                    Монтаж выполняется исключительно профессиональными сотрудниками, также по окончанию монтажа вы
                    получаете&nbsp;<span style="color: #ff0000;">гарантию</span>&nbsp;на монтаж, один<span style="color: #ff0000;">&nbsp;год</span>!
                </p>

            </div>
            <div>
                <h2>Установка в области</h2>

                <p>
                    Мы <span style="color: #ff0000;">работаем по области</span>, стоимость одного км 25 руб,
                    в стоимость километра входит дорога туда обратно,
                    например вы живёте от города 30км: дополнительные затраты на дорогу будут 30км Х 25руб/км = 750руб
                </p>
            </div>
            <div>
                <h2>Цены</h2>
                <p>
                    Мы предоставляем конкурентно способные цены! У нас дешевле около 20-25% чем в крупнейших магазинах города!
                    У нас нет подводных камней и все как на ладоне! С нашими ценами, гарантиями и предложениями
                    вы можете ознакомится в разделе <a href="<?=\yii\helpers\Url::to('/about/index')?>"><span style="color: #ff0000;">информация.</span></a>
                </p>
                <p>
                    Также у нас проходят различные акции, прочитать о них вы можете
                    <a href="<?=\yii\helpers\Url::to('/news/index')?>"><span style="color: #ff0000;">тут.</span></a>
                </p>
            </div>
        </div>
    </div>
</div>
