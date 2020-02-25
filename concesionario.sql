-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-02-2020 a las 17:33:43
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `concesionario`
--
CREATE DATABASE IF NOT EXISTS `concesionario` DEFAULT CHARACTER SET latin1 COLLATE latin1_spanish_ci;
USE `concesionario`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coches`
--

CREATE TABLE `coches` (
  `id` int(11) NOT NULL,
  `marca` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `modelo` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `color` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `anio_matriculacion` int(11) NOT NULL,
  `motor` int(11) NOT NULL,
  `combustible` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `num_puertas` varchar(2) COLLATE latin1_spanish_ci NOT NULL,
  `Aire_Acondicionado` bit(1) NOT NULL DEFAULT b'0',
  `elevaluna` bit(1) NOT NULL DEFAULT b'0',
  `remolque` bit(1) NOT NULL DEFAULT b'0',
  `airbag` bit(1) NOT NULL DEFAULT b'0',
  `navegador` bit(1) NOT NULL DEFAULT b'0',
  `kms` int(11) NOT NULL,
  `precio` float NOT NULL,
  `foto` blob NOT NULL,
  `foto_1` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `coches`
--

INSERT INTO `coches` (`id`, `marca`, `modelo`, `color`, `anio_matriculacion`, `motor`, `combustible`, `num_puertas`, `Aire_Acondicionado`, `elevaluna`, `remolque`, `airbag`, `navegador`, `kms`, `precio`, `foto`, `foto_1`) VALUES
(1, 'BMW', 'X1', 'Blanco', 2015, 2000, 'Gasolina', '5p', b'1', b'0', b'0', b'1', b'1', 54000, 31200, 0x424d575f58312e6a7067, 0x424d575f58315f312e6a7067),
(2, 'Seat', 'Ibiza', 'Rojo', 2020, 1800, 'Gasolina', '3p', b'1', b'1', b'0', b'1', b'0', 0, 19000, 0x534541545f4942495a412e6a7067, 0x534541545f4942495a415f312e6a7067),
(3, 'Volswagen', 'Golf', 'Blanco', 2018, 1500, 'Diesel', '5p', b'1', b'1', b'0', b'1', b'1', 14200, 17300, 0x56575f474f4c462e6a7067, 0x56575f474f4c465f312e6a7067);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `apellidos` varchar(40) COLLATE latin1_spanish_ci NOT NULL,
  `usuario` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `password` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `email` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `telefono` varchar(12) COLLATE latin1_spanish_ci NOT NULL,
  `admin` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellidos`, `usuario`, `password`, `email`, `telefono`, `admin`) VALUES
(1, 'Joaquín ', 'Bono Pineda', 'joaquinbp', 'eusa1234', 'joaquinbono.18@campuscamara.es', '635486072', b'1'),
(3, 'Antonio', 'Perez', 'antperez', 'eusa12345', 'antonio.perez@eusa.es', '666334211', b'0'),
(4, 'Fernando', 'Mateos', 'fernan', 'eusa12345', 'fernando@gmail.com', '654786990', b'0'),
(5, 'Jose Manuel', 'PiÃ±ez', 'josePinez', 'eusa123', 'josepinez.18@campuscamara.es', '666334233', b'0'),
(6, 'Curro', 'Bono Pineda', 'currobp', 'eusa1234', 'currobp@gmail.com', '635486072', b'0');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `coches`
--
ALTER TABLE `coches`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `coches`
--
ALTER TABLE `coches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
