-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 09 2017 г., 16:08
-- Версия сервера: 5.5.50
-- Версия PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `rentcar`
--

-- --------------------------------------------------------

--
-- Структура таблицы `auto`
--

CREATE TABLE IF NOT EXISTS `auto` (
  `id` int(10) unsigned NOT NULL,
  `type` enum('auto','moto') NOT NULL DEFAULT 'auto',
  `number` varchar(50) DEFAULT NULL,
  `mark_id` int(10) unsigned NOT NULL DEFAULT '0',
  `price_id` int(10) unsigned NOT NULL,
  `class` enum('-','A','B','C','D','E','F','J','M','S') NOT NULL DEFAULT '-',
  `body` enum('Sedan','Universal','Hatchback','Jeep','Sport Bike','Chopper','Cruiser') NOT NULL DEFAULT 'Sedan',
  `transmission` enum('mechanic','automatic') NOT NULL DEFAULT 'mechanic',
  `color_id` int(10) unsigned NOT NULL DEFAULT '0',
  `amount` varchar(20) DEFAULT NULL,
  `person_id` int(10) unsigned NOT NULL DEFAULT '0',
  `begin_time_rent` datetime DEFAULT NULL,
  `time_return` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `auto`
--

INSERT INTO `auto` (`id`, `type`, `number`, `mark_id`, `price_id`, `class`, `body`, `transmission`, `color_id`, `amount`, `person_id`, `begin_time_rent`, `time_return`) VALUES
(1, 'auto', 'XA 5654 XI', 0, 0, '', '', '', 0, '1,4', 0, NULL, NULL),
(2, 'auto', 'XA 5834 XI', 0, 0, '', '', '', 0, '1,4', 0, NULL, NULL),
(3, 'auto', 'XA 0001 XA', 0, 0, '', '', '', 0, '1,8', 0, NULL, NULL),
(4, 'auto', 'N4SPD', 0, 0, '', '', '', 0, '2.0', 0, NULL, NULL),
(5, 'auto', 'LOVEKITTY', 0, 0, '', '', '', 0, '5.0', 0, NULL, NULL),
(6, 'auto', '6548 yt', 23, 24, 'D', 'Sedan', 'mechanic', 6, '1.1', 0, NULL, NULL),
(7, 'moto', '5555', 23, 25, '-', 'Sport Bike', 'mechanic', 4, '500 cm3', 0, NULL, NULL),
(8, 'moto', '5555', 23, 25, '-', 'Sport Bike', 'mechanic', 4, '500 cm3', 0, NULL, NULL),
(9, 'auto', '1267', 24, 26, 'A', 'Sedan', 'mechanic', 1, '1', 0, NULL, NULL),
(10, 'moto', 'XA 2222 XI', 25, 27, '-', 'Chopper', 'mechanic', 8, '250 cm3', 0, NULL, NULL),
(11, 'auto', 'XI 3181 XA', 26, 28, 'E', 'Jeep', 'automatic', 3, '8', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `color`
--

CREATE TABLE IF NOT EXISTS `color` (
  `id` int(10) unsigned NOT NULL,
  `color` varchar(64) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `color`
--

INSERT INTO `color` (`id`, `color`) VALUES
(1, 'red'),
(2, 'blue'),
(3, 'black'),
(4, 'white'),
(5, 'green'),
(6, 'yellow'),
(7, 'gray'),
(8, 'purple');

-- --------------------------------------------------------

--
-- Структура таблицы `mark`
--

CREATE TABLE IF NOT EXISTS `mark` (
  `id` int(10) unsigned NOT NULL,
  `mark` varchar(64) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `mark`
--

INSERT INTO `mark` (`id`, `mark`) VALUES
(1, 'BMW'),
(2, 'Audi'),
(3, 'Honda'),
(4, 'mark'),
(5, 'Ford'),
(6, 'atitle'),
(7, 'Mercedes'),
(8, 'trololo'),
(9, '111'),
(10, '888'),
(20, '12'),
(21, '666'),
(22, 'ffffffffff'),
(23, 'aaaaaaaaa'),
(24, 'Tata'),
(25, 'Java'),
(26, 'Subaru');

-- --------------------------------------------------------

--
-- Структура таблицы `person`
--

CREATE TABLE IF NOT EXISTS `person` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(64) DEFAULT NULL,
  `father_name` varchar(64) DEFAULT NULL,
  `surname` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `price`
--

CREATE TABLE IF NOT EXISTS `price` (
  `id` int(10) unsigned NOT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `price`
--

INSERT INTO `price` (`id`, `price`) VALUES
(1, '434.00'),
(2, '888.00'),
(3, '345.00'),
(4, '456.00'),
(5, '333.00'),
(6, '45.75'),
(7, '111.00'),
(8, '111.00'),
(9, '22.22'),
(10, '22.22'),
(20, '12.12'),
(21, '155.00'),
(22, '21.00'),
(23, '14.10'),
(24, '14.12'),
(25, '432.00'),
(26, '12.35'),
(27, '7.56'),
(28, '12.13');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `auto`
--
ALTER TABLE `auto`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `mark`
--
ALTER TABLE `mark`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `price`
--
ALTER TABLE `price`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `auto`
--
ALTER TABLE `auto`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT для таблицы `color`
--
ALTER TABLE `color`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `mark`
--
ALTER TABLE `mark`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT для таблицы `person`
--
ALTER TABLE `person`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `price`
--
ALTER TABLE `price`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
