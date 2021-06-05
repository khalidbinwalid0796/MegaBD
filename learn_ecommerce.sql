-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2021 at 10:51 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `learn_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `report` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `setting` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `phone`, `email`, `email_verified_at`, `password`, `remember_token`, `category`, `coupon`, `product`, `blog`, `order`, `other`, `report`, `role`, `return`, `contact`, `comment`, `setting`, `stock`, `type`, `created_at`, `updated_at`) VALUES
(3, 'Rony', '01915867739', 'khalidbucse02@gmail.com', NULL, '$2y$10$b7KNv88qg5zvcW/Mu6odau/0HkCAiRs5gsuQSV63mE/B.k6zZFk6y', NULL, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '2', NULL, NULL),
(4, 'khalid', '01710659888', 'khalidbucse@gmail.com', NULL, '$2y$10$LW6lO7YLwZUXzErp5dlSmu1OYMbcOJtU534lqQ2lJMNjHarmbmBWq', NULL, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '2', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `brand_logo`, `created_at`, `updated_at`) VALUES
(1, 'Apple', 'public/brands/5f4ce6db8c68c.jpg', NULL, NULL),
(2, 'Samsung', 'public/brands/5f4ce6ff7438d.jpg', NULL, NULL),
(3, 'Huawei', 'public/brands/5f4ce714d22f3.jpg', NULL, NULL),
(4, 'OnePlus', 'public/brands/5f4ce72fa64e3.jpg', NULL, NULL),
(5, 'Sony', 'public/brands/5f4ce7472d1c7.jpg', NULL, NULL),
(6, 'Google', 'public/brands/5f4cea83b0f75.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'Electronics', '2020-08-31 00:26:11', '2020-08-31 00:26:11'),
(2, 'Furnitures', '2020-08-31 00:27:12', '2020-08-31 00:27:12'),
(3, 'Men\'s Fashion', '2020-08-31 00:27:20', '2020-08-31 00:27:20'),
(4, 'Women\'s Fashion', '2020-08-31 00:27:28', '2020-08-31 00:27:28'),
(5, 'Watches', '2020-08-31 01:26:58', '2020-08-31 01:26:58'),
(8, 'Home & Lifestyle', '2020-08-31 03:26:55', '2020-08-31 03:26:55');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon`, `discount`, `created_at`, `updated_at`) VALUES
(1, 'EasyShop5', '5', NULL, NULL),
(2, 'EasyShop10', '10', NULL, NULL),
(3, 'EasyShop15', '15', NULL, NULL),
(4, 'EasyShop20', '20', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_08_27_061854_create_admins_table', 1),
(5, '2020_08_28_195100_create_categories_table', 2),
(6, '2020_08_28_200651_create_subcategories_table', 2),
(7, '2020_08_28_200839_create_brands_table', 2),
(8, '2020_08_31_035754_create_coupons_table', 3),
(9, '2020_08_31_040640_create_newslaters_table', 4),
(10, '2020_09_01_034910_create_products_table', 5),
(11, '2020_09_02_143838_create_posts_table', 6),
(12, '2020_09_02_144152_create_post_category_table', 6),
(13, '2020_09_05_080343_create_wishlists_table', 7),
(14, '2020_09_06_154320_create_settings_table', 8),
(15, '2020_09_08_093740_create_orders_table', 9),
(16, '2020_09_08_094017_create_order_details_table', 9),
(17, '2020_09_08_094201_create_shipping_table', 9),
(18, '2020_09_09_102914_create_seos_table', 10),
(19, '2020_09_10_111520_create_sitesetting_table', 11),
(20, '2021_01_26_065519_create_rating_point_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `newslaters`
--

CREATE TABLE `newslaters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newslaters`
--

INSERT INTO `newslaters` (`id`, `email`, `created_at`, `updated_at`) VALUES
(4, 'khalidbucse@gmail.com', '2020-08-31 18:35:04', NULL),
(5, 'khalidbucse02@gmail.com', '2020-09-01 03:42:32', NULL),
(6, 'mitaislamsetu@gmail.com', '2020-09-01 03:42:43', NULL),
(7, 'khalid@gmail.com', '2020-09-02 16:54:24', NULL),
(8, 'rony@gmail.com', '2020-09-04 04:03:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_type` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paying_amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blnc_transection` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stripe_order_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtotal` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating_point` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `return_order` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `month` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `payment_id`, `payment_type`, `paying_amount`, `blnc_transection`, `stripe_order_id`, `subtotal`, `rating_point`, `shipping`, `vat`, `total`, `status`, `return_order`, `month`, `date`, `year`, `status_code`, `created_at`, `updated_at`) VALUES
(25, '5', 'card_1IDripGCOpZOZeJfHmpiUaIs', 'stripe', '5910', 'txn_1IDrirGCOpZOZeJfb5lqmEjG', '60101aebd4735', '5890', '29.45', '10', '0', '5910', '3', '0', 'January', '26-01-21', '2021', '335007', NULL, NULL),
(26, '5', 'card_1IDrlCGCOpZOZeJfggaYf0eG', 'stripe', '1018', 'txn_1IDrlEGCOpZOZeJfCYjF0Dzc', '60101b7f067e9', '1008.00', '5.04', '10', '0', '1018', '3', '0', 'January', '26-01-21', '2021', '825248', NULL, NULL),
(27, '6', 'card_1IDrr8GCOpZOZeJffTfsmaNt', 'stripe', '21910', 'txn_1IDrrAGCOpZOZeJf8Yz72C1p', '60101ceee851e', '21900.00', '109.5', '10', '0', '21910', '3', '0', 'January', '26-01-21', '2021', '744153', NULL, NULL),
(28, '7', 'card_1IDrtjGCOpZOZeJfz1jQWSNL', 'stripe', '5010', 'txn_1IDrtlGCOpZOZeJfUkrvlfrF', '60101d8f7a3a9', '5000.00', '25', '10', '0', '5010', '3', '0', 'January', '26-01-21', '2021', '161310', NULL, NULL),
(29, '8', 'card_1IDrvpGCOpZOZeJfJCiyxgTX', 'stripe', '10010', 'txn_1IDrvrGCOpZOZeJfWf5hfGDw', '60101e11adf11', '10000.00', '50', '10', '0', '10010', '3', '0', 'January', '26-01-21', '2021', '234958', NULL, NULL),
(30, '6', 'card_1IDsEIGCOpZOZeJfseQWROK2', 'stripe', '1010', 'txn_1IDsEJGCOpZOZeJfh1D3m3lp', '6010228a33f2f', '1000.00', '5', '10', '0', '1010', '3', '0', 'January', '26-01-21', '2021', '518374', NULL, NULL),
(32, '5', 'card_1IKKPjGCOpZOZeJfGE66IhrQ', 'stripe', '1810', 'txn_1IKKPlGCOpZOZeJfwGlVrBSi', '60279b9ace52f', '1800.00', '9', '10', '0', '1810', '3', '0', 'February', '13-02-21', '2021', '213401', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `singleprice` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `totalprice` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `product_name`, `color`, `size`, `quantity`, `singleprice`, `totalprice`, `created_at`, `updated_at`) VALUES
(24, '25', '9', 'Laptop', 'white', NULL, '1', '5000', '5000', NULL, NULL),
(25, '25', '5', 'Samsung1', 'gg', NULL, '1', '900', '900', NULL, NULL),
(26, '26', '3', 'Samsung2', 'fh', 'm', '1', '1008', '1008', NULL, NULL),
(27, '27', '1', 'Samsung', 'White', 'M', '2', '10000', '20000', NULL, NULL),
(28, '27', '6', 'Samsung1', 'kk', 'l', '2', '950', '1900', NULL, NULL),
(29, '28', '4', 'Samsung', 'ko', 'k', '5', '1000', '5000', NULL, NULL),
(30, '29', '4', 'Samsung', 'ko', 'k', '10', '1000', '10000', NULL, NULL),
(31, '30', '4', 'Samsung', 'ko', 'k', '1', '1000', '1000', NULL, NULL),
(32, '32', '5', 'Samsung1', 'gg', NULL, '2', '900', '1800', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('khalidbucse@gmail.com', '$2y$10$G2CG2ord0Zp4f/.SJl9e7OK7y7BQG77SOzOuEYKU3uOsE7827LiLO', '2021-01-17 12:30:43');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `post_title_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_title_bn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `details_bn` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `post_title_en`, `post_title_bn`, `post_image`, `details_en`, `details_bn`, `created_at`, `updated_at`) VALUES
(1, 2, 'Samsung Galaxy', 'সময়ের সেরা বাজেট-ফোন স্যামসাং গ্যালাক্সি', 'public/post/1677148507973086.jpg', '<b style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 16px;\">Samsung</b><span style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 16px;\">&nbsp;has launched two variants of the smartphone – one with 4GB RAM with 64GB internal storage for BDT 18,999 and another is 6GB RAM with 128GB internal storage for BDT 20,999. The variant of 6GB ROM with 128GB internal storage was launched online on June 27, 2020</span>', '<h4 class=\"headline headline-type-6  sub-headline excerpt customStoryCard9-m__bn-story-excerpt__1kDQT headline-m__headline__3vaq9 headline-m__headline-type-6__3gKxz\" style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: Shurjo, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Oxygen, Ubuntu, Cantarell, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif; font-weight: var(--regular); line-height: 1.3; font-size: 1.6rem;\"><span style=\"box-sizing: border-box;\">গত আগস্ট মাস থেকে পশ্চিমবঙ্গের জঙ্গলমহলে শুরু হয়েছে মাওবাদীদের নতুন তৎপরতা। দল ধরে এলাকায় শুরু হয়েছে টহল। গ্রামে গ্রামে পড়ছে পোস্টার। কোনো কোনো গ্রামে টাকা চেয়ে শুরু হয়েছে হুমকি।</span></h4>', NULL, NULL),
(2, 1, 'Samsung Galaxy M21 Offer', 'সময়ের সেরা বাজেট-ফোন স্যামসাং গ্যালাক্সি এম ২১', 'public/post/1677148549309385.jpg', '<span style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 16px;\">Powering the smartphone is an Exynos 9611 SoC that is capable of delivering decent performance. It is available in 4GB and 6GB RAM variants. It also comes in 64GB and 128GB storage variants. The&nbsp;</span><b style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 16px;\">Galaxy M21</b><span style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 16px;\">&nbsp;sports a triple camera setup with the highlight being the 48-megapixel primary scanner.</span>', '<h4 class=\"headline headline-type-6  sub-headline excerpt customStoryCard9-m__bn-story-excerpt__1kDQT headline-m__headline__3vaq9 headline-m__headline-type-6__3gKxz\" style=\"box-sizing: border-box; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: Shurjo, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Oxygen, Ubuntu, Cantarell, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif; font-weight: var(--regular); line-height: 1.3; font-size: 1.6rem;\"><span style=\"box-sizing: border-box;\">গত আগস্ট মাস থেকে পশ্চিমবঙ্গের জঙ্গলমহলে শুরু হয়েছে মাওবাদীদের নতুন তৎপরতা। দল ধরে এলাকায় শুরু হয়েছে টহল। গ্রামে গ্রামে পড়ছে পোস্টার। কোনো কোনো গ্রামে টাকা চেয়ে শুরু হয়েছে হুমকি।</span></h4>', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `post_category`
--

CREATE TABLE `post_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_name_bn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_category`
--

INSERT INTO `post_category` (`id`, `category_name_en`, `category_name_bn`, `created_at`, `updated_at`) VALUES
(1, 'Offer', 'অফার', NULL, NULL),
(2, 'Service', 'সার্ভিস', NULL, NULL),
(3, 'Event', 'ইভেন্ট', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `selling_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_slider` int(11) DEFAULT NULL,
  `hot_deal` int(11) DEFAULT NULL,
  `best_rated` int(11) DEFAULT NULL,
  `mid_slider` int(11) DEFAULT NULL,
  `hot_new` int(11) DEFAULT NULL,
  `trend` int(11) DEFAULT NULL,
  `buyone_getone` int(11) DEFAULT NULL,
  `image_one` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_two` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_three` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `subcategory_id`, `brand_id`, `product_name`, `product_code`, `product_quantity`, `product_details`, `product_color`, `product_size`, `selling_price`, `discount_price`, `video_link`, `main_slider`, `hot_deal`, `best_rated`, `mid_slider`, `hot_new`, `trend`, `buyone_getone`, `image_one`, `image_two`, `image_three`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', '1', '2', 'Samsung', 'sm-2040', '20', 'Good Product', 'White', 'M,L,XL', '10000', NULL, NULL, NULL, 1, 1, 1, 1, 1, 1, 'public/products/5f4eb08e37c17.png', 'public/products/5fff3d78a0d46.png', NULL, 1, NULL, NULL),
(2, '1', '1', '1', 'Samsung1', 'sm-204', '20', 'good', 'white', 'm', '1000', '50', NULL, 1, 1, NULL, 1, 1, 1, NULL, 'public/products/5f4f0feb02a96.png', NULL, NULL, 1, NULL, NULL),
(3, '1', '1', '1', 'Samsung2', 'sm-2042', '17', 'ghjj', 'fh', 'm', '1008', NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, NULL, 'public/products/5f51068bdd80c.png', 'public/products/5f4f10f0bfd54.png', NULL, 1, NULL, NULL),
(4, '1', '1', '3', 'Samsung', 'sm-2040', '18', 'adsdd', 'ko', 'k', '1000', NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, NULL, 'public/products/5f511f353c8b7.png', 'public/products/5f4f2b0fd210a.png', NULL, 1, NULL, NULL),
(5, '1', '1', '1', 'Samsung1', 'sm-2040', '16', 'fff', 'gg', NULL, '1000', '900', NULL, 1, 1, NULL, NULL, 1, 1, NULL, 'public/products/5f4f2addefc16.png', 'public/products/5f4f2ade15b79.png', NULL, 1, NULL, NULL),
(6, '1', '1', '3', 'Samsung1', 'sm-204', '16', 'kljk', 'kk', 'l', '1000', '950', NULL, NULL, NULL, 1, NULL, 1, 1, NULL, 'public/products/5f511f7d6d372.jpg', NULL, NULL, 1, NULL, NULL),
(7, '1', '1', '3', 'Power Bank', 'p-30', '20', 'Gppd', 'Brown,Red,Blue,White', 'M,L,XL', '70', '50', NULL, NULL, NULL, 1, NULL, 1, 1, 1, 'public/products/5f5135f1eb0d3.png', NULL, NULL, 1, NULL, NULL),
(8, '3', '2', '2', 'HeadPhone', 'H-20', '20', 'Good', 'White', NULL, '20', NULL, NULL, NULL, 1, 1, NULL, 1, 1, 1, 'public/products/5f5136c15bd57.png', NULL, NULL, 1, NULL, NULL),
(9, '1', '4', '1', 'Laptop', 'L-30', '12', 'Good', 'white', NULL, '5000', NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, NULL, 'public/products/5f513a716f11a.png', NULL, NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rating_point`
--

CREATE TABLE `rating_point` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rtotal` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rating_point`
--

INSERT INTO `rating_point` (`id`, `user_id`, `rtotal`, `created_at`, `updated_at`) VALUES
(4, '5', '43.49', NULL, NULL),
(5, '6', '74.5', NULL, NULL),
(6, '7', '25', NULL, NULL),
(7, '8', '50', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `seos`
--

CREATE TABLE `seos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_author` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_tag` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_analytics` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bing_analytics` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seos`
--

INSERT INTO `seos` (`id`, `meta_title`, `meta_author`, `meta_tag`, `meta_description`, `google_analytics`, `bing_analytics`, `created_at`, `updated_at`) VALUES
(1, 'Laravel E-commerce Website', 'Laravel', 'asd', 'asdd', 'asass', 'AASSSDD', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_charge` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shopname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `vat`, `shipping_charge`, `shopname`, `email`, `phone`, `address`, `logo`, `created_at`, `updated_at`) VALUES
(1, '5', '10', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ship_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`id`, `order_id`, `ship_name`, `ship_phone`, `ship_email`, `ship_address`, `ship_city`, `created_at`, `updated_at`) VALUES
(23, '25', 'khalid', '01710659888', 'khalid@gmail.com', 'satkhira', 'Sador', NULL, NULL),
(24, '26', 'khalid', '01710659888', 'khalid@gmail.com', 'satkhira', 'Sador', NULL, NULL),
(25, '27', 'Mita', '01748451508', 'mita@gmail.com', 'Jeshore', 'Sador', NULL, NULL),
(26, '28', 'Rony', '01735099977', 'rony@gmail.com', 'rupatoly', 'barishal', NULL, NULL),
(27, '29', 'Mehedi', '01748459908', 'mehedi@gmail.com', 'rupatoly', 'barishal', NULL, NULL),
(28, '30', 'Mita', '01748451508', 'mita@gmail.com', 'Jeshore', 'Sador', NULL, NULL),
(29, '32', 'khalid', '01710659888', 'khalidbucse02@gmail.com', 'rupatoly', 'barisal', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sitesetting`
--

CREATE TABLE `sitesetting` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone_one` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_two` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sitesetting`
--

INSERT INTO `sitesetting` (`id`, `phone_one`, `phone_two`, `email`, `company_name`, `company_address`, `facebook`, `youtube`, `instagram`, `twitter`, `created_at`, `updated_at`) VALUES
(1, '01710659888', '01915867739', 'khalidbucse@gmail.com', 'MegaBD.com', 'Barisal Sador', 'https://www.facebook.com/', 'https://www.youtube.com/', 'https://www.instagram.com/', 'https://www.twitter.com/', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `subcategory_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Mobile & Tablet', '2020-08-31 09:28:45', '2020-08-31 09:28:45'),
(2, 3, 'Shirt & T-shirt', '2020-08-31 09:58:57', '2020-08-31 09:58:57'),
(4, 1, 'Laptop', '2020-08-31 10:50:23', '2020-08-31 10:50:23'),
(5, 3, 'Suits, Blazers', '2020-08-31 10:50:44', '2020-08-31 10:50:44'),
(6, 3, 'Punjabi & Pajama', '2020-08-31 10:50:52', '2020-08-31 10:50:52'),
(7, 4, 'Hijab & Scarf', '2020-08-31 10:51:05', '2020-08-31 10:51:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 'Khalid', NULL, 'khalid@gmail.com', NULL, '$2y$10$GDH1IJivt0PvQoj.9hHk3eXYES.zBd4D3Xlvxu.gU60lijK8.6y6S', NULL, '2021-01-26 07:35:01', '2021-01-26 07:35:01'),
(6, 'Mita', NULL, 'mita@gmail.com', NULL, '$2y$10$DZukA5aAaNPit4YENRfpZudey0qwW0Zs5ddJOMaSoFbRWA/y/p2dO', NULL, '2021-01-26 07:43:46', '2021-01-26 07:43:46'),
(7, 'Rony', NULL, 'rony@gmail.com', NULL, '$2y$10$8jF9xdKkkmmd4sMJisdrcuGdj2iMjmjkaotbA.RknP/oHejsbRI1W', NULL, '2021-01-26 07:46:45', '2021-01-26 07:46:45'),
(8, 'Mehedi', NULL, 'mehedi@gmail.com', NULL, '$2y$10$24GKKvzF6cOSRtSwIQreuecURv3LjMjv/ZKVAt7bHOuD.79kid37W', NULL, '2021-01-26 07:48:59', '2021-01-26 07:48:59'),
(9, 'khalid', NULL, 'khalidbucse@gmail.com', NULL, '$2y$10$30ggHXNi4yy0wCr3fupaOOj1clsBN1dQDFbUFK8GPZcv4ffycsdfK', NULL, '2021-02-18 13:04:59', '2021-02-18 13:04:59');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(69, 1, 5, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newslaters`
--
ALTER TABLE `newslaters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_category`
--
ALTER TABLE `post_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating_point`
--
ALTER TABLE `rating_point`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seos`
--
ALTER TABLE `seos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sitesetting`
--
ALTER TABLE `sitesetting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `newslaters`
--
ALTER TABLE `newslaters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `post_category`
--
ALTER TABLE `post_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `rating_point`
--
ALTER TABLE `rating_point`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `seos`
--
ALTER TABLE `seos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `sitesetting`
--
ALTER TABLE `sitesetting`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
