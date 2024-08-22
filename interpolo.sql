-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-08-2024 a las 21:14:01
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `interpolo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `IDCliente` int(11) NOT NULL,
  `Usuario` varchar(30) DEFAULT NULL,
  `Contraseña` varchar(30) DEFAULT NULL,
  `IDDatos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`IDCliente`, `Usuario`, `Contraseña`, `IDDatos`) VALUES
(1, 'Root', 'PassW0rd', 1),
(2, 'Itachi_03', 'Str0ngErPa55', 2),
(3, 'Royal_para_hornear', 'Terror115', 3),
(4, 'AnyelinVC', 'anyelin', 4),
(5, 'MaFerLlama', 'Mafer123', 5),
(6, 'Albert_Hammond', 'Puebla2024', 6),
(11, 'Agustin_45', '123', 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente_servicios`
--

CREATE TABLE `cliente_servicios` (
  `IDCliente` int(11) DEFAULT NULL,
  `IDServicios` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos`
--

CREATE TABLE `datos` (
  `IDDatos` int(11) NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `Apellido_Paterno` varchar(30) DEFAULT NULL,
  `Apellido_Materno` varchar(30) DEFAULT NULL,
  `Numero` varchar(10) DEFAULT NULL,
  `Correo` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `datos`
--

INSERT INTO `datos` (`IDDatos`, `Nombre`, `Apellido_Paterno`, `Apellido_Materno`, `Numero`, `Correo`) VALUES
(1, 'root', 'root', 'root', '##########', 'root@mail.com'),
(2, 'Gustavo', 'Nava', 'Merino', '2229785300', 'tav_name3@gmail.com'),
(3, 'Rodrigo', 'Calixto', 'Salas', '2221184715', '2311081631@alumno.utpuebla.edu.mx'),
(4, 'Anyelin', 'Vazquez', 'Carreto', '2227356158', 'anyelivc@gmail.com'),
(5, 'Maria Fernanda', 'Perez', 'Martínez', '2288446699', 'mafer@gmail.com'),
(6, 'Albert', 'Hammond', 'Jr', '2211789520', 'albert_hammond@gmail.com'),
(11, 'Agustin', 'Perez', 'Potrillo', '2221184715', '85282852@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `escaner`
--

CREATE TABLE `escaner` (
  `IDescaner` int(11) NOT NULL,
  `Tamaño` varchar(30) DEFAULT NULL,
  `Precio` int(11) DEFAULT NULL,
  `IDServicios` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `escaner`
--

INSERT INTO `escaner` (`IDescaner`, `Tamaño`, `Precio`, `IDServicios`) VALUES
(1, 'Carta', 4, 5),
(2, 'Oficio', 6, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `impresiones`
--

CREATE TABLE `impresiones` (
  `IDimpresiones` int(11) NOT NULL,
  `Tipo` varchar(30) DEFAULT NULL,
  `Precio` int(11) DEFAULT NULL,
  `IDServicios` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `impresiones`
--

INSERT INTO `impresiones` (`IDimpresiones`, `Tipo`, `Precio`, `IDServicios`) VALUES
(1, 'Blanco y negro', 2, 1),
(2, 'Color', 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recargas`
--

CREATE TABLE `recargas` (
  `IDrecargas` int(11) NOT NULL,
  `Compañia` varchar(30) DEFAULT NULL,
  `Precio` int(11) DEFAULT NULL,
  `IDServicios` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `recargas`
--

INSERT INTO `recargas` (`IDrecargas`, `Compañia`, `Precio`, `IDServicios`) VALUES
(1, 'Telcel', NULL, 2),
(2, 'Movistar', NULL, 2),
(3, 'AT&T', NULL, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `renta_computadora`
--

CREATE TABLE `renta_computadora` (
  `IDrenta_computadora` int(11) NOT NULL,
  `Modelo` varchar(30) DEFAULT NULL,
  `Tiempo` int(11) DEFAULT NULL,
  `Precio` int(11) DEFAULT 5,
  `IDServicios` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `renta_computadora`
--

INSERT INTO `renta_computadora` (`IDrenta_computadora`, `Modelo`, `Tiempo`, `Precio`, `IDServicios`) VALUES
(1, 'HP', NULL, 5, 3),
(2, 'DELL', NULL, 5, 3),
(3, 'LENOVO', NULL, 5, 3),
(4, 'ACER', NULL, 5, 3),
(5, 'SAMSUNG', NULL, 5, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `IDservicios` int(11) NOT NULL,
  `Nombre` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`IDservicios`, `Nombre`) VALUES
(1, 'impresiones'),
(2, 'recargas'),
(3, 'renta_computadora'),
(4, 'tramites'),
(5, 'escaner');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tramites`
--

CREATE TABLE `tramites` (
  `IDtramites` int(11) NOT NULL,
  `Nombre` varchar(30) DEFAULT NULL,
  `Precio` int(11) DEFAULT NULL,
  `IDServicios` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tramites`
--

INSERT INTO `tramites` (`IDtramites`, `Nombre`, `Precio`, `IDServicios`) VALUES
(1, 'CURP', 15, 4),
(2, 'NSS', 15, 4),
(3, 'CITA_INE', 15, 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`IDCliente`),
  ADD KEY `IDDatos` (`IDDatos`);

--
-- Indices de la tabla `cliente_servicios`
--
ALTER TABLE `cliente_servicios`
  ADD KEY `IDCliente` (`IDCliente`),
  ADD KEY `IDServicios` (`IDServicios`);

--
-- Indices de la tabla `datos`
--
ALTER TABLE `datos`
  ADD PRIMARY KEY (`IDDatos`);

--
-- Indices de la tabla `escaner`
--
ALTER TABLE `escaner`
  ADD PRIMARY KEY (`IDescaner`),
  ADD KEY `IDServicios` (`IDServicios`);

--
-- Indices de la tabla `impresiones`
--
ALTER TABLE `impresiones`
  ADD PRIMARY KEY (`IDimpresiones`),
  ADD KEY `IDServicios` (`IDServicios`);

--
-- Indices de la tabla `recargas`
--
ALTER TABLE `recargas`
  ADD PRIMARY KEY (`IDrecargas`),
  ADD KEY `IDServicios` (`IDServicios`);

--
-- Indices de la tabla `renta_computadora`
--
ALTER TABLE `renta_computadora`
  ADD PRIMARY KEY (`IDrenta_computadora`),
  ADD KEY `IDServicios` (`IDServicios`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`IDservicios`);

--
-- Indices de la tabla `tramites`
--
ALTER TABLE `tramites`
  ADD PRIMARY KEY (`IDtramites`),
  ADD KEY `IDServicios` (`IDServicios`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `IDCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `datos`
--
ALTER TABLE `datos`
  MODIFY `IDDatos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `escaner`
--
ALTER TABLE `escaner`
  MODIFY `IDescaner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `impresiones`
--
ALTER TABLE `impresiones`
  MODIFY `IDimpresiones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `recargas`
--
ALTER TABLE `recargas`
  MODIFY `IDrecargas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `renta_computadora`
--
ALTER TABLE `renta_computadora`
  MODIFY `IDrenta_computadora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `IDservicios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tramites`
--
ALTER TABLE `tramites`
  MODIFY `IDtramites` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`IDDatos`) REFERENCES `datos` (`IDDatos`);

--
-- Filtros para la tabla `cliente_servicios`
--
ALTER TABLE `cliente_servicios`
  ADD CONSTRAINT `cliente_servicios_ibfk_1` FOREIGN KEY (`IDCliente`) REFERENCES `cliente` (`IDCliente`),
  ADD CONSTRAINT `cliente_servicios_ibfk_2` FOREIGN KEY (`IDServicios`) REFERENCES `servicios` (`IDServicios`);

--
-- Filtros para la tabla `escaner`
--
ALTER TABLE `escaner`
  ADD CONSTRAINT `escaner_ibfk_1` FOREIGN KEY (`IDServicios`) REFERENCES `servicios` (`IDServicios`);

--
-- Filtros para la tabla `impresiones`
--
ALTER TABLE `impresiones`
  ADD CONSTRAINT `impresiones_ibfk_1` FOREIGN KEY (`IDServicios`) REFERENCES `servicios` (`IDServicios`);

--
-- Filtros para la tabla `recargas`
--
ALTER TABLE `recargas`
  ADD CONSTRAINT `recargas_ibfk_1` FOREIGN KEY (`IDServicios`) REFERENCES `servicios` (`IDServicios`);

--
-- Filtros para la tabla `renta_computadora`
--
ALTER TABLE `renta_computadora`
  ADD CONSTRAINT `renta_computadora_ibfk_1` FOREIGN KEY (`IDServicios`) REFERENCES `servicios` (`IDServicios`);

--
-- Filtros para la tabla `tramites`
--
ALTER TABLE `tramites`
  ADD CONSTRAINT `tramites_ibfk_1` FOREIGN KEY (`IDServicios`) REFERENCES `servicios` (`IDServicios`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
