-- phpMyAdmin SQL Dump
-- version 3.5.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 07-07-2017 a las 03:35:20
-- Versión del servidor: 5.5.28-log
-- Versión de PHP: 5.4.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `prestamos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dcuotas_prestamo`
--

CREATE TABLE IF NOT EXISTS `dcuotas_prestamo` (
  `idcuotaprestamo` int(11) NOT NULL AUTO_INCREMENT,
  `idsolicitanteprestamo` int(11) NOT NULL,
  `numcuota` int(11) NOT NULL,
  `valorcuota` decimal(10,0) NOT NULL,
  `fecha_cuota` date NOT NULL,
  `estatus` int(11) NOT NULL,
  PRIMARY KEY (`idcuotaprestamo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=26 ;

--
-- Volcado de datos para la tabla `dcuotas_prestamo`
--

INSERT INTO `dcuotas_prestamo` (`idcuotaprestamo`, `idsolicitanteprestamo`, `numcuota`, `valorcuota`, `fecha_cuota`, `estatus`) VALUES
(5, 1, 6, '100', '2017-12-30', 2),
(6, 1, 6, '100', '2017-12-30', 2),
(8, 1, 1, '100', '2017-08-02', 2),
(9, 1, 1, '100', '2017-08-02', 2),
(11, 1, 1, '100', '2017-08-02', 2),
(12, 1, 1, '100', '2017-08-02', 2),
(13, 1, 1, '100', '2017-08-02', 2),
(14, 1, 1, '100', '2017-08-02', 2),
(15, 1, 2, '100', '2017-08-02', 2),
(16, 1, 3, '100', '2017-08-02', 2),
(17, 1, 4, '100', '2017-08-02', 2),
(18, 1, 5, '100', '2017-08-02', 2),
(19, 1, 6, '100', '2017-08-02', 2),
(20, 1, 1, '100', '2017-08-02', 2),
(21, 1, 2, '100', '2017-09-01', 2),
(22, 1, 3, '100', '2017-10-01', 2),
(23, 1, 4, '100', '2017-10-31', 2),
(24, 1, 5, '100', '2017-11-30', 2),
(25, 1, 6, '100', '2017-12-30', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dmax_prestamos`
--

CREATE TABLE IF NOT EXISTS `dmax_prestamos` (
  `idmaxprestamo` int(11) NOT NULL AUTO_INCREMENT,
  `maxvalor` int(11) NOT NULL,
  PRIMARY KEY (`idmaxprestamo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `dmax_prestamos`
--

INSERT INTO `dmax_prestamos` (`idmaxprestamo`, `maxvalor`) VALUES
(1, 1000000),
(2, 1000000),
(3, 1000000),
(4, 2000000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dsolicitante`
--

CREATE TABLE IF NOT EXISTS `dsolicitante` (
  `idsolicitante` int(11) NOT NULL AUTO_INCREMENT,
  `letra` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `cedula` int(11) NOT NULL,
  `primernombre` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `primerapellido` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` int(11) NOT NULL,
  `celular` int(11) NOT NULL,
  PRIMARY KEY (`idsolicitante`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `dsolicitante`
--

INSERT INTO `dsolicitante` (`idsolicitante`, `letra`, `cedula`, `primernombre`, `primerapellido`, `correo`, `telefono`, `celular`) VALUES
(1, 'V', 17864450, 'JOSE', 'ESPINOZA', '', 2147483647, 2147483647),
(2, 'V', 17975683, 'JOSIMAR', 'MALDONADO', 'ANDERESPINOZA@GMAIL.COM', 2123456788, 2147483647),
(3, 'V', 17975689, 'ANDER', 'ESPINOZA', 'ANDERESPINOZA@GMAIL.COM', 2124567655, 2147483647);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dsolicitante_prestamo`
--

CREATE TABLE IF NOT EXISTS `dsolicitante_prestamo` (
  `idsolicitanteprestamo` int(11) NOT NULL AUTO_INCREMENT,
  `idsolicitante` int(11) NOT NULL,
  `fecharegistro` date NOT NULL,
  `fechaautorizacion` date DEFAULT NULL,
  `fechaentregaprestamo` date DEFAULT NULL,
  `valorprestamo` int(11) NOT NULL,
  `estatus` int(11) NOT NULL,
  PRIMARY KEY (`idsolicitanteprestamo`),
  KEY `idsolicitante` (`idsolicitante`),
  KEY `estatus` (`estatus`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `dsolicitante_prestamo`
--

INSERT INTO `dsolicitante_prestamo` (`idsolicitanteprestamo`, `idsolicitante`, `fecharegistro`, `fechaautorizacion`, `fechaentregaprestamo`, `valorprestamo`, `estatus`) VALUES
(1, 1, '2017-07-03', '2017-07-03', '2017-07-10', 600, 6),
(2, 2, '2017-07-05', NULL, NULL, 12000, 6),
(3, 2, '2017-07-05', NULL, NULL, 12000, 5),
(4, 2, '2017-07-05', NULL, NULL, 12000, 5),
(5, 2, '2017-07-05', NULL, NULL, 12000, 5),
(6, 2, '2017-07-05', NULL, NULL, 3000, 5),
(7, 2, '2017-07-05', NULL, NULL, 6000, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dusuario`
--

CREATE TABLE IF NOT EXISTS `dusuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombreusuario` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `clave` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `idsolicitante` int(11) NOT NULL,
  `idtipousuario` int(11) NOT NULL,
  `idestatus` int(11) NOT NULL,
  PRIMARY KEY (`idusuario`),
  KEY `idsolicitante` (`idsolicitante`),
  KEY `idtipousuario` (`idtipousuario`),
  KEY `idestatus` (`idestatus`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `dusuario`
--

INSERT INTO `dusuario` (`idusuario`, `nombreusuario`, `clave`, `idsolicitante`, `idtipousuario`, `idestatus`) VALUES
(3, 'jaespinoza', '123456', 1, 1, 3),
(4, 'JMALDONADO', '123456', 2, 2, 3),
(5, 'AESPINOZA', '123', 3, 2, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nestatus`
--

CREATE TABLE IF NOT EXISTS `nestatus` (
  `idestatus` int(11) NOT NULL,
  `descripcion` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idestatus`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `nestatus`
--

INSERT INTO `nestatus` (`idestatus`, `descripcion`) VALUES
(1, 'Cancelado'),
(2, 'Sin Cancelar'),
(3, 'Activo'),
(4, 'No Activo'),
(5, 'En Proceso'),
(6, 'Aprobado'),
(7, 'Rechazado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ntiposuario`
--

CREATE TABLE IF NOT EXISTS `ntiposuario` (
  `idtipousuario` int(2) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idtipousuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `ntiposuario`
--

INSERT INTO `ntiposuario` (`idtipousuario`, `descripcion`) VALUES
(1, 'Administrador'),
(2, 'Solicitante');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `dsolicitante_prestamo`
--
ALTER TABLE `dsolicitante_prestamo`
  ADD CONSTRAINT `dsolicitante_prestamo_ibfk_1` FOREIGN KEY (`idsolicitante`) REFERENCES `dsolicitante` (`idsolicitante`) ON DELETE CASCADE,
  ADD CONSTRAINT `dsolicitante_prestamo_ibfk_2` FOREIGN KEY (`estatus`) REFERENCES `nestatus` (`idestatus`) ON DELETE CASCADE;

--
-- Filtros para la tabla `dusuario`
--
ALTER TABLE `dusuario`
  ADD CONSTRAINT `dusuario_ibfk_1` FOREIGN KEY (`idsolicitante`) REFERENCES `dsolicitante` (`idsolicitante`),
  ADD CONSTRAINT `dusuario_ibfk_2` FOREIGN KEY (`idtipousuario`) REFERENCES `ntiposuario` (`idtipousuario`),
  ADD CONSTRAINT `dusuario_ibfk_3` FOREIGN KEY (`idestatus`) REFERENCES `nestatus` (`idestatus`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
