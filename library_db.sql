-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2023 at 03:40 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(60) NOT NULL,
  `password` varchar(150) NOT NULL,
  `username` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `adminName`, `password`, `username`, `email`, `photo`) VALUES
(1, 'Nwachi', '1234', 'fozzy', 'fozzyington@gmail.com', '2086_1527169280.png'),
(3, 'Vanessa Smith', '1234', 'smith', 'vanessa@gmail.com', 'posts-images/7197_1531096754.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `audit_logs_admin`
--

CREATE TABLE `audit_logs_admin` (
  `audit_id` int(100) NOT NULL,
  `adminId` int(11) NOT NULL,
  `audit_logs` varchar(100) NOT NULL,
  `audit_timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `audit_logs_admin`
--

INSERT INTO `audit_logs_admin` (`audit_id`, `adminId`, `audit_logs`, `audit_timestamp`) VALUES
(44, 1, 'Admin 1 (fozzy) logged in', '2023-12-27 14:34:04'),
(47, 1, 'Admin 1 (fozzy) logged in', '2023-12-27 14:58:34'),
(48, 1, 'Admin 1 (fozzy) logged out', '2023-12-27 15:03:25'),
(49, 1, 'Admin 1 (fozzy) logged in', '2023-12-27 15:03:29'),
(50, 1, 'Admin 1 (fozzy) logged out', '2023-12-27 15:03:43'),
(51, 1, 'Admin 1 (fozzy) logged in', '2023-12-27 15:04:02'),
(52, 1, 'Admin 1 (fozzy) logged out', '2023-12-27 15:12:33'),
(53, 1, 'Admin 1 (fozzy) logged in', '2023-12-27 15:12:58'),
(54, 1, 'Admin 1 (fozzy) logged out', '2023-12-27 15:19:51'),
(55, 1, 'Admin 1 (fozzy) logged in', '2023-12-27 15:20:09'),
(56, 1, 'Admin 1 (fozzy) logged out', '2023-12-27 15:27:26'),
(57, 1, 'Admin 1 (fozzy) logged in', '2023-12-27 15:27:31'),
(58, 1, 'Admin 1 (fozzy) logged out', '2023-12-27 15:27:47'),
(59, 1, 'Admin 1 (fozzy) logged in', '2023-12-27 15:28:17'),
(60, 1, 'Admin 1 (fozzy) logged out', '2023-12-27 15:33:04'),
(61, 1, 'Admin 1 (fozzy) logged in', '2023-12-27 15:33:20'),
(62, 1, 'Admin 1 (fozzy) logged out', '2023-12-27 15:33:33'),
(63, 1, 'Admin 1 (fozzy) logged in', '2023-12-27 15:36:38'),
(64, 1, 'Admin 1 (fozzy) logged out', '2023-12-27 15:41:53'),
(65, 1, 'Admin 1 (fozzy) logged in', '2023-12-27 15:42:08'),
(66, 1, 'Admin 1 (fozzy) logged out', '2023-12-27 15:42:42'),
(67, 1, 'Admin 1 (fozzy) logged in', '2023-12-27 15:42:58'),
(68, 1, 'Admin 1 (fozzy) logged out', '2023-12-27 15:54:27'),
(69, 1, 'Admin 1 (fozzy) logged in', '2023-12-27 15:54:47'),
(70, 1, 'Admin 1 (fozzy) logged out', '2023-12-27 16:03:37'),
(71, 1, 'Admin 1 (fozzy) logged in', '2023-12-27 16:04:08'),
(72, 1, 'Admin 1 (fozzy) logged out', '2023-12-27 16:12:25'),
(73, 1, 'Admin 1 (fozzy) logged in', '2023-12-27 16:12:49'),
(74, 1, 'Admin 1 (fozzy) logged out', '2023-12-27 16:27:07'),
(75, 1, 'Admin 1 (fozzy) logged in', '2023-12-27 16:27:13'),
(76, 1, 'Admin 1 (fozzy) logged out', '2023-12-27 16:30:28'),
(77, 1, 'Admin 1 (fozzy) logged in', '2023-12-27 16:30:33'),
(78, 1, 'Admin 1 (fozzy) logged out', '2023-12-27 16:33:35'),
(79, 1, 'Admin 1 (fozzy) logged in', '2023-12-27 16:34:21'),
(80, 1, 'Admin 1 (fozzy) logged out', '2023-12-27 16:36:39'),
(81, 1, 'Admin 1 (fozzy) logged in', '2023-12-27 16:36:44'),
(82, 1, 'Admin 1 (fozzy) logged out', '2023-12-27 16:45:23'),
(83, 1, 'Admin 1 (fozzy) logged in', '2023-12-27 16:45:42'),
(84, 1, 'Admin 1 (fozzy) logged out', '2023-12-27 16:49:28'),
(85, 1, 'Admin 1 (fozzy) logged in', '2023-12-27 16:49:48'),
(86, 1, 'Admin 1 (fozzy) logged out', '2023-12-27 16:50:43'),
(87, 1, 'Admin 1 (fozzy) logged in', '2023-12-27 16:51:00'),
(88, 1, 'Admin 1 (fozzy) logged out', '2023-12-27 16:57:29'),
(89, 1, 'Admin 1 (fozzy) logged in', '2023-12-27 16:57:43'),
(90, 1, 'Admin 1 (fozzy) logged out', '2023-12-27 16:59:21'),
(91, 1, 'Admin 1 (fozzy) logged in', '2023-12-27 16:59:26'),
(92, 1, 'Admin 1 (fozzy) logged out', '2023-12-27 17:02:49'),
(93, 1, 'Admin 1 (fozzy) logged in', '2023-12-27 17:03:08'),
(94, 1, 'Admin 1 (fozzy) logged out', '2023-12-27 17:14:29'),
(95, 1, 'Admin 1 (fozzy) logged in', '2023-12-27 17:14:48'),
(96, 1, 'Admin 1 (fozzy) logged out', '2023-12-27 17:15:56'),
(97, 1, 'Admin 1 (fozzy) logged in', '2023-12-27 17:16:14'),
(98, 1, 'Admin 1 (fozzy) logged out', '2023-12-27 17:17:11'),
(99, 1, 'Admin 1 (fozzy) logged in', '2023-12-27 17:24:41'),
(100, 1, 'Admin 1 (fozzy) logged out', '2023-12-27 17:37:57'),
(101, 1, 'Admin 1 (fozzy) logged in', '2023-12-27 17:38:24'),
(102, 1, 'Admin 1 (fozzy) logged out', '2023-12-27 17:41:47'),
(103, 1, 'Admin 1 (fozzy) logged in', '2023-12-27 17:42:22'),
(104, 1, 'Admin 1 (fozzy) logged out', '2023-12-27 17:44:32'),
(105, 1, 'Admin 1 (fozzy) logged in', '2023-12-27 17:44:36'),
(106, 1, 'Admin 1 (fozzy) logged out', '2023-12-27 17:48:08'),
(107, 1, 'Admin 1 (fozzy) logged in', '2023-12-27 17:48:30'),
(108, 1, 'Admin 1 (fozzy) logged out', '2023-12-27 17:52:13'),
(109, 1, 'Admin 1 (fozzy) logged in', '2023-12-27 17:52:36'),
(110, 1, 'Admin 1 (fozzy) logged out', '2023-12-27 17:55:45'),
(111, 1, 'Admin 1 (fozzy) logged in', '2023-12-27 17:56:30'),
(112, 1, 'Admin 1 (fozzy) logged out', '2023-12-27 18:17:43'),
(113, 1, 'Admin 1 (fozzy) logged in', '2023-12-27 18:18:13'),
(114, 1, 'Admin 1 (fozzy) logged out', '2023-12-27 18:27:50'),
(115, 1, 'Admin 1 (fozzy) logged in', '2023-12-27 18:27:59'),
(116, 1, 'Admin 1 (fozzy) logged out', '2023-12-27 18:32:28'),
(117, 1, 'Admin 1 (fozzy) logged in', '2023-12-27 18:32:56'),
(118, 1, 'Admin 1 (fozzy) logged out', '2023-12-27 18:36:58'),
(119, 1, 'Admin 1 (fozzy) logged in', '2023-12-27 18:38:04'),
(120, 1, 'Admin 1 (fozzy) logged out', '2023-12-27 18:42:39'),
(121, 1, 'Admin 1 (fozzy) logged in', '2023-12-27 18:44:22'),
(122, 1, 'Admin 1 (fozzy) logged out', '2023-12-27 18:44:30'),
(123, 1, 'Admin 1 (fozzy) logged in', '2023-12-27 18:44:55'),
(124, 1, 'Admin 1 (fozzy) logged out', '2023-12-27 18:46:51'),
(125, 1, 'Admin 1 (fozzy) logged in', '2023-12-27 18:47:20'),
(126, 1, 'Admin 1 (fozzy) logged out', '2023-12-27 21:14:27'),
(127, 1, 'Admin 1 (fozzy) logged in', '2023-12-27 21:24:26'),
(128, 1, 'Admin 1 (fozzy) logged out', '2023-12-27 21:24:57'),
(129, 1, 'Admin 1 (fozzy) logged in', '2023-12-27 21:25:12'),
(130, 1, 'Admin 1 (fozzy) logged out', '2023-12-27 21:29:53'),
(131, 1, 'Admin 1 (fozzy) logged in', '2023-12-27 21:30:01'),
(132, 1, 'Admin 1 (fozzy) logged out', '2023-12-27 21:42:28'),
(133, 1, 'Admin 1 (fozzy) logged in', '2023-12-27 21:42:34'),
(134, 1, 'Admin 1 (fozzy) logged out', '2023-12-27 21:49:44'),
(135, 1, 'Admin 1 (fozzy) logged in', '2023-12-27 21:49:49'),
(136, 1, 'Admin 1 (fozzy) logged out', '2023-12-27 21:52:01'),
(137, 1, 'Admin 1 (fozzy) logged in', '2023-12-27 21:52:05'),
(138, 1, 'Admin 1 (fozzy) logged out', '2023-12-27 22:00:15'),
(139, 1, 'Admin 1 (fozzy) logged in', '2023-12-27 22:00:44'),
(140, 1, 'Admin 1 (fozzy) logged out', '2023-12-27 22:04:00'),
(141, 1, 'Admin 1 (fozzy) logged in', '2023-12-27 22:04:04'),
(142, 1, 'Admin 1 (fozzy) logged out', '2023-12-27 22:05:27'),
(143, 1, 'Admin 1 (fozzy) logged in', '2023-12-27 22:05:33'),
(144, 1, 'Admin 1 (fozzy) logged out', '2023-12-27 22:23:11'),
(145, 1, 'Admin 1 (fozzy) logged in', '2023-12-27 22:23:15'),
(146, 1, 'Admin 1 (fozzy) logged out', '2023-12-27 22:23:29'),
(147, 1, 'Admin 1 (fozzy) logged in', '2023-12-27 22:23:36'),
(148, 1, 'Admin 1 (fozzy) logged out', '2023-12-27 22:29:06'),
(149, 1, 'Admin 1 (fozzy) logged in', '2023-12-27 22:29:12'),
(150, 1, 'Admin 1 (fozzy) logged out', '2023-12-27 22:43:03'),
(151, 1, 'Admin 1 (fozzy) logged in', '2023-12-27 22:43:07'),
(152, 1, 'Admin 1 (fozzy) logged out', '2023-12-27 22:50:23'),
(153, 1, 'Admin 1 (fozzy) logged in', '2023-12-27 22:50:31'),
(154, 1, 'Admin 1 (fozzy) logged out', '2023-12-27 22:55:16'),
(155, 1, 'Admin 1 (fozzy) logged in', '2023-12-27 22:55:20'),
(156, 1, 'Admin 1 (fozzy) logged out', '2023-12-27 23:32:40'),
(157, 1, 'Admin 1 (fozzy) logged in', '2023-12-27 23:32:45'),
(158, 1, 'Admin 1 (fozzy) logged out', '2023-12-27 23:48:54'),
(159, 1, 'Admin 1 (fozzy) logged in', '2023-12-27 23:48:59'),
(160, 1, 'Admin 1 (fozzy) logged out', '2023-12-27 23:57:22'),
(161, 1, 'Admin 1 (fozzy) logged in', '2023-12-28 00:00:29'),
(162, 1, 'Admin 1 (fozzy) logged out', '2023-12-28 00:01:10'),
(163, 1, 'Admin 1 (fozzy) logged in', '2023-12-28 00:03:19'),
(164, 1, 'Admin 1 (fozzy) logged out', '2023-12-28 00:05:23'),
(165, 1, 'Admin 1 (fozzy) logged in', '2023-12-28 00:21:07'),
(166, 1, 'Admin 1 (fozzy) logged out', '2023-12-28 00:22:44'),
(167, 1, 'Admin 1 (fozzy) logged in', '2023-12-28 00:26:08'),
(168, 1, 'Admin 1 (fozzy) logged out', '2023-12-28 00:46:40'),
(169, 1, 'Admin 1 (fozzy) logged in', '2023-12-28 00:46:59'),
(170, 1, 'Admin 1 (fozzy) logged out', '2023-12-28 00:49:10'),
(171, 1, 'Admin 1 (fozzy) logged in', '2023-12-28 00:49:41'),
(172, 1, 'Admin 1 (fozzy) logged out', '2023-12-28 00:53:31'),
(173, 1, 'Admin 1 (fozzy) logged in', '2023-12-28 00:53:56'),
(174, 1, 'Admin 1 (fozzy) logged out', '2023-12-28 00:57:33'),
(175, 1, 'Admin 1 (fozzy) logged in', '2023-12-28 00:58:02'),
(176, 1, 'Admin 1 (fozzy) logged out', '2023-12-28 01:06:29'),
(177, 1, 'Admin 1 (fozzy) logged in', '2023-12-28 01:06:58'),
(178, 1, 'Admin 1 (fozzy) logged out', '2023-12-28 01:19:25'),
(179, 1, 'Admin 1 (fozzy) logged in', '2023-12-28 01:40:46'),
(180, 1, 'Admin 1 (fozzy) logged out', '2023-12-28 01:45:29'),
(181, 1, 'Admin 1 (fozzy) logged in', '2023-12-28 01:45:43'),
(182, 1, 'Admin 1 (fozzy) logged out', '2023-12-28 01:45:59'),
(183, 1, 'Admin 1 (fozzy) logged in', '2023-12-28 01:46:19'),
(184, 1, 'Admin 1 (fozzy) logged out', '2023-12-28 02:00:11'),
(185, 1, 'Admin 1 (fozzy) logged in', '2023-12-28 02:00:18'),
(186, 1, 'Admin 1 (fozzy) logged out', '2023-12-28 02:02:31'),
(187, 1, 'Admin 1 (fozzy) logged in', '2023-12-28 02:02:36'),
(188, 1, 'Admin 1 (fozzy) logged out', '2023-12-28 02:13:48'),
(189, 1, 'Admin 1 (fozzy) logged in', '2023-12-28 02:13:54'),
(190, 1, 'Admin 1 (fozzy) logged out', '2023-12-28 02:15:33'),
(191, 1, 'Admin 1 (fozzy) logged in', '2023-12-28 02:15:37'),
(192, 1, 'Admin 1 (fozzy) logged out', '2023-12-28 02:25:10'),
(193, 1, 'Admin 1 (fozzy) logged in', '2023-12-28 02:25:40'),
(194, 1, 'Admin 1 (fozzy) logged out', '2023-12-28 02:28:28'),
(195, 1, 'Admin 1 (fozzy) logged in', '2023-12-28 02:28:48'),
(196, 1, 'Admin 1 (fozzy) logged out', '2023-12-28 02:31:23'),
(197, 1, 'Admin 1 (fozzy) logged in', '2023-12-28 02:31:42'),
(198, 1, 'Admin 1 (fozzy) logged out', '2023-12-28 02:35:12'),
(199, 1, 'Admin 1 (fozzy) logged in', '2023-12-28 02:35:30'),
(200, 1, 'Admin 1 (fozzy) logged out', '2023-12-28 02:37:38'),
(201, 1, 'Admin 1 (fozzy) logged in', '2023-12-28 02:37:56'),
(202, 1, 'Admin 1 (fozzy) logged out', '2023-12-28 02:46:37'),
(203, 1, 'Admin 1 (fozzy) logged in', '2023-12-28 02:46:42'),
(204, 1, 'Admin 1 (fozzy) logged out', '2023-12-28 02:48:11'),
(205, 1, 'Admin 1 (fozzy) logged in', '2023-12-28 02:48:16'),
(206, 1, 'Admin 1 (fozzy) logged out', '2023-12-28 02:50:34'),
(207, 1, 'Admin 1 (fozzy) logged in', '2023-12-28 02:50:53'),
(208, 1, 'Admin 1 (fozzy) logged in', '2023-12-28 09:02:41'),
(209, 1, 'Admin 1 (fozzy) logged out', '2023-12-28 09:25:50'),
(210, 1, 'Admin 1 (fozzy) logged in', '2023-12-28 09:26:16'),
(211, 1, 'Admin 1 (fozzy) logged out', '2023-12-28 10:32:39'),
(212, 1, 'Admin 1 (fozzy) logged in', '2023-12-28 10:33:04'),
(213, 1, 'Admin 1 (fozzy) logged out', '2023-12-28 10:36:04'),
(214, 1, 'Admin 1 (fozzy) logged in', '2023-12-28 10:36:25');

-- --------------------------------------------------------

--
-- Table structure for table `audit_logs_books`
--

CREATE TABLE `audit_logs_books` (
  `auditId_books` int(11) NOT NULL,
  `bookId` int(11) NOT NULL,
  `action` varchar(255) NOT NULL,
  `audit_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `bookTitle` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `audit_logs_borrow`
--

CREATE TABLE `audit_logs_borrow` (
  `auditId_borrow` int(11) NOT NULL,
  `borrowId` int(11) NOT NULL,
  `action` varchar(255) NOT NULL,
  `audit_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `audit_logs_user`
--

CREATE TABLE `audit_logs_user` (
  `audit_id` int(100) NOT NULL,
  `studentId` int(11) NOT NULL,
  `audit_logs` varchar(100) NOT NULL,
  `audit_timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `audit_logs_user`
--

INSERT INTO `audit_logs_user` (`audit_id`, `studentId`, `audit_logs`, `audit_timestamp`) VALUES
(78, 8, 'Student 8 (notdanjo) logged in', '2023-12-27 16:12:39'),
(79, 8, 'User updated their password in their profile.', '2023-12-27 04:12:43'),
(80, 8, 'Student 8 (notdanjo) logged out', '2023-12-27 16:12:46'),
(81, 8, 'Student 8 (notdanjo) logged in', '2023-12-27 18:42:43'),
(82, 8, 'Student 8 (notdanjo) logged out', '2023-12-27 18:44:19'),
(83, 8, 'Student 8 (notdanjo) logged in', '2023-12-27 21:24:05'),
(84, 8, 'Student 8 (notdanjo) logged out', '2023-12-27 21:24:21'),
(85, 8, 'Student 8 (notdanjo) logged in', '2023-12-27 21:25:01'),
(86, 8, 'Student 8 (notdanjo) logged out', '2023-12-27 21:25:08'),
(87, 8, 'Student 8 (notdanjo) logged in', '2023-12-27 23:57:26'),
(88, 8, 'Student 8 (notdanjo) logged out', '2023-12-28 00:00:24'),
(89, 8, 'Student 8 (notdanjo) logged in', '2023-12-28 00:01:14'),
(90, 8, 'User updated their Matric No in their profile.', '2023-12-28 12:03:06'),
(91, 8, 'Student 8 (notdanjo) logged out', '2023-12-28 00:03:09'),
(92, 8, 'Student 8 (notdanjo) logged in', '2023-12-28 00:03:13'),
(93, 8, 'Student 8 (notdanjo) logged out', '2023-12-28 00:03:15'),
(94, 8, 'Student 8 (notdanjo) logged in', '2023-12-28 00:05:27'),
(95, 8, 'User updated their Student ID in their profile.', '2023-12-28 12:11:33'),
(96, 8, 'User updated their  in their profile.', '2023-12-28 12:14:45'),
(97, 8, 'User updated their Student ID in their profile.', '2023-12-28 12:20:46'),
(98, 8, 'Student 8 (notdanjo) logged out', '2023-12-28 00:21:03'),
(99, 8, 'Student 8 (notdanjo) logged in', '2023-12-28 00:22:48'),
(100, 8, 'Student 8 (notdanjo) logged out', '2023-12-28 00:26:03'),
(101, 8, 'Student 8 (notdanjo) logged in', '2023-12-28 00:46:44'),
(102, 8, 'Student 8 (notdanjo) logged out', '2023-12-28 00:46:54'),
(103, 8, 'Student 8 (notdanjo) logged in', '2023-12-28 00:49:15'),
(104, 8, 'Student 8 (notdanjo) logged out', '2023-12-28 00:49:36'),
(105, 8, 'Student 8 (notdanjo) logged in', '2023-12-28 00:53:35'),
(106, 8, 'Student 8 (notdanjo) logged out', '2023-12-28 00:53:52'),
(107, 8, 'Student 8 (notdanjo) logged in', '2023-12-28 00:57:36'),
(108, 8, 'Student 8 (notdanjo) logged out', '2023-12-28 00:57:59'),
(109, 8, 'Student 8 (notdanjo) logged in', '2023-12-28 01:06:40'),
(110, 8, 'Student 8 (notdanjo) logged out', '2023-12-28 01:06:53'),
(111, 8, 'Student 8 (notdanjo) logged in', '2023-12-28 01:19:31'),
(112, 8, 'Student 8 (notdanjo) logged out', '2023-12-28 01:40:41'),
(113, 8, 'Student 8 (notdanjo) logged in', '2023-12-28 01:45:34'),
(114, 8, 'Student 8 (notdanjo) logged out', '2023-12-28 01:45:40'),
(115, 8, 'Student 8 (notdanjo) logged in', '2023-12-28 01:46:04'),
(116, 8, 'Student 8 (notdanjo) logged out', '2023-12-28 01:46:14'),
(117, 8, 'Student 8 (notdanjo) logged in', '2023-12-28 02:25:21'),
(118, 8, 'Student 8 (notdanjo) logged out', '2023-12-28 02:25:35'),
(119, 8, 'Student 8 (notdanjo) logged in', '2023-12-28 02:28:33'),
(120, 8, 'Student 8 (notdanjo) logged out', '2023-12-28 02:28:44'),
(121, 8, 'Student 8 (notdanjo) logged in', '2023-12-28 02:31:29'),
(122, 8, 'Student 8 (notdanjo) logged out', '2023-12-28 02:31:39'),
(123, 8, 'Student 8 (notdanjo) logged in', '2023-12-28 02:35:17'),
(124, 8, 'Student 8 (notdanjo) logged out', '2023-12-28 02:35:27'),
(125, 8, 'Student 8 (notdanjo) logged in', '2023-12-28 02:37:43'),
(126, 8, 'Student 8 (notdanjo) logged out', '2023-12-28 02:37:52'),
(127, 8, 'Student 8 (notdanjo) logged in', '2023-12-28 02:50:41'),
(128, 8, 'Student 8 (notdanjo) logged out', '2023-12-28 02:50:49'),
(129, 8, 'Student 8 (notdanjo) logged in', '2023-12-28 09:25:54'),
(130, 8, 'Student 8 (notdanjo) logged out', '2023-12-28 09:26:11'),
(131, 8, 'Student 8 (notdanjo) logged in', '2023-12-28 10:32:49'),
(132, 8, 'Student 8 (notdanjo) logged out', '2023-12-28 10:33:00'),
(133, 8, 'Student 8 (notdanjo) logged in', '2023-12-28 10:36:12'),
(134, 8, 'Student 8 (notdanjo) logged out', '2023-12-28 10:36:21');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `bookId` int(11) NOT NULL,
  `bookTitle` varchar(150) NOT NULL,
  `author` varchar(60) NOT NULL,
  `ISBN` varchar(30) NOT NULL,
  `bookCopies` varchar(10) NOT NULL,
  `publisherName` varchar(60) NOT NULL,
  `available` varchar(10) NOT NULL,
  `categories` varchar(30) NOT NULL,
  `callNumber` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bookId`, `bookTitle`, `author`, `ISBN`, `bookCopies`, `publisherName`, `available`, `categories`, `callNumber`) VALUES
(5, 'How to Become a Billionaire', 'James Flitch', '1900-124-3242', '30', 'Robert Muller', 'YES', 'Morals', '0902334'),
(6, 'Oliver Twist', 'Charles Dickey', '123-423-4-13', '21', 'African Books.Inc', 'YES', 'Fairy Tail', '0216230.'),
(7, 'Death of a million starts 2', 'Breakthrough', '123', '33', 'Rexxon', 'YES', '123', '12');

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE `borrow` (
  `borrowId` int(11) NOT NULL,
  `memberName` varchar(255) NOT NULL,
  `matricNo` varchar(10) NOT NULL,
  `bookName` varchar(255) NOT NULL,
  `borrowDate` varchar(20) NOT NULL,
  `returnDate` varchar(20) NOT NULL,
  `bookId` int(2) DEFAULT NULL,
  `borrowStatus` int(2) NOT NULL,
  `fine` varchar(100) NOT NULL,
  `studentId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `newsId` int(11) NOT NULL,
  `announcement` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`newsId`, `announcement`) VALUES
(1, 'Welcome to Our Online Library Management System. You can have access to all our e-books at a really good affordable price!'),
(6, 'Man don\'t dance'),
(9, 'Godfrey Okoye is going Places');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `studentId` int(11) NOT NULL,
  `matric_no` varchar(30) NOT NULL,
  `password` varchar(150) NOT NULL,
  `username` varchar(150) NOT NULL,
  `email` varchar(60) NOT NULL,
  `dept` varchar(60) NOT NULL,
  `numOfBooks` int(11) NOT NULL,
  `moneyOwed` varchar(20) NOT NULL,
  `photo` text NOT NULL,
  `phoneNumber` varchar(11) NOT NULL,
  `name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`studentId`, `matric_no`, `password`, `username`, `email`, `dept`, `numOfBooks`, `moneyOwed`, `photo`, `phoneNumber`, `name`) VALUES
(1, 'ADSE-9835', '1234', 'bams', 'fuzzy245.in@gmail.com', 'Software Engineering', 2, '1500', '4477_1526321327.jpeg', '08124579655', 'Nwachinemere Ibeagi'),
(2, 'ADSE-9835', '1234', 'somty', 'somygee@gmail.com', 'Software Engineering', 2, '1234', '2093_1531223199.jpeg', '08124578966', 'Somtochukwu Ugwu'),
(6, 'ADSE-9831', '1234', 'kurtd', 'asdf@gmail.com', 'IT', 0, 'null', '7201_1702838507.jpeg', 'asdf@gmail.', 'asdf'),
(8, '2021-05541', '1234', 'notdanjo', 'tjesmale@gmail.com', 'Engineering', 0, 'null', '', '09198452235', 'Tom Jordan A. Esmale');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `audit_logs_admin`
--
ALTER TABLE `audit_logs_admin`
  ADD PRIMARY KEY (`audit_id`),
  ADD KEY `adminId` (`adminId`);

--
-- Indexes for table `audit_logs_books`
--
ALTER TABLE `audit_logs_books`
  ADD PRIMARY KEY (`auditId_books`),
  ADD KEY `bookId` (`bookId`);

--
-- Indexes for table `audit_logs_borrow`
--
ALTER TABLE `audit_logs_borrow`
  ADD PRIMARY KEY (`auditId_borrow`),
  ADD KEY `borrowId` (`borrowId`);

--
-- Indexes for table `audit_logs_user`
--
ALTER TABLE `audit_logs_user`
  ADD PRIMARY KEY (`audit_id`),
  ADD KEY `studentId` (`studentId`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bookId`);

--
-- Indexes for table `borrow`
--
ALTER TABLE `borrow`
  ADD PRIMARY KEY (`borrowId`),
  ADD KEY `bookId` (`bookId`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`newsId`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`studentId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `audit_logs_admin`
--
ALTER TABLE `audit_logs_admin`
  MODIFY `audit_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=215;

--
-- AUTO_INCREMENT for table `audit_logs_books`
--
ALTER TABLE `audit_logs_books`
  MODIFY `auditId_books` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `audit_logs_borrow`
--
ALTER TABLE `audit_logs_borrow`
  MODIFY `auditId_borrow` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `audit_logs_user`
--
ALTER TABLE `audit_logs_user`
  MODIFY `audit_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `bookId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `borrow`
--
ALTER TABLE `borrow`
  MODIFY `borrowId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `newsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `studentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `audit_logs_admin`
--
ALTER TABLE `audit_logs_admin`
  ADD CONSTRAINT `audit_logs_admin_ibfk_1` FOREIGN KEY (`adminId`) REFERENCES `admin` (`adminId`);

--
-- Constraints for table `audit_logs_books`
--
ALTER TABLE `audit_logs_books`
  ADD CONSTRAINT `audit_logs_books_ibfk_1` FOREIGN KEY (`bookId`) REFERENCES `books` (`bookId`);

--
-- Constraints for table `audit_logs_borrow`
--
ALTER TABLE `audit_logs_borrow`
  ADD CONSTRAINT `fk_borrow` FOREIGN KEY (`borrowId`) REFERENCES `borrow` (`borrowId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `audit_logs_user`
--
ALTER TABLE `audit_logs_user`
  ADD CONSTRAINT `audit_logs_user_ibfk_1` FOREIGN KEY (`studentId`) REFERENCES `students` (`studentId`);

--
-- Constraints for table `borrow`
--
ALTER TABLE `borrow`
  ADD CONSTRAINT `borrow_ibfk_1` FOREIGN KEY (`bookId`) REFERENCES `books` (`bookId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
