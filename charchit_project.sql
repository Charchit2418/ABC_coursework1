-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2025 at 03:22 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `charchit_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `content`) VALUES
(1, ' Hotel reservation system is web application to hotel management system. This system to provide service facilities to hotel and also to the customer. The services that are provided is reservation by customer, through system online, customer information management system. With this system online, reservation management will be easier and systematic to replace traditional system.\r\n       The website which deals with the easy online reservation in a hotel with the high security is know as Online hotel booking system. The script provides a powerful room booking and reservation management functionality. In here travelers can book rooms on a computer by using online security. The hotel reservation system is highly customizable system and integrates perfectly into any websites.<h1>tested</h1>'),
(2, ' Hotel reservation system is web application to hotel management system. This system to provide service facilities to hotel and also to the customer. The services that are provided is reservation by customer, through system online, customer information management system. With this system online, reservation management will be easier and systematic to replace traditional system.\r\n       The website which deals with the easy online reservation in a hotel with the high security is know as Online hotel booking system. The script provides a powerful room booking and reservation management functionality. In here travelers can book rooms on a computer by using online security. The hotel reservation system is highly customizable system and integrates perfectly into any websites.');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `phone` bigint(15) NOT NULL,
  `email` varchar(20) NOT NULL,
  `address` varchar(30) NOT NULL,
  `security` varchar(30) NOT NULL,
  `date_of_reg` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fullname`, `username`, `password`, `phone`, `email`, `address`, `security`, `date_of_reg`) VALUES
(1, 'Charchit Dahal', 'admin', 'password', 2147483647, 'charchit@test.com', 'Chitwan', 'zurich', '2025-02-04 11:03:20');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `contact` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `contact`) VALUES
(1, '<h1>Location:</h1><p>Kathmandu,Nepal,near Parlaiment House</p>\r\n<h3>Contact No:</h3><p>01-40067123,01-40067124</p>\r\n<h3>manager number</h3><p>9811234560</p>'),
(2, '<h1>Location:</h1><p>Kathmandu,Nepal,near Parlaiment House</p>\r\n<h3>Contact No:</h3><p>01-40067123,01-40067124</p>\r\n<h3>manager number</h3><p>9811234560</p>');

-- --------------------------------------------------------

--
-- Table structure for table `employee_record`
--

CREATE TABLE `employee_record` (
  `id` int(11) NOT NULL,
  `firstname` varchar(40) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `gender` varchar(11) NOT NULL,
  `phone` bigint(15) NOT NULL,
  `address` varchar(50) NOT NULL,
  `post` varchar(40) NOT NULL,
  `salary` int(11) NOT NULL,
  `date_of_join` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `employee_record`
--

INSERT INTO `employee_record` (`id`, `firstname`, `lastname`, `email`, `gender`, `phone`, `address`, `post`, `salary`, `date_of_join`) VALUES
(1, 'Charchit', 'Dahal', 'charchitteste@gmail.com', 'male', 9812345677, 'kathmandu', 'CEO', 6000000, '2012-12-12');

-- --------------------------------------------------------

--
-- Table structure for table `guest_record`
--

CREATE TABLE `guest_record` (
  `id` int(10) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `gender` varchar(20) NOT NULL,
  `phone` bigint(15) NOT NULL,
  `answer` varchar(20) NOT NULL,
  `date_of_reg` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `guest_record`
--

INSERT INTO `guest_record` (`id`, `firstname`, `lastname`, `email`, `username`, `password`, `gender`, `phone`, `answer`, `date_of_reg`) VALUES
(15, 'testuser', 'webcw', 'webcw@test.com', 'web_cw', 'webcw', 'male', 1234567777, 'green', '2025-02-03 19:43:48'),
(16, 'hehe', 'haha', 'heheh@haha.com', 'tester', 'tester', 'male', 11887722, 'blue', '2025-02-03 19:48:31'),
(18, 'Charchits', 'Dahal', 'charchit@test.com', 'tested', 'tested1', 'male', 9812345777, 'red', '2025-02-04 06:59:54'),
(19, 'Test', 'USer', 'Testuser@test.com', 'testuser', 'testuser', 'male', 9877123456, 'red', '2025-02-04 07:14:31'),
(21, 'okdones', 'ok', 'ok@okdone.com', 'okdone', 'okdone', 'male', 9877722555, 'red', '2025-02-04 08:41:56');

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE `home` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` varchar(3000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `home`
--

INSERT INTO `home` (`id`, `title`, `content`) VALUES
(1, '<h2>WEL COME TO FOUR SEASON RESORT</h2><h4>A PLACE WHERE PLEASURE NEVER FADES</h4>', 'Resort management system is web application to hotel management system. This system to provide service facilities to hotel and also to the customer. The services that are provided is reservation by customer, through system online, customer information management system. With this system online, reservation management will be easier and systematic to replace traditional systems.\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

CREATE TABLE `logo` (
  `id` int(11) NOT NULL,
  `image` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `logo`
--

INSERT INTO `logo` (`id`, `image`) VALUES
(1, 'logo.jpg'),
(2, ''),
(3, 's.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `roombooked`
--

CREATE TABLE `roombooked` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `type` varchar(30) NOT NULL,
  `full_name` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` bigint(15) NOT NULL,
  `address` varchar(40) NOT NULL,
  `price` varchar(10) NOT NULL,
  `room_no` varchar(40) NOT NULL,
  `booking_date` text NOT NULL,
  `end_date` varchar(4) NOT NULL,
  `status` varchar(30) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `roombooked`
--

INSERT INTO `roombooked` (`id`, `username`, `type`, `full_name`, `email`, `phone`, `address`, `price`, `room_no`, `booking_date`, `end_date`, `status`, `date`) VALUES
(32, 'tested', 'test', 'Charchit Dahal', 'charchit@test.com', 9812345677, '', '11', '22', '2025-02-05', '2025', 'booked', '2025-02-03 19:29:05'),
(33, 'testuser', 'superdeluxe', 'Test USer', 'Testuser@test.com', 9877123456, '', '22', 'rfc-12342', '2025-02-04', '2025', 'booked', '2025-02-04 07:32:46'),
(34, 'usertester', 'honey-moon suite', 'User Tester', 'usertester@test.com', 9877722555, '', '$89', 'rfc-1501', '2025-02-04', '2025', 'booked', '2025-02-04 07:59:29'),
(35, 'okdone', 'test', 'okdones ok', 'ok@okdone.com', 9877722555, '', '$12', '22', '2025-02-04', '2025', 'booked', '2025-02-04 08:43:54'),
(37, 'wowuser', 'test', 'wows wau', 'wow@wau.com', 9988336677, '', '$77', 'Softwarica', '2025-02-04', '2025', 'booked', '2025-02-04 08:50:29');

-- --------------------------------------------------------

--
-- Table structure for table `roomupload`
--

CREATE TABLE `roomupload` (
  `id` int(11) NOT NULL,
  `room_no` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `status` varchar(15) NOT NULL,
  `price` varchar(30) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `roomupload`
--

INSERT INTO `roomupload` (`id`, `room_no`, `type`, `status`, `price`, `image`) VALUES
(2, 'rfc-12342', 'superdeluxe', 'unavailable', '22', 'https://image-tc.galaxy.tf/wijpeg-dghgmolkfh6t706p9wohdl5ow/testing-100.jpg'),
(3, 'rfc-123421', 'Delux', 'unavailable', '$73', 'https://dbijapkm3o6fj.cloudfront.net/resources/29181,1004,1,6,4,0,600,450/-4608-/20210503231944/deluxe-room.jpeg'),
(4, 'rfc-1501', 'honey-moon suite', 'unavailable', '$89', 'https://www.oberoihotels.com/-/media/oberoi-hotels/website-images/the-oberoi-new-delhi/room-and-suites/deluxe-room/detail/deluxe-room-1.jpg'),
(5, 'rfc 1504', 'honey-moon suite', 'unavailable', '$99', 'https://www.subicbaytravelershotel.com/wp-content/uploads/2020/06/20190603_170950-scaled.jpg'),
(6, '22', 'test', 'unavailable', '$12', 'https://www.peninsula.com/-/media/pbk/rooms/deluxe-room.jpg'),
(7, '22', 'test', 'unavailable', '11', 'https://www.beautifulhomes.asianpaints.com/content/dam/asianpaintsbeautifulhomes/gallery/bedroom/contemporary-kids-bedroom-with-bunk-bed-and-study-table/children-room-design.jpg'),
(8, 'hahah', 'hhh', 'available', '11', 'http://localhost/resort/assets/test.jpg'),
(9, 'Softwarica', 'test', 'unavailable', '$77', 'http://localhost/resort/assets/test.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_record`
--
ALTER TABLE `employee_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guest_record`
--
ALTER TABLE `guest_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roombooked`
--
ALTER TABLE `roombooked`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roomupload`
--
ALTER TABLE `roomupload`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee_record`
--
ALTER TABLE `employee_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `guest_record`
--
ALTER TABLE `guest_record`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `home`
--
ALTER TABLE `home`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `logo`
--
ALTER TABLE `logo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roombooked`
--
ALTER TABLE `roombooked`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `roomupload`
--
ALTER TABLE `roomupload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
