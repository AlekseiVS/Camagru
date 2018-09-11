-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Сен 11 2018 г., 07:40
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

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `comment`, `user_name`, `id_img`) VALUES
(24, '', 'aaa', 12),
(25, 'vdvdf', 'aaa', 12),
(26, 'df df', 'aaa', 12),
(27, 'das', 'aaa', 12),
(28, 'sdcdsc', 'aaa', 16),
(29, '', 'aaa', 16),
(30, 'asxa', 'aaa', 16),
(31, '', 'aaa', 16),
(32, '', 'aaa', 16),
(33, 'gdf', 'aaa', 16),
(34, 'vdfvdf', 'aaa', 16),
(35, 'vdfvdf', 'aaa', 16),
(36, 'xasxas', 'aaa', 16),
(37, 'hfghfghgf', 'aaa', 17),
(38, 'cds', 'aaa', 17),
(39, 'cdscds', 'aaa', 17),
(40, '', 'aaa', 17),
(41, 'cdsc', 'aaa', 17),
(42, 'vdf', 'aaa', 17),
(43, '.kl.k', 'aaa', 16),
(44, '', 'aaa', 12),
(45, '', 'aaa', 17),
(46, 'cdscds', 'alex', 12),
(47, 'trhrthtr', 'alex', 12),
(48, '', 'alex', 12),
(49, '', 'alex', 12),
(50, '', 'alex', 12),
(51, '', 'alex', 12),
(52, '', 'alex', 12),
(53, 'bjhvhjhjbjk', 'Pavlo', 23),
(54, '', 'Pavlo', 23),
(55, 'fvdsfvds', 'alex', 22),
(56, ' hhmn', 'alex', 21),
(57, '', 'alex', 21),
(58, '', 'alex', 21),
(59, '', 'alex', 22),
(60, '', 'alex', 21),
(61, '', 'alex', 21),
(65, '', 'alex', 22),
(69, '', 'alex', 74),
(70, '', 'alex', 74),
(71, '', 'alex', 74);

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
(82, 'template/image/1536661316.png', 148, '2018-09-11 03:21:56'),
(84, 'template/image/1536661329.png', 148, '2018-09-11 03:22:09'),
(85, 'template/image/1536661347.png', 148, '2018-09-11 03:22:27'),
(86, 'template/image/1536661467.png', 148, '2018-09-11 03:24:27'),
(89, 'template/image/1536668429.png', 149, '2018-09-11 05:20:29'),
(90, 'template/image/1536669168.png', 149, '2018-09-11 05:32:48'),
(91, 'template/image/1536669190.png', 149, '2018-09-11 05:33:10'),
(92, 'template/image/1536669191.png', 149, '2018-09-11 05:33:11'),
(93, 'template/image/1536669193.png', 149, '2018-09-11 05:33:13'),
(94, 'template/image/1536676284.png', 148, '2018-09-11 07:31:24'),
(95, 'template/image/1536676301.png', 148, '2018-09-11 07:31:41');

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
(321, 23, 149),
(324, 21, 149),
(340, 23, 148),
(345, 21, 148),
(361, 23, 151),
(362, 22, 151),
(363, 36, 151),
(364, 49, 151),
(370, 36, 148),
(377, 55, 148),
(380, 22, 148),
(382, 59, 148),
(389, 74, 148),
(391, 70, 148),
(392, 84, 148),
(393, 85, 148),
(396, 85, 149),
(397, 86, 149),
(398, 89, 149),
(399, 90, 149),
(400, 86, 148);

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
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `token`, `status`) VALUES
(148, 'alex', 'sokoliuk.av@gmail.com', '123456', 'IEUQOWR', 1),
(149, 'aaa', 'a0950959304@gmail.com', '123456', 'RYPWOTU', 1),
(150, 'Pavlo', 'qaptymoshenko@gmail.com', 'Pawell 20021988', 'YITEROU', 1),
(151, 'dida', '5773480@gmail.com', '5956861', 'IEUYWRP', 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT для таблицы `img`
--
ALTER TABLE `img`
  MODIFY `id_img` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT для таблицы `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=401;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
