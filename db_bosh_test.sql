-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.27-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.0.0.6468
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for bosh_test
CREATE DATABASE IF NOT EXISTS `bosh_test` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci */;
USE `bosh_test`;

-- Dumping structure for table bosh_test.contact
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  FULLTEXT KEY `first_name` (`first_name`),
  FULLTEXT KEY `last_name` (`last_name`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table bosh_test.contact: ~14 rows (approximately)
REPLACE INTO `contact` (`id`, `first_name`, `last_name`, `phone_number`) VALUES
	(1, 'tof', 'abaci', '017677231478'),
	(2, 'toufik', 'Ben', '017655443322'),
	(3, 'test', 'dev', '019767823812'),
	(4, 'kevine', 'muller', '019765779821'),
	(5, 'adrian', 'mucho', '019765891922'),
	(6, 'adrian', 'mucho', '019765890823'),
	(7, 'tobias', 'schmidt', '019765890820'),
	(8, 'katharina', 'otto', '019765890927'),
	(9, 'kerdiud', 'Mohamed', '019765890347'),
	(10, 'li', 'sanchu', '019765892824'),
	(11, 'jonaten', 'mamadu', '019765891827'),
	(12, 'gerard', 'bernard', '019765898782'),
	(13, 'aaaa', 'bbbb', '017677456327'),
	(14, 'test', 'test', '08996754524');

-- Dumping structure for table bosh_test.contacts
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `id` (`id`) USING BTREE,
  FULLTEXT KEY `first_name` (`first_name`),
  FULLTEXT KEY `last_name` (`last_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table bosh_test.contacts: ~0 rows (approximately)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
