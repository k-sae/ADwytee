-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 12, 2017 at 06:18 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ADwytee`
--

-- --------------------------------------------------------

--
-- Table structure for table `allergy`
--

CREATE TABLE `allergy` (
  `Pkey` varchar(14) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `ALID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `DateofReaction` date NOT NULL,
  `TypeofREaction` text NOT NULL,
  `Notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `app_language`
--

CREATE TABLE `app_language` (
  `word_id` int(10) UNSIGNED NOT NULL,
  `en_word` varchar(255) NOT NULL,
  `ar_word` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `bindedwith`
--

CREATE TABLE `bindedwith` (
  `Phkey` varchar(14) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Pkey` varchar(14) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bloodpressure`
--

CREATE TABLE `bloodpressure` (
  `BPID` int(11) NOT NULL,
  `Pkey` varchar(14) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Systolic` int(3) NOT NULL,
  `Diastolic` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `HID` int(11) NOT NULL,
  `Hdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `M-code` int(12) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `descripton` text NOT NULL,
  `Expiredate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `medicine-alternatives`
--

CREATE TABLE `medicine-alternatives` (
  `M-code` int(12) NOT NULL,
  `Ma-code` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `medicineorder`
--

CREATE TABLE `medicineorder` (
  `M-code` int(12) NOT NULL,
  `Oid` int(11) NOT NULL,
  `Amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `Nid` int(11) NOT NULL,
  `Mcode` int(12) NOT NULL,
  `Oid` int(11) NOT NULL,
  `Pkey` varchar(14) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `Oid` int(11) NOT NULL,
  `Pkey` varchar(14) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `Phkey` varchar(14) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `date` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `Pkey` varchar(14) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT 'patient key',
  `FName` varchar(35) NOT NULL COMMENT 'PatientFirstName',
  `LName` varchar(35) NOT NULL COMMENT 'PatientLastName',
  `Gender` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'PGender(If0==male)',
  `PBirthdate` date NOT NULL COMMENT 'Patient DOB',
  `Height` int(3) NOT NULL COMMENT 'Patient height',
  `weight` int(4) NOT NULL COMMENT 'Patient weight',
  `StrNo` int(11) NOT NULL COMMENT 'patient Str no',
  `Gov` varchar(255) NOT NULL COMMENT 'patient city',
  `District` varchar(255) NOT NULL COMMENT 'patient district',
  `Telephone` int(11) NOT NULL COMMENT 'patient Telephone',
  `UId` int(11) NOT NULL COMMENT 'patient id',
  `PHistory` int(11) NOT NULL COMMENT 'patient history'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `patientchronics`
--

CREATE TABLE `patientchronics` (
  `Pkey` varchar(14) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `PChronics` varchar(255) NOT NULL COMMENT 'Patient Chronics'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `patientriskfactor`
--

CREATE TABLE `patientriskfactor` (
  `Pkey` varchar(14) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `PRiskFactor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `patienttrackedmedicines`
--

CREATE TABLE `patienttrackedmedicines` (
  `Pkey` int(11) NOT NULL,
  `M-code` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy`
--

CREATE TABLE `pharmacy` (
  `Phkey` varchar(14) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Uid` int(11) NOT NULL,
  `Name` varchar(35) NOT NULL,
  `Notes` varchar(255) NOT NULL,
  `describition` varchar(1024) NOT NULL,
  `Longtiude` int(11) NOT NULL,
  `latitiude` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pharmacymedicine`
--

CREATE TABLE `pharmacymedicine` (
  `Phkey` varchar(14) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `M-code` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

CREATE TABLE `rate` (
  `Phkey` varchar(14) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Pkey` varchar(14) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Value` tinyint(1) NOT NULL DEFAULT '0',
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Uid` int(11) NOT NULL,
  `UPassword` varchar(18) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `type` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allergy`
--
ALTER TABLE `allergy`
  ADD PRIMARY KEY (`ALID`),
  ADD UNIQUE KEY `ALID` (`ALID`),
  ADD KEY `Pkey` (`Pkey`);

--
-- Indexes for table `app_language`
--
ALTER TABLE `app_language`
  ADD PRIMARY KEY (`word_id`);

--
-- Indexes for table `bindedwith`
--
ALTER TABLE `bindedwith`
  ADD PRIMARY KEY (`Phkey`,`Pkey`),
  ADD UNIQUE KEY `Phkey` (`Phkey`),
  ADD UNIQUE KEY `Pkey` (`Pkey`);

--
-- Indexes for table `bloodpressure`
--
ALTER TABLE `bloodpressure`
  ADD PRIMARY KEY (`BPID`,`Pkey`),
  ADD UNIQUE KEY `BPID` (`BPID`),
  ADD KEY `Pkey` (`Pkey`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`HID`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`M-code`);

--
-- Indexes for table `medicine-alternatives`
--
ALTER TABLE `medicine-alternatives`
  ADD PRIMARY KEY (`M-code`,`Ma-code`);

--
-- Indexes for table `medicineorder`
--
ALTER TABLE `medicineorder`
  ADD PRIMARY KEY (`M-code`,`Oid`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`Nid`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`Oid`),
  ADD UNIQUE KEY `Pkey` (`Pkey`),
  ADD UNIQUE KEY `Phkey` (`Phkey`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`Pkey`),
  ADD UNIQUE KEY `Pkey` (`Pkey`),
  ADD KEY `PId` (`UId`);

--
-- Indexes for table `patientchronics`
--
ALTER TABLE `patientchronics`
  ADD PRIMARY KEY (`Pkey`,`PChronics`);

--
-- Indexes for table `patientriskfactor`
--
ALTER TABLE `patientriskfactor`
  ADD PRIMARY KEY (`Pkey`,`PRiskFactor`);

--
-- Indexes for table `patienttrackedmedicines`
--
ALTER TABLE `patienttrackedmedicines`
  ADD PRIMARY KEY (`Pkey`,`M-code`),
  ADD KEY `Pkey` (`Pkey`),
  ADD KEY `M-code` (`M-code`);

--
-- Indexes for table `pharmacy`
--
ALTER TABLE `pharmacy`
  ADD PRIMARY KEY (`Phkey`),
  ADD UNIQUE KEY `Phkey` (`Phkey`),
  ADD KEY `Uid` (`Uid`);

--
-- Indexes for table `pharmacymedicine`
--
ALTER TABLE `pharmacymedicine`
  ADD PRIMARY KEY (`Phkey`,`M-code`);

--
-- Indexes for table `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`Phkey`,`Pkey`),
  ADD UNIQUE KEY `Phkey` (`Phkey`),
  ADD UNIQUE KEY `Pkey` (`Pkey`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allergy`
--
ALTER TABLE `allergy`
  MODIFY `ALID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `app_language`
--
ALTER TABLE `app_language`
  MODIFY `word_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bloodpressure`
--
ALTER TABLE `bloodpressure`
  MODIFY `BPID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `HID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `Nid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `Oid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `UId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'patient id';
--
-- AUTO_INCREMENT for table `pharmacy`
--
ALTER TABLE `pharmacy`
  MODIFY `Uid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Uid` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
