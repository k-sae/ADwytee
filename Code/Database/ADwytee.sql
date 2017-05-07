
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
-- Table structure for table `userTYPE`
--

CREATE TABLE `USERTYPE` (
  `Id` int(11) NOT NULL AUTO_INCREMENT ,
  `Type` varchar(24) Not NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- --------------------------------------------------------
--
-- Table structure for table `PAGE_URL`
--

CREATE TABLE `PAGE_URL` (
  `Id` int(11) NOT NULL AUTO_INCREMENT ,
  `Url` varchar(24) Not NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- --------------------------------------------------------
--
-- Table structure for table `USER_URL`
--

CREATE TABLE `USER_URL` (
  `UserId` int(11) NOT NULL,
  `PageId` int(11) NOT NULL,
  PRIMARY KEY (`UserId`,`PageId`),
  FOREIGN KEY (`UserId`) REFERENCES `USERTYPE`(`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`PageId`) REFERENCES `PAGE_URL`(`Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- --------------------------------------------------------
--
-- Table structure for table `FUNCTION`
--

CREATE TABLE `FUNCTION` (
  `Id` int(11) NOT NULL AUTO_INCREMENT ,
  `Function` varchar(24) Not NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- --------------------------------------------------------
--
-- Table structure for table `USER_FUNCTION`
--

CREATE TABLE `USER_FUNCTION` (
  `UserId` int(11) NOT NULL,
  `FunctionId` int(11) NOT NULL,
  PRIMARY KEY (`UserId`,`FunctionId`),
  FOREIGN KEY (`UserId`) REFERENCES `USERTYPE`(`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`FunctionId`) REFERENCES `FUNCTION`(`Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- --------------------------------------------------------
--
-- Table structure for table `language`
--

CREATE TABLE `LANGUAGE` (
  `Id` tinyint(1) NOT NULL AUTO_INCREMENT,
  `language` varchar(2) NOT NULL,
  PRIMARY KEY (`Id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `USER` (
  `Id` int(11) NOT NULL AUTO_INCREMENT ,
  `Password` varchar(16) NOT NULL,
  `Mail` varchar(254) NOT NULL UNIQUE,
  `Type` int(11) Not NULL,
  `Language` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`Id`),
  FOREIGN KEY (`Type`) REFERENCES `USERTYPE`(`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`Language`) REFERENCES `LANGUAGE` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `HISTORY` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Date` date NOT NULL,
  `UserId` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  FOREIGN KEY (`UserId`) REFERENCES `USER`(`Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------
--
-- Table structure for table `Gender`
--

CREATE TABLE `GENDER` (
  `Id` tinyint(1) NOT NULL AUTO_INCREMENT,
  `Gender` varchar(8) NOT NULL,
  PRIMARY KEY (`Id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------


--
-- Table structure for table `patient`
--

CREATE TABLE `PATIENT` (
  `Key` varchar(16) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT 'patient key',
  `FName` varchar(24) NOT NULL COMMENT 'PatientFirstName',
  `LName` varchar(24) NOT NULL COMMENT 'PatientLastName',
  `Gender` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'PGender(If0==male)',
  `Birthdate` date NOT NULL COMMENT 'Patient DOB',
  `Height` int(3) NOT NULL COMMENT 'Patient height',
  `Weight` int(3) NOT NULL COMMENT 'Patient weight',
  `StreetNo` int(3) NOT NULL COMMENT 'patient Str no',
  `Gov` varchar(24) NOT NULL COMMENT 'patient city',
  `District` varchar(24) NOT NULL COMMENT 'patient district',
  `Telephone` varchar(14) NOT NULL UNIQUE COMMENT 'patient Telephone',
  `UserId` int(11) NOT NULL UNIQUE COMMENT'patient id',
  `Latitude` double NOT NULL,
  `Longitude` double NOT NULL,
   PRIMARY KEY (`UserId`),
   FOREIGN KEY (`UserId`) REFERENCES `USER`(`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
   FOREIGN KEY (`Gender`) REFERENCES `GENDER`(`Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `allergy`
--

CREATE TABLE `ALLERGY` (
  `UserId` int(11) NOT NULL,
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(24) NOT NULL,
  `DOR` date NOT NULL,
  `TOR` text NOT NULL,
  `Notes` text NOT NULL,
  PRIMARY KEY (`Id`),
  FOREIGN KEY (`UserId`) REFERENCES `USER`(`Id`) ON DELETE CASCADE ON UPDATE CASCADE
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
  `Latitude` double NOT NULL,
  `Longitude` double NOT NULL,
  `Telephone` varchar(14) NOT Null,
  PRIMARY KEY (`UserId`),
  FOREIGN KEY (`UserId`) REFERENCES `USER` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `binded_with`
--

CREATE TABLE `BIND_WITH` (
  `PharmacyId` int(11) NOT NULL,
  `PatientId` int(11) NOT NULL,
  PRIMARY KEY (`PharmacyId`,`PatientId`),
  FOREIGN KEY (`PharmacyId`) REFERENCES `USER`(`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`PatientId`) REFERENCES `USER`(`Id`)ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `blood_pressure`
--

CREATE TABLE `BLOOD_PRESSURE` (
  `Id` int(11) NOT NULL AUTO_INCREMENT UNIQUE,
  `PatientId` int(11),
  `systolic` int(3) NOT NULL,
  `diastolic` int(3) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`Id`),
  FOREIGN KEY (`PatientId`) REFERENCES `USER`(`Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `MEDICINE` (
  `Code` varchar (13) NOT NULL UNIQUE,
  `EnName` varchar(24) NOT NULL UNIQUE,
  `ArName` varchar(24) CHARACTER SET utf8 COLLATE utf8_general_ci NULL UNIQUE,
  `Descripton` text NOT NULL,
  PRIMARY KEY (`Code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `medicine_alternatives`
--

CREATE TABLE `MEDICINE_ALTERNATIVES` (
  `MedicineCode` varchar(13) NOT NULL,
  `M_AlternativeCode` varchar(13) NOT NULL,
  PRIMARY key (`MedicineCode`,`M_AlternativeCode`),
  FOREIGN KEY (`MedicineCode`) REFERENCES `MEDICINE`(`Code`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`M_AlternativeCode`) REFERENCES `MEDICINE`(`Code`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `RESERVATION`
--

CREATE TABLE `RESERVATION` (
  `Id` int(11) NOT NULL AUTO_INCREMENT UNIQUE,
  `UserId` int(11) DEFAULT NULL,
  `PharmacyId` int(11) DEFAULT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Table structure for table `order status`
--

CREATE TABLE `ORDER_STATUS` (
  `Id` tinyint(1) NOT NULL AUTO_INCREMENT UNIQUE,
  `Status` varchar(11),
  PRIMARY KEY(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `ORDER` (
  `Id` int(11) NOT NULL AUTO_INCREMENT UNIQUE,
  `UserId` int(11),
  `PharmacyId` int(11),
  `date` TIMESTAMP NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY key (`Id`),
  FOREIGN KEY (`UserId`) REFERENCES `USER`(`Id`)ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`PharmacyId`) REFERENCES `USER`(`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`status`) REFERENCES `ORDER_STATUS`(`Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- --------------------------------------------------------
--
-- Table structure for table `medicine_order`
--

CREATE TABLE `MEDICINE_ORDER` (
  `MedicineCode` varchar (13) NOT NULL,
  `OrderId` int(11) NOT NULL,
  `Amount` int(11) NOT NULL,
  PRIMARY key (`MedicineCode`,`OrderId`),
  FOREIGN KEY (`MedicineCode`) REFERENCES `MEDICINE`(`Code`)ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`OrderId`) REFERENCES `ORDER`(`Id`)ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------
--
-- Table structure for table `notification_staus`
--

CREATE TABLE `NOTIFICATION_STATUS` (
  `Id` int(11) NOT NULL AUTO_INCREMENT UNIQUE,
  `Status` varchar(13) NOT NULL,
  PRIMARY key (`Id`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- --------------------------------------------------------
--
-- Table structure for table `notification_staus`
--

CREATE TABLE `NOTIFICATION_DESCRIPTION` (
  `Id` int(11) NOT NULL AUTO_INCREMENT UNIQUE,
  `Description` varchar(13) NOT NULL,
  PRIMARY key (`Id`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- --------------------------------------------------------
--
-- Table structure for table `notification`
--

CREATE TABLE `NOTIFICATION` (
  `Id` int(11) NOT NULL AUTO_INCREMENT UNIQUE,
  `MedicineCode` varchar(13) ,
  `OrderId` int(11),
  `PatientId` Int(11) NOT NULL,
  `NStatus` Int(11) NOT NULL DEFAULT '1' ,
  `NDescription` Int(11) NOT NULL DEFAULT '1' ,
  PRIMARY key (`Id`),
  FOREIGN KEY (`MedicineCode`) REFERENCES `MEDICINE`(`Code`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`OrderId`) REFERENCES `ORDER`(`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`PatientId`) REFERENCES `USER`(`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`NStatus`) REFERENCES `NOTIFICATION_STATUS`(`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`NDescription`) REFERENCES `NOTIFICATION_DESCRIPTION`(`Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- --------------------------------------------------------
--
-- Table structure for table `patient_chronics`
--

CREATE TABLE `PATIENT_CHRONICS` (
  `PatientId` int(11),
  `Chronics` varchar(24) NOT NULL COMMENT 'Patient Chronics',
  FOREIGN KEY (`PatientId`) REFERENCES `USER`(`Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `patient_risk_factor`
--

CREATE TABLE `PATIENT_RISK_FACTOR` (
  `PatientId` int(11),
  `RiskFactor` varchar(64) NOT NULL,
  PRIMARY KEY (`PatientId`,`RiskFactor`),
  FOREIGN KEY (`PatientId`) REFERENCES `USER`(`Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `patient_tracked_medicines`
--

CREATE TABLE `PATIENT_TRACKED_MEDICINES` (
  `PatientId` int(11),
  `MedicineCode` varchar(13) NOT NULL,
  PRIMARY KEY (PatientId,MedicineCode),
  FOREIGN KEY (`PatientId`) REFERENCES `USER`(`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`MedicineCode`) REFERENCES `MEDICINE`(`Code`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Table structure for table `pharmacy_medicine`
--

CREATE TABLE `PHARMACY_MEDICINE` (
  `PharmacyId` int(11),
  `MedicineCode` varchar(13) NOT NULL,
  `Amount` int(11) NOT NULL,
  PRIMARY KEY (`PharmacyId`,`MedicineCode`),
  FOREIGN KEY (`PharmacyId`) REFERENCES `USER`(`Id`)ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`MedicineCode`) REFERENCES `MEDICINE`(`Code`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

CREATE TABLE `RATE` (
  `PharmacyId` int(11),
  `PatientId` int(11),
  `value` tinyint(1) NOT NULL DEFAULT '0',
  `comment` TEXT NOT NULL,
  PRIMARY KEY (`PharmacyId`,`PatientId`),
  FOREIGN KEY (`PharmacyId`) REFERENCES `USER`(`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`PatientId`) REFERENCES `USER`(`Id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- --------------------------------------------------------

--
-- insert main table value
--
-- --------------------------------------------------------


INSERT INTO  `LANGUAGE`( `Id`, `Language`) VALUES  (1,'en');
INSERT INTO  `LANGUAGE`( `Id`, `Language`) VALUES   (2,'ar');
INSERT INTO  `ORDER_STATUS`( `Id` ,`Status`) VALUES  (1,'pending');
INSERT INTO  `ORDER_STATUS`( `Id` ,`Status`) VALUES  (2,'inprogress');
INSERT INTO  `ORDER_STATUS`( `Id` ,`Status`) VALUES  (3,'complete');
INSERT INTO  `NOTIFICATION_STATUS`( `Id`, `Status`) VALUES (1,'active');
INSERT INTO  `NOTIFICATION_STATUS`( `Id` ,`Status`) VALUES (2,'disactive');
INSERT INTO  `NOTIFICATION_DESCRIPTION`( `Id` ,`Description`) VALUES (1,'accept');
INSERT INTO  `NOTIFICATION_DESCRIPTION`(  `Id` ,`Description`) VALUES (2,'decline');
INSERT INTO  `USERTYPE`(  `Id` ,`Type`) VALUES (1,'admin');
INSERT INTO `USERTYPE`( `Id` ,`Type`) VALUES (2,'pharmacy');
INSERT INTO  `USERTYPE`(`Id` ,`Type`) VALUES (3,'patient');
INSERT INTO  `GENDER`( `Id`,`Gender`) VALUES (1,"Male");
INSERT INTO  `GENDER`( `Id` ,`Gender`) VALUES (2,"FMale");
INSERT INTO  `PAGE_URL`(`Id` ,`Url`) VALUES (1,"index.php");
INSERT INTO  `PAGE_URL`( `Id` ,`Url`) VALUES (2,"pharmacyOrder.php");
INSERT INTO `PAGE_URL`(`Id`, `Url`) VALUES (3,"orderPage.php");
INSERT INTO  `PAGE_URL`(  `Id`, `Url`) VALUES (4,"RegisterPage.php");
INSERT INTO `PAGE_URL`( `Id`,`Url`) VALUES (5,"statistics.php");
INSERT INTO  `PAGE_URL`( `Id`,`Url`) VALUES (6,"MedicinePage.php");
-- --------------------------------------------------------
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
