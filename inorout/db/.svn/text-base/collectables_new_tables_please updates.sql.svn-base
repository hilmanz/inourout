-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2014 at 05:28 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `marlboro_inorout_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `collectables`
--

DROP TABLE IF EXISTS `collectables`;
CREATE TABLE IF NOT EXISTS `collectables` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `detail` text,
  `image` varchar(200) DEFAULT NULL,
  `image_thumb` varchar(200) DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `point` int(11) NOT NULL,
  `merchandise_type` int(11) NOT NULL,
  `postdate` date DEFAULT NULL,
  `n_status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `collectables`
--

INSERT INTO `collectables` (`id`, `name`, `detail`, `image`, `image_thumb`, `stock`, `point`, `merchandise_type`, `postdate`, `n_status`) VALUES
(1, 'BAG BROWN', 'BAG BROWN', '5b064e1982e8f43b0990abfc80c333b8.jpg', NULL, 10, 3500, 0, '2013-11-11', 1),
(2, 'BAG BLACK GREEN PINK', 'BAG BLACK GREEN PINK', '32b08fb69876449be8238b20e3ef38a4.jpg', NULL, 5, 10000, 4, '2013-11-11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `collectables_requirement_badge`
--

DROP TABLE IF EXISTS `collectables_requirement_badge`;
CREATE TABLE IF NOT EXISTS `collectables_requirement_badge` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `merchandiseid` int(11) NOT NULL,
  `badgecode` int(11) NOT NULL,
  `n_status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `collectables_requirement_badge`
--

INSERT INTO `collectables_requirement_badge` (`id`, `merchandiseid`, `badgecode`, `n_status`) VALUES
(1, 1, 1, 1),
(2, 1, 1, 1),
(3, 1, 2, 1),
(4, 1, 1, 1),
(5, 1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `my_collectables`
--

DROP TABLE IF EXISTS `my_collectables`;
CREATE TABLE IF NOT EXISTS `my_collectables` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `merchandiseid` int(11) NOT NULL,
  `redeemdate` datetime NOT NULL,
  `date_redeemed` datetime NOT NULL COMMENT 'Date After Admin Check Confirm',
  `name` varchar(150) NOT NULL,
  `address` text NOT NULL,
  `phonenumber` varchar(30) NOT NULL,
  `email` varchar(250) NOT NULL,
  `merhcandise_type` int(11) NOT NULL,
  `n_status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `my_collectables`
--

INSERT INTO `my_collectables` (`id`, `userid`, `merchandiseid`, `redeemdate`, `date_redeemed`, `name`, `address`, `phonenumber`, `email`, `merhcandise_type`, `n_status`) VALUES
(32, 1, 1, '2014-01-02 23:24:14', '2014-01-02 23:24:14', 'aruka', '', '', 'aruka', 0, 0),
(33, 1, 1, '2014-01-02 23:26:25', '2014-01-02 23:26:25', 'aruka', '', '', 'aruka', 0, 0),
(34, 1, 1, '2014-01-02 23:26:29', '2014-01-02 23:26:29', 'aruka', '', '', 'aruka', 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
