-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2021 at 01:53 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `temicandles`
--

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `route` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` smallint(6) NOT NULL,
  `menu_type_id` bigint(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `route`, `name`, `order`, `menu_type_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', 'Admin panel', 1, 1, NULL, NULL, NULL),
(2, 'productsHome', 'Mirišljave sveće', 30, 1, NULL, NULL, NULL),
(3, 'home', 'Početna', 20, 1, NULL, NULL, NULL),
(4, 'cart.index', 'Korpa', 40, 1, NULL, NULL, NULL),
(5, '#', 'Prijavi se', 60, 1, NULL, NULL, NULL),
(6, '#', 'Registruj se', 70, 1, NULL, NULL, NULL),
(7, 'logout', 'Odjavi se', 100, 1, NULL, NULL, NULL),
(8, 'contact', 'Kontakt', 50, 1, NULL, '2021-05-04 11:58:42', '2021-05-04 11:58:42'),
(10, 'https://www.facebook.com', 'test', 15, 2, NULL, '2021-05-02 14:13:55', '2021-05-02 14:13:55'),
(11, 'https://www.instagram.com/temicandles/', 'Instagram', 1, 2, NULL, NULL, NULL),
(12, 'https://stefan-bogdanovski.github.io/Technology/about.html', 'Autor', 10, 2, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menus_roles`
--

CREATE TABLE `menus_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus_roles`
--

INSERT INTO `menus_roles` (`id`, `menu_id`, `role_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, NULL, NULL, NULL),
(2, 3, 1, NULL, NULL, NULL),
(4, 2, 1, NULL, NULL, NULL),
(5, 4, 1, NULL, NULL, NULL),
(6, 7, 1, NULL, NULL, NULL),
(7, 3, 2, NULL, NULL, NULL),
(8, 2, 2, NULL, NULL, NULL),
(9, 4, 2, NULL, NULL, NULL),
(10, 7, 2, NULL, NULL, NULL),
(11, 3, 3, NULL, NULL, NULL),
(12, 2, 3, NULL, NULL, NULL),
(13, 5, 3, NULL, NULL, NULL),
(14, 6, 3, NULL, NULL, NULL),
(15, 8, 1, NULL, '2021-05-04 11:58:42', '2021-05-04 11:58:42'),
(16, 8, 2, NULL, '2021-05-04 11:58:42', '2021-05-04 11:58:42'),
(17, 8, 3, NULL, '2021-05-04 11:58:42', '2021-05-04 11:58:42'),
(18, 10, 1, '2021-05-02 12:35:45', '2021-05-02 14:13:55', '2021-05-02 14:13:55'),
(19, 10, 2, '2021-05-02 12:35:45', '2021-05-02 14:13:55', '2021-05-02 14:13:55'),
(20, 10, 3, '2021-05-02 12:35:45', '2021-05-02 14:13:55', '2021-05-02 14:13:55'),
(21, 11, 1, '2021-05-04 11:39:05', '2021-05-04 11:39:05', NULL),
(22, 11, 2, '2021-05-04 11:39:05', '2021-05-04 11:39:05', NULL),
(23, 11, 3, '2021-05-04 11:39:05', '2021-05-04 11:39:05', NULL),
(24, 12, 1, '2021-05-04 11:57:26', '2021-05-04 11:57:26', NULL),
(25, 12, 2, '2021-05-04 11:57:26', '2021-05-04 11:57:26', NULL),
(26, 12, 3, '2021-05-04 11:57:27', '2021-05-04 11:57:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menu_types`
--

CREATE TABLE `menu_types` (
  `id` bigint(10) NOT NULL,
  `type_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menu_types`
--

INSERT INTO `menu_types` (`id`, `type_name`, `created_at`, `deleted_at`) VALUES
(1, 'website links', '2021-05-03 15:37:50', NULL),
(2, 'social links', '2021-05-03 15:38:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2021_03_06_161633_make_users_table', 1),
(2, '2021_03_06_162642_make_roles_table', 1),
(3, '2021_03_06_162957_make_users_roles_table', 1),
(4, '2021_03_06_171335_make_menus_table', 1),
(5, '2021_03_06_173912_make_menus_roles_table', 1),
(6, '2021_03_09_180852_make_products_table', 2),
(7, '2021_03_09_184702_make_sizes_table', 2),
(8, '2021_03_09_185018_make_types_table', 2),
(10, '2021_03_09_190450_make_pricelists_table', 2),
(11, '2021_03_10_144617_make_product_images_table', 2),
(12, '2021_03_10_155522_make_notes_table', 2),
(13, '2021_03_10_155752_make_products_notes_table', 2),
(14, '2021_03_13_230403_make_products_types_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Jabuka', NULL, NULL, NULL),
(2, 'Cimet', NULL, NULL, NULL),
(3, 'Kokos', NULL, NULL, NULL),
(4, 'Narandža', NULL, NULL, NULL),
(5, 'Čokolada', NULL, NULL, NULL),
(6, 'Kafa', NULL, NULL, NULL),
(7, 'Orhideja vanile', NULL, NULL, NULL),
(8, 'Маракуја', NULL, NULL, NULL),
(9, 'Mošus', NULL, NULL, NULL),
(10, 'Sandalovina', NULL, NULL, NULL),
(11, 'Amber', NULL, '2021-05-02 09:41:39', NULL),
(12, 'kivi', '2021-05-02 08:31:35', '2021-05-02 09:42:28', '2021-05-02 09:42:28');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment_type` varchar(40) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `payment_type`) VALUES
(1, 'Pouzećem');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opis` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `opis`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Bombshell', 'Bombshell je sveća koja je dobila ime po čuvenom parfemu Viktoria\'s Secret. Sveća pored ostalih elemenata sadrži pomenuti parfem i odaje neverovatan miris koji će vas oboriti s nogu.', NULL, '2021-05-05 09:07:30', NULL),
(2, 'Crystal noir', 'Crystal noir je sveća koja je dobila po čuvenom parfemu Versace parfema. Elegantan miris koji odaje umirujuću romantičnu notu.', NULL, '2021-05-05 09:09:39', NULL),
(3, 'Milky coco', 'Milky coco je jedna on naših prvih sveća koja se pokazala neverovatno. Jedna od naših najprodavanijih sveća pogotovo za ljubitelje kokosa.', NULL, '2021-05-05 09:11:32', NULL),
(4, 'Winter magic', 'Winter magic je sveća koja ispunjava celu vašu prostoriju mirisnom notom koja je spojena jabukom i cimetom. Kombinacija koju ne smete propustiti.', NULL, '2021-05-05 09:13:44', NULL),
(5, 'Chocolate passion', 'Chocolate passion je sveća pre svega namenjana za ljubitelje čokolade. Miris koji odaje ova sveća nateraće Vas da pomislite da jedete čokoladu.', NULL, '2021-05-05 09:14:58', NULL),
(6, 'Sweet orange', 'Sweet orange je jedna od sveća koja odaje veoma jaku mirisnu notu narandže. Preporuka za prostorije gde se nalazi duvanski dim.', NULL, '2021-05-05 09:16:12', NULL),
(7, 'Coffee dream', 'Coffee dream je jedna od sveća koja će Vas naterati da pomislite da pijete kafu. Idealno za ljubitelje kafe.', NULL, '2021-05-05 09:17:03', NULL),
(8, 'Vanilla Sky', 'Vanilla Sky', '2021-04-11 12:38:00', '2021-05-01 09:08:52', '2021-05-01 09:08:52'),
(10, 'Vanillaa Sky', 'Vanilla Sky', '2021-04-13 17:09:28', '2021-05-01 07:22:12', '2021-05-01 07:22:12');

-- --------------------------------------------------------

--
-- Table structure for table `products_notes`
--

CREATE TABLE `products_notes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `note_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_notes`
--

INSERT INTO `products_notes` (`id`, `product_id`, `note_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 7, 6, NULL, '2021-05-05 09:17:03', '2021-05-05 09:17:03'),
(2, 5, 5, NULL, '2021-05-05 09:14:58', '2021-05-05 09:14:58'),
(3, 3, 3, NULL, '2021-05-05 09:11:32', '2021-05-05 09:11:32'),
(4, 6, 4, NULL, '2021-05-05 09:16:12', '2021-05-05 09:16:12'),
(5, 4, 2, NULL, '2021-05-05 09:13:44', '2021-05-05 09:13:44'),
(6, 4, 1, NULL, '2021-05-05 09:13:44', '2021-05-05 09:13:44'),
(7, 1, 8, NULL, '2021-05-05 09:07:30', '2021-05-05 09:07:30'),
(8, 1, 7, NULL, '2021-05-05 09:07:30', '2021-05-05 09:07:30'),
(9, 2, 9, NULL, '2021-05-05 09:09:39', '2021-05-05 09:09:39'),
(10, 2, 10, NULL, '2021-05-05 09:09:39', '2021-05-05 09:09:39'),
(11, 2, 11, NULL, '2021-05-05 09:09:39', '2021-05-05 09:09:39'),
(12, 8, 11, '2021-04-11 12:38:00', '2021-05-01 09:08:52', '2021-05-01 09:08:52'),
(13, 4, 1, '2021-04-11 16:52:24', '2021-05-05 09:13:44', '2021-05-05 09:13:44'),
(14, 4, 2, '2021-04-11 16:52:24', '2021-05-05 09:13:44', '2021-05-05 09:13:44'),
(15, 4, 1, '2021-04-11 16:53:13', '2021-05-05 09:13:44', '2021-05-05 09:13:44'),
(16, 4, 2, '2021-04-11 16:53:13', '2021-05-05 09:13:44', '2021-05-05 09:13:44'),
(17, 4, 1, '2021-04-11 16:57:11', '2021-05-05 09:13:44', '2021-05-05 09:13:44'),
(18, 4, 2, '2021-04-11 16:57:11', '2021-05-05 09:13:44', '2021-05-05 09:13:44'),
(19, 4, 1, '2021-04-11 16:57:20', '2021-05-05 09:13:44', '2021-05-05 09:13:44'),
(20, 4, 2, '2021-04-11 16:57:20', '2021-05-05 09:13:44', '2021-05-05 09:13:44'),
(21, 1, 7, '2021-04-11 16:57:43', '2021-05-05 09:07:30', '2021-05-05 09:07:30'),
(22, 1, 8, '2021-04-11 16:57:43', '2021-05-05 09:07:30', '2021-05-05 09:07:30'),
(23, 1, 7, '2021-04-11 16:57:52', '2021-05-05 09:07:30', '2021-05-05 09:07:30'),
(24, 1, 8, '2021-04-11 16:57:52', '2021-05-05 09:07:30', '2021-05-05 09:07:30'),
(25, 10, 5, '2021-04-13 17:09:28', '2021-05-01 07:22:12', '2021-05-01 07:22:12'),
(26, 3, 3, '2021-04-13 17:10:32', '2021-05-05 09:11:32', '2021-05-05 09:11:32'),
(27, 2, 9, '2021-05-01 10:02:59', '2021-05-05 09:09:39', '2021-05-05 09:09:39'),
(28, 2, 10, '2021-05-01 10:02:59', '2021-05-05 09:09:39', '2021-05-05 09:09:39'),
(29, 2, 11, '2021-05-01 10:02:59', '2021-05-05 09:09:39', '2021-05-05 09:09:39'),
(30, 1, 7, '2021-05-05 09:07:30', '2021-05-05 09:07:30', NULL),
(31, 1, 8, '2021-05-05 09:07:30', '2021-05-05 09:07:30', NULL),
(32, 2, 9, '2021-05-05 09:09:39', '2021-05-05 09:09:39', NULL),
(33, 2, 10, '2021-05-05 09:09:39', '2021-05-05 09:09:39', NULL),
(34, 2, 11, '2021-05-05 09:09:39', '2021-05-05 09:09:39', NULL),
(35, 3, 3, '2021-05-05 09:11:32', '2021-05-05 09:11:32', NULL),
(36, 4, 1, '2021-05-05 09:13:44', '2021-05-05 09:13:44', NULL),
(37, 4, 2, '2021-05-05 09:13:44', '2021-05-05 09:13:44', NULL),
(38, 5, 5, '2021-05-05 09:14:58', '2021-05-05 09:14:58', NULL),
(39, 6, 4, '2021-05-05 09:16:12', '2021-05-05 09:16:12', NULL),
(40, 7, 6, '2021-05-05 09:17:03', '2021-05-05 09:17:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products_sizes`
--

CREATE TABLE `products_sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `size_id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_sizes`
--

INSERT INTO `products_sizes` (`id`, `product_id`, `size_id`, `price`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, '500', NULL, '2021-05-05 09:07:30', NULL),
(2, 1, 2, '700', NULL, NULL, NULL),
(3, 2, 1, '500', NULL, '2021-05-05 09:09:39', NULL),
(4, 2, 2, '700', NULL, NULL, NULL),
(5, 3, 1, '450', NULL, '2021-05-05 09:11:32', NULL),
(6, 3, 2, '600', NULL, NULL, NULL),
(7, 4, 1, '300', NULL, '2021-05-05 09:13:44', NULL),
(8, 4, 2, '500', NULL, NULL, NULL),
(9, 5, 1, '400', NULL, '2021-05-05 09:14:58', NULL),
(10, 5, 2, '600', NULL, NULL, NULL),
(11, 6, 1, '300', NULL, '2021-05-05 09:16:12', NULL),
(12, 6, 2, '500', NULL, NULL, NULL),
(13, 7, 1, '400', NULL, '2021-05-05 09:17:03', NULL),
(14, 7, 2, '600', NULL, NULL, NULL),
(15, 8, 1, '400', '2021-04-11 12:38:00', '2021-05-01 09:08:52', '2021-05-01 09:08:52'),
(17, 10, 1, '400', '2021-04-13 17:09:28', '2021-05-01 07:22:12', '2021-05-01 07:22:12');

-- --------------------------------------------------------

--
-- Table structure for table `products_types`
--

CREATE TABLE `products_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `type_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_types`
--

INSERT INTO `products_types` (`id`, `product_id`, `type_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, NULL, '2021-05-05 09:07:30', NULL),
(2, 2, 1, NULL, '2021-05-05 09:09:39', NULL),
(3, 3, 2, NULL, '2021-05-05 09:11:32', NULL),
(4, 4, 2, NULL, '2021-05-05 09:13:44', NULL),
(5, 5, 2, NULL, '2021-05-05 09:14:58', NULL),
(6, 6, 2, NULL, '2021-05-05 09:16:12', NULL),
(7, 7, 2, NULL, '2021-05-05 09:17:03', NULL),
(10, 10, 2, '2021-04-13 17:09:28', '2021-05-01 07:22:12', '2021-05-01 07:22:12');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `src` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `src`, `product_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'bombshell.jpg', 1, NULL, NULL, NULL),
(2, 'crystal_noir.jpg', 2, NULL, NULL, NULL),
(3, 'milky_coco.jpg', 3, NULL, NULL, NULL),
(4, 'winter_magic.jpg', 4, NULL, '2021-04-11 16:57:11', '2021-04-11 16:57:11'),
(5, 'chocolate_passion.jpg', 5, NULL, NULL, NULL),
(6, 'sweet_orange.jpeg', 6, NULL, NULL, NULL),
(7, 'coffee_dream.jpg', 7, NULL, NULL, NULL),
(8, '607309c857a9d_1618151880.jpg', 8, '2021-04-11 12:38:00', '2021-05-01 09:08:52', '2021-05-01 09:08:52'),
(9, '60734599ca51a_1618167193.jpg', 4, '2021-04-11 16:53:13', '2021-04-11 16:57:11', '2021-04-11 16:57:11'),
(10, '60734687b0780_1618167431.jpg', 4, '2021-04-11 16:57:11', '2021-04-11 16:57:11', NULL),
(11, '6075ec689aead_1618340968.jpg', 10, '2021-04-13 17:09:28', '2021-05-01 07:22:12', '2021-05-01 07:22:12');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order`
--

CREATE TABLE `purchase_order` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment_id` bigint(20) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `phone` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `township` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `total` decimal(30,0) NOT NULL,
  `delivery` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `purchase_order`
--

INSERT INTO `purchase_order` (`id`, `payment_id`, `date`, `phone`, `township`, `city`, `address`, `total`, `delivery`) VALUES
(1, 1, '2021-05-04 13:20:01', '+38162123456', 'Pancevo', 'Pancevo', 'Lava Tolstoja 5', '500', 'In progress'),
(2, 1, '2021-05-04 13:31:51', '+38162123456', 'Pancevo', 'Pancevo', 'Lava Tolstoja 5', '1150', 'In progress');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', NULL, NULL, NULL),
(2, 'User', NULL, NULL, NULL),
(3, 'Guest', NULL, NULL, NULL),
(4, 'Dizajnerrr', '2021-05-02 15:02:53', '2021-05-02 15:08:35', '2021-05-02 15:08:35');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `size` smallint(6) NOT NULL,
  `measurementUnit` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `size`, `measurementUnit`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 200, 'ml', NULL, '2021-05-02 10:29:09', NULL),
(2, 314, 'ml', NULL, NULL, NULL),
(3, 500, 'ml', NULL, '2021-05-02 10:13:14', '2021-05-02 10:13:14'),
(4, 600, 'ml', '2021-05-02 10:07:57', '2021-05-02 10:11:13', '2021-05-02 10:11:13'),
(5, 700, 'ml', '2021-05-02 10:09:57', '2021-05-02 10:17:07', '2021-05-02 10:17:07');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Parfimisane', NULL, NULL, NULL),
(2, 'Aromatične', NULL, NULL, NULL),
(3, 'Test123', '2021-05-02 11:38:15', '2021-05-02 11:41:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logged_in` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `email`, `password`, `logged_in`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Korisnik', 'Korisnik', 'admin@gmail.com', '716b64c0f6bad9ac405aab3f00958dd1', 0, '2021-03-14 17:54:25', '2021-05-05 09:17:47', NULL),
(2, 'Perkan', 'Perivojevic', 'perkan@gmail.com', 'a7be72d58029707f81b90ef7177b1418', 0, '2021-03-14 20:50:06', '2021-04-01 16:14:19', NULL),
(3, 'Miloje', 'Milivojevic', 'miloje@gmail.com', 'a8ee5780796a58dacc8cadc7dfe04763', 0, '2021-03-14 20:50:32', '2021-05-04 12:16:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_basket`
--

CREATE TABLE `users_basket` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_size_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(10) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `purchase_order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users_basket`
--

INSERT INTO `users_basket` (`id`, `product_size_id`, `quantity`, `user_id`, `purchase_order_id`, `status`, `created_at`, `updated_at`) VALUES
(10, 3, 1, 1, 1, 'Ordered', '2021-05-04 13:11:31', '2021-05-04 13:20:01'),
(11, 2, 1, 1, 2, 'Ordered', '2021-05-04 13:31:27', '2021-05-04 13:31:52'),
(12, 5, 1, 1, 2, 'Ordered', '2021-05-04 13:31:31', '2021-05-04 13:31:52');

-- --------------------------------------------------------

--
-- Table structure for table `users_roles`
--

CREATE TABLE `users_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL DEFAULT 2,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_roles`
--

INSERT INTO `users_roles` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 3, 2, '2021-03-14 20:50:32', '2021-05-02 10:54:43', '2021-05-02 10:54:43'),
(15, 2, 2, '2021-04-01 16:14:18', '2021-04-01 16:14:18', NULL),
(18, 1, 1, '2021-05-04 12:01:48', '2021-05-04 12:01:48', NULL),
(19, 1, 2, '2021-05-04 12:01:48', '2021-05-04 12:01:48', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_type_id` (`menu_type_id`);

--
-- Indexes for table `menus_roles`
--
ALTER TABLE `menus_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menus_roles_menu_id_index` (`menu_id`),
  ADD KEY `menus_roles_role_id_index` (`role_id`);

--
-- Indexes for table `menu_types`
--
ALTER TABLE `menu_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_notes`
--
ALTER TABLE `products_notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_notes_product_id_index` (`product_id`),
  ADD KEY `products_notes_note_id_index` (`note_id`);

--
-- Indexes for table `products_sizes`
--
ALTER TABLE `products_sizes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_size_product_id_index` (`product_id`),
  ADD KEY `product_size_size_id_index` (`size_id`);

--
-- Indexes for table `products_types`
--
ALTER TABLE `products_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_types_products_id_index` (`product_id`),
  ADD KEY `products_types_types_id_index` (`type_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_products_id_index` (`product_id`);

--
-- Indexes for table `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_id` (`payment_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `users_basket`
--
ALTER TABLE `users_basket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_size_id` (`product_size_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `purchase_order_id` (`purchase_order_id`);

--
-- Indexes for table `users_roles`
--
ALTER TABLE `users_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_roles_user_id_index` (`user_id`),
  ADD KEY `users_roles_role_id_index` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `menus_roles`
--
ALTER TABLE `menus_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `menu_types`
--
ALTER TABLE `menu_types`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products_notes`
--
ALTER TABLE `products_notes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `products_sizes`
--
ALTER TABLE `products_sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `products_types`
--
ALTER TABLE `products_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `purchase_order`
--
ALTER TABLE `purchase_order`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users_basket`
--
ALTER TABLE `users_basket`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users_roles`
--
ALTER TABLE `users_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_ibfk_1` FOREIGN KEY (`menu_type_id`) REFERENCES `menu_types` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `menus_roles`
--
ALTER TABLE `menus_roles`
  ADD CONSTRAINT `menus_roles_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `menus_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `products_notes`
--
ALTER TABLE `products_notes`
  ADD CONSTRAINT `products_notes_note_id_foreign` FOREIGN KEY (`note_id`) REFERENCES `notes` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `products_notes_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `products_sizes`
--
ALTER TABLE `products_sizes`
  ADD CONSTRAINT `product_size_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `product_size_size_id_foreign` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `products_types`
--
ALTER TABLE `products_types`
  ADD CONSTRAINT `products_types_products_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `products_types_types_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_products_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD CONSTRAINT `purchase_order_ibfk_1` FOREIGN KEY (`payment_id`) REFERENCES `payment` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `users_basket`
--
ALTER TABLE `users_basket`
  ADD CONSTRAINT `users_basket_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `users_basket_ibfk_2` FOREIGN KEY (`product_size_id`) REFERENCES `products_sizes` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `users_basket_ibfk_3` FOREIGN KEY (`purchase_order_id`) REFERENCES `purchase_order` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `users_roles`
--
ALTER TABLE `users_roles`
  ADD CONSTRAINT `users_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `users_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
