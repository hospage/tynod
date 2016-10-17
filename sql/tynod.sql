-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-10-2016 a las 19:30:33
-- Versión del servidor: 5.7.11
-- Versión de PHP: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tynod`
--
CREATE DATABASE IF NOT EXISTS `tynod` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `tynod`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestadores`
--

CREATE TABLE `prestadores` (
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
  `Ciudad` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
--

CREATE TABLE `solicitudes` (
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

CREATE TABLE `usuarios` (
  `ID` int(5) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Correo` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Region` varchar(20) NOT NULL,
  `Pais` varchar(20) NOT NULL,
  `Edad` int(3) NOT NULL,
  `Nacimiento` text NOT NULL,
  `Telefono` bigint(15) NOT NULL,
  `Ciudad` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID`, `Nombre`, `Correo`, `Password`, `Region`, `Pais`, `Edad`, `Nacimiento`, `Telefono`, `Ciudad`) VALUES
(1, 'Arturo Ceron', 'suzaku9911@gmail.com', '555264as', 'Tijuana,  BC', 'Mexico', 16, '1999-11-11', 6642723036, ''),
(2, 'Nico Pendeja', 'josmanpadilla@hotmail.com', 'DarkBunn28', ', ', '', 17, '1999-05-28', 6643568364, ''),
(3, 'Nico Pendeja', 'josmanpadilla@hotmail.com', 'DarkBunn28', '', '', 17, '1999-05-28', 6643568364, ''),
(4, 'Pepe', 'asd', '12345678', ' BC', 'Mexico', 12, '1999-11-11', 0, 'Tijuana');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `prestadores`
--
ALTER TABLE `prestadores`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
