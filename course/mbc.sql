-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Час створення: Гру 17 2021 р., 08:14
-- Версія сервера: 10.4.22-MariaDB
-- Версія PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `mbc`
--
CREATE DATABASE IF NOT EXISTS `mbc` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `mbc`;

-- --------------------------------------------------------

--
-- Структура таблиці `articles_tb`
--

CREATE TABLE `articles_tb` (
  `artc_def` varchar(1000) NOT NULL,
  `artc_code` int(10) NOT NULL,
  `artc_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп даних таблиці `articles_tb`
--

INSERT INTO `articles_tb` (`artc_def`, `artc_code`, `artc_id`) VALUES
('Завдання Кодексу України про адміністративні правопорушення', 1, 5),
('Законодавство України про адміністративні правопорушення', 2, 6),
('Повноваження місцевих рад щодо прийняття рішень, за порушення яких передбачається адміністративна відповідальність', 5, 7),
('Запобігання адміністративним правопорушенням', 6, 8),
('Забезпечення законності при застосуванні заходів впливу за адміністративні правопорушення', 7, 9),
('Попередження', 26, 10),
('Штраф', 27, 11),
('Позбавлення спеціального права, позбавлення права обіймати певні посади або займатися певною діяльністю', 30, 12),
('Виправні роботи', 31, 13),
('Адміністративний арешт', 32, 14);

-- --------------------------------------------------------

--
-- Структура таблиці `employees`
--

CREATE TABLE `employees` (
  `emp_pip` varchar(1000) NOT NULL,
  `emp_age` varchar(1000) NOT NULL,
  `emp_sex` varchar(1000) NOT NULL,
  `emp_address` varchar(1000) NOT NULL,
  `emp_phone` varchar(1000) NOT NULL,
  `emp_passport` varchar(1000) NOT NULL,
  `emp_posit` varchar(1000) NOT NULL,
  `emp_rank` varchar(1000) NOT NULL,
  `emp_code` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп даних таблиці `employees`
--

INSERT INTO `employees` (`emp_pip`, `emp_age`, `emp_sex`, `emp_address`, `emp_phone`, `emp_passport`, `emp_posit`, `emp_rank`, `emp_code`) VALUES
('Юрчишин П.В.', '48', 'Чоловік', 'м. Тернопіль', '+380987563785', '0976438609', 'Поліцейський органу поліції охорони', 'Інспектор', 2),
('Білозір М.І.', '35', 'Чоловік', 'м. Тернопіль', '+380679362583', '7302725484', 'Інспектор підрозділу дізнання', 'Старший інспектор', 3),
('Демченко С.О.', '34', 'Чоловік', 'м. Тернопіль', '+380679362532', '73027255362', 'Дільничний офіцер поліції', 'Інспектор', 4),
('Яковенко Є.І.', '56', 'Жінка', 'м. Львів', '+380679658932', '0973527849', 'Дільничний офіцер поліції', 'Старший інспектор', 5);

-- --------------------------------------------------------

--
-- Структура таблиці `offender`
--

CREATE TABLE `offender` (
  `off_code` int(10) NOT NULL,
  `off_pip` varchar(1000) NOT NULL,
  `off_birth` varchar(1000) NOT NULL,
  `off_sex` varchar(1000) NOT NULL,
  `off_address` varchar(1000) NOT NULL,
  `victim_code` int(10) NOT NULL,
  `emp_code` int(10) NOT NULL,
  `articlee` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп даних таблиці `offender`
--

INSERT INTO `offender` (`off_code`, `off_pip`, `off_birth`, `off_sex`, `off_address`, `victim_code`, `emp_code`, `articlee`) VALUES
(3, 'Березін М.Ю.', '18.12.1983', 'Чоловік', 'м. Тернопіль', 2, 2, 12),
(4, 'Мовчан О.В.', '05.06.1999', 'Жінка', 'м. Тернопіль', 3, 3, 13),
(5, 'Рябуха Т.В.', '13.11.1987', 'Жінка', 'м. Харків', 4, 4, 11),
(6, 'Чайківський І.А.', '11.11.1997', 'Чоловік', 'м. Тернопіль', 5, 5, 10);

-- --------------------------------------------------------

--
-- Структура таблиці `victims`
--

CREATE TABLE `victims` (
  `victim_code` int(10) NOT NULL,
  `vic_pip` varchar(11) NOT NULL,
  `vic_birth` varchar(1000) NOT NULL,
  `vic_sex` varchar(1000) NOT NULL,
  `vic_address` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп даних таблиці `victims`
--

INSERT INTO `victims` (`victim_code`, `vic_pip`, `vic_birth`, `vic_sex`, `vic_address`) VALUES
(2, 'Драбовський', '27.11.2021', 'Чоловік', 'м. Тернопіль'),
(3, 'Борзова І.Н', '18.12.1998', 'Жінка', 'м. Тернопіль'),
(4, 'Кучер М.І.', '09.09.1999', 'Чоловік', 'м. Тернопіль');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `articles_tb`
--
ALTER TABLE `articles_tb`
  ADD PRIMARY KEY (`artc_id`);

--
-- Індекси таблиці `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`emp_code`);

--
-- Індекси таблиці `offender`
--
ALTER TABLE `offender`
  ADD PRIMARY KEY (`off_code`);

--
-- Індекси таблиці `victims`
--
ALTER TABLE `victims`
  ADD PRIMARY KEY (`victim_code`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `articles_tb`
--
ALTER TABLE `articles_tb`
  MODIFY `artc_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблиці `employees`
--
ALTER TABLE `employees`
  MODIFY `emp_code` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблиці `offender`
--
ALTER TABLE `offender`
  MODIFY `off_code` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблиці `victims`
--
ALTER TABLE `victims`
  MODIFY `victim_code` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
