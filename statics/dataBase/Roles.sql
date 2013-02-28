-- phpMyAdmin SQL Dump
-- version 3.5.4
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-02-2013 a las 22:55:04
-- Versión del servidor: 5.5.28-log
-- Versión de PHP: 5.4.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `cge_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Roles`
--

CREATE TABLE IF NOT EXISTS `Roles` (
  `IdRole` int(11) NOT NULL AUTO_INCREMENT,
  `NomRole` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`IdRole`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `Roles`
--

INSERT INTO `Roles` (`IdRole`, `NomRole`) VALUES
(1, 'Root'),
(2, 'Administrador'),
(3, 'Aspirante Curso Ingles'),
(4, 'Aspirante Curso Ingles'),
(5, 'Aspirante Diplomado Políticas'),
(6, 'Aspirante Posgrado Políticas'),
(7, 'Estudiante Curso Ingles'),
(8, 'Estudiante Diplomado Políticas'),
(9, 'Estudiante Posgrado Políticas');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
