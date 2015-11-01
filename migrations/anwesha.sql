-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 01, 2015 at 07:19 pm
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `anwesha`
--

-- --------------------------------------------------------

--
-- Table structure for table `CampusAmberg`
--

CREATE TABLE IF NOT EXISTS `CampusAmberg` (
  `pId` int(4) NOT NULL,
  `refKey` int(5) NOT NULL,
  `address` text NOT NULL,
  `degree` varchar(30) NOT NULL,
  `grad` int(4) NOT NULL,
  `leader` text NOT NULL,
  `involvement` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Events`
--

CREATE TABLE IF NOT EXISTS `Events` (
  `eveId` int(3) NOT NULL DEFAULT '0',
  `eveName` varchar(35) DEFAULT NULL,
  `fee` int(4) DEFAULT NULL,
  `day` int(1) DEFAULT NULL,
  `size` int(2) DEFAULT NULL,
  `code` int(3) NOT NULL,
  `details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `GroupRegistration`
--

CREATE TABLE IF NOT EXISTS `GroupRegistration` (
  `grpId` int(4) DEFAULT NULL,
  `eveId` int(3) DEFAULT NULL,
  `pIds` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Grpids`
--

CREATE TABLE IF NOT EXISTS `Grpids` (
  `grpId` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `LoginTable`
--

CREATE TABLE IF NOT EXISTS `LoginTable` (
  `pId` int(4) DEFAULT NULL,
  `password` char(40) DEFAULT NULL,
  `csrfToken` char(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `People`
--

CREATE TABLE IF NOT EXISTS `People` (
  `name` varchar(50) DEFAULT NULL,
  `pId` int(4) NOT NULL DEFAULT '0',
  `college` varchar(50) DEFAULT NULL,
  `sex` char(1) DEFAULT NULL,
  `mobile` varchar(13) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `city` varchar(15) DEFAULT NULL,
  `feePaid` int(4) DEFAULT NULL,
  `confirm` int(1) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Pids`
--

CREATE TABLE IF NOT EXISTS `Pids` (
  `pId` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Registration`
--

CREATE TABLE IF NOT EXISTS `Registration` (
  `eveId` int(3) DEFAULT NULL,
  `pId` int(4) DEFAULT NULL,
  `grpId` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Events`
--
ALTER TABLE `Events`
  ADD PRIMARY KEY (`eveId`);

--
-- Indexes for table `GroupRegistration`
--
ALTER TABLE `GroupRegistration`
  ADD KEY `eveId_Evnts_GroupRegistration` (`eveId`);

--
-- Indexes for table `LoginTable`
--
ALTER TABLE `LoginTable`
  ADD KEY `pId_People_LoginTable` (`pId`);

--
-- Indexes for table `People`
--
ALTER TABLE `People`
  ADD PRIMARY KEY (`pId`);

--
-- Indexes for table `Registration`
--
ALTER TABLE `Registration`
  ADD KEY `eveId_Events_Registration` (`eveId`),
  ADD KEY `pId_People_Registration` (`pId`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `GroupRegistration`
--
ALTER TABLE `GroupRegistration`
  ADD CONSTRAINT `eveId_Evnts_GroupRegistration` FOREIGN KEY (`eveId`) REFERENCES `Events` (`eveId`);

--
-- Constraints for table `LoginTable`
--
ALTER TABLE `LoginTable`
  ADD CONSTRAINT `pId_People_LoginTable` FOREIGN KEY (`pId`) REFERENCES `People` (`pId`);

--
-- Constraints for table `Registration`
--
ALTER TABLE `Registration`
  ADD CONSTRAINT `eveId_Events_Registration` FOREIGN KEY (`eveId`) REFERENCES `Events` (`eveId`),
  ADD CONSTRAINT `pId_People_Registration` FOREIGN KEY (`pId`) REFERENCES `People` (`pId`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
