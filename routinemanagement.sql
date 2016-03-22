-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2015 at 05:38 PM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `routinemanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `protik`
--

CREATE TABLE IF NOT EXISTS `protik` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `mobile` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `protik`
--

INSERT INTO `protik` (`id`, `name`, `mobile`) VALUES
(1, 'kalam', '33333'),
(2, 'protik', '555555');

-- --------------------------------------------------------

--
-- Table structure for table `r`
--

CREATE TABLE IF NOT EXISTS `r` (
  `day` varchar(40) NOT NULL,
  `semester` varchar(40) NOT NULL,
  `tName` varchar(40) NOT NULL,
  `sub` varchar(40) NOT NULL,
  `time` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r`
--

INSERT INTO `r` (`day`, `semester`, `tName`, `sub`, `time`) VALUES
('Saturday', '2nd year 2nd semester', 'MMR', 'cse-2201', '12-12.50'),
('Saturday', '1st year 2nd semester', 'MR', 'cse-1202', '12-12.50'),
('Saturday', '2nd year 2nd semester', 'MHT', 'cse-2202', '2-2.50'),
('Saturday', '4th year 2nd semester', 'MMR', 'cse-4202', '10-10.50'),
('Sunday', '1st year 2nd semester', 'MHT', 'cse-1202', '9-9.50');

-- --------------------------------------------------------

--
-- Table structure for table `routine`
--

CREATE TABLE IF NOT EXISTS `routine` (
  `day` varchar(40) NOT NULL,
  `semester` varchar(60) NOT NULL,
  `teacher` varchar(40) NOT NULL,
  `sub` varchar(40) NOT NULL,
  `time` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `code` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `credit` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`code`, `title`, `credit`) VALUES
('cse-4201', 'Compute Graphics', '3'),
('cse-4202', 'Compute Graphics Lab', '1'),
('cse-2201', 'Compute Related', '3'),
('cse-2202', 'Compute Related Lab', '2'),
('cse-1202', 'Mathematics', '3'),
('cse-3202', 'Mathematics IV', '2');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `shortName` varchar(50) NOT NULL,
  `fullName` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
