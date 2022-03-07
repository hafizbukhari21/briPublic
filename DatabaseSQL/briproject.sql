-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2022 at 05:20 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `briproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE `divisi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_divisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`id`, `nama_divisi`) VALUES
(1, 'Management'),
(2, 'Regional Decision Support Team '),
(3, 'Regional human capital bussiness partner department'),
(4, 'Regional consumer loan factory team'),
(5, 'Regional legal team'),
(6, 'Micro bussiness department '),
(7, 'BRILINK department '),
(8, 'Ultra micro bussiness, social entrepreneurship & incubation department'),
(9, 'Small Bussiness Department'),
(10, 'Regional transaction banking department'),
(11, 'Medium bussiness department'),
(12, 'Consumer bussiness department'),
(13, 'Mass funding department'),
(14, 'Retail payment & card department'),
(15, 'Logistic & general affair department'),
(16, 'Operation, network & service department'),
(17, 'Information technology & echannel department '),
(18, 'Credit operation department'),
(19, 'Risk management & compliance team'),
(20, 'Credit Risk Analyst team'),
(21, 'Regional credit restructuring & recovery team');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idUser` bigint(20) UNSIGNED NOT NULL,
  `messageLog` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `idUser`, `messageLog`, `created_at`, `updated_at`) VALUES
(13, 105, 'Berhasil melakukan login', '2021-12-28 14:39:47', '2021-12-28 14:39:47'),
(25, 105, 'Berhasil melakukan login', '2021-12-29 02:24:33', '2021-12-29 02:24:33'),
(26, 105, 'Berhasil melakukan login', '2021-12-29 02:38:30', '2021-12-29 02:38:30'),
(27, 105, 'Berhasil melakukan login', '2021-12-29 02:38:43', '2021-12-29 02:38:43'),
(30, 106, 'Berhasil melakukan login', '2021-12-29 02:41:07', '2021-12-29 02:41:07'),
(35, 106, 'Berhasil melakukan login', '2021-12-29 08:22:56', '2021-12-29 08:22:56'),
(36, 111, 'Berhasil melakukan login', '2021-12-29 08:31:32', '2021-12-29 08:31:32'),
(39, 106, 'Berhasil melakukan login', '2021-12-29 08:33:52', '2021-12-29 08:33:52'),
(40, 111, 'Berhasil melakukan login', '2021-12-29 08:34:12', '2021-12-29 08:34:12'),
(41, 106, 'Berhasil melakukan login', '2021-12-29 08:34:25', '2021-12-29 08:34:25'),
(42, 111, 'Berhasil melakukan login', '2021-12-29 08:34:45', '2021-12-29 08:34:45'),
(44, 106, 'Berhasil melakukan login', '2021-12-29 08:38:16', '2021-12-29 08:38:16'),
(45, 111, 'Berhasil melakukan login', '2021-12-29 08:38:32', '2021-12-29 08:38:32'),
(46, 120, 'Berhasil melakukan login', '2021-12-29 09:13:10', '2021-12-29 09:13:10'),
(47, 106, 'Berhasil melakukan login', '2021-12-29 09:20:17', '2021-12-29 09:20:17'),
(48, 120, 'Berhasil melakukan login', '2021-12-29 09:23:04', '2021-12-29 09:23:04'),
(49, 106, 'Berhasil melakukan login', '2021-12-29 09:33:50', '2021-12-29 09:33:50'),
(51, 137, 'Berhasil melakukan login', '2021-12-29 09:35:30', '2021-12-29 09:35:30'),
(52, 105, 'Berhasil melakukan login', '2021-12-29 09:50:39', '2021-12-29 09:50:39'),
(55, 105, 'Berhasil melakukan login', '2021-12-29 09:52:42', '2021-12-29 09:52:42'),
(59, 140, 'Berhasil melakukan login', '2022-01-03 11:17:29', '2022-01-03 11:17:29'),
(60, 140, 'Berhasil melakukan login', '2022-01-03 11:35:22', '2022-01-03 11:35:22'),
(61, 144, 'Berhasil melakukan login', '2022-01-03 11:54:58', '2022-01-03 11:54:58'),
(62, 144, 'Berhasil melakukan login', '2022-01-03 13:35:00', '2022-01-03 13:35:00'),
(63, 143, 'Berhasil melakukan login', '2022-01-03 13:35:51', '2022-01-03 13:35:51'),
(64, 144, 'Berhasil melakukan login', '2022-01-03 13:38:28', '2022-01-03 13:38:28'),
(65, 144, 'Berhasil melakukan login', '2022-01-03 13:42:29', '2022-01-03 13:42:29'),
(66, 143, 'Berhasil melakukan login', '2022-01-03 13:43:47', '2022-01-03 13:43:47'),
(67, 142, 'Berhasil melakukan login', '2022-01-03 13:46:00', '2022-01-03 13:46:00'),
(68, 141, 'Berhasil melakukan login', '2022-01-03 13:48:15', '2022-01-03 13:48:15'),
(69, 140, 'Berhasil melakukan login', '2022-01-03 13:50:01', '2022-01-03 13:50:01'),
(70, 141, 'Berhasil melakukan login', '2022-01-03 13:52:28', '2022-01-03 13:52:28'),
(71, 140, 'Berhasil melakukan login', '2022-01-03 13:53:33', '2022-01-03 13:53:33'),
(72, 142, 'Berhasil melakukan login', '2022-01-03 13:54:22', '2022-01-03 13:54:22'),
(73, 143, 'Berhasil melakukan login', '2022-01-03 13:55:15', '2022-01-03 13:55:15'),
(74, 143, 'Berhasil melakukan login', '2022-01-03 13:57:02', '2022-01-03 13:57:02'),
(75, 142, 'Berhasil melakukan login', '2022-01-03 13:57:45', '2022-01-03 13:57:45'),
(76, 140, 'Berhasil melakukan login', '2022-01-03 16:30:15', '2022-01-03 16:30:15'),
(77, 141, 'Berhasil melakukan login', '2022-01-03 16:32:32', '2022-01-03 16:32:32'),
(78, 144, 'Berhasil melakukan login', '2022-01-03 16:33:35', '2022-01-03 16:33:35'),
(79, 143, 'Berhasil melakukan login', '2022-01-03 16:34:12', '2022-01-03 16:34:12'),
(80, 142, 'Berhasil melakukan login', '2022-01-03 16:35:19', '2022-01-03 16:35:19'),
(81, 144, 'Berhasil melakukan login', '2022-01-03 18:07:32', '2022-01-03 18:07:32'),
(82, 143, 'Berhasil melakukan login', '2022-01-03 18:08:54', '2022-01-03 18:08:54'),
(83, 140, 'Berhasil melakukan login', '2022-01-03 18:18:59', '2022-01-03 18:18:59'),
(84, 144, 'Berhasil melakukan login', '2022-01-03 18:40:19', '2022-01-03 18:40:19'),
(85, 143, 'Berhasil melakukan login', '2022-01-03 18:44:46', '2022-01-03 18:44:46'),
(86, 140, 'Berhasil melakukan login', '2022-01-03 18:49:18', '2022-01-03 18:49:18'),
(87, 140, 'Berhasil melakukan login', '2022-01-03 18:49:26', '2022-01-03 18:49:26'),
(88, 139, 'Berhasil melakukan login', '2022-01-03 18:52:41', '2022-01-03 18:52:41'),
(89, 141, 'Berhasil melakukan login', '2022-01-03 18:55:03', '2022-01-03 18:55:03'),
(90, 142, 'Berhasil melakukan login', '2022-01-03 18:57:44', '2022-01-03 18:57:44'),
(91, 144, 'Berhasil melakukan login', '2022-01-03 19:17:16', '2022-01-03 19:17:16'),
(92, 140, 'Berhasil melakukan login', '2022-01-04 10:47:20', '2022-01-04 10:47:20'),
(93, 141, 'Berhasil melakukan login', '2022-01-04 10:48:40', '2022-01-04 10:48:40'),
(94, 144, 'Berhasil melakukan login', '2022-01-04 10:49:53', '2022-01-04 10:49:53'),
(95, 144, 'Berhasil melakukan login', '2022-01-04 10:52:36', '2022-01-04 10:52:36'),
(96, 144, 'Berhasil melakukan login', '2022-01-04 10:54:39', '2022-01-04 10:54:39'),
(97, 139, 'Berhasil melakukan login', '2022-01-04 17:11:56', '2022-01-04 17:11:56'),
(98, 140, 'Berhasil melakukan login', '2022-01-04 17:20:33', '2022-01-04 17:20:33'),
(99, 139, 'Berhasil melakukan login', '2022-01-04 17:31:39', '2022-01-04 17:31:39'),
(100, 140, 'Berhasil melakukan login', '2022-01-04 22:13:33', '2022-01-04 22:13:33'),
(101, 144, 'Berhasil melakukan login', '2022-01-04 22:15:18', '2022-01-04 22:15:18'),
(102, 146, 'Berhasil melakukan login', '2022-01-05 09:46:18', '2022-01-05 09:46:18'),
(103, 144, 'Berhasil melakukan login', '2022-01-05 10:22:54', '2022-01-05 10:22:54'),
(104, 139, 'Berhasil melakukan login', '2022-01-05 10:49:31', '2022-01-05 10:49:31'),
(105, 144, 'Berhasil melakukan login', '2022-01-05 17:00:32', '2022-01-05 17:00:32'),
(106, 143, 'Berhasil melakukan login', '2022-01-05 17:04:36', '2022-01-05 17:04:36'),
(107, 140, 'Berhasil melakukan login', '2022-01-05 17:05:01', '2022-01-05 17:05:01'),
(108, 140, 'Berhasil melakukan login', '2022-01-05 19:35:53', '2022-01-05 19:35:53'),
(109, 144, 'Berhasil melakukan login', '2022-01-05 19:40:56', '2022-01-05 19:40:56'),
(110, 140, 'Berhasil melakukan login', '2022-01-05 20:37:19', '2022-01-05 20:37:19'),
(111, 144, 'Berhasil melakukan login', '2022-01-05 20:38:45', '2022-01-05 20:38:45'),
(112, 140, 'Berhasil melakukan login', '2022-01-05 20:39:47', '2022-01-05 20:39:47'),
(113, 140, 'Berhasil melakukan login', '2022-01-06 08:09:26', '2022-01-06 08:09:26'),
(114, 146, 'Berhasil melakukan login', '2022-01-06 08:17:17', '2022-01-06 08:17:17'),
(115, 139, 'Berhasil melakukan login', '2022-01-06 08:22:25', '2022-01-06 08:22:25'),
(116, 143, 'Berhasil melakukan login', '2022-01-06 08:27:07', '2022-01-06 08:27:07'),
(117, 144, 'Berhasil melakukan login', '2022-01-06 08:27:32', '2022-01-06 08:27:32'),
(118, 143, 'Berhasil melakukan login', '2022-01-06 08:28:33', '2022-01-06 08:28:33'),
(119, 142, 'Berhasil melakukan login', '2022-01-06 08:29:12', '2022-01-06 08:29:12'),
(120, 140, 'Berhasil melakukan login', '2022-01-06 08:29:48', '2022-01-06 08:29:48'),
(121, 148, 'Berhasil melakukan login', '2022-01-06 08:31:33', '2022-01-06 08:31:33'),
(122, 149, 'Berhasil melakukan login', '2022-01-06 08:32:58', '2022-01-06 08:32:58'),
(123, 140, 'Berhasil melakukan login', '2022-01-06 08:33:50', '2022-01-06 08:33:50'),
(124, 148, 'Berhasil melakukan login', '2022-01-06 08:34:44', '2022-01-06 08:34:44'),
(125, 140, 'Berhasil melakukan login', '2022-01-06 08:38:47', '2022-01-06 08:38:47'),
(126, 140, 'Berhasil melakukan login', '2022-01-06 09:02:16', '2022-01-06 09:02:16'),
(127, 139, 'Berhasil melakukan login', '2022-01-06 11:54:26', '2022-01-06 11:54:26'),
(128, 140, 'Berhasil melakukan login', '2022-01-06 22:23:46', '2022-01-06 22:23:46'),
(129, 139, 'Berhasil melakukan login', '2022-01-06 22:25:45', '2022-01-06 22:25:45'),
(130, 150, 'Berhasil melakukan login', '2022-01-06 22:27:07', '2022-01-06 22:27:07'),
(131, 140, 'Berhasil melakukan login', '2022-01-06 22:28:13', '2022-01-06 22:28:13'),
(132, 139, 'Berhasil melakukan login', '2022-01-07 06:14:46', '2022-01-07 06:14:46'),
(133, 139, 'Berhasil melakukan login', '2022-01-07 06:16:11', '2022-01-07 06:16:11'),
(134, 139, 'Berhasil melakukan login', '2022-01-07 06:46:31', '2022-01-07 06:46:31'),
(137, 140, 'Berhasil melakukan login', '2022-01-08 11:30:07', '2022-01-08 11:30:07'),
(138, 144, 'Berhasil melakukan login', '2022-01-08 11:33:27', '2022-01-08 11:33:27'),
(139, 140, 'Berhasil melakukan login', '2022-01-08 11:34:21', '2022-01-08 11:34:21'),
(140, 139, 'Berhasil melakukan login', '2022-01-08 11:34:47', '2022-01-08 11:34:47'),
(141, 148, 'Berhasil melakukan login', '2022-01-08 11:35:41', '2022-01-08 11:35:41'),
(142, 140, 'Berhasil melakukan login', '2022-01-08 11:38:45', '2022-01-08 11:38:45'),
(143, 144, 'Berhasil melakukan login', '2022-01-08 11:41:44', '2022-01-08 11:41:44'),
(144, 143, 'Berhasil melakukan login', '2022-01-08 11:43:10', '2022-01-08 11:43:10'),
(145, 141, 'Berhasil melakukan login', '2022-01-08 11:45:46', '2022-01-08 11:45:46'),
(146, 140, 'Berhasil melakukan login', '2022-01-08 11:47:01', '2022-01-08 11:47:01'),
(147, 142, 'Berhasil melakukan login', '2022-01-08 11:47:54', '2022-01-08 11:47:54'),
(148, 143, 'Berhasil melakukan login', '2022-01-08 11:48:54', '2022-01-08 11:48:54'),
(149, 144, 'Berhasil melakukan login', '2022-01-08 11:50:19', '2022-01-08 11:50:19'),
(150, 140, 'Berhasil melakukan login', '2022-01-08 11:53:40', '2022-01-08 11:53:40'),
(151, 140, 'Berhasil melakukan login', '2022-01-08 11:56:56', '2022-01-08 11:56:56'),
(152, 144, 'Berhasil melakukan login', '2022-01-08 12:01:10', '2022-01-08 12:01:10'),
(153, 143, 'Berhasil melakukan login', '2022-01-08 12:03:08', '2022-01-08 12:03:08'),
(154, 140, 'Berhasil melakukan login', '2022-01-08 12:21:00', '2022-01-08 12:21:00'),
(155, 142, 'Berhasil melakukan login', '2022-01-08 12:21:40', '2022-01-08 12:21:40'),
(156, 139, 'Berhasil melakukan login', '2022-01-08 12:29:02', '2022-01-08 12:29:02'),
(157, 139, 'Berhasil melakukan login', '2022-01-08 12:29:06', '2022-01-08 12:29:06'),
(158, 170, 'Berhasil melakukan login', '2022-01-08 12:43:11', '2022-01-08 12:43:11'),
(159, 140, 'Berhasil melakukan login', '2022-01-08 18:32:39', '2022-01-08 18:32:39'),
(160, 141, 'Berhasil melakukan login', '2022-01-08 18:35:24', '2022-01-08 18:35:24'),
(161, 142, 'Berhasil melakukan login', '2022-01-08 18:36:11', '2022-01-08 18:36:11'),
(162, 142, 'Berhasil melakukan login', '2022-01-08 18:37:16', '2022-01-08 18:37:16'),
(163, 143, 'Berhasil melakukan login', '2022-01-08 18:38:38', '2022-01-08 18:38:38'),
(164, 144, 'Berhasil melakukan login', '2022-01-08 18:39:54', '2022-01-08 18:39:54'),
(165, 139, 'Berhasil melakukan login', '2022-01-08 18:47:15', '2022-01-08 18:47:15'),
(166, 140, 'Berhasil melakukan login', '2022-01-08 18:47:49', '2022-01-08 18:47:49'),
(167, 139, 'Berhasil melakukan login', '2022-01-08 18:52:36', '2022-01-08 18:52:36'),
(168, 189, 'Berhasil melakukan login', '2022-01-08 19:04:30', '2022-01-08 19:04:30'),
(169, 171, 'Berhasil melakukan login', '2022-01-08 19:05:04', '2022-01-08 19:05:04'),
(170, 170, 'Berhasil melakukan login', '2022-01-08 19:06:15', '2022-01-08 19:06:15'),
(171, 169, 'Berhasil melakukan login', '2022-01-08 19:07:36', '2022-01-08 19:07:36'),
(172, 168, 'Berhasil melakukan login', '2022-01-08 19:08:42', '2022-01-08 19:08:42'),
(173, 167, 'Berhasil melakukan login', '2022-01-08 19:12:33', '2022-01-08 19:12:33'),
(174, 166, 'Berhasil melakukan login', '2022-01-08 19:14:01', '2022-01-08 19:14:01'),
(175, 165, 'Berhasil melakukan login', '2022-01-08 19:15:14', '2022-01-08 19:15:14'),
(176, 164, 'Berhasil melakukan login', '2022-01-08 19:16:20', '2022-01-08 19:16:20'),
(177, 163, 'Berhasil melakukan login', '2022-01-08 19:17:31', '2022-01-08 19:17:31'),
(178, 162, 'Berhasil melakukan login', '2022-01-08 19:18:17', '2022-01-08 19:18:17'),
(179, 161, 'Berhasil melakukan login', '2022-01-08 19:19:03', '2022-01-08 19:19:03'),
(180, 160, 'Berhasil melakukan login', '2022-01-08 19:20:03', '2022-01-08 19:20:03'),
(181, 159, 'Berhasil melakukan login', '2022-01-08 19:20:43', '2022-01-08 19:20:43'),
(182, 158, 'Berhasil melakukan login', '2022-01-08 19:21:26', '2022-01-08 19:21:26'),
(183, 156, 'Berhasil melakukan login', '2022-01-08 19:22:30', '2022-01-08 19:22:30'),
(184, 155, 'Berhasil melakukan login', '2022-01-08 19:23:15', '2022-01-08 19:23:15'),
(185, 154, 'Berhasil melakukan login', '2022-01-08 19:24:01', '2022-01-08 19:24:01'),
(186, 153, 'Berhasil melakukan login', '2022-01-08 19:25:02', '2022-01-08 19:25:02'),
(187, 140, 'Berhasil melakukan login', '2022-01-08 19:25:39', '2022-01-08 19:25:39'),
(188, 140, 'Berhasil melakukan login', '2022-01-08 19:26:19', '2022-01-08 19:26:19'),
(189, 141, 'Berhasil melakukan login', '2022-01-08 19:27:51', '2022-01-08 19:27:51'),
(190, 140, 'Berhasil melakukan login', '2022-01-08 19:28:32', '2022-01-08 19:28:32'),
(191, 139, 'Berhasil melakukan login', '2022-01-08 19:29:07', '2022-01-08 19:29:07'),
(192, 144, 'Berhasil melakukan login', '2022-01-08 19:30:55', '2022-01-08 19:30:55'),
(193, 143, 'Berhasil melakukan login', '2022-01-08 19:32:55', '2022-01-08 19:32:55'),
(194, 142, 'Berhasil melakukan login', '2022-01-08 19:33:50', '2022-01-08 19:33:50'),
(195, 141, 'Berhasil melakukan login', '2022-01-08 19:35:12', '2022-01-08 19:35:12'),
(196, 142, 'Berhasil melakukan login', '2022-01-08 19:36:40', '2022-01-08 19:36:40'),
(197, 143, 'Berhasil melakukan login', '2022-01-08 19:38:00', '2022-01-08 19:38:00'),
(198, 140, 'Berhasil melakukan login', '2022-01-08 19:42:24', '2022-01-08 19:42:24'),
(199, 144, 'Berhasil melakukan login', '2022-01-08 19:47:30', '2022-01-08 19:47:30'),
(200, 143, 'Berhasil melakukan login', '2022-01-08 19:48:00', '2022-01-08 19:48:00'),
(201, 142, 'Berhasil melakukan login', '2022-01-08 19:48:31', '2022-01-08 19:48:31'),
(202, 141, 'Berhasil melakukan login', '2022-01-08 19:49:26', '2022-01-08 19:49:26'),
(203, 140, 'Berhasil melakukan login', '2022-01-08 19:49:44', '2022-01-08 19:49:44'),
(204, 140, 'Berhasil melakukan login', '2022-01-10 09:22:47', '2022-01-10 09:22:47'),
(205, 144, 'Berhasil melakukan login', '2022-01-10 10:05:01', '2022-01-10 10:05:01'),
(206, 140, 'Berhasil melakukan login', '2022-01-10 10:20:09', '2022-01-10 10:20:09'),
(207, 144, 'Berhasil melakukan login', '2022-01-10 10:23:04', '2022-01-10 10:23:04'),
(208, 143, 'Berhasil melakukan login', '2022-01-10 10:25:17', '2022-01-10 10:25:17'),
(209, 142, 'Berhasil melakukan login', '2022-01-10 10:26:22', '2022-01-10 10:26:22'),
(210, 141, 'Berhasil melakukan login', '2022-01-10 10:27:14', '2022-01-10 10:27:14'),
(211, 140, 'Berhasil melakukan login', '2022-01-10 10:27:45', '2022-01-10 10:27:45'),
(212, 141, 'Berhasil melakukan login', '2022-01-10 10:29:04', '2022-01-10 10:29:04'),
(213, 144, 'Berhasil melakukan login', '2022-01-10 10:30:31', '2022-01-10 10:30:31'),
(214, 142, 'Berhasil melakukan login', '2022-01-10 10:32:10', '2022-01-10 10:32:10'),
(215, 144, 'Berhasil melakukan login', '2022-01-10 10:32:47', '2022-01-10 10:32:47'),
(216, 142, 'Berhasil melakukan login', '2022-01-10 10:33:56', '2022-01-10 10:33:56'),
(217, 140, 'Berhasil melakukan login', '2022-01-10 10:34:29', '2022-01-10 10:34:29'),
(218, 144, 'Berhasil melakukan login', '2022-01-10 10:51:07', '2022-01-10 10:51:07'),
(219, 144, 'Berhasil melakukan login', '2022-01-10 11:05:45', '2022-01-10 11:05:45'),
(220, 140, 'Berhasil melakukan login', '2022-01-10 11:14:37', '2022-01-10 11:14:37'),
(221, 139, 'Berhasil melakukan login', '2022-01-10 11:20:10', '2022-01-10 11:20:10'),
(222, 140, 'Berhasil melakukan login', '2022-01-10 11:24:35', '2022-01-10 11:24:35'),
(223, 190, 'Berhasil melakukan login', '2022-01-10 11:25:24', '2022-01-10 11:25:24'),
(224, 142, 'Berhasil melakukan login', '2022-01-10 11:26:40', '2022-01-10 11:26:40'),
(225, 140, 'Berhasil melakukan login', '2022-01-10 11:27:11', '2022-01-10 11:27:11'),
(226, 142, 'Berhasil melakukan login', '2022-01-10 11:27:45', '2022-01-10 11:27:45'),
(227, 143, 'Berhasil melakukan login', '2022-01-10 11:28:18', '2022-01-10 11:28:18'),
(228, 140, 'Berhasil melakukan login', '2022-01-10 11:28:52', '2022-01-10 11:28:52'),
(229, 143, 'Berhasil melakukan login', '2022-01-10 11:29:44', '2022-01-10 11:29:44'),
(230, 140, 'Berhasil melakukan login', '2022-01-10 11:30:20', '2022-01-10 11:30:20'),
(231, 140, 'Berhasil melakukan login', '2022-01-10 11:46:40', '2022-01-10 11:46:40'),
(232, 140, 'Berhasil melakukan login', '2022-01-10 13:55:30', '2022-01-10 13:55:30'),
(233, 144, 'Berhasil melakukan login', '2022-01-10 13:56:33', '2022-01-10 13:56:33'),
(234, 140, 'Berhasil melakukan login', '2022-01-10 14:27:02', '2022-01-10 14:27:02'),
(235, 140, 'Berhasil melakukan login', '2022-01-10 14:56:56', '2022-01-10 14:56:56'),
(236, 190, 'Berhasil melakukan login', '2022-01-10 16:24:27', '2022-01-10 16:24:27'),
(237, 142, 'Berhasil melakukan login', '2022-01-10 16:25:33', '2022-01-10 16:25:33'),
(238, 143, 'Berhasil melakukan login', '2022-01-10 16:25:54', '2022-01-10 16:25:54'),
(239, 140, 'Berhasil melakukan login', '2022-01-11 10:37:17', '2022-01-11 10:37:17'),
(240, 140, 'Berhasil melakukan login', '2022-01-11 13:44:48', '2022-01-11 13:44:48'),
(241, 144, 'Berhasil melakukan login', '2022-01-11 13:45:50', '2022-01-11 13:45:50'),
(242, 143, 'Berhasil melakukan login', '2022-01-11 13:47:26', '2022-01-11 13:47:26'),
(243, 142, 'Berhasil melakukan login', '2022-01-11 13:48:10', '2022-01-11 13:48:10'),
(244, 140, 'Berhasil melakukan login', '2022-01-12 08:18:49', '2022-01-12 08:18:49'),
(245, 190, 'Berhasil melakukan login', '2022-01-12 08:21:56', '2022-01-12 08:21:56'),
(246, 140, 'Berhasil melakukan login', '2022-01-12 08:23:20', '2022-01-12 08:23:20'),
(247, 142, 'Berhasil melakukan login', '2022-01-12 08:24:23', '2022-01-12 08:24:23'),
(248, 143, 'Berhasil melakukan login', '2022-01-12 08:25:19', '2022-01-12 08:25:19'),
(249, 140, 'Berhasil melakukan login', '2022-01-12 08:26:32', '2022-01-12 08:26:32'),
(250, 144, 'Berhasil melakukan login', '2022-01-12 08:27:02', '2022-01-12 08:27:02'),
(251, 143, 'Berhasil melakukan login', '2022-01-12 08:29:06', '2022-01-12 08:29:06'),
(252, 144, 'Berhasil melakukan login', '2022-01-12 08:30:16', '2022-01-12 08:30:16'),
(253, 143, 'Berhasil melakukan login', '2022-01-12 08:30:56', '2022-01-12 08:30:56'),
(254, 142, 'Berhasil melakukan login', '2022-01-12 08:31:29', '2022-01-12 08:31:29'),
(255, 140, 'Berhasil melakukan login', '2022-01-12 08:32:08', '2022-01-12 08:32:08'),
(256, 140, 'Berhasil melakukan login', '2022-01-12 08:34:37', '2022-01-12 08:34:37'),
(257, 190, 'Berhasil melakukan login', '2022-01-12 08:36:50', '2022-01-12 08:36:50'),
(258, 140, 'Berhasil melakukan login', '2022-01-12 08:37:42', '2022-01-12 08:37:42'),
(259, 190, 'Berhasil melakukan login', '2022-01-12 08:38:49', '2022-01-12 08:38:49'),
(260, 142, 'Berhasil melakukan login', '2022-01-12 08:39:22', '2022-01-12 08:39:22'),
(261, 143, 'Berhasil melakukan login', '2022-01-12 08:40:02', '2022-01-12 08:40:02'),
(262, 140, 'Berhasil melakukan login', '2022-01-12 08:40:49', '2022-01-12 08:40:49'),
(263, 144, 'Berhasil melakukan login', '2022-01-12 08:41:12', '2022-01-12 08:41:12'),
(264, 143, 'Berhasil melakukan login', '2022-01-12 08:43:01', '2022-01-12 08:43:01'),
(265, 190, 'Berhasil melakukan login', '2022-01-12 08:44:08', '2022-01-12 08:44:08'),
(266, 144, 'Berhasil melakukan login', '2022-01-12 08:44:44', '2022-01-12 08:44:44'),
(267, 143, 'Berhasil melakukan login', '2022-01-12 08:45:20', '2022-01-12 08:45:20'),
(268, 144, 'Berhasil melakukan login', '2022-01-12 08:45:50', '2022-01-12 08:45:50'),
(269, 142, 'Berhasil melakukan login', '2022-01-12 08:46:25', '2022-01-12 08:46:25'),
(270, 190, 'Berhasil melakukan login', '2022-01-12 08:46:59', '2022-01-12 08:46:59'),
(271, 139, 'Berhasil melakukan login', '2022-01-12 08:47:41', '2022-01-12 08:47:41'),
(272, 140, 'Berhasil melakukan login', '2022-01-12 09:26:18', '2022-01-12 09:26:18'),
(273, 139, 'Berhasil melakukan login', '2022-01-12 09:26:35', '2022-01-12 09:26:35'),
(275, 144, 'Berhasil melakukan login', '2022-01-12 09:42:49', '2022-01-12 09:42:49'),
(276, 190, 'Berhasil melakukan login', '2022-01-12 09:51:24', '2022-01-12 09:51:24'),
(277, 190, 'Berhasil melakukan login', '2022-01-12 09:53:18', '2022-01-12 09:53:18'),
(278, 140, 'Berhasil melakukan login', '2022-01-12 10:36:30', '2022-01-12 10:36:30'),
(279, 140, 'Berhasil melakukan login', '2022-01-12 16:11:20', '2022-01-12 16:11:20'),
(280, 144, 'Berhasil melakukan login', '2022-01-12 16:32:43', '2022-01-12 16:32:43'),
(281, 143, 'Berhasil melakukan login', '2022-01-12 16:33:16', '2022-01-12 16:33:16'),
(282, 140, 'Berhasil melakukan login', '2022-01-13 07:25:10', '2022-01-13 07:25:10'),
(283, 144, 'Berhasil melakukan login', '2022-01-13 07:26:56', '2022-01-13 07:26:56'),
(284, 140, 'Berhasil melakukan login', '2022-01-13 07:41:47', '2022-01-13 07:41:47'),
(285, 140, 'Berhasil melakukan login', '2022-01-13 09:22:12', '2022-01-13 09:22:12'),
(286, 140, 'Berhasil melakukan login', '2022-01-13 14:51:28', '2022-01-13 14:51:28'),
(287, 144, 'Berhasil melakukan login', '2022-01-13 14:52:03', '2022-01-13 14:52:03'),
(288, 140, 'Berhasil melakukan login', '2022-01-13 21:40:42', '2022-01-13 21:40:42'),
(289, 144, 'Berhasil melakukan login', '2022-01-13 21:41:41', '2022-01-13 21:41:41'),
(290, 143, 'Berhasil melakukan login', '2022-01-13 21:42:39', '2022-01-13 21:42:39'),
(291, 140, 'Berhasil melakukan login', '2022-01-14 07:41:05', '2022-01-14 07:41:05'),
(292, 144, 'Berhasil melakukan login', '2022-01-14 07:42:19', '2022-01-14 07:42:19'),
(293, 139, 'Berhasil melakukan login', '2022-01-14 08:34:33', '2022-01-14 08:34:33'),
(294, 140, 'Berhasil melakukan login', '2022-01-14 15:25:02', '2022-01-14 15:25:02'),
(295, 140, 'Berhasil melakukan login', '2022-01-14 19:25:46', '2022-01-14 19:25:46'),
(296, 139, 'Berhasil melakukan login', '2022-01-14 19:31:20', '2022-01-14 19:31:20'),
(297, 200, 'Berhasil melakukan login', '2022-01-14 20:16:33', '2022-01-14 20:16:33'),
(298, 144, 'Berhasil melakukan login', '2022-01-14 20:17:51', '2022-01-14 20:17:51'),
(299, 143, 'Berhasil melakukan login', '2022-01-14 20:18:37', '2022-01-14 20:18:37'),
(300, 140, 'Berhasil melakukan login', '2022-01-16 21:05:06', '2022-01-16 21:05:06'),
(301, 139, 'Berhasil melakukan login', '2022-01-16 21:06:12', '2022-01-16 21:06:12'),
(303, 139, 'Berhasil melakukan login', '2022-01-16 21:12:35', '2022-01-16 21:12:35'),
(304, 140, 'Berhasil melakukan login', '2022-01-16 22:49:17', '2022-01-16 22:49:17'),
(305, 139, 'Berhasil melakukan login', '2022-01-16 22:49:58', '2022-01-16 22:49:58'),
(306, 140, 'Berhasil melakukan login', '2022-01-16 23:09:57', '2022-01-16 23:09:57'),
(307, 140, 'Berhasil melakukan login', '2022-01-16 23:12:43', '2022-01-16 23:12:43'),
(308, 144, 'Berhasil melakukan login', '2022-01-16 23:14:08', '2022-01-16 23:14:08'),
(309, 140, 'Berhasil melakukan login', '2022-01-17 08:48:46', '2022-01-17 08:48:46'),
(310, 139, 'Berhasil melakukan login', '2022-01-17 08:52:14', '2022-01-17 08:52:14'),
(311, 139, 'Berhasil melakukan login', '2022-01-17 12:44:53', '2022-01-17 12:44:53'),
(312, 113, 'Berhasil melakukan login', '2022-01-17 12:45:57', '2022-01-17 12:45:57'),
(313, 139, 'Berhasil melakukan login', '2022-01-17 13:07:30', '2022-01-17 13:07:30'),
(314, 113, 'Berhasil melakukan login', '2022-01-17 13:07:51', '2022-01-17 13:07:51'),
(315, 139, 'Berhasil melakukan login', '2022-01-17 13:13:16', '2022-01-17 13:13:16'),
(316, 113, 'Berhasil melakukan login', '2022-01-17 13:13:32', '2022-01-17 13:13:32'),
(317, 113, 'Berhasil melakukan login', '2022-01-17 13:14:12', '2022-01-17 13:14:12'),
(318, 139, 'Berhasil melakukan login', '2022-01-17 13:22:16', '2022-01-17 13:22:16'),
(319, 113, 'Berhasil melakukan login', '2022-01-17 13:23:16', '2022-01-17 13:23:16'),
(320, 113, 'Berhasil melakukan login', '2022-01-17 13:24:03', '2022-01-17 13:24:03'),
(321, 105, 'Berhasil melakukan login', '2022-01-17 13:24:48', '2022-01-17 13:24:48'),
(322, 139, 'Berhasil melakukan login', '2022-01-17 13:25:23', '2022-01-17 13:25:23'),
(323, 131, 'Berhasil melakukan login', '2022-01-17 13:25:41', '2022-01-17 13:25:41'),
(324, 139, 'Berhasil melakukan login', '2022-01-17 13:28:28', '2022-01-17 13:28:28'),
(325, 234, 'Berhasil melakukan login', '2022-01-17 13:30:25', '2022-01-17 13:30:25'),
(326, 139, 'Berhasil melakukan login', '2022-01-20 13:25:16', '2022-01-20 13:25:16'),
(327, 139, 'Berhasil melakukan login', '2022-01-20 13:26:45', '2022-01-20 13:26:45'),
(328, 139, 'Berhasil melakukan login', '2022-01-20 13:27:42', '2022-01-20 13:27:42'),
(329, 139, 'Berhasil melakukan login', '2022-01-20 13:30:08', '2022-01-20 13:30:08'),
(330, 139, 'Berhasil melakukan login', '2022-01-20 13:32:10', '2022-01-20 13:32:10'),
(331, 235, 'Berhasil melakukan login', '2022-01-20 13:33:58', '2022-01-20 13:33:58'),
(332, 139, 'Berhasil melakukan login', '2022-01-20 13:34:21', '2022-01-20 13:34:21'),
(333, 235, 'Berhasil melakukan login', '2022-01-20 13:35:44', '2022-01-20 13:35:44'),
(334, 139, 'Berhasil melakukan login', '2022-01-20 13:38:09', '2022-01-20 13:38:09'),
(335, 139, 'Berhasil melakukan login', '2022-01-20 13:45:27', '2022-01-20 13:45:27'),
(336, 139, 'Berhasil melakukan login', '2022-01-20 13:47:09', '2022-01-20 13:47:09'),
(337, 113, 'Berhasil melakukan login', '2022-01-20 13:47:39', '2022-01-20 13:47:39'),
(338, 139, 'Berhasil melakukan login', '2022-01-21 04:00:55', '2022-01-21 04:00:55'),
(339, 113, 'Berhasil melakukan login', '2022-01-21 04:07:16', '2022-01-21 04:07:16');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` bigint(20) NOT NULL,
  `idCeo` bigint(20) UNSIGNED NOT NULL,
  `isi_pesan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idRegHead` bigint(20) UNSIGNED DEFAULT NULL,
  `ReadedByRegHead` int(11) DEFAULT 1,
  `idDivHead` bigint(20) UNSIGNED DEFAULT NULL,
  `ReadedByDivHead` int(11) DEFAULT 0,
  `idSecHead` bigint(20) UNSIGNED DEFAULT NULL,
  `ReadedBySecHead` int(11) DEFAULT 1,
  `progress` int(11) DEFAULT 1,
  `urgent` int(11) NOT NULL DEFAULT 1,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `idCeo`, `isi_pesan`, `idRegHead`, `ReadedByRegHead`, `idDivHead`, `ReadedByDivHead`, `idSecHead`, `ReadedBySecHead`, `progress`, `urgent`, `attachment`, `created_at`, `updated_at`) VALUES
(17, 140, 'Tolong selesaikan persiapan rakerwil', 141, 2, NULL, 0, NULL, 1, 1, 1, NULL, '2022-01-05 18:00:36', '2022-01-08 11:46:12'),
(18, 140, 'Persiapkan Komite SMEC', 190, 3, 142, 3, 143, 3, 2, 2, NULL, '2022-01-10 11:25:01', '2022-01-10 11:30:08'),
(19, 140, 'Test PROGRAM 1', 190, 3, 142, 3, 143, 3, 2, 1, NULL, '2022-01-12 08:21:21', '2022-01-12 08:26:19'),
(20, 140, 'Finishing project 1', 190, 3, 142, 3, 143, 3, 2, 2, NULL, '2022-01-12 08:36:32', '2022-01-12 08:40:36'),
(22, 113, 'hello world', 105, 1, NULL, 0, NULL, 1, 1, 1, NULL, '2022-01-21 04:11:09', '2022-01-21 04:11:09'),
(23, 113, 'test atachment', 105, 1, NULL, 0, NULL, 1, 1, 1, 'storage/attachment/eSOoLrqc2WggvY07Q7b3EDAL9LZxifPYVfChDH9M.png', '2022-01-21 04:18:51', '2022-01-21 04:18:51');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_12_20_074628_users', 2);

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
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `regionalhead_cred`
--

CREATE TABLE `regionalhead_cred` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idUser` bigint(20) UNSIGNED NOT NULL,
  `idDivisi` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `regionalhead_cred`
--

INSERT INTO `regionalhead_cred` (`id`, `idUser`, `idDivisi`, `created_at`, `updated_at`) VALUES
(73, 190, 19, '2022-01-10 11:22:49', '2022-01-10 11:22:49'),
(74, 190, 20, '2022-01-10 11:22:49', '2022-01-10 11:22:49'),
(75, 190, 21, '2022-01-10 11:22:49', '2022-01-10 11:22:49'),
(79, 194, 2, '2022-01-14 19:36:54', '2022-01-14 19:36:54'),
(80, 194, 3, '2022-01-14 19:36:54', '2022-01-14 19:36:54'),
(81, 194, 5, '2022-01-14 19:36:54', '2022-01-14 19:36:54'),
(82, 194, 15, '2022-01-14 19:36:54', '2022-01-14 19:36:54'),
(83, 194, 16, '2022-01-14 19:36:54', '2022-01-14 19:36:54'),
(84, 194, 17, '2022-01-14 19:36:54', '2022-01-14 19:36:54'),
(85, 194, 18, '2022-01-14 19:36:54', '2022-01-14 19:36:54'),
(86, 195, 9, '2022-01-14 19:39:25', '2022-01-14 19:39:25'),
(87, 195, 10, '2022-01-14 19:39:25', '2022-01-14 19:39:25'),
(88, 195, 11, '2022-01-14 19:39:25', '2022-01-14 19:39:25'),
(89, 196, 4, '2022-01-14 19:41:11', '2022-01-14 19:41:11'),
(90, 196, 12, '2022-01-14 19:41:12', '2022-01-14 19:41:12'),
(91, 196, 13, '2022-01-14 19:41:12', '2022-01-14 19:41:12'),
(92, 196, 14, '2022-01-14 19:41:12', '2022-01-14 19:41:12'),
(93, 197, 6, '2022-01-14 19:42:57', '2022-01-14 19:42:57'),
(94, 197, 7, '2022-01-14 19:42:57', '2022-01-14 19:42:57'),
(95, 197, 8, '2022-01-14 19:42:57', '2022-01-14 19:42:57'),
(96, 198, 19, '2022-01-14 19:46:20', '2022-01-14 19:46:20'),
(97, 198, 20, '2022-01-14 19:46:20', '2022-01-14 19:46:20'),
(98, 198, 21, '2022-01-14 19:46:20', '2022-01-14 19:46:20'),
(99, 234, 7, '2022-01-17 13:30:04', '2022-01-17 13:30:04'),
(100, 234, 8, '2022-01-17 13:30:04', '2022-01-17 13:30:04'),
(101, 234, 9, '2022-01-17 13:30:04', '2022-01-17 13:30:04');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idUserAsPic` bigint(20) UNSIGNED NOT NULL,
  `idDivisi` bigint(20) UNSIGNED NOT NULL,
  `jenis_pekerjaan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `keterangan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `waktu_input` datetime DEFAULT current_timestamp(),
  `evidence` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `job` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penanggung_jawab` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `idUserAsPic`, `idDivisi`, `jenis_pekerjaan`, `status`, `keterangan`, `waktu_input`, `evidence`, `deadline`, `created_at`, `updated_at`, `job`, `penanggung_jawab`) VALUES
(31, 143, 19, 'Menyelesaikan Temuan Audit Intern 2021', 4, NULL, '2022-01-05 10:01:20', 'storage/evidence/qwZWv0MXlUO1OiesZUAdpm2KKrwCXalinMhtNSed.jpg', '2022-01-31', '2022-01-05 17:01:20', '2022-01-06 08:29:20', NULL, NULL),
(32, 149, 6, 'Selesaikan RKA 2022', 4, NULL, '2022-01-06 01:32:22', 'storage/evidence/LxaXspRF8adBkeIAT73n0BUVCs5hBwV9Oh34oZtj.jpg', '2022-01-11', '2022-01-06 08:32:22', '2022-01-06 22:27:32', 'Main Job', NULL),
(33, 149, 6, 'Rotasi Kaunit 2022', 1, NULL, '2022-01-08 04:37:10', NULL, '2022-01-13', '2022-01-08 11:37:10', '2022-01-08 11:37:10', 'Additional Job', NULL),
(34, 149, 6, 'Rotasi Mantri 2022', 1, NULL, '2022-01-08 04:38:15', NULL, '2022-01-12', '2022-01-08 11:38:15', '2022-01-08 11:38:15', 'Main Job', NULL),
(35, 143, 19, 'Forum PKP Januari 2022', 4, NULL, '2022-01-08 04:42:34', NULL, '2022-01-08', '2022-01-08 11:42:34', '2022-01-08 19:34:43', 'Main Job', NULL),
(36, 189, 21, 'Lelang Expo 2022', 1, NULL, '2022-01-08 12:05:40', NULL, '2022-01-11', '2022-01-08 19:05:40', '2022-01-08 19:05:40', 'Additional Job', NULL),
(37, 188, 20, 'Komite Januari 2022', 1, NULL, '2022-01-08 12:06:46', NULL, '2022-01-23', '2022-01-08 19:06:46', '2022-01-08 19:06:46', 'Main Job', NULL),
(38, 187, 18, 'Realisasi Pinjaman PT ALS', 1, NULL, '2022-01-08 12:08:17', NULL, '2022-01-10', '2022-01-08 19:08:17', '2022-01-08 19:08:17', 'Main Job', NULL),
(40, 185, 16, 'Relokasi Uker Binjai', 1, NULL, '2022-01-08 12:13:05', NULL, '2022-01-21', '2022-01-08 19:13:05', '2022-01-08 19:13:05', 'Main Job', NULL),
(41, 184, 15, 'penyambutan direktur utama', 1, NULL, '2022-01-08 12:14:49', NULL, '2022-01-08', '2022-01-08 19:14:49', '2022-01-08 19:14:49', 'Main Job', NULL),
(42, 183, 14, 'Evaluasi Merchant januari', 1, NULL, '2022-01-08 12:15:54', NULL, '2022-01-11', '2022-01-08 19:15:54', '2022-01-08 19:15:54', 'Additional Job', NULL),
(43, 182, 13, 'Penerimaan Pajak Kabanjahe', 1, NULL, '2022-01-08 12:16:57', NULL, '2022-01-14', '2022-01-08 19:16:57', '2022-01-08 19:16:57', 'Main Job', NULL),
(44, 181, 12, 'Evaluasi KKB 2022', 1, NULL, '2022-01-08 12:17:55', NULL, '2022-01-23', '2022-01-08 19:17:55', '2022-01-08 19:17:55', 'Main Job', NULL),
(45, 180, 11, 'Ots PT Gudang Garam', 1, NULL, '2022-01-08 12:18:40', NULL, '2022-01-09', '2022-01-08 19:18:40', '2022-01-08 19:18:40', 'Main Job', NULL),
(46, 179, 10, 'Kalkulasi Reksadana', 1, NULL, '2022-01-08 12:19:32', NULL, '2022-01-08', '2022-01-08 19:19:32', '2022-01-08 19:19:32', 'Main Job', NULL),
(47, 178, 9, 'Evaluasi RM Pangan Jan', 1, NULL, '2022-01-08 12:20:22', NULL, '2022-01-11', '2022-01-08 19:20:22', '2022-01-08 19:20:22', 'Main Job', NULL),
(48, 177, 8, 'Penyaluran Bansos Pakam', 1, NULL, '2022-01-08 12:21:02', NULL, '2022-01-09', '2022-01-08 19:21:02', '2022-01-08 19:21:02', 'Main Job', NULL),
(49, 111, 7, 'Evaluasi PAB Jan', 1, NULL, '2022-01-08 12:21:43', NULL, '2022-01-11', '2022-01-08 19:21:43', '2022-01-08 19:21:43', 'Main Job', NULL),
(52, 173, 3, 'Pemerian Jubilaris', 1, NULL, '2022-01-08 12:24:24', NULL, '2022-01-10', '2022-01-08 19:24:24', '2022-01-08 19:24:24', 'Additional Job', NULL),
(54, 143, 19, 'Merubah formasi pekerja', 4, NULL, '2022-01-12 01:28:38', NULL, '2022-01-31', '2022-01-12 08:28:38', '2022-01-12 08:31:49', 'Main Job', 'jim'),
(55, 143, 19, 'Ujicoba Komite', 4, NULL, '2022-01-12 01:42:20', NULL, '2022-01-17', '2022-01-12 08:42:20', '2022-01-12 08:46:38', 'Additional Job', 'jim');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE `usertable` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` int(11) NOT NULL,
  `idDivisi` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`id`, `name`, `email`, `email_verified_at`, `password`, `username`, `role`, `idDivisi`, `remember_token`, `created_at`, `updated_at`) VALUES
(105, 'brlinkRegHead', NULL, NULL, '$2y$10$BLPAgWR100D.EWy6jZp19uy8U1Nled1W9EQBAy9qKOiDcdjhyDoEy', 'brlinkRegHead', 2, 7, NULL, '2021-12-21 15:22:41', '2021-12-21 15:22:41'),
(106, 'brlinkStaff_name', NULL, NULL, '$2y$10$mz3Scg1FBFDzvhP8nuDMae3q82C4RSDEx/oSUMMURVgvxgiy4.foe', 'brlinkStaff', 5, 7, NULL, '2021-12-21 15:23:19', '2021-12-21 15:23:19'),
(111, 'brilinkSecHead', NULL, NULL, '$2y$10$ZTRo4K.36asdmCCLDme3peZonJIBJ9iGsPXTzhq05TS9uvt5IHlmW', 'brilinkSecHead', 4, 7, NULL, '2021-12-21 15:25:57', '2021-12-21 15:25:57'),
(112, 'brilinkSecHead1', NULL, NULL, '$2y$10$6fV5gRuVP7Qm8BdWWrr/6upCeokanNZW.BaQYFASZ/ujhaJ/SQLea', 'brilinkSecHead1', 4, 7, NULL, '2021-12-21 15:26:11', '2021-12-21 15:26:11'),
(113, 'adasdas', NULL, NULL, '$2y$10$uvMGr279rd5oKIDz/cVukOHilE3U3eth6VeLGNAKcuFRtWbPSv1ti', 'brilinkceo', 1, 1, NULL, '2021-12-22 03:19:55', '2022-01-20 13:47:27'),
(114, 'mfstaff', NULL, NULL, '$2y$10$VpecoKn/ppEkmHnI4A9XRu.LlASq3CIlzkFr6RdWddut4ezLyU2e.', 'mfstaff', 5, 13, NULL, '2021-12-22 03:45:01', '2021-12-22 03:45:01'),
(115, 'brilinkreghead2view', NULL, NULL, '$2y$10$tbJkGN6VzMTfkgfMnfO/W.cDKo.Bkt3rDIjIMBUh7jR9L2bh788KW', 'brilinkreghead2view', 2, 7, NULL, '2021-12-22 04:49:55', '2021-12-22 04:49:55'),
(116, 'brilinkreghead2view', NULL, NULL, '$2y$10$lZw.DJ.jlne9YKh6X98mSe9rcbtXo7C85jVgyw2/YeaRmZy6gIkk6', 'brilinkreghead1view', 2, 7, NULL, '2021-12-22 04:50:18', '2021-12-22 04:50:18'),
(118, 'regheadtest', NULL, NULL, '$2y$10$MrV1BFLb8C0ei6j43sBTLOh7ShIbbUFRfZgQTchzIcFzl7gtLa31a', 'regheadtest', 2, 18, NULL, '2021-12-22 04:56:50', '2021-12-22 04:56:50'),
(120, 'brlinksec', NULL, NULL, '$2y$10$mjWIW9QWfy84FK93n/2gjOfuwbxJ0HPBejWKTla0Udlqa3WLnVbiC', 'brlinksec', 4, 7, NULL, '2021-12-22 06:18:08', '2021-12-22 06:18:08'),
(121, 'mfsechead1', NULL, NULL, '$2y$10$/cEIAXM8/wudy4AL.u9.iOb5QL9W8t6QcMaJ1bzM90jz0gBUjf/hi', 'mfsechead1', 4, 13, NULL, '2021-12-22 10:04:39', '2021-12-22 10:04:39'),
(122, 'mfsechead2', NULL, NULL, '$2y$10$kdDmP6WSSoHXZbaiR6ogAeJEGdnR0XsEdCMBxk5Yqjg7BKVuoDVqC', 'mfsechead2', 4, 13, NULL, '2021-12-22 10:04:58', '2021-12-22 10:04:58'),
(124, 'testbaru', NULL, NULL, '$2y$10$TEoUW.DjQqM/bU8fXx7e/Oo3DK7xa6jRy1NqesndtiXC.RP/yob1G', 'testbaru', 5, 12, NULL, '2021-12-24 06:38:51', '2021-12-24 06:38:51'),
(125, 'cvcv', NULL, NULL, '$2y$10$t/m1qtOJeZQdlsbsrHDiDO8082RhGQCWYBHrzw4kSd6DQP/EZS.Fm', 'cvcv', 2, 6, NULL, '2021-12-24 06:39:10', '2021-12-24 06:39:10'),
(126, 'mbps', NULL, NULL, '$2y$10$Hj3j2ZdThBZ/o0f4sydLier1AKSPxxNIBdC3yL9dEp..AznZQy4k.', 'mbps', 5, 6, NULL, '2021-12-24 06:41:54', '2021-12-24 06:41:54'),
(128, 'mbpg', NULL, NULL, '$2y$10$mqc4K9YGJJqHinpl1jh2xO2BZlknou68dQcgTWzSJEUTjD3.ydWsy', 'mbpg', 4, 6, NULL, '2021-12-24 06:43:01', '2021-12-24 06:43:01'),
(129, 'adasdsaxxxx', NULL, NULL, 'bbbbb', 'bbbbb', 5, 4, NULL, '2021-12-26 09:30:00', '2021-12-28 14:12:46'),
(131, 'test3viewReghead', NULL, NULL, '$2y$10$vbrQ54Fs5Jc0s6Zgg/pkdOj9jNuX1IwEPTUbOs7zCi32lMyGe/Vj.', 'test3viewReghead', 2, 1, NULL, '2021-12-28 09:18:20', '2021-12-28 09:18:20'),
(134, 'setDummyForUpdate', NULL, NULL, '$2y$10$s2Unk9FbYd3sm0AmspFgmOJmTZICjaKbHd/aewvzF55fyZfGQKdfq', 'setDummyForUpdate', 2, 1, NULL, '2021-12-28 13:55:03', '2021-12-28 13:55:03'),
(137, 'brilinkdivhead', NULL, NULL, '$2y$10$iPIGOns7pt7C8YFfa85wteyoiyREBKoFTv/mD8Obo/9rCihnDzlQi', 'brilinkdivhead', 3, 7, NULL, '2021-12-29 09:34:32', '2021-12-29 09:35:19'),
(139, 'awen', NULL, NULL, '$2y$10$KQwgTjaXQsNUb97uRWFzyeNG2f3pHfzCAGDXMAgvIMS2Qmi0CtfOa', 'awen', 6, 1, NULL, '2022-01-03 09:56:52', '2022-01-03 09:56:52'),
(140, 'antonov', NULL, NULL, '$2y$10$TjnQfZ.RNIDDje0RJwL7fuNU0Akyb9A3ioTu/1nEJdMJYmFDwIH5e', '123456', 1, 1, NULL, '2022-01-03 09:57:09', '2022-01-03 09:57:09'),
(141, 'mike', NULL, NULL, '$2y$10$paoFOGjjmnViakD9foO5FenS/pmvkSrHCD3kMG2KT.rciK0J1bSy2', '234567', 2, 1, NULL, '2022-01-03 09:57:23', '2022-01-03 09:57:23'),
(142, 'dave', NULL, NULL, '$2y$10$vAnHF4lkDu1K9bFGiW9nbO902a.yWmULAWAgH9o6mBfwvbW.6J03O', '345678', 3, 19, NULL, '2022-01-03 09:57:54', '2022-01-03 09:57:54'),
(143, 'liam', NULL, NULL, '$2y$10$RdXl0Kvod3X0I.X7iFDnze29OHQ2hUUM7L1snVgqPShq8r6VAGElq', '456123', 4, 19, NULL, '2022-01-03 09:58:14', '2022-01-03 09:58:14'),
(144, 'jim', NULL, NULL, '$2y$10$sf5HHRLiO8Hjn.Dw9zvLJuMLGS7CNbG.ywq3Wz4yV3kO8/4UOu08.', '654321', 5, 19, NULL, '2022-01-03 09:58:34', '2022-01-03 09:58:34'),
(146, 'admin', NULL, NULL, '$2y$10$ok5I2MB57ABasI1eEUe58euYS1CNSD93R01esxugzcVAVs9o9RPRW', 'admin', 1, 1, NULL, '2022-01-04 17:32:24', '2022-01-04 17:32:24'),
(148, 'Mikro1', NULL, NULL, '$2y$10$hDhmM6nFGhjsWXbjD2zu0uAgn3v83pNlF2f3Y55NsMUIN..UyifSu', 'Mikro1', 5, 6, NULL, '2022-01-06 08:25:14', '2022-01-06 08:25:14'),
(149, 'MikroSPV', NULL, NULL, '$2y$10$2E6IFTcYVnx1N0ZNGJpm0u3wxS50LvvUJDjx9lEkSWFtta1Pl7Vli', 'Mikro2', 4, 6, NULL, '2022-01-06 08:25:55', '2022-01-06 08:25:55'),
(150, 'MikroDHead', NULL, NULL, '$2y$10$nD6dFn671FeotwBxunq87eWW54Z7v8KuMcgB0WuHICBa3mS6bGhwy', 'Mikro3', 3, 6, NULL, '2022-01-06 08:26:36', '2022-01-06 08:26:36'),
(153, 'Dedy F', NULL, NULL, '$2y$10$ekgNcYQ1Iuya25xJ5fMTauheiHpp320NqzDuLj3zSWJHk9DU3Z9mW', 'Rds1', 5, 2, NULL, '2022-01-08 12:30:54', '2022-01-08 12:30:54'),
(154, 'Abdi', NULL, NULL, '$2y$10$UQ2oHtgulZaMsGF.aanyrevW4tOd8InlWy8fplEJYGz4h2CIhI7Ae', 'Hcbp1', 5, 3, NULL, '2022-01-08 12:31:31', '2022-01-08 12:31:31'),
(155, 'Sapto Rini', NULL, NULL, '$2y$10$56IUaTaaC5eN2oOS7ZdgT.mkyE.q2vYckUKrfWADfDv/gsgCJSaoS', 'Clf1', 5, 4, NULL, '2022-01-08 12:32:08', '2022-01-08 12:32:08'),
(156, 'Satria', NULL, NULL, '$2y$10$FnwFehtNkXV1RbkV0DNnueYeK69sUvY9Eui2zeiFcK49Ej/yk1G7e', 'Legal1', 5, 5, NULL, '2022-01-08 12:33:42', '2022-01-08 12:33:42'),
(158, 'Riza', NULL, NULL, '$2y$10$2TQGZoGlUpIbit2r/PGqz.ltWTRVgCCBRQIdcQFNtM4xnHCpa/Oz2', 'Brilink1', 5, 7, NULL, '2022-01-08 12:34:41', '2022-01-08 12:34:41'),
(159, 'Tumpal', NULL, NULL, '$2y$10$FyRgZ7FgVXWj.hpKHLf8G.7JqXnCXuQyfn1DEhasVRFSvCZJQqvsC', 'Sei1', 5, 8, NULL, '2022-01-08 12:35:11', '2022-01-08 12:35:11'),
(160, 'Hari Budiarto', NULL, NULL, '$2y$10$8BAl7.x.OvImY82fpRJWze/UnsgMA0USD2H2rM9oKdoZNFjeTFyfq', 'Small1', 5, 9, NULL, '2022-01-08 12:35:44', '2022-01-08 12:35:44'),
(161, 'Rico', NULL, NULL, '$2y$10$d1Kc4QoqYIacKizoHat2IuMY4f0OC3sLx2zY.5oqwIS/TCyOYVwJO', 'Trb1', 5, 10, NULL, '2022-01-08 12:36:10', '2022-01-08 12:36:10'),
(162, 'Torang', NULL, NULL, '$2y$10$W5N/21LklomQF82W3U.1AOxqM83/e2iO..eMM7h5s1GNXuntYbN0K', 'Medium1', 5, 11, NULL, '2022-01-08 12:37:00', '2022-01-08 12:37:00'),
(163, 'Novi', NULL, NULL, '$2y$10$RNZQQswj/cbclJhA0HNloOK44bchXv0CopGd2hDCehQ3MvmNp9qyS', 'Consumer1', 5, 12, NULL, '2022-01-08 12:37:30', '2022-01-08 12:37:30'),
(164, 'Irwansyah', NULL, NULL, '$2y$10$kMYflKoc3JnuT14LqlSQ1.qQska512KMnrwjzygDLrZIhXBXXQU3i', 'Mfd1', 5, 13, NULL, '2022-01-08 12:38:01', '2022-01-08 12:38:01'),
(165, 'Agung', NULL, NULL, '$2y$10$RaAEF92WZvGMqiKuguOFz.dYvPNrBmp06zjrYb5vajU8cMcVpL9N2', 'Rtc1', 5, 14, NULL, '2022-01-08 12:38:24', '2022-01-08 12:38:24'),
(166, 'Harris', NULL, NULL, '$2y$10$IDJoxLa1d1xTlbC3Y1nPsuVFIS1zGGLc2gswvhxyQDCL3HGdhFjpq', 'Logistic1', 5, 15, NULL, '2022-01-08 12:39:04', '2022-01-08 12:39:04'),
(167, 'Eka Ari Nanda', NULL, NULL, '$2y$10$/qbVI.SXOFtflOefT.YR0e2fb65dbfcjmw7nqgHnBwLZF82LWW7pK', 'Ons1', 5, 16, NULL, '2022-01-08 12:39:36', '2022-01-08 12:39:36'),
(168, 'Imam M', NULL, NULL, '$2y$10$wzF8hKSHHaXaJb64wuHw.Ov0SLemR.odds/HGosIRjiC7X4PJMcDW', 'Echannel1', 5, 17, NULL, '2022-01-08 12:40:10', '2022-01-08 12:40:10'),
(169, 'Tri Basten', NULL, NULL, '$2y$10$oVteuSdSaqLKraH..NyBsO5urxXm/gqPr8PgdlivnYctI1eXS8Kuq', 'Cro1', 5, 18, NULL, '2022-01-08 12:40:41', '2022-01-08 12:40:41'),
(170, 'Fitra', NULL, NULL, '$2y$10$sVHey4ZmK8s.dJFEf.winezhXV0dhxCNkMEBm6bu/2dKsfUFXwYdW', 'Cra1', 5, 20, NULL, '2022-01-08 12:41:33', '2022-01-08 12:41:33'),
(171, 'Metty', NULL, NULL, '$2y$10$r.t8Ws19Ko/pwaYxx5nbnOqYbCY5Qd5VIpGIWR.Hzp.OL6t18gPGK', 'Crr1', 5, 21, NULL, '2022-01-08 12:42:10', '2022-01-08 12:42:10'),
(173, 'Surya A', NULL, NULL, '$2y$10$j0rtfJBFiAlfvGmlznV/xOWIT4sf2p9oqsi2KT8y6iOG6pVjGyaf6', 'Hcbp2', 4, 3, NULL, '2022-01-08 18:54:17', '2022-01-08 18:54:17'),
(176, 'Mario V', NULL, NULL, '$2y$10$ybn5veCIpzSVc5SwQkhTVelyDV/qxKdtSG23UQYpV3SLjkr.mfx5C', 'Brilink2', 4, 7, NULL, '2022-01-08 18:55:57', '2022-01-08 18:55:57'),
(177, 'Dwi Atmoko', NULL, NULL, '$2y$10$cjd2Wm8cF90T1P8dXLWhWOl3DoMjJsDjt9KywbAdMBk9bym.Hlg6C', 'Sei2', 4, 8, NULL, '2022-01-08 18:56:31', '2022-01-08 18:56:31'),
(178, 'T Dhany', NULL, NULL, '$2y$10$ESqivCgSGB6nIRA6o1ny.uDxMVs.jPtVk7ww6pKn9jbdvv7PyMMN6', 'Small2', 4, 9, NULL, '2022-01-08 18:57:41', '2022-01-08 18:57:41'),
(179, 'Dwi Yuliana', NULL, NULL, '$2y$10$/m07Qv1bZQNecCTcxzrvdO5kuAlF8uY7VdE.u5SAUGXCkEnFshD6K', 'Trb2', 4, 10, NULL, '2022-01-08 18:58:12', '2022-01-08 18:58:12'),
(180, 'Lundu Patar', NULL, NULL, '$2y$10$falZ1b/RGZvmwv/ZjOAnsOc0dgRyiwTCNbYaKtZE/pSguPHyVuqx6', 'Medium2', 4, 11, NULL, '2022-01-08 18:58:54', '2022-01-08 18:58:54'),
(181, 'Enrico J', NULL, NULL, '$2y$10$vFEvPw0PP8Fcai0ULCONmOpGRJ8kwIUGxIoyO3fgmclubwp3MBC.G', 'Consumer2', 4, 12, NULL, '2022-01-08 18:59:24', '2022-01-08 18:59:24'),
(182, 'Merdhy', NULL, NULL, '$2y$10$4hkAkvYxs/cm4ljdh8NkeOSLDUqTEehVcc74te4kuY72iRYCtn986', 'Mfd2', 4, 13, NULL, '2022-01-08 18:59:50', '2022-01-08 18:59:50'),
(183, 'Holong S', NULL, NULL, '$2y$10$8oETUY1P0ZubCvmEPa6U8u2jzXy71D322mqtDGZgD8oPbv7Wu3jAu', 'Rtc2', 4, 14, NULL, '2022-01-08 19:00:12', '2022-01-08 19:00:12'),
(184, 'Doni Molana', NULL, NULL, '$2y$10$wDLmENN2M1jOZgIsfpn6ZeIuHdsdPfnwJLNRRlH/4D09BT1aYfmXe', 'Logistic2', 4, 15, NULL, '2022-01-08 19:00:38', '2022-01-08 19:00:38'),
(185, 'M Ikhsan Dody', NULL, NULL, '$2y$10$d.YAGtWG9i0ux527G7hpwOTcF2fvdZL1/EJFtp2Wto5G4vHIM.fky', 'Ons2', 4, 16, NULL, '2022-01-08 19:01:16', '2022-01-08 19:01:16'),
(187, 'Siti Bressy', NULL, NULL, '$2y$10$N2bgv9WNjmgmfQZkXAI3c.Ey6Z7yk5TgkgauF/7xWYoFmlJYsWdVu', 'Cro2', 4, 18, NULL, '2022-01-08 19:02:06', '2022-01-08 19:02:06'),
(188, 'Hardy S', NULL, NULL, '$2y$10$.KC2S3whZ8nL/9j0scxsXepbzfLtyVfM5BH0JKZ3kFOuyCvsGZQk6', 'Cra2', 4, 20, NULL, '2022-01-08 19:02:41', '2022-01-08 19:02:41'),
(189, 'Adrian Hutabarat', NULL, NULL, '$2y$10$pVfVQWbaFQgmfHwfbp6AcO1.DtP209QrAMxq4ZU4OEjlVfHgVes0G', 'Crr2', 4, 21, NULL, '2022-01-08 19:03:22', '2022-01-08 19:03:22'),
(190, 'Zulham', NULL, NULL, '$2y$10$47LL6najV0LnIex1zCE3VeAA1F9EvrqGv.6Mrzx2HUWCkBFo.i/OC', 'Rrm', 2, 1, NULL, '2022-01-10 11:22:18', '2022-01-10 11:22:18'),
(193, 'Budhi Novianto', NULL, NULL, '$2y$10$uknbDivW0hW8gKqwmfOILuTq7QbjOIh.SZxA7NBq/pTKhRd8QxUSm', '7494', 1, 1, NULL, '2022-01-14 19:32:53', '2022-01-14 19:32:53'),
(194, 'Barkah Mulyatno', NULL, NULL, '$2y$10$23KQ7iqU/CZx8b.kyM51xezuD7RyLmsftQvTDe3Ub63PjAeff6Rc.', '15299', 2, 1, NULL, '2022-01-14 19:36:10', '2022-01-14 19:36:10'),
(195, 'Ayatna Anang Widodo', NULL, NULL, '$2y$10$d827EmkOGqdbwJv9XOTSxuTeux3Q/sTlQcKylQeaTQa7yJHvmHzca', '20743', 2, 1, NULL, '2022-01-14 19:38:45', '2022-01-14 19:38:45'),
(196, 'Oscar Hutagaol', NULL, NULL, '$2y$10$xPftkL/5EjZTcT2KyuAdSucUv0W.Pk3POMXdAHAPFbcBtvwAfhiqi', '1505', 2, 1, NULL, '2022-01-14 19:40:40', '2022-01-14 19:40:40'),
(197, 'Moh. Harsono', NULL, NULL, '$2y$10$l.rG8dgj0l9grIJB/.eohuAEf3qDSvZiPczVAL8dhQ8XxmXvUvga.', '26563', 2, 1, NULL, '2022-01-14 19:42:30', '2022-01-14 19:42:30'),
(198, 'Elga Yogaswara', NULL, NULL, '$2y$10$UUOXcdB3gpfHKyhWa2QxUesBetsqqj4fXKQQ.FGRTiRFLM2BKgcQi', '065590', 2, 1, NULL, '2022-01-14 19:44:49', '2022-01-14 19:44:49'),
(200, 'Dwi Heriyanto', NULL, NULL, '$2y$10$WgulNYM4MFYejYA6t6WV0ut8gBAAuMcGdEfUmhd5/1LNEihTxhC0m', '68451', 3, 17, NULL, '2022-01-14 19:50:37', '2022-01-14 19:50:37'),
(201, 'Hendra Noversa', NULL, NULL, '$2y$10$3Lp/Fl1gg9v5.LebGrXYreGOmOzV7mBe.F07DIHnDUW6N8fgPgLMy', '67956', 3, 18, NULL, '2022-01-14 19:51:51', '2022-01-14 19:51:51'),
(202, 'Doyo Ngestitomo', NULL, NULL, '$2y$10$slPM0UIQmE2coyhew143EOvD1Nk1cA49CV7r2bArB91L8XVvhB8eS', '67227', 3, 16, NULL, '2022-01-14 19:52:43', '2022-01-14 19:52:43'),
(203, 'Azwari', NULL, NULL, '$2y$10$A0oiCWXbnmMNNWm0KBqJfuNgUcWG4YnDw1VTNUwPd1Widn3JtTiX6', '2609', 3, 15, NULL, '2022-01-14 19:54:56', '2022-01-14 19:54:56'),
(204, 'David Maratur Fernando Sijabat', NULL, NULL, '$2y$10$SqZyJUZMDr3W/YVBiPLAtuBaCW0DjWTVRL4awpOkQb36T/LtbrbEu', '72322', 3, 2, NULL, '2022-01-14 19:56:27', '2022-01-14 19:56:27'),
(205, 'Banjar Ranuandityo', NULL, NULL, '$2y$10$EVpM1Iz/2UogX1MNRoYPNeVtWH70x2JCXDKDMvMRjiQZVM4BWJp7m', '68481', 3, 5, NULL, '2022-01-14 19:58:38', '2022-01-14 19:58:38'),
(206, 'Nyak Yusrizal', NULL, NULL, '$2y$10$MdNVCixZ4lcGwsevKG0OIuy/PBt1G3v9WoObgW3RzfO5W/UPx985i', '2135', 3, 21, NULL, '2022-01-14 20:00:00', '2022-01-14 20:00:00'),
(207, 'Elga Yogaswara', NULL, NULL, '$2y$10$96XZ85h1JnwZdJj2U3qKpOFc1p2OmINNNlCObW147Er9p3XEnca4y', '65590', 3, 20, NULL, '2022-01-14 20:01:02', '2022-01-14 20:01:02'),
(208, 'Henny Noverita Tamba', NULL, NULL, '$2y$10$zjNIuVFU7ttikQmTqGRX4e5P0uEOkIjmiy9F3rrwwqPlDZUtZcOxS', '2830', 3, 19, NULL, '2022-01-14 20:02:56', '2022-01-14 20:02:56'),
(209, 'Achmad Farouk', NULL, NULL, '$2y$10$ga.2aNnA7z6fopQIMUDUHubf2s2czFYVK/4VWTWdh5UpxilxagPiS', '70246', 3, 11, NULL, '2022-01-14 20:04:57', '2022-01-14 20:04:57'),
(210, 'Endo Refano', NULL, NULL, '$2y$10$gbUKEH5ljJgyaeLuVlZC/uVMl8hnWJBM5IwDxxf2N8STm1xUX/Gh6', '68445', 3, 9, NULL, '2022-01-14 20:06:52', '2022-01-14 20:06:52'),
(211, 'Satya Wardana', NULL, NULL, '$2y$10$6VmX/poLcmhXI3W/maA/KuyE43l9gWCBDg0wcUE5x1Or.0A4f1XoG', '70792', 3, 10, NULL, '2022-01-14 20:08:49', '2022-01-14 20:08:49'),
(212, 'Tinton Prima Setya', NULL, NULL, '$2y$10$WvxUMlmVherv3hNE8Y50ZuLdKNZetxHs60PwYBSM1JWzvOI5aX5iu', '70828', 3, 4, NULL, '2022-01-14 20:10:05', '2022-01-14 20:10:05'),
(213, 'Aditya Kharisma', NULL, NULL, '$2y$10$VcDrS4P3XsUUEeNULc7Xhu9WgmYaVUGBtyMK.enSYp5aTv7Z7Jiu2', '72438', 3, 12, NULL, '2022-01-14 20:10:47', '2022-01-14 20:10:47'),
(214, 'Nartha Simamora', NULL, NULL, '$2y$10$x8rbUpuJWWGgeGhA0YqTrO0amoXl7rWVFmGveFLbjwBDLWXJigFTa', '68894', 3, 13, NULL, '2022-01-14 20:11:30', '2022-01-14 20:11:30'),
(215, 'Adawiah Puspita Sari', NULL, NULL, '$2y$10$wBSnESTCJf11dsi7dnUCc.nuA7dmDeoUAUqwboO6B4bhqpgOSY8fK', '66963', 3, 14, NULL, '2022-01-14 20:12:35', '2022-01-14 20:12:35'),
(216, 'Pelantino', NULL, NULL, '$2y$10$t5J7S7hluBGxspwokfRwMeCQII/OicJd3wV0.dRPUQpgLuHL/g7DC', '6076', 3, 6, NULL, '2022-01-14 20:13:21', '2022-01-14 20:13:21'),
(217, 'Siska Lia Marico Barus', NULL, NULL, '$2y$10$Fy4Vy//tdDNpRMeRPCUQf.UP71j3EZmyK5TlmOFaA5FmrPa1iEy0e', '60558', 3, 8, NULL, '2022-01-14 20:14:06', '2022-01-14 20:14:06'),
(218, 'Feby Widhyarto', NULL, NULL, '$2y$10$AP.VHF1k3tuxw.12k1UYYeDcvOtcrIBSgjD2.xS7yuSJMBGSNjV5q', '68343', 3, 7, NULL, '2022-01-14 20:14:45', '2022-01-14 20:14:45'),
(220, 'Nurul Asna Innayah', NULL, NULL, '$2y$10$0Zvt773Lxt1bGlJnv1VgBOf1LbGywxl2R8KjNeCjHc1K8bIsI4VO6', '68308', 4, 4, NULL, '2022-01-16 22:51:38', '2022-01-16 22:51:38'),
(221, 'Komang Gde Pradnyana', NULL, NULL, '$2y$10$FO4mRvrpP92gYHDfune4oeGm1ISp2UJWgk4cvorsmbQcNtsw0Buqi', '72551', 4, 4, NULL, '2022-01-16 22:54:12', '2022-01-16 22:54:12'),
(222, 'Riana Sari', NULL, NULL, '$2y$10$VRlbzUSbOaC.jY8vL6b3eeqkXrtLLaYAJnXwDgEErNbfiqt4LwNZS', '52213', 4, 4, NULL, '2022-01-16 22:55:03', '2022-01-16 22:55:03'),
(223, 'Fachrizzu', NULL, NULL, '$2y$10$1ahRj7LrI/ZGUzYns.UjN.RMUiqPK83guEDMaDpdccyt1AZg24JVW', '143602', 4, 2, NULL, '2022-01-16 22:55:37', '2022-01-16 22:55:37'),
(224, 'Wahyu Nur Adjani Syahputri', NULL, NULL, '$2y$10$8pXSJ3CAfDAZquXdWB8uAONICzZKCkavoJTQF4hdO.kE0ETUcx3Km', '143733', 4, 2, NULL, '2022-01-16 22:56:47', '2022-01-16 22:56:47'),
(225, 'Ismail Ghafur Daulay', NULL, NULL, '$2y$10$00h5gjKY5QKjuRtoF2OAteB2Y0ZLoYMWyBAzE1i15O9PzouGpeoq.', '63215', 4, 2, NULL, '2022-01-16 22:57:25', '2022-01-16 22:57:25'),
(226, 'David Dwi Khrisandy', NULL, NULL, '$2y$10$rgM4obN0gAu5HRCeBqq1H.Bv6EZV9jgYw5IB/U1bXVmrEZUTiy2um', '127336', 4, 5, NULL, '2022-01-16 22:58:19', '2022-01-16 22:58:19'),
(227, 'MHD. Khalid Lubis', NULL, NULL, '$2y$10$75F8szZdDAqTLUCEx1wIe.kaUGqttcN6UGDkYqBJ4SXA6ThnAaLwi', '143715', 4, 17, NULL, '2022-01-16 23:00:45', '2022-01-16 23:00:45'),
(228, 'Muhammad Ridwan Hidayatullah', NULL, NULL, '$2y$10$Zz31XgQdsGW2eONulLSULeZuGPmqKxLUmtodOGj8KAGbDSNyt4T8y', '86151', 4, 17, NULL, '2022-01-16 23:01:27', '2022-01-16 23:01:27'),
(229, 'Muhammad Arief Pohan', NULL, NULL, '$2y$10$0dE6lgRsUbdEUi3w1wMOkeUXG8gNBvvdoZ8Mott6IdHCpfvar.SF.', '61714', 4, 17, NULL, '2022-01-16 23:02:49', '2022-01-16 23:02:49'),
(230, 'Akhbar Habibi', NULL, NULL, '$2y$10$/HGw9dgHDD2xTUiOim3o.u31VzKMjYRr8TC1aMqH26MTyLLB.CYaa', '231026', 4, 17, NULL, '2022-01-16 23:03:21', '2022-01-16 23:03:21'),
(231, 'Endang Wahyudi', NULL, NULL, '$2y$10$zFFMs7zduZ9qZLsYLR/K/.n5tSeuXp1PLKX0jaf7MgqHVy0NjVINW', '60487', 4, 17, NULL, '2022-01-16 23:03:59', '2022-01-16 23:03:59'),
(232, 'Dicky Wahyudi', NULL, NULL, '$2y$10$WTIoMfSz5j/0R.e25gDCvuVQeS2EUCb0IehLpcBKDDu27V5REIeGG', '148362', 4, 18, NULL, '2022-01-16 23:04:38', '2022-01-16 23:04:38'),
(233, 'Siti Bressy Mita Selly Rambey', NULL, NULL, '$2y$10$85pxOrOIsUsk3kRQ0W849ODt1e11vPnrqd58I4Si39OXfo1JxhmIe', '50456', 4, 18, NULL, '2022-01-16 23:05:15', '2022-01-16 23:05:15'),
(234, 'newReghead', NULL, NULL, '$2y$10$gfB0gk3LfzvOt9VMQ3tKwOwPTOvbF8sgRGM3aHLjLBn51S3gPb58K', 'newReghead', 2, 1, NULL, '2022-01-17 13:29:53', '2022-01-17 13:37:28'),
(235, 'test', NULL, NULL, '$2y$10$WLCFOgaGFZswACh1wa3gsu1AzTnSQvvlMVOlZS80cwjNz9BcQ07.G', 'test', 1, 1, NULL, '2022-01-20 13:33:29', '2022-01-20 13:33:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUser` (`idUser`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCeo` (`idCeo`),
  ADD KEY `idHeadDivisi` (`idRegHead`),
  ADD KEY `idDivHead` (`idDivHead`),
  ADD KEY `idSecHead` (`idSecHead`);

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
-- Indexes for table `regionalhead_cred`
--
ALTER TABLE `regionalhead_cred`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idRegionalhead` (`idUser`),
  ADD KEY `idDivisi` (`idDivisi`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idDivisi` (`idDivisi`),
  ADD KEY `task_ibfk_3` (`idUserAsPic`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `usertable`
--
ALTER TABLE `usertable`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `idDIvisi` (`idDivisi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=340;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `regionalhead_cred`
--
ALTER TABLE `regionalhead_cred`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usertable`
--
ALTER TABLE `usertable`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=236;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `log_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `usertable` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_3` FOREIGN KEY (`idCeo`) REFERENCES `usertable` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `message_ibfk_4` FOREIGN KEY (`idRegHead`) REFERENCES `usertable` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `message_ibfk_5` FOREIGN KEY (`idDivHead`) REFERENCES `usertable` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `message_ibfk_6` FOREIGN KEY (`idSecHead`) REFERENCES `usertable` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `regionalhead_cred`
--
ALTER TABLE `regionalhead_cred`
  ADD CONSTRAINT `regionalhead_cred_ibfk_2` FOREIGN KEY (`idDivisi`) REFERENCES `divisi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `regionalhead_cred_ibfk_3` FOREIGN KEY (`idUser`) REFERENCES `usertable` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `task_ibfk_2` FOREIGN KEY (`idDivisi`) REFERENCES `divisi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `task_ibfk_3` FOREIGN KEY (`idUserAsPic`) REFERENCES `usertable` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `usertable`
--
ALTER TABLE `usertable`
  ADD CONSTRAINT `usertable_ibfk_1` FOREIGN KEY (`idDivisi`) REFERENCES `divisi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
