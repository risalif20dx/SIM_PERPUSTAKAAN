/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.27-MariaDB : Database - db_simp
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_simp` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `db_simp`;

/*Table structure for table `tb_anggota` */

DROP TABLE IF EXISTS `tb_anggota`;

CREATE TABLE `tb_anggota` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `no_identitas` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `jabatan` tinyint(1) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telepon` varchar(15) NOT NULL,
  PRIMARY KEY (`no_identitas`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tb_anggota` */

insert  into `tb_anggota`(`id`,`nama`,`no_identitas`,`status`,`jabatan`,`email`,`alamat`,`no_telepon`) values 
(1,'Yusuf Ridho','1234',1,1,'ridho@teknokrat.ac.id','gedung tataan','1234556788'),
(2,'risal syawaludin','234123',1,2,'risal@teknokrat.ac.id','gedung tataan','8940184901'),
(8,'toat','73482',0,5,'toat@teknokrat.ac.id','taman sari','98479329846'),
(3,'lukas ','823982',1,3,'lukas@teknokrat.ac.id','teluk','7327848103'),
(5,'rusli','892382',0,4,'rusli@teknokrat.ac.id','panjang','8948912891'),
(7,'mimin','892893',0,5,'mimin@teknokrat.ac.id','kedaton','8948928923'),
(6,'datik','894891',1,4,'didit@teknokrat.ac.id','kedaton','8402901901');

/*Table structure for table `tb_buku` */

DROP TABLE IF EXISTS `tb_buku`;

CREATE TABLE `tb_buku` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_panggil` varchar(15) NOT NULL,
  `judul_buku` varchar(100) NOT NULL,
  `pengarang` varchar(50) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `bahasa` varchar(50) NOT NULL,
  `isbn_issn` varchar(17) NOT NULL,
  `edisi` int(11) DEFAULT NULL,
  `tahun_terbit` year(4) NOT NULL,
  `deskripsi_fisik` varchar(50) NOT NULL,
  `deskripsi_buku` longtext DEFAULT NULL,
  `sampul` varchar(20) NOT NULL,
  PRIMARY KEY (`no_panggil`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tb_buku` */

insert  into `tb_buku`(`id`,`no_panggil`,`judul_buku`,`pengarang`,`penerbit`,`bahasa`,`isbn_issn`,`edisi`,`tahun_terbit`,`deskripsi_fisik`,`deskripsi_buku`,`sampul`) values 
(4,'004.0151 BES f','Fundamental Optimalisasi dalam Rekayasa Struktur, Pemograman Matematika dan Metaheuristik','Mohamad Sahari kecili','Bandung : ITB Press., 2021','Indonesia','978-623-297-049-6',1,2021,'xvi + 173 hlm; ilust.','-','004.0151 BES f.jpg'),
(3,'004.6 ABD p','7 in 1 Pemrograman web untuk pemula','Rohi Abdullah','Jakarta : PT Elex Media Komputindo., 2019',' Indonesia','978-602-04-7943-9',1,2019,' xiv + 320 hlm','Bagi pemula, tentu akan sangat tertinggal jika tidak cepat mengejarnya. Buku ini membahas 7 materi utama dalam mempelajari pemrograman web. Ketujuh bahasan ini akan sangat membantu pemula yang ingin menjadi web programmer dalam waktu yang singkat.\r\nPembahasan dimulai dari pengetahuan dasar tentang pemrograman web, dilanjutkan dengan pembahasan 7 materi pemrograman web satu per satu disertai dengan contoh skrip beserta hasilnya. Disertai juga pembuatan aplikasi sederhana yang akan membantu pembaca menguasai pembuatan modul aplikasi.\r\nUntuk menunjang latihan pembaca, penulis juga menyertakan puluhan bonus skrip aplikatif.','004.6 ABD p.jpg'),
(1,'005.1 RAH p','Pemrograman Android dengan Flutter','Budi Raharjo','Bandung : Informatika., 2019','indonesia','978-623-7131-06-9',1,2019,'xiv + 354 hlm.','Buku ini berisi teknik-teknik yang diperlukan untuk membuat aplikasi Androld menggunakan Flutter, salah salu frarnework atau Software Development Kit (SDK) untuk pengembangan aplikasi mobile yang dapat berjalan di sistern operasi iOS dan Android. Meskipun Flutter dapat digunakan untuk mernbuat aplikasi untuk iOS. namun buku ini hanya membahas tentang penggunaan Flutter untuk Android\r\n\r\nFlutter diciptakan oleh Google dan dirilis pertama kall pada Mei 2017 (versi alpha). Pada Desernber 2018, Google meluncurkan Flutter 1.0.0 (versi stabil). Flutter menggunakan bahasa pernrograman Dart, yang juga diciptakan oleh Google dan dirilis pertama kali pada Oktober 2013. Flutter merupakan framework baru yang dirancang untuk rnempermudah dan mempercepat proses pembuatan aplikasi mobile, yang dulunya harus ditulis menggunakan Objective-C atau Switt (untuk i0S) dan Java atau Kotlin (untuk Androld). Dengan Flutter. kita hanya perlu mernpelajari satu bahasa pemrograrnan (Dart) untuk membuat aplikasi mobile yang dapat berjalan di dalam dua sistem operasi, iOS dan Android.','');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
