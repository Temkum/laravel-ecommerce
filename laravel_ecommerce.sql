-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 21, 2022 at 02:19 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `attribute_values`
--

CREATE TABLE `attribute_values` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prod_attribute_id` bigint(20) UNSIGNED DEFAULT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Controllers', 'controllers', '2022-01-10 11:26:35', '2022-01-11 00:35:36'),
(2, 'Laptops', 'laptops', '2022-01-10 11:26:35', '2022-01-11 00:39:03'),
(3, 'TV', 'tv', '2022-01-10 11:26:35', '2022-01-11 00:40:01'),
(4, 'Smart Phones', 'smart-phones', '2022-01-10 11:26:35', '2022-01-11 00:40:21'),
(6, 'Gaggets', 'gaggets', '2022-01-10 11:26:35', '2022-01-11 11:56:51'),
(7, 'Levono', 'levono', '2022-01-13 23:51:30', '2022-01-13 23:51:30'),
(8, 'Samsung TV', 'samsung-tv', '2022-01-14 00:03:54', '2022-01-14 00:47:55'),
(9, 'Fashion', 'fashion', '2022-01-20 13:37:32', '2022-01-20 13:37:32');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('fixed','percent') COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` decimal(8,2) NOT NULL,
  `cart_value` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expiry_date` date NOT NULL DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `home_categories`
--

CREATE TABLE `home_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `select_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_of_products` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `home_sliders`
--

CREATE TABLE `home_sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_05_08_135644_create_sessions_table', 1),
(7, '2021_05_09_123336_create_categories_table', 1),
(8, '2021_05_09_123439_create_products_table', 1),
(9, '2021_05_16_130133_create_home_sliders_table', 1),
(10, '2021_05_17_145416_create_home_categories_table', 1),
(11, '2021_05_18_201554_create_sales_table', 1),
(12, '2021_05_21_120203_create_coupons_table', 1),
(13, '2021_05_22_224523_add_expiry_date_to_coupons_table', 1),
(14, '2021_05_22_233808_create_orders_table', 1),
(15, '2021_05_22_233838_create_order_items_table', 1),
(16, '2021_05_22_233933_create_shippings_table', 1),
(17, '2021_05_22_233956_create_transactions_table', 1),
(18, '2021_05_24_003027_add_tax_to_orders_table', 1),
(19, '2021_05_25_001142_add_delivered_cancelled_date_to_orders_tables', 1),
(20, '2021_05_25_104618_create_reviews_table', 1),
(21, '2021_05_25_105239_add_rev_status_to_order_items_table', 1),
(22, '2021_06_13_225346_create_contacts_table', 1),
(23, '2021_06_21_120613_create_settings_table', 1),
(24, '2022_01_12_001838_create_shoppingcart_table', 2),
(25, '2022_01_14_003457_create_subcategories_table', 3),
(26, '2022_01_14_031652_add_subcategory_id_to_products_table', 4),
(27, '2022_01_14_195104_create_profiles_table', 5),
(28, '2022_01_15_112945_create_product_attributes_table', 6),
(29, '2022_01_15_125027_create_attribute_values_table', 7),
(30, '2022_01_18_182613_add_options_to_order_items_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `subtotal` decimal(8,2) NOT NULL,
  `discount` decimal(8,2) NOT NULL DEFAULT 0.00,
  `total` decimal(8,2) NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `line1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `line2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('ordered','delivered','cancelled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ordered',
  `is_shipping_different` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tax` decimal(8,2) NOT NULL,
  `date_delivered` date DEFAULT NULL,
  `date_cancelled` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `subtotal`, `discount`, `total`, `first_name`, `last_name`, `mobile`, `email`, `line1`, `line2`, `state`, `city`, `zip_code`, `country`, `status`, `is_shipping_different`, `created_at`, `updated_at`, `tax`, `date_delivered`, `date_cancelled`) VALUES
(1, 1, '408.00', '0.00', '493.68', 'Dylan Kinney', 'Leslie Bullock', '21', 'rarudu@mailinator.com', 'Eum iusto consequat', 'Dolore iste quo dolo', 'Est eos illum vel ', 'Ex et nisi perspicia', '38485', 'Repudiandae est ut v', 'delivered', 0, '2022-01-10 12:45:05', '2022-01-10 22:10:56', '85.68', '2022-01-11', NULL),
(2, 1, '432.00', '0.00', '522.72', 'Eaton Medina', 'Brandon Shaffer', '51', 'maty@mailinator.com', 'Sint ullamco ad quam', 'Rerum cum fugit nos', 'Similique beatae min', 'Non elit et odio ma', '18785', 'Et beatae distinctio', 'cancelled', 0, '2022-01-10 22:29:43', '2022-01-10 22:31:17', '90.72', NULL, '2022-01-11'),
(3, 1, '432.00', '0.00', '522.72', 'Eaton Medina', 'Brandon Shaffer', '51', 'maty@mailinator.com', 'Sint ullamco ad quam', 'Rerum cum fugit nos', 'Similique beatae min', 'Non elit et odio ma', '18785', 'Et beatae distinctio', 'delivered', 0, '2022-01-10 22:30:01', '2022-01-10 22:31:41', '90.72', '2022-01-11', NULL),
(4, 1, '1071.00', '0.00', '1295.91', 'Dane Mccoy', 'Liberty Sellers', '237675827455', 'tikay86@gmail.com', 'In sit magnam earum', 'Consequatur tenetur ', 'Sed rerum maiores at', 'Dolorum voluptate nu', '00237', 'Ipsa laborum Iste ', 'ordered', 0, '2022-01-11 18:44:38', '2022-01-11 18:44:38', '224.91', NULL, NULL),
(5, 2, '400.00', '0.00', '484.00', 'Wylie Douglas', 'Bruno Noble', '32', 'pohyhipi@mailinator.com', 'Cillum a fugiat rep', 'In ipsum dolorem qu', 'Laboris dolore quae ', 'Libero placeat anim', '50993', 'Nostrud et est dolo', 'delivered', 0, '2022-01-11 23:58:53', '2022-01-14 18:48:07', '84.00', '2022-01-14', NULL),
(6, 2, '408.00', '0.00', '493.68', 'Emma Gray', 'Oprah Mcdonald', '76', 'mekapinu@mailinator.com', 'Aut dolor sint ipsa', 'Magni officia cumque', 'Quia saepe quo animi', 'Et aliquip irure duc', '64181', 'Sint quia velit eu', 'delivered', 0, '2022-01-14 18:45:07', '2022-01-14 18:48:04', '85.68', '2022-01-14', NULL),
(7, 1, '560.00', '0.00', '677.60', 'Roanna Greene', 'Acton Espinoza', '54', 'xabawo@mailinator.com', 'Soluta aperiam illo ', 'Id est et veniam ', 'Dolor non quidem in ', 'Deleniti dolores fug', '55938', 'Lorem cillum rerum i', 'ordered', 0, '2022-01-18 18:51:19', '2022-01-18 18:51:19', '117.60', NULL, NULL),
(8, 2, '800.00', '0.00', '968.00', 'Keely Everett', 'Rhea Walter', '78', 'zebyre@mailinator.com', 'Ipsa ad fuga Ea ex', 'Qui labore consequat', 'Aut pariatur Ut eiu', 'Animi natus est ips', '40756', 'Quis earum officia r', 'cancelled', 0, '2022-01-20 14:48:12', '2022-01-21 11:18:55', '168.00', NULL, '2022-01-21'),
(9, 2, '216.00', '0.00', '261.36', 'Edan Townsend', 'Camille Espinoza', '67', 'vusa@mailinator.com', 'Enim duis aliquam ne', 'Dolor aut consequat', 'Repellendus Dolorum', 'Ut neque eligendi pa', '96588', 'Iure aliqua Nihil o', 'ordered', 0, '2022-01-21 11:25:23', '2022-01-21 11:25:23', '45.36', NULL, NULL),
(10, 2, '451.00', '0.00', '545.71', 'Lila Hutchinson', 'Tamara Whitney', '16', 'sysiqyde@mailinator.com', 'Quas non voluptatem', 'Eligendi sint ut qu', 'Ut dolore dolore ad ', 'Laboris et qui anim ', '27694', 'Proident dolores la', 'ordered', 0, '2022-01-21 11:25:59', '2022-01-21 11:25:59', '94.71', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rev_status` tinyint(1) NOT NULL DEFAULT 0,
  `options` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `product_id`, `order_id`, `price`, `quantity`, `created_at`, `updated_at`, `rev_status`, `options`) VALUES
(1, 1, 1, '408.00', 1, '2022-01-10 12:45:05', '2022-01-10 12:45:05', 0, NULL),
(2, 2, 2, '216.00', 2, '2022-01-10 22:29:43', '2022-01-10 22:29:43', 0, NULL),
(3, 2, 3, '216.00', 2, '2022-01-10 22:30:01', '2022-01-10 22:30:01', 0, NULL),
(4, 3, 4, '402.00', 1, '2022-01-11 18:44:38', '2022-01-11 18:44:38', 0, NULL),
(5, 2, 4, '216.00', 1, '2022-01-11 18:44:38', '2022-01-11 18:44:38', 0, NULL),
(6, 10, 4, '453.00', 1, '2022-01-11 18:44:38', '2022-01-11 18:44:38', 0, NULL),
(7, 7, 5, '400.00', 1, '2022-01-11 23:58:53', '2022-01-15 01:17:35', 1, NULL),
(8, 1, 6, '408.00', 1, '2022-01-14 18:45:07', '2022-01-15 01:20:52', 1, NULL),
(9, 8, 7, '76.00', 2, '2022-01-18 18:51:19', '2022-01-18 18:51:19', 0, NULL),
(10, 1, 7, '408.00', 1, '2022-01-18 18:51:19', '2022-01-18 18:51:19', 0, NULL),
(11, 24, 8, '800.00', 1, '2022-01-20 14:48:12', '2022-01-20 14:48:12', 0, NULL),
(12, 2, 9, '216.00', 1, '2022-01-21 11:25:23', '2022-01-21 11:25:23', 0, NULL),
(13, 7, 10, '451.00', 1, '2022-01-21 11:25:59', '2022-01-21 11:25:59', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('user@gmail.com', '$2y$10$bCaWqruIuufsLI5snHwiCOavxqEH6wgCMKE9HvAQHEF2uyMu6L0CG', '2022-01-11 11:46:31');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `regular_price` decimal(8,2) NOT NULL,
  `sale_price` decimal(8,2) DEFAULT NULL,
  `SKU` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock_status` enum('in_stock','out_of_stock') COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `quantity` int(10) UNSIGNED NOT NULL DEFAULT 10,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `images` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `subcategory_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `short_description`, `description`, `regular_price`, `sale_price`, `SKU`, `stock_status`, `featured`, `quantity`, `image`, `images`, `category_id`, `created_at`, `updated_at`, `subcategory_id`) VALUES
(1, 'Wireless controller', 'wireless-controller', 'Collaboratively innovate functionalized e-services before world-class leadership. ', 'Seamlessly plagiarize integrated process improvements via bleeding-edge alignments. Enthusiastically grow compelling metrics without superior total linkage. Assertively enable inexpensive imperatives vis-a-vis virtual results. Dramatically.', '408.00', '300.00', 'DIGI146', 'in_stock', 0, 138, 'digital_18.jpg', NULL, 1, '2022-01-10 11:26:35', '2022-01-11 00:37:38', NULL),
(2, 'laptop 1', 'laptop-1', 'Voluptas delectus et amet harum ducimus nostrum nihil sunt. Explicabo assumenda ut repellat quidem eius laudantium omnis. Saepe pariatur omnis vero aliquid ipsam.', 'Quam facilis praesentium aperiam voluptas occaecati atque eum. Quo nobis porro facilis accusantium et. Facere quos voluptates explicabo magnam maxime voluptas reprehenderit. Sed quia esse omnis saepe corrupti et. Unde velit vel iure omnis repellendus aut labore. Itaque autem est dolor et porro et. Id corporis culpa facilis qui aut dolorum.', '216.00', '200.00', 'DIGI297', 'in_stock', 0, 110, 'digital_4.jpg', NULL, 2, '2022-01-10 11:26:35', '2022-01-11 00:40:46', NULL),
(3, 'Controller', 'controller', 'Et recusandae minima magnam dolores consequatur. Recusandae praesentium et sunt deserunt corrupti. Totam porro dolores repellat est vel atque sed rerum. Explicabo inventore non doloribus et unde.', 'Quis nobis deleniti placeat aut eveniet ipsa et aut. Eos et et ipsa repellendus voluptatem quis ut earum. Non hic magnam nobis rerum. Numquam ut voluptatum similique facilis. Est et impedit id in sunt. Quia aliquid quod dolorem consequatur nihil. Fugiat quam voluptas sed. Vitae sint impedit atque voluptas sit in ea. Error voluptas rerum numquam.', '402.00', '350.00', 'DIGI411', 'in_stock', 0, 199, 'digital_10.jpg', 'Controller3.jpg,Controller3.jpg', 2, '2022-01-10 11:26:35', '2022-01-11 13:27:45', NULL),
(6, 'ut voluptates quasi in', 'ut-voluptates-quasi-in', 'Dolores assumenda sit recusandae magni. Quae assumenda ut alias ut facere quia deleniti sed. Minus veritatis temporibus aut numquam aut corporis officia omnis. Veritatis non corporis harum ut velit.', 'Aperiam itaque recusandae dolor et optio quaerat. Laboriosam sequi voluptatem voluptas eos et ipsa ex. Asperiores et qui corporis fugit dicta. Voluptatem dolor doloribus ullam quo adipisci. Consequatur voluptas possimus deserunt ut voluptas beatae necessitatibus. At beatae excepturi corrupti architecto. Itaque impedit quos aperiam.', '309.00', '2500.00', 'DIGI319', 'in_stock', 0, 138, 'digital_2.jpg', NULL, 3, '2022-01-10 11:26:35', '2022-01-10 11:26:35', NULL),
(7, 'maiores libero aut voluptatum', 'maiores-libero-aut-voluptatum', 'Est quas perspiciatis harum. Maiores sunt non ab nam a ut. Quos expedita quidem est autem ducimus. Nihil inventore nihil quia minus et aut quasi.', 'Distinctio recusandae explicabo voluptas minus nesciunt consequuntur. Ab impedit omnis illo error perferendis. Voluptates qui ut velit quia temporibus vel itaque. Iure rem dicta quo odit ut sit. Cumque molestiae soluta dolores porro molestiae accusantium. Consectetur sint nihil dolores id vero deserunt molestiae voluptate.', '451.00', '400.00', 'DIGI348', 'in_stock', 0, 148, 'digital_21.jpg', NULL, 4, '2022-01-10 11:26:35', '2022-01-10 11:26:35', NULL),
(8, 'iusto nesciunt totam aliquid', 'iusto-nesciunt-totam-aliquid', 'Nesciunt et soluta occaecati nesciunt. Itaque corporis quia nobis quis earum numquam. Error inventore sed et accusantium dolorem quis. Est nam aut tempora magni. Quod occaecati qui non omnis atque.', 'Iste est quibusdam rerum quis. Animi praesentium autem dolores molestiae rerum cum est. Ut ex sit laborum fuga repudiandae consequatur. Rem ipsa molestiae iste maxime laudantium nemo. Nemo molestiae dolorem non ut praesentium. Quos sed aut qui sed eum eos aut assumenda. Facere nesciunt nulla ullam nesciunt. Explicabo vel facilis qui ad quod.', '76.00', '35.00', 'DIGI254', 'in_stock', 0, 170, 'digital_7.jpg', NULL, 2, '2022-01-10 11:26:35', '2022-01-10 11:26:35', NULL),
(9, 'molestiae dolorem quia suscipit', 'molestiae-dolorem-quia-suscipit', 'Beatae commodi iste occaecati ut maiores. Labore vitae velit error libero dolorem sed cumque. Occaecati dignissimos quia repellendus iusto et et. Enim illo tempora illum minima hic vel voluptatem.', 'Fugit explicabo suscipit pariatur sed eveniet quia. Dolor quas sed dicta et autem quaerat. Error voluptas eius et deserunt sed provident totam. Ipsam vel temporibus est ea voluptatem dolorem. Deserunt qui aut pariatur non et consequatur. Quisquam ut harum odit aut ut ut. Odio et aperiam commodi et odit dicta. Ut qui molestiae eum non rerum repellendus et. Sapiente neque ex qui reiciendis.', '183.00', '180.00', 'DIGI363', 'in_stock', 0, 146, 'digital_19.jpg', NULL, 4, '2022-01-10 11:26:35', '2022-01-10 11:26:35', NULL),
(10, 'est sed ipsa voluptas', 'est-sed-ipsa-voluptas', 'Natus ea fugiat reiciendis minima. Expedita quia odio et omnis et iure. A numquam fugit quasi accusantium voluptates. Nesciunt autem labore corrupti eos.', 'Et odio neque molestias minus. Ut atque excepturi tempore necessitatibus voluptatem unde deserunt id. Eveniet aut id maxime rerum delectus veritatis. Veritatis sunt velit quam. Mollitia recusandae consequuntur enim cupiditate officiis. Architecto cum omnis officia sit occaecati veniam. Rerum placeat asperiores tempore mollitia. Sunt officia et aperiam repellat modi.', '453.00', '200.00', 'DIGI466', 'in_stock', 0, 116, 'digital_13.jpg', NULL, 2, '2022-01-10 11:26:35', '2022-01-10 11:26:35', NULL),
(11, 'maxime occaecati voluptatem quam', 'maxime-occaecati-voluptatem-quam', 'Corporis voluptas ab nihil voluptatem in. Numquam rerum et aut. Ab blanditiis culpa doloribus dolores laboriosam modi.', 'Dicta minima adipisci voluptate minima maiores praesentium et. Dolorem eos quae facere vel labore odit. Delectus soluta voluptas sit commodi. Architecto aliquam alias quia. Autem atque commodi nostrum dolore earum et perspiciatis similique. Sunt adipisci perspiciatis quae mollitia voluptas repellendus. Autem harum doloremque fuga voluptates. Atque nam et voluptatem.', '47.00', NULL, 'DIGI202', 'in_stock', 0, 157, 'digital_3.jpg', NULL, 3, '2022-01-10 11:26:35', '2022-01-10 11:26:35', NULL),
(12, 'et exercitationem debitis earum', 'et-exercitationem-debitis-earum', 'Magnam et nihil a ex explicabo et. Praesentium omnis dolore voluptatibus dolorem ab culpa. Ducimus voluptatem eum vel. Vitae sequi magni eius earum amet nihil.', 'Tempora est ut quaerat molestiae dolor rerum. Aut eos aut itaque tenetur laudantium qui qui. Accusamus excepturi facere soluta aliquam. Aut et ex dolorem. Quisquam et ut omnis eligendi pariatur est ut. Tenetur ab occaecati vel fuga omnis odit vero. Fugit voluptatum voluptatem occaecati numquam.', '99.00', NULL, 'DIGI130', 'in_stock', 0, 148, 'digital_22.jpg', NULL, 3, '2022-01-10 11:26:35', '2022-01-10 11:26:35', NULL),
(14, 'ratione enim voluptatem natus', 'ratione-enim-voluptatem-natus', 'Aspernatur laboriosam incidunt architecto architecto aut et. Beatae porro placeat officiis consequatur.', 'Temporibus autem repellendus dignissimos error id eum. Incidunt aut sit omnis nostrum numquam accusantium non. Minima aperiam dolorem nam quidem. Aut eius in autem. Soluta nam atque et alias dolore modi quo. Fugiat quo minima cumque quis nihil. Vel totam itaque voluptas exercitationem neque molestiae. Rerum debitis iusto aspernatur blanditiis distinctio non. Ut tempora sint architecto sequi. Quae dignissimos voluptatem voluptas sed eius ipsum. Et id doloribus adipisci rerum sapiente et sit rem.', '255.00', NULL, 'DIGI175', 'in_stock', 0, 124, 'digital_15.jpg', NULL, 4, '2022-01-10 11:26:35', '2022-01-10 11:26:35', NULL),
(15, 'sequi vitae eveniet exercitationem', 'sequi-vitae-eveniet-exercitationem', 'Dicta commodi animi harum quae voluptatem distinctio dolorum. Nemo ut sit impedit est. Nulla dolorem ut quis culpa labore. Id exercitationem distinctio veritatis repudiandae.', 'Mollitia voluptatibus numquam qui eveniet perspiciatis. Sunt quam adipisci veritatis corporis fugiat ad est. Similique repellendus magni a natus soluta. Vero numquam officiis laborum doloribus aliquid. Maxime earum minus non rerum occaecati aperiam. Facere et dolores in delectus fugiat recusandae. Et quod quibusdam accusamus voluptas dicta.', '213.00', NULL, 'DIGI269', 'in_stock', 0, 167, 'digital_16.jpg', NULL, 1, '2022-01-10 11:26:35', '2022-01-10 11:26:35', NULL),
(17, 'repellat neque laudantium sed', 'repellat-neque-laudantium-sed', 'Eveniet voluptas maxime aut illum ducimus ullam voluptas consequatur. Accusantium nihil ipsam rerum et aperiam laudantium voluptatem. Autem voluptas adipisci ut dolores.', 'Magnam sunt dolorem doloribus quia. Ipsum voluptas assumenda ut. Voluptatem doloribus consequatur facilis recusandae atque reprehenderit. Voluptates recusandae porro rerum ab. Totam qui quasi dolores sequi deserunt. Debitis porro vero atque quas quas quia quia. Ad aut quo voluptatem dolore illo. Quia dolore et voluptas ipsam nulla. Qui magni porro nisi dolore.', '344.00', NULL, 'DIGI368', 'in_stock', 0, 111, 'digital_6.jpg', NULL, 2, '2022-01-10 11:26:35', '2022-01-10 11:26:35', NULL),
(18, 'et voluptatibus provident beatae', 'et-voluptatibus-provident-beatae', 'Enim et dolores aperiam minus. Molestiae fugiat qui consequuntur.', 'Quos voluptatibus qui inventore neque amet voluptatem. Porro ipsum ex libero consectetur. Amet voluptas possimus dolor harum quia vel. Quia enim aliquid optio aut beatae reprehenderit. Facilis sit qui in dolor ut. Quod sint quia at assumenda ad cumque quia. Perspiciatis maxime sed aut in commodi voluptas incidunt quos.', '452.00', NULL, 'DIGI291', 'in_stock', 0, 106, 'digital_20.jpg', NULL, 1, '2022-01-10 11:26:35', '2022-01-10 11:26:35', NULL),
(21, 'ipsa qui dolorum voluptas', 'ipsa-qui-dolorum-voluptas', 'Doloribus facere quasi accusantium vel reiciendis ab. Quos illo molestiae ratione assumenda. Quidem et atque laudantium minus distinctio blanditiis.', 'Et praesentium consequatur voluptas velit. Impedit architecto dolor ea voluptatum alias facilis sit. Provident debitis voluptas provident id rem aut voluptates. Eius rerum quo aliquam rerum omnis optio. Rerum dolores quam ut. Nostrum quia quo deleniti. Porro facilis ratione voluptatem ut. Autem harum neque magni similique rem nam recusandae sit. Ex nihil dolor deserunt quos.', '483.00', NULL, 'DIGI472', 'in_stock', 0, 116, 'digital_11.jpg', NULL, 3, '2022-01-10 11:26:35', '2022-01-10 11:26:35', NULL),
(22, 'eos consequatur ut eum', 'eos-consequatur-ut-eum', 'Earum illum occaecati sit magni totam illo. Nam cupiditate ratione et neque amet aut debitis. Aut dignissimos ipsam quia qui odio corrupti nam.', 'Fuga voluptas aperiam quia laudantium vel temporibus. Saepe ab sapiente aut minus. Et pariatur laborum minima ad deleniti fuga. Aut quia error in et a voluptatem. Est accusamus exercitationem quis quia laboriosam aut eos. Temporibus autem dolores voluptatem possimus. Id facere consequatur quos qui voluptates et.', '400.00', NULL, 'DIGI140', 'in_stock', 0, 181, 'digital_9.jpg', NULL, 2, '2022-01-10 11:26:35', '2022-01-10 11:26:35', NULL),
(24, 'Samsung S7', 'samsung-s7', 'Appropriately leverage existing low-risk high-yield expertise ', 'Efficiently architect scalable testing procedures before high standards in value. Uniquely communicate equity invested leadership skills without team driven testing procedures. Continually actualize scalable scenarios rather than premier strategic theme areas. Continually utilize client-centric infrastructures vis-a-vis global outsourcing. Credibly generate world-class networks with alternative e-tailers.\n\nContinually foster visionary scenarios through open-source data. Continually coordinate cutting-edge processes rather than viral collaboration and idea-sharing. Rapidiously restore.', '800.00', '600.00', 'SAMS8', 'in_stock', 1, 34, 'Samsung S7.jpg', ',16419019540.jpg', 4, '2022-01-11 10:52:34', '2022-01-11 10:52:34', NULL),
(26, 'Hover board', 'hover-board', '<p>Professionally promote user-centric infrastructures through competitive communities.&nbsp;</p>', '<p>Monotonectally syndicate ubiquitous bandwidth whereas an expanded array of methods of empowerment. Completely disseminate go forward partnerships after adaptive total linkage. Quickly redefine proactive niches before low-risk high-yield convergence. Dramatically productivate bricks-and-clicks web-readiness for intermandated opportunities. Conveniently maintain backward-compatible infrastructures and plug-and-play vortals.</p>\n<p>&nbsp;</p>', '1200.00', '1000.00', 'HB21', 'in_stock', 1, 2, 'Hover board.jpg', ',Hover board0.jpg,Hover board1.jpg,Hover board2.jpg,Hover board3.jpg', 6, '2022-01-11 11:52:55', '2022-01-14 11:16:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_attributes`
--

CREATE TABLE `product_attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_attributes`
--

INSERT INTO `product_attributes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Color', '2022-01-15 11:19:54', '2022-01-15 11:19:54'),
(2, 'Size', '2022-01-15 11:35:37', '2022-01-15 11:35:37'),
(3, 'Weight', '2022-01-15 11:36:23', '2022-01-15 11:36:23'),
(5, 'Dimension', '2022-01-18 22:56:09', '2022-01-18 22:56:09');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `line1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `line2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `region` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `image`, `mobile`, `line1`, `line2`, `city`, `region`, `country`, `zip`, `created_at`, `updated_at`) VALUES
(1, 2, NULL, '679947838', '+987456321', NULL, 'sanpit', 'SW', 'camer', '2365', '2022-01-14 19:53:23', '2022-01-20 15:34:06'),
(2, 3, 'User 1.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-15 00:04:00', '2022-01-15 00:05:09');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_item_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `rating`, `comment`, `order_item_id`, `created_at`, `updated_at`) VALUES
(1, 4, 'awesome', 7, '2022-01-15 01:17:35', '2022-01-15 01:17:35'),
(2, 5, 'fine mannet', 8, '2022-01-15 01:20:52', '2022-01-15 01:20:52');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sale_date` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `sale_date`, `status`, `created_at`, `updated_at`) VALUES
(1, '2022-01-13 12:00:00', 1, '2022-01-10 23:35:22', '2022-01-10 23:48:36');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('iTtsYfg4ctM73SvYb70BAOpNm6F2Qqw3aQXwmL6h', 2, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'YTo4OntzOjY6Il90b2tlbiI7czo0MDoiNk9vdExkT0hKTXNaajJHY0FWOEhpUk40YmpabjZqaUFnME5jTmZtdyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC91c2VyL2Rhc2hib2FyZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCRKRkQuTkJRMExYQkxja2RnYnBXUE5lakxLbk4wRUJsMk0vQTRVaEFFVTNmRHdYMmFCTmp5UyI7czo0OiJjYXJ0IjthOjE6e3M6ODoid2lzaGxpc3QiO086Mjk6IklsbHVtaW5hdGVcU3VwcG9ydFxDb2xsZWN0aW9uIjoyOntzOjg6IgAqAGl0ZW1zIjthOjA6e31zOjI4OiIAKgBlc2NhcGVXaGVuQ2FzdGluZ1RvU3RyaW5nIjtiOjA7fX1zOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRKRkQuTkJRMExYQkxja2RnYnBXUE5lakxLbk4wRUJsMk0vQTRVaEFFVTNmRHdYMmFCTmp5UyI7czo5OiJ1c2VyX3R5cGUiO3M6MzoiVVNSIjt9', 1642771032);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `map` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pinterest` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `email`, `phone`, `phone2`, `address`, `map`, `twitter`, `facebook`, `pinterest`, `instagram`, `youtube`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', '+237 6758 27455', '+237 6758 27455', 'Douala ', 'main road', '@softech', '/', '/', '/', '/', '2022-01-11 00:06:29', '2022-01-11 00:06:29');

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `line1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `line2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `identifier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shoppingcart`
--

INSERT INTO `shoppingcart` (`identifier`, `instance`, `content`, `created_at`, `updated_at`) VALUES
('admin@gmail.com', 'cart', 'O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', '2022-01-20 14:25:43', NULL),
('admin@gmail.com', 'wishlist', 'O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:2:{s:32:\"808821852042d8780b9f862c35c42c68\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":9:{s:5:\"rowId\";s:32:\"808821852042d8780b9f862c35c42c68\";s:2:\"id\";i:7;s:3:\"qty\";i:1;s:4:\"name\";s:29:\"maiores libero aut voluptatum\";s:5:\"price\";d:451;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";s:18:\"App\\Models\\Product\";s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:21;s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0isSaved\";b:0;}s:32:\"e42159cc9663f5856685a74d64c29a53\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":9:{s:5:\"rowId\";s:32:\"e42159cc9663f5856685a74d64c29a53\";s:2:\"id\";i:10;s:3:\"qty\";i:1;s:4:\"name\";s:21:\"est sed ipsa voluptas\";s:5:\"price\";d:453;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";s:18:\"App\\Models\\Product\";s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:21;s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0isSaved\";b:0;}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', '2022-01-13 23:25:35', NULL),
('Auth::user()->email', 'cart', 'O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', '2022-01-11 23:40:06', NULL),
('user@gmail.com', 'cart', 'O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', '2022-01-21 11:41:25', NULL),
('user@gmail.com', 'wishlist', 'O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', '2022-01-13 23:25:47', NULL),
('user1@gmail.com', 'cart', 'O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:1:{s:32:\"370d08585360f5c568b18d1f2e4ca1df\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":9:{s:5:\"rowId\";s:32:\"370d08585360f5c568b18d1f2e4ca1df\";s:2:\"id\";i:2;s:3:\"qty\";i:1;s:4:\"name\";s:8:\"laptop 1\";s:5:\"price\";d:216;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";s:18:\"App\\Models\\Product\";s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:21;s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0isSaved\";b:0;}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', '2022-01-15 01:26:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `name`, `slug`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Samsung TV', 'samsung-tv', 3, '2022-01-13 23:52:03', '2022-01-13 23:52:03'),
(2, 'Nokia', 'nokia', 4, '2022-01-13 23:53:56', '2022-01-13 23:53:56'),
(3, 'Refrigerator', 'refrigerator', 8, '2022-01-14 00:04:25', '2022-01-14 00:04:25'),
(5, 'Wide screen TV', 'wide-screen-tv', 3, '2022-01-14 02:42:07', '2022-01-14 02:42:07'),
(6, 'Hand bags', 'hand-bags', 9, '2022-01-20 13:38:04', '2022-01-20 13:38:04');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `mode` enum('cod','card','paypal') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','approved','declined','refunded') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `order_id`, `mode`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'cod', 'pending', '2022-01-10 12:45:06', '2022-01-10 12:45:06'),
(2, 1, 3, 'cod', 'pending', '2022-01-10 22:30:01', '2022-01-10 22:30:01'),
(3, 1, 4, 'cod', 'pending', '2022-01-11 18:44:38', '2022-01-11 18:44:38'),
(4, 2, 5, 'cod', 'pending', '2022-01-11 23:58:53', '2022-01-11 23:58:53'),
(5, 2, 6, 'cod', 'pending', '2022-01-14 18:45:07', '2022-01-14 18:45:07'),
(6, 1, 7, 'cod', 'pending', '2022-01-18 18:51:19', '2022-01-18 18:51:19'),
(7, 2, 8, 'cod', 'pending', '2022-01-20 14:48:12', '2022-01-20 14:48:12'),
(8, 2, 9, 'cod', 'pending', '2022-01-21 11:25:23', '2022-01-21 11:25:23'),
(9, 2, 10, 'cod', 'pending', '2022-01-21 11:25:59', '2022-01-21 11:25:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'USR' COMMENT 'User is Customer while Admin is Administrator',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `user_type`, `created_at`, `updated_at`) VALUES
(1, 'Main Admin', 'admin@gmail.com', NULL, '$2y$10$WItWMv6jelBTqzmtdwA45e8CudoyzcFnMbYF16djvWRIFOFeLbg4W', NULL, NULL, NULL, NULL, NULL, 'ADM', '2022-01-10 11:33:08', '2022-01-10 11:33:08'),
(2, 'User', 'user@gmail.com', NULL, '$2y$10$JFD.NBQ0LXBLckdgbpWPNejLKnN0EBl2M/A4UhAEU3fDwX2aBNjyS', NULL, NULL, NULL, NULL, NULL, 'USR', '2022-01-11 11:22:11', '2022-01-11 11:22:11'),
(3, 'User 1', 'user1@gmail.com', NULL, '$2y$10$z3APWSwEhP55Omgp6XUUJ.GFaFCjAgBWSuEdi5EUPDNbqyC8pBS36', NULL, NULL, NULL, NULL, NULL, 'USR', '2022-01-15 00:03:57', '2022-01-15 00:03:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attribute_values`
--
ALTER TABLE `attribute_values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attribute_values_prod_attribute_id_foreign` (`prod_attribute_id`),
  ADD KEY `attribute_values_product_id_foreign` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `home_categories`
--
ALTER TABLE `home_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_sliders`
--
ALTER TABLE `home_sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_subcategory_id_foreign` (`subcategory_id`);

--
-- Indexes for table `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profiles_user_id_foreign` (`user_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_order_item_id_foreign` (`order_item_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shippings_order_id_foreign` (`order_id`);

--
-- Indexes for table `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD PRIMARY KEY (`identifier`,`instance`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subcategories_category_id_foreign` (`category_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_user_id_foreign` (`user_id`),
  ADD KEY `transactions_order_id_foreign` (`order_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attribute_values`
--
ALTER TABLE `attribute_values`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `home_categories`
--
ALTER TABLE `home_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `home_sliders`
--
ALTER TABLE `home_sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `product_attributes`
--
ALTER TABLE `product_attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attribute_values`
--
ALTER TABLE `attribute_values`
  ADD CONSTRAINT `attribute_values_prod_attribute_id_foreign` FOREIGN KEY (`prod_attribute_id`) REFERENCES `product_attributes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `attribute_values_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_order_item_id_foreign` FOREIGN KEY (`order_item_id`) REFERENCES `order_items` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `shippings`
--
ALTER TABLE `shippings`
  ADD CONSTRAINT `shippings_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
