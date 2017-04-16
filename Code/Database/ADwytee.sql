-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2017 at 09:08 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adwytee`
--

-- --------------------------------------------------------

--
-- Table structure for table `allergy`
--

CREATE TABLE `allergy` (
  `p_key` varchar(14) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `a_id` int(11) NOT NULL,
  `a_name` varchar(255) NOT NULL,
  `dateofreaction` date NOT NULL,
  `typeofreaction` text NOT NULL,
  `notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `binded_with`
--

CREATE TABLE `binded_with` (
  `ph_key` varchar(14) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `p_key` varchar(14) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `blood_pressure`
--

CREATE TABLE `blood_pressure` (
  `bp_id` int(11) NOT NULL,
  `p_key` varchar(14) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `systolic` int(3) NOT NULL,
  `diastolic` int(3) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `h_id` int(11) NOT NULL,
  `h_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `m_code` int(12) NOT NULL,
  `m_name` varchar(50) NOT NULL,
  `descripton` text NOT NULL,
  `expiredate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `medicine_alternatives`
--

CREATE TABLE `medicine_alternatives` (
  `m_code` int(12) NOT NULL,
  `mA_code` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `medicine_order`
--

CREATE TABLE `medicine_order` (
  `M-code` int(12) NOT NULL,
  `Oid` int(11) NOT NULL,
  `Amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `n_id` int(11) NOT NULL,
  `m_code` int(12) NOT NULL,
  `o_id` int(11) NOT NULL,
  `p_key` varchar(14) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
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
  `p_key` varchar(14) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT 'patient key',
  `p_fName` varchar(35) NOT NULL COMMENT 'PatientFirstName',
  `p_lName` varchar(35) NOT NULL COMMENT 'PatientLastName',
  `gender` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'PGender(If0==male)',
  `p_birthdate` date NOT NULL COMMENT 'Patient DOB',
  `height` int(3) NOT NULL COMMENT 'Patient height',
  `weight` int(4) NOT NULL COMMENT 'Patient weight',
  `streetNo` int(11) NOT NULL COMMENT 'patient Str no',
  `gov` varchar(255) NOT NULL COMMENT 'patient city',
  `district` varchar(255) NOT NULL COMMENT 'patient district',
  `telephone` int(11) NOT NULL COMMENT 'patient Telephone',
  `u_id` int(11) NOT NULL COMMENT 'patient id',
  `h_id` int(11) NOT NULL COMMENT 'patient history'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `patient_chronics`
--

CREATE TABLE `patient_chronics` (
  `p_key` varchar(14) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `p_chronics` varchar(255) NOT NULL COMMENT 'Patient Chronics'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `patient_risk_factor`
--

CREATE TABLE `patient_risk_factor` (
  `p_key` varchar(14) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `p_risk_factor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `patient_tracked_medicines`
--

CREATE TABLE `patient_tracked_medicines` (
  `p_key` int(11) NOT NULL,
  `m_code` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy`
--

CREATE TABLE `pharmacy` (
  `ph_key` varchar(14) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `u_id` int(11) NOT NULL,
  `ph_name` varchar(35) NOT NULL,
  `notes` varchar(255) NOT NULL,
  `describition` varchar(1024) NOT NULL,
  `longtiude` int(11) NOT NULL,
  `latitiude` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy_medicine`
--

CREATE TABLE `pharmacy_medicine` (
  `ph_key` varchar(14) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `m_code` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

CREATE TABLE `rate` (
  `ph_key` varchar(14) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `p_key` varchar(14) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `value` tinyint(1) NOT NULL DEFAULT '0',
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(11) NOT NULL,
  `u_password` varchar(18) NOT NULL,
  `u_mail` varchar(255) NOT NULL,
  `type` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allergy`
--
ALTER TABLE `allergy`
  ADD PRIMARY KEY (`a_id`),
  ADD UNIQUE KEY `ALID` (`a_id`),
  ADD KEY `Pkey` (`p_key`);

--
-- Indexes for table `binded_with`
--
ALTER TABLE `binded_with`
  ADD PRIMARY KEY (`ph_key`,`p_key`),
  ADD UNIQUE KEY `Phkey` (`ph_key`),
  ADD UNIQUE KEY `Pkey` (`p_key`);

--
-- Indexes for table `blood_pressure`
--
ALTER TABLE `blood_pressure`
  ADD PRIMARY KEY (`bp_id`,`p_key`),
  ADD UNIQUE KEY `BPID` (`bp_id`),
  ADD KEY `Pkey` (`p_key`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`h_id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`m_code`);

--
-- Indexes for table `medicine_alternatives`
--
ALTER TABLE `medicine_alternatives`
  ADD PRIMARY KEY (`m_code`,`mA_code`);

--
-- Indexes for table `medicine_order`
--
ALTER TABLE `medicine_order`
  ADD PRIMARY KEY (`M-code`,`Oid`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`n_id`);

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
  ADD PRIMARY KEY (`p_key`),
  ADD UNIQUE KEY `Pkey` (`p_key`),
  ADD KEY `PId` (`u_id`);

--
-- Indexes for table `patient_chronics`
--
ALTER TABLE `patient_chronics`
  ADD PRIMARY KEY (`p_key`,`p_chronics`);

--
-- Indexes for table `patient_risk_factor`
--
ALTER TABLE `patient_risk_factor`
  ADD PRIMARY KEY (`p_key`,`p_risk_factor`);

--
-- Indexes for table `patient_tracked_medicines`
--
ALTER TABLE `patient_tracked_medicines`
  ADD PRIMARY KEY (`p_key`,`m_code`),
  ADD KEY `Pkey` (`p_key`),
  ADD KEY `M-code` (`m_code`);

--
-- Indexes for table `pharmacy`
--
ALTER TABLE `pharmacy`
  ADD PRIMARY KEY (`ph_key`),
  ADD UNIQUE KEY `Phkey` (`ph_key`),
  ADD KEY `Uid` (`u_id`);

--
-- Indexes for table `pharmacy_medicine`
--
ALTER TABLE `pharmacy_medicine`
  ADD PRIMARY KEY (`ph_key`,`m_code`);

--
-- Indexes for table `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`ph_key`,`p_key`),
  ADD UNIQUE KEY `Phkey` (`ph_key`),
  ADD UNIQUE KEY `Pkey` (`p_key`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allergy`
--
ALTER TABLE `allergy`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `blood_pressure`
--
ALTER TABLE `blood_pressure`
  MODIFY `bp_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `h_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `n_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `Oid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'patient id';
--
-- AUTO_INCREMENT for table `pharmacy`
--
ALTER TABLE `pharmacy`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
