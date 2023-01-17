-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 17, 2023 at 06:40 AM
-- Server version: 10.3.37-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kaizenpo_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `account_holder_name` varchar(255) NOT NULL,
  `branch_name` varchar(255) NOT NULL,
  `account_balance` varchar(255) NOT NULL,
  `account_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `account_name`, `account_number`, `account_holder_name`, `branch_name`, `account_balance`, `account_status`) VALUES
(1, 'bKash', '016291697778', 'Kh Tasfik', 'Dhaka', '0', 'Active'),
(2, 'bKash', '01254698743', 'Md. Ashraful', 'Dhaka', '0', 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `username`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Super Admin', 'info@kaizenitbd.com', 'kaizenit', NULL, '$2y$10$zC0SGLRY5YR4sCs88xKKKubC6MNDWY6YxToETf2DJg6e.SosHfzj6', NULL, '2022-01-04 23:35:13', '2022-01-04 23:35:13');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `summery` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `summery`, `created_at`, `updated_at`) VALUES
(1, 'R A K', 'Ceramic and tiles', '2021-10-06 22:52:26', '2021-10-06 22:52:26'),
(3, 'DBL Ceramics Limited', 'DBL Ceramics Limited is one of the leading ceramics tiles manufacturers in Bangladesh. At the end of 2016, DBL started its operations and in this short period of time using creativity and unique design.', '2021-10-12 22:41:59', '2021-10-12 22:42:22'),
(4, 'Great Wall Ceramic Industries Ltd', 'Great wall ceramic ltd is the largest tiles and ceramic manufacturer of Bangladesh. The world-renowned Thai brand name COTTO in association with Bangladeshi brand CHARU used to run this company.', '2021-10-12 22:44:09', '2021-10-12 22:44:09');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(3, 'Ceramic', '2021-10-12 22:32:33', '2021-10-12 22:32:33'),
(4, 'Basin', '2021-10-12 22:33:11', '2021-10-12 22:33:11'),
(7, 'Door', '2022-02-02 00:44:11', '2022-02-02 00:44:11'),
(8, 'PVC Pipe', '2022-02-02 00:44:40', '2022-02-02 00:44:40'),
(9, 'nahar', '2022-06-16 03:50:25', '2022-06-16 03:50:25');

-- --------------------------------------------------------

--
-- Table structure for table `companaysettings`
--

CREATE TABLE `companaysettings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_contact` varchar(255) NOT NULL,
  `company_email` varchar(255) NOT NULL,
  `company_logo` varchar(255) NOT NULL,
  `company_address` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companaysettings`
--

INSERT INTO `companaysettings` (`id`, `company_name`, `company_contact`, `company_email`, `company_logo`, `company_address`) VALUES
(3, 'Kaizen It Ltd', '01934453977', 'kaizenitbd@gmail.com', 'kaizenit.png', '2nd Floor, Signal, Gazi Tower, 151/6, 1205 Panthapath, Dhaka 1205');

-- --------------------------------------------------------

--
-- Table structure for table `customeremails`
--

CREATE TABLE `customeremails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `customer_message` longtext NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customeremails`
--

INSERT INTO `customeremails` (`id`, `email`, `phone`, `subject`, `customer_message`, `customer_id`) VALUES
(8, 'tasfik1212@gmail.com', '01629167778', 'Nothing', 'good', 1),
(9, 'snighdho@gmail.com', '01657896541', 'fhhhhhgf', 'cfhhhhg', 2),
(10, 'rakib@gmail.com', '01254789654', 'fhhhhhgf', 'cfhhhhg', 4),
(11, 'rasel@gmail.com', '01321458965', 'fhhhhhgf', 'cfhhhhg', 5),
(12, 'rasel@gmail.com', '01321458965', 'fhhhhhgf', 'cfhhhhg', 5),
(13, 'cusone@gmail.com', '01834793345', 'fhhhhhgf', 'cfhhhhg', 7);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `contact`, `email`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Kh Tasfik Islam', '01629167778', 'tasfik1212@gmail.com', 'Green Tower, Green Road, Dhaka', '2021-10-03 04:27:23', '2021-10-03 05:38:51'),
(2, 'Snighdho', '01657896541', 'snighdho@gmail.com', 'Mirpur 12', '2021-10-03 05:17:02', '2021-10-03 05:17:02'),
(4, 'Mr Rakib Islam', '01254789654', 'rakib@gmail.com', 'Cumilla, Bangladesh', '2021-12-25 23:34:12', '2021-12-25 23:34:12'),
(5, 'Mr. Rasel', '01321458965', 'rasel@gmail.com', 'Dhanmondi, Dhaka', '2021-12-25 23:36:02', '2021-12-25 23:36:02'),
(6, 'Polash', '01829604399', 'Istiakshaon4@gmail', 'Karimpur', '2022-02-21 04:32:31', '2022-02-21 04:32:31'),
(7, 'customer one', '01834793345', 'cusone@gmail.com', 'ewerr', '2022-05-16 13:49:38', '2022-05-16 13:49:38'),
(8, 'Abdul Momin', '+8801934453979', 'momincse34@gmail.com', '151/6 gazi tower panthapath signal-1205', '2022-06-28 05:52:00', '2022-06-28 05:52:00'),
(9, 'মের্সাস করিম', '01933459658', 'karim12@gmail.com', '133/5 dhaka bangladesh.,', '2022-10-19 05:55:42', '2022-10-19 05:55:42'),
(10, 'eye71online', '01748101905', 'riajuddin2010@gmail.com', 'Badda, Dhaka, Bangladesh', '2022-12-14 11:24:38', '2022-12-14 11:24:38');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `name`, `price`, `date`) VALUES
(1, 'Tea', '30', '2021-10-12'),
(2, 'Somocha', '50', '2021-10-12'),
(5, 'others', '50', '2021-10-11');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fundtransfers`
--

CREATE TABLE `fundtransfers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `account_id` bigint(20) UNSIGNED NOT NULL,
  `balance_transfer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fundtransfers`
--

INSERT INTO `fundtransfers` (`id`, `date`, `account_id`, `balance_transfer`) VALUES
(1, '2022-01-23', 1, '1000'),
(3, '2022-01-23', 2, '5000'),
(4, '2022-02-01', 2, '2000');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_10_02_054349_create_roles_table', 1),
(6, '2021_10_02_054704_create_suppliers_table', 1),
(7, '2021_10_02_054725_create_categories_table', 1),
(8, '2021_10_02_054739_create_brands_table', 1),
(9, '2021_10_02_054751_create_units_table', 1),
(10, '2021_10_02_054820_create_customers_table', 1),
(11, '2021_10_02_054848_create_paymentmethods_table', 1),
(12, '2021_10_02_054915_create_expenses_table', 1),
(13, '2021_10_02_062001_add_employee_to_users_table', 1),
(14, '2021_10_02_063237_create_purchases_table', 1),
(15, '2021_10_02_063300_create_stocks_table', 1),
(16, '2021_10_02_063332_create_manageproducts_table', 1),
(17, '2021_10_02_063355_create_shippings_table', 1),
(18, '2021_10_02_063411_create_orders_table', 1),
(19, '2021_10_02_063445_create_orderdetails_table', 1),
(20, '2021_10_02_063515_create_returns_table', 1),
(21, '2021_10_05_045607_create_supplierproducts_table', 2),
(22, '2021_10_13_115443_create_purchaseproducts_table', 3),
(23, '2021_10_14_072603_create_purchasepandings_table', 4),
(24, '2021_10_18_063448_create_storages_table', 5),
(25, '2021_10_21_114708_create_stockquantities_table', 6),
(26, '2021_10_26_074008_create_purchasereturns_table', 7),
(27, '2021_10_26_074413_create_stockreturns_table', 7),
(28, '2021_11_02_044819_create_sellreturns_table', 8),
(29, '2021_11_02_045727_create_sellreturnproducts_table', 9),
(30, '2021_11_03_092248_create_customeremails_table', 10),
(31, '2021_11_03_092556_create_supplieremails_table', 10),
(32, '2021_12_27_110659_create_companaysettings_table', 11),
(33, '2021_12_30_044041_create_permission_tables', 12),
(34, '2022_01_05_051048_create_admins_table', 13),
(35, '2022_01_19_051220_create_accounts_table', 14),
(36, '2022_01_19_103647_create_fundtransfers_table', 15),
(37, '2022_01_24_062811_create_warehouses_table', 16),
(38, '2022_01_24_095120_create_products_table', 17),
(39, '2022_01_25_112244_create_warehousestockqties_table', 18),
(40, '2022_01_31_035511_create_purchaseproductquantities_table', 19),
(41, '2022_01_31_040046_create_purchasereturnquantities_table', 20);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(20, 'App\\Models\\User', 2),
(21, 'App\\Models\\User', 21);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `warehousestockqty_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(20) NOT NULL,
  `purchase_price` varchar(20) NOT NULL,
  `sell_price` varchar(20) NOT NULL,
  `total_price` varchar(255) NOT NULL,
  `quantity` varchar(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`id`, `order_id`, `product_id`, `warehousestockqty_id`, `product_name`, `purchase_price`, `sell_price`, `total_price`, `quantity`, `created_at`, `updated_at`) VALUES
(88, 56, 10, 13, 'PVC Bathroom Cabinet', '4000', '4500', '22500', '5', NULL, NULL),
(89, 56, 8, 10, 'Basin', '5000', '6500', '19500', '3', NULL, NULL),
(90, 57, 7, 8, 'French doors', '10000', '12000', '60000', '5', NULL, NULL),
(91, 58, 7, 8, 'French doors', '10000', '12000', '12000', '1', NULL, NULL),
(92, 58, 10, 13, 'PVC Bathroom Cabinet', '4000', '4500', '9000', '2', NULL, NULL),
(93, 59, 7, 9, 'French doors', '10000', '12000', '12000', '1', NULL, NULL),
(94, 59, 10, 14, 'PVC Bathroom Cabinet', '4000', '4500', '4500', '1', NULL, NULL),
(95, 61, 7, 8, 'French doors', '10000', '12000', '60000', '5', '2022-02-21 04:38:47', '2022-02-21 04:38:47'),
(96, 62, 8, 10, 'Basin', '5000', '6500', '6500', '1', '2022-03-14 12:35:56', '2022-03-14 12:35:56'),
(97, 63, 7, 8, 'French doors', '10000', '12000', '24000', '2', '2022-03-14 12:37:35', '2022-03-14 12:37:35'),
(98, 64, 7, 8, 'French doors', '10000', '12000', '60000', '5', '2022-03-23 04:38:36', '2022-03-23 04:38:36'),
(99, 65, 7, 8, 'French doors', '10000', '12000', '120000', '10', '2022-06-28 06:29:10', '2022-06-28 06:29:10'),
(100, 66, 9, 11, 'Tiles', '1000', '1250', '2500', '2', '2023-01-17 04:17:49', '2023-01-17 04:17:49');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(50) NOT NULL,
  `invoice` varchar(15) NOT NULL,
  `order_date` date NOT NULL,
  `shipping_id` bigint(20) UNSIGNED NOT NULL,
  `paymentmethod` varchar(20) NOT NULL,
  `total_amount` varchar(10) NOT NULL,
  `received_amount` varchar(10) NOT NULL,
  `discount` varchar(10) NOT NULL,
  `vat` varchar(10) NOT NULL,
  `discount_tk` varchar(20) NOT NULL,
  `vat_tk` int(20) NOT NULL,
  `due` varchar(10) NOT NULL,
  `order_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `invoice`, `order_date`, `shipping_id`, `paymentmethod`, `total_amount`, `received_amount`, `discount`, `vat`, `discount_tk`, `vat_tk`, `due`, `order_status`) VALUES
(56, '290122-61f5888b91544', 'nOGcKpHu', '2022-01-30', 58, 'Cash', '42411', '42000', '1', '2', '0', 0, '411', 'Paid'),
(57, '661f60af61b3b9', 'HvMdOQtK', '2022-01-30', 59, 'Cash', '60000', '60000', '0', '0', '0', 0, '0', 'Paid'),
(58, '#00000062', 'ttgFaz0o', '2022-02-01', 62, 'Cash', '21000', '21000', '0', '0', '0', 0, '0', 'Paid'),
(59, '#00000062', 'QWIDV90v', '2022-02-01', 63, 'Cash', '16335', '16330', '1', '0', '0', 0, '5', 'Paid'),
(60, '#00000062', '8I2uTPhc', '2022-02-15', 65, 'Cash', '0', '0', '0', '0', '0', 0, '0', 'Paid'),
(61, '#00000062', 'hDYxq6W6', '2022-02-21', 66, 'Cash', '60000', '0', '0', '0', '0', 0, '0', 'Paid'),
(62, '#00000062', 'qFji3H5w', '2022-12-12', 67, 'Cash', '6500', '5000', '0', '0', '0', 0, '1500', 'Due'),
(63, '#00000062', 'otb9BIjY', '2022-12-12', 69, 'Cash', '24000', '0', '0', '0', '0', 0, '0', 'Due'),
(64, '#00000062', '8Ok5PXua', '2022-03-23', 71, 'Cash', '54000', '50000', '10', '0', '0', 0, '4000', 'Due'),
(65, '#00000062', 'bBpK85On', '2022-10-06', 72, 'Cash', '108001', '0', '10', '0', '0', 0, '0', 'Paid'),
(66, '#00000062', 'DDMmhMzY', '2023-01-17', 73, 'Cash', '4080', '0', '10', '20', '100', 200, '0', 'Due');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('info@kaizenitbd.com', '$2y$10$U0Ef9UVh7TL.rMmlUi6Z4.OWRHnQx5ZJu6ShHQSecVEk5egGSoIY6', '2022-10-02 07:10:14');

-- --------------------------------------------------------

--
-- Table structure for table `paymentmethods`
--

CREATE TABLE `paymentmethods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `group_name` varchar(256) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `group_name`, `created_at`, `updated_at`) VALUES
(18, 'Dashboard View', 'web', 'Dashboard', '2022-01-28 10:35:02', '2022-01-28 10:35:02'),
(19, 'Role Create', 'web', 'Manage User', '2022-01-28 10:35:03', '2022-01-28 10:35:03'),
(20, 'Role List', 'web', 'Manage User', '2022-01-28 10:35:03', '2022-01-28 10:35:03'),
(21, 'Role Edit', 'web', 'Manage User', '2022-01-28 10:35:03', '2022-01-28 10:35:03'),
(22, 'Role Delete', 'web', 'Manage User', '2022-01-28 10:35:03', '2022-01-28 10:35:03'),
(23, 'User List', 'web', 'Manage User', '2022-01-28 10:35:03', '2022-01-28 10:35:03'),
(24, 'User Create', 'web', 'Manage User', '2022-01-28 10:35:03', '2022-01-28 10:35:03'),
(25, 'User Edit', 'web', 'Manage User', '2022-01-28 10:35:03', '2022-01-28 10:35:03'),
(26, 'User Delete', 'web', 'Manage User', '2022-01-28 10:35:03', '2022-01-28 10:35:03'),
(27, 'Customer List', 'web', 'Manage Customer', '2022-01-28 10:35:03', '2022-01-28 10:35:03'),
(28, 'Customer Create', 'web', 'Manage Customer', '2022-01-28 10:35:04', '2022-01-28 10:35:04'),
(29, 'Customer Edit', 'web', 'Manage Customer', '2022-01-28 10:35:04', '2022-01-28 10:35:04'),
(30, 'Customer Delete', 'web', 'Manage Customer', '2022-01-28 10:35:04', '2022-01-28 10:35:04'),
(31, 'Supplier List', 'web', 'Manage Supplier', '2022-01-28 10:35:04', '2022-01-28 10:35:04'),
(32, 'Supplier Create', 'web', 'Manage Supplier', '2022-01-28 10:35:04', '2022-01-28 10:35:04'),
(33, 'Supplier Edit', 'web', 'Manage Supplier', '2022-01-28 10:35:04', '2022-01-28 10:35:04'),
(34, 'Supplier Delete', 'web', 'Manage Supplier', '2022-01-28 10:35:04', '2022-01-28 10:35:04'),
(35, 'Purchase List', 'web', 'Purchase', '2022-01-28 10:35:04', '2022-01-28 10:35:04'),
(36, 'Purchase Create', 'web', 'Purchase', '2022-01-28 10:35:05', '2022-01-28 10:35:05'),
(37, 'Purchase Edit', 'web', 'Purchase', '2022-01-28 10:35:05', '2022-01-28 10:35:05'),
(38, 'Purchase Delete', 'web', 'Purchase', '2022-01-28 10:35:05', '2022-01-28 10:35:05'),
(39, 'Category List', 'web', 'Product', '2022-01-28 10:35:05', '2022-01-28 10:35:05'),
(40, 'Category Create', 'web', 'Product', '2022-01-28 10:35:05', '2022-01-28 10:35:05'),
(41, 'Category Edit', 'web', 'Product', '2022-01-28 10:35:05', '2022-01-28 10:35:05'),
(42, 'Category Delete', 'web', 'Product', '2022-01-28 10:35:05', '2022-01-28 10:35:05'),
(43, 'Brand List', 'web', 'Product', '2022-01-28 10:35:05', '2022-01-28 10:35:05'),
(44, 'Brand Create', 'web', 'Product', '2022-01-28 10:35:05', '2022-01-28 10:35:05'),
(45, 'Brand Edit', 'web', 'Product', '2022-01-28 10:35:05', '2022-01-28 10:35:05'),
(46, 'Brand Delete', 'web', 'Product', '2022-01-28 10:35:06', '2022-01-28 10:35:06'),
(47, 'Unit List', 'web', 'Product', '2022-01-28 10:35:06', '2022-01-28 10:35:06'),
(48, 'Unit Create', 'web', 'Product', '2022-01-28 10:35:06', '2022-01-28 10:35:06'),
(49, 'Unit Edit', 'web', 'Product', '2022-01-28 10:35:06', '2022-01-28 10:35:06'),
(50, 'Unit Delete', 'web', 'Product', '2022-01-28 10:35:06', '2022-01-28 10:35:06'),
(51, 'Warehouse List', 'web', 'Product', '2022-01-28 10:35:06', '2022-01-28 10:35:06'),
(52, 'Warehouse Create', 'web', 'Product', '2022-01-28 10:35:06', '2022-01-28 10:35:06'),
(53, 'Warehouse Edit', 'web', 'Product', '2022-01-28 10:35:06', '2022-01-28 10:35:06'),
(54, 'Warehouse Delete', 'web', 'Product', '2022-01-28 10:35:06', '2022-01-28 10:35:06'),
(55, 'Product List', 'web', 'Product', '2022-01-28 10:35:06', '2022-01-28 10:35:06'),
(56, 'Product Create', 'web', 'Product', '2022-01-28 10:35:06', '2022-01-28 10:35:06'),
(57, 'Product Edit', 'web', 'Product', '2022-01-28 10:35:06', '2022-01-28 10:35:06'),
(58, 'Product Delete', 'web', 'Product', '2022-01-28 10:35:07', '2022-01-28 10:35:07'),
(59, 'Order List', 'web', 'Sale', '2022-01-28 10:35:07', '2022-01-28 10:35:07'),
(60, 'Order Create', 'web', 'Sale', '2022-01-28 10:35:07', '2022-01-28 10:35:07'),
(61, 'Invoice Edit', 'web', 'Sale', '2022-01-28 10:35:07', '2022-01-28 10:35:07'),
(62, 'Invoice Delete', 'web', 'Sale', '2022-01-28 10:35:07', '2022-01-28 10:35:07'),
(63, 'Purchase Return List', 'web', 'Return', '2022-01-28 10:35:07', '2022-01-28 10:35:07'),
(64, 'Purchase Return Create', 'web', 'Return', '2022-01-28 10:35:07', '2022-01-28 10:35:07'),
(65, 'Purchase Return Edit', 'web', 'Return', '2022-01-28 10:35:07', '2022-01-28 10:35:07'),
(66, 'Purchase Return Delete', 'web', 'Return', '2022-01-28 10:35:08', '2022-01-28 10:35:08'),
(67, 'Order Return List', 'web', 'Return', '2022-01-28 10:35:08', '2022-01-28 10:35:08'),
(68, 'Order Return Create', 'web', 'Return', '2022-01-28 10:35:08', '2022-01-28 10:35:08'),
(69, 'Order Return Edit', 'web', 'Return', '2022-01-28 10:35:08', '2022-01-28 10:35:08'),
(70, 'Order Return Delete', 'web', 'Return', '2022-01-28 10:35:08', '2022-01-28 10:35:08'),
(71, 'Today Report', 'web', 'Report', '2022-01-28 10:35:08', '2022-01-28 10:35:08'),
(72, 'Inventory Report', 'web', 'Report', '2022-01-28 10:35:08', '2022-01-28 10:35:08'),
(73, 'Supplier Report', 'web', 'Report', '2022-01-28 10:35:08', '2022-01-28 10:35:08'),
(74, 'Sales Report', 'web', 'Report', '2022-01-28 10:35:08', '2022-01-28 10:35:08'),
(75, 'Purchase Report', 'web', 'Report', '2022-01-28 10:35:08', '2022-01-28 10:35:08'),
(76, 'Damage Product Report', 'web', 'Report', '2022-01-28 10:35:08', '2022-01-28 10:35:08'),
(77, 'Expense List', 'web', 'Expense', '2022-01-28 10:35:08', '2022-01-28 10:35:08'),
(78, 'Expense Create', 'web', 'Expense', '2022-01-28 10:35:08', '2022-01-28 10:35:08'),
(79, 'Expense Edit', 'web', 'Expense', '2022-01-28 10:35:09', '2022-01-28 10:35:09'),
(80, 'Expense Delete', 'web', 'Expense', '2022-01-28 10:35:09', '2022-01-28 10:35:09'),
(81, 'Customer Email List', 'web', 'Email', '2022-01-28 10:35:09', '2022-01-28 10:35:09'),
(82, 'Customer Email Send', 'web', 'Email', '2022-01-28 10:35:09', '2022-01-28 10:35:09'),
(83, 'Customer Email Delete', 'web', 'Email', '2022-01-28 10:35:10', '2022-01-28 10:35:10'),
(84, 'Supplier Email List', 'web', 'Email', '2022-01-28 10:35:10', '2022-01-28 10:35:10'),
(85, 'Supplier Email Send', 'web', 'Email', '2022-01-28 10:35:10', '2022-01-28 10:35:10'),
(86, 'Supplier Email Delete', 'web', 'Email', '2022-01-28 10:35:10', '2022-01-28 10:35:10'),
(87, 'Company Settings Information', 'web', 'Settings', '2022-01-28 10:35:10', '2022-01-28 10:35:10'),
(88, 'Company Settings Edit', 'web', 'Settings', '2022-01-28 10:35:10', '2022-01-28 10:35:10'),
(89, 'Company Settings Delete', 'web', 'Settings', '2022-01-28 10:35:10', '2022-01-28 10:35:10'),
(90, 'Account List', 'web', 'General Account', '2022-01-28 10:35:10', '2022-01-28 10:35:10'),
(91, 'Account Create', 'web', 'General Account', '2022-01-28 10:35:10', '2022-01-28 10:35:10'),
(92, 'Account Edit', 'web', 'General Account', '2022-01-28 10:35:11', '2022-01-28 10:35:11'),
(93, 'Account Delete', 'web', 'General Account', '2022-01-28 10:35:11', '2022-01-28 10:35:11'),
(94, 'Fundtransfer List', 'web', 'General Account', '2022-01-28 10:35:11', '2022-01-28 10:35:11'),
(95, 'Fundtransfer Create', 'web', 'General Account', '2022-01-28 10:35:11', '2022-01-28 10:35:11'),
(96, 'Fundtransfer Delete', 'web', 'General Account', '2022-01-28 10:35:11', '2022-01-28 10:35:11');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
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
  `purchaseproduct_id` bigint(20) UNSIGNED NOT NULL,
  `products_id` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `supplier_name` varchar(255) NOT NULL,
  `purchase_price` varchar(255) NOT NULL,
  `sell_price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `warehouse_id` bigint(20) UNSIGNED NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `unit_id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `purchaseproduct_id`, `products_id`, `product_name`, `supplier_name`, `purchase_price`, `sell_price`, `image`, `quantity`, `warehouse_id`, `product_code`, `category_id`, `unit_id`, `brand_id`, `status`) VALUES
(7, 38, '145', 'French doors', 'Rahim Khan', '10000', '12000', 'french-doors.png', '25', 3, 'FRANCH125', 3, 3, 1, 'Active'),
(8, 40, '175', 'Basin', 'Avesh Khan', '5000', '6500', 'Ciclograma.jpg', '200', 4, 'BASIN250', 4, 3, 3, 'Active'),
(9, 43, '170', 'Tiles', 'Kh Tasfik', '1000', '1250', 'porcelain.jpg', '120', 3, 'TILES789', 3, 4, 4, 'Active'),
(10, 44, '195', 'PVC Bathroom Cabinet', 'Tanvir Islam', '4000', '4500', 'pvc.jpg', '75', 3, 'PVC124', 3, 3, 3, 'Active'),
(11, 46, '215', 'Washdown Toilet Bathroom', 'Tanvir Islam', '12000', '13000', 'Close-Coupled-Toilet.jpg', '100', 3, 'BATH125', 3, 3, 3, 'Active'),
(13, 39, '155', 'French doors', 'Avesh Khan', '10000', '11000', 'french-doors.jpg', '30', 4, 'FRANCH222', 3, 3, 4, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `purchasepandings`
--

CREATE TABLE `purchasepandings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `qty` varchar(255) DEFAULT NULL,
  `purchase_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchasepandings`
--

INSERT INTO `purchasepandings` (`id`, `supplier_id`, `product_name`, `qty`, `purchase_id`) VALUES
(5, 47, 'French doors', '10', 62),
(6, 51, 'PVC Bathroom Cabinet', '5', 66);

-- --------------------------------------------------------

--
-- Table structure for table `purchaseproducts`
--

CREATE TABLE `purchaseproducts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `products_id` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `sell_price` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `total_amount` varchar(255) NOT NULL,
  `purchase_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchaseproducts`
--

INSERT INTO `purchaseproducts` (`id`, `products_id`, `product_name`, `product_price`, `sell_price`, `quantity`, `color`, `discount`, `total_amount`, `purchase_id`) VALUES
(38, '145', 'French doors', '10000', '12000', '25', 'red', '5', '285000', 62),
(39, '155', 'French doors', '10000', '11000', '30', 'Red', '8', '276000', 63),
(40, '175', 'Basin', '5000', '6500', '200', 'Blue', '10', '900000', 63),
(43, '170', 'Tiles', '1000', '1250', '120', 'red', '2', '117600', 65),
(44, '195', 'PVC Bathroom Cabinet', '4000', '4500', '75', 'blue', '5', '285000', 66),
(45, '195', 'PVC Bathroom Cabinet', '4000', '4500', '50', 'red', '2', '196000', 67),
(46, '215', 'Washdown Toilet Bathroom', '12000', '13000', '100', 'red', '5', '1140000', 68),
(47, '130', 'High Comot', '3000', '3800', '120', 'red', '0', '360000', 69),
(48, '100', 'Intelligent Toilet', '12500', '14500', '50', 'blue', '1', '618750', 70),
(49, '185', 'Ceramic', '20000', '22000', '100', 'red', '0', '2000000', 71),
(50, '145', 'French doors', '10000', '1250', '200', 'Black', '0', '2000000', 72);

-- --------------------------------------------------------

--
-- Table structure for table `purchasereturnquantities`
--

CREATE TABLE `purchasereturnquantities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `warehouse_name` varchar(255) NOT NULL,
  `warehouse_quantity` varchar(255) NOT NULL,
  `damage_quantity` varchar(255) NOT NULL,
  `purchasereturn_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchasereturnquantities`
--

INSERT INTO `purchasereturnquantities` (`id`, `warehouse_name`, `warehouse_quantity`, `damage_quantity`, `purchasereturn_id`, `created_at`, `updated_at`) VALUES
(1, 'Showroom', '20', '0', 11, '2022-01-30 22:11:39', '2022-01-30 23:20:15'),
(2, 'Warehouse', '5', '0', 11, '2022-01-30 22:11:39', '2022-01-30 22:11:39'),
(3, 'Showroom', '100', '2', 12, '2022-01-30 22:27:29', '2022-01-30 22:27:29'),
(4, 'Warehouse', '20', '1', 12, '2022-01-30 22:27:29', '2022-01-30 22:27:29');

-- --------------------------------------------------------

--
-- Table structure for table `purchasereturns`
--

CREATE TABLE `purchasereturns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `supplier_name` varchar(50) NOT NULL,
  `damage_note` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchasereturns`
--

INSERT INTO `purchasereturns` (`id`, `date`, `product_id`, `quantity`, `supplier_name`, `damage_note`) VALUES
(11, '2022-01-31', 7, '25', 'Rahim Khan', 'Return Back'),
(12, '2022-01-31', 9, '120', 'Kh Tasfik', 'No Expire');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `orderID` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `total_payment` varchar(50) NOT NULL,
  `due` varchar(50) NOT NULL,
  `payment_status` varchar(70) NOT NULL,
  `purchase_status` varchar(70) NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `orderID`, `date`, `total_payment`, `due`, `payment_status`, `purchase_status`, `supplier_id`, `created_at`, `updated_at`) VALUES
(62, '181021-616d11f3af0df', '2021-10-16', '100000', '90000', 'Due', 'Panding', 47, '2021-10-16 03:34:52', '2021-10-18 00:19:31'),
(63, '231121-619c6ec758b6f', '2021-10-14', '1076000', '100000', 'Due', 'Complete', 48, '2021-10-16 04:11:30', '2021-11-22 22:32:07'),
(65, '230122-61ecfe73ad181', '2022-01-23', '100000', '17600', 'Due', 'Complete', 45, '2022-01-23 01:06:27', '2022-01-23 01:06:27'),
(66, '230122-61ed03efc596e', '2022-01-23', '285000', '0', 'Paid', 'Panding', 51, '2022-01-23 01:29:51', '2022-01-23 01:29:51'),
(67, '230122-61ed44cd4e234', '2022-01-23', '2000000', '572000', 'Due', 'Complete', 51, '2022-01-23 06:06:37', '2022-01-23 06:06:37'),
(68, '230122-61ed455d746c2', '2022-01-24', '1000000', '140000', 'Due', 'Complete', 51, '2022-01-23 06:09:01', '2022-01-23 06:09:01'),
(69, '020222-61f9feb7a7a3b', '2022-02-02', '360000', '0', 'Paid', 'Complete', 45, '2022-02-01 21:47:03', '2022-02-01 21:47:03'),
(70, '100222-6204a3c54e7dd', '2022-02-10', '618000', '750', 'Paid', 'Complete', 52, '2022-02-09 23:33:57', '2022-02-09 23:33:57'),
(71, '160222-620d3746af4a7', '2022-02-16', '1000000', '1000000', 'Due', 'Complete', 47, '2022-02-16 16:41:26', '2022-02-16 16:41:26'),
(72, '210222-621324c82822d', '2022-02-21', '2000000', '0', 'Paid', 'Complete', 47, '2022-02-21 04:36:08', '2022-02-21 04:36:08'),
(73, '160522-62827377a49ce', '2022-05-16', '500', '500', 'Paid', 'Panding', 53, '2022-05-16 13:53:27', '2022-05-16 13:53:27'),
(74, '191022-634fb0e56bebf', '2022-10-03', '7000', '45800', 'Due', 'Complete', 48, '2022-10-19 06:10:13', '2022-10-19 06:10:13');

-- --------------------------------------------------------

--
-- Table structure for table `returns`
--

CREATE TABLE `returns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `orderdetails_id` bigint(20) UNSIGNED NOT NULL,
  `return_date` date NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(20, 'Super Admin', 'web', '2022-01-28 10:51:47', '2022-01-28 10:51:47'),
(21, 'Editors', 'web', '2022-01-28 10:54:39', '2022-01-28 10:54:39'),
(22, 'babu', 'web', '2022-06-28 05:49:52', '2022-06-28 05:49:52'),
(23, 'polok21', 'web', '2022-06-28 05:51:15', '2022-06-28 05:51:15');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(18, 20),
(18, 22),
(18, 23),
(19, 20),
(19, 22),
(19, 23),
(20, 20),
(20, 22),
(20, 23),
(21, 20),
(21, 22),
(21, 23),
(22, 20),
(22, 22),
(22, 23),
(23, 20),
(23, 21),
(23, 22),
(23, 23),
(24, 20),
(24, 22),
(24, 23),
(25, 20),
(25, 22),
(25, 23),
(26, 20),
(26, 22),
(26, 23),
(27, 20),
(27, 21),
(27, 22),
(27, 23),
(28, 20),
(28, 22),
(28, 23),
(29, 20),
(29, 22),
(29, 23),
(30, 20),
(30, 22),
(30, 23),
(31, 20),
(31, 21),
(31, 22),
(31, 23),
(32, 20),
(32, 22),
(32, 23),
(33, 20),
(33, 22),
(33, 23),
(34, 20),
(34, 22),
(34, 23),
(35, 20),
(35, 21),
(35, 22),
(35, 23),
(36, 20),
(36, 22),
(36, 23),
(37, 20),
(37, 22),
(37, 23),
(38, 20),
(38, 22),
(38, 23),
(39, 20),
(39, 21),
(39, 22),
(39, 23),
(40, 20),
(40, 22),
(40, 23),
(41, 20),
(41, 22),
(41, 23),
(42, 20),
(42, 22),
(42, 23),
(43, 20),
(43, 21),
(43, 22),
(43, 23),
(44, 20),
(44, 22),
(44, 23),
(45, 20),
(45, 22),
(45, 23),
(46, 20),
(46, 22),
(46, 23),
(47, 20),
(47, 21),
(47, 22),
(47, 23),
(48, 20),
(48, 22),
(48, 23),
(49, 20),
(49, 22),
(49, 23),
(50, 20),
(50, 22),
(50, 23),
(51, 20),
(51, 21),
(51, 22),
(51, 23),
(52, 20),
(52, 22),
(52, 23),
(53, 20),
(53, 22),
(53, 23),
(54, 20),
(54, 22),
(54, 23),
(55, 20),
(55, 22),
(55, 23),
(56, 20),
(56, 22),
(56, 23),
(57, 20),
(57, 22),
(57, 23),
(58, 20),
(58, 22),
(58, 23),
(59, 20),
(59, 21),
(59, 22),
(59, 23),
(60, 20),
(60, 22),
(60, 23),
(61, 20),
(61, 22),
(61, 23),
(62, 20),
(62, 22),
(62, 23),
(63, 20),
(63, 21),
(63, 22),
(63, 23),
(64, 20),
(64, 22),
(64, 23),
(65, 20),
(65, 22),
(65, 23),
(66, 20),
(66, 22),
(66, 23),
(67, 20),
(67, 21),
(67, 22),
(67, 23),
(68, 20),
(68, 22),
(68, 23),
(69, 20),
(69, 22),
(69, 23),
(70, 20),
(70, 22),
(70, 23),
(71, 20),
(71, 21),
(71, 22),
(71, 23),
(72, 20),
(72, 22),
(72, 23),
(73, 20),
(73, 22),
(73, 23),
(74, 20),
(74, 22),
(74, 23),
(75, 20),
(75, 22),
(75, 23),
(76, 20),
(76, 22),
(76, 23),
(77, 20),
(77, 21),
(77, 22),
(77, 23),
(78, 20),
(78, 21),
(78, 22),
(78, 23),
(79, 20),
(79, 21),
(79, 22),
(79, 23),
(80, 20),
(80, 21),
(80, 22),
(80, 23),
(81, 20),
(81, 21),
(81, 22),
(81, 23),
(82, 20),
(82, 21),
(82, 22),
(82, 23),
(83, 20),
(83, 21),
(83, 22),
(83, 23),
(84, 20),
(84, 21),
(84, 22),
(84, 23),
(85, 20),
(85, 21),
(85, 22),
(85, 23),
(86, 20),
(86, 21),
(86, 22),
(86, 23),
(87, 20),
(87, 21),
(87, 22),
(87, 23),
(88, 20),
(88, 22),
(88, 23),
(89, 20),
(89, 22),
(89, 23),
(90, 20),
(90, 22),
(90, 23),
(91, 20),
(91, 22),
(91, 23),
(92, 20),
(92, 22),
(92, 23),
(93, 20),
(93, 22),
(93, 23),
(94, 20),
(94, 22),
(94, 23),
(95, 20),
(95, 22),
(95, 23),
(96, 20),
(96, 22),
(96, 23);

-- --------------------------------------------------------

--
-- Table structure for table `sellreturnproducts`
--

CREATE TABLE `sellreturnproducts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `sell_price` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `return_quantity` varchar(255) NOT NULL,
  `replace_product` varchar(255) NOT NULL,
  `return_amount` varchar(255) NOT NULL,
  `subtotal_amount` varchar(255) NOT NULL,
  `sellreturn_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sellreturnproducts`
--

INSERT INTO `sellreturnproducts` (`id`, `product_name`, `sell_price`, `quantity`, `return_quantity`, `replace_product`, `return_amount`, `subtotal_amount`, `sellreturn_id`) VALUES
(5, 'PVC Bathroom Cabinet', '4500', '5', '1', '0', '4500', '22500', 4),
(6, 'Basin', '6500', '3', '1', '1', '0', '19500', 4);

-- --------------------------------------------------------

--
-- Table structure for table `sellreturns`
--

CREATE TABLE `sellreturns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `total_amount` varchar(255) NOT NULL,
  `received_amount` varchar(255) NOT NULL,
  `due_amount` varchar(255) NOT NULL,
  `total_return_amount` varchar(255) NOT NULL,
  `current_return_amount` varchar(255) NOT NULL,
  `damage_note` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sellreturns`
--

INSERT INTO `sellreturns` (`id`, `order_id`, `date`, `total_amount`, `received_amount`, `due_amount`, `total_return_amount`, `current_return_amount`, `damage_note`) VALUES
(4, 56, '2022-01-31', '42411', '42000', '411', '4500', '4089', 'return product and return amount');

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`id`, `customer_id`, `created_at`, `updated_at`) VALUES
(52, 1, '2021-12-03 11:12:01', '2021-12-03 11:12:01'),
(53, 2, '2021-12-25 22:38:11', '2021-12-25 22:38:11'),
(54, 5, '2021-12-25 23:37:18', '2021-12-25 23:37:18'),
(55, 5, '2021-12-25 23:43:52', '2021-12-25 23:43:52'),
(56, 4, '2021-12-28 01:21:12', '2021-12-28 01:21:12'),
(57, 4, '2022-01-29 12:03:55', '2022-01-29 12:03:55'),
(58, 4, '2022-01-29 12:33:47', '2022-01-29 12:33:47'),
(59, 5, '2022-01-29 21:50:14', '2022-01-29 21:50:14'),
(60, 5, '2022-02-01 03:00:19', '2022-02-01 03:00:19'),
(61, 5, '2022-02-01 03:02:12', '2022-02-01 03:02:12'),
(62, 5, '2022-02-01 03:07:11', '2022-02-01 03:07:11'),
(63, 1, '2022-02-02 05:12:54', '2022-02-02 05:12:54'),
(64, 1, '2022-02-11 23:10:19', '2022-02-11 23:10:19'),
(65, 2, '2022-02-15 13:17:24', '2022-02-15 13:17:24'),
(66, 6, '2022-02-21 04:38:47', '2022-02-21 04:38:47'),
(67, 6, '2022-03-14 12:35:56', '2022-03-14 12:35:56'),
(68, 1, '2022-03-14 12:36:56', '2022-03-14 12:36:56'),
(69, 1, '2022-03-14 12:37:35', '2022-03-14 12:37:35'),
(70, 5, '2022-03-20 06:38:54', '2022-03-20 06:38:54'),
(71, 2, '2022-03-23 04:38:36', '2022-03-23 04:38:36'),
(72, 1, '2022-06-28 06:29:10', '2022-06-28 06:29:10'),
(73, 2, '2023-01-17 04:17:49', '2023-01-17 04:17:49');

-- --------------------------------------------------------

--
-- Table structure for table `stockquantities`
--

CREATE TABLE `stockquantities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `storage_name` varchar(50) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `stock_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stockquantities`
--

INSERT INTO `stockquantities` (`id`, `storage_name`, `quantity`, `stock_id`) VALUES
(5, 'House', '10', 13),
(6, 'Store', '15', 13),
(7, 'Store', '150', 14),
(8, 'House', '50', 14),
(9, 'Store', '70', 15),
(10, 'House', '30', 15);

-- --------------------------------------------------------

--
-- Table structure for table `stockreturns`
--

CREATE TABLE `stockreturns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `expair_date` date NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `damage_quantity` varchar(255) NOT NULL,
  `damage_note` varchar(255) NOT NULL,
  `stockquantitie_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `purchaseproduct_id` bigint(20) UNSIGNED NOT NULL,
  `available_quantity` varchar(10) NOT NULL,
  `damage_quantity` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `date`, `purchaseproduct_id`, `available_quantity`, `damage_quantity`, `created_at`, `updated_at`) VALUES
(13, '2021-12-03', 38, '25', NULL, '2021-12-03 10:49:32', '2021-12-03 10:49:32'),
(14, '2021-12-03', 40, '200', NULL, '2021-12-03 10:50:01', '2021-12-03 10:50:01'),
(15, '2022-01-24', 46, '100', NULL, '2022-01-23 23:45:03', '2022-01-23 23:45:03');

-- --------------------------------------------------------

--
-- Table structure for table `supplieremails`
--

CREATE TABLE `supplieremails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `supplier_message` longtext NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supplieremails`
--

INSERT INTO `supplieremails` (`id`, `email`, `phone`, `subject`, `supplier_message`, `supplier_id`) VALUES
(4, 'tasfik1212@gmail.com', '01236547896', 'Inventory Management', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 45);

-- --------------------------------------------------------

--
-- Table structure for table `supplierproducts`
--

CREATE TABLE `supplierproducts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `products_id` varchar(255) NOT NULL,
  `product` longtext NOT NULL,
  `price` varchar(255) NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supplierproducts`
--

INSERT INTO `supplierproducts` (`id`, `products_id`, `product`, `price`, `supplier_id`, `updated_at`, `created_at`) VALUES
(43, '170', 'Tiles', '1000', 45, '2021-10-13 04:23:13', '2021-10-13 04:23:13'),
(44, '125', 'Vesin', '2500', 45, '2021-10-13 04:23:13', '2021-10-13 04:23:13'),
(45, '130', 'High Comot', '3000', 45, '2021-10-13 04:23:13', '2021-10-13 04:23:13'),
(48, '145', 'French doors', '10000', 47, '2021-10-13 04:56:51', '2021-10-13 04:56:51'),
(49, '155', 'French doors', '10000', 48, '2021-10-13 05:01:50', '2021-10-13 05:01:50'),
(50, '165', 'Kitchenware', '12000', 48, '2021-10-13 05:01:50', '2021-10-13 05:01:50'),
(51, '175', 'Basin', '5000', 48, '2021-10-13 05:01:50', '2021-10-13 05:01:50'),
(52, '185', 'Ceramic', '20000', 47, '2021-10-17 10:44:39', '2021-10-17 10:44:39'),
(56, '195', 'PVC Bathroom Cabinet', '4000', 51, '2022-01-23 07:24:10', '2022-01-23 07:24:10'),
(57, '205', 'Water Membrane Filtration', '5000', 51, '2022-01-23 07:24:10', '2022-01-23 07:24:10'),
(58, '215', 'Washdown Toilet Bathroom', '12000', 51, '2022-01-23 07:24:11', '2022-01-23 07:24:11'),
(59, '100', 'Intelligent Toilet', '12500', 52, '2022-02-10 05:06:53', '2022-02-10 05:06:53'),
(60, '150', 'Countertop top Basin', '5500', 52, '2022-02-10 05:06:53', '2022-02-10 05:06:53'),
(61, '300', 'Semi recessed Basin', '7500', 52, '2022-02-10 05:06:53', '2022-02-10 05:06:53'),
(62, '350', 'Semi-padestal Basin Pedestal Basin', '9500', 52, '2022-02-10 05:06:53', '2022-02-10 05:06:53'),
(63, '1', 'bulb', '20', 53, '2022-05-16 15:51:22', '2022-05-16 15:51:22'),
(64, '120', 'ffff', '150', 54, '2022-06-28 07:53:55', '2022-06-28 07:53:55');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `contact` varchar(12) NOT NULL,
  `address` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `email`, `designation`, `company_name`, `contact`, `address`, `created_at`, `updated_at`) VALUES
(45, 'Kh Tasfik', 'tasfik1212@gmail.com', 'Seller', 'RAK', '01236547896', 'Dhaka', '2021-10-12 22:23:11', '2021-10-12 22:23:11'),
(47, 'Rahim Khan', 'rahim@gmail.com', 'Seller', 'Vai Vai Ceramic', '01254789654', 'Dhaka', '2021-10-12 22:56:51', '2021-10-12 22:56:51'),
(48, 'Avesh Khan', 'avesh@gmail.com', 'Distributor', 'Hazi Store', '01456987458', 'Dhaka', '2021-10-12 23:01:50', '2021-10-12 23:01:50'),
(51, 'Tanvir Islam', 'tanvir@gmail.com', 'Salesman', 'Hanif Enterprise', '01245698745', 'Green road, Dhaka', '2022-01-23 01:24:10', '2022-01-23 01:24:10'),
(52, 'Md Rabbil Hasan', 'rabbile@gmail.com', 'Salesman', 'Rabbile Tiles And Ceramics', '01547854987', 'Mirpur, Dhaka', '2022-02-09 23:06:52', '2022-02-09 23:06:52'),
(53, 'supplier one', 'supone@gmail.com', 'ASM', 'circle', '01234567865', 'asdds', '2022-05-16 13:51:22', '2022-05-16 13:51:22'),
(54, 'Abdul Momin', 'momincse34@gmail.com', 'CEO', 'Kaizen IT Ltd.', '01934453979', '151/6 gazi tower panthapath signal-1205', '2022-06-28 05:53:55', '2022-06-28 05:53:55');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Kg', '2021-10-06 22:25:33', '2021-10-06 22:25:33'),
(3, 'Piece', '2021-10-12 22:35:32', '2021-10-12 22:35:32'),
(4, 'Set', '2021-10-12 22:37:43', '2021-10-12 22:37:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 1,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `contact`, `image`, `designation`, `address`, `is_admin`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Kaizen It Ltd', 'info@kaizenitbd.com', '$2y$10$4JA9ns18IC4Q1E.Z49okBeRms.aIKTey7dNVthiPhAe9u.tVXNyPS', '01934453979', 'kaizenit.png', 'Admin', '151/6, 2nd floor, Gazi Tower, Panthapath Dhaka-1205', 1, NULL, 'hm3p3Si6npUzK0Y5oog7wQek1oS2GgvkxNqnZjVjbP4WAJdWwegeKDeMFfJp', NULL, NULL),
(20, 'Mr Rakib Islam', 'rakib12@gmail.com', '$2y$10$zH0vT7EHlzAUGmk2d272vOJRPFjJR62YGMV9sVism7EAbVrw0DNp2', '01254789654', 'Ciclograma.jpg', 'Salesman', 'Dhaka', 1, NULL, NULL, '2022-01-27 12:12:07', '2022-01-27 12:12:07'),
(21, 'Salehin', 'salehin@gmail.com', '$2y$10$Zp59t25BmykD90Hhoy/c8u95.PLbmEGzMDhjvd9LEBhzidp1w/xv2', '01321458965', 'Close-Coupled-Toilet.jpg', 'Manager', 'Dhaka', 1, NULL, NULL, '2022-01-28 08:53:06', '2022-01-28 08:53:06');

-- --------------------------------------------------------

--
-- Table structure for table `warehouses`
--

CREATE TABLE `warehouses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `warehouse_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `warehouses`
--

INSERT INTO `warehouses` (`id`, `warehouse_name`, `created_at`, `updated_at`) VALUES
(1, 'Hazi Store', '2022-01-24 01:08:30', '2022-01-24 01:08:30'),
(3, 'Warehouse', '2022-01-24 01:10:30', '2022-01-24 01:10:30'),
(4, 'Showroom', '2022-01-27 02:22:22', '2022-01-27 02:22:22');

-- --------------------------------------------------------

--
-- Table structure for table `warehousestockqties`
--

CREATE TABLE `warehousestockqties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `warehouse_name` varchar(255) NOT NULL,
  `warehouse_stockqty` varchar(255) NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `warehousestockqties`
--

INSERT INTO `warehousestockqties` (`id`, `warehouse_name`, `warehouse_stockqty`, `product_id`, `created_at`, `updated_at`) VALUES
(8, 'Showroom', '50', 7, '2022-01-27 02:51:20', '2022-06-28 05:48:32'),
(9, 'Warehouse', '5', 7, '2022-01-27 02:51:20', '2022-01-27 02:51:20'),
(10, 'Showroom', '200', 8, '2022-01-27 02:52:16', '2022-01-27 02:52:16'),
(11, 'Showroom', '100', 9, '2022-01-27 02:53:12', '2022-01-27 02:53:12'),
(12, 'Warehouse', '20', 9, '2022-01-27 02:53:12', '2022-01-27 02:53:12'),
(13, 'Showroom', '70', 10, '2022-01-27 02:53:52', '2022-01-27 02:53:52'),
(14, 'Warehouse', '5', 10, '2022-01-27 02:53:52', '2022-01-27 02:53:52'),
(15, 'Showroom', '85', 11, '2022-01-27 02:54:39', '2022-01-27 02:54:39'),
(16, 'Warehouse', '15', 11, '2022-01-27 02:54:39', '2022-01-27 02:54:39'),
(18, 'Showroom', '30', 13, '2022-02-01 21:38:35', '2022-02-01 21:38:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD UNIQUE KEY `admins_username_unique` (`username`);

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
-- Indexes for table `companaysettings`
--
ALTER TABLE `companaysettings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customeremails`
--
ALTER TABLE `customeremails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customeremails_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fundtransfers`
--
ALTER TABLE `fundtransfers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fundtransfers_account_id_foreign` (`account_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orderdetails_order_id_foreign` (`order_id`),
  ADD KEY `orderdetails_ibfk_1` (`product_id`),
  ADD KEY `orderdetails_ibfk_2` (`warehousestockqty_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_paymentmethod_id_foreign` (`paymentmethod`),
  ADD KEY `orders_shipping_id_foreign` (`shipping_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `paymentmethods`
--
ALTER TABLE `paymentmethods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

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
  ADD KEY `products_purchaseproduct_id_foreign` (`purchaseproduct_id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_unit_id_foreign` (`unit_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`),
  ADD KEY `warehouse_id` (`warehouse_id`);

--
-- Indexes for table `purchasepandings`
--
ALTER TABLE `purchasepandings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchasepandings_purchase_id_foreign` (`purchase_id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `purchaseproducts`
--
ALTER TABLE `purchaseproducts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchaseproducts_purchase_id_foreign` (`purchase_id`);

--
-- Indexes for table `purchasereturnquantities`
--
ALTER TABLE `purchasereturnquantities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchasereturnquantities_purchasereturn_id_foreign` (`purchasereturn_id`);

--
-- Indexes for table `purchasereturns`
--
ALTER TABLE `purchasereturns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchasereturns_ibfk_1` (`product_id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchases_supplier_id_foreign` (`supplier_id`);

--
-- Indexes for table `returns`
--
ALTER TABLE `returns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `returns_orderdetails_id_foreign` (`orderdetails_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sellreturnproducts`
--
ALTER TABLE `sellreturnproducts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sellreturnproducts_sellreturn_id_foreign` (`sellreturn_id`);

--
-- Indexes for table `sellreturns`
--
ALTER TABLE `sellreturns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sellreturns_order_id_foreign` (`order_id`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shippings_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `stockquantities`
--
ALTER TABLE `stockquantities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stockquantities_stock_id_foreign` (`stock_id`);

--
-- Indexes for table `stockreturns`
--
ALTER TABLE `stockreturns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stockreturns_stockquantitie_id_foreign` (`stockquantitie_id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stocks_ibfk_1` (`purchaseproduct_id`);

--
-- Indexes for table `supplieremails`
--
ALTER TABLE `supplieremails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supplieremails_supplier_id_foreign` (`supplier_id`);

--
-- Indexes for table `supplierproducts`
--
ALTER TABLE `supplierproducts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `warehouses`
--
ALTER TABLE `warehouses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warehousestockqties`
--
ALTER TABLE `warehousestockqties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `warehousestockqties_product_id_foreign` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `companaysettings`
--
ALTER TABLE `companaysettings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customeremails`
--
ALTER TABLE `customeremails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fundtransfers`
--
ALTER TABLE `fundtransfers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `paymentmethods`
--
ALTER TABLE `paymentmethods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `purchasepandings`
--
ALTER TABLE `purchasepandings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `purchaseproducts`
--
ALTER TABLE `purchaseproducts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `purchasereturnquantities`
--
ALTER TABLE `purchasereturnquantities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `purchasereturns`
--
ALTER TABLE `purchasereturns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `returns`
--
ALTER TABLE `returns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `sellreturnproducts`
--
ALTER TABLE `sellreturnproducts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sellreturns`
--
ALTER TABLE `sellreturns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `stockquantities`
--
ALTER TABLE `stockquantities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `stockreturns`
--
ALTER TABLE `stockreturns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `supplieremails`
--
ALTER TABLE `supplieremails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `supplierproducts`
--
ALTER TABLE `supplierproducts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `warehouses`
--
ALTER TABLE `warehouses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `warehousestockqties`
--
ALTER TABLE `warehousestockqties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customeremails`
--
ALTER TABLE `customeremails`
  ADD CONSTRAINT `customeremails_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `fundtransfers`
--
ALTER TABLE `fundtransfers`
  ADD CONSTRAINT `fundtransfers_account_id_foreign` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `orderdetails_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orderdetails_ibfk_2` FOREIGN KEY (`warehousestockqty_id`) REFERENCES `warehousestockqties` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orderdetails_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_shipping_id_foreign` FOREIGN KEY (`shipping_id`) REFERENCES `shippings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_purchaseproduct_id_foreign` FOREIGN KEY (`purchaseproduct_id`) REFERENCES `purchaseproducts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `purchasepandings`
--
ALTER TABLE `purchasepandings`
  ADD CONSTRAINT `purchasepandings_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `purchasepandings_purchase_id_foreign` FOREIGN KEY (`purchase_id`) REFERENCES `purchases` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `purchaseproducts`
--
ALTER TABLE `purchaseproducts`
  ADD CONSTRAINT `purchaseproducts_purchase_id_foreign` FOREIGN KEY (`purchase_id`) REFERENCES `purchases` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `purchasereturnquantities`
--
ALTER TABLE `purchasereturnquantities`
  ADD CONSTRAINT `purchasereturnquantities_purchasereturn_id_foreign` FOREIGN KEY (`purchasereturn_id`) REFERENCES `purchasereturns` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `purchasereturns`
--
ALTER TABLE `purchasereturns`
  ADD CONSTRAINT `purchasereturns_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`);

--
-- Constraints for table `returns`
--
ALTER TABLE `returns`
  ADD CONSTRAINT `returns_orderdetails_id_foreign` FOREIGN KEY (`orderdetails_id`) REFERENCES `orderdetails` (`id`);

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sellreturnproducts`
--
ALTER TABLE `sellreturnproducts`
  ADD CONSTRAINT `sellreturnproducts_sellreturn_id_foreign` FOREIGN KEY (`sellreturn_id`) REFERENCES `sellreturns` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sellreturns`
--
ALTER TABLE `sellreturns`
  ADD CONSTRAINT `sellreturns_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `shippings`
--
ALTER TABLE `shippings`
  ADD CONSTRAINT `shippings_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stockquantities`
--
ALTER TABLE `stockquantities`
  ADD CONSTRAINT `stockquantities_stock_id_foreign` FOREIGN KEY (`stock_id`) REFERENCES `stocks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stockreturns`
--
ALTER TABLE `stockreturns`
  ADD CONSTRAINT `stockreturns_stockquantitie_id_foreign` FOREIGN KEY (`stockquantitie_id`) REFERENCES `stockquantities` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `stocks`
--
ALTER TABLE `stocks`
  ADD CONSTRAINT `stocks_ibfk_1` FOREIGN KEY (`purchaseproduct_id`) REFERENCES `purchaseproducts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `supplieremails`
--
ALTER TABLE `supplieremails`
  ADD CONSTRAINT `supplieremails_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `supplierproducts`
--
ALTER TABLE `supplierproducts`
  ADD CONSTRAINT `supplierproducts_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `warehousestockqties`
--
ALTER TABLE `warehousestockqties`
  ADD CONSTRAINT `warehousestockqties_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
