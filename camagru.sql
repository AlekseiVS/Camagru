-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Сен 18 2018 г., 02:07
-- Версия сервера: 5.7.23
-- Версия PHP: 7.1.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `camagru`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment` varchar(100) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `id_img` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `img`
--

CREATE TABLE `img` (
  `id_img` int(11) NOT NULL,
  `src_img` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `img`
--

INSERT INTO `img` (`id_img`, `src_img`, `id_user`, `date`) VALUES
(168, 'template/image/1537192695.png', 180, '2018-09-17 06:58:15'),
(170, 'template/image/1537192699.png', 180, '2018-09-17 06:58:19'),
(171, 'template/image/1537193028.png', 181, '2018-09-17 07:03:48'),
(172, 'template/image/1537193031.png', 181, '2018-09-17 07:03:51'),
(173, 'template/image/1537193034.png', 181, '2018-09-17 07:03:54'),
(174, 'template/image/1537256613.png', 180, '2018-09-18 00:43:33'),
(175, 'template/image/1537257473.png', 180, '2018-09-18 00:57:53'),
(186, 'template/image/1537258090.png', 180, '2018-09-18 01:08:10'),
(187, 'template/image/1537258353.png', 180, '2018-09-18 01:12:33'),
(188, 'template/image/1537258678.png', 180, '2018-09-18 01:17:58'),
(191, 'template/image/1537259047.png', 180, '2018-09-18 01:24:07'),
(192, 'template/image/1537259312.png', 180, '2018-09-18 01:28:32'),
(193, 'template/image/1537259789.png', 180, '2018-09-18 01:36:29'),
(196, 'template/image/1537260179.png', 180, '2018-09-18 01:42:59'),
(197, 'template/image/1537260373.png', 180, '2018-09-18 01:46:13');

-- --------------------------------------------------------

--
-- Структура таблицы `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `id_img` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `likes`
--

INSERT INTO `likes` (`id`, `id_img`, `id_user`) VALUES
(3, 167, 181),
(4, 168, 181),
(6, 172, 180),
(7, 171, 180),
(8, 169, 181),
(10, 168, 180);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `token` varchar(10) NOT NULL,
  `status` int(11) NOT NULL,
  `message` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `token`, `status`, `message`) VALUES
(180, 'Alex', 'sokoliuk.av@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'QPRIOEU', 1, 0),
(181, 'Alexey', 'a0950959304@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'QUERWIT', 1, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `img`
--
ALTER TABLE `img`
  ADD PRIMARY KEY (`id_img`);

--
-- Индексы таблицы `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `token` (`token`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `img`
--
ALTER TABLE `img`
  MODIFY `id_img` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=198;

--
-- AUTO_INCREMENT для таблицы `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=182;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
