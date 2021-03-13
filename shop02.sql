-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 28 2020 г., 22:02
-- Версия сервера: 5.7.29
-- Версия PHP: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop02`
--

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `goods_article` int(10) UNSIGNED NOT NULL COMMENT 'Уникальный артикул товара, начинается с 100 000.',
  `goods_name` varchar(255) NOT NULL DEFAULT 'no name',
  `goods_status` tinyint(3) UNSIGNED NOT NULL DEFAULT '100',
  `goods_description` text NOT NULL COMMENT 'Описание товара.',
  `goods_img` varchar(255) NOT NULL DEFAULT 'prod/no_img.jpg',
  `goods_groups` int(4) UNSIGNED NOT NULL COMMENT 'Ссылка на группу товара.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`goods_article`, `goods_name`, `goods_status`, `goods_description`, `goods_img`, `goods_groups`) VALUES
(100001, '23 Февраля №001', 100, '<p>Подарок для мужчины, друга, колеги, папы</p>\r\n<p>В него входит:</p>\r\n<ul>\r\n	<li>Чипсы Принглз</li>\r\n	<li>Чашка</li>\r\n	<li>Чай чёрный Липтон</li>\r\n	<li>Шоколад Риттер спорт</li>\r\n	<li>Крем для бритья</li>\r\n	<li>Крем после бритья</li>\r\n	<li>Подарочная коробка</li>\r\n</ul>', 'prod/23f_001.jpg', 1),
(100002, '23 Февраля №002', 100, '<p>Подарок для папы</p>\r\n<p>В него входит:</p>\r\n<ul>\r\n	<li>Кофе молотый в термостакане \"Лучшему папе\"</li>\r\n	<li>Носки в банке \"Мой папа самый крутой\"</li>\r\n	<li>Ароматизатор в авто \"Лучший водитель\"</li>\r\n	<li>Ручка в подарочном футляре \"Лучший в мире папа\"</li>\r\n	<li>Набор конфет \"Настоящему мужчине\"</li>\r\n	<li>Подарочная коробка</li>\r\n</ul>', 'prod/23f_002.jpg', 1),
(100003, '23 Февраля №003', 100, '<p>Подарок для мужчины, друга, колеги, папы</p>\r\n<p>В него входит:</p>\r\n<ul>\r\n	<li>Кружка Чай чёрный с лимоном и мятой \"Лучшему из лучших\"</li>\r\n	<li>Шоколад Риттер спорт</li>\r\n	<li>Крем для бритья</li>\r\n	<li>Крем после бритья</li>\r\n	<li>Подарочная коробка</li>\r\n</ul>', 'prod/23f_003.jpg', 1),
(100004, '23 Февраля №004', 100, '<p>Подарок для мужчины, друга, колеги, папы</p>\r\n<p>В него входит:</p>\r\n<ul>\r\n	<li>Кружка</li>\r\n	<li>Чай чёрный с лимоном и мятой \"Лучшему из лучших\"</li>\r\n	<li>Шоколад Риттер спорт</li>\r\n	<li>Крем для бритья</li>\r\n	<li>Крем после бритья</li>\r\n	<li>Подарочная коробка</li>\r\n</ul>', 'prod/23f_004.jpg', 1),
(100005, '23 Февраля №005', 100, '<p>Подарок для мужчины, друга, колеги, папы</p>\r\n<p>В него входит:</p>\r\n<ul>\r\n	<li>Кружка \"Достигай целей\"</li>\r\n	<li>Чай чёрный Липтон</li>\r\n	<li>Шоколад Риттер спорт</li>\r\n	<li>Ключница</li>\r\n	<li>Набор \"Для настоящих мужчин\" (гель для душа и шампунь)</li>\r\n	<li>Подарочная коробка</li>\r\n</ul>', 'prod/23f_005.jpg', 1),
(100006, '23 Февраля №006', 100, '<p>Подарок для мужчины, друга, колеги, папы</p>\r\n<p>В него входит:</p>\r\n<ul>\r\n	<li>Кружка \"Достигай целей\"</li>\r\n	<li>Чай чёрный Липтон</li>\r\n	<li>Печенье Орео</li>\r\n	<li>Набор \"Для настоящих мужчин\" (гель для душа и шампунь)</li>\r\n	<li>Подарочная коробка</li>\r\n</ul>', 'prod/23f_006.jpg', 1),
(100007, '23 Февраля №007', 100, '<p>Подарок для мужчины, друга, колеги, папы</p>\r\n<p>В него входит:</p>\r\n<ul>\r\n	<li>Кружка</li>\r\n	<li>Чай чёрный с лимоном и мятой \"Лучшему из лучших\"</li>\r\n	<li>Печенье Орео</li>\r\n	<li>Обложка для документов</li>\r\n	<li>Носки \"Будь первым\"</li>\r\n	<li>Травка в банке \"Каждый мужчина в своей жизни должен..\"</li>\r\n	<li>Подарочная коробка</li>\r\n</ul>', 'prod/23f_007.jpg', 1),
(100008, '23 Февраля №008', 100, '<p>Подарок для мужчины, друга, колеги, папы</p>\r\n<p>В него входит:</p>\r\n<ul>\r\n	<li>Термостакан \"Самому сильному мужчине\"</li>\r\n	<li>Шоколад Риттер Спорт</li>\r\n	<li>Обложка для документов</li>\r\n	<li>Носки \"Будь первым\"</li>\r\n	<li>Травка в банке \"Каждый мужчина в своей жизни должен..\"</li>\r\n	<li>Подарочная коробка</li>\r\n</ul>', 'prod/23f_008.jpg', 1),
(100009, '23 Февраля №009', 100, '<p>Подарок для мужчины, друга, колеги, папы</p>\r\n<p>В него входит:</p>\r\n<ul>\r\n	<li>Кофе молотый \"Зарядись на полную\"</li>\r\n	<li>Кружка \"Достигай целей\"</li>\r\n	<li>Шоколад Риттер Спорт</li>\r\n	<li>Чипсы Принглс</li>\r\n	<li>Ключница</li>\r\n	<li>Набор конфет \"Настоящему мужчине\"</li>\r\n	<li>Подарочная коробка</li>\r\n</ul>', 'prod/23f_009.jpg', 1),
(100010, '23 Февраля №010', 100, '<p>Подарок для мужчины, друга, колеги, папы</p>\r\n<p>В него входит:</p>\r\n<ul>\r\n	<li>Кофе молотый \"Зарядись на полную\"</li>\r\n	<li>Кружка</li>\r\n	<li>Шоколад Риттер спорт</li>\r\n	<li>Чипсы Принглс</li>\r\n	<li>Ключница</li>\r\n	<li>Набор конфет \"Настоящему мужчине\"</li>\r\n	<li>Подарочная коробка</li>\r\n</ul>', 'prod/23f_010.jpg', 1),
(100011, '23 Февраля №011', 100, '<p>Подарок для мужчины, друга, колеги, папы</p>\r\n<p>В него входит:</p>\r\n<ul>\r\n	<li>Чай чёрный с ароматом лимона и мяты\"Лучшему из лучших\"</li>\r\n	<li>Печенье Орео</li>\r\n	<li>Носки в банке \"Настоящий мужик\"</li>\r\n	<li>Ключница</li>\r\n	<li>Набор конфет \"Настоящему мужчине\"</li>\r\n	<li>Подарочная коробка</li>\r\n</ul>', 'prod/23f_011.jpg', 1),
(100012, '23 Февраля №012', 100, '<p>Подарок для мужчины, друга, колеги, папы</p>\r\n<p>В него входит:</p>\r\n<ul>\r\n	<li>Кофе в термостакане \"Лучшему папе\"</li>\r\n	<li>Носки в банке \"Настоящий мужик\"</li>\r\n	<li>Ручка в футляре \"Лучший в мире папа\"</li>\r\n	<li>Ароматизатор \"Лучший водитель\"</li>\r\n	<li>Набор конфет \"Настоящему мужчине\"</li>\r\n	<li>Подарочная коробка</li>\r\n</ul>', 'prod/23f_012.jpg', 1),
(100013, '23 Февраля №013', 100, '<p>Подарок для мужчины, друга, колеги, папы</p>\r\n<p>В него входит:</p>\r\n<ul>\r\n	<li>Кружка</li>\r\n	<li>Полотенце</li>\r\n	<li>Печенье Орео</li>\r\n	<li>Крем для бритья</li>\r\n	<li>Крем после бритья</li>\r\n	<li>Подарочная коробка</li>\r\n</ul>', 'prod/23f_013.jpg', 1),
(100014, '23 Февраля №014', 100, '<p>Подарок для мужчины, друга, колеги, папы</p>\r\n<p>В него входит:</p>\r\n<ul>\r\n	<li>Кружка \"Достигай целей\"</li>\r\n	<li>Чай чёрный с лимоном и мятой \"Лучшему из лучших\"</li>\r\n	<li>Шоколад Риттер спорт</li>\r\n	<li>Полотенце</li>\r\n	<li>Подарочная коробка</li>\r\n</ul>', 'prod/23f_014.jpg', 1),
(100015, '23 Февраля №015', 100, '<p>Подарок для мужчины, друга, колеги, папы</p>\r\n<p>В него входит:</p>\r\n<ul>\r\n	<li>Кружка</li>\r\n	<li>Полотенце</li>\r\n	<li>Шоколад Риттер спорт</li>\r\n	<li>Крем для бритья</li>\r\n	<li>Крем после бритья</li>\r\n	<li>Подарочная коробка</li>\r\n</ul>', 'prod/23f_015.jpg', 1),
(100016, '8 Марта №001', 100, '<p>Яркий набор для ваших близких, друзей</p>\r\n<p>В него входит:</p>\r\n<ul>\r\n	<li>Нежнейший шарф</li>\r\n	<li>Крем для рук</li>\r\n	<li>Кружка</li>\r\n	<li>Кофе молотый</li>\r\n	<li>Блокнот \"Все цветы мира для тебя\"</li>\r\n	<li>Резиночка для волос</li>\r\n	<li>Маска для лица</li>\r\n	<li>Оригинальное оформление</li>\r\n</ul>', 'prod/8m_001.jpg', 2),
(100017, 'Другие праздники №001', 100, '<p>Яркий набор в Фиолетовом цвете для ваших близких, друзей</p>\r\n<p>В него входит:</p>\r\n<ul>\r\n	<li>Нежнейший шарф</li>\r\n	<li>Ароматное мыло ручной работы</li>\r\n	<li>Шоколад Милка с ягодной начинкой</li>\r\n	<li>Набор \"Особая серия\"</li>\r\n	<li>Маска для лица</li>\r\n	<li>Оригинальное оформление</li>\r\n</ul>', 'prod/drp_001.jpg', 9),
(100018, '8 Марта №002', 100, '<p>Женский набор для самых прекрасных)</p>\r\n<p>В него входит:</p>\r\n<ul>\r\n	<li>Кружка</li>\r\n	<li>Патчи</li>\r\n	<li>Чай в пакетиках \"Для самой прекрасной\"</li>\r\n	<li>Косметичка \"Сладость\"</li>\r\n	<li>Набор \"Олеа\"</li>\r\n	<li>Оригинальная упаковка</li>\r\n</ul>', 'prod/8m_002.jpg', 2),
(100019, '23 Февраля №016', 100, '<p>Подарок для мужчины, друга, колеги, папы</p>\r\n<p>В него входит:</p>\r\n<ul>\r\n	<li>Термостакан \"Самому сильному мужчине\"</li>\r\n	<li>Чай чёрный с лимоном и мятой \"Лучшему из лучших\"</li>\r\n	<li>Шоколад Риттер спорт</li>\r\n	<li>Носки \"Будь первым\"</li>\r\n	<li>Травка в банке \"Каждый мужчина в своей жизни должен..\"</li>\r\n	<li>Подарочная коробка</li>\r\n</ul>', 'prod/23f_016.jpg', 1),
(100020, '23 Февраля №017', 100, '<p>Подарок для мужчины, друга, колеги, папы</p>\r\n<p>В него входит:</p>\r\n<ul>\r\n	<li>Чистящее средство для салона</li>\r\n	<li>Очиститель стекла</li>\r\n	<li>Чашка</li>\r\n	<li>Печенье Орео</li>\r\n	<li>Ключница</li>\r\n	<li>Подарочная коробка</li>\r\n</ul>', 'prod/23f_017.jpg', 1),
(100021, '23 Февраля №018', 100, '<p>Подарочек для любителей содержать своё авто в чистоте)</p>\r\n<p>В него входит:</p>\r\n<ul>\r\n	<li>Чистящее средство</li>\r\n	<li>Очиститель стекла</li>\r\n	<li>Очистительные дисков</li>\r\n	<li>Многофункциональная смазка Molecules</li>\r\n	<li>Влажные салфетки для авто</li>\r\n	<li>Подарочная упаковка</li>\r\n</ul>', 'prod/23f_018.jpg', 1),
(100022, '8 Марта №003', 100, '<p>Набор для самых прекрасных девушек)</p>\r\n<p>В него входит:</p>\r\n<ul>\r\n	<li>Полотенце</li>\r\n	<li>Кружка</li>\r\n	<li>Чай чёрный \"Самой прекрасной\"</li>\r\n	<li>Шоколад Корона</li>\r\n	<li>Брелок \"Держи пончик\"</li>\r\n	<li>Бомбочка для ванны</li>\r\n	<li>Оригинальная упаковка</li>\r\n</ul>', 'prod/8m_003.jpg', 2),
(100023, '8 Марта №004', 100, '<p>Новинка для настоящих леди)</p>\r\n<p>В него входит:</p>\r\n<ul>\r\n	<li>Полотенце</li>\r\n	<li>Блокнот\" Все цветы мира для тебя\"</li>\r\n	<li>Кофе молотый \"Жираф\"</li>\r\n	<li>Кружка \"Носочки настоящей леди\"</li>\r\n	<li>Сладкое угощение</li>\r\n	<li>Оригинальная упаковка</li>\r\n</ul>', 'prod/8m_004.jpg', 2),
(100024, '8 Марта №005', 100, '<p>Такой подарок не оставит равнодушной Вашу девушку;)</p>\r\n<p>В него входит:</p>\r\n<ul>\r\n	<li>Мягкий шарф</li>\r\n	<li>Чай \"Самой прекрасной\"</li>\r\n	<li>Кружка</li>\r\n	<li>Бомбочка для ванны</li>\r\n	<li>Косметичка \"Ням-ням\"</li>\r\n	<li>Оригинальная упаковка</li>\r\n</ul>', 'prod/8m_005.jpg', 2),
(100025, '8 Марта №006', 100, '<p>Новинка!</p>\r\n<p>В него входит:</p>\r\n<ul>\r\n	<li>Мягкий шарф</li>\r\n	<li>Кружка</li>\r\n	<li>Сладкое угощение</li>\r\n	<li>Косметичка \"ням-ням\"</li>\r\n	<li>Кофе молотый \"Радовать себя\"</li>\r\n	<li>Оригинальная упаковка</li>\r\n</ul>', 'prod/8m_006.jpg', 2),
(100026, 'День Рождения №001', 100, '<p>Подарок ко дню Рождения для Вашего Дорогого человека</p>\r\n<p>В него входит:</p>\r\n<ul>\r\n	<li>Печенье с предсказанием \"С днём рождения\"</li>\r\n	<li>Набор кремов \"Особая серия\"</li>\r\n	<li>Маска для лица</li>\r\n	<li>Мини полотенце</li>\r\n	<li>Чай черный \"Самой прекрасной\"</li>\r\n	<li>Мини блокнот</li>\r\n	<li>Ручка</li>\r\n	<li>Резинка для волос</li>\r\n	<li>Крем для рук</li>\r\n	<li>Оригинальная упаковка + декор</li>\r\n</ul>', 'prod/dr_001.jpg', 6),
(100027, '23 Февраля №019', 100, '<p>Подарок, который отлично подойдёт на 23 февраля</p>\r\n<p>В него входит:</p>\r\n<ul>\r\n	<li>Чипсы Принглз</li>\r\n	<li>Ежедневник \"Я буду миллионером\"</li>\r\n	<li>Кружка</li>\r\n	<li>Шоколад в конверте \"Ты мужик и тебе все можно\"</li>\r\n	<li>Набор \"Обложка для паспорта+ручка\"</li>\r\n	<li>Подарочная упаковка</li>\r\n</ul>', 'prod/23f_019.jpg', 1),
(100028, '23 Февраля №020', 100, '<p>Набор \"Лучшему\"</p>\r\n<p>В него входит:</p>\r\n<ul>\r\n	<li>Ключница</li>\r\n	<li>Чай \"Лучшему из лучших\"</li>\r\n	<li>Чашка</li>\r\n	<li>Шоколад</li>\r\n	<li>Космо кофе</li>\r\n	<li>Футляр с бумажным блокнотом \"Записки уникального\"</li>\r\n	<li>Оригинальная упаковка + открытка</li>\r\n</ul>', 'prod/23f_020.jpg', 1),
(100029, '23 Февраля №021', 100, '<p>Набор на 23 февряля для вашего Мужчины!</p>\r\n<p>В него входит:</p>\r\n<ul>\r\n	<li>Шоколад Риттер Спорт</li>\r\n	<li>Набор (крем для бритья + крем после бритья)</li>\r\n	<li>Чипсы Принглз</li>\r\n	<li>Ежедневник \"Я буду Миллионером\"</li>\r\n	<li>Оригинальная упаковка</li>\r\n</ul>', 'prod/23f_021.jpg', 1),
(100030, '23 Февраля №022', 100, '<p>Набор Мужской</p>\r\n<p>В него входит:</p>\r\n<ul>\r\n	<li>Чай \"Лучшему из лучших\"</li>\r\n	<li>Чашка</li>\r\n	<li>Шоколад</li>\r\n	<li>Ключница</li>\r\n	<li>Ручка\"Настоящий мужик\"</li>\r\n	<li>Оригинальная упаковка</li>\r\n</ul>', 'prod/23f_022.jpg', 1),
(100031, '23 Февраля №023', 100, '<p>Набор к 23 февраля</p>\r\n<p>В него входит:</p>\r\n<ul>\r\n	<li>Чипсы Принглз</li>\r\n	<li>Гель для душа</li>\r\n	<li>Кружка</li>\r\n	<li>Чай \"Лучшему из лучших\"</li>\r\n	<li>Шоколадная монета на открытке \"Настоящему мужчине\"</li>\r\n	<li>Оригинальная упаковка</li>\r\n</ul>', 'prod/23f_023.jpg', 1),
(100032, '23 Февраля №024', 100, '<p>Набор Мужской</p>\r\n<p>В него входит:</p>\r\n<ul>\r\n	<li>Черный чай Lipton</li>\r\n	<li>Шоколад Риттер Спорт</li>\r\n	<li>Ключница</li>\r\n	<li>Ручка \"100% Мужик\"</li>\r\n	<li>Носки \"Настоящему мужчине\"</li>\r\n	<li>Открывашка</li>\r\n	<li>Оригинальная упаковка + открытка</li>\r\n</ul>', 'prod/23f_024.jpg', 1),
(100033, '23 Февраля №025', 100, '<p>Бюджет набор на 23 февраля</p>\r\n<p>В него входит:</p>\r\n<ul>\r\n	<li>Печенье Орео в стакане</li>\r\n	<li>Космо Кофе</li>\r\n	<li>Кружка</li>\r\n	<li>Оригинальная упаковка + открытка</li>\r\n</ul>', 'prod/23f_025.jpg', 1),
(100034, '23 Февраля №026', 100, '<p>Набор Мужской</p>\r\n<p>В него входит:</p>\r\n<ul>\r\n	<li>Космо Кофе</li>\r\n	<li>Шоколадные монеты в конверте \"Лучшему из лучших\"</li>\r\n	<li>Носки</li>\r\n	<li>Кружка</li>\r\n	<li>Оригинальная упаковка + открытка</li>\r\n</ul>', 'prod/23f_026.jpg', 1),
(100035, '23 Февраля №027', 100, '<p>Набор Мужской</p>\r\n<p>В него входит:</p>\r\n<ul>\r\n	<li>Носки</li>\r\n	<li>Ручка \"100% Мужик\"</li>\r\n	<li>Чай \"Лучшему из лучших\"</li>\r\n	<li>Футляр с бумажным блокнотом \"Записки уникального\"</li>\r\n	<li>Оригинальная упаковка</li>\r\n</ul>', 'prod/23f_027.jpg', 1),
(100036, '23 Февраля №028', 100, '<p>Набор \"Интеллегент\"</p>\r\n<p>Состав:</p>\r\n<ul>\r\n	<li>Шоколадные монеты \"Лучшему из лучших\"</li>\r\n	<li>Набор\"Лидеру\" (обложка для паспорта+ ручка)</li>\r\n	<li>Чай \"Лучшему из лучших\"</li>\r\n	<li>Галстук в банке</li>\r\n	<li>Шоколад</li>\r\n	<li>2 стакана под виски</li>\r\n	<li>Оригинальная упаковка + открытка</li>\r\n</ul>', 'prod/23f_028.jpg', 1),
(100037, '23 Февраля №029', 100, '<p>Изысканный набор для Вашего защитника!</p>\r\n<p>В него входит:</p>\r\n<ul>\r\n	<li>Набор конфет</li>\r\n	<li>Визитница</li>\r\n	<li>Открывашка</li>\r\n	<li>Черный чай</li>\r\n	<li>Кружка</li>\r\n	<li>Оригинальная упаковка + открытка</li>\r\n</ul>', 'prod/23f_029.jpg', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `goods_img`
--

CREATE TABLE `goods_img` (
  `gi_article` int(10) UNSIGNED DEFAULT NULL,
  `gi_href` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Дополнительные изображения товаров.';

-- --------------------------------------------------------

--
-- Структура таблицы `groups`
--

CREATE TABLE `groups` (
  `groups_id` int(4) UNSIGNED NOT NULL COMMENT 'id группы. Первая цифра резерв, две последующие - код отдела, две последние - код группы.',
  `groups_name` varchar(255) NOT NULL COMMENT 'Название группы.',
  `groups_img` varchar(255) NOT NULL DEFAULT 'groups/no_img.jpg' COMMENT 'Сселка на изображение.',
  `groups_status` tinyint(4) NOT NULL DEFAULT '1' COMMENT 'Статус группы. 1 - обычная группа, 2 - группа заблокированна.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `groups`
--

INSERT INTO `groups` (`groups_id`, `groups_name`, `groups_img`, `groups_status`) VALUES
(1, '23 Февраля', 'groups/group_23f.jpg', 1),
(2, '8 Марта', 'groups/group_8m.jpg', 1),
(3, 'Пасха', 'groups/no_img.jpg', 2),
(4, 'Свадьба', 'groups/no_img.jpg', 2),
(5, '9 Мая', 'groups/no_img.jpg', 2),
(6, 'Дни Рождения', 'groups/group_dr.jpg', 1),
(7, 'Новый Год', 'groups/no_img.jpg', 2),
(8, 'Родителям', 'groups/group_rod.jpg', 1),
(9, 'Другие празники', 'groups/group_drp.jpg', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `news_id` int(10) UNSIGNED NOT NULL COMMENT 'Уникальный id новости.',
  `news_title` varchar(255) NOT NULL COMMENT 'Заголовок новости.',
  `news_preview` text NOT NULL COMMENT 'Превью, короткая часть основного текста.',
  `news_text` text NOT NULL COMMENT 'Основной текст новости.',
  `news_date` int(10) UNSIGNED NOT NULL COMMENT 'Дата создания новости в формате UNIX - времени.',
  `news_status` tinyint(3) UNSIGNED NOT NULL DEFAULT '1' COMMENT 'Статус новости. По умолчанию 1 - обычная новость.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`news_id`, `news_title`, `news_preview`, `news_text`, `news_date`, `news_status`) VALUES
(1, 'Тест 001', 'Пвыаываыва ваыва ываыва ываываываываыва оо пв пнвна пнон нп  унылувлапынп  внпылв нвп ыю. Ваваы  ываываы ывваыва ываываы уыу аываыв ыуа ыуу.', 'Пвыаываыва ваыва ываыва ываываываываыва оо пв пнвна пнон нп  унылувлапынп  внпылв нвп ыю. Ваваы  ываываы ывваыва ываываы уыу аываыв ыуа ыуу .Пвыаываыва ваыва ываыва ываываываываыва оо пв пнвна пнон нп  унылувлапынп  внпылв нвп ыю. Ваваы  ываываы ывваыва ываываы уыу аываыв ыуа ыуу .Пвыаываыва ваыва ываыва ываываываываыва оо пв пнвна пнон нп  унылувлапынп  внпылв нвп ыю. Ваваы  ываываы ывваыва ываываы уыу аываыв ыуа ыуу .Пвыаываыва ваыва ываыва ываываываываыва оо пв пнвна пнон нп  унылувлапынп  внпылв нвп ыю. Ваваы  ываываы ывваыва ываываы уыу аываыв ыуа ыуу .Пвыаываыва ваыва ываыва ываываываываыва оо пв пнвна пнон нп  унылувлапынп  внпылв нвп ыю. Ваваы  ываываы ывваыва ываываы уыу аываыв ыуа ыуу .Пвыаываыва ваыва ываыва ываываываываыва оо пв пнвна пнон нп  унылувлапынп  внпылв нвп ыю. Ваваы  ываываы ывваыва ываываы уыу аываыв ыуа ыуу .Пвыаываыва ваыва ываыва ываываываываыва оо пв пнвна пнон нп  унылувлапынп  внпылв нвп ыю. Ваваы  ываываы ывваыва ываываы уыу аываыв ыуа ыуу.', 1504948202, 1),
(2, 'Тест 002', 'ЫВАЫВАЫАавывапы ава ваоппр рва пнпна ныпвапн ынвапны внпныпнлпынвн пнпанпывнп  ынпапывпанп ылпванпылвп апывн панлпывна лыпвн алыпвла лыпвлнп аныв нлнл ылв ', '1504948202150494820215049482ЫВАЫВАЫАавывапы ава ваоппр рва пнпна ныпвапн ынвапны внпныпнлпынвн пнпанпывнп  ынпапывпанп ылпванпылвп апывн панлпывна лыпвн алыпвла лыпвлнп аныв нлнл ылв ЫВАЫВАЫАавывапы ава ваоппр рва пнпна ныпвапн ынвапны внпныпнлпынвн пнпанпывнп  ынпапывпанп ылпванпылвп апывн панлпывна лыпвн алыпвла лыпвлнп аныв нлнл ылв ЫВАЫВАЫАавывапы ава ваоппр рва пнпна ныпвапн ынвапны внпныпнлпынвн пнпанпывнп  ынпапывпанп ылпванпылвп апывн панлпывна лыпвн алыпвла лыпвлнп аныв нлнл ылв ЫВАЫВАЫАавывапы ава ваоппр рва пнпна ныпвапн ынвапны внпныпнлпынвн пнпанпывнп  ынпапывпанп ылпванпылвп апывн панлпывна лыпвн алыпвла лыпвлнп аныв нлнл ылв ЫВАЫВАЫАавывапы ава ваоппр рва пнпна ныпвапн ынвапны внпныпнлпынвн пнпанпывнп  ынпапывпанп ылпванпылвп апывн панлпывна лыпвн алыпвла лыпвлнп аныв нлнл ылв 02', 1504949999, 1),
(3, 'Тест 003', 'ваыва ыва ыва ыва ыва ыв аыв ваыва ыва ыва ыва ыва ыв аыв ваыва ыва ыва ыва ыва ыв аыв ваыва ыва ыва ыва ыва ыв аыв ваыва ыва ыва ыва ыва ыв аыв ваыва ыва ыва ыва ыва ыв аыв ваыва ыва ыва ыва ыва ыв аыв ваыва ыва ыва ыва ыва ыв аыв ', 'ваыва ыва ыва ыва ыва ыв аыв ваыва ыва ыва ыва ыва ыв аыв ваыва ыва ыва ыва ыва ыв аыв ваыва ыва ыва ыва ыва ыв аыв ваыва ыва ыва ыва ыва ыв аыв ваыва ыва ыва ыва ыва ыв аыв ваыва ыва ыва ыва ыва ыв аыв ваыва ыва ыва ыва ыва ыв аыв ваыва ыва ыва ыва ыва ыв аыв ваыва ыва ыва ыва ыва ыв аыв ваыва ыва ыва ыва ыва ыв аыв ваыва ыва ыва ыва ыва ыв аыв ваыва ыва ыва ыва ыва ыв аыв ваыва ыва ыва ыва ыва ыв аыв ваыва ыва ыва ыва ыва ыв аыв ваыва ыва ыва ыва ыва ыв аыв ваыва ыва ыва ыва ыва ыв аыв ваыва ыва ыва ыва ыва ыв аыв ваыва ыва ыва ыва ыва ыв аыв ваыва ыва ыва ыва ыва ыв аыв ваыва ыва ыва ыва ыва ыв аыв ваыва ыва ыва ыва ыва ыв аыв ваыва ыва ыва ыва ыва ыв аыв ваыва ыва ыва ыва ыва ыв аыв ваыва ыва ыва ыва ыва ыв аыв ваыва ыва ыва ыва ыва ыв аыв ваыва ыва ыва ыва ыва ыв аыв ваыва ыва ыва ыва ыва ыв аыв ваыва ыва ыва ыва ыва ыв аыв ваыва ыва ыва ыва ыва ыв аыв ваыва ыва ыва ыва ыва ыв аыв ваыва ыва ыва ыва ыва ыв аыв ваыва ыва ыва ыва ыва ыв аыв ваыва ыва ыва ыва ыва ыв аыв ваыва ыва ыва ыва ыва ыв аыв ваыва ыва ыва ыва ыва ыв аыв ваыва ыва ыва ыва ыва ыв аыв ваыва ыва ыва ыва ыва ыв аыв ', 1504955554, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `orders_id` int(10) UNSIGNED NOT NULL COMMENT 'id заказа.',
  `orders_date` int(10) UNSIGNED NOT NULL COMMENT 'Дата создания заказа.',
  `orders_email` varchar(255) DEFAULT NULL COMMENT 'Электронная почта заказчика.',
  `orders_phone` varchar(20) DEFAULT NULL COMMENT 'Телефон заказчика.',
  `orders_addition` text COMMENT 'Дополнительные данные заказа.',
  `orders_status` tinyint(3) UNSIGNED NOT NULL DEFAULT '1' COMMENT 'Статус заказа. Стадии оформления заказа: 1 - создан, но не оформлен, 2 - оформлен, но не подтвержден, 3 - заказ ожидает подтверждения (отправлено письмо), 4 - заказ подтвержден, 5 - заказ обработан и отправлен, 6 - заказ завершон (оплачен), 9 - заказ отменен.',
  `orders_cookies_id` varchar(32) DEFAULT NULL COMMENT 'Id сесси, к которой привязан заказ.',
  `orders_confirmation` varchar(32) DEFAULT NULL COMMENT 'Ссылка подтверждения заказа.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`orders_id`, `orders_date`, `orders_email`, `orders_phone`, `orders_addition`, `orders_status`, `orders_cookies_id`, `orders_confirmation`) VALUES
(1, 1547912770, 'sashok991@gmail.com', '+79789182652', 'Вышлите мне пожалуйста заказ по следующиму адресу:\r\nAv. Quirino, 2-376 - Inácio Barbosa Aracaju - SE, Бразилия', 4, 'a3ee1700532f713269bcbe1db1cd6898', 'ec9df4bccea541af4119a1dccd4cc5ad'),
(2, 1547744375, NULL, NULL, NULL, 9, '5e898cdc541367c232376c0b50cba5b2', NULL),
(3, 1547744672, 'sasssa@fff.fgdf', '-5445444848484', 'dfggssdfgsdgfsfgs', 9, 'c7f67435775827a6d20ee89a23b8e725', NULL),
(4, 1548095665, NULL, NULL, NULL, 9, '293a29bc04e468a77b3b175483b4359b', NULL),
(5, 1548097668, NULL, NULL, NULL, 9, 'd4f9d0b763de04c51576e25ef2fc02c8', NULL),
(6, 1548171507, NULL, NULL, NULL, 1, '6b93b761ad52ba490e59f3ab78c36722', NULL),
(7, 1548261701, NULL, NULL, NULL, 1, '8ab309876eea20e534a0d620597fd1a4', NULL),
(8, 1548263450, NULL, NULL, NULL, 9, '244c193b53dd6a26c7a58e8905ca9b31', NULL),
(9, 1549132620, NULL, NULL, NULL, 9, '93c4abd6642ee0a60b226cb7c8ee55b1', NULL),
(10, 1549397845, 'sashok991@gmail.com', '+79789182652', '', 9, 'fa98239d6eb38c30409cb33b70d70eaf', NULL),
(11, 1549795229, NULL, NULL, NULL, 1, 'c9427e20e464e9e7284d6036c3d68972', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `orders_content`
--

CREATE TABLE `orders_content` (
  `oc_id` int(10) UNSIGNED NOT NULL COMMENT 'id заказа.',
  `oc_article` int(10) UNSIGNED NOT NULL COMMENT 'Артикул товара.',
  `oc_quantity` int(10) UNSIGNED NOT NULL COMMENT 'Количество товара.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders_content`
--

INSERT INTO `orders_content` (`oc_id`, `oc_article`, `oc_quantity`) VALUES
(1, 100004, 2),
(1, 100009, 2),
(1, 100010, 5),
(1, 100011, 4),
(2, 100010, 2),
(4, 100003, 1),
(5, 100009, 1),
(6, 100009, 3),
(7, 100001, 1),
(7, 100010, 1),
(8, 100001, 1),
(8, 100002, 1),
(9, 100003, 1),
(10, 100035, 4),
(11, 100025, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `price`
--

CREATE TABLE `price` (
  `price_article` int(10) UNSIGNED NOT NULL COMMENT 'Ссылка на артикул товара.',
  `price_date` int(10) UNSIGNED NOT NULL COMMENT 'UNIX - время',
  `price_price` int(10) UNSIGNED NOT NULL COMMENT 'Цена записана в копейках российских рублей.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `price`
--

INSERT INTO `price` (`price_article`, `price_date`, `price_price`) VALUES
(100001, 1513618791, 75000),
(100002, 1513619890, 95000),
(100003, 1513619964, 5500),
(100003, 1513620035, 5555),
(100003, 1513627467, 65000),
(100004, 1513620074, 65000),
(100005, 1513620122, 95000),
(100006, 1513620122, 90000),
(100007, 1513620122, 95000),
(100008, 1513620122, 95000),
(100009, 1513620122, 95000),
(100010, 1513620122, 90000),
(100011, 1513620122, 90000),
(100012, 1513620122, 100000),
(100013, 1513620122, 75000),
(100014, 1513620122, 90000),
(100015, 1513620434, 90000),
(100016, 1513000000, 110000),
(100017, 1513000000, 90000),
(100018, 1513000000, 90000),
(100019, 1513000000, 95000),
(100020, 1513000000, 85000),
(100021, 1513000000, 75000),
(100022, 1513000000, 100000),
(100023, 1513000000, 100000),
(100024, 1513000000, 90000),
(100025, 1513000000, 90000),
(100026, 1513000000, 100000),
(100027, 1513000000, 95000),
(100028, 1513000000, 120000),
(100029, 1513000000, 60000),
(100030, 1513000000, 95000),
(100031, 1513000000, 80000),
(100032, 1513000000, 86000),
(100033, 1513000000, 55000),
(100034, 1513000000, 60000),
(100035, 1513000000, 65000),
(100036, 1513000000, 120000),
(100037, 1513000000, 95000);

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE `reviews` (
  `reviews_id` int(10) UNSIGNED NOT NULL COMMENT 'id коментария',
  `reviews_name` varchar(50) DEFAULT NULL COMMENT 'Имя пользователя',
  `reviews_email` varchar(255) DEFAULT NULL COMMENT 'Электронная почта',
  `reviews_text` text COMMENT 'Текст коментария',
  `reviews_status` tinyint(3) UNSIGNED NOT NULL DEFAULT '1' COMMENT 'Статус коментария',
  `reviews_confirmation` varchar(32) NOT NULL DEFAULT '1' COMMENT 'Ссылка подтверждения коментария'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Таблица отзывов.';

--
-- Дамп данных таблицы `reviews`
--

INSERT INTO `reviews` (`reviews_id`, `reviews_name`, `reviews_email`, `reviews_text`, `reviews_status`, `reviews_confirmation`) VALUES
(1, 'Гость', 'dasdasd@sdf.ckj', ';figjsdijfgiksdflgjlisdhfilghsdilfhgilsdi isdjh hid ildiflh iihliuhdulidh hsd fhdsfuighuoshfgvouh dfuvh duhfuodsh fuohd fo duofh oduf od fuovh duhf ;figjsdijfgiksdflgjlisdhfilghsdilfhgilsdi isdjh hid ildiflh iihliuhdulidh hsd fhdsfuighuoshfgvouh dfuvh duhfuodsh fuohd fo duofh oduf od fuovh duhf ;figjsdijfgiksdflgjlisdhfilghsdilfhgilsdi isdjh hid ildiflh iihliuhdulidh hsd fhdsfuighuoshfgvouh dfuvh duhfuodsh fuohd fo duofh oduf od fuovh duhf ;figjsdijfgiksdflgjlisdhfilghsdilfhgilsdi isdjh hid ildiflh iihliuhdulidh hsd fhdsfuighuoshfgvouh dfuvh duhfuodsh fuohd fo duofh oduf od fuovh duhf ;figjsdijfgiksdflgjlisdhfilghsdilfhgilsdi isdjh hid ildiflh iihliuhdulidh hsd fhdsfuighuoshfgvouh dfuvh duhfuodsh fuohd fo duofh oduf od fuovh duhf ;figjsdijfgiksdflgjlisdhfilghsdilfhgilsdi isdjh hid ildiflh iihliuhdulidh hsd fhdsfuighuoshfgvouh dfuvh duhfuodsh fuohd fo duofh oduf od fuovh duhf ', 2, '1'),
(2, 'Rrrrrr', 'dgdxfgxcv@gff.fdg', ';figjsdijfgiksdflgjlisdhfilghsdilfhgilsdi isdjh hid ildiflh iihliuhdulidh hsd fhdsfuighuoshfgvouh dfuvh duhfuodsh fuohd fo duofh oduf od fuovh duhf ;figjsdijfgiksdflgjlisdhfilghsdilfhgilsdi isdjh hid ildiflh iihliuhdulidh hsd fhdsfuighuoshfgvouh dfuvh duhfuodsh fuohd fo duofh oduf od fuovh duhf ;figjsdijfgiksdflgjlisdhfilghsdilfhgilsdi isdjh hid ildiflh iihliuhdulidh hsd fhdsfuighuoshfgvouh dfuvh duhfuodsh fuohd fo duofh oduf od fuovh duhf ;figjsdijfgiksdflgjlisdhfilghsdilfhgilsdi isdjh hid ildiflh iihliuhdulidh hsd fhdsfuighuoshfgvouh dfuvh duhfuodsh fuohd fo duofh oduf od fuovh duhf ;figjsdijfgiksdflgjlisdhfilghsdilfhgilsdi isdjh hid ildiflh iihliuhdulidh hsd fhdsfuighuoshfgvouh dfuvh duhfuodsh fuohd fo duofh oduf od fuovh duhf ', 2, '1'),
(3, 'Name', 'sdfscvsdcsd@dff.fgdf', ';figjsdijfgiksdflgjlisdhfilghsdilfhgilsdi isdjh hid ildiflh iihliuhdulidh hsd fhdsfuighuoshfgvouh dfuvh duhfuodsh fuohd fo duofh oduf od fuovh duhf ;figjsdijfgiksdflgjlisdhfilghsdilfhgilsdi isdjh hid ildiflh iihliuhdulidh hsd fhdsfuighuoshfgvouh dfuvh duhfuodsh fuohd fo duofh oduf od fuovh duhf ;figjsdijfgiksdflgjlisdhfilghsdilfhgilsdi isdjh hid ildiflh iihliuhdulidh hsd fhdsfuighuoshfgvouh dfuvh duhfuodsh fuohd fo duofh oduf od fuovh duhf ;figjsdijfgiksdflgjlisdhfilghsdilfhgilsdi isdjh hid ildiflh iihliuhdulidh hsd fhdsfuighuoshfgvouh dfuvh duhfuodsh fuohd fo duofh oduf od fuovh duhf ;figjsdijfgiksdflgjlisdhfilghsdilfhgilsdi isdjh hid ildiflh iihliuhdulidh hsd fhdsfuighuoshfgvouh dfuvh duhfuodsh fuohd fo duofh oduf od fuovh duhf ', 2, '1');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD UNIQUE KEY `goods_article_unique` (`goods_article`),
  ADD KEY `goods_to_groups` (`goods_groups`);

--
-- Индексы таблицы `goods_img`
--
ALTER TABLE `goods_img`
  ADD KEY `gi_to_goods` (`gi_article`);

--
-- Индексы таблицы `groups`
--
ALTER TABLE `groups`
  ADD UNIQUE KEY `groups_id_unique` (`groups_id`) USING BTREE;

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orders_id`),
  ADD KEY `orders_confirmation` (`orders_confirmation`),
  ADD KEY `orders_cookies_id` (`orders_cookies_id`);

--
-- Индексы таблицы `orders_content`
--
ALTER TABLE `orders_content`
  ADD UNIQUE KEY `os_id-article_unique` (`oc_id`,`oc_article`),
  ADD KEY `oc_to_orders` (`oc_id`),
  ADD KEY `oc_to_goods` (`oc_article`);

--
-- Индексы таблицы `price`
--
ALTER TABLE `price`
  ADD UNIQUE KEY `price_article-date_unique` (`price_article`,`price_date`);

--
-- Индексы таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`reviews_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Уникальный id новости.', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `orders_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'id заказа.', AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
  MODIFY `reviews_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'id коментария', AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `goods`
--
ALTER TABLE `goods`
  ADD CONSTRAINT `goods_to_groups` FOREIGN KEY (`goods_groups`) REFERENCES `groups` (`groups_id`);

--
-- Ограничения внешнего ключа таблицы `goods_img`
--
ALTER TABLE `goods_img`
  ADD CONSTRAINT `gi_to_goods` FOREIGN KEY (`gi_article`) REFERENCES `goods` (`goods_article`);

--
-- Ограничения внешнего ключа таблицы `orders_content`
--
ALTER TABLE `orders_content`
  ADD CONSTRAINT `oc_to_goods` FOREIGN KEY (`oc_article`) REFERENCES `goods` (`goods_article`),
  ADD CONSTRAINT `oc_to_orders` FOREIGN KEY (`oc_id`) REFERENCES `orders` (`orders_id`);

--
-- Ограничения внешнего ключа таблицы `price`
--
ALTER TABLE `price`
  ADD CONSTRAINT `price_to_goods` FOREIGN KEY (`price_article`) REFERENCES `goods` (`goods_article`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
