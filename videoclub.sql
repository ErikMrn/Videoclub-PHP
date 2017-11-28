-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-02-2015 a las 19:05:25
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `videoclub`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE IF NOT EXISTS `peliculas` (
`idPelicula` int(11) NOT NULL,
  `titulo` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `director` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `sinopsis` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `tematica` varchar(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`idPelicula`, `titulo`, `director`, `sinopsis`, `tematica`) VALUES
(1, 'La vida de Pi', 'Un indio', 'La vide de Pi', 'Aventuras'),
(2, 'Begin Again', 'Uno americano', 'New york new yorkk $', 'musical'),
(3, 'La isla minima', 'español', 'Asesinatos ', 'Cine negro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `DNI` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `usuario` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `clave` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` int(11) NOT NULL,
  `email` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` enum('comun','admin') COLLATE utf8_spanish_ci NOT NULL DEFAULT 'comun'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`DNI`, `usuario`, `clave`, `telefono`, `email`, `tipo`) VALUES
('09057970H', 'root', 'f8032d5cae3de20fcec887f395ec9a6a', 657239397, 'usuario@gmail', 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
 ADD PRIMARY KEY (`idPelicula`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`DNI`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
MODIFY `idPelicula` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
