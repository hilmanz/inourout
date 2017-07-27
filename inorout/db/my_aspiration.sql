/*
SQLyog Enterprise - MySQL GUI v8.1 
MySQL - 5.5.32-0ubuntu0.13.04.1 : Database - marlboro_inorout_web
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`marlboro_inorout_web` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `marlboro_inorout_web`;

/*Table structure for table `my_aspiration` */

DROP TABLE IF EXISTS `my_aspiration`;

CREATE TABLE `my_aspiration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) DEFAULT NULL,
  `aspiration` text,
  `submit_date` datetime NOT NULL,
  `n_status` int(1) DEFAULT '2' COMMENT '1-> approved, 2->moderation needed, 3->previous asp, 4-> banned',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `my_aspiration` */

insert  into `my_aspiration`(id,userid,aspiration,submit_date,n_status) values (1,7071,'Miss you honhon â¤','2013-12-18 17:41:07',2),(2,7071,'Miss you honhon â¤â¤','2013-12-18 18:04:29',2);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
