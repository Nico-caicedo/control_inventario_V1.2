-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-08-2023 a las 21:57:55
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `control`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aulas`
--

CREATE TABLE `aulas` (
  `id_aula` int(10) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `cod` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `aulas`
--

INSERT INTO `aulas` (`id_aula`, `nombre`, `cod`) VALUES
(265, 'Ambiente 301', 122),
(268, 'redes y fibra', 202),
(269, 'oficina', 1997),
(270, 'laboratorio', 225),
(271, 'cocina', 8888),
(272, 'taller automotriz', 666),
(275, 'ambiente 301', 2548),
(277, 'test01', 6666),
(278, 'prueba 02', 7777);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`) VALUES
(3, 'muebles'),
(4, 'tecnologia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `elementos`
--

CREATE TABLE `elementos` (
  `id_elemento` int(10) NOT NULL,
  `nombre_elemento` varchar(25) NOT NULL,
  `marca` int(10) NOT NULL,
  `code` int(15) NOT NULL,
  `categoria` int(10) NOT NULL,
  `estado` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `elementos`
--

INSERT INTO `elementos` (`id_elemento`, `nombre_elemento`, `marca`, `code`, `categoria`, `estado`) VALUES
(36, 'dell', 14, 2020, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `id` int(11) NOT NULL,
  `estado` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id`, `estado`) VALUES
(1, 'No asigando'),
(2, 'asignado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `id_historial` int(11) NOT NULL,
  `fecha_operacion` datetime NOT NULL,
  `tipo_operacion` varchar(200) NOT NULL,
  `operaciones` varchar(200) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`id_historial`, `fecha_operacion`, `tipo_operacion`, `operaciones`, `id_usuario`) VALUES
(56, '2023-08-04 01:45:57', 'Modificación usuario', 'a:3:{i:0;s:4:\"luis\";i:1;s:7:\"alfonso\";i:2;s:8:\"40755259\";}', 1006537933),
(57, '2023-08-04 01:53:38', 'Modificación usuario', 'a:3:{i:0;s:4:\"luis\";i:1;s:7:\"alfonso\";i:2;s:9:\"407552592\";}', 1006537933),
(58, '2023-08-04 01:53:43', 'Modificación usuario', 'a:3:{i:0;s:4:\"luis\";i:1;s:8:\"alfonsoo\";i:2;s:9:\"407552592\";}', 1006537933),
(59, '2023-08-04 01:53:46', 'Modificación usuario', 'a:3:{i:0;s:5:\"luisw\";i:1;s:8:\"alfonsoo\";i:2;s:9:\"407552592\";}', 1006537933);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `id` int(10) NOT NULL,
  `id_aula` int(5) NOT NULL,
  `id_categoria` int(15) NOT NULL,
  `id_marca` int(15) NOT NULL,
  `id_elemento` int(10) NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `id` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `categoria` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`id`, `nombre`, `categoria`) VALUES
(9, 'LENOVO', 4),
(10, 'HP', 4),
(13, 'RIMAX', 3),
(14, 'VANYPLAS', 3),
(15, 'APPLE', 4),
(16, 'XIAOMI', 4),
(17, 'LIFETIME', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `muebles`
--

CREATE TABLE `muebles` (
  `id_Muebles` int(11) NOT NULL,
  `name_M` varchar(50) NOT NULL,
  `color_M` varchar(50) NOT NULL,
  `valor_M` int(50) NOT NULL,
  `code_M` int(15) NOT NULL,
  `mante_M` varchar(50) NOT NULL,
  `descrip_M` varchar(50) NOT NULL,
  `ubi_M` varchar(50) NOT NULL,
  `marca_M` int(5) NOT NULL,
  `estado` int(5) NOT NULL,
  `ambiente` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `muebles`
--

INSERT INTO `muebles` (`id_Muebles`, `name_M`, `color_M`, `valor_M`, `code_M`, `mante_M`, `descrip_M`, `ubi_M`, `marca_M`, `estado`, `ambiente`) VALUES
(26, 'jhvbj', 'negro', 28000, 455, 'buen estado', 'es nueva', 'tercer piso', 13, 1, 268);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id` int(10) NOT NULL,
  `rol` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `rol`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tecnologia`
--

CREATE TABLE `tecnologia` (
  `id_tecnologia` int(11) NOT NULL,
  `name_T` varchar(11) NOT NULL,
  `marca_T` int(11) NOT NULL,
  `cod_T` int(5) NOT NULL,
  `modelo_T` int(11) NOT NULL,
  `descrip_T` varchar(50) NOT NULL,
  `estado` int(11) NOT NULL,
  `ambiente` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tecnologia`
--

INSERT INTO `tecnologia` (`id_tecnologia`, `name_T`, `marca_T`, `cod_T`, `modelo_T`, `descrip_T`, `estado`, `ambiente`) VALUES
(54, 'tecnologia', 9, 1212, 2013, 'bueno', 1, 265),
(56, 'dell', 9, 2155, 2028, 'un buen computador apple', 1, 265),
(57, 'pc gemaer u', 10, 455, 2158, 'en buen estado ', 1, 265),
(58, 'mac', 10, 3012, 2013, 'en buen estado', 1, 265),
(59, 'dell', 9, 0, 0, '', 1, 268),
(62, 'mac', 9, 351245, 2019, 'nuevo', 1, 268),
(63, 'prueba', 9, 66666, 208, 'nuevo', 1, 268),
(64, 'prueba #2', 10, 74110, 2023, 'nuevo', 1, 268),
(67, 'prueba #3', 9, 7777, 2023, 'nuevo', 1, 268),
(68, 'luis', 10, 777666, 2023, 'nuevo', 1, 265);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `apellidos` varchar(200) NOT NULL,
  `cedula` varchar(200) NOT NULL,
  `correo` varchar(25) NOT NULL,
  `clave` varchar(25) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombre`, `apellidos`, `cedula`, `correo`, `clave`, `foto`, `rol`) VALUES
(1, 'nicolas', 'caicedo', '1006537933', 'nico@gmail.com', 'nico2002', '', 1),
(3, 'oscar_admin', '', '', 'oscar@gmail.com', 'admin1234', '', 1),
(4, 'nicolas', 'perez chamo', '1005657933', 'caicedo@gmail', '1005657933', '', 1),
(81, 'jorge', 'Caicedo', '100653793', 'caicedo@gmail.com', '100653793', '../asset/img/IMG_8815.jpg', 2),
(82, 'luisw', 'alfonsoo', '407552592', 'caicedo@nicolas', '273777', '', 2),
(96, 'admin', 'admim', '123456789', 'oyanguas@gmail.com', 'admin', '', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aulas`
--
ALTER TABLE `aulas`
  ADD PRIMARY KEY (`id_aula`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `elementos`
--
ALTER TABLE `elementos`
  ADD PRIMARY KEY (`id_elemento`),
  ADD KEY `categoria` (`categoria`),
  ADD KEY `marca` (`marca`),
  ADD KEY `categoria_2` (`categoria`),
  ADD KEY `estado` (`estado`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`id_historial`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_elemento` (`id_elemento`),
  ADD KEY `id_aula` (`id_aula`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `id_marca` (`id_marca`),
  ADD KEY `estado` (`estado`),
  ADD KEY `estado_2` (`estado`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria` (`categoria`);

--
-- Indices de la tabla `muebles`
--
ALTER TABLE `muebles`
  ADD PRIMARY KEY (`id_Muebles`),
  ADD KEY `ambiente` (`ambiente`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tecnologia`
--
ALTER TABLE `tecnologia`
  ADD PRIMARY KEY (`id_tecnologia`),
  ADD KEY `ambiente` (`ambiente`),
  ADD KEY `ambiente_2` (`ambiente`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rol` (`rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aulas`
--
ALTER TABLE `aulas`
  MODIFY `id_aula` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=279;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `elementos`
--
ALTER TABLE `elementos`
  MODIFY `id_elemento` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `id_historial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `muebles`
--
ALTER TABLE `muebles`
  MODIFY `id_Muebles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tecnologia`
--
ALTER TABLE `tecnologia`
  MODIFY `id_tecnologia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `elementos`
--
ALTER TABLE `elementos`
  ADD CONSTRAINT `elementos_ibfk_1` FOREIGN KEY (`categoria`) REFERENCES `categoria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `elementos_ibfk_2` FOREIGN KEY (`marca`) REFERENCES `marca` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `elementos_ibfk_3` FOREIGN KEY (`estado`) REFERENCES `estados` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `inventario_ibfk_1` FOREIGN KEY (`id_elemento`) REFERENCES `elementos` (`id_elemento`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inventario_ibfk_3` FOREIGN KEY (`id_marca`) REFERENCES `marca` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inventario_ibfk_4` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inventario_ibfk_5` FOREIGN KEY (`estado`) REFERENCES `estados` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `marca`
--
ALTER TABLE `marca`
  ADD CONSTRAINT `marca_ibfk_1` FOREIGN KEY (`categoria`) REFERENCES `categoria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `muebles`
--
ALTER TABLE `muebles`
  ADD CONSTRAINT `muebles_ibfk_1` FOREIGN KEY (`ambiente`) REFERENCES `aulas` (`id_aula`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tecnologia`
--
ALTER TABLE `tecnologia`
  ADD CONSTRAINT `tecnologia_ibfk_1` FOREIGN KEY (`ambiente`) REFERENCES `aulas` (`id_aula`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`rol`) REFERENCES `rol` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
