-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Ноя 13 2013 г., 10:10
-- Версия сервера: 5.5.34
-- Версия PHP: 5.3.10-1ubuntu3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `blog`
--

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_category`
--

CREATE TABLE IF NOT EXISTS `tbl_category` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `description` varchar(256) NOT NULL,
  `parent_cat_id` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_category_id` (`parent_cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_comment`
--

CREATE TABLE IF NOT EXISTS `tbl_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `create_time` int(11) DEFAULT NULL,
  `author` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `post_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_comment_post` (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `tbl_comment`
--

INSERT INTO `tbl_comment` (`id`, `content`, `status`, `create_time`, `author`, `email`, `url`, `post_id`) VALUES
(1, 'This is a test comment.', 2, 1230952187, 'Tester', 'tester@example.com', NULL, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_lookup`
--

CREATE TABLE IF NOT EXISTS `tbl_lookup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `code` int(11) NOT NULL,
  `type` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `position` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `tbl_lookup`
--

INSERT INTO `tbl_lookup` (`id`, `name`, `code`, `type`, `position`) VALUES
(1, 'Draft', 1, 'PostStatus', 1),
(2, 'Published', 2, 'PostStatus', 2),
(3, 'Archived', 3, 'PostStatus', 3),
(4, 'Pending Approval', 1, 'CommentStatus', 1),
(5, 'Approved', 2, 'CommentStatus', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_post`
--

CREATE TABLE IF NOT EXISTS `tbl_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `tags` text COLLATE utf8_unicode_ci,
  `status` int(11) NOT NULL,
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `author_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_post_author` (`author_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `tbl_post`
--

INSERT INTO `tbl_post` (`id`, `title`, `content`, `tags`, `status`, `create_time`, `update_time`, `author_id`) VALUES
(1, 'Welcome!', 'This blog system is developed using Yii. It is meant to demonstrate how to use Yii to build a complete real-world application. Complete source code may be found in the Yii releases.\n\nFeel free to try this system by writing new posts and posting comments.', 'yii, blog', 2, 1230952187, 1230952187, 1),
(2, 'A Test Post', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'test', 2, 1230952187, 1230952187, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_tag`
--

CREATE TABLE IF NOT EXISTS `tbl_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `frequency` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `tbl_tag`
--

INSERT INTO `tbl_tag` (`id`, `name`, `frequency`) VALUES
(1, 'yii', 1),
(2, 'blog', 1),
(3, 'test', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `profile` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `email`, `profile`) VALUES
(1, 'demo', '$2a$10$JTJf6/XqC94rrOtzuF397OHa4mbmZrVTBOQCmYD9U.obZRUut4BoC', 'webmaster@example.com', NULL);

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD CONSTRAINT `FK_comment_post` FOREIGN KEY (`post_id`) REFERENCES `tbl_post` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD CONSTRAINT `FK_post_author` FOREIGN KEY (`author_id`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
