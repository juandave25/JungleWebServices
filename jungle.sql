-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-09-2022 a las 05:59:21
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `jungle`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `perDni` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `perNombres` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `perApellidos` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `perDireccion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `perCelular` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `perEmail` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `perGenero` varchar(1) COLLATE utf8_spanish_ci NOT NULL,
  `perNacimiento` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `perRol` int(1) NOT NULL,
  `perFecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`perDni`, `perNombres`, `perApellidos`, `perDireccion`, `perCelular`, `perEmail`, `perGenero`, `perNacimiento`, `perRol`, `perFecha`) VALUES
('12345', 'prueba', 'prueba', 'carrera 13 # 4-52', '32052145225', 'notiene@gmail.com', 'M', '1950-01-01', 0, '2022-09-05 03:58:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuId` int(11) NOT NULL,
  `usuLogin` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `usuPassword` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `usuPerfil` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `usuEstado` varchar(1) COLLATE utf8_spanish_ci NOT NULL,
  `usuFecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuId`, `usuLogin`, `usuPassword`, `usuPerfil`, `usuEstado`, `usuFecha`) VALUES
(22, '12345', '$2y$10$QKVieaJUX0B5ipIwW7gdtegNikOnAYh9/XG86EkaYVDldSSHR8bMO', 'gerente general', '1', '2022-09-05 03:58:38');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`perDni`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuId`),
  ADD UNIQUE KEY `usuLogin` (`usuLogin`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`usuLogin`) REFERENCES `personas` (`perDni`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
