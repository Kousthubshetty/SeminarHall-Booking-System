-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2021 at 02:11 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seminarhallbooking`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminid` bigint(20) NOT NULL,
  `adminname` varchar(25) NOT NULL,
  `emailid` varchar(100) NOT NULL,
  `password` varchar(300) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `adminname`, `emailid`, `password`, `status`) VALUES
(1, 'Surendra Jain', 'surendrajain@gmail.com', '1d63728c96a3bd55624cad578ba4b9e2', 'Active'),
(2, 'Sandeepa BA', 'aravinda@technopulse.in', '6d663575733b6d51ef5eb055e625a8ed', 'Active'),
(3, 'Adithya', 'adithyahebbar32@gmail.com', 'a47e3bfc5dec7f7862ae3f5c132ef419', 'Active'),
(4, 'Kousthub Shetty', 'kousthubpc@gmail.com', '7a4e7bfaa7fea6b41c7efa7622443409', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `bill_id` int(11) NOT NULL,
  `hall_booking_id` int(11) NOT NULL,
  `hotel_id` bigint(20) NOT NULL,
  `staffid` int(11) NOT NULL,
  `date_time` datetime NOT NULL,
  `total_amt` bigint(20) NOT NULL,
  `bill_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`bill_id`, `hall_booking_id`, `hotel_id`, `staffid`, `date_time`, `total_amt`, `bill_status`) VALUES
(1, 56, 1, 8, '2021-09-01 00:00:00', 120, 'Pending'),
(2, 74, 1, 1, '2021-09-02 12:28:00', 145, 'Rejected'),
(3, 110, 2, 4, '2021-10-05 14:42:00', 330, 'Pending'),
(4, 110, 2, 4, '2021-10-05 13:00:00', 0, 'Pending'),
(5, 110, 2, 4, '1970-01-01 22:00:00', 210, 'Pending'),
(6, 110, 2, 4, '1970-01-01 22:00:00', 210, 'Pending'),
(7, 110, 2, 4, '1970-01-01 22:00:00', 210, 'Pending'),
(8, 110, 2, 4, '1970-01-01 22:00:00', 210, 'Pending'),
(9, 110, 2, 4, '1970-01-01 22:00:00', 210, 'Pending'),
(10, 110, 2, 4, '1970-01-01 22:00:00', 210, 'Pending'),
(11, 110, 2, 4, '1970-01-01 13:00:00', 520, 'Pending'),
(12, 110, 2, 4, '2021-10-05 15:01:00', 410, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `change_request`
--

CREATE TABLE `change_request` (
  `request_id` bigint(20) NOT NULL,
  `hall_booking_id` bigint(20) NOT NULL,
  `chng_req_booking_id` bigint(20) NOT NULL,
  `staffid` bigint(20) NOT NULL,
  `department_id` bigint(20) NOT NULL,
  `request_date` datetime NOT NULL,
  `reason` text NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `change_request`
--

INSERT INTO `change_request` (`request_id`, `hall_booking_id`, `chng_req_booking_id`, `staffid`, `department_id`, `request_date`, `reason`, `status`) VALUES
(43, 92, 101, 1, 2, '2021-09-17 00:00:00', 'a:2:{s:15:\"hall_booking_id\";i:101;s:13:\"change_reason\";s:7:\"Test me\";}', 'Pending'),
(44, 99, 101, 1, 2, '2021-09-17 00:00:00', 'a:2:{s:15:\"hall_booking_id\";i:101;s:13:\"change_reason\";s:7:\"Test me\";}', 'Pending'),
(45, 102, 103, 3, 3, '2021-09-24 00:00:00', 'a:2:{s:15:\"hall_booking_id\";i:103;s:13:\"change_reason\";s:9:\"Emergency\";}', 'Accepted'),
(46, 105, 106, 3, 3, '2021-09-24 00:00:00', 'a:2:{s:15:\"hall_booking_id\";i:106;s:13:\"change_reason\";s:7:\"test me\";}', 'Accepted'),
(47, 107, 108, 3, 3, '2021-09-24 00:00:00', 'a:2:{s:15:\"hall_booking_id\";i:108;s:13:\"change_reason\";s:3:\"yaa\";}', 'Rejected'),
(50, 107, 113, 3, 3, '2021-09-24 00:00:00', 'a:2:{s:15:\"hall_booking_id\";i:113;s:13:\"change_reason\";s:4:\"Test\";}', 'Pending'),
(51, 107, 114, 3, 3, '2021-09-24 00:00:00', 'a:2:{s:15:\"hall_booking_id\";i:114;s:13:\"change_reason\";s:4:\"Test\";}', 'Pending'),
(52, 107, 115, 3, 3, '2021-09-24 00:00:00', 'a:2:{s:15:\"hall_booking_id\";i:115;s:13:\"change_reason\";s:4:\"Test\";}', 'Pending'),
(53, 107, 116, 3, 3, '2021-09-24 00:00:00', 'a:2:{s:15:\"hall_booking_id\";i:116;s:13:\"change_reason\";s:4:\"Test\";}', 'Pending'),
(54, 107, 117, 3, 3, '2021-09-24 00:00:00', 'a:2:{s:15:\"hall_booking_id\";i:117;s:13:\"change_reason\";s:4:\"Test\";}', 'Pending'),
(55, 107, 118, 3, 3, '2021-09-24 00:00:00', 'a:2:{s:15:\"hall_booking_id\";i:118;s:13:\"change_reason\";s:4:\"Test\";}', 'Pending'),
(56, 107, 119, 3, 3, '2021-09-24 00:00:00', 'a:2:{s:15:\"hall_booking_id\";i:119;s:13:\"change_reason\";s:4:\"Test\";}', 'Pending'),
(57, 107, 120, 3, 3, '2021-09-24 00:00:00', 'a:2:{s:15:\"hall_booking_id\";i:120;s:13:\"change_reason\";s:4:\"TEch\";}', 'Pending'),
(58, 109, 121, 1, 2, '2021-09-24 00:00:00', 'a:2:{s:15:\"hall_booking_id\";i:121;s:13:\"change_reason\";s:18:\"Thank youThank you\";}', 'Rejected'),
(59, 110, 121, 1, 2, '2021-09-24 00:00:00', 'a:2:{s:15:\"hall_booking_id\";i:121;s:13:\"change_reason\";s:18:\"Thank youThank you\";}', 'Rejected');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` bigint(20) NOT NULL,
  `department_name` varchar(25) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_name`, `status`) VALUES
(1, 'Department of English', 'Active'),
(2, 'Department of Political S', 'Active'),
(3, 'Department of Computer Sc', 'Active'),
(4, 'Department of Commerce', 'Active'),
(5, 'Department of Kannada', 'Active'),
(6, 'Department of Journalism', 'Active'),
(7, 'Department of Physics', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `equipments`
--

CREATE TABLE `equipments` (
  `equipment_id` bigint(20) NOT NULL,
  `equipment_type` varchar(50) NOT NULL,
  `equipment_detail` text NOT NULL,
  `equipment_img` varchar(300) NOT NULL,
  `equipment_quantity` bigint(11) NOT NULL,
  `equipment_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `equipments`
--

INSERT INTO `equipments` (`equipment_id`, `equipment_type`, `equipment_detail`, `equipment_img`, `equipment_quantity`, `equipment_status`) VALUES
(1, 'Camera', 'canon 800D', '81vgbokmqkl-_aa1402_-500x500.jpg', 1, 'Active'),
(2, 'HDMI Cable', 'Nikon D7500', '496390495hdmicable.jpg', 2, 'Active'),
(3, 'Laptop', 'Hp pavilion x360', '347966432laptop.jpg', 1, 'Active'),
(5, 'Pendrive', 'Sandisk 32GB', '112719236pendrive.jpg', 4, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `eventtype`
--

CREATE TABLE `eventtype` (
  `eventtypeid` bigint(20) NOT NULL,
  `eventtype` varchar(25) NOT NULL,
  `eventicon` varchar(300) NOT NULL,
  `eventdescription` text NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eventtype`
--

INSERT INTO `eventtype` (`eventtypeid`, `eventtype`, `eventicon`, `eventdescription`, `status`) VALUES
(1, 'Power point presentation', 'pcw-ppt-primary-100787681-large.jpg', 'PPT presenation on subject topic', 'Active'),
(2, 'Webinar', '1963588269webinar.png', 'A webinar is an engaging online event where a speaker, or small group of speakers, deliver a presentation to a large audience who participate by submitting questions, responding to polls and using other available interactive tools', 'Active'),
(4, 'Leaders Meet', '1958815838leadermeet.jpg', 'Class Representative meeting', 'Active'),
(5, 'Cultural Program', '493364022cultural.png', 'Fest for students', 'Active'),
(6, 'Student lecture', '283891268studentlecture.jpg', 'Lecture given by student', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `food_item`
--

CREATE TABLE `food_item` (
  `food_item_id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `item_image` varchar(255) NOT NULL,
  `item_cost` bigint(20) NOT NULL,
  `item_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food_item`
--

INSERT INTO `food_item` (`food_item_id`, `hotel_id`, `item_name`, `item_image`, `item_cost`, `item_status`) VALUES
(1, 1, 'Dose', '557079049dosa-recipe-plain-dosa-recipe-sada-dosa-recipe-1-1024x769.jpeg', 25, 'Active'),
(2, 1, 'Masaldosa', '942351850Masala-Dosa-500x375.jpg', 35, 'Active'),
(3, 1, 'Pulao', '786698146pulao-recipe-500x500.jpg', 35, 'Active'),
(6, 2, 'Pizza', '109309509961203720.jpg', 100, 'Active'),
(7, 2, 'GobiManchuri', '1699217562Default-food.jpg', 40, 'Active'),
(8, 1, 'Golibaje', '410716114goli-baje-recipe-500x500.jpg', 25, 'Active'),
(9, 1, 'Vade', '1193534218garhwali-urad-vade-featured.jpg', 30, 'Active'),
(10, 1, 'Idli', '119604906idli.jpg', 40, 'Active'),
(11, 2, 'Dose', '1764097621dosa-recipe-plain-dosa-recipe-sada-dosa-recipe-1-1024x769.jpeg', 30, 'Inactive'),
(12, 2, 'Biriyani', '417758533yot9zfocxiqxeghusxny.jpg', 120, 'Inactive'),
(13, 2, 'Poori', '50816043perfect-poori.jpg', 30, 'Active'),
(14, 2, 'Golibaje', '1291577514maxresdefault.jpg', 30, 'Active'),
(15, 2, 'Mosranna', '1342697692maxresdefault-1.jpg', 40, 'Active'),
(16, 2, 'Puliyogare', '1987195252puliyogare.jpg', 60, 'Active'),
(18, 3, 'Noodles', '242330210veg-hakka-noodles-recipe-with-step-by-step-instructions.jpg', 120, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `food_order`
--

CREATE TABLE `food_order` (
  `food_order_id` bigint(20) NOT NULL,
  `bill_id` bigint(20) NOT NULL,
  `food_item_id` int(11) NOT NULL,
  `item_qty` int(11) NOT NULL,
  `item_cost` bigint(20) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food_order`
--

INSERT INTO `food_order` (`food_order_id`, `bill_id`, `food_item_id`, `item_qty`, `item_cost`, `status`) VALUES
(1, 1, 2, 1, 35, 'Active'),
(2, 1, 1, 2, 25, 'Active'),
(3, 1, 3, 1, 35, 'Active'),
(4, 2, 1, 3, 25, 'Active'),
(5, 2, 2, 1, 35, 'Active'),
(6, 2, 3, 1, 35, 'Active'),
(8, 3, 13, 3, 30, 'Active'),
(9, 3, 16, 4, 60, 'Active'),
(10, 5, 13, 1, 30, 'Active'),
(11, 5, 14, 2, 30, 'Active'),
(12, 5, 15, 3, 40, 'Active'),
(13, 11, 16, 1, 60, 'Active'),
(14, 11, 13, 2, 30, 'Active'),
(15, 11, 7, 4, 40, 'Active'),
(16, 11, 15, 6, 40, 'Active'),
(17, 12, 13, 1, 30, 'Active'),
(18, 12, 16, 3, 60, 'Active'),
(19, 12, 15, 5, 40, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `hall`
--

CREATE TABLE `hall` (
  `hallid` bigint(20) NOT NULL,
  `hallname` varchar(50) NOT NULL,
  `halldescription` text NOT NULL,
  `max_capacity` bigint(20) NOT NULL,
  `hallimage` varchar(300) NOT NULL,
  `hall_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hall`
--

INSERT INTO `hall` (`hallid`, `hallname`, `halldescription`, `max_capacity`, `hallimage`, `hall_status`) VALUES
(1, 'Samyakdarshana Hall', 'Samyakdarshana Hall', 100, '235239334IMG_20210313_063617.jpg', 'Active'),
(2, 'AV hall', 'AV hall', 200, '1467792094IMG-20210315-WA0102.jpg', 'Active'),
(8, '', '', 0, '942077385', ''),
(9, '', '', 0, '189758107', ''),
(10, '', '', 0, '743317084', ''),
(11, '', '', 0, '248710555', ''),
(12, '', '', 0, '1810144114', '');

-- --------------------------------------------------------

--
-- Table structure for table `hall_booking`
--

CREATE TABLE `hall_booking` (
  `hall_booking_id` bigint(20) NOT NULL,
  `hallid` bigint(20) NOT NULL,
  `booked_date` datetime NOT NULL,
  `department_id` bigint(20) NOT NULL,
  `staffid` bigint(20) NOT NULL,
  `eventtypeid` bigint(20) NOT NULL,
  `booking_start_dt_tim` datetime NOT NULL,
  `booking_end_dt_tim` datetime DEFAULT NULL,
  `booking_reason` text NOT NULL,
  `total_strength` int(11) NOT NULL,
  `staff_note` text NOT NULL,
  `requirements` text NOT NULL,
  `admin_note` text NOT NULL,
  `event_description` text NOT NULL,
  `gallery` text NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hall_booking`
--

INSERT INTO `hall_booking` (`hall_booking_id`, `hallid`, `booked_date`, `department_id`, `staffid`, `eventtypeid`, `booking_start_dt_tim`, `booking_end_dt_tim`, `booking_reason`, `total_strength`, `staff_note`, `requirements`, `admin_note`, `event_description`, `gallery`, `status`) VALUES
(13, 1, '2021-07-23 15:21:58', 1, 8, 1, '2021-08-21 10:00:00', '2021-08-21 12:00:00', 'test tset', 25, 'abc abc', '', '', '', '', 'Rejected'),
(14, 1, '2021-07-23 15:23:44', 1, 8, 1, '2021-08-21 10:00:00', '2021-08-21 12:00:00', 'test tset', 25, 'test', 'a:4:{s:12:\"equipment_id\";a:3:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";}s:3:\"img\";a:3:{i:0;s:32:\"81vgbokmqkl-_aa1402_-500x500.jpg\";i:1;s:42:\"152016671581vgbokmqkl-_aa1402_-500x500.jpg\";i:2;s:41:\"50434788081vgbokmqkl-_aa1402_-500x500.jpg\";}s:14:\"equipment_type\";a:3:{i:0;s:6:\"Camera\";i:1;s:5:\"Table\";i:2;s:6:\"Chairs\";}s:12:\"equipmentqty\";a:3:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:3:\"255\";}}', '', '', '', 'Cancelled'),
(15, 1, '2021-07-23 15:29:05', 1, 8, 1, '2021-08-21 10:00:00', '2021-08-21 12:00:00', 'test tset', 25, 'abc abc', 'a:4:{s:12:\"equipment_id\";a:3:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";}s:3:\"img\";a:3:{i:0;s:32:\"81vgbokmqkl-_aa1402_-500x500.jpg\";i:1;s:42:\"152016671581vgbokmqkl-_aa1402_-500x500.jpg\";i:2;s:41:\"50434788081vgbokmqkl-_aa1402_-500x500.jpg\";}s:14:\"equipment_type\";a:3:{i:0;s:6:\"Camera\";i:1;s:5:\"Table\";i:2;s:6:\"Chairs\";}s:12:\"equipmentqty\";a:3:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:3:\"255\";}}', '', '', '', 'Approved'),
(16, 1, '2021-07-30 11:49:41', 1, 8, 2, '2021-08-21 10:00:00', '2021-08-21 12:00:00', 'For meeting purpose', 50, 'Kinldy arrange our requirements<br><b>Reason for Cancellation:</b></br>Cancelled because No guest participation', 'a:4:{s:12:\"equipment_id\";a:3:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";}s:3:\"img\";a:3:{i:0;s:32:\"81vgbokmqkl-_aa1402_-500x500.jpg\";i:1;s:42:\"152016671581vgbokmqkl-_aa1402_-500x500.jpg\";i:2;s:41:\"50434788081vgbokmqkl-_aa1402_-500x500.jpg\";}s:14:\"equipment_type\";a:3:{i:0;s:6:\"Camera\";i:1;s:5:\"Table\";i:2;s:6:\"Chairs\";}s:12:\"equipmentqty\";a:3:{i:0;s:1:\"3\";i:1;s:1:\"3\";i:2;s:1:\"2\";}}', 'Thanks for booking', '', '', 'Cancelled'),
(17, 1, '2021-07-30 12:00:31', 1, 8, 4, '2021-08-21 10:00:00', '2021-08-21 12:00:00', 'Class Leaders meet', 50, 'Kindly fulfill all the requirements mentioned', 'a:4:{s:12:\"equipment_id\";a:3:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";}s:3:\"img\";a:3:{i:0;s:32:\"81vgbokmqkl-_aa1402_-500x500.jpg\";i:1;s:42:\"152016671581vgbokmqkl-_aa1402_-500x500.jpg\";i:2;s:41:\"50434788081vgbokmqkl-_aa1402_-500x500.jpg\";}s:14:\"equipment_type\";a:3:{i:0;s:6:\"Camera\";i:1;s:5:\"Table\";i:2;s:6:\"Chairs\";}s:12:\"equipmentqty\";a:3:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:2:\"10\";}}', '', '', '', 'Approved'),
(18, 1, '2021-07-30 13:04:32', 1, 8, 1, '2021-08-21 10:00:00', '2021-08-21 12:00:00', 'Test Booking', 50, 'Test reason', 'a:4:{s:12:\"equipment_id\";a:2:{i:0;s:1:\"1\";i:1;s:1:\"2\";}s:3:\"img\";a:2:{i:0;s:32:\"81vgbokmqkl-_aa1402_-500x500.jpg\";i:1;s:42:\"152016671581vgbokmqkl-_aa1402_-500x500.jpg\";}s:14:\"equipment_type\";a:2:{i:0;s:6:\"Camera\";i:1;s:5:\"Table\";}s:12:\"equipmentqty\";a:2:{i:0;s:1:\"1\";i:1;s:1:\"2\";}}', '', '', '', 'Approved'),
(19, 1, '2021-07-30 13:05:24', 1, 8, 1, '2021-08-21 10:00:00', '2021-08-21 12:00:00', 'Test Booking', 50, 'Test reason', 'a:4:{s:12:\"equipment_id\";a:2:{i:0;s:1:\"1\";i:1;s:1:\"2\";}s:3:\"img\";a:2:{i:0;s:32:\"81vgbokmqkl-_aa1402_-500x500.jpg\";i:1;s:42:\"152016671581vgbokmqkl-_aa1402_-500x500.jpg\";}s:14:\"equipment_type\";a:2:{i:0;s:6:\"Camera\";i:1;s:5:\"Table\";}s:12:\"equipmentqty\";a:2:{i:0;s:1:\"1\";i:1;s:1:\"2\";}}', '', '', '', 'Approved'),
(20, 1, '2021-07-30 13:07:11', 1, 8, 1, '2021-08-21 10:00:00', '2021-08-21 12:00:00', 'Test Booking', 50, 'Test reason', 'a:4:{s:12:\"equipment_id\";a:2:{i:0;s:1:\"1\";i:1;s:1:\"2\";}s:3:\"img\";a:2:{i:0;s:32:\"81vgbokmqkl-_aa1402_-500x500.jpg\";i:1;s:42:\"152016671581vgbokmqkl-_aa1402_-500x500.jpg\";}s:14:\"equipment_type\";a:2:{i:0;s:6:\"Camera\";i:1;s:5:\"Table\";}s:12:\"equipmentqty\";a:2:{i:0;s:1:\"1\";i:1;s:1:\"2\";}}', '', '', '', 'Approved'),
(21, 1, '2021-08-06 11:40:58', 0, 7, 1, '2021-08-21 10:00:00', '2021-08-21 12:00:00', 'This is booking record', 50, 'This is note record', 'a:4:{s:12:\"equipment_id\";a:2:{i:0;s:1:\"1\";i:1;s:1:\"2\";}s:3:\"img\";a:2:{i:0;s:32:\"81vgbokmqkl-_aa1402_-500x500.jpg\";i:1;s:42:\"152016671581vgbokmqkl-_aa1402_-500x500.jpg\";}s:14:\"equipment_type\";a:2:{i:0;s:6:\"Camera\";i:1;s:5:\"Table\";}s:12:\"equipmentqty\";a:2:{i:0;s:1:\"2\";i:1;s:1:\"1\";}}', '', '', '', 'Approved'),
(22, 1, '2021-08-06 11:48:54', 0, 7, 1, '2021-08-21 10:00:00', '2021-08-21 12:00:00', 'This is booking record', 50, 'This is note record', 'a:4:{s:12:\"equipment_id\";a:2:{i:0;s:1:\"1\";i:1;s:1:\"2\";}s:3:\"img\";a:2:{i:0;s:32:\"81vgbokmqkl-_aa1402_-500x500.jpg\";i:1;s:42:\"152016671581vgbokmqkl-_aa1402_-500x500.jpg\";}s:14:\"equipment_type\";a:2:{i:0;s:6:\"Camera\";i:1;s:5:\"Table\";}s:12:\"equipmentqty\";a:2:{i:0;s:1:\"2\";i:1;s:1:\"1\";}}', '', '', '', 'Approved'),
(23, 1, '2021-08-06 11:51:34', 0, 7, 1, '2021-08-21 10:00:00', '2021-08-21 12:00:00', 'This is booking record', 50, 'This is note record', 'a:4:{s:12:\"equipment_id\";a:2:{i:0;s:1:\"1\";i:1;s:1:\"2\";}s:3:\"img\";a:2:{i:0;s:32:\"81vgbokmqkl-_aa1402_-500x500.jpg\";i:1;s:42:\"152016671581vgbokmqkl-_aa1402_-500x500.jpg\";}s:14:\"equipment_type\";a:2:{i:0;s:6:\"Camera\";i:1;s:5:\"Table\";}s:12:\"equipmentqty\";a:2:{i:0;s:1:\"2\";i:1;s:1:\"1\";}}', '', '', '', 'Approved'),
(24, 1, '2021-08-06 11:54:47', 0, 7, 1, '2021-08-21 10:00:00', '2021-08-21 12:00:00', 'This is booking record', 50, 'This is note record', 'a:4:{s:12:\"equipment_id\";a:2:{i:0;s:1:\"1\";i:1;s:1:\"2\";}s:3:\"img\";a:2:{i:0;s:32:\"81vgbokmqkl-_aa1402_-500x500.jpg\";i:1;s:42:\"152016671581vgbokmqkl-_aa1402_-500x500.jpg\";}s:14:\"equipment_type\";a:2:{i:0;s:6:\"Camera\";i:1;s:5:\"Table\";}s:12:\"equipmentqty\";a:2:{i:0;s:1:\"2\";i:1;s:1:\"1\";}}', '', '', '', 'Approved'),
(25, 1, '2021-08-06 11:56:18', 0, 7, 1, '2021-08-21 10:00:00', '2021-08-21 12:00:00', 'This is booking record', 50, 'This is note record', 'a:4:{s:12:\"equipment_id\";a:2:{i:0;s:1:\"1\";i:1;s:1:\"2\";}s:3:\"img\";a:2:{i:0;s:32:\"81vgbokmqkl-_aa1402_-500x500.jpg\";i:1;s:42:\"152016671581vgbokmqkl-_aa1402_-500x500.jpg\";}s:14:\"equipment_type\";a:2:{i:0;s:6:\"Camera\";i:1;s:5:\"Table\";}s:12:\"equipmentqty\";a:2:{i:0;s:1:\"2\";i:1;s:1:\"1\";}}', '', '', '', 'Approved'),
(26, 1, '2021-08-06 11:57:54', 0, 7, 1, '2021-08-21 10:00:00', '2021-08-21 12:00:00', 'This is booking record', 50, 'This is note record', 'a:4:{s:12:\"equipment_id\";a:2:{i:0;s:1:\"1\";i:1;s:1:\"2\";}s:3:\"img\";a:2:{i:0;s:32:\"81vgbokmqkl-_aa1402_-500x500.jpg\";i:1;s:42:\"152016671581vgbokmqkl-_aa1402_-500x500.jpg\";}s:14:\"equipment_type\";a:2:{i:0;s:6:\"Camera\";i:1;s:5:\"Table\";}s:12:\"equipmentqty\";a:2:{i:0;s:1:\"2\";i:1;s:1:\"1\";}}', '', '', '', 'Approved'),
(27, 1, '2021-08-06 11:58:26', 0, 7, 1, '2021-08-21 10:00:00', '2021-08-21 12:00:00', 'This is booking record', 50, 'This is note record', 'a:4:{s:12:\"equipment_id\";a:2:{i:0;s:1:\"1\";i:1;s:1:\"2\";}s:3:\"img\";a:2:{i:0;s:32:\"81vgbokmqkl-_aa1402_-500x500.jpg\";i:1;s:42:\"152016671581vgbokmqkl-_aa1402_-500x500.jpg\";}s:14:\"equipment_type\";a:2:{i:0;s:6:\"Camera\";i:1;s:5:\"Table\";}s:12:\"equipmentqty\";a:2:{i:0;s:1:\"2\";i:1;s:1:\"1\";}}', '', '', '', 'Approved'),
(28, 1, '2021-08-06 12:02:15', 0, 7, 1, '2021-08-21 10:00:00', '2021-08-21 12:00:00', 'This is booking record', 50, 'This is note record', 'a:4:{s:12:\"equipment_id\";a:2:{i:0;s:1:\"1\";i:1;s:1:\"2\";}s:3:\"img\";a:2:{i:0;s:32:\"81vgbokmqkl-_aa1402_-500x500.jpg\";i:1;s:42:\"152016671581vgbokmqkl-_aa1402_-500x500.jpg\";}s:14:\"equipment_type\";a:2:{i:0;s:6:\"Camera\";i:1;s:5:\"Table\";}s:12:\"equipmentqty\";a:2:{i:0;s:1:\"2\";i:1;s:1:\"1\";}}', '', '', '', 'Pending'),
(29, 1, '2021-08-06 12:02:46', 0, 7, 1, '2021-08-21 10:00:00', '2021-08-21 12:00:00', 'This is booking record', 50, 'This is note record', 'a:4:{s:12:\"equipment_id\";a:2:{i:0;s:1:\"1\";i:1;s:1:\"2\";}s:3:\"img\";a:2:{i:0;s:32:\"81vgbokmqkl-_aa1402_-500x500.jpg\";i:1;s:42:\"152016671581vgbokmqkl-_aa1402_-500x500.jpg\";}s:14:\"equipment_type\";a:2:{i:0;s:6:\"Camera\";i:1;s:5:\"Table\";}s:12:\"equipmentqty\";a:2:{i:0;s:1:\"2\";i:1;s:1:\"1\";}}', '', '', '', 'Pending'),
(30, 1, '2021-08-06 12:03:42', 0, 7, 1, '2021-08-21 10:00:00', '2021-08-21 12:00:00', 'This is booking record', 50, 'This is note record', 'a:4:{s:12:\"equipment_id\";a:2:{i:0;s:1:\"1\";i:1;s:1:\"2\";}s:3:\"img\";a:2:{i:0;s:32:\"81vgbokmqkl-_aa1402_-500x500.jpg\";i:1;s:42:\"152016671581vgbokmqkl-_aa1402_-500x500.jpg\";}s:14:\"equipment_type\";a:2:{i:0;s:6:\"Camera\";i:1;s:5:\"Table\";}s:12:\"equipmentqty\";a:2:{i:0;s:1:\"2\";i:1;s:1:\"1\";}}', '', '', '', 'Pending'),
(31, 1, '2021-08-06 12:06:30', 0, 7, 1, '2021-08-21 10:00:00', '2021-08-21 12:00:00', 'This is booking record', 50, 'This is note record', 'a:4:{s:12:\"equipment_id\";a:2:{i:0;s:1:\"1\";i:1;s:1:\"2\";}s:3:\"img\";a:2:{i:0;s:32:\"81vgbokmqkl-_aa1402_-500x500.jpg\";i:1;s:42:\"152016671581vgbokmqkl-_aa1402_-500x500.jpg\";}s:14:\"equipment_type\";a:2:{i:0;s:6:\"Camera\";i:1;s:5:\"Table\";}s:12:\"equipmentqty\";a:2:{i:0;s:1:\"2\";i:1;s:1:\"1\";}}', '', '', '', 'Pending'),
(32, 1, '2021-08-06 12:11:31', 0, 7, 1, '2021-08-21 10:00:00', '2021-08-21 12:00:00', 'This is booking record', 50, 'This is note record', 'a:4:{s:12:\"equipment_id\";a:2:{i:0;s:1:\"1\";i:1;s:1:\"2\";}s:3:\"img\";a:2:{i:0;s:32:\"81vgbokmqkl-_aa1402_-500x500.jpg\";i:1;s:42:\"152016671581vgbokmqkl-_aa1402_-500x500.jpg\";}s:14:\"equipment_type\";a:2:{i:0;s:6:\"Camera\";i:1;s:5:\"Table\";}s:12:\"equipmentqty\";a:2:{i:0;s:1:\"2\";i:1;s:1:\"1\";}}', '', '', '', 'Pending'),
(33, 1, '2021-08-06 12:12:10', 0, 7, 0, '2021-08-21 10:00:00', '2021-08-21 12:00:00', '', 50, '', 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";a:1:{i:0;s:32:\"81vgbokmqkl-_aa1402_-500x500.jpg\";}s:14:\"equipment_type\";a:1:{i:0;s:6:\"Camera\";}s:12:\"equipmentqty\";a:1:{i:0;s:1:\"1\";}}', '', '', '', 'Pending'),
(34, 1, '2021-08-06 13:11:29', 0, 7, 0, '2021-08-21 10:00:00', '2021-08-21 12:00:00', '', 50, '', 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";a:1:{i:0;s:32:\"81vgbokmqkl-_aa1402_-500x500.jpg\";}s:14:\"equipment_type\";a:1:{i:0;s:6:\"Camera\";}s:12:\"equipmentqty\";a:1:{i:0;s:1:\"1\";}}', '', '', '', 'Pending'),
(35, 1, '2021-08-06 13:13:04', 0, 7, 0, '2021-08-21 10:00:00', '2021-08-21 12:00:00', '', 50, '', 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";a:1:{i:0;s:32:\"81vgbokmqkl-_aa1402_-500x500.jpg\";}s:14:\"equipment_type\";a:1:{i:0;s:6:\"Camera\";}s:12:\"equipmentqty\";a:1:{i:0;s:1:\"1\";}}', '', '', '', 'Pending'),
(36, 1, '2021-08-06 13:35:29', 0, 7, 0, '2021-08-21 10:00:00', '2021-08-21 12:00:00', '', 50, '', 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";a:1:{i:0;s:32:\"81vgbokmqkl-_aa1402_-500x500.jpg\";}s:14:\"equipment_type\";a:1:{i:0;s:6:\"Camera\";}s:12:\"equipmentqty\";a:1:{i:0;s:1:\"1\";}}', '', '', '', 'Pending'),
(37, 1, '2021-08-06 13:38:03', 0, 7, 0, '2021-08-21 10:00:00', '2021-08-21 12:00:00', '', 50, '', 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";a:1:{i:0;s:32:\"81vgbokmqkl-_aa1402_-500x500.jpg\";}s:14:\"equipment_type\";a:1:{i:0;s:6:\"Camera\";}s:12:\"equipmentqty\";a:1:{i:0;s:1:\"1\";}}', '', '', '', 'Pending'),
(38, 1, '2021-08-06 13:39:31', 0, 7, 1, '2021-08-21 10:00:00', '2021-08-21 12:00:00', 'This is booking reason', 63, 'This is booking note', 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";s:0:\"\";s:14:\"equipment_type\";s:0:\"\";s:12:\"equipmentqty\";s:0:\"\";}', '', '', '', 'Pending'),
(39, 1, '2021-08-06 13:41:18', 1, 7, 1, '2021-08-21 10:00:00', '2021-08-21 12:00:00', 'This is booking reason', 63, 'This is booking note', 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";s:0:\"\";s:14:\"equipment_type\";s:0:\"\";s:12:\"equipmentqty\";s:0:\"\";}', '', '', '', 'Pending'),
(40, 1, '2021-08-06 13:42:11', 1, 7, 1, '2021-08-21 10:00:00', '2021-08-21 12:00:00', 'This is booking reason', 63, 'This is booking note', 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";s:0:\"\";s:14:\"equipment_type\";s:0:\"\";s:12:\"equipmentqty\";s:0:\"\";}', '', '', '', 'Pending'),
(41, 1, '2021-08-06 13:42:55', 1, 7, 1, '2021-08-21 10:00:00', '2021-08-21 12:00:00', 'This is booking reason', 63, 'This is booking note', 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";s:0:\"\";s:14:\"equipment_type\";s:0:\"\";s:12:\"equipmentqty\";s:0:\"\";}', '', '', '', 'Pending'),
(42, 1, '2021-08-06 13:43:53', 1, 7, 1, '2021-08-21 10:00:00', '2021-08-21 12:00:00', 'This is booking reason', 63, 'This is booking note', 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";s:0:\"\";s:14:\"equipment_type\";s:0:\"\";s:12:\"equipmentqty\";s:0:\"\";}', '', '', '', 'Pending'),
(43, 1, '2021-08-06 13:44:46', 1, 7, 1, '2021-08-21 10:00:00', '2021-08-21 12:00:00', 'This is booking reason', 63, 'This is booking note', 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";s:0:\"\";s:14:\"equipment_type\";s:0:\"\";s:12:\"equipmentqty\";s:0:\"\";}', '', '', '', 'Pending'),
(44, 1, '2021-08-06 13:47:59', 1, 7, 1, '2021-08-21 10:00:00', '2021-08-21 12:00:00', 'This is booking reason', 63, 'This is booking note', 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";s:0:\"\";s:14:\"equipment_type\";s:0:\"\";s:12:\"equipmentqty\";s:0:\"\";}', '', '', '', 'Pending'),
(45, 1, '2021-08-06 13:49:52', 1, 7, 1, '2021-08-21 10:00:00', '2021-08-21 12:00:00', 'This is booking reason', 63, 'This is booking note', 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";s:0:\"\";s:14:\"equipment_type\";s:0:\"\";s:12:\"equipmentqty\";s:0:\"\";}', '', '', '', 'Pending'),
(46, 1, '2021-08-06 13:50:24', 1, 7, 1, '2021-08-21 10:00:00', '2021-08-21 12:00:00', 'This is booking reason', 63, 'This is booking note', 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";s:0:\"\";s:14:\"equipment_type\";s:0:\"\";s:12:\"equipmentqty\";s:0:\"\";}', '', '', '', 'Pending'),
(47, 1, '2021-08-06 13:51:22', 1, 7, 1, '2021-08-21 10:00:00', '2021-08-21 12:00:00', 'Booking For Function', 66, 'Booking for Function event', 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";a:2:{i:0;s:32:\"81vgbokmqkl-_aa1402_-500x500.jpg\";i:1;s:42:\"152016671581vgbokmqkl-_aa1402_-500x500.jpg\";}s:14:\"equipment_type\";a:2:{i:0;s:6:\"Camera\";i:1;s:5:\"Table\";}s:12:\"equipmentqty\";a:2:{i:0;s:1:\"1\";i:1;s:1:\"2\";}}', 'Rejectedbec of covid', '', '', 'Rejected'),
(48, 1, '2021-08-13 11:12:11', 1, 8, 0, '2021-08-21 10:00:00', '2021-08-21 12:00:00', 'Hi', 50, 'Helo', 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";a:2:{i:0;s:32:\"81vgbokmqkl-_aa1402_-500x500.jpg\";i:1;s:42:\"152016671581vgbokmqkl-_aa1402_-500x500.jpg\";}s:14:\"equipment_type\";a:2:{i:0;s:6:\"Camera\";i:1;s:5:\"Table\";}s:12:\"equipmentqty\";a:2:{i:0;s:1:\"1\";i:1;s:1:\"2\";}}', '', '', '', 'Pending'),
(49, 1, '2021-08-13 11:14:14', 1, 8, 2, '2021-08-21 10:00:00', '2021-08-21 12:00:00', 'For Booking reason', 50, 'For Note<br><b>Reason for Cancellation:</b></br>No staffs available to arrange the events.', 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";a:3:{i:0;s:32:\"81vgbokmqkl-_aa1402_-500x500.jpg\";i:1;s:42:\"152016671581vgbokmqkl-_aa1402_-500x500.jpg\";i:2;s:41:\"50434788081vgbokmqkl-_aa1402_-500x500.jpg\";}s:14:\"equipment_type\";a:3:{i:0;s:6:\"Camera\";i:1;s:5:\"Table\";i:2;s:6:\"Chairs\";}s:12:\"equipmentqty\";a:3:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:2:\"25\";}}', '', '', '', 'Cancelled'),
(50, 1, '2021-08-13 11:20:57', 1, 8, 2, '2021-08-21 10:00:00', '2021-08-21 12:00:00', 'For Booking reason', 50, 'For Note', 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";a:3:{i:0;s:32:\"81vgbokmqkl-_aa1402_-500x500.jpg\";i:1;s:42:\"152016671581vgbokmqkl-_aa1402_-500x500.jpg\";i:2;s:41:\"50434788081vgbokmqkl-_aa1402_-500x500.jpg\";}s:14:\"equipment_type\";a:3:{i:0;s:6:\"Camera\";i:1;s:5:\"Table\";i:2;s:6:\"Chairs\";}s:12:\"equipmentqty\";a:3:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:2:\"44\";}}', 'test', '', '', 'Rejected'),
(51, 1, '2021-08-13 12:15:32', 1, 8, 0, '2021-08-21 10:00:00', '2021-08-21 12:00:00', 'Booki my hall', 50, 'No notes<br><b>Reason for Cancellation:</b></br>Not interested<br><b>Reason for Cancellation:</b></br>Not interested<br><b>Reason for Cancellation:</b></br>Not interested', 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";a:3:{i:0;s:32:\"81vgbokmqkl-_aa1402_-500x500.jpg\";i:1;s:42:\"152016671581vgbokmqkl-_aa1402_-500x500.jpg\";i:2;s:41:\"50434788081vgbokmqkl-_aa1402_-500x500.jpg\";}s:14:\"equipment_type\";a:3:{i:0;s:6:\"Camera\";i:1;s:5:\"Table\";i:2;s:6:\"Chairs\";}s:12:\"equipmentqty\";a:3:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:2:\"55\";}}', 'Hi how are you', '', '', 'Cancelled'),
(53, 1, '2021-08-29 12:11:14', 1, 8, 2, '2021-08-31 09:30:00', '2021-08-31 11:30:00', 'For Booking', 50, 'new note', 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";s:0:\"\";s:14:\"equipment_type\";s:0:\"\";s:12:\"equipmentqty\";s:0:\"\";}', '', '', '', 'Approved'),
(54, 1, '2021-08-29 12:25:25', 1, 8, 2, '2021-08-31 09:30:00', '2021-08-31 11:30:00', 'For Booking', 50, 'new note', 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";s:0:\"\";s:14:\"equipment_type\";s:0:\"\";s:12:\"equipmentqty\";s:0:\"\";}', '', '', '', 'Pending'),
(55, 1, '2021-08-29 12:27:26', 1, 8, 2, '2021-08-31 09:30:00', '2021-08-31 11:30:00', 'For Booking', 50, 'new note', 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";s:0:\"\";s:14:\"equipment_type\";s:0:\"\";s:12:\"equipmentqty\";s:0:\"\";}', '', '', '', 'Pending'),
(56, 1, '2021-08-29 12:27:32', 1, 8, 2, '2021-08-31 09:30:00', '2021-08-31 11:30:00', 'For Booking', 50, 'new note', 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";s:0:\"\";s:14:\"equipment_type\";s:0:\"\";s:12:\"equipmentqty\";s:0:\"\";}', '', '', '', 'Pending'),
(57, 1, '2021-08-29 12:27:34', 1, 8, 2, '2021-08-31 09:30:00', '2021-08-31 11:30:00', 'For Booking', 50, 'new note', 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";s:0:\"\";s:14:\"equipment_type\";s:0:\"\";s:12:\"equipmentqty\";s:0:\"\";}', '', '', '', 'Pending'),
(58, 1, '2021-08-29 12:28:27', 1, 8, 1, '2021-09-01 13:00:00', '2021-09-01 14:00:00', 'test', 50, 'abc', 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";a:1:{i:0;s:32:\"81vgbokmqkl-_aa1402_-500x500.jpg\";}s:14:\"equipment_type\";a:1:{i:0;s:6:\"Camera\";}s:12:\"equipmentqty\";a:1:{i:0;s:1:\"1\";}}', '', '', '', 'Approved'),
(59, 1, '2021-08-29 12:29:12', 1, 8, 2, '2021-09-05 13:30:00', '2021-09-05 15:30:00', 'Test abookiu', 50, 'test', 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";s:0:\"\";s:14:\"equipment_type\";s:0:\"\";s:12:\"equipmentqty\";s:0:\"\";}', '', '', '', 'Approved'),
(61, 1, '2021-08-29 12:30:43', 1, 8, 2, '2021-08-31 13:00:00', '2021-08-31 14:00:00', 'tes', 50, 'abcd', 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";s:0:\"\";s:14:\"equipment_type\";s:0:\"\";s:12:\"equipmentqty\";s:0:\"\";}', '', '', '', 'Approved'),
(66, 2, '2021-08-29 12:35:52', 1, 8, 2, '2021-08-31 17:00:00', '2021-08-31 18:00:00', 'Thanks you Booking', 100, 'Thank noe', 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";s:0:\"\";s:14:\"equipment_type\";s:0:\"\";s:12:\"equipmentqty\";s:0:\"\";}', '', '', '', 'Approved'),
(67, 1, '2021-08-29 12:37:28', 1, 8, 2, '2021-09-03 02:30:00', '2021-09-03 04:30:00', 'My Booking', 50, 'My Booking note', 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";s:0:\"\";s:14:\"equipment_type\";s:0:\"\";s:12:\"equipmentqty\";s:0:\"\";}', '', '', '', 'Approved'),
(68, 1, '2021-08-29 12:46:57', 1, 8, 2, '2021-08-31 03:30:00', '2021-08-31 05:30:00', 'Hleoo', 70, 'atex', 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";s:0:\"\";s:14:\"equipment_type\";s:0:\"\";s:12:\"equipmentqty\";s:0:\"\";}', '', '', '', 'Approved'),
(69, 1, '2021-08-29 15:54:24', 1, 8, 1, '2021-09-02 14:00:00', '2021-09-02 18:00:00', 'Hi my event', 50, 'Hello', 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";s:0:\"\";s:14:\"equipment_type\";s:0:\"\";s:12:\"equipmentqty\";s:0:\"\";}', '', '', '', 'Approved'),
(70, 1, '2021-08-30 00:37:55', 4, 4, 2, '2021-09-02 06:30:00', '2021-09-02 09:00:00', 'Watching Movie', 75, 'Watching Movie Note', 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";s:0:\"\";s:14:\"equipment_type\";s:0:\"\";s:12:\"equipmentqty\";s:0:\"\";}', '', '', '', 'Approved'),
(71, 1, '2021-08-30 00:41:59', 4, 4, 2, '2021-09-04 08:00:00', '2021-09-04 12:00:00', 'Titanic Movie', 75, 'Titanic Movie add', 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";a:2:{i:0;s:32:\"81vgbokmqkl-_aa1402_-500x500.jpg\";i:1;s:42:\"152016671581vgbokmqkl-_aa1402_-500x500.jpg\";}s:14:\"equipment_type\";a:2:{i:0;s:6:\"Camera\";i:1;s:5:\"Table\";}s:12:\"equipmentqty\";a:2:{i:0;s:1:\"1\";i:1;s:1:\"2\";}}', 'Thanks', '', '', 'Approved'),
(72, 1, '2021-09-01 12:17:40', 1, 1, 4, '2021-09-04 02:30:00', '2021-09-04 05:30:00', '', 50, 'aa', 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";s:0:\"\";s:14:\"equipment_type\";s:0:\"\";s:12:\"equipmentqty\";s:0:\"\";}', '', '', '', 'Pending'),
(73, 1, '2021-09-01 12:18:16', 1, 1, 2, '2021-09-03 13:30:00', '2021-09-03 16:00:00', '', 50, 'aaa', 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";s:0:\"\";s:14:\"equipment_type\";s:0:\"\";s:12:\"equipmentqty\";s:0:\"\";}', '', '', '', 'Approved'),
(74, 1, '2021-09-01 12:24:25', 1, 1, 5, '2021-09-02 02:00:00', '2021-09-02 04:30:00', '', 50, 'abc', 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";s:0:\"\";s:14:\"equipment_type\";s:0:\"\";s:12:\"equipmentqty\";s:0:\"\";}', '', '', '', 'Pending'),
(75, 2, '2021-09-02 14:51:34', 7, 8, 1, '2021-09-03 13:30:00', '2021-09-03 17:00:00', 'Indian army', 100, '', 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";a:1:{i:0;s:32:\"81vgbokmqkl-_aa1402_-500x500.jpg\";}s:14:\"equipment_type\";a:1:{i:0;s:6:\"Camera\";}s:12:\"equipmentqty\";a:1:{i:0;s:1:\"1\";}}', '', '', '', 'Pending'),
(76, 1, '2021-09-04 00:21:07', 0, 1, 2, '2021-09-05 05:00:00', '2021-09-05 07:00:00', 'Test Book', 50, 'Test Note', 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";s:0:\"\";s:14:\"equipment_type\";s:0:\"\";s:12:\"equipmentqty\";s:0:\"\";}', 'test', '', '', 'Approved'),
(77, 1, '2021-09-04 00:25:27', 2, 1, 2, '2021-09-10 02:00:00', '2021-09-10 05:00:00', 'Function', 50, 'Function', 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";s:0:\"\";s:14:\"equipment_type\";s:0:\"\";s:12:\"equipmentqty\";s:0:\"\";}', 'test', '', '', 'Approved'),
(78, 1, '2021-09-03 02:48:13', 2, 2, 2, '2021-09-12 01:00:00', '2021-09-12 02:00:00', 'ABCD', 50, '123', 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";s:0:\"\";s:14:\"equipment_type\";s:0:\"\";s:12:\"equipmentqty\";s:0:\"\";}', 'Hello', '', '', 'Cancelled'),
(79, 1, '2021-09-03 02:49:19', 2, 2, 2, '2021-09-12 03:00:00', '2021-09-12 04:00:00', 'xyz', 50, '456', 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";s:0:\"\";s:14:\"equipment_type\";s:0:\"\";s:12:\"equipmentqty\";s:0:\"\";}', 'test me', '', '', 'Cancelled'),
(80, 1, '2021-09-03 02:50:07', 2, 2, 5, '2021-09-12 05:00:00', '2021-09-12 06:00:00', 'lmn', 50, '678', 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";s:0:\"\";s:14:\"equipment_type\";s:0:\"\";s:12:\"equipmentqty\";s:0:\"\";}', 'test me', '', '', 'Cancelled'),
(81, 0, '2021-10-10 12:28:13', 1, 4, 0, '2021-09-10 17:28:59', '2021-09-10 17:29:05', '', 0, '', 'a:4:{s:12:\"equipment_id\";N;s:3:\"img\";N;s:14:\"equipment_type\";N;s:12:\"equipmentqty\";N;}', '', '', '', 'Pending'),
(82, 0, '2021-09-10 12:29:28', 1, 4, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, '', 'a:4:{s:12:\"equipment_id\";N;s:3:\"img\";N;s:14:\"equipment_type\";N;s:12:\"equipmentqty\";N;}', '', '', '', 'Pending'),
(83, 0, '2021-09-10 12:35:39', 1, 4, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, '', 'a:4:{s:12:\"equipment_id\";N;s:3:\"img\";N;s:14:\"equipment_type\";N;s:12:\"equipmentqty\";N;}', '', '', '', 'Pending'),
(84, 1, '2021-09-10 13:50:58', 1, 4, 4, '2021-09-12 02:30:00', '2021-09-12 06:30:00', 'Hello for hall booking', 29, 'Hello for hall booking note', 'a:4:{s:12:\"equipment_id\";N;s:3:\"img\";a:3:{i:0;s:32:\"81vgbokmqkl-_aa1402_-500x500.jpg\";i:1;s:22:\"496390495hdmicable.jpg\";i:2;s:21:\"112719236pendrive.jpg\";}s:14:\"equipment_type\";a:3:{i:0;s:6:\"Camera\";i:1;s:10:\"HDMI Cable\";i:2;s:8:\"Pendrive\";}s:12:\"equipmentqty\";a:3:{i:0;s:1:\"1\";i:1;s:1:\"1\";i:2;s:1:\"2\";}}', '', '', '', 'Pending'),
(85, 1, '2021-09-10 13:51:43', 1, 4, 4, '2021-09-12 02:30:00', '2021-09-12 06:30:00', 'Hello for hall booking', 29, 'Hello for hall booking note', 'a:4:{s:12:\"equipment_id\";N;s:3:\"img\";a:3:{i:0;s:32:\"81vgbokmqkl-_aa1402_-500x500.jpg\";i:1;s:22:\"496390495hdmicable.jpg\";i:2;s:21:\"112719236pendrive.jpg\";}s:14:\"equipment_type\";a:3:{i:0;s:6:\"Camera\";i:1;s:10:\"HDMI Cable\";i:2;s:8:\"Pendrive\";}s:12:\"equipmentqty\";a:3:{i:0;s:1:\"1\";i:1;s:1:\"1\";i:2;s:1:\"2\";}}', '', '', '', 'Pending'),
(86, 1, '2021-09-10 13:59:48', 1, 4, 4, '2021-09-12 02:30:00', '2021-09-12 06:30:00', 'Hello for hall booking', 29, 'Hello for hall booking note', 'a:4:{s:12:\"equipment_id\";N;s:3:\"img\";a:3:{i:0;s:32:\"81vgbokmqkl-_aa1402_-500x500.jpg\";i:1;s:22:\"496390495hdmicable.jpg\";i:2;s:21:\"112719236pendrive.jpg\";}s:14:\"equipment_type\";a:3:{i:0;s:6:\"Camera\";i:1;s:10:\"HDMI Cable\";i:2;s:8:\"Pendrive\";}s:12:\"equipmentqty\";a:3:{i:0;s:1:\"1\";i:1;s:1:\"1\";i:2;s:1:\"2\";}}', 'Hello', '', '', 'Approved'),
(87, 1, '2021-09-10 14:05:51', 2, 1, 2, '2021-09-14 01:00:00', '2021-09-14 03:00:00', 'WEB', 50, 'WEBNOTE', 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";a:2:{i:0;s:32:\"81vgbokmqkl-_aa1402_-500x500.jpg\";i:1;s:22:\"496390495hdmicable.jpg\";}s:14:\"equipment_type\";a:2:{i:0;s:6:\"Camera\";i:1;s:10:\"HDMI Cable\";}s:12:\"equipmentqty\";a:2:{i:0;s:1:\"1\";i:1;s:1:\"1\";}}', 'HI', '', '', 'Inactive'),
(88, 1, '2021-09-10 14:08:15', 1, 4, 2, '2021-09-14 01:00:00', '2021-09-14 03:30:00', 'test abcd', 50, 'test note', 'a:4:{s:12:\"equipment_id\";N;s:3:\"img\";a:1:{i:0;s:32:\"81vgbokmqkl-_aa1402_-500x500.jpg\";}s:14:\"equipment_type\";a:1:{i:0;s:6:\"Camera\";}s:12:\"equipmentqty\";a:1:{i:0;s:1:\"1\";}}', '', '', '', 'Inactive'),
(90, 1, '2021-09-10 14:53:50', 1, 4, 1, '2021-09-12 00:30:00', '2021-09-12 07:00:00', 'welcome', 50, 'thanks', 'a:4:{s:12:\"equipment_id\";N;s:3:\"img\";a:1:{i:0;s:32:\"81vgbokmqkl-_aa1402_-500x500.jpg\";}s:14:\"equipment_type\";a:1:{i:0;s:6:\"Camera\";}s:12:\"equipmentqty\";a:1:{i:0;s:1:\"1\";}}', 'Hello', '', '', 'Rejected'),
(91, 1, '2021-09-10 15:00:42', 1, 4, 2, '2021-09-12 00:30:00', '2021-09-12 02:00:00', 'Tahnks', 50, 'Welcome', 'a:4:{s:12:\"equipment_id\";N;s:3:\"img\";a:1:{i:0;s:22:\"496390495hdmicable.jpg\";}s:14:\"equipment_type\";a:1:{i:0;s:10:\"HDMI Cable\";}s:12:\"equipmentqty\";a:1:{i:0;s:1:\"1\";}}', '', '', '', 'Inactive'),
(92, 1, '2021-09-17 10:38:52', 5, 6, 1, '2021-09-18 10:00:00', '2021-09-18 13:00:00', 'Thank you', 50, 'Hello', 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";s:0:\"\";s:14:\"equipment_type\";s:0:\"\";s:12:\"equipmentqty\";s:0:\"\";}', 'Thank you for booking', '', '', 'Approved'),
(93, 1, '2021-09-17 10:55:17', 2, 1, 0, '2021-09-18 09:30:00', '2021-09-18 13:30:00', 'Welcome', 50, 'Hi', 'a:4:{s:12:\"equipment_id\";N;s:3:\"img\";a:1:{i:0;s:32:\"81vgbokmqkl-_aa1402_-500x500.jpg\";}s:14:\"equipment_type\";a:1:{i:0;s:6:\"Camera\";}s:12:\"equipmentqty\";a:1:{i:0;s:2:\"10\";}}', '', '', '', 'Inactive'),
(94, 1, '2021-09-17 10:56:18', 2, 1, 0, '2021-09-18 10:00:00', '2021-09-18 13:30:00', '', 50, '', 'a:4:{s:12:\"equipment_id\";N;s:3:\"img\";N;s:14:\"equipment_type\";N;s:12:\"equipmentqty\";N;}', '', '', '', 'Inactive'),
(95, 1, '2021-09-17 10:59:06', 2, 1, 4, '2021-09-18 09:30:00', '2021-09-18 13:30:00', 'Hello', 50, 'How are you', 'a:4:{s:12:\"equipment_id\";N;s:3:\"img\";a:1:{i:0;s:22:\"496390495hdmicable.jpg\";}s:14:\"equipment_type\";a:1:{i:0;s:10:\"HDMI Cable\";}s:12:\"equipmentqty\";a:1:{i:0;s:1:\"1\";}}', '', '', '', 'Inactive'),
(96, 1, '2021-09-17 11:00:24', 2, 1, 4, '2021-09-18 09:30:00', '2021-09-18 13:30:00', 'Hello', 50, 'How are you', 'a:4:{s:12:\"equipment_id\";N;s:3:\"img\";a:1:{i:0;s:22:\"496390495hdmicable.jpg\";}s:14:\"equipment_type\";a:1:{i:0;s:10:\"HDMI Cable\";}s:12:\"equipmentqty\";a:1:{i:0;s:1:\"1\";}}', '', '', '', 'Inactive'),
(99, 1, '2021-09-17 11:12:34', 7, 8, 2, '2021-09-18 14:00:00', '2021-09-18 16:00:00', 'For celebration', 50, 'celebration day', 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";a:1:{i:0;s:32:\"81vgbokmqkl-_aa1402_-500x500.jpg\";}s:14:\"equipment_type\";a:1:{i:0;s:6:\"Camera\";}s:12:\"equipmentqty\";a:1:{i:0;s:1:\"1\";}}', 'Thanks for booking', '', '', 'Approved'),
(101, 1, '2021-09-17 11:25:48', 2, 1, 2, '2021-09-18 10:00:00', '2021-09-18 16:30:00', 'Test Test', 50, 'test abc', 'a:4:{s:12:\"equipment_id\";N;s:3:\"img\";a:1:{i:0;s:22:\"496390495hdmicable.jpg\";}s:14:\"equipment_type\";a:1:{i:0;s:10:\"HDMI Cable\";}s:12:\"equipmentqty\";a:1:{i:0;s:1:\"1\";}}', '', '', '', 'Inactive'),
(102, 1, '2021-09-24 11:42:14', 1, 4, 1, '2021-09-25 11:00:00', '2021-09-25 12:00:00', 'Hello', 63, 'Test Hello', 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";a:2:{i:0;s:32:\"81vgbokmqkl-_aa1402_-500x500.jpg\";i:1;s:22:\"496390495hdmicable.jpg\";}s:14:\"equipment_type\";a:2:{i:0;s:6:\"Camera\";i:1;s:10:\"HDMI Cable\";}s:12:\"equipmentqty\";a:2:{i:0;s:1:\"1\";i:1;s:1:\"1\";}}', 'Thank you', '', '', 'Cancelled'),
(103, 1, '2021-09-24 11:47:56', 3, 3, 2, '2021-09-25 10:30:00', '2021-09-25 12:30:00', 'This is change request booking', 50, 'chreg', 'a:4:{s:12:\"equipment_id\";N;s:3:\"img\";a:1:{i:0;s:32:\"81vgbokmqkl-_aa1402_-500x500.jpg\";}s:14:\"equipment_type\";a:1:{i:0;s:6:\"Camera\";}s:12:\"equipmentqty\";a:1:{i:0;s:1:\"1\";}}', '', '', '', 'Inactive'),
(104, 1, '2021-09-24 12:02:28', 1, 4, 2, '2021-09-27 17:00:00', '2021-09-27 19:00:00', 'etst', 50, 'abc', 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";s:0:\"\";s:14:\"equipment_type\";s:0:\"\";s:12:\"equipmentqty\";s:0:\"\";}', '', '', '', 'Pending'),
(105, 1, '2021-09-24 12:04:11', 1, 4, 1, '2021-10-02 14:00:00', '2021-10-02 17:00:00', 'Hello', 50, 'Test', 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";s:0:\"\";s:14:\"equipment_type\";s:0:\"\";s:12:\"equipmentqty\";s:0:\"\";}', 'hh', '', '', 'Cancelled'),
(106, 1, '2021-09-24 12:05:20', 3, 3, 2, '2021-10-02 13:30:00', '2021-10-02 17:30:00', 'tttt', 50, 'aaa', 'a:4:{s:12:\"equipment_id\";N;s:3:\"img\";N;s:14:\"equipment_type\";N;s:12:\"equipmentqty\";N;}', '', '', '', 'Pending'),
(107, 1, '2021-09-24 12:26:15', 1, 4, 2, '2021-10-04 11:00:00', '2021-10-04 13:00:00', 'Hi', 50, 'Hi', 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";s:0:\"\";s:14:\"equipment_type\";s:0:\"\";s:12:\"equipmentqty\";s:0:\"\";}', '', '', '', 'Approved'),
(108, 1, '2021-09-24 12:27:47', 3, 3, 4, '2021-10-04 10:00:00', '2021-10-04 14:30:00', 'yaayyaay', 50, 'abc', 'a:4:{s:12:\"equipment_id\";N;s:3:\"img\";N;s:14:\"equipment_type\";N;s:12:\"equipmentqty\";N;}', '', '', '', 'Rejected'),
(109, 1, '2021-09-24 12:37:03', 3, 3, 4, '2021-10-05 11:00:00', '2021-10-05 12:00:00', 'ioioio', 50, 'ioioio', 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";s:0:\"\";s:14:\"equipment_type\";s:0:\"\";s:12:\"equipmentqty\";s:0:\"\";}', 'Test Test me', '', '', 'Approved'),
(110, 1, '2021-09-24 12:37:56', 1, 4, 4, '2021-10-05 15:00:00', '2021-10-05 16:00:00', 'BiBiBi', 50, '', 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";s:0:\"\";s:14:\"equipment_type\";s:0:\"\";s:12:\"equipmentqty\";s:0:\"\";}', 'Test Test me', '', '', 'Approved'),
(113, 1, '2021-09-24 13:03:21', 3, 3, 0, '2021-10-04 10:30:00', '2021-10-04 13:30:00', 'Test', 50, 'Test', 'a:4:{s:12:\"equipment_id\";N;s:3:\"img\";N;s:14:\"equipment_type\";N;s:12:\"equipmentqty\";N;}', '', '', '', 'Inactive'),
(114, 1, '2021-09-24 13:03:53', 3, 3, 0, '2021-10-04 10:30:00', '2021-10-04 13:30:00', 'Test', 50, 'Test', 'a:4:{s:12:\"equipment_id\";N;s:3:\"img\";N;s:14:\"equipment_type\";N;s:12:\"equipmentqty\";N;}', '', '', '', 'Inactive'),
(115, 1, '2021-09-24 13:04:39', 3, 3, 0, '2021-10-04 10:30:00', '2021-10-04 13:30:00', 'Test', 50, 'Test', 'a:4:{s:12:\"equipment_id\";N;s:3:\"img\";N;s:14:\"equipment_type\";N;s:12:\"equipmentqty\";N;}', '', '', '', 'Inactive'),
(116, 1, '2021-09-24 13:05:45', 3, 3, 0, '2021-10-04 10:30:00', '2021-10-04 13:30:00', 'Test', 50, 'Test', 'a:4:{s:12:\"equipment_id\";N;s:3:\"img\";N;s:14:\"equipment_type\";N;s:12:\"equipmentqty\";N;}', '', '', '', 'Inactive'),
(117, 1, '2021-09-24 13:10:01', 3, 3, 0, '2021-10-04 10:30:00', '2021-10-04 13:30:00', 'Test', 50, 'Test', 'a:4:{s:12:\"equipment_id\";N;s:3:\"img\";N;s:14:\"equipment_type\";N;s:12:\"equipmentqty\";N;}', '', '', '', 'Inactive'),
(118, 1, '2021-09-24 13:10:28', 3, 3, 0, '2021-10-04 10:30:00', '2021-10-04 13:30:00', 'Test', 50, 'Test', 'a:4:{s:12:\"equipment_id\";N;s:3:\"img\";N;s:14:\"equipment_type\";N;s:12:\"equipmentqty\";N;}', '', '', '', 'Inactive'),
(119, 1, '2021-09-24 13:11:39', 3, 3, 0, '2021-10-04 10:30:00', '2021-10-04 13:30:00', 'Test', 50, 'Test', 'a:4:{s:12:\"equipment_id\";N;s:3:\"img\";N;s:14:\"equipment_type\";N;s:12:\"equipmentqty\";N;}', '', '', '', 'Inactive'),
(120, 1, '2021-09-24 13:12:54', 3, 3, 2, '2021-10-04 11:00:00', '2021-10-04 14:00:00', 'TEchTEch', 50, 'TEchTEch', 'a:4:{s:12:\"equipment_id\";N;s:3:\"img\";N;s:14:\"equipment_type\";N;s:12:\"equipmentqty\";N;}', '', '', '', 'Inactive'),
(121, 1, '2021-09-24 13:14:10', 2, 1, 4, '2021-10-05 10:00:00', '2021-10-05 16:30:00', 'Thank youThank you', 50, 'Thank youThank you', 'a:4:{s:12:\"equipment_id\";N;s:3:\"img\";N;s:14:\"equipment_type\";N;s:12:\"equipmentqty\";N;}', 'Test Test me', '', '', 'Rejected');

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `hotel_id` int(11) NOT NULL,
  `hotel_name` varchar(25) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `ph_no` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `hotel_image` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`hotel_id`, `hotel_name`, `email_id`, `ph_no`, `password`, `hotel_image`, `status`) VALUES
(1, 'SDM college canteen', 'aravinda@technopulse.in', '8192322282', '6d663575733b6d51ef5eb055e625a8ed', '', 'Active'),
(2, 'Disha Food Corner', 'dishafoodcorner@gmail.com', '9449309774', 'ad73d02be16cfe12c24bbb31bf66fe39', '', 'Active'),
(3, 'Swapna ', 'swapna123@gmail.com', '9972077344', '982c7036a5180e3a8de48705af87dc79', '', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staffid` bigint(20) NOT NULL,
  `department_id` bigint(20) NOT NULL,
  `staffname` varchar(30) NOT NULL,
  `emailid` varchar(100) NOT NULL,
  `password` varchar(300) NOT NULL,
  `phno` varchar(15) NOT NULL,
  `profile_img` varchar(300) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staffid`, `department_id`, `staffname`, `emailid`, `password`, `phno`, `profile_img`, `status`) VALUES
(1, 2, 'Pavithra Jain', 'begumfahmida083@gmail.com', 'd614e909cd8c85e89c46f5d5144cec78', '9535542123', '21327430712.jpg', 'Active'),
(2, 2, 'Shalip Kumari', 'shalipkumari@gmail.com', '1eaa68c8c01d157b9b6ebc4d2200df7a', '9483352556', '227368726defaultimage.jpg', 'Active'),
(3, 3, 'Shailesh Kumar', 'technopulseshared@gmail.com', '703619ee8851d680f4d3b60cb9b3c27c', '9449309774', '16959389defaultimage.jpg', 'Active'),
(4, 1, 'Bhanuprakash BE', 'administrator@technopulse.in', 'fa6cc4ee50ed2405eebf9cf2f8f53ccd', '9480984044', '20422127381.jpg', 'Active'),
(6, 5, 'Bojamma KN', 'aravinda@technopulse.in', '7291440d9f9b57003b53e3a5289afbbe', '9448603024', '1176808358defaultimage.jpg', 'Active'),
(7, 6, 'Bhaskar Hegde', 'bhaskarhegde@gmail.com', 'd4ecc94a12f281787dffc8d25bf57945', '9449639744', '1823791804defaultimage.jpg', 'Active'),
(8, 7, 'Rashmi N', 'Rashmin@gmail.com', 'bc265c51bef7e8ad3f694a87feb13e54', '9972077344', '7625500484.jpg', 'Active'),
(11, 3, 'Akshatha', 'Akshatha@gmail.com', 'c12b5c83e758304fe5c63d9ba40a89c2', '9780984044', '1184899617', 'Not_verifi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`bill_id`);

--
-- Indexes for table `change_request`
--
ALTER TABLE `change_request`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `equipments`
--
ALTER TABLE `equipments`
  ADD PRIMARY KEY (`equipment_id`);

--
-- Indexes for table `eventtype`
--
ALTER TABLE `eventtype`
  ADD PRIMARY KEY (`eventtypeid`);

--
-- Indexes for table `food_item`
--
ALTER TABLE `food_item`
  ADD PRIMARY KEY (`food_item_id`);

--
-- Indexes for table `food_order`
--
ALTER TABLE `food_order`
  ADD PRIMARY KEY (`food_order_id`);

--
-- Indexes for table `hall`
--
ALTER TABLE `hall`
  ADD PRIMARY KEY (`hallid`);

--
-- Indexes for table `hall_booking`
--
ALTER TABLE `hall_booking`
  ADD PRIMARY KEY (`hall_booking_id`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`hotel_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staffid`),
  ADD UNIQUE KEY `emailid` (`emailid`),
  ADD UNIQUE KEY `phno` (`phno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `bill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `change_request`
--
ALTER TABLE `change_request`
  MODIFY `request_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `equipments`
--
ALTER TABLE `equipments`
  MODIFY `equipment_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `eventtype`
--
ALTER TABLE `eventtype`
  MODIFY `eventtypeid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `food_item`
--
ALTER TABLE `food_item`
  MODIFY `food_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `food_order`
--
ALTER TABLE `food_order`
  MODIFY `food_order_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `hall`
--
ALTER TABLE `hall`
  MODIFY `hallid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `hall_booking`
--
ALTER TABLE `hall_booking`
  MODIFY `hall_booking_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `hotel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staffid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
