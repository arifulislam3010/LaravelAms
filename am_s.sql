-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2017 at 09:22 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `am_s`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(10) UNSIGNED NOT NULL,
  `account_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `account_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dashboard_watchlist` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `required_status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `account_type_id` int(10) UNSIGNED NOT NULL,
  `parent_account_type_id` int(10) UNSIGNED NOT NULL,
  `branch_id` int(10) UNSIGNED NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `account_name`, `account_code`, `description`, `dashboard_watchlist`, `required_status`, `account_type_id`, `parent_account_type_id`, `branch_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'gaZ0UX5MGH', 'uhsd3bf3fg', '0LuXbFpojm', '0', '1', 9, 1, 8, 10, 3, '1990-06-15 08:09:14', '1986-02-11 17:01:46'),
(2, 'V634IdBaPv', 'PkQlKIktne', '7IfOkg9Yiq', '1', '0', 5, 2, 5, 9, 1, '1992-10-08 08:15:34', '1980-10-31 20:47:18'),
(3, 'NS1mRFTylQ', 'xt7Uso3Ayu', 'ICsgpcVTmk', '1', '0', 5, 6, 10, 3, 7, '1994-11-03 06:54:52', '1988-04-15 00:59:10'),
(4, 'hEocqaF92l', 'tSb6d9fMWU', 'qcNoUpXLDH', '0', '1', 7, 7, 2, 3, 10, '1994-12-10 03:55:15', '1992-03-01 16:49:43'),
(5, 'bGu7f2vzqg', 'E9R6OVPAKZ', 'DHxeeA1Om0', '0', '0', 5, 7, 6, 9, 1, '1984-07-25 06:26:22', '1970-08-21 10:09:35'),
(6, 'P7Yk70ukYK', '0kIwwJtAId', '4e97c9Eg9p', '1', '1', 7, 8, 5, 1, 5, '2004-11-25 05:37:37', '2013-04-15 06:15:01'),
(7, 'wR8zJRdJyi', 'Y1OxzHUiEk', 'gzJsMGspns', '0', '1', 2, 4, 4, 1, 6, '2003-06-08 12:58:28', '2007-06-20 15:22:10'),
(8, 'dt7R3cZfrX', 'mtpOHR69Gj', '9OvHMD1lvp', '0', '1', 5, 2, 10, 9, 5, '2000-06-23 15:37:03', '1986-01-18 04:46:11'),
(9, 'aq5k8St4KZ', 'XjUmJlT0qH', 'gRTRSEMZIT', '1', '1', 10, 4, 10, 9, 3, '1979-05-18 04:34:13', '2010-01-01 23:35:55'),
(10, 'KqgfsoTMim', 'Jvd8xSgNHw', '0CkI55s4nF', '0', '0', 10, 6, 3, 4, 7, '2003-05-12 07:35:58', '1998-02-18 12:48:54');

-- --------------------------------------------------------

--
-- Table structure for table `account_type`
--

CREATE TABLE `account_type` (
  `id` int(10) UNSIGNED NOT NULL,
  `account_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_account_type_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `account_type`
--

INSERT INTO `account_type` (`id`, `account_name`, `description`, `parent_account_type_id`, `created_at`, `updated_at`) VALUES
(1, 'HNhb2ud1TY', 'nwdJUvW0a0', 4, '2004-12-17 05:52:42', '2015-01-07 07:22:00'),
(2, 'IEZc3nUh8Z', 'mhxciaKEwX', 1, '1992-02-29 14:18:47', '1979-05-12 23:05:06'),
(3, '9DPBqL8KT4', 'ZBVSlvM4mt', 8, '2016-11-13 02:26:09', '1983-05-23 07:54:52'),
(4, 'gCNarCCJFd', 'w5DORkOXru', 4, '1970-04-11 00:33:45', '2006-01-08 13:02:55'),
(5, 'gSNPAMyFhd', 'CIk7cDbFKV', 3, '1976-04-02 00:03:51', '1997-01-11 17:59:43'),
(6, 'ybb1Ho9ytF', 'JehgLi0Mhl', 7, '1996-04-19 04:59:43', '1977-08-03 15:19:10'),
(7, 'Lu7ZEFs7tg', 'x7Gu37rhj2', 6, '2009-03-05 20:02:22', '2013-01-05 00:24:45'),
(8, 'ymXdI7IHgg', '3VjF7HsbhQ', 3, '2000-11-06 12:41:47', '1997-08-30 09:21:13'),
(9, 'Ar0Nq2lRzt', 'HkdWR50uaC', 6, '1970-07-07 17:20:06', '2016-09-21 15:49:19'),
(10, 'yyvf4nfoiJ', 'KGFjAbSh2V', 1, '1992-12-10 23:09:51', '2000-04-13 15:48:44');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `id` int(10) UNSIGNED NOT NULL,
  `branch_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `branch_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `branch_name`, `branch_description`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Oea0IwhsJP', 'cJU3tRm5R1', 8, 5, '1994-12-19 12:11:20', '2006-08-18 10:06:58'),
(2, 'ncOdIfzz2x', 'eoO07syNPy', 4, 3, '1980-07-01 05:56:22', '1994-12-08 09:23:48'),
(3, 'uub1fRZlWX', '9a7nhYpWRn', 3, 6, '1979-04-06 12:01:09', '1983-07-28 20:35:53'),
(4, 'tF1xITqSnc', '3HlmLof9XT', 5, 10, '1975-12-10 09:03:10', '2015-06-09 16:37:12'),
(5, 'EUQlisPE4h', 'Wjo1QpiYfz', 5, 1, '2004-01-05 15:13:15', '2009-04-10 03:02:39'),
(6, 'X73pMD1oW7', 'PltPZyMuFo', 9, 10, '2001-01-15 19:43:05', '1978-01-21 21:42:08'),
(7, 'AasI6fAhmr', '7L19ErHLeP', 7, 10, '2001-08-22 20:55:48', '1973-10-20 17:33:59'),
(8, 'HyASDiqvkB', 'Okk2utxAEh', 5, 5, '1973-01-29 09:16:36', '1976-03-21 20:10:02'),
(9, 'Ecw54ON38C', '454sRYRuhb', 10, 1, '2006-07-24 17:00:25', '1987-12-10 15:09:02'),
(10, 'NcYbkFa0oq', 'W7mIYRWNeH', 3, 5, '2001-01-19 17:36:23', '2005-01-27 10:44:11');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profile_pic_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `skype_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_number_1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_number_2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_number_3` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billing_street` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billing_city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billing_state` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billing_zip_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billing_country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipping_street` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipping_city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipping_state` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipping_zip_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipping_country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fb_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tw_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `about` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_category_id` int(10) UNSIGNED NOT NULL,
  `branch_id` int(10) UNSIGNED NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `first_name`, `last_name`, `profile_pic_url`, `display_name`, `company_name`, `email_address`, `skype_name`, `phone_number_1`, `phone_number_2`, `phone_number_3`, `billing_street`, `billing_city`, `billing_state`, `billing_zip_code`, `billing_country`, `shipping_street`, `shipping_city`, `shipping_state`, `shipping_zip_code`, `shipping_country`, `fb_id`, `tw_id`, `about`, `contact_status`, `contact_category_id`, `branch_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'SEqbxAuhRQ', 'mpWbKVN4aw', 'PSbBMcJzDg', 'VgvYxolC1R', 'ipWpbuoQVf', 'MGE1uy1p0X', 'bsmSz5iZE5', 'cSaZUxMkB5', 'DOEtt0aAPu', '5N7w4MM1db', 'cugPDYr1G9', 'vWzYAVmYoU', 'c5xdc5lss3', '9DlHDPrblR', 'ZrnqlcapqS', 'J3A8xNZ0M8', 'LPA4WL6fY1', 'zOGcjMgbKW', 'PkQEAphNbk', 'rPCu9YiRNJ', '7dGjQPD1h8', 'JewN71QokC', '2IfSJrhglZ', 'KASbqzYdUo', 2, 5, 3, 3, NULL, NULL),
(2, 'e5iulltSme', 'HlxI518ZQH', 'Yx2DxODREH', '6b7hyADwNc', 'HAZfeebQEs', 'bptJfCqcQi', 'ydBZPhXmmv', 'rVp4MFlf0j', 'gbd1ohgerb', 'Mb7nf2wr0q', 'OZjgGbkPDE', 'fwcOzyg3gx', 'CvjNUmy3F7', 'LsyaY4QU8y', 'sCREeJFvsu', 'qQVfJaRYOW', 'jFIgj6RLHN', 'uHqNHoFolx', 'pv4qocaRSZ', 'MiPuFyNFy1', 'VTXcKy6ike', '3IQ6De1ZjU', 'QUtxgvZV6G', 'imfBGOW4zm', 2, 1, 1, 2, NULL, NULL),
(3, 'edMcE7T7wA', 'GM6HU5YS65', 'EFevr5A8zt', 'OQm41yfZt0', 'wCdtnbEXt5', 'DbqF957KH3', 'ffvtxCqIox', 'ZN7jJiUn63', 'jqbKfPu4oN', 'FpkmcMSr8P', 'BN9zZBzKZ8', 'r99hzvnWRy', 'FxiBQstpK3', 'GnItNxDpMm', 'BZh5yVL5Jt', 'fziXmDZiiE', 'awhrQIFqSp', 'rQqNG9JbB8', 'CZESB1Emw9', 'OQrkRkp4Uo', 'AhHa50rGIG', 'Mbm0DfpYZs', '3f2sWF3WRy', 'Ea836eohR8', 1, 1, 2, 5, NULL, NULL),
(4, 'fwxolpMdqC', 'bJijAzvquU', 'cNhoHhWrFh', 'MaPoALGtKT', '9VAJxlq2Q9', 'CHVprA8zR0', 'uEDLgZSp2d', 'dy7gNxK53j', 'eWngezLyDM', 'JxL9FcK26V', 'kLhdg4bUTr', 'lAEYF0OUJO', 'Wd2Qu4FZCb', 'tWAJUmM2d8', 'YNaURZbRXp', 'V3kODKCbMI', '3cyqt214Sj', 'V9v6BDjZm8', 'tMghbBlShF', 'oF0OBQwxFG', 'QixIKdL0Jo', '5XaovzD6yI', '6IttUDtQk5', 'KsJwDf9vOm', 6, 1, 5, 8, NULL, NULL),
(5, '8wDyGkdzpa', 'r402ZhOny2', 'sVSHNMXZx7', 'TJ0yusgNh9', 'eIEe1ENkb2', 'qiGUP88rRN', 'rTp3ee38De', 'c1RsLkAmZT', '8Jpaegk4tG', 'wjbCGtDcoP', 'bHYvvSwukP', 'Km9084E2F7', '7iUCAMy8EJ', 'ZyhYUrnp7I', '65vFuCaFoW', 'ECbVKLbgCC', 'VeWWT8nGcQ', 'y5Ap1Q2yGY', 'MrctKI3K4z', 'PF0HNZMGDP', 'ifiX0umZbG', '2w6PaYKPZ9', 'QYBK3nvCQF', 'L9dwepdb0S', 5, 4, 8, 6, NULL, NULL),
(6, 'T2aL0haK5b', 'OFDcfnV0BZ', 'OfztQ9xNf1', 'lCHKXVeRTP', 'f18BHkFIRJ', 'Rcn4lwa6GA', '7LyuFprSfS', 'pg9bEwsR6u', 'nQxmJur3On', 'CCPfLclESM', 'yAbhVV3zRc', 'eqUubqMyqt', 'aAmToUL2PS', 'LcV5hy62h0', 'EV0Wui32xp', 'eYIJMPnq0e', 'LOnZBWzWlr', 'mS2hzIZ4JY', 'NE8kAdDk9v', 'blcBcGcTG0', '4U4aBLxU2a', 'ZNVzyzvoDz', 'mOWwaov3OG', 'WgrtRbUKdT', 10, 2, 9, 7, NULL, NULL),
(7, 'jTHEbVyBIo', 'j8zed6JgU5', 'GgmtUk79ZY', 'XLQug1ixnM', 'YbK5kM1yVW', 'uChje9yfjr', 'ZCe0KgM1A8', 'N2xRLKTVc0', 'QCRSCMRcbl', 'wlKZ7Opp4S', 'gKjBZYtM1t', '5SnRsm0Nxi', '1Q6M2qB2UL', 'FkQ1ktKqWt', '6FEGgUgAhv', 'ZynFbyQc5I', 'wg3SFmwwmM', '062VkYjKda', '1pVGpi6Y4A', 'qmBMOL5rqS', 'rBomDZYtoC', 'ZVS3dbcdLt', 'rBc15Nj7zG', 'u7s5IZN85L', 6, 2, 8, 1, NULL, NULL),
(8, '2oYLFQVD0X', 'pT6Zh6bvWj', 'BdvseCyw42', '0rze6XjztH', 'yFfgY15mkc', 'dDvEMQuYrU', 'PhpouDuktg', 'DihAzUZ4s1', 'Dj6ngOT9eY', 'czQWowRZ5j', 'JTRhndBejA', '2oQDJSXFpG', 'x5BWLm0PCK', 'mm5bISXXln', '4ETpi0ileI', 'Aup7JuLBTy', 'p2cekrimIF', 'XdXmORigcy', 'V9X1BveXAg', '9Ooc0DsRO4', 'BdWzUgPEDa', 'y3zj3tiGDr', 'h9SBNizaig', 'iRMZcmtiW0', 2, 3, 10, 9, NULL, NULL),
(9, '46wAvh3nec', 'V3KSZnNeBi', 'GK3B3Vf8Y1', 'qzb7hsay3Y', '9y8cEw6ASD', '8AUgRPBbmr', '3bsOcI0Bp3', 'lAuanVZe32', 'Wk0h2hgtCX', '5YAaJLdDFd', 'ttYCdKoD9r', 'XXvMvKKElB', 'i9khqkLup3', 'Wz69tX7Eku', '6TYRLCIiXI', 'Re3t2PB3i2', 'tCsofHPVU3', 'x6qKiDQLl8', 'gmNW1ErdDz', 'rW65jvH7Kf', 'AzcusWbJ8p', 'GdPgPUMW1N', 'dJpbTaR9Yk', 'wNAXJzYvQe', 7, 8, 4, 6, NULL, NULL),
(10, 'V2kWATIo4m', '40Nu1yg3KI', 'ROfAqQV74y', 'qOQZiYSONP', 'P7tOkAe2LW', 'ypQE1zRoc3', 'gxLpEDI3ui', 'OvgBXfnFsB', 'CAhV8uZ3UB', 'bwlIFUi90X', 'CagMffo0qu', '1WxmYJl7Qt', 'ZYLpNyGn4Y', 'VIaYPYIxBh', 'Ze0RM07Mi7', 'vkYguDrxYP', 'WAup1YmURP', 'RRsh3WAGJt', 'GvifzWsj9V', 'y6N0xc013P', 'a6olngPgep', 'DPjEzetqx2', 'PIZo3jTI6B', 'pon2gSzGTb', 10, 10, 7, 10, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact_category`
--

CREATE TABLE `contact_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `contact_category_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_category_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `branch_id` int(10) UNSIGNED NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contact_category`
--

INSERT INTO `contact_category` (`id`, `contact_category_name`, `contact_category_description`, `branch_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'EySRKbTMHn', 'WhuYMJCGXP', 9, 7, 2, '1998-06-13 02:37:47', '1989-05-03 06:19:57'),
(2, 'bDj4P1X7DD', 'W3dSrmHWKc', 3, 7, 5, '2002-04-28 03:18:19', '2010-03-05 07:47:48'),
(3, 'an3gp8mSP7', 't4oT1yAXKc', 8, 6, 9, '2002-03-25 17:11:53', '2015-03-19 17:00:39'),
(4, 'rCBlntzjW8', 'FMN2ST04v8', 4, 10, 6, '1980-03-01 21:06:08', '1985-10-20 09:02:49'),
(5, 'kvDk8fBtIP', 'CyZGX5f0Gy', 2, 8, 1, '2006-03-15 14:41:53', '1973-05-02 01:56:27'),
(6, 'JtdKiqOGLh', 'gcdOXza5g0', 8, 6, 5, '2011-10-22 09:50:44', '1998-12-12 03:35:00'),
(7, '33BoFt82C1', 'kpWFQ5N2oI', 8, 10, 2, '1980-10-21 15:46:42', '1994-03-07 07:33:14'),
(8, 'aSjTSxEINJ', 'ReHB4HwmGD', 5, 10, 7, '1985-09-09 11:24:25', '2002-05-16 12:53:43'),
(9, 'am7xsxuZoW', 'qVFRCHFu7N', 3, 2, 7, '1977-02-08 18:51:06', '1992-01-22 01:12:11'),
(10, 'STfl5W8CET', 'sELKwNIhix', 9, 2, 8, '1975-03-18 07:54:09', '1987-04-30 00:14:31');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(10) UNSIGNED NOT NULL,
  `item_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `item_about` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `item_sales_rate` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `item_sales_account` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `item_sales_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `item_sales_tax` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `item_purchase_rate` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `item_purchase_account` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `item_purchase_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reorder_point` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `barcode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `item_image_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total_purchases` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total_sales` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `item_category_id` int(10) UNSIGNED NOT NULL,
  `branch_id` int(10) UNSIGNED NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `item_name`, `item_about`, `item_sales_rate`, `item_sales_account`, `item_sales_description`, `item_sales_tax`, `item_purchase_rate`, `item_purchase_account`, `item_purchase_description`, `reorder_point`, `barcode`, `item_image_url`, `total_purchases`, `total_sales`, `item_category_id`, `branch_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(2, 'FL0OwQW8jv', 'uX8NJ7zNMe', 'tLaX6s35Dp', 'ELxUJNVQjg', 'ETSFVhIf2L', 'Ej6sbPrHSh', 'Cujo1DGssp', 'MDYhFR6cD1', 'WF4mHPlQcy', 'hgLbOk4pGw', 'vT6CS10xlK', 'xLUrrR3SLq', '8SHipocNfk', 'NCG1FN0z8m', 7, 2, 10, 8, '1984-04-14 14:00:09', '1984-11-15 01:33:28'),
(3, 'fOi9IWcfNN', 'Nhr5uXcwqW', 'jvnGPfyrgH', '5yD0JV0Awm', 'yzMOxWTOdm', 'SbfsoVurU0', 'ZBidVBXzfn', '55xBHZFubZ', 'gG9mA7S8n1', 'kHpJdg3e2m', '80ERfrfE6w', '5jjAzLXGls', 'hv6o60qnnH', '2BZSDW5it0', 6, 9, 8, 2, '2005-12-03 02:35:07', '1991-04-20 23:05:11'),
(4, 'xy9VqeX1Vu', 'efpB7E9SWX', '3NF2sr9qYr', 'yIH6lEJvel', 'YcxhWM7R3k', 'TDTM4c0HCP', 'FHzW1MVmQK', 'dM9yPG2Kzf', 'rmUHYksXwL', 'UgzYxwPj2D', 'ZSOqNhCaEK', 'OooftnV2WG', 'KN5kacNMnV', '9kTsIH5n5D', 8, 8, 9, 1, '1995-08-15 16:26:01', '1979-03-19 11:58:30'),
(5, 'xqjaI8dCuR', '4JMYYU3ozk', 'pvwrz1T7Sd', 'DDAhN5DKaB', 'Wpg96B1fsQ', 'QgDHv80yjz', 'Mx8LQzIk3t', 'w0Nr1M3lBq', 'ZqsDhcfofI', 'JN9nx3jEGY', '0FxKa6nFQn', 'VZLq4kM1sC', 'jRe5DjqLH2', 'Y4jAA7igej', 4, 8, 5, 10, '1982-02-05 18:35:26', '1971-02-25 19:26:32'),
(6, '7yzsHxzFUW', 'tLOCZZkFsv', 'hgUfxJR6DA', 'Fa5P0NlQPA', 'IndKwhYFwI', '1DuouKqun6', 'f4uy2E9VIw', 'R2Lx3tbHSx', 'rdlFUjDyDk', 'sb1eQjtujv', 'cB4Rbesn4w', 'e10P6T8G70', 'O0bdQcrjuR', 'aIMvpA6xgE', 1, 1, 9, 5, '1990-05-13 19:58:40', '1980-08-29 03:33:14'),
(7, 'PUS2qjmP4f', 'PImisyQqjl', 'l0lymEQeTI', '8PYiGM5VWO', 'vMEwVrekri', 'rNaBzelwqe', 'VQ09EwvbYy', 'd1Y3LfnoG4', 'mJcKsyXjTM', 'RGLLNECnE1', 'f7bw0FhDbb', 'DXRB5K2Wmm', 'QjKqkVNrej', 'U7ZpaNnE2j', 9, 5, 6, 2, '2010-10-10 23:07:12', '2000-11-30 10:45:20'),
(8, 'UYUJzKI8dn', '8gHBDdIKLd', 'qQOIZH1K9P', 'jaVdPhTelP', 'VKIxhyYrm4', 'o5Jpq0Vecs', 'CrRxdaI6rF', '8bqSnljJXI', 'jtmCmwSuTb', 'QGpPAj0TIb', 'pp9Jfa1pNQ', 'izA70yJlVN', 'oaIQM7Y6JN', 'lp8lyUIYt6', 6, 5, 1, 10, '2005-12-11 12:38:01', '1995-05-27 03:17:03'),
(9, 'NyGwlDo51Y', 'CRDvAnmQci', 'ZA4vLpfRpW', 'UZQcS2acX7', 'hqihAe0cQt', 'wPzPSuCidi', 'UTd1e9IE6l', '7MDAsqWHBf', '2WQ2spQyPD', 'x4w982r4CB', '3yGpy8lku6', 'D7iDkeQADY', 'k3NBH7KHdP', 'hv97BHCIaX', 9, 2, 10, 3, '2010-11-19 13:15:25', '2004-12-19 13:40:38'),
(10, 'Zs3KDu15OX', 'gunkpt0fnn', 'MrRBT5BhjB', 'vuoQvU7qjE', '9ivF4m88xW', 'SeYJTTVfJ5', '0IQoqqlR7U', 'KsT39zyOIx', 'jRzLCGftfP', 'Z3jDW38j91', '1II7uNSn7D', 'LcXG28WTr8', '1qcrW6JadN', 'fuY7JkPLHP', 9, 2, 9, 6, '1971-03-20 02:32:56', '2009-05-07 15:34:28');

-- --------------------------------------------------------

--
-- Table structure for table `item_category`
--

CREATE TABLE `item_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `item_category_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `item_category_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `branch_id` int(10) UNSIGNED NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `item_category`
--

INSERT INTO `item_category` (`id`, `item_category_name`, `item_category_description`, `branch_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'fjTaPaCxPZ', '4NjkZ944Sp', 5, 2, 4, '2002-06-09 17:32:11', '1988-09-11 06:34:38'),
(2, '1XuVk5YMus', 'Z2TEu0PYxp', 7, 8, 8, '1991-10-08 00:48:26', '2001-07-17 09:32:11'),
(3, 'Wd6DoJffls', 'yXaIhTeyK5', 8, 1, 9, '1984-08-17 06:52:26', '2012-09-15 00:10:24'),
(4, 'G7RY8oEVNt', 'yOgWcuvKjr', 9, 8, 2, '1980-01-28 15:45:26', '1990-11-08 18:59:44'),
(5, 'pRr15ls9BL', 'rV46QKgeIK', 3, 10, 10, '2006-06-21 00:12:31', '2015-08-06 06:14:28'),
(6, 'sPnQqbnosY', 'b7SJqXt3Wc', 10, 7, 10, '2015-03-15 14:49:42', '2004-11-03 07:15:04'),
(7, 'co5Xpy8AT7', 'aKWU0MfeZf', 8, 1, 7, '2008-05-23 21:55:10', '2010-08-08 10:09:12'),
(8, 'tEIktTYFSR', 'n2i0U8Zfp1', 1, 3, 7, '1983-05-20 00:07:29', '1986-04-05 06:21:56'),
(9, 'L75ocRLLZ0', 'MZvIeQdv2I', 4, 4, 5, '2013-06-10 19:07:43', '1973-10-15 00:36:41'),
(10, 'uuHqRlCL5r', 'kqSQFkrGWN', 2, 10, 4, '2009-07-02 22:07:15', '1983-03-26 15:19:42');

-- --------------------------------------------------------

--
-- Table structure for table `journal`
--

CREATE TABLE `journal` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reference` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `branch_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `journal_entries`
--

CREATE TABLE `journal_entries` (
  `id` int(10) UNSIGNED NOT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `debit_credit` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `journal_id` int(10) UNSIGNED NOT NULL,
  `account_name_id` int(10) UNSIGNED NOT NULL,
  `contact_id` int(10) UNSIGNED NOT NULL,
  `tax_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(19, '2014_10_12_000000_create_users_table', 1),
(20, '2014_10_12_100000_create_password_resets_table', 1),
(21, '2017_01_18_092901_create_user_activations_table', 1),
(22, '2017_02_02_053156_create_branch_table', 1),
(23, '2017_02_02_053157_create_contact_category_table', 1),
(24, '2017_02_02_053223_create_contact_table', 1),
(25, '2017_02_10_044940_create_parent_account_type_table', 1),
(26, '2017_02_10_045717_create_account_type_table', 1),
(27, '2017_02_10_045727_create_account_table', 1),
(28, '2017_02_11_053630_create_tax_table', 1),
(29, '2017_02_11_053631_create_journal_table', 1),
(30, '2017_02_11_053646_create_journal_entries_table', 1),
(31, '2017_02_13_181447_create_item_category_table', 1),
(32, '2017_02_13_181545_create_item_table', 1),
(33, '2017_02_13_181630_create_stock_table', 1),
(34, '2017_02_13_181719_create_product_table', 1),
(35, '2017_02_13_181753_create_product_phase_table', 1),
(36, '2017_02_13_181830_create_product_phase_item_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `parent_account_type`
--

CREATE TABLE `parent_account_type` (
  `id` int(10) UNSIGNED NOT NULL,
  `account_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `parent_account_type`
--

INSERT INTO `parent_account_type` (`id`, `account_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'hVclzxyAUx', 'wHcll8crMV', '1971-07-22 08:18:11', '1975-02-23 20:11:00'),
(2, 'wDylBvc9Hz', '5uyQkRe6eM', '1984-11-22 00:15:44', '1984-09-27 11:11:23'),
(3, 'MKtw1QtiU5', 'IdYmiyFvlN', '1983-06-28 02:58:16', '1984-06-25 09:31:58'),
(4, 'VafSlddsbc', 'WJjQo1NKjV', '1975-11-19 10:43:29', '1974-04-10 20:24:51'),
(5, 'ZDSdHKYl39', 'YKE3PnCTF6', '1989-03-02 03:23:37', '1975-09-30 06:24:59'),
(6, 'DeIyJwEGwO', '002zBfu5QB', '2011-11-12 12:28:40', '1986-11-04 15:11:24'),
(7, 'Fqod1OxtLY', 'eWKzkl4liK', '1989-10-09 04:09:03', '1979-01-25 06:14:51'),
(8, '4bd7OvR0RE', 'wbvFtksand', '1999-02-10 05:56:56', '2010-02-02 00:27:45'),
(9, 'qQmmzv9rGw', 'TVXiG8UYU3', '1976-07-04 05:25:36', '2005-12-11 13:59:12'),
(10, 'AALAcaziz0', 'vDTTuJgvvd', '2010-03-08 07:35:04', '2015-08-19 22:51:48');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total_product` int(11) DEFAULT NULL,
  `branch_id` int(10) UNSIGNED NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `total_product`, `branch_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(5, 'wnqX6RVDya', 9, 8, 10, 7, '1979-09-01 06:21:41', '1977-07-18 08:49:06'),
(6, 'IdyGq4vmJP', 9, 3, 4, 8, '1986-10-02 08:00:51', '2006-07-25 22:14:46'),
(7, 'VoKvdxjC12', 10, 2, 10, 8, '2012-08-17 03:08:42', '2015-10-08 16:21:18'),
(8, '7HtbVffuU0', 4, 4, 2, 7, '1976-12-02 07:10:20', '2005-11-02 02:33:14'),
(9, 'Y4s8Fox1qu', 6, 4, 7, 9, '2003-01-17 09:28:40', '1977-03-29 14:25:30'),
(10, 'bGCp1gb0t3', 10, 2, 8, 1, '2008-03-18 15:08:01', '2008-08-18 16:22:58'),
(13, 'nkTqCKoUfb', 7, 6, 1, 1, '2017-02-17 05:07:58', '2017-02-17 05:07:58');

-- --------------------------------------------------------

--
-- Table structure for table `product_phase`
--

CREATE TABLE `product_phase` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_phase_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_phase`
--

INSERT INTO `product_phase` (`id`, `product_phase_name`, `status`, `product_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '3q61sgXNjK', 'A5tpsibAuR', 9, 8, 5, '2003-12-28 09:45:41', '1983-02-26 05:16:08'),
(4, 'PhserETKP6', 'R4lyjCfk4V', 7, 9, 6, '1994-03-10 07:17:07', '2000-05-08 13:45:47'),
(5, 'NFOEfYOo8N', '53ZypSX9lr', 5, 8, 1, '1982-08-28 12:06:35', '1989-05-01 20:12:18'),
(8, 'h5xyMPPiZZ', '2MI0Cghiem', 8, 4, 6, '1997-01-31 16:52:07', '2009-07-13 00:30:43'),
(10, '7jdGAHW70V', 'qG5iX6iuZ0', 9, 7, 2, '1991-07-15 02:32:41', '1982-04-15 19:09:21');

-- --------------------------------------------------------

--
-- Table structure for table `product_phase_item`
--

CREATE TABLE `product_phase_item` (
  `id` int(10) UNSIGNED NOT NULL,
  `total` int(11) DEFAULT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `issued_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reference` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reason` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `personal_note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `recipient_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `issued_by` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_phase_id` int(10) UNSIGNED NOT NULL,
  `item_category_id` int(10) UNSIGNED NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_phase_item`
--

INSERT INTO `product_phase_item` (`id`, `total`, `date`, `issued_number`, `reference`, `reason`, `personal_note`, `recipient_name`, `issued_by`, `product_id`, `product_phase_id`, `item_category_id`, `item_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(3, 7, 'jH1awGtBHQ', '0YrRgKnYKq', 'VSUbEePJWM', 'sutTVw2h6E', 'RhmFqkf3Pb', 'Qd5T6oYpK3', 5, 6, 10, 7, 8, 6, 5, '2005-08-04 04:44:57', '1982-08-18 13:09:56'),
(8, 4, 'mzB0GckXV2', '3JhJEwTnVg', 'X687bAV8mJ', 'PZaAmvTbID', 'vt2QMFxwjP', 'YzW5EGta39', 3, 9, 5, 9, 9, 3, 7, '2007-09-24 18:31:11', '1976-12-22 10:37:42');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int(10) UNSIGNED NOT NULL,
  `total` int(11) DEFAULT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `item_category_id` int(10) UNSIGNED NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL,
  `branch_id` int(10) UNSIGNED NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `total`, `date`, `item_category_id`, `item_id`, `branch_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(5, 3, 'ZqO9yqtIRV', 10, 10, 6, 5, 10, '2016-01-24 01:53:44', '2006-12-24 00:37:28'),
(8, 10, 'f0bxNQ8AgA', 6, 2, 8, 1, 1, '1980-03-13 22:15:10', '2017-02-16 10:42:08'),
(10, 6, 'biRzHnQ3pi', 8, 5, 8, 2, 3, '2010-11-11 10:38:44', '1976-05-26 11:37:56'),
(12, 13, '15.02.2017', 7, 2, 2, 1, 1, '2017-02-16 10:19:16', '2017-02-16 10:19:16');

-- --------------------------------------------------------

--
-- Table structure for table `tax`
--

CREATE TABLE `tax` (
  `id` int(10) UNSIGNED NOT NULL,
  `tax_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tax_amount` int(11) NOT NULL,
  `amount_percentage` int(11) NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tax`
--

INSERT INTO `tax` (`id`, `tax_name`, `tax_amount`, `amount_percentage`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'KyM6HDcGOU', 3, 1, 1, 4, '1991-01-04 22:13:36', '2013-11-25 02:08:36'),
(2, 'hqp4RESxBU', 5, 6, 1, 10, '2014-12-29 02:54:44', '1994-05-15 06:23:33'),
(3, '3bfqfRo4sc', 10, 1, 2, 5, '1996-11-03 00:56:18', '1977-11-15 22:44:21'),
(4, 'P19xynGTr5', 7, 1, 4, 7, '2013-08-12 16:18:33', '2008-11-15 23:17:12'),
(5, 'at99raY344', 10, 10, 5, 6, '2011-03-25 01:29:50', '1997-09-25 03:03:01'),
(6, '60OBKE5bEt', 1, 8, 10, 8, '1989-03-04 16:15:15', '1995-10-07 23:00:09'),
(7, '727k5uOBDo', 3, 8, 6, 8, '1999-01-04 16:15:59', '2011-07-10 12:49:33'),
(8, 'pN1WGCv59p', 9, 6, 7, 5, '1981-09-19 04:48:17', '2011-01-19 21:14:42'),
(9, '90Gs9tDLma', 3, 3, 7, 9, '1994-05-14 11:30:49', '1999-08-01 11:03:28'),
(10, 'ZYXl0tiN2Y', 5, 8, 5, 5, '1997-03-12 03:00:37', '2012-06-25 04:07:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `activated`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'pJcYtvCwbC', 'a@gmail.com', '$2y$10$Hq5ZrI6XylM.WXRkuQpdI.JovjoGREqgSs1h44RMHACgW79qaf1/2', 1, NULL, NULL, NULL),
(2, 'CDBWrn8PSx', 'QUnV64Zxum@gmail.com', '$2y$10$pXH5Ohwyr3cnNHLo.ze4U.stS.OB3rxnulLyVgqWLzzcaTeD9VTN2', 1, NULL, NULL, NULL),
(3, 'RJj4Ro6EhH', 'RQgPvCOXRW@gmail.com', '$2y$10$d0/Es9DSQre6YJ0yf127JeY8lqlYxbNxcHXUu.XmYLPvc03clRccW', 1, NULL, NULL, NULL),
(4, 'Kopho7VgUv', 'HkQRCWzU8K@gmail.com', '$2y$10$QSv2PmI281n8RQGwjU7/fuKM09oe/7pZA4K/7ooY.GwpMwuL8sxne', 1, NULL, NULL, NULL),
(5, 'Q5NlInfEiU', 'vstIwXKozp@gmail.com', '$2y$10$NDH3YdgnJa8szgKez7.DZOTKOIiMoqr6B2YvaNOS6c..ReRpyzxKm', 1, NULL, NULL, NULL),
(6, 'T6MMF2HiuG', 'QC9SwnCE21@gmail.com', '$2y$10$kdw.seM76WBiNEgv7S34Ae3hfFUAkytbsf4KU0qQnuIjMYYtTw8Ra', 1, NULL, NULL, NULL),
(7, 'T0BeesesWq', 'XbK14U0oBN@gmail.com', '$2y$10$h3qE7MxWs8NkXWAYHdyJSOEi69bxMwUQPR7zGyK4L0oXZ62y9GYwa', 1, NULL, NULL, NULL),
(8, 'eDEtmzBpJg', 'D0Vc7b42Ve@gmail.com', '$2y$10$nH/y7PMdRc5jXZgRUeEhjuPGlME4HCn9vEAIJOqi6A.CavK3eJRyq', 1, NULL, NULL, NULL),
(9, 'Jfwaaqw1SW', 'hibnNdTFLE@gmail.com', '$2y$10$ww5xWcVT1tx28/.F5beLe.3LuleZSoQx8HXCwXCI8aewxTbM0Upu.', 1, NULL, NULL, NULL),
(10, 'gjKzM7fMzD', 's4cBmR2LyV@gmail.com', '$2y$10$Dkl/DpFJ0ImQHwXr2pnDk.w8Gm2SsIA4vbG9dIizQls7tve6FEV7C', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_activations`
--

CREATE TABLE `user_activations` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD KEY `account_account_type_id_foreign` (`account_type_id`),
  ADD KEY `account_parent_account_type_id_foreign` (`parent_account_type_id`),
  ADD KEY `account_branch_id_foreign` (`branch_id`),
  ADD KEY `account_created_by_foreign` (`created_by`),
  ADD KEY `account_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `account_type`
--
ALTER TABLE `account_type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `account_type_parent_account_type_id_foreign` (`parent_account_type_id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`),
  ADD KEY `branch_created_by_foreign` (`created_by`),
  ADD KEY `branch_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contact_contact_category_id_foreign` (`contact_category_id`),
  ADD KEY `contact_branch_id_foreign` (`branch_id`),
  ADD KEY `contact_created_by_foreign` (`created_by`),
  ADD KEY `contact_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `contact_category`
--
ALTER TABLE `contact_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contact_category_branch_id_foreign` (`branch_id`),
  ADD KEY `contact_category_created_by_foreign` (`created_by`),
  ADD KEY `contact_category_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_item_category_id_foreign` (`item_category_id`),
  ADD KEY `item_branch_id_foreign` (`branch_id`),
  ADD KEY `item_created_by_foreign` (`created_by`),
  ADD KEY `item_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `item_category`
--
ALTER TABLE `item_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_category_branch_id_foreign` (`branch_id`),
  ADD KEY `item_category_created_by_foreign` (`created_by`),
  ADD KEY `item_category_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `journal`
--
ALTER TABLE `journal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `journal_branch_id_foreign` (`branch_id`);

--
-- Indexes for table `journal_entries`
--
ALTER TABLE `journal_entries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `journal_entries_journal_id_foreign` (`journal_id`),
  ADD KEY `journal_entries_account_name_id_foreign` (`account_name_id`),
  ADD KEY `journal_entries_contact_id_foreign` (`contact_id`),
  ADD KEY `journal_entries_tax_id_foreign` (`tax_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parent_account_type`
--
ALTER TABLE `parent_account_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_branch_id_foreign` (`branch_id`),
  ADD KEY `product_created_by_foreign` (`created_by`),
  ADD KEY `product_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `product_phase`
--
ALTER TABLE `product_phase`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_phase_product_id_foreign` (`product_id`),
  ADD KEY `product_phase_created_by_foreign` (`created_by`),
  ADD KEY `product_phase_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `product_phase_item`
--
ALTER TABLE `product_phase_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_phase_item_issued_by_foreign` (`issued_by`),
  ADD KEY `product_phase_item_product_id_foreign` (`product_id`),
  ADD KEY `product_phase_item_product_phase_id_foreign` (`product_phase_id`),
  ADD KEY `product_phase_item_item_category_id_foreign` (`item_category_id`),
  ADD KEY `product_phase_item_item_id_foreign` (`item_id`),
  ADD KEY `product_phase_item_created_by_foreign` (`created_by`),
  ADD KEY `product_phase_item_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stock_item_category_id_foreign` (`item_category_id`),
  ADD KEY `stock_item_id_foreign` (`item_id`),
  ADD KEY `stock_branch_id_foreign` (`branch_id`),
  ADD KEY `stock_created_by_foreign` (`created_by`),
  ADD KEY `stock_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `tax`
--
ALTER TABLE `tax`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tax_created_by_foreign` (`created_by`),
  ADD KEY `tax_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_activations`
--
ALTER TABLE `user_activations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_activations_token_index` (`token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `account_type`
--
ALTER TABLE `account_type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `contact_category`
--
ALTER TABLE `contact_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `item_category`
--
ALTER TABLE `item_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `journal`
--
ALTER TABLE `journal`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `journal_entries`
--
ALTER TABLE `journal_entries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `parent_account_type`
--
ALTER TABLE `parent_account_type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `product_phase`
--
ALTER TABLE `product_phase`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `product_phase_item`
--
ALTER TABLE `product_phase_item`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tax`
--
ALTER TABLE `tax`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `user_activations`
--
ALTER TABLE `user_activations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_account_type_id_foreign` FOREIGN KEY (`account_type_id`) REFERENCES `account_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `account_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `account_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `account_parent_account_type_id_foreign` FOREIGN KEY (`parent_account_type_id`) REFERENCES `parent_account_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `account_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `account_type`
--
ALTER TABLE `account_type`
  ADD CONSTRAINT `account_type_parent_account_type_id_foreign` FOREIGN KEY (`parent_account_type_id`) REFERENCES `parent_account_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `branch`
--
ALTER TABLE `branch`
  ADD CONSTRAINT `branch_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `branch_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `contact_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contact_contact_category_id_foreign` FOREIGN KEY (`contact_category_id`) REFERENCES `contact_category` (`id`),
  ADD CONSTRAINT `contact_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contact_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contact_category`
--
ALTER TABLE `contact_category`
  ADD CONSTRAINT `contact_category_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contact_category_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contact_category_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `item_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `item_item_category_id_foreign` FOREIGN KEY (`item_category_id`) REFERENCES `item_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `item_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item_category`
--
ALTER TABLE `item_category`
  ADD CONSTRAINT `item_category_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `item_category_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `item_category_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `journal`
--
ALTER TABLE `journal`
  ADD CONSTRAINT `journal_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`id`);

--
-- Constraints for table `journal_entries`
--
ALTER TABLE `journal_entries`
  ADD CONSTRAINT `journal_entries_account_name_id_foreign` FOREIGN KEY (`account_name_id`) REFERENCES `account` (`id`),
  ADD CONSTRAINT `journal_entries_contact_id_foreign` FOREIGN KEY (`contact_id`) REFERENCES `contact` (`id`),
  ADD CONSTRAINT `journal_entries_journal_id_foreign` FOREIGN KEY (`journal_id`) REFERENCES `journal` (`id`),
  ADD CONSTRAINT `journal_entries_tax_id_foreign` FOREIGN KEY (`tax_id`) REFERENCES `tax` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_phase`
--
ALTER TABLE `product_phase`
  ADD CONSTRAINT `product_phase_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_phase_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_phase_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_phase_item`
--
ALTER TABLE `product_phase_item`
  ADD CONSTRAINT `product_phase_item_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_phase_item_issued_by_foreign` FOREIGN KEY (`issued_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_phase_item_item_category_id_foreign` FOREIGN KEY (`item_category_id`) REFERENCES `item_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_phase_item_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_phase_item_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_phase_item_product_phase_id_foreign` FOREIGN KEY (`product_phase_id`) REFERENCES `product_phase` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_phase_item_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stock_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stock_item_category_id_foreign` FOREIGN KEY (`item_category_id`) REFERENCES `item_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stock_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stock_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tax`
--
ALTER TABLE `tax`
  ADD CONSTRAINT `tax_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tax_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
