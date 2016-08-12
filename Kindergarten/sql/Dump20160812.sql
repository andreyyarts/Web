-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: kindergarten
-- ------------------------------------------------------
-- Server version	5.5.25

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
-- Table structure for table `child`
--

DROP TABLE IF EXISTS `child`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `child` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `last_name` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) NOT NULL,
  `sex` varchar(1) NOT NULL,
  `address` text NOT NULL,
  `residential_address` varchar(250) NOT NULL,
  `characteristic` text NOT NULL COMMENT 'Характеристика',
  `health` text COMMENT 'Здоровье',
  `birthday` date NOT NULL,
  `enrollment_date` date DEFAULT NULL,
  `outlet_date` date DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_child_fio` (`last_name`),
  KEY `idx_child_birthday` (`birthday`),
  KEY `idx_child_sex` (`sex`),
  KEY `idx_child_enrollment` (`enrollment_date`),
  KEY `idx_child_outlet` (`outlet_date`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `filial`
--

DROP TABLE IF EXISTS `filial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `filial` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `organization_id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `contacts` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_f` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `lesson`
--

DROP TABLE IF EXISTS `lesson`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lesson` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `is_archive` int(1) NOT NULL COMMENT '0-нет, 1-да',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_l` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `organization`
--

DROP TABLE IF EXISTS `organization`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `organization` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_org` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `relative`
--

DROP TABLE IF EXISTS `relative`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `relative` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `child_id` int(11) NOT NULL,
  `degree` varchar(150) NOT NULL COMMENT 'Степень родства (Отец, мать, бабушка, дедушка, отчим и т.д.)',
  `last_name` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_k` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Родственники';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tabel`
--

DROP TABLE IF EXISTS `tabel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tabel` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `child_id` int(11) NOT NULL COMMENT 'Ссылка на ребенка',
  `filial_id` int(10) NOT NULL COMMENT 'Ссылка на филиал',
  `lesson_id` int(10) NOT NULL COMMENT 'Ссылка на предмет',
  `teacher_id` int(10) NOT NULL COMMENT 'Ссылка на учителя',
  PRIMARY KEY (`id`),
  UNIQUE KEY `Id_tab` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tarif`
--

DROP TABLE IF EXISTS `tarif`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tarif` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `filial_id` int(10) NOT NULL COMMENT 'Ссылка на филиалы',
  `name` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `cost` int(11) NOT NULL,
  `start_date` date NOT NULL COMMENT 'Дата начала действия Тарифа',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_p` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `teacher`
--

DROP TABLE IF EXISTS `teacher`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teacher` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `organization_id` int(10) NOT NULL COMMENT 'Ссылка на организацию',
  `last_name` varchar(250) NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `middle_name` varchar(250) NOT NULL,
  `subject` text NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Id_t` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `teacher_lesson`
--

DROP TABLE IF EXISTS `teacher_lesson`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teacher_lesson` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `teacher_id` int(10) NOT NULL,
  `lesson_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_tl` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Совпадение уроков и преподавателей';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `organization_id` int(10) NOT NULL,
  `fio` varchar(250) NOT NULL,
  `password` varchar(110) NOT NULL,
  `access_token` varchar(150) NOT NULL,
  `auth_key` varchar(150) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_u` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-08-12 21:51:54
