-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2013 at 10:45 AM
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
-- Table structure for table `badges`
--

DROP TABLE IF EXISTS `badges`;
CREATE TABLE IF NOT EXISTS `badges` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `image` varchar(200) NOT NULL,
  `desc` varchar(200) DEFAULT NULL,
  `type` int(11) DEFAULT NULL COMMENT '0: common; 1:special',
  `point` int(11) NOT NULL,
  `prob` int(11) NOT NULL COMMENT 'in %',
  `n_status` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `badges`
--

INSERT INTO `badges` (`id`, `name`, `image`, `desc`, `type`, `point`, `prob`, `n_status`) VALUES
(1, 'badges A', '', 'badges testing A', 0, 0, 1, 1),
(2, 'badges B', '', 'badges testing B', 0, 0, 2, 1),
(3, 'badges C', '', 'badges testing C', 0, 0, 3, 1);

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

--
-- Dumping data for table `badges_code`
--

INSERT INTO `badges_code` (`id`, `code`, `code_type`, `code_channel`, `code_sub_channel`, `created_date`, `n_status`) VALUES
(1, '173yr3fw', 1, 'kapuk', '', '0000-00-00 00:00:00', 1),
(2, '6R9GUA7MWS', 1, 'digital banner', 'TEST SUBJECT CODES', '2013-12-12 16:07:57', 1),
(3, '5H4XZYRJ6B', 1, 'digital banner', 'TEST SUBJECT CODES', '2013-12-12 16:07:57', 1),
(4, 'R3Z85DPCQV', 1, 'digital banner', 'TEST SUBJECT CODES', '2013-12-12 16:07:57', 1),
(5, '2YBSVQJ7NG', 1, 'digital banner', 'TEST SUBJECT CODES', '2013-12-12 16:07:57', 1),
(6, 'EGSKRT28HV', 1, 'digital banner', 'TEST SUBJECT CODES', '2013-12-12 16:07:57', 1),
(7, 'G2F9WPTVD5', 1, 'digital banner', 'TEST SUBJECT CODES', '2013-12-12 16:07:57', 1),
(8, 'TG9PVBED5M', 1, 'digital banner', 'TEST SUBJECT CODES', '2013-12-12 16:07:57', 1),
(9, '8C5EF76RUK', 1, 'digital banner', 'TEST SUBJECT CODES', '2013-12-12 16:07:57', 1),
(10, 'HXCSK98FV6', 1, 'digital banner', 'TEST SUBJECT CODES', '2013-12-12 16:07:57', 1),
(11, 'D7SBVRQJTF', 1, 'digital banner', 'TEST SUBJECT CODES', '2013-12-12 16:07:57', 1),
(12, 'STVR9Q5K8Y', 1, 'kana', 'cipta media', '2013-12-12 16:44:34', 1),
(13, 'YBXKFUD39S', 1, 'kana', 'cipta media', '2013-12-12 16:44:34', 1),
(14, 'T92GD3V6AZ', 1, 'kana', 'cipta media', '2013-12-12 16:44:34', 1),
(15, 'XRT8E3MFUV', 1, 'kana', 'cipta media', '2013-12-12 16:44:34', 1),
(16, 'R9EQS7HCZP', 1, 'kana', 'cipta media', '2013-12-12 16:44:34', 1),
(17, 'PEFN549RHD', 1, 'kana', 'cipta media', '2013-12-12 16:44:34', 1),
(18, '8H9WYRADNB', 1, 'kana', 'cipta media', '2013-12-12 16:44:34', 1),
(19, 'BW7X948Z5C', 1, 'kana', 'cipta media', '2013-12-12 16:44:34', 1),
(20, 'BKH534PCWR', 1, 'kana', 'cipta media', '2013-12-12 16:44:34', 1),
(21, 'T59AZEPJU7', 1, 'kana', 'cipta media', '2013-12-12 16:44:34', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `badges_history`
--

INSERT INTO `badges_history` (`id`, `codeid`, `userid`, `redeem_date`, `badgesid`, `n_status`) VALUES
(1, 1, 1, '2013-12-12 15:45:59', 3, 1),
(2, 6, 1, '2013-12-12 16:11:56', 3, 1),
(3, 5, 1, '2013-12-12 16:13:34', 3, 1);

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
-- Table structure for table `badges_tooltips`
--

DROP TABLE IF EXISTS `badges_tooltips`;
CREATE TABLE IF NOT EXISTS `badges_tooltips` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT NULL,
  `content` text,
  `link` varchar(200) DEFAULT NULL,
  `n_status` int(11) DEFAULT NULL COMMENT '0->unpublish, 1->publish',
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `my_badges`
--

INSERT INTO `my_badges` (`id`, `badgesid`, `codeid`, `userid`, `n_status`, `sourceType`, `redeem_date`) VALUES
(1, 3, 1, 1, 0, NULL, '2013-12-12 15:45:59'),
(5, 3, 6, 1, 0, NULL, '2013-12-12 16:11:56'),
(6, 3, 5, 1, 0, NULL, '2013-12-12 16:13:34');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
