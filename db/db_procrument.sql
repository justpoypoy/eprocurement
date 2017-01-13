/*
SQLyog Enterprise - MySQL GUI v8.05 
MySQL - 5.5.5-10.1.16-MariaDB : Database - db_procrument
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_procrument` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_procrument`;

/*Table structure for table `tb_barang` */

DROP TABLE IF EXISTS `tb_barang`;

CREATE TABLE `tb_barang` (
  `id_barang` int(4) NOT NULL AUTO_INCREMENT,
  `nm_barang` varchar(200) DEFAULT NULL,
  `harga` varchar(12) DEFAULT NULL,
  `id_satuan` int(4) DEFAULT NULL,
  `id_gudang` int(3) DEFAULT NULL,
  `stok` int(12) DEFAULT NULL,
  `id_supplier` int(3) DEFAULT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tb_barang` */

insert  into `tb_barang`(`id_barang`,`nm_barang`,`harga`,`id_satuan`,`id_gudang`,`stok`,`id_supplier`) values (1,'Minyak Sayur','900000',1,2,26,65),(2,'Minyak Tanah','5000000',1,3,114,65),(3,'Oli Mobil','2830300000',1,3,241,66);

/*Table structure for table `tb_form_supplier` */

DROP TABLE IF EXISTS `tb_form_supplier`;

CREATE TABLE `tb_form_supplier` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `no_po` varchar(10) DEFAULT NULL,
  `id_supplier` int(3) DEFAULT NULL,
  `id_satuan` int(1) DEFAULT NULL,
  `id_barang` int(3) DEFAULT NULL,
  `id_gudang` int(1) DEFAULT NULL,
  `harga` varchar(50) DEFAULT NULL,
  `jumlah` int(1) DEFAULT '0' COMMENT '0 = belum isi, 1 = sudah isi',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `tb_form_supplier` */

insert  into `tb_form_supplier`(`id`,`no_po`,`id_supplier`,`id_satuan`,`id_barang`,`id_gudang`,`harga`,`jumlah`) values (1,'PO-0001',66,1,1,2,'1000000',26),(2,'PO-0002',66,1,2,3,'1900000',21),(3,'PO-0001',65,1,1,2,'900000',26),(4,'PO-0002',65,1,2,3,'1800000',21),(5,'PO-0003',65,1,2,3,'5000000',114),(6,'PO-0004',65,1,3,3,'2830400000',241),(7,'PO-0004',66,1,3,3,'2830300000',241);

/*Table structure for table `tb_gudang` */

DROP TABLE IF EXISTS `tb_gudang`;

CREATE TABLE `tb_gudang` (
  `id_gudang` int(3) NOT NULL AUTO_INCREMENT,
  `nm_gudang` varchar(200) DEFAULT NULL,
  `flag_gudang` int(1) DEFAULT '0',
  PRIMARY KEY (`id_gudang`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tb_gudang` */

insert  into `tb_gudang`(`id_gudang`,`nm_gudang`,`flag_gudang`) values (1,'Supplier AA',2),(2,'Gudang A',1),(3,'Gudang B',1),(4,'Gudang C',1);

/*Table structure for table `tb_request` */

DROP TABLE IF EXISTS `tb_request`;

CREATE TABLE `tb_request` (
  `id_permintaan` int(12) NOT NULL AUTO_INCREMENT,
  `id_barang` int(12) DEFAULT NULL,
  `id_user_request` int(12) DEFAULT NULL,
  `id_satuan` int(3) DEFAULT NULL,
  `tanggal_req` timestamp NULL DEFAULT NULL,
  `status_req` int(2) DEFAULT NULL,
  `jumlah` int(5) DEFAULT NULL,
  `no_po` varchar(12) DEFAULT NULL,
  `id_gudang` int(4) DEFAULT NULL,
  PRIMARY KEY (`id_permintaan`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tb_request` */

insert  into `tb_request`(`id_permintaan`,`id_barang`,`id_user_request`,`id_satuan`,`tanggal_req`,`status_req`,`jumlah`,`no_po`,`id_gudang`) values (1,1,58,1,'2017-01-11 00:29:10',4,26,'PO-0001',2),(2,2,58,1,'2017-01-11 00:29:36',4,21,'PO-0002',3),(3,2,58,1,'2017-01-11 17:37:04',4,114,'PO-0003',3),(4,3,58,1,'2017-01-11 17:42:35',4,241,'PO-0004',3);

/*Table structure for table `tb_satuan` */

DROP TABLE IF EXISTS `tb_satuan`;

CREATE TABLE `tb_satuan` (
  `id_satuan` int(3) NOT NULL AUTO_INCREMENT,
  `nm_satuan` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id_satuan`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tb_satuan` */

insert  into `tb_satuan`(`id_satuan`,`nm_satuan`) values (1,'Liter');

/*Table structure for table `tb_status` */

DROP TABLE IF EXISTS `tb_status`;

CREATE TABLE `tb_status` (
  `id_status` int(4) NOT NULL,
  `nm_status` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_status` */

/*Table structure for table `tb_supplier` */

DROP TABLE IF EXISTS `tb_supplier`;

CREATE TABLE `tb_supplier` (
  `id_supplier` int(4) NOT NULL,
  `nm_supplier` varchar(20) DEFAULT NULL,
  `no_hp` varchar(12) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT '0',
  PRIMARY KEY (`id_supplier`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_supplier` */

insert  into `tb_supplier`(`id_supplier`,`nm_supplier`,`no_hp`,`email`,`alamat`) values (0,'Supervisor','1238123','email@gmail.com','jakarta'),(65,'minyak','08998600083','justpoypoy@gmail.com','jakarta'),(66,'minyak 2','08998600083','justpoypoy@gmail.com','bekasi'),(67,'minyak 3','08998600083','justpoypoy@gmail.com','lampung');

/*Table structure for table `tb_users` */

DROP TABLE IF EXISTS `tb_users`;

CREATE TABLE `tb_users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(32) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  `akses_level` varchar(20) DEFAULT NULL,
  `tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `no_hp` varchar(14) DEFAULT NULL,
  `status` int(2) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=69 DEFAULT CHARSET=latin1;

/*Data for the table `tb_users` */

insert  into `tb_users`(`id`,`nama`,`email`,`username`,`password`,`akses_level`,`tanggal`,`no_hp`,`status`) values (2,'admin','admin@gmail.com','admin','d033e22ae348aeb5660fc2140aec35850c4da997','1','2014-02-11 10:45:58',NULL,1),(58,NULL,NULL,'gudang','a80dd043eb5b682b4148b9fc2b0feabb2c606fff','2','2017-01-02 18:32:53',NULL,1),(59,NULL,NULL,'purchasing','0e0730d60c07bff650576eb44f31e96809633aaa','3','2017-01-02 18:33:48',NULL,1),(65,'minyak','email@gmail.com','minyak','f6f1e0706520db2306809e1b20a146cb9909d25e','6','2017-01-11 00:31:30','08998600083',1),(66,'minyak 2','email@gmail.com','minyakk','15ea2981ab5595875079740e01ffb304b8d9e8a6','6','2017-01-11 00:31:56','08998600083',1),(67,'minyak 3','email@gmail.com','minyakkk','91d8eadf77f50698cbd50492f859829ea45fd990','6','2017-01-11 00:32:14','08998600083',1),(68,'Supervisor','email@gmail.com','supervisor','0f4d09e43d208d5e9222322fbc7091ceea1a78c3','5','2017-01-11 19:04:04','1238123',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
