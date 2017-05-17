-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 16 2017 г., 11:05
-- Версия сервера: 5.7.16
-- Версия PHP: 5.6.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `conditioner_yii2`
--

-- --------------------------------------------------------

--
-- Структура таблицы `system_about`
--

CREATE TABLE `system_about` (
  `id_about` int(1) NOT NULL,
  `name` tinytext NOT NULL,
  `info` text NOT NULL,
  `description` text NOT NULL,
  `keywords` text NOT NULL,
  `hide` enum('show','hide') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `system_about`
--

INSERT INTO `system_about` (`id_about`, `name`, `info`, `description`, `keywords`, `hide`) VALUES
(1, 'Сколько стоит монтаж кондиционера?', '<p style=\"text-align:center\"><strong>Цены на монтаж кондиционера:</strong></p>\r\n\r\n<p style=\"text-align:center\"><strong>Стоимость стандартного монтажа*</strong></p>\r\n\r\n<p><em>*&nbsp;<u>Стандартный монтаж</u></em><br />\r\n<br />\r\n- Длина медной магистрали(фрионовой трассы) не более 5 метров<br />\r\n- Расположение внешнего блока кондиционера под окно или рядом с окном (до 2-го этажа), установка не выше 3-х метров с улицы (для 1-2 этажей)<br />\r\n- Бурение одного сквозного отверстия<br />\r\n- Длина межблочного кабеля не более 2 метров</p>\r\n\r\n<p>В базовый монтаж включена установка внешнего блока, не требующая вызова автовышки или работы альпиниста.<br />\r\n<span style=\"color:#FF0000\">В случае несоответствия</span> установки данным требованиям, <span style=\"color:#FF0000\">стоимость</span> монтажа <span style=\"color:#FF0000\">пересчитывается.</span></p>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<table align=\"left\" border=\"1\" cellpadding=\"1\" cellspacing=\"1\" class=\"table table-bordered table-striped\" style=\"width:100%\">\r\n	<thead>\r\n		<tr>\r\n			<th scope=\"col\">Мощьность кондиционера</th>\r\n			<th scope=\"col\">Стоимость монтажа</th>\r\n			<th scope=\"col\"><strong>Стоимость метра фрионовой трассы</strong></th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>7&nbsp;- 2 000 Вт</td>\r\n			<td>2500</td>\r\n			<td>500 руб за 1 метр</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;9 - 2650 Вт</td>\r\n			<td>2500</td>\r\n			<td>500 (600 если 1/2 труба)&nbsp;руб за 1 метр</td>\r\n		</tr>\r\n		<tr>\r\n			<td>12 - 3500 Вт</td>\r\n			<td>2700</td>\r\n			<td>700&nbsp;руб за 1 метр</td>\r\n		</tr>\r\n		<tr>\r\n			<td>18 -&nbsp;5300 Вт</td>\r\n			<td>4000</td>\r\n			<td>800 руб за 1 метр</td>\r\n		</tr>\r\n		<tr>\r\n			<td>24 - 7000 Вт</td>\r\n			<td>4500</td>\r\n			<td>800 руб за 1 метр</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:center\"><strong><em>Стоимость отдельных работ</em></strong>&nbsp;<em>(не входящих в стандартный монтаж)</em></p>\r\n\r\n<p><br />\r\n- Штроба по монолиту: 2000 руб. погонный метр.</p>\r\n\r\n<p>- Штроба по кирпичу: 800 руб. погонный метр.</p>\r\n\r\n<p>- Удлинение медной трассы:&nbsp; от 700 руб. за погонный метр.</p>\r\n\r\n<p>- Пайка медной трассы: 1000 руб.</p>\r\n\r\n<p>- Заказ автовышки : от 1500 руб за час</p>\r\n\r\n<p>- Короб для медной магистрали (60x60 мм): 400 руб. погонный метр.</p>\r\n\r\n<p>- Короб для кабеля питания: 150 руб. погонный метр.</p>\r\n\r\n<p>- Бурение дополнительного отверстия: 400 руб.</p>\r\n', 'Сколько стоит монтаж кондиционера? Цены на услуги по монтажу кондиционера в городе Керчь и области.', 'Кондиционеры, установка в Керчи, заправка кондиционеров, чистка кондиционера', 'show'),
(2, 'Гарантия на нашу работу', '<p>Гарантия на установку - год! Гарантия не распостраняеться на б/у кондиционер!</p>\r\n\r\n<p>Какие проблемы могут быть?:</p>\r\n\r\n<p>- Утечка фриона, последствия:</p>\r\n\r\n<p>Сплит система работает как вентилятор! Не охлаждая/обогревая воздух.</p>\r\n\r\n<p>- Скапливание конденсата во внутренем блоке, последствия:</p>\r\n\r\n<p>Конденсат капает на обои, паркет, мебель...</p>\r\n\r\n<p>Многие фирмы, производят некачественные монтажи и не дают&nbsp;гарантии!</p>\r\n\r\n<p>Гарантию на срок службы сплит системы дает производитель и на каждую систему свой срок! Замена или ремонт по гарантии производиться магазином в котором была куплена сплит система.</p>\r\n\r\n<p><strong>Советы от профессионалов:</strong></p>\r\n\r\n<p>Для сохранения ресурса сплит системы, необходимо её обслуживать каждый год в осене-весений период, а иммено:</p>\r\n\r\n<p>Производить обязательную чистку внутреннего блока и при необходимости наружнего. Это нужно не только, чтоб сохранить ресурс сплит системы но и для того, чтобы обеспечить безопасность своему здоровью!</p>\r\n', 'Наши гарантии и советы по использованию сплит систем.', 'Наши гарантии, гарантия на монтаж, гарантия на услуги, каковы гарантии, обслуживание сплит систем', 'show');

-- --------------------------------------------------------

--
-- Структура таблицы `system_comments`
--

CREATE TABLE `system_comments` (
  `id_position` int(11) NOT NULL,
  `name` tinytext NOT NULL,
  `phone` tinytext NOT NULL,
  `city` tinytext,
  `comment` text NOT NULL,
  `answer` text NOT NULL,
  `put_date` datetime NOT NULL,
  `hide` enum('show','hide') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `system_comments_news`
--

CREATE TABLE `system_comments_news` (
  `id_position` int(11) NOT NULL,
  `name` tinytext NOT NULL,
  `comment` text NOT NULL,
  `answer` text NOT NULL,
  `put_date` datetime NOT NULL,
  `hide` enum('show','hide') NOT NULL,
  `id_news` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `system_news`
--

CREATE TABLE `system_news` (
  `id_news` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `put_date` date NOT NULL,
  `hide` enum('show','hide') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `system_news`
--

INSERT INTO `system_news` (`id_news`, `name`, `body`, `put_date`, `hide`) VALUES
(1, 'Мы открылись!', '<p>В честь открытия сайта, мы дарим каждому пенсионеру предсезонную&nbsp;<span style=\"color:rgb(255, 0, 0)\">скидку</span>, на чистку каждого кондиционера&nbsp;<span style=\"color:rgb(255, 0, 0)\">10%</span>!</p>\r\n\r\n<p>Акция действует до 01,06,2017 включительно!</p>\r\n\r\n<p>Услугу можно заказать в разделе &quot;<a href=\"/order/index\" target=\"_blank\"><em><strong>Заказать Услугу</strong></em></a>&quot;, или&nbsp;по телефонам:</p>\r\n\r\n<p>+7 978 051 57 37 - Максим</p>\r\n\r\n<p>+7 978 025 74 66 - Алексей</p>\r\n', '2017-04-16', 'show');

-- --------------------------------------------------------

--
-- Структура таблицы `system_orders`
--

CREATE TABLE `system_orders` (
  `id_contact` int(11) NOT NULL,
  `name` tinytext NOT NULL,
  `phone` tinytext NOT NULL,
  `subject` enum('installation','cleaning','refuel','repair') NOT NULL,
  `message` text NOT NULL,
  `comment` text,
  `put_date` datetime NOT NULL,
  `hide` enum('show','hide','canceled') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Дамп данных таблицы `system_orders`
--

INSERT INTO `system_orders` (`id_contact`, `name`, `phone`, `subject`, `message`, `comment`, `put_date`, `hide`) VALUES
(1, 'Буденного 9', '+79788619245', 'cleaning', 'Буденного 9 кв 227', '', '2017-04-17 13:51:20', 'hide'),
(2, 'Елена', '+79788360179', 'cleaning', 'Блюхера 25 кв 111', 'Кондиционер Мидеа,\r\n\"Мидеа вам о чем нибудь говорит?\"', '2017-04-17 16:55:59', 'hide'),
(3, 'Белла', '+79788619019', 'cleaning', 'Айвазовского 18 кв 4\r\n2 мая на 15 часов', '', '2017-05-01 16:01:24', 'hide'),
(4, 'Марат 2', '+79789187998', 'cleaning', 'Марат 2 кв 49 код 358\r\n10 мая на 15 часов, еще надо соседке почистить!', '', '2017-05-01 16:05:24', 'hide'),
(5, 'Валентина Федоровна', '+79788136393', 'cleaning', 'Буденного 11 кв 56\r\nВ субботу на 9 утра', '', '2017-04-18 09:13:16', 'hide'),
(6, 'Орджоникидзе 124', '+79788260245', 'cleaning', 'Орджоникидзе 124 кв 11 на 15 часов', '', '2017-04-20 12:10:33', 'hide'),
(7, 'Ворошилова 15', '+79787177841', 'cleaning', 'Ворошилова 15 кв 10 на 16 часов', 'Сломан золотник на LG хотел заправку, потом отказался, я говорил 2000 рублей ему.', '2017-04-20 13:14:18', 'hide'),
(8, 'Анна Генадиевна', '+79787021407', 'cleaning', '', '', '2017-04-20 17:49:02', 'hide'),
(9, 'Галина Григорьевна', '+79787968440', 'cleaning', 'На 7-е мая\r\nОрджоникидзе 110 кв 29', 'Также надо лентой обмотать, предворительно посчитал на 1300 рублей + скидка 10%(Учтена!)', '2017-04-22 14:16:15', 'hide'),
(10, 'Кирова 79', '+79780809638', 'cleaning', 'Кирова 79 кв 16\r\nНа 12 часов для', '', '2017-04-24 14:23:46', 'hide'),
(11, 'Марат 19', '+79780093535', 'cleaning', 'Марат 19 кв 28\r\nНа 14 часов', '', '2017-04-26 17:56:59', 'hide'),
(12, 'Орджоникидзе 17', '+79883248851', 'cleaning', 'Орджоникидзе 17 кв 18 1-й этаж 3 кондиционера и заправить', '', '2017-04-28 18:23:02', 'hide'),
(13, 'Генерала Петрова 66', '+79183575837', 'cleaning', 'Генерала Петрова 66 кв 48\r\nНа 15 часов в субботу', '', '2017-05-29 12:36:00', 'hide'),
(14, 'Нелля', '+79787864923', 'cleaning', 'Буденного 32 кв 1 на 17-18 часов', '', '2017-05-02 00:26:54', 'hide'),
(15, 'Георгий', '+79788579730', 'installation', 'Пролетарская 6 магазин индюшонок', '', '2017-05-02 11:33:06', 'hide'),
(16, 'Буденного 9 кв 78', '+79788206754', 'cleaning', 'Буденного 9 кв 78 на 9 утра', '', '2017-05-02 11:53:10', 'hide'),
(17, 'Георгий', '+79788579730', 'refuel', 'Рынок центральный, ул. пролетарская, магазин Наша Ряба', '', '2017-05-03 18:15:17', 'hide'),
(18, 'Буденного 9 кв 244', '+79787750073', 'cleaning', 'Буденного 9 кв 244 на 10 утра', '', '2017-05-04 09:12:22', 'hide'),
(19, 'Дмитрий', '+79780585873', 'installation', 'Блюхера 6 кв 26 завтра на 9 утра', '', '2017-05-04 13:20:30', 'hide'),
(20, 'Бодни 43', 'Не указан', 'cleaning', 'Бодни 43 на 10 утра', '', '2017-05-05 23:20:41', 'hide'),
(21, '1-й пятилетки 33', '+79787178999', 'cleaning', '1-й пятилетки 33 кв 25\r\nЧистка, мелкий ремонт на понедельник', '', '2017-05-08 08:24:56', 'hide'),
(22, 'Ворошилова 15', '+79780016385', 'cleaning', 'Ворошилова 15 кв 38', '', '2017-05-11 17:33:01', 'hide'),
(23, 'Вокзальное шоссе 35', '+79892946965', 'installation', 'Вокзальное шоссе 35 кв 10', 'Также установили ей козырек.', '2017-05-06 15:23:59', 'hide'),
(24, 'Свердлова 84', '+79788773890', 'cleaning', 'Свердлова 84, первый этаж', '', '2017-05-12 10:25:57', 'hide'),
(25, 'Салон красоты', '+79787089137', 'refuel', 'Салон красоты, 2-й этаж, милицейский переулок', '', '2017-05-12 14:27:49', 'hide'),
(26, 'Петрович', '+79789189583', 'cleaning', 'Генерала петрова 20 кв 11\r\nТакже надо прочистить дренаж.', '', '2017-05-12 15:31:34', 'hide'),
(27, '+79787796296', '+79787796296', 'installation', '', 'На понедельник, вторник! Либо он позвонит либо ему набрать. + у него чистка, и монтаж 7 - ки.', '2017-05-16 10:57:04', 'show'),
(28, '+79787021035', '+79787021035', 'installation', 'На маме, на субботу 20 числа', NULL, '2017-05-16 10:59:59', 'show');

-- --------------------------------------------------------

--
-- Структура таблицы `system_photo_catalog`
--

CREATE TABLE `system_photo_catalog` (
  `id_catalog` int(11) NOT NULL,
  `name` tinytext NOT NULL,
  `description` text NOT NULL,
  `hide` enum('show','hide') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `system_photo_catalog`
--

INSERT INTO `system_photo_catalog` (`id_catalog`, `name`, `description`, `hide`) VALUES
(1, 'Май', '<p>Здесь представленны фотографии наших работ за май 2017 года.</p>\r\n', 'show');

-- --------------------------------------------------------

--
-- Структура таблицы `system_photo_position`
--

CREATE TABLE `system_photo_position` (
  `id_position` int(11) NOT NULL,
  `name` tinytext NOT NULL,
  `alt` tinytext NOT NULL,
  `img_small` tinytext NOT NULL,
  `img_big` tinytext NOT NULL,
  `hide` enum('show','hide') NOT NULL,
  `id_catalog` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `system_photo_position`
--

INSERT INTO `system_photo_position` (`id_position`, `name`, `alt`, `img_small`, `img_big`, `hide`, `id_catalog`) VALUES
(1, 'Air Green', 'Air Green 12 in', 's_photo-528244.jpeg', 'photo-528244.jpeg', 'show', 1),
(2, 'Air Green', 'Air Green 12 out', 's_photo-1918221725.jpeg', 'photo-1918221725.jpeg', 'show', 1),
(3, 'Air Green', 'Air Green 12 out', 's_photo-1926277.jpeg', 'photo-1926277.jpeg', 'show', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `system_users`
--

CREATE TABLE `system_users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(254) NOT NULL,
  `username` varchar(32) NOT NULL DEFAULT '',
  `password` varchar(254) NOT NULL,
  `status` smallint(6) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `role` enum('admin','user') NOT NULL,
  `secret_key` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `system_users`
--

INSERT INTO `system_users` (`id`, `email`, `username`, `password`, `status`, `auth_key`, `created_at`, `updated_at`, `role`, `secret_key`) VALUES
(1, 'maxkyivua@gmail.com', 'pimpys', '$2y$13$FmpzAZZqKUVB2vsh0qWFpOc17uwjQQb3iAppHFifdvPkLIwyCX0m6', 10, 'mrPE9wTTZD04Hszb5QkHsmURej7f-Awx', 1492287365, 1492287365, 'admin', NULL),
(2, 'maxkyivua@gmail.ua', 'Max', '$2y$13$fgdaOqidFVvGStI3N.OALe1gD7gjlo5Rr2sfxLIfBqQQyek9KeNKu', 10, 'hOd-aeSwK31ZzYueubHcDF6toHy1FfLq', 1492288339, 1494367323, 'user', 'k9FIj-N3zw0RW7Si0bQHNGD6be1w290r_1494367323');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `system_about`
--
ALTER TABLE `system_about`
  ADD PRIMARY KEY (`id_about`);

--
-- Индексы таблицы `system_comments`
--
ALTER TABLE `system_comments`
  ADD PRIMARY KEY (`id_position`);

--
-- Индексы таблицы `system_comments_news`
--
ALTER TABLE `system_comments_news`
  ADD PRIMARY KEY (`id_position`);

--
-- Индексы таблицы `system_news`
--
ALTER TABLE `system_news`
  ADD PRIMARY KEY (`id_news`);

--
-- Индексы таблицы `system_orders`
--
ALTER TABLE `system_orders`
  ADD PRIMARY KEY (`id_contact`);

--
-- Индексы таблицы `system_photo_catalog`
--
ALTER TABLE `system_photo_catalog`
  ADD PRIMARY KEY (`id_catalog`);

--
-- Индексы таблицы `system_photo_position`
--
ALTER TABLE `system_photo_position`
  ADD PRIMARY KEY (`id_position`);

--
-- Индексы таблицы `system_users`
--
ALTER TABLE `system_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uniq_username` (`username`),
  ADD UNIQUE KEY `uniq_email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `system_about`
--
ALTER TABLE `system_about`
  MODIFY `id_about` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `system_comments`
--
ALTER TABLE `system_comments`
  MODIFY `id_position` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `system_comments_news`
--
ALTER TABLE `system_comments_news`
  MODIFY `id_position` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `system_news`
--
ALTER TABLE `system_news`
  MODIFY `id_news` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `system_orders`
--
ALTER TABLE `system_orders`
  MODIFY `id_contact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT для таблицы `system_photo_catalog`
--
ALTER TABLE `system_photo_catalog`
  MODIFY `id_catalog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `system_photo_position`
--
ALTER TABLE `system_photo_position`
  MODIFY `id_position` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `system_users`
--
ALTER TABLE `system_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
