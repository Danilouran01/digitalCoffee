-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-11-2022 a las 16:15:57
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `digital_coffee`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbladministrador`
--

CREATE TABLE `tbladministrador` (
  `idadministrador` int(11) NOT NULL,
  `PASSWOR` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `clave_confirmacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbladministrador`
--

INSERT INTO `tbladministrador` (`idadministrador`, `PASSWOR`, `nombre`, `telefono`, `clave_confirmacion`) VALUES
(12345, '12345', 'Danilo', '3216549', 1234);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblaplicacion`
--

CREATE TABLE `tblaplicacion` (
  `idaplicacion` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `unidad_de_medida` varchar(40) DEFAULT NULL,
  `idinsumo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblaplicacion`
--

INSERT INTO `tblaplicacion` (`idaplicacion`, `cantidad`, `unidad_de_medida`, `idinsumo`) VALUES
(1, 3, NULL, 1),
(2, 5, NULL, 5),
(3, 9, NULL, 4),
(4, 1, NULL, 1),
(5, 7, NULL, 3),
(6, 5, 'l', 2),
(7, 5, 'l', 2),
(8, 50, 'gr', 1),
(9, 1000, 'L', 2),
(10, 78, 'kl', 2),
(11, 78, 'kl', 2),
(12, 78, 'kl', 2),
(13, 78, 'kl', 2),
(14, 78, 'kl', 2),
(15, 700, 'ml', 2),
(16, 2888, 'gr', 2),
(17, 198, 'ml', 1),
(18, 2000, 'L', 2),
(19, 2000, 'L', 1),
(20, 2000, 'L', 1),
(21, 1000, 'ml', 2),
(22, 2000, 'ml', 2),
(23, 100, 'ml', 2),
(24, 100, 'ml', 2),
(25, 100, 'ml', 2),
(26, 88, 'ml', 2),
(27, 88, 'ml', 2),
(28, 88, 'ml', 2),
(29, 34, 'mg', 2),
(30, 56, 'cm', 3),
(31, 45, 'ml', 2),
(32, 500, 'gr', 1),
(33, 500, 'ml', 4),
(34, 12, 'L', 2),
(35, 45, 'mg', 1),
(36, 10, 'cm', 1),
(37, 12, 'L', 1),
(38, 90, 'kl', 1),
(39, 90, 'cm', 1),
(40, 12, 'L', 2),
(41, 15, 'kl', 4),
(42, 100, 'mg', 2),
(43, 100, 'cm', 2),
(44, 100, 'cm', 2),
(45, 778, 'ml', 4),
(46, 90, 'mg', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcompra_de_insumo`
--

CREATE TABLE `tblcompra_de_insumo` (
  `idcompra` int(11) NOT NULL,
  `precio` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `idinsumo` int(11) NOT NULL,
  `idadministrador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblcompra_de_insumo`
--

INSERT INTO `tblcompra_de_insumo` (`idcompra`, `precio`, `cantidad`, `fecha`, `idinsumo`, `idadministrador`) VALUES
(2, 450000, 24, '2022-10-11', 1, 12345),
(3, 459000, 32, '2022-08-01', 1, 12345),
(59, 40000, 3, '2022-09-27', 2, 12345),
(60, 4545454, 50, '2022-10-19', 2, 12345),
(61, 4545454, 50, '2022-10-19', 2, 12345),
(62, 500000000, 8562, '2022-10-13', 1, 12345),
(67, 84521, 6, '2022-11-10', 5, 12345);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblinsumo`
--

CREATE TABLE `tblinsumo` (
  `idinsumo` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblinsumo`
--

INSERT INTO `tblinsumo` (`idinsumo`, `nombre`) VALUES
(1, 'abono'),
(2, 'matamaleza'),
(3, 'plagicidas'),
(4, 'fungicida'),
(5, 'herbicida');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbljornada`
--

CREATE TABLE `tbljornada` (
  `idjornada` int(11) NOT NULL,
  `tipojornada` float NOT NULL,
  `Descripcion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbljornada`
--

INSERT INTO `tbljornada` (`idjornada`, `tipojornada`, `Descripcion`) VALUES
(0, 0, 'No aplica'),
(1, 1, 'Jornada completa'),
(2, 0.5, 'Media jornada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbllote`
--

CREATE TABLE `tbllote` (
  `idlote` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `cantidad_arboles` int(11) NOT NULL,
  `estado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbllote`
--

INSERT INTO `tbllote` (`idlote`, `nombre`, `cantidad_arboles`, `estado`) VALUES
(1, 'guayabo', 3000, 'soca'),
(2, 'aguacate', 9000, 'produccion'),
(3, 'naranjo', 4300, 'produccion'),
(4, 'cruz', 5500, 'produccion'),
(5, 'rancho', 6000, 'produccion'),
(7, 'la loma', 5000, 'crecimiento'),
(12, 'concordia', 5000, 'crecimiento');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblprecio`
--

CREATE TABLE `tblprecio` (
  `cod_precio` int(11) NOT NULL,
  `precio` float NOT NULL,
  `fecha` date NOT NULL,
  `id_tipotrabajo` int(11) NOT NULL,
  `fecha_fin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblprecio`
--

INSERT INTO `tblprecio` (`cod_precio`, `precio`, `fecha`, `id_tipotrabajo`, `fecha_fin`) VALUES
(25, 45000, '2022-10-01', 2, '2022-10-11'),
(26, 50000, '2022-10-11', 2, '2022-10-23'),
(27, 60000, '2022-10-23', 2, '0000-00-00'),
(29, 600, '2022-10-21', 11, '2022-10-24'),
(30, 700, '2022-10-24', 11, '2022-10-30'),
(31, 800, '2022-10-30', 11, '0000-00-00'),
(32, 58000, '2022-10-27', 7, '2022-11-08'),
(33, 100000, '2022-10-27', 19, '0000-00-00'),
(34, 50000, '2022-11-08', 7, '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbltipotrabajo`
--

CREATE TABLE `tbltipotrabajo` (
  `idtipotrabajo` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `Requiere_insumo` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbltipotrabajo`
--

INSERT INTO `tbltipotrabajo` (`idtipotrabajo`, `descripcion`, `Requiere_insumo`) VALUES
(1, 'deshierbar', 0),
(2, 'fumigar', 1),
(6, 'deshojar', 0),
(7, 'abonar', 1),
(8, 'platear', 0),
(11, 'recolectar', 2),
(12, 'platear', 0),
(13, 'hola', 0),
(19, 'guadañar', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbltrabajador`
--

CREATE TABLE `tbltrabajador` (
  `idtrabajador` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbltrabajador`
--

INSERT INTO `tbltrabajador` (`idtrabajador`, `nombre`, `telefono`) VALUES
(12345, 'valeria', '3215784975'),
(66809, 'María Martinez', '3115489234'),
(779654, 'yasmin', '3215487985'),
(12874584, 'Santiago Carvajal', '31225489452'),
(567567567, 'veronica', '5656456'),
(779654566, 'Santiago', '434324234'),
(2147483647, 'Juan Bermudez', '3224965789');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbltrabajadorxtrabajo`
--

CREATE TABLE `tbltrabajadorxtrabajo` (
  `idtrabajadorxtrabajo` int(11) NOT NULL,
  `idtrabajo` int(11) NOT NULL,
  `idtrabajador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbltrabajadorxtrabajo`
--

INSERT INTO `tbltrabajadorxtrabajo` (`idtrabajadorxtrabajo`, `idtrabajo`, `idtrabajador`) VALUES
(107, 183, 66809),
(108, 184, 66809),
(109, 185, 779654566),
(110, 186, 779654566),
(111, 187, 779654566),
(113, 189, 779654),
(114, 190, 779654),
(115, 191, 779654),
(116, 192, 779654);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbltrabajo`
--

CREATE TABLE `tbltrabajo` (
  `idtrabajo` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `cantidad_kilos` int(11) DEFAULT NULL,
  `idlote` int(11) NOT NULL,
  `idtipotrabajo` int(11) NOT NULL,
  `idjornada` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbltrabajo`
--

INSERT INTO `tbltrabajo` (`idtrabajo`, `fecha`, `cantidad_kilos`, `idlote`, `idtipotrabajo`, `idjornada`) VALUES
(179, '2022-10-10', 0, 5, 2, 1),
(180, '2022-10-13', 0, 5, 2, 1),
(181, '2022-11-01', 0, 5, 2, 1),
(182, '2022-10-22', 100, 3, 11, 0),
(183, '2022-10-26', 108, 3, 11, 0),
(184, '2022-11-01', 30, 7, 11, 0),
(185, '2022-10-26', 0, 2, 2, 1),
(186, '2022-10-28', 0, 2, 7, 1),
(187, '2022-10-28', 0, 3, 19, 1),
(188, '2022-10-29', 0, 2, 19, 1),
(189, '2022-10-30', 0, 1, 8, 1),
(190, '2022-10-31', 0, 4, 8, 1),
(191, '2022-11-01', 0, 7, 19, 2),
(192, '2022-11-03', 0, 4, 19, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbltrabajo_aplicacion`
--

CREATE TABLE `tbltrabajo_aplicacion` (
  `idaplicacion` int(11) NOT NULL,
  `idtrabajo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbltrabajo_aplicacion`
--

INSERT INTO `tbltrabajo_aplicacion` (`idaplicacion`, `idtrabajo`) VALUES
(42, 179),
(43, 180),
(44, 181),
(45, 185),
(46, 186);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblventa`
--

CREATE TABLE `tblventa` (
  `num_venta` int(11) NOT NULL,
  `cantidad_kilos` int(11) NOT NULL,
  `precio` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `idadministrador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblventa`
--

INSERT INTO `tblventa` (`num_venta`, `cantidad_kilos`, `precio`, `fecha`, `idadministrador`) VALUES
(1241, 21, 500000, '2022-10-04', 12345),
(1242, 23, 56000000, '2022-10-20', 12345),
(1244, 12, 1223444, '2022-10-05', 12345),
(1245, 1236, 123455, '2022-10-13', 12345),
(1246, 6987524, 0, '0000-00-00', 12345),
(1247, 899, 452193009, '2022-10-12', 12345),
(1248, 12, 74521, '2022-10-21', 12345),
(1249, 15, 10000, '2022-11-08', 12345);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbladministrador`
--
ALTER TABLE `tbladministrador`
  ADD PRIMARY KEY (`idadministrador`);

--
-- Indices de la tabla `tblaplicacion`
--
ALTER TABLE `tblaplicacion`
  ADD PRIMARY KEY (`idaplicacion`),
  ADD KEY `tblaplicacion_ibfk_1` (`idinsumo`);

--
-- Indices de la tabla `tblcompra_de_insumo`
--
ALTER TABLE `tblcompra_de_insumo`
  ADD PRIMARY KEY (`idcompra`),
  ADD KEY `tblcompra_de_insumo_ibfk_1` (`idadministrador`),
  ADD KEY `tblcompra_de_insumo_ibfk_2` (`idinsumo`);

--
-- Indices de la tabla `tblinsumo`
--
ALTER TABLE `tblinsumo`
  ADD PRIMARY KEY (`idinsumo`);

--
-- Indices de la tabla `tbljornada`
--
ALTER TABLE `tbljornada`
  ADD PRIMARY KEY (`idjornada`);

--
-- Indices de la tabla `tbllote`
--
ALTER TABLE `tbllote`
  ADD PRIMARY KEY (`idlote`);

--
-- Indices de la tabla `tblprecio`
--
ALTER TABLE `tblprecio`
  ADD PRIMARY KEY (`cod_precio`),
  ADD KEY `id_tipotrabajo` (`id_tipotrabajo`);

--
-- Indices de la tabla `tbltipotrabajo`
--
ALTER TABLE `tbltipotrabajo`
  ADD PRIMARY KEY (`idtipotrabajo`);

--
-- Indices de la tabla `tbltrabajador`
--
ALTER TABLE `tbltrabajador`
  ADD PRIMARY KEY (`idtrabajador`);

--
-- Indices de la tabla `tbltrabajadorxtrabajo`
--
ALTER TABLE `tbltrabajadorxtrabajo`
  ADD PRIMARY KEY (`idtrabajadorxtrabajo`),
  ADD KEY `tbltrabajadorxtrabajo_ibfk_2` (`idtrabajador`),
  ADD KEY `tbltrabajadorxtrabajo_ibfk_3` (`idtrabajo`);

--
-- Indices de la tabla `tbltrabajo`
--
ALTER TABLE `tbltrabajo`
  ADD PRIMARY KEY (`idtrabajo`),
  ADD KEY `tbltrabajo_ibfk_3` (`idjornada`),
  ADD KEY `tbltrabajo_ibfk_4` (`idtipotrabajo`),
  ADD KEY `tbltrabajo_ibfk_5` (`idlote`);

--
-- Indices de la tabla `tbltrabajo_aplicacion`
--
ALTER TABLE `tbltrabajo_aplicacion`
  ADD PRIMARY KEY (`idaplicacion`,`idtrabajo`),
  ADD KEY `idtrabajo` (`idtrabajo`);

--
-- Indices de la tabla `tblventa`
--
ALTER TABLE `tblventa`
  ADD PRIMARY KEY (`num_venta`),
  ADD KEY `tblventa_ibfk_1` (`idadministrador`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tblaplicacion`
--
ALTER TABLE `tblaplicacion`
  MODIFY `idaplicacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `tblcompra_de_insumo`
--
ALTER TABLE `tblcompra_de_insumo`
  MODIFY `idcompra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT de la tabla `tblinsumo`
--
ALTER TABLE `tblinsumo`
  MODIFY `idinsumo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tbllote`
--
ALTER TABLE `tbllote`
  MODIFY `idlote` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `tblprecio`
--
ALTER TABLE `tblprecio`
  MODIFY `cod_precio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `tbltipotrabajo`
--
ALTER TABLE `tbltipotrabajo`
  MODIFY `idtipotrabajo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `tbltrabajadorxtrabajo`
--
ALTER TABLE `tbltrabajadorxtrabajo`
  MODIFY `idtrabajadorxtrabajo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT de la tabla `tbltrabajo`
--
ALTER TABLE `tbltrabajo`
  MODIFY `idtrabajo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;

--
-- AUTO_INCREMENT de la tabla `tblventa`
--
ALTER TABLE `tblventa`
  MODIFY `num_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1250;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tblaplicacion`
--
ALTER TABLE `tblaplicacion`
  ADD CONSTRAINT `tblaplicacion_ibfk_1` FOREIGN KEY (`idinsumo`) REFERENCES `tblinsumo` (`idinsumo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tblcompra_de_insumo`
--
ALTER TABLE `tblcompra_de_insumo`
  ADD CONSTRAINT `tblcompra_de_insumo_ibfk_1` FOREIGN KEY (`idadministrador`) REFERENCES `tbladministrador` (`idadministrador`) ON DELETE CASCADE,
  ADD CONSTRAINT `tblcompra_de_insumo_ibfk_2` FOREIGN KEY (`idinsumo`) REFERENCES `tblinsumo` (`idinsumo`) ON DELETE CASCADE;

--
-- Filtros para la tabla `tblprecio`
--
ALTER TABLE `tblprecio`
  ADD CONSTRAINT `tblprecio_ibfk_1` FOREIGN KEY (`id_tipotrabajo`) REFERENCES `tbltipotrabajo` (`idtipotrabajo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbltrabajadorxtrabajo`
--
ALTER TABLE `tbltrabajadorxtrabajo`
  ADD CONSTRAINT `tbltrabajadorxtrabajo_ibfk_2` FOREIGN KEY (`idtrabajador`) REFERENCES `tbltrabajador` (`idtrabajador`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbltrabajadorxtrabajo_ibfk_3` FOREIGN KEY (`idtrabajo`) REFERENCES `tbltrabajo` (`idtrabajo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbltrabajo`
--
ALTER TABLE `tbltrabajo`
  ADD CONSTRAINT `tbltrabajo_ibfk_3` FOREIGN KEY (`idjornada`) REFERENCES `tbljornada` (`idjornada`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbltrabajo_ibfk_4` FOREIGN KEY (`idtipotrabajo`) REFERENCES `tbltipotrabajo` (`idtipotrabajo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbltrabajo_ibfk_5` FOREIGN KEY (`idlote`) REFERENCES `tbllote` (`idlote`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbltrabajo_aplicacion`
--
ALTER TABLE `tbltrabajo_aplicacion`
  ADD CONSTRAINT `tbltrabajo_aplicacion_ibfk_1` FOREIGN KEY (`idtrabajo`) REFERENCES `tbltrabajo` (`idtrabajo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbltrabajo_aplicacion_ibfk_2` FOREIGN KEY (`idaplicacion`) REFERENCES `tblaplicacion` (`idaplicacion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tblventa`
--
ALTER TABLE `tblventa`
  ADD CONSTRAINT `tblventa_ibfk_1` FOREIGN KEY (`idadministrador`) REFERENCES `tbladministrador` (`idadministrador`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
