-- MySQL dump 10.13  Distrib 8.0.28, for Win64 (x86_64)
--
-- Host: localhost    Database: simetri-app
-- ------------------------------------------------------
-- Server version	8.0.28

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `buy_copper`
--

DROP TABLE IF EXISTS `buy_copper`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `buy_copper` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` timestamp NOT NULL,
  `no_sppt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `merk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` int NOT NULL,
  `uo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expired_date` timestamp NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `buy_copper`
--

LOCK TABLES `buy_copper` WRITE;
/*!40000 ALTER TABLE `buy_copper` DISABLE KEYS */;
INSERT INTO `buy_copper` VALUES (2,'Pemesanan','2025-06-30 07:34:31','0037SPPT25','1','TEMBAGALUV415','TEMBAGA 4 X 15 @2,15','LUVATA',2,'BTG','2025-07-10 17:00:00','-','2025-06-30 07:34:31','2025-06-30 07:40:47'),(3,'Pemesanan','2025-06-30 07:55:26','0037SPPT30','2','TEMBAGALUV415','TEMBAGA 4 X 15 @2,15','LUVATA',7,'BTG','2025-06-29 17:00:00','Secepatnya','2025-06-30 07:55:26','2025-06-30 07:55:26');
/*!40000 ALTER TABLE `buy_copper` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `copper_cutting_detail`
--

DROP TABLE IF EXISTS `copper_cutting_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `copper_cutting_detail` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `copper_cutting_id` int NOT NULL,
  `panel_name_utama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `panel_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dimension` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `length` int NOT NULL,
  `quantity` int NOT NULL,
  `total_length` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `copper_cutting_detail`
--

LOCK TABLES `copper_cutting_detail` WRITE;
/*!40000 ALTER TABLE `copper_cutting_detail` DISABLE KEYS */;
INSERT INTO `copper_cutting_detail` VALUES (1,1,'MSB - BIODIESEL & CAP. BANK 1050 KVAR ( TANPA DR )','BUSBAR N','FS','100x10',900,2,1800,'2025-06-27 21:12:47','2025-06-27 21:12:47'),(2,1,'MSB - BIODIESEL & CAP. BANK 1050 KVAR ( TANPA DR )','BUSBAR N','FS','100x10',181,1,181,'2025-06-27 21:36:18','2025-06-27 21:36:18'),(3,1,'MSB - BIODIESEL & CAP. BANK 1050 KVAR ( TANPA DR )','BUSBAR PE','FS','120x10',950,1,950,'2025-06-27 21:37:09','2025-06-27 21:37:09'),(4,3,'BAHAR','Bahar','FS','80x10',200,3,600,'2025-06-29 07:14:19','2025-06-29 07:14:19'),(5,3,'BAHAR','Bahar','FS','30x10',400,2,800,'2025-06-29 07:14:49','2025-06-29 07:14:49'),(6,4,'MSB - BIODIESEL & CAP. BANK 1050 KVAR ( TANPA DR )','BUSBAR N','FS','100x10',1000,2,2000,'2025-07-02 06:25:10','2025-07-02 06:25:10'),(7,5,'MSB - BIODIESEL & CAP. BANK 1050 KVAR ( TANPA DR )','BUSBAR N','FS','15x3',3500,1,3500,'2025-07-02 07:51:26','2025-07-02 07:51:26'),(8,5,'MSB - BIODIESEL & CAP. BANK 1050 KVAR ( TANPA DR )','BUSBAR N','FS','80x5',2000,2,4000,'2025-07-02 07:51:50','2025-07-02 07:51:50');
/*!40000 ALTER TABLE `copper_cutting_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `copper_cutting_lists`
--

DROP TABLE IF EXISTS `copper_cutting_lists`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `copper_cutting_lists` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `production_code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `production_date` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `copper_cutting_lists`
--

LOCK TABLES `copper_cutting_lists` WRITE;
/*!40000 ALTER TABLE `copper_cutting_lists` DISABLE KEYS */;
INSERT INTO `copper_cutting_lists` VALUES (1,'0110 MDT 0325','25.0329A','OSBL ISBL PT. WAHANA PRIMA SEJATI KALTIM','2025-06-28','Sudah disetujui',NULL,'2025-06-29 06:07:58'),(4,'0110 MDT 0325','25.0329A','OSBL ISBL PT. WAHANA PRIMA SEJATI KALTIM','2025-06-30','Sudah disetujui','2025-06-30 07:51:26','2025-07-02 07:47:44'),(5,'0110 MDT 4412','25.0329A','OSBL ISBL PT. WAHANA PRIMA SEJATI KALTIM','2025-07-03','Sudah disetujui','2025-07-02 07:50:55','2025-07-02 08:06:06');
/*!40000 ALTER TABLE `copper_cutting_lists` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cutting_record`
--

DROP TABLE IF EXISTS `cutting_record`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cutting_record` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `copper_cutting_id` int NOT NULL,
  `ukuran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok_utuh_id` int NOT NULL,
  `stok_utuh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok_potong_id` int NOT NULL,
  `stok_potong` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cutting_record`
--

LOCK TABLES `cutting_record` WRITE;
/*!40000 ALTER TABLE `cutting_record` DISABLE KEYS */;
INSERT INTO `cutting_record` VALUES (1,4,'100x10','2000','2000',0,'-',5,'2000','2025-07-02 07:47:44','2025-07-02 07:47:44'),(5,5,'15x3','3500','3500',1,'1505',0,'-','2025-07-02 08:06:06','2025-07-02 08:06:06'),(6,5,'80x5','4000','4000',10,'0',0,'-','2025-07-02 08:06:06','2025-07-02 08:06:06');
/*!40000 ALTER TABLE `cutting_record` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detail_stok_produk`
--

DROP TABLE IF EXISTS `detail_stok_produk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detail_stok_produk` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `stok_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `panjang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detail_stok_produk`
--

LOCK TABLES `detail_stok_produk` WRITE;
/*!40000 ALTER TABLE `detail_stok_produk` DISABLE KEYS */;
INSERT INTO `detail_stok_produk` VALUES (1,'1','305',NULL,'2025-09-05 17:00:00',NULL),(2,'1','200','hari ini','2025-06-09 00:42:24','2025-06-09 00:42:24'),(3,'1','200','-','2025-06-09 00:43:29','2025-06-09 00:43:29'),(4,'1','300','Sisa kemarin','2025-06-09 00:59:24','2025-06-09 00:59:24'),(5,'2','500','Sisa pak hendru','2025-06-09 01:01:06','2025-06-09 01:01:06'),(6,'3','400','-','2025-06-09 01:01:55','2025-06-09 01:01:55'),(7,'4','1800','Sisa kemarin','2025-06-29 05:32:11','2025-06-29 05:32:11'),(8,'5','2400',NULL,'2025-06-29 05:35:09','2025-06-29 05:35:09'),(12,'5','2019','-','2025-06-29 06:47:10','2025-06-29 06:47:10'),(13,'6','3050','-','2025-06-29 06:47:10','2025-06-29 06:47:10'),(14,'1','500','-','2025-07-02 07:53:44','2025-07-02 07:53:44'),(15,'1','500','-','2025-07-02 07:54:40','2025-07-02 07:54:40'),(16,'1','500','-','2025-07-02 08:04:02','2025-07-02 08:04:02'),(17,'1','500','-','2025-07-02 08:05:14','2025-07-02 08:05:14'),(18,'1','500','-','2025-07-02 08:06:06','2025-07-02 08:06:06');
/*!40000 ALTER TABLE `detail_stok_produk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `main_menu`
--

DROP TABLE IF EXISTS `main_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `main_menu` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `main_menu`
--

LOCK TABLES `main_menu` WRITE;
/*!40000 ALTER TABLE `main_menu` DISABLE KEYS */;
INSERT INTO `main_menu` VALUES (1,'Dashboard'),(2,'Permintaan'),(3,'Daftar Porong'),(4,'Pembelian'),(5,'Produk');
/*!40000 ALTER TABLE `main_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `master_size`
--

DROP TABLE IF EXISTS `master_size`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `master_size` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `ukuran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `master_size`
--

LOCK TABLES `master_size` WRITE;
/*!40000 ALTER TABLE `master_size` DISABLE KEYS */;
INSERT INTO `master_size` VALUES (1,'15x3',NULL,NULL),(2,'20x5',NULL,NULL),(3,'25x5',NULL,NULL),(4,'30x5',NULL,NULL),(5,'40x5',NULL,NULL),(6,'50x5',NULL,NULL),(7,'60x5',NULL,NULL),(8,'80x5',NULL,NULL),(9,'100x5',NULL,NULL),(10,'30x10',NULL,NULL),(11,'40x10',NULL,NULL),(12,'50x10',NULL,NULL),(13,'60x10',NULL,NULL),(14,'80x10',NULL,NULL),(15,'100x10',NULL,NULL),(16,'120x10',NULL,NULL),(17,'160x10',NULL,NULL),(18,'200x10',NULL,NULL),(19,'125x5',NULL,NULL),(20,'20x10',NULL,NULL),(21,'100x20',NULL,NULL);
/*!40000 ALTER TABLE `master_size` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2025_06_09_055142_master_stok_produk',2),(5,'2025_06_09_062940_master_stok_product_detail',3),(6,'2025_06_09_071351_master_size',4),(7,'2025_06_09_080954_master_produk_utuh',5),(8,'2025_06_28_020656_request_cutting',6),(9,'2025_06_30_135502_buy_copper',7),(10,'2025_07_02_132319_cutting_record',8),(11,'2025_07_05_124427_user_role',9),(12,'2025_07_05_124501_user_management',10),(13,'2025_07_05_124623_main_menu',11);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('HD8IODoc8ZVaLHwaEEM90dOf7Y9ZeQeAlQONWTf9',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 OPR/119.0.0.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiTk9kblJZTUREZTZVR2VqM2FpZlFPbGtwanFqTXliV3lvZVF0c1c2cyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9sb2dpbiI7fX0=',1751720262);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stok_produk`
--

DROP TABLE IF EXISTS `stok_produk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `stok_produk` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `ukuran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_panjang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stok_produk`
--

LOCK TABLES `stok_produk` WRITE;
/*!40000 ALTER TABLE `stok_produk` DISABLE KEYS */;
INSERT INTO `stok_produk` VALUES (1,'15x3','1505',NULL,'2025-07-02 08:06:06'),(2,'80x10','500','2025-06-09 01:01:06','2025-06-09 01:01:06'),(3,'200x10','400','2025-06-09 01:01:55','2025-06-09 01:01:55'),(4,'100x20','1800','2025-06-29 05:32:11','2025-06-29 05:32:11'),(5,'100x10','419','2025-06-29 05:35:09','2025-07-02 07:47:44'),(6,'120x10','7050','2025-06-29 06:35:25','2025-06-29 06:47:10'),(10,'80x5','0','2025-07-02 08:06:06','2025-07-02 08:06:06');
/*!40000 ALTER TABLE `stok_produk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_management`
--

DROP TABLE IF EXISTS `user_management`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_management` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int NOT NULL,
  `menu_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_management`
--

LOCK TABLES `user_management` WRITE;
/*!40000 ALTER TABLE `user_management` DISABLE KEYS */;
INSERT INTO `user_management` VALUES (1,1,2),(2,2,1),(3,2,3),(4,3,5),(5,1,4);
/*!40000 ALTER TABLE `user_management` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_role`
--

DROP TABLE IF EXISTS `user_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_role` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_role`
--

LOCK TABLES `user_role` WRITE;
/*!40000 ALTER TABLE `user_role` DISABLE KEYS */;
INSERT INTO `user_role` VALUES (1,'PPIC'),(2,'Supervisor'),(3,'Warehouse');
/*!40000 ALTER TABLE `user_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `role_id` bigint DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,1,'Muhamad Firdaus Gozali','daus@simetri.co.id',NULL,'$2y$12$GtYTcsCmf3jNFVhC.zT8vuDvIsr4btz74ZlHOfJvdfp8L1ptZzOdy',NULL,NULL,NULL),(2,2,'Supervisor','spv@simetri.co.id',NULL,'$2y$12$GtYTcsCmf3jNFVhC.zT8vuDvIsr4btz74ZlHOfJvdfp8L1ptZzOdy',NULL,NULL,NULL),(3,3,'Warehouse','warehouse@simetri.co.id',NULL,'$2y$12$GtYTcsCmf3jNFVhC.zT8vuDvIsr4btz74ZlHOfJvdfp8L1ptZzOdy',NULL,NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utuh_produk`
--

DROP TABLE IF EXISTS `utuh_produk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `utuh_produk` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ukuran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utuh_produk`
--

LOCK TABLES `utuh_produk` WRITE;
/*!40000 ALTER TABLE `utuh_produk` DISABLE KEYS */;
INSERT INTO `utuh_produk` VALUES (1,'Tembaga 50x5','50x5','2','2025-06-09 01:21:24','2025-06-09 01:22:47'),(2,'Tembaga 100x5','100x5','1','2025-06-09 01:23:51','2025-06-09 01:23:51'),(3,'Tembaga 100x10','100x10','0','2025-06-09 01:23:51','2025-06-29 06:47:10'),(4,'Tembaga 100x20','100x20','4','2025-06-09 01:23:51','2025-06-29 05:32:43'),(5,'Tembaga 120x10','120x10','1','2025-06-29 05:33:23','2025-06-29 06:47:10'),(6,'Tembaga 80x5','80x5','0','2025-07-02 07:52:18','2025-07-02 08:06:06'),(7,'Tembaga 15x3','15x3','0','2025-07-02 07:52:59','2025-07-02 08:06:06');
/*!40000 ALTER TABLE `utuh_produk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'simetri-app'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-07-05 19:58:17
