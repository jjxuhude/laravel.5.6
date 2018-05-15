-- MySQL dump 10.13  Distrib 5.7.19, for Win64 (x86_64)
--
-- Host: localhost    Database: laravel56
-- ------------------------------------------------------
-- Server version	5.7.19

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `addresses`
--

DROP TABLE IF EXISTS `addresses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `addresses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `addresses`
--

LOCK TABLES `addresses` WRITE;
/*!40000 ALTER TABLE `addresses` DISABLE KEYS */;
INSERT INTO `addresses` VALUES (1,1,'上海','13300001111'),(2,2,'北京','18911112222'),(3,3,'广州','13300001111');
/*!40000 ALTER TABLE `addresses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_users`
--

DROP TABLE IF EXISTS `admin_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_users`
--

LOCK TABLES `admin_users` WRITE;
/*!40000 ALTER TABLE `admin_users` DISABLE KEYS */;
INSERT INTO `admin_users` VALUES (1,'admin','admin@163.com','$2y$10$jI7Mc2Gz6DIsrI6qxpH0g.DvAgq1O7niWlb7JFlWmkNOZLQ9FmGie','D5MOwwRKRXSqMUIo5KcTpnUZY4FLvUfCLOq0BBsCR0SXQUeFCuduhT4YUqLo','2018-04-28 01:04:35','2018-04-28 01:04:35');
/*!40000 ALTER TABLE `admin_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chat_messages`
--

DROP TABLE IF EXISTS `chat_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chat_messages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chat_messages`
--

LOCK TABLES `chat_messages` WRITE;
/*!40000 ALTER TABLE `chat_messages` DISABLE KEYS */;
INSERT INTO `chat_messages` VALUES (1,'Howdy everyone',1,'2018-05-10 18:57:49','2018-05-10 18:57:49'),(2,'Howdy everyone',1,'2018-05-10 19:06:22','2018-05-10 19:06:22'),(3,'hello everyone',1,'2018-05-10 19:07:58','2018-05-10 19:07:58'),(4,'hello everyone\\',1,'2018-05-10 19:14:53','2018-05-10 19:14:53'),(5,'hello everyone\\',1,'2018-05-10 19:14:55','2018-05-10 19:14:55'),(6,'hello everyone',1,'2018-05-10 19:14:57','2018-05-10 19:14:57'),(7,'hello everyone',1,'2018-05-10 19:14:58','2018-05-10 19:14:58'),(8,'hello everyone',1,'2018-05-10 19:14:59','2018-05-10 19:14:59'),(9,'hello everyone',1,'2018-05-10 19:19:20','2018-05-10 19:19:20'),(10,'hello everyone',1,'2018-05-10 19:19:42','2018-05-10 19:19:42'),(11,'hello everyone',1,'2018-05-10 19:19:42','2018-05-10 19:19:42'),(12,'hello everyone',1,'2018-05-10 19:19:43','2018-05-10 19:19:43'),(13,'hello everyone',1,'2018-05-10 19:19:43','2018-05-10 19:19:43'),(14,'hello everyone',1,'2018-05-10 19:19:44','2018-05-10 19:19:44'),(15,'hello everyone',1,'2018-05-10 19:19:44','2018-05-10 19:19:44'),(16,'hello everyone',1,'2018-05-10 19:24:39','2018-05-10 19:24:39'),(17,'hello everyone',1,'2018-05-10 19:28:26','2018-05-10 19:28:26'),(18,'hello everyone',1,'2018-05-10 19:38:08','2018-05-10 19:38:08'),(19,'hello everyone',1,'2018-05-10 21:20:21','2018-05-10 21:20:21'),(20,'1111111111111111111111',1,'2018-05-10 21:21:22','2018-05-10 21:21:22'),(21,'1111111111111111111111',1,'2018-05-10 21:21:56','2018-05-10 21:21:56'),(22,'1111111111111111111111',1,'2018-05-10 21:24:24','2018-05-10 21:24:24'),(23,'1111111111111111111111',1,'2018-05-10 21:29:17','2018-05-10 21:29:17'),(24,'1111111111111111111111',1,'2018-05-10 21:29:33','2018-05-10 21:29:33'),(25,'1111111111111111111111',1,'2018-05-10 21:36:57','2018-05-10 21:36:57'),(26,'1111111111111111111111',1,'2018-05-10 21:37:36','2018-05-10 21:37:36'),(27,'1111111111111111111111',1,'2018-05-10 21:44:34','2018-05-10 21:44:34'),(28,'1111111111111111111111',1,'2018-05-10 21:44:49','2018-05-10 21:44:49'),(29,'Howdy everyone',1,'2018-05-10 21:46:02','2018-05-10 21:46:02'),(30,'Howdy everyone',1,'2018-05-10 21:46:44','2018-05-10 21:46:44'),(31,'Howdy everyone',1,'2018-05-10 21:47:01','2018-05-10 21:47:01'),(32,'Howdy everyone',1,'2018-05-10 21:47:10','2018-05-10 21:47:10'),(33,'Howdy everyone',1,'2018-05-10 21:49:24','2018-05-10 21:49:24'),(34,'Howdy everyone',1,'2018-05-10 21:50:00','2018-05-10 21:50:00'),(35,'Howdy everyone',1,'2018-05-10 21:50:23','2018-05-10 21:50:23'),(36,'22222',1,'2018-05-11 22:17:22','2018-05-11 22:17:22'),(37,'22222',1,'2018-05-11 22:18:04','2018-05-11 22:18:04'),(38,'20180512063043',1,'2018-05-11 22:30:43','2018-05-11 22:30:43'),(39,'2018-05-12 06:31:01',1,'2018-05-11 22:31:01','2018-05-11 22:31:01'),(40,'2018-05-12 06:32:26',1,'2018-05-11 22:32:26','2018-05-11 22:32:26'),(41,'2018-05-12 06:32:41',1,'2018-05-11 22:32:41','2018-05-11 22:32:41'),(42,'111',1,'2018-05-11 23:51:14','2018-05-11 23:51:14'),(43,'111',1,'2018-05-11 23:51:29','2018-05-11 23:51:29'),(44,'111',1,'2018-05-11 23:51:46','2018-05-11 23:51:46'),(45,'111',1,'2018-05-11 23:53:15','2018-05-11 23:53:15'),(46,'111',1,'2018-05-11 23:53:28','2018-05-11 23:53:28'),(47,'111',1,'2018-05-11 23:53:44','2018-05-11 23:53:44'),(48,'111',1,'2018-05-11 23:54:36','2018-05-11 23:54:36'),(49,'111',1,'2018-05-11 23:54:45','2018-05-11 23:54:45'),(50,'111',1,'2018-05-11 23:55:05','2018-05-11 23:55:05'),(51,'111',1,'2018-05-11 23:55:57','2018-05-11 23:55:57'),(52,'111',1,'2018-05-11 23:56:05','2018-05-11 23:56:05'),(53,'111',1,'2018-05-11 23:59:33','2018-05-11 23:59:33'),(54,'111',1,'2018-05-11 23:59:38','2018-05-11 23:59:38'),(55,'111',1,'2018-05-11 23:59:44','2018-05-11 23:59:44'),(56,'111',1,'2018-05-12 00:00:50','2018-05-12 00:00:50'),(57,'111',1,'2018-05-12 00:01:17','2018-05-12 00:01:17'),(58,'111',1,'2018-05-12 00:01:37','2018-05-12 00:01:37'),(59,'111',1,'2018-05-12 00:02:05','2018-05-12 00:02:05'),(60,'111',1,'2018-05-12 00:08:08','2018-05-12 00:08:08'),(61,'111',1,'2018-05-12 00:10:05','2018-05-12 00:10:05'),(62,'111',1,'2018-05-12 00:12:13','2018-05-12 00:12:13'),(63,'111',1,'2018-05-12 00:12:37','2018-05-12 00:12:37'),(64,'111',1,'2018-05-12 00:17:55','2018-05-12 00:17:55'),(65,'111',1,'2018-05-12 00:18:09','2018-05-12 00:18:09'),(66,'111',1,'2018-05-12 00:30:12','2018-05-12 00:30:12'),(67,'111',1,'2018-05-12 00:30:32','2018-05-12 00:30:32'),(68,'111',1,'2018-05-12 00:30:50','2018-05-12 00:30:50'),(69,'111',1,'2018-05-12 00:31:51','2018-05-12 00:31:51'),(70,'111',1,'2018-05-12 00:39:12','2018-05-12 00:39:12'),(71,'111',1,'2018-05-12 00:41:50','2018-05-12 00:41:50'),(72,'111',1,'2018-05-12 01:30:44','2018-05-12 01:30:44'),(73,'111',1,'2018-05-12 01:31:04','2018-05-12 01:31:04'),(74,'111',1,'2018-05-12 01:31:12','2018-05-12 01:31:12'),(75,'111',1,'2018-05-12 01:32:03','2018-05-12 01:32:03'),(76,'111',1,'2018-05-12 01:32:19','2018-05-12 01:32:19'),(77,'111',1,'2018-05-12 01:32:53','2018-05-12 01:32:53'),(78,'111',1,'2018-05-12 01:33:31','2018-05-12 01:33:31'),(79,'111',1,'2018-05-12 02:27:02','2018-05-12 02:27:02'),(80,'111',1,'2018-05-12 02:27:53','2018-05-12 02:27:53'),(81,'111',1,'2018-05-12 02:28:20','2018-05-12 02:28:20'),(82,'111',1,'2018-05-12 04:54:31','2018-05-12 04:54:31'),(83,'111',1,'2018-05-12 04:55:24','2018-05-12 04:55:24'),(84,'111',1,'2018-05-12 05:12:00','2018-05-12 05:12:00'),(85,'111',1,'2018-05-12 05:12:13','2018-05-12 05:12:13'),(86,'111',1,'2018-05-12 05:16:12','2018-05-12 05:16:12'),(87,'2',2,'2018-05-12 05:17:55','2018-05-12 05:17:55'),(88,'1',1,'2018-05-12 05:18:22','2018-05-12 05:18:22'),(89,'2',2,'2018-05-12 05:18:33','2018-05-12 05:18:33'),(90,'2',2,'2018-05-12 05:21:48','2018-05-12 05:21:48'),(91,'2',2,'2018-05-12 05:22:14','2018-05-12 05:22:14'),(92,'2',2,'2018-05-12 05:22:54','2018-05-12 05:22:54'),(93,'1',1,'2018-05-12 05:23:24','2018-05-12 05:23:24'),(94,'1',1,'2018-05-12 05:23:41','2018-05-12 05:23:41'),(95,'2',2,'2018-05-12 05:23:49','2018-05-12 05:23:49'),(96,'2',2,'2018-05-12 05:24:30','2018-05-12 05:24:30'),(97,'2',2,'2018-05-12 05:24:46','2018-05-12 05:24:46'),(98,'1',1,'2018-05-12 05:44:08','2018-05-12 05:44:08'),(99,'2',2,'2018-05-12 05:44:11','2018-05-12 05:44:11');
/*!40000 ALTER TABLE `chat_messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
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
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2018_04_28_082809_admin_user',2),(4,'2016_06_01_000001_create_oauth_auth_codes_table',3),(5,'2016_06_01_000002_create_oauth_access_tokens_table',3),(6,'2016_06_01_000003_create_oauth_refresh_tokens_table',3),(7,'2016_06_01_000004_create_oauth_clients_table',3),(8,'2016_06_01_000005_create_oauth_personal_access_clients_table',3),(9,'2018_05_10_062532_create_chat_messages_table',4),(10,'2018_05_11_081347_create_orders_table',5),(11,'2018_05_13_111130_create_jobs_table',6),(12,'2018_05_14_070640_create_addresses_table',7),(13,'2018_05_14_073411_create_posts_table',8);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_access_tokens`
--

DROP TABLE IF EXISTS `oauth_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_access_tokens`
--

LOCK TABLES `oauth_access_tokens` WRITE;
/*!40000 ALTER TABLE `oauth_access_tokens` DISABLE KEYS */;
INSERT INTO `oauth_access_tokens` VALUES ('02757b4062f06d9b1e790326f5de17b4b882f2fb96e11e540f04a8fd5f82f114566e9625d99a9445',1,2,NULL,'[]',0,'2018-05-14 23:18:21','2018-05-14 23:18:21','2018-06-15 07:18:21'),('04ed5071a222bc226d8e4f7da1c8e4c49d4619c949197a8efaea6d41fdfa9d9dcdecc0a5d18f4b56',3,1,'MyApp','[]',0,'2018-05-14 23:00:08','2018-05-14 23:00:08','2018-06-15 07:00:08'),('64c76a9d5f9f66117262a4cdc1a0b8a0aec4de74de79ba917b98e2104e4bcaabf2b71dfa785fd7aa',3,1,'MyApp','[]',0,'2018-05-14 23:02:02','2018-05-14 23:02:02','2018-06-15 07:02:02'),('71f2878959b55a846746538224e9cffd504ce1dbd40db561dd9ff68d0f5b5c32ea7693d833f584eb',NULL,5,NULL,'[]',0,'2018-05-14 23:15:33','2018-05-14 23:15:33','2018-06-15 07:15:33'),('87fa0491b5c8e727d0bca9b6d852d8b76524f7c69030d6d2d1193c3256c479d450d08bad5770ee48',1,2,NULL,'[]',0,'2018-05-14 23:18:19','2018-05-14 23:18:19','2018-06-15 07:18:19'),('c35bf701931fd116cebc6b268e02bf731297cd9fa6b6a31a4fe61d3fcaf5cbf60b6a29ce8a930f2d',1,2,NULL,'[]',0,'2018-05-14 23:18:37','2018-05-14 23:18:37','2018-06-15 07:18:37'),('c553d8dc2f35ffb5e95dedbeb0dd0dc6b7252691626d7b9d12f82693d3ba3c6b788c3e3a41334452',1,5,NULL,'[]',1,'2018-05-14 23:19:20','2018-05-14 23:19:20','2018-06-15 07:19:20'),('e0f51cad74a77a3d501f95acf3058d11428804544179db3f547a0c126fe0a9f545813b1d6433c065',NULL,5,NULL,'[]',0,'2018-05-14 23:15:35','2018-05-14 23:15:35','2018-06-15 07:15:35'),('ef6a33a28ad82682742a9ea693a93278ac599f6f1888b89650d3d08c95594db1d4239c114639e552',NULL,5,NULL,'[]',0,'2018-05-14 23:15:36','2018-05-14 23:15:36','2018-06-15 07:15:36'),('eff62d9662c7d88d90cbcba8ed118e79f875f8b82929ea2a35b518a7e92fb928258573da571635c4',1,2,NULL,'[]',0,'2018-05-14 23:17:00','2018-05-14 23:17:00','2018-06-15 07:17:00'),('fe62aee895722c164ecbac1a19dfe569200890bc87e4c3d580108d81a741242a85f6cf3c83147118',1,5,NULL,'[]',0,'2018-05-14 23:19:54','2018-05-14 23:19:54','2018-06-15 07:19:54');
/*!40000 ALTER TABLE `oauth_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_auth_codes`
--

DROP TABLE IF EXISTS `oauth_auth_codes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_auth_codes`
--

LOCK TABLES `oauth_auth_codes` WRITE;
/*!40000 ALTER TABLE `oauth_auth_codes` DISABLE KEYS */;
INSERT INTO `oauth_auth_codes` VALUES ('0c5b6dc5bb2dc549bb864cae0374f2dd484ce8e1e8a4c9836a439d2d6598cdecaa85e9e43fd8ba01',1,5,'[]',1,'2018-05-15 04:02:12'),('609752841ea2fa07ee3f49499c7a7bf5085e9c64cd92b403bd4842c9d1ab49c1c0fa6cfedc320819',1,5,'[]',1,'2018-05-15 04:06:16'),('678a0e39f1602dd03a627df8f3e030ddd5fda972f230aec0803612cc837ede05e326152cc7ff0c5e',2,5,'[]',1,'2018-05-15 03:41:04'),('a646ec3fb6d654cf3ee8b599c873c2d587b564ff99c2465a9136b8477360937cdb46429a9f7e0468',1,5,'[]',1,'2018-05-15 04:05:45'),('a80ae748ffc7366f0a1a1c3a829e70cdd039cbc7c9a90d19a340e37e48a3bf47de3bc37fc06f599d',1,5,'[]',1,'2018-05-15 07:29:19'),('d96ed5690f7cb3da23286e6ceda97d6131cd2084f5a597ac6c8c73f2c51573d1e3d16b74fd5cc908',2,5,'[]',0,'2018-05-15 03:49:09'),('ddf9e7f97bc91485a6f2636ca7ce44e5727535672e1db4aa31536dae90fcb8c256016ea1f7df9879',2,5,'[]',1,'2018-05-15 03:20:30'),('ff021716fdd885308731b5ad2da87668b0db8c4dcc23436cedb26127891af1996d00b0d362bfe947',2,5,'[]',1,'2018-05-15 04:01:18');
/*!40000 ALTER TABLE `oauth_auth_codes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_clients`
--

DROP TABLE IF EXISTS `oauth_clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_clients`
--

LOCK TABLES `oauth_clients` WRITE;
/*!40000 ALTER TABLE `oauth_clients` DISABLE KEYS */;
INSERT INTO `oauth_clients` VALUES (1,NULL,'General Admin System Personal Access Client','VhA04JDvdY4dOhdn8g1xJKP7bh8oUxRX10cZANhh','http://la.org/api/callback',1,0,0,'2018-05-03 23:32:52','2018-05-03 23:32:52'),(2,NULL,'General Admin System Password Grant Client','68Z8L9bO6oauU4eYe9uX2m6DbChv13cITfWkztWp','http://la.org/api/callback',0,1,0,'2018-05-03 23:32:52','2018-05-03 23:32:52'),(5,1,'get token by code.','7FU6Qs2BpClruEclLaa7MGZS2Tjf5p5FxN54Rfrj','http://la.org/api/callback',0,0,0,'2018-05-14 18:31:43','2018-05-14 18:31:43');
/*!40000 ALTER TABLE `oauth_clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_personal_access_clients`
--

DROP TABLE IF EXISTS `oauth_personal_access_clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_personal_access_clients_client_id_index` (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_personal_access_clients`
--

LOCK TABLES `oauth_personal_access_clients` WRITE;
/*!40000 ALTER TABLE `oauth_personal_access_clients` DISABLE KEYS */;
INSERT INTO `oauth_personal_access_clients` VALUES (1,1,'2018-05-03 23:32:52','2018-05-03 23:32:52');
/*!40000 ALTER TABLE `oauth_personal_access_clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_refresh_tokens`
--

DROP TABLE IF EXISTS `oauth_refresh_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_refresh_tokens`
--

LOCK TABLES `oauth_refresh_tokens` WRITE;
/*!40000 ALTER TABLE `oauth_refresh_tokens` DISABLE KEYS */;
INSERT INTO `oauth_refresh_tokens` VALUES ('030486e77740350d397536bd955105015a5f2ac7580c02ecbd0578814e0f82a69d186714d6dc9673','f5b813f07c02d654281ac44ca393f879ce4699f2775a9ca94440716685c74dcb978178f8a5528ee7',0,'2018-06-15 03:07:54'),('030acb5e089bac42a786f794b9200a6d8921a0f971e40a5adf0bc635fd0b11bf27891f96b157b135','5c00f7a1e8292f2e9b61a483c4d9c68bfec0db0801d1d34e56256285d498e10fa8d950cdf8d25fc6',1,'2018-06-15 03:56:17'),('1a0b7aa1ad2a81e4ef299f4e01b9e238df360da3b785978adf2485f431408d7bf48c522e76b6cde6','c35bf701931fd116cebc6b268e02bf731297cd9fa6b6a31a4fe61d3fcaf5cbf60b6a29ce8a930f2d',0,'2018-06-15 07:18:37'),('1f05794d7b535d1426518e5849bed7427088bf683eebdd8360148b373d850e2f684b8c3602bce1c0','f992516152fc49e4f16026aae70df456dd204a1be07a53197c241ffb7c1561ff0170212c97909f41',0,'2018-06-15 05:33:55'),('2481baec8f2dae19725f38570735577e5171e9f90af454c1fea45c83ba13804b92af704ea94e3ccc','acf702fc544e0c2906705778e7fd7fd76b64f01059a120d0a30fc8dc6a41223eb4f5a8ca68743cbc',0,'2018-06-15 02:50:24'),('262c7cb4b280fd2afc091f266e0bf9189bd355fea794d926b175c3855392542d68af9d0b615de177','eff62d9662c7d88d90cbcba8ed118e79f875f8b82929ea2a35b518a7e92fb928258573da571635c4',0,'2018-06-15 07:17:00'),('263897d9e38dfef5adf02ed455b71a9e15edfa347441f9884c2917e1f8569ea2315216a2a7bbebd7','6325aa2877d679ff0bd4fc11196d2d8b42a685509c2145fb92a5051c8243208a5bf8229f9d6fed9e',0,'2018-06-15 03:07:33'),('317f45c62180eb0bf96d6b87d3ed0f4aeebbe97f55650fef656e671583602818e6c7deeb197a9c4d','0f19ef37b900a96b9b207fb896f5bc8afabd530c5440504fb63242530f89e1270b63bef918fae49f',0,'2018-06-15 02:46:41'),('31e11aac8d6afdb5517a592388e8f2b87e45149b76c520e4f18f7672586714047c7f2071d7834788','e7026eaf6d616007b676b25f7dcd49637e30539ec0fe23d41fd15f8867af58ca282d44e1c2a375ea',0,'2018-06-15 05:34:09'),('3bfb3f5fd4e62b3c0a0a1c0b7856b80a2dfbd508133d45d0d18f2ece804d7defe25dca30787987e1','ae0e5b89e1a38f34d8cb251527181386f6110fba40edf878261bd7ac062e3af2d1e366e53e6f076c',0,'2018-06-15 03:05:13'),('4722db015c10b0eb730f1fafc26097bb800c75147624be1bff000669909a2ac601513f0e16b190e2','deba267ca455676781357f2beb024a96712118c2f88e88b3ca2098d292ae46b26f4463bc9d2e2d26',0,'2018-06-15 03:02:00'),('47e953221250da37b60b9ba250700afeb83f18a2c240a8921cdeff2f10dacc9987b51f9f8cdd3c9c','58b2df59f5f0278ec7da84f92e1bdf40d3a0d2797e202502118c335a112ac27b8134ecffc4e6e3d8',0,'2018-06-15 03:31:05'),('66a6365cf533405e80b9b0befde30bdafd7a39f5d3606442691d6219e1b79a15cc5d5239b0c18728','0e08de4465d8dba5b3c819b861d0954e2d07c5de9089b0aff00b7d030c8d80b1d97ac886f844c079',0,'2018-06-15 05:34:07'),('6b9de94b4fce2be12c0e4860e4ab06a0e64e9a58b96cb60144d1c0caa4f5b9630ceae4e9e79c4291','3f300d62d06ec3f55d48553621c3b47e3d8ba0eecdcc3e45b6774f9c09419c47d4e8f50a942f9b3d',0,'2018-06-15 05:29:46'),('76bb9366db427162a8bacb124266a24544e86693df099510ad19ac219497b0e86cac67556ddee30f','a1d948af2a129b41d43a1cadb49c44a4624823f975c90febd65ba74dc24678f8b75607064ac5306e',0,'2018-06-15 03:52:14'),('7f3a1d62546cbf1bfb473867124fb1f16baa1f543dc48f6481ed3df7efd932bef32e326f033122cf','b10d7f7916f277e01f52bc9601f474b228426391a66aa047acc670d5d2e8f587a02ebe12f7da030a',0,'2018-06-15 03:10:31'),('8ec07cac0e02080c0cac1f42265b6541c8f617331be61be8194f4d59c992ab855b009e03a5603736','9110ecba2cf30397006706c9c6b47da3c6ad852f875a4d567a4bb6be791b54defeb5e9c4492ef316',0,'2018-06-15 03:08:41'),('b9e5ac88b0d5138eebc40f499ea7eb2ee1231a88018d4b0b70e2b25636b1db84eab057c3fca4511a','b1e4c6f1de4a04b2367ad4669d706f76d0a978e6dbebb947a9846f949e08b9e132a8110e4e33523a',0,'2018-06-15 05:34:01'),('beae7ab7610b4613f9acd8c097bc9b80982bffc19ba84e6bf8a610132d0fb9fdad0ec956ea3fc819','02757b4062f06d9b1e790326f5de17b4b882f2fb96e11e540f04a8fd5f82f114566e9625d99a9445',0,'2018-06-15 07:18:21'),('c887c4a1a633fc099fbe126ac2b63c7c3f6cce30f9d04402a377fb5381c5062a81ef1daf1e4dc374','b40c6099a68bf28d0687da2e3f8015059d918bd79ccb534c8bfcdebbeb72e3dc29f5b0c987be6057',0,'2018-06-15 05:34:03'),('caefd93cd2429763390ad94b6bdee82844bb2d7d5e53d4e9045e38b1f6d897966eb2e2599db370ec','aa91b3359f1fffba1a6facc24dc81f2ded9d90bfe608f48a66a4f8f70c36eac65504d8f25ade050b',0,'2018-06-15 05:33:49'),('cb38a032e5dd1e9b14d5fbd0aa4eb1d902bd587cd16a771f63808be46a1e5fde400f1632e52e41dc','7e862ca77bb83753307830847a8ed63dd3410461401a80d546fc14c15b0b18f7589ee51edb67cd0d',0,'2018-06-15 05:33:57'),('cf045d667d3f6571ebe9cdca19c548fb8c8b06ff45ceedece9f9f0e8d39c73dfaec17269f87d056d','c5d9efb3b0bd9b4396e16ccc6bc779a16b0325e2b9842170a45bf99e16fdfefab6fc3511e9b54e2e',0,'2018-06-15 03:55:46'),('d58a6ba42f6544d884f16604a254c0bbc90c1617b706a6bfeae0dcfefe7fdda511a4858257c1ec8c','c553d8dc2f35ffb5e95dedbeb0dd0dc6b7252691626d7b9d12f82693d3ba3c6b788c3e3a41334452',1,'2018-06-15 07:19:20'),('dcbeaf9d066a115240bf5bc1bb2d8ef26b83fdd231dd9189b400976804f4ee185d22e3c19abdf703','d92f289a4a1d4f587f4155d76788d86c66b2501c013022ce5f9da603fbb7a3f7e840b16e2ac9b0f2',0,'2018-06-15 02:54:33'),('f46671cf279014048ad59b17429eb882d68f82f99cbb7b22d3449a805307a2f3b92c1e13ea26878a','87fa0491b5c8e727d0bca9b6d852d8b76524f7c69030d6d2d1193c3256c479d450d08bad5770ee48',0,'2018-06-15 07:18:19'),('fa85cc75a449b8e20f66c4b4041a0951c3efdc053ffee6b288671d4f79e1699ffe906516a12c2fd5','2fdb49e7c9cafa6390436420e77b7b17c4bcc671def4cfb1c2cfeb1227643af1abac2447624d5ca0',0,'2018-06-15 03:51:19'),('fcbb79059558223e0f74bd937c926a1ec85d71fe1d8a10f54b052e9736cdc7a326ebb83589363b65','fe62aee895722c164ecbac1a19dfe569200890bc87e4c3d580108d81a741242a85f6cf3c83147118',0,'2018-06-15 07:19:54');
/*!40000 ALTER TABLE `oauth_refresh_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,'我是user01',1,NULL,NULL);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,1,'post 01'),(2,1,'post 02'),(3,2,'post 03'),(4,2,'post 04'),(5,2,'post 05'),(6,1,'blog 06'),(7,1,'blog 07'),(8,1,'blog 08'),(9,1,'blog 09'),(10,1,'blog 10'),(11,1,'blog 11'),(12,1,'blog 12'),(13,1,'blog 06'),(14,1,'blog 07'),(15,1,'blog 08'),(16,1,'blog 09'),(17,1,'blog 10'),(18,1,'blog 11'),(19,1,'blog 12');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'user01','user01@163.com','$2y$10$T3QoTyKznsULJV0UI82Wme9ePebccjINTTjhju8bSyaPw3pG.2Ari','BHZP5P256v2buzScWXmZpBgotJ5BIs0KYIboJlCVf9zIWazEoD4mlYngmJVP','2018-04-27 23:19:16','2018-04-27 23:19:16'),(2,'user02','user02@163.com','$2y$10$VZ9wtj3kRbSpXVa6FvS.weFJygh9I/Ypv6gCX.QBOdbTg2NjWm4M.','TgNQZvLqVbSYA3XYZ5Z74bWwC92hF38fbMih8zKVBQ6nx85t1vj6VwNnphV8','2018-05-12 03:35:55','2018-05-12 03:35:55'),(3,'user04','user04@163.com','$2y$10$cDzo4gWimwW0KHucbUJ9PODO.0Dq9j1BMntENVhabFjPWjilbkZXG',NULL,'2018-05-14 22:33:28','2018-05-14 22:33:28'),(4,'user05','user05@163.com','$2y$10$LTuedp38Cmw.PKA2LbDgTO.9UC9T/NNdmyJm1ssHJY/lz49ZhLcze',NULL,'2018-05-14 22:35:29','2018-05-14 22:35:29'),(5,'user06','user06@163.com','$2y$10$GcMoug8MSqQUtGyTz.lt9.BshaBaWIK76ExansYyRv5Um1rlFUBnS',NULL,'2018-05-14 22:51:28','2018-05-14 22:51:28');
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

-- Dump completed on 2018-05-15 15:21:18
