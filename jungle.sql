-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-10-2022 a las 21:09:42
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 7.4.26

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
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `cliId` int(20) NOT NULL,
  `cliNit` varchar(11) NOT NULL,
  `cliRazonSocial` varchar(100) NOT NULL,
  `cliNombre` varchar(100) NOT NULL,
  `cliEstado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`cliId`, `cliNit`, `cliRazonSocial`, `cliNombre`, `cliEstado`) VALUES
(1, '1234567', 'impresos el dia ', 'juan velez h', 1),
(2, '435534435', 'etigraf', 'jose perez', 1);

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
-- Estructura de tabla para la tabla `proyectos`
--

CREATE TABLE `proyectos` (
  `proId` int(11) NOT NULL,
  `proCodigo` varchar(10) NOT NULL,
  `proNombre` varchar(50) NOT NULL,
  `proDescripcion` varchar(100) NOT NULL,
  `proPrecio` int(10) NOT NULL,
  `proEstado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proyectos`
--

INSERT INTO `proyectos` (`proId`, `proCodigo`, `proNombre`, `proDescripcion`, `proPrecio`, `proEstado`) VALUES
(1, 'PR-1', 'Diseño Marca', 'Diseño de proyecto de marca', 20000000, 1),
(2, 'PR-2', 'Desarrollo software a la medida', 'Desarrollo de software para una cadena de supermercados', 100000000, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos_detalle`
--

CREATE TABLE `proyectos_detalle` (
  `prodId` int(11) NOT NULL,
  `prodProId` int(11) NOT NULL,
  `prodServicioId` int(11) NOT NULL,
  `prodPrecioUnitario` int(10) NOT NULL,
  `prodEstado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos_integrantes`
--

CREATE TABLE `proyectos_integrantes` (
  `proiId` int(11) NOT NULL,
  `proiProId` int(11) NOT NULL,
  `proiPersonaId` int(11) NOT NULL,
  `proiRol` varchar(50) NOT NULL,
  `proiEstado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proyectos_integrantes`
--

INSERT INTO `proyectos_integrantes` (`proiId`, `proiProId`, `proiPersonaId`, `proiRol`, `proiEstado`) VALUES
(1, 1, 12345, 'Gerente de proyecto', 1),
(2, 2, 12345, 'Desarrollador', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `serId` int(11) NOT NULL,
  `serNombre` varchar(50) NOT NULL,
  `serDescripcion` varchar(150) NOT NULL,
  `serPrecio` int(10) NOT NULL,
  `serEstado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`serId`, `serNombre`, `serDescripcion`, `serPrecio`, `serEstado`) VALUES
(1, 'Desarrollo web', 'Servicio de desarrollo web a la medida', 0, 1),
(2, 'Diseño Web', 'Diseño de sitios web', 0, 1);

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
(22, '12345', '$2y$10$QKVieaJUX0B5ipIwW7gdtegNikOnAYh9/XG86EkaYVDldSSHR8bMO', 'gerente general', '1', '2022-10-18 00:33:10');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`cliId`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`perDni`);

--
-- Indices de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD PRIMARY KEY (`proId`);

--
-- Indices de la tabla `proyectos_detalle`
--
ALTER TABLE `proyectos_detalle`
  ADD PRIMARY KEY (`prodId`);

--
-- Indices de la tabla `proyectos_integrantes`
--
ALTER TABLE `proyectos_integrantes`
  ADD PRIMARY KEY (`proiId`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`serId`);

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
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `cliId` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  MODIFY `proId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `proyectos_detalle`
--
ALTER TABLE `proyectos_detalle`
  MODIFY `prodId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proyectos_integrantes`
--
ALTER TABLE `proyectos_integrantes`
  MODIFY `proiId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `serId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
