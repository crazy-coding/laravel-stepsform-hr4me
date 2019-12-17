-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 18, 2019 at 12:47 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hr4me_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `type` int(11) NOT NULL,
  `cur_name` varchar(255) DEFAULT NULL,
  `cur_value` float NOT NULL DEFAULT 0,
  `cur_mark` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`type`, `cur_name`, `cur_value`, `cur_mark`) VALUES
(1, 'USD', 1, '$'),
(2, 'CNY', 6.9, '¥'),
(3, 'EUR', 0.8, '€');

-- --------------------------------------------------------

--
-- Table structure for table `docs_type`
--

CREATE TABLE `docs_type` (
  `id` int(11) NOT NULL,
  `doc_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `docs_type`
--

INSERT INTO `docs_type` (`id`, `doc_name`) VALUES
(1, 'Buying Agreement'),
(2, 'Contract'),
(3, 'Employment Agreement'),
(4, 'Selling Agreement');

-- --------------------------------------------------------

--
-- Table structure for table `doc_drafts`
--

CREATE TABLE `doc_drafts` (
  `id` int(11) UNSIGNED NOT NULL,
  `doc_type` int(11) NOT NULL,
  `ins_amount` float NOT NULL DEFAULT 0,
  `ins_currency` int(11) NOT NULL DEFAULT 0,
  `pay_rate` float NOT NULL DEFAULT 0,
  `food_allow_amt` float NOT NULL DEFAULT 0,
  `food_allow_unit` int(11) NOT NULL DEFAULT 0,
  `food_allow_reg` tinyint(1) NOT NULL DEFAULT 1,
  `annual_amt` float NOT NULL DEFAULT 0,
  `annual_unit` int(11) NOT NULL DEFAULT 0,
  `annual_reg` tinyint(1) NOT NULL DEFAULT 1,
  `vaccation_amt` text DEFAULT NULL,
  `vaccation_reg` tinyint(1) NOT NULL DEFAULT 1,
  `title_custom` text DEFAULT NULL,
  `content` text DEFAULT NULL,
  `author` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `date_paying` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `doc_drafts`
--

INSERT INTO `doc_drafts` (`id`, `doc_type`, `ins_amount`, `ins_currency`, `pay_rate`, `food_allow_amt`, `food_allow_unit`, `food_allow_reg`, `annual_amt`, `annual_unit`, `annual_reg`, `vaccation_amt`, `vaccation_reg`, `title_custom`, `content`, `author`, `created_at`, `updated_at`, `date_paying`) VALUES
(1, 1, 123, 1, 123, 123, 3, 1, 123, 3, 1, '123', 1, NULL, 'wefwefwefwefwefwefwe', 1, '2019-06-18 06:32:57', NULL, '123');

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
(2, '2014_10_12_100000_create_password_resets_table', 1);

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
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `type` int(11) NOT NULL,
  `unit_name` varchar(255) DEFAULT NULL,
  `unit_value` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`type`, `unit_name`, `unit_value`) VALUES
(3, '¥ per month', 0),
(1, '$ per month', 0),
(2, '€ per month', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `auth_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 1,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `fullname`, `company`, `address`, `phone`, `auth_code`, `is_admin`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'Semin Dcho', 'soesemin@outlook.com', '$2y$10$s3b/SBWG9dj8JIplok/uj.WwgJl718U3TtqbQW06bvhNU3obwFM4S', 'NMl3arTzvHwsWyRhLuYsILoqQlKYsACzUEYTbS7uKEhnm5kXnA8YaJNTIhFz', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2019-06-17 05:19:26', '2019-06-17 05:19:26'),
(2, 'Semin Dcho', 'dchosemin@gmail.com', '$2y$10$caiAMgP2OhWE5jJFJUOtiOoHZEy3y1Sw7iB5KqeuDkHnGw5A64cKy', 'hxfItR00eS5Re5HlZT6nOYeOx3OHvIMPHZfn9tlbpvuAv0bTe2X5ma4AYS4M', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2019-06-17 05:56:37', '2019-06-17 05:56:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD KEY `currency_id` (`type`);

--
-- Indexes for table `docs_type`
--
ALTER TABLE `docs_type`
  ADD KEY `doc_type_id` (`id`);

--
-- Indexes for table `doc_drafts`
--
ALTER TABLE `doc_drafts`
  ADD KEY `doc_draft_id` (`id`);

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
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD KEY `unit_id` (`type`);

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
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `docs_type`
--
ALTER TABLE `docs_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `doc_drafts`
--
ALTER TABLE `doc_drafts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
