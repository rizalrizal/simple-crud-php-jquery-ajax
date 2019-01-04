/*
SQLyog Enterprise v12.4.3 (64 bit)
MySQL - 10.1.25-MariaDB : Database - db_kampus
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_kampus` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_kampus`;

/*Table structure for table `tbl_mahasiswa` */

DROP TABLE IF EXISTS `tbl_mahasiswa`;

CREATE TABLE `tbl_mahasiswa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nim` char(10) DEFAULT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `jk` char(1) DEFAULT NULL,
  `alamat` text,
  `jurusan` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_mahasiswa` */

insert  into `tbl_mahasiswa`(`id`,`nim`,`nama`,`jk`,`alamat`,`jurusan`) values 
(1,'15.11.9292','Asvarizal Filcha','L','Jl. P. Puger 2','Informatika'),
(2,'16.11.9001','Hanzo','L','Jalan Apa Ya','Akuntansi'),
(3,'16.11.9002','Eudora','P','Ini Jalan','Teknologi Informasi'),
(4,'16.11.9003','Selena','P','Jalan Kebenaran','Manajemen'),
(5,'16.11.9004','Spongebob','L','Jalan Kah','Arsitektur'),
(6,'16.11.9005','Patrick','L','Yes Jalan','Informatika'),
(7,'16.11.9006','Jibril Wahab','L','Way adalah Jalan','Arsitektur'),
(8,'16.11.9007','Rasmus Lerdorf','L','Jalan Buntu','Informatika'),
(9,'16.11.9008','Fatimah','P','Jalanin Aja Dulu','Arsitektur'),
(10,'16.11.9009','Anna Baita','P','Jalan jalan','Informatika'),
(11,'16.11.9010','Bekti','L','Jalan Sesama','Informatika'),
(12,'16.11.9011','Sufi','L','Jalan Raya','Informatika'),
(14,'16.11.9013','Mo Salah','L','Anfield','Informatika');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
