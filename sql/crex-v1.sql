-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 26, 2018 at 02:05 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crex-v1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `minAllowed` decimal(16,8) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`id`, `name`, `symbol`, `minAllowed`, `created_at`, `updated_at`) VALUES
(1, 'Bitcoin', 'BTC', '0.00050000', NULL, NULL),
(2, 'Litecoin', 'LTC', '0.00050000', NULL, NULL),
(3, 'Ethereum', 'ETH', '0.00050000', NULL, NULL),
(4, 'Tether', 'USDT', '0.00050000', NULL, NULL),
(5, 'Nano', 'NANO', '0.00050000', NULL, NULL),
(6, 'Horizen', 'ZEN', '0.00050000', NULL, NULL),
(7, 'NEO', 'NEO', '0.00050000', NULL, NULL),
(8, 'EOS', 'EOS', '0.00050000', NULL, NULL),
(9, 'TRON', 'TRX', '0.00050000', NULL, NULL),
(10, 'Cardano', 'ADA', '0.00050000', NULL, NULL),
(11, 'VeChain', 'VET', '0.00050000', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `asset_pairs`
--

CREATE TABLE `asset_pairs` (
  `id` int(10) UNSIGNED NOT NULL,
  `pair` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `child_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `asset_pairs`
--

INSERT INTO `asset_pairs` (`id`, `pair`, `parent_id`, `child_id`, `created_at`, `updated_at`) VALUES
(1, '', 1, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `commission_transactions`
--

CREATE TABLE `commission_transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deposit_transactions`
--

CREATE TABLE `deposit_transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(3, '2018_10_21_201513_create_assets_table', 1),
(4, '2018_10_21_201749_create_user_accounts_table', 1),
(5, '2018_10_21_202015_create_user_account_histories_table', 1),
(6, '2018_10_21_202133_create_order_histories_table', 1),
(7, '2018_10_21_202227_create_deposit_transactions_table', 1),
(8, '2018_10_21_202243_create_withdraw_transactions_table', 1),
(9, '2018_10_21_202258_create_commission_transactions_table', 1),
(10, '2018_10_21_202328_create_settings_table', 1),
(11, '2018_10_21_202341_create_admins_table', 1),
(12, '2018_10_21_202401_create_asset_pairs_table', 1),
(13, '2018_10_26_100451_create_orders_table', 1),
(14, '2018_10_26_100728_create_order_transactions_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `child_units` decimal(16,8) NOT NULL,
  `child_price_per_unit` decimal(16,8) NOT NULL,
  `base_units` decimal(16,8) NOT NULL,
  `remaining` decimal(16,8) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asset_pair_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `child_units`, `child_price_per_unit`, `base_units`, `remaining`, `status`, `type`, `asset_pair_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '500.00000000', '30.00000000', '15000.00000000', '500.00000000', 'Completed', 'BuyOrder', 1, 1, '2018-10-26 05:21:50', '2018-10-26 06:44:19'),
(2, '1500.00000000', '30.00000000', '45000.00000000', '1500.00000000', 'Completed', 'BuyOrder', 1, 1, '2018-10-26 05:23:20', '2018-10-26 06:44:19'),
(3, '500.00000000', '30.00000000', '15000.00000000', '500.00000000', 'Completed', 'SellOrder', 1, 1, '2018-10-26 05:23:45', '2018-10-26 05:28:56'),
(4, '500.00000000', '30.00000000', '15000.00000000', '500.00000000', 'New', 'BuyOrder', 1, 2, '2018-10-26 05:25:26', '2018-10-26 05:25:26'),
(5, '500.00000000', '30.00000000', '15000.00000000', '500.00000000', 'Partial', 'BuyOrder', 1, 2, '2018-10-26 05:28:56', '2018-10-26 05:28:56'),
(6, '500.00000000', '30.00000000', '15000.00000000', '500.00000000', 'New', 'BuyOrder', 1, 2, '2018-10-26 06:42:13', '2018-10-26 06:42:13'),
(7, '500.00000000', '30.00000000', '15000.00000000', '500.00000000', 'New', 'BuyOrder', 1, 2, '2018-10-26 06:43:04', '2018-10-26 06:43:04'),
(8, '500.00000000', '30.00000000', '15000.00000000', '500.00000000', 'New', 'BuyOrder', 1, 2, '2018-10-26 06:43:29', '2018-10-26 06:43:29'),
(9, '500.00000000', '30.00000000', '15000.00000000', '500.00000000', 'Partial', 'SellOrder', 1, 2, '2018-10-26 06:44:19', '2018-10-26 06:44:19');

-- --------------------------------------------------------

--
-- Table structure for table `order_histories`
--

CREATE TABLE `order_histories` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_transactions`
--

CREATE TABLE `order_transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `sellorder_units` decimal(8,2) NOT NULL,
  `buyorder_units` decimal(8,2) NOT NULL,
  `price_per_unit` decimal(8,2) NOT NULL,
  `buyorder_id` int(10) UNSIGNED DEFAULT NULL,
  `sellorder_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_transactions`
--

INSERT INTO `order_transactions` (`id`, `sellorder_units`, `buyorder_units`, `price_per_unit`, `buyorder_id`, `sellorder_id`, `created_at`, `updated_at`) VALUES
(1, '500.00', '15000.00', '30.00', 5, 3, '2018-10-26 05:28:56', '2018-10-26 05:28:56'),
(2, '500.00', '15000.00', '30.00', 1, 9, '2018-10-26 06:44:19', '2018-10-26 06:44:19'),
(3, '1500.00', '45000.00', '30.00', 2, 9, '2018-10-26 06:44:19', '2018-10-26 06:44:19');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Nauman', 'naumanqayyum2004@gmail.com', NULL, '$2y$10$XrHnSOyKrDFNTneLZxwxt.HI/S6Zf0kVBXjlDeLv5SRodbdRM.aF6', 'VlN2TVs482wttmkOMWeUk7jutx2rLRpsFPA8NID3v4NKWWVO5majPADzWazV', '2018-10-26 05:21:38', '2018-10-26 05:21:38'),
(2, 'Test', 'test@test.com', NULL, '$2y$10$49Z2ZmTvcnWboy9Jp4W3yeLJbq8Fq1xUeXcVtK3z20AYeb/BXdVI2', NULL, '2018-10-26 05:25:12', '2018-10-26 05:25:12');

-- --------------------------------------------------------

--
-- Table structure for table `user_accounts`
--

CREATE TABLE `user_accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `available_balance` decimal(16,8) NOT NULL DEFAULT '0.00000000',
  `on_orders` decimal(16,8) NOT NULL DEFAULT '0.00000000',
  `on_hold` decimal(16,8) NOT NULL DEFAULT '0.00000000',
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `asset_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_accounts`
--

INSERT INTO `user_accounts` (`id`, `address`, `available_balance`, `on_orders`, `on_hold`, `user_id`, `asset_id`, `created_at`, `updated_at`) VALUES
(1, NULL, '2000.00000000', '0.00000000', '0.00000000', 1, 1, '2018-10-26 05:21:38', '2018-10-26 05:21:38'),
(2, NULL, '2000.00000000', '0.00000000', '0.00000000', 1, 2, '2018-10-26 05:21:38', '2018-10-26 05:21:38'),
(3, NULL, '2000.00000000', '0.00000000', '0.00000000', 1, 3, '2018-10-26 05:21:38', '2018-10-26 05:21:38'),
(4, NULL, '2000.00000000', '0.00000000', '0.00000000', 1, 4, '2018-10-26 05:21:38', '2018-10-26 05:21:38'),
(5, NULL, '2000.00000000', '0.00000000', '0.00000000', 1, 5, '2018-10-26 05:21:38', '2018-10-26 05:21:38'),
(6, NULL, '2000.00000000', '0.00000000', '0.00000000', 1, 6, '2018-10-26 05:21:38', '2018-10-26 05:21:38'),
(7, NULL, '2000.00000000', '0.00000000', '0.00000000', 1, 7, '2018-10-26 05:21:38', '2018-10-26 05:21:38'),
(8, NULL, '2000.00000000', '0.00000000', '0.00000000', 1, 8, '2018-10-26 05:21:38', '2018-10-26 05:21:38'),
(9, NULL, '2000.00000000', '0.00000000', '0.00000000', 1, 9, '2018-10-26 05:21:38', '2018-10-26 05:21:38'),
(10, NULL, '2000.00000000', '0.00000000', '0.00000000', 1, 10, '2018-10-26 05:21:38', '2018-10-26 05:21:38'),
(11, NULL, '2000.00000000', '0.00000000', '0.00000000', 1, 11, '2018-10-26 05:21:38', '2018-10-26 05:21:38'),
(12, NULL, '-13011.25000000', '15000.00000000', '11.25000000', 2, 1, '2018-10-26 05:25:12', '2018-10-26 06:43:29'),
(13, NULL, '1500.00000000', '500.00000000', '0.00000000', 2, 2, '2018-10-26 05:25:12', '2018-10-26 06:44:19'),
(14, NULL, '2000.00000000', '0.00000000', '0.00000000', 2, 3, '2018-10-26 05:25:12', '2018-10-26 05:25:12'),
(15, NULL, '2000.00000000', '0.00000000', '0.00000000', 2, 4, '2018-10-26 05:25:12', '2018-10-26 05:25:12'),
(16, NULL, '2000.00000000', '0.00000000', '0.00000000', 2, 5, '2018-10-26 05:25:12', '2018-10-26 05:25:12'),
(17, NULL, '2000.00000000', '0.00000000', '0.00000000', 2, 6, '2018-10-26 05:25:13', '2018-10-26 05:25:13'),
(18, NULL, '2000.00000000', '0.00000000', '0.00000000', 2, 7, '2018-10-26 05:25:13', '2018-10-26 05:25:13'),
(19, NULL, '2000.00000000', '0.00000000', '0.00000000', 2, 8, '2018-10-26 05:25:13', '2018-10-26 05:25:13'),
(20, NULL, '2000.00000000', '0.00000000', '0.00000000', 2, 9, '2018-10-26 05:25:13', '2018-10-26 05:25:13'),
(21, NULL, '2000.00000000', '0.00000000', '0.00000000', 2, 10, '2018-10-26 05:25:13', '2018-10-26 05:25:13'),
(22, NULL, '2000.00000000', '0.00000000', '0.00000000', 2, 11, '2018-10-26 05:25:13', '2018-10-26 05:25:13');

-- --------------------------------------------------------

--
-- Table structure for table `user_account_histories`
--

CREATE TABLE `user_account_histories` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `withdraw_transactions`
--

CREATE TABLE `withdraw_transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `asset_pairs`
--
ALTER TABLE `asset_pairs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `asset_pairs_parent_id_foreign` (`parent_id`),
  ADD KEY `asset_pairs_child_id_foreign` (`child_id`);

--
-- Indexes for table `commission_transactions`
--
ALTER TABLE `commission_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposit_transactions`
--
ALTER TABLE `deposit_transactions`
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
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_asset_pair_id_foreign` (`asset_pair_id`);

--
-- Indexes for table `order_histories`
--
ALTER TABLE `order_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_transactions`
--
ALTER TABLE `order_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_transactions_buyorder_id_foreign` (`buyorder_id`),
  ADD KEY `order_transactions_sellorder_id_foreign` (`sellorder_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_accounts`
--
ALTER TABLE `user_accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_accounts_user_id_foreign` (`user_id`),
  ADD KEY `user_accounts_asset_id_foreign` (`asset_id`);

--
-- Indexes for table `user_account_histories`
--
ALTER TABLE `user_account_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdraw_transactions`
--
ALTER TABLE `withdraw_transactions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `asset_pairs`
--
ALTER TABLE `asset_pairs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `commission_transactions`
--
ALTER TABLE `commission_transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deposit_transactions`
--
ALTER TABLE `deposit_transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order_histories`
--
ALTER TABLE `order_histories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_transactions`
--
ALTER TABLE `order_transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_accounts`
--
ALTER TABLE `user_accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user_account_histories`
--
ALTER TABLE `user_account_histories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `withdraw_transactions`
--
ALTER TABLE `withdraw_transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `asset_pairs`
--
ALTER TABLE `asset_pairs`
  ADD CONSTRAINT `asset_pairs_child_id_foreign` FOREIGN KEY (`child_id`) REFERENCES `assets` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `asset_pairs_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `assets` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_asset_pair_id_foreign` FOREIGN KEY (`asset_pair_id`) REFERENCES `asset_pairs` (`id`),
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_transactions`
--
ALTER TABLE `order_transactions`
  ADD CONSTRAINT `order_transactions_buyorder_id_foreign` FOREIGN KEY (`buyorder_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_transactions_sellorder_id_foreign` FOREIGN KEY (`sellorder_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_accounts`
--
ALTER TABLE `user_accounts`
  ADD CONSTRAINT `user_accounts_asset_id_foreign` FOREIGN KEY (`asset_id`) REFERENCES `assets` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_accounts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
