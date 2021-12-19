-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Дек 18 2021 г., 22:19
-- Версия сервера: 5.5.25
-- Версия PHP: 5.2.12

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `searchdekanat`
--

-- --------------------------------------------------------

--
-- Структура таблицы `1_fakultet`
--

CREATE TABLE IF NOT EXISTS `1_fakultet` (
  `Id_Fak` char(10) NOT NULL,
  `Fak_Name` char(80) NOT NULL,
  `Fak_Chief` char(80) NOT NULL,
  `Fak_Location` char(40) NOT NULL,
  `Fak_Phone` char(40) NOT NULL,
  `Fak_Email` char(60) NOT NULL,
  `Fak_Time` char(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED COMMENT='Vse Depart';

--
-- Дамп данных таблицы `1_fakultet`
--

INSERT INTO `1_fakultet` (`Id_Fak`, `Fak_Name`, `Fak_Chief`, `Fak_Location`, `Fak_Phone`, `Fak_Email`, `Fak_Time`) VALUES
('01', 'ФУПМ', 'Александров Александр Сергеевич', 'ул. Янгеля, 16, Долгопрудный', '+7 (909) 458-75-47', 'asbng@mail.ru', '8-14'),
('02', 'ФАКИ', 'Цукерман Абрам Семенович', 'ул.Первомайская, 9, Долгопрудный', '+7 (909) 458-75-47', 'Arstor-dortsb-short@mail.ru', '8-14'),
('03', 'ФОПФ', 'Файнзильберг Иосиф Абрамович', '3-й кв-л, 27, Долгопрудный', '+7 (917) 458-75-47', 'rtynfd@mail.ru', '8-18');

-- --------------------------------------------------------

--
-- Структура таблицы `2_kafedry`
--

CREATE TABLE IF NOT EXISTS `2_kafedry` (
  `Id_Kaf` char(10) NOT NULL,
  `Kaf_Name` char(80) NOT NULL,
  `Kaf_Zav` char(80) NOT NULL,
  `Kaf_Location` char(40) NOT NULL,
  `Kaf_Phone` char(40) NOT NULL,
  `Kaf_Email` char(60) NOT NULL,
  `Kaf_Time` char(50) NOT NULL,
  `Id_Fak` char(10) DEFAULT NULL,
  PRIMARY KEY (`Id_Kaf`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED COMMENT='All products\r\n';

--
-- Дамп данных таблицы `2_kafedry`
--

INSERT INTO `2_kafedry` (`Id_Kaf`, `Kaf_Name`, `Kaf_Zav`, `Kaf_Location`, `Kaf_Phone`, `Kaf_Email`, `Kaf_Time`, `Id_Fak`) VALUES
('21', 'Прикладной математики', 'Иванов Иван Иванович', 'корп 1, ком 225', '+7 (909) 458-75-47', 'Ivan@mail.ru', '8-22', '01'),
('22', 'Информационных технологий', 'Петров Петр Петрович', 'корп 1, ком 226', '+7 (917) 458-75-47', 'Petr@mail.ru', '8-16', '01'),
('23', 'Компьютерной техники', 'Сидоров Сидор Сидорович', 'корп 1, ком 227', '+7 (909) 458-75-47', 'Sidor@mail.ru', '8-20', '02'),
('24', 'Автоматизированных систем', 'Сазонов Сазон Сазонович', 'корп 1, ком 2238', '+7 (909) 458-75-47', 'Sazon@mail.ru', '8-18', '02');

-- --------------------------------------------------------

--
-- Структура таблицы `3_students`
--

CREATE TABLE IF NOT EXISTS `3_students` (
  `Id_Stud` char(10) NOT NULL,
  `Stud_Pass` char(10) NOT NULL,
  `Stud_FIO` char(180) NOT NULL,
  `Stud_Group` char(20) NOT NULL,
  `Stud_Address` char(80) NOT NULL,
  `Stud_Phone` char(20) NOT NULL,
  `Stud_Email` char(80) NOT NULL,
  PRIMARY KEY (`Id_Stud`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED COMMENT='All Clients';

--
-- Дамп данных таблицы `3_students`
--

INSERT INTO `3_students` (`Id_Stud`, `Stud_Pass`, `Stud_FIO`, `Stud_Group`, `Stud_Address`, `Stud_Phone`, `Stud_Email`) VALUES
('1000000001', 'stud000002', 'Больновcкая Евгения Михайловна', '011', 'Первомайск, Набережная химиков12, кв 99', '+7 (909) 458-75-47', 'alfortov@mail.ru'),
('1000000002', 'stud000001', 'Уристарпова Антонина Ивановна', '011', 'Зеленоград, Набережная Зеленоградская 12, кв 13', '+7 (909) 458-75-4790', 'aristarh@mail.ru'),
('1000000003', 'stud000003', 'Петрухин Владимир Андреевич', '012', 'Химкинск, Малая Беговая 34, кв.45', '+7 909) 458-75-47', 'simul96@mail.ru'),
('1000000004', 'stud000004', 'Козодоева Светлана Кузьминична', '021', 'Березовск, Большая Кутузовская 132, кв. 134', '+7 (909) 458-75-47', 'rjzlodoeva@mail.ru'),
('1000000005', 'stud000005', 'Иванова Ирина Петровна', '022', 'Белоглинск, Малая Беговая 3 , кв.455', '+7 (917) 458-75-47', 'rjzlodoeva@mail.ru'),
('1000000006', 'stud000006', 'Селезнева Ирина Петровна', '023', 'Красногородск, Проспект химиков12, кв 99', '+7 (917) 458-75-47', 'rjzlodoeva@mail.ru'),
('1000000007', 'stud000007', 'Казакова Ирина Николаевна', '024', 'Индустриальск, Индустриальная 112, кв 77', '+7 (909) 458-75-47', 'rjzlodoeva@mail.ru'),
('1000000008', 'stud000008', 'Казачкова Наталья Николаевна', '031', 'Белогорск, Каменщиков32, кв 69', '+7 (917) 458-75-47', 'rjzlodoeva@mail.ru'),
('1000000009', 'stud000009', 'Казарина Наталья Николаевна', '032', 'Синевальск, Челюскинцев 82, кв 79', '+7 (917) 458-75-4790', 'rjzlodoeva@mail.ru'),
('1000000012', 'stud000010', 'Аристархова Екатерина Ивановна', '011', 'Зеленоводск, Зеленоводская 12, кв 13', '+7 (909) 458-75-47', 'aristarh@mail.ru'),
('1000000013', 'stud000011', 'Аристов Владимир Иванович', '011', 'Зеленовск, Набережная Зеленовская 12, кв 13', '+7 (917) 458-75-47', 'aristarh@mail.ru'),
('1000000014', 'stud000012', 'Зубов Владимир Иванович', '012', 'Золотовск, Золотовская 12, кв 13', '+7 (917) 458-75-47', 'aristarh@mail.ru'),
('1000000015', 'stud000013', 'Дутов Евгений Иванович', '012', 'Зеленск-2, Автовокзальная 131, кв 13', '+7 (909) 458-75-47', 'aristarh@mail.ru'),
('AlexKold20', 'AlexKuban', 'Кубанский Александр Николаевич', '000', 'Кубанская набережная 123', '+7 (917) 458-75-47', 'alfort@list.ru'),
('IvanIvan', 'IvanIvan', 'Иванов Иван Иванович', '821', 'Задунайск, Задунайска 21', '+7(909) 852 93 21', 'ivan@mail.ru');

-- --------------------------------------------------------

--
-- Структура таблицы `4_groups`
--

CREATE TABLE IF NOT EXISTS `4_groups` (
  `Id_Gr` char(10) NOT NULL,
  `Id_Fak` char(80) DEFAULT NULL,
  `Gr_Special` char(80) DEFAULT NULL,
  `Gr_Chif` char(80) DEFAULT NULL,
  `Gr_Phone` char(40) DEFAULT NULL,
  `Gr_Email` char(80) DEFAULT NULL,
  `Gr_Number` char(80) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED;

--
-- Дамп данных таблицы `4_groups`
--

INSERT INTO `4_groups` (`Id_Gr`, `Id_Fak`, `Gr_Special`, `Gr_Chif`, `Gr_Phone`, `Gr_Email`, `Gr_Number`) VALUES
('011', 'ФУПМ', 'Численные методы', 'Больновcкая Евгения Михайловна', '+7 (909) 458-75-47', 'aristarh@mail.ru', 'Новое отделение'),
('012', 'ФУПМ', 'Веб-разработки', 'Петрухин Владимир Андреевич', '+7 (917) 458-75-47', 'aristarh@mail.ru', 'Новое отделение'),
('013', 'ФУПМ', 'Базы данных', 'Гонгадзе Петр Петрович', '+7 (909) 458-75-47', 'aristarh@mail.ru', 'Новое отделение'),
('021', 'ФАКИ', 'Динамика полета', 'Козодоева Светлана Кузьминична', '+7 (909) 458-75-47', 'aristarh@mail.ru', 'Новое отделение'),
('022', 'ФАКИ', 'Управление и телекоммуникации', 'Иванова Ирина Петровна', '+7 (909) 458-75-47', 'aristarh@mail.ru', 'Новое отделение'),
('023', 'ФАКИ', 'Аэродинамика', 'Селезнева Ирина Петровна', '+7 (917) 458-75-47', 'aristarh@mail.ru', 'Новое отделение'),
('031', 'ФОПФ', 'Интернет технологии', 'Казачкова Наталья Николаевна', '+7 (917) 458-75-47', 'aristarh@mail.ru', 'Новое отделение'),
('032', 'ФОПФ', 'Программирование систем', 'Казарина Наталья Николаевна', '+7 (917) 458-75-47', 'aristarh@mail.ru', 'Новое отделение');

-- --------------------------------------------------------

--
-- Структура таблицы `5_staff`
--

CREATE TABLE IF NOT EXISTS `5_staff` (
  `Id_Staff` char(10) NOT NULL,
  `Id_Fak` char(80) DEFAULT NULL,
  `Staff_FIO` char(80) DEFAULT NULL,
  `Staff_Doljnost` char(80) DEFAULT NULL,
  `Staff_Phone` char(40) DEFAULT NULL,
  `Staff_Email` char(80) DEFAULT NULL,
  `Staff_Year` char(80) NOT NULL,
  `Staff_Spec` char(80) DEFAULT NULL,
  PRIMARY KEY (`Id_Staff`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED;

--
-- Дамп данных таблицы `5_staff`
--

INSERT INTO `5_staff` (`Id_Staff`, `Id_Fak`, `Staff_FIO`, `Staff_Doljnost`, `Staff_Phone`, `Staff_Email`, `Staff_Year`, `Staff_Spec`) VALUES
('5000000001', '01', 'Александров Александр Сергеевич', 'Старший преподаватель', '+7(909) 333 44 55', 'aristarh@mail.ru', '2015-12-18', 'Программист'),
('5000000002', '01', 'Петровcкий Иван Петрович', 'Старший преподаватель', '+7 (909) 458-75-47', 'aristarh@mail.ru', '2015-12-18', 'Программист'),
('5000000003', '01', 'Хабибулина Нина Яковлевна', 'Старший преподаватель', '+7 (909) 458-75-47', 'aristarh@mail.ru', '2015-12-18', 'Программист'),
('5000000004', '01', 'Васюткина Антонина Васильевна', 'Старший преподаватель', '+7 (917) 458-75-47917', 'aristarh@mail.ru', '2015-12-18', 'Программист'),
('5000000005', '01', 'Чурсина Василиса Васильевна', 'Старший преподаватель', '+7 (917) 458-75-47', 'aristarh@mail.ru', '2015-12-18', 'Программист'),
('AlexKold20', 'Прикладной математики', 'Кубанский Александр Николаевич', 'ведущий разработчик', '+7 917 852-93-21', 'alfort@list.ru', '2015', 'Прикладная математика');

-- --------------------------------------------------------

--
-- Структура таблицы `6_docs`
--

CREATE TABLE IF NOT EXISTS `6_docs` (
  `Id_Doc` char(10) NOT NULL,
  `Doc_Name` char(80) NOT NULL,
  `Doc_Link` char(180) NOT NULL,
  `Doc_Inf` char(250) NOT NULL,
  PRIMARY KEY (`Id_Doc`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED;

--
-- Дамп данных таблицы `6_docs`
--

INSERT INTO `6_docs` (`Id_Doc`, `Doc_Name`, `Doc_Link`, `Doc_Inf`) VALUES
('7001', 'Справка с места учебы', '<a href =''../../SearchDekanat/Forms_Main.php?FormType=7_orders&operation=ADD&Id_Doc=7001&Doc_Name=Справка с места учебы''>ЗАКАЗАТЬ</a>', 'Справка из деканата (также может называться архивная выписка) требуется для легализации дипломов и сертификатов. Для легализации школьных аттестатов подтверждение с места учебы не требуется.\r\n\r\nВ некоторых случаях, когда на дипломе уже стоит штамп Ап'),
('7002', 'Справка об оценках', '<a href =''../../SearchDekanat/Forms_Main.php?FormType=7_orders&operation=ADD&Id_Doc=7002&Doc_Name=Справка об оценках''>ЗАКАЗАТЬ</a>', 'Справка из деканата (также может называться архивная выписка) требуется для легализации дипломов и сертификатов. Для легализации школьных аттестатов подтверждение с места учебы не требуется.\r\n\r\nВ некоторых случаях, когда на дипломе уже стоит штамп Ап'),
('7003', 'Справка об отсутствии задолжности', '<a href =''../../SearchDekanat/Forms_Main.php?FormType=7_orders&operation=ADD&Id_Doc=7003&Doc_Name=Справка об отсутствии задолжности''>ЗАКАЗАТЬ</a>', 'Справка из деканата (также может называться архивная выписка) требуется для легализации дипломов и сертификатов. Для легализации школьных аттестатов подтверждение с места учебы не требуется.\r\n\r\nВ некоторых случаях, когда на дипломе уже стоит штамп Ап');

-- --------------------------------------------------------

--
-- Структура таблицы `7_orders`
--

CREATE TABLE IF NOT EXISTS `7_orders` (
  `Id_Order` char(10) NOT NULL,
  `Doc_Date` date NOT NULL,
  `Id_Doc` char(10) NOT NULL,
  `Doc_Name` char(80) NOT NULL,
  `Id_Stud` char(20) NOT NULL,
  `Stud_FIO` char(180) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED;

--
-- Дамп данных таблицы `7_orders`
--

INSERT INTO `7_orders` (`Id_Order`, `Doc_Date`, `Id_Doc`, `Doc_Name`, `Id_Stud`, `Stud_FIO`) VALUES
('1586624028', '2021-04-11', '7001', 'Справка с места учебы', '1000000001', 'Больновcкая Евгения Михайловна'),
('1586623574', '2021-04-11', '7002', 'Справка об оценках', '1000000001', 'Больновcкая Евгения Михайловна'),
('1586624105', '2021-04-11', '7001', 'Справка с места учебы', '1000000001', 'Больновcкая Евгения Михайловна'),
('1586625221', '2021-04-11', '7001', 'Справка с места учебы', '1000000001', 'Больновcкая Евгения Михайловна'),
('1639846589', '2021-12-18', '7002', 'Справка об оценках', 'IvanIvan', 'Иванов Иван Иванович');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
