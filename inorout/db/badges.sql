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

/*Table structure for table `badges` */

DROP TABLE IF EXISTS `badges`;

CREATE TABLE `badges` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `image` varchar(200) NOT NULL,
  `desc` text,
  `type` int(11) DEFAULT NULL COMMENT '0: common; 1:special',
  `point` int(11) NOT NULL,
  `prob` int(11) NOT NULL COMMENT 'in %',
  `n_status` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `badges` */

insert  into `badges`(id,name,image,`desc`,type,point,prob,n_status) values (1,'TEMPLE GATE','badges-1.png','Go back in time and immerse yourself in the historical sights of the city. \r\nPay close attention to every architectural detail and ornament of each building you walk by.',0,500,1,1),(2,'DJ TURNTABLE','badges-2.png','Since its introduction in the 1930s, this device further on symbolizes the modern clubbing scene all over the world. \r\nTalking about clubbing, London is the home for world\'s best clubs and DJs. You really haven\'t visited London if you haven\'t gone to one of its clubs.',0,300,2,1),(3,'THE CAMERA','badges-3.png','Nothing beats off the feeling of capturing unforgettable moments and relive them later once you\'ve returned home. Pick an angle and strike a pose!',0,900,3,1),(4,'THE BIG APPLE','badges-4.png','Dream big and become the citizen of the world. We\'ll make it happen for you!',NULL,4500,1,1),(5,'THE DOUBLE-DECKER','badges-5.png','Explore every nook and cranny of London and make multiple stops at unforgettable new places.',NULL,600,1,1),(6,'BOWLER / DERBY','badges-6.png','This particular item poses as an important fashion statement among Londoners.\r\nDiscover the stylish side of the city as you journey down to meet with one of the acclaimed designers.',NULL,200,1,1),(7,'MAKE A RECORD','badges-7.png','Take your karaoke skill to a new level and render a famous song your own way. Get a VIP tour to a famous recording studio in NYC and chat with an international artist in person!',NULL,750,1,1),(8,'RED TELEPHONE BOX','badges-8.png','This iconic landmark welcomes you into the city and is a reminder to share every bit of your exciting experience with your friends.',NULL,500,1,1),(9,'THE EXPRESS LANE','badges-9.png','Enjoy this world\'s fastest and smoothest ride ever.\r\nThe fastest shinkansen can move up to 320km/h and is projected to have increased its speed by 40km/h by 2020.',NULL,800,1,1),(10,'SUSHI','badges-10.png','Go authentic and raw. Because some said that the best way to enjoy a culture is through its delicacies.',NULL,700,1,1),(11,'YELLOW CAB','badges-11.png','Sometimes the best way to enjoy the view is when you sit on the back seat. This ride will take you anywhere you want to be.',NULL,2500,1,1),(12,'JAPANESE PAPER LANTERN','badges-12.png','Revel in the breathtaking views of the city in the evening as you stroll down the streets and alleys filled with hundreds of dim-lit lights across every corner. The writing in it is called chochin moji in Japanese, used specifically for advertising purpose since the 16th - 18th century.',NULL,1500,1,1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
