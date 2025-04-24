-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.5.5-10.5.8-MariaDB


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema db_logistik_dejanjaya
--

CREATE DATABASE IF NOT EXISTS db_logistik_dejanjaya;
USE db_logistik_dejanjaya;

--
-- Definition of table `barang`
--

DROP TABLE IF EXISTS `barang`;
CREATE TABLE `barang` (
  `kd_barang` char(5) NOT NULL,
  `nama_barang` varchar(255) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `tgl_update` date DEFAULT NULL,
  PRIMARY KEY (`kd_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

/*!40000 ALTER TABLE `barang` DISABLE KEYS */;
INSERT INTO `barang` (`kd_barang`,`nama_barang`,`stok`,`tgl_update`) VALUES 
 ('B0001','beras',18,'2025-04-24'),
 ('B0002','minyak',10,NULL),
 ('B0003','kecap',25,NULL);
/*!40000 ALTER TABLE `barang` ENABLE KEYS */;


--
-- Definition of table `barang_keluar`
--

DROP TABLE IF EXISTS `barang_keluar`;
CREATE TABLE `barang_keluar` (
  `no_barang_keluar` char(16) NOT NULL,
  `kd_barang` char(50) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `destination` varchar(255) DEFAULT NULL,
  `tanggal_keluar` date DEFAULT NULL,
  PRIMARY KEY (`no_barang_keluar`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_keluar`
--

/*!40000 ALTER TABLE `barang_keluar` DISABLE KEYS */;
INSERT INTO `barang_keluar` (`no_barang_keluar`,`kd_barang`,`quantity`,`destination`,`tanggal_keluar`) VALUES 
 ('T-BK-25042400001','B0001',2,'PT Maju  mundur','2025-04-24');
/*!40000 ALTER TABLE `barang_keluar` ENABLE KEYS */;


--
-- Definition of table `barang_masuk`
--

DROP TABLE IF EXISTS `barang_masuk`;
CREATE TABLE `barang_masuk` (
  `no_barang_masuk` char(16) NOT NULL,
  `kd_barang` char(50) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `origin` varchar(255) DEFAULT NULL,
  `tanggal_masuk` date DEFAULT NULL,
  PRIMARY KEY (`no_barang_masuk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_masuk`
--

/*!40000 ALTER TABLE `barang_masuk` DISABLE KEYS */;
/*!40000 ALTER TABLE `barang_masuk` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
