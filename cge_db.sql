-- phpMyAdmin SQL Dump
-- version 4.2.13
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 13, 2015 at 01:49 PM
-- Server version: 5.6.22
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cge_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `Aclaraciones`
--

CREATE TABLE IF NOT EXISTS `Aclaraciones` (
`IdAclaracion` int(11) NOT NULL,
  `IdPago` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `archivos`
--

CREATE TABLE IF NOT EXISTS `archivos` (
`IdArchivo` int(11) NOT NULL,
  `nomArchivo` varchar(100) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `IdTipoDocumento` int(11) DEFAULT NULL,
  `IdUsuario` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=481 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `CamposInformacion`
--

CREATE TABLE IF NOT EXISTS `CamposInformacion` (
  `IdCampo` int(11) NOT NULL,
  `IdCategoria` int(11) NOT NULL,
  `NomCorto` varchar(255) DEFAULT NULL,
  `TipoDato` varchar(255) DEFAULT NULL,
  `Descripcion` longtext,
  `Orden` bigint(10) DEFAULT NULL,
  `Requerido` tinyint(2) DEFAULT NULL,
  `Bloqueado` tinyint(2) DEFAULT NULL,
  `Visible` tinyint(2) DEFAULT NULL,
  `Unico` tinyint(2) DEFAULT NULL,
  `Registro` tinyint(2) DEFAULT NULL,
  `DatoPorDefecto` longtext,
  `FormatoPorDefecto` tinyint(2) DEFAULT NULL,
  `Parametro1` longtext,
  `Parametro2` longtext,
  `Parametro3` longtext,
  `Parametro4` longtext,
  `Parametro5` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `CategoriaInformacion`
--

CREATE TABLE IF NOT EXISTS `CategoriaInformacion` (
  `IdCategoria` int(11) NOT NULL,
  `Nombre` varchar(255) DEFAULT NULL,
  `Orden` bigint(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `catEstados`
--

CREATE TABLE IF NOT EXISTS `catEstados` (
`IdEstado` int(11) NOT NULL,
  `NomEstado` varchar(255) DEFAULT NULL,
  `Tipo` varchar(20) DEFAULT NULL,
  `IdPais` int(6) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `catMunicipios`
--

CREATE TABLE IF NOT EXISTS `catMunicipios` (
`IdMunicipio` int(11) NOT NULL,
  `NomMunicipio` varchar(255) DEFAULT NULL,
  `IdEstado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `catPaises`
--

CREATE TABLE IF NOT EXISTS `catPaises` (
  `IdPais` int(6) unsigned NOT NULL,
  `NomPais` varchar(255) DEFAULT NULL,
  `ISO_L` varchar(4) DEFAULT NULL,
  `PrefijoTel` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ConceposDePago`
--

CREATE TABLE IF NOT EXISTS `ConceposDePago` (
  `IdConcepto` int(11) NOT NULL,
  `NomConcepto` varchar(45) DEFAULT NULL,
  `CveConcepto` varchar(45) DEFAULT NULL,
  `PrecioUnitario` varchar(45) DEFAULT NULL,
  `DescripcionConcepto` varchar(45) DEFAULT NULL,
  `IdCurso` varchar(45) DEFAULT NULL,
  `FecAdicionConcepto` varchar(45) DEFAULT NULL,
  `UltimaModificacion` varchar(45) DEFAULT NULL,
  `Vigencia` varchar(45) DEFAULT NULL,
  `EstatusDeVigencia` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ConceptosAPagar`
--

CREATE TABLE IF NOT EXISTS `ConceptosAPagar` (
`IdConceptosAPagar` int(11) NOT NULL,
  `Transaccion` varchar(20) DEFAULT NULL,
  `RefPago` varchar(30) DEFAULT NULL,
  `UnidadEducativa` varchar(15) DEFAULT NULL,
  `TipoPago` varchar(5) DEFAULT NULL,
  `NumAutorizacion` varchar(20) DEFAULT NULL,
  `FechPago` date DEFAULT NULL,
  `FolioPago` varchar(20) DEFAULT NULL,
  `EstatusPago` varchar(5) DEFAULT NULL,
  `EstatusRefrendado` varchar(5) DEFAULT NULL,
  `DetallePedido_IdDetallePedido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Cursos`
--

CREATE TABLE IF NOT EXISTS `Cursos` (
`IdCurso` int(11) NOT NULL,
  `IdPersona` int(11) DEFAULT NULL,
  `CveCurso` varchar(15) DEFAULT NULL,
  `Estatus` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `DatosDeFacturacion`
--

CREATE TABLE IF NOT EXISTS `DatosDeFacturacion` (
  `IdDatosDeFacturacion` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `Calle` varchar(255) DEFAULT NULL,
  `NumExterior` int(11) DEFAULT NULL,
  `NumInterior` int(11) DEFAULT NULL,
  `Colonia` varchar(255) DEFAULT NULL,
  `CP` int(11) DEFAULT NULL,
  `RFC` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `DatosUsuario`
--

CREATE TABLE IF NOT EXISTS `DatosUsuario` (
`IdDatosUsuario` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `NomCampo` varchar(100) NOT NULL,
  `Datos` longtext,
  `DataFormat` tinyint(2) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1343 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `DetalleOrdenDePago`
--

CREATE TABLE IF NOT EXISTS `DetalleOrdenDePago` (
`IdDetalleOrdenPago` int(11) NOT NULL,
  `IdOrdenDePago` int(11) NOT NULL,
  `IdTipoDePago` int(11) NOT NULL,
  `IdConcepto` int(11) NOT NULL,
  `CantidadConceptos` varchar(45) DEFAULT NULL,
  `PrecioTotalConceptos` varchar(45) DEFAULT NULL,
  `FechaDeOrden` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `DetallePedido`
--

CREATE TABLE IF NOT EXISTS `DetallePedido` (
`IdDetallePedido` int(11) NOT NULL,
  `Pedidos_IdPedido` int(11) NOT NULL,
  `Productos_IdProducto` int(11) NOT NULL,
  `Cantidad` int(11) DEFAULT NULL,
  `RefAPagar` varchar(20) DEFAULT NULL,
  `EstatusPedido` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Facturas`
--

CREATE TABLE IF NOT EXISTS `Facturas` (
  `IdFactura` int(11) NOT NULL,
  `IdPago` int(11) NOT NULL,
  `IdDatosDeFacturacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `OrdenDePago`
--

CREATE TABLE IF NOT EXISTS `OrdenDePago` (
  `IdOrdenDePago` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `valOrdenPago` varchar(45) DEFAULT NULL,
  `NumOrdenPago` varchar(45) DEFAULT NULL,
  `FechaCompra` varchar(45) DEFAULT NULL,
  `CantidadProductos` varchar(45) DEFAULT NULL,
  `CostoTotal` varchar(45) DEFAULT NULL,
  `IdTipoPago` varchar(45) DEFAULT NULL,
  `IdEstatusOrden` varchar(45) DEFAULT NULL,
  `Cancelada` varchar(45) DEFAULT NULL,
  `Pagada` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Pagos`
--

CREATE TABLE IF NOT EXISTS `Pagos` (
  `IdPago` int(11) NOT NULL,
  `IdOrdenDePago` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `PagosRefrendados`
--

CREATE TABLE IF NOT EXISTS `PagosRefrendados` (
  `idPagoRefrendado` int(11) NOT NULL,
  `IdPago` int(11) NOT NULL,
  `IdRefrendo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Pedidos`
--

CREATE TABLE IF NOT EXISTS `Pedidos` (
`IdPedido` int(11) NOT NULL,
  `ValPago` varchar(10) DEFAULT NULL,
  `IdTransaccion` bigint(20) DEFAULT NULL,
  `FechaAlta` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `CostoTotal` decimal(11,2) DEFAULT NULL,
  `CantidadProductos` int(11) DEFAULT NULL,
  `TipoPago` varchar(5) DEFAULT NULL,
  `EstatusPedido` int(11) NOT NULL DEFAULT '1',
  `Usuarios_IdUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Productos`
--

CREATE TABLE IF NOT EXISTS `Productos` (
`IdProducto` int(11) NOT NULL,
  `Producto` varchar(500) DEFAULT NULL,
  `CveProducto` varchar(20) DEFAULT NULL,
  `NomCorto` varchar(8) DEFAULT NULL,
  `IdCursoMoodle` int(11) DEFAULT NULL,
  `Precio` decimal(9,2) DEFAULT NULL,
  `Descripcion` varchar(512) DEFAULT NULL,
  `Estatus` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ProductosTipoProducto`
--

CREATE TABLE IF NOT EXISTS `ProductosTipoProducto` (
`IdProductosTipoProducto` int(11) NOT NULL,
  `IdProducto` int(11) NOT NULL,
  `IdTipoProducto` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Refrendos`
--

CREATE TABLE IF NOT EXISTS `Refrendos` (
  `IdRefrendo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Roles`
--

CREATE TABLE IF NOT EXISTS `Roles` (
`IdRole` int(11) NOT NULL,
  `NomRole` varchar(30) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `saeInstitucionEducativa`
--

CREATE TABLE IF NOT EXISTS `saeInstitucionEducativa` (
`IdInstEdu` int(10) unsigned zerofill NOT NULL,
  `NomInstitucion` varchar(255) DEFAULT NULL,
  `NomCorto` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `TipoDePago`
--

CREATE TABLE IF NOT EXISTS `TipoDePago` (
`IdTipoDePago` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `CveTipoPago` varchar(45) DEFAULT NULL,
  `EstatusDeVigencia` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `TipoProducto`
--

CREATE TABLE IF NOT EXISTS `TipoProducto` (
`IdTipoProducto` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Descripcion` varchar(512) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `UserRoles`
--

CREATE TABLE IF NOT EXISTS `UserRoles` (
`IdUserRole` int(11) NOT NULL,
  `Usuarios_IdUsuario` int(11) NOT NULL,
  `Roles_IdRole` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Usuarios`
--

CREATE TABLE IF NOT EXISTS `Usuarios` (
`IdUsuario` int(11) NOT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `aPaterno` varchar(100) DEFAULT NULL,
  `aMaterno` varchar(100) DEFAULT NULL,
  `lugarNac` varchar(100) DEFAULT NULL,
  `Sexo` varchar(1) DEFAULT NULL,
  `CURP` varchar(45) DEFAULT NULL,
  `Nacionalidad` varchar(50) DEFAULT NULL,
  `FecNacimiento` datetime DEFAULT NULL,
  `Calle` varchar(255) DEFAULT NULL,
  `NumExterior` int(11) DEFAULT NULL,
  `NumInterior` int(11) DEFAULT NULL,
  `Colonia` varchar(255) DEFAULT NULL,
  `CP` int(11) DEFAULT NULL,
  `Telefono` varchar(20) DEFAULT NULL,
  `TelCelular` varchar(20) DEFAULT NULL,
  `TelOficina` varchar(20) DEFAULT NULL,
  `OficinaExt` varchar(20) DEFAULT NULL,
  `Fax` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `IdPais` int(6) unsigned NOT NULL,
  `NomEstado` varchar(100) NOT NULL,
  `NomMunicipio` varchar(100) NOT NULL,
  `RFC` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=135 DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Aclaraciones`
--
ALTER TABLE `Aclaraciones`
 ADD PRIMARY KEY (`IdAclaracion`), ADD KEY `fk_Aclaraciones_Pagos1` (`IdPago`);

--
-- Indexes for table `archivos`
--
ALTER TABLE `archivos`
 ADD PRIMARY KEY (`IdArchivo`), ADD KEY `fk_archivos_Usuarios1` (`IdUsuario`);

--
-- Indexes for table `CamposInformacion`
--
ALTER TABLE `CamposInformacion`
 ADD PRIMARY KEY (`IdCampo`), ADD KEY `fk_CamposInformacion_CategoriaInformacion1_idx` (`IdCategoria`);

--
-- Indexes for table `CategoriaInformacion`
--
ALTER TABLE `CategoriaInformacion`
 ADD PRIMARY KEY (`IdCategoria`);

--
-- Indexes for table `catEstados`
--
ALTER TABLE `catEstados`
 ADD PRIMARY KEY (`IdEstado`), ADD KEY `fk_catEstados_catPaises2_idx` (`IdPais`);

--
-- Indexes for table `catMunicipios`
--
ALTER TABLE `catMunicipios`
 ADD PRIMARY KEY (`IdMunicipio`), ADD UNIQUE KEY `IdMunicipio_UNIQUE` (`IdMunicipio`), ADD KEY `fk_catMunicipios_catEstados2_idx` (`IdEstado`);

--
-- Indexes for table `catPaises`
--
ALTER TABLE `catPaises`
 ADD PRIMARY KEY (`IdPais`);

--
-- Indexes for table `ConceposDePago`
--
ALTER TABLE `ConceposDePago`
 ADD PRIMARY KEY (`IdConcepto`);

--
-- Indexes for table `ConceptosAPagar`
--
ALTER TABLE `ConceptosAPagar`
 ADD PRIMARY KEY (`IdConceptosAPagar`), ADD KEY `fk_ConceptosAPagar_DetallePedido1` (`DetallePedido_IdDetallePedido`);

--
-- Indexes for table `Cursos`
--
ALTER TABLE `Cursos`
 ADD PRIMARY KEY (`IdCurso`);

--
-- Indexes for table `DatosDeFacturacion`
--
ALTER TABLE `DatosDeFacturacion`
 ADD PRIMARY KEY (`IdDatosDeFacturacion`), ADD KEY `fk_DatosDeFacturacion_Usuarios1` (`IdUsuario`);

--
-- Indexes for table `DatosUsuario`
--
ALTER TABLE `DatosUsuario`
 ADD PRIMARY KEY (`IdDatosUsuario`), ADD KEY `fk_DatosUsuario_Usuarios1_idx` (`IdUsuario`);

--
-- Indexes for table `DetalleOrdenDePago`
--
ALTER TABLE `DetalleOrdenDePago`
 ADD PRIMARY KEY (`IdDetalleOrdenPago`), ADD KEY `fk_DetalleOrdenDePago_OrdenDePago1` (`IdOrdenDePago`), ADD KEY `fk_DetalleOrdenDePago_TipoDePago1` (`IdTipoDePago`), ADD KEY `fk_DetalleOrdenDePago_ConceposDePago1_idx` (`IdConcepto`);

--
-- Indexes for table `DetallePedido`
--
ALTER TABLE `DetallePedido`
 ADD PRIMARY KEY (`IdDetallePedido`), ADD KEY `fk_Pedidos_has_Productos_Productos1` (`Productos_IdProducto`), ADD KEY `fk_Pedidos_has_Productos_Pedidos1` (`Pedidos_IdPedido`);

--
-- Indexes for table `Facturas`
--
ALTER TABLE `Facturas`
 ADD PRIMARY KEY (`IdFactura`), ADD KEY `fk_Facturas_Pagos1` (`IdPago`), ADD KEY `fk_Facturas_DatosDeFacturacion1` (`IdDatosDeFacturacion`);

--
-- Indexes for table `OrdenDePago`
--
ALTER TABLE `OrdenDePago`
 ADD PRIMARY KEY (`IdOrdenDePago`), ADD KEY `fk_OrdenDePago_Usuarios1` (`IdUsuario`);

--
-- Indexes for table `Pagos`
--
ALTER TABLE `Pagos`
 ADD PRIMARY KEY (`IdPago`), ADD KEY `fk_Pagos_OrdenDePago1` (`IdOrdenDePago`);

--
-- Indexes for table `PagosRefrendados`
--
ALTER TABLE `PagosRefrendados`
 ADD PRIMARY KEY (`idPagoRefrendado`), ADD KEY `fk_PagosRefrendados_Pagos1` (`IdPago`), ADD KEY `fk_PagosRefrendados_Refrendos1` (`IdRefrendo`);

--
-- Indexes for table `Pedidos`
--
ALTER TABLE `Pedidos`
 ADD PRIMARY KEY (`IdPedido`), ADD KEY `fk_Pedidos_Usuarios1` (`Usuarios_IdUsuario`);

--
-- Indexes for table `Productos`
--
ALTER TABLE `Productos`
 ADD PRIMARY KEY (`IdProducto`);

--
-- Indexes for table `ProductosTipoProducto`
--
ALTER TABLE `ProductosTipoProducto`
 ADD PRIMARY KEY (`IdProductosTipoProducto`), ADD KEY `IdProducto` (`IdProducto`), ADD KEY `IdTipoProducto` (`IdTipoProducto`);

--
-- Indexes for table `Refrendos`
--
ALTER TABLE `Refrendos`
 ADD PRIMARY KEY (`IdRefrendo`);

--
-- Indexes for table `Roles`
--
ALTER TABLE `Roles`
 ADD PRIMARY KEY (`IdRole`);

--
-- Indexes for table `saeInstitucionEducativa`
--
ALTER TABLE `saeInstitucionEducativa`
 ADD PRIMARY KEY (`IdInstEdu`), ADD UNIQUE KEY `IdInstEdu_UNIQUE` (`IdInstEdu`);

--
-- Indexes for table `TipoDePago`
--
ALTER TABLE `TipoDePago`
 ADD PRIMARY KEY (`IdTipoDePago`);

--
-- Indexes for table `TipoProducto`
--
ALTER TABLE `TipoProducto`
 ADD PRIMARY KEY (`IdTipoProducto`);

--
-- Indexes for table `UserRoles`
--
ALTER TABLE `UserRoles`
 ADD PRIMARY KEY (`IdUserRole`), ADD KEY `fk_UserRoles_Usuarios1` (`Usuarios_IdUsuario`), ADD KEY `fk_UserRoles_Roles1` (`Roles_IdRole`);

--
-- Indexes for table `Usuarios`
--
ALTER TABLE `Usuarios`
 ADD PRIMARY KEY (`IdUsuario`), ADD UNIQUE KEY `email_UNIQUE` (`email`), ADD UNIQUE KEY `CURP_UNIQUE` (`CURP`), ADD KEY `fk_Usuarios_catPaises1_idx` (`IdPais`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Aclaraciones`
--
ALTER TABLE `Aclaraciones`
MODIFY `IdAclaracion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `archivos`
--
ALTER TABLE `archivos`
MODIFY `IdArchivo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=481;
--
-- AUTO_INCREMENT for table `catEstados`
--
ALTER TABLE `catEstados`
MODIFY `IdEstado` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `catMunicipios`
--
ALTER TABLE `catMunicipios`
MODIFY `IdMunicipio` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ConceptosAPagar`
--
ALTER TABLE `ConceptosAPagar`
MODIFY `IdConceptosAPagar` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Cursos`
--
ALTER TABLE `Cursos`
MODIFY `IdCurso` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `DatosUsuario`
--
ALTER TABLE `DatosUsuario`
MODIFY `IdDatosUsuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1343;
--
-- AUTO_INCREMENT for table `DetalleOrdenDePago`
--
ALTER TABLE `DetalleOrdenDePago`
MODIFY `IdDetalleOrdenPago` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `DetallePedido`
--
ALTER TABLE `DetallePedido`
MODIFY `IdDetallePedido` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Pedidos`
--
ALTER TABLE `Pedidos`
MODIFY `IdPedido` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Productos`
--
ALTER TABLE `Productos`
MODIFY `IdProducto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `ProductosTipoProducto`
--
ALTER TABLE `ProductosTipoProducto`
MODIFY `IdProductosTipoProducto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `Roles`
--
ALTER TABLE `Roles`
MODIFY `IdRole` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `saeInstitucionEducativa`
--
ALTER TABLE `saeInstitucionEducativa`
MODIFY `IdInstEdu` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `TipoDePago`
--
ALTER TABLE `TipoDePago`
MODIFY `IdTipoDePago` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `TipoProducto`
--
ALTER TABLE `TipoProducto`
MODIFY `IdTipoProducto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `UserRoles`
--
ALTER TABLE `UserRoles`
MODIFY `IdUserRole` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=103;
--
-- AUTO_INCREMENT for table `Usuarios`
--
ALTER TABLE `Usuarios`
MODIFY `IdUsuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=135;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Aclaraciones`
--
ALTER TABLE `Aclaraciones`
ADD CONSTRAINT `fk_Aclaraciones_Pagos1` FOREIGN KEY (`IdPago`) REFERENCES `Pagos` (`IdPago`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `archivos`
--
ALTER TABLE `archivos`
ADD CONSTRAINT `fk_archivos_Usuarios1` FOREIGN KEY (`IdUsuario`) REFERENCES `Usuarios` (`IdUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `CamposInformacion`
--
ALTER TABLE `CamposInformacion`
ADD CONSTRAINT `fk_CamposInformacion_CategoriaInformacion1` FOREIGN KEY (`IdCategoria`) REFERENCES `CategoriaInformacion` (`IdCategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `catEstados`
--
ALTER TABLE `catEstados`
ADD CONSTRAINT `fk_catEstados_catPaises2` FOREIGN KEY (`IdPais`) REFERENCES `catPaises` (`IdPais`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `catMunicipios`
--
ALTER TABLE `catMunicipios`
ADD CONSTRAINT `fk_catMunicipios_catEstados2` FOREIGN KEY (`IdEstado`) REFERENCES `catEstados` (`IdEstado`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ConceptosAPagar`
--
ALTER TABLE `ConceptosAPagar`
ADD CONSTRAINT `fk_ConceptosAPagar_DetallePedido1` FOREIGN KEY (`DetallePedido_IdDetallePedido`) REFERENCES `DetallePedido` (`IdDetallePedido`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `DatosDeFacturacion`
--
ALTER TABLE `DatosDeFacturacion`
ADD CONSTRAINT `fk_DatosDeFacturacion_Usuarios1` FOREIGN KEY (`IdUsuario`) REFERENCES `Usuarios` (`IdUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `DatosUsuario`
--
ALTER TABLE `DatosUsuario`
ADD CONSTRAINT `fk_DatosUsuario_Usuarios1` FOREIGN KEY (`IdUsuario`) REFERENCES `Usuarios` (`IdUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `DetalleOrdenDePago`
--
ALTER TABLE `DetalleOrdenDePago`
ADD CONSTRAINT `fk_DetalleOrdenDePago_ConceposDePago1` FOREIGN KEY (`IdConcepto`) REFERENCES `ConceposDePago` (`IdConcepto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_DetalleOrdenDePago_OrdenDePago1` FOREIGN KEY (`IdOrdenDePago`) REFERENCES `OrdenDePago` (`IdOrdenDePago`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_DetalleOrdenDePago_TipoDePago1` FOREIGN KEY (`IdTipoDePago`) REFERENCES `TipoDePago` (`IdTipoDePago`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `DetallePedido`
--
ALTER TABLE `DetallePedido`
ADD CONSTRAINT `fk_Pedidos_has_Productos_Pedidos1` FOREIGN KEY (`Pedidos_IdPedido`) REFERENCES `Pedidos` (`IdPedido`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_Pedidos_has_Productos_Productos1` FOREIGN KEY (`Productos_IdProducto`) REFERENCES `Productos` (`IdProducto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Facturas`
--
ALTER TABLE `Facturas`
ADD CONSTRAINT `fk_Facturas_DatosDeFacturacion1` FOREIGN KEY (`IdDatosDeFacturacion`) REFERENCES `DatosDeFacturacion` (`IdDatosDeFacturacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Facturas_Pagos1` FOREIGN KEY (`IdPago`) REFERENCES `Pagos` (`IdPago`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `OrdenDePago`
--
ALTER TABLE `OrdenDePago`
ADD CONSTRAINT `fk_OrdenDePago_Usuarios1` FOREIGN KEY (`IdUsuario`) REFERENCES `Usuarios` (`IdUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Pagos`
--
ALTER TABLE `Pagos`
ADD CONSTRAINT `fk_Pagos_OrdenDePago1` FOREIGN KEY (`IdOrdenDePago`) REFERENCES `OrdenDePago` (`IdOrdenDePago`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `PagosRefrendados`
--
ALTER TABLE `PagosRefrendados`
ADD CONSTRAINT `fk_PagosRefrendados_Pagos1` FOREIGN KEY (`IdPago`) REFERENCES `Pagos` (`IdPago`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_PagosRefrendados_Refrendos1` FOREIGN KEY (`IdRefrendo`) REFERENCES `Refrendos` (`IdRefrendo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Pedidos`
--
ALTER TABLE `Pedidos`
ADD CONSTRAINT `fk_Pedidos_Usuarios1` FOREIGN KEY (`Usuarios_IdUsuario`) REFERENCES `Usuarios` (`IdUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ProductosTipoProducto`
--
ALTER TABLE `ProductosTipoProducto`
ADD CONSTRAINT `ProductosTipoProducto_ibfk_1` FOREIGN KEY (`IdProducto`) REFERENCES `Productos` (`IdProducto`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `ProductosTipoProducto_ibfk_2` FOREIGN KEY (`IdTipoProducto`) REFERENCES `TipoProducto` (`IdTipoProducto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `UserRoles`
--
ALTER TABLE `UserRoles`
ADD CONSTRAINT `UserRoles_ibfk_1` FOREIGN KEY (`Usuarios_IdUsuario`) REFERENCES `Usuarios` (`IdUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_UserRoles_Roles1` FOREIGN KEY (`Roles_IdRole`) REFERENCES `Roles` (`IdRole`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Usuarios`
--
ALTER TABLE `Usuarios`
ADD CONSTRAINT `fk_Usuarios_catPaises1` FOREIGN KEY (`IdPais`) REFERENCES `catPaises` (`IdPais`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
