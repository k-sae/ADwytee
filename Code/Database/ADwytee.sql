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
-- Database: `ADwytee`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `USER` (
  `Id` int(11) NOT NULL AUTO_INCREMENT ,
  `Password` varchar(16) NOT NULL,
  `Mail` varchar(64) NOT NULL UNIQUE,
  `Type` tinyint(1) Not NULL,
  PRIMARY KEY (Id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `HISTORY` (
  `Id` int(11) NOT NULL,
  `Date` date NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------


--
-- Table structure for table `patient`
--

CREATE TABLE `PATIENT` (
  `Key` varchar(16) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT 'patient key',
  `FName` varchar(24) NOT NULL COMMENT 'PatientFirstName',
  `LName` varchar(24) NOT NULL COMMENT 'PatientLastName',
  `Gender` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'PGender(If0==male)',
  `Birthdate` date NOT NULL COMMENT 'Patient DOB',
  `Height` int(3) NOT NULL COMMENT 'Patient height',
  `Weight` int(3) NOT NULL COMMENT 'Patient weight',
  `StreetNo` int(3) NOT NULL COMMENT 'patient Str no',
  `Gov` varchar(24) NOT NULL COMMENT 'patient city',
  `District` varchar(24) NOT NULL COMMENT 'patient district',
  `Telephone` int(11) NOT NULL UNIQUE COMMENT 'patient Telephone',
  `UserId` int(11) NOT NULL UNIQUE COMMENT'patient id',
  `HistoryId` int(11) NOT NULL UNIQUE COMMENT'patient history',
   PRIMARY KEY (`Key`),
   FOREIGN KEY (`UserId`) REFERENCES `USER`(`ID`) ON DELETE CASCADE,
   FOREIGN KEY (`HistoryId`) REFERENCES HISTORY(`ID`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `allergy`
--

CREATE TABLE `ALLERGY` (
  `PatientKey` varchar(16) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(24) NOT NULL,
  `DOR` date NOT NULL,
  `TOR` text NOT NULL,
  `Notes` text NOT NULL,
  PRIMARY KEY (`ID`),
  FOREIGN KEY (`PatientKey`) REFERENCES `PATIENT`(`Key`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
-- --------------------------------------------------------

--
-- Table structure for table `pharmacy`
--

CREATE TABLE `PHARMACY` (
  `Key` varchar(16) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `UserId` int(11) NOT NULL UNIQUE,
  `Name` varchar(24) NOT NULL,
  `Notes` TEXT NOT NULL,
  `Describition` TEXT NOT NULL,
  `Longtiude` int(11) NOT NULL,
  `Latitiude` int(11) NOT NULL,
   PRIMARY KEY (`Key`),
     FOREIGN KEY (`UserId`) REFERENCES USER(`ID`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `binded_with`
--

CREATE TABLE `BIND_WITH` (
  `PharmacyKey` varchar(16) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `PatientKey` varchar(16) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
    PRIMARY KEY (`PharmacyKey`,`PatientKey`),
    FOREIGN KEY (`PharmacyKey`) REFERENCES `PHARMACY`(`Key`) ON DELETE CASCADE,
    FOREIGN KEY (`Patientkey`) REFERENCES `PATIENT`(`Key`)ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `blood_pressure`
--

CREATE TABLE `BLOOD_PRESSURE` (
  `Id` int(11) NOT NULL AUTO_INCREMENT UNIQUE,
  `PatientKey` varchar(16) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `systolic` int(3) NOT NULL,
  `diastolic` int(3) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`Id`),
  FOREIGN KEY (`PatientKey`) REFERENCES PATIENT(`Key`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `MEDICINE` (
  `Code` BIGINT (13) NOT NULL UNIQUE,
  `EnName` varchar(24) NOT NULL UNIQUE,
  `ArName` varchar(24) CHARACTER SET utf8 COLLATE utf8_general_ci NULL UNIQUE,
  `Descripton` text NOT NULL,
  `Expiredate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `medicine_alternatives`
--

CREATE TABLE `MEDICINE_ALTERNATIVES` (
  `MedicineCode` BIGINT(13) NOT NULL,
  `M_AlternativeCode` BIGINT (13) NOT NULL,
  PRIMARY key (`MedicineCode`,`M_AlternativeCode`),
   FOREIGN KEY (`MedicineCode`) REFERENCES `MEDICINE`(`Code`) ON DELETE CASCADE,
   FOREIGN KEY (`M_AlternativeCode`) REFERENCES `MEDICINE`(`Code`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `ORDER` (
  `Id` int(11) NOT NULL AUTO_INCREMENT UNIQUE,
  `PatientKey` varchar(16) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `PharmacyKey` varchar(16) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `date` TIMESTAMP NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY key (`Id`),
  FOREIGN KEY (`PatientKey`) REFERENCES `PATIENT`(`Key`)ON DELETE CASCADE,
  FOREIGN KEY (`PharmacyKey`) REFERENCES `PHARMACY`(`Key`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- --------------------------------------------------------
--
-- Table structure for table `medicine_order`
--

CREATE TABLE `MEDICINE_ORDER` (
  `MedicineCode` BIGINT (13) NOT NULL,
  `OrderId` int(11) NOT NULL,
  `Amount` int(11) NOT NULL,
  PRIMARY key (`MedicineCode`,`OrderId`),
  FOREIGN KEY (`MedicineCode`) REFERENCES `MEDICINE`(`Code`)ON DELETE CASCADE,
   FOREIGN KEY (`OrderId`) REFERENCES `ORDER`(`Id`)ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `NOTIFICATION` (
  `Id` int(11) NOT NULL AUTO_INCREMENT UNIQUE,
  `MedicineCode` BIGINT(13) NOT NULL,
  `OrderId` int(11) NOT NULL,
  `PatientKey` varchar(16) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
   PRIMARY key (`Id`),
   FOREIGN KEY (`MedicineCode`) REFERENCES `MEDICINE`(`Code`) ON DELETE CASCADE,
   FOREIGN KEY (`OrderId`) REFERENCES `ORDER`(`Id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- --------------------------------------------------------
--
-- Table structure for table `patient_chronics`
--

CREATE TABLE `PATIENT_CHRONICS` (
  `PatientKey` varchar(16) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Chronics` varchar(24) NOT NULL COMMENT 'Patient Chronics',
  PRIMARY KEY (`PatientKey`,`Chronics`),
   FOREIGN KEY (`PatientKey`) REFERENCES `PATIENT`(`Key`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `patient_risk_factor`
--

CREATE TABLE `PATIENT_RISK_FACTOR` (
  `PatientKey` varchar(16) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `RiskFactor` varchar(64) NOT NULL,
  PRIMARY KEY (`PatientKey`,`RiskFactor`),
  FOREIGN KEY (`PatientKey`) REFERENCES `PATIENT`(`Key`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `patient_tracked_medicines`
--

CREATE TABLE `PATIENT_TRACKED_MEDICINES` (
  `PatientKey` varchar(16) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `MedicineCode` BIGINT(13) NOT NULL,
  PRIMARY KEY (PatientKey,MedicineCode),
  FOREIGN KEY (`PatientKey`) REFERENCES `PATIENT`(`Key`) ON DELETE CASCADE,
  FOREIGN KEY (`MedicineCode`) REFERENCES `MEDICINE`(`Code`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Table structure for table `pharmacy_medicine`
--

CREATE TABLE `PHARMACY_MEDICINE` (
  `PharmacyKey` varchar(16) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `MedicineCode` BIGINT(13) NOT NULL,
  PRIMARY KEY (`PharmacyKey`,`MedicineCode`),
  FOREIGN KEY (`PharmacyKey`) REFERENCES `PHARMACY`(`Key`)ON DELETE CASCADE,
  FOREIGN KEY (`MedicineCode`) REFERENCES `MEDICINE`(`Code`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

CREATE TABLE `RATE` (
  `PharmacyKey` varchar(16) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `PatientKey` varchar(16) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `value` tinyint(1) NOT NULL DEFAULT '0',
  `comment` TEXT NOT NULL,
  PRIMARY KEY (`PharmacyKey`,`PatientKey`),
  FOREIGN KEY (`PharmacyKey`) REFERENCES `PHARMACY`(`Key`) ON DELETE CASCADE,
  FOREIGN KEY (`PatientKey`) REFERENCES `PATIENT`(`Key`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
