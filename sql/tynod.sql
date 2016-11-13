-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-11-2016 a las 04:57:14
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `tynod`
--
CREATE DATABASE IF NOT EXISTS `tynod` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `tynod`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestadores`
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
  `Pais` varchar(30) NOT NULL,
  `Celular` bigint(15) NOT NULL,
  `Disponibilidad` varchar(15) NOT NULL,
  `Ciudad` text NOT NULL,
  `Correo` text NOT NULL,
  `Contrasena` varchar(20) NOT NULL,
  `foto` varchar(20) DEFAULT 'defaultUserLogo.png',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `prestadores`
--

INSERT INTO `prestadores` (`ID`, `Profesion`, `Nombre`, `Apellido`, `RFC`, `CP`, `Direccion`, `Region`, `Pais`, `Celular`, `Disponibilidad`, `Ciudad`, `Correo`, `Contrasena`, `foto`) VALUES
(1, 'asdfasdf', 'viefasd', 'asdfasdf', 'asdfasdfadf', 1231, 'asdfasdf', ' BC', 'Mexico', 123123123, '---', 'Tijuana', 'yoyomama@hmami.com', 'cosa1234', 'jHbHVT5cGHsSX6.jpg'),
(2, 'cecec', 'vivi', 'dsfsdf', 'dfsdf', 2321, 'ee', ' BC', 'Mexico', 123123, '---', 'Tijuana', 'ppop@gm.icm', 'yoyomama69', 'defaultUserLogo.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
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
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `ID` int(5) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Correo` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Region` varchar(20) NOT NULL,
  `Pais` varchar(20) NOT NULL,
  `Edad` int(3) NOT NULL,
  `Nacimiento` text NOT NULL,
  `Telefono` bigint(15) NOT NULL,
  `Ciudad` text NOT NULL,
  `foto` varchar(20) DEFAULT 'defaultUserLogo.png',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID`, `Nombre`, `Correo`, `Password`, `Region`, `Pais`, `Edad`, `Nacimiento`, `Telefono`, `Ciudad`, `foto`) VALUES
(1, 'victor', 'vicoloco@live.com.mx', 'cosa1234', ' BC', 'Mexico', 12, '2016-11-08', 312312, 'Tijuana', 'defaultUserLogo.png');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
