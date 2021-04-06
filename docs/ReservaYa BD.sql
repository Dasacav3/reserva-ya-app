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

-- Volcando datos para la tabla reservaya2.administrador: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `administrador` DISABLE KEYS */;
INSERT INTO `administrador` (`ID_ADMIN`, `NOMBRE_ADMIN`, `APELLIDO_ADMIN`, `EMAIL_ADMIN`, `CELULAR_ADMIN`, `ID_USUARIO`) VALUES
	(1, 'Daniel', 'Carrillo', 'dscv3719@gmail.com', '3194608272', 1);
/*!40000 ALTER TABLE `administrador` ENABLE KEYS */;

-- Volcando estructura para tabla reservaya2.categoria_insumo
CREATE TABLE IF NOT EXISTS `categoria_insumo` (
  `ID_CATEGORIA_INSUMO` int(11) NOT NULL,
  `NOMBRE_CATEGORIA_INSUMO` varchar(100) NOT NULL,
  PRIMARY KEY (`ID_CATEGORIA_INSUMO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla reservaya2.categoria_insumo: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `categoria_insumo` DISABLE KEYS */;
/*!40000 ALTER TABLE `categoria_insumo` ENABLE KEYS */;

-- Volcando estructura para tabla reservaya2.categoria_producto
CREATE TABLE IF NOT EXISTS `categoria_producto` (
  `ID_CATEGORIA_PRODUCTO` int(11) NOT NULL,
  `NOMBRE_CATEGORIA_PRODUCTO` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_CATEGORIA_PRODUCTO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla reservaya2.categoria_producto: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `categoria_producto` DISABLE KEYS */;
/*!40000 ALTER TABLE `categoria_producto` ENABLE KEYS */;

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla reservaya2.cliente: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` (`ID_CLIENTE`, `NOMBRE_CLIENTE`, `APELLIDO_CLIENTE`, `FECHA_NACIMIENTO_CLIENTE`, `EMAIL_CLIENTE`, `CELULAR_CLIENTE`, `ID_USUARIO`) VALUES
	(3, 'Valentina', 'Velasquez', '2002-02-11', 'valentina@gmail.com', '3194601235', 3),
	(4, 'Alejandra', 'Niño', '1998-08-13', 'alejandra@gmail.com', '3154789635', 4),
	(5, 'Sergio', 'Ayala', '2002-04-06', 'sergio@gmail.com', '3114235876', 5),
	(8, 'Mario', 'Bross', '1985-09-13', 'mario@gmail.com', '3114568796', 10),
	(9, 'Luigi', 'GG', '1983-09-21', 'luigi@gmail.com', '3574896574', 11);
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla reservaya2.empleado: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `empleado` DISABLE KEYS */;
INSERT INTO `empleado` (`ID_EMPLEADO`, `DOC_EMPLEADO`, `NOMBRE_EMPLEADO`, `APELLIDO_EMPLEADO`, `EMAIL_EMPLEADO`, `CELULAR_EMPLEADO`, `ID_USUARIO`) VALUES
	(1, '394564', 'Fabian', 'Combita', 'fabian@resevaya.com', '3104608272', 2),
	(4, '52583114', 'Ana', 'Velasquez', 'ana.velasquez2010@gmail.com', '3103456985', 12);
/*!40000 ALTER TABLE `empleado` ENABLE KEYS */;

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

-- Volcando datos para la tabla reservaya2.insumo: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `insumo` DISABLE KEYS */;
/*!40000 ALTER TABLE `insumo` ENABLE KEYS */;

-- Volcando estructura para tabla reservaya2.mesa
CREATE TABLE IF NOT EXISTS `mesa` (
  `ID_MESA` int(6) NOT NULL AUTO_INCREMENT,
  `CAPACIDAD_MESA` int(2) NOT NULL,
  `ESTADO_MESA` enum('Disponible','Ocupada') NOT NULL,
  PRIMARY KEY (`ID_MESA`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla reservaya2.mesa: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `mesa` DISABLE KEYS */;
INSERT INTO `mesa` (`ID_MESA`, `CAPACIDAD_MESA`, `ESTADO_MESA`) VALUES
	(1, 4, 'Disponible'),
	(2, 2, 'Disponible'),
	(3, 8, 'Ocupada'),
	(4, 6, 'Disponible');
/*!40000 ALTER TABLE `mesa` ENABLE KEYS */;

-- Volcando estructura para tabla reservaya2.producto
CREATE TABLE IF NOT EXISTS `producto` (
  `ID_PRODUCTO` int(11) NOT NULL AUTO_INCREMENT,
  `ID_CATEGORIA_PRODUCTO` int(11) NOT NULL,
  `NOMBRE_PRODUCTO` varchar(70) NOT NULL,
  `DESCRIPCION_PRODUCTO` varchar(255) NOT NULL,
  `CANTIDAD_PRODUCTO` int(11) NOT NULL,
  `VALOR_PRODUCTO` double NOT NULL,
  `IMAGEN_PRODUCTO` longblob NOT NULL,
  PRIMARY KEY (`ID_PRODUCTO`),
  KEY `ID_CATEGORIA_PRODUCTO` (`ID_CATEGORIA_PRODUCTO`),
  KEY `verProducto` (`ID_PRODUCTO`,`NOMBRE_PRODUCTO`,`VALOR_PRODUCTO`),
  CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`ID_CATEGORIA_PRODUCTO`) REFERENCES `categoria_producto` (`ID_CATEGORIA_PRODUCTO`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla reservaya2.producto: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;

-- Volcando estructura para tabla reservaya2.proveedor
CREATE TABLE IF NOT EXISTS `proveedor` (
  `ID_PROVEEDOR` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_PROVEEDOR` varchar(70) NOT NULL,
  `DIRECCION_PROVEEDOR` varchar(100) NOT NULL,
  `PERSONA_ENCARGADA` varchar(70) NOT NULL,
  `TELEFONO_PROVEEDOR` int(10) NOT NULL,
  PRIMARY KEY (`ID_PROVEEDOR`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla reservaya2.proveedor: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `proveedor` DISABLE KEYS */;
/*!40000 ALTER TABLE `proveedor` ENABLE KEYS */;

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
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla reservaya2.reservacion: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `reservacion` DISABLE KEYS */;
INSERT INTO `reservacion` (`ID_RESERVACION`, `ID_CLIENTE`, `FECHA_RESERVACION`, `HORA_RESERVACION`, `ESTADO_RESERVACION`, `ASIENTO`) VALUES
	(3, 5, '2021-04-11', '15:20:00', 'Activa', 6),
	(4, 5, '2021-04-21', '22:00:00', 'Activa', 3),
	(7, 3, '2021-04-30', '19:10:00', 'Activa', 8),
	(8, 4, '2021-05-08', '19:13:00', 'Activa', 3),
	(10, 5, '2021-04-20', '19:27:00', 'Activa', 3),
	(13, 3, '2021-04-14', '12:00:00', 'Activa', 8),
	(18, 4, '2021-04-15', '21:00:00', 'Activa', 3),
	(19, 3, '2021-04-20', '15:00:00', 'Activa', 4),
	(31, 3, '2021-04-05', '22:00:00', 'Cancelada', 3),
	(32, 5, '2021-04-06', '14:30:00', 'Activa', 8);
/*!40000 ALTER TABLE `reservacion` ENABLE KEYS */;

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
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla reservaya2.reservacion_reserva_mesa: ~9 rows (aproximadamente)
/*!40000 ALTER TABLE `reservacion_reserva_mesa` DISABLE KEYS */;
INSERT INTO `reservacion_reserva_mesa` (`ID_RESERVACION_RESERVA_MESA`, `ID_RESERVACION`, `ID_MESA`) VALUES
	(2, 3, 4),
	(6, 4, 3),
	(7, 7, 4),
	(8, 8, 1),
	(9, 10, 3),
	(12, 13, 3),
	(17, 18, 1),
	(18, 19, 3),
	(30, 31, 1),
	(31, 32, 3);
/*!40000 ALTER TABLE `reservacion_reserva_mesa` ENABLE KEYS */;

-- Volcando estructura para tabla reservaya2.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `ID_USUARIO` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_USUARIO` varchar(70) NOT NULL,
  `CLAVE_USUARIO` varchar(100) NOT NULL,
  `TIPO_USUARIO` enum('Cliente','Empleado','Administrador') NOT NULL,
  `ESTADO_USUARIO` enum('Activo','Inactivo') NOT NULL,
  PRIMARY KEY (`ID_USUARIO`),
  UNIQUE KEY `NOMBRE_USUARIO` (`NOMBRE_USUARIO`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla reservaya2.usuario: ~9 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`ID_USUARIO`, `NOMBRE_USUARIO`, `CLAVE_USUARIO`, `TIPO_USUARIO`, `ESTADO_USUARIO`) VALUES
	(1, 'dscv3719@gmail.com', '$2y$10$oAa/c87mykaAWtv6nkL0B.9l5MuQYou7PPm08x0Ip0RXR1UJ2/CVS', 'Administrador', 'Activo'),
	(2, 'fabian@gmail.com', '$2y$10$gElnDs0Tq6S05QnCd5IRPeoJFv0PK8SE6UY.BYJNhOAEIuKAwv3n.', 'Empleado', 'Activo'),
	(3, 'valentina@gmail.com', '$2y$10$J6/0ZLVx9oTsFsp0ik42B.43PTvb1uVtpRqxoHodqn0BmLDR6eoI6', 'Cliente', 'Activo'),
	(4, 'alejandra@gmail.com', '$2y$10$xTWIe0cVjW2DiyngxZ5HpusRe0dH32dsJ7pceyQo1hvpQyuf/RJ92', 'Cliente', 'Activo'),
	(5, 'sergio@gmail.com', '$2y$10$0J1l4vkRd6w/QRhbucUbn.WFZeQSojVGifsutRW4pJFJ.MlgL3MNK', 'Cliente', 'Activo'),
	(10, 'mario@gmail.com', '$2y$10$OXmHTFZscxrBlRBoO.vmJ.GoNZurx862oLgrZzT8tQyc2.vtk2iDa', 'Cliente', 'Activo'),
	(11, 'luigi@gmail.com', '$2y$10$Opl04G8s/4UVwb/ZYOdBLuSwKddsx6hpl/xz05QPCf8ipTJGgN82u', 'Cliente', 'Inactivo'),
	(12, 'ana.velasquez2010@hotmail.com', '$2y$10$MblgpNiwGaVukhgtzUq3EO4IEjk8xNh.GBEydkj2L3pDq5R2//1X6', 'Empleado', 'Inactivo');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

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

-- Volcando datos para la tabla reservaya2.usuario_accede_insumo: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario_accede_insumo` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario_accede_insumo` ENABLE KEYS */;

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

-- Volcando datos para la tabla reservaya2.usuario_visualiza_producto: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario_visualiza_producto` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario_visualiza_producto` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
