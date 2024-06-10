-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 10, 2024 at 01:52 PM
-- Server version: 8.0.31
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prenatal_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

DROP TABLE IF EXISTS `appointments`;
CREATE TABLE IF NOT EXISTS `appointments` (
  `appointID` int NOT NULL AUTO_INCREMENT,
  `patientID` int DEFAULT NULL,
  `fullNames` varchar(30) DEFAULT NULL,
  `telephone` varchar(30) DEFAULT NULL,
  `doctorNames` varchar(20) DEFAULT NULL,
  `appointDate` date NOT NULL,
  `Reminder1` datetime(6) NOT NULL,
  `Reminder2` datetime(6) NOT NULL,
  `Reminder3` datetime(6) NOT NULL,
  `reason` text,
  `status` enum('Pending','Approved') NOT NULL,
  PRIMARY KEY (`appointID`),
  KEY `patientID` (`patientID`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`appointID`, `patientID`, `fullNames`, `telephone`, `doctorNames`, `appointDate`, `Reminder1`, `Reminder2`, `Reminder3`, `reason`, `status`) VALUES
(11, 230031, 'UWIBAMBE Fabiola', '+250739382931', 'Emile Kayihura', '2024-05-28', '2024-05-23 08:30:00.000000', '2024-05-25 08:30:00.000000', '2024-05-27 08:30:00.000000', 'Health education', 'Approved'),
(27, 230044, 'Tumusime Alice', '+250784481603', 'Emile Kayihura', '2024-05-31', '2024-05-26 15:30:00.000000', '2024-05-28 15:30:00.000000', '2024-05-30 15:30:00.000000', 'Health Education', 'Approved'),
(26, 230042, 'Uwamahoro Sandrine', '+250784481603', 'Real Lotus', '2024-05-30', '2024-05-25 11:56:00.000000', '2024-05-27 11:56:00.000000', '2024-05-29 11:56:00.000000', 'hello', 'Pending'),
(25, 230042, 'Uwamahoro Sandrine', '+250784481603', 'Real Lotus', '2024-05-31', '2024-05-26 14:30:00.000000', '2024-05-28 14:30:00.000000', '2024-05-30 14:30:00.000000', 'test', 'Pending'),
(24, 230042, 'Uwamahoro Sandrine', '+250784481603', 'Emile Kayihura', '2024-05-31', '2024-05-25 22:30:00.000000', '2024-05-27 22:30:00.000000', '2024-05-29 22:30:00.000000', 'Health Education Appointments', 'Pending'),
(23, 230042, 'Uwamahoro Sandrine', '+250784481603', 'Emile Kayihura', '2024-05-30', '2024-05-25 09:30:00.000000', '2024-05-27 09:30:00.000000', '2024-05-29 09:30:00.000000', 'Ultrasound test', 'Pending'),
(22, 230031, 'UWIBAMBE Fabiola', '+250739382931', 'Emile Kayihura', '2024-06-20', '2024-06-15 08:00:00.000000', '2024-06-17 08:00:00.000000', '2024-06-19 08:00:00.000000', 'Ultrasound test ', 'Pending'),
(21, 230042, 'Uwamahoro Sandrine', '+250784481603', 'Emile Kayihura', '2024-06-08', '2024-06-03 07:00:00.000000', '2024-06-05 07:00:00.000000', '2024-06-07 07:00:00.000000', 'hello', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `clinical_history`
--

DROP TABLE IF EXISTS `clinical_history`;
CREATE TABLE IF NOT EXISTS `clinical_history` (
  `cid` int NOT NULL AUTO_INCREMENT,
  `regNo` int DEFAULT NULL,
  `names` tinytext,
  `numbers` varchar(20) NOT NULL,
  `information_type` varchar(55) DEFAULT NULL,
  `results` varchar(10) DEFAULT NULL,
  `comments` varchar(255) DEFAULT NULL,
  `created` date NOT NULL,
  PRIMARY KEY (`cid`),
  KEY `pregnantclinical_history` (`regNo`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `clinical_history`
--

INSERT INTO `clinical_history` (`cid`, `regNo`, `names`, `numbers`, `information_type`, `results`, `comments`, `created`) VALUES
(1, 230001, 'UWIBAMBE Fabiola', 'B.1.1.', 'Previous History of Pregnancy', 'No', 'it is the first time for pregnancy', '2024-04-25'),
(2, 230001, 'UWIBAMBE Fabiola', '1', 'History of Premature Delivery', 'No', 'it is the first time for pregnancy', '2024-04-25'),
(3, 230001, 'UWIBAMBE Fabiola', '', 'History of birth disability', 'No', 'it is the first time for pregnancy', '2024-04-25'),
(4, 230001, 'UWIBAMBE Fabiola', '3', 'Previous Cesarean section (specify date):', 'No', 'it is the first time for pregnancy', '2024-04-25'),
(5, 230001, 'UWIBAMBE Fabiola', '4', 'History of stillbirth or neonatala death', 'No', 'it is the first time for pregnancy', '2024-04-25'),
(6, 230001, 'UWIBAMBE Fabiola', '5', 'Recurrent Abortion 3 times', 'No', 'it is the first time for pregnancy', '2024-04-25'),
(7, 230001, 'UWIBAMBE Fabiola', '6', 'History of delivery of Newborn with less than 2.5kg on ', 'No', 'it is the first time for pregnancy', '2024-04-25'),
(8, 230001, 'UWIBAMBE Fabiola', '7', 'History of Macrosomia(Birth weight >=4kg)', 'No', 'it is the first time for pregnancy', '2024-04-25'),
(9, 230001, 'UWIBAMBE Fabiola', '8', 'History of Hypertension Disorders', 'No', 'it is the first time for pregnancy', '2024-04-25'),
(10, 230001, 'UWIBAMBE Fabiola', '9', 'Any History of multiple Pregnancy?', 'No', 'it is the first time for pregnancy', '2024-04-25'),
(11, 230001, 'UWIBAMBE Fabiola', '10', 'History of Vaginal bleeding during Pregnancy or Post pa', 'No', 'it is the first time for pregnancy', '2024-04-25'),
(12, 230001, 'UWIBAMBE Fabiola', '11', 'Use of Family Planning before this Pregnancy?', 'Yes', 'it is the first time for pregnancy', '2024-04-25'),
(13, 230001, 'UWIBAMBE Fabiola', '12', 'FPRR', '2024-01-15', '', '2024-04-25'),
(14, 230001, 'UWIBAMBE Fabiola', 'B.1.2', 'Information on current Pregnancy', 'No', 'require to be controlled well', '2024-04-25'),
(15, 230001, 'UWIBAMBE Fabiola', '1', 'Is Woman age less than 18 or old than 35 at the first p', 'Yes', 'raped', '2024-04-25'),
(16, 230001, 'UWIBAMBE Fabiola', '2', 'Is She having Vaginal bleeding?', 'Yes', 'till', '2024-04-25');

-- --------------------------------------------------------

--
-- Table structure for table `complications`
--

DROP TABLE IF EXISTS `complications`;
CREATE TABLE IF NOT EXISTS `complications` (
  `id` int NOT NULL AUTO_INCREMENT,
  `patientID` int NOT NULL,
  `name` text,
  `phone` varchar(255) DEFAULT NULL,
  `date` date NOT NULL,
  `exam_type` varchar(255) NOT NULL,
  `complication` varchar(255) NOT NULL,
  `additional_info` text,
  PRIMARY KEY (`id`),
  KEY `patientID` (`patientID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `complications`
--

INSERT INTO `complications` (`id`, `patientID`, `name`, `phone`, `date`, `exam_type`, `complication`, `additional_info`) VALUES
(1, 230029, 'Kuramukobwa Emelance', '+250739382931', '2024-05-29', 'Ultrasound Exam', 'Amniotic Fluid Index', 'Based on previous test result the pregnant mother with the provided information has a high increase of amniotic fluid index.');

-- --------------------------------------------------------

--
-- Table structure for table `doctortable`
--

DROP TABLE IF EXISTS `doctortable`;
CREATE TABLE IF NOT EXISTS `doctortable` (
  `AdminID` int NOT NULL AUTO_INCREMENT,
  `FullNames` text NOT NULL,
  `Emails` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Hospital` text NOT NULL,
  `Specialists` text NOT NULL,
  `Password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`AdminID`)
) ENGINE=MyISAM AUTO_INCREMENT=23005 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `doctortable`
--

INSERT INTO `doctortable` (`AdminID`, `FullNames`, `Emails`, `Phone`, `Hospital`, `Specialists`, `Password`) VALUES
(23004, 'Lotus', 'albertr.lotus23@yahoo.com', '+250784481603', 'Byumba', 'Midwives', '$2y$10$VQsyDM.52YbNoHOZ.sX8BeT7VWArB68./vg.eGeiYk151n37XMcLK');

-- --------------------------------------------------------

--
-- Table structure for table `general_infor`
--

DROP TABLE IF EXISTS `general_infor`;
CREATE TABLE IF NOT EXISTS `general_infor` (
  `gid` int NOT NULL AUTO_INCREMENT,
  `regNo` int DEFAULT NULL,
  `names` varchar(50) DEFAULT NULL,
  `information_type` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `results` tinytext,
  `created` date NOT NULL,
  PRIMARY KEY (`gid`),
  KEY `regNo` (`regNo`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `general_infor`
--

INSERT INTO `general_infor` (`gid`, `regNo`, `names`, `information_type`, `results`, `created`) VALUES
(1, 230001, 'UWIBAMBE Fabiola', 'Surgical history or cervical trauma or cerclage', 'Yes', '2024-04-25'),
(2, 230001, 'UWIBAMBE Fabiola', 'History of Diabetis', 'Yes', '2024-04-25'),
(3, 230001, 'UWIBAMBE Fabiola', 'History of Kidney problems', 'Yes', '2024-04-25'),
(4, 230001, 'UWIBAMBE Fabiola', 'History of Heart Diseases', 'No', '2024-04-25'),
(5, 230001, 'UWIBAMBE Fabiola', 'History of Gynecological problems', 'No', '2024-04-25'),
(6, 230001, 'UWIBAMBE Fabiola', 'History of Tuberculosis', 'No', '2024-04-25'),
(7, 230001, 'UWIBAMBE Fabiola', 'Is She current taking Medicines?', 'No', '2024-04-25'),
(8, 230001, 'UWIBAMBE Fabiola', 'If Yes, Mention them?', 'none', '2024-04-25'),
(9, 230001, 'UWIBAMBE Fabiola', 'Any Medical Allergies?', 'No', '2024-04-25'),
(10, 230001, 'UWIBAMBE Fabiola', 'If Yes, Mention them?', 'none', '2024-04-25'),
(11, 230001, 'UWIBAMBE Fabiola', 'Does She taking Alcohol?', 'Yes', '2024-04-25'),
(12, 230001, 'UWIBAMBE Fabiola', 'Does She taking Tobacco?', 'No', '2024-04-25'),
(13, 230001, 'UWIBAMBE Fabiola', 'History of Psychological problems?', 'Yes', '2024-04-25');

-- --------------------------------------------------------

--
-- Table structure for table `laboratoryexams`
--

DROP TABLE IF EXISTS `laboratoryexams`;
CREATE TABLE IF NOT EXISTS `laboratoryexams` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Test_Date` date NOT NULL,
  `patientID` int NOT NULL,
  `Contact` int NOT NULL,
  `WBC` varchar(30) NOT NULL,
  `RBC` varchar(30) NOT NULL,
  `Hb` varchar(30) NOT NULL,
  `Plt` varchar(30) NOT NULL,
  `RPR_NP` varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `HIV_NP` varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Malaria_NP` varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Hepatite_B_NP` varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Hepatite_C_NP` varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Glycemia` varchar(40) NOT NULL,
  `AdditionalComments` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `patientID` (`patientID`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `laboratoryexams`
--

INSERT INTO `laboratoryexams` (`id`, `Test_Date`, `patientID`, `Contact`, `WBC`, `RBC`, `Hb`, `Plt`, `RPR_NP`, `HIV_NP`, `Malaria_NP`, `Hepatite_B_NP`, `Hepatite_C_NP`, `Glycemia`, `AdditionalComments`) VALUES
(3, '0000-00-00', 230002, 1, '8.2x10^9/L', '6.6x10^12/L', '15.3g/dL', '250x10^9/L', 'Weakly Reactive', 'Negative', 'Negative', 'Negative', 'Negative', '56mg/dL', 'fina oo'),
(4, '0000-00-00', 230004, 1, '8.2x10^9/L', '6.6x10^12/L', '15.3g/dL', '250x10^9/L', 'Reactive (Positive)', 'Negative', 'Negative', 'Positive', 'Positive', '56mg/dL', 'Something change between the gestation age'),
(5, '2024-05-30', 230042, 1, '8.2x10^9/L', '6.6x10^12/L', '15.3g/dL', '250x10^9/L', 'Non-Reactive (Negative)', 'Negative', 'Negative', 'Negative', 'Negative', '56mg/dL', 'Every thing is clear'),
(6, '2024-05-31', 230045, 1, '8.2x10^9/L', '6.6x10^12/L', '15.3g/dL', '250x10^9/L', 'Non-Reactive (Negative)', 'Negative', 'Negative', 'Negative', 'Negative', '56mg/dL', 'none');

-- --------------------------------------------------------

--
-- Table structure for table `nurse`
--

DROP TABLE IF EXISTS `nurse`;
CREATE TABLE IF NOT EXISTS `nurse` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `Hospital` text NOT NULL,
  `HealtCare` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `nurse`
--

INSERT INTO `nurse` (`id`, `name`, `email`, `phone`, `Hospital`, `HealtCare`, `password`, `profile`) VALUES
(1, 'Alice', 'tumalice200@gmail.com', '0791059314', 'CHUK', 'CMS Biryogo', '$2y$10$TjnPhqk/9lguBblNeMzWu.fkezN3ve4qbSiWvZj7/avCoq/LAkkuy', 'uploads/9335e9e5cc8fa4c2993713db053c802f.png');

-- --------------------------------------------------------

--
-- Table structure for table `patientconsoltation`
--

DROP TABLE IF EXISTS `patientconsoltation`;
CREATE TABLE IF NOT EXISTS `patientconsoltation` (
  `id` int NOT NULL AUTO_INCREMENT,
  `PatientID` int NOT NULL,
  `Contacts` int NOT NULL,
  `Cervical_Screening` enum('Normal','Abnormal') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Temperature` varchar(255) NOT NULL,
  `Heart_Bit_Rate` varchar(255) NOT NULL,
  `Respiratory_Rate` varchar(255) NOT NULL,
  `Height` varchar(255) NOT NULL,
  `Weight_kg` varchar(255) NOT NULL,
  `BMI` varchar(255) NOT NULL,
  `MUAC` varchar(255) NOT NULL,
  `Blood_Pressure` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `PatientID` (`PatientID`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `patientconsoltation`
--

INSERT INTO `patientconsoltation` (`id`, `PatientID`, `Contacts`, `Cervical_Screening`, `Temperature`, `Heart_Bit_Rate`, `Respiratory_Rate`, `Height`, `Weight_kg`, `BMI`, `MUAC`, `Blood_Pressure`) VALUES
(12, 230042, 0, '', '0', '0', '0', '0', '0', '0', '0', ''),
(13, 230038, 1, 'Normal', '32.7', '10', '12', '180', '63', '50', '110', '23'),
(14, 230044, 1, 'Normal', '32.7', '180bit/min', '160/min', '180', '63', '25.8', '24.5', '110/70'),
(15, 230045, 1, 'Normal', '32.7', '180bit/min', '160/min', '180', '63', '25.8', '110', '67');

-- --------------------------------------------------------

--
-- Table structure for table `pregnant`
--

DROP TABLE IF EXISTS `pregnant`;
CREATE TABLE IF NOT EXISTS `pregnant` (
  `regNo` int NOT NULL AUTO_INCREMENT,
  `hospital` varchar(25) NOT NULL,
  `healthCenter` varchar(25) NOT NULL,
  `healthPost` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `age` int NOT NULL,
  `MaritalStatus` text NOT NULL,
  `partnerName` varchar(255) NOT NULL,
  `partnerAge` int NOT NULL,
  `employment` text NOT NULL,
  `bloodGroup` text NOT NULL,
  `PhoneNumber` varchar(255) NOT NULL,
  `ContactNumber` varchar(255) NOT NULL,
  `education` varchar(255) NOT NULL,
  `ubudehe` int NOT NULL,
  `religion` varchar(255) NOT NULL,
  `accompany` text NOT NULL,
  `province` text NOT NULL,
  `district` text NOT NULL,
  `sector` text NOT NULL,
  `cell` text NOT NULL,
  `village` text NOT NULL,
  `gravida` varchar(255) NOT NULL,
  `termDelivery` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `prematureDelivery` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `numAbortions` int DEFAULT NULL,
  `parity` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `AgeLastBorn` int DEFAULT NULL,
  `AliveChildren` int DEFAULT NULL,
  `lmpd` date NOT NULL,
  `edd` date NOT NULL,
  `registed_date` date NOT NULL,
  `pregnant_status` text NOT NULL,
  PRIMARY KEY (`regNo`)
) ENGINE=MyISAM AUTO_INCREMENT=230046 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pregnant`
--

INSERT INTO `pregnant` (`regNo`, `hospital`, `healthCenter`, `healthPost`, `name`, `dob`, `age`, `MaritalStatus`, `partnerName`, `partnerAge`, `employment`, `bloodGroup`, `PhoneNumber`, `ContactNumber`, `education`, `ubudehe`, `religion`, `accompany`, `province`, `district`, `sector`, `cell`, `village`, `gravida`, `termDelivery`, `prematureDelivery`, `numAbortions`, `parity`, `AgeLastBorn`, `AliveChildren`, `lmpd`, `edd`, `registed_date`, `pregnant_status`) VALUES
(230031, 'CHUK', 'CMS Biryogo', 'none', 'UWIBAMBE Fabiola', '2000-12-12', 23, 'Married', 'ISHIMWE Albert', 26, 'Yes', 'B', '+250739382931', '+250678900987', 'yes', 2, 'Catholic', 'Yes', 'Kigali', 'Gasabo', 'Rusororo', 'Bisenga', 'Bisenga', 'G1', 'Null', 'Null', 0, 'Null', 0, 0, '2024-05-12', '2025-02-16', '2024-05-26', 'Progress'),
(230045, 'chuk', 'CMS Biryogo', 'none', 'tuyisingize aline', '2001-01-10', 23, 'Married', 'Mugenzi Olivier', 30, 'Yes', 'B', '+250784481603', '+250733567845', 'yes', 3, 'Catholic', 'Yes', 'Kigali', 'Gasabo', 'Rusororo', 'Kinyana', 'Busenyi', 'G1', 'Null', 'Null', 0, 'Null', 0, 0, '2024-05-13', '2025-02-17', '2024-05-31', 'Progress'),
(230044, 'CHUK', 'CMS Biryogo', 'rwampara', 'Tumusime Alice', '1990-06-12', 33, 'Married', 'Musoni Desire', 36, 'Yes', 'A', '+250784481603', '+250678900987', 'yes', 3, 'Catholic', 'No', 'West', 'Ngororero', 'Gatumba', 'Cyome', 'Nyakagezi', 'G1', 'Null', 'Null', 0, 'Null', 0, 0, '2024-05-18', '2025-02-22', '2024-05-30', 'Progress'),
(230043, 'CHUK', 'CMS Biryogo', 'rwampara', 'Tumusime Alice', '1990-06-12', 33, 'Married', 'Musoni Desire', 36, 'Yes', 'A', '+250784481603', '+250678900987', 'yes', 3, 'Catholic', 'No', 'West', 'Ngororero', 'Gatumba', 'Cyome', 'Nyakagezi', 'G1', 'Null', 'Null', 0, 'Null', 0, 0, '2024-05-18', '2025-02-22', '2024-05-30', 'Progress'),
(230042, 'Norbert Hospital', 'CMS Biryogo', 'rwampara', 'Uwamahoro Sandrine', '2003-01-05', 21, 'Single', 'ISHIMWE Albert', 43, 'Yes', 'B', '+250784481603', '+250678900987', 'none', 2, 'Catholic', 'Yes', 'Kigali', 'Gasabo', 'Remera', 'Nyabisindu', 'Amarembo I', 'G1', 'Null', 'Null', 0, 'Null', 0, 0, '2024-05-15', '2025-02-19', '2024-05-28', 'Progress');

-- --------------------------------------------------------

--
-- Table structure for table `pregnant_registration`
--

DROP TABLE IF EXISTS `pregnant_registration`;
CREATE TABLE IF NOT EXISTS `pregnant_registration` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `due_date` date NOT NULL,
  `reg_date` date NOT NULL,
  `gender` enum('Female','Male','Other') NOT NULL,
  `health_conditions` text,
  `pregnant_days` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pregnant_registration`
--

INSERT INTO `pregnant_registration` (`id`, `fullname`, `email`, `phone`, `dob`, `address`, `due_date`, `reg_date`, `gender`, `health_conditions`, `pregnant_days`) VALUES
(1, 'UWIBAMBE Fabiola', 'albertr.lotus23@yahoo.com', '0784481603', '2005-01-01', 'Kigali', '2024-05-31', '2023-08-01', 'Female', 'no', 280),
(2, 'Albert BYUMVUHORE', 'albertr.lotus23@yahoo.com', '0784481603', '2024-05-01', 'Kigali', '2024-09-02', '2024-01-01', 'Male', 'hgghhghg', 130);

-- --------------------------------------------------------

--
-- Table structure for table `preventivecare`
--

DROP TABLE IF EXISTS `preventivecare`;
CREATE TABLE IF NOT EXISTS `preventivecare` (
  `id` int NOT NULL AUTO_INCREMENT,
  `numContacts` int DEFAULT NULL,
  `patientID` int DEFAULT NULL,
  `provision_iron_folic` enum('Yes','No') DEFAULT NULL,
  `provision_metoclopramide` enum('Yes','No') DEFAULT NULL,
  `tetanus_diptheria` enum('Yes','No') DEFAULT NULL,
  `calcium` enum('Yes','No') DEFAULT NULL,
  `mosquito_net` enum('Yes','No') DEFAULT NULL,
  `urinary_treatment` enum('Yes','No') DEFAULT NULL,
  `rdv` date DEFAULT NULL,
  `health_provider` varchar(30) DEFAULT NULL,
  `health_worker` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `patientID` (`patientID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `preventivecare`
--

INSERT INTO `preventivecare` (`id`, `numContacts`, `patientID`, `provision_iron_folic`, `provision_metoclopramide`, `tetanus_diptheria`, `calcium`, `mosquito_net`, `urinary_treatment`, `rdv`, `health_provider`, `health_worker`) VALUES
(3, 1, 230029, 'Yes', 'Yes', 'No', 'Yes', 'No', 'No', '2025-02-16', 'CMS Biryogo', 'Kamanzi'),
(4, 1, 230042, 'Yes', 'No', 'No', 'Yes', 'Yes', 'Yes', '2025-02-19', 'CMS Biryogo', 'Kamanzi Eric');

-- --------------------------------------------------------

--
-- Table structure for table `ultrasoundtable`
--

DROP TABLE IF EXISTS `ultrasoundtable`;
CREATE TABLE IF NOT EXISTS `ultrasoundtable` (
  `Ultra_ID` int NOT NULL AUTO_INCREMENT,
  `Test_Date` date NOT NULL,
  `PatientID` int NOT NULL,
  `Contact` int NOT NULL,
  `Gestation_Week` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Fundal_Height` float NOT NULL,
  `Fetal_Heart_Beat` float NOT NULL,
  `Fetal_movement` enum('Yes','No') DEFAULT NULL,
  `Fetal_Heart_Rate` float NOT NULL,
  `Fetal_Presentation` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `E_Fetal_Weight` float NOT NULL,
  `Amniotic_F_Index` int NOT NULL,
  `Number_Fetus` text NOT NULL,
  `MaternalComments` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Ultra_ID`),
  KEY `PatientID` (`PatientID`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ultrasoundtable`
--

INSERT INTO `ultrasoundtable` (`Ultra_ID`, `Test_Date`, `PatientID`, `Contact`, `Gestation_Week`, `Fundal_Height`, `Fetal_Heart_Beat`, `Fetal_movement`, `Fetal_Heart_Rate`, `Fetal_Presentation`, `E_Fetal_Weight`, `Amniotic_F_Index`, `Number_Fetus`, `MaternalComments`) VALUES
(5, '0000-00-00', 230039, 0, '', 0, 0, NULL, 0, '', 0, 0, '0', NULL),
(6, '2024-05-28', 230037, 1, '4', 3.2, 3, 'Yes', 3, 'cephalic', 2.2, 1200, '0', '565'),
(7, '2024-05-30', 230044, 1, '1', 4.8, 12, 'Yes', 110, 'cephalic', 1.002, 14, '0', 'Normal AFI, no intervention needed'),
(8, '2024-05-31', 230045, 1, '1', 2.2, 12, 'Yes', 110, 'cephalic', 2.2, 14, '0', '');

-- --------------------------------------------------------

--
-- Table structure for table `urinaryexams`
--

DROP TABLE IF EXISTS `urinaryexams`;
CREATE TABLE IF NOT EXISTS `urinaryexams` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `PatientID` int DEFAULT NULL,
  `Contact` int DEFAULT NULL,
  `testDate` date DEFAULT NULL,
  `Glucosuria` varchar(55) DEFAULT NULL,
  `Proteinuria` enum('Positive','Negative') DEFAULT NULL,
  `Appearance` varchar(55) DEFAULT NULL,
  `pH` float DEFAULT NULL,
  `Protein` enum('Positive','Negative') DEFAULT NULL,
  `Glucose` enum('Positive','Negative') DEFAULT NULL,
  `Ketones` enum('Positive','Negative') DEFAULT NULL,
  `Leukocytes` varchar(55) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `PatientID` (`PatientID`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `urinaryexams`
--

INSERT INTO `urinaryexams` (`ID`, `PatientID`, `Contact`, `testDate`, `Glucosuria`, `Proteinuria`, `Appearance`, `pH`, `Protein`, `Glucose`, `Ketones`, `Leukocytes`) VALUES
(11, 230004, 1, '2024-05-26', '189mg/dL', 'Positive', 'Amber', 7, 'Positive', 'Negative', 'Negative', '20/µL'),
(10, 230004, 1, '2024-05-26', '189mg/dL', 'Positive', 'Amber', 7, 'Positive', 'Negative', 'Negative', '20/µL'),
(9, 230002, 1, '2024-05-26', '190mg/dL', 'Negative', 'Orange', 7.5, 'Positive', 'Positive', 'Positive', '10/µL'),
(8, 230001, 1, '2024-05-26', '190mg/dL', 'Positive', 'Dark Yellow', 7.5, 'Positive', 'Positive', 'Positive', '10/µL'),
(7, 230001, 1, '2024-05-26', '190mg/dL', 'Positive', 'Dark Yellow', 7.5, 'Positive', 'Positive', 'Positive', '10/µL'),
(12, 230004, 1, '2024-05-26', '189mg/dL', 'Positive', 'Amber', 7, 'Positive', 'Negative', 'Negative', '20/µL'),
(13, 230042, 1, '2024-05-30', '190mg/dL', 'Negative', 'Clear', 7.5, 'Negative', 'Negative', 'Negative', '20/µL'),
(14, 230045, 1, '2024-05-31', '190mg/dL', 'Negative', 'Clear', 7.5, 'Negative', 'Positive', 'Negative', '20/µL');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
