-- MySQL dump 10.13  Distrib 8.0.29, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: doctor_appointment_management
-- ------------------------------------------------------
-- Server version	8.0.29-0ubuntu0.20.04.3

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
-- Table structure for table `doctors`
--

DROP TABLE IF EXISTS `doctors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `doctors` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `active` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1006 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctors`
--

LOCK TABLES `doctors` WRITE;
/*!40000 ALTER TABLE `doctors` DISABLE KEYS */;
INSERT INTO `doctors` VALUES (1,'Dr. Prajwal','No.401, Vasanth Nagar, Bangalore',1,'2021-06-15 07:59:58','2021-06-15 07:59:58'),(2,'Dr. Anand','No.65, Jayanagar, Bangalore',1,'2021-06-15 07:59:58','2022-05-29 06:49:59'),(4,'Dr. Praveen','41st Street, Mysore',0,'2021-06-15 07:59:58','2022-05-29 05:48:55'),(1003,'Dr. Sunanda','No.12 Shivajinagar, Bangalore',1,'2022-05-29 08:48:00','2022-05-29 08:48:00'),(1004,'Dr. Jayasudha','No.45 Mysore',0,'2022-05-29 08:49:06','2022-05-29 08:56:08'),(1005,'Dr. Nanda','No.766 Ramnagar',1,'2022-05-29 08:57:11','2022-05-29 08:57:11');
/*!40000 ALTER TABLE `doctors` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2022_05_28_043701_create_doctors_table',1),(5,'2022_05_28_043734_create_time_availability_table',1),(6,'2022_05_28_061524_doctors_table_add_active_column',2),(7,'2022_05_28_110636_time_availability_table_alter_time_columns',3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `time_availability`
--

DROP TABLE IF EXISTS `time_availability`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `time_availability` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `doctor_id` int DEFAULT NULL,
  `day` int DEFAULT NULL,
  `open_status` int DEFAULT NULL,
  `start_time` time DEFAULT '00:00:00',
  `end_time` time DEFAULT '00:00:00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1063 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `time_availability`
--

LOCK TABLES `time_availability` WRITE;
/*!40000 ALTER TABLE `time_availability` DISABLE KEYS */;
INSERT INTO `time_availability` VALUES (1035,1,1,1,'04:00:00','16:00:00','2022-05-29 06:52:27','2022-05-29 06:54:46'),(1036,1,2,0,'00:00:00','00:00:00','2022-05-29 06:52:27','2022-05-29 06:54:46'),(1037,1,3,1,'02:00:00','12:00:00','2022-05-29 06:52:27','2022-05-29 06:54:46'),(1038,1,4,0,'00:00:00','00:00:00','2022-05-29 06:52:27','2022-05-29 06:54:46'),(1039,1,5,0,'00:00:00','00:00:00','2022-05-29 06:52:27','2022-05-29 06:54:46'),(1040,1,6,0,'00:00:00','00:00:00','2022-05-29 06:52:27','2022-05-29 06:54:46'),(1041,1,7,0,'00:00:00','00:00:00','2022-05-29 06:52:27','2022-05-29 06:54:46'),(1042,2,1,0,'00:00:00','00:00:00','2022-05-29 06:53:01','2022-05-29 06:53:01'),(1043,2,2,1,'03:00:00','15:00:00','2022-05-29 06:53:01','2022-05-29 06:53:01'),(1044,2,3,0,'00:00:00','00:00:00','2022-05-29 06:53:01','2022-05-29 06:53:01'),(1045,2,4,0,'00:00:00','00:00:00','2022-05-29 06:53:01','2022-05-29 06:53:01'),(1046,2,5,0,'00:00:00','00:00:00','2022-05-29 06:53:01','2022-05-29 06:53:01'),(1047,2,6,1,'04:00:00','10:00:00','2022-05-29 06:53:01','2022-05-29 06:53:01'),(1048,2,7,0,'00:00:00','00:00:00','2022-05-29 06:53:01','2022-05-29 06:53:01'),(1049,1003,1,1,'02:00:00','13:00:00','2022-05-29 08:56:38','2022-05-29 08:56:38'),(1050,1003,2,0,'00:00:00','00:00:00','2022-05-29 08:56:38','2022-05-29 08:56:38'),(1051,1003,3,0,'00:00:00','00:00:00','2022-05-29 08:56:38','2022-05-29 08:56:38'),(1052,1003,4,0,'00:00:00','00:00:00','2022-05-29 08:56:38','2022-05-29 08:56:38'),(1053,1003,5,0,'00:00:00','00:00:00','2022-05-29 08:56:38','2022-05-29 08:56:38'),(1054,1003,6,0,'00:00:00','00:00:00','2022-05-29 08:56:38','2022-05-29 08:56:38'),(1055,1003,7,0,'00:00:00','00:00:00','2022-05-29 08:56:38','2022-05-29 08:56:38'),(1056,1005,1,1,'02:00:00','11:00:00','2022-05-29 08:57:50','2022-05-29 08:57:50'),(1057,1005,2,0,'00:00:00','00:00:00','2022-05-29 08:57:50','2022-05-29 08:57:50'),(1058,1005,3,0,'00:00:00','00:00:00','2022-05-29 08:57:50','2022-05-29 08:57:50'),(1059,1005,4,0,'00:00:00','00:00:00','2022-05-29 08:57:50','2022-05-29 08:57:50'),(1060,1005,5,0,'00:00:00','00:00:00','2022-05-29 08:57:50','2022-05-29 08:57:50'),(1061,1005,6,0,'00:00:00','00:00:00','2022-05-29 08:57:50','2022-05-29 08:57:50'),(1062,1005,7,0,'00:00:00','00:00:00','2022-05-29 08:57:50','2022-05-29 08:57:50');
/*!40000 ALTER TABLE `time_availability` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-05-29 19:59:44
