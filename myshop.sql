-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 02, 2020 lúc 06:27 PM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `myshop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'Nam', 0, 0, '2020-08-24 05:09:16', '2020-08-24 05:09:16'),
(2, 'Nữ', 0, 0, '2020-08-24 05:09:20', '2020-08-24 05:09:20'),
(3, 'Bê đê', 0, 0, '2020-08-24 05:09:25', '2020-08-24 05:09:25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
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
-- Cấu trúc bảng cho bảng `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `menus`
--

INSERT INTO `menus` (`id`, `name`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'Áo', 0, '2020-08-24 05:09:35', '2020-08-24 05:09:35'),
(2, 'Quần', 0, '2020-08-24 05:09:38', '2020-08-24 05:09:38'),
(3, 'Giày, dép', 0, '2020-08-24 05:09:46', '2020-08-24 05:09:46'),
(4, 'Phụ kiện', 0, '2020-08-24 05:09:50', '2020-08-24 05:09:50'),
(5, 'Mũ', 4, '2020-08-24 05:10:07', '2020-08-24 05:10:07'),
(6, 'Kính', 4, '2020-08-24 05:10:13', '2020-08-24 05:10:13'),
(7, 'Nơ', 0, '2020-08-24 05:10:18', '2020-08-24 05:10:18'),
(8, '111', 0, '2020-08-25 04:35:25', '2020-08-25 04:35:25'),
(9, '222', 0, '2020-08-25 04:38:01', '2020-08-25 04:38:01'),
(10, '111', 0, '2020-08-25 04:42:03', '2020-08-25 04:42:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2020_08_04_133026_create_categories_table', 1),
(4, '2020_08_07_152005_create_menus_table', 1),
(5, '2020_08_24_121710_create_products_table', 2),
(6, '2020_08_24_121836_create_product_images_table', 2),
(7, '2020_08_24_124227_create_tags_table', 3),
(8, '2020_08_24_124458_create_product_tags_table', 3),
(9, '2020_08_25_105306_add_colum_product_id_to_product_image', 4),
(10, '2020_08_28_193103_rename_colum_name_to_colum_name_path', 5),
(11, '2020_09_02_093824_create_slides_table', 6),
(12, '2020_09_02_102902_add_image_column_to_slide_table', 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `feature_image_path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `feature_image_path`, `content`, `user_id`, `category_id`, `created_at`, `updated_at`) VALUES
(8, '121212', 2123, '/storage/product/381711153_aonu3.jpg', 'asas', 1, 0, '2020-09-01 08:09:55', '2020-09-01 08:09:55'),
(9, 'Áo phông nữ', 1000000000, '/storage/product/838973006_aonu2.jpg', 'Áo phông nữ đẹp hè 2020', 1, 2, '2020-09-01 08:42:59', '2020-09-01 08:42:59'),
(10, 'as', 12, '/storage/product/1897757605_aonu3 - Copy.jpg', 'asasas', 1, 0, '2020-09-02 03:38:44', '2020-09-02 03:38:44');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `path_name_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_images`
--

INSERT INTO `product_images` (`id`, `path_name_image`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 'storage/product/1477625676_aonu1.jpg', 1, NULL, NULL),
(2, 'storage/product/28570974_aonu3 - Copy.jpg', 1, NULL, NULL),
(3, 'storage/product/1139165574_aonu3.jpg', 1, NULL, NULL),
(4, '/storage/product/1424248438_hieu.jpg', 2, NULL, NULL),
(5, '/storage/product/1866293886_quanaodoi.jpg', 2, NULL, NULL),
(23, '/storage/product/126393237_aonu2.jpg', 8, NULL, NULL),
(24, '/storage/product/1246272298_aonu3 - Copy.jpg', 8, NULL, NULL),
(25, '/storage/product/1177289004_aonu3.jpg', 8, NULL, NULL),
(26, '/storage/product/1168220359_aonu1.jpg', 9, NULL, NULL),
(27, '/storage/product/1201261477_aonu3 - Copy.jpg', 9, NULL, NULL),
(28, '/storage/product/1904041279_aonu4 - Copy.jpg', 9, NULL, NULL),
(29, '/storage/product/1542343190_aonu5.jpg', 9, NULL, NULL),
(30, '/storage/product/1430705466_aonu3 - Copy.jpg', 10, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_tags`
--

CREATE TABLE `product_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_tags`
--

INSERT INTO `product_tags` (`id`, `product_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 2, NULL, NULL),
(3, 2, 3, NULL, NULL),
(16, 8, 12, NULL, NULL),
(17, 9, 16, NULL, NULL),
(18, 9, 17, NULL, NULL),
(19, 10, 12, NULL, NULL),
(20, 10, 18, NULL, NULL),
(21, 10, 19, NULL, NULL),
(22, 10, 20, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slides`
--

CREATE TABLE `slides` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `slides`
--

INSERT INTO `slides` (`id`, `title`, `image`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Slide1', '', 'Slide1', NULL, NULL),
(2, 'Slide2', '', 'Slide2', NULL, NULL),
(3, 'Slide1', '', 'Slide1', NULL, NULL),
(4, 'Slide2', '', 'Slide2', NULL, NULL),
(5, 'asas', '/storage/slides/143815104_4.jpg', 'asas', '2020-09-02 03:35:24', '2020-09-02 03:35:24'),
(6, 'as', '/storage/slides/1874256869_balo1.jpg', 'as', '2020-09-02 03:35:37', '2020-09-02 03:35:37'),
(7, 'asas', '/storage/slides/1027693453_aonu3.jpg', 'asas', '2020-09-02 03:37:22', '2020-09-02 03:37:22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Ao nu dep', '2020-08-30 12:10:03', '2020-08-30 12:10:03'),
(2, 'ao nu', '2020-08-30 12:10:03', '2020-08-30 12:10:03'),
(3, 'ao nam', '2020-08-30 12:17:59', '2020-08-30 12:17:59'),
(4, 'aonu', '2020-08-30 12:30:06', '2020-08-30 12:30:06'),
(9, 'ao nu ngau', '2020-08-31 05:05:40', '2020-08-31 05:05:40'),
(10, 'ao nuhay', '2020-08-31 05:05:40', '2020-08-31 05:05:40'),
(11, 'qwq', '2020-08-31 13:07:26', '2020-08-31 13:07:26'),
(12, 'as', '2020-08-31 13:11:43', '2020-08-31 13:11:43'),
(13, 'asa', '2020-08-31 13:11:43', '2020-08-31 13:11:43'),
(14, 'x', '2020-08-31 13:11:43', '2020-08-31 13:11:43'),
(15, 'xxx', '2020-08-31 13:16:34', '2020-08-31 13:16:34'),
(16, 'áo phông nữ đẹp', '2020-09-01 08:43:00', '2020-09-01 08:43:00'),
(17, 'áo phông nữ hè 2020', '2020-09-01 08:43:00', '2020-09-01 08:43:00'),
(18, 'cx', '2020-09-02 03:38:44', '2020-09-02 03:38:44'),
(19, 'c', '2020-09-02 03:38:44', '2020-09-02 03:38:44'),
(20, 'd', '2020-09-02 03:38:44', '2020-09-02 03:38:44');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_tags`
--
ALTER TABLE `product_tags`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `product_tags`
--
ALTER TABLE `product_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `slides`
--
ALTER TABLE `slides`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
