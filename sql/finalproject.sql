-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: finalproject
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

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
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu` (
  `menuId` int(11) NOT NULL AUTO_INCREMENT,
  `restaurantId` varchar(50) NOT NULL,
  `dish` varchar(50) NOT NULL,
  `type` varchar(30) DEFAULT NULL,
  `introduce` varchar(300) DEFAULT NULL,
  `picture` varchar(600) DEFAULT NULL,
  `cost` int(100) DEFAULT NULL,
  PRIMARY KEY (`menuId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `restaurant`
--

DROP TABLE IF EXISTS `restaurant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `restaurant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(60) NOT NULL,
  `name` varchar(150) NOT NULL,
  `address` varchar(200) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `picture` varchar(500) DEFAULT NULL,
  `經度` varchar(50) DEFAULT NULL,
  `緯度` varchar(50) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `restaurant`
--

LOCK TABLES `restaurant` WRITE;
/*!40000 ALTER TABLE `restaurant` DISABLE KEYS */;
/*!40000 ALTER TABLE `restaurant` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usermember`
--

DROP TABLE IF EXISTS `usermember`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usermember` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `tel` int(100) NOT NULL,
  `deposit` int(100) NOT NULL DEFAULT 0,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usermember`
--

LOCK TABLES `usermember` WRITE;
/*!40000 ALTER TABLE `usermember` DISABLE KEYS */;
INSERT INTO `usermember` VALUES (4,'test@gmail.com','$2y$10$wgIsh2vVA/ODw71D1VuUE.LY73K/GK2CnBmKTXIE9Y4XW3zt3vfWy','王','大大',921123456,0),(5,'test1@gmail.com','$2y$10$tcL8Mh7dsS5KkdHJV4NM4.IGBBoNP2ZxCiqXFHQhICIurquXKNxMO','張','小小',912345678,0),(6,'test2@gmail.com','$2y$10$TBnp2eeAPWgythSHdXlXfOk.IKiMFJA4/YqGnuQEMKoJzPSSFlcL6','廖','中中',934678901,0),(7,'test3@gmail.com','$2y$10$yPMUGemtN4yJqWxD7NzK4.fN/5LMsxyh.jPYqExmnE1UTlmQPolj6','楊','津津',988641234,0),(8,'test4@gmail.com','$2y$10$iyig2R3BA3/uj2.3TrkB/uejv8C/mvDdIvVALSwx5cAYqApc0ViWu','吳','和和',987348788,0),(9,'test5@gmail.com','$2y$10$nbMRheQSuZMk2AZb9ozwOOhbz2HYU9Xmjz7foWDb.wl.S/Y2iMjhO','林','節節',977468367,0),(11,'drama3fu@gmail.com','$2y$10$ZN7xUQCjvjbubJrg/NWjkeSSzbwGVk/UvTFyW3mBRSzllnIdfikim','楊','大大',986478924,0);
/*!40000 ALTER TABLE `usermember` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'finalproject'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-07-10 23:44:15
