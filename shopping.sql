-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2021 at 05:34 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `serial` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(80) COLLATE latin1_general_ci NOT NULL,
  `address` varchar(80) COLLATE latin1_general_ci NOT NULL,
  `phone` varchar(20) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`serial`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`serial`, `name`, `email`, `address`, `phone`) VALUES
(1, 'OBH Classic 2', 'syedahs@outlook.com', 'hfth', '+923333333333');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `serial` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `customerid` int(11) NOT NULL,
  PRIMARY KEY (`serial`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`serial`, `date`, `customerid`) VALUES
(1, '2021-01-23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE IF NOT EXISTS `order_detail` (
  `orderid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`orderid`, `productid`, `quantity`, `price`) VALUES
(1, 2, 1, 396);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `link` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `link`) VALUES
(1, 'Bootstrap Datepicker Start and End date Validation', 'You can easily enable date selection to the form element using Bootstrap datepicker if you are already using Bootstrap in your page. You need to add external Bootstrap datepicker l ...', 'https://makitweb.com/bootstrap-datepicker-start-and-end-date-validation/'),
(2, 'How to Make Bootstrap Modal with File Upload and Preview - jQuery AJAX', 'Bootstrap Modal is a popup container which use to show various types of information on the screen. It is very flexible and user-friendly. You can display new entry or update form i ...', 'https://makitweb.com/bootstrap-datepicker-start-and-end-date-validation/'),
(3, 'Bootstrap Datepicker Start and End date Validation', 'You can easily enable date selection to the form element using Bootstrap datepicker if you are already using Bootstrap in your page. You need to add external Bootstrap datepicker l ...', 'https://makitweb.com/bootstrap-datepicker-start-and-end-date-validation/'),
(4, 'Bootstrap Datepicker Start and End date Validation', 'You can easily enable date selection to the form element using Bootstrap datepicker if you are already using Bootstrap in your page. You need to add external Bootstrap datepicker l ...', 'https://makitweb.com/bootstrap-datepicker-start-and-end-date-validation/'),
(5, 'How to Make Bootstrap Modal with File Upload and Preview - jQuery AJAX', 'Bootstrap Modal is a popup container which use to show various types of information on the screen. It is very flexible and user-friendly. You can display new entry or update form i ...', 'https://makitweb.com/bootstrap-datepicker-start-and-end-date-validation/'),
(6, 'Bootstrap Datepicker Start and End date Validation', 'You can easily enable date selection to the form element using Bootstrap datepicker if you are already using Bootstrap in your page. You need to add external Bootstrap datepicker l ...', 'https://makitweb.com/bootstrap-datepicker-start-and-end-date-validation/'),
(7, 'How to Make Bootstrap Modal with File Upload and Preview - jQuery AJAX', 'Bootstrap Modal is a popup container which use to show various types of information on the screen. It is very flexible and user-friendly. You can display new entry or update form i ...', 'https://makitweb.com/bootstrap-datepicker-start-and-end-date-validation/'),
(8, 'Bootstrap Datepicker Start and End date Validation', 'You can easily enable date selection to the form element using Bootstrap datepicker if you are already using Bootstrap in your page. You need to add external Bootstrap datepicker l ...', 'https://makitweb.com/bootstrap-datepicker-start-and-end-date-validation/'),
(9, 'How to Make Bootstrap Modal with File Upload and Preview - jQuery AJAX', 'Bootstrap Modal is a popup container which use to show various types of information on the screen. It is very flexible and user-friendly. You can display new entry or update form i ...', 'https://makitweb.com/bootstrap-datepicker-start-and-end-date-validation/'),
(10, 'Bootstrap Datepicker Start and End date Validation', 'You can easily enable date selection to the form element using Bootstrap datepicker if you are already using Bootstrap in your page. You need to add external Bootstrap datepicker l ...', 'https://makitweb.com/bootstrap-datepicker-start-and-end-date-validation/'),
(11, 'How to Make Bootstrap Modal with File Upload and Preview - jQuery AJAX', 'Bootstrap Modal is a popup container which use to show various types of information on the screen. It is very flexible and user-friendly. You can display new entry or update form i ...', 'https://makitweb.com/bootstrap-datepicker-start-and-end-date-validation/');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(10) COLLATE latin1_general_ci NOT NULL DEFAULT 'inactive',
  `color` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `price` float NOT NULL,
  `picture` varchar(80) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=48 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `status`, `color`, `user_id`, `name`, `price`, `picture`) VALUES
(1, 'inactive', 'White', 1, 'Google Nexus 6', 699, 'mobile.jpg'),
(2, 'inactive', 'Golden', 1, 'Ipad Air 2', 396, 'ipad.jpg'),
(3, 'inactive', 'Black', 1, 'Home Theater', 64, 'sound.jpg'),
(4, 'inactive', 'Black', 3, 'Samsung Split AC', 461, 'ac.jpg'),
(5, 'inactive', 'blue', 2, 'Nikon DSLR Camera', 850, 'camera.jpg'),
(6, 'publish', 'Blue', 2, 'Tea maker', 41, 'teamaker.jpg'),
(7, 'inactive', 'Black', 3, 'Product 4', 222, 'mobile.jpg'),
(8, 'publish', 'Blue', 3, 'Product 5', 100, 'ipad1.jpg'),
(46, 'publish', 'Blue', 3, 'Wooden kit', 2222, 'teamaker1.jpg'),
(47, 'publish', 'blue', 3, 'sfsdf', 333, 'blahblah.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `auth` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `fname`, `auth`) VALUES
(1, 'test@gmail.com', '11111', 'Neovic Devierte', 0),
(2, 'test2@gmail.com', 'cepe', 'Gemalyn Cepe', 0),
(3, 'syedahs@outlook.com', '1234567', 'Syedah Rabia Bukhari', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
