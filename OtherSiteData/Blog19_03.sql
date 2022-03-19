-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 19, 2022 at 02:32 PM
-- Server version: 8.0.28-0ubuntu0.20.04.3
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
-- Database: `Blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `password`, `username`, `created_at`, `updated_at`) VALUES
(1, 'purepeper@gmail.com', '$2y$10$onK8102aaSRwLD2XZzTAMe1iXB.02Y6rTjBBR1tKSQX6PkqaE4T6K', '12345678', '2022-01-29 15:53:33', '2022-01-29 15:53:33'),
(2, 'asdf@chuj.jebacpis', '$2y$10$PttjURcsF1dAGhdhHgfsuOTTVhRjY1r9o38WWuiuFlYlNW.ay0Zc2', '12345678XD', '2022-01-29 15:53:54', '2022-01-29 15:53:54');

-- --------------------------------------------------------

--
-- Table structure for table `coments`
--

CREATE TABLE `coments` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `recepie_id` bigint NOT NULL,
  `comment` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coments`
--

INSERT INTO `coments` (`id`, `user_id`, `recepie_id`, `comment`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 'asdfzsdf', '2022-02-14 16:26:41', '2022-02-14 16:26:41'),
(2, 1, 0, 'xdfgxdfghbasd\r\nzsdfzsdf', '2022-02-16 17:21:01', '2022-02-16 17:21:01'),
(3, 1, 7, 'zsdfsDFASDFZ', '2022-02-16 17:33:48', '2022-02-16 17:33:48'),
(4, 1, 7, 'zsdfgzsdg', '2022-02-16 17:41:35', '2022-02-16 17:41:35'),
(5, 0, 6, 'xdfgsd', '2022-02-18 11:46:09', '2022-02-18 11:46:09'),
(6, 0, 5, 'fgxvgd', '2022-02-19 15:16:05', '2022-02-19 15:16:05'),
(7, 1, 1, 'asdfzsdfasadfa', '2022-02-19 15:16:29', '2022-02-19 15:16:29'),
(8, 1, 1, 'dxftgwewrgsxdrfgsw', '2022-02-19 15:17:21', '2022-02-19 15:17:21'),
(9, 4, 7, 'gfasdfzsdfa', '2022-02-19 15:46:36', '2022-02-19 15:46:36'),
(10, 0, 5, 'asdf', '2022-02-20 17:26:03', '2022-02-20 17:26:03'),
(11, 1, 5, 'zsdfaq', '2022-02-20 17:26:25', '2022-02-20 17:26:25'),
(12, 0, 6, 'sdfg', '2022-02-21 17:11:20', '2022-02-21 17:11:20'),
(13, 0, 7, 'asdfz', '2022-02-22 17:52:08', '2022-02-22 17:52:08'),
(14, 0, 7, 'asdf', '2022-03-16 14:07:10', '2022-03-16 14:07:10'),
(15, 0, 1, 'xdfgxdfggg345', '2022-03-16 14:17:11', '2022-03-16 14:17:11'),
(16, 1, 5, 'zse', '2022-03-16 14:18:30', '2022-03-16 14:18:30');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint UNSIGNED NOT NULL,
  `manipulations` json NOT NULL,
  `custom_properties` json NOT NULL,
  `generated_conversions` json NOT NULL,
  `responsive_images` json NOT NULL,
  `order_column` int UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_01_25_183147_create_admins_table', 1),
(6, '2022_01_26_152814_create_recepies_table', 1),
(7, '2022_02_03_195756_create_media_table', 2),
(8, '2022_02_04_135054_create_media_table', 3),
(9, '2022_02_14_165101_create_coments_table', 4),
(10, '2022_03_01_142954_create_recepie_editeds_table', 5),
(12, '2022_03_10_164835_add_opinions_to_recepie_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recepies`
--

CREATE TABLE `recepies` (
  `id` bigint UNSIGNED NOT NULL,
  `admin_id` bigint UNSIGNED NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ingredients` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `taste` int NOT NULL,
  `speed` int NOT NULL,
  `price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recepies`
--

INSERT INTO `recepies` (`id`, `admin_id`, `body`, `title`, `ingredients`, `image`, `created_at`, `updated_at`, `taste`, `speed`, `price`) VALUES
(1, 2, 'jak poprawnie jabłko', 'Jajecznica', 'jablko', '2_2022-01-29.png', '2022-01-28 16:43:50', '2022-01-28 16:43:50', 0, 0, 0),
(5, 2, 'ugotuj i masz', 'zupa', 'woda ,kukurydza', '2_2022-01-29.png', '2022-01-29 17:16:17', '2022-01-29 17:16:17', 2, 0, 1),
(6, 2, 'asdf\r\n\r\n    asdf', 'asdf', 'asdf', '2_2022-01-29 18:18:15.png', '2022-01-29 17:18:15', '2022-01-29 17:18:15', 0, 0, 0),
(7, 2, 'asdf', 'asdf', 'asdf', '2_2022-01-29_2022-01-29 18:20:51.png', '2022-01-29 17:20:51', '2022-01-29 17:20:51', 0, 0, 0),
(8, 2, 'asdf\r\n\r\n    asdf', 'asdf123', 'asdf', '2_2022-01-29_18:22:39.png', '2022-01-29 17:22:39', '2022-01-29 17:22:39', 0, 1, 3),
(9, 2, 'asdgzxdgxz', 'asdf', 'dfasdfasdf ,asdfassdf', '2_2022-01-29_21:10:39.png', '2022-01-29 20:10:39', '2022-01-29 20:10:39', 0, 0, 0),
(10, 2, 'zsdfg xdfg', 'asdf', 'asdfzsdf ,zasfa ,zsdfzsd', '2_2022-01-29_21:11:51.png', '2022-01-29 20:11:51', '2022-01-29 20:11:51', 0, 0, 0),
(11, 1, 'asdfzsdf\r\n        zsdfasdf', 'dasfds', 'asdfzsdf', '1_2022-01-30_15:58:44.png', '2022-01-30 14:58:44', '2022-01-30 14:58:44', 0, 0, 0),
(12, 2, 'zsdfnlszerlsefzsd', 'asdfka', 'asdf ,asdfsa ,asdf', '2_2022-01-30_16:07:28.png', '2022-01-30 15:07:28', '2022-01-30 15:07:28', 0, 0, 0),
(13, 1, '<figure class=\"image\"><img><figcaption>asdf</figcaption></figure>', 'asdf', 'asdf', '1_2022-02-10_09:42:06.png', '2022-02-10 08:42:06', '2022-02-10 08:42:06', 0, 0, 0),
(14, 1, '<p>vhjsrt676wssdcb</p><p>asduibfasd</p><figure class=\"image\"><img></figure><p>xdhvhjsrtyys</p><p>xsdgawert</p>', 'asdf1512', '5678wcfghcv', '1_2022-02-10_09:43:22.png', '2022-02-10 08:43:22', '2022-02-10 08:43:22', 0, 0, 0),
(15, 1, 'smażymy czosnek do momętu w którym lekko zrumienieje dożucamy szpinak i przyprawy \r\n\r\nw tym bazylię smażymy jeszcze 5 min. \r\n\r\n<b>Ciasto Francuskie </b> rozkładamy na stole lub blacie , wycinamy kawałki (około 15 cm.) \r\n\r\nna każdy kawałek nakładamy szpinaku , tak żeby twożył linię i posypujemy serem lub tofu\r\n\r\n , potem zawijamy szpinak i zawijamy tak żeby przypominały muszelki ślimaka\r\n\r\njeżeli chcecie możecie polać masłem .\r\n\r\nkiedy już zawiniemy, wszystko wykładamy na papier do pieczenia i rozgrzewamy  piekarnik\r\n\r\ndo 180 , po rozgrzaniu piekanika wkładamy i pieczemy około 5 min lub dopuki ciasto francuskie \r\n\r\nnie będzie gotowe.', 'ciasto francuskie z szpinakiem', 'szpinak , ciasto francuskie , czosnek ,bazylia ,ser', '1_2022-02-13_18:04:54.png', '2022-02-13 17:04:54', '2022-02-13 17:04:54', 0, 0, 0),
(17, 1, 'asdfzsdfqs', 'asdfzsdf123456', 'zsdfawer', '1_2022-03-07_17:08:54.png', '2022-03-07 16:08:54', '2022-03-07 16:08:54', 0, 0, 0),
(18, 1, 'asdfzsdfqs', 'asdfzsdf123456', 'zsdfawer', '1_2022-03-07_17:10:44.png', '2022-03-07 16:10:44', '2022-03-07 16:10:44', 0, 0, 0),
(19, 1, 'asdfzsdfqs', 'asdfzsdf123456', 'zsdfawer', '1_2022-03-07_17:10:54.png', '2022-03-07 16:10:54', '2022-03-07 16:10:54', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `recepie_editeds`
--

CREATE TABLE `recepie_editeds` (
  `id` bigint UNSIGNED NOT NULL,
  `recepieBelongs` bigint UNSIGNED NOT NULL,
  `recepieUser` bigint UNSIGNED NOT NULL,
  `ingredients` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `taste` int NOT NULL,
  `speed` int NOT NULL,
  `price` int NOT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recepie_editeds`
--

INSERT INTO `recepie_editeds` (`id`, `recepieBelongs`, `recepieUser`, `ingredients`, `Body`, `taste`, `speed`, `price`, `photo`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'asdf', 'asdf', 20, 19, 16, 'none', '2022-03-01 17:29:21', '2022-03-16 14:13:30'),
(2, 1, 1, 'zsdfas', 'zsdfasefwe', 0, 0, 0, 'none', '2022-03-07 11:01:41', '2022-03-07 11:01:41'),
(3, 1, 1, 'zsdfas', 'zsdfasefwe', 0, 0, 0, 'none', '2022-03-07 11:02:44', '2022-03-07 11:02:44'),
(8, 1, 1, '12345', '12345', 0, 0, 0, 'Edit_1_2022-03-09_17:42:00.png', '2022-03-09 16:42:00', '2022-03-09 16:42:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(0, 'niezalogowany', 'unregistred', NULL, '1', NULL, '2022-02-14 16:13:47', '2022-02-14 16:13:47'),
(1, '12345678', 'purepeper@gmail.com', NULL, '$2y$10$SQokZR999qi8NT5/vdNOQOY2Ow9gxtcCmMlbOUd.hjW4gVxldAQca', NULL, '2022-02-14 16:13:47', '2022-02-14 16:13:47'),
(4, '12345678XD', 'asdf@chuj.jebacpis', NULL, '$2y$10$7xTJTHTgQesuNhvXi9nvuecbvDoLBCKzyzZEg.VgWWif6qNN2uKPu', NULL, '2022-02-19 15:45:21', '2022-02-19 15:45:21'),
(5, 'Test12345', '1234@asdf.com', NULL, '$2y$10$KjJgkjEG713ZbXd0TS9Y..WLWSDOLR4B5Mj81z2rDPyWMse0m0ume', NULL, '2022-03-17 17:04:36', '2022-03-17 17:04:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coments`
--
ALTER TABLE `coments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `coments_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `media_uuid_unique` (`uuid`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`),
  ADD KEY `media_order_column_index` (`order_column`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `recepies`
--
ALTER TABLE `recepies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recepies_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `recepie_editeds`
--
ALTER TABLE `recepie_editeds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recepie_editeds_recepiebelongs_foreign` (`recepieBelongs`),
  ADD KEY `recepie_editeds_recepieuser_foreign` (`recepieUser`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `coments`
--
ALTER TABLE `coments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recepies`
--
ALTER TABLE `recepies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `recepie_editeds`
--
ALTER TABLE `recepie_editeds`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `coments`
--
ALTER TABLE `coments`
  ADD CONSTRAINT `coments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `recepies`
--
ALTER TABLE `recepies`
  ADD CONSTRAINT `recepies_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `recepie_editeds`
--
ALTER TABLE `recepie_editeds`
  ADD CONSTRAINT `recepie_editeds_recepiebelongs_foreign` FOREIGN KEY (`recepieBelongs`) REFERENCES `recepies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `recepie_editeds_recepieuser_foreign` FOREIGN KEY (`recepieUser`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
