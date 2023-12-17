-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2023 at 09:07 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
(1, 3, 'Admin 3 logged in', '2023-12-17 04:41:17'),
(2, 3, 'Admin 3 logged in', '2023-12-17 06:40:12'),
(3, 3, 'Admin 3 logged in', '2023-12-17 06:41:07');

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
(1, 'Nwachinemere Ibeagi', 'ADSE-9835', 'Oliver Twist', '', '', 6, 0, '591210', 0),
(2, 'Nwachinemere Ibeagi', 'ADSE-9835', 'Death of a million starts', '2023-12-16', '2023-12-19', 7, 0, '', 0);

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
(2, 'ADSE-9835', '1234', 'somty', 'somygee@gmail.com', 'Software Engineering', 2, '1234', '2093_1531223199.jpeg', '08124578966', 'Somtochukwu Ugwu');

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
  MODIFY `audit_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `audit_logs_user`
--
ALTER TABLE `audit_logs_user`
  MODIFY `audit_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `borrow`
--
ALTER TABLE `borrow`
  MODIFY `borrowId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `newsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `studentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `audit_logs_admin`
--
ALTER TABLE `audit_logs_admin`
  ADD CONSTRAINT `audit_logs_admin_ibfk_1` FOREIGN KEY (`adminId`) REFERENCES `admin` (`adminId`);

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
