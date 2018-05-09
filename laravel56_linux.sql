-- MySQL dump 10.13  Distrib 5.5.57, for Linux (x86_64)
--
-- Host: localhost    Database: laravel56
-- ------------------------------------------------------
-- Server version	5.5.57-log

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
-- Table structure for table `admin_users`
--

DROP TABLE IF EXISTS `admin_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_users`
--

LOCK TABLES `admin_users` WRITE;
/*!40000 ALTER TABLE `admin_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2016_06_01_000001_create_oauth_auth_codes_table',1),(4,'2016_06_01_000002_create_oauth_access_tokens_table',1),(5,'2016_06_01_000003_create_oauth_refresh_tokens_table',1),(6,'2016_06_01_000004_create_oauth_clients_table',1),(7,'2016_06_01_000005_create_oauth_personal_access_clients_table',1),(8,'2018_04_28_082809_admin_user',1);
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
INSERT INTO `oauth_access_tokens` VALUES ('03e273585438948a1cafeee884ed1dd15746f254f16981f38d63113df326421bcb997776c02207f5',NULL,8,NULL,'[]',0,'2018-05-09 01:29:34','2018-05-09 01:29:34','2018-06-09 09:29:34'),('0a7f9f660f9220c9a462651f966a4530aea83b812c5232fda87a9bc4603608a7ac8bbf946459907a',NULL,8,NULL,'[]',0,'2018-05-09 01:29:45','2018-05-09 01:29:45','2018-06-09 09:29:45'),('103bcc5e5f1be932424bb1454b771f44e6093a618054b2086e176b78515238b20913b6751b1f9115',6,2,NULL,'[]',0,'2018-05-08 23:55:44','2018-05-08 23:55:44','2018-06-09 07:55:44'),('13affa858bb95e8ee9c17f2083966774be34b62c186dadb12e2cb9b1a5ba58627a3ac5ab96f60146',6,9,'111111','[]',0,'2018-05-09 01:18:40','2018-05-09 01:18:40','2018-06-09 09:18:40'),('1ab02dd3e76a250225085c4de2a891f1dc090ee15b008532225e12222d7e40eae3d175ba2d7c61c2',6,8,NULL,'[]',1,'2018-05-08 23:44:08','2018-05-08 23:44:08','2018-06-09 07:44:08'),('26235d198506873efebe6120142adf96e16a9b224059d785922dffb7b82e451c1e3ca045ad3ad580',6,9,'4','[]',1,'2018-05-09 01:16:22','2018-05-09 01:16:22','2018-06-09 09:16:22'),('2a1749bd7a2bb74c4db30620369cb0b06530e0fc28b44ccca16288098eea3f6ca0e4a74c4ea2fb40',NULL,8,NULL,'[]',0,'2018-05-09 01:29:42','2018-05-09 01:29:42','2018-06-09 09:29:42'),('2ed065563e97eb75c3730d5354fa9f5fdb879e15f9997b393b9bf8f9d4e7bc53ce69c2ee0ca5b8a0',NULL,8,NULL,'[]',0,'2018-05-09 01:29:46','2018-05-09 01:29:46','2018-06-09 09:29:46'),('33cd1a751dda112868787cd4b2bfff0434d1ba26a900fb109a676bf29336137656a1cf63b4903008',NULL,8,NULL,'[]',0,'2018-05-09 01:29:38','2018-05-09 01:29:38','2018-06-09 09:29:38'),('48c745e3598696e6128ba77b22b9c46f9723a3df5942d25a6724b00032e3d07f4d594caa63b726f2',6,9,'aaa','[]',1,'2018-05-09 01:17:27','2018-05-09 01:17:27','2018-06-09 09:17:27'),('52c5fa7b0eff0b621e1af69308a0b263a43f4212402e3b368a184f4d702c45505e7ed3698d9b942e',NULL,8,NULL,'[]',0,'2018-05-09 01:27:47','2018-05-09 01:27:47','2018-06-09 09:27:47'),('60365fd209438598face5929fc394507ee24aaa9d3c9cf0a20577804044e574048b4d74fd52295f4',NULL,8,NULL,'[]',0,'2018-05-09 01:29:40','2018-05-09 01:29:40','2018-06-09 09:29:40'),('70a81418d1653b90b663cc1951a9e41ac4670d264228fe9430636e2fe1db23326653fc52f5509c93',6,9,'11111111','[]',1,'2018-05-09 01:15:47','2018-05-09 01:15:47','2018-06-09 09:15:47'),('7d2e23a677da4f5773be242f6a1f9eece27ee3c21bc2db06a5fb944f3f2ff8ef835eee22120a2e3d',NULL,8,NULL,'[]',0,'2018-05-09 01:27:38','2018-05-09 01:27:38','2018-06-09 09:27:38'),('8115a73f6f9c95085a88fb923ef98a8c941b711b051dbede3eaadf1033a645bb6c5209822d021bcd',NULL,8,NULL,'[]',0,'2018-05-09 01:29:43','2018-05-09 01:29:43','2018-06-09 09:29:43'),('b4c76ec324f980d23e997671c1bde18e808186fbd1a23b97500dd87e109de7941e31010e50c977e1',NULL,8,NULL,'[]',0,'2018-05-09 01:29:39','2018-05-09 01:29:39','2018-06-09 09:29:39'),('b539a7e2995a2c827371b4146d08ac99b82adf012bd33bf2a717381d04f843bbd82a11890f8a01ba',6,8,NULL,'[]',0,'2018-05-08 23:46:41','2018-05-08 23:46:41','2018-06-09 07:46:41'),('c69205987173b0f4c1f09699ec063fe53807463f4565ef62f378ee2bd12b12396902b7a676facc61',NULL,8,NULL,'[]',0,'2018-05-09 01:29:48','2018-05-09 01:29:48','2018-06-09 09:29:48'),('cadfb711e18466c428c64f72610cf734535364b73e22ab3242fc6d2d838c0f266317cbecceb47d67',6,9,'aaaa','[]',1,'2018-05-09 01:17:16','2018-05-09 01:17:16','2018-06-09 09:17:16'),('d1ad44db9270df94f75cf70ba1444d63fb55aa1ecd10e930d6ed6ddf041a81b383731716204de058',NULL,8,NULL,'[]',0,'2018-05-09 01:27:48','2018-05-09 01:27:48','2018-06-09 09:27:48'),('d1eef6a5e46ad89a40afb1a5b6864138e7b0e2fc92c5d69a702b722f28b306f31a5c7e1fd5bd7580',6,9,'3','[]',1,'2018-05-09 01:16:13','2018-05-09 01:16:13','2018-06-09 09:16:13'),('ff547fbf289bf9b34f14fabac2f1001cfde70b77a1ed774cba8844aca6da214ed5fc6dd7bfa91560',6,9,'2','[]',1,'2018-05-09 01:16:06','2018-05-09 01:16:06','2018-06-09 09:16:06');
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
INSERT INTO `oauth_auth_codes` VALUES ('a101c9939260ade769f6b368da808f105485a0814a8d1b8d5571ae5496d9e7f08d3e930cbd479433',6,8,'[]',1,'2018-05-09 07:54:07');
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_clients`
--

LOCK TABLES `oauth_clients` WRITE;
/*!40000 ALTER TABLE `oauth_clients` DISABLE KEYS */;
INSERT INTO `oauth_clients` VALUES (1,NULL,'General Admin System Personal Access Client','ml3KXBt88wc6Lg5GEBBUVsMPTN1zHOO8E6u83Fnk','http://localhost',1,0,0,'2018-05-04 01:04:49','2018-05-04 01:04:49'),(2,NULL,'General Admin System Password Grant Client','De2k1WGgpKKDSJvqIE6ftfDfQarIP4wuelifebEV','http://localhost',0,1,0,'2018-05-04 01:04:49','2018-05-04 01:04:49'),(8,6,'雅顿API','sTde5bAURAdhw3FEthBTjq2llrs0iLR4uVvepg53','http://la56.org/auth/callback',0,0,0,'2018-05-08 21:31:03','2018-05-08 21:31:03'),(9,6,'aaa','pb5WQIJvCXg323aoFeN22DJhvgJfsdN0Q9uE0a0S','http://localhost',1,0,0,'2018-05-09 01:14:35','2018-05-09 01:14:35'),(10,NULL,'General Admin System Personal Access Client','dVw5WK73E9Ar45zDp8dKjKOXYVfCchR21wxDuLnc','http://localhost',1,0,0,'2018-05-09 01:23:11','2018-05-09 01:23:11'),(11,NULL,'General Admin System Password Grant Client','118mAhRE1PxOeIqrlBRZXJ8NTTJw0959MoHnhuk2','http://localhost',0,1,0,'2018-05-09 01:23:11','2018-05-09 01:23:11'),(12,6,'bbb','xcZPzT5eAPWblPiyfTP4ZTCsMqqtfbd4oA7G5doH','http://localhost/auth/callback',0,0,0,'2018-05-09 01:24:40','2018-05-09 01:24:40');
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
INSERT INTO `oauth_personal_access_clients` VALUES (1,1,'2018-05-04 01:04:49','2018-05-04 01:04:49'),(2,3,'2018-05-04 02:02:50','2018-05-04 02:02:50'),(3,9,'2018-05-09 01:14:35','2018-05-09 01:14:35'),(4,10,'2018-05-09 01:23:11','2018-05-09 01:23:11');
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
INSERT INTO `oauth_refresh_tokens` VALUES ('1a882222708bdc2c9dfd467e996b0e364a8b60e3ca96f183b202c38412253f2fb7a3cd4eaa8f016d','b539a7e2995a2c827371b4146d08ac99b82adf012bd33bf2a717381d04f843bbd82a11890f8a01ba',0,'2018-06-09 07:46:41'),('7d0cafbba2972ebda43a41f221cc2129c9e8b1194c7c6e9c31e98b498868f9c449b6cb8230193155','1ab02dd3e76a250225085c4de2a891f1dc090ee15b008532225e12222d7e40eae3d175ba2d7c61c2',1,'2018-06-09 07:44:08'),('7df6d63775be656c0c93bfb844aabbc4420aeeb03e3ae41eefffafa0d5e72e723656ddad93007a7c','103bcc5e5f1be932424bb1454b771f44e6093a618054b2086e176b78515238b20913b6751b1f9115',0,'2018-06-09 07:55:44');
/*!40000 ALTER TABLE `oauth_refresh_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'user02','user02@163.com','$2y$10$8HSguxE2UixGE9c4.Y8NZ.IGQn8yVKSJ8YTXW0XwRuyI4jKbmQUDe','ZSHKOoKd4o1mF543QeasYwvnhIhOALmw1FFjwPs3bvTR73nwD7lRtUS8wlty','2018-05-03 23:59:44','2018-05-03 23:59:44'),(3,'user03','user03@163.com','$2y$10$TzEyZuwiOemqOP9KpI8tzeXSSwDhlaEdlVxLm8NEbd23cPp4GRs1i',NULL,'2018-05-04 00:01:01','2018-05-04 00:01:01'),(6,'api','api@163.com','$2y$10$7Yxj6q3jtv2tZzqmGiDQOuxBlPluqsBD5olSQcEZQdreLi8FyJNG6','cAqICH8Q6zDZ7X74dMbA76qD02IzCvU2NGkdqCmKuBX1V1LWhSGJcCH8dXeL','2018-05-08 21:30:12','2018-05-08 21:30:12');
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

-- Dump completed on 2018-05-09 17:38:55
