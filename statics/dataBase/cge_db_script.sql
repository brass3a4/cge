SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `cge_db` DEFAULT CHARACTER SET latin1 ;
USE `cge_db` ;

-- -----------------------------------------------------
-- Table `cge_db`.`catPaises`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `cge_db`.`catPaises` (
  `IdPais` INT(6) UNSIGNED NOT NULL ,
  `NomPais` VARCHAR(255) NULL DEFAULT NULL ,
  `ISO_L` VARCHAR(4) NULL DEFAULT NULL ,
  `PrefijoTel` INT(8) NULL DEFAULT NULL ,
  PRIMARY KEY (`IdPais`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cge_db`.`Usuarios`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `cge_db`.`Usuarios` (
  `IdUsuario` INT(11) NOT NULL AUTO_INCREMENT ,
  `usuario` VARCHAR(100) NULL DEFAULT NULL ,
  `password` VARCHAR(40) NULL DEFAULT NULL ,
  `Nombre` VARCHAR(100) NULL DEFAULT NULL ,
  `aPaterno` VARCHAR(100) NULL DEFAULT NULL ,
  `aMaterno` VARCHAR(100) NULL DEFAULT NULL ,
  `lugarNac` VARCHAR(100) NULL ,
  `Sexo` VARCHAR(1) NULL DEFAULT NULL ,
  `CURP` VARCHAR(45) NULL DEFAULT NULL ,
  `Nacionalidad` VARCHAR(50) NULL DEFAULT NULL ,
  `FecNacimiento` DATETIME NULL DEFAULT NULL ,
  `Calle` VARCHAR(255) NULL DEFAULT NULL ,
  `NumExterior` INT(11) NULL DEFAULT NULL ,
  `NumInterior` INT(11) NULL DEFAULT NULL ,
  `Colonia` VARCHAR(255) NULL DEFAULT NULL ,
  `CP` INT(11) NULL DEFAULT NULL ,
  `Telefono` VARCHAR(20) NULL DEFAULT NULL ,
  `TelCelular` VARCHAR(20) NULL DEFAULT NULL ,
  `TelOficina` VARCHAR(20) NULL DEFAULT NULL ,
  `OficinaExt` VARCHAR(20) NULL DEFAULT NULL ,
  `Fax` VARCHAR(20) NULL ,
  `email` VARCHAR(100) NULL DEFAULT NULL ,
  `IdPais` INT(6) UNSIGNED NOT NULL ,
  `NomEstado` VARCHAR(100) NOT NULL ,
  `NomMunicipio` VARCHAR(100) NOT NULL ,
  `RFC` VARCHAR(45) NULL ,
  PRIMARY KEY (`IdUsuario`) ,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) ,
  UNIQUE INDEX `CURP_UNIQUE` (`CURP` ASC) ,
  INDEX `fk_Usuarios_catPaises1_idx` (`IdPais` ASC) ,
  CONSTRAINT `fk_Usuarios_catPaises1`
    FOREIGN KEY (`IdPais` )
    REFERENCES `cge_db`.`catPaises` (`IdPais` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cge_db`.`OrdenDePago`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `cge_db`.`OrdenDePago` (
  `IdOrdenDePago` INT(11) NOT NULL ,
  `IdUsuario` INT(11) NOT NULL ,
  `valOrdenPago` VARCHAR(45) NULL DEFAULT NULL ,
  `NumOrdenPago` VARCHAR(45) NULL DEFAULT NULL ,
  `FechaCompra` VARCHAR(45) NULL DEFAULT NULL ,
  `CantidadProductos` VARCHAR(45) NULL DEFAULT NULL ,
  `CostoTotal` VARCHAR(45) NULL DEFAULT NULL ,
  `IdTipoPago` VARCHAR(45) NULL DEFAULT NULL ,
  `IdEstatusOrden` VARCHAR(45) NULL DEFAULT NULL ,
  `Cancelada` VARCHAR(45) NULL DEFAULT NULL ,
  `Pagada` VARCHAR(45) NULL DEFAULT NULL ,
  PRIMARY KEY (`IdOrdenDePago`) ,
  INDEX `fk_OrdenDePago_Usuarios1` (`IdUsuario` ASC) ,
  CONSTRAINT `fk_OrdenDePago_Usuarios1`
    FOREIGN KEY (`IdUsuario` )
    REFERENCES `cge_db`.`Usuarios` (`IdUsuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cge_db`.`Pagos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `cge_db`.`Pagos` (
  `IdPago` INT(11) NOT NULL ,
  `IdOrdenDePago` INT(11) NOT NULL ,
  PRIMARY KEY (`IdPago`) ,
  INDEX `fk_Pagos_OrdenDePago1` (`IdOrdenDePago` ASC) ,
  CONSTRAINT `fk_Pagos_OrdenDePago1`
    FOREIGN KEY (`IdOrdenDePago` )
    REFERENCES `cge_db`.`OrdenDePago` (`IdOrdenDePago` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cge_db`.`Aclaraciones`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `cge_db`.`Aclaraciones` (
  `IdAclaracion` INT(11) NOT NULL AUTO_INCREMENT ,
  `IdPago` INT(11) NOT NULL ,
  PRIMARY KEY (`IdAclaracion`) ,
  INDEX `fk_Aclaraciones_Pagos1` (`IdPago` ASC) ,
  CONSTRAINT `fk_Aclaraciones_Pagos1`
    FOREIGN KEY (`IdPago` )
    REFERENCES `cge_db`.`Pagos` (`IdPago` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cge_db`.`CategoriaInformacion`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `cge_db`.`CategoriaInformacion` (
  `IdCategoria` INT(11) NOT NULL ,
  `Nombre` VARCHAR(255) NULL DEFAULT NULL ,
  `Orden` BIGINT(2) NULL DEFAULT NULL ,
  PRIMARY KEY (`IdCategoria`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cge_db`.`CamposInformacion`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `cge_db`.`CamposInformacion` (
  `IdCampo` INT(11) NOT NULL ,
  `IdCategoria` INT(11) NOT NULL ,
  `NomCorto` VARCHAR(255) NULL DEFAULT NULL ,
  `TipoDato` VARCHAR(255) NULL DEFAULT NULL ,
  `Descripcion` LONGTEXT NULL DEFAULT NULL ,
  `Orden` BIGINT(10) NULL DEFAULT NULL ,
  `Requerido` TINYINT(2) NULL DEFAULT NULL ,
  `Bloqueado` TINYINT(2) NULL DEFAULT NULL ,
  `Visible` TINYINT(2) NULL DEFAULT NULL ,
  `Unico` TINYINT(2) NULL DEFAULT NULL ,
  `Registro` TINYINT(2) NULL DEFAULT NULL ,
  `DatoPorDefecto` LONGTEXT NULL DEFAULT NULL ,
  `FormatoPorDefecto` TINYINT(2) NULL DEFAULT NULL ,
  `Parametro1` LONGTEXT NULL DEFAULT NULL ,
  `Parametro2` LONGTEXT NULL DEFAULT NULL ,
  `Parametro3` LONGTEXT NULL DEFAULT NULL ,
  `Parametro4` LONGTEXT NULL DEFAULT NULL ,
  `Parametro5` VARCHAR(45) NULL DEFAULT NULL ,
  PRIMARY KEY (`IdCampo`) ,
  INDEX `fk_CamposInformacion_CategoriaInformacion1_idx` (`IdCategoria` ASC) ,
  CONSTRAINT `fk_CamposInformacion_CategoriaInformacion1`
    FOREIGN KEY (`IdCategoria` )
    REFERENCES `cge_db`.`CategoriaInformacion` (`IdCategoria` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cge_db`.`ConceposDePago`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `cge_db`.`ConceposDePago` (
  `IdConcepto` INT(11) NOT NULL ,
  `NomConcepto` VARCHAR(45) NULL DEFAULT NULL ,
  `CveConcepto` VARCHAR(45) NULL DEFAULT NULL ,
  `PrecioUnitario` VARCHAR(45) NULL DEFAULT NULL ,
  `DescripcionConcepto` VARCHAR(45) NULL DEFAULT NULL ,
  `IdCurso` VARCHAR(45) NULL DEFAULT NULL ,
  `FecAdicionConcepto` VARCHAR(45) NULL DEFAULT NULL ,
  `UltimaModificacion` VARCHAR(45) NULL DEFAULT NULL ,
  `Vigencia` VARCHAR(45) NULL DEFAULT NULL ,
  `EstatusDeVigencia` VARCHAR(45) NULL DEFAULT NULL ,
  PRIMARY KEY (`IdConcepto`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cge_db`.`DatosDeFacturacion`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `cge_db`.`DatosDeFacturacion` (
  `IdDatosDeFacturacion` INT(11) NOT NULL ,
  `IdUsuario` INT(11) NOT NULL ,
  `Calle` VARCHAR(255) NULL DEFAULT NULL ,
  `NumExterior` INT(11) NULL DEFAULT NULL ,
  `NumInterior` INT(11) NULL DEFAULT NULL ,
  `Colonia` VARCHAR(255) NULL DEFAULT NULL ,
  `CP` INT(11) NULL DEFAULT NULL ,
  `RFC` VARCHAR(45) NULL DEFAULT NULL ,
  PRIMARY KEY (`IdDatosDeFacturacion`) ,
  INDEX `fk_DatosDeFacturacion_Usuarios1` (`IdUsuario` ASC) ,
  CONSTRAINT `fk_DatosDeFacturacion_Usuarios1`
    FOREIGN KEY (`IdUsuario` )
    REFERENCES `cge_db`.`Usuarios` (`IdUsuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cge_db`.`DatosUsuario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `cge_db`.`DatosUsuario` (
  `IdDatosUsuario` INT(11) NOT NULL AUTO_INCREMENT ,
  `IdUsuario` INT(11) NOT NULL ,
  `NomCampo` VARCHAR(100) NOT NULL ,
  `Datos` LONGTEXT NULL DEFAULT NULL ,
  `DataFormat` TINYINT(2) NULL DEFAULT NULL ,
  PRIMARY KEY (`IdDatosUsuario`) ,
  INDEX `fk_DatosUsuario_Usuarios1_idx` (`IdUsuario` ASC) ,
  CONSTRAINT `fk_DatosUsuario_Usuarios1`
    FOREIGN KEY (`IdUsuario` )
    REFERENCES `cge_db`.`Usuarios` (`IdUsuario` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cge_db`.`TipoDePago`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `cge_db`.`TipoDePago` (
  `IdTipoDePago` INT(11) NOT NULL AUTO_INCREMENT ,
  `Nombre` VARCHAR(45) NULL DEFAULT NULL ,
  `CveTipoPago` VARCHAR(45) NULL DEFAULT NULL ,
  `EstatusDeVigencia` VARCHAR(45) NULL DEFAULT NULL ,
  PRIMARY KEY (`IdTipoDePago`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cge_db`.`DetalleOrdenDePago`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `cge_db`.`DetalleOrdenDePago` (
  `IdDetalleOrdenPago` INT(11) NOT NULL AUTO_INCREMENT ,
  `IdOrdenDePago` INT(11) NOT NULL ,
  `IdTipoDePago` INT(11) NOT NULL ,
  `IdConcepto` INT(11) NOT NULL ,
  `CantidadConceptos` VARCHAR(45) NULL DEFAULT NULL ,
  `PrecioTotalConceptos` VARCHAR(45) NULL DEFAULT NULL ,
  `FechaDeOrden` VARCHAR(45) NULL DEFAULT NULL ,
  PRIMARY KEY (`IdDetalleOrdenPago`) ,
  INDEX `fk_DetalleOrdenDePago_OrdenDePago1` (`IdOrdenDePago` ASC) ,
  INDEX `fk_DetalleOrdenDePago_TipoDePago1` (`IdTipoDePago` ASC) ,
  INDEX `fk_DetalleOrdenDePago_ConceposDePago1_idx` (`IdConcepto` ASC) ,
  CONSTRAINT `fk_DetalleOrdenDePago_ConceposDePago1`
    FOREIGN KEY (`IdConcepto` )
    REFERENCES `cge_db`.`ConceposDePago` (`IdConcepto` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_DetalleOrdenDePago_OrdenDePago1`
    FOREIGN KEY (`IdOrdenDePago` )
    REFERENCES `cge_db`.`OrdenDePago` (`IdOrdenDePago` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_DetalleOrdenDePago_TipoDePago1`
    FOREIGN KEY (`IdTipoDePago` )
    REFERENCES `cge_db`.`TipoDePago` (`IdTipoDePago` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cge_db`.`Facturas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `cge_db`.`Facturas` (
  `IdFactura` INT(11) NOT NULL ,
  `IdPago` INT(11) NOT NULL ,
  `IdDatosDeFacturacion` INT(11) NOT NULL ,
  PRIMARY KEY (`IdFactura`) ,
  INDEX `fk_Facturas_Pagos1` (`IdPago` ASC) ,
  INDEX `fk_Facturas_DatosDeFacturacion1` (`IdDatosDeFacturacion` ASC) ,
  CONSTRAINT `fk_Facturas_DatosDeFacturacion1`
    FOREIGN KEY (`IdDatosDeFacturacion` )
    REFERENCES `cge_db`.`DatosDeFacturacion` (`IdDatosDeFacturacion` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Facturas_Pagos1`
    FOREIGN KEY (`IdPago` )
    REFERENCES `cge_db`.`Pagos` (`IdPago` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cge_db`.`Refrendos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `cge_db`.`Refrendos` (
  `IdRefrendo` INT(11) NOT NULL ,
  PRIMARY KEY (`IdRefrendo`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cge_db`.`PagosRefrendados`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `cge_db`.`PagosRefrendados` (
  `idPagoRefrendado` INT(11) NOT NULL ,
  `IdPago` INT(11) NOT NULL ,
  `IdRefrendo` INT(11) NOT NULL ,
  PRIMARY KEY (`idPagoRefrendado`) ,
  INDEX `fk_PagosRefrendados_Pagos1` (`IdPago` ASC) ,
  INDEX `fk_PagosRefrendados_Refrendos1` (`IdRefrendo` ASC) ,
  CONSTRAINT `fk_PagosRefrendados_Pagos1`
    FOREIGN KEY (`IdPago` )
    REFERENCES `cge_db`.`Pagos` (`IdPago` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_PagosRefrendados_Refrendos1`
    FOREIGN KEY (`IdRefrendo` )
    REFERENCES `cge_db`.`Refrendos` (`IdRefrendo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cge_db`.`Roles`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `cge_db`.`Roles` (
  `IdRole` INT(11) NOT NULL AUTO_INCREMENT ,
  `NomRole` VARCHAR(30) NULL DEFAULT NULL ,
  PRIMARY KEY (`IdRole`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cge_db`.`UserRoles`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `cge_db`.`UserRoles` (
  `IdUserRole` INT(11) NOT NULL AUTO_INCREMENT ,
  `Usuarios_IdUsuario` INT(11) NOT NULL ,
  `Roles_IdRole` INT(11) NOT NULL ,
  PRIMARY KEY (`IdUserRole`) ,
  INDEX `fk_UserRoles_Usuarios1` (`Usuarios_IdUsuario` ASC) ,
  INDEX `fk_UserRoles_Roles1` (`Roles_IdRole` ASC) ,
  CONSTRAINT `fk_UserRoles_Usuarios1`
    FOREIGN KEY (`Usuarios_IdUsuario` )
    REFERENCES `cge_db`.`Usuarios` (`IdUsuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_UserRoles_Roles1`
    FOREIGN KEY (`Roles_IdRole` )
    REFERENCES `cge_db`.`Roles` (`IdRole` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cge_db`.`catEstados`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `cge_db`.`catEstados` (
  `IdEstado` INT(11) NOT NULL AUTO_INCREMENT ,
  `NomEstado` VARCHAR(255) NULL DEFAULT NULL ,
  `Tipo` VARCHAR(20) NULL DEFAULT NULL ,
  `IdPais` INT(6) UNSIGNED NOT NULL ,
  PRIMARY KEY (`IdEstado`) ,
  INDEX `fk_catEstados_catPaises2_idx` (`IdPais` ASC) ,
  CONSTRAINT `fk_catEstados_catPaises2`
    FOREIGN KEY (`IdPais` )
    REFERENCES `cge_db`.`catPaises` (`IdPais` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 122
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cge_db`.`catMunicipios`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `cge_db`.`catMunicipios` (
  `IdMunicipio` INT(11) NOT NULL AUTO_INCREMENT ,
  `NomMunicipio` VARCHAR(255) NULL DEFAULT NULL ,
  `IdEstado` INT(11) NOT NULL ,
  PRIMARY KEY (`IdMunicipio`) ,
  UNIQUE INDEX `IdMunicipio_UNIQUE` (`IdMunicipio` ASC) ,
  INDEX `fk_catMunicipios_catEstados2_idx` (`IdEstado` ASC) ,
  CONSTRAINT `fk_catMunicipios_catEstados2`
    FOREIGN KEY (`IdEstado` )
    REFERENCES `cge_db`.`catEstados` (`IdEstado` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 3671
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cge_db`.`saeInstitucionEducativa`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `cge_db`.`saeInstitucionEducativa` (
  `IdInstEdu` INT(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT ,
  `NomInstitucion` VARCHAR(255) NULL DEFAULT NULL ,
  `NomCorto` VARCHAR(25) NULL DEFAULT NULL ,
  PRIMARY KEY (`IdInstEdu`) ,
  UNIQUE INDEX `IdInstEdu_UNIQUE` (`IdInstEdu` ASC) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `cge_db`.`archivos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `cge_db`.`archivos` (
  `IdArchivo` INT NOT NULL AUTO_INCREMENT ,
  `nomArchivo` VARCHAR(100) NULL ,
  `url` VARCHAR(100) NULL ,
  `IdTipoDocumento` INT NULL ,
  `IdUsuario` INT(11) NOT NULL ,
  PRIMARY KEY (`IdArchivo`) ,
  INDEX `fk_archivos_Usuarios1` (`IdUsuario` ASC) ,
  CONSTRAINT `fk_archivos_Usuarios1`
    FOREIGN KEY (`IdUsuario` )
    REFERENCES `cge_db`.`Usuarios` (`IdUsuario` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
