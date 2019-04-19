-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 19 2019 г., 22:07
-- Версия сервера: 5.5.53
-- Версия PHP: 5.6.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `goszakupki`
--

-- --------------------------------------------------------

--
-- Структура таблицы `auction`
--

CREATE TABLE `auction` (
  `id` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_provider` int(11) NOT NULL,
  `id_contract` int(11) NOT NULL,
  `price` double NOT NULL,
  `date` date NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `id_sender` int(11) NOT NULL,
  `id_ recipient` int(11) NOT NULL,
  `message` text NOT NULL,
  `date` date NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `contract`
--

CREATE TABLE `contract` (
  `id` int(11) NOT NULL,
  `max_price` double NOT NULL,
  `valuta` varchar(255) NOT NULL,
  `date_start` date NOT NULL,
  `object_zakupki` varchar(255) NOT NULL,
  `date_end` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `orgs`
--

CREATE TABLE `orgs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `ogrn` varchar(255) NOT NULL,
  `inn` varchar(255) NOT NULL,
  `kpp` varchar(255) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `data_reg` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `ur_face`
--

CREATE TABLE `ur_face` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `full_title` varchar(255) NOT NULL,
  `director_name` varchar(255) NOT NULL,
  `ogrn` varchar(255) NOT NULL,
  `inn` varchar(255) NOT NULL,
  `kpp` varchar(255) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `date_reg` date NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ur_face`
--

INSERT INTO `ur_face` (`id`, `id_user`, `title`, `full_title`, `director_name`, `ogrn`, `inn`, `kpp`, `adress`, `phone`, `date_reg`, `email`) VALUES
(0, 6, 'priv', 'privet', '', 'ogrn', 'inn', 'kpp', 'asad@wd', '0', '2019-04-19', 'addr@list.ru');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fio` varchar(255) NOT NULL,
  `inn` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_reg` date NOT NULL,
  `rnp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `fio`, `inn`, `phone`, `type`, `email`, `password`, `date_reg`, `rnp`) VALUES
(1, 'Крейдо Игорь Витальевич', '21321321632142', '', '', 'autodesk@list.ru', '', '2019-04-19', 0),
(2, 'jzh f difj sd hf ', '82327647253465', '', 'fizFace', 'ksjdshfkjask@jdkjf.ru', '', '2019-04-19', 0),
(3, 'Крейдо Игорь Витальевич', '', '', 'urFace', 'asadsad@mail.ru', '', '2019-04-19', 0),
(4, 'Крейдо Игорь Витальевич', '', '', 'urFace', 'addr@list.ru', '', '2019-04-19', 0),
(5, 'tom', '', '', 'urFace', 'addr@list.ru', '', '2019-04-19', 0),
(6, 'mery', 'inn', '', 'urFace', 'addr@list.ru', '', '2019-04-19', 0),
(7, 'polly', 'inn', '23345', 'urFace', 'autodesk@list.ru', '', '2019-04-19', 0),
(8, 'jhkjhkjhkj', '8937579', '', 'fizFace', 'jkhkjhjk@kjlk', '', '2019-04-19', 0),
(9, 'jhkjhdsjh kjh kjhk ', '8767686', '', 'fizFace', 'lkjsdf@lkjl', '', '2019-04-19', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `auction`
--
ALTER TABLE `auction`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `contract`
--
ALTER TABLE `contract`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orgs`
--
ALTER TABLE `orgs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ur_face`
--
ALTER TABLE `ur_face`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `auction`
--
ALTER TABLE `auction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `contract`
--
ALTER TABLE `contract`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `orgs`
--
ALTER TABLE `orgs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
