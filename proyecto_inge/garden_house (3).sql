-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-11-2022 a las 10:25:06
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
(6, 'Cebolla', 'imagenes/plantas/cebolla.jpg'),
(11, 'cilantro', 'imagenes/plantas/cilantro.jpg'),
(12, 'chile', 'imagenes/plantas/chile.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nodo`
--

CREATE TABLE `nodo` (
  `idn` int(11) NOT NULL,
  `luz` decimal(10,0) DEFAULT 0,
  `humedad_t` decimal(4,0) DEFAULT 0,
  `humedad_am` decimal(10,0) DEFAULT 0,
  `nivel_a` decimal(4,0) DEFAULT 0,
  `Fecha` datetime DEFAULT NULL,
  `tipo_h` varchar(25) DEFAULT NULL,
  `idu` int(255) DEFAULT NULL,
  `fk_apikey` varchar(200) CHARACTER SET utf8mb4 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `nodo`
--

INSERT INTO `nodo` (`idn`, `luz`, `humedad_t`, `humedad_am`, `nivel_a`, `Fecha`, `tipo_h`, `idu`, `fk_apikey`) VALUES
(23, '1', '1', '1', '1', '2022-11-27 23:13:56', NULL, NULL, NULL),
(24, '1', '1', '1', '1', '2022-11-27 23:15:32', NULL, NULL, NULL),
(25, '2', '1', '1', '2', '2022-11-27 23:43:02', NULL, NULL, NULL),
(26, '1', '1', '1', '1', '2022-11-27 23:43:46', NULL, NULL, NULL),
(28, '1', '1', '1', '1', '2022-11-28 11:09:42', NULL, NULL, NULL),
(36, '0', '0', '0', '0', NULL, 'Lechuga', 29, NULL);

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
  `tipo` int(2) DEFAULT 2,
  `api` int(2) DEFAULT 2,
  `apikey` varchar(200) NOT NULL DEFAULT 'sin asignar'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idus`, `name`, `apellido`, `correo`, `numero`, `contra`, `tipo`, `api`, `apikey`) VALUES
(29, 'Jose', 'carrillo', 'carrillovargasjoseluis@gmail.com', '12345', '123456', 1, 2, 'ESCISLOKQFCIMENHJHBE');

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
  ADD KEY `fk_nodo_usuarios_idx` (`idu`),
  ADD KEY `apikey` (`fk_apikey`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idus`),
  ADD KEY `apikey` (`apikey`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `hortalizas`
--
ALTER TABLE `hortalizas`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `nodo`
--
ALTER TABLE `nodo`
  MODIFY `idn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idus` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

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
