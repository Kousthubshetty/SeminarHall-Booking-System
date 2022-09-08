-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 28, 2022 at 04:51 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

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
(3, 'Adithya', 'adithyahebbar32@gmail.com', 'bbca370fb649e876633dd6b282bdfb3c', 'Active'),
(5, 'Surendra jain', '1990Surendrajain@gmail.com', 'a2667ad9d715e5e740904b8ba8621367', 'Active'),
(6, 'Sandeep Kumar', 'SandeepaKumara928@gmail.com', 'c1595a3244889e3f2c61e9f5422675fd', 'Active'),
(8, 'prashanth', 'prashanth@gmail.com', 'c2da11b73b17d7e4e310d8a8d744a49c', 'Active'),
(9, 'Kousthub Shetty', 'kousthub@gmail.com', '9e733504e2fdaf20b87475403bd8ba17', 'Active');

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
(13, 138, 1, 2, '2021-09-30 10:15:00', 2100, 'Accepted'),
(14, 141, 2, 2, '2021-09-30 00:00:00', 82, 'Rejected'),
(15, 143, 2, 1, '2021-10-04 16:33:00', 62, 'Accepted'),
(16, 144, 3, 1, '2021-10-06 15:35:00', 65, 'Approved'),
(17, 146, 3, 1, '2021-10-05 14:41:00', 6565, 'Cancelled'),
(18, 147, 2, 1, '2021-10-04 12:01:00', 10000, 'Rejected'),
(19, 148, 1, 1, '2021-10-06 15:46:00', 7650, 'Rejected'),
(20, 149, 2, 4, '2021-10-05 16:56:00', 488, 'Accepted'),
(21, 150, 3, 4, '2021-10-04 17:58:00', 65, 'Rejected'),
(22, 151, 1, 4, '2021-10-06 00:00:00', 6000, 'Accepted'),
(23, 152, 2, 8, '2021-10-07 15:30:00', 22640, 'Accepted'),
(24, 153, 1, 8, '2021-10-04 17:26:00', 8500, 'Accepted'),
(25, 154, 2, 8, '2021-10-01 16:27:00', 70, 'Rejected'),
(26, 156, 2, 1, '2021-10-04 00:00:00', 4732, 'Accepted'),
(27, 163, 2, 2, '2021-10-08 18:35:00', 132, 'Accepted'),
(28, 163, 2, 2, '2021-10-08 18:35:00', 132, 'Rejected'),
(29, 164, 1, 3, '2021-10-04 09:30:00', 50, 'Rejected'),
(30, 165, 2, 3, '2021-10-05 13:30:00', 6000, 'Rejected'),
(31, 166, 1, 3, '2021-10-06 11:05:00', 360, 'Rejected'),
(32, 167, 1, 4, '2021-10-06 10:16:00', 90, 'Accepted'),
(33, 170, 2, 8, '2021-10-06 14:30:00', 213, 'Rejected'),
(34, 171, 2, 8, '2021-10-05 14:30:00', 22, 'Rejected'),
(35, 172, 1, 17, '2021-10-06 15:15:00', 30, 'Accepted'),
(36, 173, 2, 17, '2021-10-06 14:00:00', 12, 'Rejected'),
(37, 176, 1, 2, '2021-10-06 11:00:00', 2500, 'Rejected'),
(38, 177, 1, 1, '2021-10-06 11:00:00', 2500, 'Accepted'),
(39, 178, 2, 2, '2021-10-04 09:10:00', 4000, 'Rejected'),
(40, 179, 1, 2, '2021-10-05 09:15:00', 3360, 'Approved'),
(41, 189, 1, 1, '2021-10-07 10:30:00', 3600, 'Approved'),
(42, 190, 2, 4, '2021-10-07 09:20:00', 12000, 'Accepted'),
(43, 192, 2, 4, '2021-10-11 09:15:00', 22, 'Accepted'),
(44, 194, 1, 2, '2021-10-09 10:30:00', 25, 'Rejected'),
(45, 195, 2, 2, '2021-10-11 11:00:00', 30, 'Rejected'),
(46, 196, 1, 2, '2021-10-07 17:20:00', 25, 'Cancelled'),
(47, 197, 2, 1, '2021-10-09 11:55:00', 62, 'Approved'),
(48, 198, 1, 1, '2021-10-12 10:15:00', 725, 'Accepted'),
(49, 210, 2, 2, '2021-10-14 13:07:00', 210, 'Rejected'),
(50, 213, 2, 3, '2021-10-14 17:04:00', 372, 'Cancelled'),
(51, 214, 2, 1, '2022-03-01 22:59:00', 210, 'Approved');

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
(69, 153, 155, 1, 2, '2021-10-01 00:00:00', 'a:2:{s:15:\"hall_booking_id\";i:155;s:13:\"change_reason\";s:17:\"important meeting\";}', 'Approved'),
(70, 156, 157, 2, 2, '2021-10-01 00:00:00', 'a:2:{s:15:\"hall_booking_id\";i:157;s:13:\"change_reason\";s:40:\"I have a important meeting with students\";}', 'Approved'),
(71, 149, 158, 2, 2, '2021-10-01 00:00:00', 'a:2:{s:15:\"hall_booking_id\";i:158;s:13:\"change_reason\";s:17:\"important seminar\";}', 'Pending'),
(72, 152, 159, 1, 2, '2021-10-01 00:00:00', 'a:2:{s:15:\"hall_booking_id\";i:159;s:13:\"change_reason\";s:13:\"important ppt\";}', 'Pending'),
(73, 157, 161, 1, 2, '2021-10-01 00:00:00', 'a:2:{s:15:\"hall_booking_id\";i:161;s:13:\"change_reason\";s:17:\"Important meeting\";}', 'Approved'),
(74, 187, 199, 2, 2, '2021-10-03 00:00:00', 'a:2:{s:15:\"hall_booking_id\";i:199;s:13:\"change_reason\";s:34:\"important students teacher meeting\";}', 'Approved'),
(75, 177, 200, 2, 2, '2021-10-03 00:00:00', 'a:2:{s:15:\"hall_booking_id\";i:200;s:13:\"change_reason\";s:33:\"important student lecture meeting\";}', 'Rejected'),
(76, 163, 201, 1, 2, '2021-10-03 00:00:00', 'a:2:{s:15:\"hall_booking_id\";i:201;s:13:\"change_reason\";s:34:\"important parents teachers meeting\";}', 'Approved'),
(77, 169, 201, 1, 2, '2021-10-03 00:00:00', 'a:2:{s:15:\"hall_booking_id\";i:201;s:13:\"change_reason\";s:34:\"important parents teachers meeting\";}', 'Approved'),
(78, 174, 202, 1, 2, '2021-10-03 00:00:00', 'a:2:{s:15:\"hall_booking_id\";i:202;s:13:\"change_reason\";s:33:\"important parents teacher meeting\";}', 'Approved'),
(79, 190, 202, 1, 2, '2021-10-03 00:00:00', 'a:2:{s:15:\"hall_booking_id\";i:202;s:13:\"change_reason\";s:33:\"important parents teacher meeting\";}', 'Approved'),
(80, 203, 207, 2, 1, '2021-10-04 00:00:00', 'a:2:{s:15:\"hall_booking_id\";i:207;s:13:\"change_reason\";s:9:\"important\";}', 'Rejected'),
(81, 204, 207, 2, 1, '2021-10-04 00:00:00', 'a:2:{s:15:\"hall_booking_id\";i:207;s:13:\"change_reason\";s:9:\"important\";}', 'Rejected'),
(82, 205, 207, 2, 1, '2021-10-04 00:00:00', 'a:2:{s:15:\"hall_booking_id\";i:207;s:13:\"change_reason\";s:9:\"important\";}', 'Rejected'),
(83, 181, 208, 2, 1, '2021-10-04 00:00:00', 'a:2:{s:15:\"hall_booking_id\";i:208;s:13:\"change_reason\";s:31:\"Guest is available only on 7-10\";}', 'Approved'),
(84, 204, 211, 2, 1, '2021-10-05 00:00:00', 'a:2:{s:15:\"hall_booking_id\";i:211;s:13:\"change_reason\";s:35:\"Guest is only available on that dat\";}', 'Pending'),
(85, 197, 212, 2, 1, '2021-10-05 00:00:00', 'a:2:{s:15:\"hall_booking_id\";i:212;s:13:\"change_reason\";s:35:\"Guest is available only on that day\";}', 'Pending'),
(86, 203, 212, 2, 1, '2021-10-05 00:00:00', 'a:2:{s:15:\"hall_booking_id\";i:212;s:13:\"change_reason\";s:35:\"Guest is available only on that day\";}', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` bigint(20) NOT NULL,
  `department_name` varchar(100) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_name`, `status`) VALUES
(1, 'Department of English', 'Active'),
(2, 'Department of Political Science', 'Active'),
(3, 'Department of Computer Science', 'Active'),
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
(1, 'Camera', 'Nikon D3500. ', '2106703320camera.png', 1, 'Active'),
(2, 'HDMI Cable', 'BlueRigger High Speed HDMI Cable with Ethernet - Supports 3D, 4K 60Hz and Audio Return - Latest Version (3 Feet / 0.9 Meter)', '1343674442hdmiicon.jpg', 5, 'Active'),
(3, 'Laptop', 'Hp pavilion x360', '2060849638laptop.png', 1, 'Active'),
(5, 'Pendrive', 'Sandisk 32GB', '915319518pendrive.png', 4, 'Active'),
(7, 'Projector', 'Epson Home Cinema 2150.', '1655546985projector.png', 2, 'Active'),
(8, 'mike', 'A microphone, colloquially called a mic or mike (/maɪk/), is a device – a transducer – that converts sound into an electrical signal.', '10273182936.jpg', 4, 'Active');

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
(1, 'Power point presentation', 'pcw-ppt-primary-100787681-large.jpg', 'PPT presentation on subject topic.', 'Active'),
(2, 'Webinar', '1445553690webinar.jpeg', 'A webinar is an engaging online event where a speaker, or small group of speakers, deliver a presentation to a large audience who participate by submitting questions, responding to polls and using other available interactive tools', 'Active'),
(4, 'Leaders Meet', '956134576leadersmeet.jfif', 'Class Representative meeting.', 'Active'),
(5, 'Cultural Program', '1084642063WhatsApp Image 2021-09-28 at 7.43.54 PM (1).jpeg', '', 'Active'),
(6, 'Student lecture', '150176882WhatsApp Image 2021-09-28 at 7.43.53 PM (1).jpeg', 'Lecture given by students', 'Active'),
(9, 'seminar', '6413824354.jpg', 'a conference or other meeting for discussion or training.', 'Active'),
(10, 'Interclass competition', '6896784695.jpg', 'A main purpose of ICC is for classmates to bond together. The week long competition begins with cheer and mural judging and ends with a tug-of-war. During the other days the students compete in a variety of athletic and academic games.', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `food_item`
--

CREATE TABLE `food_item` (
  `food_item_id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `food_type` varchar(50) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `item_image` varchar(255) NOT NULL,
  `item_cost` bigint(20) NOT NULL,
  `item_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food_item`
--

INSERT INTO `food_item` (`food_item_id`, `hotel_id`, `food_type`, `item_name`, `item_image`, `item_cost`, `item_status`) VALUES
(1, 1, 'Breakfast', 'Dose', '557079049dosa-recipe-plain-dosa-recipe-sada-dosa-recipe-1-1024x769.jpeg', 25, 'Active'),
(2, 3, 'Breakfast', 'Masaldosa', '942351850Masala-Dosa-500x375.jpg', 35, 'Active'),
(3, 1, 'Breakfast', 'Pulao', '786698146pulao-recipe-500x500.jpg', 35, 'Active'),
(6, 2, 'Chats', 'Pizza', '1034766767pizza.jfif', 100, 'Inactive'),
(7, 2, 'Chats', 'GobiManchuri', '2005074985gobi.jfif', 40, 'Active'),
(8, 1, 'Breakfast', 'Golibaje', '410716114goli-baje-recipe-500x500.jpg', 25, 'Active'),
(9, 1, 'Breakfast', 'Vade', '1193534218garhwali-urad-vade-featured.jpg', 30, 'Active'),
(11, 2, 'Breakfast', 'Dose', '1764097621dosa-recipe-plain-dosa-recipe-sada-dosa-recipe-1-1024x769.jpeg', 30, 'Active'),
(12, 3, 'Chats', 'Biriyani', '417758533yot9zfocxiqxeghusxny.jpg', 120, 'Inactive'),
(14, 3, 'Breakfast', 'Golibaje', '1291577514maxresdefault.jpg', 30, 'Active'),
(15, 2, 'Lunch', 'curdrice', '1342697692maxresdefault-1.jpg', 40, 'Active'),
(16, 2, 'Chats', 'pani puri', '357677779pani puri.jfif', 60, 'Active'),
(18, 3, 'Chats', 'Noodles', '242330210veg-hakka-noodles-recipe-with-step-by-step-instructions.jpg', 120, 'Active'),
(19, 2, 'Breakfast', 'Idli', '1405084688download.jfif', 40, 'Inactive'),
(20, 2, 'Breakfast', 'Roti', '168918166roti.jfif', 12, 'Inactive'),
(21, 2, 'Juices and Milkshakes', 'Mango Milkshake ', '207001619mango.jfif', 22, 'Active'),
(22, 2, 'Juices and Milkshakes', 'Lime Soda', '125059031lime.jfif', 213, 'Active'),
(23, 1, 'Juices and Milkshakes', 'lime soda', '1627313428lime.jfif', 30, 'Active'),
(24, 1, 'Icecreams and Salads', 'Butter scotch', '946754483butterscotch.jfif', 30, 'Active'),
(25, 2, 'Icecreams and Salads', 'butterscotch', '925319147butterscotch.jfif', 30, 'Active'),
(26, 2, 'Juices and Milkshakes', 'venilla milkshake', '1868034137venilla m.jfif', 120, 'Active'),
(27, 3, 'Chats', 'pani puri', '1284759712pani puri.jfif', 50, 'Active'),
(28, 3, 'Juices and Milkshakes', 'venilla milkshake', '1308011708venilla m.jfif', 120, 'Active'),
(29, 3, 'Lunch', 'curd rice', '658506866curdrice.jfif', 60, 'Active'),
(30, 1, 'Juices and Milkshakes', 'mango milkshakes', '2121394614mango.jfif', 120, 'Active'),
(31, 1, 'Lunch', 'curd rice', '527615772curdrice.jfif', 50, 'Active'),
(32, 1, 'Chats', 'pani puri', '1215888813pani puri.jfif', 30, 'Active'),
(33, 1, 'Chats', 'pizza', '839226130pizza.jfif', 200, 'Active');

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
(20, 13, 23, 70, 30, 'Active'),
(21, 14, 11, 1, 30, 'Active'),
(22, 14, 19, 1, 40, 'Active'),
(23, 14, 20, 1, 12, 'Active'),
(24, 15, 19, 1, 40, 'Active'),
(25, 15, 21, 1, 22, 'Active'),
(26, 16, 2, 1, 35, 'Active'),
(27, 16, 14, 1, 30, 'Active'),
(28, 17, 2, 101, 35, 'Active'),
(29, 17, 14, 101, 30, 'Active'),
(30, 18, 11, 100, 30, 'Active'),
(31, 18, 19, 100, 40, 'Active'),
(32, 18, 25, 100, 30, 'Active'),
(33, 19, 1, 90, 25, 'Active'),
(34, 19, 3, 90, 35, 'Active'),
(35, 19, 8, 90, 25, 'Active'),
(36, 20, 19, 1, 40, 'Active'),
(37, 20, 21, 1, 22, 'Active'),
(38, 20, 22, 2, 213, 'Active'),
(39, 21, 2, 1, 35, 'Active'),
(40, 21, 14, 1, 30, 'Active'),
(41, 22, 3, 100, 35, 'Active'),
(42, 22, 8, 100, 25, 'Active'),
(43, 23, 11, 80, 30, 'Active'),
(44, 23, 19, 80, 40, 'Active'),
(45, 23, 22, 80, 213, 'Active'),
(46, 24, 1, 100, 25, 'Active'),
(47, 24, 3, 100, 35, 'Active'),
(48, 24, 8, 100, 25, 'Active'),
(49, 25, 19, 1, 40, 'Active'),
(50, 25, 11, 1, 30, 'Active'),
(51, 26, 11, 91, 30, 'Active'),
(52, 26, 21, 91, 22, 'Active'),
(53, 27, 11, 4, 30, 'Active'),
(54, 27, 20, 1, 12, 'Active'),
(55, 29, 31, 1, 50, 'Active'),
(56, 30, 25, 100, 30, 'Active'),
(57, 30, 11, 100, 30, 'Active'),
(58, 31, 30, 3, 120, 'Active'),
(59, 32, 23, 3, 30, 'Active'),
(60, 33, 22, 1, 213, 'Active'),
(61, 34, 21, 1, 22, 'Active'),
(62, 35, 23, 1, 30, 'Active'),
(63, 36, 20, 1, 12, 'Active'),
(64, 37, 1, 100, 25, 'Active'),
(65, 38, 1, 100, 25, 'Active'),
(66, 39, 19, 100, 40, 'Active'),
(67, 40, 3, 96, 35, 'Active'),
(68, 41, 23, 120, 30, 'Active'),
(69, 42, 26, 100, 120, 'Active'),
(70, 43, 21, 1, 22, 'Active'),
(71, 44, 1, 1, 25, 'Active'),
(72, 45, 11, 1, 30, 'Active'),
(73, 46, 1, 1, 25, 'Active'),
(74, 47, 21, 1, 22, 'Active'),
(75, 47, 19, 1, 40, 'Active'),
(76, 48, 1, 5, 25, 'Active'),
(77, 48, 30, 5, 120, 'Active'),
(83, 49, 19, 3, 40, 'Active'),
(84, 49, 11, 3, 30, 'Active'),
(85, 50, 11, 12, 30, 'Active'),
(86, 50, 20, 1, 12, 'Active'),
(87, 51, 25, 2, 30, 'Active'),
(88, 51, 11, 5, 30, 'Active');

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
(1, 'Samyakdarshana Hall', 'Samyakdarshana Hall', 100, '1465556717IMG-20210411-WA0021.jpg', 'Active'),
(2, 'AV hall', 'AV hall', 200, '1344695482IMG-20210411-WA0022.jpg', 'Active');

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
  `requirements` text NOT NULL,
  `admin_note` text NOT NULL,
  `event_description` text NOT NULL,
  `gallery` text NOT NULL,
  `status` varchar(10) NOT NULL,
  `presence_status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hall_booking`
--

INSERT INTO `hall_booking` (`hall_booking_id`, `hallid`, `booked_date`, `department_id`, `staffid`, `eventtypeid`, `booking_start_dt_tim`, `booking_end_dt_tim`, `booking_reason`, `total_strength`, `requirements`, `admin_note`, `event_description`, `gallery`, `status`, `presence_status`) VALUES
(138, 1, '2021-09-29 11:33:05', 2, 2, 1, '2021-09-30 10:00:00', '2021-09-25 11:00:00', 'seminar for students', 89, 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";a:3:{i:0;s:22:\"1343674442hdmiicon.jpg\";i:1;s:20:\"2060849638laptop.png\";i:2;s:23:\"1655546985projector.png\";}s:14:\"equipment_type\";a:3:{i:0;s:10:\"HDMI Cable\";i:1;s:6:\"Laptop\";i:2;s:9:\"Projector\";}s:12:\"equipmentqty\";a:3:{i:0;s:1:\"1\";i:1;s:1:\"1\";i:2;s:1:\"1\";}}', '', '', 'a:3:{i:0;s:12:\"DSC_0090.JPG\";i:1;s:12:\"DSC_1140.JPG\";i:2;s:12:\"DSC_1145.JPG\";}', 'Approved', 'Engaged'),
(139, 1, '2021-09-29 11:34:46', 2, 2, 2, '2021-10-01 09:30:00', '2021-10-01 10:30:00', 'alumni meet', 74, 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";a:3:{i:0;s:23:\"1655546985projector.png\";i:1;s:20:\"2060849638laptop.png\";i:2;s:22:\"1343674442hdmiicon.jpg\";}s:14:\"equipment_type\";a:3:{i:0;s:9:\"Projector\";i:1;s:6:\"Laptop\";i:2;s:10:\"HDMI Cable\";}s:12:\"equipmentqty\";a:3:{i:0;s:1:\"1\";i:1;s:1:\"1\";i:2;s:1:\"1\";}}', '', '', '', 'Cancelled', ''),
(140, 1, '2021-09-29 11:35:52', 2, 2, 4, '2021-10-01 15:00:00', '2021-10-01 16:00:00', 'meeting', 100, 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";a:1:{i:0;s:20:\"2106703320camera.png\";}s:14:\"equipment_type\";a:1:{i:0;s:6:\"Camera\";}s:12:\"equipmentqty\";a:1:{i:0;s:1:\"1\";}}', '', '', '', 'Rejected', ''),
(141, 1, '2021-09-29 12:28:58', 2, 2, 1, '2021-09-30 12:30:00', '2021-09-30 13:30:00', '', 100, 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";a:1:{i:0;s:20:\"2106703320camera.png\";}s:14:\"equipment_type\";a:1:{i:0;s:6:\"Camera\";}s:12:\"equipmentqty\";a:1:{i:0;s:1:\"1\";}}', '', '', '', 'Rejected', ''),
(146, 1, '2021-09-29 15:37:42', 2, 1, 2, '2021-10-05 13:00:00', '2021-10-05 14:00:00', 'guest lecture', 100, 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";a:2:{i:0;s:20:\"2106703320camera.png\";i:1;s:22:\"1343674442hdmiicon.jpg\";}s:14:\"equipment_type\";a:2:{i:0;s:6:\"Camera\";i:1;s:10:\"HDMI Cable\";}s:12:\"equipmentqty\";a:2:{i:0;s:1:\"1\";i:1;s:1:\"2\";}}', '', '', '', 'Cancelled', ''),
(147, 1, '2021-09-29 15:43:04', 2, 1, 4, '2021-10-04 11:00:00', '2021-10-04 12:30:00', 'student meeting', 100, 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";a:2:{i:0;s:20:\"2060849638laptop.png\";i:1;s:22:\"1343674442hdmiicon.jpg\";}s:14:\"equipment_type\";a:2:{i:0;s:6:\"Laptop\";i:1;s:10:\"HDMI Cable\";}s:12:\"equipmentqty\";a:2:{i:0;s:1:\"1\";i:1;s:1:\"3\";}}', '', '', 'a:3:{i:0;s:10:\"hall3.jfif\";i:1;s:10:\"hall2.jfif\";i:2;s:10:\"hall1.jfif\";}', 'Approved', 'Engaged'),
(148, 1, '2021-09-29 15:45:59', 2, 1, 5, '2021-10-06 13:00:00', '2021-10-06 14:30:00', 'dance compitation', 99, 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";a:2:{i:0;s:20:\"2106703320camera.png\";i:1;s:21:\"915319518pendrive.png\";}s:14:\"equipment_type\";a:2:{i:0;s:6:\"Camera\";i:1;s:8:\"Pendrive\";}s:12:\"equipmentqty\";a:2:{i:0;s:1:\"1\";i:1;s:1:\"2\";}}', '', '', '', 'Approved', ''),
(149, 1, '2021-09-29 15:54:48', 1, 4, 1, '2021-10-05 15:00:00', '2021-10-05 16:00:00', 'exam ppt', 98, 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";a:3:{i:0;s:21:\"915319518pendrive.png\";i:1;s:22:\"1343674442hdmiicon.jpg\";i:2;s:23:\"1655546985projector.png\";}s:14:\"equipment_type\";a:3:{i:0;s:8:\"Pendrive\";i:1;s:10:\"HDMI Cable\";i:2;s:9:\"Projector\";}s:12:\"equipmentqty\";a:3:{i:0;s:1:\"1\";i:1;s:1:\"1\";i:2;s:1:\"1\";}}', '', '', '', 'Approved', ''),
(150, 1, '2021-09-29 15:57:08', 1, 4, 1, '2021-10-04 14:00:00', '2021-10-04 15:30:00', 'class ppt', 89, 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";a:2:{i:0;s:22:\"1343674442hdmiicon.jpg\";i:1;s:20:\"2060849638laptop.png\";}s:14:\"equipment_type\";a:2:{i:0;s:10:\"HDMI Cable\";i:1;s:6:\"Laptop\";}s:12:\"equipmentqty\";a:2:{i:0;s:1:\"2\";i:1;s:1:\"1\";}}', '', '', '', 'Rejected', ''),
(152, 1, '2021-09-29 16:22:59', 7, 8, 5, '2021-10-07 14:00:00', '2021-10-07 15:00:00', 'dance compitation', 82, 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";a:3:{i:0;s:20:\"2060849638laptop.png\";i:1;s:21:\"915319518pendrive.png\";i:2;s:20:\"2106703320camera.png\";}s:14:\"equipment_type\";a:3:{i:0;s:6:\"Laptop\";i:1;s:8:\"Pendrive\";i:2;s:6:\"Camera\";}s:12:\"equipmentqty\";a:3:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"1\";}}', '', '', '', 'Approved', ''),
(153, 1, '2021-09-29 16:25:00', 7, 8, 2, '2021-10-04 16:00:00', '2021-10-04 17:00:00', 'guest lecture', 100, 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";a:2:{i:0;s:20:\"2106703320camera.png\";i:1;s:22:\"1343674442hdmiicon.jpg\";}s:14:\"equipment_type\";a:2:{i:0;s:6:\"Camera\";i:1;s:10:\"HDMI Cable\";}s:12:\"equipmentqty\";a:2:{i:0;s:1:\"1\";i:1;s:1:\"2\";}}', '', '', '', 'Cancelled', ''),
(154, 1, '2021-09-29 16:26:52', 7, 8, 1, '2021-10-01 15:00:00', '2021-10-01 16:00:00', 'class project', 100, 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";a:2:{i:0;s:20:\"2106703320camera.png\";i:1;s:23:\"1655546985projector.png\";}s:14:\"equipment_type\";a:2:{i:0;s:6:\"Camera\";i:1;s:9:\"Projector\";}s:12:\"equipmentqty\";a:2:{i:0;s:1:\"1\";i:1;s:1:\"1\";}}', '', '', '', 'Rejected', ''),
(155, 1, '2021-10-01 08:25:28', 2, 1, 2, '2021-10-04 16:00:00', '2021-10-04 17:00:00', 'guest lecture', 96, 'a:4:{s:12:\"equipment_id\";N;s:3:\"img\";a:2:{i:0;s:22:\"1343674442hdmiicon.jpg\";i:1;s:20:\"2060849638laptop.png\";}s:14:\"equipment_type\";a:2:{i:0;s:10:\"HDMI Cable\";i:1;s:6:\"Laptop\";}s:12:\"equipmentqty\";a:2:{i:0;s:1:\"2\";i:1;s:1:\"1\";}}', '', '', '', 'Approved', ''),
(156, 1, '2021-10-01 11:25:19', 2, 1, 4, '2021-10-04 14:00:00', '2021-10-04 15:00:00', 'leaders meeting', 90, 'a:4:{s:12:\"equipment_id\";N;s:3:\"img\";a:4:{i:0;s:20:\"2060849638laptop.png\";i:1;s:22:\"1343674442hdmiicon.jpg\";i:2;s:23:\"1655546985projector.png\";i:3;s:23:\"1655546985projector.png\";}s:14:\"equipment_type\";a:4:{i:0;s:6:\"Laptop\";i:1;s:10:\"HDMI Cable\";i:2;s:9:\"Projector\";i:3;s:0:\"\";}s:12:\"equipmentqty\";a:4:{i:0;s:1:\"1\";i:1;s:1:\"1\";i:2;s:1:\"1\";i:3;s:0:\"\";}}', '', '', '', 'Cancelled', ''),
(157, 1, '2021-10-01 11:33:10', 2, 2, 6, '2021-10-04 14:00:00', '2021-10-04 15:00:00', 'Important meeting', 100, 'a:4:{s:12:\"equipment_id\";N;s:3:\"img\";a:1:{i:0;s:20:\"2106703320camera.png\";}s:14:\"equipment_type\";a:1:{i:0;s:6:\"Camera\";}s:12:\"equipmentqty\";a:1:{i:0;s:1:\"1\";}}', '', '', '', 'Cancelled', ''),
(158, 1, '2021-10-01 11:54:44', 2, 2, 1, '2021-10-05 15:00:00', '2021-10-05 16:30:00', '', 100, 'a:4:{s:12:\"equipment_id\";N;s:3:\"img\";a:1:{i:0;s:20:\"2060849638laptop.png\";}s:14:\"equipment_type\";a:1:{i:0;s:6:\"Laptop\";}s:12:\"equipmentqty\";a:1:{i:0;s:1:\"1\";}}', '', '', '', 'Rejected', ''),
(159, 1, '2021-10-01 12:12:04', 2, 1, 1, '2021-10-07 14:00:00', '2021-10-07 15:00:00', 'important ppt', 100, 'a:4:{s:12:\"equipment_id\";N;s:3:\"img\";a:1:{i:0;s:20:\"2060849638laptop.png\";}s:14:\"equipment_type\";a:1:{i:0;s:6:\"Laptop\";}s:12:\"equipmentqty\";a:1:{i:0;s:1:\"1\";}}', '', '', '', 'Rejected', ''),
(160, 1, '2021-10-01 13:42:58', 2, 2, 5, '2021-10-06 16:30:00', '2021-10-06 18:00:00', 'Cultural program for students', 100, 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";a:2:{i:0;s:20:\"2060849638laptop.png\";i:1;s:22:\"1343674442hdmiicon.jpg\";}s:14:\"equipment_type\";a:2:{i:0;s:6:\"Laptop\";i:1;s:10:\"HDMI Cable\";}s:12:\"equipmentqty\";a:2:{i:0;s:1:\"1\";i:1;s:1:\"1\";}}', '', '', '', 'Approved', ''),
(161, 1, '2021-10-01 13:52:18', 2, 1, 1, '2021-10-04 13:30:00', '2021-10-04 15:30:00', 'student PPT', 50, 'a:4:{s:12:\"equipment_id\";N;s:3:\"img\";a:1:{i:0;s:20:\"2106703320camera.png\";}s:14:\"equipment_type\";a:1:{i:0;s:6:\"Camera\";}s:12:\"equipmentqty\";a:1:{i:0;s:1:\"1\";}}', '', '', '', 'Approved', ''),
(162, 1, '2021-10-01 14:18:02', 2, 2, 2, '2021-10-06 15:00:00', '2021-10-06 16:30:00', '', 100, 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";a:2:{i:0;s:20:\"2060849638laptop.png\";i:1;s:23:\"1655546985projector.png\";}s:14:\"equipment_type\";a:2:{i:0;s:6:\"Laptop\";i:1;s:9:\"Projector\";}s:12:\"equipmentqty\";a:2:{i:0;s:1:\"1\";i:1;s:1:\"1\";}}', '', '', '', 'Rejected', ''),
(163, 1, '2021-10-01 14:29:48', 2, 2, 1, '2021-10-08 14:00:00', '2021-10-08 16:30:00', '', 77, 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";s:0:\"\";s:14:\"equipment_type\";s:0:\"\";s:12:\"equipmentqty\";s:0:\"\";}', '', '', '', 'Cancelled', ''),
(164, 1, '2021-10-03 13:50:37', 3, 3, 2, '2021-10-04 09:00:00', '2021-10-04 11:00:00', 'alumni meet', 100, 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";a:3:{i:0;s:22:\"1343674442hdmiicon.jpg\";i:1;s:20:\"2060849638laptop.png\";i:2;s:21:\"915319518pendrive.png\";}s:14:\"equipment_type\";a:3:{i:0;s:10:\"HDMI Cable\";i:1;s:6:\"Laptop\";i:2;s:8:\"Pendrive\";}s:12:\"equipmentqty\";a:3:{i:0;s:1:\"1\";i:1;s:1:\"1\";i:2;s:1:\"1\";}}', '', '', '', 'Rejected', ''),
(165, 2, '2021-10-03 14:06:15', 3, 3, 5, '2021-10-05 08:30:00', '2021-10-05 17:30:00', 'cultural program for final year graduates', 200, 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";a:5:{i:0;s:20:\"2106703320camera.png\";i:1;s:22:\"1343674442hdmiicon.jpg\";i:2;s:20:\"2060849638laptop.png\";i:3;s:21:\"915319518pendrive.png\";i:4;s:23:\"1655546985projector.png\";}s:14:\"equipment_type\";a:5:{i:0;s:6:\"Camera\";i:1;s:10:\"HDMI Cable\";i:2;s:6:\"Laptop\";i:3;s:8:\"Pendrive\";i:4;s:9:\"Projector\";}s:12:\"equipmentqty\";a:5:{i:0;s:1:\"1\";i:1;s:1:\"1\";i:2;s:1:\"1\";i:3;s:1:\"1\";i:4;s:1:\"1\";}}', '', '', '', 'Approved', ''),
(166, 1, '2021-10-03 14:08:47', 3, 3, 9, '2021-10-06 15:00:00', '2021-10-06 16:30:00', 'seminar on drought', 100, 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";a:4:{i:0;s:22:\"1343674442hdmiicon.jpg\";i:1;s:21:\"915319518pendrive.png\";i:2;s:23:\"1655546985projector.png\";i:3;s:20:\"2060849638laptop.png\";}s:14:\"equipment_type\";a:4:{i:0;s:10:\"HDMI Cable\";i:1;s:8:\"Pendrive\";i:2;s:9:\"Projector\";i:3;s:6:\"Laptop\";}s:12:\"equipmentqty\";a:4:{i:0;s:1:\"1\";i:1;s:1:\"1\";i:2;s:1:\"1\";i:3;s:1:\"1\";}}', '', '', '', 'Rejected', ''),
(167, 2, '2021-10-03 14:16:31', 1, 4, 10, '2021-10-06 09:00:00', '2021-10-06 11:00:00', 'debate competition', 115, 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";a:2:{i:0;s:15:\"10273182936.jpg\";i:1;s:20:\"2106703320camera.png\";}s:14:\"equipment_type\";a:2:{i:0;s:4:\"mike\";i:1;s:6:\"Camera\";}s:12:\"equipmentqty\";a:2:{i:0;s:1:\"3\";i:1;s:1:\"1\";}}', '', '', '', 'Approved', 'Engaged'),
(168, 1, '2021-10-03 14:18:25', 1, 4, 4, '2021-10-06 14:00:00', '2021-10-06 16:30:00', 'leaders meet for parents meeting discussion', 50, 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";a:1:{i:0;s:15:\"10273182936.jpg\";}s:14:\"equipment_type\";a:1:{i:0;s:4:\"mike\";}s:12:\"equipmentqty\";a:1:{i:0;s:1:\"1\";}}', '', '', '', 'Rejected', ''),
(169, 1, '2021-10-03 14:19:28', 1, 4, 1, '2021-10-08 16:30:00', '2021-10-08 18:00:00', 'subject presentation', 100, 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";a:5:{i:0;s:22:\"1343674442hdmiicon.jpg\";i:1;s:20:\"2060849638laptop.png\";i:2;s:23:\"1655546985projector.png\";i:3;s:21:\"915319518pendrive.png\";i:4;s:15:\"10273182936.jpg\";}s:14:\"equipment_type\";a:5:{i:0;s:10:\"HDMI Cable\";i:1;s:6:\"Laptop\";i:2;s:9:\"Projector\";i:3;s:8:\"Pendrive\";i:4;s:4:\"mike\";}s:12:\"equipmentqty\";a:5:{i:0;s:1:\"1\";i:1;s:1:\"1\";i:2;s:1:\"1\";i:3;s:1:\"1\";i:4;s:1:\"1\";}}', '', '', '', 'Cancelled', ''),
(170, 2, '2021-10-03 14:27:13', 7, 8, 6, '2021-10-06 11:00:00', '2021-10-06 13:00:00', 'subject related', 100, 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";a:1:{i:0;s:15:\"10273182936.jpg\";}s:14:\"equipment_type\";a:1:{i:0;s:4:\"mike\";}s:12:\"equipmentqty\";a:1:{i:0;s:1:\"1\";}}', '', '', '', 'Approved', ''),
(171, 1, '2021-10-03 14:28:32', 7, 8, 9, '2021-10-05 14:00:00', '2021-10-05 15:00:00', 'subject related', 50, 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";a:2:{i:0;s:23:\"1655546985projector.png\";i:1;s:22:\"1343674442hdmiicon.jpg\";}s:14:\"equipment_type\";a:2:{i:0;s:9:\"Projector\";i:1;s:10:\"HDMI Cable\";}s:12:\"equipmentqty\";a:2:{i:0;s:1:\"1\";i:1;s:1:\"1\";}}', '', '', '', 'Approved', ''),
(172, 1, '2021-10-03 15:52:17', 1, 17, 6, '2021-10-06 14:30:00', '2021-10-06 16:30:00', 'cocurricular activity', 100, 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";a:2:{i:0;s:15:\"10273182936.jpg\";i:1;s:20:\"2060849638laptop.png\";}s:14:\"equipment_type\";a:2:{i:0;s:4:\"mike\";i:1;s:6:\"Laptop\";}s:12:\"equipmentqty\";a:2:{i:0;s:1:\"1\";i:1;s:1:\"1\";}}', '', '', '', 'Approved', ''),
(173, 2, '2021-10-03 15:53:50', 1, 17, 10, '2021-10-06 14:00:00', '2021-10-06 17:30:00', 'extracurricular activity', 100, 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";a:1:{i:0;s:15:\"10273182936.jpg\";}s:14:\"equipment_type\";a:1:{i:0;s:4:\"mike\";}s:12:\"equipmentqty\";a:1:{i:0;s:1:\"4\";}}', '', '', '', 'Approved', ''),
(174, 1, '2021-10-03 15:55:48', 1, 17, 9, '2021-10-07 11:00:00', '2021-10-07 13:00:00', 'subject related', 100, 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";a:2:{i:0;s:22:\"1343674442hdmiicon.jpg\";i:1;s:23:\"1655546985projector.png\";}s:14:\"equipment_type\";a:2:{i:0;s:10:\"HDMI Cable\";i:1;s:9:\"Projector\";}s:12:\"equipmentqty\";a:2:{i:0;s:1:\"1\";i:1;s:1:\"1\";}}', '', '', '', 'Cancelled', ''),
(175, 1, '2021-10-03 15:56:53', 1, 17, 10, '2021-10-04 17:00:00', '2021-10-04 18:00:00', 'competition', 100, 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";a:1:{i:0;s:15:\"10273182936.jpg\";}s:14:\"equipment_type\";a:1:{i:0;s:4:\"mike\";}s:12:\"equipmentqty\";a:1:{i:0;s:1:\"4\";}}', '', '', '', 'Cancelled', ''),
(176, 1, '2021-10-03 16:03:48', 2, 2, 9, '2021-10-06 11:00:00', '2021-10-06 13:00:00', 'seminar for students', 100, 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";a:2:{i:0;s:22:\"1343674442hdmiicon.jpg\";i:1;s:23:\"1655546985projector.png\";}s:14:\"equipment_type\";a:2:{i:0;s:10:\"HDMI Cable\";i:1;s:9:\"Projector\";}s:12:\"equipmentqty\";a:2:{i:0;s:1:\"1\";i:1;s:1:\"1\";}}', '', '', '', 'Rejected', ''),
(177, 1, '2021-10-03 16:05:17', 2, 1, 2, '2021-10-06 11:00:00', '2021-10-06 13:00:00', 'alumni meet', 100, 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";a:2:{i:0;s:22:\"1343674442hdmiicon.jpg\";i:1;s:20:\"2060849638laptop.png\";}s:14:\"equipment_type\";a:2:{i:0;s:10:\"HDMI Cable\";i:1;s:6:\"Laptop\";}s:12:\"equipmentqty\";a:2:{i:0;s:1:\"1\";i:1;s:1:\"1\";}}', '', '', '', 'Approved', ''),
(178, 1, '2021-10-03 16:10:22', 2, 2, 9, '2021-10-04 09:00:00', '2021-10-04 11:00:00', 'subject related', 50, 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";a:2:{i:0;s:23:\"1655546985projector.png\";i:1;s:22:\"1343674442hdmiicon.jpg\";}s:14:\"equipment_type\";a:2:{i:0;s:9:\"Projector\";i:1;s:10:\"HDMI Cable\";}s:12:\"equipmentqty\";a:2:{i:0;s:1:\"1\";i:1;s:1:\"1\";}}', '', '', '', 'Approved', ''),
(179, 1, '2021-10-03 16:11:34', 2, 2, 6, '2021-10-05 09:00:00', '2021-10-05 11:00:00', 'subject related', 96, 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";a:1:{i:0;s:15:\"10273182936.jpg\";}s:14:\"equipment_type\";a:1:{i:0;s:4:\"mike\";}s:12:\"equipmentqty\";a:1:{i:0;s:1:\"1\";}}', '', '', '', 'Approved', ''),
(180, 1, '2021-10-03 16:17:15', 3, 3, 2, '2021-10-05 11:00:00', '2021-10-05 13:00:00', 'alumni meet', 100, 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";a:2:{i:0;s:23:\"1655546985projector.png\";i:1;s:22:\"1343674442hdmiicon.jpg\";}s:14:\"equipment_type\";a:2:{i:0;s:9:\"Projector\";i:1;s:10:\"HDMI Cable\";}s:12:\"equipmentqty\";a:2:{i:0;s:1:\"1\";i:1;s:1:\"1\";}}', '', '', '', 'Approved', ''),
(181, 1, '2021-10-03 16:17:57', 3, 3, 9, '2021-10-07 15:00:00', '2021-10-07 16:00:00', 'subject related', 100, 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";a:2:{i:0;s:22:\"1343674442hdmiicon.jpg\";i:1;s:23:\"1655546985projector.png\";}s:14:\"equipment_type\";a:2:{i:0;s:10:\"HDMI Cable\";i:1;s:9:\"Projector\";}s:12:\"equipmentqty\";a:2:{i:0;s:1:\"1\";i:1;s:1:\"1\";}}', '', '', '', 'Cancelled', ''),
(182, 1, '2021-10-03 16:18:41', 3, 3, 1, '2021-10-08 12:00:00', '2021-10-08 13:00:00', 'subject related', 100, 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";a:3:{i:0;s:22:\"1343674442hdmiicon.jpg\";i:1;s:23:\"1655546985projector.png\";i:2;s:15:\"10273182936.jpg\";}s:14:\"equipment_type\";a:3:{i:0;s:10:\"HDMI Cable\";i:1;s:9:\"Projector\";i:2;s:4:\"mike\";}s:12:\"equipmentqty\";a:3:{i:0;s:1:\"1\";i:1;s:1:\"1\";i:2;s:1:\"1\";}}', '', '', '', 'Approved', ''),
(183, 1, '2021-10-03 16:19:38', 3, 3, 6, '2021-10-08 09:00:00', '2021-10-08 10:00:00', 'subject related', 100, 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";a:2:{i:0;s:15:\"10273182936.jpg\";i:1;s:20:\"2106703320camera.png\";}s:14:\"equipment_type\";a:2:{i:0;s:4:\"mike\";i:1;s:6:\"Camera\";}s:12:\"equipmentqty\";a:2:{i:0;s:1:\"1\";i:1;s:1:\"1\";}}', '', '', '', 'Approved', ''),
(184, 1, '2021-10-03 16:21:18', 2, 2, 1, '2021-10-07 16:00:00', '2021-10-07 17:00:00', 'subjected related', 100, 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";a:2:{i:0;s:22:\"1343674442hdmiicon.jpg\";i:1;s:23:\"1655546985projector.png\";}s:14:\"equipment_type\";a:2:{i:0;s:10:\"HDMI Cable\";i:1;s:9:\"Projector\";}s:12:\"equipmentqty\";a:2:{i:0;s:1:\"1\";i:1;s:1:\"1\";}}', '', '', '', 'Approved', ''),
(185, 1, '2021-10-03 16:22:04', 2, 2, 5, '2021-10-05 16:00:00', '2021-10-05 17:00:00', 'cocurricular activity', 100, 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";a:1:{i:0;s:15:\"10273182936.jpg\";}s:14:\"equipment_type\";a:1:{i:0;s:4:\"mike\";}s:12:\"equipmentqty\";a:1:{i:0;s:1:\"2\";}}', '', '', '', 'Approved', ''),
(186, 2, '2021-10-03 16:23:16', 2, 2, 10, '2021-10-08 09:00:00', '2021-10-08 12:00:00', 'extracurricular activity', 200, 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";a:2:{i:0;s:15:\"10273182936.jpg\";i:1;s:20:\"2106703320camera.png\";}s:14:\"equipment_type\";a:2:{i:0;s:4:\"mike\";i:1;s:6:\"Camera\";}s:12:\"equipmentqty\";a:2:{i:0;s:1:\"4\";i:1;s:1:\"1\";}}', '', '', '', 'Approved', ''),
(187, 1, '2021-10-03 16:28:37', 2, 1, 9, '2021-10-06 09:00:00', '2021-10-06 11:00:00', 'subjected related', 100, 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";a:2:{i:0;s:23:\"1655546985projector.png\";i:1;s:22:\"1343674442hdmiicon.jpg\";}s:14:\"equipment_type\";a:2:{i:0;s:9:\"Projector\";i:1;s:10:\"HDMI Cable\";}s:12:\"equipmentqty\";a:2:{i:0;s:1:\"1\";i:1;s:1:\"1\";}}', '', '', '', 'Cancelled', ''),
(188, 1, '2021-10-03 16:29:18', 2, 1, 1, '2021-10-08 10:00:00', '2021-10-08 12:00:00', 'subjected related', 100, 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";a:2:{i:0;s:22:\"1343674442hdmiicon.jpg\";i:1;s:23:\"1655546985projector.png\";}s:14:\"equipment_type\";a:2:{i:0;s:10:\"HDMI Cable\";i:1;s:9:\"Projector\";}s:12:\"equipmentqty\";a:2:{i:0;s:1:\"1\";i:1;s:1:\"1\";}}', '', '', '', 'Approved', ''),
(189, 2, '2021-10-03 16:30:07', 2, 1, 5, '2021-10-07 10:00:00', '2021-10-07 12:00:00', 'cocurricular activity', 200, 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";a:1:{i:0;s:15:\"10273182936.jpg\";}s:14:\"equipment_type\";a:1:{i:0;s:4:\"mike\";}s:12:\"equipmentqty\";a:1:{i:0;s:1:\"2\";}}', '', '', '', 'Approved', ''),
(190, 1, '2021-10-03 16:35:29', 1, 4, 5, '2021-10-07 09:00:00', '2021-10-07 11:00:00', 'extracurricular activity', 100, 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";a:2:{i:0;s:15:\"10273182936.jpg\";i:1;s:20:\"2106703320camera.png\";}s:14:\"equipment_type\";a:2:{i:0;s:4:\"mike\";i:1;s:6:\"Camera\";}s:12:\"equipmentqty\";a:2:{i:0;s:1:\"4\";i:1;s:1:\"1\";}}', '', '', '', 'Cancelled', ''),
(191, 1, '2021-10-03 16:36:39', 1, 4, 9, '2021-10-09 09:00:00', '2021-10-09 10:00:00', 'subject related', 100, 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";a:1:{i:0;s:15:\"10273182936.jpg\";}s:14:\"equipment_type\";a:1:{i:0;s:4:\"mike\";}s:12:\"equipmentqty\";a:1:{i:0;s:1:\"1\";}}', '', '', '', 'Approved', ''),
(192, 1, '2021-10-03 16:37:32', 1, 4, 6, '2021-10-11 09:00:00', '2021-10-11 11:00:00', 'subject related', 50, 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";a:2:{i:0;s:15:\"10273182936.jpg\";i:1;s:20:\"2106703320camera.png\";}s:14:\"equipment_type\";a:2:{i:0;s:4:\"mike\";i:1;s:6:\"Camera\";}s:12:\"equipmentqty\";a:2:{i:0;s:1:\"1\";i:1;s:1:\"1\";}}', '', '', '', 'Approved', ''),
(193, 2, '2021-10-03 16:38:59', 1, 4, 5, '2021-10-12 09:00:00', '2021-10-12 13:00:00', 'talents day rehearsal', 200, 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";a:2:{i:0;s:21:\"915319518pendrive.png\";i:1;s:15:\"10273182936.jpg\";}s:14:\"equipment_type\";a:2:{i:0;s:8:\"Pendrive\";i:1;s:4:\"mike\";}s:12:\"equipmentqty\";a:2:{i:0;s:1:\"1\";i:1;s:1:\"1\";}}', '', '', '', 'Approved', ''),
(194, 1, '2021-10-03 17:35:40', 2, 2, 1, '2021-10-09 10:00:00', '2021-10-09 11:00:00', 'subject related', 100, 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";a:2:{i:0;s:23:\"1655546985projector.png\";i:1;s:22:\"1343674442hdmiicon.jpg\";}s:14:\"equipment_type\";a:2:{i:0;s:9:\"Projector\";i:1;s:10:\"HDMI Cable\";}s:12:\"equipmentqty\";a:2:{i:0;s:1:\"1\";i:1;s:1:\"1\";}}', '', '', '', 'Approved', ''),
(195, 1, '2021-10-03 17:42:09', 2, 2, 1, '2021-10-11 11:00:00', '2021-10-11 12:00:00', 'subject related', 100, 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";a:2:{i:0;s:22:\"1343674442hdmiicon.jpg\";i:1;s:23:\"1655546985projector.png\";}s:14:\"equipment_type\";a:2:{i:0;s:10:\"HDMI Cable\";i:1;s:9:\"Projector\";}s:12:\"equipmentqty\";a:2:{i:0;s:1:\"1\";i:1;s:1:\"1\";}}', '', '', '', 'Approved', ''),
(196, 1, '2021-10-03 17:46:02', 2, 2, 1, '2021-10-07 17:00:00', '2021-10-07 18:00:00', 'subject related', 100, 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";a:3:{i:0;s:15:\"10273182936.jpg\";i:1;s:23:\"1655546985projector.png\";i:2;s:22:\"1343674442hdmiicon.jpg\";}s:14:\"equipment_type\";a:3:{i:0;s:4:\"mike\";i:1;s:9:\"Projector\";i:2;s:10:\"HDMI Cable\";}s:12:\"equipmentqty\";a:3:{i:0;s:1:\"1\";i:1;s:1:\"1\";i:2;s:1:\"1\";}}', '', '', '', 'Approved', ''),
(197, 1, '2021-10-03 17:50:50', 2, 1, 2, '2021-10-09 11:00:00', '2021-10-09 12:00:00', 'alumni meet', 100, 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";a:2:{i:0;s:22:\"1343674442hdmiicon.jpg\";i:1;s:23:\"1655546985projector.png\";}s:14:\"equipment_type\";a:2:{i:0;s:10:\"HDMI Cable\";i:1;s:9:\"Projector\";}s:12:\"equipmentqty\";a:2:{i:0;s:1:\"1\";i:1;s:1:\"1\";}}', '', '', '', 'Approved', ''),
(198, 1, '2021-10-03 17:53:12', 2, 1, 5, '2021-10-12 09:00:00', '2021-10-12 17:00:00', 'talents day', 100, 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";a:6:{i:0;s:20:\"2106703320camera.png\";i:1;s:22:\"1343674442hdmiicon.jpg\";i:2;s:20:\"2060849638laptop.png\";i:3;s:21:\"915319518pendrive.png\";i:4;s:23:\"1655546985projector.png\";i:5;s:15:\"10273182936.jpg\";}s:14:\"equipment_type\";a:6:{i:0;s:6:\"Camera\";i:1;s:10:\"HDMI Cable\";i:2;s:6:\"Laptop\";i:3;s:8:\"Pendrive\";i:4;s:9:\"Projector\";i:5;s:4:\"mike\";}s:12:\"equipmentqty\";a:6:{i:0;s:1:\"1\";i:1;s:1:\"5\";i:2;s:1:\"1\";i:3;s:1:\"4\";i:4;s:1:\"2\";i:5;s:1:\"4\";}}', '', '', '', 'Approved', ''),
(199, 1, '2021-10-03 17:56:24', 2, 2, 4, '2021-10-06 09:00:00', '2021-10-06 11:00:00', '', 100, 'a:4:{s:12:\"equipment_id\";N;s:3:\"img\";a:1:{i:0;s:15:\"10273182936.jpg\";}s:14:\"equipment_type\";a:1:{i:0;s:4:\"mike\";}s:12:\"equipmentqty\";a:1:{i:0;s:1:\"1\";}}', '', '', '', 'Approved', ''),
(200, 1, '2021-10-03 17:56:59', 2, 2, 4, '2021-10-06 11:00:00', '2021-10-06 13:00:00', '', 100, 'a:4:{s:12:\"equipment_id\";N;s:3:\"img\";a:1:{i:0;s:15:\"10273182936.jpg\";}s:14:\"equipment_type\";a:1:{i:0;s:4:\"mike\";}s:12:\"equipmentqty\";a:1:{i:0;s:1:\"1\";}}', '', '', '', 'Rejected', ''),
(201, 1, '2021-10-03 18:18:50', 2, 1, 4, '2021-10-08 14:00:00', '2021-10-08 18:00:00', '', 100, 'a:4:{s:12:\"equipment_id\";N;s:3:\"img\";a:1:{i:0;s:15:\"10273182936.jpg\";}s:14:\"equipment_type\";a:1:{i:0;s:4:\"mike\";}s:12:\"equipmentqty\";a:1:{i:0;s:1:\"1\";}}', '', '', '', 'Approved', ''),
(202, 1, '2021-10-03 19:01:21', 2, 1, 4, '2021-10-07 09:00:00', '2021-10-07 13:00:00', '', 100, 'a:4:{s:12:\"equipment_id\";N;s:3:\"img\";a:1:{i:0;s:15:\"10273182936.jpg\";}s:14:\"equipment_type\";a:1:{i:0;s:4:\"mike\";}s:12:\"equipmentqty\";a:1:{i:0;s:1:\"1\";}}', '', '', '', 'Approved', ''),
(203, 1, '2021-10-04 14:23:02', 1, 4, 2, '2021-10-09 14:00:00', '2021-10-09 15:00:00', 'alumni meet', 100, 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";a:2:{i:0;s:22:\"1343674442hdmiicon.jpg\";i:1;s:23:\"1655546985projector.png\";}s:14:\"equipment_type\";a:2:{i:0;s:10:\"HDMI Cable\";i:1;s:9:\"Projector\";}s:12:\"equipmentqty\";a:2:{i:0;s:1:\"1\";i:1;s:1:\"1\";}}', '', '', '', 'Approved', ''),
(204, 1, '2021-10-04 14:28:19', 3, 3, 9, '2021-10-09 16:00:00', '2021-10-09 17:00:00', 'subject related', 100, 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";a:1:{i:0;s:15:\"10273182936.jpg\";}s:14:\"equipment_type\";a:1:{i:0;s:4:\"mike\";}s:12:\"equipmentqty\";a:1:{i:0;s:1:\"1\";}}', '', '', '', 'Approved', ''),
(205, 1, '2021-10-04 14:32:10', 2, 1, 6, '2021-10-09 15:00:00', '2021-10-09 16:00:00', 'subject related', 100, 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";a:2:{i:0;s:22:\"1343674442hdmiicon.jpg\";i:1;s:23:\"1655546985projector.png\";}s:14:\"equipment_type\";a:2:{i:0;s:10:\"HDMI Cable\";i:1;s:9:\"Projector\";}s:12:\"equipmentqty\";a:2:{i:0;s:1:\"1\";i:1;s:1:\"1\";}}', '', '', '', 'Approved', ''),
(206, 1, '2021-10-04 14:40:03', 1, 2, 10, '2021-10-13 09:00:00', '2021-10-13 11:00:00', 'extracurricular activity', 100, 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";a:2:{i:0;s:15:\"10273182936.jpg\";i:1;s:20:\"2106703320camera.png\";}s:14:\"equipment_type\";a:2:{i:0;s:4:\"mike\";i:1;s:6:\"Camera\";}s:12:\"equipmentqty\";a:2:{i:0;s:1:\"1\";i:1;s:1:\"1\";}}', '', '', '', 'Approved', ''),
(207, 1, '2021-10-04 14:50:48', 1, 2, 4, '2021-10-09 14:00:00', '2021-10-09 17:00:00', 'parents teachers meeting', 100, 'a:4:{s:12:\"equipment_id\";N;s:3:\"img\";a:2:{i:0;s:20:\"2060849638laptop.png\";i:1;s:15:\"10273182936.jpg\";}s:14:\"equipment_type\";a:2:{i:0;s:6:\"Laptop\";i:1;s:4:\"mike\";}s:12:\"equipmentqty\";a:2:{i:0;s:1:\"1\";i:1;s:1:\"1\";}}', '', '', '', 'Rejected', ''),
(208, 1, '2021-10-04 15:07:41', 1, 2, 5, '2021-10-07 15:00:00', '2021-10-07 16:00:00', 'Pick and speak', 100, 'a:4:{s:12:\"equipment_id\";N;s:3:\"img\";a:1:{i:0;s:15:\"10273182936.jpg\";}s:14:\"equipment_type\";a:1:{i:0;s:4:\"mike\";}s:12:\"equipmentqty\";a:1:{i:0;s:1:\"2\";}}', '', '', '', 'Approved', ''),
(209, 1, '2021-10-05 08:03:59', 3, 3, 4, '2021-11-04 13:30:00', '2021-11-04 16:00:00', '', 50, 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";s:0:\"\";s:14:\"equipment_type\";s:0:\"\";s:12:\"equipmentqty\";s:0:\"\";}', '', '', '', 'Rejected', ''),
(210, 1, '2021-10-05 10:02:26', 1, 2, 1, '2021-10-14 11:30:00', '2021-10-14 14:30:00', '', 73, 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";a:1:{i:0;s:20:\"2106703320camera.png\";}s:14:\"equipment_type\";a:1:{i:0;s:6:\"Camera\";}s:12:\"equipmentqty\";a:1:{i:0;s:1:\"1\";}}', '', '', '', 'Rejected', ''),
(211, 1, '2021-10-05 10:19:30', 1, 2, 1, '2021-10-09 16:00:00', '2021-10-09 17:00:00', '', 100, 'a:4:{s:12:\"equipment_id\";N;s:3:\"img\";a:1:{i:0;s:20:\"2106703320camera.png\";}s:14:\"equipment_type\";a:1:{i:0;s:6:\"Camera\";}s:12:\"equipmentqty\";a:1:{i:0;s:1:\"1\";}}', '', '', '', 'Rejected', ''),
(212, 1, '2021-10-05 10:25:11', 1, 2, 1, '2021-10-09 11:00:00', '2021-10-09 14:30:00', '', 100, 'a:4:{s:12:\"equipment_id\";N;s:3:\"img\";a:1:{i:0;s:20:\"2060849638laptop.png\";}s:14:\"equipment_type\";a:1:{i:0;s:6:\"Laptop\";}s:12:\"equipmentqty\";a:1:{i:0;s:1:\"1\";}}', '', '', '', 'Rejected', ''),
(213, 1, '2021-10-11 15:00:07', 3, 3, 1, '2021-10-14 09:30:00', '2021-10-14 12:30:00', '', 50, 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";s:0:\"\";s:14:\"equipment_type\";s:0:\"\";s:12:\"equipmentqty\";s:0:\"\";}', '', '', '', 'Rejected', ''),
(214, 1, '2022-02-27 10:59:16', 2, 1, 4, '2022-03-01 10:30:00', '2022-03-01 13:30:00', 'aaa', 62, 'a:4:{s:12:\"equipment_id\";s:0:\"\";s:3:\"img\";s:0:\"\";s:14:\"equipment_type\";s:0:\"\";s:12:\"equipmentqty\";s:0:\"\";}', '', '', '', 'Approved', '');

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
(1, 'SDM college canteen', 'sdmcollegecanteen@gmail.com', '8192322282', 'eb61f82eb9beb456e670eea31dc9bcbd', '8596153521.jpg', 'Active'),
(2, 'Disha Food Corner', 'kousthubpc@gmail.com', '9449309774', '7a4e7bfaa7fea6b41c7efa7622443409', '15672965673.jpg', 'Active'),
(3, 'Swapna ', 'swapna@gmail.com', '9972077344', '65a6f195d252b62f6d170f2881aec6cf', '16674895232.jpg', 'Inactive');

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
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staffid`, `department_id`, `staffname`, `emailid`, `password`, `phno`, `profile_img`, `status`) VALUES
(1, 2, 'sowjanya', 'sowjubhat01@gmail.com', 'dbadd6701db651aef1081783b184f9ec', '9535542123', '21327430712.jpg', 'Active'),
(2, 1, 'Sushrutha jain', 'sushruthajain2000@gmail.com', '25af7e2e67fa49805c2abce64bb2106d', '9483352556', '297082574sush.jpg', 'Active'),
(3, 3, 'kousthub', 'kousthubpc@gmail.com', '5edc5fca98c1a04bf599305e656d4531', '9449309774', '', 'Active'),
(4, 1, 'Tharun', 'tharun@gmail.com', '382f81ab4aeb1d3558a88462a9b1c9fc', '9480984046', '20422127381.jpg', 'Active'),
(7, 6, 'Bhuvan', 'bhuvan@gmail.com', 'cdb10a5c7ac522f70656c7e8121e1432', '9449639744', '15743714076.jpg', 'Inactive'),
(8, 7, 'Rashmi N', 'rashmi@gmail.com', '0ce4ff80e8a029c19abaa08a2019a980', '9972077344', '7625500484.jpg', 'Active'),
(11, 3, 'Akshatha', 'akshatha@gmail.com', 'a56eaad23c8319b792617c10861c0015', '9780984044', '5353949557.jpg', 'Inactive'),
(17, 1, 'Reshma', 'reshma@gmail.com', 'a66cfd3d771703664d7ba768b8a7f835', '8975436789', '9894072218.jpg', 'Active'),
(18, 3, 'purvik', 'purvik@gmail.com', 'b3f4b82e10e4c566a6c08e58623df4f5', '7895678950', '978010491', 'Inactive'),
(20, 4, 'Priya', 'Priyamn@gmail.com', 'a4d0a6d8ddb22c454e9d68aaf349204f', '7896543904', '1096583407', 'Not_verified'),
(21, 1, 'riya', 'riya01@gmail.com', '9eeb1270f65de1055e2251259b614183', '7567890546', '93913321', 'Active'),
(26, 3, 'Asha Kiran', 'ashakiran@sdmcujire.in', 'c978b446e724eb91610476b3e46c744c', '8274627468', '765526043', 'Active'),
(27, 3, 'Deepa', 'deeparp19@sdmcujire.in', '416fe8ebff1487e31ad248f29a8ae594', '8374839282', '2118352382', 'Active');

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
  MODIFY `adminid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `bill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `change_request`
--
ALTER TABLE `change_request`
  MODIFY `request_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `equipments`
--
ALTER TABLE `equipments`
  MODIFY `equipment_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `eventtype`
--
ALTER TABLE `eventtype`
  MODIFY `eventtypeid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `food_item`
--
ALTER TABLE `food_item`
  MODIFY `food_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `food_order`
--
ALTER TABLE `food_order`
  MODIFY `food_order_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `hall`
--
ALTER TABLE `hall`
  MODIFY `hallid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `hall_booking`
--
ALTER TABLE `hall_booking`
  MODIFY `hall_booking_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=215;

--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `hotel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staffid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
