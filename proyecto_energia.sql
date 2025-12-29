-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 04-04-2025 a las 11:53:37
-- Versión del servidor: 8.3.0
-- Versión de PHP: 8.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto_energia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `descripcion` text,
  `parent_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `descripcion`, `parent_id`) VALUES
(1, 'Fotovoltaicos', NULL, NULL),
(2, 'Paneles', NULL, 1),
(3, 'Monocristalinos', NULL, 2),
(4, 'Policristalinos', NULL, 2),
(5, 'Baterías', NULL, 1),
(6, 'Litio', NULL, 5),
(7, 'Gel', NULL, 5),
(8, 'Inversores', NULL, 1),
(9, 'Híbridos', NULL, 8),
(10, 'Off Grid', NULL, 8),
(11, 'On Grid', NULL, 8),
(12, 'Accesorios', NULL, 1),
(13, 'Bombas', NULL, NULL),
(14, 'Bombeo Solar', NULL, 13),
(15, 'Sumergibles', NULL, 13),
(16, 'Superficiales', NULL, 13),
(17, 'Estructuras', NULL, NULL),
(18, '30 Grados', NULL, 17),
(19, 'Coplanares', NULL, 17),
(20, 'Insumos Eléctricos', NULL, NULL),
(21, 'Cajas de protecciones', NULL, 20),
(22, 'Térmicos', NULL, NULL),
(23, 'Termotanques', NULL, 22),
(24, 'Termotanques completos', NULL, 23),
(25, 'Tanques', NULL, 23),
(26, 'Soportes', NULL, 23),
(27, 'Tubos', NULL, 23),
(28, 'Accesorios', NULL, 23),
(29, 'Climatización', NULL, NULL),
(30, 'Colectores Solares', NULL, 29),
(31, 'Accesorios', NULL, 29);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE IF NOT EXISTS `productos` (


  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text,
  `imagen` varchar(255) DEFAULT NULL,
  `categoria_id` int DEFAULT NULL,
  `subcategoria_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categoria_id` (`categoria_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--

DROP TABLE IF EXISTS `proyectos`;
CREATE TABLE IF NOT EXISTS `proyectos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text,
  `ubicacion` varchar(255) NOT NULL,
  `cliente_id` int NOT NULL,
  `potencia` decimal(10,2) NOT NULL,
  `presupuesto` decimal(10,2) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `cliente_id` (`cliente_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

DROP TABLE IF EXISTS `rol`;
CREATE TABLE IF NOT EXISTS `rol` (
  `idrol` int NOT NULL AUTO_INCREMENT,
  `nombrerol` varchar(50) NOT NULL,
  `descripcion` text,
  `status` tinyint NOT NULL DEFAULT '1',
  PRIMARY KEY (`idrol`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idrol`, `nombrerol`, `descripcion`, `status`) VALUES
(1, 'Administrador', 'Acceso completo al sistema', 1),
(2, 'Cliente', 'Acceso limitado a sus proyectos', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `idusuario` int NOT NULL AUTO_INCREMENT,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(100) DEFAULT NULL,
  `rolid` int NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  PRIMARY KEY (`idusuario`),
  KEY `rolid` (`rolid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `nombres`, `apellidos`, `email`, `password`, `token`, `rolid`, `status`) VALUES
(1, 'Admin', 'Sistema', 'admin@sistema.com', '$2y$10$YClPmWdzlW.hctV9jmXDOeKqE5VXRpBXGriAkY7xF5zBrWcXOPZfq', NULL, 1, 1),
(2, 'Antonio', 'Romero', 'tony_2688@hotmail.com', '$2y$10$KjQs4VqQ7MuIzEuJkNR6XeFgfgKJGbaborR4fIVZNO..eLLNZvC5i', '87fa96669894fa6f4cc009ce8fbb16aa', 1, 1),
(3, 'Juan', 'Romero', 'juan@gmail.com', '$2y$10$jHzKtxZsQMy7obptsiRUS.142HdVb1/zpItnA2H/uCdYJtYhbbxMG', 'a175c67459026cc393afd38c42e0cf49', 2, 1),
(4, 'Simon', 'Romero', 'simon@hotmail.com', '$2y$10$k8qC7H6RJaeEzXVmJNqY4u71m8ike7Ggc8odXqgPzmwvqzij9PwYG', 'b0b811abaef32ed570f1d1dfa90a6752', 2, 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD CONSTRAINT `fk_cliente` FOREIGN KEY (`cliente_id`) REFERENCES `usuarios` (`idusuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_rol` FOREIGN KEY (`rolid`) REFERENCES `rol` (`idrol`) ON DELETE CASCADE ON UPDATE CASCADE;


-- Relaciones adicionales para la tabla productos
ALTER TABLE `productos`
ADD CONSTRAINT `fk_categoria`
FOREIGN KEY (`categoria_id`) REFERENCES `categorias`(`id`)
ON DELETE SET NULL ON UPDATE CASCADE;

ALTER TABLE `productos`
ADD CONSTRAINT `fk_subcategoria`
FOREIGN KEY (`subcategoria_id`) REFERENCES `categorias`(`id`)
ON DELETE SET NULL ON UPDATE CASCADE;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
