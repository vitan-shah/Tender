-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2022 at 03:06 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tenderdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `bidtb`
--

CREATE TABLE `bidtb` (
  `bidId` int(11) NOT NULL,
  `tendId` int(11) NOT NULL,
  `orgId` int(11) NOT NULL,
  `bidPrice` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `isAllocate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bidtb`
--

INSERT INTO `bidtb` (`bidId`, `tendId`, `orgId`, `bidPrice`, `duration`, `isAllocate`) VALUES
(1, 1, 1, 111111, 11, 1),
(3, 1, 2, 7000, 14, 0),
(4, 2, 1, 1200000, 12, 1),
(5, 3, 3, 40000, 1, 0),
(6, 3, 4, 30000, 1, 0),
(7, 4, 4, 400000, 2, 0),
(8, 5, 4, 40000, 2, 0),
(9, 3, 5, 35000, 5, 1),
(10, 4, 5, 550000, 2, 0),
(11, 5, 5, 25000, 2, 1),
(12, 5, 3, 28000, 2, 0),
(13, 4, 3, 425000, 1, 1),
(14, 6, 3, 250000, 2, 1),
(15, 2, 3, 238, 14, 0);

-- --------------------------------------------------------

--
-- Table structure for table `factortb`
--

CREATE TABLE `factortb` (
  `tendId` int(11) NOT NULL,
  `orgId` int(11) NOT NULL,
  `warranty` int(11) DEFAULT NULL,
  `guarantee` int(11) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `gfactor` float DEFAULT NULL,
  `wfactor` float DEFAULT NULL,
  `factor` float NOT NULL,
  `bid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `factortb`
--

INSERT INTO `factortb` (`tendId`, `orgId`, `warranty`, `guarantee`, `price`, `gfactor`, `wfactor`, `factor`, `bid`) VALUES
(1, 1, 11, 11, 111111, 0.0000990001, 0.0000990001, 0.0000990001, 1),
(1, 2, 20, 3, 12000, 4, 2, 10, 2),
(2, 1, 4, 3, 1200000, 0.0000025, 0.00000333333, 0.00000275, 4),
(3, 3, 36, 12, 40000, 0.0003, 0.0009, 0.00048, 5),
(3, 4, 12, 0, 30000, 0, 0.0004, 0.00012, 6),
(4, 4, 0, 0, 400000, 0, 0, 0, 7),
(5, 4, 36, 12, 40000, 0.0003, 0.0009, 0.00048, 8),
(3, 5, 24, 6, 35000, 0.000171429, 0.000685714, 0.000325714, 9),
(4, 5, 24, 0, 550000, 0, 0.0000436364, 0.0000130909, 10),
(5, 5, 12, 0, 25000, 0, 0.00048, 0.000144, 11),
(5, 3, 36, 12, 28000, 0.000428571, 0.00128571, 0.000685714, 12),
(4, 3, 0, 0, 425000, 0, 0, 0, 13),
(6, 3, 24, 3, 250000, 0.000012, 0.000096, 0.0000372, 14),
(2, 3, 15, 5, 238, 0.0210084, 0.0630252, 0.0336134, 15);

-- --------------------------------------------------------

--
-- Table structure for table `govtadmin`
--

CREATE TABLE `govtadmin` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `govtadmin`
--

INSERT INTO `govtadmin` (`username`, `password`) VALUES
('admin1', 'admin1'),
('admin2', 'admin2'),
('admin1@gmail.com', 'admin1');

-- --------------------------------------------------------

--
-- Table structure for table `organizationtb`
--

CREATE TABLE `organizationtb` (
  `orgId` int(11) NOT NULL,
  `gstno` int(11) NOT NULL,
  `orgName` varchar(255) NOT NULL,
  `orgEmail` varchar(255) NOT NULL,
  `orgType` varchar(255) NOT NULL,
  `projectExp` int(11) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `organizationtb`
--

INSERT INTO `organizationtb` (`orgId`, `gstno`, `orgName`, `orgEmail`, `orgType`, `projectExp`, `password`) VALUES
(1, 123456, 'Expotech', 'expotech@gmail.com', 'MNC', 4, 'expotech'),
(2, 654321, 'The stubornb', 'abc@gmail.com', 'MNC', 2, 'abc'),
(3, 1234567, 'DS Infotech', 'dsinfotech@gmail.com', '1', 4, 'dsinfo'),
(4, 456123, 'rmsolutions', 'rmsolutions@gmail.com', '3', 1, 'rmsolution'),
(5, 789456, 'akptservices', 'akptservices@gmail.com', '2', 3, 'akpt123');

-- --------------------------------------------------------

--
-- Table structure for table `tendertb`
--

CREATE TABLE `tendertb` (
  `tendId` int(11) NOT NULL,
  `tendName` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `duration` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `s_date` date NOT NULL,
  `e_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tendertb`
--

INSERT INTO `tendertb` (`tendId`, `tendName`, `category`, `price`, `duration`, `description`, `s_date`, `e_date`) VALUES
(1, 'electronic', 'electronic', 100000, 12, 'ajwefvsjhbfsbAFBDJ', '2022-03-01', '2022-03-30'),
(2, 'abc', '1', 1500000, 2, 'fvsdyufbiukaesf', '2022-03-01', '2022-03-31'),
(3, 'laptop', '1', 50000, 3, 'need a good laptop with i7 11gen', '2022-03-24', '2022-03-31'),
(4, 'tablet', '1', 500000, 2, 'need 1000 tablets for school', '2022-06-07', '2022-08-07'),
(5, 'printer', '1', 30000, 1, 'need one a printer for office work', '2022-03-17', '2022-03-31'),
(6, 'car', '1', 20000, 2, ' needs a SUV car', '2022-03-29', '2022-03-30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bidtb`
--
ALTER TABLE `bidtb`
  ADD PRIMARY KEY (`bidId`);

--
-- Indexes for table `organizationtb`
--
ALTER TABLE `organizationtb`
  ADD PRIMARY KEY (`orgId`,`gstno`);

--
-- Indexes for table `tendertb`
--
ALTER TABLE `tendertb`
  ADD PRIMARY KEY (`tendId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bidtb`
--
ALTER TABLE `bidtb`
  MODIFY `bidId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `organizationtb`
--
ALTER TABLE `organizationtb`
  MODIFY `orgId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tendertb`
--
ALTER TABLE `tendertb`
  MODIFY `tendId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
