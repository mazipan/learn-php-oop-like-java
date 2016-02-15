/*
SQLyog Enterprise - MySQL GUI v8.14 
MySQL - 5.6.16 : Database - myweb_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`myweb_db` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `myweb_db`;

/*Table structure for table `categories` */

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `categories` */

insert  into `categories`(`id`,`name`,`created`,`modified`) values (3,'Some Category','2014-12-05 14:45:05','2014-12-05 14:45:05'),(1,'Electronics','2014-06-01 00:35:07','2014-12-05 14:42:27'),(2,'New Category','2014-12-05 14:43:17','2014-12-05 14:43:17');

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `products` */

insert  into `products`(`id`,`name`,`description`,`price`,`category_id`,`created`,`modified`) values (1,'LG P880 4X HD','My first awesome phone!',336,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,'Google Nexus 4','The most awesome phone of 2013!',299,2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,'Samsung Galaxy S4','How about no?',600,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(6,'Bench Shirt','The best shirt!',29,1,'2014-06-01 01:12:26','2014-05-31 10:12:21'),(7,'Lenovo Laptop','My business partner.',399,2,'2014-06-01 01:13:45','2014-05-31 10:13:39'),(8,'Samsung Galaxy Tab 10.1','Good tablet.',259,2,'2014-06-01 01:14:13','2014-05-31 10:14:08'),(9,'Spalding Watch','My sports watch.',199,1,'2014-06-01 01:18:36','2014-05-31 10:18:31'),(10,'Sony Smart Watch','The coolest smart watch!',300,2,'2014-06-06 17:10:01','2014-06-06 02:09:51'),(11,'Huawei Y300','For testing purposes.',100,2,'2014-06-06 17:11:04','2014-06-06 02:10:54'),(12,'Abercrombie Lake Arnold Shirt','Perfect as gift!',60,1,'2014-06-06 17:12:21','2014-06-06 02:12:11'),(13,'Abercrombie Allen Brook Shirt','Cool red shirt!',70,1,'2014-06-06 17:12:59','2014-06-06 02:12:49');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
