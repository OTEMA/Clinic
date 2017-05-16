-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2016 at 08:13 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `clinicosight`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `adminid` bigint(4) NOT NULL AUTO_INCREMENT,
  `adminname` varchar(50) NOT NULL,
  `contactno` varchar(20) NOT NULL,
  `emailid` varchar(50) NOT NULL,
  `password` varchar(25) NOT NULL,
  PRIMARY KEY (`adminid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1235 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `adminname`, `contactno`, `emailid`, `password`) VALUES
(1234, 'Bonface Otieno', '0714087396', 'lasbon116@gmail.com', 'Snyper116');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE IF NOT EXISTS `appointment` (
  `appointid` bigint(4) NOT NULL AUTO_INCREMENT,
  `patid` bigint(4) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `atime` varchar(10) NOT NULL,
  `adate` date NOT NULL,
  `docid` bigint(4) NOT NULL,
  `status` varchar(50) NOT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY (`appointid`),
  KEY `patid` (`patid`),
  KEY `docid` (`docid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointid`, `patid`, `datetime`, `atime`, `adate`, `docid`, `status`, `comment`) VALUES
(6, 112, '2012-03-29 12:55:26', '10:30', '2012-03-30', 1112, '29-03-2012', 'abcd'),
(11, 113, '2012-04-02 07:19:16', '05:00', '2012-04-02', 1113, '02-04-2012', 'xfed'),
(12, 113, '2012-04-02 07:19:36', '01:00', '2012-04-02', 1114, '02-04-2012', 'ff'),
(13, 113, '2012-04-02 07:49:37', '06:15', '2012-04-02', 1112, '02-04-2012', 'tgrt'),
(14, 113, '2012-04-02 07:49:53', '07:15', '2012-04-02', 1115, '02-04-2012', 'gtg'),
(15, 117, '2016-06-14 07:29:47', '10:00', '2016-06-14', 1112, '14-06-2016', 'Liver Problem'),
(16, 117, '2016-06-14 07:30:53', '02:15', '2016-06-15', 1114, '14-06-2016', ''),
(17, 118, '2016-06-14 12:11:19', '06:45', '2016-06-14', 1112, 'Pending', 'Malim'),
(18, 119, '2016-06-14 15:04:15', '07:30', '2016-06-15', 1112, 'Pending', 'Wia Bara'),
(19, 120, '2016-06-23 18:37:45', '11:00', '2016-06-27', 1112, 'Pending', '');

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE IF NOT EXISTS `billing` (
  `billid` bigint(4) NOT NULL AUTO_INCREMENT,
  `patid` bigint(4) NOT NULL,
  `totamt` float NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `treid` varchar(15) NOT NULL,
  `docid` bigint(4) NOT NULL,
  PRIMARY KEY (`billid`),
  KEY `patid` (`patid`),
  KEY `treid` (`treid`),
  KEY `docid` (`docid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=62 ;

--
-- Dumping data for table `billing`
--

INSERT INTO `billing` (`billid`, `patid`, `totamt`, `date`, `treid`, `docid`) VALUES
(60, 113, 1400, '2012-04-02 07:23:27', '25', 1114),
(61, 113, 2713, '2012-04-02 07:52:49', '54', 1115);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE IF NOT EXISTS `doctor` (
  `docid` bigint(4) NOT NULL AUTO_INCREMENT,
  `doctorname` varchar(50) NOT NULL,
  `quali` varchar(50) NOT NULL,
  `specialistin` varchar(50) NOT NULL,
  `contactno` varchar(20) NOT NULL,
  `emailid` varchar(50) NOT NULL,
  `biodata` text NOT NULL,
  `password` varchar(25) NOT NULL,
  PRIMARY KEY (`docid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1121 ;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`docid`, `doctorname`, `quali`, `specialistin`, `contactno`, `emailid`, `biodata`, `password`) VALUES
(1112, 'Charles Onyango', 'M.D, D.M', 'Orthology', '7865432157', 'onyango@yahoo.co.in', 'Specialist in Orthology', '100002'),
(1113, 'Olivia Wahonya Atieno', 'M.B.B.S', 'Public Health', '9865321478', 'Oliviawahonya@yahoo.com', 'Specialist In Public Health ', '100003'),
(1114, 'Steve Mbaya Banoda', 'M.D.M.B.B.S', 'Neurologist', '9865327412', 'stevembaya@yahoo.co.in', 'Specialist in: Neurologist', '100004'),
(1115, 'Titus G Otieno', 'Doctor', 'Skin Ailment', '0712456234', 'titusotieno@gmail.com', 'jhkh', '123456'),
(1119, 'Arnold Otieno Odizi', 'Controller', 'Phsyciatrist', '0711318544', 'odizi@yahoo.com', 'Was Born in Kisumu, Doctorate in Medicine and surgery', '12345678'),
(1120, 'Victor Otieno Yuko', 'Doctor', 'Brain Surgeon', '0711318543', 'victoryuko@yahoo.com', 'Was Born in Kisumu, Doctorate in Medicine and surgery', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `empid` bigint(4) NOT NULL AUTO_INCREMENT,
  `password` varchar(25) NOT NULL,
  `empname` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contactno` varchar(30) NOT NULL,
  `emailid` varchar(50) NOT NULL,
  `designation` varchar(59) NOT NULL,
  PRIMARY KEY (`empid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11115 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`empid`, `password`, `empname`, `address`, `contactno`, `emailid`, `designation`) VALUES
(11111, '111111', 'Judith Akinyi Oyoo', 'Kankanadi,Mangalore', '7865423165', 'judiakinyi@gmail.com', 'Receptionist'),
(11112, '111112', 'Rose Evaline Aete', 'Karkala, Udupi', '7896543256', 'babitha@yahoo.co.in', 'Lab Assistant'),
(11113, '111113', 'Sowmya Kumari K', 'Bantwal, Mangalore', '8965478932', 'sowmyakumarik@gmail.com', 'Receptionist'),
(11114, '111114', 'Hari Prasad M', 'Hampankatta, Mangalore', '9865473214', 'Hariprasad@hotmail.com', 'Lab Assistant');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE IF NOT EXISTS `expenses` (
  `expensetype` varchar(50) NOT NULL,
  `quantity` int(2) NOT NULL,
  `expamt` float NOT NULL,
  `date` date NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`expensetype`, `quantity`, `expamt`, `date`, `comment`) VALUES
('Dustbin', 3, 300, '2012-03-22', 'Today 3 Dustbin Purchased'),
('Table', 2, 1000, '2012-03-24', 'Receptionist Table'),
('Chair', 5, 1250, '2012-03-25', '5 Receptionist Chair Purchased'),
('Buy Computers', 100, 100000, '2016-06-14', 'HP');

-- --------------------------------------------------------

--
-- Table structure for table `labtest`
--

CREATE TABLE IF NOT EXISTS `labtest` (
  `testid` bigint(4) NOT NULL AUTO_INCREMENT,
  `ttypeid` bigint(4) NOT NULL,
  `patid` bigint(4) NOT NULL,
  `empid` bigint(4) DEFAULT NULL,
  `labfee` float NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `treid` bigint(4) NOT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY (`testid`),
  KEY `ttypeid` (`ttypeid`),
  KEY `patid` (`patid`),
  KEY `empid` (`empid`),
  KEY `treid` (`treid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `labtest`
--

INSERT INTO `labtest` (`testid`, `ttypeid`, `patid`, `empid`, `labfee`, `date`, `time`, `treid`, `comment`) VALUES
(22, 2, 112, 11111, 5000, '2012-03-29', '06:35:28', 7, 'ABCD 1'),
(23, 3, 112, 11111, 10000, '2012-03-29', '06:36:00', 7, 'ABCD 2'),
(24, 4, 112, 11111, 6000, '2012-03-29', '06:36:13', 7, 'BCD 3'),
(28, 1, 113, 11112, 600, '2012-04-02', '12:52:35', 12, 'sererr'),
(29, 4, 113, 11112, 333, '2012-04-02', '01:22:34', 14, 'wsw');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE IF NOT EXISTS `medicine` (
  `medicine` varchar(70) NOT NULL,
  `description` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`medicine`, `description`) VALUES
('Coartem', 'Treats malaria and reduce headaches'),
('Anabolic Steroid', 'A drug that increases muscles, used illegally by some sports people to make themselves stronger'),
('Amphetamine', 'A drug that increases energy and excitement and makes you less hungry'),
('Anaesthesia', 'An anaesthetic that is given to someone before they have a medical operation, or the use of anaesthetics'),
('Anaesthetic', 'a drug or gas that is given to someone before a medical operation to stop them feeling pain. An anaesthetic that affects the whole of your body by making you unconscious is called a general anaesthetic and an anaesthetic that affects only a part of your body is called a local anaesthetic'),
('analgesic', 'a drug that reduces pain'),
('anesthesia ', 'an American spelling of anaesthesia'),
('anesthetic ', 'an American spelling of anaesthetic'),
('antacid', 'a medicine that reduces the amount of acid in your stomach'),
('antibiotic', 'a drug that cures illnesses and infections caused by bacteria. Doctors often give people a course of antibiotics, when they have to take a fixed amount of medicine each day for several days.'),
('anticoagulant', 'a substance that prevents blood from coagulating (=becoming more solid)'),
('antidepressant', 'a drug used for treating someone who is depressed (=so unhappy that they are considered ill)'),
('antidote', 'a substance that prevents a poison from having bad effects'),
('antihistamine', 'a drug used to treat an allergy (=a bad reaction to something you swallow or touch)'),
('anti-inflammatory', 'a drug taken to reduce inflammation (=swelling, heat, and pain)'),
('antiretroviral', 'antiretroviral drugs are used to treat certain types of virus, especially HIV (=the virus that causes AIDS)'),
('barbiturate', 'a strong drug that doctors give to people to make them calm or help them sleep'),
('beta-blocker', 'a drug that makes your heart work more slowly, used for treating high blood pressure'),
('booster', 'a small extra amount of a medical drug that you are given so that a drug you had before will continue to be effective'),
('caplet', 'a pill shaped like an oval (=a long narrow circle)'),
('capsule', 'a small round container filled with medicine that you swallow whole'),
('contraceptive', 'a drug, method, or object used for preventing a woman from becoming pregnant'),
('cough drop', 'a type of sweet containing medicine that you suck when you have a cough or a sore throat'),
('cough mixture', 'a liquid medicine that you take to help to cure a cough'),
('cough sweet', 'a cough drop'),
('cough syrup', 'cough mixture'),
('decongestant', 'a drug that helps you breathe more easily when you have a cold'),
('depressant', 'a drug or substance that makes you feel relaxed and makes your body work and react more slowly');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE IF NOT EXISTS `patient` (
  `patid` bigint(4) NOT NULL AUTO_INCREMENT,
  `patfname` varchar(25) NOT NULL,
  `patlname` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `emailid` varchar(50) NOT NULL,
  `contactno` varchar(25) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `bloodgroup` varchar(25) NOT NULL,
  `status` varchar(25) NOT NULL,
  PRIMARY KEY (`patid`),
  UNIQUE KEY `emailid` (`emailid`),
  UNIQUE KEY `contactno` (`contactno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=121 ;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patid`, `patfname`, `patlname`, `password`, `dob`, `gender`, `emailid`, `contactno`, `address`, `city`, `state`, `country`, `bloodgroup`, `status`) VALUES
(111, 'Bonface', 'Otieno', 'Snyper116', '1999-06-16', 'Male', 'bowahonya@student.maseno.ac.ke', '0714087396', '1043-40100', 'Kisumu', 'Kisumu', 'Kenya', 'A+ve', ''),
(112, 'Festus', 'Ondati', '000002', '1976-05-07', '', 'festondi@yahoo.com', '8965485632', 'Karkala,Kisii', 'Mangalore', 'Nakuru', 'Kenya', 'B+ve', ''),
(113, 'lavina ', 'nashoki', '000003', '1997-03-14', 'Male', 'nashokilavina@gmail.com', '7568956123', 'Manjeshwar', 'Kasaragod', 'Kerala', 'United States', 'O-ve', ''),
(114, 'Calvince', 'Omondi', '000004', '1992-06-16', 'Male', 'omondicalvince@gmail.com', '7589653212', 'Thokkottu', 'Mangalore', 'Karnataka', 'India', 'O+ve', ''),
(115, 'Renci', 'Monthi', '123456', '0000-00-00', '', 'Renci@gmail.com', '7259832256', '', '', '', '', '', ''),
(116, 'Hezbon', 'Otieno', '12345678', '1991-08-21', 'Male', 'hezbon142@gmail.com', '0714087358', '1044 40100', 'Kisumu', 'Kisumu', 'Kenya', 'B+ve', ''),
(117, 'David', 'Khodhe', '12345678', '1975-06-17', 'Male', 'dalaro@gmail.com', '0722552422', '  4012 - 40100', 'Nairobi', 'Delhi', 'Kenya', 'A+ve', ''),
(118, 'Lewis', 'Malim', '12345678', '2006-06-20', 'Male', 'lewismalim@gmail.com', '0711318543', 'P.O Box 192 Bungoma', 'Nairobi', 'Delhi', 'Kenya', 'B+ve', ''),
(119, 'Victor', 'Yuko', '12345678', '2013-05-16', 'Male', 'victoryuko@gmail.com', '0713163134', '3115 40100 Kondele', 'Kisumu', 'Kisumu', 'Kenya', 'B+ve', ''),
(120, 'Livient', 'Wanah', '31933579', '1994-03-15', 'Female', 'jadenfarleyo@gmail.com', '0792937319', 'P.O.Box 259 Malakisi', 'Nairobi', 'Cairo', 'Kenya', 'O+ve', '');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE IF NOT EXISTS `prescription` (
  `presid` bigint(4) NOT NULL AUTO_INCREMENT,
  `patid` bigint(4) NOT NULL,
  `medicine` text NOT NULL,
  `treid` bigint(4) NOT NULL,
  PRIMARY KEY (`presid`),
  KEY `patid` (`patid`),
  KEY `treid` (`treid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`presid`, `patid`, `medicine`, `treid`) VALUES
(4, 113, '<td>&nbsp;kkkk</td><td>&nbsp;6</td><td>&nbsp;0-0-1</td>', 12),
(5, 113, '<td>&nbsp;gddfffff</td><td>&nbsp;3</td><td>&nbsp;1-1-1</td>', 12),
(6, 113, '<td>&nbsp;ghghggg</td><td>&nbsp;5</td><td>&nbsp;0-1-1</td>', 13),
(7, 113, '<td>&nbsp;gddfffff</td><td>&nbsp;4</td><td>&nbsp;0-1-0</td>', 14),
(8, 113, '<td>&nbsp;gadfg</td><td>&nbsp;5</td><td>&nbsp;0-0-1</td>', 14),
(9, 117, '<td>&nbsp;fghfh</td><td>&nbsp;45</td><td>&nbsp;0-0-1</td>', 20);

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE IF NOT EXISTS `salary` (
  `date` date NOT NULL,
  `empid` bigint(4) NOT NULL,
  `salaryamt` float NOT NULL,
  `monthsal` date NOT NULL,
  KEY `empid` (`empid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`date`, `empid`, `salaryamt`, `monthsal`) VALUES
('2012-02-22', 11111, 5000, '2012-02-22'),
('2012-02-22', 11112, 4500, '2012-02-26'),
('2012-02-22', 11113, 5000, '2012-02-22'),
('2012-02-22', 11114, 4500, '2012-02-22'),
('2012-03-31', 11111, 6000, '2012-03-31'),
('2012-03-31', 11112, 6000, '2012-03-31'),
('2012-03-31', 11113, 6000, '2012-03-31'),
('2012-03-31', 11114, 5500, '2012-03-31'),
('2016-06-14', 11111, 20000, '2016-06-14'),
('2016-06-14', 11112, 20000, '2016-06-14'),
('2016-06-14', 11113, 10500, '2016-06-14'),
('2016-06-14', 11114, 10500, '2016-06-14');

-- --------------------------------------------------------

--
-- Table structure for table `testtype`
--

CREATE TABLE IF NOT EXISTS `testtype` (
  `ttypeid` bigint(4) NOT NULL AUTO_INCREMENT,
  `testtype` varchar(25) NOT NULL,
  `descript` varchar(100) NOT NULL,
  PRIMARY KEY (`ttypeid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `testtype`
--

INSERT INTO `testtype` (`ttypeid`, `testtype`, `descript`) VALUES
(1, 'Blood Test', 'Testing of Blood'),
(2, 'Blood Group', 'Testing of Blood Group'),
(3, 'BP', 'Testing of Blood Pleasure'),
(4, 'Sugar', 'Testing of Sugar'),
(5, 'X-RAY', 'X-Ray is Taking'),
(6, 'Scanning', 'Scanning of Body');

-- --------------------------------------------------------

--
-- Table structure for table `timings`
--

CREATE TABLE IF NOT EXISTS `timings` (
  `docid` bigint(4) DEFAULT NULL,
  `timings` text NOT NULL,
  `fromtime` time DEFAULT NULL,
  `totime` time DEFAULT NULL,
  `session` varchar(25) DEFAULT NULL,
  `tstatus` varchar(25) DEFAULT NULL,
  KEY `docid` (`docid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timings`
--

INSERT INTO `timings` (`docid`, `timings`, `fromtime`, `totime`, `session`, `tstatus`) VALUES
(1114, ' 01:00 05:00 01:15 05:15 01:30 05:30 01:45 05:45 02:00 06:00 02:15 06:15 02:30 06:30 02:45 06:45 03:00 07:00 03:15 07:15 03:30 07:30 03:45 07:45', NULL, NULL, '', NULL),
(1115, ' 06:00 06:15 06:45 07:00 07:15 07:30 07:45', NULL, NULL, '', NULL),
(1112, ' 10:00 10:15 10:30 10:45 11:00 06:00 11:15 06:15 11:30 06:30 11:45 06:45 07:00 07:15 07:30 07:45', NULL, NULL, NULL, NULL),
(1113, ' 04:00 04:15 04:30 04:45 05:00 05:15 05:30 05:45 06:00 06:15 06:30 06:45 07:00 07:15 07:30 07:45', NULL, NULL, NULL, NULL),
(1120, ' 09:00 09:15 09:30 09:45 06:00 06:15 06:30 06:45 07:00 07:15 07:30 07:45', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `treatment`
--

CREATE TABLE IF NOT EXISTS `treatment` (
  `treid` bigint(4) NOT NULL AUTO_INCREMENT,
  `docid` bigint(4) NOT NULL,
  `treatfee` float NOT NULL,
  `treatment` varchar(500) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `appointid` bigint(4) NOT NULL,
  PRIMARY KEY (`treid`),
  KEY `docid` (`docid`),
  KEY `appointid` (`appointid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `treatment`
--

INSERT INTO `treatment` (`treid`, `docid`, `treatfee`, `treatment`, `date`, `time`, `appointid`) VALUES
(7, 1112, 50000, 'BCDD', '2012-03-29', '06:34:09', 6),
(12, 1113, 500, '', '2012-04-02', '12:50:53', 11),
(13, 1114, 900, 'cdsfsd', '2012-04-02', '12:51:44', 12),
(14, 1112, 280, 'fgt', '2012-04-02', '01:20:16', 13),
(15, 1115, 700, 'cf', '2012-04-02', '01:22:01', 14),
(16, 1112, 15000, '', '2016-06-14', '08:12:59', 15),
(17, 1112, 1500, '', '2016-06-14', '08:13:34', 15),
(18, 1112, 5000, '', '2016-06-14', '08:14:27', 15),
(19, 1112, 0, '', '2016-06-14', '08:15:01', 15),
(20, 1112, 1500, '', '2016-06-14', '08:16:50', 15);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`patid`) REFERENCES `patient` (`patid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`docid`) REFERENCES `doctor` (`docid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `billing`
--
ALTER TABLE `billing`
  ADD CONSTRAINT `billing_ibfk_1` FOREIGN KEY (`patid`) REFERENCES `patient` (`patid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `billing_ibfk_2` FOREIGN KEY (`docid`) REFERENCES `doctor` (`docid`);

--
-- Constraints for table `labtest`
--
ALTER TABLE `labtest`
  ADD CONSTRAINT `labtest_ibfk_1` FOREIGN KEY (`ttypeid`) REFERENCES `testtype` (`ttypeid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `labtest_ibfk_2` FOREIGN KEY (`patid`) REFERENCES `patient` (`patid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `labtest_ibfk_4` FOREIGN KEY (`treid`) REFERENCES `treatment` (`treid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prescription`
--
ALTER TABLE `prescription`
  ADD CONSTRAINT `prescription_ibfk_1` FOREIGN KEY (`patid`) REFERENCES `patient` (`patid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prescription_ibfk_2` FOREIGN KEY (`treid`) REFERENCES `treatment` (`treid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `salary`
--
ALTER TABLE `salary`
  ADD CONSTRAINT `salary_ibfk_1` FOREIGN KEY (`empid`) REFERENCES `employee` (`empid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `timings`
--
ALTER TABLE `timings`
  ADD CONSTRAINT `timings_ibfk_1` FOREIGN KEY (`docid`) REFERENCES `doctor` (`docid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `treatment`
--
ALTER TABLE `treatment`
  ADD CONSTRAINT `treatment_ibfk_1` FOREIGN KEY (`docid`) REFERENCES `doctor` (`docid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `treatment_ibfk_3` FOREIGN KEY (`appointid`) REFERENCES `appointment` (`appointid`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
