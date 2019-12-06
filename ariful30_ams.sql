-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 06, 2019 at 05:37 AM
-- Server version: 5.6.41-84.1
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ariful30_ams`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_level`
--

CREATE TABLE `access_level` (
  `id` int(10) UNSIGNED NOT NULL,
  `create` tinyint(1) NOT NULL DEFAULT '0',
  `read` tinyint(1) NOT NULL DEFAULT '0',
  `update` tinyint(1) NOT NULL DEFAULT '0',
  `delete` tinyint(1) NOT NULL DEFAULT '0',
  `module_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `access_level`
--

INSERT INTO `access_level` (`id`, `create`, `read`, `update`, `delete`, `module_id`, `role_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 1, '2014-03-27 12:44:26', '2019-01-02 14:25:20'),
(2, 1, 1, 1, 1, 2, 1, 1, 1, '1993-05-09 08:29:57', '2019-01-02 14:25:20'),
(3, 1, 1, 1, 1, 3, 1, 1, 1, '2007-06-27 17:51:06', '2019-01-02 14:25:20'),
(4, 1, 1, 1, 1, 1, 2, 1, 1, '2000-07-01 00:46:41', '2011-04-18 16:10:41'),
(5, 1, 1, 0, 0, 2, 2, 1, 1, '2001-04-04 07:49:48', '1992-12-03 19:39:13'),
(6, 0, 0, 1, 0, 3, 2, 1, 1, '1975-10-08 08:00:33', '1983-09-06 12:43:15'),
(7, 1, 1, 1, 0, 1, 3, 1, 1, '1974-12-14 15:56:00', '1995-03-19 04:25:25'),
(8, 1, 1, 1, 0, 2, 3, 1, 1, '2007-03-28 06:36:25', '2015-12-07 02:45:08'),
(9, 1, 1, 1, 0, 3, 3, 1, 1, '1988-09-24 07:53:16', '2001-02-01 09:24:41'),
(10, 1, 1, 1, 1, 4, 1, 1, 1, '2019-01-02 14:25:20', '2019-01-02 14:26:20'),
(11, 1, 1, 1, 1, 5, 1, 1, 1, '2019-01-02 14:25:20', '2019-01-02 14:26:20'),
(12, 1, 1, 1, 1, 6, 1, 1, 1, '2019-01-02 14:25:20', '2019-01-02 14:26:20'),
(13, 1, 1, 1, 1, 7, 1, 1, 1, '2019-01-02 14:25:20', '2019-01-02 14:26:20'),
(14, 1, 1, 1, 1, 8, 1, 1, 1, '2019-01-02 14:25:20', '2019-01-02 14:26:20'),
(15, 1, 1, 1, 1, 9, 1, 1, 1, '2019-01-02 14:25:20', '2019-01-02 14:26:20'),
(16, 1, 1, 1, 1, 10, 1, 1, 1, '2019-01-02 14:25:20', '2019-01-02 14:26:20'),
(17, 1, 1, 1, 1, 11, 1, 1, 1, '2019-01-02 14:25:20', '2019-01-02 14:26:20'),
(18, 1, 1, 1, 1, 12, 1, 1, 1, '2019-01-02 14:25:20', '2019-01-02 14:26:20'),
(19, 1, 1, 1, 1, 13, 1, 1, 1, '2019-01-02 14:25:20', '2019-01-02 14:26:20'),
(20, 1, 1, 1, 1, 14, 1, 1, 1, '2019-01-02 14:25:20', '2019-01-02 14:26:20'),
(21, 1, 1, 1, 1, 15, 1, 1, 1, '2019-01-02 14:25:20', '2019-01-02 14:26:20'),
(22, 1, 1, 1, 1, 16, 1, 1, 1, '2019-01-02 14:25:20', '2019-01-02 14:26:20'),
(23, 1, 1, 1, 1, 17, 1, 1, 1, '2019-01-02 14:25:20', '2019-01-02 14:26:20'),
(24, 1, 1, 1, 1, 18, 1, 1, 1, '2019-01-02 14:25:20', '2019-01-02 14:26:20');

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(10) UNSIGNED NOT NULL,
  `account_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `account_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `dashboard_watchlist` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `required_status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `account_type_id` int(10) UNSIGNED NOT NULL,
  `parent_account_type_id` int(10) UNSIGNED NOT NULL,
  `branch_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `account_name`, `account_code`, `description`, `dashboard_watchlist`, `required_status`, `account_type_id`, `parent_account_type_id`, `branch_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Advance Tax', 'Advance Tax', 'Any tax which is paid in advance is recorded into the advance tax account. This advance tax payment could be a quarterly, half yearly or yearly payment.', '0', '1', 3, 1, 1, 1, 1, '1987-11-13 11:17:33', '2010-07-19 10:23:31'),
(2, 'Employee Advance', 'Employee Advance', 'Money paid out to an employee in advance can be tracked here till it is repaid or shown to be spent for company purposes.', '0', '1', 3, 1, 1, 1, 1, '1988-03-22 17:26:02', '1977-03-05 04:49:48'),
(3, 'Petty Cash', 'Petty Cash', 'It is a small amount of cash that is used to pay your minor or casual expenses rather than writing a check.', '0', '1', 4, 1, 1, 1, 1, '1993-03-08 19:16:40', '1985-09-02 23:47:19'),
(4, 'Undeposited Funds', 'Undeposited Funds', 'Record funds received by your company yet to be deposited in a bank as undeposited funds and group them as a current asset in your balance sheet.', '0', '1', 4, 1, 1, 1, 1, '1995-06-19 04:27:30', '1996-09-16 23:09:56'),
(5, 'Accounts Receivable', 'Accounts Receivable', 'The money that customers owe you becomes the accounts receivable. A good example of this is a payment expected from an invoice sent to your customer.', '0', '1', 2, 1, 1, 1, 1, '1994-02-22 08:47:10', '1971-07-28 16:58:32'),
(6, 'Inventory Asset', 'Inventory Asset', 'An account which tracks the value of goods in your inventory.', '0', '1', 7, 1, 1, 1, 1, '1972-03-19 19:30:41', '1996-07-12 10:36:39'),
(7, 'Opening Balance Adjustments', 'Opening Balance Adjustments', 'This account will hold the difference in the debits and credits entered during the opening balance.', '0', '1', 9, 2, 1, 1, 1, '1999-09-17 07:16:28', '1981-09-15 03:33:00'),
(8, 'Employee Reimbursements', 'Employee Reimbursements', 'This account can be used to track the reimbursements that are due to be paid out to employees.', '0', '1', 9, 2, 1, 1, 1, '2008-08-15 07:06:14', '1991-09-21 23:43:36'),
(9, 'Tax Payable', 'Tax Payable', 'The amount of money which you owe to your tax authority is recorded under the tax payable account. This amount is a sum of your outstanding in taxes and the tax charged on sales.', '0', '1', 9, 2, 1, 1, 1, '2017-03-20 12:27:53', '2011-09-12 09:43:10'),
(10, 'Unearned Revenue', 'Unearned Revenue', 'A liability account that reports amounts received in advance of providing goods or services. When the goods or services are provided, this account balance is decreased and a revenue account is increased.', '0', '1', 9, 2, 1, 1, 1, '1998-12-15 08:01:51', '2008-10-18 15:10:29'),
(11, 'Accounts Payable', 'Accounts Payable', 'This is an account of all the money which you owe to others like a pending bill payment to a vendor,etc.', '0', '1', 13, 2, 1, 1, 1, '2002-09-28 16:18:20', '1981-10-08 08:08:59'),
(12, 'Tag Adjustments', 'Tag Adjustments', 'This adjustment account tracks the transfers between different reporting tags.', '0', '1', 12, 2, 1, 1, 1, '1999-06-03 10:02:08', '1997-07-21 13:25:13'),
(13, 'Drawings', 'Drawings', 'The money withdrawn from a business by its owner can be tracked with this account.', '0', '1', 14, 3, 1, 1, 1, '2017-06-22 21:00:48', '1988-05-01 16:42:20'),
(14, 'Opening Balance Offset', 'Opening Balance Offset', 'This is an account where you can record the balance from your previous years earning or the amount set aside for some activities. It is like a buffer account for your funds.', '0', '1', 14, 3, 1, 1, 1, '1977-10-05 13:12:31', '1985-08-16 17:07:18'),
(15, 'Owner Equity', 'Owner Equity', 'The owners rights to the assets of a company can be quantified in the owner\'s equity account.', '0', '1', 14, 3, 1, 1, 1, '2005-07-02 03:58:50', '1974-03-25 04:47:49'),
(16, 'Sales', 'Sales', 'The income from the sales in your business is recorded under the sales account.', '0', '1', 15, 4, 1, 1, 1, '2017-05-11 11:55:17', '1991-12-26 06:03:35'),
(17, 'General Income', 'General Income', 'A general category of account where you can record any income which cannot be recorded into any other category.', '0', '1', 15, 4, 1, 1, 1, '2010-01-19 11:04:37', '2007-10-31 08:03:19'),
(18, 'Other Charges', 'Other Charges', 'Miscellaneous charges like adjustments made to the invoice can be recorded in this account.', '0', '1', 15, 4, 1, 1, 1, '1989-08-28 04:01:50', '1975-02-01 00:01:15'),
(19, 'Interest Income', 'Interest Income', 'A percentage of your balances and deposits are given as interest to you by your banks and financial institutions. This interest is recorded into the interest income account.', '0', '1', 15, 4, 1, 1, 1, '1991-10-15 13:09:06', '2010-03-13 14:29:22'),
(20, 'Shipping Charge', 'Shipping Charge', 'Shipping charges made to the invoice will be recorded in this account.', '0', '1', 15, 4, 1, 1, 1, '1999-10-28 23:09:39', '1981-03-06 17:26:45'),
(21, 'Discount', 'Discount', 'Any reduction on your selling price as a discount can be recorded into the discount account.', '0', '1', 15, 4, 1, 1, 1, '1992-09-24 23:28:13', '2018-09-28 14:54:41'),
(22, 'Late Fee Income', 'Late Fee Income', 'Any late fee income is recorded into the late fee income account. The late fee is levied when the payment for an invoice is not received by the due date.', '0', '1', 15, 4, 1, 1, 1, '2009-10-28 17:16:44', '1995-06-20 05:41:26'),
(23, 'Other Expenses', 'Other Expenses', 'Any minor expense on activities unrelated to primary business operations is recorded under the other expense account.', '0', '1', 17, 5, 1, 1, 1, '1978-11-10 20:07:13', '1990-04-13 08:42:10'),
(24, 'Bad Debt', 'Bad Debt', 'Any amount which is lost and is unrecoverable is recorded into the bad debt account.', '0', '1', 17, 5, 1, 1, 1, '2018-06-28 20:12:09', '2005-01-06 21:12:44'),
(25, 'Exchange Gain or Loss', 'Exchange Gain or Loss', 'Changing the conversion rate can result in a gain or a loss. You can record this into the exchange gain or loss account.', '0', '1', 19, 5, 1, 1, 1, '1972-09-11 05:02:19', '2015-11-29 10:03:26'),
(26, 'Cost of Goods Sold', 'Cost of Goods Sold', 'An expense account which tracks the value of the goods sold.', '0', '1', 18, 5, 1, 1, 1, '2017-05-08 01:31:36', '1988-02-24 11:21:40'),
(27, 'Prepaid Expense', 'Prepaid Expense', 'An asset account that reports amounts paid in advance while purchasing goods or services from a vendor.', '0', '1', 3, 1, 1, 1, 1, '1983-02-17 16:58:10', '1972-04-30 10:25:21'),
(28, 'Bank', 'Bank', 'An asset account that reports amounts paid in advance while purchasing goods or services from a vendor.', '0', '1', 5, 1, 1, 1, 1, '1989-08-26 20:57:10', '1980-08-08 00:01:09'),
(30, 'Agent Commission', 'Agent Commission', 'Agent Commission.', '0', '1', 3, 1, 1, 1, 1, '1996-01-24 02:11:17', '2010-07-13 07:20:50'),
(31, 'BA', 'BA', NULL, NULL, '1', 5, 1, NULL, 1, 1, '2019-02-02 08:50:09', '2019-02-02 08:50:09');

-- --------------------------------------------------------

--
-- Table structure for table `account_type`
--

CREATE TABLE `account_type` (
  `id` int(10) UNSIGNED NOT NULL,
  `account_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `parent_account_type_id` int(10) UNSIGNED NOT NULL,
  `required_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `account_type`
--

INSERT INTO `account_type` (`id`, `account_name`, `description`, `parent_account_type_id`, `required_status`, `created_at`, `updated_at`) VALUES
(1, 'Other Asset', 'Track special assets like goodwill and other intangible assets', 1, 0, '1987-05-05 19:39:35', '2016-07-06 11:40:19'),
(2, 'Accounts Receivable', 'Reflects money owed to you by your customers. Zoho Books provides a default Accounts Receivable account. E.g. Unpaid Invoices', 1, 1, '1988-08-18 06:10:39', '1972-05-13 05:18:03'),
(3, 'Other Current asset', 'Any short term asset that can be converted into cash or cash equivalents easily - Prepaid expenses - Stocks and Mutual Funds', 1, 0, '1982-03-12 23:46:32', '1988-04-21 05:16:44'),
(4, 'Cash', 'To keep track of cash and other cash equivalents like petty cash, undeposited funds, etc.', 1, 0, '2011-02-20 22:50:25', '1970-11-15 06:14:59'),
(5, 'Bank', 'To keep track of bank accounts like Savings, Checking, and Money Market accounts', 1, 0, '1970-04-30 10:59:12', '1977-09-23 11:55:16'),
(6, 'Fixed asset', 'Any long term investment or an asset that cannot be converted into cash easily like:-Land and Buildings - Plant, Machinery and Equipment - Computers -Furniture', 1, 0, '1973-07-24 20:32:29', '1998-02-19 21:43:30'),
(7, 'Stock', 'To keep track of your inventory assets.', 1, 0, '2014-10-12 03:31:34', '1993-07-17 14:23:22'),
(9, 'Other Current Liability', 'Any short term liability like:Customer Deposits - Tax Payable', 2, 0, '1998-03-31 22:17:09', '1976-11-17 12:36:08'),
(10, 'Credit Card', 'Create a trail of all your credit card transactions by creating a credit card account', 2, 0, '2007-12-14 12:33:34', '1982-05-23 21:45:49'),
(11, 'Long Term Liability', 'Liabilities that mature after a minimum period of one year like Notes Payable, Debentures, and Long Term Loans', 2, 0, '2012-04-20 22:00:49', '2006-02-26 09:28:28'),
(12, 'Other Liability', 'Obligation of an entity arising from past transactions or events which would require repayment.- Tax to be paid Loan to be Repaid Accounts Payable etc', 2, 0, '1987-02-12 03:54:41', '2000-03-09 01:13:49'),
(13, 'Accounts Payable', 'Accounts Payable', 2, 1, '1979-07-13 17:56:25', '1982-05-02 07:51:04'),
(14, 'Equity', 'Equity', 3, 0, '1981-10-30 12:38:42', '2018-03-04 10:22:29'),
(15, 'income', 'income', 4, 0, '1975-12-04 02:53:46', '1988-03-19 13:38:05'),
(16, 'Other Income', 'Other Income', 4, 0, '1973-04-24 15:42:38', '1995-04-23 10:38:25'),
(17, 'Expense', 'Expense', 5, 0, '2002-12-23 04:15:46', '2012-04-28 01:15:09'),
(18, 'Cost of Goods Sold', 'Cost of Goods Sold', 5, 0, '2005-08-24 04:23:26', '2000-07-17 04:45:03'),
(19, 'Other Expense', 'Other Expense', 5, 0, '1986-10-12 20:34:43', '2014-10-20 14:30:12');

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
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
  `branch_id` int(10) UNSIGNED NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`id`, `first_name`, `last_name`, `profile_pic_url`, `display_name`, `company_name`, `email_address`, `skype_name`, `phone_number_1`, `phone_number_2`, `phone_number_3`, `billing_street`, `billing_city`, `billing_state`, `billing_zip_code`, `billing_country`, `shipping_street`, `shipping_city`, `shipping_state`, `shipping_zip_code`, `shipping_country`, `fb_id`, `tw_id`, `about`, `contact_status`, `branch_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'mm', 'mmm', NULL, 'mmm', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', 1, 1, 1, '2019-02-02 08:48:21', '2019-02-02 08:48:21');

-- --------------------------------------------------------

--
-- Table structure for table `agreement_paper`
--

CREATE TABLE `agreement_paper` (
  `id` int(10) UNSIGNED NOT NULL,
  `country_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `agreement_paper_pax`
--

CREATE TABLE `agreement_paper_pax` (
  `id` int(10) UNSIGNED NOT NULL,
  `agreement_paper_id` int(10) UNSIGNED NOT NULL,
  `recruit_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `airlines`
--

CREATE TABLE `airlines` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `airlines`
--

INSERT INTO `airlines` (`id`, `name`, `comment`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'nn', 'mm', 1, 1, '2019-05-14 02:51:02', '2019-05-14 02:51:02');

-- --------------------------------------------------------

--
-- Table structure for table `airlinetaxs`
--

CREATE TABLE `airlinetaxs` (
  `id` int(10) UNSIGNED NOT NULL,
  `airline_id` int(10) UNSIGNED NOT NULL,
  `tickettax_id` int(10) UNSIGNED NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `backup`
--

CREATE TABLE `backup` (
  `id` int(10) UNSIGNED NOT NULL,
  `file_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `backupschedules`
--

CREATE TABLE `backupschedules` (
  `id` int(10) UNSIGNED NOT NULL,
  `mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `intervaldays` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `particulars` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cheque_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total_amount` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bank_account_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `notes` longtext COLLATE utf8_unicode_ci NOT NULL,
  `invoice_show` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_id` int(10) UNSIGNED NOT NULL,
  `account_id` int(10) UNSIGNED NOT NULL,
  `payment_mode_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bill_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` double NOT NULL,
  `due_amount` double NOT NULL,
  `bill_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `due_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `item_rates` int(11) NOT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total_tax` double NOT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `file_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vendor_id` int(10) UNSIGNED NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bill_entry`
--

CREATE TABLE `bill_entry` (
  `id` int(10) UNSIGNED NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL,
  `account_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `tax_id` int(10) UNSIGNED NOT NULL,
  `amount` double NOT NULL,
  `bill_id` int(10) UNSIGNED NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `id` int(10) UNSIGNED NOT NULL,
  `branch_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `branch_description` longtext COLLATE utf8_unicode_ci,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `branch_name`, `branch_description`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'FmVY1q1puW', 'Libero debitis enim ad ea similique qui. In quisquam ipsum omnis veniam consequuntur voluptas rerum et. Ea ut eaque qui rerum harum dignissimos explicabo. Id tempore aut id dignissimos laboriosam minima ratione. Aut sit animi aut.', 1, 1, '2011-06-16 18:00:18', '2018-09-01 20:53:02'),
(2, 'Ei6np0qkVn', 'Architecto quasi rerum est non provident voluptas iusto. Sapiente iusto ipsum vel fuga quisquam. Rerum explicabo quibusdam vel iusto eaque aspernatur.', 1, 1, '2012-06-21 16:56:37', '2005-05-26 04:12:58'),
(3, 'gyVZSDE7P2', 'Mollitia ut dignissimos voluptatum dolore labore rerum. Ut eligendi similique voluptas consequatur cumque. Quo fugiat placeat et quo eligendi ratione rerum. Quaerat unde ut facilis veritatis rerum. Expedita voluptatem consequatur occaecati ea quae et rerum.', 1, 1, '1978-05-08 08:45:40', '2001-06-29 12:56:36'),
(4, '7iYqTPAmOq', 'Optio molestiae praesentium est est sed rerum. Laborum minus praesentium et libero ut quos perspiciatis. Expedita non ipsa iste officia fugit minus.', 1, 1, '2014-01-07 20:56:34', '1977-08-31 10:39:16'),
(5, 'Zf947mBQ1D', 'Et sapiente aperiam possimus consequuntur ut optio. Rerum cupiditate incidunt et quis fugiat. Quos deserunt commodi velit. Blanditiis nam error ullam voluptas et ut in.', 1, 1, '2007-12-31 22:20:56', '2015-08-06 04:13:01'),
(6, '8MMaBRG76v', 'Est accusantium quia rerum eum. Ea voluptatum fugit nam tempora et. Architecto velit sunt ex deleniti cupiditate eligendi totam. Ut neque corrupti inventore hic et voluptas fugiat.', 1, 1, '1987-01-06 10:50:23', '2006-05-04 03:14:12'),
(7, 'ocFbuHvP0Z', 'Alias quisquam debitis sapiente. Veritatis assumenda ipsum iure consectetur asperiores pariatur explicabo saepe. Omnis qui aut iste consequatur fuga maiores sapiente. Dolor ut eveniet cupiditate nostrum aspernatur iste.', 1, 1, '2004-02-13 07:33:57', '1998-03-17 08:32:49'),
(8, 'gfs4SgDCA4', 'Ipsam pariatur eos dolor exercitationem aut aut eum. Consequatur aut corrupti fuga expedita cumque officia. Quaerat fugiat aperiam tempore porro ullam sapiente.', 1, 1, '2018-09-03 23:03:42', '1975-02-13 06:02:21'),
(9, 'usKJAPUeQF', 'Vel sit quis commodi aut ullam dolores impedit aspernatur. Laudantium temporibus molestias explicabo explicabo quam sit illo. Quam ea debitis qui praesentium dignissimos qui. Fugit fuga voluptate placeat quia.', 1, 1, '2017-08-04 03:20:16', '2001-11-07 19:56:51'),
(10, 'FzldS1XP1w', 'Cumque quasi non libero et. Voluptatem facilis corporis maiores eligendi cum iure ut. Aut quam tenetur quidem. Tempore excepturi quo id ut omnis iusto.', 1, 1, '1978-03-17 08:39:11', '1996-02-21 01:36:43');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `salary` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mealallowance` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `airtransport` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `referencename` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nameAr` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contactNumber` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `companyAddress` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `agent_id` int(10) UNSIGNED DEFAULT NULL,
  `branch_id` int(10) UNSIGNED NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `account_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `first_name`, `last_name`, `profile_pic_url`, `display_name`, `company_name`, `email_address`, `skype_name`, `phone_number_1`, `phone_number_2`, `phone_number_3`, `billing_street`, `billing_city`, `billing_state`, `billing_zip_code`, `billing_country`, `shipping_street`, `shipping_city`, `shipping_state`, `shipping_zip_code`, `shipping_country`, `fb_id`, `tw_id`, `about`, `contact_status`, `contact_category_id`, `agent_id`, `branch_id`, `created_by`, `updated_by`, `created_at`, `updated_at`, `account_id`) VALUES
(1, 'Bank ', 'Asia', NULL, 'BA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', 5, NULL, 1, 1, 1, '2019-02-02 08:50:09', '2019-02-02 08:50:09', NULL),
(2, 'Ariful Islam', 'Shibly', NULL, 'AIS', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', 1, 1, 1, 1, 1, '2019-02-02 08:51:07', '2019-02-02 08:51:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact_category`
--

CREATE TABLE `contact_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `contact_category_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_category_description` longtext COLLATE utf8_unicode_ci,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contact_category`
--

INSERT INTO `contact_category` (`id`, `contact_category_name`, `contact_category_description`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Customer', 'Customer Description', 1, 1, '1991-07-21 15:16:07', '1978-05-15 08:16:20'),
(2, 'Dealer', 'Dealer Description', 1, 1, '1997-11-04 08:19:22', '2008-01-02 21:43:37'),
(3, 'Employee', 'Employee Description', 1, 1, '1992-09-02 19:07:39', '2016-11-12 00:01:14'),
(4, 'Vendor', 'Vandor Description', 1, 1, '1998-09-06 10:55:41', '1996-05-16 17:46:42'),
(5, 'Bank', 'Bank Description', 1, 1, '1971-02-18 10:25:48', '1995-05-30 09:45:36'),
(6, 'Agent', 'Agent Description', 1, 1, '2013-01-03 02:40:23', '1997-10-11 22:02:57');

-- --------------------------------------------------------

--
-- Table structure for table `credit_notes`
--

CREATE TABLE `credit_notes` (
  `id` int(10) UNSIGNED NOT NULL,
  `credit_note_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reference` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `credit_note_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `shiping_charge` double NOT NULL,
  `adjustment` double NOT NULL,
  `total_credit_note` double NOT NULL,
  `available_credit` double NOT NULL,
  `customer_note` longtext COLLATE utf8_unicode_ci NOT NULL,
  `terms_and_condition` longtext COLLATE utf8_unicode_ci NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `credit_note_entries`
--

CREATE TABLE `credit_note_entries` (
  `id` int(10) UNSIGNED NOT NULL,
  `quantity` double NOT NULL,
  `rate` double NOT NULL,
  `amount` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `discount` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL,
  `credit_note_id` int(10) UNSIGNED NOT NULL,
  `tax_id` int(10) UNSIGNED NOT NULL,
  `account_id` int(10) UNSIGNED NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `credit_note_payments`
--

CREATE TABLE `credit_note_payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `amount` double NOT NULL,
  `invoice_id` int(10) UNSIGNED NOT NULL,
  `credit_note_id` int(10) UNSIGNED NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `credit_note_refunds`
--

CREATE TABLE `credit_note_refunds` (
  `id` int(10) UNSIGNED NOT NULL,
  `amount` double NOT NULL,
  `payment_mode_id` int(10) UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reference` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `account_id` int(10) UNSIGNED NOT NULL,
  `credit_note_id` int(10) UNSIGNED NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `id` int(10) UNSIGNED NOT NULL,
  `documentcategory_id` int(10) UNSIGNED NOT NULL,
  `pax_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `notes` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `documentcategory`
--

CREATE TABLE `documentcategory` (
  `id` int(10) UNSIGNED NOT NULL,
  `categoryName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `summary` text COLLATE utf8_unicode_ci,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE `email` (
  `id` int(10) UNSIGNED NOT NULL,
  `to` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `details` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `estimates`
--

CREATE TABLE `estimates` (
  `id` int(10) UNSIGNED NOT NULL,
  `estimate_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ref` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `attn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `attn_designation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `heading` blob,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `terms_conditions` blob,
  `table_head` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `left_notation` blob,
  `right_notation` blob,
  `shipping_charge` double DEFAULT NULL,
  `adjustment` double DEFAULT NULL,
  `total_amount` double NOT NULL,
  `tax_total` double DEFAULT NULL,
  `due_amount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `estimate_entries`
--

CREATE TABLE `estimate_entries` (
  `id` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `amount` double NOT NULL,
  `discount` double DEFAULT NULL,
  `rate` double NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL,
  `estimate_id` int(10) UNSIGNED NOT NULL,
  `tax_id` int(10) UNSIGNED NOT NULL,
  `account_id` int(10) UNSIGNED NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `excess_payment`
--

CREATE TABLE `excess_payment` (
  `id` int(10) UNSIGNED NOT NULL,
  `amount` double NOT NULL,
  `payment_receives_id` int(10) UNSIGNED NOT NULL,
  `invoice_id` int(10) UNSIGNED NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` double NOT NULL,
  `paid_through_id` int(10) UNSIGNED NOT NULL,
  `tax_total` double DEFAULT NULL,
  `reference` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `account_id` int(10) UNSIGNED NOT NULL,
  `vendor_id` int(10) UNSIGNED NOT NULL,
  `tax_id` int(10) UNSIGNED NOT NULL,
  `tax_type` int(11) NOT NULL,
  `bank_info` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `invoice_show` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expensesector`
--

CREATE TABLE `expensesector` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `summary` text COLLATE utf8_unicode_ci,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fingerprint`
--

CREATE TABLE `fingerprint` (
  `id` int(10) UNSIGNED NOT NULL,
  `assignedDate` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `receivingDate` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `paxid` int(10) UNSIGNED NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `flight`
--

CREATE TABLE `flight` (
  `id` int(10) UNSIGNED NOT NULL,
  `carrierName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `flightDate` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vendor_id` int(10) UNSIGNED DEFAULT NULL,
  `paxid` int(10) UNSIGNED NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `form_basis`
--

CREATE TABLE `form_basis` (
  `id` int(10) UNSIGNED NOT NULL,
  `companyNameEN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `companyNameBN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ownerNameEN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ownerNameBN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `addressEN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `addressBN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `licenceEN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `licenceBN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ownerDesignationEN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ownerDesignationBN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `setting_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `form_basis`
--

INSERT INTO `form_basis` (`id`, `companyNameEN`, `companyNameBN`, `ownerNameEN`, `ownerNameBN`, `addressEN`, `addressBN`, `licenceEN`, `licenceBN`, `ownerDesignationEN`, `ownerDesignationBN`, `setting_id`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'formbasis', '2019-05-15 04:03:06', '2019-05-15 04:03:06');

-- --------------------------------------------------------

--
-- Table structure for table `gamca`
--

CREATE TABLE `gamca` (
  `id` int(10) UNSIGNED NOT NULL,
  `submission_date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `delivary_date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `recruit_id` int(10) UNSIGNED NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `immigration_clearance`
--

CREATE TABLE `immigration_clearance` (
  `id` int(10) UNSIGNED NOT NULL,
  `applicationDate` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total_person` int(11) NOT NULL,
  `person_count` int(11) NOT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stampFee` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `licenseValidity` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `authentication` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `unitWelfareFee` int(11) DEFAULT NULL,
  `incomeTaxType` tinyint(4) NOT NULL DEFAULT '0',
  `unitIncomeTaxNAFee` int(11) DEFAULT NULL,
  `unitIncomeTaxSAFee` int(11) DEFAULT NULL,
  `unitSmartCardFee` int(11) DEFAULT NULL,
  `payOrderDetails` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `WelfareComment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `incomeTaxComment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SmartCardComment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `immigration_clearance_pax`
--

CREATE TABLE `immigration_clearance_pax` (
  `id` int(10) UNSIGNED NOT NULL,
  `immigration_clearance_id` int(10) UNSIGNED NOT NULL,
  `pax_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `incomes`
--

CREATE TABLE `incomes` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` double NOT NULL,
  `receive_through_id` int(10) UNSIGNED NOT NULL,
  `tax_total` double DEFAULT NULL,
  `reference` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `account_id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `tax_id` int(10) UNSIGNED NOT NULL,
  `tax_type` int(11) NOT NULL,
  `bank_info` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `invoice_show` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `incomes`
--

INSERT INTO `incomes` (`id`, `date`, `amount`, `receive_through_id`, `tax_total`, `reference`, `note`, `account_id`, `customer_id`, `tax_id`, `tax_type`, `bank_info`, `invoice_show`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '2019-01-31', 30, 28, 4.09, 'mmm', 'mm', 27, 1, 4, 2, '', 'on', 1, 1, '2019-02-04 05:35:24', '2019-02-04 05:35:24');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(10) UNSIGNED NOT NULL,
  `invoice_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `file_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `invoice_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payment_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `customer_note` longtext COLLATE utf8_unicode_ci,
  `tax_total` double DEFAULT NULL,
  `shipping_charge` double DEFAULT NULL,
  `adjustment` double DEFAULT NULL,
  `total_amount` double NOT NULL,
  `due_amount` double NOT NULL,
  `pr_adjustment` double DEFAULT NULL,
  `pr_note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `personal_note` longtext COLLATE utf8_unicode_ci,
  `save` tinyint(4) DEFAULT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `agents_id` int(10) UNSIGNED DEFAULT NULL,
  `agentcommissionAmount` int(11) DEFAULT NULL,
  `commission_type` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `invoice_number`, `file_name`, `file_url`, `invoice_date`, `payment_date`, `customer_note`, `tax_total`, `shipping_charge`, `adjustment`, `total_amount`, `due_amount`, `pr_adjustment`, `pr_note`, `personal_note`, `save`, `customer_id`, `created_by`, `updated_by`, `created_at`, `updated_at`, `agents_id`, `agentcommissionAmount`, `commission_type`) VALUES
(1, '000001', NULL, NULL, '2019-02-02', '2019-02-02', ' ', 0, 0, 0, 6, 6, 1, '', NULL, 1, 2, 1, 1, '2019-02-02 08:52:41', '2019-04-04 22:31:30', 1, 6, 1),
(2, '000002', NULL, NULL, '04-04-2019', '04-04-2019', '', 0, 0, 0, 4, 0, 2, '', NULL, NULL, 2, 1, 1, '2019-04-04 20:32:03', '2019-04-05 19:44:52', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_entries`
--

CREATE TABLE `invoice_entries` (
  `id` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `amount` double NOT NULL,
  `discount` double DEFAULT NULL,
  `rate` double NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL,
  `invoice_id` int(10) UNSIGNED NOT NULL,
  `tax_id` int(10) UNSIGNED NOT NULL,
  `account_id` int(10) UNSIGNED NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `invoice_entries`
--

INSERT INTO `invoice_entries` (`id`, `quantity`, `amount`, `discount`, `rate`, `item_id`, `invoice_id`, `tax_id`, `account_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(2, 2, 6, 0, 3, 1, 2, 1, 16, 1, 1, '2019-04-04 20:32:03', '2019-04-04 20:32:03'),
(3, 2, 6, 0, 3, 1, 1, 1, 14, 1, 1, '2019-04-04 22:31:30', '2019-04-04 22:31:30');

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
  `item_sales_description` longtext COLLATE utf8_unicode_ci,
  `item_sales_tax` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `item_purchase_rate` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `item_purchase_account` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `item_purchase_description` longtext COLLATE utf8_unicode_ci,
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
(1, 'mm', 'mm', '3', NULL, 'mm', '2', '6', NULL, 'nn', '5', NULL, NULL, '9', '4', 1, 1, 1, 1, '2019-02-02 08:48:58', '2019-08-03 15:45:16'),
(2, 'This is product 1', '', '400', NULL, '', '', '450', NULL, '', '', NULL, NULL, NULL, NULL, 1, 1, 1, 1, '2019-04-06 16:22:45', '2019-04-06 16:22:45');

-- --------------------------------------------------------

--
-- Table structure for table `item_category`
--

CREATE TABLE `item_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `item_category_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `item_category_description` longtext COLLATE utf8_unicode_ci,
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
(1, 'Product', 'Et beatae dolor fugiat. Et dolor aut qui. Ullam voluptatem perspiciatis animi.', 3, 1, 1, '1986-05-20 02:31:32', '1989-06-26 07:44:45'),
(2, 'Service', 'Laudantium quia corporis non sint eaque. Voluptatem et id velit non ipsa. Cum non ut a et dolor.', 6, 1, 1, '1985-09-27 03:38:58', '1971-03-18 13:36:25');

-- --------------------------------------------------------

--
-- Table structure for table `journal`
--

CREATE TABLE `journal` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reference` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` longtext COLLATE utf8_unicode_ci,
  `branch_id` int(10) UNSIGNED NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `journal_entries`
--

CREATE TABLE `journal_entries` (
  `id` int(10) UNSIGNED NOT NULL,
  `note` longtext COLLATE utf8_unicode_ci,
  `debit_credit` int(11) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `account_name_id` int(10) UNSIGNED NOT NULL,
  `jurnal_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `journal_id` int(10) UNSIGNED DEFAULT NULL,
  `invoice_id` int(10) UNSIGNED DEFAULT NULL,
  `income_id` int(10) UNSIGNED DEFAULT NULL,
  `payment_receives_id` int(10) UNSIGNED DEFAULT NULL,
  `payment_receives_entries_id` int(10) UNSIGNED DEFAULT NULL,
  `credit_note_id` int(10) UNSIGNED DEFAULT NULL,
  `credit_note_refunds_id` int(10) UNSIGNED DEFAULT NULL,
  `expense_id` int(10) UNSIGNED DEFAULT NULL,
  `bill_id` int(10) UNSIGNED DEFAULT NULL,
  `bank_id` int(10) UNSIGNED DEFAULT NULL,
  `bill_entry_id` int(10) UNSIGNED DEFAULT NULL,
  `payment_made_id` int(10) UNSIGNED DEFAULT NULL,
  `payment_made_entry_id` int(10) UNSIGNED DEFAULT NULL,
  `contact_id` int(10) UNSIGNED DEFAULT NULL,
  `tax_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `salesComission_id` int(10) UNSIGNED DEFAULT NULL,
  `agent_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `journal_entries`
--

INSERT INTO `journal_entries` (`id`, `note`, `debit_credit`, `amount`, `account_name_id`, `jurnal_type`, `journal_id`, `invoice_id`, `income_id`, `payment_receives_id`, `payment_receives_entries_id`, `credit_note_id`, `credit_note_refunds_id`, `expense_id`, `bill_id`, `bank_id`, `bill_entry_id`, `payment_made_id`, `payment_made_entry_id`, `contact_id`, `tax_id`, `created_by`, `updated_by`, `created_at`, `updated_at`, `salesComission_id`, `agent_id`) VALUES
(5, 'mm', 1, 34.09, 28, 'income', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, 1, '2019-02-04 05:35:24', '2019-02-04 05:35:24', NULL, NULL),
(6, 'mm', 0, 30, 27, 'income', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, 1, '2019-02-04 05:35:24', '2019-02-04 05:35:24', NULL, NULL),
(7, 'mm', 0, 4.09, 9, 'income', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 1, 1, '2019-02-04 05:35:24', '2019-02-04 05:35:24', NULL, NULL),
(8, '', 1, 1, 4, 'payment_receive2', NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2019-04-04 03:43:49', '2019-04-04 03:43:49', NULL, NULL),
(9, '', 0, 1, 27, 'payment_receive2', NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2019-04-04 03:43:49', '2019-04-04 03:43:49', NULL, NULL),
(12, '', 1, 6, 5, 'invoice', NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, 1, 1, '2019-04-04 20:32:03', '2019-04-04 20:32:03', NULL, NULL),
(13, '', 0, 6, 16, 'invoice', NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, 1, 1, '2019-04-04 20:32:03', '2019-04-04 20:32:03', NULL, NULL),
(28, ' ', 1, 0.36, 30, 'invoice', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, 1, 1, '2019-04-04 22:31:30', '2019-04-04 22:31:30', NULL, 1),
(29, ' ', 0, 0.36, 11, 'invoice', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, 1, 1, '2019-04-04 22:31:30', '2019-04-04 22:31:30', NULL, 1),
(30, ' ', 1, 6, 5, 'invoice', NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, 1, 1, '2019-04-04 22:31:30', '2019-04-04 22:31:30', NULL, NULL),
(31, ' ', 0, 6, 14, 'invoice', NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, 1, 1, '2019-04-04 22:31:30', '2019-04-04 22:31:30', NULL, NULL),
(32, '', 1, 4, 4, 'payment_receive2', NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2019-04-04 22:34:28', '2019-04-04 22:34:28', NULL, NULL),
(33, '', 0, 4, 27, 'payment_receive2', NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2019-04-04 22:34:28', '2019-04-04 22:34:28', NULL, NULL),
(34, '', 1, 8888, 28, 'payment_receive2', NULL, NULL, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2019-04-05 19:44:52', '2019-04-05 19:44:52', NULL, NULL),
(35, '', 0, 8888, 27, 'payment_receive2', NULL, NULL, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2019-04-05 19:44:52', '2019-04-05 19:44:52', NULL, NULL),
(36, '', 0, 4, 11, 'payment_receive1', NULL, 2, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2019-04-05 19:44:52', '2019-04-05 19:44:52', NULL, NULL),
(37, '', 1, 4, 27, 'payment_receive1', NULL, 2, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2019-04-05 19:44:52', '2019-04-05 19:44:52', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `manpower`
--

CREATE TABLE `manpower` (
  `id` int(10) UNSIGNED NOT NULL,
  `issuingDate` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `receivingDate` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `paxid` int(10) UNSIGNED NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medicalslip`
--

CREATE TABLE `medicalslip` (
  `id` int(10) UNSIGNED NOT NULL,
  `pax_id` int(10) UNSIGNED NOT NULL,
  `medical_centre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `testdate` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reportdate` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `comment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medical_slip_form`
--

CREATE TABLE `medical_slip_form` (
  `id` int(10) UNSIGNED NOT NULL,
  `dateOfApplication` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medical_slip_form_pax`
--

CREATE TABLE `medical_slip_form_pax` (
  `id` int(10) UNSIGNED NOT NULL,
  `medicalslip_id` int(10) UNSIGNED NOT NULL,
  `recruit_id` int(10) UNSIGNED NOT NULL,
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_01_18_092901_create_user_activations_table', 1),
(4, '2017_02_02_053156_create_branch_table', 1),
(5, '2017_02_02_053157_create_contact_category_table', 1),
(6, '2017_02_02_053222_create_agents_table', 1),
(7, '2017_02_02_053223_create_contact_table', 1),
(8, '2017_02_10_044930_create_payment_mode_table', 1),
(9, '2017_02_10_044940_create_parent_account_type_table', 1),
(10, '2017_02_10_045717_create_account_type_table', 1),
(11, '2017_02_10_045727_create_account_table', 1),
(12, '2017_02_11_053630_create_tax_table', 1),
(13, '2017_02_11_053631_create_journal_table', 1),
(14, '2017_02_13_181447_create_item_category_table', 1),
(15, '2017_02_13_181545_create_item_table', 1),
(16, '2017_02_13_181719_create_product_table', 1),
(17, '2017_02_13_181753_create_product_phase_table', 1),
(18, '2017_02_13_181830_create_product_phase_item_table', 1),
(19, '2017_02_20_060418_create_modules_table', 1),
(20, '2017_02_20_060419_create_roles_table', 1),
(21, '2017_02_20_060456_create_access_level_table', 1),
(22, '2017_02_20_170318_create_product_phase_item_add_table', 1),
(23, '2017_03_09_071116_create_organization_profiles_table', 1),
(24, '2017_04_28_174719_create_invoices_table', 1),
(25, '2017_04_28_174745_create_invoice_entries_table', 1),
(26, '2017_04_29_161315_create_payment_receives_table', 1),
(27, '2017_04_29_161316_create_payment_receives_entries_table', 1),
(28, '2017_04_29_161406_create_credit_notes_table', 1),
(29, '2017_04_29_161420_create_credit_note_entries_table', 1),
(30, '2017_04_29_161439_create_credit_note_payments_table', 1),
(31, '2017_04_29_161458_create_credit_note_refunds_table', 1),
(32, '2017_05_05_033709_create_excess_payment_table', 1),
(33, '2017_06_06_230413_create_expense_table', 1),
(34, '2017_06_06_230649_create_bill_table', 1),
(35, '2017_06_06_230649_create_stock_table', 1),
(36, '2017_06_06_230716_create_bill_entry_table', 1),
(37, '2017_06_06_230904_create_payment_made_table', 1),
(38, '2017_06_06_230920_create_payment_made_entry_table', 1),
(39, '2017_07_02_093820_create_company_table', 1),
(40, '2017_07_02_093908_create_okala_table', 1),
(41, '2017_07_02_093955_create_fingerprint_table', 1),
(42, '2017_07_02_101441_create_recruitingorder_table', 1),
(43, '2017_07_02_101541_create_manpower_table', 1),
(44, '2017_07_02_101545_create_flight_table', 1),
(45, '2017_07_02_101552_create_relation_table', 1),
(46, '2017_07_02_111525_create_visaentrys_table', 1),
(47, '2017_07_02_112834_create_mofas_table', 1),
(48, '2017_07_02_113911_create_relation_mofa_visa_table', 1),
(49, '2017_07_02_114007_create_medicalSlip_table', 1),
(50, '2017_07_02_114116_create_musaned_table', 1),
(51, '2017_07_02_114223_create_visaStamping_table', 1),
(52, '2017_07_02_120151_create_relation_Stam_table', 1),
(53, '2017_07_03_102404_create_visas_table', 1),
(54, '2017_07_09_053945_create_form_basis_table', 1),
(55, '2017_07_09_054306_create_medical_slip_form_table', 1),
(56, '2017_07_09_054337_create_medical_slip_form_pax_table', 1),
(57, '2017_07_09_054343_create_recruit_customer_table', 1),
(58, '2017_07_09_054400_create_medical_slip_form_pax_relation_table', 1),
(59, '2017_07_09_072348_create_bank_table', 1),
(60, '2017_07_09_105254_create_document_cat_table', 1),
(61, '2017_07_09_105323_create_document_table', 1),
(62, '2017_07_09_105359_document_category_relation_table', 1),
(63, '2017_07_10_071211_add_extracolumn_to_company_table', 1),
(64, '2017_07_10_071504_add_extracolumn_to_recruting_table', 1),
(65, '2017_07_10_102221_create_expensesector_table', 1),
(66, '2017_07_10_102313_create_recruiteexpense_table', 1),
(67, '2017_07_10_102346_create_expense_pax_table', 1),
(68, '2017_07_10_103128_create_expense_sector_pax_relation_table', 1),
(69, '2017_07_11_044752_create_agreement_paper_table', 1),
(70, '2017_07_11_044810_create_agreement_paper_pax_table', 1),
(71, '2017_07_11_044830_create_agreement_paper_pax_relation_table', 1),
(72, '2017_07_12_033953_create_incomes_table', 1),
(73, '2017_07_13_034016_create_visaacceptance_table', 1),
(74, '2017_07_13_034117_create_gamca_table', 1),
(75, '2017_07_13_034123_create_visa_process_report_table', 1),
(76, '2017_07_13_034137_create_visaacceptance_relation_table', 1),
(77, '2017_07_15_041806_add_namear_to_company_table', 1),
(78, '2017_07_15_042901_create_visaforms_table', 1),
(79, '2017_07_15_043020_create_visaformbulks_table', 1),
(80, '2017_07_15_043043_create_visaformagreement_table', 1),
(81, '2017_07_15_043130_create_visaform_and_bulk_relation_table', 1),
(82, '2017_07_15_043201_create_visaform_and_agreement_relation', 1),
(83, '2017_07_15_065551_add_submissiondate_to_visaentry_table', 1),
(84, '2017_07_16_063504_add_so_cloumn_to_visaform_table', 1),
(85, '2017_07_16_085859_add_Qualification_cloumn_to_recruitcustomer_table', 1),
(86, '2017_07_16_091948_create_immigration_clearance_table', 1),
(87, '2017_07_16_092030_create_immigration_clearance_pax_table', 1),
(88, '2017_07_16_092527_create_immigration_clearance_pax_relation_table', 1),
(89, '2017_07_19_064337_create_TicketTaxs_table', 1),
(90, '2017_07_19_070312_create_Ticketcommission_table', 1),
(91, '2017_07_19_071729_create_TicketTaxsrelation_users_table', 1),
(92, '2017_07_20_051731_create_note_sheet_table', 1),
(93, '2017_07_20_051753_create_note_sheet_pax_table', 1),
(94, '2017_07_20_051813_create_note_sheet_pax_relation_table', 1),
(95, '2017_07_20_063113_create_airline_table', 1),
(96, '2017_07_20_063202_create_airline_tax_table', 1),
(97, '2017_07_20_063236_create_ticket_hotel_table', 1),
(98, '2017_07_20_063237_create_airline_tax_relation_table', 1),
(99, '2017_07_20_063255_create_ticket_order_table', 1),
(100, '2017_07_20_063270_create_ticket_order_tax_table', 1),
(101, '2017_07_20_063316_create_ticket_order_relation_table', 1),
(102, '2017_07_20_085916_create_ticket_airlines_relation_table', 1),
(103, '2017_07_22_060301_add_order_id_to_tikcetorder_table', 1),
(104, '2017_07_22_064357_create_ticket_document_table', 1),
(105, '2017_07_22_065222_create_ticket_relation_table', 1),
(106, '2017_07_22_091918_create_backup_table', 1),
(107, '2017_07_22_125915_add_tikestan_to_backup_table', 1),
(108, '2017_07_23_072134_create_openingbalance_table', 1),
(109, '2017_07_25_051426_add_column_to_invoices_table', 1),
(110, '2017_07_25_101612_add_relationinvoice_to_invoices_table', 1),
(111, '2017_07_25_102109_create_salesComissions_table', 1),
(112, '2017_07_26_051806_add_column_tosalesComissions_table', 1),
(113, '2017_07_26_064942_add_amount_column_tosalesComissions_table', 1),
(114, '2017_07_26_121050_add_paidthrow_column_tosalesComissions_table', 1),
(115, '2017_07_29_000713_create_table_reminders_', 1),
(116, '2017_08_01_152513_create_email_table', 1),
(117, '2017_08_01_152617_create_email_relation_table', 1),
(118, '2017_08_01_173308_create_table_estimate', 1),
(119, '2017_08_01_173337_create_table_estimate_entries', 1),
(120, '2017_08_12_153258_add_aaccount_id_to_contact_table', 1),
(121, '2017_08_13_173159_create_backupshcedule_table', 1),
(122, '2017_10_29_161460_create_journal_entries_table', 1),
(123, '2017_11_27_070356_add__column_to_journal_entries_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` int(10) UNSIGNED NOT NULL,
  `module_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `module_prefix` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `module_name`, `module_prefix`, `created_at`, `updated_at`) VALUES
(1, 'Contact', 'contact', '2014-07-23 05:43:51', '1979-06-18 05:30:08'),
(2, 'Contact Category', 'contact/category', '1993-12-09 22:23:30', '1978-01-06 21:19:28'),
(3, 'Account Chart', 'account-chart', '1991-03-12 22:00:53', '1988-01-19 17:17:15'),
(4, 'Inventory Item', 'inventory', '2001-06-12 16:49:49', '1980-06-07 17:02:01'),
(5, 'Inventory Category', 'inventory/category', '2013-06-28 01:35:05', '2009-08-31 00:48:16'),
(6, 'Stock Management', 'stock-management', '2008-10-02 10:49:48', '1987-02-05 18:26:19'),
(7, 'Product Track', 'product-track', '2005-01-20 03:32:58', '1985-01-04 07:31:41'),
(8, 'Manual Journal', 'manual-journal', '1987-07-11 11:11:20', '2004-04-06 17:04:37'),
(9, 'Bill', 'bill', '2001-08-31 23:57:07', '1980-10-28 09:17:28'),
(10, 'Credit Note', 'credit-note', '2002-02-17 18:23:20', '1997-02-24 00:34:52'),
(11, 'Credit Note Refund ', 'credit-note/refund', '1980-11-12 04:25:48', '1999-07-04 12:46:19'),
(12, 'Expense', 'expense', '2009-03-23 03:58:51', '2017-02-17 05:43:58'),
(13, 'Inventory', 'inventory', '1974-10-29 20:33:23', '1979-03-03 21:14:29'),
(14, 'Inventory Category', 'inventory/category', '2016-08-22 09:32:47', '1972-07-01 19:32:29'),
(15, 'Invoice', 'invoice', '1977-03-22 07:55:31', '1995-04-22 07:46:38'),
(16, 'Payment Made', 'payment-made', '1978-09-20 23:06:38', '1976-11-03 19:38:51'),
(17, 'Payment Received', 'payment-received', '1998-12-16 16:16:15', '2000-08-11 20:21:54'),
(18, 'Report', 'report', '2002-10-31 18:15:32', '1978-11-25 11:33:55');

-- --------------------------------------------------------

--
-- Table structure for table `mofas`
--

CREATE TABLE `mofas` (
  `id` int(10) UNSIGNED NOT NULL,
  `pax_id` int(10) UNSIGNED NOT NULL,
  `mofaNumber` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `iqamaNumber` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mofaDate` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `musaned`
--

CREATE TABLE `musaned` (
  `id` int(10) UNSIGNED NOT NULL,
  `pax_id` int(10) UNSIGNED NOT NULL,
  `issue_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `note_sheet`
--

CREATE TABLE `note_sheet` (
  `id` int(10) UNSIGNED NOT NULL,
  `countryGender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `applicationDate` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sourceIncomeTax` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `welfareFee` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payOrderNumber` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chalanNumber` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `infoAttestation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payOrderDate` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chalanDate` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `certificateAttestation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payOrderAmount` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chalanAmount` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `note_sheet_pax`
--

CREATE TABLE `note_sheet_pax` (
  `id` int(10) UNSIGNED NOT NULL,
  `brifing` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `recruit_id` int(10) UNSIGNED NOT NULL,
  `note_sheet_id` int(10) UNSIGNED NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `okala`
--

CREATE TABLE `okala` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `paxid` int(10) UNSIGNED NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `openningbalances`
--

CREATE TABLE `openningbalances` (
  `id` int(10) UNSIGNED NOT NULL,
  `openningBalanceDate` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `openningbalances`
--

INSERT INTO `openningbalances` (`id`, `openningBalanceDate`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '2019-02-08', 1, 1, '2019-02-08 06:12:10', '2019-02-08 06:12:10');

-- --------------------------------------------------------

--
-- Table structure for table `organization_profiles`
--

CREATE TABLE `organization_profiles` (
  `id` int(10) UNSIGNED NOT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `street` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zip_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `organization_profiles`
--

INSERT INTO `organization_profiles` (`id`, `logo`, `display_name`, `company_name`, `street`, `city`, `state`, `country`, `zip_code`, `website`, `contact_number`, `email`, `created_at`, `updated_at`) VALUES
(1, 'logo.png', 'Beman Tech', 'Beman Tech', 'Dhanmondi Rd.No. 2', 'Dhaka', 'Dhaka', 'Bangladesh', '1200', 'bemantech.com', '01xxx xxxxxx', 'info@bemantechcom', '1970-12-06 20:00:56', '2019-02-02 21:43:15');

-- --------------------------------------------------------

--
-- Table structure for table `parent_account_type`
--

CREATE TABLE `parent_account_type` (
  `id` int(10) UNSIGNED NOT NULL,
  `account_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `parent_account_type`
--

INSERT INTO `parent_account_type` (`id`, `account_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Assets', 'Assets', '1972-07-21 23:55:05', '2012-06-02 09:14:55'),
(2, 'Liability', 'Liability', '2007-06-26 16:33:53', '2012-04-10 03:19:07'),
(3, 'Equity', 'Equity', '2009-05-25 13:19:55', '1973-01-08 15:53:52'),
(4, 'income', 'income', '1973-10-25 14:41:26', '1995-04-29 13:27:10'),
(5, 'Expense', 'Expense', '2001-11-10 10:22:05', '2002-11-09 14:58:16');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@gmail.com', 'f6ab8aa42d9103b59504276d05bcb590d15eb61ef082e20aed1129ed028dfc4e', '2019-02-15 04:49:53');

-- --------------------------------------------------------

--
-- Table structure for table `payment_made`
--

CREATE TABLE `payment_made` (
  `id` int(10) UNSIGNED NOT NULL,
  `amount` double NOT NULL,
  `payment_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pm_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bank_info` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `invoice_show` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_mode_id` int(10) UNSIGNED NOT NULL,
  `reference` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `excess_amount` double NOT NULL,
  `account_id` int(10) UNSIGNED NOT NULL,
  `vendor_id` int(10) UNSIGNED NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_made_entry`
--

CREATE TABLE `payment_made_entry` (
  `id` int(10) UNSIGNED NOT NULL,
  `amount` double NOT NULL,
  `payment_made_id` int(10) UNSIGNED NOT NULL,
  `bill_id` int(10) UNSIGNED NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_mode`
--

CREATE TABLE `payment_mode` (
  `id` int(10) UNSIGNED NOT NULL,
  `mode_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payment_mode`
--

INSERT INTO `payment_mode` (`id`, `mode_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Cash', 'Cash', '1995-10-07 08:30:58', '1974-11-30 16:57:15'),
(2, 'Bank Cheque', 'Bank Cheque', '2008-11-16 07:24:08', '2005-02-10 10:56:58');

-- --------------------------------------------------------

--
-- Table structure for table `payment_receives`
--

CREATE TABLE `payment_receives` (
  `id` int(10) UNSIGNED NOT NULL,
  `payment_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pr_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reference` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank_info` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `invoice_show` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` longtext COLLATE utf8_unicode_ci,
  `amount` double NOT NULL,
  `excess_payment` double NOT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `file_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_mode_id` int(10) UNSIGNED NOT NULL,
  `account_id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payment_receives`
--

INSERT INTO `payment_receives` (`id`, `payment_date`, `pr_number`, `reference`, `bank_info`, `invoice_show`, `note`, `amount`, `excess_payment`, `file_name`, `file_url`, `payment_mode_id`, `account_id`, `customer_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '1970-01-01', '000001', '', '', 'on', NULL, 1, 0, NULL, NULL, 1, 4, 2, 1, 1, '2019-04-04 03:43:49', '2019-04-04 03:43:49'),
(4, '2019-04-04', '000002', '', '', 'on', NULL, 4, 0, NULL, NULL, 1, 4, 2, 1, 1, '2019-04-04 22:34:28', '2019-04-04 22:34:28'),
(5, '2019-04-12', '000003', 'm', '', 'on', NULL, 8888, 8884, NULL, NULL, 1, 28, 2, 1, 1, '2019-04-05 19:44:52', '2019-04-05 19:44:52');

-- --------------------------------------------------------

--
-- Table structure for table `payment_receives_entries`
--

CREATE TABLE `payment_receives_entries` (
  `id` int(10) UNSIGNED NOT NULL,
  `amount` double NOT NULL,
  `payment_receives_id` int(10) UNSIGNED NOT NULL,
  `invoice_id` int(10) UNSIGNED NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payment_receives_entries`
--

INSERT INTO `payment_receives_entries` (`id`, `amount`, `payment_receives_id`, `invoice_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 1, '2019-04-04 03:43:49', '2019-04-04 03:43:49'),
(6, 4, 5, 2, 1, 1, '2019-04-05 19:44:52', '2019-04-05 19:44:52');

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
(1, 'nn', 7, 1, 1, 1, '2019-05-16 01:53:34', '2019-05-16 01:53:34');

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
(1, 'phase', '0', 1, 1, 1, '2019-05-16 01:53:34', '2019-05-16 01:53:34'),
(2, 'phase 2', '0', 1, 1, 1, '2019-05-16 01:53:34', '2019-05-16 01:53:34');

-- --------------------------------------------------------

--
-- Table structure for table `product_phase_item`
--

CREATE TABLE `product_phase_item` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `issued_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reference` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reason` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `personal_note` longtext COLLATE utf8_unicode_ci,
  `recipient_id` int(11) DEFAULT NULL,
  `issued_by` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_phase_id` int(10) UNSIGNED NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_phase_item_add`
--

CREATE TABLE `product_phase_item_add` (
  `id` int(10) UNSIGNED NOT NULL,
  `item_category_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `product_phase_item_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recruiteexpense`
--

CREATE TABLE `recruiteexpense` (
  `id` int(10) UNSIGNED NOT NULL,
  `expenseSectorid` int(10) UNSIGNED NOT NULL,
  `expense_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recruiteexpensepax`
--

CREATE TABLE `recruiteexpensepax` (
  `id` int(10) UNSIGNED NOT NULL,
  `recruitExpenseid` int(10) UNSIGNED NOT NULL,
  `paxid` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recruitingorder`
--

CREATE TABLE `recruitingorder` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `package_id` int(10) UNSIGNED NOT NULL,
  `registerSerial_id` int(10) UNSIGNED NOT NULL,
  `paxid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `passportNumber` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `passportDate` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `invoice_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `passportnumberbn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `passportissuedate` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `placeofissue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recruit_customer`
--

CREATE TABLE `recruit_customer` (
  `id` int(10) UNSIGNED NOT NULL,
  `dateOfBirthEN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateOfBirthBN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `addressEN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `addressBN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `religionEN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `religionBN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `guardianName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `guardianFatherName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `guardianAddressEN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `guardianAddressBN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `guardianReligion` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `relationWithCustomer_1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `relationWithCustomer_2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `motherName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fatherName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `placeOfBirth` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `previousNationality` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `presentNationality` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maritalStatus` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `group` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `professionEn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `professionBn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `professionAR` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `businessAddressEN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `businessAddressBN` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `purposeOfTravel` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `durationOfStay` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `arrivalDate` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `departureDate` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `visaAdvice` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `destination` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `recruit_id` int(10) UNSIGNED NOT NULL,
  `pax_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `qualification` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reminders`
--

CREATE TABLE `reminders` (
  `id` int(10) UNSIGNED NOT NULL,
  `reminddatetime` datetime DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reminders`
--

INSERT INTO `reminders` (`id`, `reminddatetime`, `note`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(2, '2019-03-07 01:00:00', 'msasx', 1, 1, '2019-03-07 06:06:58', '2019-03-07 06:06:58');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Deserunt nesciunt modi officiis est. Totam et asperiores iusto.', 1, 1, '1985-07-24 05:45:20', '2000-08-01 10:55:16'),
(2, 'Staff', 'Architecto nam nihil exercitationem iure. Aliquid commodi quia est eaque totam qui. Exercitationem amet sequi sit. Cumque sunt recusandae consectetur.', 1, 1, '2001-05-15 22:22:20', '1980-09-22 20:07:44'),
(3, 'Employee', 'Necessitatibus nulla totam sunt temporibus explicabo. Est exercitationem ex sequi doloribus molestias et nam. Sit et voluptas officiis fuga.', 1, 1, '2005-08-06 13:51:21', '1986-12-01 04:46:26');

-- --------------------------------------------------------

--
-- Table structure for table `salescommisions`
--

CREATE TABLE `salescommisions` (
  `id` int(10) UNSIGNED NOT NULL,
  `agents_id` int(10) UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `scNumber` int(11) NOT NULL,
  `bank_info` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `show` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `CustomerNote` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PersonalNote` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` int(11) NOT NULL,
  `paid_through_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `bill_id` int(10) UNSIGNED DEFAULT NULL,
  `credit_note_id` int(10) UNSIGNED DEFAULT NULL,
  `branch_id` int(10) UNSIGNED NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `total`, `date`, `item_category_id`, `item_id`, `bill_id`, `credit_note_id`, `branch_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 4, '2019-02-02', 1, 1, NULL, NULL, 1, 1, 1, '2019-02-02 08:52:06', '2019-02-02 08:52:06'),
(2, 5, '2019-08-03', 1, 1, NULL, NULL, 1, 1, 1, '2019-08-03 15:45:16', '2019-08-03 15:45:16');

-- --------------------------------------------------------

--
-- Table structure for table `tax`
--

CREATE TABLE `tax` (
  `id` int(10) UNSIGNED NOT NULL,
  `tax_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount_percentage` int(11) DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tax`
--

INSERT INTO `tax` (`id`, `tax_name`, `amount_percentage`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '0%-tax', 0, 1, 1, '2016-03-09 06:14:48', '2006-11-01 01:42:30'),
(2, '5%-tax', 5, 1, 1, '1976-05-21 03:38:24', '1975-09-14 15:40:20'),
(3, '10%-tax', 10, 1, 1, '2008-12-21 21:04:08', '2003-06-23 09:14:48'),
(4, '15%-tax', 15, 1, 1, '1990-04-14 07:21:10', '1981-12-10 04:48:47'),
(5, '20%-tax', 20, 1, 1, '1999-06-05 06:35:19', '2018-03-08 02:18:53');

-- --------------------------------------------------------

--
-- Table structure for table `ticketcommissions`
--

CREATE TABLE `ticketcommissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `commissionRate` int(11) NOT NULL,
  `commissionTax` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ticketcommissions`
--

INSERT INTO `ticketcommissions` (`id`, `commissionRate`, `commissionTax`, `created_at`, `updated_at`) VALUES
(1, 3, 4, '2019-02-02 22:14:17', '2019-02-02 22:14:24');

-- --------------------------------------------------------

--
-- Table structure for table `ticketorders`
--

CREATE TABLE `ticketorders` (
  `id` int(10) UNSIGNED NOT NULL,
  `contact_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ticket_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pnrcreationDate` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `recordLocator` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `departureflightCode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `departureflightClass` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `departureDate` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `departureFrom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `arriveTo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `departureTime` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `arrivalTime` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `returnflightCode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `returnflightbookingClass` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `returnflightDate` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `returnflightFrom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `returnflightTo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `returnflightdepartureTime` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `returnflightarrivalDate` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `issuetimeLimit` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `documentNumber` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gdsType` int(11) DEFAULT NULL,
  `pnr` text COLLATE utf8_unicode_ci,
  `issuDate` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `departureSector` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `returnSector` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adultPassenger` int(11) DEFAULT NULL,
  `childPassenger` int(11) DEFAULT NULL,
  `infantPassenger` int(11) DEFAULT NULL,
  `hotel_note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `transactionAmount` int(11) DEFAULT NULL,
  `commissionRate` int(11) DEFAULT NULL,
  `taxOnCommission` int(11) DEFAULT NULL,
  `bill_id` int(10) UNSIGNED DEFAULT NULL,
  `invoice_id` int(10) UNSIGNED DEFAULT NULL,
  `ticket_hotel_id` int(10) UNSIGNED DEFAULT NULL,
  `vendor_id` int(10) UNSIGNED NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `order_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tickettaxs`
--

CREATE TABLE `tickettaxs` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tickettaxs`
--

INSERT INTO `tickettaxs` (`id`, `title`, `amount`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'new', 30, 1, 1, '2019-02-02 22:14:09', '2019-02-02 22:14:09'),
(2, 'mm', 0, 1, 1, '2019-05-14 02:50:32', '2019-05-14 02:50:32');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_document`
--

CREATE TABLE `ticket_document` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_hotel`
--

CREATE TABLE `ticket_hotel` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_order_tax`
--

CREATE TABLE `ticket_order_tax` (
  `id` int(10) UNSIGNED NOT NULL,
  `ticket_order_id` int(10) UNSIGNED NOT NULL,
  `ticket_tax_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `note` longtext COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` tinyint(1) DEFAULT '1',
  `activated` tinyint(1) NOT NULL DEFAULT '0',
  `role_id` int(10) UNSIGNED DEFAULT NULL,
  `branch_id` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `image`, `contact`, `note`, `email`, `password`, `type`, `activated`, `role_id`, `branch_id`, `created_by`, `updated_by`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'E8qwOhoNw0', 'user.jpg', 'user.jpg', 'Velit dolorem ex accusamus esse nostrum repellat. Debitis et magni sit saepe. Qui aliquam iusto consequuntur natus culpa nihil. Consequatur assumenda sapiente eveniet omnis in nisi.', 'admin@gmail.com', '$2y$10$GUZExC9L/k/xTuaBVA6KwO5b8oHKw3qPG0oG4rFx8xTiunRwuaPhC', 0, 1, 1, 1, 1, 1, '5yf6BcBX22CyDx1znkSNVPbDWrW1uHzR4WqEBGOIWD6k8Rs1nkB0QMzwpgLR', '1987-08-01 20:46:30', '2019-04-13 20:23:26'),
(2, 'TEST', '', '', '', 'pirinurej@tempcloud.info', '$2y$10$he0n8lPdFJjSJwmsnghSUed3gtME31/fAc/pqyspB7KAUq5Cf4w7O', 1, 0, NULL, NULL, NULL, NULL, NULL, '2019-02-15 05:02:50', '2019-02-15 05:02:50');

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
-- Dumping data for table `user_activations`
--

INSERT INTO `user_activations` (`id`, `user_id`, `token`, `created_at`, `updated_at`) VALUES
(1, 2, '48c43d28c112a33fa01be30f05cc02203571194453348b7f14ab64eb934570fa', '2019-02-15 05:02:50', '2019-02-15 05:02:50');

-- --------------------------------------------------------

--
-- Table structure for table `visaacceptance`
--

CREATE TABLE `visaacceptance` (
  `id` int(10) UNSIGNED NOT NULL,
  `visaentry_id` int(10) UNSIGNED NOT NULL,
  `visaadvice_status` tinyint(1) NOT NULL DEFAULT '0',
  `okala_status` tinyint(1) NOT NULL DEFAULT '0',
  `consulator_status` tinyint(1) NOT NULL DEFAULT '0',
  `powerofattorny_status` tinyint(1) NOT NULL DEFAULT '0',
  `botaka_status` tinyint(1) NOT NULL DEFAULT '0',
  `contactform_status` tinyint(1) NOT NULL DEFAULT '0',
  `visaadvice_comment` mediumtext COLLATE utf8_unicode_ci,
  `okala_comment` mediumtext COLLATE utf8_unicode_ci,
  `consulator_comment` mediumtext COLLATE utf8_unicode_ci,
  `powerofattorny_comment` mediumtext COLLATE utf8_unicode_ci,
  `botaka_comment` mediumtext COLLATE utf8_unicode_ci,
  `contactform_comment` mediumtext COLLATE utf8_unicode_ci,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visaentrys`
--

CREATE TABLE `visaentrys` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `local_Reference` int(10) UNSIGNED NOT NULL,
  `visaNumber` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `visaIssuedate` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_id` int(10) UNSIGNED DEFAULT NULL,
  `numberofVisa` int(11) NOT NULL,
  `destination` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `registerSerial` int(11) NOT NULL,
  `flagNum` int(11) DEFAULT NULL,
  `iqamaNumber` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `iqamaSector` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `visaType` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bill_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `submissionDate` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visaformagreement`
--

CREATE TABLE `visaformagreement` (
  `id` int(10) UNSIGNED NOT NULL,
  `visaform_id` int(10) UNSIGNED NOT NULL,
  `agreementEn` text COLLATE utf8_unicode_ci,
  `agreementAr` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visaformbulks`
--

CREATE TABLE `visaformbulks` (
  `id` int(10) UNSIGNED NOT NULL,
  `visaform_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateofBirth` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `relationship` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visaforms`
--

CREATE TABLE `visaforms` (
  `id` int(10) UNSIGNED NOT NULL,
  `pax_id` int(10) UNSIGNED NOT NULL,
  `officeDate` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `authorization` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `footerNumber` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `so` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visas`
--

CREATE TABLE `visas` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visastamping`
--

CREATE TABLE `visastamping` (
  `id` int(10) UNSIGNED NOT NULL,
  `pax_id` int(10) UNSIGNED NOT NULL,
  `send_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `return_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `eapplication_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visa_process_report`
--

CREATE TABLE `visa_process_report` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vls_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remarks` text COLLATE utf8_unicode_ci,
  `recruit_id` int(10) UNSIGNED NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_level`
--
ALTER TABLE `access_level`
  ADD PRIMARY KEY (`id`),
  ADD KEY `access_level_module_id_foreign` (`module_id`),
  ADD KEY `access_level_role_id_foreign` (`role_id`),
  ADD KEY `access_level_created_by_foreign` (`created_by`),
  ADD KEY `access_level_updated_by_foreign` (`updated_by`);

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
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agents_branch_id_foreign` (`branch_id`),
  ADD KEY `agents_created_by_foreign` (`created_by`),
  ADD KEY `agents_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `agreement_paper`
--
ALTER TABLE `agreement_paper`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agreement_paper_created_by_foreign` (`created_by`),
  ADD KEY `agreement_paper_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `agreement_paper_pax`
--
ALTER TABLE `agreement_paper_pax`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agreement_paper_pax_agreement_paper_id_foreign` (`agreement_paper_id`),
  ADD KEY `agreement_paper_pax_recruit_id_foreign` (`recruit_id`);

--
-- Indexes for table `airlines`
--
ALTER TABLE `airlines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `airlines_created_by_foreign` (`created_by`),
  ADD KEY `airlines_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `airlinetaxs`
--
ALTER TABLE `airlinetaxs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `airlinetaxs_airline_id_foreign` (`airline_id`),
  ADD KEY `airlinetaxs_tickettax_id_foreign` (`tickettax_id`),
  ADD KEY `airlinetaxs_created_by_foreign` (`created_by`),
  ADD KEY `airlinetaxs_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `backup`
--
ALTER TABLE `backup`
  ADD PRIMARY KEY (`id`),
  ADD KEY `backup_created_by_foreign` (`created_by`),
  ADD KEY `backup_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `backupschedules`
--
ALTER TABLE `backupschedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bank_contact_id_foreign` (`contact_id`),
  ADD KEY `bank_account_id_foreign` (`account_id`),
  ADD KEY `bank_payment_mode_id_foreign` (`payment_mode_id`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bill_vendor_id_foreign` (`vendor_id`),
  ADD KEY `bill_created_by_foreign` (`created_by`),
  ADD KEY `bill_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `bill_entry`
--
ALTER TABLE `bill_entry`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bill_entry_bill_id_foreign` (`bill_id`),
  ADD KEY `bill_entry_account_id_foreign` (`account_id`),
  ADD KEY `bill_entry_tax_id_foreign` (`tax_id`),
  ADD KEY `bill_entry_item_id_foreign` (`item_id`),
  ADD KEY `bill_entry_created_by_foreign` (`created_by`),
  ADD KEY `bill_entry_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`),
  ADD KEY `branch_created_by_foreign` (`created_by`),
  ADD KEY `branch_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_created_by_foreign` (`created_by`),
  ADD KEY `company_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contact_contact_category_id_foreign` (`contact_category_id`),
  ADD KEY `contact_agent_id_foreign` (`agent_id`),
  ADD KEY `contact_branch_id_foreign` (`branch_id`),
  ADD KEY `contact_created_by_foreign` (`created_by`),
  ADD KEY `contact_updated_by_foreign` (`updated_by`),
  ADD KEY `contact_account_id_foreign` (`account_id`);

--
-- Indexes for table `contact_category`
--
ALTER TABLE `contact_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contact_category_created_by_foreign` (`created_by`),
  ADD KEY `contact_category_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `credit_notes`
--
ALTER TABLE `credit_notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `credit_notes_customer_id_foreign` (`customer_id`),
  ADD KEY `credit_notes_created_by_foreign` (`created_by`),
  ADD KEY `credit_notes_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `credit_note_entries`
--
ALTER TABLE `credit_note_entries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `credit_note_entries_item_id_foreign` (`item_id`),
  ADD KEY `credit_note_entries_credit_note_id_foreign` (`credit_note_id`),
  ADD KEY `credit_note_entries_tax_id_foreign` (`tax_id`),
  ADD KEY `credit_note_entries_account_id_foreign` (`account_id`),
  ADD KEY `credit_note_entries_created_by_foreign` (`created_by`),
  ADD KEY `credit_note_entries_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `credit_note_payments`
--
ALTER TABLE `credit_note_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `credit_note_payments_invoice_id_foreign` (`invoice_id`),
  ADD KEY `credit_note_payments_credit_note_id_foreign` (`credit_note_id`),
  ADD KEY `credit_note_payments_created_by_foreign` (`created_by`),
  ADD KEY `credit_note_payments_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `credit_note_refunds`
--
ALTER TABLE `credit_note_refunds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `credit_note_refunds_credit_note_id_foreign` (`credit_note_id`),
  ADD KEY `credit_note_refunds_payment_mode_id_foreign` (`payment_mode_id`),
  ADD KEY `credit_note_refunds_account_id_foreign` (`account_id`),
  ADD KEY `credit_note_refunds_created_by_foreign` (`created_by`),
  ADD KEY `credit_note_refunds_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`id`),
  ADD KEY `document_documentcategory_id_foreign` (`documentcategory_id`),
  ADD KEY `document_created_by_foreign` (`created_by`),
  ADD KEY `document_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `documentcategory`
--
ALTER TABLE `documentcategory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `documentcategory_created_by_foreign` (`created_by`),
  ADD KEY `documentcategory_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email_created_by_foreign` (`created_by`),
  ADD KEY `email_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `estimates`
--
ALTER TABLE `estimates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estimates_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `estimate_entries`
--
ALTER TABLE `estimate_entries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estimate_entries_tax_id_foreign` (`tax_id`),
  ADD KEY `estimate_entries_item_id_foreign` (`item_id`),
  ADD KEY `estimate_entries_estimate_id_foreign` (`estimate_id`),
  ADD KEY `estimate_entries_created_by_foreign` (`created_by`),
  ADD KEY `estimate_entries_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `excess_payment`
--
ALTER TABLE `excess_payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `excess_payment_payment_receives_id_foreign` (`payment_receives_id`),
  ADD KEY `excess_payment_invoice_id_foreign` (`invoice_id`),
  ADD KEY `excess_payment_created_by_foreign` (`created_by`),
  ADD KEY `excess_payment_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expense_paid_through_id_foreign` (`paid_through_id`),
  ADD KEY `expense_account_id_foreign` (`account_id`),
  ADD KEY `expense_vendor_id_foreign` (`vendor_id`),
  ADD KEY `expense_tax_id_foreign` (`tax_id`),
  ADD KEY `expense_created_by_foreign` (`created_by`),
  ADD KEY `expense_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `expensesector`
--
ALTER TABLE `expensesector`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expensesector_created_by_foreign` (`created_by`),
  ADD KEY `expensesector_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `fingerprint`
--
ALTER TABLE `fingerprint`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fingerprint_paxid_foreign` (`paxid`),
  ADD KEY `fingerprint_created_by_foreign` (`created_by`),
  ADD KEY `fingerprint_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `flight`
--
ALTER TABLE `flight`
  ADD PRIMARY KEY (`id`),
  ADD KEY `flight_vendor_id_foreign` (`vendor_id`),
  ADD KEY `flight_paxid_foreign` (`paxid`),
  ADD KEY `flight_created_by_foreign` (`created_by`),
  ADD KEY `flight_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `form_basis`
--
ALTER TABLE `form_basis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gamca`
--
ALTER TABLE `gamca`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gamca_recruit_id_foreign` (`recruit_id`),
  ADD KEY `gamca_created_by_foreign` (`created_by`),
  ADD KEY `gamca_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `immigration_clearance`
--
ALTER TABLE `immigration_clearance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `immigration_clearance_created_by_foreign` (`created_by`),
  ADD KEY `immigration_clearance_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `immigration_clearance_pax`
--
ALTER TABLE `immigration_clearance_pax`
  ADD PRIMARY KEY (`id`),
  ADD KEY `immigration_clearance_pax_immigration_clearance_id_foreign` (`immigration_clearance_id`),
  ADD KEY `immigration_clearance_pax_pax_id_foreign` (`pax_id`);

--
-- Indexes for table `incomes`
--
ALTER TABLE `incomes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `incomes_receive_through_id_foreign` (`receive_through_id`),
  ADD KEY `incomes_account_id_foreign` (`account_id`),
  ADD KEY `incomes_customer_id_foreign` (`customer_id`),
  ADD KEY `incomes_tax_id_foreign` (`tax_id`),
  ADD KEY `incomes_created_by_foreign` (`created_by`),
  ADD KEY `incomes_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `invoices_invoice_number_unique` (`invoice_number`),
  ADD KEY `invoices_customer_id_foreign` (`customer_id`),
  ADD KEY `invoices_created_by_foreign` (`created_by`),
  ADD KEY `invoices_updated_by_foreign` (`updated_by`),
  ADD KEY `invoices_agents_id_foreign` (`agents_id`);

--
-- Indexes for table `invoice_entries`
--
ALTER TABLE `invoice_entries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_entries_item_id_foreign` (`item_id`),
  ADD KEY `invoice_entries_invoice_id_foreign` (`invoice_id`),
  ADD KEY `invoice_entries_tax_id_foreign` (`tax_id`),
  ADD KEY `invoice_entries_account_id_foreign` (`account_id`),
  ADD KEY `invoice_entries_created_by_foreign` (`created_by`),
  ADD KEY `invoice_entries_updated_by_foreign` (`updated_by`);

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
  ADD KEY `journal_branch_id_foreign` (`branch_id`),
  ADD KEY `journal_created_by_foreign` (`created_by`),
  ADD KEY `journal_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `journal_entries`
--
ALTER TABLE `journal_entries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `journal_entries_journal_id_foreign` (`journal_id`),
  ADD KEY `journal_entries_invoice_id_foreign` (`invoice_id`),
  ADD KEY `journal_entries_payment_receives_id_foreign` (`payment_receives_id`),
  ADD KEY `journal_entries_payment_receives_entries_id_foreign` (`payment_receives_entries_id`),
  ADD KEY `journal_entries_credit_note_id_foreign` (`credit_note_id`),
  ADD KEY `journal_entries_credit_note_refunds_id_foreign` (`credit_note_refunds_id`),
  ADD KEY `journal_entries_expense_id_foreign` (`expense_id`),
  ADD KEY `journal_entries_bill_id_foreign` (`bill_id`),
  ADD KEY `journal_entries_bank_id_foreign` (`bank_id`),
  ADD KEY `journal_entries_bill_entry_id_foreign` (`bill_entry_id`),
  ADD KEY `journal_entries_payment_made_id_foreign` (`payment_made_id`),
  ADD KEY `journal_entries_payment_made_entry_id_foreign` (`payment_made_entry_id`),
  ADD KEY `journal_entries_account_name_id_foreign` (`account_name_id`),
  ADD KEY `journal_entries_contact_id_foreign` (`contact_id`),
  ADD KEY `journal_entries_income_id_foreign` (`income_id`),
  ADD KEY `journal_entries_tax_id_foreign` (`tax_id`),
  ADD KEY `journal_entries_created_by_foreign` (`created_by`),
  ADD KEY `journal_entries_updated_by_foreign` (`updated_by`),
  ADD KEY `journal_entries_salescomission_id_foreign` (`salesComission_id`),
  ADD KEY `journal_entries_agent_id_foreign` (`agent_id`);

--
-- Indexes for table `manpower`
--
ALTER TABLE `manpower`
  ADD PRIMARY KEY (`id`),
  ADD KEY `manpower_paxid_foreign` (`paxid`),
  ADD KEY `manpower_created_by_foreign` (`created_by`),
  ADD KEY `manpower_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `medicalslip`
--
ALTER TABLE `medicalslip`
  ADD PRIMARY KEY (`id`),
  ADD KEY `medicalslip_pax_id_foreign` (`pax_id`),
  ADD KEY `medicalslip_created_by_foreign` (`created_by`),
  ADD KEY `medicalslip_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `medical_slip_form`
--
ALTER TABLE `medical_slip_form`
  ADD PRIMARY KEY (`id`),
  ADD KEY `medical_slip_form_created_by_foreign` (`created_by`),
  ADD KEY `medical_slip_form_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `medical_slip_form_pax`
--
ALTER TABLE `medical_slip_form_pax`
  ADD PRIMARY KEY (`id`),
  ADD KEY `medical_slip_form_pax_medicalslip_id_foreign` (`medicalslip_id`),
  ADD KEY `medical_slip_form_pax_recruit_id_foreign` (`recruit_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mofas`
--
ALTER TABLE `mofas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mofas_pax_id_foreign` (`pax_id`),
  ADD KEY `mofas_created_by_foreign` (`created_by`),
  ADD KEY `mofas_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `musaned`
--
ALTER TABLE `musaned`
  ADD PRIMARY KEY (`id`),
  ADD KEY `musaned_pax_id_foreign` (`pax_id`),
  ADD KEY `musaned_company_id_foreign` (`company_id`),
  ADD KEY `musaned_created_by_foreign` (`created_by`),
  ADD KEY `musaned_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `note_sheet`
--
ALTER TABLE `note_sheet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `note_sheet_created_by_foreign` (`created_by`),
  ADD KEY `note_sheet_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `note_sheet_pax`
--
ALTER TABLE `note_sheet_pax`
  ADD PRIMARY KEY (`id`),
  ADD KEY `note_sheet_pax_note_sheet_id_foreign` (`note_sheet_id`),
  ADD KEY `note_sheet_pax_recruit_id_foreign` (`recruit_id`),
  ADD KEY `note_sheet_pax_created_by_foreign` (`created_by`),
  ADD KEY `note_sheet_pax_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `okala`
--
ALTER TABLE `okala`
  ADD PRIMARY KEY (`id`),
  ADD KEY `okala_paxid_foreign` (`paxid`),
  ADD KEY `okala_created_by_foreign` (`created_by`),
  ADD KEY `okala_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `openningbalances`
--
ALTER TABLE `openningbalances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `openningbalances_created_by_foreign` (`created_by`),
  ADD KEY `openningbalances_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `organization_profiles`
--
ALTER TABLE `organization_profiles`
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
-- Indexes for table `payment_made`
--
ALTER TABLE `payment_made`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_made_payment_mode_id_foreign` (`payment_mode_id`),
  ADD KEY `payment_made_account_id_foreign` (`account_id`),
  ADD KEY `payment_made_vendor_id_foreign` (`vendor_id`),
  ADD KEY `payment_made_created_by_foreign` (`created_by`),
  ADD KEY `payment_made_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `payment_made_entry`
--
ALTER TABLE `payment_made_entry`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_made_entry_payment_made_id_foreign` (`payment_made_id`),
  ADD KEY `payment_made_entry_bill_id_foreign` (`bill_id`),
  ADD KEY `payment_made_entry_created_by_foreign` (`created_by`),
  ADD KEY `payment_made_entry_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `payment_mode`
--
ALTER TABLE `payment_mode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_receives`
--
ALTER TABLE `payment_receives`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_receives_payment_mode_id_foreign` (`payment_mode_id`),
  ADD KEY `payment_receives_account_id_foreign` (`account_id`),
  ADD KEY `payment_receives_customer_id_foreign` (`customer_id`),
  ADD KEY `payment_receives_created_by_foreign` (`created_by`),
  ADD KEY `payment_receives_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `payment_receives_entries`
--
ALTER TABLE `payment_receives_entries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_receives_entries_payment_receives_id_foreign` (`payment_receives_id`),
  ADD KEY `payment_receives_entries_invoice_id_foreign` (`invoice_id`),
  ADD KEY `payment_receives_entries_created_by_foreign` (`created_by`),
  ADD KEY `payment_receives_entries_updated_by_foreign` (`updated_by`);

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
  ADD KEY `product_phase_item_created_by_foreign` (`created_by`),
  ADD KEY `product_phase_item_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `product_phase_item_add`
--
ALTER TABLE `product_phase_item_add`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_phase_item_add_product_phase_item_id_foreign` (`product_phase_item_id`);

--
-- Indexes for table `recruiteexpense`
--
ALTER TABLE `recruiteexpense`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recruiteexpense_expensesectorid_foreign` (`expenseSectorid`),
  ADD KEY `recruiteexpense_expense_id_foreign` (`expense_id`);

--
-- Indexes for table `recruiteexpensepax`
--
ALTER TABLE `recruiteexpensepax`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recruiteexpensepax_recruitexpenseid_foreign` (`recruitExpenseid`),
  ADD KEY `recruiteexpensepax_paxid_foreign` (`paxid`);

--
-- Indexes for table `recruitingorder`
--
ALTER TABLE `recruitingorder`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `recruitingorder_paxid_unique` (`paxid`),
  ADD KEY `recruitingorder_customer_id_foreign` (`customer_id`),
  ADD KEY `recruitingorder_package_id_foreign` (`package_id`),
  ADD KEY `recruitingorder_registerserial_id_foreign` (`registerSerial_id`),
  ADD KEY `recruitingorder_invoice_id_foreign` (`invoice_id`),
  ADD KEY `recruitingorder_created_by_foreign` (`created_by`),
  ADD KEY `recruitingorder_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `recruit_customer`
--
ALTER TABLE `recruit_customer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recruit_customer_recruit_id_foreign` (`recruit_id`),
  ADD KEY `recruit_customer_pax_id_foreign` (`pax_id`);

--
-- Indexes for table `reminders`
--
ALTER TABLE `reminders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reminders_created_by_foreign` (`created_by`),
  ADD KEY `reminders_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roles_created_by_foreign` (`created_by`),
  ADD KEY `roles_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `salescommisions`
--
ALTER TABLE `salescommisions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `salescommisions_agents_id_foreign` (`agents_id`),
  ADD KEY `salescommisions_created_by_foreign` (`created_by`),
  ADD KEY `salescommisions_updated_by_foreign` (`updated_by`),
  ADD KEY `salescommisions_paid_through_id_foreign` (`paid_through_id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stock_item_category_id_foreign` (`item_category_id`),
  ADD KEY `stock_item_id_foreign` (`item_id`),
  ADD KEY `stock_bill_id_foreign` (`bill_id`),
  ADD KEY `stock_credit_note_id_foreign` (`credit_note_id`),
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
-- Indexes for table `ticketcommissions`
--
ALTER TABLE `ticketcommissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticketorders`
--
ALTER TABLE `ticketorders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ticketorders_order_id_unique` (`order_id`),
  ADD KEY `ticketorders_bill_id_foreign` (`bill_id`),
  ADD KEY `ticketorders_invoice_id_foreign` (`invoice_id`),
  ADD KEY `ticketorders_contact_id_foreign` (`contact_id`),
  ADD KEY `ticketorders_vendor_id_foreign` (`vendor_id`),
  ADD KEY `ticketorders_ticket_hotel_id_foreign` (`ticket_hotel_id`),
  ADD KEY `ticketorders_created_by_foreign` (`created_by`),
  ADD KEY `ticketorders_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `tickettaxs`
--
ALTER TABLE `tickettaxs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tickettaxs_created_by_foreign` (`created_by`),
  ADD KEY `tickettaxs_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `ticket_document`
--
ALTER TABLE `ticket_document`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ticket_document_order_id_foreign` (`order_id`),
  ADD KEY `ticket_document_created_by_foreign` (`created_by`),
  ADD KEY `ticket_document_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `ticket_hotel`
--
ALTER TABLE `ticket_hotel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ticket_hotel_created_by_foreign` (`created_by`),
  ADD KEY `ticket_hotel_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `ticket_order_tax`
--
ALTER TABLE `ticket_order_tax`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ticket_order_tax_ticket_order_id_foreign` (`ticket_order_id`),
  ADD KEY `ticket_order_tax_ticket_tax_id_foreign` (`ticket_tax_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`),
  ADD KEY `users_branch_id_foreign` (`branch_id`);

--
-- Indexes for table `user_activations`
--
ALTER TABLE `user_activations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_activations_token_index` (`token`);

--
-- Indexes for table `visaacceptance`
--
ALTER TABLE `visaacceptance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `visaacceptance_visaentry_id_foreign` (`visaentry_id`),
  ADD KEY `visaacceptance_created_by_foreign` (`created_by`),
  ADD KEY `visaacceptance_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `visaentrys`
--
ALTER TABLE `visaentrys`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `visaentrys_registerserial_unique` (`registerSerial`),
  ADD KEY `visaentrys_local_reference_foreign` (`local_Reference`),
  ADD KEY `visaentrys_company_id_foreign` (`company_id`),
  ADD KEY `visaentrys_created_by_foreign` (`created_by`),
  ADD KEY `visaentrys_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `visaformagreement`
--
ALTER TABLE `visaformagreement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `visaformagreement_visaform_id_foreign` (`visaform_id`);

--
-- Indexes for table `visaformbulks`
--
ALTER TABLE `visaformbulks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `visaformbulks_visaform_id_foreign` (`visaform_id`);

--
-- Indexes for table `visaforms`
--
ALTER TABLE `visaforms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `visaforms_pax_id_foreign` (`pax_id`),
  ADD KEY `visaforms_created_by_foreign` (`created_by`),
  ADD KEY `visaforms_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `visas`
--
ALTER TABLE `visas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visastamping`
--
ALTER TABLE `visastamping`
  ADD PRIMARY KEY (`id`),
  ADD KEY `visastamping_pax_id_foreign` (`pax_id`),
  ADD KEY `visastamping_created_by_foreign` (`created_by`),
  ADD KEY `visastamping_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `visa_process_report`
--
ALTER TABLE `visa_process_report`
  ADD PRIMARY KEY (`id`),
  ADD KEY `visa_process_report_recruit_id_foreign` (`recruit_id`),
  ADD KEY `visa_process_report_created_by_foreign` (`created_by`),
  ADD KEY `visa_process_report_updated_by_foreign` (`updated_by`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_level`
--
ALTER TABLE `access_level`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `account_type`
--
ALTER TABLE `account_type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `agreement_paper`
--
ALTER TABLE `agreement_paper`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agreement_paper_pax`
--
ALTER TABLE `agreement_paper_pax`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `airlines`
--
ALTER TABLE `airlines`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `airlinetaxs`
--
ALTER TABLE `airlinetaxs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `backup`
--
ALTER TABLE `backup`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `backupschedules`
--
ALTER TABLE `backupschedules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bill_entry`
--
ALTER TABLE `bill_entry`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact_category`
--
ALTER TABLE `contact_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `credit_notes`
--
ALTER TABLE `credit_notes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `credit_note_entries`
--
ALTER TABLE `credit_note_entries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `credit_note_payments`
--
ALTER TABLE `credit_note_payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `credit_note_refunds`
--
ALTER TABLE `credit_note_refunds`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `documentcategory`
--
ALTER TABLE `documentcategory`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `email`
--
ALTER TABLE `email`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `estimates`
--
ALTER TABLE `estimates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `estimate_entries`
--
ALTER TABLE `estimate_entries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `excess_payment`
--
ALTER TABLE `excess_payment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expensesector`
--
ALTER TABLE `expensesector`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fingerprint`
--
ALTER TABLE `fingerprint`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `flight`
--
ALTER TABLE `flight`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `form_basis`
--
ALTER TABLE `form_basis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gamca`
--
ALTER TABLE `gamca`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `immigration_clearance`
--
ALTER TABLE `immigration_clearance`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `immigration_clearance_pax`
--
ALTER TABLE `immigration_clearance_pax`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `incomes`
--
ALTER TABLE `incomes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `invoice_entries`
--
ALTER TABLE `invoice_entries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `item_category`
--
ALTER TABLE `item_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `journal`
--
ALTER TABLE `journal`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `journal_entries`
--
ALTER TABLE `journal_entries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `manpower`
--
ALTER TABLE `manpower`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medicalslip`
--
ALTER TABLE `medicalslip`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medical_slip_form`
--
ALTER TABLE `medical_slip_form`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medical_slip_form_pax`
--
ALTER TABLE `medical_slip_form_pax`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `mofas`
--
ALTER TABLE `mofas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `musaned`
--
ALTER TABLE `musaned`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `note_sheet`
--
ALTER TABLE `note_sheet`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `note_sheet_pax`
--
ALTER TABLE `note_sheet_pax`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `okala`
--
ALTER TABLE `okala`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `openningbalances`
--
ALTER TABLE `openningbalances`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `organization_profiles`
--
ALTER TABLE `organization_profiles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `parent_account_type`
--
ALTER TABLE `parent_account_type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payment_made`
--
ALTER TABLE `payment_made`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_made_entry`
--
ALTER TABLE `payment_made_entry`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_mode`
--
ALTER TABLE `payment_mode`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment_receives`
--
ALTER TABLE `payment_receives`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payment_receives_entries`
--
ALTER TABLE `payment_receives_entries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_phase`
--
ALTER TABLE `product_phase`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_phase_item`
--
ALTER TABLE `product_phase_item`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_phase_item_add`
--
ALTER TABLE `product_phase_item_add`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recruiteexpense`
--
ALTER TABLE `recruiteexpense`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recruiteexpensepax`
--
ALTER TABLE `recruiteexpensepax`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recruitingorder`
--
ALTER TABLE `recruitingorder`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recruit_customer`
--
ALTER TABLE `recruit_customer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reminders`
--
ALTER TABLE `reminders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `salescommisions`
--
ALTER TABLE `salescommisions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tax`
--
ALTER TABLE `tax`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ticketcommissions`
--
ALTER TABLE `ticketcommissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ticketorders`
--
ALTER TABLE `ticketorders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tickettaxs`
--
ALTER TABLE `tickettaxs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ticket_document`
--
ALTER TABLE `ticket_document`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ticket_hotel`
--
ALTER TABLE `ticket_hotel`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ticket_order_tax`
--
ALTER TABLE `ticket_order_tax`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_activations`
--
ALTER TABLE `user_activations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `visaacceptance`
--
ALTER TABLE `visaacceptance`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visaentrys`
--
ALTER TABLE `visaentrys`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visaformagreement`
--
ALTER TABLE `visaformagreement`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visaformbulks`
--
ALTER TABLE `visaformbulks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visaforms`
--
ALTER TABLE `visaforms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visas`
--
ALTER TABLE `visas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visastamping`
--
ALTER TABLE `visastamping`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visa_process_report`
--
ALTER TABLE `visa_process_report`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `access_level`
--
ALTER TABLE `access_level`
  ADD CONSTRAINT `access_level_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `access_level_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `access_level_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `access_level_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `agents`
--
ALTER TABLE `agents`
  ADD CONSTRAINT `agents_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `agents_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `agents_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `agreement_paper`
--
ALTER TABLE `agreement_paper`
  ADD CONSTRAINT `agreement_paper_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `agreement_paper_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `agreement_paper_pax`
--
ALTER TABLE `agreement_paper_pax`
  ADD CONSTRAINT `agreement_paper_pax_agreement_paper_id_foreign` FOREIGN KEY (`agreement_paper_id`) REFERENCES `agreement_paper` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `agreement_paper_pax_recruit_id_foreign` FOREIGN KEY (`recruit_id`) REFERENCES `recruitingorder` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `airlines`
--
ALTER TABLE `airlines`
  ADD CONSTRAINT `airlines_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `airlines_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `airlinetaxs`
--
ALTER TABLE `airlinetaxs`
  ADD CONSTRAINT `airlinetaxs_airline_id_foreign` FOREIGN KEY (`airline_id`) REFERENCES `airlines` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `airlinetaxs_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `airlinetaxs_tickettax_id_foreign` FOREIGN KEY (`tickettax_id`) REFERENCES `tickettaxs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `airlinetaxs_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `backup`
--
ALTER TABLE `backup`
  ADD CONSTRAINT `backup_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `backup_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bank`
--
ALTER TABLE `bank`
  ADD CONSTRAINT `bank_account_id_foreign` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bank_contact_id_foreign` FOREIGN KEY (`contact_id`) REFERENCES `contact` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bank_payment_mode_id_foreign` FOREIGN KEY (`payment_mode_id`) REFERENCES `account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bill_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bill_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `contact` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bill_entry`
--
ALTER TABLE `bill_entry`
  ADD CONSTRAINT `bill_entry_account_id_foreign` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bill_entry_bill_id_foreign` FOREIGN KEY (`bill_id`) REFERENCES `bill` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bill_entry_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bill_entry_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bill_entry_tax_id_foreign` FOREIGN KEY (`tax_id`) REFERENCES `tax` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bill_entry_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `branch`
--
ALTER TABLE `branch`
  ADD CONSTRAINT `branch_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `branch_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `company_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `company_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `contact_account_id_foreign` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contact_agent_id_foreign` FOREIGN KEY (`agent_id`) REFERENCES `agents` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contact_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contact_contact_category_id_foreign` FOREIGN KEY (`contact_category_id`) REFERENCES `contact_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contact_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contact_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contact_category`
--
ALTER TABLE `contact_category`
  ADD CONSTRAINT `contact_category_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contact_category_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `credit_notes`
--
ALTER TABLE `credit_notes`
  ADD CONSTRAINT `credit_notes_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `credit_notes_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `contact` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `credit_notes_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `credit_note_entries`
--
ALTER TABLE `credit_note_entries`
  ADD CONSTRAINT `credit_note_entries_account_id_foreign` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `credit_note_entries_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `credit_note_entries_credit_note_id_foreign` FOREIGN KEY (`credit_note_id`) REFERENCES `credit_notes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `credit_note_entries_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `credit_note_entries_tax_id_foreign` FOREIGN KEY (`tax_id`) REFERENCES `tax` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `credit_note_entries_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `credit_note_payments`
--
ALTER TABLE `credit_note_payments`
  ADD CONSTRAINT `credit_note_payments_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `credit_note_payments_credit_note_id_foreign` FOREIGN KEY (`credit_note_id`) REFERENCES `credit_notes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `credit_note_payments_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `credit_note_payments_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `credit_note_refunds`
--
ALTER TABLE `credit_note_refunds`
  ADD CONSTRAINT `credit_note_refunds_account_id_foreign` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `credit_note_refunds_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `credit_note_refunds_credit_note_id_foreign` FOREIGN KEY (`credit_note_id`) REFERENCES `credit_notes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `credit_note_refunds_payment_mode_id_foreign` FOREIGN KEY (`payment_mode_id`) REFERENCES `payment_mode` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `credit_note_refunds_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `document`
--
ALTER TABLE `document`
  ADD CONSTRAINT `document_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `document_documentcategory_id_foreign` FOREIGN KEY (`documentcategory_id`) REFERENCES `documentcategory` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `document_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `documentcategory`
--
ALTER TABLE `documentcategory`
  ADD CONSTRAINT `documentcategory_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `documentcategory_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `email`
--
ALTER TABLE `email`
  ADD CONSTRAINT `email_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `email_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `estimates`
--
ALTER TABLE `estimates`
  ADD CONSTRAINT `estimates_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `contact` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `estimate_entries`
--
ALTER TABLE `estimate_entries`
  ADD CONSTRAINT `estimate_entries_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `estimate_entries_estimate_id_foreign` FOREIGN KEY (`estimate_id`) REFERENCES `estimates` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `estimate_entries_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `estimate_entries_tax_id_foreign` FOREIGN KEY (`tax_id`) REFERENCES `tax` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `estimate_entries_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `excess_payment`
--
ALTER TABLE `excess_payment`
  ADD CONSTRAINT `excess_payment_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `excess_payment_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `excess_payment_payment_receives_id_foreign` FOREIGN KEY (`payment_receives_id`) REFERENCES `payment_receives` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `excess_payment_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `expense`
--
ALTER TABLE `expense`
  ADD CONSTRAINT `expense_account_id_foreign` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `expense_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `expense_paid_through_id_foreign` FOREIGN KEY (`paid_through_id`) REFERENCES `account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `expense_tax_id_foreign` FOREIGN KEY (`tax_id`) REFERENCES `tax` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `expense_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `expense_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `contact` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `expensesector`
--
ALTER TABLE `expensesector`
  ADD CONSTRAINT `expensesector_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `expensesector_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fingerprint`
--
ALTER TABLE `fingerprint`
  ADD CONSTRAINT `fingerprint_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fingerprint_paxid_foreign` FOREIGN KEY (`paxid`) REFERENCES `recruitingorder` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fingerprint_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `flight`
--
ALTER TABLE `flight`
  ADD CONSTRAINT `flight_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `flight_paxid_foreign` FOREIGN KEY (`paxid`) REFERENCES `recruitingorder` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `flight_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `flight_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `contact` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gamca`
--
ALTER TABLE `gamca`
  ADD CONSTRAINT `gamca_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gamca_recruit_id_foreign` FOREIGN KEY (`recruit_id`) REFERENCES `recruitingorder` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gamca_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `immigration_clearance`
--
ALTER TABLE `immigration_clearance`
  ADD CONSTRAINT `immigration_clearance_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `immigration_clearance_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `immigration_clearance_pax`
--
ALTER TABLE `immigration_clearance_pax`
  ADD CONSTRAINT `immigration_clearance_pax_immigration_clearance_id_foreign` FOREIGN KEY (`immigration_clearance_id`) REFERENCES `immigration_clearance` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `immigration_clearance_pax_pax_id_foreign` FOREIGN KEY (`pax_id`) REFERENCES `recruitingorder` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `incomes`
--
ALTER TABLE `incomes`
  ADD CONSTRAINT `incomes_account_id_foreign` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `incomes_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `incomes_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `contact` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `incomes_receive_through_id_foreign` FOREIGN KEY (`receive_through_id`) REFERENCES `account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `incomes_tax_id_foreign` FOREIGN KEY (`tax_id`) REFERENCES `tax` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `incomes_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_agents_id_foreign` FOREIGN KEY (`agents_id`) REFERENCES `agents` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `invoices_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `invoices_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `contact` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `invoices_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `invoice_entries`
--
ALTER TABLE `invoice_entries`
  ADD CONSTRAINT `invoice_entries_account_id_foreign` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `invoice_entries_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `invoice_entries_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `invoice_entries_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `invoice_entries_tax_id_foreign` FOREIGN KEY (`tax_id`) REFERENCES `tax` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `invoice_entries_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `journal_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `journal_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `journal_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `journal_entries`
--
ALTER TABLE `journal_entries`
  ADD CONSTRAINT `journal_entries_account_name_id_foreign` FOREIGN KEY (`account_name_id`) REFERENCES `account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `journal_entries_agent_id_foreign` FOREIGN KEY (`agent_id`) REFERENCES `agents` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `journal_entries_bank_id_foreign` FOREIGN KEY (`bank_id`) REFERENCES `bank` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `journal_entries_bill_entry_id_foreign` FOREIGN KEY (`bill_entry_id`) REFERENCES `bill_entry` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `journal_entries_bill_id_foreign` FOREIGN KEY (`bill_id`) REFERENCES `bill` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `journal_entries_contact_id_foreign` FOREIGN KEY (`contact_id`) REFERENCES `contact` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `journal_entries_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `journal_entries_credit_note_id_foreign` FOREIGN KEY (`credit_note_id`) REFERENCES `credit_notes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `journal_entries_credit_note_refunds_id_foreign` FOREIGN KEY (`credit_note_refunds_id`) REFERENCES `credit_note_refunds` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `journal_entries_expense_id_foreign` FOREIGN KEY (`expense_id`) REFERENCES `expense` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `journal_entries_income_id_foreign` FOREIGN KEY (`income_id`) REFERENCES `incomes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `journal_entries_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `journal_entries_journal_id_foreign` FOREIGN KEY (`journal_id`) REFERENCES `journal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `journal_entries_payment_made_entry_id_foreign` FOREIGN KEY (`payment_made_entry_id`) REFERENCES `payment_made_entry` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `journal_entries_payment_made_id_foreign` FOREIGN KEY (`payment_made_id`) REFERENCES `payment_made` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `journal_entries_payment_receives_entries_id_foreign` FOREIGN KEY (`payment_receives_entries_id`) REFERENCES `payment_receives_entries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `journal_entries_payment_receives_id_foreign` FOREIGN KEY (`payment_receives_id`) REFERENCES `payment_receives` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `journal_entries_salescomission_id_foreign` FOREIGN KEY (`salesComission_id`) REFERENCES `salescommisions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `journal_entries_tax_id_foreign` FOREIGN KEY (`tax_id`) REFERENCES `tax` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `journal_entries_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `manpower`
--
ALTER TABLE `manpower`
  ADD CONSTRAINT `manpower_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `manpower_paxid_foreign` FOREIGN KEY (`paxid`) REFERENCES `recruitingorder` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `manpower_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `medicalslip`
--
ALTER TABLE `medicalslip`
  ADD CONSTRAINT `medicalslip_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `medicalslip_pax_id_foreign` FOREIGN KEY (`pax_id`) REFERENCES `recruitingorder` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `medicalslip_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `medical_slip_form`
--
ALTER TABLE `medical_slip_form`
  ADD CONSTRAINT `medical_slip_form_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `medical_slip_form_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `medical_slip_form_pax`
--
ALTER TABLE `medical_slip_form_pax`
  ADD CONSTRAINT `medical_slip_form_pax_medicalslip_id_foreign` FOREIGN KEY (`medicalslip_id`) REFERENCES `medical_slip_form` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `medical_slip_form_pax_recruit_id_foreign` FOREIGN KEY (`recruit_id`) REFERENCES `recruitingorder` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mofas`
--
ALTER TABLE `mofas`
  ADD CONSTRAINT `mofas_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mofas_pax_id_foreign` FOREIGN KEY (`pax_id`) REFERENCES `recruitingorder` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mofas_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `musaned`
--
ALTER TABLE `musaned`
  ADD CONSTRAINT `musaned_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `musaned_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `musaned_pax_id_foreign` FOREIGN KEY (`pax_id`) REFERENCES `recruitingorder` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `musaned_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `note_sheet`
--
ALTER TABLE `note_sheet`
  ADD CONSTRAINT `note_sheet_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `note_sheet_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `note_sheet_pax`
--
ALTER TABLE `note_sheet_pax`
  ADD CONSTRAINT `note_sheet_pax_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `note_sheet_pax_note_sheet_id_foreign` FOREIGN KEY (`note_sheet_id`) REFERENCES `note_sheet` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `note_sheet_pax_recruit_id_foreign` FOREIGN KEY (`recruit_id`) REFERENCES `recruitingorder` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `note_sheet_pax_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `okala`
--
ALTER TABLE `okala`
  ADD CONSTRAINT `okala_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `okala_paxid_foreign` FOREIGN KEY (`paxid`) REFERENCES `recruitingorder` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `okala_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `openningbalances`
--
ALTER TABLE `openningbalances`
  ADD CONSTRAINT `openningbalances_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `openningbalances_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment_made`
--
ALTER TABLE `payment_made`
  ADD CONSTRAINT `payment_made_account_id_foreign` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payment_made_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payment_made_payment_mode_id_foreign` FOREIGN KEY (`payment_mode_id`) REFERENCES `payment_mode` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payment_made_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payment_made_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `contact` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment_made_entry`
--
ALTER TABLE `payment_made_entry`
  ADD CONSTRAINT `payment_made_entry_bill_id_foreign` FOREIGN KEY (`bill_id`) REFERENCES `bill` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payment_made_entry_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payment_made_entry_payment_made_id_foreign` FOREIGN KEY (`payment_made_id`) REFERENCES `payment_made` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payment_made_entry_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment_receives`
--
ALTER TABLE `payment_receives`
  ADD CONSTRAINT `payment_receives_account_id_foreign` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payment_receives_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payment_receives_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `contact` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payment_receives_payment_mode_id_foreign` FOREIGN KEY (`payment_mode_id`) REFERENCES `payment_mode` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payment_receives_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment_receives_entries`
--
ALTER TABLE `payment_receives_entries`
  ADD CONSTRAINT `payment_receives_entries_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payment_receives_entries_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payment_receives_entries_payment_receives_id_foreign` FOREIGN KEY (`payment_receives_id`) REFERENCES `payment_receives` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payment_receives_entries_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `product_phase_item_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_phase_item_product_phase_id_foreign` FOREIGN KEY (`product_phase_id`) REFERENCES `product_phase` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_phase_item_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_phase_item_add`
--
ALTER TABLE `product_phase_item_add`
  ADD CONSTRAINT `product_phase_item_add_product_phase_item_id_foreign` FOREIGN KEY (`product_phase_item_id`) REFERENCES `product_phase_item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `recruiteexpense`
--
ALTER TABLE `recruiteexpense`
  ADD CONSTRAINT `recruiteexpense_expense_id_foreign` FOREIGN KEY (`expense_id`) REFERENCES `expense` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `recruiteexpense_expensesectorid_foreign` FOREIGN KEY (`expenseSectorid`) REFERENCES `expensesector` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `recruiteexpensepax`
--
ALTER TABLE `recruiteexpensepax`
  ADD CONSTRAINT `recruiteexpensepax_paxid_foreign` FOREIGN KEY (`paxid`) REFERENCES `recruitingorder` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `recruiteexpensepax_recruitexpenseid_foreign` FOREIGN KEY (`recruitExpenseid`) REFERENCES `recruiteexpense` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `recruitingorder`
--
ALTER TABLE `recruitingorder`
  ADD CONSTRAINT `recruitingorder_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `recruitingorder_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `contact` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `recruitingorder_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `recruitingorder_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `recruitingorder_registerserial_id_foreign` FOREIGN KEY (`registerSerial_id`) REFERENCES `visaentrys` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `recruitingorder_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `recruit_customer`
--
ALTER TABLE `recruit_customer`
  ADD CONSTRAINT `recruit_customer_pax_id_foreign` FOREIGN KEY (`pax_id`) REFERENCES `recruitingorder` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `recruit_customer_recruit_id_foreign` FOREIGN KEY (`recruit_id`) REFERENCES `recruitingorder` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reminders`
--
ALTER TABLE `reminders`
  ADD CONSTRAINT `reminders_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reminders_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `roles_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `roles_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `salescommisions`
--
ALTER TABLE `salescommisions`
  ADD CONSTRAINT `salescommisions_agents_id_foreign` FOREIGN KEY (`agents_id`) REFERENCES `agents` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `salescommisions_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `salescommisions_paid_through_id_foreign` FOREIGN KEY (`paid_through_id`) REFERENCES `account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `salescommisions_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_bill_id_foreign` FOREIGN KEY (`bill_id`) REFERENCES `bill` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stock_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stock_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stock_credit_note_id_foreign` FOREIGN KEY (`credit_note_id`) REFERENCES `credit_notes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stock_item_category_id_foreign` FOREIGN KEY (`item_category_id`) REFERENCES `item_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stock_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stock_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tax`
--
ALTER TABLE `tax`
  ADD CONSTRAINT `tax_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tax_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ticketorders`
--
ALTER TABLE `ticketorders`
  ADD CONSTRAINT `ticketorders_bill_id_foreign` FOREIGN KEY (`bill_id`) REFERENCES `invoices` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ticketorders_contact_id_foreign` FOREIGN KEY (`contact_id`) REFERENCES `contact` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ticketorders_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ticketorders_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `bill` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ticketorders_ticket_hotel_id_foreign` FOREIGN KEY (`ticket_hotel_id`) REFERENCES `ticket_hotel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ticketorders_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ticketorders_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `contact` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tickettaxs`
--
ALTER TABLE `tickettaxs`
  ADD CONSTRAINT `tickettaxs_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tickettaxs_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ticket_document`
--
ALTER TABLE `ticket_document`
  ADD CONSTRAINT `ticket_document_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_document_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `ticketorders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_document_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ticket_hotel`
--
ALTER TABLE `ticket_hotel`
  ADD CONSTRAINT `ticket_hotel_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_hotel_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ticket_order_tax`
--
ALTER TABLE `ticket_order_tax`
  ADD CONSTRAINT `ticket_order_tax_ticket_order_id_foreign` FOREIGN KEY (`ticket_order_id`) REFERENCES `ticketorders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_order_tax_ticket_tax_id_foreign` FOREIGN KEY (`ticket_tax_id`) REFERENCES `tickettaxs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `visaacceptance`
--
ALTER TABLE `visaacceptance`
  ADD CONSTRAINT `visaacceptance_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `visaacceptance_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `visaacceptance_visaentry_id_foreign` FOREIGN KEY (`visaentry_id`) REFERENCES `visaentrys` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `visaentrys`
--
ALTER TABLE `visaentrys`
  ADD CONSTRAINT `visaentrys_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `visaentrys_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `visaentrys_local_reference_foreign` FOREIGN KEY (`local_Reference`) REFERENCES `contact` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `visaentrys_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `visaformagreement`
--
ALTER TABLE `visaformagreement`
  ADD CONSTRAINT `visaformagreement_visaform_id_foreign` FOREIGN KEY (`visaform_id`) REFERENCES `visaforms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `visaformbulks`
--
ALTER TABLE `visaformbulks`
  ADD CONSTRAINT `visaformbulks_visaform_id_foreign` FOREIGN KEY (`visaform_id`) REFERENCES `visaforms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `visaforms`
--
ALTER TABLE `visaforms`
  ADD CONSTRAINT `visaforms_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `visaforms_pax_id_foreign` FOREIGN KEY (`pax_id`) REFERENCES `recruitingorder` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `visaforms_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `visastamping`
--
ALTER TABLE `visastamping`
  ADD CONSTRAINT `visastamping_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `visastamping_pax_id_foreign` FOREIGN KEY (`pax_id`) REFERENCES `recruitingorder` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `visastamping_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `visa_process_report`
--
ALTER TABLE `visa_process_report`
  ADD CONSTRAINT `visa_process_report_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `visa_process_report_recruit_id_foreign` FOREIGN KEY (`recruit_id`) REFERENCES `recruitingorder` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `visa_process_report_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
