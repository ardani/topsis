# ************************************************************
# Sequel Pro SQL dump
# Version 4499
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.42)
# Database: topsisdb
# Generation Time: 2016-02-14 03:19:10 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table batas_nilai
# ------------------------------------------------------------

DROP TABLE IF EXISTS `batas_nilai`;

CREATE TABLE `batas_nilai` (
  `id_batas_nilai` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `kode_kriteria` varchar(2) DEFAULT NULL,
  `nilai_awal` int(11) DEFAULT NULL,
  `nilai_akhir` int(11) DEFAULT NULL,
  `variable` varchar(200) DEFAULT NULL,
  `l` decimal(10,2) DEFAULT NULL,
  `m` decimal(10,2) DEFAULT NULL,
  `h` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id_batas_nilai`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `batas_nilai` WRITE;
/*!40000 ALTER TABLE `batas_nilai` DISABLE KEYS */;

INSERT INTO `batas_nilai` (`id_batas_nilai`, `kode_kriteria`, `nilai_awal`, `nilai_akhir`, `variable`, `l`, `m`, `h`)
VALUES
	(1,'C1',0,60,'Sangat Kurang (SK)',0.00,0.00,0.25),
	(2,'C1',61,79,'Kurang  (K)',0.00,0.25,0.50),
	(3,'C1',80,84,'Cukup (C)',0.25,0.50,0.75),
	(4,'C1',85,95,'Baik  (B)',0.50,0.75,1.00),
	(5,'C1',96,100,'Sangat Baik (SB)',0.75,1.00,1.00),
	(6,'C2',0,50,'Kurang  (K)',0.00,0.25,0.50),
	(7,'C2',51,70,'Cukup (C)',0.25,0.50,0.75),
	(8,'C2',71,100,'Baik  (B)',0.50,0.75,1.00),
	(9,'C3',0,54,'Sangat Kurang (SK)',0.00,0.00,0.25),
	(10,'C3',55,60,'Kurang  (K)',0.00,0.25,0.50),
	(11,'C3',61,70,'Cukup (C)',0.25,0.50,0.75),
	(12,'C3',71,85,'Baik  (B)',0.50,0.75,1.00),
	(13,'C3',86,100,'Sangat Baik (SB)',0.75,1.00,1.00),
	(14,'C4',1,1,'IPA',0.50,0.50,0.50),
	(15,'C4',2,2,'IPS',0.50,0.50,0.50),
	(16,'C5',0,54,'Sangat Kurang (SK)',0.00,0.00,0.25),
	(17,'C5',55,60,'Kurang  (K)',0.00,0.25,0.50),
	(18,'C5',61,70,'Cukup (C)',0.25,0.50,0.75),
	(19,'C5',71,85,'Baik  (B)',0.50,0.75,1.00),
	(20,'C5',86,100,'Sangat Baik (SB)',0.75,1.00,1.00);

/*!40000 ALTER TABLE `batas_nilai` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table kriteria
# ------------------------------------------------------------

DROP TABLE IF EXISTS `kriteria`;

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL AUTO_INCREMENT,
  `kode_kriteria` varchar(2) NOT NULL,
  `nama_kriteria` varchar(200) NOT NULL,
  `bobot` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id_kriteria`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `kriteria` WRITE;
/*!40000 ALTER TABLE `kriteria` DISABLE KEYS */;

INSERT INTO `kriteria` (`id_kriteria`, `kode_kriteria`, `nama_kriteria`, `bobot`)
VALUES
	(1,'C1','Raport',0.45),
	(2,'C2','Placement',0.28),
	(3,'C3','US',0.14),
	(4,'C4','Minat',0.08),
	(5,'C5','UN',0.04);

/*!40000 ALTER TABLE `kriteria` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table nilai
# ------------------------------------------------------------

DROP TABLE IF EXISTS `nilai`;

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL AUTO_INCREMENT,
  `nis` int(8) NOT NULL,
  `nilai` text NOT NULL,
  PRIMARY KEY (`id_nilai`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `nilai` WRITE;
/*!40000 ALTER TABLE `nilai` DISABLE KEYS */;

INSERT INTO `nilai` (`id_nilai`, `nis`, `nilai`)
VALUES
	(2,1000,'{\"C1\":\"89\",\"C2\":\"65\",\"C3\":\"90\",\"C4\":\"1\",\"C5\":\"75\"}'),
	(3,1001,'{\"C1\":\"74\",\"C2\":\"86\",\"C3\":\"65\",\"C4\":\"1\",\"C5\":\"83\"}');

/*!40000 ALTER TABLE `nilai` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table siswa
# ------------------------------------------------------------

DROP TABLE IF EXISTS `siswa`;

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL AUTO_INCREMENT,
  `nis` int(8) NOT NULL,
  `nama_siswa` varchar(200) NOT NULL,
  `jurusan` varchar(3) NOT NULL,
  `kode_tahun_ajaran` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_siswa`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `siswa` WRITE;
/*!40000 ALTER TABLE `siswa` DISABLE KEYS */;

INSERT INTO `siswa` (`id_siswa`, `nis`, `nama_siswa`, `jurusan`, `kode_tahun_ajaran`)
VALUES
	(1,1000,'ardani rohman','IPA',201520161),
	(3,1001,'rina','IPS',201520161);

/*!40000 ALTER TABLE `siswa` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tahun_ajaran
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tahun_ajaran`;

CREATE TABLE `tahun_ajaran` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `kode_tahun_ajaran` int(11) DEFAULT NULL,
  `nama_tahun_ajaran` varchar(200) DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `tahun_ajaran` WRITE;
/*!40000 ALTER TABLE `tahun_ajaran` DISABLE KEYS */;

INSERT INTO `tahun_ajaran` (`id`, `kode_tahun_ajaran`, `nama_tahun_ajaran`, `status`)
VALUES
	(1,201520161,'Ganjil','Y');

/*!40000 ALTER TABLE `tahun_ajaran` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(8) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` varchar(200) NOT NULL,
  `nama` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;

INSERT INTO `user` (`id`, `user_id`, `password`, `role`, `nama`)
VALUES
	(1,'1111','21232f297a57a5a743894a0e4a801fc3','1','Admin Kurikulum'),
	(2,'1000','21232f297a57a5a743894a0e4a801fc3','2','Kepala Sekolah');

/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
