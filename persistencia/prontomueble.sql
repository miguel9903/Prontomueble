-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-01-2020 a las 00:19:58
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prontomueble`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `idadministrador` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `clave` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`idadministrador`, `nombre`, `apellido`, `correo`, `clave`) VALUES
(1007135041, 'Miguel', 'Molina', '123@123.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idcliente` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `clave` varchar(45) DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL,
  `fecha_actualizacion` date DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idcliente`, `nombre`, `apellido`, `correo`, `clave`, `fecha_registro`, `fecha_actualizacion`, `telefono`, `estado`) VALUES
(123, 'Hector', 'Florez', 'hector@123.com', '202cb962ac59075b964b07152d234b70', '2019-07-22', '2020-01-18', '3112345667', 1),
(100713503, 'Lucia', 'Suarez', 'luci@123.com', '4604cb868b15d4b74be782c66d5a8185', '2019-07-22', '2019-07-22', '32076543332', 1),
(123343434, 'Ana', 'Perez', 'anap@123.com', '75b406e9c493efd2fc222838d69b2c4d', '2019-07-22', '2019-07-22', '31253434433', 1),
(965434586, 'Antonio', 'Garcia', 'antonio@123.com', '202cb962ac59075b964b07152d234b70', '2019-07-18', '2019-07-18', '3214567656', 1),
(1007135041, 'Andrea', 'Verass', 'andrea@123.com', 'd41d8cd98f00b204e9800998ecf8427e', '2019-07-17', '2019-07-18', '3203746545', 1),
(1007135632, 'Michael', 'Garzon', 'cliente@123.com', '202cb962ac59075b964b07152d234b70', '2019-07-22', '2019-07-22', '3112345443', 1),
(1008764222, 'Maria', 'Avellaneda', 'maria@123.com', '202cb962ac59075b964b07152d234b70', '2019-07-18', '2019-07-18', '3256456732', 1),
(2147483647, 'Octavio', 'Perez', 'octavio@123.com', '082d0b635921995bf53f7f5340ac9e90', '2019-07-22', '2019-07-22', '3112323445', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `color`
--

CREATE TABLE `color` (
  `idcolor` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `color`
--

INSERT INTO `color` (`idcolor`, `nombre`) VALUES
(1, 'Cerezo'),
(2, 'Negro'),
(3, 'Gris claro'),
(4, 'Mucali'),
(5, 'Nogal'),
(6, 'Blanco'),
(7, 'Rojo'),
(8, 'Verde'),
(9, 'Beige'),
(10, 'Azul'),
(11, 'Cafe'),
(12, 'Verde claro'),
(13, 'Azul claro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `iddetalle` int(11) NOT NULL,
  `mueble_idmueble` int(11) NOT NULL,
  `venta_idventa` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `subtotal` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle_venta`
--

INSERT INTO `detalle_venta` (`iddetalle`, `mueble_idmueble`, `venta_idventa`, `cantidad`, `precio`, `subtotal`) VALUES
(19, 8, 71, 2, 650000, '1300000'),
(20, 8, 72, 3, 650000, '1950000'),
(21, 9, 72, 1, 750000, '750000'),
(22, 8, 73, 3, 650000, '1950000'),
(23, 8, 73, 3, 650000, '1950000'),
(24, 8, 73, 2, 650000, '1300000'),
(25, 8, 74, 2, 650000, '1300000'),
(26, 9, 75, 5, 750000, '3750000'),
(27, 8, 76, 2, 650000, '1300000'),
(28, 8, 77, 1, 650000, '650000'),
(29, 8, 77, 1, 650000, '650000'),
(30, 8, 77, 1, 650000, '650000'),
(31, 8, 77, 1, 650000, '650000'),
(32, 9, 78, 1, 750000, '750000'),
(33, 10, 78, 1, 745000, '745000'),
(34, 8, 79, 2, 650000, '1300000'),
(35, 8, 80, 2, 650000, '1300000'),
(36, 9, 80, 3, 750000, '2250000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `idmarca` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`idmarca`, `nombre`) VALUES
(1, 'Muebles Rita'),
(2, 'Muebles San Jose'),
(3, 'Ikea'),
(4, 'Kori'),
(5, 'Mueblartec');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material`
--

CREATE TABLE `material` (
  `idmaterial` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `material`
--

INSERT INTO `material` (`idmaterial`, `nombre`) VALUES
(1, 'Madera de Cedro'),
(2, 'Madera de Abeto'),
(3, 'Madera de Caoba'),
(4, 'Madera de Abedul'),
(5, 'Plastico'),
(6, 'Aluminio'),
(7, 'Plastico blando');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mueble`
--

CREATE TABLE `mueble` (
  `idmueble` int(11) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `tipo_mueble_idtipo_mueble` int(11) NOT NULL,
  `material_idmaterial` int(11) NOT NULL,
  `medidas` varchar(45) DEFAULT NULL,
  `peso` varchar(20) NOT NULL,
  `color_idcolor` int(11) NOT NULL,
  `marca_idmarca` int(11) NOT NULL,
  `pais_idpais` int(11) NOT NULL,
  `precio_unitario` int(11) DEFAULT NULL,
  `existencias` int(11) DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL,
  `proveedor_idproveedor` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mueble`
--

INSERT INTO `mueble` (`idmueble`, `descripcion`, `tipo_mueble_idtipo_mueble`, `material_idmaterial`, `medidas`, `peso`, `color_idcolor`, `marca_idmarca`, `pais_idpais`, `precio_unitario`, `existencias`, `foto`, `proveedor_idproveedor`, `estado`) VALUES
(8, 'Silla de sala Kori color rojo', 48, 1, '120x120x120', '5kg', 7, 4, 1, 650000, 56, 'imagenes/1563751465.png', 2, 1),
(9, 'Cama doble  Kori color beige', 49, 4, '180x120x90', '15kg', 9, 4, 2, 750000, 26, 'imagenes/1563751681.jpg', 2, 1),
(10, 'Set de comedor Ikea 4 puestos color cafe', 48, 2, '120x120x190cms', '7kg', 11, 3, 2, 745000, 49, 'imagenes/1563798026.jpg', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE `pais` (
  `idpais` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`idpais`, `nombre`) VALUES
(1, 'Colombia'),
(2, 'Estados Unidos'),
(3, 'Francia'),
(4, 'Escocia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona_contacto`
--

CREATE TABLE `persona_contacto` (
  `idpersona_contacto` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `clave` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `proveedor_idproveedor` int(11) NOT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `persona_contacto`
--

INSERT INTO `persona_contacto` (`idpersona_contacto`, `nombre`, `apellido`, `correo`, `clave`, `telefono`, `proveedor_idproveedor`, `estado`) VALUES
(123, 'Humberto', 'Avila', 'prov2@123.com', '202cb962ac59075b964b07152d234b70', '3125466554', 1, 1),
(123, 'Jorge', 'Gomez', 'prov@123.com', '202cb962ac59075b964b07152d234b70', '3156756554', 3, 1),
(12345678, 'Juan', 'Ortega', 'juanortega@123.com', '202cb962ac59075b964b07152d234b70', '3125646578', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `idproveedor` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`idproveedor`, `nombre`, `direccion`, `correo`, `telefono`, `estado`) VALUES
(1, 'MUBLES LORENZO', 'Cra 30 # 12A-44', 'muebleslorenzao@123.com', '7335041', 1),
(2, 'MUEBLES FLORIDA', 'Cra 30 # 11A-12', 'mueblesflorida@123.com', '78876625', 1),
(3, 'MUEBLES PARAISO', 'Calle 89 # 11A-43', 'mueblesparaiso@123.com', '77654543', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_mueble`
--

CREATE TABLE `tipo_mueble` (
  `idtipo_mueble` int(11) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_mueble`
--

INSERT INTO `tipo_mueble` (`idtipo_mueble`, `descripcion`, `estado`) VALUES
(23, 'Muebles de Exteriores', 0),
(27, 'Muebles de Oficinas', 1),
(33, 'Muebles de Cocina', 1),
(37, 'Muebles para interiores', 1),
(38, 'Muebles de descansos', 0),
(47, 'Muebles de Hogar', 0),
(48, 'Muebles de sala', 1),
(49, 'Muebles de dormitorio', 1),
(50, 'Muebles de estudio', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vendedor`
--

CREATE TABLE `vendedor` (
  `idvendedor` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `clave` varchar(45) DEFAULT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `fecha_actualizacion` date NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vendedor`
--

INSERT INTO `vendedor` (`idvendedor`, `nombre`, `apellido`, `correo`, `clave`, `fecha_ingreso`, `fecha_actualizacion`, `telefono`, `estado`) VALUES
(1000377472, 'Carlos', 'Maya', 'vend2@123.com', '202cb962ac59075b964b07152d234b70', '2019-07-22', '2019-07-22', '3145434545', 1),
(1007345673, 'Mateo', 'Chaparro', 'vend@123.com', '202cb962ac59075b964b07152d234b70', '2019-07-17', '2019-07-14', '3125646553', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `idventa` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `total_venta` int(11) NOT NULL,
  `vendedor_idvendedor` int(11) NOT NULL,
  `cliente_idcliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`idventa`, `fecha`, `total_venta`, `vendedor_idvendedor`, `cliente_idcliente`) VALUES
(71, '2019-07-21', 1300000, 1007345673, 965434586),
(72, '2019-07-21', 2700000, 1007345673, 1007135041),
(73, '2019-07-21', 5200000, 1007345673, 1008764222),
(74, '2019-07-21', 1300000, 1007345673, 965434586),
(75, '2019-07-21', 3750000, 1007345673, 1007135041),
(76, '2019-07-21', 1300000, 1007345673, 965434586),
(77, '2019-07-21', 2600000, 1007345673, 965434586),
(78, '2019-07-22', 1495000, 1007345673, 123),
(79, '2019-07-22', 1300000, 1000377472, 123),
(80, '2019-07-22', 3550000, 1007345673, 123);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`idadministrador`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idcliente`);

--
-- Indices de la tabla `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`idcolor`);

--
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD PRIMARY KEY (`iddetalle`),
  ADD KEY `fk_mueble_has_venta_venta1_idx` (`venta_idventa`),
  ADD KEY `fk_mueble_has_venta_mueble1_idx` (`mueble_idmueble`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`idmarca`);

--
-- Indices de la tabla `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`idmaterial`);

--
-- Indices de la tabla `mueble`
--
ALTER TABLE `mueble`
  ADD PRIMARY KEY (`idmueble`,`tipo_mueble_idtipo_mueble`,`material_idmaterial`,`color_idcolor`,`marca_idmarca`,`pais_idpais`,`proveedor_idproveedor`),
  ADD KEY `fk_mueble_tipo_mueble1_idx` (`tipo_mueble_idtipo_mueble`),
  ADD KEY `fk_mueble_material1_idx` (`material_idmaterial`),
  ADD KEY `fk_mueble_color1_idx` (`color_idcolor`),
  ADD KEY `fk_mueble_marca1_idx` (`marca_idmarca`),
  ADD KEY `fk_mueble_pais1_idx` (`pais_idpais`),
  ADD KEY `fk_mueble_proveedor1_idx` (`proveedor_idproveedor`);

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`idpais`);

--
-- Indices de la tabla `persona_contacto`
--
ALTER TABLE `persona_contacto`
  ADD PRIMARY KEY (`idpersona_contacto`,`proveedor_idproveedor`),
  ADD KEY `fk_persona_contacto_proveedor1_idx` (`proveedor_idproveedor`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`idproveedor`);

--
-- Indices de la tabla `tipo_mueble`
--
ALTER TABLE `tipo_mueble`
  ADD PRIMARY KEY (`idtipo_mueble`);

--
-- Indices de la tabla `vendedor`
--
ALTER TABLE `vendedor`
  ADD PRIMARY KEY (`idvendedor`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`idventa`,`vendedor_idvendedor`,`cliente_idcliente`),
  ADD KEY `fk_venta_vendedor1_idx` (`vendedor_idvendedor`),
  ADD KEY `fk_venta_cliente1_idx` (`cliente_idcliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `idadministrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1007135042;

--
-- AUTO_INCREMENT de la tabla `color`
--
ALTER TABLE `color`
  MODIFY `idcolor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  MODIFY `iddetalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `idmarca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `material`
--
ALTER TABLE `material`
  MODIFY `idmaterial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `mueble`
--
ALTER TABLE `mueble`
  MODIFY `idmueble` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `pais`
--
ALTER TABLE `pais`
  MODIFY `idpais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `idproveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_mueble`
--
ALTER TABLE `tipo_mueble`
  MODIFY `idtipo_mueble` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `idventa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD CONSTRAINT `fk_mueble_has_venta_mueble1` FOREIGN KEY (`mueble_idmueble`) REFERENCES `mueble` (`idmueble`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_mueble_has_venta_venta1` FOREIGN KEY (`venta_idventa`) REFERENCES `venta` (`idventa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `mueble`
--
ALTER TABLE `mueble`
  ADD CONSTRAINT `fk_mueble_color1` FOREIGN KEY (`color_idcolor`) REFERENCES `color` (`idcolor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_mueble_marca1` FOREIGN KEY (`marca_idmarca`) REFERENCES `marca` (`idmarca`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_mueble_material1` FOREIGN KEY (`material_idmaterial`) REFERENCES `material` (`idmaterial`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_mueble_pais1` FOREIGN KEY (`pais_idpais`) REFERENCES `pais` (`idpais`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_mueble_proveedor1` FOREIGN KEY (`proveedor_idproveedor`) REFERENCES `proveedor` (`idproveedor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_mueble_tipo_mueble1` FOREIGN KEY (`tipo_mueble_idtipo_mueble`) REFERENCES `tipo_mueble` (`idtipo_mueble`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `persona_contacto`
--
ALTER TABLE `persona_contacto`
  ADD CONSTRAINT `fk_persona_contacto_proveedor1` FOREIGN KEY (`proveedor_idproveedor`) REFERENCES `proveedor` (`idproveedor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `fk_venta_cliente1` FOREIGN KEY (`cliente_idcliente`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_venta_vendedor1` FOREIGN KEY (`vendedor_idvendedor`) REFERENCES `vendedor` (`idvendedor`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
