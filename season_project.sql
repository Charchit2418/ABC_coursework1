-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 08, 2016 at 05:25 AM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `windy_anarchy`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE IF NOT EXISTS `about` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `content`) VALUES
(1, ' Hotel reservation system is web application to hotel management system. This system to provide service facilities to hotel and also to the customer. The services that are provided is reservation by customer, through system online, customer information management system. With this system online, reservation management will be easier and systematic to replace traditional system.\r\n       The website which deals with the easy online reservation in a hotel with the high security is know as Online hotel booking system. The script provides a powerful room booking and reservation management functionality. In here travelers can book rooms on a computer by using online security. The hotel reservation system is highly customizable system and integrates perfectly into any websites.'),
(2, ' Hotel reservation system is web application to hotel management system. This system to provide service facilities to hotel and also to the customer. The services that are provided is reservation by customer, through system online, customer information management system. With this system online, reservation management will be easier and systematic to replace traditional system.\r\n       The website which deals with the easy online reservation in a hotel with the high security is know as Online hotel booking system. The script provides a powerful room booking and reservation management functionality. In here travelers can book rooms on a computer by using online security. The hotel reservation system is highly customizable system and integrates perfectly into any websites.');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `phone` bigint(15) NOT NULL,
  `email` varchar(20) NOT NULL,
  `address` varchar(30) NOT NULL,
  `security` varchar(30) NOT NULL,
  `date_of_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fullname`, `username`, `password`, `phone`, `email`, `address`, `security`, `date_of_reg`) VALUES
(1, 'season banjade', 'season', 'iamadmin', 2147483647, 'banjadeseason123@gma', 'kathmandu,nepal', 'zurich', '2016-07-04 15:59:17');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contact` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

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

CREATE TABLE IF NOT EXISTS `employee_record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(40) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `gender` varchar(11) NOT NULL,
  `phone` bigint(15) NOT NULL,
  `address` varchar(50) NOT NULL,
  `post` varchar(40) NOT NULL,
  `salary` int(11) NOT NULL,
  `date_of_join` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `employee_record`
--

INSERT INTO `employee_record` (`id`, `firstname`, `lastname`, `email`, `gender`, `phone`, `address`, `post`, `salary`, `date_of_join`) VALUES
(1, 'season', 'banjade', 'banjadseason123@gmail.com', 'male', 0, 'kathmandu', 'ceo', 6000000, '2012-12-12');

-- --------------------------------------------------------

--
-- Table structure for table `guest_record`
--

CREATE TABLE IF NOT EXISTS `guest_record` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `gender` varchar(20) NOT NULL,
  `phone` bigint(15) NOT NULL,
  `answer` varchar(20) NOT NULL,
  `date_of_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `guest_record`
--

INSERT INTO `guest_record` (`id`, `firstname`, `lastname`, `email`, `username`, `password`, `gender`, `phone`, `answer`, `date_of_reg`) VALUES
(1, 'season', 'banjade', 'banjadseason123@gmai', 'windy_anarchy', '115', 'male', 9811408860, 'zurich', '2016-07-04 14:13:28'),
(2, 'season', 'banjade', 'banjadseason13@gmail', 'season', '3f1b0333a44fd5f611d3', 'male', 9811408860, '', '2016-07-04 14:15:37'),
(3, '', '', '', '', 'season', '', 0, '', '2016-07-04 15:17:09'),
(4, 'season', 'banjade', 'banjadseason123@gmai', 'season', '618dea04a4b91f44a22c', 'male', 9811408861, '', '2016-07-07 05:56:01'),
(5, 'season', 'banjade', 'banjadseason123@gmai', 'season', 'b9615f2c16d298d8db45', 'male', 9811408863, '', '2016-07-07 05:57:03'),
(6, 'season', 'banjade', 'banjadseason123@gmai', 'season1', '51a1fbc6deef4d98e967', 'male', 9811408866, '', '2016-07-07 06:16:05'),
(7, 'season', 'banjade', 'banjadseason123@gmai', 'season2', 'ccccc', 'male', 9811408867, '', '2016-07-07 06:37:52'),
(8, 'season', 'banjade', 'banjadseason123@gmai', 'chandra', 'vvvvv', 'male', 9848680937, '', '2016-07-07 06:46:36'),
(9, 'season', 'banjade', 'banjadseason123@gmai', 'chandra1', '5dc681b21be635ba9a1d', 'male', 9848680939, '', '2016-07-07 07:15:27'),
(10, 'season', 'banjade', '', 'chandra12', 'ydtfuyguhij', 'male', 9848680936, '', '2016-07-07 07:45:38'),
(11, 'season', 'banjade', 'banjadseason123@gmail.com', 'chandra123', 'cgjhkl', 'male', 9848680922, '', '2016-07-07 07:47:17'),
(12, 'season', 'banjade', 'banjadseason123@gmail.com', 'chandra1234', 'drytfuyuhij', 'male', 9848680927, '', '2016-07-07 07:48:08'),
(13, 'season', 'banjade', 'season@gmaiil.com', 'season123', 'season123', 'male', 9847050259, '', '2016-07-07 14:45:45');

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE IF NOT EXISTS `home` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `content` varchar(3000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `home`
--

INSERT INTO `home` (`id`, `title`, `content`) VALUES
(1, '<h2>WEL COME TO FOUR SEASON RESORT</h2><h4>A PLACE WHERE PLEASURE NEVER FADES</h4>', 'Resort management system is web application to hotel management system. This system to provide service facilities to hotel and also to the customer. The services that are provided is reservation by customer, through system online, customer information management system. With this system online, reservation management will be easier and systematic to replace traditional systems."');

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

CREATE TABLE IF NOT EXISTS `logo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(400) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

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

CREATE TABLE IF NOT EXISTS `roombooked` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `type` varchar(30) NOT NULL,
  `full_name` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` bigint(15) NOT NULL,
  `address` varchar(40) NOT NULL,
  `price` varchar(10) NOT NULL,
  `room_no` varchar(40) NOT NULL,
  `booking_date` text NOT NULL,
  `end` varchar(4) NOT NULL,
  `status` varchar(30) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `roombooked`
--

INSERT INTO `roombooked` (`id`, `username`, `type`, `full_name`, `email`, `phone`, `address`, `price`, `room_no`, `booking_date`, `end`, `status`, `date`) VALUES
(5, 'season2', 'superdeluxe', 'seasonbanjade', 'banjadseason123@gmai', 8765432123, 'ktm', '', 'rfc-1234', '0000-00-00', '2', '', '2016-07-07 22:38:11'),
(6, 'season2', 'superdeluxe', 'seasonbanjade', 'banjadseason123@gmai', 9845673421, '9845321234', '', 'rfc-1234', '0000-00-00', '1', '', '2016-07-07 22:49:48'),
(7, 'season2', 'superdeluxe', 'seasonbanjade', 'banjadseason123@gmai', 9867534123, 'ktm', '', 'rfc-1234', '0000-00-00', '3', '', '2016-07-07 23:03:31'),
(8, 'season2', 'superdeluxe', 'seasonbanjade', 'banjadseason123@gmai', 1234567876, 'hhjhkj', '', 'rfc-1234', '0000-00-00', '1', '', '2016-07-07 23:07:59'),
(9, 'season2', 'deluxe', 'seasonbanjade', 'banjadseason123@gmai', 9811408860, 'fghjk', '', 'rfc1200', '0000-00-00', '3', '', '2016-07-07 23:16:51'),
(10, 'season2', 'deluxe', 'seasonbanjade', 'banjadseason123@gmai', 9811408860, 'ktm', '', 'rfc1200', '0000-00-00', '1', '', '2016-07-07 23:19:31'),
(11, 'season2', 'deluxe', 'seasonbanjade', 'banjadseason123@gmai', 9811408860, 'ktm', '', 'rfc1200', '0000-00-00', '1', '', '2016-07-07 23:21:07'),
(12, 'season2', 'deluxe', 'seasonbanjade', 'banjadseason123@gmai', 6712345432, 'ktm', '', 'rfc1200', '0000-00-00', '3', '', '2016-07-07 23:25:05'),
(13, 'season2', 'deluxe', 'seasonbanjade', 'banjadseason123@gmai', 6712345432, 'ktm', '', 'rfc1200', '0000-00-00', '3', '', '2016-07-07 23:29:51'),
(14, 'season2', 'deluxe', 'seasonbanjade', 'banjadseason123@gmai', 6712345432, 'ktm', '', 'rfc1200', '0000-00-00', '3', '', '2016-07-07 23:30:22'),
(15, 'season2', 'deluxe', 'seasonbanjade', 'banjadseason123@gmai', 9811408860, 'ktm', '', 'rfc1200', '0000-00-00', '-2', '', '2016-07-07 23:31:08'),
(16, 'season2', 'deluxe', 'seasonbanjade', 'banjadseason123@gmai', 9811408860, 'ktm', '', 'rfc1200', '.201675', '-2', '', '2016-07-07 23:32:12'),
(17, 'season2', 'deluxe', 'seasonbanjade', 'banjadseason123@gmai', 9811408860, 'ktm', '', 'rfc1200', '.201612', '3', '', '2016-07-07 23:32:37'),
(18, 'season2', 'deluxe', 'seasonbanjade', 'banjadseason123@gmai', 9811408860, 'ktm', '', 'rfc1200', '.2016-2-2', '1', '', '2016-07-07 23:34:16'),
(19, 'season2', 'honey-moon suite', 'seasonbanjade', 'banjadseason123@gmai', 9811408860, 'ktm', '$99', 'rfc 1504', '.2016-7-5', '7', 'available', '2016-07-08 00:09:55');

-- --------------------------------------------------------

--
-- Table structure for table `roomupload`
--

CREATE TABLE IF NOT EXISTS `roomupload` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `room_no` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `status` varchar(15) NOT NULL,
  `price` varchar(30) NOT NULL,
  `image` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `roomupload`
--

INSERT INTO `roomupload` (`id`, `room_no`, `type`, `status`, `price`, `image`) VALUES
(2, 'rfc-1234', 'superdeluxe', 'unavailable', '', '2_129_encore_salon_suite_bedroom.jpg'),
(3, '', '', 'available', '$73', 'h.jpg'),
(4, 'rfc-1501', 'honey-moon suite', 'available', '$89', ''),
(5, 'rfc 1504', 'honey-moon suite', 'unavailable', '$99', 'h.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

