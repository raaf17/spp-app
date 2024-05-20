-- MySQL dump 10.13  Distrib 8.0.33, for Win64 (x86_64)
--
-- Host: localhost    Database: spp_ci3
-- ------------------------------------------------------
-- Server version	8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tbl_bayarlain`
--

DROP TABLE IF EXISTS `tbl_bayarlain`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_bayarlain` (
  `ID_BAYAR` int NOT NULL AUTO_INCREMENT,
  `ID_PETUGAS` int DEFAULT NULL,
  `NISN` char(10) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `TGL_BAYAR` date DEFAULT NULL,
  `JATUH_TEMPO` date DEFAULT NULL,
  `TAHUN_DIBAYAR` varchar(10) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `ID_SPPLAIN` int DEFAULT NULL,
  `JUMLAH_BAYAR` int DEFAULT NULL,
  `KET` text COLLATE utf8mb3_unicode_ci,
  PRIMARY KEY (`ID_BAYAR`),
  KEY `ID_PETUGAS_idx` (`ID_PETUGAS`),
  CONSTRAINT `ID_PETUGAS` FOREIGN KEY (`ID_PETUGAS`) REFERENCES `tbl_petugas` (`ID_PETUGAS`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_bayarlain`
--

LOCK TABLES `tbl_bayarlain` WRITE;
/*!40000 ALTER TABLE `tbl_bayarlain` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_bayarlain` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_jurusan`
--

DROP TABLE IF EXISTS `tbl_jurusan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_jurusan` (
  `ID_JURUSAN` int NOT NULL AUTO_INCREMENT,
  `JURUSAN` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID_JURUSAN`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_jurusan`
--

LOCK TABLES `tbl_jurusan` WRITE;
/*!40000 ALTER TABLE `tbl_jurusan` DISABLE KEYS */;
INSERT INTO `tbl_jurusan` VALUES (2,'Teknik Jaringan Dan Komputer'),(4,'Akutansi dan Keuangan Lembaga'),(6,'DKV'),(19,'Teknik Kendaraaan Ringan Otomotif');
/*!40000 ALTER TABLE `tbl_jurusan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_kelas`
--

DROP TABLE IF EXISTS `tbl_kelas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_kelas` (
  `ID_KELAS` int NOT NULL AUTO_INCREMENT,
  `ID_JURUSAN` int DEFAULT NULL,
  `NAMA_KELAS` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID_KELAS`),
  KEY `FK_JURUSAN` (`ID_JURUSAN`),
  CONSTRAINT `FK_JURUSAN` FOREIGN KEY (`ID_JURUSAN`) REFERENCES `tbl_jurusan` (`ID_JURUSAN`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_kelas`
--

LOCK TABLES `tbl_kelas` WRITE;
/*!40000 ALTER TABLE `tbl_kelas` DISABLE KEYS */;
INSERT INTO `tbl_kelas` VALUES (2,2,'XII TKJ 1');
/*!40000 ALTER TABLE `tbl_kelas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_level`
--

DROP TABLE IF EXISTS `tbl_level`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_level` (
  `ID_LEVEL` int NOT NULL AUTO_INCREMENT,
  `LEVEL` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID_LEVEL`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_level`
--

LOCK TABLES `tbl_level` WRITE;
/*!40000 ALTER TABLE `tbl_level` DISABLE KEYS */;
INSERT INTO `tbl_level` VALUES (1,'Admin'),(2,'Petugas'),(3,'Siswa');
/*!40000 ALTER TABLE `tbl_level` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_log`
--

DROP TABLE IF EXISTS `tbl_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_log` (
  `log_id` int NOT NULL AUTO_INCREMENT,
  `log_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `log_user` varchar(50) NOT NULL,
  `log_tipe` varchar(50) NOT NULL,
  `log_aksi` varchar(50) NOT NULL,
  `log_assign_to` varchar(50) NOT NULL,
  `log_assign_type` enum('petugas','siswa','spp','kelas','jurusan','transaksi','cetak') NOT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB AUTO_INCREMENT=167 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_log`
--

LOCK TABLES `tbl_log` WRITE;
/*!40000 ALTER TABLE `tbl_log` DISABLE KEYS */;
INSERT INTO `tbl_log` VALUES (9,'2020-02-23 13:07:42','Administrator','petugas','menambah data petugas','',''),(10,'2020-02-23 13:08:06','Administrator','petugas','menambah data petugas','',''),(11,'2020-02-23 13:15:11','Administrator','petugas','Menghapus data petugas','',''),(12,'2020-02-23 13:15:16','Administrator','petugas','Menghapus data petugas','',''),(13,'2020-02-23 13:15:19','Administrator','petugas','Menghapus data petugas','',''),(14,'2020-02-23 13:15:27','Administrator','petugas','Mengedit data petugas','',''),(15,'2020-02-23 14:06:44','Administrator','jurusan','Menambah data jurusan','',''),(16,'2020-02-23 14:07:22','Administrator','kelas','Menambah data kelas','',''),(17,'2020-02-23 14:07:36','Administrator','kelas','Mengedit data kelas','',''),(18,'2020-02-23 14:08:13','Administrator','spp','Menambah data spp','',''),(19,'2020-02-24 12:38:04','Administrator','pembayaran','Menambah data transaksi pembayaran','',''),(20,'2020-02-24 12:44:24','Petugas','pembayaran','Menambah data transaksi pembayaran','',''),(21,'2020-02-25 12:00:19','Administrator','siswa','Mengedit data siswa','',''),(22,'2020-02-26 10:52:37','Administrator','siswa','Menghapus data siswa','',''),(23,'2020-02-26 10:54:51','Administrator','siswa','Menghapus data siswa','',''),(24,'2020-02-26 10:55:23','Administrator','siswa','Menambah data siswa','',''),(25,'2020-02-26 10:56:25','Administrator','siswa','Menghapus data siswa','',''),(26,'2020-02-26 10:58:30','Administrator','siswa','Menambah data siswa','',''),(27,'2020-02-26 11:01:44','Administrator','siswa','Menghapus data siswa','',''),(28,'2020-02-26 11:02:05','Administrator','siswa','Menambah data siswa','',''),(29,'2020-02-26 11:41:33','Administrator','siswa','Menghapus data siswa','',''),(30,'2020-02-26 11:41:37','Administrator','siswa','Menghapus data siswa','',''),(31,'2020-02-26 11:41:41','Administrator','siswa','Menghapus data siswa','',''),(32,'2020-02-26 11:43:40','Administrator','siswa','Menghapus data siswa','',''),(33,'2020-02-26 12:03:14','Administrator','siswa','Menghapus data siswa','',''),(34,'2020-02-26 12:07:03','Administrator','siswa','Menghapus data siswa','',''),(35,'2020-02-26 12:07:53','Administrator','siswa','Menambah data siswa','',''),(36,'2020-02-26 15:22:58','Administrator','siswa','Menghapus data siswa','',''),(37,'2020-02-26 15:23:43','Administrator','siswa','Menambah data siswa','',''),(38,'2020-02-26 15:33:49','Administrator','siswa','Menghapus data siswa','',''),(39,'2020-02-26 15:35:29','Administrator','siswa','Menambah data siswa','',''),(40,'2020-02-26 16:26:12','Administrator','pembayaran','Menambah data transaksi pembayaran','',''),(41,'2020-02-26 16:30:38','Administrator','pembayaran','Menambah data transaksi pembayaran','',''),(42,'2020-02-26 16:36:52','Administrator','pembayaran','Menambah data transaksi pembayaran','',''),(43,'2020-02-26 16:37:34','Administrator','pembayaran','Menghapus data transaksi pembayaran','',''),(44,'2020-02-26 16:39:35','Petugas','pembayaran','Menambah data transaksi pembayaran','',''),(45,'2020-02-26 17:21:22','Petugas','pembayaran','Menambah data transaksi pembayaran','',''),(46,'2020-02-27 12:05:28','Administrator','pembayaran','Menambah data transaksi pembayaran','',''),(47,'2020-02-27 12:05:50','Administrator','pembayaran','Menambah data transaksi pembayaran','',''),(48,'2020-02-27 12:56:21','Administrator','petugas','Merubah password petugas','',''),(49,'2020-02-28 06:53:56','Administrator','petugas','Menghapus data petugas','',''),(50,'2020-02-28 07:16:29','Administrator','cetak','Mencetak laporan data petugas','',''),(51,'2020-02-28 07:29:44','Administrator','petugas','Menambah data petugas','',''),(52,'2020-02-28 07:30:56','Administrator','petugas','Menghapus data petugas','',''),(53,'2020-02-28 07:31:15','Administrator','petugas','Menambah data petugas','',''),(54,'2020-02-28 07:50:13','Administrator','cetak','Mencetak laporan data siswa','',''),(55,'2020-02-28 08:29:01','Administrator','cetak','Mencetak laporan data petugas','',''),(56,'2020-02-28 08:30:11','Administrator','cetak','Mencetak laporan data petugas','',''),(57,'2020-02-28 08:31:13','Administrator','cetak','Mencetak laporan data petugas','',''),(58,'2020-02-28 08:31:34','Administrator','cetak','Mencetak laporan data siswa','',''),(59,'2020-02-28 08:32:08','Administrator','cetak','Mencetak laporan data transaksi pembayaran','',''),(60,'2020-02-28 08:35:07','Administrator','cetak','Mencetak laporan data siswa','',''),(61,'2020-02-28 08:35:20','Administrator','cetak','Mencetak laporan data siswa','',''),(62,'2020-02-28 08:35:34','Administrator','cetak','Mencetak laporan data siswa','',''),(63,'2020-02-28 08:36:10','Administrator','cetak','Mencetak laporan data siswa','',''),(64,'2020-02-28 08:36:21','Administrator','cetak','Mencetak laporan data petugas','',''),(65,'2020-02-28 08:36:37','Administrator','cetak','Mencetak laporan data petugas','',''),(66,'2020-02-28 08:37:18','Administrator','cetak','Mencetak laporan data transaksi pembayaran','',''),(67,'2020-02-28 08:37:33','Administrator','cetak','Mencetak laporan data petugas','',''),(68,'2020-02-28 08:38:12','Administrator','cetak','Mencetak laporan data transaksi pembayaran','',''),(69,'2020-02-28 08:38:18','Administrator','cetak','Mencetak laporan data petugas','',''),(70,'2020-02-28 09:21:03','Administrator','siswa','Menambah data siswa','',''),(71,'2020-02-28 09:21:34','Administrator','siswa','Menghapus data siswa','',''),(72,'2024-01-07 04:05:08','Kipli','kelas','Menambah data kelas','',''),(73,'2024-01-07 04:16:31','Kipli','pembayaran','Menambah data transaksi pembayaran','',''),(74,'2024-01-07 04:16:43','Kipli','cetak','Mencetak Struk pembayaran','',''),(75,'2024-01-07 04:17:59','Kipli','cetak','Mencetak Struk pembayaran','',''),(76,'2024-01-07 04:19:16','Kipli','cetak','Mencetak Struk pembayaran','',''),(77,'2024-01-07 04:20:00','Kipli','cetak','Mencetak Struk pembayaran','',''),(78,'2024-01-07 04:43:46','Kipli','cetak','Mencetak Struk pembayaran','',''),(79,'2024-01-07 04:44:05','Kipli','cetak','Mencetak Struk pembayaran','',''),(80,'2024-01-07 04:47:35','Kipli','cetak','Mencetak Struk pembayaran','',''),(81,'2024-01-07 05:33:35','Kipli','cetak','Mencetak Struk pembayaran','',''),(82,'2024-01-07 06:22:14','Kipli','cetak','Mencetak laporan data petugas','',''),(83,'2024-01-07 06:22:15','Kipli','cetak','Mencetak laporan data petugas','',''),(84,'2024-01-07 06:34:08','Kipli','cetak','Mencetak laporan data transaksi pembayaran','',''),(85,'2024-01-07 06:34:10','Kipli','cetak','Mencetak laporan data transaksi pembayaran','',''),(86,'2024-01-07 07:43:16','Kipli','cetak','Mencetak laporan data transaksi pembayaran','',''),(87,'2024-01-07 07:43:31','Kipli','cetak','Mencetak laporan data transaksi pembayaran','',''),(88,'2024-01-07 07:54:30','Kipli','petugas','Menambah data petugas','',''),(89,'2024-01-07 07:58:32','Kipli','jurusan','Menambah data jurusan','',''),(90,'2024-01-07 09:39:17','Kipli','jurusan','Menghapus data jurusan','',''),(91,'2024-01-08 16:53:09','Kipli','jurusan','Menambah data jurusan','',''),(92,'2024-01-09 01:44:25','Kipli','siswa','Menambah data siswa','',''),(93,'2024-01-09 06:16:52','Kipli','jurusan','Menambah data jurusan','',''),(94,'2024-01-09 06:27:13','Kipli','kelas','Menghapus data kelas','',''),(95,'2024-01-09 14:56:06','Kipli','cetak','Mencetak laporan data petugas','',''),(96,'2024-01-09 14:56:23','Kipli','cetak','Mencetak laporan data petugas','',''),(97,'2024-01-09 14:56:32','Kipli','cetak','Mencetak laporan data petugas','',''),(98,'2024-01-09 14:57:36','Kipli','cetak','Mencetak laporan data petugas','',''),(99,'2024-01-09 14:57:43','Kipli','cetak','Mencetak laporan data petugas','',''),(100,'2024-01-09 14:58:26','Kipli','cetak','Mencetak laporan data petugas','',''),(101,'2024-01-09 14:58:29','Kipli','cetak','Mencetak laporan data petugas','',''),(102,'2024-01-09 15:01:16','Kipli','cetak','Mencetak laporan data petugas','',''),(103,'2024-01-09 15:01:23','Kipli','cetak','Mencetak laporan data petugas','',''),(104,'2024-01-09 15:03:09','Kipli','cetak','Mencetak laporan data petugas','',''),(105,'2024-01-09 15:03:12','Kipli','cetak','Mencetak laporan data petugas','',''),(106,'2024-01-09 15:04:30','Kipli','cetak','Mencetak laporan data petugas','',''),(107,'2024-01-09 15:04:33','Kipli','cetak','Mencetak laporan data petugas','',''),(108,'2024-01-09 15:05:42','Kipli','cetak','Mencetak laporan data petugas','',''),(109,'2024-01-09 15:05:46','Kipli','cetak','Mencetak laporan data petugas','',''),(110,'2024-01-09 15:09:00','Kipli','cetak','Mencetak laporan data petugas','',''),(111,'2024-01-09 15:09:03','Kipli','cetak','Mencetak laporan data petugas','',''),(112,'2024-01-09 15:11:08','Kipli','cetak','Mencetak laporan data petugas','',''),(113,'2024-01-09 15:11:13','Kipli','cetak','Mencetak laporan data petugas','',''),(114,'2024-01-09 15:12:13','Kipli','cetak','Mencetak laporan data petugas','',''),(115,'2024-01-09 15:12:17','Kipli','cetak','Mencetak laporan data petugas','',''),(116,'2024-01-09 15:14:12','Kipli','cetak','Mencetak laporan data petugas','',''),(117,'2024-01-09 15:14:16','Kipli','cetak','Mencetak laporan data petugas','',''),(118,'2024-01-09 15:18:54','Kipli','cetak','Mencetak laporan data petugas','',''),(119,'2024-01-09 15:18:59','Kipli','cetak','Mencetak laporan data petugas','',''),(120,'2024-01-09 15:19:19','Kipli','cetak','Mencetak laporan data petugas','',''),(121,'2024-01-09 15:19:22','Kipli','cetak','Mencetak laporan data petugas','',''),(122,'2024-01-09 15:50:40','Kipli','pembayaran','Menambah data transaksi pembayaran','',''),(123,'2024-01-09 16:19:23','Kipli','jurusan','Mengedit data jurusan','',''),(124,'2024-01-09 16:21:45','Kipli','jurusan','Mengedit data jurusan','',''),(125,'2024-01-09 16:39:34','Kipli','jurusan','Menghapus data jurusan','',''),(126,'2024-01-09 16:47:47','Kipli','jurusan','Mengedit data jurusan','',''),(127,'2024-01-09 17:17:18','Kipli','jurusan','Mengedit data jurusan','',''),(128,'2024-01-10 05:38:02','Kipli','pembayaran','Menambah data transaksi pembayaran','',''),(129,'2024-01-10 05:38:25','Kipli','cetak','Mencetak Struk pembayaran','',''),(130,'2024-01-10 15:09:02','Kipli','jurusan','Menambah data jurusan','',''),(131,'2024-01-10 15:10:12','Kipli','jurusan','Menghapus data jurusan','',''),(132,'2024-01-10 15:10:30','Kipli','jurusan','Menambah data jurusan','',''),(133,'2024-01-10 15:12:42','Kipli','jurusan','Menghapus data jurusan','',''),(134,'2024-01-10 15:12:55','Kipli','jurusan','Menghapus data jurusan','',''),(135,'2024-01-10 15:25:43','Kipli','pembayaran','Menambah data transaksi pembayaran','',''),(136,'2024-01-10 15:50:15','Kipli','jurusan','Menghapus data jurusan','',''),(137,'2024-01-10 15:51:20','Kipli','jurusan','Menghapus data jurusan','',''),(138,'2024-01-10 15:52:19','Kipli','jurusan','Menghapus data jurusan','',''),(139,'2024-01-10 15:55:10','Kipli','jurusan','Menghapus data jurusan','',''),(140,'2024-01-10 15:58:22','Kipli','kelas','Mengedit data kelas','',''),(141,'2024-01-11 05:43:16','Kipli','pembayaran','Menambah data transaksi pembayaran','',''),(142,'2024-01-11 06:16:10','Kipli','siswa','Mengedit data siswa','',''),(143,'2024-01-11 12:41:00','Kipli','jurusan','Menghapus data jurusan','',''),(144,'2024-01-11 12:47:23','Kipli','jurusan','Menghapus data jurusan','',''),(145,'2024-01-11 12:47:29','Kipli','jurusan','Menghapus data jurusan','',''),(146,'2024-01-13 07:16:56','Kipli','spp','Menambah data spp','',''),(147,'2024-01-13 14:39:02','Kipli','spp','Menambah data spp','',''),(148,'2024-03-19 01:12:17','Kipli','jurusan','Menghapus data jurusan','',''),(149,'2024-03-19 01:12:29','Kipli','jurusan','Mengedit data jurusan','',''),(150,'2024-03-19 01:20:19','Kipli','jurusan','Menghapus data jurusan','',''),(151,'2024-03-19 01:20:45','Kipli','jurusan','Menambah data jurusan','',''),(152,'2024-03-19 01:20:52','Kipli','jurusan','Menghapus data jurusan','',''),(153,'2024-03-19 01:22:00','Kipli','pembayaran','Menambah data transaksi pembayaran','',''),(154,'2024-03-19 01:22:10','Kipli','cetak','Mencetak Struk pembayaran','',''),(155,'2024-03-19 01:28:05','Kipli','pembayaran','Menambah data transaksi pembayaran','',''),(156,'2024-03-19 01:28:17','Kipli','pembayaran','Menambah data transaksi pembayaran','',''),(157,'2024-03-19 01:31:11','Kipli','pembayaran','Menambah data transaksi pembayaran','',''),(158,'2024-03-19 01:35:29','Kipli','siswa','Menambah data siswa','',''),(159,'2024-04-29 03:59:29','Kwipli','pembayaran','Menambah data transaksi pembayaran','',''),(160,'2024-04-29 03:59:46','Kwipli','pembayaran','Menambah data transaksi pembayaran','',''),(161,'2024-05-03 02:04:34','Yuma Aji Pangestu','pembayaran','Menambah data transaksi pembayaran','',''),(162,'2024-05-03 02:04:44','Yuma Aji Pangestu','cetak','Mencetak Struk pembayaran','',''),(163,'2024-05-14 00:50:58','Kwipli','jurusan','Menambah data jurusan','',''),(164,'2024-05-14 00:51:29','Kwipli','pembayaran','Menambah data transaksi pembayaran','',''),(165,'2024-05-14 01:02:58','Kwipli','siswa','Menambah data siswa','',''),(166,'2024-05-15 03:28:22','Kwipli','cetak','Mencetak Struk pembayaran','','');
/*!40000 ALTER TABLE `tbl_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_pembayaran`
--

DROP TABLE IF EXISTS `tbl_pembayaran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_pembayaran` (
  `ID_PEMBAYARAN` int NOT NULL AUTO_INCREMENT,
  `ID_PETUGAS` int DEFAULT NULL,
  `NISN` char(10) DEFAULT NULL,
  `TGL_BAYAR` date DEFAULT NULL,
  `JATUH_TEMPO` date NOT NULL,
  `BULAN_DIBAYAR` varchar(9) DEFAULT NULL,
  `TAHUN_DIBAYAR` varchar(4) DEFAULT NULL,
  `ID_SPP` int NOT NULL,
  `JUMLAH_BAYAR` int NOT NULL,
  `KET` varchar(30) NOT NULL,
  PRIMARY KEY (`ID_PEMBAYARAN`),
  KEY `FK_PETUGAS` (`ID_PETUGAS`),
  KEY `FK_SISWA` (`NISN`),
  CONSTRAINT `FK_PETUGAS` FOREIGN KEY (`ID_PETUGAS`) REFERENCES `tbl_petugas` (`ID_PETUGAS`),
  CONSTRAINT `FK_SISWA` FOREIGN KEY (`NISN`) REFERENCES `tbl_siswa` (`NISN`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=153 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_pembayaran`
--

LOCK TABLES `tbl_pembayaran` WRITE;
/*!40000 ALTER TABLE `tbl_pembayaran` DISABLE KEYS */;
INSERT INTO `tbl_pembayaran` VALUES (117,18,'0012345678','2024-01-09','2017-07-20','Juli','2017',2,170000,'LUNAS'),(118,18,'0012345678','2024-01-10','2017-08-20','Agustus','2017',2,170000,'LUNAS'),(119,18,'0012345678','2024-01-10','2017-09-20','September','2017',2,170000,'LUNAS'),(120,18,'0012345678','2024-01-11','2017-10-20','Oktober','2017',2,170000,'LUNAS'),(121,18,'0012345678','2024-03-19','2017-11-20','November','2017',2,170000,'LUNAS'),(122,18,'0012345678','2024-03-19','2017-12-20','Desember','2017',2,170000,'LUNAS'),(123,18,'0012345678','2024-03-19','2018-01-20','Januari','2018',2,170000,'LUNAS'),(124,18,'0012345678','2024-03-19','2018-02-20','Februari','2018',2,170000,'LUNAS'),(125,22,'0012345678','2024-04-29','2018-03-20','Maret','2018',2,170000,'LUNAS'),(126,22,'0012345678','2024-04-29','2018-04-20','April','2018',2,170000,'LUNAS'),(127,24,'0012345678','2024-05-03','2018-05-20','Mei','2018',2,170000,'LUNAS'),(128,23,'0012345678','2024-05-14','2018-06-20','Juni','2018',2,170000,'LUNAS'),(129,18,'0012345678',NULL,'2017-07-20','Juli','2017',3,200000,''),(130,18,'0012345678',NULL,'2017-08-20','Agustus','2017',3,200000,''),(131,18,'0012345678',NULL,'2017-09-20','September','2017',3,200000,''),(132,18,'0012345678',NULL,'2017-10-20','Oktober','2017',3,200000,''),(133,18,'0012345678',NULL,'2017-11-20','November','2017',3,200000,''),(134,18,'0012345678',NULL,'2017-12-20','Desember','2017',3,200000,''),(135,18,'0012345678',NULL,'2018-01-20','Januari','2018',3,200000,''),(136,18,'0012345678',NULL,'2018-02-20','Februari','2018',3,200000,''),(137,18,'0012345678',NULL,'2018-03-20','Maret','2018',3,200000,''),(138,18,'0012345678',NULL,'2018-04-20','April','2018',3,200000,''),(139,18,'0012345678',NULL,'2018-05-20','Mei','2018',3,200000,''),(140,18,'0012345678',NULL,'2018-06-20','Juni','2018',3,200000,''),(141,23,'9999999999',NULL,'2024-06-01','Juni','2024',4,450000,''),(142,23,'9999999999',NULL,'2024-07-01','Juli','2024',4,450000,''),(143,23,'9999999999',NULL,'2024-08-01','Agustus','2024',4,450000,''),(144,23,'9999999999',NULL,'2024-09-01','September','2024',4,450000,''),(145,23,'9999999999',NULL,'2024-10-01','Oktober','2024',4,450000,''),(146,23,'9999999999',NULL,'2024-11-01','November','2024',4,450000,''),(147,23,'9999999999',NULL,'2024-12-01','Desember','2024',4,450000,''),(148,23,'9999999999',NULL,'2025-01-01','Januari','2025',4,450000,''),(149,23,'9999999999',NULL,'2025-02-01','Februari','2025',4,450000,''),(150,23,'9999999999',NULL,'2025-03-01','Maret','2025',4,450000,''),(151,23,'9999999999',NULL,'2025-04-01','April','2025',4,450000,''),(152,23,'9999999999',NULL,'2025-05-01','Mei','2025',4,450000,'');
/*!40000 ALTER TABLE `tbl_pembayaran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_petugas`
--

DROP TABLE IF EXISTS `tbl_petugas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_petugas` (
  `ID_PETUGAS` int NOT NULL AUTO_INCREMENT,
  `ID_LEVEL` int DEFAULT NULL,
  `USERNAME` varchar(100) DEFAULT NULL,
  `PASSWORD_PETUGAS` varchar(225) DEFAULT NULL,
  `NAMA_PETUGAS` varchar(50) DEFAULT NULL,
  `DESKRIPSI` varchar(30) NOT NULL,
  PRIMARY KEY (`ID_PETUGAS`),
  KEY `FK_LEVEL` (`ID_LEVEL`),
  CONSTRAINT `FK_LEVEL` FOREIGN KEY (`ID_LEVEL`) REFERENCES `tbl_level` (`ID_LEVEL`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_petugas`
--

LOCK TABLES `tbl_petugas` WRITE;
/*!40000 ALTER TABLE `tbl_petugas` DISABLE KEYS */;
INSERT INTO `tbl_petugas` VALUES (18,1,'admin1','ed2b1f468c5f915f3f1cf75d7068baae','Kipli','admin'),(19,2,'kimplengdev','8ce87b8ec346ff4c80635f667d1592ae','Kimpleng','12121212'),(20,2,'kiplidev','ed2b1f468c5f915f3f1cf75d7068baae','Kipli','petugas'),(21,3,'rafi','ed2b1f468c5f915f3f1cf75d7068baae','Muhammad Rafi','Rafi'),(22,2,'kwipli','ed2b1f468c5f915f3f1cf75d7068baae','Kwipli','petugas'),(23,1,'kwipli','4297f44b13955235245b2497399d7a93','Kwipli','admin'),(24,1,'yuma','ed2b1f468c5f915f3f1cf75d7068baae','Yuma Aji Pangestu','admin');
/*!40000 ALTER TABLE `tbl_petugas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_siswa`
--

DROP TABLE IF EXISTS `tbl_siswa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_siswa` (
  `NISN` char(10) NOT NULL,
  `ID_KELAS` int DEFAULT NULL,
  `ID_SPP` int DEFAULT NULL,
  `NIS` char(8) DEFAULT NULL,
  `NAMA` varchar(100) DEFAULT NULL,
  `ALAMAT` text,
  `NO_TELP` varchar(13) DEFAULT NULL,
  `TIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`NISN`),
  KEY `FK_KELAS` (`ID_KELAS`),
  KEY `FK_SPP` (`ID_SPP`),
  CONSTRAINT `FK_KELAS` FOREIGN KEY (`ID_KELAS`) REFERENCES `tbl_kelas` (`ID_KELAS`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_SPP` FOREIGN KEY (`ID_SPP`) REFERENCES `tbl_spp` (`ID_SPP`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_siswa`
--

LOCK TABLES `tbl_siswa` WRITE;
/*!40000 ALTER TABLE `tbl_siswa` DISABLE KEYS */;
INSERT INTO `tbl_siswa` VALUES ('0000000000',2,3,'00000000','aura','jalan','000000000000','2024-03-19 01:35:29'),('0012345678',2,2,'00123456','MUHAMMAD RAFI','Tulungagung','085000000','2024-01-11 06:16:10'),('9999999999',2,4,'88888888','Savero Nareswari','Kauman','087756821822','2024-05-14 01:02:58');
/*!40000 ALTER TABLE `tbl_siswa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_spp`
--

DROP TABLE IF EXISTS `tbl_spp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_spp` (
  `ID_SPP` int NOT NULL AUTO_INCREMENT,
  `NAMA_PEMBAYARAN` varchar(50) DEFAULT NULL,
  `TAHUN` varchar(16) DEFAULT NULL,
  `NOMINAL` int DEFAULT NULL,
  PRIMARY KEY (`ID_SPP`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_spp`
--

LOCK TABLES `tbl_spp` WRITE;
/*!40000 ALTER TABLE `tbl_spp` DISABLE KEYS */;
INSERT INTO `tbl_spp` VALUES (1,NULL,'2017/2018',135000),(2,NULL,'2018/2019',170000),(3,NULL,'2000/2001',200000),(4,'Character Building','2023/2023',450000);
/*!40000 ALTER TABLE `tbl_spp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'spp_ci3'
--

--
-- Dumping routines for database 'spp_ci3'
--
/*!50003 DROP PROCEDURE IF EXISTS `get_siswa` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_siswa`()
    NO SQL
BEGIN
	SELECT `tbl_siswa`.*, `tbl_kelas`.`nama_kelas`, `tbl_spp`.`tahun`
                FROM `tbl_siswa` JOIN `tbl_kelas`
                ON `tbl_siswa`.`id_kelas` = `tbl_kelas`.`id_kelas`
                JOIN `tbl_spp` ON `tbl_siswa` .`id_spp` = `tbl_spp`.`id_spp` ORDER BY `tbl_siswa`.`NISN`, `tbl_siswa`.`id_kelas` ASC;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `kelas_get` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `kelas_get`()
    NO SQL
BEGIN
	SELECT `tbl_kelas`.*, `tbl_jurusan`.`jurusan` FROM `tbl_kelas` JOIN `tbl_jurusan` ON `tbl_kelas`.`id_jurusan` = `tbl_jurusan`.`id_jurusan` ORDER BY `tbl_kelas`.`id_jurusan` ASC;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `level_get` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `level_get`(IN `level` INT)
    NO SQL
BEGIN
	SELECT * FROM tbl_level WHERE level = id_level;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `login_check` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `login_check`(IN `user` VARCHAR(100), IN `pass` VARCHAR(225))
    NO SQL
BEGIN
	SELECT * FROM tbl_petugas WHERE user = username AND pass = password_petugas;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `siswa_check` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `siswa_check`(IN `user` VARCHAR(10), IN `pass` VARCHAR(225))
    NO SQL
BEGIN
	SELECT * FROM tbl_siswa WHERE user = nisn AND pass = nis;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-05-16  8:12:01
