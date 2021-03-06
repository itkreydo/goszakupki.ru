-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 26 2019 г., 11:07
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
-- Структура таблицы `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `fio` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `admin`
--

INSERT INTO `admin` (`id`, `fio`, `login`, `password`) VALUES
(1, 'Порошин Леонид Аркадьевич', 'lenya', '123');

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
  `id_order` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `message` text NOT NULL,
  `date` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `sender` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `chat`
--

INSERT INTO `chat` (`id`, `id_order`, `id_user`, `message`, `date`, `status`, `sender`) VALUES
(1, 1, 1, 'Сообщение какое-то', '2019-04-26', '0', '1');

-- --------------------------------------------------------

--
-- Структура таблицы `contract`
--

CREATE TABLE `contract` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `contract`
--

INSERT INTO `contract` (`id`, `id_user`, `id_order`, `price`, `date`) VALUES
(1, 1, 1, 140000, '2019-04-25 23:06:21'),
(2, 2, 1, 120000, '2019-04-25 23:09:17');

-- --------------------------------------------------------

--
-- Структура таблицы `gosorder`
--

CREATE TABLE `gosorder` (
  `id` int(11) NOT NULL,
  `id_org` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `max_price` double NOT NULL,
  `valuta` varchar(255) NOT NULL,
  `date_start` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `object_zakupki` varchar(255) NOT NULL,
  `date_end` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Дамп данных таблицы `gosorder`
--

INSERT INTO `gosorder` (`id`, `id_org`, `title`, `description`, `max_price`, `valuta`, `date_start`, `object_zakupki`, `date_end`) VALUES
(1, 1, 'Закпка мотобайков', 'Закупить мотобайки на праздник 9 мая', 450000, 'RUB', '2019-04-24 21:00:00', '', '2019-04-29 21:00:00'),
(2, 1, 'Сайт для госзакупок', 'Необходимо создать крутой сайт госзакупок, чтобы авторизироваться через qr cod', 300000, 'RUB', '2019-04-25 22:13:18', '', '2019-05-05 21:00:00'),
(3, 1, 'Название', 'Описание', 130000, 'RUB', '2019-04-25 22:19:45', '', '2019-04-29 21:00:00');

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
  `data_reg` date NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orgs`
--

INSERT INTO `orgs` (`id`, `title`, `ogrn`, `inn`, `kpp`, `adress`, `phone`, `email`, `data_reg`, `password`) VALUES
(1, 'АКЦИОНЕРНОЕ ОБЩЕСТВО \"ЧУКОТЭНЕРГО\"', '23423423432', '123', '348763287436', 'Адрес', '89733478834', 'chukotenergo@mail.ru', '2019-04-25', '12345');

-- --------------------------------------------------------

--
-- Структура таблицы `rnp`
--

CREATE TABLE `rnp` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `reason` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `rnp`
--

INSERT INTO `rnp` (`id`, `id_user`, `date_start`, `date_end`, `reason`) VALUES
(1, 13, '2019-04-20', '2019-05-31', 'Просто так'),
(2, 1, '2019-04-20', '2019-04-30', 'Причина 2'),
(3, 14, '2019-04-20', '2025-04-18', 'Невыполнены требования');

-- --------------------------------------------------------

--
-- Структура таблицы `support`
--

CREATE TABLE `support` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `support`
--

INSERT INTO `support` (`id`, `id_user`, `id_admin`, `reason`, `date_created`, `status`) VALUES
(1, 1, 1, 'Не работает сайт, пропали данные', '2019-06-29 21:00:00', 0),
(2, 1, 1, 'kljkljlk', '2019-04-26 07:05:51', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `support_chat`
--

CREATE TABLE `support_chat` (
  `id` int(11) NOT NULL,
  `sender` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_support` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `support_chat`
--

INSERT INTO `support_chat` (`id`, `sender`, `text`, `date`, `id_support`) VALUES
(1, '1', 'Ничего не работает, помогите!', '2019-07-30 21:00:00', 1),
(2, '1', 'А темерь ячто-то нажал и всё сломалось, как подать заявку на гос заказ??', '2019-11-29 21:00:00', 1),
(3, '0', 'sdasd', '2019-04-26 06:37:52', 1),
(4, '1', 'lkjlk            ', '2019-04-26 07:05:51', 2),
(5, '1', 'чяячсчяс', '2019-04-26 07:28:54', 2);

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
  `rnp` int(11) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `fio`, `inn`, `phone`, `type`, `email`, `password`, `date_reg`, `rnp`, `token`) VALUES
(1, 'Крейдо Игорь Витальевич', '823276472', '', '', 'autodesk@list.ru', '9yqKX26ZJU', '2019-04-19', 0, ''),
(2, 'jzh f difj sd hf ', '82327647253465', '', 'fizFace', 'ksjdshfkjask@jdkjf.ru', '', '2019-04-19', 0, ''),
(3, 'Крейдо Игорь Витальевич', '', '', 'urFace', 'asadsad@mail.ru', '', '2019-04-19', 0, ''),
(4, 'Крейдо Игорь Витальевич', '', '', 'urFace', 'addr@list.ru', '', '2019-04-19', 0, ''),
(5, 'tom', '', '', 'urFace', 'addr@list.ru', '', '2019-04-19', 0, ''),
(6, 'mery', 'inn', '', 'urFace', 'addr@list.ru', '', '2019-04-19', 0, ''),
(7, 'polly', 'inn', '23345', 'urFace', 'autodesk@list.ru', '', '2019-04-19', 0, ''),
(8, 'jhkjhkjhkj', '8937579', '', 'fizFace', 'jkhkjhjk@kjlk', '', '2019-04-19', 0, ''),
(9, 'jhkjhdsjh kjh kjhk ', '8767686', '', 'fizFace', 'lkjsdf@lkjl', '', '2019-04-19', 0, ''),
(10, '123', '123', '', 'fizFace', 'autodesk@list.ru', '', '2019-04-19', 0, ''),
(11, 'hello', '12345', '', 'fizFace', 'autodesk@list.ru', 'LQtANKyevT', '2019-04-19', 0, ''),
(12, 'Шадрин Дмитрий Андреевич', '55', '', 'fizFace', 'shadrindmitry1337@gmail.com', 'zaMwrcJyZt', '2019-04-20', 0, 'b43d44bc65312efd819a3252c7304d34'),
(13, 'Шадрин Дмитрий Андреевич', '777', '', 'fizFace', 'shadrindmitry1337@gmail.com', 'djGIH57i6O', '2019-04-20', 0, '1'),
(14, 'Гарифуллина Венера', '12345555', '', 'fizFace', 'venera060698@yandex.ru', '6zkJHPFTth', '2019-04-20', 0, '1');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

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
-- Индексы таблицы `gosorder`
--
ALTER TABLE `gosorder`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orgs`
--
ALTER TABLE `orgs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `rnp`
--
ALTER TABLE `rnp`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `support_chat`
--
ALTER TABLE `support_chat`
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
-- AUTO_INCREMENT для таблицы `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `auction`
--
ALTER TABLE `auction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `contract`
--
ALTER TABLE `contract`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `gosorder`
--
ALTER TABLE `gosorder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `orgs`
--
ALTER TABLE `orgs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `rnp`
--
ALTER TABLE `rnp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `support`
--
ALTER TABLE `support`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `support_chat`
--
ALTER TABLE `support_chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
