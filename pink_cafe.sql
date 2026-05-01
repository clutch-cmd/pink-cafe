-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Май 01 2026 г., 22:13
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
-- Структура таблицы `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `comanda_produse`
--

CREATE TABLE `comanda_produse` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comanda_id` bigint(20) UNSIGNED NOT NULL,
  `produs_id` bigint(20) UNSIGNED NOT NULL,
  `cantitate` int(11) NOT NULL,
  `pret` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `comenzi`
--

CREATE TABLE `comenzi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nume` varchar(255) NOT NULL,
  `telefon` varchar(255) NOT NULL,
  `adresa` varchar(255) NOT NULL,
  `comentarii` text DEFAULT NULL,
  `total` decimal(8,2) NOT NULL,
  `status` enum('noua','in_procesare','livrata','anulata') NOT NULL DEFAULT 'noua',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_04_30_190503_create_produse_table', 1),
(5, '2026_04_30_190511_create_comenzi_table', 1),
(6, '2026_04_30_190520_create_comanda_produse_table', 1),
(7, '2026_05_01_193108_add_alergeni_to_produse_table', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `produse`
--

CREATE TABLE `produse` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nume` varchar(255) NOT NULL,
  `pret` decimal(8,2) NOT NULL,
  `categorie` enum('bauturi_calde','cocktailuri','lemonades','deserturi') NOT NULL,
  `descriere` text DEFAULT NULL,
  `ingrediente` varchar(255) DEFAULT NULL,
  `alergeni` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `produse`
--

INSERT INTO `produse` (`id`, `nume`, `pret`, `categorie`, `descriere`, `ingrediente`, `alergeni`, `created_at`, `updated_at`) VALUES
(1, 'Ristretto', 25.00, 'bauturi_calde', 'Espresso concentrat și puternic', 'Cafea arabică 100%', NULL, NULL, NULL),
(2, 'Espresso', 25.00, 'bauturi_calde', 'Cafea clasică italiană', 'Cafea arabică premium', NULL, NULL, NULL),
(3, 'Doppio', 40.00, 'bauturi_calde', 'Espresso dublu pentru energizare maximă', 'Cafea arabică dublă porție', NULL, NULL, NULL),
(4, 'Flat White', 50.00, 'bauturi_calde', 'Cafea cremoasă cu lapte microspumat', 'Espresso, lapte integral', NULL, NULL, NULL),
(5, 'Americano', 27.00, 'bauturi_calde', 'Espresso alungit cu apă caldă', 'Espresso, apă fierbinte', NULL, NULL, NULL),
(6, 'Cappuccino', 35.00, 'bauturi_calde', 'Echilibrul perfect între cafea și spumă', 'Espresso, lapte, spumă de lapte', NULL, NULL, NULL),
(7, 'Latte', 40.00, 'bauturi_calde', 'Cafea delicată cu mult lapte', 'Espresso, lapte vaporat', NULL, NULL, NULL),
(8, 'Grand Cappuccino', 45.00, 'bauturi_calde', 'Cappuccino în dimensiune XXL', 'Espresso dublu, lapte, spumă', NULL, NULL, NULL),
(9, 'RAF', 55.00, 'bauturi_calde', 'Cafea dulce și cremoasă stil rusesc', 'Espresso, cremă, zahăr vanilat', NULL, NULL, NULL),
(10, 'Cacao', 35.00, 'bauturi_calde', 'Ciocolată caldă clasică', 'Cacao natural, lapte, zahăr', NULL, NULL, NULL),
(11, 'Hot Chocolate', 40.00, 'bauturi_calde', 'Ciocolată premium extra-cremoasă', 'Ciocolată belgiană, lapte, frișcă', NULL, NULL, NULL),
(12, 'Tea', 25.00, 'bauturi_calde', 'Selecție de ceaiuri premium', 'Ceai negru/verde/fructe', NULL, NULL, NULL),
(13, 'Cappuccino Brulee', 45.00, 'bauturi_calde', 'Cappuccino cu crustă caramelizată', 'Espresso, lapte, zahăr brulat', NULL, NULL, NULL),
(14, 'Bounty Coffee', 50.00, 'bauturi_calde', 'Cafea cu aromă de cocos și ciocolată', 'Espresso, sirop cocos, lapte, ciocolată', NULL, NULL, NULL),
(15, 'Matcha', 50.00, 'bauturi_calde', 'Ceai verde japonez ceremonial', 'Matcha premium, lapte', NULL, NULL, NULL),
(16, 'Aperol Spritz', 80.00, 'cocktailuri', 'Cocktail italian răcoritor', 'Aperol, prosecco, sifon, portocală', 'alcool', NULL, NULL),
(17, 'Strawberry Aperol', 85.00, 'cocktailuri', 'Aperol Spritz cu căpșuni proaspete', 'Aperol, prosecco, căpșuni, sifon', 'alcool', NULL, NULL),
(18, 'Sex on the Beach', 80.00, 'cocktailuri', 'Cocktail tropical dulce-acrișor', 'Vodcă, peach schnapps, suc portocale, cranberry', 'alcool', NULL, NULL),
(19, 'Pina Colada', 90.00, 'cocktailuri', 'Cocktail exotic cu ananas și cocos', 'Rom alb, cremă cocos, suc ananas', 'alcool, nuci', NULL, NULL),
(20, 'Pornstar Martini', 90.00, 'cocktailuri', 'Cocktail elegant cu fructul pasiunii', 'Vodcă, lichior passion fruit, vanilie, prosecco', 'alcool', NULL, NULL),
(21, 'Mojito', 80.00, 'cocktailuri', 'Cocktail cubanez cu mentă', 'Rom alb, mentă, lime, zahăr, sifon', 'alcool', NULL, NULL),
(22, 'Lemonade Passion Fruit', 50.00, 'lemonades', 'Lemonadă cu fructul pasiunii', 'Fruct pasiunii, lămâie, zahăr, apă', NULL, NULL, NULL),
(23, 'Lemonade Banana', 50.00, 'lemonades', 'Lemonadă exotică cu banane', 'Banane, lămâie, zahăr, apă', NULL, NULL, NULL),
(24, 'Lemonade Strawberry', 50.00, 'lemonades', 'Lemonadă dulce cu căpșuni', 'Căpșuni proaspete, lămâie, zahăr, apă', NULL, NULL, NULL),
(25, 'Lemonade Kiwi', 50.00, 'lemonades', 'Lemonadă acră cu kiwi', 'Kiwi, lămâie, zahăr, apă', NULL, NULL, NULL),
(26, 'Lemonade Mango', 50.00, 'lemonades', 'Lemonadă tropicală cu mango', 'Mango, lămâie, zahăr, apă', NULL, NULL, NULL),
(27, 'Fresh Portocala', 65.00, 'lemonades', 'Suc proaspăt de portocale', 'Portocale 100% naturale', NULL, NULL, NULL),
(28, 'Fresh Grapefruit', 65.00, 'lemonades', 'Suc proaspăt de grapefruit', 'Grapefruit roz 100% natural', NULL, NULL, NULL),
(29, 'Eskimo Fistic & Zmeura', 70.00, 'deserturi', 'Prăjitură înghețată cu fistic și zmeură', 'Cremă fistic, zmeură, blat vanilie', 'ouă, lapte și produse lactate, nuci-fistic', NULL, NULL),
(30, 'Inima', 60.00, 'deserturi', 'Prăjitură romantică în formă de inimă', 'Cremă mascarpone, căpșuni, blat roșu', 'ouă, lapte și produse lactate', NULL, NULL),
(31, 'Dimineata de Vara', 65.00, 'deserturi', 'Desert fresh cu fructe de vară', 'Cremă iaurt, fructe sezon, blat vanilie', 'ouă, lapte și produse lactate', NULL, NULL),
(32, 'Cub de Ciocolata', 70.00, 'deserturi', 'Prăjitură intensă de ciocolată', 'Ciocolată neagră, mousse cacao, blat brownie', 'ouă, lapte și produse lactate, gluten', NULL, NULL),
(33, 'Three Chocolates', 70.00, 'deserturi', 'Trei straturi de ciocolată premium', 'Ciocolată albă, lapte, neagră, blat cacao', 'ouă, lapte și produse lactate, gluten', NULL, NULL),
(34, 'Mochi Mango Zmeura & Fructul Pasiunii', 55.00, 'deserturi', 'Mochi japonez cu umplutură tropicală', 'Orez mochi, cremă mango, zmeură, passion fruit', 'lapte și produse lactate, gluten', NULL, NULL),
(35, 'Mochi Capsuna', 55.00, 'deserturi', 'Mochi dulce cu căpșuni', 'Orez mochi, cremă căpșuni proaspete', 'lapte și produse lactate', NULL, NULL),
(36, 'Mochi Snickers', 55.00, 'deserturi', 'Mochi inspirat din Snickers', 'Orez mochi, caramel, arahide, ciocolată', 'lapte și produse lactate, gluten, arahide', NULL, NULL),
(37, 'Mochi Bounty', 55.00, 'deserturi', 'Mochi cu cocos și ciocolată', 'Orez mochi, cremă cocos, ciocolată neagră', 'lapte și produse lactate, nuci, gluten', NULL, NULL),
(38, 'Mochi Lamaie', 55.00, 'deserturi', 'Mochi proaspăt cu lămâie', 'Orez mochi, cremă lămâie, zeste citrice', 'lapte și produse lactate, gluten', NULL, NULL),
(39, 'Tiramisu', 70.00, 'deserturi', 'Desert clasic italian', 'Mascarpone, cafea espresso, savoiardi, cacao', 'ouă, lapte și produse lactate, gluten', NULL, NULL),
(40, 'Fructe de Padure', 70.00, 'deserturi', 'Prăjitură cu fructe de pădure', 'Afine, mure, zmeură, cremă, blat', 'lapte și produse lactate, nuci, gluten', NULL, NULL),
(41, 'Prajitura Cupola', 65.00, 'deserturi', 'Prăjitură elegantă în formă de cupolă', 'Mousse vanilie, glazură oglindă, blat', 'ouă, lapte și produse lactate, gluten', NULL, NULL),
(42, 'Malibu', 70.00, 'deserturi', 'Prăjitură cu aromă de cocos și rom', 'Cremă Malibu, cocos, blat umed', 'lapte și produse lactate, nuci, gluten, alcool', NULL, NULL),
(43, 'Tartaleta Dubai', 75.00, 'deserturi', 'Tartă luxoasă cu ciocolată și fistic', 'Ciocolată premium, cremă fistic, aur comestibil', 'ouă, lapte și produse lactate, gluten, nuci', NULL, NULL),
(44, 'Lamaie', 65.00, 'deserturi', 'Prăjitură proaspătă de lămâie', 'Lemon curd, cremă, blat vanilie', 'ouă, lapte și produse lactate, gluten', NULL, NULL),
(45, 'Para', 65.00, 'deserturi', 'Prăjitură delicată cu pere', 'Pere caramelizate, cremă vanilie, blat', 'ouă, lapte și produse lactate, gluten', NULL, NULL),
(46, 'Mar', 65.00, 'deserturi', 'Prăjitură cu mere și scorțișoară', 'Mere, scorțișoară, nuci, cremă', 'ouă, lapte și produse lactate, nuci, gluten', NULL, NULL),
(47, 'Cocos', 80.00, 'deserturi', 'Prăjitură tropicală cu cocos', 'Cocos proaspăt, cremă, ciocolată albă', 'lapte și produse lactate, nuci, gluten', NULL, NULL),
(48, 'Mango & Fructul Pasiunii', 75.00, 'deserturi', 'Desert exotic cu mango și passion fruit', 'Mango, fruct pasiunii, mousse, blat', 'ouă, lapte și produse lactate, gluten', NULL, NULL),
(49, 'Mango & Ananas', 65.00, 'deserturi', 'Prăjitură tropicală cu două fructe', 'Mango, ananas, cremă, blat', 'ouă, lapte și produse lactate, gluten', NULL, NULL),
(50, 'Zmeura', 70.00, 'deserturi', 'Prăjitură proaspătă cu zmeură', 'Zmeură proaspătă, mousse, blat vanilie', 'ouă, lapte și produse lactate', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('DAOdUlD6NYKBukpRF4qIcP7RT8mDOzqLCrKwu2Oe', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36 Edg/147.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNDBUMkR3bXU0alluQXFpV3VFZU5RUHZXem9wSjhSYjNRWUVMZ3pQOSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1777583605),
('njNrKdk7w4IjoZwuTamlpmyDKG9NYj1xEZmqkkdq', NULL, '127.0.0.1', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Mobile Safari/537.36 Edg/147.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiR2NtSXpVUDkwMzgwV1JYYllBZUNhSjFsRFBxS1RFNDZsVXQzd1BQbiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1777666274);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Индексы таблицы `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Индексы таблицы `comanda_produse`
--
ALTER TABLE `comanda_produse`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comanda_produse_comanda_id_foreign` (`comanda_id`),
  ADD KEY `comanda_produse_produs_id_foreign` (`produs_id`);

--
-- Индексы таблицы `comenzi`
--
ALTER TABLE `comenzi`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Индексы таблицы `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Индексы таблицы `produse`
--
ALTER TABLE `produse`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comanda_produse`
--
ALTER TABLE `comanda_produse`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `comenzi`
--
ALTER TABLE `comenzi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `produse`
--
ALTER TABLE `produse`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `comanda_produse`
--
ALTER TABLE `comanda_produse`
  ADD CONSTRAINT `comanda_produse_comanda_id_foreign` FOREIGN KEY (`comanda_id`) REFERENCES `comenzi` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comanda_produse_produs_id_foreign` FOREIGN KEY (`produs_id`) REFERENCES `produse` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
