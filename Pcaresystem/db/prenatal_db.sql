-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 20, 2024 at 09:14 AM
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
  `contact` varchar(30) DEFAULT NULL,
  `doctorNames` varchar(20) DEFAULT NULL,
  `specialists` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `appointDate` date NOT NULL,
  `reason` text,
  `status` enum('Pending','Approved') NOT NULL,
  PRIMARY KEY (`appointID`),
  KEY `patientID` (`patientID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`appointID`, `patientID`, `fullNames`, `telephone`, `contact`, `doctorNames`, `specialists`, `appointDate`, `reason`, `status`) VALUES
(1, 230001, 'UWIBAMBE Fabiola', '+250 739382931', '0784481603', 'Real Lotus', 'Neonatologists', '2024-05-30', 'vb', 'Approved'),
(2, 230002, 'Rosine', '+250784481603', '0784481603', 'Real Lotus', 'Obstetricians', '2024-06-15', 'Ultrasound treatments and health education ', 'Approved'),
(3, 230003, 'Rosine', '+250739382931', '0784481603', 'Emile Kayihura', 'Midwives', '2024-06-20', 'Health Education', 'Approved'),
(4, 230003, 'Rosine', '+250739382931', '0784481603', 'Emile Kayihura', 'Midwives', '2024-06-20', 'Health Education', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `blood_tests`
--

DROP TABLE IF EXISTS `blood_tests`;
CREATE TABLE IF NOT EXISTS `blood_tests` (
  `id` int NOT NULL AUTO_INCREMENT,
  `test_data` date DEFAULT NULL,
  `PatientID` int NOT NULL,
  `names` varchar(255) DEFAULT NULL,
  `contacts` varchar(255) DEFAULT NULL,
  `wbc_test` varchar(255) DEFAULT NULL,
  `rbc_test` varchar(255) DEFAULT NULL,
  `hb_test` varchar(255) DEFAULT NULL,
  `plt_test` varchar(255) DEFAULT NULL,
  `blood_type` tinytext,
  `blood_pressure` varchar(25) DEFAULT NULL,
  `rpr_np` enum('-N','+P') DEFAULT NULL,
  `hiv_np` enum('-N','+P') DEFAULT NULL,
  `malaria` enum('-N','+P') DEFAULT NULL,
  `hepatite_b` enum('-N','+P') DEFAULT NULL,
  `hepatite_c` enum('-N','+P') DEFAULT NULL,
  `glycemia_test` varchar(255) DEFAULT NULL,
  `additional_info` text,
  PRIMARY KEY (`id`),
  KEY `PatientID` (`PatientID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `blood_tests`
--

INSERT INTO `blood_tests` (`id`, `test_data`, `PatientID`, `names`, `contacts`, `wbc_test`, `rbc_test`, `hb_test`, `plt_test`, `blood_type`, `blood_pressure`, `rpr_np`, `hiv_np`, `malaria`, `hepatite_b`, `hepatite_c`, `glycemia_test`, `additional_info`) VALUES
(1, '2024-05-09', 230001, 'UWIBAMBE Fabiola', '1', '5.8', '350', '38', '12', 'A', '23', '+P', '+P', '+P', '+P', '+P', '23', 'hgsdh');

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
  `Password` varchar(20) NOT NULL,
  PRIMARY KEY (`AdminID`)
) ENGINE=MyISAM AUTO_INCREMENT=23004 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `doctortable`
--

INSERT INTO `doctortable` (`AdminID`, `FullNames`, `Emails`, `Phone`, `Hospital`, `Specialists`, `Password`) VALUES
(23003, 'Real Lotus', 'albertr.lotus23@yahoo.com', '+250739382931', 'Byumba', 'Neonatologists', 'Real@2024');

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
-- Table structure for table `laboratory_tests`
--

DROP TABLE IF EXISTS `laboratory_tests`;
CREATE TABLE IF NOT EXISTS `laboratory_tests` (
  `tID` int NOT NULL AUTO_INCREMENT,
  `contacts` int NOT NULL,
  `testDate` date NOT NULL,
  `regNo` int NOT NULL,
  `phone` varchar(40) NOT NULL,
  `glucosuria` varchar(20) DEFAULT NULL,
  `proteinuria` varchar(20) DEFAULT NULL,
  `urinanalysis` varchar(20) DEFAULT NULL,
  `comment` varchar(40) NOT NULL,
  PRIMARY KEY (`tID`),
  KEY `regNo` (`regNo`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `laboratory_tests`
--

INSERT INTO `laboratory_tests` (`tID`, `contacts`, `testDate`, `regNo`, `phone`, `glucosuria`, `proteinuria`, `urinanalysis`, `comment`) VALUES
(4, 1, '2024-04-29', 230001, '+250 739382931', '30.6%', '28.9%', '2.9%', 'sansshjsahsah'),
(5, 1, '2024-04-29', 230001, '+250 739382931', '30.6%', '28.9%', '2.9%', 'sansshjsahsah');

-- --------------------------------------------------------

--
-- Table structure for table `patientconsoltation`
--

DROP TABLE IF EXISTS `patientconsoltation`;
CREATE TABLE IF NOT EXISTS `patientconsoltation` (
  `id` int NOT NULL AUTO_INCREMENT,
  `PatientID` int NOT NULL,
  `Contacts` int NOT NULL,
  `test_Date` date NOT NULL,
  `names` varchar(40) NOT NULL,
  `phone` varchar(40) NOT NULL,
  `Cervical_Screening` enum('Normal','Abnormal') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Temperature` float NOT NULL,
  `Heart_Bit_Rate` float NOT NULL,
  `Respiratory_Rate` float NOT NULL,
  `Height` int NOT NULL,
  `Ultrasound_weeks` int NOT NULL,
  `Weight_kg` float NOT NULL,
  `BMI` float NOT NULL,
  `MUAC` float NOT NULL,
  `MaternalComments` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `PatientID` (`PatientID`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `patientconsoltation`
--

INSERT INTO `patientconsoltation` (`id`, `PatientID`, `Contacts`, `test_Date`, `names`, `phone`, `Cervical_Screening`, `Temperature`, `Heart_Bit_Rate`, `Respiratory_Rate`, `Height`, `Ultrasound_weeks`, `Weight_kg`, `BMI`, `MUAC`, `MaternalComments`) VALUES
(11, 230001, 2, '2024-05-06', 'UWIBAMBE Fabiola', '+250 739382931', 'Normal', 30.9, 5, 8, 182, 3, 65, 52, 115, 'everything is normal'),
(10, 230001, 1, '2024-05-06', 'UWIBAMBE Fabiola', '+250 739382931', 'Normal', 32.7, 10, 12, 180, 2, 63, 50, 110, 'good');

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
  `termDelivery` text NOT NULL,
  `prematureDelivery` text NOT NULL,
  `numAbortions` int NOT NULL,
  `parity` varchar(255) NOT NULL,
  `AgeLastBorn` int NOT NULL,
  `AliveChildren` int NOT NULL,
  `lmpd` date NOT NULL,
  `edd` date NOT NULL,
  `registed_date` date NOT NULL,
  `pregnant_days` int NOT NULL,
  PRIMARY KEY (`regNo`)
) ENGINE=MyISAM AUTO_INCREMENT=230020 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pregnant`
--

INSERT INTO `pregnant` (`regNo`, `hospital`, `healthCenter`, `healthPost`, `name`, `dob`, `age`, `MaritalStatus`, `partnerName`, `partnerAge`, `employment`, `bloodGroup`, `PhoneNumber`, `ContactNumber`, `education`, `ubudehe`, `religion`, `accompany`, `province`, `district`, `sector`, `cell`, `village`, `gravida`, `termDelivery`, `prematureDelivery`, `numAbortions`, `parity`, `AgeLastBorn`, `AliveChildren`, `lmpd`, `edd`, `registed_date`, `pregnant_days`) VALUES
(230001, 'Byumba', 'Mulindi', 'none', 'UWIBAMBE Fabiola', '1999-12-04', 25, 'Single', 'Patrick Abayisenga', 32, 'none', 'AB', '+250 739382931', '0784481603', 'yes', 3, 'Catholic\r\n', 'No', 'North', 'Gicumbi', 'Kaniga', 'Mulindi', 'Centre Mulindi', '3.6%', 'yes', 'no', 0, '0', 0, 0, '2024-04-12', '2025-01-18', '0000-00-00', 0),
(230002, 'Byumba', 'Mulindi', 'none', 'Rosine', '2004-02-29', 19, 'Married', 'Bosco', 25, 'Yes', 'A', '+250784481603', '0784481603', 'yes', 1, 'Catholic\r\n', 'No', 'Kigali', 'Gasabo', 'Gatsata', 'Karuruma', 'Kingasire', '3.6%', 'yes', 'No', 0, '0', 0, 0, '2024-04-17', '2025-06-29', '0000-00-00', 0),
(230003, 'Byumba', 'Mulindi', 'none', 'Rosine', '2000-02-29', 24, 'Single', 'Bosco', 23, 'Yes', 'B', '+250739382931', '0784481603', 'yes', 3, 'Catholic\r\n', 'Yes', 'Eastern Province', 'Bugesera', 'Juru', 'Juru', 'Ayabakiza', '3.6%', 'yes', 'Yes', 1, '1', 1, 1, '2024-04-17', '2025-07-07', '0000-00-00', 0),
(230004, 'Byumba', 'Mulindi', 'none', 'Rosine', '2000-02-29', 24, 'Single', 'Bosco', 23, 'Yes', 'B', '+250739382931', '0784481603', 'yes', 3, 'Catholic\r\n', 'Yes', 'Eastern Province', 'Bugesera', 'Juru', 'Juru', 'Ayabakiza', '3.6%', 'yes', 'Yes', 1, '1', 1, 1, '2024-04-17', '2025-07-07', '0000-00-00', 0),
(230005, 'Byumba', 'Mulindi', 'none', 'UWIHIRWE Sophie', '1999-07-15', 25, 'Single', 'Patrick Abayisenga', 28, 'Yes', 'B', '+250739382931', '+250784481603', 'yes', 3, 'Catholic\r\n', 'No', 'North', 'Gicumbi', 'Kaniga', 'Bugomba', 'Kajevuba', '3.6%', 'no', 'No', 0, '0', 0, 0, '2024-04-28', '2025-01-12', '2024-05-10', 0),
(230006, 'Byumba', 'Mulindi', 'none', 'UWIHIRWE Sophie', '1999-07-15', 25, 'Single', 'Patrick Abayisenga', 28, 'Yes', 'B', '+250739382931', '+250784481603', 'yes', 3, 'Catholic\r\n', 'No', 'North', 'Gicumbi', 'Kaniga', 'Bugomba', 'Kajevuba', '3.6%', 'no', 'No', 0, '0', 0, 0, '2024-04-28', '2025-01-12', '2024-05-10', 12),
(230007, 'Byumba', 'Mulindi', 'none', 'Kuramukobwa Emelance', '1995-01-01', 29, 'Single', 'Patrick Abayisenga', 34, 'No', 'B', '+250784481603', '+250739382931', 'yes', 4, 'Catholic\r\n', 'No', 'West', 'Karongi', 'Rwankuba', 'Bigugu', 'Kagusa', '3.6%', 'no', 'No', 0, '0', 0, 0, '2024-05-01', '2025-01-15', '2024-05-10', 9),
(230011, 'CHUB', 'CMS Biryogo', 'none', 'Kuramukobwa Emelance', '1995-12-07', 29, 'Single', 'Musoni Desire', 31, 'Yes', 'B', '+250739382931', '0784481603', 'yes', 3, 'Catholic\r\n', 'No', 'West', 'Karongi', 'Bwishyura', 'Burunga', 'Kabuga', '3.6%', 'no', 'No', 0, '0', 0, 0, '2023-09-01', '2024-05-17', '2024-05-14', 256),
(230012, 'CHUK', 'CMS Biryogo', 'none', 'Mugeni Blandine', '1996-01-01', 28, 'Single', 'Mugenzi Olivier', 28, 'Yes', 'AB', '+250784481603', '+250784481603', 'yes', 2, 'Advantist\r\n', 'Yes', 'West', 'Karongi', 'Gitesi', 'Gitega', 'Kagari', '0', 'no', 'No', 0, '0', 0, 0, '2024-01-28', '2024-11-03', '2024-05-14', 107),
(230013, 'Norbert Hospital', 'CMS Biryogo', 'none', 'Uwamahoro Sandrine', '1997-10-10', 27, 'Single', 'ISHIMWE Albert', 25, 'No', 'O', '+250739382931', '+2500784481603', 'yes', 3, 'Catholic\r\n', 'Other', 'North', 'Gicumbi', 'Mukarange', 'Rusambya', 'Nyagakizi', '0', 'no', 'No', 0, '0', 0, 0, '2023-12-05', '2024-09-10', '2024-05-15', 162),
(230014, 'Norbert Hospital', 'CMS Biryogo', 'none', 'Uwamahoro Sandrine', '1997-10-10', 27, 'Single', 'ISHIMWE Albert', 25, 'No', 'O', '+250739382931', '+2500784481603', 'yes', 3, 'Catholic\r\n', 'Other', 'North', 'Gicumbi', 'Mukarange', 'Rusambya', 'Nyagakizi', '0', 'no', 'No', 0, '0', 0, 0, '2023-12-05', '2024-09-10', '2024-05-15', 162),
(230015, 'Norbert Hospital', 'CMS Biryogo', 'none', 'Uwamahoro Sandrine', '1997-10-10', 27, 'Single', 'ISHIMWE Albert', 25, 'No', 'O', '+250739382931', '+2500784481603', 'yes', 3, 'Catholic', 'Other', 'North', 'Gicumbi', 'Mukarange', 'Rusambya', 'Nyagakizi', '0', 'no', 'No', 0, '0', 0, 0, '2023-12-05', '2024-09-10', '2024-05-15', 162),
(230016, 'Norbert Hospital', 'CMS Biryogo', 'none', 'Uwamahoro Sandrine', '1997-10-10', 27, 'Single', 'ISHIMWE Albert', 25, 'No', 'O', '+250739382931', '+2500784481603', 'yes', 3, 'Catholic', 'Other', 'North', 'Gicumbi', 'Mukarange', 'Rusambya', 'Nyagakizi', '0', 'no', 'No', 0, '0', 0, 0, '2023-12-05', '2024-09-10', '2024-05-15', 162),
(230017, 'Norbert Hospital', 'CMS Biryogo', 'none', 'Uwamahoro Sandrine', '1997-10-10', 27, 'Single', 'ISHIMWE Albert', 25, 'No', 'O', '+250739382931', '+2500784481603', 'yes', 3, 'Catholic', 'Other', 'North', 'Gicumbi', 'Mukarange', 'Rusambya', 'Nyagakizi', '0', 'no', 'No', 0, '0', 0, 0, '2023-12-05', '2024-09-10', '2024-05-15', 162),
(230018, 'Norbert Hospital', 'CMS Biryogo', 'none', 'Uwamahoro Sandrine', '1997-10-10', 27, 'Single', 'ISHIMWE Albert', 25, 'No', 'O', '+250739382931', '+2500784481603', 'yes', 3, 'Catholic', 'Other', 'North', 'Gicumbi', 'Mukarange', 'Rusambya', 'Nyagakizi', '0', 'no', 'No', 0, '0', 0, 0, '2023-12-05', '2024-09-10', '2024-05-15', 162),
(230019, 'CHUB', 'CMS Biryogo', 'none', 'liliose', '2015-02-01', 28, 'Married', 'Musoni Desire', 40, 'No', 'B', '+250739382931', '+250784481603', 'yes', 3, 'Catholic', 'Yes', 'Kigali', 'Gasabo', 'Kacyiru', 'Kamatamu', 'Gataba', '2', '1', 'No', 0, '1', 2, 1, '2024-05-10', '2025-02-14', '2024-05-18', 8);

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ultrasoundtable`
--

DROP TABLE IF EXISTS `ultrasoundtable`;
CREATE TABLE IF NOT EXISTS `ultrasoundtable` (
  `Ultra_ID` int NOT NULL AUTO_INCREMENT,
  `Contacts` int NOT NULL,
  `Test_Date` date NOT NULL,
  `PatientID` int NOT NULL,
  `Names` varchar(20) NOT NULL,
  `Fundal_Height` float NOT NULL,
  `Fetal_Heart_Beat` float NOT NULL,
  `Fetal_movement` enum('Yes','No') DEFAULT NULL,
  `Fetal_Heart_Rate` float NOT NULL,
  `Fetal_Presentation` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `E_Fetal_Weight` float NOT NULL,
  `Amniotic_F_Index` int NOT NULL,
  `Number_Fetus` int NOT NULL,
  `MaternalComments` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Ultra_ID`),
  KEY `PatientID` (`PatientID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ultrasoundtable`
--

INSERT INTO `ultrasoundtable` (`Ultra_ID`, `Contacts`, `Test_Date`, `PatientID`, `Names`, `Fundal_Height`, `Fetal_Heart_Beat`, `Fetal_movement`, `Fetal_Heart_Rate`, `Fetal_Presentation`, `E_Fetal_Weight`, `Amniotic_F_Index`, `Number_Fetus`, `MaternalComments`) VALUES
(1, 1, '2024-05-06', 230001, 'UWIBAMBE Fabiola', 3.28, 3, 'Yes', 3, 'Cephalic', 2, 117, 0, ''),
(2, 2, '2024-05-06', 230001, 'UWIBAMBE Fabiola', 4, 9, 'Yes', 5, 'Unknown', 2.9, 114, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `urinary_test`
--

DROP TABLE IF EXISTS `urinary_test`;
CREATE TABLE IF NOT EXISTS `urinary_test` (
  `testID` int NOT NULL AUTO_INCREMENT,
  `PatientID` int DEFAULT NULL,
  `CONTACTS` varchar(255) DEFAULT NULL,
  `DATE` date DEFAULT NULL,
  `Glucosuria` varchar(255) DEFAULT NULL,
  `Proteinuria` varchar(255) DEFAULT NULL,
  `Urinanalysis_ECBU` varchar(255) DEFAULT NULL,
  `Add_Comments` text,
  PRIMARY KEY (`testID`),
  KEY `PatientID` (`PatientID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `urinary_test`
--

INSERT INTO `urinary_test` (`testID`, `PatientID`, `CONTACTS`, `DATE`, `Glucosuria`, `Proteinuria`, `Urinanalysis_ECBU`, `Add_Comments`) VALUES
(1, 230001, '1', '2024-05-09', '30.6%', '28.9%', '2.9%', 'Good'),
(2, 230002, '1', '2024-05-09', '30.6%', '28.9%', '2.9%', 'verynice');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
