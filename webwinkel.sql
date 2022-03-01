-- phpMyAdmin SQL 
--
-- Host: 127.0.0.1


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `webwinkel`
--
DROP SCHEMA IF EXISTS `webwinkel` ;
create database if not exists `webwinkel`;
use `webwinkel`;
-- --------------------------------------------------------

--
-- Table structure for table `category`
--
DROP TABLE IF EXISTS `webwinkel`.`tblcat` ;
CREATE TABLE IF NOT EXISTS `tblcat` (
  `cat_id` varchar(3) NOT NULL,
  `category` varchar(6) NOT NULL,
   PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB;

--
-- Dumping data for table `category`
--
INSERT INTO `webwinkel`.`tblcat` (`cat_id`, `category`) VALUES ('1', 'gti');
INSERT INTO `webwinkel`.`tblcat` (`cat_id`, `category`) VALUES ('2', 'andere');
-- --------------------------------------------------------

--
-- Table structure for table `tblAdmin`
--
DROP TABLE IF EXISTS `webwinkel`.`tblAdmin` ;
CREATE TABLE IF NOT EXISTS `tblAdmin` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `ww` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

--
-- een admin toevoegen
--

INSERT INTO `tblAdmin` (`name`, `ww`) VALUES ('admin', 'Test1234');

-- --------------------------------------------------------
--
-- Table structure for table `tblKledij`
--
DROP TABLE IF EXISTS `webwinkel`.`tblKledij` ;
CREATE TABLE IF NOT EXISTS `tblKledij` (
`id` int(11) NOT NULL AUTO_INCREMENT,
  `naam` varchar(30) NOT NULL,
  `categorie` varchar(6) NOT NULL,
  `beschrijving` varchar(300) NOT NULL,
  `maat` varchar(3) NOT NULL,
  `gereserveerd` BOOLEAN NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;


