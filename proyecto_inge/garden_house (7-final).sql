-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-12-2022 a las 22:14:54
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
(12, 'chile', 'imagenes/plantas/chile.jpg'),
(13, 'Romana', 'imagenes/plantaslechuga-romana.png');

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
  `apikey` varchar(200) CHARACTER SET utf8mb4 DEFAULT 'sin asignar'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `nodo`
--

INSERT INTO `nodo` (`idn`, `luz`, `humedad_t`, `humedad_am`, `nivel_a`, `Fecha`, `tipo_h`, `idu`, `apikey`) VALUES
(47, '1', '1', '1', '1', '2022-11-29 12:33:01', 'Lechuga', 1, 'OLLBCAGONPPNAHL'),
(48, '1', '1', '2', '1', '2022-11-29 12:33:21', 'Lechuga', 1, 'OLLBCAGONPPNAHL'),
(49, '1', '7', '9', '10', '2022-12-02 15:17:53', 'Lechuga', 1, 'OLLBCAGONPPNAHL'),
(50, '0', '10', '3', '10', '2022-12-02 15:21:20', 'Lechuga', 2, 'AHNJELPFHECNEKH'),
(53, '1', '8', '4', '10', '2022-12-04 11:37:38', 'Tomates', 1, 'HBDIHHAIPIGPCJB'),
(54, '1', '10', '5', '8', '2022-12-04 12:27:09', 'Lechuga', 32, 'FIFCLFPPOBHHMBJ'),
(55, '1', '8', '5', '8', '2022-12-04 12:27:27', 'Lechuga', 32, 'FIFCLFPPOBHHMBJ'),
(58, '1', '1', '1', '1', '2022-12-05 01:39:55', 'Lechuga', 1, 'FIFCLFPPOBHHMBJ'),
(60, '50', '30', '40', '1', '2022-12-05 14:06:38', 'Lechuga', 1, 'OLLBCAGONPPNAHL'),
(61, '30', '10', '7', '30', NULL, 'Romana', 1, 'KEIGCBCOOAKEMGD'),
(62, '0', '0', '0', '0', NULL, 'Cebolla', 35, 'sin asignar'),
(63, '0', '0', '0', '0', NULL, 'Lechuga', 1, 'sin asignar');

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
(1, 'Jose', 'carrillo', 'carrillovargasjoseluis@gmail.com', '12345', '123456', 1, 2, 'e'),
(2, 'Vladimir', 'Kao', 'vladilk@hotmail.com', '99991', 'vladi', 2, 2, 'RQSKBJUTFNMLKQEKNJGB'),
(3, 'prueba', 'prueba', 'prueba@gmail.com', '99991', 'prueba', 1, 2, 'RBPIAFPFOIGFNMGBRCLB'),
(32, 'uno', 'uno', 'uno@hotmail.com', '1', 'uno', 2, 2, 'sin asignar'),
(33, 'erick', 'oy', 'oy@gmail.com', '999923', 'erick123', 2, 2, 'sin asignar'),
(35, 'Juan', 'can', 'juan@can.com', '12', 'juan', 2, 2, 'sin asignar');

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
  ADD KEY `apikey` (`apikey`);

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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `nodo`
--
ALTER TABLE `nodo`
  MODIFY `idn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idus` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

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
