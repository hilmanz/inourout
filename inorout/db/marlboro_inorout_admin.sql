-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2013 at 09:36 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `marlboro_inorout_admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_pages_modules`
--

DROP TABLE IF EXISTS `admin_pages_modules`;
CREATE TABLE IF NOT EXISTS `admin_pages_modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module` varchar(200) NOT NULL,
  `classcall` varchar(200) NOT NULL,
  `n_status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_data` (`classcall`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `admin_pages_permission`
--

DROP TABLE IF EXISTS `admin_pages_permission`;
CREATE TABLE IF NOT EXISTS `admin_pages_permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pagetype` int(11) NOT NULL,
  `moduleid` int(11) NOT NULL,
  `acts` varchar(200) NOT NULL,
  `datetimes` datetime NOT NULL,
  `n_status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_data` (`pagetype`,`moduleid`,`acts`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `admin_roles`
--

DROP TABLE IF EXISTS `admin_roles`;
CREATE TABLE IF NOT EXISTS `admin_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `type` int(11) NOT NULL COMMENT 'type of this pages',
  `img` varchar(200) NOT NULL,
  `created_date` datetime NOT NULL,
  `closed_date` datetime NOT NULL,
  `n_status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ownerid` (`userid`),
  KEY `name` (`name`),
  KEY `type` (`type`),
  KEY `created_date` (`created_date`),
  KEY `closed_date` (`closed_date`),
  KEY `n_status` (`n_status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `admin_roles_type`
--

DROP TABLE IF EXISTS `admin_roles_type`;
CREATE TABLE IF NOT EXISTS `admin_roles_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `definition` varchar(200) DEFAULT NULL,
  `n_status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`),
  KEY `n_status` (`n_status`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin_roles_type`
--

INSERT INTO `admin_roles_type` (`id`, `name`, `definition`, `n_status`) VALUES
(1, 'superuser', 'super user aja', 1),
(2, 'admin', 'admin user aja', 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

DROP TABLE IF EXISTS `admin_users`;
CREATE TABLE IF NOT EXISTS `admin_users` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `registerid` varchar(200) NOT NULL,
  `name` varchar(46) DEFAULT NULL,
  `nickname` varchar(50) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `img` varchar(200) DEFAULT NULL,
  `small_img` varchar(200) DEFAULT NULL,
  `username` varchar(46) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `city` int(11) DEFAULT NULL,
  `sex` varchar(11) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `description` text,
  `last_name` varchar(46) DEFAULT NULL,
  `n_status` int(3) NOT NULL DEFAULT '0',
  `login_count` int(11) NOT NULL DEFAULT '0',
  `try_to_login` int(11) NOT NULL,
  `last_log_id` int(11) NOT NULL,
  `verified` tinyint(3) DEFAULT '0' COMMENT '0->no hp blm verified, 1->sudah verified.',
  `salt` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `registerid` (`registerid`),
  KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=218 ;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `registerid`, `name`, `nickname`, `email`, `register_date`, `img`, `small_img`, `username`, `last_login`, `city`, `sex`, `birthday`, `description`, `last_name`, `n_status`, `login_count`, `try_to_login`, `last_log_id`, `verified`, `salt`, `password`) VALUES
(217, '', 'bummi', 'bummi', 'bummi@kana.co,id', '2013-11-29 16:59:01', NULL, NULL, 'bummi@kana.co.id', '2013-12-13 14:34:32', 123, 'YES', '2013-11-21', NULL, 'dwi', 1, 6, 0, 0, 1, '12345678', '2f7aa0afe8a34a70804bc6a83c5ddc626e8fd3ac');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_activity_actions`
--

DROP TABLE IF EXISTS `tbl_activity_actions`;
CREATE TABLE IF NOT EXISTS `tbl_activity_actions` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `activityName` varchar(64) DEFAULT NULL,
  `type` varchar(200) NOT NULL,
  `point` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `activityName` (`activityName`),
  KEY `point` (`point`),
  KEY `type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_activity_log`
--

DROP TABLE IF EXISTS `tbl_activity_log`;
CREATE TABLE IF NOT EXISTS `tbl_activity_log` (
  `id` bigint(21) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(21) NOT NULL,
  `date_ts` int(11) DEFAULT '0',
  `date_time` datetime DEFAULT NULL,
  `action_id` int(4) DEFAULT '0',
  `action_value` varchar(140) DEFAULT NULL,
  `ipaddress` varchar(200) NOT NULL,
  `fromenv` int(11) NOT NULL,
  `session` text,
  `n_status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_log_id` (`user_id`,`date_ts`,`date_time`),
  KEY `user_id` (`user_id`),
  KEY `actions` (`action_id`,`action_value`),
  KEY `date_ts` (`date_ts`),
  KEY `ipaddress` (`ipaddress`),
  KEY `n_status` (`n_status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_exp_point`
--

DROP TABLE IF EXISTS `tbl_exp_point`;
CREATE TABLE IF NOT EXISTS `tbl_exp_point` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `date_time_ts` int(11) NOT NULL,
  `date_time` datetime NOT NULL,
  `activity_id` int(11) NOT NULL,
  `score` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_data` (`user_id`,`date_time_ts`),
  KEY `user_id` (`user_id`),
  KEY `date_time_ts` (`date_time_ts`),
  KEY `date_time` (`date_time`),
  KEY `activity_id` (`activity_id`),
  KEY `score` (`score`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
