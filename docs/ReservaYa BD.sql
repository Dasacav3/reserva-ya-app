-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.18-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para reservaya2
CREATE DATABASE IF NOT EXISTS `reservaya2` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `reservaya2`;

-- Volcando estructura para tabla reservaya2.administrador
CREATE TABLE IF NOT EXISTS `administrador` (
  `ID_ADMIN` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_ADMIN` varchar(60) NOT NULL,
  `APELLIDO_ADMIN` varchar(60) NOT NULL,
  `EMAIL_ADMIN` varchar(70) NOT NULL,
  `CELULAR_ADMIN` varchar(10) NOT NULL,
  `ID_USUARIO` int(11) NOT NULL,
  PRIMARY KEY (`ID_ADMIN`),
  UNIQUE KEY `EMAIL_ADMIN` (`EMAIL_ADMIN`),
  UNIQUE KEY `CELULAR_ADMIN` (`CELULAR_ADMIN`),
  KEY `ID_USUARIO` (`ID_USUARIO`),
  CONSTRAINT `administrador_ibfk_1` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuario` (`ID_USUARIO`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla reservaya2.auditoria_admin
CREATE TABLE IF NOT EXISTS `auditoria_admin` (
  `ID_AUDI` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_ADMIN_ANTERIOR` varchar(60) DEFAULT NULL,
  `APELLIDO_ADMIN_ANTERIOR` varchar(60) DEFAULT NULL,
  `EMAIL_ADMIN_ANTERIOR` varchar(70) DEFAULT NULL,
  `CELULAR_ADMIN_ANTERIOR` varchar(10) DEFAULT NULL,
  `ID_USUARIO_ANTERIOR` int(11) DEFAULT NULL,
  `NOMBRE_ADMIN_NUEVO` varchar(60) DEFAULT NULL,
  `APELLIDO_ADMIN_NUEVO` varchar(60) DEFAULT NULL,
  `EMAIL_ADMIN_NUEVO` varchar(70) DEFAULT NULL,
  `CELULAR_ADMIN_NUEVO` varchar(10) DEFAULT NULL,
  `ID_USUARIO_NUEVO` int(11) DEFAULT NULL,
  `audi_fechamodificacion` datetime NOT NULL,
  `audi_usuario` varchar(45) NOT NULL,
  `ID_ADMIN` int(11) NOT NULL,
  `audi_accion` varchar(45) NOT NULL,
  PRIMARY KEY (`ID_AUDI`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla reservaya2.auditoria_categoria_insumo
CREATE TABLE IF NOT EXISTS `auditoria_categoria_insumo` (
  `ID_AUDI` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_CATEGORIA_INSUMO_ANTERIOR` varchar(100) DEFAULT NULL,
  `NOMBRE_CATEGORIA_INSUMO_NUEVO` varchar(100) DEFAULT NULL,
  `audi_fechamodificacion` datetime NOT NULL,
  `audi_usuario` varchar(45) NOT NULL,
  `ID_CATEGORIA_INSUMO` int(11) NOT NULL,
  `audi_accion` varchar(45) NOT NULL,
  PRIMARY KEY (`ID_AUDI`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla reservaya2.auditoria_categoria_producto
CREATE TABLE IF NOT EXISTS `auditoria_categoria_producto` (
  `ID_AUDI` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_CATEGORIA_PRODUCTO_ANTERIOR` varchar(100) DEFAULT NULL,
  `NOMBRE_CATEGORIA_PRODUCTO_NUEVO` varchar(100) DEFAULT NULL,
  `audi_fechamodificacion` datetime NOT NULL,
  `audi_usuario` varchar(45) NOT NULL,
  `ID_CATEGORIA_PRODUCTO` int(11) NOT NULL,
  `audi_accion` varchar(45) NOT NULL,
  PRIMARY KEY (`ID_AUDI`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla reservaya2.auditoria_cliente
CREATE TABLE IF NOT EXISTS `auditoria_cliente` (
  `ID_AUDI` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_CLIENTE_ANTERIOR` varchar(60) DEFAULT NULL,
  `APELLIDO_CLIENTE_ANTERIOR` varchar(60) DEFAULT NULL,
  `FECHA_NACIMIENTO_CLIENTE_ANTERIOR` date DEFAULT NULL,
  `EMAIL_CLIENTE_ANTERIOR` varchar(70) DEFAULT NULL,
  `CELULAR_CLIENTE_ANTERIOR` varchar(10) DEFAULT NULL,
  `ID_USUARIO_ANTERIOR` int(11) DEFAULT NULL,
  `NOMBRE_CLIENTE_NUEVO` varchar(60) DEFAULT NULL,
  `APELLIDO_CLIENTE_NUEVO` varchar(60) DEFAULT NULL,
  `FECHA_NACIMIENTO_CLIENTE_NUEVO` date DEFAULT NULL,
  `EMAIL_CLIENTE_NUEVO` varchar(70) DEFAULT NULL,
  `CELULAR_CLIENTE_NUEVO` varchar(10) DEFAULT NULL,
  `ID_USUARIO_NUEVO` int(11) DEFAULT NULL,
  `audi_fechamodificacion` datetime NOT NULL,
  `audi_usuario` varchar(45) NOT NULL,
  `ID_CLIENTE` int(11) NOT NULL,
  `audi_accion` varchar(45) NOT NULL,
  PRIMARY KEY (`ID_AUDI`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla reservaya2.auditoria_empleado
CREATE TABLE IF NOT EXISTS `auditoria_empleado` (
  `ID_AUDI` int(11) NOT NULL AUTO_INCREMENT,
  `DOC_EMPLEADO_ANTERIOR` varchar(15) DEFAULT NULL,
  `NOMBRE_EMPLEADO_ANTERIOR` varchar(60) DEFAULT NULL,
  `APELLIDO_EMPLEADO_ANTERIOR` varchar(60) DEFAULT NULL,
  `EMAIL_EMPLEADO_ANTERIOR` varchar(70) DEFAULT NULL,
  `CELULAR_EMPLEADO_ANTERIOR` varchar(10) DEFAULT NULL,
  `ID_USUARIO_ANTERIOR` int(11) DEFAULT NULL,
  `DOC_EMPLEADO_NUEVO` varchar(15) DEFAULT NULL,
  `NOMBRE_EMPLEADO_NUEVO` varchar(60) DEFAULT NULL,
  `APELLIDO_EMPLEADO_NUEVO` varchar(60) DEFAULT NULL,
  `EMAIL_EMPLEADO_NUEVO` varchar(70) DEFAULT NULL,
  `CELULAR_EMPLEADO_NUEVO` varchar(10) DEFAULT NULL,
  `ID_USUARIO_NUEVO` int(11) DEFAULT NULL,
  `audi_fechamodificacion` datetime NOT NULL,
  `audi_usuario` varchar(45) NOT NULL,
  `ID_EMPLEADO` int(11) NOT NULL,
  `audi_accion` varchar(45) NOT NULL,
  PRIMARY KEY (`ID_AUDI`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla reservaya2.auditoria_insumo
CREATE TABLE IF NOT EXISTS `auditoria_insumo` (
  `ID_AUDI` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_INSUMO_ANTERIOR` varchar(70) DEFAULT NULL,
  `CANTIDAD_INSUMO_ANTERIOR` int(11) DEFAULT NULL,
  `FECHA_COMPRA_INSUMO_ANTERIOR` date DEFAULT NULL,
  `VALOR_INSUMO_ANTERIOR` double DEFAULT NULL,
  `ID_PROVEEDOR_ANTERIOR` int(11) DEFAULT NULL,
  `ID_CATEGORIA_INSUMO_ANTERIOR` int(11) DEFAULT NULL,
  `NOMBRE_INSUMO_NUEVO` varchar(70) DEFAULT NULL,
  `CANTIDAD_INSUMO_NUEVO` int(11) DEFAULT NULL,
  `FECHA_COMPRA_INSUMO_NUEVO` date DEFAULT NULL,
  `VALOR_INSUMO_NUEVO` double DEFAULT NULL,
  `ID_PROVEEDOR_NUEVO` int(11) DEFAULT NULL,
  `ID_CATEGORIA_INSUMO_NUEVO` int(11) DEFAULT NULL,
  `audi_fechamodificacion` datetime NOT NULL,
  `audi_usuario` varchar(45) NOT NULL,
  `ID_INSUMO` int(11) NOT NULL,
  `audi_accion` varchar(45) NOT NULL,
  PRIMARY KEY (`ID_AUDI`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla reservaya2.auditoria_mesa
CREATE TABLE IF NOT EXISTS `auditoria_mesa` (
  `ID_AUDI` int(11) NOT NULL AUTO_INCREMENT,
  `CAPACIDAD_MESA_ANTERIOR` int(2) DEFAULT NULL,
  `ESTADO_MESA_ANTERIOR` enum('Disponible','Ocupada') DEFAULT NULL,
  `CAPACIDAD_MESA_NUEVA` int(2) DEFAULT NULL,
  `ESTADO_MESA_NUEVA` enum('Disponible','Ocupada') DEFAULT NULL,
  `audi_fechamodificacion` datetime NOT NULL,
  `audi_usuario` varchar(45) NOT NULL,
  `ID_MESA` int(11) NOT NULL,
  `audi_accion` varchar(45) NOT NULL,
  PRIMARY KEY (`ID_AUDI`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla reservaya2.auditoria_producto
CREATE TABLE IF NOT EXISTS `auditoria_producto` (
  `ID_AUDI` int(11) NOT NULL AUTO_INCREMENT,
  `ID_CATEGORIA_PRODUCTO_ANTERIOR` int(11) DEFAULT NULL,
  `NOMBRE_PRODUCTO_ANTERIOR` varchar(70) DEFAULT NULL,
  `DESCRIPCION_PRODUCTO_ANTERIOR` varchar(255) DEFAULT NULL,
  `CANTIDAD_PRODUCTO_ANTERIOR` int(11) DEFAULT NULL,
  `VALOR_PRODUCTO_ANTERIOR` double DEFAULT NULL,
  `IMAGEN_PRODUCTO_ANTERIOR` varchar(255) DEFAULT NULL,
  `ID_CATEGORIA_PRODUCTO_NUEVO` int(11) DEFAULT NULL,
  `NOMBRE_PRODUCTO_NUEVO` varchar(70) DEFAULT NULL,
  `DESCRIPCION_PRODUCTO_NUEVO` varchar(255) DEFAULT NULL,
  `CANTIDAD_PRODUCTO_NUEVO` int(11) DEFAULT NULL,
  `VALOR_PRODUCTO_NUEVO` double DEFAULT NULL,
  `IMAGEN_PRODUCTO_NUEVO` varchar(255) DEFAULT NULL,
  `audi_fechamodificacion` datetime NOT NULL,
  `audi_usuario` varchar(45) NOT NULL,
  `ID_PRODUCTO` int(11) NOT NULL,
  `audi_accion` varchar(45) NOT NULL,
  PRIMARY KEY (`ID_AUDI`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla reservaya2.auditoria_proveedor
CREATE TABLE IF NOT EXISTS `auditoria_proveedor` (
  `ID_AUDI` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_PROVEEDOR_ANTERIOR` varchar(70) DEFAULT NULL,
  `DIRECCION_PROVEEDOR_ANTERIOR` varchar(100) DEFAULT NULL,
  `PERSONA_ENCARGADA_ANTERIOR` varchar(70) DEFAULT NULL,
  `TELEFONO_PROVEEDOR_ANTERIOR` int(10) DEFAULT NULL,
  `NOMBRE_PROVEEDOR_NUEVO` varchar(70) DEFAULT NULL,
  `DIRECCION_PROVEEDOR_NUEVO` varchar(100) DEFAULT NULL,
  `PERSONA_ENCARGADA_NUEVO` varchar(70) DEFAULT NULL,
  `TELEFONO_PROVEEDOR_NUEVO` int(10) DEFAULT NULL,
  `audi_fechamodificacion` datetime NOT NULL,
  `audi_usuario` varchar(45) NOT NULL,
  `ID_PROVEEDOR` int(11) NOT NULL,
  `audi_accion` varchar(45) NOT NULL,
  PRIMARY KEY (`ID_AUDI`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla reservaya2.auditoria_reservacion
CREATE TABLE IF NOT EXISTS `auditoria_reservacion` (
  `ID_AUDI` int(11) NOT NULL AUTO_INCREMENT,
  `ID_CLIENTE_ANTERIOR` int(11) DEFAULT NULL,
  `FECHA_RESERVACION_ANTERIOR` date DEFAULT NULL,
  `HORA_RESERVACION_ANTERIOR` time DEFAULT NULL,
  `ESTADO_RESERVACION_ANTERIOR` enum('Activa','Completada','Cancelada') DEFAULT NULL,
  `ASIENTO_ANTERIOR` int(2) DEFAULT NULL,
  `ID_CLIENTE_NUEVO` int(11) DEFAULT NULL,
  `FECHA_RESERVACION_NUEVO` date DEFAULT NULL,
  `HORA_RESERVACION_NUEVO` time DEFAULT NULL,
  `ESTADO_RESERVACION_NUEVO` enum('Activa','Completada','Cancelada') DEFAULT NULL,
  `ASIENTO_NUEVO` int(2) DEFAULT NULL,
  `audi_fechamodificacion` datetime NOT NULL,
  `audi_usuario` varchar(45) NOT NULL,
  `ID_RESERVACION` int(11) NOT NULL,
  `audi_accion` varchar(45) NOT NULL,
  PRIMARY KEY (`ID_AUDI`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla reservaya2.auditoria_reservacion_reserva_mesa
CREATE TABLE IF NOT EXISTS `auditoria_reservacion_reserva_mesa` (
  `ID_AUDI` int(11) NOT NULL AUTO_INCREMENT,
  `ID_RESERVACION_ANTERIOR` int(11) DEFAULT NULL,
  `ID_MESA_ANTERIOR` int(11) DEFAULT NULL,
  `ID_RESERVACION_NUEVO` int(11) DEFAULT NULL,
  `ID_MESA_NUEVO` int(11) DEFAULT NULL,
  `audi_fechamodificacion` datetime NOT NULL,
  `audi_usuario` varchar(45) NOT NULL,
  `ID_RESERVACION_RESERVA_MESA` int(11) NOT NULL,
  `audi_accion` varchar(45) NOT NULL,
  PRIMARY KEY (`ID_AUDI`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla reservaya2.auditoria_usuario
CREATE TABLE IF NOT EXISTS `auditoria_usuario` (
  `ID_AUDI` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_USUARIO_ANTERIOR` varchar(70) DEFAULT NULL,
  `CLAVE_USUARIO_ANTERIOR` varchar(255) DEFAULT NULL,
  `TIPO_USUARIO_ANTERIOR` enum('Cliente','Empleado','Administrador') DEFAULT NULL,
  `ESTADO_USUARIO_ANTERIOR` enum('Activo','Inactivo') DEFAULT NULL,
  `FOTO_PERFIL_ANTERIOR` varchar(255) DEFAULT NULL,
  `NOMBRE_USUARIO_NUEVO` varchar(70) DEFAULT NULL,
  `CLAVE_USUARIO_NUEVO` varchar(255) DEFAULT NULL,
  `TIPO_USUARIO_NUEVO` enum('Cliente','Empleado','Administrador') DEFAULT NULL,
  `ESTADO_USUARIO_NUEVO` enum('Activo','Inactivo') DEFAULT NULL,
  `FOTO_PERFIL_NUEVO` varchar(255) DEFAULT NULL,
  `audi_fechamodificacion` datetime NOT NULL,
  `audi_usuario` varchar(45) NOT NULL,
  `ID_USUARIO` int(11) NOT NULL,
  `audi_accion` varchar(45) NOT NULL,
  PRIMARY KEY (`ID_AUDI`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla reservaya2.auditoria_usuario_accede_insumo
CREATE TABLE IF NOT EXISTS `auditoria_usuario_accede_insumo` (
  `ID_AUDI` int(11) NOT NULL AUTO_INCREMENT,
  `ID_USUARIO_ANTERIOR` int(11) DEFAULT NULL,
  `ID_INSUMO_ANTERIOR` int(11) DEFAULT NULL,
  `ID_USUARIO_NUEVO` int(11) DEFAULT NULL,
  `ID_INSUMO_NUEVO` int(11) DEFAULT NULL,
  `audi_fechamodificacion` datetime NOT NULL,
  `audi_usuario` varchar(45) NOT NULL,
  `ID_USUARIO_ACCEDE_INSUMO` int(11) NOT NULL,
  `audi_accion` varchar(45) NOT NULL,
  PRIMARY KEY (`ID_AUDI`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla reservaya2.auditoria_usuario_visualiza_producto
CREATE TABLE IF NOT EXISTS `auditoria_usuario_visualiza_producto` (
  `ID_AUDI` int(11) NOT NULL AUTO_INCREMENT,
  `ID_USUARIO_ANTERIOR` int(11) DEFAULT NULL,
  `ID_PRODUCTO_ANTERIOR` int(11) DEFAULT NULL,
  `ID_USUARIO_NUEVO` int(11) DEFAULT NULL,
  `ID_PRODUCTO_NUEVO` int(11) DEFAULT NULL,
  `audi_fechamodificacion` datetime NOT NULL,
  `audi_usuario` varchar(45) NOT NULL,
  `ID_USUARIO_VISUALIZA_PRODUCTO` int(11) NOT NULL,
  `audi_accion` varchar(45) NOT NULL,
  PRIMARY KEY (`ID_AUDI`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla reservaya2.categoria_insumo
CREATE TABLE IF NOT EXISTS `categoria_insumo` (
  `ID_CATEGORIA_INSUMO` int(11) NOT NULL,
  `NOMBRE_CATEGORIA_INSUMO` varchar(100) NOT NULL,
  PRIMARY KEY (`ID_CATEGORIA_INSUMO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla reservaya2.categoria_producto
CREATE TABLE IF NOT EXISTS `categoria_producto` (
  `ID_CATEGORIA_PRODUCTO` int(11) NOT NULL,
  `NOMBRE_CATEGORIA_PRODUCTO` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_CATEGORIA_PRODUCTO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla reservaya2.cliente
CREATE TABLE IF NOT EXISTS `cliente` (
  `ID_CLIENTE` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_CLIENTE` varchar(60) NOT NULL,
  `APELLIDO_CLIENTE` varchar(60) NOT NULL,
  `FECHA_NACIMIENTO_CLIENTE` date NOT NULL,
  `EMAIL_CLIENTE` varchar(70) NOT NULL,
  `CELULAR_CLIENTE` varchar(10) NOT NULL,
  `ID_USUARIO` int(11) NOT NULL,
  PRIMARY KEY (`ID_CLIENTE`),
  UNIQUE KEY `EMAIL_CLIENTE` (`EMAIL_CLIENTE`),
  UNIQUE KEY `CELULAR_CLIENTE` (`CELULAR_CLIENTE`),
  KEY `ID_USUARIO` (`ID_USUARIO`),
  CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuario` (`ID_USUARIO`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla reservaya2.empleado
CREATE TABLE IF NOT EXISTS `empleado` (
  `ID_EMPLEADO` int(11) NOT NULL AUTO_INCREMENT,
  `DOC_EMPLEADO` varchar(15) NOT NULL,
  `NOMBRE_EMPLEADO` varchar(60) NOT NULL,
  `APELLIDO_EMPLEADO` varchar(60) NOT NULL,
  `EMAIL_EMPLEADO` varchar(70) NOT NULL,
  `CELULAR_EMPLEADO` varchar(10) NOT NULL,
  `ID_USUARIO` int(11) NOT NULL,
  PRIMARY KEY (`ID_EMPLEADO`),
  UNIQUE KEY `DOC_EMPLEADO` (`DOC_EMPLEADO`),
  UNIQUE KEY `EMAIL_EMPLEADO` (`EMAIL_EMPLEADO`),
  UNIQUE KEY `CELULAR_EMPLEADO` (`CELULAR_EMPLEADO`),
  KEY `ID_USUARIO` (`ID_USUARIO`),
  CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuario` (`ID_USUARIO`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla reservaya2.insumo
CREATE TABLE IF NOT EXISTS `insumo` (
  `ID_INSUMO` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_INSUMO` varchar(70) NOT NULL,
  `CANTIDAD_INSUMO` int(11) NOT NULL,
  `FECHA_COMPRA_INSUMO` date NOT NULL,
  `VALOR_INSUMO` double NOT NULL,
  `ID_PROVEEDOR` int(11) NOT NULL,
  `ID_CATEGORIA_INSUMO` int(11) NOT NULL,
  PRIMARY KEY (`ID_INSUMO`),
  KEY `ID_PROVEEDOR` (`ID_PROVEEDOR`),
  KEY `ID_CATEGORIA_INSUMO` (`ID_CATEGORIA_INSUMO`),
  CONSTRAINT `insumo_ibfk_1` FOREIGN KEY (`ID_PROVEEDOR`) REFERENCES `proveedor` (`ID_PROVEEDOR`) ON UPDATE CASCADE,
  CONSTRAINT `insumo_ibfk_2` FOREIGN KEY (`ID_CATEGORIA_INSUMO`) REFERENCES `categoria_insumo` (`ID_CATEGORIA_INSUMO`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla reservaya2.mesa
CREATE TABLE IF NOT EXISTS `mesa` (
  `ID_MESA` int(6) NOT NULL AUTO_INCREMENT,
  `CAPACIDAD_MESA` int(2) NOT NULL,
  `ESTADO_MESA` enum('Disponible','Ocupada') NOT NULL,
  PRIMARY KEY (`ID_MESA`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla reservaya2.producto
CREATE TABLE IF NOT EXISTS `producto` (
  `ID_PRODUCTO` int(11) NOT NULL AUTO_INCREMENT,
  `ID_CATEGORIA_PRODUCTO` int(11) NOT NULL,
  `NOMBRE_PRODUCTO` varchar(70) NOT NULL,
  `DESCRIPCION_PRODUCTO` varchar(255) NOT NULL,
  `CANTIDAD_PRODUCTO` int(11) NOT NULL,
  `VALOR_PRODUCTO` double NOT NULL,
  `IMAGEN_PRODUCTO` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_PRODUCTO`),
  KEY `ID_CATEGORIA_PRODUCTO` (`ID_CATEGORIA_PRODUCTO`),
  KEY `verProducto` (`ID_PRODUCTO`,`NOMBRE_PRODUCTO`,`VALOR_PRODUCTO`),
  CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`ID_CATEGORIA_PRODUCTO`) REFERENCES `categoria_producto` (`ID_CATEGORIA_PRODUCTO`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla reservaya2.proveedor
CREATE TABLE IF NOT EXISTS `proveedor` (
  `ID_PROVEEDOR` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_PROVEEDOR` varchar(70) NOT NULL,
  `DIRECCION_PROVEEDOR` varchar(100) NOT NULL,
  `PERSONA_ENCARGADA` varchar(70) NOT NULL,
  `TELEFONO_PROVEEDOR` varchar(10) NOT NULL,
  PRIMARY KEY (`ID_PROVEEDOR`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla reservaya2.reservacion
CREATE TABLE IF NOT EXISTS `reservacion` (
  `ID_RESERVACION` int(11) NOT NULL AUTO_INCREMENT,
  `ID_CLIENTE` int(11) NOT NULL,
  `FECHA_RESERVACION` date NOT NULL,
  `HORA_RESERVACION` time NOT NULL,
  `ESTADO_RESERVACION` enum('Activa','Completada','Cancelada') NOT NULL,
  `ASIENTO` int(2) NOT NULL,
  PRIMARY KEY (`ID_RESERVACION`),
  KEY `ID_CLIENTE` (`ID_CLIENTE`),
  CONSTRAINT `reservacion_ibfk_1` FOREIGN KEY (`ID_CLIENTE`) REFERENCES `cliente` (`ID_CLIENTE`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=167 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla reservaya2.reservacion_reserva_mesa
CREATE TABLE IF NOT EXISTS `reservacion_reserva_mesa` (
  `ID_RESERVACION_RESERVA_MESA` int(11) NOT NULL AUTO_INCREMENT,
  `ID_RESERVACION` int(11) NOT NULL,
  `ID_MESA` int(11) NOT NULL,
  PRIMARY KEY (`ID_RESERVACION_RESERVA_MESA`),
  KEY `ID_RESERVACION` (`ID_RESERVACION`),
  KEY `ID_MESA` (`ID_MESA`),
  CONSTRAINT `reservacion_reserva_mesa_ibfk_1` FOREIGN KEY (`ID_RESERVACION`) REFERENCES `reservacion` (`ID_RESERVACION`) ON UPDATE CASCADE,
  CONSTRAINT `reservacion_reserva_mesa_ibfk_2` FOREIGN KEY (`ID_MESA`) REFERENCES `mesa` (`ID_MESA`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=140 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla reservaya2.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `ID_USUARIO` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_USUARIO` varchar(70) NOT NULL,
  `CLAVE_USUARIO` varchar(255) NOT NULL,
  `TIPO_USUARIO` enum('Cliente','Empleado','Administrador') NOT NULL,
  `ESTADO_USUARIO` enum('Activo','Inactivo') NOT NULL,
  `FOTO_PERFIL` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_USUARIO`),
  UNIQUE KEY `NOMBRE_USUARIO` (`NOMBRE_USUARIO`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla reservaya2.usuario_accede_insumo
CREATE TABLE IF NOT EXISTS `usuario_accede_insumo` (
  `ID_USUARIO` int(11) NOT NULL,
  `ID_INSUMO` int(11) NOT NULL,
  `ID_USUARIO_ACCEDE_INSUMO` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID_USUARIO_ACCEDE_INSUMO`),
  KEY `ID_USUARIO` (`ID_USUARIO`),
  KEY `ID_INSUMO` (`ID_INSUMO`),
  CONSTRAINT `usuario_accede_insumo_ibfk_1` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuario` (`ID_USUARIO`) ON UPDATE CASCADE,
  CONSTRAINT `usuario_accede_insumo_ibfk_2` FOREIGN KEY (`ID_INSUMO`) REFERENCES `insumo` (`ID_INSUMO`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla reservaya2.usuario_visualiza_producto
CREATE TABLE IF NOT EXISTS `usuario_visualiza_producto` (
  `ID_USUARIO` int(11) NOT NULL,
  `ID_PRODUCTO` int(11) NOT NULL,
  `ID_USUARIO_VISUALIZA_PRODUCTO` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID_USUARIO_VISUALIZA_PRODUCTO`),
  KEY `ID_USUARIO` (`ID_USUARIO`),
  KEY `ID_PRODUCTO` (`ID_PRODUCTO`),
  CONSTRAINT `usuario_visualiza_producto_ibfk_1` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuario` (`ID_USUARIO`) ON UPDATE CASCADE,
  CONSTRAINT `usuario_visualiza_producto_ibfk_2` FOREIGN KEY (`ID_PRODUCTO`) REFERENCES `producto` (`ID_PRODUCTO`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para disparador reservaya2.auditoria_deleteadmin
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER auditoria_deleteadmin after delete on administrador
for each row
insert into auditoria_admin
(NOMBRE_ADMIN_ANTERIOR,
APELLIDO_ADMIN_ANTERIOR,
EMAIL_ADMIN_ANTERIOR,
CELULAR_ADMIN_ANTERIOR,
ID_USUARIO_ANTERIOR,
audi_fechamodificacion,
audi_usuario,
ID_ADMIN,
audi_accion
)
values
(old.NOMBRE_ADMIN,old.APELLIDO_ADMIN,old.EMAIL_ADMIN,old.CELULAR_ADMIN,old.ID_USUARIO,
now(),current_user(),old.ID_ADMIN,'Eliminar')//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador reservaya2.auditoria_deletecliente
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER auditoria_deletecliente after delete on cliente
for each row
insert into auditoria_cliente
(NOMBRE_CLIENTE_ANTERIOR,
APELLIDO_CLIENTE_ANTERIOR,
FECHA_NACIMIENTO_CLIENTE_ANTERIOR,
EMAIL_CLIENTE_ANTERIOR,
CELULAR_CLIENTE_ANTERIOR,
ID_USUARIO_ANTERIOR,
audi_fechamodificacion,
audi_usuario,
ID_CLIENTE,
audi_accion
)
values
(old.NOMBRE_CLIENTE,old.APELLIDO_CLIENTE,old.FECHA_NACIMIENTO_CLIENTE,old.EMAIL_CLIENTE,old.CELULAR_CLIENTE,old.ID_USUARIO,
now(),current_user(),old.ID_CLIENTE,'Eliminar')//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador reservaya2.auditoria_deleteempleado
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER auditoria_deleteempleado after delete on empleado
for each row
insert into auditoria_empleado
(DOC_EMPLEADO_ANTERIOR,
NOMBRE_EMPLEADO_ANTERIOR,
APELLIDO_EMPLEADO_ANTERIOR,
EMAIL_EMPLEADO_ANTERIOR,
CELULAR_EMPLEADO_ANTERIOR,
ID_USUARIO_ANTERIOR,
audi_fechamodificacion,
audi_usuario,
ID_EMPLEADO,
audi_accion
)
values
(old.DOC_EMPLEADO,old.NOMBRE_EMPLEADO,old.APELLIDO_EMPLEADO,old.EMAIL_EMPLEADO,old.CELULAR_EMPLEADO,old.ID_USUARIO,
now(),current_user(),old.ID_EMPLEADO,'Eliminar')//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador reservaya2.auditoria_deleteinsumo
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER auditoria_deleteinsumo after delete on insumo
for each row
insert into auditoria_insumo
(NOMBRE_INSUMO_ANTERIOR,
CANTIDAD_INSUMO_ANTERIOR,
FECHA_COMPRA_INSUMO_ANTERIOR,
VALOR_INSUMO_ANTERIOR,
ID_PROVEEDOR_ANTERIOR,
ID_CATEGORIA_INSUMO_ANTERIOR,
audi_fechamodificacion,
audi_usuario,
ID_INSUMO,
audi_accion
)
values
(old.NOMBRE_INSUMO,old.CANTIDAD_INSUMO,old.FECHA_COMPRA_INSUMO,old.VALOR_INSUMO,old.ID_PROVEEDOR,old.ID_CATEGORIA_INSUMO,
now(),current_user(),old.ID_INSUMO,'Eliminar')//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador reservaya2.auditoria_deleteproducto
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER auditoria_deleteproducto after delete on producto
for each row
insert into auditoria_producto
(ID_CATEGORIA_PRODUCTO_ANTERIOR,
NOMBRE_PRODUCTO_ANTERIOR,
DESCRIPCION_PRODUCTO_ANTERIOR,
CANTIDAD_PRODUCTO_ANTERIOR,
VALOR_PRODUCTO_ANTERIOR,
IMAGEN_PRODUCTO_ANTERIOR,
audi_fechamodificacion,
audi_usuario,
ID_PRODUCTO,
audi_accion
)
values
(old.ID_CATEGORIA_PRODUCTO,old.NOMBRE_PRODUCTO,old.DESCRIPCION_PRODUCTO,old.CANTIDAD_PRODUCTO,old.VALOR_PRODUCTO,old.IMAGEN_PRODUCTO,
now(),current_user(),old.ID_PRODUCTO,'Eliminar')//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador reservaya2.auditoria_deleteproveedor
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER auditoria_deleteproveedor after delete on proveedor
for each row
insert into auditoria_PROVEEDOR
(NOMBRE_PROVEEDOR_ANTERIOR,
DIRECCION_PROVEEDOR_ANTERIOR,
PERSONA_ENCARGADA_ANTERIOR,
TELEFONO_PROVEEDOR_ANTERIOR,
audi_fechamodificacion,
audi_usuario,
ID_PROVEEDOR,
audi_accion
)
values
(old.NOMBRE_PROVEEDOR,old.DIRECCION_PROVEEDOR,old.PERSONA_ENCARGADA,old.TELEFONO_PROVEEDOR,
now(),current_user(),old.ID_PROVEEDOR,'Eliminar')//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador reservaya2.auditoria_deletereservacion
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER auditoria_deletereservacion AFTER DELETE on RESERVACION
for each row
insert into auditoria_reservacion
(ID_CLIENTE_ANTERIOR,
FECHA_RESERVACION_ANTERIOR,
HORA_RESERVACION_ANTERIOR,
ESTADO_RESERVACION_ANTERIOR,
ASIENTO_ANTERIOR,
audi_fechamodificacion,
audi_usuario,
ID_RESERVACION,
audi_accion
)
values
(old.ID_CLIENTE,old.FECHA_RESERVACION ,old.HORA_RESERVACION,old.ESTADO_RESERVACION,old.ASIENTO,
now(),current_user(),old.ID_RESERVACION ,'Eliminar')//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador reservaya2.auditoria_deleteusuario
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER auditoria_deleteusuario after delete on usuario
for each row
insert into auditoria_usuario
(NOMBRE_USUARIO_ANTERIOR,
CLAVE_USUARIO_ANTERIOR,
TIPO_USUARIO_ANTERIOR,
ESTADO_USUARIO_ANTERIOR,
FOTO_PERFIL_ANTERIOR,
audi_fechamodificacion,
audi_usuario,
ID_USUARIO,
audi_accion
)
values
(old.NOMBRE_USUARIO,old.CLAVE_USUARIO,old.TIPO_USUARIO,old.ESTADO_USUARIO,old.FOTO_PERFIL,
now(),current_user(),old.ID_USUARIO,'Eliminar')//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador reservaya2.auditoria_delete_CATEGORIA_INSUMO
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER auditoria_delete_CATEGORIA_INSUMO after delete on CATEGORIA_INSUMO
for each row
insert into auditoria_CATEGORIA_INSUMO
(NOMBRE_CATEGORIA_INSUMO_ANTERIOR,
audi_fechamodificacion,
audi_usuario,
ID_CATEGORIA_INSUMO,
audi_accion
)
values
(old.NOMBRE_CATEGORIA_INSUMO,
now(),current_user(),old.ID_CATEGORIA_INSUMO,'Eliminar')//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador reservaya2.auditoria_delete_categoria_producto
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER auditoria_delete_categoria_producto after delete on categoria_producto
for each row
insert into auditoria_categoria_producto
(NOMBRE_CATEGORIA_PRODUCTO_ANTERIOR,
audi_fechamodificacion,
audi_usuario,
ID_CATEGORIA_PRODUCTO,
audi_accion
)
values
(old.NOMBRE_CATEGORIA_PRODUCTO,
now(),current_user(),old.ID_CATEGORIA_PRODUCTO,'Eliminar')//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador reservaya2.auditoria_delete_RESERVACION_RESERVA_MESA
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER auditoria_delete_RESERVACION_RESERVA_MESA after delete on RESERVACION_RESERVA_MESA
for each row
insert into auditoria_RESERVACION_RESERVA_MESA
(ID_RESERVACION_ANTERIOR,
ID_MESA_ANTERIOR,
audi_fechamodificacion,
audi_usuario,
ID_RESERVACION_RESERVA_MESA,
audi_accion
)
values
(old.ID_RESERVACION,old.ID_MESA,
now(),current_user(),old.ID_RESERVACION_RESERVA_MESA ,'Eliminar')//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador reservaya2.auditoria_delete_USUARIO_ACCEDE_INSUMO
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER auditoria_delete_USUARIO_ACCEDE_INSUMO after delete on USUARIO_ACCEDE_INSUMO
for each row
insert into auditoria_USUARIO_ACCEDE_INSUMO
(ID_USUARIO_ANTERIOR,
ID_INSUMO_ANTERIOR,
audi_fechamodificacion,
audi_usuario,
ID_USUARIO_ACCEDE_INSUMO,
audi_accion
)
values
(old.ID_USUARIO,old.ID_INSUMO,
now(),current_user(),old.ID_USUARIO_ACCEDE_INSUMO,'Eliminar')//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador reservaya2.auditoria_delete_usuario_visualiza_producto
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER auditoria_delete_usuario_visualiza_producto after delete on usuario_visualiza_producto
for each row
insert into auditoria_usuario_visualiza_producto
(ID_USUARIO_ANTERIOR,
ID_PRODUCTO_ANTERIOR,
audi_fechamodificacion,
audi_usuario,
ID_USUARIO_VISUALIZA_PRODUCTO,
audi_accion
)
values
(old.ID_USUARIO,old.ID_PRODUCTO,
now(),current_user(),old.ID_USUARIO_VISUALIZA_PRODUCTO,'Eliminar')//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador reservaya2.auditoria_deletmesa
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER auditoria_deletmesa AFTER DELETE on MESA
for each row
insert into auditoria_mesa
(CAPACIDAD_MESA_ANTERIOR,
ESTADO_MESA_ANTERIOR,
audi_fechamodificacion,
audi_usuario,
ID_MESA,
audi_accion
)
values
(old.CAPACIDAD_MESA ,old.ESTADO_MESA,
now(),current_user(),old.ID_MESA,'ELIMINAR')//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador reservaya2.auditoria_insertadmin
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER auditoria_insertadmin before insert on administrador
for each row
insert into auditoria_admin
(NOMBRE_ADMIN_NUEVO,
APELLIDO_ADMIN_NUEVO,
EMAIL_ADMIN_NUEVO,
CELULAR_ADMIN_NUEVO,
ID_USUARIO_NUEVO,
audi_fechamodificacion,
audi_usuario,
ID_ADMIN,
audi_accion
)
values
(new.NOMBRE_ADMIN,new.APELLIDO_ADMIN,new.EMAIL_ADMIN,new.CELULAR_ADMIN,new.ID_USUARIO,
now(),current_user(),new.ID_ADMIN,'Insercion')//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador reservaya2.auditoria_insertcliente
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER auditoria_insertcliente before insert on cliente
for each row
insert into auditoria_cliente
(NOMBRE_CLIENTE_NUEVO,
APELLIDO_CLIENTE_NUEVO,
FECHA_NACIMIENTO_CLIENTE_NUEVO,
EMAIL_CLIENTE_NUEVO,
CELULAR_CLIENTE_NUEVO,
ID_USUARIO_NUEVO,
audi_fechamodificacion,
audi_usuario,
ID_CLIENTE,
audi_accion
)
values
(new.NOMBRE_CLIENTE,new.APELLIDO_CLIENTE,new.FECHA_NACIMIENTO_CLIENTE,new.EMAIL_CLIENTE,new.CELULAR_CLIENTE,new.ID_USUARIO,
now(),current_user(),new.ID_CLIENTE,'Insercion')//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador reservaya2.auditoria_insertempleado
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER auditoria_insertempleado before insert on empleado
for each row
insert into auditoria_empleado
(DOC_EMPLEADO_NUEVO,
NOMBRE_EMPLEADO_NUEVO,
APELLIDO_EMPLEADO_NUEVO,
EMAIL_EMPLEADO_NUEVO,
CELULAR_EMPLEADO_NUEVO,
ID_USUARIO_NUEVO,
audi_fechamodificacion,
audi_usuario,
ID_EMPLEADO,
audi_accion
)
values
(new.DOC_EMPLEADO,new.NOMBRE_EMPLEADO,new.APELLIDO_EMPLEADO,new.EMAIL_EMPLEADO,new.CELULAR_EMPLEADO,new.ID_USUARIO,
now(),current_user(),new.ID_EMPLEADO,'Insercion')//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador reservaya2.auditoria_insertinsumo
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER auditoria_insertinsumo before insert on insumo
for each row
insert into auditoria_insumo
(NOMBRE_INSUMO_NUEVO,
CANTIDAD_INSUMO_NUEVO,
FECHA_COMPRA_INSUMO_NUEVO,
VALOR_INSUMO_NUEVO,
ID_PROVEEDOR_NUEVO,
ID_CATEGORIA_INSUMO_NUEVO,
audi_fechamodificacion,
audi_usuario,
ID_INSUMO,
audi_accion
)
values
(new.NOMBRE_INSUMO,new.CANTIDAD_INSUMO,new.FECHA_COMPRA_INSUMO,new.VALOR_INSUMO,new.ID_PROVEEDOR,new.ID_CATEGORIA_INSUMO,
now(),current_user(),new.ID_INSUMO,'Insercion')//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador reservaya2.auditoria_insertmesa
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER auditoria_insertmesa before insert on MESA
for each row
insert into auditoria_mesa
(
CAPACIDAD_MESA_NUEVA,
ESTADO_MESA_NUEVA,
audi_fechamodificacion,
audi_usuario,
ID_MESA,
audi_accion
)
values
(new.CAPACIDAD_MESA,new.ESTADO_MESA,
now(),current_user(),new.ID_MESA,'Insercion')//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador reservaya2.auditoria_insertproducto
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER auditoria_insertproducto before insert on producto
for each row
insert into auditoria_producto
(ID_CATEGORIA_PRODUCTO_NUEVO,
NOMBRE_PRODUCTO_NUEVO,
DESCRIPCION_PRODUCTO_NUEVO,
CANTIDAD_PRODUCTO_NUEVO,
VALOR_PRODUCTO_NUEVO,
IMAGEN_PRODUCTO_NUEVO,
audi_fechamodificacion,
audi_usuario,
ID_PRODUCTO,
audi_accion
)
values
(new.ID_CATEGORIA_PRODUCTO,new.NOMBRE_PRODUCTO,new.DESCRIPCION_PRODUCTO,new.CANTIDAD_PRODUCTO,new.VALOR_PRODUCTO,new.IMAGEN_PRODUCTO,
now(),current_user(),new.ID_PRODUCTO,'Insercion')//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador reservaya2.auditoria_insertproveedor
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER auditoria_insertproveedor before insert on proveedor
for each row
insert into auditoria_PROVEEDOR
(NOMBRE_PROVEEDOR_NUEVO,
DIRECCION_PROVEEDOR_NUEVO,
PERSONA_ENCARGADA_NUEVO,
TELEFONO_PROVEEDOR_NUEVO,
audi_fechamodificacion,
audi_usuario,
ID_PROVEEDOR,
audi_accion
)
values
(new.NOMBRE_PROVEEDOR,new.DIRECCION_PROVEEDOR,new.PERSONA_ENCARGADA,new.TELEFONO_PROVEEDOR,
now(),current_user(),new.ID_PROVEEDOR,'Insercion')//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador reservaya2.auditoria_insertreservacion
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER auditoria_insertreservacion before INSERT on RESERVACION
for each row
insert into auditoria_reservacion
(
ID_CLIENTE_NUEVO,
FECHA_RESERVACION_NUEVO,
HORA_RESERVACION_NUEVO,
ESTADO_RESERVACION_NUEVO,
ASIENTO_NUEVO,
audi_fechamodificacion,
audi_usuario,
ID_RESERVACION,
audi_accion
)
values
(
new.ID_CLIENTE,new.FECHA_RESERVACION ,new.HORA_RESERVACION,new.ESTADO_RESERVACION,new.ASIENTO,
now(),current_user(),new.ID_RESERVACION ,'Insertar')//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador reservaya2.auditoria_insertusuario
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER auditoria_insertusuario before insert on usuario
for each row
insert into auditoria_usuario
(NOMBRE_USUARIO_NUEVO,
CLAVE_USUARIO_NUEVO,
TIPO_USUARIO_NUEVO,
ESTADO_USUARIO_NUEVO,
FOTO_PERFIL_NUEVO,
audi_fechamodificacion,
audi_usuario,
ID_USUARIO,
audi_accion
)
values
(new.NOMBRE_USUARIO,new.CLAVE_USUARIO,new.TIPO_USUARIO,new.ESTADO_USUARIO,new.FOTO_PERFIL,
now(),current_user(),new.ID_USUARIO,'Insercion')//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador reservaya2.auditoria_insert_CATEGORIA_INSUMO
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER auditoria_insert_CATEGORIA_INSUMO before insert on CATEGORIA_INSUMO
for each row
insert into auditoria_CATEGORIA_INSUMO
(NOMBRE_CATEGORIA_INSUMO_NUEVO,
audi_fechamodificacion,
audi_usuario,
ID_CATEGORIA_INSUMO,
audi_accion
)
values
(new.NOMBRE_CATEGORIA_INSUMO,
now(),current_user(),new.ID_CATEGORIA_INSUMO,'Insercion')//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador reservaya2.auditoria_insert_categoria_producto
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER auditoria_insert_categoria_producto before insert on categoria_producto
for each row
insert into auditoria_categoria_producto
(NOMBRE_CATEGORIA_PRODUCTO_NUEVO,
audi_fechamodificacion,
audi_usuario,
ID_CATEGORIA_PRODUCTO,
audi_accion
)
values
(new.NOMBRE_CATEGORIA_PRODUCTO,
now(),current_user(),new.ID_CATEGORIA_PRODUCTO,'Insercion')//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador reservaya2.auditoria_insert_RESERVACION_RESERVA_MESA
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER auditoria_insert_RESERVACION_RESERVA_MESA before insert on RESERVACION_RESERVA_MESA
for each row
insert into auditoria_RESERVACION_RESERVA_MESA
(ID_RESERVACION_NUEVO,
ID_MESA_NUEVO,
audi_fechamodificacion,
audi_usuario,
ID_RESERVACION_RESERVA_MESA,
audi_accion
)
values
(new.ID_RESERVACION,new.ID_MESA,
now(),current_user(),new.ID_RESERVACION_RESERVA_MESA ,'Insercion')//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador reservaya2.auditoria_insert_USUARIO_ACCEDE_INSUMO
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER auditoria_insert_USUARIO_ACCEDE_INSUMO before insert on USUARIO_ACCEDE_INSUMO
for each row
insert into auditoria_USUARIO_ACCEDE_INSUMO
(ID_USUARIO_NUEVO,
ID_INSUMO_NUEVO,
audi_fechamodificacion,
audi_usuario,
ID_USUARIO_ACCEDE_INSUMO,
audi_accion
)
values
(new.ID_USUARIO,new.ID_INSUMO,
now(),current_user(),new.ID_USUARIO_ACCEDE_INSUMO,'Insercion')//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador reservaya2.auditoria_insert_usuario_visualiza_producto
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER auditoria_insert_usuario_visualiza_producto before insert on usuario_visualiza_producto
for each row
insert into auditoria_usuario_visualiza_producto
(ID_USUARIO_NUEVO,
ID_PRODUCTO_NUEVO,
audi_fechamodificacion,
audi_usuario,
ID_USUARIO_VISUALIZA_PRODUCTO,
audi_accion
)
values
(new.ID_USUARIO,new.ID_PRODUCTO,
now(),current_user(),new.ID_USUARIO_VISUALIZA_PRODUCTO,'Insercion')//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador reservaya2.auditoria_updateadmin
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER auditoria_updateadmin before update on administrador
for each row
insert into auditoria_admin
(NOMBRE_ADMIN_ANTERIOR,
APELLIDO_ADMIN_ANTERIOR,
EMAIL_ADMIN_ANTERIOR,
CELULAR_ADMIN_ANTERIOR,
ID_USUARIO_ANTERIOR,
NOMBRE_ADMIN_NUEVO,
APELLIDO_ADMIN_NUEVO,
EMAIL_ADMIN_NUEVO,
CELULAR_ADMIN_NUEVO,
ID_USUARIO_NUEVO,
audi_fechamodificacion,
audi_usuario,
ID_ADMIN,
audi_accion
)
values
(old.NOMBRE_ADMIN,old.APELLIDO_ADMIN,old.EMAIL_ADMIN,old.CELULAR_ADMIN,old.ID_USUARIO,
new.NOMBRE_ADMIN,new.APELLIDO_ADMIN,new.EMAIL_ADMIN,new.CELULAR_ADMIN,new.ID_USUARIO,
now(),current_user(),new.ID_ADMIN,'Actualizacion')//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador reservaya2.auditoria_updatecliente
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER auditoria_updatecliente before update on cliente
for each row
insert into auditoria_cliente
(NOMBRE_CLIENTE_ANTERIOR,
APELLIDO_CLIENTE_ANTERIOR,
FECHA_NACIMIENTO_CLIENTE_ANTERIOR,
EMAIL_CLIENTE_ANTERIOR,
CELULAR_CLIENTE_ANTERIOR,
ID_USUARIO_ANTERIOR,
NOMBRE_CLIENTE_NUEVO,
APELLIDO_CLIENTE_NUEVO,
FECHA_NACIMIENTO_CLIENTE_NUEVO,
EMAIL_CLIENTE_NUEVO,
CELULAR_CLIENTE_NUEVO,
ID_USUARIO_NUEVO,
audi_fechamodificacion,
audi_usuario,
ID_CLIENTE,
audi_accion
)
values
(old.NOMBRE_CLIENTE,old.APELLIDO_CLIENTE,old.FECHA_NACIMIENTO_CLIENTE,old.EMAIL_CLIENTE,old.CELULAR_CLIENTE,old.ID_USUARIO,
new.NOMBRE_CLIENTE,new.APELLIDO_CLIENTE,new.FECHA_NACIMIENTO_CLIENTE,new.EMAIL_CLIENTE,new.CELULAR_CLIENTE,new.ID_USUARIO,
now(),current_user(),new.ID_CLIENTE,'Actualizacion')//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador reservaya2.auditoria_updateempleado
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER auditoria_updateempleado before update on empleado
for each row
insert into auditoria_empleado
(DOC_EMPLEADO_ANTERIOR,
NOMBRE_EMPLEADO_ANTERIOR,
APELLIDO_EMPLEADO_ANTERIOR,
EMAIL_EMPLEADO_ANTERIOR,
CELULAR_EMPLEADO_ANTERIOR,
ID_USUARIO_ANTERIOR,
DOC_EMPLEADO_NUEVO,
NOMBRE_EMPLEADO_NUEVO,
APELLIDO_EMPLEADO_NUEVO,
EMAIL_EMPLEADO_NUEVO,
CELULAR_EMPLEADO_NUEVO,
ID_USUARIO_NUEVO,
audi_fechamodificacion,
audi_usuario,
ID_EMPLEADO,
audi_accion
)
values
(old.DOC_EMPLEADO,old.NOMBRE_EMPLEADO,old.APELLIDO_EMPLEADO,old.EMAIL_EMPLEADO,old.CELULAR_EMPLEADO,old.ID_USUARIO,
new.DOC_EMPLEADO,new.NOMBRE_EMPLEADO,new.APELLIDO_EMPLEADO,new.EMAIL_EMPLEADO,new.CELULAR_EMPLEADO,new.ID_USUARIO,
now(),current_user(),new.ID_EMPLEADO,'Actualizacion')//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador reservaya2.auditoria_updateinsumo
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER auditoria_updateinsumo before update on insumo
for each row
insert into auditoria_insumo
(NOMBRE_INSUMO_ANTERIOR,
CANTIDAD_INSUMO_ANTERIOR,
FECHA_COMPRA_INSUMO_ANTERIOR,
VALOR_INSUMO_ANTERIOR,
ID_PROVEEDOR_ANTERIOR,
ID_CATEGORIA_INSUMO_ANTERIOR,
NOMBRE_INSUMO_NUEVO,
CANTIDAD_INSUMO_NUEVO,
FECHA_COMPRA_INSUMO_NUEVO,
VALOR_INSUMO_NUEVO,
ID_PROVEEDOR_NUEVO,
ID_CATEGORIA_INSUMO_NUEVO,
audi_fechamodificacion,
audi_usuario,
ID_INSUMO,
audi_accion
)
values
(old.NOMBRE_INSUMO,old.CANTIDAD_INSUMO,old.FECHA_COMPRA_INSUMO,old.VALOR_INSUMO,old.ID_PROVEEDOR,old.ID_CATEGORIA_INSUMO,
new.NOMBRE_INSUMO,new.CANTIDAD_INSUMO,new.FECHA_COMPRA_INSUMO,new.VALOR_INSUMO,new.ID_PROVEEDOR,new.ID_CATEGORIA_INSUMO,
now(),current_user(),new.ID_INSUMO,'Actualizacion')//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador reservaya2.auditoria_updateproducto
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER auditoria_updateproducto before update on producto
for each row
insert into auditoria_producto
(ID_CATEGORIA_PRODUCTO_ANTERIOR,
NOMBRE_PRODUCTO_ANTERIOR,
DESCRIPCION_PRODUCTO_ANTERIOR,
CANTIDAD_PRODUCTO_ANTERIOR,
VALOR_PRODUCTO_ANTERIOR,
IMAGEN_PRODUCTO_ANTERIOR,
ID_CATEGORIA_PRODUCTO_NUEVO,
NOMBRE_PRODUCTO_NUEVO,
DESCRIPCION_PRODUCTO_NUEVO,
CANTIDAD_PRODUCTO_NUEVO,
VALOR_PRODUCTO_NUEVO,
IMAGEN_PRODUCTO_NUEVO,
audi_fechamodificacion,
audi_usuario,
ID_PRODUCTO,
audi_accion
)
values
(old.ID_CATEGORIA_PRODUCTO,old.NOMBRE_PRODUCTO,old.DESCRIPCION_PRODUCTO,old.CANTIDAD_PRODUCTO,old.VALOR_PRODUCTO,
new.ID_CATEGORIA_PRODUCTO,new.NOMBRE_PRODUCTO,new.DESCRIPCION_PRODUCTO,new.CANTIDAD_PRODUCTO,new.VALOR_PRODUCTO,
now(),current_user(),new.ID_PRODUCTO,'Actualizacion')//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador reservaya2.auditoria_updateproveedor
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER auditoria_updateproveedor before update on proveedor
for each row
insert into auditoria_PROVEEDOR
(NOMBRE_PROVEEDOR_ANTERIOR,
DIRECCION_PROVEEDOR_ANTERIOR,
PERSONA_ENCARGADA_ANTERIOR,
TELEFONO_PROVEEDOR_ANTERIOR,
NOMBRE_PROVEEDOR_NUEVO,
DIRECCION_PROVEEDOR_NUEVO,
PERSONA_ENCARGADA_NUEVO,
TELEFONO_PROVEEDOR_NUEVO,
audi_fechamodificacion,
audi_usuario,
ID_PROVEEDOR,
audi_accion
)
values
(old.NOMBRE_PROVEEDOR,old.DIRECCION_PROVEEDOR,old.PERSONA_ENCARGADA,old.TELEFONO_PROVEEDOR,
new.NOMBRE_PROVEEDOR,new.DIRECCION_PROVEEDOR,new.PERSONA_ENCARGADA,new.TELEFONO_PROVEEDOR,
now(),current_user(),new.ID_PROVEEDOR,'Actualizacion')//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador reservaya2.auditoria_updatereservacion
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER auditoria_updatereservacion before update on RESERVACION
for each row
insert into auditoria_reservacion
(ID_CLIENTE_ANTERIOR,
FECHA_RESERVACION_ANTERIOR,
HORA_RESERVACION_ANTERIOR,
ESTADO_RESERVACION_ANTERIOR,
ASIENTO_ANTERIOR,
ID_CLIENTE_NUEVO,
FECHA_RESERVACION_NUEVO,
HORA_RESERVACION_NUEVO,
ESTADO_RESERVACION_NUEVO,
ASIENTO_NUEVO,
audi_fechamodificacion,
audi_usuario,
ID_RESERVACION,
audi_accion
)
values
(old.ID_CLIENTE,old.FECHA_RESERVACION ,old.HORA_RESERVACION,old.ESTADO_RESERVACION,old.ASIENTO,
new.ID_CLIENTE,new.FECHA_RESERVACION ,new.HORA_RESERVACION,new.ESTADO_RESERVACION,new.ASIENTO,
now(),current_user(),new.ID_RESERVACION ,'Actualizacion')//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador reservaya2.auditoria_updateusuario
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER auditoria_updateusuario before update on usuario
for each row
insert into auditoria_usuario
(NOMBRE_USUARIO_ANTERIOR,
CLAVE_USUARIO_ANTERIOR,
TIPO_USUARIO_ANTERIOR,
ESTADO_USUARIO_ANTERIOR,
FOTO_PERFIL_ANTERIOR,
NOMBRE_USUARIO_NUEVO,
CLAVE_USUARIO_NUEVO,
TIPO_USUARIO_NUEVO,
ESTADO_USUARIO_NUEVO,
FOTO_PERFIL_NUEVO,
audi_fechamodificacion,
audi_usuario,
ID_USUARIO,
audi_accion
)
values
(old.NOMBRE_USUARIO,old.CLAVE_USUARIO,old.TIPO_USUARIO,old.ESTADO_USUARIO,old.FOTO_PERFIL,
new.NOMBRE_USUARIO,new.CLAVE_USUARIO,new.TIPO_USUARIO,new.ESTADO_USUARIO,new.FOTO_PERFIL,
now(),current_user(),new.ID_USUARIO,'Actualizacion')//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador reservaya2.auditoria_update_CATEGORIA_INSUMO
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER auditoria_update_CATEGORIA_INSUMO before update on CATEGORIA_INSUMO
for each row
insert into auditoria_CATEGORIA_INSUMO
(NOMBRE_CATEGORIA_INSUMO_ANTERIOR,
NOMBRE_CATEGORIA_INSUMO_NUEVO,
audi_fechamodificacion,
audi_usuario,
ID_CATEGORIA_INSUMO,
audi_accion
)
values
(old.NOMBRE_CATEGORIA_INSUMO,
new.NOMBRE_CATEGORIA_INSUMO,
now(),current_user(),new.ID_CATEGORIA_INSUMO,'Actualizacion')//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador reservaya2.auditoria_update_categoria_producto
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER auditoria_update_categoria_producto before update on categoria_producto
for each row
insert into auditoria_categoria_producto
(NOMBRE_CATEGORIA_PRODUCTO_ANTERIOR,
NOMBRE_CATEGORIA_PRODUCTO_NUEVO,
audi_fechamodificacion,
audi_usuario,
ID_CATEGORIA_PRODUCTO,
audi_accion
)
values
(old.NOMBRE_CATEGORIA_PRODUCTO,
new.NOMBRE_CATEGORIA_PRODUCTO,
now(),current_user(),ID_CATEGORIA_PRODUCTO,'Actualizacion')//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador reservaya2.auditoria_update_RESERVACION_RESERVA_MESA
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER auditoria_update_RESERVACION_RESERVA_MESA before update on RESERVACION_RESERVA_MESA
for each row
insert into auditoria_RESERVACION_RESERVA_MESA
(ID_RESERVACION_ANTERIOR,
ID_MESA_ANTERIOR,
ID_RESERVACION_NUEVO,
ID_MESA_NUEVO,
audi_fechamodificacion,
audi_usuario,
ID_RESERVACION_RESERVA_MESA,
audi_accion
)
values
(old.ID_RESERVACION,old.ID_MESA,
new.ID_RESERVACION,new.ID_MESA,
now(),current_user(),new.ID_RESERVACION_RESERVA_MESA ,'Actualizacion')//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador reservaya2.auditoria_update_USUARIO_ACCEDE_INSUMO
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER auditoria_update_USUARIO_ACCEDE_INSUMO before update on USUARIO_ACCEDE_INSUMO
for each row
insert into auditoria_USUARIO_ACCEDE_INSUMO
(ID_USUARIO_ANTERIOR,
ID_INSUMO_ANTERIOR,
ID_USUARIO_NUEVO,
ID_INSUMO_NUEVO,
audi_fechamodificacion,
audi_usuario,
ID_USUARIO_ACCEDE_INSUMO,
audi_accion
)
values
(old.ID_USUARIO,old.ID_INSUMO,
new.ID_USUARIO,new.ID_INSUMO,
now(),current_user(),new.ID_USUARIO_ACCEDE_INSUMO,'Actualizacion')//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador reservaya2.auditoria_update_usuario_visualiza_producto
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER auditoria_update_usuario_visualiza_producto before update on usuario_visualiza_producto
for each row
insert into auditoria_usuario_visualiza_producto
(ID_USUARIO_ANTERIOR,
ID_PRODUCTO_ANTERIOR,
ID_USUARIO_NUEVO,
ID_PRODUCTO_NUEVO,
audi_fechamodificacion,
audi_usuario,
ID_USUARIO_VISUALIZA_PRODUCTO,
audi_accion
)
values
(old.ID_USUARIO,old.ID_PRODUCTO,
new.ID_USUARIO,new.ID_PRODUCTO,
now(),current_user(),new.ID_USUARIO_VISUALIZA_PRODUCTO,'Actualizacion')//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
