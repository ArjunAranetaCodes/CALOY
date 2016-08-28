-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2016 at 06:32 AM
-- Server version: 5.7.14-log
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbbankifation`
--

-- --------------------------------------------------------

--
-- Table structure for table `sms_in`
--

CREATE TABLE IF NOT EXISTS `sms_in` (
  `id` int(11) NOT NULL,
  `sms_text` varchar(1600) DEFAULT NULL,
  `sender_number` varchar(50) DEFAULT NULL,
  `sent_dt` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sms_in`
--

INSERT INTO `sms_in` (`id`, `sms_text`, `sender_number`, `sent_dt`) VALUES
(1, 'EDd:\r\ntest17\r\n...', '09754566289', '2016-08-25 10:18:32'),
(2, 'EDd:\r\ntest18\r\n...', '09759104760', '2016-08-25 10:24:01'),
(3, 'hi good morn...', '09062527005', '2016-08-25 10:25:08'),
(4, 'edd:\r\ntest19\r\n...', '09759104785', '2016-08-25 10:27:16'),
(5, 'Oyyy', '09063728195', '2016-08-25 10:47:13'),
(6, 'EDd:\r\ntest20\r\n...', '09267792362', '2016-08-25 11:20:00'),
(7, 'edd:\r\ntest21\r\n...', '09351300802', '2016-08-25 11:27:18'),
(8, 'EDd:\r\ntest22\r\n...', '09267792362', '2016-08-25 11:29:54'),
(9, 'Edd:\r\ntest23\r\n...', '09754566282', '2016-08-25 11:30:55'),
(10, 'Edd:\r\ntest24\r\n...', '09351300869', '2016-08-25 11:32:25'),
(11, 'EDd:\r\ntest25\r\n...', '09759104712', '2016-08-25 11:33:27'),
(12, '', '09351300869', '0000-00-00 00:00:00'),
(13, 'edd:\rtest32\r\rfrom: magTXT.com\r(do not reply)', '09267792719', '0000-00-00 00:00:00'),
(14, 'edd:\rtest32\r\rfrom: magTXT.com\r(do not reply)', '09267792362', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblaccount`
--

CREATE TABLE IF NOT EXISTS `tblaccount` (
  `ACCOUNTID` varchar(150) NOT NULL,
  `ACCOUNTPASSWORD` varchar(150) NOT NULL,
  `BALANCE` int(11) NOT NULL,
  `POINTS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblaccount`
--

INSERT INTO `tblaccount` (`ACCOUNTID`, `ACCOUNTPASSWORD`, `BALANCE`, `POINTS`) VALUES
('ARJUN', '5144-1596-4974-1750', 230, 1),
('EDD', '5144-1596-4974-0750', 260, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbldebitcards`
--

CREATE TABLE IF NOT EXISTS `tbldebitcards` (
  `DEBITDIGITS` varchar(150) NOT NULL,
  `VALUE` int(11) NOT NULL,
  `STATUS` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbldebitcards`
--

INSERT INTO `tbldebitcards` (`DEBITDIGITS`, `VALUE`, `STATUS`) VALUES
('5144-1596-4974-0750', 200, 'SOLD'),
('5144-1596-4974-1750', 200, 'SOLD');

-- --------------------------------------------------------

--
-- Table structure for table `tblshortcode`
--

CREATE TABLE IF NOT EXISTS `tblshortcode` (
  `CODEID` int(11) NOT NULL,
  `CODEKEYWORD` varchar(150) NOT NULL,
  `MSGREPLY` varchar(150) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblshortcode`
--

INSERT INTO `tblshortcode` (`CODEID`, `CODEKEYWORD`, `MSGREPLY`) VALUES
(1, 'ACTIVATE', 'DEBIT CARD ACTIVATED'),
(2, 'LOAD', 'TOP UP CARD LOADED');

-- --------------------------------------------------------

--
-- Table structure for table `tbltopupcard`
--

CREATE TABLE IF NOT EXISTS `tbltopupcard` (
  `CODE` varchar(40) NOT NULL,
  `VALUE` int(11) NOT NULL,
  `STATUS` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbltopupcard`
--

INSERT INTO `tbltopupcard` (`CODE`, `VALUE`, `STATUS`) VALUES
('0b58-addd-f069-5222', 30, 'SOLD'),
('0f4f-038b-579b-602e', 30, 'SOLD'),
('0f66-47f9-5879-f8a5', 30, 'SOLD'),
('114d-820c-d5df-e379', 30, 'SOLD'),
('14e3-31e6-d1a1-f2d4', 30, 'SOLD'),
('1847-16f3-6b1f-4f2b', 30, 'SOLD'),
('1af0-5d64-e504-e9d4', 30, 'INACTIVE'),
('26cb-1c3e-47f5-989c', 30, 'INACTIVE'),
('2dda-3f1e-5808-3dd4', 200, 'INACTIVE'),
('3196-6b37-ca9e-9551', 30, 'INACTIVE'),
('3c65-dfc8-3470-bf52', 30, 'INACTIVE'),
('3e4b-81cf-f787-e85e', 1000, 'INACTIVE'),
('4118-14d0-8a03-7f6b', 30, 'INACTIVE'),
('6987-cf29-681f-20f3', 200, 'INACTIVE'),
('6c26-fbbc-3f1b-54f5', 30, 'INACTIVE'),
('6dd9-3bb4-1475-64a8', 200, 'INACTIVE'),
('7511-584b-cfb9-23ef', 30, 'INACTIVE'),
('7881-5a70-c11d-42ca', 30, 'INACTIVE'),
('7cfb-8130-29bf-63c7', 1000, 'INACTIVE'),
('7feb-2ccf-136a-9faf', 1000, 'INACTIVE'),
('8f2c-ebb9-7a1e-c67c', 30, 'INACTIVE'),
('953d-e39f-3f4f-10b8', 30, 'INACTIVE'),
('9f31-9c2c-07a8-d777', 200, 'INACTIVE'),
('a4ab-0423-7c6a-07d1', 200, 'INACTIVE'),
('a590-d3c1-c8fa-f607', 200, 'INACTIVE'),
('a87a-0fa0-a774-abbe', 30, 'INACTIVE'),
('a971-c96c-fa88-0232', 200, 'INACTIVE'),
('acc9-c211-f0d0-d0b1', 30, 'INACTIVE'),
('b006-74eb-7605-3f9c', 200, 'INACTIVE'),
('b08c-5f23-9757-41b0', 30, 'INACTIVE'),
('b297-41a8-0947-67cb', 1000, 'INACTIVE'),
('b5d3-ea15-f70d-f9e4', 30, 'INACTIVE'),
('b71b-1934-803f-bbb1', 30, 'INACTIVE'),
('c294-a718-f853-bf68', 30, 'INACTIVE'),
('c8cc-13fe-54cc-0bae', 30, 'INACTIVE'),
('ca68-e032-1e8d-3ae5', 200, 'INACTIVE'),
('d071-1cf8-1631-7318', 30, 'INACTIVE'),
('d381-ea5a-c536-053a', 1000, 'INACTIVE'),
('d70b-a287-2535-a5e1', 30, 'INACTIVE'),
('de22-f377-dbe5-ddb8', 200, 'INACTIVE'),
('e73f-6278-2729-5be5', 30, 'INACTIVE'),
('f005-4516-e795-1ec2', 30, 'INACTIVE'),
('f208-6d8f-af75-1a1b', 30, 'INACTIVE'),
('f74d-12ee-2fb2-7e15', 30, 'INACTIVE'),
('ff61-b010-a2c8-0073', 30, 'INACTIVE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sms_in`
--
ALTER TABLE `sms_in`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblaccount`
--
ALTER TABLE `tblaccount`
  ADD PRIMARY KEY (`ACCOUNTID`),
  ADD UNIQUE KEY `ACCOUNTID` (`ACCOUNTID`);

--
-- Indexes for table `tbldebitcards`
--
ALTER TABLE `tbldebitcards`
  ADD PRIMARY KEY (`DEBITDIGITS`),
  ADD UNIQUE KEY `DEBITDIGITS` (`DEBITDIGITS`);

--
-- Indexes for table `tblshortcode`
--
ALTER TABLE `tblshortcode`
  ADD PRIMARY KEY (`CODEID`);

--
-- Indexes for table `tbltopupcard`
--
ALTER TABLE `tbltopupcard`
  ADD PRIMARY KEY (`CODE`),
  ADD UNIQUE KEY `CODE` (`CODE`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sms_in`
--
ALTER TABLE `sms_in`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tblshortcode`
--
ALTER TABLE `tblshortcode`
  MODIFY `CODEID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
