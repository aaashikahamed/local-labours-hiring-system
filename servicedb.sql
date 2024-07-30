-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2024 at 09:39 PM
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
-- Database: `servicedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `service_request`
--

CREATE TABLE `service_request` (
  `request_no` int(11) NOT NULL,
  `Consumer_emailid` varchar(200) NOT NULL,
  `Provider_emailid` varchar(200) NOT NULL,
  `Service_id` int(11) NOT NULL,
  `Fdate` date NOT NULL,
  `Tdate` date NOT NULL,
  `Request_date` date NOT NULL,
  `Request_time` time NOT NULL,
  `Status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `service_request`
--

INSERT INTO `service_request` (`request_no`, `Consumer_emailid`, `Provider_emailid`, `Service_id`, `Fdate`, `Tdate`, `Request_date`, `Request_time`, `Status`) VALUES
(2, 'abcd1@gmail.com', 'abcd@gmail.com', 1, '2024-07-04', '2024-07-25', '2024-07-23', '05:20:01', 'Accept'),
(7, 'customer@gmail.com', 'abcd@gmail.com', 1, '2024-07-28', '2024-07-30', '2024-07-23', '10:46:30', 'Pending'),
(10, 'customer@gmail.com', 'abcd@gmail.com', 1, '2024-08-29', '2024-09-26', '2024-07-24', '12:09:02', 'Pending'),
(6, 'customer@gmail.com', 'provider@gmail.com', 1, '2024-07-24', '2024-07-26', '2024-07-23', '10:25:13', 'Accept'),
(8, 'customer@gmail.com', 'provider@gmail.com', 2, '2024-07-31', '2024-07-31', '2024-07-23', '11:40:36', 'Reject');

-- --------------------------------------------------------

--
-- Table structure for table `service_table`
--

CREATE TABLE `service_table` (
  `Provider_emailid` varchar(100) NOT NULL,
  `Service_Id` int(11) NOT NULL,
  `Service_Name` varchar(200) NOT NULL,
  `provider_name` varchar(200) NOT NULL,
  `Specification` varchar(200) NOT NULL,
  `Built_date` date NOT NULL,
  `country` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `pic1` varchar(100) NOT NULL,
  `pic2` varchar(100) NOT NULL,
  `pic3` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `service_table`
--

INSERT INTO `service_table` (`Provider_emailid`, `Service_Id`, `Service_Name`, `provider_name`, `Specification`, `Built_date`, `country`, `state`, `city`, `address`, `pincode`, `pic1`, `pic2`, `pic3`) VALUES
('abcd@gmail.com', 1, 'Electrician', 'abcd', 'something', '2024-07-16', 'India', 'Gujarat', 'Dahod', 'asdf', 'asdf', '94751234567_1_1.png', '94751234567_1_2.png', '94751234567_1_3.png'),
('provider@gmail.com', 1, 'House Cleaning', 'asdfasdf', 'sadf', '2000-02-12', 'India', 'Gujarat', 'Dahod', 'asdfasd', '1234', '1234567890_1_1.png', '1234567890_1_2.png', '1234567890_1_3.png'),
('provider@gmail.com', 2, 'House Cleaning', 'something', 'something', '2024-07-03', 'India', 'Gujarat', 'Dahod', 'something', '234', '1234567890_2_1.png', '1234567890_2_2.png', '1234567890_2_3.png');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `First_Name` varchar(100) NOT NULL,
  `Middle_Name` varchar(100) NOT NULL,
  `Last_Name` varchar(100) NOT NULL,
  `Gender` varchar(20) NOT NULL,
  `Birth_date` date NOT NULL,
  `Mobile_No` varchar(20) NOT NULL,
  `LL_No` varchar(20) NOT NULL,
  `Country` varchar(100) NOT NULL,
  `State` varchar(100) NOT NULL,
  `City` varchar(100) NOT NULL,
  `Address` varchar(1000) NOT NULL,
  `Pincode` varchar(10) NOT NULL,
  `Question` varchar(200) NOT NULL,
  `Answer` varchar(100) NOT NULL,
  `Photo` varchar(50) NOT NULL,
  `Email_id` varchar(100) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Register_As` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`First_Name`, `Middle_Name`, `Last_Name`, `Gender`, `Birth_date`, `Mobile_No`, `LL_No`, `Country`, `State`, `City`, `Address`, `Pincode`, `Question`, `Answer`, `Photo`, `Email_id`, `Password`, `Register_As`) VALUES
('abcd', 'abcd', 'abcd', 'Male', '2010-07-07', '9475123456', '', 'Sri Lanka', 'Trincomalee', 'Kinniya', 'sadfasdf', '231', 'Whats Ur First Mobile No?', 'sdf', '9475123456.png', 'abcd1@gmail.com', '12345678', 'Consumer'),
('abcd', 'abcd', 'abcd', 'Male', '2013-07-15', '94751234567', '', 'Sri Lanka', 'Trincomalee', 'Kinniya', 'asdfasdf', '123', 'Whats Ur Nick Name?', 'abcd', '94751234567.png', 'abcd@gmail.com', '12345678', 'Provider'),
('abcd', 'abcd', 'abcd', 'Male', '2024-07-05', '1234567891', '', 'Sri Lanka', 'Trincomalee', 'Kinniya', 'sadfsdaf', '1234', 'Who is Ur Favourite Actress?', 'adf', '1234567891.png', 'customer@gmail.com', '12345678', 'Consumer'),
('abcd', 'abcd', 'abcd', 'Male', '2024-07-04', '1234567890', '', 'Sri Lanka', 'Trincomalee', 'Kinniya', 'asdfasd', '1234', 'Whats Ur Nick Name?', 'asdf', '1234567890.png', 'provider@gmail.com', '12345678', 'Provider');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `service_request`
--
ALTER TABLE `service_request`
  ADD PRIMARY KEY (`Consumer_emailid`,`Provider_emailid`,`Service_id`,`Request_date`),
  ADD UNIQUE KEY `Consumer_emailid` (`Consumer_emailid`,`Provider_emailid`,`Service_id`,`Fdate`,`Tdate`,`Request_date`,`Request_time`,`Status`),
  ADD UNIQUE KEY `request_no` (`request_no`),
  ADD KEY `Consumer_emailid_2` (`Consumer_emailid`,`Provider_emailid`,`Service_id`,`Fdate`,`Tdate`,`Request_date`,`Request_time`,`Status`);

--
-- Indexes for table `service_table`
--
ALTER TABLE `service_table`
  ADD PRIMARY KEY (`Provider_emailid`,`Service_Id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`Email_id`),
  ADD UNIQUE KEY `Mobile_No` (`Mobile_No`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `service_request`
--
ALTER TABLE `service_request`
  MODIFY `request_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
