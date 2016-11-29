/*
SQLyog - Free MySQL GUI v5.0
Host - 5.7.12-log : Database - pemesanan
*********************************************************************
Server version : 5.7.12-log
*/


create database if not exists `pemesanan`;

USE `pemesanan`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `user_id` int(10) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `user_email` varchar(20) NOT NULL,
  `user_pass` varchar(20) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `admin` */

insert into `admin` values 
(1,'admin','admin@gmail.com','admin');

/*Table structure for table `customer` */

DROP TABLE IF EXISTS `customer`;

CREATE TABLE `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) NOT NULL,
  `dari` varchar(30) NOT NULL,
  `ke` varchar(20) NOT NULL,
  `jadwal` varchar(30) NOT NULL,
  `jumlah` varchar(30) NOT NULL,
  `total` varchar(10) NOT NULL,
  `statusPemb` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `customer` */

insert into `customer` values 
(1,'Lukas','Medan','Surabaya','2016-03-05','1','500000','Belum');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(15) NOT NULL,
  `user_email` varchar(40) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `joining_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert into `users` values 
(3,'Lukas','lunalu@gmail.com','$2y$10$TVA7VqrJuoxLfpkuuNC/KOkDA6idH1a5e6GtwYXLQGov4Q6s6Yvuq','2016-10-21 15:57:41'),
(2,'ccs','ccd@gmail.com','$2y$10$m6DxInKRr2j7x8agHlw4QugfI0ghYmvODvub6owqI2gXZB63Wyi7u','2016-10-21 21:34:19'),
(7,'Pabwe SCRIPT','pabwe@gmail.com','$2y$10$XfaUstZrKGv.AIhOq0eYL.tNgHdLlqXL2ZMDdyr3/r.3LEqtdv0ni','2016-10-25 16:24:55');
