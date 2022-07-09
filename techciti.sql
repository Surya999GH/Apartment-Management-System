-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2022 at 01:05 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `techciti`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookrest`
--

CREATE TABLE `bookrest` (
  `ApartmentNo` varchar(10) NOT NULL,
  `Gmail` varchar(30) NOT NULL,
  `CustomerName` varchar(25) NOT NULL,
  `NoOfTables` int(11) NOT NULL,
  `MobileNo` bigint(11) NOT NULL,
  `BookingCharges` int(11) NOT NULL,
  `BookingDate` date NOT NULL,
  `BookedDate` date NOT NULL,
  `CardNo` bigint(20) NOT NULL,
  `PayMobileNo` bigint(11) NOT NULL,
  `Status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookrest`
--

INSERT INTO `bookrest` (`ApartmentNo`, `Gmail`, `CustomerName`, `NoOfTables`, `MobileNo`, `BookingCharges`, `BookingDate`, `BookedDate`, `CardNo`, `PayMobileNo`, `Status`) VALUES
('99', 'surendragattem2001@gmail.com', 'Surya', 2, 9390859898, 500, '2022-03-09', '2022-03-01', 1254125412541254, 9390859898, 'Success');

-- --------------------------------------------------------

--
-- Table structure for table `booktaxi`
--

CREATE TABLE `booktaxi` (
  `ApartmentNo` varchar(10) NOT NULL,
  `Gmail` varchar(30) NOT NULL,
  `MobileNo` bigint(11) NOT NULL,
  `BookingDate` date NOT NULL,
  `BookedDate` date NOT NULL,
  `Amount` int(11) NOT NULL,
  `CardNo` bigint(20) NOT NULL,
  `PayMobileNo` bigint(11) NOT NULL,
  `Status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booktaxi`
--

INSERT INTO `booktaxi` (`ApartmentNo`, `Gmail`, `MobileNo`, `BookingDate`, `BookedDate`, `Amount`, `CardNo`, `PayMobileNo`, `Status`) VALUES
('99', 'surendragattem2001@gmail.com', 9390859898, '2022-03-09', '2022-03-01', 100, 1254125412541254, 9390859898, 'Success'),
('99', 'surendragattem2001@gmail.com', 9390859898, '2022-03-10', '2022-03-01', 100, 1254125412541254, 9390859898, 'Success');

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `ApartmentNo` varchar(10) NOT NULL,
  `UserName` varchar(30) NOT NULL,
  `Sector` varchar(15) NOT NULL,
  `Problem` varchar(100) NOT NULL,
  `Date` date NOT NULL,
  `Status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`ApartmentNo`, `UserName`, `Sector`, `Problem`, `Date`, `Status`) VALUES
('99', 'Surya', 'Electricity', 'Switch boards are not working', '2022-02-28', 'Solved'),
('99', 'Surya', 'Water', 'Water Pipes are broken.', '2022-03-02', 'Solved'),
('99', 'Surya', 'HouseHolds', 'The window door is broken.', '2022-03-02', 'Solved'),
('75', 'Avinash', 'Cleaning', 'No Cleaning', '2022-03-02', 'Solved'),
('99', 'Surya', 'Cleaning', 'Not Good\r\n', '2022-03-03', 'Solved');

-- --------------------------------------------------------

--
-- Table structure for table `currentbill`
--

CREATE TABLE `currentbill` (
  `ApartmentNo` varchar(10) NOT NULL,
  `Gmail` varchar(30) NOT NULL,
  `State` varchar(25) NOT NULL,
  `ServiceProvider` varchar(40) NOT NULL,
  `ConsumerNo` varchar(25) NOT NULL,
  `Amount` int(11) NOT NULL,
  `Date` date NOT NULL,
  `CardNo` bigint(20) NOT NULL,
  `PayMobileNo` bigint(11) NOT NULL,
  `Status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `currentbill`
--

INSERT INTO `currentbill` (`ApartmentNo`, `Gmail`, `State`, `ServiceProvider`, `ConsumerNo`, `Amount`, `Date`, `CardNo`, `PayMobileNo`, `Status`) VALUES
('99', 'surendragattem2001@gmail.com', 'Andhra Pradesh', 'Estern Power Dirtribution', '113344G601001356', 454, '2022-03-03', 1254125412541254, 9390859898, 'Success');

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `Image` mediumblob NOT NULL,
  `Title` varchar(30) NOT NULL,
  `Information` varchar(250) NOT NULL,
  `Sector` varchar(25) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`Image`, `Title`, `Information`, `Sector`, `Date`) VALUES
(0x537061332e6a7067, 'Be Relaxed', 'We have provided the outdoor relaxing facility for our customers.', 'Spa', '2022-03-15'),
(0x537061342e6a7067, 'Best Beds', '123', 'Spa', '2022-03-15'),
(0x537061322e6a7067, 'Relaxed Facial Masaz', 'Here we have provided the facility to get relaxed in our spa having the facial masaz.', 'Spa', '2022-03-15'),
(0x52657374352e706e67, 'Top Chefs', 'We got the best Chefs in our circle.We encourage professionals who are skilled, passionate about the trade and innovative in their creations.', 'Restaurant', '2022-03-01'),
(0x537061352e6a7067, 'Women Spa', 'We treat our customers very politely.', 'Spa', '2022-03-15');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `ApartmentNo` varchar(10) NOT NULL,
  `FName` varchar(25) NOT NULL,
  `LName` varchar(15) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `DateOfBirth` date NOT NULL,
  `Photo` blob NOT NULL,
  `Gender` varchar(7) NOT NULL,
  `Phone` bigint(20) NOT NULL,
  `Pass` varchar(16) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`ApartmentNo`, `FName`, `LName`, `Email`, `DateOfBirth`, `Photo`, `Gender`, `Phone`, `Pass`, `Date`) VALUES
('207', 'vignesh', 'usirika', 'xououx@gmail.com', '2022-03-02', 0x4261636b79617264706f6f6c2e6a7067, 'Male', 6300271624, '6300271684', '2022-03-02'),
('56', 'Surya', 'Gattem', 'surendrashadow@gmail.com', '2022-03-16', 0x52657374352e706e67, 'Male', 9390859898, 'ABC', '2022-03-16'),
('75', 'Avinash', 'Vadlamudi', 'avinashvadlamudi49@gmail.com', '2022-03-02', 0x537061352e6a7067, 'Male', 9390822817, 'Avinash@143', '2022-03-02'),
('9', 'Surya', 'Gattem', 'admin@gmail.com', '2022-03-01', 0x414345312e706e67, 'Male', 9390859898, 'Admin', '2022-03-01'),
('99', 'Surya', 'Gattem', 'surendragattem2001@gmail.com', '2022-02-28', 0x4143452e706e67, 'Male', 9390859898, 'Surendra', '2022-02-28');

-- --------------------------------------------------------

--
-- Table structure for table `waterbill`
--

CREATE TABLE `waterbill` (
  `ApartmentNo` varchar(10) NOT NULL,
  `Gmail` varchar(30) NOT NULL,
  `State` varchar(25) NOT NULL,
  `Board` varchar(40) NOT NULL,
  `RRNumber` varchar(25) NOT NULL,
  `Amount` int(11) NOT NULL,
  `Date` date NOT NULL,
  `CardNo` bigint(20) NOT NULL,
  `PayMobileNo` bigint(11) NOT NULL,
  `Status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `waterbill`
--

INSERT INTO `waterbill` (`ApartmentNo`, `Gmail`, `State`, `Board`, `RRNumber`, `Amount`, `Date`, `CardNo`, `PayMobileNo`, `Status`) VALUES
('99', 'surendragattem2001@gmail.com', 'Andhra Pradesh', 'GWMC', '5456464', 450, '2022-03-01', 1254125412541254, 9390859898, 'Success');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookrest`
--
ALTER TABLE `bookrest`
  ADD PRIMARY KEY (`ApartmentNo`,`BookingDate`);

--
-- Indexes for table `booktaxi`
--
ALTER TABLE `booktaxi`
  ADD PRIMARY KEY (`BookingDate`,`MobileNo`);

--
-- Indexes for table `currentbill`
--
ALTER TABLE `currentbill`
  ADD PRIMARY KEY (`ApartmentNo`,`Date`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`Title`,`Sector`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`ApartmentNo`);

--
-- Indexes for table `waterbill`
--
ALTER TABLE `waterbill`
  ADD PRIMARY KEY (`ApartmentNo`,`Date`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
