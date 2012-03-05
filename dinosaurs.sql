-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 06, 2012 at 07:32 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wadd0032`
--

-- --------------------------------------------------------

--
-- Table structure for table `dinosaurs`
--

CREATE TABLE IF NOT EXISTS `dinosaurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dino_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `period` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `dinosaurs`
--

INSERT INTO `dinosaurs` (`id`, `dino_name`, `period`) VALUES
(1, 'Triceratops', 'Late Cretaceous'),
(3, 'Velociraptor', 'Cretaceous'),
(4, 'Brachiosaurus', 'Late Jurrasic'),
(5, 'Tyrannosaurus Rex', 'Cretaceous');
