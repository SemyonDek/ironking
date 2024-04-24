-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 24 2024 г., 04:18
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `ironking`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `ID` int NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `DESK` varchar(255) NOT NULL,
  `BIGIMG` varchar(255) NOT NULL,
  `SMALLIMG` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`ID`, `NAME`, `DESK`, `BIGIMG`, `SMALLIMG`) VALUES
(1, 'Оборудование для улицы', 'Уличные тренажеры', 'img/category/category-list/65d668964d7ae.jpg', 'img/category/catalog/65d668964d089.jpg'),
(2, 'Тренажёры, аксессуары', 'Профессиональное оборудование для фитнес-центров и тренажерных залов закрытого типа. Все что вам нужно – в одном разделе.', 'img/category/category-list/65d668ff29468.jpg', 'img/category/catalog/65d668ff28e1d.jpg'),
(3, 'Свободные веса', 'Широчайший выбор гантель, гирь, дисков, грифов и штанг для развития силы и наращивания мускулатуры. Иван Денисов - мастер спорта международного класса по гиревому спорту и многократный...', 'img/category/category-list/65d669264b764.jpg', 'img/category/catalog/65d669264b04a.jpg'),
(4, 'Оборудование для ГТО', 'Оборудование для оснащения воркаут-площадок.', 'img/category/category-list/65d66982879c9.jpg', 'img/category/catalog/65d6698287536.jpg'),
(5, 'Модульные залы', 'Быстровозводимая конструкция и комплектом спортивного оборудования позволяет в короткие сроки создать комфортные условия для тренировок людей с разным уровнем подготовки.', 'img/category/category-list/65d669d245aad.jpg', 'img/category/catalog/65d669d24556f.jpg'),
(6, 'Игровое оборудование и ограждения', 'Производим оборудование для игры в футбол, хоккей и волейбол. Приятные цены и высочайшее качество оборудования с гарантией!', 'img/category/category-list/65d66a08c6ae4.jpg', 'img/category/catalog/65d66a08c45f5.jpg'),
(7, 'Инклюзивные тренажеры', 'Тренажёры для инвалидов, людей с ограниченными возможностями здоровья и спортсменов, перенесших травмы', 'img/category/category-list/65d66a4b1d61b.png', 'img/category/catalog/65d66a4b1cfe8.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `category_img`
--

CREATE TABLE `category_img` (
  `ID` int NOT NULL,
  `CATID` int NOT NULL,
  `SRC` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `category_img`
--

INSERT INTO `category_img` (`ID`, `CATID`, `SRC`) VALUES
(1, 4, 'img/category-img/65d6862c6dd2c.jpg'),
(2, 5, 'img/category-img/65d687d1a01cb.jpg'),
(6, 6, 'img/category-img/65d68a8d9c88e.jpg'),
(7, 7, 'img/category-img/65d758fc7cd5f.png');

-- --------------------------------------------------------

--
-- Структура таблицы `gallery`
--

CREATE TABLE `gallery` (
  `ID` int NOT NULL,
  `SRC` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `gallery`
--

INSERT INTO `gallery` (`ID`, `SRC`) VALUES
(1, 'img/project-photos/65d65cacb06c6.jpg'),
(2, 'img/project-photos/65d65eed2218e.jpg'),
(3, 'img/project-photos/65d6605498f09.jpg'),
(4, 'img/project-photos/65d6605aa7f34.jpg'),
(5, 'img/project-photos/65d66060b4fa4.jpg'),
(6, 'img/project-photos/65d66065560ed.jpg'),
(7, 'img/project-photos/65d6606a13f6c.jpg'),
(8, 'img/project-photos/65d6606f2509e.jpg'),
(9, 'img/project-photos/65d66074961c2.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `ID` int NOT NULL,
  `IDUSER` int NOT NULL,
  `STATUS` int NOT NULL,
  `VALUE` int NOT NULL,
  `FULLAMOUNT` int NOT NULL,
  `BONUS` int NOT NULL,
  `SALEAMOUNT` int NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `MAIL` varchar(255) NOT NULL,
  `NUMBER` varchar(255) NOT NULL,
  `ADDRESS` varchar(255) NOT NULL,
  `COMM` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`ID`, `IDUSER`, `STATUS`, `VALUE`, `FULLAMOUNT`, `BONUS`, `SALEAMOUNT`, `NAME`, `MAIL`, `NUMBER`, `ADDRESS`, `COMM`) VALUES
(6, 1, 1, 1, 2513827, 0, 2513827, 'Иванов Иван Иванович', 'ivan@mail.ru', '+7 (999) 999-99-99', 'г. Москва пл. Ленина д.1 кв.1', 'Отнести на 2 этаж'),
(7, 1, 2, 1, 2513827, 0, 2513827, 'Иванов Иван Иванович', 'ivan@mail.ru', '+7 (999) 999-99-99', 'г. Москва пл. Ленина д.1 кв.1', ''),
(8, 1, 3, 1, 2513827, 200, 2513627, 'Иванов Иван Иванович', 'ivan@mail.ru', '+7 (999) 999-99-99', 'г. Москва пл. Ленина д.1 кв.1', ''),
(9, 1, 4, 1, 2513827, 30000, 2483827, 'Иванов Иван Иванович', 'ivan@mail.ru', '+7 (999) 999-99-99', 'г. Москва пл. Ленина д.1 кв.1', '');

-- --------------------------------------------------------

--
-- Структура таблицы `order_item`
--

CREATE TABLE `order_item` (
  `IDORDER` int NOT NULL,
  `IDPROD` int NOT NULL,
  `PRICE` int NOT NULL,
  `VALUE` int NOT NULL,
  `AMOUNT` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `order_item`
--

INSERT INTO `order_item` (`IDORDER`, `IDPROD`, `PRICE`, `VALUE`, `AMOUNT`) VALUES
(2, 3, 2513827, 5, 12569135),
(4, 3, 2513827, 1, 2513827),
(5, 3, 2513827, 1, 2513827),
(6, 3, 2513827, 1, 2513827),
(7, 3, 2513827, 1, 2513827),
(8, 3, 2513827, 1, 2513827),
(9, 3, 2513827, 1, 2513827);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `ID` int NOT NULL,
  `IDCAT` int NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `PRICE` int NOT NULL,
  `VALUE` int NOT NULL,
  `MODEL` varchar(255) NOT NULL,
  `GROUPPROD` int NOT NULL,
  `USEPROD` int NOT NULL,
  `COLOR` varchar(255) NOT NULL,
  `DESCRIPTION` text NOT NULL,
  `DESKCAHR` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`ID`, `IDCAT`, `NAME`, `PRICE`, `VALUE`, `MODEL`, `GROUPPROD`, `USEPROD`, `COLOR`, `DESCRIPTION`, `DESKCAHR`) VALUES
(3, 4, 'S832 Рама', 2513827, 14, 'Рама', 1, 4, 'Красный', 'Воркаут оборудование предназначено для проведения силовых тренировок на открытом воздухе', 'Количество оборудования для подготовки и выполнения нормативов испытаний (тестов) - 12 шт.\r\nКоличество оборудования для физкультурно-оздоровительного комплекса открытого типа (Воркаут) - 6 шт.\r\nКоличество оборудования физкультурно-оздоровительного комплекса открытого типа (Силовые тренажеры) - 7 шт.\r\nМы - лицензиаты ГТО с 2019 года.'),
(4, 3, 'Уличный силовой тренажер для развития мускулатуры плечевого пояса с изменяемой нагрузкой из положения лежа S409', 228150, 30, 'S409', 2, 4, 'Красный', 'Тренажер Жим лежа S409 предназначен для тренировок и активного отдыха различных групп населения, для детей и взрослых с целью развития дельтовидных мышц, а также для активного развития мышц груди.\r\nКомплекс из уличных тренажеров S4 станет популярным местом на спортивной площадке - функциональность тренажеров сопоставима с профессиональным оборудованием для залов, а тренировка на свежем воздухе делает нагрузки еще полезнее.\r\nТренажер имеет прочную антивандальную конструкцию из стального профиля и практически не требует обслуживания. \r\nСтальная конструкция тренажера перед покраской проходит гидроабразивную антикоррозийную обработку. На металл нанесена цинкосодержащая грунтовка.', 'Длина, не более, мм……………………………… 2615\r\nШирина, не более, мм……………………………1840\r\nВысота, не более, мм …………1115\r\nВес тренажера, не более, кг………………410'),
(5, 3, 'Гантели профессиональные 12 пар - супер', 217326, 5, 'СУПЕР', 5, 3, 'Черный', 'Стойка в комплект не входит', 'Стойка в комплект не входит'),
(6, 3, 'Чемпионские гири 5 пар', 81406, 3, 'Супер', 5, 3, 'Радуга', 'Предназначены для организации тренировок профессиональных спортсменов-гиревиков и подготовки к международным и мировым соревнованиям по гиревому спорту.\r\nШирокий спектр весов позволяет построить идеальный тренировочный процесс и грамотно программировать свои тренировки для достижения наилучших результатов.\r\n\r\nВ этот гиревой ряд собраны веса 6-14 кг.', 'Стойка в комплект не входит'),
(7, 5, 'Модульный зал', 2267892, 2, 'IRONKING', 1, 3, 'Черный', 'Модульные комплексы реализуются в рамках федерального проекта «Бизнес-спринт» (Я выбираю спорт), цель которой — создать комфортную и доступную каждому спортивную инфраструктуру в шаге от дома. Благодаря технологии строительства быстровозводимых зданий мы можем создать качественный, надёжный и безопасный спортивный объект в любых условиях и за короткий срок.\r\n\r\nГотовое решение модульного зала включает следующий комплект спортивного оборудования нашего производства:', 'Проект модульного зала представляет собой быстровозводимый комплекс с оборудованием для тренировки на все группы мышц Пространство модуля включает в себя зону для занятий силовым спортом, площадку для командных игр и раздевалки.\r\n\r\nЦена рассчитывается индивидуально, уточняйте у менеджера*'),
(8, 2, 'Соревновательная рама CR122', 488287, 73, 'CR122', 5, 2, 'Черный', 'Рама, созданная специально для соревнований с 10 отделений, мишенью для бросков медбола, возможностью выполнять гимнастические упражнения, упражнения со штангой, а также лазать по канату', 'Краска: Порошковая'),
(9, 1, 'S406 Cведение ног с изменяемой нагрузкой', 270741, 10, 'S406', 3, 4, 'Red', 'Тренажер имеет прочную антивандальную конструкцию из стального профиля и практически не требует обслуживания. \r\nСтальная конструкция тренажера перед покраской проходит гидроабразивную антикоррозийную обработку. На металл нанесена цинкосодержащая грунтовка.\r\n\r\nУстойчивость конструкции достигается при помощи бетонирования закладной опоры тренажера.\r\n\r\nКомплектация\r\nОсновная рама тренажера – 1 шт.;\r\n\r\nЗакладная опора – 3 шт.\r\n\r\nПаспорт изделия, сертификат соответствия на изделие с монтажными схемами сборки и установки в комплекте.', 'Длина, не более, мм - 1835\r\nШирина, не более, мм - 1864\r\nВысота, не более, мм - 2110\r\nВес тренажера, не более, кг - 403\r\nМакс. нагрузка, не более, кг - 180');

-- --------------------------------------------------------

--
-- Структура таблицы `products_img`
--

CREATE TABLE `products_img` (
  `ID` int NOT NULL,
  `IDPROD` int NOT NULL,
  `SRC` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `products_img`
--

INSERT INTO `products_img` (`ID`, `IDPROD`, `SRC`) VALUES
(6, 3, 'img/product/65d6aab2b141e.png'),
(7, 3, 'img/product/65d6aab2b1c1a.png'),
(8, 4, 'img/product/65d75f37ad41b.png'),
(9, 5, 'img/product/65d7652074084.jpg'),
(10, 6, 'img/product/65d765ed62973.jpg'),
(11, 6, 'img/product/65d765ed63813.jpg'),
(12, 7, 'img/product/65d767a5e2669.jpg'),
(13, 7, 'img/product/65d767a5e2fcf.jpg'),
(14, 7, 'img/product/65d767a5e389c.jpg'),
(15, 7, 'img/product/65d767a5e4208.jpg'),
(16, 7, 'img/product/65d767a5e4bb4.jpg'),
(17, 8, 'img/product/65d76ab703a2e.jpg'),
(18, 9, 'img/product/65d76b8f2f3a1.jpg'),
(19, 9, 'img/product/65d76b8f2fc76.png');

-- --------------------------------------------------------

--
-- Структура таблицы `slider`
--

CREATE TABLE `slider` (
  `ID` int NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `CATID` int NOT NULL,
  `DESCRIPTION` varchar(255) NOT NULL,
  `SRC` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `slider`
--

INSERT INTO `slider` (`ID`, `NAME`, `CATID`, `DESCRIPTION`, `SRC`) VALUES
(2, 'Производим ГТО площадки', 4, 'Лицензиаты ГТО с 2019 года', 'img/slider/65d68eeab8695.jpg'),
(5, 'Гексагональные гантели', 3, 'Мы - единственный производитель в стране!', 'img/slider/65d75dc99533b.jpg'),
(6, 'Оборудование для реабилитации', 7, 'Производим спортивное оборудование для людей с ограниченными возможностями здоровья', 'img/slider/65d75df125156.jpg'),
(7, 'Прочные ограждения', 6, 'Для безопасных командных игр во дворе и на спортивной площадке', 'img/slider/65d75e561c834.jpg'),
(8, 'Площадка для панна футбола', 6, 'Площадка для уличного футбола от производителя!', 'img/slider/65d75e7dd4620.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `ID` int NOT NULL,
  `LOGIN` varchar(255) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `MAIL` varchar(255) NOT NULL,
  `NUMBER` varchar(255) NOT NULL,
  `ADDRESS` varchar(255) NOT NULL,
  `BONUS` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`ID`, `LOGIN`, `PASSWORD`, `NAME`, `MAIL`, `NUMBER`, `ADDRESS`, `BONUS`) VALUES
(1, 'ivan', 'i', 'Иванов Иван Иванович', 'ivan@mail.ru', '+7 (999) 999-99-99', 'г. Москва пл. Ленина д.1 кв.1', 45433);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `category_img`
--
ALTER TABLE `category_img`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `products_img`
--
ALTER TABLE `products_img`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `category_img`
--
ALTER TABLE `category_img`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `gallery`
--
ALTER TABLE `gallery`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `products_img`
--
ALTER TABLE `products_img`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `slider`
--
ALTER TABLE `slider`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
