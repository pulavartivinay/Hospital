-- MariaDB dump 10.18  Distrib 10.5.8-MariaDB, for osx10.16 (x86_64)
--
-- Host: localhost    Database: hospital
-- ------------------------------------------------------
-- Server version	10.5.8-MariaDB

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
-- Table structure for table `Admit_Room`
--

DROP TABLE IF EXISTS `Admit_Room`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Admit_Room` (
  `id` varchar(10) NOT NULL,
  `availability` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Admit_Room`
--

LOCK TABLES `Admit_Room` WRITE;
/*!40000 ALTER TABLE `Admit_Room` DISABLE KEYS */;
INSERT INTO `Admit_Room` VALUES ('101',1),('102',1),('103',1),('104',1),('105',1),('106',1),('107',1),('201',0),('202',0),('203',0),('204',0),('205',0),('206',0),('207',0);
/*!40000 ALTER TABLE `Admit_Room` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Appointment`
--

DROP TABLE IF EXISTS `Appointment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Appointment` (
  `id` varchar(10) NOT NULL,
  `patient_id` varchar(10) NOT NULL,
  `patient_name` varchar(50) DEFAULT NULL,
  `date_and_time` datetime DEFAULT NULL,
  `reason` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`,`patient_id`),
  KEY `patient_id` (`patient_id`,`patient_name`),
  CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`patient_id`, `patient_name`) REFERENCES `Patient` (`id`, `name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Appointment`
--

LOCK TABLES `Appointment` WRITE;
/*!40000 ALTER TABLE `Appointment` DISABLE KEYS */;
INSERT INTO `Appointment` VALUES ('a111801001','111801001','Captain Jack Sparrow','2021-03-23 00:00:00','Stomach Pain'),('a111801003','111801002','Gellert Grindelwald','2021-03-23 00:00:00','Stomach Pain'),('a111801004','111801003','Elizabeth Swann','2021-03-23 00:00:00','Head ache'),('a111801005','111801004','Harry Potter','2021-03-23 00:00:00','Stomach Pain'),('a111801006','111801005','Ronald Weasley','2021-03-23 00:00:00','Head ache'),('a111801007','111801006','Hermione Granger','2021-03-23 00:00:00','Stomach Pain'),('a111801008','111801007','Albus Dumbledore','2021-03-23 00:00:00','Head ache'),('a111801009','111801029','Tom Riddle','2021-03-23 00:00:00','Stomach Pain'),('a111801010','111801031','Sirius Black','2021-03-23 00:00:00','Head ache'),('a111801011','111801034','Neville Longbottom','2021-03-23 00:00:00','Head ache'),('a111801012','111801045','Draco Malfoy','2021-03-23 00:00:00','Head ache');
/*!40000 ALTER TABLE `Appointment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Billing`
--

DROP TABLE IF EXISTS `Billing`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Billing` (
  `id` varchar(10) NOT NULL,
  `type` varchar(10) DEFAULT NULL,
  `patient_id` varchar(10) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `contact_number` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `patient_id` (`patient_id`),
  CONSTRAINT `billing_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `Patient` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Billing`
--

LOCK TABLES `Billing` WRITE;
/*!40000 ALTER TABLE `Billing` DISABLE KEYS */;
INSERT INTO `Billing` VALUES ('112121','UPI','111801005',5480,'1988-11-29 00:00:00','8813530357'),('122146','Cash','111801007',17845.5,'2009-05-15 00:00:00','7524991112'),('123124','UPI','111801031',17845.5,'1995-12-22 00:00:00','4088658157'),('123222','UPI','111801002',17845.5,'2013-11-20 00:00:00','7224994918'),('123546','Cash','111801001',2480.02,'2009-06-20 00:00:00','2715144000'),('123578','UPI','111801003',5480,'2010-07-02 00:00:00','9752762770'),('125846','Cash','111801029',2480.02,'1992-11-10 00:00:00','5427563280'),('145546','Debit Card','111801002',2000,'2011-04-26 00:00:00','8558134440'),('189546','Debit Card','111801005',15480,'2008-06-24 00:00:00','8132047892'),('342423','Cash','111801004',2480.02,'2005-09-28 00:00:00','4767380237'),('434343','Debit Card','111801029',2000,'2018-07-19 00:00:00','7723769219'),('473298','Cash','111801045',2480.02,'1984-08-02 00:00:00','4749839367'),('675765','Cash','111801031',17845.5,'2020-05-31 00:00:00','5463309385'),('987012','Debit Card','111801034',15480,'2014-07-30 00:00:00','8872687969');
/*!40000 ALTER TABLE `Billing` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Death_Record`
--

DROP TABLE IF EXISTS `Death_Record`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Death_Record` (
  `id` varchar(10) NOT NULL,
  `patient_name` varchar(50) DEFAULT NULL,
  `cause` varchar(50) DEFAULT NULL,
  `date_of_death` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Death_Record`
--

LOCK TABLES `Death_Record` WRITE;
/*!40000 ALTER TABLE `Death_Record` DISABLE KEYS */;
INSERT INTO `Death_Record` VALUES ('1032','Adalberto Dray','Heart Attack','1995-05-21 00:00:00'),('1045','Hilda Flanery','Accident','1990-04-12 00:00:00'),('1154','Eve Rampton','Kidneys Failure','1985-12-14 00:00:00'),('1561','June Terhune','Accident','1997-09-05 00:00:00'),('1847','Nguyet Dutra','Blood Cancer','1983-11-25 00:00:00');
/*!40000 ALTER TABLE `Death_Record` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Doctor`
--

DROP TABLE IF EXISTS `Doctor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Doctor` (
  `id` varchar(10) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `experience` float DEFAULT NULL,
  `designation` varchar(20) DEFAULT NULL,
  `date_joined` date DEFAULT NULL,
  `contact_number` varchar(10) DEFAULT NULL,
  `working_hours` float DEFAULT NULL,
  `salary` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Doctor`
--

LOCK TABLES `Doctor` WRITE;
/*!40000 ALTER TABLE `Doctor` DISABLE KEYS */;
INSERT INTO `Doctor` VALUES ('121801045','Edward Jenner',6.5,'MD','2015-08-20','7665547230',8,125000),('121801046','Elizabeth Blackwell',7.6,'MD  FRCPE','2014-07-16','9030393939',6,150000),('121801047','Helene D.Gayle',5,'MS','2016-09-25','9222535365',8,100000),('121801048','Georges Mathe',12,'DMD','2009-10-05','8757855781',6,90000),('121801049','Virginia Apgar',9,'DDS','2012-12-12','9848022338',6,80000),('121801050','Michael Ellis DeBakey',10,'DScPT','2011-05-05','8465864295',7,50000),('121801051','Charles Richard Drew',8,'ENT','2013-03-20','9666175686',5,100000),('121801052','Helen Brooke Taussig',4,'PharmD','2017-06-17','9939938401',10,90000),('121801053','Alexander Fleming',15,'MD FRCS','2014-07-16','9646263616',5,300000),('121801054','Myles.B.Abbott',3,'DPT','2018-08-10','9121314151',5,50000),('121801055','Khalid Abbed',7,'DO','2016-03-09','9131476959',7,70000);
/*!40000 ALTER TABLE `Doctor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Emergency_Patient`
--

DROP TABLE IF EXISTS `Emergency_Patient`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Emergency_Patient` (
  `id` varchar(10) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `address` varchar(80) DEFAULT NULL,
  `contact_number` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Emergency_Patient`
--

LOCK TABLES `Emergency_Patient` WRITE;
/*!40000 ALTER TABLE `Emergency_Patient` DISABLE KEYS */;
INSERT INTO `Emergency_Patient` VALUES ('131801056','Olivia','female','Martha House,00120 Citta Vaticano,Vatican City','9646656666'),('131801057','George Smith','male','931 Thomas Jefferson Parkway,Va. 22902,USA','8232324256'),('131801058','Richard','male','Prinsengracht 263-267,1016 GV,USA','8662625231'),('131801059','Amelia','female','10 Downing St.,London,U.K','7252462777'),('131801060','Johnson Bravo','male','351 Farmington Ave.,Hartford,Conn. 06105,USA','9341578473'),('131801061','Mitchell Santner','male','10236 Charing Cross Rd.,Los Angeles,USA','5567688390'),('131801062','David Robbinson','male','Henley Street,Stratford-upon-Avon CV37 6QW,U.K','4553253241'),('131801063','Jimmy williams','female','Manger Square,Bethlehem,West Bank,U.S.A','7895290105'),('131801064','Jenson Nicolson','male','221B Baker St,London,U.K','7060605040'),('131801065','William Mattews','male','350 Fifth Avenue New York,NY 10118,U.S.A','6555655565'),('131801066','Olivia Morris','female','2 Macquarie Street,Sydney','7804949494'),('131801067','Graeme wincent','male','Apartment 5A,129 West 81st Street','9888977787');
/*!40000 ALTER TABLE `Emergency_Patient` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Nurse`
--

DROP TABLE IF EXISTS `Nurse`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Nurse` (
  `id` varchar(10) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `experience` float DEFAULT NULL,
  `date_joined` date DEFAULT NULL,
  `contact_number` varchar(10) DEFAULT NULL,
  `working_hours` float DEFAULT NULL,
  `salary` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Nurse`
--

LOCK TABLES `Nurse` WRITE;
/*!40000 ALTER TABLE `Nurse` DISABLE KEYS */;
INSERT INTO `Nurse` VALUES ('141801001','Julie Watson',9,'2012-01-10','7888788808',9,20000),('141801002','Marie Phillips',5,'2016-10-18','9484988949',7,10000),('141801003','Tiffany Morrison',3,'2018-08-16','8090898989',5,8000),('141801004','Jamie Rose',2.3,'2019-12-29','6454748888',4,7000),('141801005','Emily Parker',3.3,'2018-12-20','7227915201',8,15000),('141801006','Jamie Thomas',10,'2011-09-29','6555422212',10,25000),('141801007','Sophie Jane',6,'2015-05-25','4555352219',5,6000),('141801008','Lily Robberts',4.5,'2017-10-13','8544583580',6,9000),('141801009','Jennifer seifert',5.8,'2016-08-21','9876543220',7,9500),('141801010','Stephany Johnson',9.8,'2012-08-24','9812345677',8,6500);
/*!40000 ALTER TABLE `Nurse` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Operation_Theatre`
--

DROP TABLE IF EXISTS `Operation_Theatre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Operation_Theatre` (
  `id` varchar(10) NOT NULL,
  `surgery_id` varchar(10) DEFAULT NULL,
  `patient_id` varchar(10) DEFAULT NULL,
  `availability` tinyint(1) DEFAULT NULL,
  `room_number` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `surgery_id` (`surgery_id`),
  KEY `patient_id` (`patient_id`),
  CONSTRAINT `operation_theatre_ibfk_1` FOREIGN KEY (`surgery_id`) REFERENCES `Surgery` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `operation_theatre_ibfk_2` FOREIGN KEY (`patient_id`) REFERENCES `Patient` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Operation_Theatre`
--

LOCK TABLES `Operation_Theatre` WRITE;
/*!40000 ALTER TABLE `Operation_Theatre` DISABLE KEYS */;
INSERT INTO `Operation_Theatre` VALUES ('001','245','111801004',1,108),('002','343','111801005',1,109),('003','129','111801029',1,208),('004','176','111801031',1,209),('005','233','111801034',0,210),('006','222','111801045',1,210),('007','146','111801002',1,208);
/*!40000 ALTER TABLE `Operation_Theatre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Patient`
--

DROP TABLE IF EXISTS `Patient`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Patient` (
  `id` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(80) DEFAULT NULL,
  `contact_number` varchar(10) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`,`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Patient`
--

LOCK TABLES `Patient` WRITE;
/*!40000 ALTER TABLE `Patient` DISABLE KEYS */;
INSERT INTO `Patient` VALUES ('111801001','Captain Jack Sparrow','1-1, Black Pearl Island, Atlantic Ocean','2715144000','male'),('111801002','Gellert Grindelwald','22-121, Maldives, Indian Ocean','8558134440','male'),('111801003','Elizabeth Swann','34-(90/A) High Land, California','9752762770','female'),('111801004','Harry Potter','4, Privet Drive, Little Whinging, Surrey','7603341062','male'),('111801005','Ronald Weasley','The main, Tree house, Amazon Forest','8132047892','male'),('111801006','Hermione Granger','1755  Karen Lane, Shepherdsville, KY','5789962996','female'),('111801007','Albus Dumbledore','3166  Abia Martin Drive, New York, NY','7524991112','male'),('111801029','Tom Riddle','141  Stiles Street, Pittsburgh, PA','5427563280','male'),('111801031','Sirius Black','Main Pyramid, Egypt Desert','4088658157','male'),('111801034','Neville Longbottom','1911  Brentwood Drive, Austin, TX','7942396652','male'),('111801045','Draco Malfoy','2-68, LA, Vegan, Airport, Street','3817196249','male');
/*!40000 ALTER TABLE `Patient` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Service`
--

DROP TABLE IF EXISTS `Service`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Service` (
  `id` varchar(10) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `patient_id` varchar(10) DEFAULT NULL,
  `availed_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `patient_id` (`patient_id`),
  CONSTRAINT `service_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `Patient` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Service`
--

LOCK TABLES `Service` WRITE;
/*!40000 ALTER TABLE `Service` DISABLE KEYS */;
INSERT INTO `Service` VALUES ('11524','Medical Checkup','111801007','2009-05-15 00:00:00'),('12456','Blood test','111801001','2009-06-20 00:00:00'),('12948','Blood test','111801029','1992-11-10 00:00:00'),('17548','Medical Checkup','111801031','1995-12-22 00:00:00'),('17845','X-Ray test','111801003','2010-07-02 00:00:00'),('17954','HRCT test','111801002','2011-04-26 00:00:00'),('19568','ENT','111801005','2008-06-24 00:00:00');
/*!40000 ALTER TABLE `Service` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Surgery`
--

DROP TABLE IF EXISTS `Surgery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Surgery` (
  `id` varchar(10) NOT NULL,
  `patient_id` varchar(10) NOT NULL,
  `patient_name` varchar(50) DEFAULT NULL,
  `time_of_surgery` datetime DEFAULT NULL,
  PRIMARY KEY (`id`,`patient_id`),
  KEY `patient_id` (`patient_id`,`patient_name`),
  CONSTRAINT `surgery_ibfk_1` FOREIGN KEY (`patient_id`, `patient_name`) REFERENCES `Patient` (`id`, `name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Surgery`
--

LOCK TABLES `Surgery` WRITE;
/*!40000 ALTER TABLE `Surgery` DISABLE KEYS */;
INSERT INTO `Surgery` VALUES ('129','111801029','Tom Riddle','2004-09-23 23:37:27'),('146','111801002','Gellert Grindelwald','2017-11-02 21:18:31'),('176','111801031','Sirius Black','1980-04-15 13:44:00'),('222','111801045','Draco Malfoy','1990-05-28 19:36:28'),('233','111801034','Neville Longbottom','1999-05-14 10:17:02'),('245','111801004','Harry Potter','2017-05-24 14:35:42'),('343','111801005','Ronald Weasley','2017-11-20 00:14:34');
/*!40000 ALTER TABLE `Surgery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Visitor`
--

DROP TABLE IF EXISTS `Visitor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Visitor` (
  `id` varchar(10) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `contact_number` varchar(10) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `address` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Visitor`
--

LOCK TABLES `Visitor` WRITE;
/*!40000 ALTER TABLE `Visitor` DISABLE KEYS */;
INSERT INTO `Visitor` VALUES ('v111801001','Will Turner','3715144000','male','2-1, Black Pearl Island, Atlantic Ocean'),('v111801002','James Norry','9558134440','male','23-121, Maldives, Indian Ocean'),('v111801003','Hector','8752762770','male','35-(90/A) High Land, California'),('v111801004','Ragetti','8603341062','male','5, Privet Drive, Little Whinging, Surrey'),('v111801005','Ana Maria','9132047892','female','The second main, Tree house, Amazon Forest'),('v111801006','Joshamee','6789962996','female','1756  Karen Lane, Shepherdsville, KY'),('v111801007','Marty','8524991112','male','3167  Abia Martin Drive, New York, NY'),('v111801008','Mull roy','6427563280','male','142  Stiles Street, Pittsburgh, PA'),('v111801009','Murtogg','5088658157','male','Second Pyramid, Egypt Desert'),('v111801010','Lieutenant','8942396652','male','1912  Brentwood Drive, Austin, TX'),('v111801011','Twigg','4817196249','male','2-69, LA, Vegan, Airport, Street');
/*!40000 ALTER TABLE `Visitor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admit`
--

DROP TABLE IF EXISTS `admit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admit` (
  `patient_id` varchar(10) NOT NULL,
  `room_id` varchar(10) NOT NULL,
  PRIMARY KEY (`patient_id`,`room_id`),
  KEY `room_id` (`room_id`),
  CONSTRAINT `admit_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `Surgery` (`patient_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `admit_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `Admit_Room` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admit`
--

LOCK TABLES `admit` WRITE;
/*!40000 ALTER TABLE `admit` DISABLE KEYS */;
INSERT INTO `admit` VALUES ('111801002','106'),('111801004','101'),('111801005','102'),('111801029','103'),('111801031','104'),('111801045','105');
/*!40000 ALTER TABLE `admit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `assign`
--

DROP TABLE IF EXISTS `assign`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `assign` (
  `nurse_id` varchar(10) DEFAULT NULL,
  `patient_id` varchar(10) DEFAULT NULL,
  KEY `nurse_id` (`nurse_id`),
  KEY `patient_id` (`patient_id`),
  CONSTRAINT `assign_ibfk_1` FOREIGN KEY (`nurse_id`) REFERENCES `Nurse` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `assign_ibfk_2` FOREIGN KEY (`patient_id`) REFERENCES `Surgery` (`patient_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assign`
--

LOCK TABLES `assign` WRITE;
/*!40000 ALTER TABLE `assign` DISABLE KEYS */;
INSERT INTO `assign` VALUES ('141801001','111801004'),('141801005','111801005'),('141801004','111801029'),('141801003','111801031'),('141801007','111801034');
/*!40000 ALTER TABLE `assign` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attend`
--

DROP TABLE IF EXISTS `attend`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attend` (
  `nurse_id` varchar(10) DEFAULT NULL,
  `epatient_id` varchar(10) DEFAULT NULL,
  KEY `nurse_id` (`nurse_id`),
  KEY `epatient_id` (`epatient_id`),
  CONSTRAINT `attend_ibfk_1` FOREIGN KEY (`nurse_id`) REFERENCES `Nurse` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `attend_ibfk_2` FOREIGN KEY (`epatient_id`) REFERENCES `Emergency_Patient` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attend`
--

LOCK TABLES `attend` WRITE;
/*!40000 ALTER TABLE `attend` DISABLE KEYS */;
INSERT INTO `attend` VALUES ('141801003','131801064'),('141801001','131801056'),('141801010','131801057'),('141801005','131801066'),('141801001','131801063'),('141801002','131801061'),('141801003','131801060');
/*!40000 ALTER TABLE `attend` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `avail`
--

DROP TABLE IF EXISTS `avail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `avail` (
  `patient_id` varchar(10) DEFAULT NULL,
  `service_id` varchar(10) DEFAULT NULL,
  KEY `patient_id` (`patient_id`),
  KEY `service_id` (`service_id`),
  CONSTRAINT `avail_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `Patient` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `avail_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `Service` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `avail`
--

LOCK TABLES `avail` WRITE;
/*!40000 ALTER TABLE `avail` DISABLE KEYS */;
INSERT INTO `avail` VALUES ('111801001','12456'),('111801003','17845'),('111801002','17954'),('111801007','11524'),('111801005','19568'),('111801029','12948'),('111801031','17548');
/*!40000 ALTER TABLE `avail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `booking`
--

DROP TABLE IF EXISTS `booking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `booking` (
  `patient_id` varchar(10) NOT NULL,
  `appointment_id` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`patient_id`),
  KEY `appointment_id` (`appointment_id`),
  CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `Patient` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`appointment_id`) REFERENCES `Appointment` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `booking`
--

LOCK TABLES `booking` WRITE;
/*!40000 ALTER TABLE `booking` DISABLE KEYS */;
INSERT INTO `booking` VALUES ('111801001','a111801001'),('111801002','a111801003'),('111801003','a111801004'),('111801004','a111801005'),('111801005','a111801006'),('111801006','a111801007'),('111801007','a111801008'),('111801029','a111801009'),('111801031','a111801010'),('111801034','a111801011'),('111801045','a111801012');
/*!40000 ALTER TABLE `booking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `generate`
--

DROP TABLE IF EXISTS `generate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `generate` (
  `surgery_id` varchar(10) NOT NULL,
  `billing_id` varchar(10) NOT NULL,
  PRIMARY KEY (`surgery_id`,`billing_id`),
  KEY `billing_id` (`billing_id`),
  CONSTRAINT `generate_ibfk_1` FOREIGN KEY (`surgery_id`) REFERENCES `Surgery` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `generate_ibfk_2` FOREIGN KEY (`billing_id`) REFERENCES `Billing` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `generate`
--

LOCK TABLES `generate` WRITE;
/*!40000 ALTER TABLE `generate` DISABLE KEYS */;
INSERT INTO `generate` VALUES ('129','434343'),('146','123222'),('176','675765'),('222','473298'),('233','987012'),('245','342423'),('343','112121');
/*!40000 ALTER TABLE `generate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `occur`
--

DROP TABLE IF EXISTS `occur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `occur` (
  `surgery_id` varchar(10) DEFAULT NULL,
  `theatre_id` varchar(10) NOT NULL,
  PRIMARY KEY (`theatre_id`),
  KEY `surgery_id` (`surgery_id`),
  CONSTRAINT `occur_ibfk_1` FOREIGN KEY (`surgery_id`) REFERENCES `Surgery` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `occur_ibfk_2` FOREIGN KEY (`theatre_id`) REFERENCES `Operation_Theatre` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `occur`
--

LOCK TABLES `occur` WRITE;
/*!40000 ALTER TABLE `occur` DISABLE KEYS */;
INSERT INTO `occur` VALUES ('129','003'),('176','004'),('233','005'),('245','001'),('343','002');
/*!40000 ALTER TABLE `occur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payment` (
  `service_id` varchar(10) DEFAULT NULL,
  `billing_id` varchar(10) NOT NULL,
  PRIMARY KEY (`billing_id`),
  KEY `service_id` (`service_id`),
  CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `Service` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`billing_id`) REFERENCES `Billing` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment`
--

LOCK TABLES `payment` WRITE;
/*!40000 ALTER TABLE `payment` DISABLE KEYS */;
INSERT INTO `payment` VALUES ('11524','122146'),('12456','123546'),('12948','125846'),('17548','123124'),('17845','123578'),('17954','145546'),('19568','189546');
/*!40000 ALTER TABLE `payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perform`
--

DROP TABLE IF EXISTS `perform`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perform` (
  `doctor_id` varchar(10) DEFAULT NULL,
  `surgery_id` varchar(10) DEFAULT NULL,
  KEY `doctor_id` (`doctor_id`),
  KEY `surgery_id` (`surgery_id`),
  CONSTRAINT `perform_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `Doctor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `perform_ibfk_2` FOREIGN KEY (`surgery_id`) REFERENCES `Surgery` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perform`
--

LOCK TABLES `perform` WRITE;
/*!40000 ALTER TABLE `perform` DISABLE KEYS */;
INSERT INTO `perform` VALUES ('121801045','343'),('121801046','129'),('121801047','146'),('121801051','176'),('121801051','222'),('121801047','245'),('121801048','233');
/*!40000 ALTER TABLE `perform` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schedule`
--

DROP TABLE IF EXISTS `schedule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `schedule` (
  `patient_id` varchar(10) DEFAULT NULL,
  `doctor_id` varchar(10) DEFAULT NULL,
  KEY `patient_id` (`patient_id`),
  KEY `doctor_id` (`doctor_id`),
  CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `Appointment` (`patient_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `schedule_ibfk_2` FOREIGN KEY (`doctor_id`) REFERENCES `Doctor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schedule`
--

LOCK TABLES `schedule` WRITE;
/*!40000 ALTER TABLE `schedule` DISABLE KEYS */;
INSERT INTO `schedule` VALUES ('111801001','121801045'),('111801002','121801046'),('111801003','121801047'),('111801004','121801048'),('111801005','121801049'),('111801006','121801050'),('111801007','121801051'),('111801029','121801052'),('111801031','121801053'),('111801034','121801054'),('111801045','121801055');
/*!40000 ALTER TABLE `schedule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `treat`
--

DROP TABLE IF EXISTS `treat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `treat` (
  `epatient_id` varchar(10) DEFAULT NULL,
  `doctor_id` varchar(10) DEFAULT NULL,
  KEY `epatient_id` (`epatient_id`),
  KEY `doctor_id` (`doctor_id`),
  CONSTRAINT `treat_ibfk_1` FOREIGN KEY (`epatient_id`) REFERENCES `Emergency_Patient` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `treat_ibfk_2` FOREIGN KEY (`doctor_id`) REFERENCES `Doctor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `treat`
--

LOCK TABLES `treat` WRITE;
/*!40000 ALTER TABLE `treat` DISABLE KEYS */;
INSERT INTO `treat` VALUES ('131801060','121801045'),('131801062','121801051'),('131801056','121801047'),('131801057','121801049'),('131801066','121801045'),('131801064','121801051'),('131801063','121801049'),('131801061','121801045');
/*!40000 ALTER TABLE `treat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `visit`
--

DROP TABLE IF EXISTS `visit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `visit` (
  `visitor_id` varchar(10) DEFAULT NULL,
  `patient_id` varchar(10) DEFAULT NULL,
  KEY `visitor_id` (`visitor_id`),
  KEY `patient_id` (`patient_id`),
  CONSTRAINT `visit_ibfk_1` FOREIGN KEY (`visitor_id`) REFERENCES `Visitor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `visit_ibfk_2` FOREIGN KEY (`patient_id`) REFERENCES `Patient` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `visit`
--

LOCK TABLES `visit` WRITE;
/*!40000 ALTER TABLE `visit` DISABLE KEYS */;
INSERT INTO `visit` VALUES ('v111801001','111801001'),('v111801001','111801002'),('v111801002','111801001'),('v111801003','111801003'),('v111801003','111801004'),('v111801004','111801003'),('v111801005','111801005'),('v111801005','111801006'),('v111801006','111801005'),('v111801007','111801029'),('v111801008','111801031'),('v111801009','111801034'),('v111801010','111801045');
/*!40000 ALTER TABLE `visit` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-03-23 19:11:58
