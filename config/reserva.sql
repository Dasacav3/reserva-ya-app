


-- Volcando estructura de base de datos para reservaya
CREATE DATABASE IF NOT EXISTS `reservaya` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `reservaya`;

-- Volcando estructura para tabla reservaya.administrador
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
  CONSTRAINT `administrador_ibfk_1` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuario` (`ID_USUARIO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla reservaya.administrador: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `administrador` DISABLE KEYS */;
/*!40000 ALTER TABLE `administrador` ENABLE KEYS */;

-- Volcando estructura para tabla reservaya.categoria_insumo
CREATE TABLE IF NOT EXISTS `categoria_insumo` (
  `ID_CATEGORIA_INSUMO` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_CATEGORIA_INSUMO` char(100) DEFAULT NULL,
  PRIMARY KEY (`ID_CATEGORIA_INSUMO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla reservaya.categoria_insumo: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `categoria_insumo` DISABLE KEYS */;
/*!40000 ALTER TABLE `categoria_insumo` ENABLE KEYS */;

-- Volcando estructura para tabla reservaya.categoria_producto
CREATE TABLE IF NOT EXISTS `categoria_producto` (
  `ID_CATEGORIA_PRODUCTO` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_CATEGORIA_PRODUCTO` char(100) DEFAULT NULL,
  PRIMARY KEY (`ID_CATEGORIA_PRODUCTO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla reservaya.categoria_producto: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `categoria_producto` DISABLE KEYS */;
/*!40000 ALTER TABLE `categoria_producto` ENABLE KEYS */;

-- Volcando estructura para tabla reservaya.cliente
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
  CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuario` (`ID_USUARIO`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla reservaya.cliente: ~12 rows (aproximadamente)
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` (`ID_CLIENTE`, `NOMBRE_CLIENTE`, `APELLIDO_CLIENTE`, `FECHA_NACIMIENTO_CLIENTE`, `EMAIL_CLIENTE`, `CELULAR_CLIENTE`, `ID_USUARIO`) VALUES
	(3, 'Daniel', 'Carrillo', '1999-11-15', 'dscv3719@gmail.com', '3194608272', 4),
	(4, 'Alejandra', 'Niño', '1999-11-27', 'manino30@misena.edu.co', '3142782398', 6),
	(5, 'Fabian', 'Combita', '1995-06-13', 'fdcombita@misena.edu.co', '3178963021', 7),
	(7, 'Sergio', 'Ayala', '2002-07-24', 'sergioayala@gmail.com', '3178963099', 9),
	(13, 'Jeison', 'Prieto', '1987-04-22', 'jeisonprieto@gmail.com', '3194502786', 15),
	(14, 'Carlos', 'Rivera', '1999-01-20', 'carlosrivera@gmail.com', '3124060078', 16),
	(16, 'Alejandra', 'Sandoval', '2000-11-16', 'alejasandoval@gmail.com', '3004789652', 18),
	(17, 'Carlos', 'Rodrigo', '1996-03-21', 'example@gmail.com', '3047896523', 19),
	(18, 'Lina', 'León', '2002-10-17', 'linamarcela896@gmail.com', '3104789632', 20),
	(21, 'Laura', 'Villamizar', '1997-06-16', 'lauravillamizar963@gmail.com', '311234587', 30);
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;

-- Volcando estructura para tabla reservaya.empleado
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
  UNIQUE KEY `APELLIDO_EMPLEADO` (`APELLIDO_EMPLEADO`),
  UNIQUE KEY `EMAIL_EMPLEADO` (`EMAIL_EMPLEADO`),
  UNIQUE KEY `CELULAR_EMPLEADO` (`CELULAR_EMPLEADO`),
  KEY `ID_USUARIO` (`ID_USUARIO`),
  CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuario` (`ID_USUARIO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla reservaya.empleado: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `empleado` DISABLE KEYS */;
/*!40000 ALTER TABLE `empleado` ENABLE KEYS */;

-- Volcando estructura para tabla reservaya.insumo
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
  CONSTRAINT `insumo_ibfk_1` FOREIGN KEY (`ID_PROVEEDOR`) REFERENCES `proveedor` (`ID_PROVEEDOR`),
  CONSTRAINT `insumo_ibfk_2` FOREIGN KEY (`ID_CATEGORIA_INSUMO`) REFERENCES `categoria_insumo` (`ID_CATEGORIA_INSUMO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla reservaya.insumo: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `insumo` DISABLE KEYS */;
/*!40000 ALTER TABLE `insumo` ENABLE KEYS */;

-- Volcando estructura para tabla reservaya.mesa
CREATE TABLE IF NOT EXISTS `mesa` (
  `ID_MESA` int(6) NOT NULL AUTO_INCREMENT,
  `CAPACIDAD_MESA` int(2) NOT NULL,
  `ESTADO_MESA` char(1) NOT NULL,
  PRIMARY KEY (`ID_MESA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla reservaya.mesa: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `mesa` DISABLE KEYS */;
/*!40000 ALTER TABLE `mesa` ENABLE KEYS */;

-- Volcando estructura para tabla reservaya.producto
CREATE TABLE IF NOT EXISTS `producto` (
  `ID_PRODUCTO` int(11) NOT NULL,
  `ID_CATEGORIA_PRODUCTO` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_PRODUCTO` varchar(70) NOT NULL,
  `DESCRIPCION_PRODUCTO` varchar(255) NOT NULL,
  `CANTIDAD_PRODUCTO` int(11) NOT NULL,
  `VALOR_PRODUCTO` double NOT NULL,
  PRIMARY KEY (`ID_PRODUCTO`),
  KEY `ID_CATEGORIA_PRODUCTO` (`ID_CATEGORIA_PRODUCTO`),
  CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`ID_CATEGORIA_PRODUCTO`) REFERENCES `categoria_producto` (`ID_CATEGORIA_PRODUCTO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla reservaya.producto: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;

-- Volcando estructura para tabla reservaya.proveedor
CREATE TABLE IF NOT EXISTS `proveedor` (
  `ID_PROVEEDOR` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_PROVEEDOR` varchar(70) NOT NULL,
  `DIRECCION_PROVEEDOR` varchar(100) NOT NULL,
  `PERSONA_ENCARGADA` varchar(70) NOT NULL,
  `TELEFONO_PROVEEDOR` int(10) NOT NULL,
  PRIMARY KEY (`ID_PROVEEDOR`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla reservaya.proveedor: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `proveedor` DISABLE KEYS */;
/*!40000 ALTER TABLE `proveedor` ENABLE KEYS */;

-- Volcando estructura para tabla reservaya.reservacion
CREATE TABLE IF NOT EXISTS `reservacion` (
  `ID_RESERVACION` int(11) NOT NULL AUTO_INCREMENT,
  `ID_CLIENTE` int(11) NOT NULL,
  `FECHA_RESERVACION` date NOT NULL,
  `HORA_RESERVACION` time NOT NULL,
  `ESTADO_RESERVACION` char(1) NOT NULL,
  PRIMARY KEY (`ID_RESERVACION`),
  KEY `ID_CLIENTE` (`ID_CLIENTE`),
  CONSTRAINT `reservacion_ibfk_1` FOREIGN KEY (`ID_CLIENTE`) REFERENCES `cliente` (`ID_CLIENTE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla reservaya.reservacion: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `reservacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `reservacion` ENABLE KEYS */;

-- Volcando estructura para tabla reservaya.reservacion_reserva_mesa
CREATE TABLE IF NOT EXISTS `reservacion_reserva_mesa` (
  `ID_RESERVACION` int(11) NOT NULL,
  `ID_MESA` int(11) NOT NULL,
  KEY `ID_RESERVACION` (`ID_RESERVACION`),
  KEY `ID_MESA` (`ID_MESA`),
  CONSTRAINT `reservacion_reserva_mesa_ibfk_1` FOREIGN KEY (`ID_RESERVACION`) REFERENCES `reservacion` (`ID_RESERVACION`),
  CONSTRAINT `reservacion_reserva_mesa_ibfk_2` FOREIGN KEY (`ID_MESA`) REFERENCES `mesa` (`ID_MESA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla reservaya.reservacion_reserva_mesa: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `reservacion_reserva_mesa` DISABLE KEYS */;
/*!40000 ALTER TABLE `reservacion_reserva_mesa` ENABLE KEYS */;

-- Volcando estructura para tabla reservaya.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `ID_USUARIO` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_USUARIO` varchar(70) NOT NULL,
  `CLAVE_USUARIO` varchar(20) NOT NULL,
  `TIPO_USUARIO` varchar(20) NOT NULL,
  `ESTADO_USUARIO` char(1) NOT NULL,
  PRIMARY KEY (`ID_USUARIO`),
  UNIQUE KEY `NOMBRE_USUARIO` (`NOMBRE_USUARIO`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla reservaya.usuario: ~12 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`ID_USUARIO`, `NOMBRE_USUARIO`, `CLAVE_USUARIO`, `TIPO_USUARIO`, `ESTADO_USUARIO`) VALUES
	(4, 'dscv3719@gmail.com', 'Dasacav3', 'Cliente', 'A'),
	(6, 'manino30@misena.edu.co', 'maria123', 'Cliente', 'A'),
	(7, 'fdcombita@misena.edu.co', 'Fabi', 'Cliente', 'A'),
	(9, 'sergioayala@gmail.com', 'Sergini', 'Cliente', 'A'),
	(15, 'jeisonprieto@gmail.com', 'Jeison', 'Cliente', 'A'),
	(16, 'carlosrivera@gmail.com', 'carlos123', 'Cliente', 'A'),
	(18, 'alejasandoval@gmail.com', 'aleja', 'Cliente', 'A'),
	(19, 'example@gmail.com', 'carlitos', 'Cliente', 'A'),
	(20, 'linamarcela896@gmail.com', 'Lina123', 'Cliente', 'A'),
	(21, 'lauravillamizar@gmail.com', '12345', 'Cliente', 'A'),
	(30, 'lauravillamizar963@gmail.com', '12345', 'Cliente', 'A');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

-- Volcando estructura para tabla reservaya.usuario_accede_insumo
CREATE TABLE IF NOT EXISTS `usuario_accede_insumo` (
  `ID_USUARIO` int(11) NOT NULL,
  `ID_INSUMO` int(11) NOT NULL,
  KEY `ID_USUARIO` (`ID_USUARIO`),
  KEY `ID_INSUMO` (`ID_INSUMO`),
  CONSTRAINT `usuario_accede_insumo_ibfk_1` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuario` (`ID_USUARIO`),
  CONSTRAINT `usuario_accede_insumo_ibfk_2` FOREIGN KEY (`ID_INSUMO`) REFERENCES `insumo` (`ID_INSUMO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla reservaya.usuario_accede_insumo: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario_accede_insumo` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario_accede_insumo` ENABLE KEYS */;

-- Volcando estructura para tabla reservaya.usuario_visualiza_producto
CREATE TABLE IF NOT EXISTS `usuario_visualiza_producto` (
  `ID_USUARIO` int(11) NOT NULL,
  `ID_PRODUCTO` int(11) NOT NULL,
  KEY `ID_USUARIO` (`ID_USUARIO`),
  KEY `ID_PRODUCTO` (`ID_PRODUCTO`),
  CONSTRAINT `usuario_visualiza_producto_ibfk_1` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuario` (`ID_USUARIO`),
  CONSTRAINT `usuario_visualiza_producto_ibfk_2` FOREIGN KEY (`ID_PRODUCTO`) REFERENCES `producto` (`ID_PRODUCTO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla reservaya.usuario_visualiza_producto: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario_visualiza_producto` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario_visualiza_producto` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
