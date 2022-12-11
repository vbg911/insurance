-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: localhost    Database: ins_app
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
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clients` (
  `client_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_czech_ci NOT NULL,
  `surname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_czech_ci NOT NULL,
  `street` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_czech_ci NOT NULL,
  `city` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_czech_ci NOT NULL,
  `zipcode` int NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_czech_ci NOT NULL,
  `phone` int NOT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_czech_ci NOT NULL,
  `admin` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_czech_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES (1,'Валерий','Гуров','Спортивная 27','Электросталь',12345,'vbg911@gmail.com',792519672,'$2y$10$4zPGbKF4JmnRmxNiy7./.O/gYxolBGHjrMImfhS7GhOfcNgg9JaHG',0),(2,'Петр','Петров','Зеленая 12','Москва',10010,'peter@petrov.ru',456456789,'$2y$10$4zPGbKF4JmnRmxNiy7./.O/gYxolBGHjrMImfhS7GhOfcNgg9JaHG',0),(3,'Алина','Веникова','Желтая 78','Мурманск',77900,'alina@murmansk.com',734915222,'$2y$10$4zPGbKF4JmnRmxNiy7./.O/gYxolBGHjrMImfhS7GhOfcNgg9JaHG',0),(4,'Александр','Быстров','Ленина 35','Ногинск',75002,'alex@noginsk.ru',789456123,'$2y$10$4zPGbKF4JmnRmxNiy7./.O/gYxolBGHjrMImfhS7GhOfcNgg9JaHG',0),(5,'Павел','Павлов','Новая 147','Боровичи',61600,'pavel@pavel.com',147258369,'$2y$10$4zPGbKF4JmnRmxNiy7./.O/gYxolBGHjrMImfhS7GhOfcNgg9JaHG',0),(6,'Егор','Егоров','Старая 73','Москва',10200,'egorik@mail.ru',987654321,'$2y$10$4zPGbKF4JmnRmxNiy7./.O/gYxolBGHjrMImfhS7GhOfcNgg9JaHG',0),(7,'admin','admin',' ',' ',0,'admin@admin.com',0,'$2y$10$4zPGbKF4JmnRmxNiy7./.O/gYxolBGHjrMImfhS7GhOfcNgg9JaHG',1),(8,'0','Гуров','Спортивная 27','Электросталь',324,'pete5r@petrov.ru',4545,'$2y$10$Xb9wAkYZNuKH2wyBiWuQbe1N0VjqMjYCIbeeXAdnvtgMunYLpmwIC',0),(9,'Андрей','Андреев','Не спортивная 27','Сахалин',43,'saxalin@saxalin.com',34343434,'$2y$10$ESrhwggoAdsNXGFbgEXEyOnyo2HbDMugZ/ZTyXuxxQW8xUirYCJW6',0),(10,'Андрей','Андреев','Не спортивная 27','Сахалин',43,'saxalin@saxalin.com',34343434,'$2y$10$QR0bHY8pFAGaSbwvyb5BqeZFgJt/QHgILuI2QkP8ygH.WJI8pFZmy',0),(11,'test','customer','test 1','customer_city',3344,'test@customer',33445566,'$2y$10$fFyOlU5iriXkbf8u2PTewuFzVF3uuBnNU7jmnh/0Js8iXh1zXs4DK',0);
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `event_details`
--

DROP TABLE IF EXISTS `event_details`;
/*!50001 DROP VIEW IF EXISTS `event_details`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `event_details` AS SELECT 
 1 AS `event_num`,
 1 AS `ins_cat`,
 1 AS `ins_number`,
 1 AS `event_date`,
 1 AS `status`,
 1 AS `client_id`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `events` (
  `event_id` int NOT NULL AUTO_INCREMENT,
  `client_id` int NOT NULL,
  `ins_id` int NOT NULL,
  `event_num` int NOT NULL,
  `event_date` date NOT NULL,
  `status` enum('открыто','закрыто','выполняется','') COLLATE utf8mb4_czech_ci NOT NULL,
  PRIMARY KEY (`event_id`),
  KEY `event_client` (`client_id`),
  CONSTRAINT `event_client` FOREIGN KEY (`client_id`) REFERENCES `clients` (`client_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_czech_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
INSERT INTO `events` VALUES (1,1,1,2105456,'2021-05-18','закрыто'),(2,4,3,2002741,'2020-02-11','закрыто'),(3,3,4,2008174,'2020-08-27','закрыто'),(4,6,6,2007639,'2020-07-19','закрыто'),(5,5,9,2207645,'2022-07-03','открыто'),(6,1,2,2206746,'2021-06-29','выполняется'),(7,1,0,2202020,'2022-12-10','открыто'),(8,1,1,320203,'2022-12-10','открыто'),(9,1,1,320203,'2022-12-10','открыто'),(10,1,1,320203,'2022-12-10','открыто'),(11,1,1,320203,'2022-12-10','открыто'),(12,1,1,234043,'2022-12-10','открыто'),(13,11,11,1337228,'2022-12-13','открыто');
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `insurances`
--

DROP TABLE IF EXISTS `insurances`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `insurances` (
  `ins_id` int NOT NULL AUTO_INCREMENT,
  `client_id` int NOT NULL,
  `ins_number` int NOT NULL,
  `ins_cat` enum('автострахование','страхование имущества','страхование жизни','страхование в путешествии') COLLATE utf8mb4_czech_ci NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `ins_status` enum('активный','неактивный','ожидающий утверждения изменений','') COLLATE utf8mb4_czech_ci NOT NULL,
  PRIMARY KEY (`ins_id`),
  KEY `client_insurance` (`client_id`),
  CONSTRAINT `client_insurance` FOREIGN KEY (`client_id`) REFERENCES `clients` (`client_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_czech_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `insurances`
--

LOCK TABLES `insurances` WRITE;
/*!40000 ALTER TABLE `insurances` DISABLE KEYS */;
INSERT INTO `insurances` VALUES (1,1,22061020,'страхование жизни','2015-06-10','2024-06-10','активный'),(2,1,21021410,'автострахование','2021-02-03','2023-02-03','ожидающий утверждения изменений'),(3,4,22051478,'страхование жизни','2022-05-09','2024-05-09','активный'),(4,3,22077896,'страхование имущества','2021-07-04','2023-07-04','ожидающий утверждения изменений'),(5,1,21079930,'страхование в путешествии','2021-06-30','2021-07-10','неактивный'),(6,6,19078816,'автострахование','2019-07-08','2022-07-08','ожидающий утверждения изменений'),(7,5,20087525,'страхование в путешествии','2020-08-06','2020-08-22','неактивный'),(8,2,21047820,'автострахование','2021-04-04','2025-04-04','активный'),(9,5,21037315,'страхование имущества','2021-03-25','2026-03-25','активный'),(10,8,334455,'автострахование','2022-03-24','2024-03-24','активный'),(11,11,33445566,'страхование имущества','2022-12-10','2025-12-10','активный'),(12,11,334456,'страхование жизни','2022-12-10','2025-12-10','активный');
/*!40000 ALTER TABLE `insurances` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payments` (
  `pay_id` int NOT NULL AUTO_INCREMENT,
  `client_id` int NOT NULL,
  `ins_id` int NOT NULL,
  `pay_ammount` int NOT NULL,
  `pay_until` date NOT NULL,
  `pay_via` enum('банковский перевод','в отделении','почтовый перевод') COLLATE utf8mb4_czech_ci NOT NULL,
  `frequency` enum('ежемесячно','ежеквартально','ежегодно','разово') COLLATE utf8mb4_czech_ci NOT NULL,
  `pay_to` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_czech_ci NOT NULL,
  `pay_status` enum('оплачено','просрочено','закрыто','в ожидании') COLLATE utf8mb4_czech_ci NOT NULL,
  PRIMARY KEY (`pay_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_czech_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payments`
--

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
INSERT INTO `payments` VALUES (1,1,22061020,500,'2022-08-31','банковский перевод','ежемесячно','777888999/111','оплачено'),(2,1,21021410,6000,'2023-01-02','банковский перевод','ежегодно','555888999/111','в ожидании'),(3,4,22051478,1000,'2023-01-02','банковский перевод','ежемесячно','777888999/111','оплачено'),(4,3,22077896,2500,'2022-10-30','банковский перевод','ежегодно','666888999/111','оплачено'),(5,1,21079930,699,'2021-07-10','в отделении','разово','444888999/111','закрыто'),(6,6,19078816,550,'2022-06-08','банковский перевод','ежемесячно','555888999/000','просрочено'),(7,5,20087525,1250,'2020-08-22','в отделении','разово','444888999/111','закрыто'),(8,2,21047820,2450,'2023-04-04','в отделении','ежегодно','555888999/111','оплачено'),(9,5,20087525,1900,'2023-03-25','почтовый перевод','ежегодно','666888999/111','оплачено'),(11,11,33445566,20000,'2025-12-10','банковский перевод','ежемесячно','666888999/111','оплачено'),(12,11,334456,12000,'2025-12-10','банковский перевод','ежеквартально','777888999/111','оплачено');
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'ins_app'
--

--
-- Dumping routines for database 'ins_app'
--

--
-- Final view structure for view `event_details`
--

/*!50001 DROP VIEW IF EXISTS `event_details`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `event_details` AS select `events`.`event_num` AS `event_num`,`insurances`.`ins_cat` AS `ins_cat`,`insurances`.`ins_number` AS `ins_number`,`events`.`event_date` AS `event_date`,`events`.`status` AS `status`,`insurances`.`client_id` AS `client_id` from (`events` join `insurances` on((`events`.`ins_id` = `insurances`.`ins_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-12-10 16:16:56
