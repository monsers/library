-- MySQL dump 10.13  Distrib 5.5.53, for Win32 (AMD64)
--
-- Host: localhost    Database: library
-- ------------------------------------------------------
-- Server version	5.5.53

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
-- Table structure for table `book_borrow`
--

DROP TABLE IF EXISTS `book_borrow`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `book_borrow` (
  `id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `counts` int(10) NOT NULL DEFAULT '0' COMMENT '过期应收取费用',
  `borrow_time` varchar(80) NOT NULL COMMENT '借出时间',
  `return_time` varchar(80) NOT NULL COMMENT '返还时间',
  `ISBN` bigint(40) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `uid` int(20) NOT NULL,
  `author` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `return_time` (`return_time`),
  KEY `return_time_2` (`return_time`),
  KEY `uname` (`uname`),
  KEY `uname_2` (`uname`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book_borrow`
--

LOCK TABLES `book_borrow` WRITE;
/*!40000 ALTER TABLE `book_borrow` DISABLE KEYS */;
INSERT INTO `book_borrow` VALUES (11,0,'1523855170','1525064770',223,'中文',4,'信息'),(13,0,'1523858209','1525067809',345555,'英语',4,'达'),(14,0,'1523861270','1525070870',789909,'数学',6,'教师');
/*!40000 ALTER TABLE `book_borrow` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `books` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `book_author` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `book_ISBN` bigint(20) NOT NULL,
  `location` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT '位置',
  `updated_at` varchar(90) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` varchar(90) COLLATE utf8_unicode_ci DEFAULT NULL,
  `book_state` int(3) NOT NULL DEFAULT '0' COMMENT '书籍借出1，退还0',
  `book_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `book_name` (`book_name`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books`
--

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` VALUES (2,'东东',123456,'1','1523861335','1523712543',0,'语文'),(4,'教师',789909,'菜鸟','1523861270','1523708780',1,'数学'),(5,'达',345555,'东东','1523858209','1523809490',1,'英语'),(6,'信息',223,'方','1523855170','1523853086',1,'中文'),(7,'发',33455555555555,'发给','1523857077','1523855380',0,'汉语词典'),(8,'4',23242443,'容','1523857130','1523857130',0,'英语'),(9,'抬头',555555555,'抬头','1523857558','1523857558',0,'突然');
/*!40000 ALTER TABLE `books` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mypartner`
--

DROP TABLE IF EXISTS `mypartner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mypartner` (
  `name` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `level` int(10) NOT NULL,
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `borrow_books` int(11) NOT NULL DEFAULT '0' COMMENT '已借书数目',
  `balance` int(60) NOT NULL DEFAULT '0' COMMENT '账户余额',
  `max_booknumber` int(20) NOT NULL COMMENT '最多可借书',
  `password` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mypartner`
--

LOCK TABLES `mypartner` WRITE;
/*!40000 ALTER TABLE `mypartner` DISABLE KEYS */;
INSERT INTO `mypartner` VALUES ('ttttt8',1,1,3,0,6,''),('111111',1,2,1,0,6,'111111'),('66',1,3,0,0,6,'$2y$10$XUciZ635jgnriYa39hq33O6cVEAhkNo4KErO.jFIJDHvj7CSC/O4e'),('222222',1,4,2,0,6,'$2y$10$542ss4lCGwIhI7BGLZtQJexSkYxfbu7QGqUyZUKl4FY.h5pzT3MKy');
/*!40000 ALTER TABLE `mypartner` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `password` varchar(225) NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` varchar(80) DEFAULT NULL,
  `updated_at` varchar(80) DEFAULT NULL,
  `balance` int(60) NOT NULL DEFAULT '0' COMMENT '账户余额',
  `book_number` int(30) NOT NULL DEFAULT '0' COMMENT '已借书数目',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'','',NULL,NULL,NULL,0,0),(2,'ghg','ghg',NULL,'2018-04-12 00:00:00',NULL,0,0),(3,'ghg','gfhgjfj',NULL,'2018-04-12 00:00:00',NULL,0,0),(4,'555555','$2y$10$eE5HM.mx3i0HpWWgUdPOHOMr7qCJHX5Grw/g2Hhy.ppu9byFsZ9ly','Qe6hr1CqUzJ5Nav5ZqlqAQeE1dy96lUqE9mKWF67eEGxgUEYpJETYhe3cqOO',NULL,NULL,0,0);
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

-- Dump completed on 2018-04-16 18:10:03
