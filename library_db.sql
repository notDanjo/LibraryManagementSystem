-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2023 at 11:52 AM
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
(125, 1, 'Admin 1 (fozzy) logged in', '2023-12-27 18:47:20');

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

--
-- Dumping data for table `audit_logs_books`
--

INSERT INTO `audit_logs_books` (`auditId_books`, `bookId`, `action`, `audit_timestamp`, `bookTitle`) VALUES
(54, 25, 'Book added: The Invisible Life of Addie LaRue', '2023-12-27 10:47:34', 'The Invisible Life of Addie LaRue'),
(55, 25, 'Book with title: The Invisible Life of Addie LaRue was removed', '2023-12-27 10:47:58', 'The Invisible Life of Addie LaRue');

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
(82, 8, 'Student 8 (notdanjo) logged out', '2023-12-27 18:44:19');

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
(6, 'Oliver Twist', 'Charles Dickey', '123-423-4-13', '12', 'African Books.Inc', 'YES', 'Fairy Tail', '0216230.'),
(7, 'Death of a million starts', 'Breakthrough', '123', '3', 'Rexxon', 'YES', '123', '12');

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

--
-- Dumping data for table `borrow`
--

INSERT INTO `borrow` (`borrowId`, `memberName`, `matricNo`, `bookName`, `borrowDate`, `returnDate`, `bookId`, `borrowStatus`, `fine`, `studentId`) VALUES
(1, 'Nwachinemere Ibeagi', 'ADSE-9835', 'Oliver Twist', '', '', 6, 0, 'Paid', 0),
(2, 'Nwachinemere Ibeagi', 'ADSE-9835', 'Death of a million starts', '2023-12-16', '2023-12-19', 7, 0, 'Paid', 0),
(3, 'Tom Jordan A. Esmale', 'BSIT-3F', 'How to Become a Billionaire', '2023-12-19', '2023-12-20', 5, 0, '0', 0);

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
(8, 'BSIT-3F', '1234', 'notdanjo', 'tjesmale@gmail.com', 'Engineering', 0, 'null', '', '09198452235', 'Tom Jordan A. Esmale');

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
  MODIFY `audit_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `audit_logs_books`
--
ALTER TABLE `audit_logs_books`
  MODIFY `auditId_books` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `audit_logs_borrow`
--
ALTER TABLE `audit_logs_borrow`
  MODIFY `auditId_borrow` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `audit_logs_user`
--
ALTER TABLE `audit_logs_user`
  MODIFY `audit_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `bookId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `borrow`
--
ALTER TABLE `borrow`
  MODIFY `borrowId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  ADD CONSTRAINT `audit_logs_borrow_ibfk_1` FOREIGN KEY (`borrowId`) REFERENCES `borrow` (`borrowId`);

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
