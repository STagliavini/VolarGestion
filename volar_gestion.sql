-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-10-2021 a las 21:32:50
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `volar_gestion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `avion`
--

CREATE TABLE `avion` (
  `id_avion` int(11) NOT NULL,
  `matricula_avion` varchar(7) NOT NULL,
  `nombre_avion` varchar(30) NOT NULL,
  `descripcion_avion` varchar(100) DEFAULT NULL,
  `tipo_avion` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `avion`
--

INSERT INTO `avion` (`id_avion`, `matricula_avion`, `nombre_avion`, `descripcion_avion`, `tipo_avion`) VALUES
(1, 'LV-FWP', 'Cessna 152', 'Avion Escuela', 'C152'),
(2, 'LV-FWQ', 'Cessna 152', 'Avion Escuela', 'C152'),
(3, 'LV-FEB', 'Cessna 172', 'Avion Escuela', 'C172');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `id_pago` int(11) NOT NULL,
  `dni_pago` bigint(20) NOT NULL,
  `monto_pago` decimal(15,2) NOT NULL,
  `fecha_pago` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pago`
--

INSERT INTO `pago` (`id_pago`, `dni_pago`, `monto_pago`, `fecha_pago`) VALUES
(28, 37312994, '5000.00', '2020-06-17'),
(29, 32651750, '3000.00', '2020-06-17'),
(1461, 37312994, '5000.00', '2020-09-29'),
(1462, 37312994, '5000.00', '2020-09-29'),
(1463, 32651750, '5000.00', '2020-09-29'),
(2659, 37312994, '5000.00', '2021-04-07'),
(2660, 37312994, '5000.00', '2021-04-07'),
(2661, 37312994, '5000.00', '2021-04-07'),
(2662, 37312994, '5000.00', '2021-04-07'),
(2663, 37312994, '5000.00', '2021-04-07'),
(2664, 37312994, '5000.00', '2021-04-07'),
(2665, 41362635, '5000.00', '2021-04-07'),
(2666, 37312994, '5000.00', '2021-04-07'),
(2667, 37312994, '5000.00', '2021-04-07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `piloto`
--

CREATE TABLE `piloto` (
  `id_piloto` int(11) NOT NULL,
  `dni_piloto` bigint(20) NOT NULL,
  `apellido_piloto` varchar(50) NOT NULL,
  `nombre_piloto` varchar(50) NOT NULL,
  `nacimiento_piloto` date NOT NULL,
  `mail_piloto` varchar(100) DEFAULT '',
  `deuda_piloto` decimal(15,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `piloto`
--

INSERT INTO `piloto` (`id_piloto`, `dni_piloto`, `apellido_piloto`, `nombre_piloto`, `nacimiento_piloto`, `mail_piloto`, `deuda_piloto`) VALUES
(24, 37312994, 'Ibañez', 'Santiago Javier', '1992-12-28', '', '-22952.74'),
(25, 41362635, 'Tagliavini', 'Santiago Antonio', '1998-07-17', 'santi.tagliavini@gmail.com', '0.00'),
(28, 32651750, 'Azar', 'Juan Ezequiel', '1990-09-28', '', '6280.58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_avion`
--

CREATE TABLE `tipo_avion` (
  `id_tipo_avion` int(11) NOT NULL,
  `nombre_tipo_avion` varchar(4) NOT NULL,
  `precio_tipo_avion` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_avion`
--

INSERT INTO `tipo_avion` (`id_tipo_avion`, `nombre_tipo_avion`, `precio_tipo_avion`) VALUES
(1, 'C152', '8972.25'),
(2, 'C172', '12561.15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turno`
--

CREATE TABLE `turno` (
  `id_turno` int(11) NOT NULL,
  `piloto_turno` bigint(20) NOT NULL,
  `copiloto_turno` bigint(20) NOT NULL,
  `fecha_turno` date NOT NULL,
  `salida_turno` time NOT NULL,
  `llegada_turno` time NOT NULL,
  `avion_turno` varchar(7) NOT NULL,
  `aclaracion_turno` varchar(200) DEFAULT NULL,
  `estado_turno` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `turno`
--

INSERT INTO `turno` (`id_turno`, `piloto_turno`, `copiloto_turno`, `fecha_turno`, `salida_turno`, `llegada_turno`, `avion_turno`, `aclaracion_turno`, `estado_turno`) VALUES
(6, 32651750, 37312994, '2021-04-28', '15:53:00', '16:00:00', 'LV-FWQ', '', 2),
(10, 32651750, 41362635, '2021-04-28', '15:53:00', '16:00:00', 'LV-FWP', '', 2),
(7, 32651750, 41362635, '2021-07-07', '15:53:00', '17:00:00', 'LV-FWQ', '', 2),
(3, 37312994, 32651750, '2021-04-28', '15:53:00', '16:00:00', 'LV-FWQ', 'hola', 2),
(12, 37312994, 32651750, '2021-04-30', '15:53:00', '16:00:00', 'LV-FWQ', '', 2),
(13, 37312994, 37312994, '2021-04-21', '15:53:00', '16:00:00', 'LV-FWQ', '', 2),
(9, 37312994, 37312994, '2021-04-28', '15:53:00', '16:00:00', 'LV-FEB', '', 2),
(4, 37312994, 37312994, '2021-04-28', '15:53:00', '16:00:00', 'LV-FWP', '', 2),
(0, 37312994, 37312994, '2021-04-28', '15:53:00', '16:00:00', 'LV-FWQ', 'hola', 2),
(11, 37312994, 41362635, '2021-04-29', '15:53:00', '16:00:00', 'LV-FWP', '', 2),
(5, 41362635, 37312994, '2021-07-05', '19:30:00', '20:00:00', 'LV-FWQ', '', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` bigint(20) NOT NULL,
  `contrasenia_usuario` varchar(30) NOT NULL,
  `tipo_usuario` varchar(20) NOT NULL,
  `perfil_usuario` varchar(100) DEFAULT NULL,
  `estado_usuario` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre_usuario`, `contrasenia_usuario`, `tipo_usuario`, `perfil_usuario`, `estado_usuario`) VALUES
(3, 37312994, 'Ibañez1992', 'Piloto', 'recursos/fotos_usuarios/', 1),
(4, 41362635, 'Tagliavini1998', 'Piloto', 'recursos/fotos_usuarios/737-Cabina.jpg', 1),
(7, 32651750, 'Azar1990', 'Piloto', 'recursos/fotos_usuarios/ezequiel.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vuelo`
--

CREATE TABLE `vuelo` (
  `id_vuelo` int(11) NOT NULL,
  `fecha_vuelo` date NOT NULL,
  `salida_vuelo` varchar(5) NOT NULL,
  `llegada_vuelo` varchar(5) NOT NULL,
  `origen_vuelo` varchar(7) NOT NULL,
  `destino_vuelo` varchar(7) NOT NULL,
  `aterrizajes_vuelo` int(11) NOT NULL,
  `piloto_vuelo` bigint(20) NOT NULL,
  `copiloto_vuelo` bigint(20) DEFAULT NULL,
  `duracion_vuelo` decimal(15,1) NOT NULL,
  `avion_vuelo` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `vuelo`
--

INSERT INTO `vuelo` (`id_vuelo`, `fecha_vuelo`, `salida_vuelo`, `llegada_vuelo`, `origen_vuelo`, `destino_vuelo`, `aterrizajes_vuelo`, `piloto_vuelo`, `copiloto_vuelo`, `duracion_vuelo`, `avion_vuelo`) VALUES
(4, '2018-06-16', '13:05', '13:55', 'SANE', 'SANE', 3, 41362635, NULL, '0.8', 'LV-FWP'),
(5, '2018-06-17', '20:05', '21:15', 'SANE', 'SANE', 3, 41362635, NULL, '1.2', 'LV-FWP'),
(6, '2018-06-20', '12:45', '13:55', 'SANE', 'SANE', 4, 41362635, NULL, '1.2', 'LV-FWQ'),
(7, '2018-06-20', '20:25', '21:15', 'SANE', 'SANE', 3, 41362635, NULL, '0.8', 'LV-FEB'),
(8, '2018-06-22', '11:55', '14:45', 'SANE', 'SAAV', 1, 41362635, NULL, '2.8', 'LV-FEB'),
(9, '2018-06-22', '15:45', '17:50', 'SAAV', 'SADF', 1, 41362635, NULL, '2.1', 'LV-FEB'),
(10, '2018-07-12', '20:15', '21:20', 'SANE', 'SANE', 1, 41362635, NULL, '1.1', 'LV-FWP'),
(11, '2018-07-24', '20:20', '21:20', 'SANE', 'SANE', 1, 41362635, NULL, '1.0', 'LV-FWP'),
(12, '2018-07-25', '12:15', '13:10', 'SANE', 'SANE', 1, 41362635, NULL, '0.8', 'LV-FWQ'),
(18, '2018-08-02', '08:15', '10:30', 'SANE', 'ERE', 1, 41362635, NULL, '2.3', 'LV-FWP'),
(19, '2018-08-02', '11:00', '12:40', 'ERE', 'SAAV', 1, 41362635, NULL, '1.7', 'LV-FWP'),
(20, '2018-08-02', '13:30', '16:30', 'SAAV', 'SADF', 1, 41362635, NULL, '3.0', 'LV-FWP'),
(21, '2018-09-25', '10:35', '11:35', 'SANE', 'SANE', 6, 41362635, NULL, '1.0', 'LV-FWQ'),
(22, '2018-10-06', '17:45', '18:45', 'SANE', 'SANE', 3, 41362635, NULL, '1.0', 'LV-FWQ'),
(23, '2018-10-06', '18:55', '19:10', 'SANE', 'SANE', 1, 41362635, NULL, '0.3', 'LV-FWQ'),
(24, '2018-10-13', '17:55', '18:35', 'SANE', 'SANE', 1, 41362635, NULL, '0.7', 'LV-FWQ'),
(25, '2018-11-03', '17:55', '18:25', 'SANE', 'SANE', 1, 41362635, NULL, '0.5', 'LV-FWQ'),
(26, '2018-11-10', '7:40', '09:00', 'SANE', 'SANT', 1, 41362635, NULL, '1.3', 'LV-FWQ'),
(27, '2018-11-19', '06:30', '09:30', 'SANE', 'SARS', 1, 41362635, NULL, '3.0', 'LV-FWQ'),
(28, '2018-12-08', '9:30', '10:20', 'SANE', 'SANE', 1, 41362635, NULL, '0.8', 'LV-FWP'),
(29, '2019-01-29', '08:00', '9:00', 'SANE', 'SANE', 6, 41362635, NULL, '1.0', 'LV-FWP'),
(30, '2019-03-15', '08:30', '9:45', 'SANE', 'SANE', 7, 41362635, NULL, '1.3', 'LV-FEB'),
(31, '2019-03-22', '17:20', '18:10', 'SANE', 'SANE', 5, 41362635, NULL, '0.8', 'LV-FEB'),
(32, '2019-03-29', '17:00', '17:45', 'SANE', 'SANE', 1, 41362635, NULL, '0.7', 'LV-FEB'),
(33, '2019-04-26', '9:00', '9:45', 'SANE', 'SANE', 6, 41362635, NULL, '0.7', 'LV-FWQ'),
(34, '2019-05-11', '13:50', '14:40', 'SANE', 'SANR', 1, 41362635, NULL, '0.8', 'LV-FWQ'),
(35, '2019-05-24', '15:20', '16:10', 'SANR', 'SANE', 1, 41362635, NULL, '0.8', 'LV-FWQ'),
(36, '2019-06-08', '14:15', '15:00', 'SANE', 'SANR', 1, 41362635, NULL, '0.7', 'LV-FWP'),
(38, '2019-07-06', '14:45', '15:35', 'SANE', 'SANE', 4, 41362635, NULL, '0.8', 'LV-FEB'),
(39, '2019-07-10', '10:30', '11:25', 'SANE', 'SANT', 1, 41362635, NULL, '0.9', 'LV-FEB'),
(40, '2018-07-27', '17:30', '18:10', 'SANE', 'SANE', 1, 41362635, NULL, '0.6', 'LV-FEB'),
(41, '2019-08-10', '16:40', '17:10', 'LAD2954', 'LAD2954', 1, 41362635, NULL, '0.5', 'LV-FWP'),
(42, '2019-08-23', '14:55', '15:25', 'LAD2954', 'SANE', 1, 41362635, NULL, '0.5', 'LV-FWP'),
(43, '2019-09-15', '13:05', '14:20', 'TCM', 'SANE', 1, 41362635, NULL, '1.3', 'LV-FWP'),
(69, '2021-04-07', '15:40', '16:10', 'LAD2954', 'LAD2954', 5, 41362635, 37312994, '0.5', 'LV-FEB'),
(70, '2021-04-07', '15:40', '16:10', 'LAD2954', 'LAD2954', 5, 37312994, 37312994, '0.5', 'LV-FEB'),
(71, '2021-04-07', '15:40', '16:10', 'LAD2954', 'LAD2954', 5, 37312994, NULL, '0.5', 'LV-FWP'),
(72, '2021-04-07', '15:40', '16:10', 'LAD2954', 'LAD2954', 5, 37312994, 41362635, '0.5', 'LV-FEB'),
(73, '2021-04-07', '15:40', '16:10', 'LAD2954', 'LAD2954', 5, 32651750, NULL, '0.5', 'LV-FEB');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `avion`
--
ALTER TABLE `avion`
  ADD PRIMARY KEY (`id_avion`),
  ADD UNIQUE KEY `matricula_avion` (`matricula_avion`),
  ADD KEY `tipo_avion` (`tipo_avion`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`id_pago`);

--
-- Indices de la tabla `piloto`
--
ALTER TABLE `piloto`
  ADD PRIMARY KEY (`id_piloto`),
  ADD UNIQUE KEY `dni_piloto` (`dni_piloto`);

--
-- Indices de la tabla `tipo_avion`
--
ALTER TABLE `tipo_avion`
  ADD PRIMARY KEY (`id_tipo_avion`),
  ADD UNIQUE KEY `nombre_tipo_avion` (`nombre_tipo_avion`);

--
-- Indices de la tabla `turno`
--
ALTER TABLE `turno`
  ADD PRIMARY KEY (`piloto_turno`,`copiloto_turno`,`fecha_turno`,`salida_turno`,`avion_turno`),
  ADD UNIQUE KEY `id_turno` (`id_turno`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `nombre_usuario` (`nombre_usuario`);

--
-- Indices de la tabla `vuelo`
--
ALTER TABLE `vuelo`
  ADD PRIMARY KEY (`id_vuelo`),
  ADD KEY `avion_vuelo` (`avion_vuelo`),
  ADD KEY `piloto_vuelo` (`piloto_vuelo`),
  ADD KEY `copiloto_vuelo` (`copiloto_vuelo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `avion`
--
ALTER TABLE `avion`
  MODIFY `id_avion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
  MODIFY `id_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2668;

--
-- AUTO_INCREMENT de la tabla `piloto`
--
ALTER TABLE `piloto`
  MODIFY `id_piloto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `tipo_avion`
--
ALTER TABLE `tipo_avion`
  MODIFY `id_tipo_avion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `turno`
--
ALTER TABLE `turno`
  MODIFY `id_turno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `vuelo`
--
ALTER TABLE `vuelo`
  MODIFY `id_vuelo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `avion`
--
ALTER TABLE `avion`
  ADD CONSTRAINT `avion_ibfk_1` FOREIGN KEY (`tipo_avion`) REFERENCES `tipo_avion` (`nombre_tipo_avion`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`nombre_usuario`) REFERENCES `piloto` (`dni_piloto`);

--
-- Filtros para la tabla `vuelo`
--
ALTER TABLE `vuelo`
  ADD CONSTRAINT `vuelo_ibfk_1` FOREIGN KEY (`avion_vuelo`) REFERENCES `avion` (`matricula_avion`),
  ADD CONSTRAINT `vuelo_ibfk_3` FOREIGN KEY (`copiloto_vuelo`) REFERENCES `piloto` (`dni_piloto`),
  ADD CONSTRAINT `vuelo_ibfk_4` FOREIGN KEY (`piloto_vuelo`) REFERENCES `piloto` (`dni_piloto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
