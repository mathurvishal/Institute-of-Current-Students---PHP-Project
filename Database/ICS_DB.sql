-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2017 at 04:31 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `icsnew`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Aid` varchar(35) NOT NULL,
  `Apass` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Aid`, `Apass`) VALUES
('admin', 'admin'),
('vishu', 'vishu');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `Eno` bigint(20) NOT NULL,
  `Eid` varchar(35) NOT NULL,
  `Course` varchar(35) NOT NULL,
  `ExId` bigint(20) NOT NULL,
  `ExamName` varchar(20) NOT NULL,
  `Q1` text NOT NULL,
  `Q2` text NOT NULL,
  `Q3` text NOT NULL,
  `Q4` text NOT NULL,
  `Q5` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`Eno`, `Eid`, `Course`, `ExId`, `ExamName`, `Q1`, `Q2`, `Q3`, `Q4`, `Q5`) VALUES
(146891650, 'harsh@ica.com', 'MCA', 528, 'PHP', 'o1', 'o1', 'o1', 'o1', 'o1'),
(146891650, 'harsh@ica.com', 'MCA', 529, ' PHP', 'o1', 'o1', 'o1', 'o1', 'o1'),
(146891654, 'vishal@ica.com', 'MCA', 530, ' PHP', 'o1', 'o2', 'o3', 'o1', 'o2'),
(146891658, 'priya@ics.com', 'B.Com', 531, ' PHP', 'o3', 'o2', 'o3', 'o1', 'o2');

-- --------------------------------------------------------

--
-- Table structure for table `facutlytable`
--

CREATE TABLE `facutlytable` (
  `FID` int(10) NOT NULL,
  `FName` varchar(50) NOT NULL,
  `FaName` varchar(30) NOT NULL,
  `Addrs` text NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `JDate` date NOT NULL,
  `City` varchar(10) NOT NULL,
  `Pass` varchar(10) NOT NULL,
  `PhNo` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facutlytable`
--

INSERT INTO `facutlytable` (`FID`, `FName`, `FaName`, `Addrs`, `Gender`, `JDate`, `City`, `Pass`, `PhNo`) VALUES
(101, 'Reeta Grover', 'Arjun Grover', 'Pitampura', 'Female', '1999-02-03', 'Delhi', '1234', 1234567890),
(102, 'Kunal Mathur', 'Vinod Mathur', 'Karol Bagh', 'Male', '1998-01-03', 'Delhi', '1234', 7777777777),
(103, 'Indrejeet Kaur', 'Diljeet Singh', 'Rohini', 'Female', '2000-02-03', 'Delhi', '1234', 5555555555),
(104, 'Sumita Thukral', 'Raj Thukral', 'karol bagh', 'Female', '1996-03-05', 'Delhi', '1234', 5878845896),
(106, 'Rachna Garg', 'Saurabh Garg', 'Shastri Park', 'Female', '1998-04-03', 'Delhi', '1234', 5555555555);

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `GuEid` varchar(35) NOT NULL,
  `Gname` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`GuEid`, `Gname`) VALUES
('Anil21@gmail.com', 'Anil Rawat'),
('g10093k@gmail.com', 'Gunjan'),
('lalit66@gmail.com', 'lalit kumar');

-- --------------------------------------------------------

--
-- Table structure for table `query`
--

CREATE TABLE `query` (
  `Query` text NOT NULL,
  `Ans` text NOT NULL,
  `Eid` varchar(35) NOT NULL,
  `Qid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `query`
--

INSERT INTO `query` (`Query`, `Ans`, `Eid`, `Qid`) VALUES
(' Can i do mca ', ' yes', 'rohan1997feb@gmail.co,', 1),
('hhh', '', 'rohan1997feb@gmail.co,', 2),
('							karan ', '				yes									', 'harsh@ica.com', 3),
('							Can I do M.Tech? ', 'Ofcourse.							', 'vishal@ica.com', 4),
('Can i do BCA.', '', 'Anil21@gmail.com', 5),
('hello sir you are core.', '', 'Raj1220@rr.com', 6),
('I want to take addmission in bca?', '', 'lalit66@gmail.com', 8),
('							Can i do MCS after B.Com. ', '	Yes Sure You Can												', 'priya@ics.com', 9);

-- --------------------------------------------------------

--
-- Table structure for table `registrationtable`
--

CREATE TABLE `registrationtable` (
  `RegID` int(50) NOT NULL,
  `FName` varchar(30) NOT NULL,
  `LName` varchar(30) NOT NULL,
  `FaName` varchar(30) NOT NULL,
  `DOB` date NOT NULL,
  `Addrs` text NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `PhNo` bigint(10) NOT NULL,
  `Eid` varchar(50) NOT NULL,
  `Pass` varchar(50) NOT NULL,
  `Course` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Store Regestration Details';

--
-- Dumping data for table `registrationtable`
--

INSERT INTO `registrationtable` (`RegID`, `FName`, `LName`, `FaName`, `DOB`, `Addrs`, `Gender`, `PhNo`, `Eid`, `Pass`, `Course`) VALUES
(4, 'Rohan', 'Pal', 'Nareder singh', '1996-01-01', 'B-778/9 Sant nagar', 'Male', 7777777777, 'rohan@ics.com', '1234', 'BCA'),
(5, 'Nihal', 'mathur', 'Vinod Singh', '1998-05-05', 'AP-33/88 Pitampura', 'Male', 4564654845, 'nihal@Ics.com', '1234', 'M.Tech'),
(6, 'Pooja', 'Kumari', 'Ram Raj Kumar', '1994-06-02', 'Delhi', 'Female', 5555555555, 'pooja@ics.com', '1234', 'BWS'),
(7, 'Neelam', 'Sharma', 'Purohit Sharma', '1995-08-25', 'B-78/89, Model town', 'Female', 2343435333, 'neelam@ics.com', '1234', 'B.Com'),
(8, 'Priya', 'Danjal', 'Raj Danjal', '1994-05-04', 'Shadhra, Delhi 110084', 'Female', 1211221212, 'priya@ics.com', '1234', 'B.Com');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `RsID` bigint(20) NOT NULL,
  `Eno` varchar(20) NOT NULL,
  `Course` varchar(30) NOT NULL,
  `Marks` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`RsID`, `Eno`, `Course`, `Marks`) VALUES
(2369, '146891650', 'PHP', 'Pass'),
(2370, '146891653', '.NET', 'Pass'),
(2371, '146891650', '.NET', 'Fail'),
(2373, '146891654', ' PHP', 'Pass'),
(2374, '146891650', '.NET', 'Pass'),
(2375, '146891658', ' PHP', 'Under Progress');

-- --------------------------------------------------------

--
-- Table structure for table `studenttable`
--

CREATE TABLE `studenttable` (
  `Eno` bigint(20) NOT NULL,
  `FName` varchar(30) NOT NULL,
  `LName` varchar(30) NOT NULL,
  `FaName` varchar(30) NOT NULL,
  `Addrs` text NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `Course` varchar(20) NOT NULL,
  `DOB` date NOT NULL,
  `PhNo` bigint(10) NOT NULL,
  `Pass` varchar(20) NOT NULL,
  `Eid` varchar(50) NOT NULL,
  `SRegID` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studenttable`
--

INSERT INTO `studenttable` (`Eno`, `FName`, `LName`, `FaName`, `Addrs`, `Gender`, `Course`, `DOB`, `PhNo`, `Pass`, `Eid`, `SRegID`) VALUES
(146891650, 'Harsh', 'Jain', 'Pardeep Jain', 'Shadara', 'Male', 'MCA', '1996-07-16', 5554654546, '1234', 'harsh@ics.com', 0),
(146891651, 'Nihal', 'Kumar', 'Ram Kumar', 'Burari', 'Male', 'IT', '2000-08-05', 6666666666, '1234', 'nihal@ics.com', 0),
(146891652, 'kajal', 'mathur', 'Arjun Mathur', 'Faridabad', 'Female', 'M.COM.', '1996-02-10', 6555555555, '1234', 'kajal@ics.com', 0),
(146891654, 'Vishal', 'mathur', 'Vinod singh mathur', 'nathupura', 'male', 'MCA', '1996-07-12', 1111111111, '1234', 'vishal@ics.com', 2),
(146891655, 'kunal', 'Pal', 'Ram kuame', 'AP-333 Pitampura', 'Female', 'MTE', '1996-02-03', 1111111111, '1234', 'test1@ics.com', 2),
(146891656, 'Rohan', 'Pal', 'Nareder singh', 'B-778/9 Sant nagar', 'Male', 'BCA', '1996-01-01', 7777777777, '1234', 'rohan@ics.com', 4),
(146891657, 'Neelam', 'Sharma', 'Purohit Sharma', 'B-78/89, Model town', 'Female', 'B.Com', '1995-08-25', 2343435333, '1234', 'neelam@ics.com', 7),
(146891658, 'Priya', 'Danjal', 'Raj Danjal', 'Shadhra, Delhi 110084', 'Female', 'B.Com', '1994-05-04', 1211221212, '1234', 'priya@ics.com', 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Aid`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`ExId`);

--
-- Indexes for table `facutlytable`
--
ALTER TABLE `facutlytable`
  ADD PRIMARY KEY (`FID`);

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`Gname`);

--
-- Indexes for table `query`
--
ALTER TABLE `query`
  ADD PRIMARY KEY (`Qid`);

--
-- Indexes for table `registrationtable`
--
ALTER TABLE `registrationtable`
  ADD PRIMARY KEY (`RegID`),
  ADD UNIQUE KEY `Eid` (`Eid`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`RsID`);

--
-- Indexes for table `studenttable`
--
ALTER TABLE `studenttable`
  ADD PRIMARY KEY (`Eno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `ExId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=532;
--
-- AUTO_INCREMENT for table `facutlytable`
--
ALTER TABLE `facutlytable`
  MODIFY `FID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;
--
-- AUTO_INCREMENT for table `query`
--
ALTER TABLE `query`
  MODIFY `Qid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `registrationtable`
--
ALTER TABLE `registrationtable`
  MODIFY `RegID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `RsID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2376;
--
-- AUTO_INCREMENT for table `studenttable`
--
ALTER TABLE `studenttable`
  MODIFY `Eno` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146891659;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
