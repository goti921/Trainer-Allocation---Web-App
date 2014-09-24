-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 25, 2014 at 03:03 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `race`
--
CREATE DATABASE IF NOT EXISTS `race` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `race`;

-- --------------------------------------------------------

--
-- Table structure for table `allocated`
--

CREATE TABLE IF NOT EXISTS `allocated` (
  `srno` int(10) NOT NULL AUTO_INCREMENT,
  `college_id` int(10) NOT NULL,
  `trainer_id` int(10) NOT NULL,
  `college_name` varchar(300) NOT NULL,
  `trainer_name` varchar(300) NOT NULL,
  `domain` varchar(100) NOT NULL,
  `level` int(1) NOT NULL,
  PRIMARY KEY (`srno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `allocated`
--

INSERT INTO `allocated` (`srno`, `college_id`, `trainer_id`, `college_name`, `trainer_name`, `domain`, `level`) VALUES
(4, 2, 10, 'CEG', 'Raj', 'VA', 2),
(5, 1, 13, 'VIT', 'Simrandeep ', 'LA', 2),
(6, 3, 14, 'Sastra', 'Karan', 'LA', 3),
(7, 5, 9, 'MIT', 'Raj', 'LA', 2),
(8, 4, 15, 'Sastra', 'Anuj', 'LA', 1),
(9, 6, 16, 'Madras Unniversity', 'Praveen', 'LA', 2);

-- --------------------------------------------------------

--
-- Table structure for table `colleges`
--

CREATE TABLE IF NOT EXISTS `colleges` (
  `cid` int(10) NOT NULL AUTO_INCREMENT,
  `college_name` varchar(300) NOT NULL,
  `domain` varchar(100) NOT NULL,
  `level` int(1) NOT NULL,
  `sessions` int(3) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `colleges`
--

INSERT INTO `colleges` (`cid`, `college_name`, `domain`, `level`, `sessions`, `start_date`, `end_date`) VALUES
(1, 'VIT', 'LA', 2, 1, '2014-03-26', '2014-03-27'),
(2, 'CEG', 'VA', 2, 5, '2014-03-25', '2014-03-29'),
(3, 'Sastra', 'LA', 0, 1, '2014-12-31', '2014-12-31'),
(4, 'Sastra', 'LA', 1, 1, '2014-01-01', '2014-01-02'),
(5, 'MIT', 'LA', 0, 1, '2014-12-31', '2014-12-31'),
(6, 'Madras Unniversity', 'LA', 2, 2, '2014-03-28', '2014-03-30');

-- --------------------------------------------------------

--
-- Table structure for table `trainer`
--

CREATE TABLE IF NOT EXISTS `trainer` (
  `tid` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `domain` varchar(100) NOT NULL,
  `level` int(1) NOT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `trainer`
--

INSERT INTO `trainer` (`tid`, `name`, `domain`, `level`) VALUES
(9, 'Raj', 'LA', 2),
(10, 'Raj', 'VA', 2),
(13, 'Simrandeep ', 'LA', 2),
(14, 'Karan', 'LA', 3),
(15, 'Anuj', 'LA', 1),
(16, 'Praveen', 'LA', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
