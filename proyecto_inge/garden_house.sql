-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-07-2022 a las 02:12:49
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `garden_house`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hortalizas`
--

CREATE TABLE `hortalizas` (
  `id` int(255) NOT NULL,
  `titulo` varchar(20) DEFAULT NULL,
  `foto` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `hortalizas`
--

INSERT INTO `hortalizas` (`id`, `titulo`, `foto`) VALUES
(1, 'Lechuga', 'imagenes/plantas/lechuga.jpg'),
(2, 'Chile habanero', 'imagenes/plantas/chile_habanero.jpg'),
(4, 'Tomates', 'imagenes/plantas/Tomates.jpg'),
(6, 'Cebolla', 'imagenes/plantas/cebolla.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nodo`
--

CREATE TABLE `nodo` (
  `idn` int(11) NOT NULL,
  `temp_a` decimal(10,0) DEFAULT 0,
  `humedad_t` decimal(4,0) DEFAULT 0,
  `humedad_am` decimal(10,0) DEFAULT 0,
  `nivel_a` decimal(4,0) DEFAULT 0,
  `Fecha` datetime DEFAULT NULL,
  `tipo_h` varchar(25) DEFAULT NULL,
  `idu` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `nodo`
--

INSERT INTO `nodo` (`idn`, `temp_a`, `humedad_t`, `humedad_am`, `nivel_a`, `Fecha`, `tipo_h`, `idu`) VALUES
(1, '45', '39', '26', '15', '2022-03-18 15:15:42', NULL, 1),
(3, '3', '2', '1', '5', '2022-03-18 15:16:11', NULL, NULL),
(4, '0', '0', '0', '0', '2022-03-18 15:16:20', NULL, NULL),
(7, '4', '4', '5', '6', '2022-07-16 22:09:24', 'Chile habanero', 1),
(12, '65', '12', '34', '45', NULL, 'Chile habanero', 1),
(13, '34', '25', '21', '20', NULL, 'Lechuga', 1),
(14, '25', '23', '2', '10', NULL, 'Lechuga', 3),
(15, '0', '0', '0', '0', NULL, 'Cebolla', 1),
(16, '0', '0', '0', '0', NULL, 'Cilantro', 1),
(17, '0', '0', '0', '0', NULL, 'Lechuga', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idus` int(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `numero` varchar(50) NOT NULL,
  `contra` varchar(50) NOT NULL,
  `tipo` int(2) DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idus`, `name`, `apellido`, `correo`, `numero`, `contra`, `tipo`) VALUES
(1, 'Jose', 'Carrillo', 'carrillovargasjoseluis@gmail.com', '9999293856', '123456', 1),
(3, 'Esteban', 'Novelo', 'noveloesteban@gmail.com', '9999094567', '12345', 2),
(4, 'Vladimir', 'Lopez', 'lopezvladimir@correo.com', '23123123', '1234', 2),
(14, 'Vladimir Jesus', 'López Kao', 'lopezkaovladimir@gmail.com', '9999034567', '12345', 2),
(16, 'Vladimir', 'lopez', 'vladi26@hotmail.com', '33', 'yo', 2),
(17, 'Vladimir', 'lopez', 'vladi26@hotmail.com', '33', 'yo', 2),
(18, 'Vladimir', 'lopez', 'vladi26@hotmail.com', '33', 'yo', 2),
(19, 'Vladimir', 'lopez', 'ff@hotmail.com', '2', '2', 2),
(20, 'g', 'g', 'g@hotmail.com', '3', 'w', 2),
(22, 'erick', 'oy', 'oy@hotmail.com', '2', 'oy', 2),
(23, 'vladii', 'kao', 'vladilk@hotmail.com', '111', 'yo123', 2),
(24, 'e', 'e', 'e', '1', '1', 2),
(25, 'si', 'si', 'si@hotmail.com', '1', 'si', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `hortalizas`
--
ALTER TABLE `hortalizas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `nodo`
--
ALTER TABLE `nodo`
  ADD PRIMARY KEY (`idn`),
  ADD UNIQUE KEY `idnodo_UNIQUE` (`idn`),
  ADD KEY `fk_nodo_usuarios_idx` (`idu`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idus`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `hortalizas`
--
ALTER TABLE `hortalizas`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `nodo`
--
ALTER TABLE `nodo`
  MODIFY `idn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idus` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `nodo`
--
ALTER TABLE `nodo`
  ADD CONSTRAINT `fk_nodo_usuarios` FOREIGN KEY (`idu`) REFERENCES `usuarios` (`idus`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
