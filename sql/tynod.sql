-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2016 at 08:38 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tynod`
--
CREATE DATABASE IF NOT EXISTS `tynod` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `tynod`;

-- --------------------------------------------------------

--
-- Table structure for table `prestadores`
--

CREATE TABLE IF NOT EXISTS `prestadores` (
  `ID` int(5) NOT NULL,
  `Profesion` varchar(15) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Apellido` varchar(30) NOT NULL,
  `RFC` varchar(14) NOT NULL,
  `CP` int(5) NOT NULL,
  `Direccion` varchar(50) NOT NULL,
  `Region` varchar(30) NOT NULL,
  `Estado` varchar(30) NOT NULL,
  `Celular` bigint(15) NOT NULL,
  `Disponibilidad` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `solicitudes`
--

CREATE TABLE IF NOT EXISTS `solicitudes` (
  `ID` int(5) NOT NULL,
  `Envia` varchar(30) NOT NULL,
  `Recibe` varchar(30) NOT NULL,
  `Aceptado` varchar(30) NOT NULL,
  `Mensaje` varchar(30) NOT NULL,
  `Fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `ID` int(5) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Apellido` varchar(30) NOT NULL,
  `Correo` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Region` varchar(20) NOT NULL,
  `Pais` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
