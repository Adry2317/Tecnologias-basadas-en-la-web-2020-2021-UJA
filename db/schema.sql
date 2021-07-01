-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-05-2021 a las 13:24:33
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `clubdeportivo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE `actividades` (
  `id_actividad` int(11) NOT NULL,
  `Nombre` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `Deporte` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Fecha` date NOT NULL,
  `Hora_inicio` time NOT NULL,
  `Hora_fin` time NOT NULL,
  `plazas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material`
--

CREATE TABLE `material` (
  `id_material` int(11) NOT NULL,
  `Coste` double NOT NULL,
  `Deporte` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Hora` time NOT NULL,
  `Cantidad` float NOT NULL,
  `Fecha` date NOT NULL,
  `tipo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `Nombre` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Apellidos` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Usuario` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `DNI` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `RolUser` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Contrasenia` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Telefono` int(9) DEFAULT NULL,
  `MetodoPago` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_actividad`
--

CREATE TABLE `user_actividad` (
  `id_usuario_actividad` int(11) NOT NULL,
  `dni_usuario` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `id_actividad` int(11) NOT NULL,
  `fecha_reserva` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_material`
--

CREATE TABLE `user_material` (
  `id_usuario_material` int(10) UNSIGNED NOT NULL,
  `dni_user` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `id_material` int(11) NOT NULL,
  `coste` float NOT NULL,
  `cantidad` float NOT NULL,
  `fecha_reserva` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`id_actividad`);

--
-- Indices de la tabla `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id_material`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`DNI`);

--
-- Indices de la tabla `user_actividad`
--
ALTER TABLE `user_actividad`
  ADD PRIMARY KEY (`id_usuario_actividad`),
  ADD KEY `foreing_key_dni_user` (`dni_usuario`),
  ADD KEY `foreing_key_id_actividad` (`id_actividad`);

--
-- Indices de la tabla `user_material`
--
ALTER TABLE `user_material`
  ADD PRIMARY KEY (`id_usuario_material`),
  ADD KEY `user_dni_foreing_key` (`dni_user`),
  ADD KEY `material_id_foreing_key` (`id_material`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividades`
--
ALTER TABLE `actividades`
  MODIFY `id_actividad` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `material`
--
ALTER TABLE `material`
  MODIFY `id_material` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `user_actividad`
--
ALTER TABLE `user_actividad`
  MODIFY `id_usuario_actividad` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `user_material`
--
ALTER TABLE `user_material`
  MODIFY `id_usuario_material` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `user_actividad`
--
ALTER TABLE `user_actividad`
  ADD CONSTRAINT `foreing_key_dni_user` FOREIGN KEY (`dni_usuario`) REFERENCES `user` (`DNI`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `foreing_key_id_actividad` FOREIGN KEY (`id_actividad`) REFERENCES `actividades` (`id_actividad`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `user_material`
--
ALTER TABLE `user_material`
  ADD CONSTRAINT `material_id_foreing_key` FOREIGN KEY (`id_material`) REFERENCES `material` (`id_material`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_dni_foreing_key` FOREIGN KEY (`dni_user`) REFERENCES `user` (`DNI`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
