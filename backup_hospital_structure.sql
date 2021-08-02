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
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-03-23 19:11:36
