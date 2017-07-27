-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2013 at 08:55 AM
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
-- Table structure for table `badges_code`
--

DROP TABLE IF EXISTS `badges_code`;
CREATE TABLE IF NOT EXISTS `badges_code` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(50) DEFAULT NULL,
  `code_type` int(2) DEFAULT '1' COMMENT '1:common, 2:spesial',
  `code_channel` varchar(50) DEFAULT NULL,
  `code_sub_channel` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL,
  `n_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

-- --------------------------------------------------------

--
-- Table structure for table `badges_history`
--

DROP TABLE IF EXISTS `badges_history`;
CREATE TABLE IF NOT EXISTS `badges_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codeid` int(11) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `redeem_date` datetime DEFAULT NULL,
  `badgesid` int(11) DEFAULT NULL,
  `n_status` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `codeid` (`codeid`,`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `badges_source_type`
--

DROP TABLE IF EXISTS `badges_source_type`;
CREATE TABLE IF NOT EXISTS `badges_source_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `n_status` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `my_badges`
--

DROP TABLE IF EXISTS `my_badges`;
CREATE TABLE IF NOT EXISTS `my_badges` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `badgesid` int(11) DEFAULT NULL,
  `codeid` int(11) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `n_status` int(11) DEFAULT NULL COMMENT '0: not available 1 : available , 2: hold by bidding , 3: trading , 4: hold by collectable',
  `sourceType` int(11) DEFAULT NULL,
  `redeem_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `userid` (`userid`,`badgesid`,`codeid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
