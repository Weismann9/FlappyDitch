-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 09 2018 г., 22:28
-- Версия сервера: 5.6.38
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `FlappyDitch`
--

-- --------------------------------------------------------

--
-- Структура таблицы `scores`
--

CREATE TABLE `scores` (
  `IdScore` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `Score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `scores`
--

INSERT INTO `scores` (`IdScore`, `UserId`, `Score`) VALUES
(6, 32, 2),
(7, 32, 2),
(8, 32, 2),
(9, 32, 8),
(10, 32, 8),
(11, 32, 8),
(12, 32, 10),
(18, 33, 0),
(19, 33, 0),
(20, 33, 0),
(21, 33, 2),
(22, 33, 0),
(23, 33, 0),
(24, 33, 6),
(25, 33, 8),
(26, 33, 10),
(27, 35, 1),
(28, 36, 5),
(29, 34, 0),
(30, 34, 0),
(31, 34, 0),
(32, 34, 3),
(33, 35, 2),
(34, 35, 3),
(35, 35, 4),
(36, 41, 0),
(37, 41, 4),
(38, 42, 1),
(39, 42, 2),
(40, 42, 19);

-- --------------------------------------------------------

--
-- Структура таблицы `User`
--

CREATE TABLE `User` (
  `Id` int(11) NOT NULL,
  `Login` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `User`
--

INSERT INTO `User` (`Id`, `Login`, `Password`) VALUES
(31, 'first', '11'),
(32, 'second', '2'),
(33, '1', '1'),
(34, '2', '2'),
(35, '3', '3'),
(36, '4', '4'),
(37, '5', '5'),
(38, '6', '6'),
(39, '7', '7'),
(40, '11', '11'),
(41, '22', '22'),
(42, '33', '33');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`IdScore`),
  ADD KEY `UserId` (`UserId`);

--
-- Индексы таблицы `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `scores`
--
ALTER TABLE `scores`
  MODIFY `IdScore` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT для таблицы `User`
--
ALTER TABLE `User`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `scores`
--
ALTER TABLE `scores`
  ADD CONSTRAINT `scores_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `User` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
