-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Май 01 2026 г., 12:30
-- Версия сервера: 10.4.32-MariaDB
-- Версия PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `pink_cafe`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categorii`
--

CREATE TABLE `categorii` (
  `id` int(10) UNSIGNED NOT NULL,
  `nume` varchar(100) NOT NULL,
  `ordine` tinyint(3) UNSIGNED DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categorii`
--

INSERT INTO `categorii` (`id`, `nume`, `ordine`) VALUES
(1, 'Băuturi Calde', 1),
(2, 'Cocktailuri', 2),
(3, 'Fresh Lemonades', 3),
(4, 'Deserturi', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `comenzi`
--

CREATE TABLE `comenzi` (
  `id` int(10) UNSIGNED NOT NULL,
  `masa_id` int(10) UNSIGNED DEFAULT NULL,
  `tip` enum('loc','takeaway') NOT NULL DEFAULT 'loc',
  `status` enum('in_asteptare','in_preparare','gata','anulata') NOT NULL DEFAULT 'in_asteptare',
  `total` decimal(10,2) NOT NULL DEFAULT 0.00,
  `observatii` text DEFAULT NULL,
  `creat_la` timestamp NOT NULL DEFAULT current_timestamp(),
  `actualizat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `detalii_comanda`
--

CREATE TABLE `detalii_comanda` (
  `id` int(10) UNSIGNED NOT NULL,
  `comanda_id` int(10) UNSIGNED NOT NULL,
  `produs_id` int(10) UNSIGNED NOT NULL,
  `cantitate` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `pret_unitar` decimal(8,2) NOT NULL,
  `subtotal` decimal(8,2) GENERATED ALWAYS AS (`cantitate` * `pret_unitar`) STORED
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Триггеры `detalii_comanda`
--
DELIMITER $$
CREATE TRIGGER `trg_total_delete` AFTER DELETE ON `detalii_comanda` FOR EACH ROW BEGIN
    UPDATE comenzi
    SET total = (
        SELECT COALESCE(SUM(subtotal), 0)
        FROM detalii_comanda
        WHERE comanda_id = OLD.comanda_id
    )
    WHERE id = OLD.comanda_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trg_total_insert` AFTER INSERT ON `detalii_comanda` FOR EACH ROW BEGIN
    UPDATE comenzi
    SET total = (
        SELECT COALESCE(SUM(subtotal), 0)
        FROM detalii_comanda
        WHERE comanda_id = NEW.comanda_id
    )
    WHERE id = NEW.comanda_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Структура таблицы `mese`
--

CREATE TABLE `mese` (
  `id` int(10) UNSIGNED NOT NULL,
  `numar` tinyint(3) UNSIGNED NOT NULL,
  `capacitate` tinyint(3) UNSIGNED NOT NULL DEFAULT 4,
  `locatie` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `mese`
--

INSERT INTO `mese` (`id`, `numar`, `capacitate`, `locatie`) VALUES
(1, 1, 2, 'interior'),
(2, 2, 2, 'interior'),
(3, 3, 4, 'interior'),
(4, 4, 4, 'interior'),
(5, 5, 4, 'interior'),
(6, 6, 6, 'interior'),
(7, 7, 2, 'terasa'),
(8, 8, 2, 'terasa'),
(9, 9, 4, 'terasa'),
(10, 10, 4, 'terasa');

-- --------------------------------------------------------

--
-- Структура таблицы `plati`
--

CREATE TABLE `plati` (
  `id` int(10) UNSIGNED NOT NULL,
  `comanda_id` int(10) UNSIGNED NOT NULL,
  `metoda` enum('numerar','card') NOT NULL DEFAULT 'numerar',
  `suma_platita` decimal(10,2) NOT NULL,
  `status` enum('in_asteptare','confirmata') NOT NULL DEFAULT 'in_asteptare',
  `creat_la` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `produse`
--

CREATE TABLE `produse` (
  `id` int(10) UNSIGNED NOT NULL,
  `categorie_id` int(10) UNSIGNED NOT NULL,
  `nume` varchar(150) NOT NULL,
  `pret` decimal(8,2) NOT NULL,
  `disponibil` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `produse`
--

INSERT INTO `produse` (`id`, `categorie_id`, `nume`, `pret`, `disponibil`) VALUES
(1, 1, 'Ristretto', 25.00, 1),
(2, 1, 'Espresso', 25.00, 1),
(3, 1, 'Doppio', 40.00, 1),
(4, 1, 'Flat White', 50.00, 1),
(5, 1, 'Americano', 27.00, 1),
(6, 1, 'Cappuccino', 35.00, 1),
(7, 1, 'Latte', 40.00, 1),
(8, 1, 'Grand Cappuccino', 45.00, 1),
(9, 1, 'RAF', 55.00, 1),
(10, 1, 'Cacao', 35.00, 1),
(11, 1, 'Hot Chocolate', 40.00, 1),
(12, 1, 'Tea', 25.00, 1),
(13, 1, 'Cappuccino Brulee', 45.00, 1),
(14, 1, 'Bounty Coffee', 50.00, 1),
(15, 1, 'Matcha', 50.00, 1),
(16, 2, 'Aperol Spritz', 80.00, 1),
(17, 2, 'Strawberry Aperol', 85.00, 1),
(18, 2, 'Sex on the Beach', 80.00, 1),
(19, 2, 'Pina Colada', 90.00, 1),
(20, 2, 'Pornstar Martini', 90.00, 1),
(21, 2, 'Mojito', 80.00, 1),
(22, 3, 'Lemonade Passion Fruit', 50.00, 1),
(23, 3, 'Lemonade Banana', 50.00, 1),
(24, 3, 'Lemonade Strawberry', 50.00, 1),
(25, 3, 'Lemonade Kiwi', 50.00, 1),
(26, 3, 'Lemonade Mango', 50.00, 1),
(27, 3, 'Fresh Portocala', 65.00, 1),
(28, 3, 'Fresh Grapefruit', 65.00, 1),
(29, 4, 'Eskimo Fistic & Zmeura', 70.00, 1),
(30, 4, 'Inima', 60.00, 1),
(31, 4, 'Dimineata de Vara', 65.00, 1),
(32, 4, 'Cub de Ciocolata', 70.00, 1),
(33, 4, 'Three Chocolates', 70.00, 1),
(34, 4, 'Mochi Mango Zmeura & Fructul Pasiunii', 55.00, 1),
(35, 4, 'Mochi Capsuna', 55.00, 1),
(36, 4, 'Mochi Snickers', 55.00, 1),
(37, 4, 'Mochi Bounty', 55.00, 1),
(38, 4, 'Mochi Lamaie', 55.00, 1),
(39, 4, 'Tiramisu', 70.00, 1),
(40, 4, 'Fructe de Padure', 70.00, 1),
(41, 4, 'Prajitura Cupola', 65.00, 1),
(42, 4, 'Malibu', 70.00, 1),
(43, 4, 'Tartaleta Dubai', 75.00, 1),
(44, 4, 'Lamaie', 65.00, 1),
(45, 4, 'Para', 65.00, 1),
(46, 4, 'Mar', 65.00, 1),
(47, 4, 'Cocos', 80.00, 1),
(48, 4, 'Mango & Fructul Pasiunii', 75.00, 1),
(49, 4, 'Mango & Ananas', 65.00, 1),
(50, 4, 'Zmeura', 70.00, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `rezervari`
--

CREATE TABLE `rezervari` (
  `id` int(10) UNSIGNED NOT NULL,
  `masa_id` int(10) UNSIGNED NOT NULL,
  `nume_contact` varchar(150) NOT NULL,
  `telefon` varchar(20) NOT NULL,
  `nr_persoane` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `data_rezervarii` date NOT NULL,
  `ora_start` time NOT NULL,
  `ora_sfarsit` time NOT NULL,
  `observatii` text DEFAULT NULL,
  `status` enum('in_asteptare','confirmata','anulata') NOT NULL DEFAULT 'in_asteptare',
  `creat_la` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `v_comenzi`
-- (См. Ниже фактическое представление)
--
CREATE TABLE `v_comenzi` (
`comanda_id` int(10) unsigned
,`tip` enum('loc','takeaway')
,`status` enum('in_asteptare','in_preparare','gata','anulata')
,`total` decimal(10,2)
,`masa` tinyint(3) unsigned
,`creat_la` timestamp
);

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `v_rezervari`
-- (См. Ниже фактическое представление)
--
CREATE TABLE `v_rezervari` (
`id` int(10) unsigned
,`nume_contact` varchar(150)
,`telefon` varchar(20)
,`nr_persoane` tinyint(3) unsigned
,`masa` tinyint(3) unsigned
,`locatie` varchar(50)
,`data_rezervarii` date
,`ora_start` time
,`ora_sfarsit` time
,`status` enum('in_asteptare','confirmata','anulata')
,`observatii` text
);

-- --------------------------------------------------------

--
-- Структура для представления `v_comenzi`
--
DROP TABLE IF EXISTS `v_comenzi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_comenzi`  AS SELECT `c`.`id` AS `comanda_id`, `c`.`tip` AS `tip`, `c`.`status` AS `status`, `c`.`total` AS `total`, `m`.`numar` AS `masa`, `c`.`creat_la` AS `creat_la` FROM (`comenzi` `c` left join `mese` `m` on(`m`.`id` = `c`.`masa_id`)) ORDER BY `c`.`creat_la` DESC ;

-- --------------------------------------------------------

--
-- Структура для представления `v_rezervari`
--
DROP TABLE IF EXISTS `v_rezervari`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_rezervari`  AS SELECT `r`.`id` AS `id`, `r`.`nume_contact` AS `nume_contact`, `r`.`telefon` AS `telefon`, `r`.`nr_persoane` AS `nr_persoane`, `m`.`numar` AS `masa`, `m`.`locatie` AS `locatie`, `r`.`data_rezervarii` AS `data_rezervarii`, `r`.`ora_start` AS `ora_start`, `r`.`ora_sfarsit` AS `ora_sfarsit`, `r`.`status` AS `status`, `r`.`observatii` AS `observatii` FROM (`rezervari` `r` join `mese` `m` on(`m`.`id` = `r`.`masa_id`)) ORDER BY `r`.`data_rezervarii` ASC, `r`.`ora_start` ASC ;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categorii`
--
ALTER TABLE `categorii`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comenzi`
--
ALTER TABLE `comenzi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cmd_masa` (`masa_id`);

--
-- Индексы таблицы `detalii_comanda`
--
ALTER TABLE `detalii_comanda`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_dc_comanda` (`comanda_id`),
  ADD KEY `fk_dc_produs` (`produs_id`);

--
-- Индексы таблицы `mese`
--
ALTER TABLE `mese`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `numar` (`numar`);

--
-- Индексы таблицы `plati`
--
ALTER TABLE `plati`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `comanda_id` (`comanda_id`);

--
-- Индексы таблицы `produse`
--
ALTER TABLE `produse`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_produs_categorie` (`categorie_id`);

--
-- Индексы таблицы `rezervari`
--
ALTER TABLE `rezervari`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_rez_masa` (`masa_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categorii`
--
ALTER TABLE `categorii`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `comenzi`
--
ALTER TABLE `comenzi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `detalii_comanda`
--
ALTER TABLE `detalii_comanda`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `mese`
--
ALTER TABLE `mese`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `plati`
--
ALTER TABLE `plati`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `produse`
--
ALTER TABLE `produse`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT для таблицы `rezervari`
--
ALTER TABLE `rezervari`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `comenzi`
--
ALTER TABLE `comenzi`
  ADD CONSTRAINT `fk_cmd_masa` FOREIGN KEY (`masa_id`) REFERENCES `mese` (`id`) ON DELETE SET NULL;

--
-- Ограничения внешнего ключа таблицы `detalii_comanda`
--
ALTER TABLE `detalii_comanda`
  ADD CONSTRAINT `fk_dc_comanda` FOREIGN KEY (`comanda_id`) REFERENCES `comenzi` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_dc_produs` FOREIGN KEY (`produs_id`) REFERENCES `produse` (`id`);

--
-- Ограничения внешнего ключа таблицы `plati`
--
ALTER TABLE `plati`
  ADD CONSTRAINT `fk_plata_comanda` FOREIGN KEY (`comanda_id`) REFERENCES `comenzi` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `produse`
--
ALTER TABLE `produse`
  ADD CONSTRAINT `fk_produs_categorie` FOREIGN KEY (`categorie_id`) REFERENCES `categorii` (`id`);

--
-- Ограничения внешнего ключа таблицы `rezervari`
--
ALTER TABLE `rezervari`
  ADD CONSTRAINT `fk_rez_masa` FOREIGN KEY (`masa_id`) REFERENCES `mese` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
