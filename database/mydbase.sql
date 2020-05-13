-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 13, 2020 at 05:57 AM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mydbase`
--

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `MemberID` int(11) NOT NULL AUTO_INCREMENT,
  `LastName` varchar(20) NOT NULL,
  `FirstName` varchar(20) NOT NULL,
  `MiddleName` varchar(20) NOT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `Year` varchar(10) NOT NULL,
  `Block` varchar(5) NOT NULL,
  `StudentType` varchar(10) NOT NULL,
  `ContactNumber` varchar(15) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`MemberID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`MemberID`, `LastName`, `FirstName`, `MiddleName`, `Gender`, `Year`, `Block`, `StudentType`, `ContactNumber`, `Email`, `position`, `username`, `password`) VALUES
(20, 'dsddd', 'dsd     ', 'dsd     ', '', 'dsd', 'ds', 'Officer', 'dsd', 'bqnejbrje@gmail.com', '', '', ''),
(21, 'Doettt', 'Mark ', 'red ', 'Male', '3', 'a', 'Officer', '09081737817', 'boninajo32a@gmail.com', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `outbox`
--

CREATE TABLE IF NOT EXISTS `outbox` (
  `OutboxID` varchar(20) NOT NULL,
  `Date_sent` varchar(50) NOT NULL,
  `Message` text NOT NULL,
  `Mode` varchar(10) NOT NULL,
  `Status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `outbox`
--

INSERT INTO `outbox` (`OutboxID`, `Date_sent`, `Message`, `Mode`, `Status`) VALUES
('111637190', 'Monday, 20-Apr-20 15:05:55 PHT', 'jaaaaaaaaaaaaaaaaaaaa', 'Officers', 'Sent'),
('111637210', 'Monday, 20-Apr-20 15:06:53 PHT', 'qqqqqqqqqqqqq', 'Officers', 'Sent'),
('111637244', 'Monday, 20-Apr-20 15:08:28 PHT', '3333333333333', 'Officers', 'Sent'),
('111637350', 'Monday, 20-Apr-20 15:14:17 PHT', 'test message ', 'All', 'Sent'),
('112025580', 'Sunday, 26-Apr-20 19:10:01 PHT', 'vxvxvx', 'Officers', 'Sent'),
('112027625', 'Sunday, 26-Apr-20 20:08:37 PHT', 'u', 'Officers', 'Sent'),
('112072472', 'Monday, 27-Apr-20 14:50:30 PHT', 'heelllo\r\ne\r\ne\r\ne\r\n\r\ne', 'All', 'Sent');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
