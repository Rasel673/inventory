-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2020 at 06:24 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `advancesalaries`
--

CREATE TABLE `advancesalaries` (
  `id` int(10) UNSIGNED NOT NULL,
  `emp_id` int(11) NOT NULL,
  `month` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `advance_salary` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advancesalaries`
--

INSERT INTO `advancesalaries` (`id`, `emp_id`, `month`, `advance_salary`, `year`, `created_at`, `updated_at`) VALUES
(1, 6, 'February', '12000', '2020', '2020-01-26 04:23:21', NULL),
(5, 8, 'March', '12000', '2020', '2020-02-02 06:21:01', NULL),
(6, 9, 'February', '12000', '2020', '2020-02-02 06:28:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` int(10) UNSIGNED NOT NULL,
  `emp_id` int(11) NOT NULL,
  `att_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `month` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `att_year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attendance` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edit_date` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `emp_id`, `att_date`, `month`, `att_year`, `attendance`, `edit_date`, `created_at`, `updated_at`) VALUES
(3, 6, '05/02/20', 'February', '2020', 'Present', '05_02_20', '2020-02-05 07:34:25', NULL),
(4, 9, '05/02/20', 'February', '2020', 'Present', '05_02_20', '2020-02-05 07:34:25', NULL),
(5, 6, '14/02/20', 'February', '2020', 'Absent', '14_02_20', '2020-02-14 05:29:23', NULL),
(6, 9, '14/02/20', 'February', '2020', 'Present', '14_02_20', '2020-02-14 05:29:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Mitsubshi', NULL, NULL),
(3, 'Joyota', NULL, NULL),
(4, 'Corrolla', NULL, NULL),
(5, 'BMW', NULL, NULL),
(6, 'Marcedes', NULL, NULL),
(7, 'Bike', NULL, NULL),
(8, 'Cycle', NULL, NULL),
(9, 'vehicle', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shopname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_holder` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `phone`, `address`, `shopname`, `photo`, `account_holder`, `account_number`, `bank_name`, `branch_name`, `city`, `created_at`, `updated_at`) VALUES
(3, 'Amin', 'rasel@gmail.com', '0894797888', 'Adabor , Dhaka', 'Vai store', 'public/customers/biEvH.jpg', 'Rasel', '0123', 'City Bank', 'Adabor', 'Dhaka', '2020-01-22 17:20:15', NULL),
(5, 'Razib', 'hafizur@gmail.com', '047937957', 'Adabor , Dhaka', 'Razib store', 'public/customers/htE6y.jpg', 'razib', '4793047', 'City Bank', 'Adabor', 'Dhaka', '2020-01-24 06:10:35', NULL),
(7, 'Akram', 'akram@gamil.com', '6378762893', 'Adabor , Dhaka', 'akkas store', 'public/customers/Anf95.jpg', 'akram', '3465234497', 'City Bank', 'Adabor', NULL, '2020-02-10 05:54:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `experience` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nid_no` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vacation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `email`, `phone`, `address`, `experience`, `photo`, `nid_no`, `salary`, `vacation`, `city`, `created_at`, `updated_at`) VALUES
(6, 'Rasel Amin', 'basel@gmail.com', '01234566', 'Adabor , Dhaka', '1 year', 'public/employee/BYXSC.jpg', '12345567890', '50000', '10', 'Dhaka', '2020-01-20 05:11:08', NULL),
(9, 'Akash Ali', 'hafizur@gmail.com', '0459893539', 'Adabor , Dhaka', '1 year', 'public/employee/57j2N.jpg', '74570939', '50000', '10', 'Dhaka', '2020-02-02 06:20:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(10) UNSIGNED NOT NULL,
  `details` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `month` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `details`, `amount`, `date`, `month`, `year`, `created_at`, `updated_at`) VALUES
(1, '3 laptop', '80000', '02/02/20', 'February', '2020', '2020-02-02 17:55:03', NULL);

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
(3, '2019_12_24_055739_create_posts_table', 2),
(8, '2020_01_13_075721_create_employees_table', 3),
(9, '2020_01_22_062305_create_customers_table', 4),
(10, '2020_01_24_061932_create_supliers_table', 5),
(11, '2020_01_25_101411_create_advancesalaries_table', 6),
(12, '2020_01_29_103623_create_categories_table', 7),
(13, '2020_01_30_051717_create_products_table', 8),
(14, '2020_02_02_170103_create_expenses_table', 9),
(15, '2020_02_03_162733_create_attendances_table', 10),
(16, '2020_02_13_053808_create_orders_table', 11),
(17, '2020_02_13_054327_create_orderdetails_table', 11),
(18, '2020_02_13_061431_create_product_orders_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unitcost` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`id`, `order_id`, `product_id`, `quantity`, `unitcost`, `total`, `created_at`, `updated_at`) VALUES
(9, 3, 3, '2', '230000', '556600', NULL, NULL),
(10, 3, 4, '3', '3000000', '10890000', NULL, NULL),
(11, 3, 5, '3', '3000000', '10890000', NULL, NULL),
(12, 3, 6, '1', '3000000', '3630000', NULL, NULL),
(13, 6, 3, '1', '230000', '278300', NULL, NULL),
(14, 6, 6, '1', '3000000', '3630000', NULL, NULL),
(15, 6, 4, '1', '3000000', '3630000', NULL, NULL),
(16, 6, 5, '1', '3000000', '3630000', NULL, NULL),
(17, 7, 4, '1', '3000000', '3630000', NULL, NULL),
(18, 7, 5, '1', '3000000', '3630000', NULL, NULL),
(19, 8, 5, '3', '3000000', '10890000', NULL, NULL),
(20, 8, 4, '1', '3000000', '3630000', NULL, NULL),
(21, 8, 6, '3', '3000000', '10890000', NULL, NULL),
(22, 8, 3, '1', '230000', '278300', NULL, NULL),
(23, 9, 3, '2', '230000', '556600', NULL, NULL),
(24, 9, 4, '2', '3000000', '7260000', NULL, NULL),
(25, 9, 5, '2', '3000000', '7260000', NULL, NULL);

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_id` int(11) NOT NULL,
  `sup_id` int(11) NOT NULL,
  `product_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_storage` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_route` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buy_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expire_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buying_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selling_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `cat_id`, `sup_id`, `product_code`, `product_storage`, `product_route`, `product_image`, `buy_date`, `expire_date`, `buying_price`, `selling_price`, `created_at`, `updated_at`) VALUES
(1, 'X-corrolla', 4, 4, '01', 'A', 'H1', 'public/products/pkMB4.jpg', '2020-01-30', '2025-01-30', '200000', '200000', '2020-01-30 06:27:58', NULL),
(3, 'corrolla', 4, 4, '2', 'B', 'H2', 'public/products/cov 3.jpg', '2020-01-30', '2025-01-30', '220000', '230000', '2020-02-06 01:59:10', '2020-02-06 01:59:10'),
(4, 'FZS-5  Bike', 7, 4, '3', 'C', 'H3', 'public/products/vGcyo.jpg', '2020-02-07', '2030-02-07', '200000', '3000000', '2020-02-07 05:18:09', NULL),
(5, 'HayaBusa', 7, 3, '04', 'C', 'H3', 'public/products/V9v4O.jpg', '2020-02-07', '2020-02-07', '200000', '3000000', '2020-02-07 05:20:40', NULL),
(6, 'yamaha', 7, 4, '05', 'C', 'H2', 'public/products/ZnbHy.jpg', '2019-02-07', '2029-02-07', '200000', '3000000', '2020-02-07 05:21:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_orders`
--

CREATE TABLE `product_orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_products` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_total` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pay` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `due` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_orders`
--

INSERT INTO `product_orders` (`id`, `customer_id`, `order_date`, `order_status`, `total_products`, `sub_total`, `vat`, `total`, `payment_status`, `pay`, `due`, `created_at`, `updated_at`) VALUES
(3, 7, '13/02/20', 'success', '9', '21,460,000.00', '4,506,600.00', '25,966,600.00', 'HandCash', '25966000', '600', NULL, NULL),
(6, 5, '13/02/20', 'success', '4', '9,230,000.00', '1,938,300.00', '11,168,300.00', 'HandCash', '11168000', '300', NULL, NULL),
(7, 7, '13/02/20', 'success', '2', '6,000,000.00', '1,260,000.00', '7,260,000.00', 'HandCash', '7260000', '0', NULL, NULL),
(8, 5, '14/02/20', 'success', '8', '21,230,000.00', '4,458,300.00', '25,688,300.00', 'HandCash', '25688000', '300', NULL, NULL),
(9, 7, '16/02/20', 'pending', '6', '12,460,000.00', '2,616,600.00', '15,076,600.00', 'HandCash', '15076000', '600', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `supliers`
--

CREATE TABLE `supliers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shopname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_holder` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supliers`
--

INSERT INTO `supliers` (`id`, `name`, `email`, `phone`, `address`, `shopname`, `photo`, `account_holder`, `type`, `account_number`, `bank_name`, `branch_name`, `city`, `created_at`, `updated_at`) VALUES
(3, 'Rasel', 'rasel@gmail.com', '497435-78', 'Adabor , Dhaka', 'Vai store', 'public/supliers/TEZ2Z.jpg', 'Rasel', 'distributor', '42970539', 'City Bank', 'Adabor', 'Dhaka', '2020-01-29 11:01:37', NULL),
(4, 'Ali Hossain', 'Ali@gmail.com', '01725086474', 'Adabor , Dhaka', 'Ali', 'public/supliers/OAWSw.jpg', 'Ali', 'wholesaler', '343974389', 'City Bank', 'Adabor', 'Dhaka', '2020-02-02 06:56:47', NULL);

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
(1, 'Rasel', 'rasel@gmail.com', NULL, '$2y$10$l3aw.kQ0Kw90o/ordbP7ge1deSHAAf8Qgw6soTWUqzPkMI5vHHeQ6', '9m30SpCPn93AVOxIi75lsn9vpPxFEueau3Uv4px3RT43S1Rey3b3cNcwETJT', '2019-12-10 05:18:03', '2019-12-10 05:18:03'),
(2, 'Amin', 'raselamin673@gmail.com', '2019-12-22 02:03:59', '$2y$10$OQuYV7RQW/SJfVzJGm.sx.rqxh6PRBHAla3sEyN1rnWmgvK3qIXZ2', 'mm5kJW2WVUVDPSbhzMmCxHlYNmvbH9ApLjIiW7gCK4AeIxL72LDnjD4HnbjZ', '2019-12-22 01:24:13', '2019-12-22 02:03:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advancesalaries`
--
ALTER TABLE `advancesalaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_orders`
--
ALTER TABLE `product_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supliers`
--
ALTER TABLE `supliers`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `advancesalaries`
--
ALTER TABLE `advancesalaries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_orders`
--
ALTER TABLE `product_orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `supliers`
--
ALTER TABLE `supliers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
