-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2018 at 03:12 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `allowance2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `nid` varchar(255) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `randval` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`nid`, `user_name`, `password`, `randval`) VALUES
('1231231235', 'admin', 'admin', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `balance`
--

CREATE TABLE `balance` (
  `indx` int(11) NOT NULL,
  `acc_no` int(10) NOT NULL,
  `withdraw_date` varchar(30) DEFAULT NULL,
  `withdraw_amount` int(11) DEFAULT NULL,
  `withdraw_number` int(11) DEFAULT NULL,
  `added_amount` int(11) DEFAULT NULL,
  `added_date` varchar(30) DEFAULT NULL,
  `type` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `balance`
--

INSERT INTO `balance` (`indx`, `acc_no`, `withdraw_date`, `withdraw_amount`, `withdraw_number`, `added_amount`, `added_date`, `type`) VALUES
(0, 0, NULL, NULL, NULL, 10000, '2018/04/30', '');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `nid` varchar(255) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `randval` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`nid`, `uname`, `password`, `randval`) VALUES
('1231231231', 'Sadman', '81dc9bdb52d04dc20036dbd8313ed055', 324750865);

-- --------------------------------------------------------

--
-- Table structure for table `registration_req`
--

CREATE TABLE `registration_req` (
  `nid` varchar(255) NOT NULL,
  `date_of_req` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `nid` varchar(255) NOT NULL,
  `uname` varchar(200) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `dob` varchar(200) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(200) NOT NULL,
  `validity` varchar(200) DEFAULT NULL,
  `photo_url` varchar(250) NOT NULL DEFAULT './uploads/blank.png	',
  `gender` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`nid`, `uname`, `firstname`, `lastname`, `dob`, `phone`, `email`, `validity`, `photo_url`, `gender`) VALUES
('1231231231', 'Sadman', 'Sadman', 'Walid', '2018-12-31', '01722202893', 'S.w@yahoo.com', 'true', './uploads/blank.png	', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `acc_no` int(10) NOT NULL,
  `nid` varchar(255) NOT NULL,
  `balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`acc_no`, `nid`, `balance`) VALUES
(1094141310, '1231231231', 10000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`nid`);

--
-- Indexes for table `balance`
--
ALTER TABLE `balance`
  ADD PRIMARY KEY (`indx`);

--
-- Indexes for table `registration_req`
--
ALTER TABLE `registration_req`
  ADD PRIMARY KEY (`nid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`nid`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`acc_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
