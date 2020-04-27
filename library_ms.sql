-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2020 at 12:31 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library_ms`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `fullname`, `email`, `username`, `password`, `date`) VALUES
(1, 'Mahfujur Rahman', 'admin@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2020-04-24 17:31:11');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_author`
--

CREATE TABLE `tbl_author` (
  `id` int(11) NOT NULL,
  `authorname` varchar(50) NOT NULL,
  `creationdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updatedate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_author`
--

INSERT INTO `tbl_author` (`id`, `authorname`, `creationdate`, `updatedate`) VALUES
(2, 'Mahfujur', '2020-04-25 08:44:35', '0000-00-00 00:00:00'),
(3, 'Jony Islam', '2020-04-25 08:44:46', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_book`
--

CREATE TABLE `tbl_book` (
  `id` int(11) NOT NULL,
  `bookname` varchar(50) NOT NULL,
  `catid` int(11) NOT NULL,
  `authorid` int(11) NOT NULL,
  `isbnnumber` int(11) NOT NULL,
  `bookprice` int(11) NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updatedate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_book`
--

INSERT INTO `tbl_book` (`id`, `bookname`, `catid`, `authorid`, `isbnnumber`, `bookprice`, `regdate`, `updatedate`) VALUES
(2, 'Basic Math ', 4, 2, 123456, 150, '2020-04-25 17:19:57', '2020-04-25 17:19:57');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_catagory`
--

CREATE TABLE `tbl_catagory` (
  `id` int(11) NOT NULL,
  `catname` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updatedate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_catagory`
--

INSERT INTO `tbl_catagory` (`id`, `catname`, `status`, `createdate`, `updatedate`) VALUES
(4, 'Business', 1, '2020-04-25 08:25:51', '0000-00-00 00:00:00'),
(5, 'Science', 1, '2020-04-25 08:26:03', '0000-00-00 00:00:00'),
(6, 'Technology', 1, '2020-04-25 08:26:18', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_issu`
--

CREATE TABLE `tbl_issu` (
  `id` int(11) NOT NULL,
  `bookid` int(11) NOT NULL,
  `studentid` varchar(20) NOT NULL,
  `issudate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `returndate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `returnstatus` int(11) NOT NULL,
  `fine` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_issu`
--

INSERT INTO `tbl_issu` (`id`, `bookid`, `studentid`, `issudate`, `returndate`, `returnstatus`, `fine`) VALUES
(2, 2, 'SID002', '2020-04-27 09:34:57', '2020-04-27 09:39:52', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `id` int(11) NOT NULL,
  `studentid` varchar(20) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updatedate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`id`, `studentid`, `fullname`, `email`, `mobile`, `password`, `status`, `regdate`, `updatedate`) VALUES
(3, 'SID002', 'Mahfujur Rahman', 'overcastmoon@gmail.com', 1925555115, '4d0920dae8dc8c37564bfdcecbf23d1d', 1, '2020-04-25 17:28:32', '2020-04-25 17:28:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_author`
--
ALTER TABLE `tbl_author`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_book`
--
ALTER TABLE `tbl_book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_catagory`
--
ALTER TABLE `tbl_catagory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_issu`
--
ALTER TABLE `tbl_issu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_author`
--
ALTER TABLE `tbl_author`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_book`
--
ALTER TABLE `tbl_book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_catagory`
--
ALTER TABLE `tbl_catagory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_issu`
--
ALTER TABLE `tbl_issu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
