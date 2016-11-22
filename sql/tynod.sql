-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-11-2016 a las 15:02:53
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
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE IF NOT EXISTS `mensajes` (
  `Fecha` text NOT NULL,
  `id1` varchar(100) NOT NULL,
  `id2` varchar(100) NOT NULL,
  `Mensaje` varchar(255) NOT NULL,
  `Hora` text NOT NULL,
  `ID` int(5) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`Fecha`, `id1`, `id2`, `Mensaje`, `Hora`, `ID`) VALUES
('', 'mama', 'chacha', '', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestadores`
--

CREATE TABLE IF NOT EXISTS `prestadores` (
  `ID` int(5) NOT NULL,
  `Profesion` varchar(35) NOT NULL,
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
  `descripcion` longtext NOT NULL,
  `horarios` longtext NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `prestadores`
--

INSERT INTO `prestadores` (`ID`, `Profesion`, `Nombre`, `Apellido`, `RFC`, `CP`, `Direccion`, `Region`, `Pais`, `Celular`, `Disponibilidad`, `Ciudad`, `Correo`, `Contrasena`, `foto`, `descripcion`, `horarios`) VALUES
(1, 'plomero, carpintero', 'Victor', 'Hernandez', '12323', 123, 'yoyomama', ' BC', 'Mexico', 23123, '---', 'Tijuana', 'hospage@hotmail.com', 'cosa1234', 'RvJOKM68578.jpg', 'moshi mohsi', 'nyeeeeeeees'),
(2, 'plomero, electricista', 'victor', 'fesd', '123123', 12312, 'vellein', ' BC', 'Mexico', 1231231, '---', 'Tijuana', 'popo', 'cosa1234', 'defaultUserLogo.png', '', ''),
(3, 'plomero, albañ', 'asdf', 'asdf', '12312312', 123123, '123123', ' BC', 'Mexico', 123123123, '---', 'Tijuana', 'yoyomama@hmami.com', 'cosa1234', 'defaultUserLogo.png', '', ''),
(4, 'albañil', 'Victor', 'Hernandez', '123123', 123231, '3232', ' BC', 'Mexico', 123123, '---', 'Tijuana', 'vicoloco5@live.com.mx', 'cosa1234', 'defaultUserLogo.png', '', '');

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
-- Estructura de tabla para la tabla `t11`
--

CREATE TABLE IF NOT EXISTS `t11` (
  `envio` varchar(5) DEFAULT NULL,
  `mensaje` varchar(255) DEFAULT NULL,
  `orden` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`orden`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `t11`
--

INSERT INTO `t11` (`envio`, `mensaje`, `orden`) VALUES
('1u', 'k paso mi jon', 1),
('1u', 'ore wa', 2),
('1u', 'ore wa', 3),
('1u', 'ore wa', 4),
('1u', 'ore wa', 5),
('1u', 'ore wa', 6),
('1u', 'ore wa', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t12`
--

CREATE TABLE IF NOT EXISTS `t12` (
  `envio` varchar(5) DEFAULT NULL,
  `mensaje` varchar(255) DEFAULT NULL,
  `orden` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`orden`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `t12`
--

INSERT INTO `t12` (`envio`, `mensaje`, `orden`) VALUES
('1u', 'ore wa', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tablas`
--

CREATE TABLE IF NOT EXISTS `tablas` (
  `idUsuario` int(5) DEFAULT NULL,
  `idPrestador` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tablas`
--

INSERT INTO `tablas` (`idUsuario`, `idPrestador`) VALUES
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `ID` int(5) NOT NULL,
  `Nombre` longtext NOT NULL,
  `Correo` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Region` varchar(20) NOT NULL,
  `Pais` varchar(20) NOT NULL,
  `Edad` int(3) NOT NULL,
  `Nacimiento` text NOT NULL,
  `Telefono` bigint(15) NOT NULL,
  `Ciudad` text NOT NULL,
  `foto` varchar(20) DEFAULT 'defaultUserLogo.png',
  `horarios` longtext NOT NULL,
  `descripcion` longtext NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID`, `Nombre`, `Correo`, `Password`, `Region`, `Pais`, `Edad`, `Nacimiento`, `Telefono`, `Ciudad`, `foto`, `horarios`, `descripcion`) VALUES
(1, 'victor', 'vicoloco@live.com.mx', 'cosa1234', ' BC', 'Mexico', 12, '2016-11-08', 312312, 'Tijuana', 'defaultUserLogo.png', '', ''),
(2, 'Victor Hern', 'vicoloco1@live.com.mx', 'cosa1234', ' BC', 'Mexico', 12, '2016-11-16', 12323, 'Tijuana', 'defaultUserLogo.png', 'i like burritos', 'yoyomama'),
(3, 'Victor Hern', 'vicoloco2@live.com.mx', 'cosa1234', ' BC', 'Mexico', 12, '2016-11-16', 12323, 'Tijuana', 'defaultUserLogo.png', '', ''),
(4, 'Victor', 'cosa@live.com', 'cosa1234', ' BC', 'Mexico', 12, '2016-11-02', 1232, 'Tijuana', 'defaultUserLogo.png', '', ''),
(5, 'asdf', 'vicoloco3@live.com.mx', 'asdfasdf', ' BC', 'Mexico', 12, '2016-11-08', 12312, 'Tijuana', 'defaultUserLogo.png', '', ''),
(6, 'Victor', 'vicoloco4@live.com.mx', 'cosa1234', ' BC', 'Mexico', 12, '2016-11-09', 1232, 'Tijuana', 'defaultUserLogo.png', 'ore wa', 'Nyes');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
