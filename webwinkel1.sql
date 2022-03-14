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
-- Table structure for table `tblLkn`
--
DROP TABLE IF EXISTS `webwinkel`.`tblLkn` ;
CREATE TABLE IF NOT EXISTS `tblLkn` (
	`idlk` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(30) NOT NULL,
  `ww` varchar(30) NOT NULL,
  `mailadres` varchar(30),
  PRIMARY KEY (`idlk`)
) ENGINE=InnoDB;

--
-- een admin toevoegen
--

INSERT INTO `tblLkn` (`login`, `ww`) VALUES ('admin', 'Test1234');

-- --------------------------------------------------------
--
-- Table structure for table `tblKledij`
--
DROP TABLE IF EXISTS `webwinkel`.`tblKledij` ;
CREATE TABLE IF NOT EXISTS `tblKledij` (
`idkledij` int(11) NOT NULL AUTO_INCREMENT,
  `link` varchar(100) NOT NULL,
  `naam` varchar(30) NOT NULL,
  `soort` varchar(6) NOT NULL,
  `omschrijving` varchar(300) NOT NULL,
  PRIMARY KEY (`idkledij`)
) ENGINE=InnoDB;

-- --------------------------------------------------------
--
-- Table structure for table `tblAantal`
--
DROP TABLE IF EXISTS `webwinkel`.`tblAantal` ;
CREATE TABLE IF NOT EXISTS `tblAantal` (
`idaantal` int(11) NOT NULL AUTO_INCREMENT,
`idkledij` int(11) NOT NULL,
  `maat` varchar(3) NOT NULL,
  `aantal` int(11) NOT NULL,
  PRIMARY KEY (`idaantal`)
) ENGINE=InnoDB;


-- --------------------------------------------------------
--
-- Table structure for table `tblreservatie`
--
DROP TABLE IF EXISTS `webwinkel`.`tblreservatie` ;
CREATE TABLE IF NOT EXISTS `tblreservatie` (
`idreservatie` int(11) NOT NULL AUTO_INCREMENT,
  `naam_ll` varchar(30) NOT NULL,
  `voornaam_ll` varchar(30) NOT NULL,
  `klas` varchar(10) NOT NULL,
  `datum` DATE NOT NULL,
  PRIMARY KEY (`idreservatie`)
) ENGINE=InnoDB;

-- --------------------------------------------------------
--
-- Table structure for table `tblkoppel`
--
DROP TABLE IF EXISTS `webwinkel`.`tblkoppel` ;
CREATE TABLE IF NOT EXISTS `tblkoppel` (
`idkoppel` int(11) NOT NULL AUTO_INCREMENT,
`idkledij` int(11) NOT NULL,
  `idreservatie` int(11) NOT NULL,
  PRIMARY KEY (`idkoppel`)
) ENGINE=InnoDB;
