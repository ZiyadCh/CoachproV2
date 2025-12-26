/*M!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19  Distrib 10.11.13-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: coachprov2
-- ------------------------------------------------------
-- Server version	10.11.13-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `coachs`
--

DROP TABLE IF EXISTS `coachs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `coachs` (
  `user_id` int(11) NOT NULL,
  `discipline` varchar(100) DEFAULT NULL,
  `experience` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  CONSTRAINT `coachs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coachs`
--

LOCK TABLES `coachs` WRITE;
/*!40000 ALTER TABLE `coachs` DISABLE KEYS */;
INSERT INTO `coachs` VALUES
(1,'Fitness',8,'Coach fitness certifié'),
(2,'Yoga',6,'Spécialiste yoga et respiration'),
(3,'Musculation',10,'Préparateur physique'),
(4,'Pilates',5,'Coach pilates bien-être'),
(5,'CrossFit',7,'CrossFit compétition'),
(65,'football',3,'ddd'),
(67,'football',2,'wwwww'),
(72,'football',7,'qoeifj'),
(73,'box',3,'wpfijief');
/*!40000 ALTER TABLE `coachs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `reservations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `seance_id` int(11) DEFAULT NULL,
  `sportif_id` int(11) DEFAULT NULL,
  `reserved_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `seance_id` (`seance_id`),
  KEY `sportif_id` (`sportif_id`),
  CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`seance_id`) REFERENCES `seances` (`id`),
  CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`sportif_id`) REFERENCES `sportifs` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservations`
--

LOCK TABLES `reservations` WRITE;
/*!40000 ALTER TABLE `reservations` DISABLE KEYS */;
INSERT INTO `reservations` VALUES
(48,14,71,'2025-12-25 15:37:13'),
(49,9,71,'2025-12-25 16:11:04'),
(50,15,71,'2025-12-25 21:09:38'),
(51,17,71,'2025-12-26 09:39:16'),
(52,18,71,'2025-12-26 09:44:10'),
(53,16,74,'2025-12-26 10:26:14'),
(54,19,75,'2025-12-26 11:25:19'),
(55,22,71,'2025-12-26 14:26:25');
/*!40000 ALTER TABLE `reservations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seances`
--

DROP TABLE IF EXISTS `seances`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `seances` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `coach_id` int(11) DEFAULT NULL,
  `date_seance` date DEFAULT NULL,
  `heure` time DEFAULT NULL,
  `duree` int(11) DEFAULT NULL,
  `statut` enum('disponible','reservee') DEFAULT 'disponible',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `coach_id` (`coach_id`),
  CONSTRAINT `seances_ibfk_1` FOREIGN KEY (`coach_id`) REFERENCES `coachs` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seances`
--

LOCK TABLES `seances` WRITE;
/*!40000 ALTER TABLE `seances` DISABLE KEYS */;
INSERT INTO `seances` VALUES
(1,1,'2025-01-10','10:00:00',60,'reservee','2025-12-23 11:25:14'),
(2,1,'2025-01-11','11:00:00',90,'reservee','2025-12-23 11:25:14'),
(3,1,'2025-01-12','10:30:00',60,'reservee','2025-12-23 11:25:14'),
(4,2,'2025-02-05','09:00:00',60,'reservee','2025-12-23 11:25:14'),
(5,2,'2025-02-06','09:30:00',60,'reservee','2025-12-23 11:25:14'),
(6,2,'2025-02-07','10:00:00',60,'reservee','2025-12-23 11:25:14'),
(7,3,'2025-03-01','14:00:00',90,'reservee','2025-12-23 11:25:14'),
(8,3,'2025-03-01','15:00:00',60,'reservee','2025-12-23 11:25:14'),
(9,4,'2024-11-01','08:00:00',60,'reservee','2025-12-23 11:25:14'),
(10,5,'2025-01-20','18:00:00',120,'reservee','2025-12-23 11:25:14'),
(11,5,'2025-01-22','18:00:00',120,'reservee','2025-12-23 11:25:14'),
(13,5,'2000-06-07','19:30:00',90,'reservee','2025-12-25 08:36:02'),
(14,72,'5555-05-05','05:55:00',45,'reservee','2025-12-25 15:36:33'),
(15,72,'3333-03-03','03:33:00',60,'reservee','2025-12-25 21:09:23'),
(16,72,'0888-08-08','08:08:00',45,'reservee','2025-12-26 07:56:57'),
(17,73,'0666-06-06','06:06:00',60,'reservee','2025-12-26 08:18:03'),
(18,73,'9999-09-09','09:09:00',60,'reservee','2025-12-26 09:43:50'),
(19,72,'2005-06-02','17:00:00',60,'reservee','2025-12-26 11:00:36'),
(21,73,'2025-01-02','11:11:00',60,'disponible','2025-12-26 11:27:53'),
(22,73,'2026-05-21','12:00:00',120,'reservee','2025-12-26 11:42:40');
/*!40000 ALTER TABLE `seances` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sportifs`
--

DROP TABLE IF EXISTS `sportifs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `sportifs` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`user_id`),
  CONSTRAINT `sportifs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sportifs`
--

LOCK TABLES `sportifs` WRITE;
/*!40000 ALTER TABLE `sportifs` DISABLE KEYS */;
INSERT INTO `sportifs` VALUES
(6),
(7),
(8),
(9),
(10),
(11),
(71),
(74),
(75),
(76);
/*!40000 ALTER TABLE `sportifs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `role` enum('coach','sportif') NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES
(1,'El Amrani','Youssef','youssef@coach.com','coach','2025-12-23 11:24:07',NULL),
(2,'Benali','Sara','sara@coach.com','coach','2025-12-23 11:24:07',NULL),
(3,'Haddad','Karim','karim@coach.com','coach','2025-12-23 11:24:07',NULL),
(4,'Ait Ali','Nadia','nadia@coach.com','coach','2025-12-23 11:24:07',NULL),
(5,'Raji','Omar','omar@coach.com','coach','2025-12-23 11:24:07',NULL),
(6,'Saidi','Amine','amine@sportif.com','sportif','2025-12-23 11:24:07',NULL),
(7,'Lahcen','Rania','rania@sportif.com','sportif','2025-12-23 11:24:07',NULL),
(8,'Fassi','Othmane','othmane@sportif.com','sportif','2025-12-23 11:24:07',NULL),
(9,'Zahraoui','Salma','salma@sportif.com','sportif','2025-12-23 11:24:07',NULL),
(10,'Kamal','Yassine','yassine@sportif.com','sportif','2025-12-23 11:24:07',NULL),
(11,'Berrada','Imane','imane@sportif.com','sportif','2025-12-23 11:24:07',NULL),
(65,'d','d','d@d','coach','2025-12-24 22:26:17','$2y$12$hu3FGIV77Nb04zXyYJGzi.SwuHKV4pdH7I5VgKtVpfVcAbnH9Xloy'),
(67,'ww','ww','w@w','coach','2025-12-24 23:19:19','$2y$12$VoX8Vd0yxFZzdBMcfJqG5eSaX54wJVHTUOylPwLr2fbChvoYCWlAy'),
(71,'mohamed','mohammed','mohamed@gmail.com','sportif','2025-12-25 14:38:46','$2y$12$x2XP.C9Ih4F5Y7eMeCRLneCDCLy9uXb44kicG4PLJ097PhGkGKtAO'),
(72,'abdelah','abdelah','ab@gmail','coach','2025-12-25 15:19:55','$2y$12$IdIoDedsyIXOkZNpsypVU.Z1d2ddIIEIPa5YNQ0xVAe0Ykbdofpgu'),
(73,'Youness','farid','younes@gmail','coach','2025-12-26 08:07:29','$2y$12$Au1TF4RnfcmecmreJJ3lM.zC/PPpcxM781aPboXUIT0KE1c0hUxJG'),
(74,'karim','karim','karim@gmail.com','sportif','2025-12-26 10:24:14','$2y$12$x8voWM1ZOhBk6LhEOrQaYOMhhzypPbVHdwwnuYRUNi5HjhWnXmrGK'),
(75,'fatiha','fatiha','fati@g','sportif','2025-12-26 11:23:42','$2y$12$eOZAqdijdLKT/djNDb5zF.2BsjKXllxg1c.qwTyv6gHGKPFmvXqq.'),
(76,'halima','h','h@fd','sportif','2025-12-26 11:27:28','$2y$12$3WLA5VJ/WTJCDVZcjshedePPZzFtS0H7xyrum0E.AFiLwO69p7OQ2');
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

-- Dump completed on 2025-12-26 19:57:23
