-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-12-2020 a las 05:15:38
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `intelcost_bienes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `city` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cities`
--

INSERT INTO `cities` (`id`, `city`) VALUES
(1, 'New York'),
(2, 'Orlando'),
(3, 'Los Angeles'),
(4, 'Houston'),
(5, 'Washington'),
(6, 'Miami');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `goods`
--

CREATE TABLE `goods` (
  `id` int(11) NOT NULL,
  `address` varchar(50) NOT NULL,
  `id_city` int(11) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `postal_code` varchar(50) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `price` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `goods`
--

INSERT INTO `goods` (`id`, `address`, `id_city`, `phone`, `postal_code`, `id_tipo`, `price`) VALUES
(1, 'Ap #549-7395 Ut Rd', 1, '3340520954', '85328', 1, '30746'),
(2, 'P.O. Box 657, 9831 Cursus St', 2, '4884415521', '04436', 2, '71045'),
(3, 'Ap #325-2507 Quisque Av.', 3, '6238072869', '89804', 2, '36087');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `my_goods`
--

CREATE TABLE `my_goods` (
  `id` int(11) NOT NULL,
  `id_good` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `type_of_houses`
--

CREATE TABLE `type_of_houses` (
  `id` int(11) NOT NULL,
  `house` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `type_of_houses`
--

INSERT INTO `type_of_houses` (`id`, `house`) VALUES
(1, 'Casa'),
(2, 'Casa de Campo'),
(3, 'Apartamento');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `my_goods`
--
ALTER TABLE `my_goods`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `type_of_houses`
--
ALTER TABLE `type_of_houses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `my_goods`
--
ALTER TABLE `my_goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `type_of_houses`
--
ALTER TABLE `type_of_houses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
