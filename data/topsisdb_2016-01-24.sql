# ************************************************************
# Sequel Pro SQL dump
# Version 4499
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.42)
# Database: topsisdb
# Generation Time: 2016-01-24 12:11:00 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


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
	(1,'C1','nilai uas',0.00);

/*!40000 ALTER TABLE `kriteria` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table nilai
# ------------------------------------------------------------

DROP TABLE IF EXISTS `nilai`;

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL AUTO_INCREMENT,
  `nis` int(8) NOT NULL,
  `kode_kriteria` varchar(2) NOT NULL,
  `nilai` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id_nilai`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



# Dump of table siswa
# ------------------------------------------------------------

DROP TABLE IF EXISTS `siswa`;

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL AUTO_INCREMENT,
  `nis` int(8) NOT NULL,
  `nama_siswa` varchar(200) NOT NULL,
  `jurusan` varchar(3) NOT NULL,
  PRIMARY KEY (`id_siswa`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `siswa` WRITE;
/*!40000 ALTER TABLE `siswa` DISABLE KEYS */;

INSERT INTO `siswa` (`id_siswa`, `nis`, `nama_siswa`, `jurusan`)
VALUES
	(1,1000,'ardani rohman','');

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
	(1,'1111','21232f297a57a5a743894a0e4a801fc3','1','Admin Kurikulum');

/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
