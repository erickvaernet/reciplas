-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 27-11-2021 a las 15:35:53
-- Versión del servidor: 5.7.30-0ubuntu0.18.04.1-log
-- Versión de PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mydb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Articulo`
--

CREATE TABLE `Articulo` (
  `idArt` int(11) NOT NULL,
  `Descripcion` varchar(45) DEFAULT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Precio_Venta` decimal(10,0) DEFAULT NULL,
  `Precio_Compra` decimal(10,0) DEFAULT NULL,
  `Stock` varchar(45) NOT NULL,
  `Stock_minimo` varchar(45) DEFAULT NULL,
  `Activo` tinyint(1) DEFAULT NULL,
  `Unidad_Medida_idUnidad_Medida` int(11) NOT NULL,
  `Sector_Deposito_idSector_Deposito` int(11) DEFAULT NULL,
  `Tipo_idTipo` int(11) NOT NULL,
  `Categoria_idCategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Articulo`
--

INSERT INTO `Articulo` (`idArt`, `Descripcion`, `Nombre`, `Precio_Venta`, `Precio_Compra`, `Stock`, `Stock_minimo`, `Activo`, `Unidad_Medida_idUnidad_Medida`, `Sector_Deposito_idSector_Deposito`, `Tipo_idTipo`, `Categoria_idCategoria`) VALUES
(1, 'Envase reciclable', 'Envase R', '20', '10', '1000', '100', 1, 2, 2, 2, 3),
(2, 'Envase reciclable tipo 2', 'Envase R2', '20', NULL, '1000', '100', 1, 2, 2, 2, 3),
(3, 'Mueble a partir de material reciclado', 'Mueble-R1', NULL, '3000', '80', NULL, 1, 2, 2, 2, 2),
(4, 'Mueble a partir de material reciclado2', 'Mueble R2', '3000', NULL, '80', NULL, 1, 2, 2, 2, 2),
(6, 'Plastico reciclable de tipo 1', 'Plastico reciclable t1', NULL, '10', '3420', NULL, 1, 2, 1, 1, 4),
(7, 'Mueble a partir de material reciclado2', 'Plastico reciclable t2', NULL, '15', '2510', NULL, 1, 2, 1, 1, 4),
(8, 'Plastico reciclable de tipo 3', 'Plastico reciclable t3', NULL, '5', '10', NULL, 1, 3, 1, 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Categoria`
--

CREATE TABLE `Categoria` (
  `idCategoria` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Descripcion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Categoria`
--

INSERT INTO `Categoria` (`idCategoria`, `Nombre`, `Descripcion`) VALUES
(1, 'pellets-r', 'Pellets provenientes de material reciclado'),
(2, 'Muebles', 'Muebles de madera reciclada'),
(3, 'Envases', 'Envases hechos a partir de plastico reciclado'),
(4, 'Reciclables', 'Todo material reciclable');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Cliente`
--

CREATE TABLE `Cliente` (
  `Persona_id_persona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Cliente`
--

INSERT INTO `Cliente` (`Persona_id_persona`) VALUES
(1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Estado_Orden_Compra`
--

CREATE TABLE `Estado_Orden_Compra` (
  `Orden_Compra_idOrden_Compra` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Estado_pedido`
--

CREATE TABLE `Estado_pedido` (
  `idEstado_pedido` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Estado_pedido`
--

INSERT INTO `Estado_pedido` (`idEstado_pedido`, `Nombre`) VALUES
(1, 'Pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Factura`
--

CREATE TABLE `Factura` (
  `idFactura` int(11) NOT NULL,
  `Fecha_factura` varchar(45) DEFAULT NULL,
  `Usuario_idUsuario` int(11) NOT NULL,
  `Pedido_Num-pedido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Linea_OC`
--

CREATE TABLE `Linea_OC` (
  `Orden_Compra_idOrden_Compra` int(11) NOT NULL,
  `Articulo_idArt` int(11) NOT NULL,
  `Precio_Unitario` decimal(10,0) DEFAULT NULL,
  `Cantidad` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Linea_Pedido`
--

CREATE TABLE `Linea_Pedido` (
  `Precio_Unitario` decimal(10,0) NOT NULL,
  `Cantidad` varchar(45) DEFAULT NULL,
  `Pedido_Nro` int(11) NOT NULL,
  `Articulo_idArt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Linea_Pedido`
--

INSERT INTO `Linea_Pedido` (`Precio_Unitario`, `Cantidad`, `Pedido_Nro`, `Articulo_idArt`) VALUES
('20', '3', 8, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Orden_Compra`
--

CREATE TABLE `Orden_Compra` (
  `idOrden_Compra` int(11) NOT NULL,
  `Fecha_pago` varchar(45) DEFAULT NULL,
  `Fecha_Compromiso` varchar(45) DEFAULT NULL,
  `Proveedor_Persona_id_persona` int(11) NOT NULL,
  `Crea_Id_Usuario` int(11) NOT NULL,
  `Abona_ID_Usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Pedido`
--

CREATE TABLE `Pedido` (
  `Num_pedido` int(11) NOT NULL,
  `Fecha_entrega` varchar(15) DEFAULT NULL,
  `Descripcion` varchar(45) DEFAULT NULL,
  `Estado_pedido_idEstado_pedido` int(11) NOT NULL,
  `Cliente_Persona_id_persona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Pedido`
--

INSERT INTO `Pedido` (`Num_pedido`, `Fecha_entrega`, `Descripcion`, `Estado_pedido_idEstado_pedido`, `Cliente_Persona_id_persona`) VALUES
(7, '2021-11-30', 'M T Alvear 335', 1, 1),
(8, '2021-11-30', 'M T Alvear 335', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Persona`
--

CREATE TABLE `Persona` (
  `id_persona` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Apellido` varchar(45) DEFAULT NULL,
  `Nro_Documento` int(11) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `Direccion` varchar(45) DEFAULT NULL,
  `Telefono` varchar(15) DEFAULT NULL,
  `Activo` tinyint(1) DEFAULT NULL,
  `Tipo_Doc_idTipo_Doc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Persona`
--

INSERT INTO `Persona` (`id_persona`, `Nombre`, `Apellido`, `Nro_Documento`, `email`, `Direccion`, `Telefono`, `Activo`, `Tipo_Doc_idTipo_Doc`) VALUES
(1, 'Erick', 'Vaernet', 38964789, 'erick@gmail.com', 'M T de Alvear 335', '3624543465', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Proveedor`
--

CREATE TABLE `Proveedor` (
  `Persona_id_persona` int(11) NOT NULL,
  `Vende` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Remito`
--

CREATE TABLE `Remito` (
  `idRemito` int(11) NOT NULL,
  `Orden_Compra_idOrden_Compra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Sector`
--

CREATE TABLE `Sector` (
  `idSector` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Sector`
--

INSERT INTO `Sector` (`idSector`, `Nombre`) VALUES
(1, 'Directorio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Sector_Deposito`
--

CREATE TABLE `Sector_Deposito` (
  `idSector_Deposito` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Sector_Deposito`
--

INSERT INTO `Sector_Deposito` (`idSector_Deposito`, `Nombre`) VALUES
(1, 'materia prima'),
(2, 'producto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Tipo`
--

CREATE TABLE `Tipo` (
  `idTipo` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Tipo`
--

INSERT INTO `Tipo` (`idTipo`, `Nombre`) VALUES
(1, 'materia prima'),
(2, 'producto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Tipo_Doc`
--

CREATE TABLE `Tipo_Doc` (
  `idTipo_Doc` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Tipo_Doc`
--

INSERT INTO `Tipo_Doc` (`idTipo_Doc`, `Nombre`) VALUES
(1, 'DNI');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Unidad_Medida`
--

CREATE TABLE `Unidad_Medida` (
  `idUnidad_Medida` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Unidad_Medida`
--

INSERT INTO `Unidad_Medida` (`idUnidad_Medida`, `Nombre`) VALUES
(1, 'kilogramos'),
(2, 'Unidades'),
(3, 'Toneladas'),
(4, 'Gramos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuario`
--

CREATE TABLE `Usuario` (
  `idUsuario` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Apellido` varchar(45) DEFAULT NULL,
  `Password` varchar(45) NOT NULL,
  `Nom_usuario` varchar(45) DEFAULT NULL,
  `Sector_idSector` int(11) NOT NULL,
  `Fecha_registro` date DEFAULT NULL,
  `Id_Administrador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Usuario`
--

INSERT INTO `Usuario` (`idUsuario`, `Nombre`, `Apellido`, `Password`, `Nom_usuario`, `Sector_idSector`, `Fecha_registro`, `Id_Administrador`) VALUES
(1, 'Lionel', ' Messi', 'e10adc3949ba59abbe56e057f20f883e', 'admin', 1, NULL, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Articulo`
--
ALTER TABLE `Articulo`
  ADD PRIMARY KEY (`idArt`),
  ADD KEY `fk_Articulo_Unidad_Medida1_idx` (`Unidad_Medida_idUnidad_Medida`),
  ADD KEY `fk_Articulo_Sector_Deposito1_idx` (`Sector_Deposito_idSector_Deposito`),
  ADD KEY `fk_Articulo_Tipo1_idx` (`Tipo_idTipo`),
  ADD KEY `fk_Articulo_Categoria1_idx` (`Categoria_idCategoria`);

--
-- Indices de la tabla `Categoria`
--
ALTER TABLE `Categoria`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `Cliente`
--
ALTER TABLE `Cliente`
  ADD PRIMARY KEY (`Persona_id_persona`),
  ADD KEY `fk_Cliente_Persona1_idx` (`Persona_id_persona`);

--
-- Indices de la tabla `Estado_Orden_Compra`
--
ALTER TABLE `Estado_Orden_Compra`
  ADD PRIMARY KEY (`Orden_Compra_idOrden_Compra`);

--
-- Indices de la tabla `Estado_pedido`
--
ALTER TABLE `Estado_pedido`
  ADD PRIMARY KEY (`idEstado_pedido`);

--
-- Indices de la tabla `Factura`
--
ALTER TABLE `Factura`
  ADD PRIMARY KEY (`idFactura`),
  ADD KEY `fk_Factura_Usuario1_idx` (`Usuario_idUsuario`),
  ADD KEY `fk_Factura_Pedido1_idx` (`Pedido_Num-pedido`);

--
-- Indices de la tabla `Linea_OC`
--
ALTER TABLE `Linea_OC`
  ADD PRIMARY KEY (`Orden_Compra_idOrden_Compra`,`Articulo_idArt`),
  ADD KEY `fk_Linea_OC_Articulo1_idx` (`Articulo_idArt`);

--
-- Indices de la tabla `Linea_Pedido`
--
ALTER TABLE `Linea_Pedido`
  ADD PRIMARY KEY (`Pedido_Nro`,`Articulo_idArt`),
  ADD KEY `fk_Linea_Pedido_Articulo1_idx` (`Articulo_idArt`);

--
-- Indices de la tabla `Orden_Compra`
--
ALTER TABLE `Orden_Compra`
  ADD PRIMARY KEY (`idOrden_Compra`),
  ADD KEY `fk_Orden_Compra_Proveedor1_idx` (`Proveedor_Persona_id_persona`),
  ADD KEY `fk_Orden_Compra_Usuario1_idx` (`Crea_Id_Usuario`),
  ADD KEY `fk_Orden_Compra_Usuario2_idx` (`Abona_ID_Usuario`);

--
-- Indices de la tabla `Pedido`
--
ALTER TABLE `Pedido`
  ADD PRIMARY KEY (`Num_pedido`),
  ADD KEY `fk_Pedido_Estado_pedido1_idx` (`Estado_pedido_idEstado_pedido`),
  ADD KEY `fk_Pedido_Cliente1_idx` (`Cliente_Persona_id_persona`);

--
-- Indices de la tabla `Persona`
--
ALTER TABLE `Persona`
  ADD PRIMARY KEY (`id_persona`),
  ADD KEY `fk_Persona_Tipo_Doc_idx` (`Tipo_Doc_idTipo_Doc`);

--
-- Indices de la tabla `Proveedor`
--
ALTER TABLE `Proveedor`
  ADD PRIMARY KEY (`Persona_id_persona`);

--
-- Indices de la tabla `Remito`
--
ALTER TABLE `Remito`
  ADD PRIMARY KEY (`idRemito`,`Orden_Compra_idOrden_Compra`),
  ADD KEY `fk_Remito_Orden_Compra1_idx` (`Orden_Compra_idOrden_Compra`);

--
-- Indices de la tabla `Sector`
--
ALTER TABLE `Sector`
  ADD PRIMARY KEY (`idSector`);

--
-- Indices de la tabla `Sector_Deposito`
--
ALTER TABLE `Sector_Deposito`
  ADD PRIMARY KEY (`idSector_Deposito`);

--
-- Indices de la tabla `Tipo`
--
ALTER TABLE `Tipo`
  ADD PRIMARY KEY (`idTipo`);

--
-- Indices de la tabla `Tipo_Doc`
--
ALTER TABLE `Tipo_Doc`
  ADD PRIMARY KEY (`idTipo_Doc`);

--
-- Indices de la tabla `Unidad_Medida`
--
ALTER TABLE `Unidad_Medida`
  ADD PRIMARY KEY (`idUnidad_Medida`);

--
-- Indices de la tabla `Usuario`
--
ALTER TABLE `Usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `fk_Usuario_Sector1_idx` (`Sector_idSector`),
  ADD KEY `fk_Usuario_Usuario1_idx` (`Id_Administrador`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Articulo`
--
ALTER TABLE `Articulo`
  MODIFY `idArt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `Categoria`
--
ALTER TABLE `Categoria`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `Estado_pedido`
--
ALTER TABLE `Estado_pedido`
  MODIFY `idEstado_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `Factura`
--
ALTER TABLE `Factura`
  MODIFY `idFactura` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Orden_Compra`
--
ALTER TABLE `Orden_Compra`
  MODIFY `idOrden_Compra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Pedido`
--
ALTER TABLE `Pedido`
  MODIFY `Num_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `Remito`
--
ALTER TABLE `Remito`
  MODIFY `idRemito` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `Sector`
--
ALTER TABLE `Sector`
  MODIFY `idSector` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `Sector_Deposito`
--
ALTER TABLE `Sector_Deposito`
  MODIFY `idSector_Deposito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `Tipo`
--
ALTER TABLE `Tipo`
  MODIFY `idTipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `Tipo_Doc`
--
ALTER TABLE `Tipo_Doc`
  MODIFY `idTipo_Doc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `Unidad_Medida`
--
ALTER TABLE `Unidad_Medida`
  MODIFY `idUnidad_Medida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `Usuario`
--
ALTER TABLE `Usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Articulo`
--
ALTER TABLE `Articulo`
  ADD CONSTRAINT `fk_Articulo_Categoria1` FOREIGN KEY (`Categoria_idCategoria`) REFERENCES `Categoria` (`idCategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Articulo_Sector_Deposito1` FOREIGN KEY (`Sector_Deposito_idSector_Deposito`) REFERENCES `Sector_Deposito` (`idSector_Deposito`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Articulo_Tipo1` FOREIGN KEY (`Tipo_idTipo`) REFERENCES `Tipo` (`idTipo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Articulo_Unidad_Medida1` FOREIGN KEY (`Unidad_Medida_idUnidad_Medida`) REFERENCES `Unidad_Medida` (`idUnidad_Medida`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `Cliente`
--
ALTER TABLE `Cliente`
  ADD CONSTRAINT `fk_Cliente_Persona1` FOREIGN KEY (`Persona_id_persona`) REFERENCES `Persona` (`id_persona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `Estado_Orden_Compra`
--
ALTER TABLE `Estado_Orden_Compra`
  ADD CONSTRAINT `fk_Estado_Orden_Compra_Orden_Compra1` FOREIGN KEY (`Orden_Compra_idOrden_Compra`) REFERENCES `Orden_Compra` (`idOrden_Compra`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `Factura`
--
ALTER TABLE `Factura`
  ADD CONSTRAINT `fk_Factura_Pedido1` FOREIGN KEY (`Pedido_Num-pedido`) REFERENCES `Pedido` (`Num_pedido`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Factura_Usuario1` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `Usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `Linea_OC`
--
ALTER TABLE `Linea_OC`
  ADD CONSTRAINT `fk_Linea_OC_Articulo1` FOREIGN KEY (`Articulo_idArt`) REFERENCES `Articulo` (`idArt`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Linea_OC_Orden_Compra1` FOREIGN KEY (`Orden_Compra_idOrden_Compra`) REFERENCES `Orden_Compra` (`idOrden_Compra`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `Linea_Pedido`
--
ALTER TABLE `Linea_Pedido`
  ADD CONSTRAINT `fk_Linea_Pedido_Articulo1` FOREIGN KEY (`Articulo_idArt`) REFERENCES `Articulo` (`idArt`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Linea_Pedido_Pedido1` FOREIGN KEY (`Pedido_Nro`) REFERENCES `Pedido` (`Num_pedido`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `Orden_Compra`
--
ALTER TABLE `Orden_Compra`
  ADD CONSTRAINT `fk_Orden_Compra_Proveedor1` FOREIGN KEY (`Proveedor_Persona_id_persona`) REFERENCES `Proveedor` (`Persona_id_persona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Orden_Compra_Usuario1` FOREIGN KEY (`Crea_Id_Usuario`) REFERENCES `Usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Orden_Compra_Usuario2` FOREIGN KEY (`Abona_ID_Usuario`) REFERENCES `Usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `Pedido`
--
ALTER TABLE `Pedido`
  ADD CONSTRAINT `fk_Pedido_Cliente1` FOREIGN KEY (`Cliente_Persona_id_persona`) REFERENCES `Cliente` (`Persona_id_persona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Pedido_Estado_pedido1` FOREIGN KEY (`Estado_pedido_idEstado_pedido`) REFERENCES `Estado_pedido` (`idEstado_pedido`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `Persona`
--
ALTER TABLE `Persona`
  ADD CONSTRAINT `fk_Persona_Tipo_Doc` FOREIGN KEY (`Tipo_Doc_idTipo_Doc`) REFERENCES `Tipo_Doc` (`idTipo_Doc`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `Proveedor`
--
ALTER TABLE `Proveedor`
  ADD CONSTRAINT `fk_Proveedor_Persona1` FOREIGN KEY (`Persona_id_persona`) REFERENCES `Persona` (`id_persona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `Remito`
--
ALTER TABLE `Remito`
  ADD CONSTRAINT `fk_Remito_Orden_Compra1` FOREIGN KEY (`Orden_Compra_idOrden_Compra`) REFERENCES `Orden_Compra` (`idOrden_Compra`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `Usuario`
--
ALTER TABLE `Usuario`
  ADD CONSTRAINT `fk_Usuario_Sector1` FOREIGN KEY (`Sector_idSector`) REFERENCES `Sector` (`idSector`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Usuario_Usuario1` FOREIGN KEY (`Id_Administrador`) REFERENCES `Usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
