-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.7.13 - MySQL Community Server (GPL)
-- ОС Сервера:                   Win32
-- HeidiSQL Версия:              9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп структуры базы данных homestead
CREATE DATABASE IF NOT EXISTS `homestead` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `homestead`;


-- Дамп структуры для таблица homestead.currencies
CREATE TABLE IF NOT EXISTS `currencies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы homestead.currencies: ~4 rows (приблизительно)
/*!40000 ALTER TABLE `currencies` DISABLE KEYS */;
INSERT INTO `currencies` (`id`, `name`, `country`, `created_at`, `updated_at`) VALUES
	(1, 'EUR', 'EU', NULL, NULL),
	(2, 'UAH', 'Ukraine', NULL, NULL),
	(3, 'RUB', 'Russia', NULL, NULL),
	(4, 'USD', 'USA', NULL, NULL);
/*!40000 ALTER TABLE `currencies` ENABLE KEYS */;


-- Дамп структуры для таблица homestead.goods
CREATE TABLE IF NOT EXISTS `goods` (
  `id` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `modified` datetime NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `price_old` decimal(10,2) DEFAULT NULL,
  `shipping_costs` decimal(10,2) DEFAULT NULL,
  `currency_id` int(10) unsigned NOT NULL,
  `program_id` int(10) unsigned NOT NULL,
  `manufacturer_id` int(10) unsigned NOT NULL,
  `merchant_id` int(10) unsigned NOT NULL,
  `ean` bigint(13) unsigned NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `goods_currency_id_foreign` (`currency_id`),
  KEY `goods_program_id_foreign` (`program_id`),
  KEY `goods_manufacturer_id_foreign` (`manufacturer_id`),
  KEY `goods_merchant_id_foreign` (`merchant_id`),
  CONSTRAINT `goods_currency_id_foreign` FOREIGN KEY (`currency_id`) REFERENCES `currencies` (`id`) ON DELETE CASCADE,
  CONSTRAINT `goods_manufacturer_id_foreign` FOREIGN KEY (`manufacturer_id`) REFERENCES `manufacturers` (`id`) ON DELETE CASCADE,
  CONSTRAINT `goods_merchant_id_foreign` FOREIGN KEY (`merchant_id`) REFERENCES `merchants` (`id`) ON DELETE CASCADE,
  CONSTRAINT `goods_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы homestead.goods: ~23 rows (приблизительно)
/*!40000 ALTER TABLE `goods` DISABLE KEYS */;
INSERT INTO `goods` (`id`, `name`, `description`, `modified`, `price`, `price_old`, `shipping_costs`, `currency_id`, `program_id`, `manufacturer_id`, `merchant_id`, `ean`, `image`) VALUES
	('0f6c9d595053b29378e7c9c63d73d94a', 'Goods-11', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2017-10-25 10:53:46', 100.20, 99.99, 2.50, 1, 1, 1, 1, 4234565619315, 'basket-11.png'),
	('23e6c4df4396253c8d0c11f921929afb', 'Goods-3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2017-10-25 10:52:26', 100.20, 99.99, 2.50, 1, 1, 1, 1, 4439339153614, 'basket-3.png'),
	('2adf038a6df040bc52a9b411a152bd36', 'Second', 'Second', '2017-10-26 12:44:14', 230.00, 220.00, 20.00, 3, 2, 3, 2, 1234567891012, '2adf038a6df040bc52a9b411a152bd36.jpg'),
	('3de38e1c1a14daf221b7a9517c7bd9bc', 'Goods-16', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2017-10-25 10:54:36', 100.20, 99.99, 2.50, 1, 2, 1, 2, 4837586792493, 'basket-16.png'),
	('50458020dbf32d1931fc8dd563b49a39', 'Goods-4', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2017-10-25 10:52:36', 100.20, 99.99, 2.50, 1, 1, 1, 1, 4577881959812, 'basket-4.png'),
	('53ce307515edaf46ff96add8eb940b1b', 'Goods-12', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2017-10-25 10:53:56', 100.20, 99.99, 2.50, 1, 1, 2, 2, 4252762880980, 'basket-12.png'),
	('59fafaec78aa0bf513badceeedf35cac', 'Goods-18', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2017-10-25 10:54:56', 100.20, 99.99, 2.50, 1, 1, 2, 2, 4109854542810, 'basket-18.png'),
	('6019c5995cd4082884a44aff142eba4d', 'Goods-5', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2017-10-25 10:52:46', 100.20, 99.99, 2.50, 1, 1, 3, 1, 4215084362661, 'basket-5.png'),
	('6260d49c1a6b0bb1a6806f97971313e7', 'Goods-19', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2017-10-25 10:55:06', 100.20, 99.99, 2.50, 1, 1, 2, 1, 4673370680271, 'basket-19.png'),
	('652c2724b369ef800ad68dfea254ef50', 'Goods-22', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2017-10-25 10:55:36', 100.20, 99.99, 2.50, 1, 2, 1, 1, 4136909217811, 'basket-22.png'),
	('698db5391a2db3c2f53799cb168d030f', 'Goods-21', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2017-10-25 10:55:26', 100.20, 99.99, 2.50, 1, 3, 3, 1, 4820828892053, 'basket-21.png'),
	('7d5dfbb357717447cca4505fcec5ce62', 'Goods-7', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2017-10-25 10:53:06', 100.20, 99.99, 2.50, 1, 3, 1, 2, 4962977303945, 'basket-7.png'),
	('a41d2ae6058e3c7d37db854b61b3cd27', 'Goods-9', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2017-10-25 10:53:26', 100.20, 99.99, 2.50, 1, 2, 1, 2, 4393351411058, 'basket-9.png'),
	('bc41248362505589bc497f12454babe8', 'Goods-1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2017-10-25 10:52:06', 100.20, 99.99, 2.50, 1, 3, 2, 1, 4755848926502, 'basket-1.png'),
	('c3aca5c84587a21e3300b536b5e09912', 'Goods-10', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2017-10-25 10:53:36', 100.20, 99.99, 2.50, 1, 2, 3, 1, 4788286473801, 'basket-10.png'),
	('cb6da225edc9c6c4629d974a048436df', 'First', NULL, '2017-10-26 12:38:43', 123.00, NULL, NULL, 1, 1, 1, 1, 1234567891012, 'cb6da225edc9c6c4629d974a048436df.jpg'),
	('cf6c17d58f08186e8a01ad89da677e10', 'Goods-15', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2017-10-25 10:54:26', 100.20, 99.99, 2.50, 1, 2, 3, 1, 4185105832314, 'basket-15.png'),
	('d0926a5aff57c073d9159bef13789871', 'Goods-2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2017-10-25 10:52:16', 100.20, 99.99, 2.50, 1, 3, 2, 1, 4550645629301, 'basket-2.png'),
	('d85a74e7441bb6cd8c6b597ad322041c', 'Goods-6', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2017-10-25 10:52:56', 100.20, 99.99, 2.50, 1, 2, 2, 2, 4428726128671, 'basket-6.png'),
	('e1df97ecce21d0041fc7f35b03d4278e', 'Goods-13', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2017-10-25 10:54:06', 100.20, 99.99, 2.50, 1, 3, 2, 2, 4797003627966, 'basket-13.png'),
	('e6b866c76d9e6b9731418a4f91c6328d', 'Goods-17', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2017-10-25 10:54:46', 100.20, 99.99, 2.50, 1, 2, 3, 1, 4726491317806, 'basket-17.png'),
	('e6eec472eba8af78b814e44cd36777d2', 'First', '12345', '2017-10-26 17:00:16', 120.00, NULL, 25.00, 1, 3, 1, 2, 1234567891012, 'e6eec472eba8af78b814e44cd36777d2.jpg'),
	('eab2002c51db9e17fef31c464a191fea', 'Goods-20', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2017-10-25 10:55:16', 100.20, 99.99, 2.50, 1, 1, 2, 2, 4195522914942, 'basket-20.png'),
	('ec6bb4fbb6939c879964392188dc6ede', 'Goods-14', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2017-10-25 10:54:16', 100.20, 99.99, 2.50, 1, 3, 1, 2, 4782696746234, 'basket-14.png'),
	('f7107ac2a8615c114a77ae6b9d3af2ed', 'Goods-8', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2017-10-25 10:53:16', 100.20, 99.99, 2.50, 1, 2, 3, 1, 4373059918240, 'basket-8.png');
/*!40000 ALTER TABLE `goods` ENABLE KEYS */;


-- Дамп структуры для таблица homestead.manufacturers
CREATE TABLE IF NOT EXISTS `manufacturers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы homestead.manufacturers: ~3 rows (приблизительно)
/*!40000 ALTER TABLE `manufacturers` DISABLE KEYS */;
INSERT INTO `manufacturers` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'Euroschirm', NULL, NULL),
	(2, 'ODESSA CABLE WORKS', NULL, NULL),
	(3, 'YUZHMASH', NULL, NULL);
/*!40000 ALTER TABLE `manufacturers` ENABLE KEYS */;


-- Дамп структуры для таблица homestead.merchants
CREATE TABLE IF NOT EXISTS `merchants` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы homestead.merchants: ~2 rows (приблизительно)
/*!40000 ALTER TABLE `merchants` DISABLE KEYS */;
INSERT INTO `merchants` (`id`, `category`, `email`, `created_at`, `updated_at`) VALUES
	(1, 'Accessoires', '250uxgJh66@test.com', NULL, NULL),
	(2, 'Regenschirme', 'hjCPOktXmM@test.com', NULL, NULL);
/*!40000 ALTER TABLE `merchants` ENABLE KEYS */;


-- Дамп структуры для таблица homestead.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы homestead.migrations: ~9 rows (приблизительно)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2017_10_24_185142_create_merchants_table', 1),
	(4, '2017_10_24_185204_create_manufacturers_table', 1),
	(5, '2017_10_24_185224_create_currencies_table', 1),
	(6, '2017_10_24_185235_create_programs_table', 1),
	(7, '2017_10_24_185440_create_goods_table', 1),
	(8, '2017_10_24_203914_up_goods_table', 1),
	(9, '2017_10_25_103351_up_goods_for_id_table', 2),
	(10, '2017_10_26_110118_up_goods_for_nullable_fields', 3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;


-- Дамп структуры для таблица homestead.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы homestead.password_resets: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;


-- Дамп структуры для таблица homestead.programs
CREATE TABLE IF NOT EXISTS `programs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы homestead.programs: ~3 rows (приблизительно)
/*!40000 ALTER TABLE `programs` DISABLE KEYS */;
INSERT INTO `programs` (`id`, `name`, `code`, `created_at`, `updated_at`) VALUES
	(1, 'Fashion24 DE', 'zGWDI', NULL, NULL),
	(2, 'Fashion24 RU', 'NpYW0', NULL, NULL),
	(3, 'Fashion24 UA', 'y0BaV', NULL, NULL);
/*!40000 ALTER TABLE `programs` ENABLE KEYS */;


-- Дамп структуры для таблица homestead.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы homestead.users: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'support', 'support@gmail.com', '$2y$10$cjLoZuyoLTISK8N0VORayeYvOXV0h1cs542I0NsJPezXAZ3ZRiX6q', 'I9hdNs58ghsV24r0h2Kn1uSaSxwViAMhYWSPzPJNwLyPHx1dyyCLnOf6u8YV', '2017-10-25 14:01:30', '2017-10-25 14:01:30');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
