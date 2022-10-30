-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-10-2022 a las 00:32:04
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `modulo_pago`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `prc_ListarPagos` ()  NO SQL
SELECT '' as detalle,
p.id,
e.ruc, 
e.razon_social,
e.rubro,
p.importe,
p.codigo_pago,
p.fecha_pago,
p.descripcion,
p.informe,
p.estatus,
'' as opcion
from pago p
join empresa e on e.id = p.id_empresa
ORDER BY p.id DESC$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id` int(11) NOT NULL,
  `ruc` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `razon_social` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `rubro` varchar(200) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id`, `ruc`, `razon_social`, `rubro`) VALUES
(1, '20545357921', 'Dies Ases SAC', 'Transporte de Pasajero'),
(2, '20545357921', 'Dies Ases SAC', 'Transporte de Pasajero'),
(3, '20545357921', 'Dies Ases SAC', 'Transporte de Pasajero'),
(4, '20123557921', 'Express', 'Transporte de Pasajero'),
(5, '20545357921', 'Dies Ases Expres SAC', 'Transporte de Pasajero'),
(6, '20545357921', 'Rutas DIez del Sur SAC', 'Transporte de Pasajero'),
(7, '20579548921', 'Milagritos EIRL', 'Transporte de Pasajero'),
(8, '20123567921', 'Señor de la Caña', 'Transporte de Pasajero'),
(9, '20962557921', 'Negreiros', 'Transporte de Pasajero'),
(10, '20537257921', 'Caopo RS', 'Transporte de Carga');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `id` int(11) NOT NULL,
  `codigo_pago` bigint(20) NOT NULL,
  `descripcion` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `importe` double(9,2) NOT NULL,
  `fecha_pago` datetime NOT NULL,
  `fecha_modificacion` datetime NOT NULL,
  `estatus` int(1) NOT NULL DEFAULT 1,
  `id_empresa` int(11) NOT NULL,
  `informe` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pago`
--

INSERT INTO `pago` (`id`, `codigo_pago`, `descripcion`, `importe`, `fecha_pago`, `fecha_modificacion`, `estatus`, `id_empresa`, `informe`) VALUES
(2, 98765432, 'Pago para habilitación de flota', 177.00, '2022-10-02 00:00:00', '0000-00-00 00:00:00', 1, 1, ''),
(3, 1234567890, 'Pago para habilitación de flota', 30.54, '2022-07-14 00:00:00', '0000-00-00 00:00:00', 1, 1, ''),
(4, 23456789, 'Pago para Baja de flota', 420.20, '2022-09-14 00:00:00', '0000-00-00 00:00:00', 1, 4, ''),
(5, 234567890, 'Pago para Incremento de flota', 30.54, '2022-08-24 00:00:00', '0000-00-00 00:00:00', 1, 6, ''),
(6, 234567890, 'Pago para Baja de flota', 30.54, '2022-10-02 00:00:00', '0000-00-00 00:00:00', 1, 9, ''),
(7, 234567890, 'Pago para Baja de flota', 30.54, '2022-10-02 00:00:00', '0000-00-00 00:00:00', 1, 3, ''),
(8, 203474581, 'Pago para habilitación de flota', 30.54, '2022-10-02 00:00:00', '0000-00-00 00:00:00', 1, 10, '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idempresa` (`id_empresa`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pago`
--
ALTER TABLE `pago`
  ADD CONSTRAINT `fk_idempresa` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
