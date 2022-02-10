-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2018 at 04:13 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobseeker`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int(10) NOT NULL,
  `jid` int(10) NOT NULL,
  `rid` int(10) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `jid`, `rid`, `name`) VALUES
(4, 1, 2, 'vidhi&co.'),
(5, 2, 3, 'shashi&co.');

-- --------------------------------------------------------

--
-- Table structure for table `beheerder`
--

CREATE TABLE `beheerder` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `beheerder`
--

INSERT INTO `beheerder` (`id`, `name`, `password`) VALUES
(1, 'rb', '30f77caadb842a3d8aaab70df7938644'),
(2, 'trial', 'bcc19fed8c7010b928893b07e257734d');

-- --------------------------------------------------------

--
-- Table structure for table `degree`
--

CREATE TABLE `degree` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `field` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `degree`
--

INSERT INTO `degree` (`id`, `name`, `field`) VALUES
(1, 'B.Sc. (Agriculture)', 'Science'),
(2, 'B.Arch.', 'Science'),
(3, 'B.A.', 'Arts'),
(4, 'B.A.M.S.', 'Science'),
(5, 'B.B.A.', 'Commerce'),
(6, 'B.Com.', 'Commerce'),
(7, 'B.C.A.', 'Science'),
(8, 'B.Sc. (Computer Science)', 'Science'),
(9, 'B.D.S.', 'Commerce'),
(10, 'B.Des.', 'Arts'),
(11, 'B.Ed.', 'Arts'),
(12, 'B.E.', 'Arts'),
(13, 'B.Tech.', 'Science'),
(14, 'B.F.A', 'Arts'),
(15, 'B.Sc. (Fisheries)', 'Science'),
(16, 'B.A. - B.Sc. (Home Science)', 'Arts'),
(17, 'B.H.M.S.', 'Science'),
(18, 'L.L.B.', 'Commerce'),
(19, 'B.Lib.', 'Science'),
(20, 'B.M.C.', 'Arts'),
(21, 'M.B.B.S.', 'Science'),
(22, 'B.Sc. (Nursing)', 'Science'),
(23, 'B.Pharm.', 'Science'),
(24, 'B.P.Ed.', 'Science'),
(25, 'B.P.T.', 'Science'),
(26, 'B.Sc.', 'Science'),
(27, 'B.A. (S.W.)', 'Arts'),
(28, 'B.V.Sc.', 'Science'),
(29, 'Doctor of Medicine (M.D.)', 'Science'),
(30, 'M.D. (Homoeopathy)', 'Science'),
(31, 'M.A. (Home science)', 'Arts'),
(32, 'M.Arch.', 'Science'),
(33, 'M.A.', 'Arts'),
(34, 'M.B.A.', 'Commerce'),
(35, 'M.Com.', 'Commerce'),
(36, 'M.C.A.', 'Science'),
(37, 'M.D.S.', 'science'),
(38, 'M.Design', 'Arts'),
(39, 'M.Ed.', 'Arts'),
(40, 'M.E.', 'Science'),
(41, 'M.Tech.', 'Science'),
(42, 'M.F.A', 'Arts'),
(43, 'M.Sc. (Fisheries)', 'Science'),
(44, 'L.L.M.', 'Commerce'),
(45, 'M.Lib.', 'Science'),
(46, 'M.M.C.', 'Science'),
(47, 'M.Pharma', 'Science'),
(48, 'M.Phil.', 'Science'),
(49, 'M.P.Ed.', 'Science'),
(50, 'M.P.T.', 'Science'),
(51, 'M.Sc.', 'Science'),
(52, 'M.Sc. (Agriculture)', 'Science'),
(53, 'M.A. (S.W.)', 'Arts'),
(54, 'M.S.', 'Arts'),
(55, 'M.V.Sc.', 'Science'),
(56, '10', 'Basic'),
(57, '12', 'Basic'),
(58, 'Chartered Accountant', 'Commerce'),
(59, 'Company Secretery', 'Commerce'),
(61, 'M.Sc (Computer Science)', 'Science'),
(62, 'M.Sc. (Information Technology)', 'Science'),
(63, '''O'' level', 'Commerce'),
(64, 'A level', 'Commerce'),
(65, 'B Level', 'Commerce');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) NOT NULL,
  `pid` int(11) NOT NULL,
  `name` text NOT NULL,
  `number` int(11) NOT NULL,
  `form_date` date NOT NULL,
  `last_date` date NOT NULL,
  `exam_date` date NOT NULL,
  `join_date` date NOT NULL,
  `salary` varchar(8) NOT NULL,
  `qualification` text NOT NULL,
  `mi_age` int(11) NOT NULL,
  `ma_age` int(11) NOT NULL,
  `job_area` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `pid`, `name`, `number`, `form_date`, `last_date`, `exam_date`, `join_date`, `salary`, `qualification`, `mi_age`, `ma_age`, `job_area`) VALUES
(1, 2, 'Programmer', 10, '2018-01-01', '2018-05-30', '2018-06-15', '2018-07-01', '150000', 'B.C.A.,B.Sc. (Computer Science),B.Tech.,M.C.A.,M.Tech.,M.Sc (Computer Science),M.Sc. (Information Technology)', 20, 30, 'bikaner'),
(2, 3, 'Manager', 5, '2018-01-01', '2018-05-30', '2018-06-15', '2018-07-01', '150000', 'M.B.A.', 20, 30, 'udaipur');

-- --------------------------------------------------------

--
-- Table structure for table `msg`
--

CREATE TABLE `msg` (
  `id` int(10) NOT NULL,
  `sender` text NOT NULL,
  `mail` varchar(75) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `msg` varchar(200) NOT NULL,
  `status` enum('unseen','seen') NOT NULL,
  `type` enum('message','report') NOT NULL,
  `reply` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `msg`
--

INSERT INTO `msg` (`id`, `sender`, `mail`, `subject`, `msg`, `status`, `type`, `reply`) VALUES
(5, 'aditya kochar', 'adityajain199512@gmail.com', 'test', 'hello', 'seen', 'message', ''),
(6, 'riddhibaid', 'riddhibaid@gamil.com', 'tr', 'try kro', 'seen', 'message', ''),
(7, 'swati', 'swati@gmail.com', 'hahaha', 'hello', 'seen', 'message', ''),
(8, 'vidhi', 'vidhi@gmail.com', 'nice', 'hello', 'seen', 'report', '');

-- --------------------------------------------------------

--
-- Table structure for table `personal`
--

CREATE TABLE `personal` (
  `id` bigint(20) NOT NULL,
  `name` text NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `contact` varchar(11) NOT NULL,
  `dob` date NOT NULL,
  `pic` text NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `backcon` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personal`
--

INSERT INTO `personal` (`id`, `name`, `address`, `city`, `state`, `contact`, `dob`, `pic`, `username`, `password`, `backcon`, `email`) VALUES
(2, 'vidhi&co.', 'bikaner,bikaner', '', '', '123456789', '2016-02-02', 'upfiles/1516791543web-designer-pune-background.jpg', 'vidhi', '4100c4d44da9177247e44a5fc1546778', '', 'vidhi@asd'),
(3, 'shashi&co.', 'gandhi colony,udaipur', '', '', '1234', '2009-05-15', 'upfiles/1516792744web-designer-pune-background.jpg', 'shashi', '4100c4d44da9177247e44a5fc1546778', '', 'shashi@asd');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(500) NOT NULL,
  `city` varchar(25) NOT NULL,
  `state` varchar(30) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `qualification` text NOT NULL,
  `pic` varchar(200) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `resume` varchar(200) NOT NULL,
  `backcon` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id`, `name`, `address`, `city`, `state`, `contact`, `dob`, `qualification`, `pic`, `username`, `password`, `resume`, `backcon`, `email`) VALUES
(2, 'riddhi baid', 'gangashar,bikaner', '', '', '12345', '1994-05-15', 'B.C.A.', 'upfiles/1516791344web-designer-pune-background.jpg', 'riddhi', '4100c4d44da9177247e44a5fc1546778', 'cv/1516027588web-designer-pune-background.jpg', '', 'riddhibaid@gmail.com'),
(3, 'keshu surana', 'bunny park,jaipur', '', '', '1234', '1990-06-06', 'M.B.A.', 'upfiles/1516792776web-designer-pune-background.jpg', 'keshu', '4100c4d44da9177247e44a5fc1546778', 'cv/1516028495web-designer-pune-background.jpg', '', 'keshu@asd');

-- --------------------------------------------------------

--
-- Table structure for table `toj`
--

CREATE TABLE `toj` (
  `id` int(11) NOT NULL,
  `field` text NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `toj`
--

INSERT INTO `toj` (`id`, `field`, `name`) VALUES
(1, 'Airline', 'Aircraft Dispatcher'),
(2, 'Airline', 'Aircraft Mechanic'),
(3, 'Airline', 'Airline Pilot'),
(4, 'Airline', 'Flight Attendant'),
(5, 'Arts', 'Actor'),
(6, 'Arts', 'Architecture'),
(7, 'Arts', 'Art Appraiser'),
(8, 'Arts', 'Art Auctioneer'),
(9, 'Arts', 'Artist'),
(10, 'Arts', 'Music Conductor'),
(11, 'Business', 'Accountant'),
(12, 'Business', 'Administrative Assistant/Secretary'),
(13, 'Business', 'Advertising'),
(14, 'Business', 'Consultant'),
(15, 'Business', 'Financial Advisor'),
(16, 'Business', 'Fund Raiser'),
(17, 'Business', 'Manager'),
(18, 'Business', 'Cartered Accountant'),
(19, 'Business', 'Company Secretery'),
(21, 'Business', 'Insurance Agent'),
(22, 'Business', 'Investment Banker'),
(23, 'Business', 'Lawyer'),
(25, 'Arts', 'Singer'),
(26, 'Media', 'Book Publishing'),
(27, 'Media', 'Freelance Editor'),
(28, 'Media', 'Freelance Writer'),
(29, 'Media', 'Public Relations'),
(30, 'Media', 'Web Developer'),
(31, 'Media', 'Writer/Editor'),
(32, 'Medical', 'Doctor'),
(33, 'Medical', 'Emergency Dispatcher'),
(34, 'Medical', 'Emergency Medical Services'),
(35, 'Medical', 'Nurse'),
(36, 'Medical', 'Paramedic'),
(37, 'Medical', 'Pharmacist'),
(38, 'Medical', 'Psychologist'),
(39, 'Medical', 'Social Worker'),
(40, 'Medical', 'Veterinarian'),
(41, 'Service Industry', 'Athletic Trainer'),
(42, 'Service Industry', 'Bank Teller'),
(43, 'Service Industry', 'Call Center'),
(44, 'Service Industry', 'Funeral Director'),
(45, 'Service Industry', 'Hair Stylist'),
(46, 'Service Industry', 'Personal Fitness Trainer'),
(47, 'Service Industry', 'Retail'),
(48, 'Service Industry', 'Sales'),
(49, 'Service Industry', 'Ski Instructor'),
(50, 'Service Industry', 'Waiter'),
(51, 'Service Industry', 'Wedding Planner'),
(52, 'Service Industry', 'Tattoo Artist'),
(53, 'Teaching', 'Career Counselor'),
(54, 'Teaching', 'School Jobs (Office)'),
(55, 'Teaching', 'Substitute Teacher'),
(56, 'Teaching', 'Teacher'),
(57, 'Teaching', 'Lecturer'),
(58, 'Teaching', 'Teaching (Online)'),
(59, 'Technology', 'App Developer'),
(60, 'Technology', 'Computer Programmer'),
(61, 'Technology', 'Database Administrator'),
(62, 'Technology', 'Programmer'),
(63, 'Technology', 'Software Developer'),
(65, 'Business', 'Director');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `beheerder`
--
ALTER TABLE `beheerder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `degree`
--
ALTER TABLE `degree`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `msg`
--
ALTER TABLE `msg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `toj`
--
ALTER TABLE `toj`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `beheerder`
--
ALTER TABLE `beheerder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `degree`
--
ALTER TABLE `degree`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `msg`
--
ALTER TABLE `msg`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `personal`
--
ALTER TABLE `personal`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `toj`
--
ALTER TABLE `toj`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
