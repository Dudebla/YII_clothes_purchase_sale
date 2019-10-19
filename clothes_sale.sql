/*
SQLyog Ultimate v12.08 (64 bit)
MySQL - 5.5.62 : Database - clothes_sale
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`clothes_sale` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `clothes_sale`;

/*Table structure for table `account` */

DROP TABLE IF EXISTS `account`;

CREATE TABLE `account` (
  `account_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `account_no` varchar(32) NOT NULL,
  `purchase_id` int(11) NOT NULL,
  `account_type` int(11) NOT NULL,
  `sell_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  UNIQUE KEY `account_id` (`account_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `account` */

/*Table structure for table `customer` */

DROP TABLE IF EXISTS `customer`;

CREATE TABLE `customer` (
  `cus_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cus_no` varchar(32) NOT NULL,
  `cus_name` varchar(32) NOT NULL,
  `telephone` varchar(11) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cus_id`),
  UNIQUE KEY `cus_id` (`cus_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `customer` */

/*Table structure for table `goods_detial` */

DROP TABLE IF EXISTS `goods_detial`;

CREATE TABLE `goods_detial` (
  `goods_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `goods_no` varchar(32) NOT NULL,
  `goods_name` varchar(32) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `material` varchar(32) DEFAULT NULL,
  `remark` text,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`goods_id`),
  UNIQUE KEY `goods_id` (`goods_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `goods_detial` */

/*Table structure for table `goods_type` */

DROP TABLE IF EXISTS `goods_type`;

CREATE TABLE `goods_type` (
  `type_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_name` varchar(32) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`type_id`),
  UNIQUE KEY `type_id` (`type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `goods_type` */

/*Table structure for table `inventory` */

DROP TABLE IF EXISTS `inventory`;

CREATE TABLE `inventory` (
  `inventory_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `goods_id` int(11) NOT NULL,
  `inventory_amount` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  UNIQUE KEY `inventory_id` (`inventory_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `inventory` */

/*Table structure for table `inventory_style` */

DROP TABLE IF EXISTS `inventory_style`;

CREATE TABLE `inventory_style` (
  `style_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `style` varchar(32) NOT NULL,
  `inven_style_amount` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  UNIQUE KEY `style_id` (`style_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `inventory_style` */

/*Table structure for table `purchase` */

DROP TABLE IF EXISTS `purchase`;

CREATE TABLE `purchase` (
  `purchase_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `purchase_no` varchar(32) NOT NULL,
  `goods_no` varchar(32) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `purchase_date` datetime DEFAULT NULL,
  `remark` text,
  `quantity` int(11) NOT NULL,
  `total_amount` decimal(5,2) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`purchase_id`),
  UNIQUE KEY `purchase_id` (`purchase_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `purchase` */

/*Table structure for table `saller_return` */

DROP TABLE IF EXISTS `saller_return`;

CREATE TABLE `saller_return` (
  `return_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sell_id` int(11) NOT NULL,
  `return_date` datetime DEFAULT NULL,
  `reason` varchar(100) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  UNIQUE KEY `return_id` (`return_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `saller_return` */

/*Table structure for table `saller_sales` */

DROP TABLE IF EXISTS `saller_sales`;

CREATE TABLE `saller_sales` (
  `sell_no` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `sell_id` int(11) NOT NULL,
  `sell_date` datetime DEFAULT NULL,
  `amount` decimal(5,2) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`sell_id`),
  UNIQUE KEY `sell_no` (`sell_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `saller_sales` */

/*Table structure for table `staff_message` */

DROP TABLE IF EXISTS `staff_message`;

CREATE TABLE `staff_message` (
  `staff_no` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `staff_id` varchar(32) NOT NULL,
  `staff_name` varchar(32) NOT NULL,
  `staff_log_name` varchar(24) NOT NULL,
  `staff_password` varchar(24) NOT NULL,
  `gender` int(11) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `address` varchar(64) NOT NULL,
  `staff_permissions` int(11) DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`staff_id`),
  UNIQUE KEY `staff_no` (`staff_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `staff_message` */

/*Table structure for table `supplier` */

DROP TABLE IF EXISTS `supplier`;

CREATE TABLE `supplier` (
  `supplier_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `supplier_no` varchar(32) NOT NULL,
  `supplier_name` varchar(32) NOT NULL,
  `contact` varchar(32) NOT NULL,
  `telephone` varchar(11) DEFAULT NULL,
  `address` varchar(32) NOT NULL,
  `remark` text,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`supplier_id`),
  UNIQUE KEY `supplier_id` (`supplier_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `supplier` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
