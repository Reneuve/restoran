/*
SQLyog Ultimate v10.42 
MySQL - 5.5.16 : Database - restoran
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`restoran` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `restoran`;

/*Table structure for table `menu` */

DROP TABLE IF EXISTS `menu`;

CREATE TABLE `menu` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `harga` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

/*Data for the table `menu` */

insert  into `menu`(`id`,`nama`,`harga`) values (13,'Tempe',5000),(14,'Bakso',7000),(15,'Nasi Goreng',10000),(16,'Bayam',5000),(17,'Terong',5000),(18,'Rawon',15000);

/*Table structure for table `pelanggan` */

DROP TABLE IF EXISTS `pelanggan`;

CREATE TABLE `pelanggan` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `nama` varchar(25) DEFAULT NULL,
  `jenis_kel` enum('l','p') DEFAULT NULL,
  `no_hp` char(13) DEFAULT NULL,
  `alamat` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `pelanggan` */

insert  into `pelanggan`(`id`,`nama`,`jenis_kel`,`no_hp`,`alamat`) values (1,'Rafael','l','0821316782123','Surabaya'),(2,'Zeydan','l','0821321658885','Jombang'),(3,'Anisa','p','0821316825957','Jl.Giri asri 18'),(4,'Alan','l','0896536356847','Gresik'),(5,'Dini','p','0821321658885','Jombang'),(6,'Nagib','l','0821316825957','Bp Wetan'),(7,'azis','l','0821316825957','surabaya');

/*Table structure for table `pesanan` */

DROP TABLE IF EXISTS `pesanan`;

CREATE TABLE `pesanan` (
  `id` int(25) NOT NULL,
  `id_menu` int(25) DEFAULT NULL,
  `id_pelanggan` int(25) DEFAULT NULL,
  `jumlah` int(25) DEFAULT NULL,
  `id_user` int(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pesanan` */

insert  into `pesanan`(`id`,`id_menu`,`id_pelanggan`,`jumlah`,`id_user`) values (1,15,1,4,2),(2,14,3,25,2),(3,14,1,5,2),(4,14,2,5,11),(5,13,1,3,11),(6,13,1,3,2),(7,17,1,5,2),(8,18,7,2,2);

/*Table structure for table `transaksi` */

DROP TABLE IF EXISTS `transaksi`;

CREATE TABLE `transaksi` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `id_pesanan` int(25) DEFAULT NULL,
  `total` int(25) DEFAULT NULL,
  `bayar` int(25) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=latin1;

/*Data for the table `transaksi` */

insert  into `transaksi`(`id`,`id_pesanan`,`total`,`bayar`,`status`) values (72,1,40000,45000,1),(73,2,175000,180000,1),(74,3,35000,40000,1),(75,4,35000,40000,1),(76,5,15000,30000,1),(77,6,15000,20000,1),(78,7,25000,30000,1),(79,8,30000,35000,1);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `nama` varchar(25) DEFAULT NULL,
  `role` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id`,`nama`,`role`) values (1,'rafael','admin'),(2,'waiter','waiter'),(3,'kasir','kasir'),(6,'admin','admin'),(9,'waiter1','waiter'),(10,'kasir1','kasir'),(11,'waiterku','waiter'),(12,'userku','admin'),(13,'owner','owner'),(14,'kasirkis','kasir'),(15,'osop','admin'),(16,'kris','kasir');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
