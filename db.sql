-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Авг 16 2013 г., 00:43
-- Версия сервера: 5.5.30
-- Версия PHP: 5.4.4-14

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `books`
--

-- --------------------------------------------------------

--
-- Структура таблицы `authors`
--

CREATE TABLE IF NOT EXISTS `authors` (
  `id_author` int(8) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(40) DEFAULT NULL,
  `lastName` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id_author`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Дамп данных таблицы `authors`
--

INSERT INTO `authors` (`id_author`, `firstName`, `lastName`) VALUES
(1, 'Айн', 'Рейд'),
(2, 'Архимандрит', 'Тихон'),
(3, 'Эва', 'Хансен'),
(4, 'Макс', 'Фрай'),
(5, 'Ник', 'Вуйчич'),
(6, 'Виктор', 'Пелевин'),
(7, 'Стивен', 'Кинг'),
(8, 'Дэвид', 'Робертс');

-- --------------------------------------------------------

--
-- Структура таблицы `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `ISBN` int(8) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `image` mediumblob,
  PRIMARY KEY (`ISBN`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Триггеры `books`
--
DROP TRIGGER IF EXISTS `delbook`;
DELIMITER //
CREATE TRIGGER `delbook` BEFORE DELETE ON `books`
 FOR EACH ROW BEGIN
   		DELETE FROM books_author WHERE OLD.ISBN = ISBN;
   		DELETE FROM books_genre WHERE OLD.ISBN = ISBN;
    END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Структура таблицы `books_author`
--

CREATE TABLE IF NOT EXISTS `books_author` (
  `ISBN` int(8) DEFAULT NULL,
  `id_author` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Структура таблицы `books_genre`
--

CREATE TABLE IF NOT EXISTS `books_genre` (
  `ISBN` int(8) DEFAULT NULL,
  `id_genre` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Структура таблицы `genres`
--

CREATE TABLE IF NOT EXISTS `genres` (
  `id_genre` tinyint(2) NOT NULL AUTO_INCREMENT,
  `title` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id_genre`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Дамп данных таблицы `genres`
--

INSERT INTO `genres` (`id_genre`, `title`) VALUES
(1, 'Фантастика'),
(2, 'Детектив'),
(3, 'Исторический роман'),
(4, 'Проза'),
(5, 'Поэзия'),
(6, 'Биографии'),
(7, 'Любовные романы'),
(8, 'Афоризмы'),
(9, 'Комиксы');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
