-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-05-2021 a las 16:00:55
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

--
-- Volcado de datos para la tabla `actividades`
--

INSERT INTO `actividades` (`id_actividad`, `Nombre`, `Deporte`, `Fecha`, `Hora_inicio`, `Hora_fin`, `plazas`) VALUES
(1, 'Curso iniciacion Tenis', 'Golf', '2021-03-24', '18:15:00', '20:15:00', 6),
(3, 'Torneo Baloncesto', 'Baloncesto', '2021-05-11', '11:00:00', '14:00:00', 19),
(4, 'Curso iniciacion Golf', 'Golf', '2021-03-24', '18:15:00', '20:15:00', 18),
(6, 'Curso Avanzado Golf', 'Golf', '2021-05-08', '16:00:00', '18:00:00', 3),
(8, 'Curso principiante golf', 'Golf', '2021-05-12', '12:20:00', '13:20:00', 28),
(9, 'act prueba', 'Golf', '2021-05-26', '10:00:00', '11:00:00', 20);

--
-- Volcado de datos para la tabla `material`
--

INSERT INTO `material` (`id_material`, `Coste`, `Deporte`, `Hora`, `Cantidad`, `Fecha`, `tipo`, `Nombre`) VALUES
(1, 1, 'Golf', '13:01:39', 40, '2021-03-10', 'material', 'Pelota de golf'),
(2, 10, 'Golf', '13:03:52', 48, '2021-03-10', 'material', 'Palo golf'),
(3, 15, 'Golf', '13:07:18', 5, '2021-03-10', 'pista', 'Calle para practicar tiros '),
(4, 25.5, 'Golf', '13:07:18', 20, '2021-03-10', 'pista', 'Hoyo individual'),
(5, 150, 'Golf', '13:07:18', 2, '2021-03-10', 'pista', 'Pista completa golf'),
(18, 10, 'Baloncesto', '00:00:00', 4, '2021-05-04', 'pista', 'Cancha Baloncesto'),
(19, 20, 'Tenis', '00:00:00', 2, '2021-05-14', 'pista', 'pista tenis'),
(20, 1, 'Tenis', '00:00:00', 50, '2021-05-11', 'material', 'pelota de tenis');

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`Nombre`, `Apellidos`, `Usuario`, `DNI`, `RolUser`, `Contrasenia`, `Email`, `Telefono`, `MetodoPago`, `avatar`) VALUES
(NULL, NULL, 'admin2', '11122233P', 'admin', 'ceabcfaf06a9e2e87e8f316480b0a34c', 'admin2@gmail.com', NULL, NULL, NULL),
('Pedro', 'Jimenez', 'pedro55', '13579112G', 'usuario', 'ceabcfaf06a9e2e87e8f316480b0a34c', 'pr@gmail.com', 658963214, '1234567812345676', NULL),
('Mario', 'Perez', 'marioNintendero', '24681012B', 'usuario', 'ceabcfaf06a9e2e87e8f316480b0a34c', 'mp@gmail.com', 633587415, '1234567812345678', NULL);

--
-- Volcado de datos para la tabla `user_actividad`
--

INSERT INTO `user_actividad` (`id_usuario_actividad`, `dni_usuario`, `id_actividad`, `fecha_reserva`) VALUES
(27, '13579112G', 6, '2021-05-12'),
(28, '13579112G', 8, '2021-05-12'),
(30, '24681012B', 8, '2021-05-12'),
(31, '24681012B', 1, '2021-05-12'),
(32, '24681012B', 4, '2021-05-12');

--
-- Volcado de datos para la tabla `user_material`
--

INSERT INTO `user_material` (`id_usuario_material`, `dni_user`, `id_material`, `coste`, `cantidad`, `fecha_reserva`) VALUES
(20, '13579112G', 4, 0, 2, '2021-05-12'),
(21, '13579112G', 1, 0, 10, '2021-05-12'),
(22, '24681012B', 4, 0, 6, '2021-05-12'),
(23, '24681012B', 3, 0, 5, '2021-05-12');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
