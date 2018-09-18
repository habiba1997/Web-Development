-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 18, 2018 at 11:50 AM
-- Server version: 10.1.34-MariaDB
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
-- Database: `WebCourse`
--

-- --------------------------------------------------------

--
-- Table structure for table `SignUp`
--

CREATE TABLE `SignUp` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Age` int(4) UNSIGNED NOT NULL,
  `Mobile` int(15) UNSIGNED NOT NULL,
  `Gender` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `SignUp`
--

INSERT INTO `SignUp` (`ID`, `Name`, `Email`, `Age`, `Mobile`, `Gender`) VALUES
(1, 'habibaahh', 'habibahmedmy@gmail.com', 26, 1151209, 'female'),
(2, 'Nabila', 'nabila@gmail.com', 60, 1005595018, 'female'),
(5, 'mahmoud', 'mahmoud@gmail.com', 25, 1151280901, 'male'),
(6, 'ali genedy', 'ali@gmail.com', 30, 1161279789, 'male'),
(8, 'ali', 'ali@gmail.com', 30, 1161279789, 'male'),
(9, 'samaa', 'samaa.mohamed@gmail.com', 8, 1151280910, 'female'),
(10, 'salah', 'adel@gmail.com', 5, 6, 'male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `SignUp`
--
ALTER TABLE `SignUp`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `SignUp`
--
ALTER TABLE `SignUp`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
