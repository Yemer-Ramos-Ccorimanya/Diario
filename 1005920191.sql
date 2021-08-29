-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-08-2021 a las 00:02:09
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `1005920191`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id_comentario` int(11) NOT NULL,
  `id_texto` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha_texto` datetime NOT NULL,
  `fecha_comentario` datetime NOT NULL,
  `texto` text NOT NULL,
  `titulo_texto` text NOT NULL,
  `nombre_usuario` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id_comentario`, `id_texto`, `id_usuario`, `fecha_texto`, `fecha_comentario`, `texto`, `titulo_texto`, `nombre_usuario`) VALUES
(0, 20, 20, '2021-08-24 20:41:00', '2021-08-24 20:41:00', 'comentario 1', 'nota 1', 'yemer');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_usuario`
--

CREATE TABLE `datos_usuario` (
  `id_usuario` int(11) NOT NULL,
  `fecha_introducion_datos` datetime NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `edad` int(11) NOT NULL,
  `ciudad` varchar(255) NOT NULL,
  `archivo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `datos_usuario`
--

INSERT INTO `datos_usuario` (`id_usuario`, `fecha_introducion_datos`, `nombre`, `apellido`, `edad`, `ciudad`, `archivo`) VALUES
(20, '2021-08-25 15:37:00', 'yemer', 'ramos', 21, 'Ocobamba', 'galeria/93857553_2518191665163963_2904152792727814144_n.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diario`
--

CREATE TABLE `diario` (
  `id_usuario` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `fechaalterna` date DEFAULT NULL,
  `texto` text NOT NULL,
  `condicion` varchar(255) NOT NULL,
  `autor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `diario`
--

INSERT INTO `diario` (`id_usuario`, `titulo`, `fecha`, `fechaalterna`, `texto`, `condicion`, `autor`) VALUES
(36, 'buen dia', '2021-07-12 12:36:00', '2021-07-12', 'Ahora procederemos a programar el método que registre un nuevo usuario, para ello  agregaremos las siguiente función en autenticació.service.ts', '', ''),
(20, 'nota 1', '2021-08-24 20:41:00', '2021-08-24', 'nota 1', 'publico', 'yemer'),
(20, 'nota  2', '2021-08-24 20:57:00', '2021-08-24', 'nota 2', 'publico', 'yemer');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reaccion`
--

CREATE TABLE `reaccion` (
  `id_reaccion` int(11) NOT NULL,
  `id_texto` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha_texto` datetime NOT NULL,
  `titulo_texto` text NOT NULL,
  `reaccion` text NOT NULL,
  `fecha_reaccion` datetime NOT NULL,
  `autor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario` varchar(200) NOT NULL,
  `contraseña` varchar(255) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario`, `contraseña`, `id_usuario`) VALUES
('yemer', '$2y$10$mFYPAhMwh2a/GX4z6Dmi3.9NNU944ufkA1UwJ6.uPx2kwqDa6Rljq', 20),
('luis', '$2y$10$RnKzwnk9VhLKttPI7Y0.qu5tiowjvBv1tygEuOCHEWeNcgkuZ0HyK', 36),
('lucho', '$2y$10$JAGYIYX.RbUJVkECkBeBmOFtCFVWYJcWDxjcryqIBUJFTL.TrtuIG', 39);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_texto` (`id_texto`);

--
-- Indices de la tabla `datos_usuario`
--
ALTER TABLE `datos_usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `diario`
--
ALTER TABLE `diario`
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `reaccion`
--
ALTER TABLE `reaccion`
  ADD PRIMARY KEY (`id_reaccion`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_texto` (`id_texto`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `reaccion`
--
ALTER TABLE `reaccion`
  MODIFY `id_reaccion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`id_texto`) REFERENCES `diario` (`id_usuario`);

--
-- Filtros para la tabla `datos_usuario`
--
ALTER TABLE `datos_usuario`
  ADD CONSTRAINT `datos_usuario_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `diario`
--
ALTER TABLE `diario`
  ADD CONSTRAINT `diario_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `reaccion`
--
ALTER TABLE `reaccion`
  ADD CONSTRAINT `reaccion_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `reaccion_ibfk_2` FOREIGN KEY (`id_texto`) REFERENCES `diario` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
