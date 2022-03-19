-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.18-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para db_inmobiliaria
CREATE DATABASE IF NOT EXISTS `db_inmobiliaria` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `db_inmobiliaria`;

-- Volcando estructura para tabla db_inmobiliaria.tb_detalle_inmueble
CREATE TABLE IF NOT EXISTS `tb_detalle_inmueble` (
  `id_detalle_inmueble` int(11) NOT NULL AUTO_INCREMENT,
  `id_inmueble` int(11) NOT NULL,
  `ambiente_detalle_inmueble` varchar(30) NOT NULL,
  `cantidad_detalle_inmueble` int(11) NOT NULL,
  PRIMARY KEY (`id_detalle_inmueble`),
  KEY `id_inmueble` (`id_inmueble`),
  CONSTRAINT `tb_detalle_inmueble_ibfk_1` FOREIGN KEY (`id_inmueble`) REFERENCES `tb_inmueble` (`id_inmueble`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla db_inmobiliaria.tb_detalle_inmueble: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_detalle_inmueble` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_detalle_inmueble` ENABLE KEYS */;

-- Volcando estructura para tabla db_inmobiliaria.tb_documento_inmueble
CREATE TABLE IF NOT EXISTS `tb_documento_inmueble` (
  `id_documento_inmueble` int(11) NOT NULL AUTO_INCREMENT,
  `id_inmueble` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `descripcion_documento_inmueble` text NOT NULL,
  PRIMARY KEY (`id_documento_inmueble`),
  KEY `id_inmueble` (`id_inmueble`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `tb_documento_inmueble_ibfk_1` FOREIGN KEY (`id_inmueble`) REFERENCES `tb_inmueble` (`id_inmueble`),
  CONSTRAINT `tb_documento_inmueble_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `tb_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla db_inmobiliaria.tb_documento_inmueble: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_documento_inmueble` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_documento_inmueble` ENABLE KEYS */;

-- Volcando estructura para tabla db_inmobiliaria.tb_inmueble
CREATE TABLE IF NOT EXISTS `tb_inmueble` (
  `id_inmueble` int(11) NOT NULL AUTO_INCREMENT,
  `id_tipo_inmueble` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombre_inmueble` varchar(100) NOT NULL,
  `imagen_inmueble` varchar(20) NOT NULL DEFAULT '',
  `precio_inmueble` decimal(10,2) NOT NULL,
  `estado_inmueble` varchar(15) NOT NULL,
  `ubicacion_inmuebles` varchar(300) NOT NULL,
  `fecha_disponibilidad_inmueble` date NOT NULL,
  `descripcion_inmueble` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id_inmueble`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_tipo_inmueble` (`id_tipo_inmueble`),
  CONSTRAINT `tb_inmueble_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `tb_usuario` (`id_usuario`),
  CONSTRAINT `tb_inmueble_ibfk_2` FOREIGN KEY (`id_tipo_inmueble`) REFERENCES `tb_tipo_inmueble` (`id_tipo_inmueble`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla db_inmobiliaria.tb_inmueble: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_inmueble` DISABLE KEYS */;
INSERT INTO `tb_inmueble` (`id_inmueble`, `id_tipo_inmueble`, `id_usuario`, `nombre_inmueble`, `imagen_inmueble`, `precio_inmueble`, `estado_inmueble`, `ubicacion_inmuebles`, `fecha_disponibilidad_inmueble`, `descripcion_inmueble`) VALUES
	(1, 1, 1, 'Apartamento 4 a1 ', '2.jpg', 560.00, 'DISPONIBLE  ', 'Capanique #12  ', '2021-11-02', ' Inmueble en buena ubicacion  '),
	(3, 2, 1, 'Edificio 5 pisos', '6.jpg', 4500.00, 'DISPONIBLE', 'Cono Sur #45', '2021-10-13', NULL),
	(6, 2, 1, 'Edificio 4 Apartamentos', '7.jpg', 2000.00, 'DISPONIBLE', 'CERCADO #10', '2021-08-21', NULL),
	(7, 1, 1, 'Apartamento 3 ambientes', '8.jpg', 450.00, 'DISPONIBLE', 'Bolognesi #12', '2021-11-01', NULL),
	(12, 2, 1, 'hospedaje de vania', '8.jpg', 560.00, 'DISPONIBLE', 'ricardo odonovan f-9', '2021-12-01', 'hospedaje cerca al centro');
/*!40000 ALTER TABLE `tb_inmueble` ENABLE KEYS */;

-- Volcando estructura para tabla db_inmobiliaria.tb_reserva
CREATE TABLE IF NOT EXISTS `tb_reserva` (
  `id_reserva` int(11) NOT NULL AUTO_INCREMENT,
  `id_inmueble` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha_reserva` varchar(50) NOT NULL DEFAULT '',
  `fecha_inicio_reserva` varchar(50) NOT NULL DEFAULT '',
  `fecha_fin_reserva` varchar(50) NOT NULL DEFAULT '',
  `monto_reserva` decimal(10,2) DEFAULT NULL,
  `comision_reserva` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id_reserva`),
  KEY `id_inmueble` (`id_inmueble`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `tb_reserva_ibfk_1` FOREIGN KEY (`id_inmueble`) REFERENCES `tb_inmueble` (`id_inmueble`),
  CONSTRAINT `tb_reserva_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `tb_usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla db_inmobiliaria.tb_reserva: ~9 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_reserva` DISABLE KEYS */;
INSERT INTO `tb_reserva` (`id_reserva`, `id_inmueble`, `id_usuario`, `fecha_reserva`, `fecha_inicio_reserva`, `fecha_fin_reserva`, `monto_reserva`, `comision_reserva`) VALUES
	(22, 3, 1, '2021-11-02 14:27:23', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL),
	(26, 1, 1, '2021-11-07 21:51:02', '12/11/2021', '12/11/2021', NULL, NULL),
	(27, 1, 1, '2021-11-07 21:56:19', '2021-11-09', '2021-11-11', NULL, NULL),
	(30, 6, 1, '2021-11-07 21:59:32', '2021-11-18', '2021-11-21', NULL, NULL),
	(31, 7, 1, '2021-11-07 22:00:42', '2021-11-24', '2021-11-30', NULL, NULL),
	(32, 7, 1, '2021-11-09 15:40:31', '2021-11-08', '2021-11-11', NULL, NULL),
	(33, 7, 1, '2021-11-16 21:25:32', '2021-11-01', '2021-11-02', NULL, NULL),
	(34, 1, 1, '2021-11-29 00:30:42', '2021-11-30', '2021-12-01', -17864.00, -1624.00),
	(35, 1, 1, '2021-11-29 00:44:04', '2021-11-30', '2021-12-02', -17248.00, -1568.00),
	(36, 1, 1, '2021-11-29 00:56:59', '2021-11-30', '2021-12-05', -15400.00, -1400.00);
/*!40000 ALTER TABLE `tb_reserva` ENABLE KEYS */;

-- Volcando estructura para tabla db_inmobiliaria.tb_tipo_inmueble
CREATE TABLE IF NOT EXISTS `tb_tipo_inmueble` (
  `id_tipo_inmueble` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion_tipo_inmueble` text NOT NULL,
  PRIMARY KEY (`id_tipo_inmueble`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla db_inmobiliaria.tb_tipo_inmueble: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_tipo_inmueble` DISABLE KEYS */;
INSERT INTO `tb_tipo_inmueble` (`id_tipo_inmueble`, `descripcion_tipo_inmueble`) VALUES
	(1, 'Apartamento'),
	(2, 'Edificio');
/*!40000 ALTER TABLE `tb_tipo_inmueble` ENABLE KEYS */;

-- Volcando estructura para tabla db_inmobiliaria.tb_tipo_usuario
CREATE TABLE IF NOT EXISTS `tb_tipo_usuario` (
  `id_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion_tipo_usuario` text NOT NULL,
  PRIMARY KEY (`id_tipo_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla db_inmobiliaria.tb_tipo_usuario: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_tipo_usuario` DISABLE KEYS */;
INSERT INTO `tb_tipo_usuario` (`id_tipo_usuario`, `descripcion_tipo_usuario`) VALUES
	(1, 'Arrendador'),
	(2, 'Arrendatario'),
	(3, 'Agente'),
	(4, 'Administrador');
/*!40000 ALTER TABLE `tb_tipo_usuario` ENABLE KEYS */;

-- Volcando estructura para tabla db_inmobiliaria.tb_transaccion
CREATE TABLE IF NOT EXISTS `tb_transaccion` (
  `id_transaccion` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_reserva` int(11) NOT NULL,
  `fecha_transaccion` varchar(50) NOT NULL DEFAULT '',
  `fecha_rembolso_transaccion` varchar(50) NOT NULL DEFAULT '',
  `monto_total_transaccion` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id_transaccion`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_reserva` (`id_reserva`),
  CONSTRAINT `tb_transaccion_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `tb_usuario` (`id_usuario`),
  CONSTRAINT `tb_transaccion_ibfk_2` FOREIGN KEY (`id_reserva`) REFERENCES `tb_reserva` (`id_reserva`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla db_inmobiliaria.tb_transaccion: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_transaccion` DISABLE KEYS */;
INSERT INTO `tb_transaccion` (`id_transaccion`, `id_usuario`, `id_reserva`, `fecha_transaccion`, `fecha_rembolso_transaccion`, `monto_total_transaccion`) VALUES
	(1, 1, 34, '2021-11-29 00:30:42', '', -17864.00),
	(2, 1, 35, '2021-11-29 00:44:04', '', -17248.00),
	(3, 1, 36, '2021-11-29 00:56:59', '', -15400.00);
/*!40000 ALTER TABLE `tb_transaccion` ENABLE KEYS */;

-- Volcando estructura para tabla db_inmobiliaria.tb_usuario
CREATE TABLE IF NOT EXISTS `tb_usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `id_tipo_usuario` int(11) NOT NULL,
  `dni_usuario` char(8) DEFAULT NULL,
  `imagen_usuario` varchar(50) NOT NULL DEFAULT '',
  `estado_usuario` varchar(10) DEFAULT NULL,
  `nombre_usuario` varchar(30) NOT NULL,
  `apellido_usuario` varchar(70) NOT NULL,
  `direccion_usuario` varchar(250) DEFAULT NULL,
  `telefono_usuario` char(9) NOT NULL,
  `correo_usuario` varchar(150) NOT NULL,
  `usuario_usuario` varchar(30) DEFAULT NULL,
  `contrasenia_usuario` varchar(30) DEFAULT NULL,
  `descripcion_usuario` text DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `id_tipo_usuario` (`id_tipo_usuario`),
  CONSTRAINT `tb_usuario_ibfk_1` FOREIGN KEY (`id_tipo_usuario`) REFERENCES `tb_tipo_usuario` (`id_tipo_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla db_inmobiliaria.tb_usuario: ~9 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_usuario` DISABLE KEYS */;
INSERT INTO `tb_usuario` (`id_usuario`, `id_tipo_usuario`, `dni_usuario`, `imagen_usuario`, `estado_usuario`, `nombre_usuario`, `apellido_usuario`, `direccion_usuario`, `telefono_usuario`, `correo_usuario`, `usuario_usuario`, `contrasenia_usuario`, `descripcion_usuario`) VALUES
	(1, 2, '75674321', 'Imagen_Usuarios/Foto_Alfredo.jpg', 'ACTIVO', 'Juan', 'Zegarra Luque', 'alto la alianza #12 ', '967543213', 'juan@gmail.com', 'jzegarra', '123', NULL),
	(2, 1, '12345678', 'Imagen_Usuarios/Foto_Alfredo.jpg', 'ACTIVO', 'Alfredo ', 'Huillca ', 'Ricardo Odonovan ', '921118910', 'ahuillca51@gmail.com   ', 'ahuillca  ', '123  ', ''),
	(19, 3, '', 'buyer-persona.png', NULL, 'Juan', 'Quispe Mariano', NULL, '987654321', 'qmariano@gmail.com', NULL, NULL, 'agente con buena experiencia'),
	(20, 4, '78451236', 'Imagen_Usuarios/buyer-persona.png', 'ACTIVO', 'Alfredo', 'HUillca', 'Ricardo Odonovandasdcadsc', '987456321', 'ahuillca51@gmail.com', 'ahuill', '123', NULL),
	(21, 3, NULL, 'persona-e1533759204552.jpg', NULL, 'carlos', 'Maldonado Cancapi', NULL, '987654321', 'carlos@gmail.com', NULL, NULL, 'Especialista en ventas, tiene un curriculum muy amplio'),
	(22, 3, NULL, 'buyer-persona.png', NULL, 'carlos', 'Maldonado Cancapi', NULL, '987654321', 'carlos@gmail.com', NULL, NULL, 'el agente no tiene buenas ventas xD'),
	(23, 3, NULL, 'descarga (1)1.jfif', NULL, 'Marcos', 'Quispe ', NULL, '987654321', 'Mquispe@gmail.com', NULL, NULL, 'agente con amplios conocimientos en E-commerce'),
	(24, 3, NULL, 'vendedor11.jpg', NULL, 'Daniel ', 'Gonzales ', NULL, '8', 'daniel@hotmail.com', NULL, NULL, 'vendedor con amplia experiencia  '),
	(25, 1, '78451236', 'Imagen_Usuarios/Foto_Alfredo.jpg', 'ACTIVO', 'Carlos ', 'Maldonado ', 'Ricardo Odonovan\r\nF-9', '921118910', 'cmaldonado@gmail.com', 'cmaldonado', '123', NULL);
/*!40000 ALTER TABLE `tb_usuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
