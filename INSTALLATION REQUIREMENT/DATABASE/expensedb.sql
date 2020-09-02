-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2020 at 04:31 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `expensedb`
--

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
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

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
-- Table structure for table `tblec`
--

CREATE TABLE `tblec` (
  `iid` int(11) NOT NULL,
  `displaynameec` varchar(645) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descriptionec` varchar(645) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `datecreated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblec`
--

INSERT INTO `tblec` (`iid`, `displaynameec`, `descriptionec`, `datecreated`) VALUES
(1, 'sdg', NULL, '2020-09-02 12:52:06'),
(2, 'qwt', 'qwtqwtwqt', '2020-09-02 12:57:56'),
(3, 'qwtqwt', 'qwtqwtwqtrqw', '2020-09-02 12:58:00'),
(4, 'qwtqwtad24', 'qwtqwtwqtrqw41241', '2020-09-02 12:58:09');

-- --------------------------------------------------------

--
-- Table structure for table `tblrole`
--

CREATE TABLE `tblrole` (
  `iid` int(11) NOT NULL,
  `displayname` varchar(645) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(745) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `datecreated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblrole`
--

INSERT INTO `tblrole` (`iid`, `displayname`, `description`, `datecreated`) VALUES
(1, 'e', 'ee', '2020-09-01 13:36:43'),
(2, '11', '22', '2020-09-01 13:36:43'),
(3, '111', '222', '2020-09-01 13:36:43'),
(4, 'wqr', 'qwr', '2020-09-01 13:36:43'),
(5, 'wqr', 'wqrqwrqw', '2020-09-01 13:36:43'),
(6, 'wqr', 'wqrqwrqw', '2020-09-01 13:36:43'),
(7, 'mark', 'wet', '2020-09-01 13:36:43'),
(8, 'ert', 'ertreter', '2020-09-01 13:36:43'),
(9, 'gg', 'ggg', '2020-09-01 13:36:43'),
(10, 'gg1', 'ggg1', '2020-09-01 13:36:43'),
(11, 'r', 'rer', '2020-09-01 13:41:44'),
(12, 'h', 'hh', '2020-09-01 15:33:48'),
(13, 'ert', 'ertrt', '2020-09-02 10:39:52'),
(14, 'wet', 'wetewt', '2020-09-02 10:41:54'),
(15, 'tew', 'ewtewt', '2020-09-02 11:11:16'),
(16, 'wet', 'wetewt', '2020-09-02 12:15:12');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `iid` int(11) NOT NULL,
  `name` varchar(645) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emailaddress` varchar(645) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `urole` varchar(465) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `datecreated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`iid`, `name`, `emailaddress`, `urole`, `datecreated`) VALUES
(1, 'ery', NULL, NULL, '2020-09-02 11:20:58'),
(2, 'Mark Dy', 'mark@gmail.com', 'User', '2020-09-02 12:04:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `user_type`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mark Dy', 'mark@gmail.com', '0', NULL, '$2y$10$zccDhhVn1iDReYShtG70suLNBIHUn9Hidy4DIf9Z.M/gN/LlNO/OO', NULL, '2020-08-28 13:51:54', '2020-08-28 13:51:54'),
(12, 'Mark Dy', 'markadmin@gmail.com', '1', NULL, '$2y$10$rhR/e.kCVLmwSi2PB.LeX.PQuVd6voyUjD2BdQV/zepjZPltWdtYu', 'heCMypo2DJWCaQ5PptS3dn8zxC3mNk9KBdy0LHdO4rh6SKNCVXhONZoxKwBx', '2020-08-28 15:04:37', '2020-08-28 15:04:37');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `tblec`
--
ALTER TABLE `tblec`
  ADD PRIMARY KEY (`iid`);

--
-- Indexes for table `tblrole`
--
ALTER TABLE `tblrole`
  ADD PRIMARY KEY (`iid`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`iid`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblec`
--
ALTER TABLE `tblec`
  MODIFY `iid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblrole`
--
ALTER TABLE `tblrole`
  MODIFY `iid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `iid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
