/*
SQLyog Ultimate v12.4.1 (64 bit)
MySQL - 10.1.21-MariaDB : Database - spkdt
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`spkdt` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `spkdt`;

/*Table structure for table `akun` */

DROP TABLE IF EXISTS `akun`;

CREATE TABLE `akun` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(30) NOT NULL,
  `password` CHAR(128) NOT NULL,
  `namaPengguna` VARCHAR(64) NOT NULL,
  `des` INT(1) DEFAULT NULL,
  `last_login` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=INNODB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
SELECT * FROM akun;
/*Data for the table `akun` */

INSERT  INTO `akun`(`id`,`username`,`password`,`namaPengguna`,`des`,`last_login`) VALUES 
(1,'genii1998','genii1998','Genii',0,NULL),
(3,'nathan','nathan','Nathan Nainggolan',0,NULL),
(4,'admin','admin','admin',0,NULL);

/*Table structure for table `data_kapal` */

DROP TABLE IF EXISTS `data_kapal`;

CREATE TABLE `data_kapal` (
  `idKapal` INT(2) NOT NULL,
  `namaKapal` VARCHAR(30) DEFAULT NULL,
  `asalKapal` VARCHAR(30) DEFAULT NULL,
  `tujuanKapal` VARCHAR(30) DEFAULT NULL,
  `jamBerangkat` TIME DEFAULT NULL,
  `jamTiba` TIME DEFAULT NULL,
  `golonganPenumpang` VARCHAR(20) DEFAULT NULL,
  `harga` DOUBLE DEFAULT NULL,
  `muatan` INT(10) DEFAULT NULL,
  PRIMARY KEY (`idKapal`)
) ENGINE=INNODB DEFAULT CHARSET=latin1;

/*Data for the table `data_kapal` */

INSERT  INTO `data_kapal`(`idKapal`,`namaKapal`,`asalKapal`,`tujuanKapal`,`jamBerangkat`,`jamTiba`,`golonganPenumpang`,`harga`,`muatan`) VALUES 
(1,'Ferry A','Tomok','Ajibata','07:00:00','08:00:00','umum',50000,50),
(2,'Ferry B','Tomok','Ajibata','10:00:00','11:00:00','umum',50000,50),
(3,'Ferry C','Tomok','Ajibata','13:00:00','14:00:00','umum',50000,50),
(4,'Ferry D','Tomok','Ajibata','16:00:00','17:00:00','umum',50000,50),
(5,'Ferry E','Tomok','Ajibata','19:30:00','20:30:00','umum',50000,50),
(6,'Ferry F','Ajibata','Tomok','08:30:00','09:30:00','umum',50000,50),
(7,'Ferry G','Ajibata','Tomok','11:30:00','12:30:00','umum',50000,50),
(8,'Ferry H','Ajibata','Tomok','14:30:00','15:30:00','umum',50000,50),
(9,'Ferry I','Ajibata','Tomok','17:45:00','18:45:00','umum',50000,50),
(10,'Ferry J','Ajibata','Tomok','21:00:00','22:00:00','umum',50000,50),
(11,'Ferry K','Simanindo','Tigaras','07:00:00','07:45:00','umum',50000,50),
(12,'Ferry L','Simanindo','Tigaras','09:00:00','09:45:00','umum',50000,50),
(13,'Ferry M','Simanindo','Tigaras','10:30:00','11:15:00','umum',50000,50),
(14,'Ferry N','Simanindo','Tigaras','12:30:00','13:15:00','umum',50000,50),
(15,'Ferry O','Simanindo','Tigaras','14:00:00','14:45:00','umum',50000,50),
(16,'Ferry P','Simanindo','Tigaras','16:00:00','16:45:00','umum',50000,50),
(17,'Ferry Q','Simanindo','Tigaras','18:00:00','18:45:00','umum',50000,50),
(18,'Ferry R','Tigaras','Simanindo','08:00:00','08:45:00','umum',50000,50),
(19,'Ferry S','Tigaras','Simanindo','09:30:00','10:15:00','umum',50000,50),
(20,'Ferry X','Tigaras','Simanindo','11:30:00','12:15:00','umum',50000,50),
(21,'Ferry T','Tigaras','Simanindo','13:30:00','14:15:00','umum',50000,50),
(22,'Ferry U','Tigaras','Simanindo','15:00:00','15:45:00','umum',50000,50),
(23,'Ferry V','Tigaras','Simanindo','17:00:00','17:45:00','umum',50000,50),
(24,'Ferry W','Tigaras','Simanindo','19:30:00','20:15:00','umum',50000,50);

/*Table structure for table `tiket` */

DROP TABLE IF EXISTS `tiket`;

CREATE TABLE `tiket` (
  `idTiket` INT(11) NOT NULL AUTO_INCREMENT,
  `idKapal` INT(11) NOT NULL,
  `idPengguna` INT(11) NOT NULL,
  `status` TINYINT(1) DEFAULT '0',
  PRIMARY KEY (`idTiket`),
  KEY `idKapal` (`idKapal`),
  KEY `idPengguna` (`idPengguna`),
  CONSTRAINT `tiket_ibfk_1` FOREIGN KEY (`idKapal`) REFERENCES `data_kapal` (`idKapal`),
  CONSTRAINT `tiket_ibfk_2` FOREIGN KEY (`idPengguna`) REFERENCES `akun` (`id`)
) ENGINE=INNODB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

/*Data for the table `tiket` */

INSERT  INTO `tiket`(`idTiket`,`idKapal`,`idPengguna`,`status`) VALUES 
(16,4,4,1),
(17,7,4,1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;


SELECT * FROM tiket;
SELECT * FROM akun;






