-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-01-2019 a las 17:27:28
-- Versión del servidor: 10.1.32-MariaDB
-- Versión de PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `usam-sistema-5`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adaptador_red`
--

CREATE TABLE `adaptador_red` (
  `id_red` int(11) NOT NULL,
  `pc_id` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `adaptador_1` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `tipo_adaptador` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `direccion_ip` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `subred_ip` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `gateway` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `servidor_primario` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `servidor_dns` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `servidor_dhcp` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `direccion_mac` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `tarjeta_extra` varchar(10) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `adaptador_red`
--

INSERT INTO `adaptador_red` (`id_red`, `pc_id`, `adaptador_1`, `tipo_adaptador`, `direccion_ip`, `subred_ip`, `gateway`, `servidor_primario`, `servidor_dns`, `servidor_dhcp`, `direccion_mac`, `tarjeta_extra`) VALUES
(1, 'LAP001USAM', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 'SI'),
(2, 'LAP--AerRC3XqdZ625378-40222H9uN', '11', '', '', '', '', '', '', '', '', 'NO'),
(3, 'PC--QRqtVyAnBL255606-2871fzqRN', NULL, NULL, '192.168.3.96', NULL, NULL, NULL, NULL, NULL, NULL, 'no hay'),
(4, 'PC001USAM', NULL, NULL, '123.123.123', NULL, NULL, NULL, NULL, NULL, NULL, 'si'),
(5, 'PC--CXhk174mMl722785-9441Md9UH', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 'si'),
(6, 'PC002USAM', NULL, NULL, '191.255.255.255', NULL, NULL, NULL, NULL, NULL, NULL, 'si'),
(7, 'LAB1-PC1', 'Tarjeta de red PCI de 10 Mbps.', 'Ethernet', '123.325.36', '123.123.123', '125.125.125', '1.2.3.4', '12.365.98.56', '666.666.666', '45:656:8:5', NULL),
(8, 'LAB1-PC2', 'Tarjeta de red PCI de 10 Mbps.', 'Ethernet', '123.325.36', '123.123.123', '125.125.125', '1.2.3.4', '12.365.98.56', '666.666.666', '45:656:8:5', NULL),
(9, 'PC--nuaW0cPj5F147089-21917XalC', NULL, NULL, '123.123.123', NULL, NULL, NULL, NULL, NULL, NULL, 'si'),
(10, 'PC004USAM', NULL, NULL, '123.123.123', NULL, NULL, NULL, NULL, NULL, NULL, 'si'),
(11, 'LAB1-PC4', 'Tarjeta de red PCI de 10 Mbps.', 'Ethernet', '123.325.36', '123.123.123', '125.125.125', '1.2.3.4', '12.365.98.56', '666.666.666', '45:656:8:5', NULL),
(12, 'LAB5-PC1', 'Tarjeta de red PCI de 10 Mbps.', 'Ethernet', '123.325.36', '123.123.123', '125.125.125', '1.2.3.4', '12.365.98.56', '666.666.666', '45:656:8:5', NULL),
(13, 'LAP002USAM', NULL, NULL, '192.168.3.96', NULL, NULL, NULL, NULL, NULL, NULL, 'no hay'),
(14, 'PC003USAM', NULL, NULL, '192.168.3.96', NULL, NULL, NULL, NULL, NULL, NULL, 'no hay'),
(15, 'LAP005USAM', NULL, NULL, '32424324-1', NULL, NULL, NULL, NULL, NULL, NULL, 'no hay'),
(16, 'LAP0008USAM', NULL, NULL, '32424324-1', NULL, NULL, NULL, NULL, NULL, NULL, 'no hay'),
(17, 'LAP009USAM', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 'NO'),
(18, 'LAP0019USAM', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 'no hay'),
(19, 'LAP0011USAM', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 'no hay'),
(20, 'LAP0012USAM', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 'no hay'),
(21, 'LAPDDE001USAMUSAM', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 'no hay'),
(22, 'LAP0014USAM', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 'no hay'),
(23, 'LAP0044USAM', NULL, NULL, '32424324-1', NULL, NULL, NULL, NULL, NULL, NULL, 'no hay'),
(24, 'LAP0067USAM', NULL, NULL, '32424324-1', NULL, NULL, NULL, NULL, NULL, NULL, 'no hay'),
(25, 'LAP0068USAM', NULL, NULL, '32424324-1', NULL, NULL, NULL, NULL, NULL, NULL, 'no hay'),
(26, 'LAP0055USAM', NULL, NULL, '192.168.3.96', NULL, NULL, NULL, NULL, NULL, NULL, 'no hay'),
(27, 'PC0054USAM', NULL, NULL, '32424324-1', NULL, NULL, NULL, NULL, NULL, NULL, 'NO'),
(28, 'PC0041USAM', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 'no hay'),
(29, 'PC0036USAM', NULL, NULL, '192.168.3.96', NULL, NULL, NULL, NULL, NULL, NULL, 'NO'),
(30, 'PC0099USAM', NULL, NULL, '32424324-1', NULL, NULL, NULL, NULL, NULL, NULL, 'no hay'),
(31, 'PC0088USAM', NULL, NULL, '32424324-1', NULL, NULL, NULL, NULL, NULL, NULL, 'no hay');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adaptador_video`
--

CREATE TABLE `adaptador_video` (
  `id_video` int(11) NOT NULL,
  `pc_id` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `monitor_marca` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `tipo` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `modelo` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `serie` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `adaptador1` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `adaptador_ram` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `tipo_dac` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `monitor_pc1` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `resolucion_video` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `velocidad` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `adaptador_video`
--

INSERT INTO `adaptador_video` (`id_video`, `pc_id`, `monitor_marca`, `tipo`, `modelo`, `serie`, `adaptador1`, `adaptador_ram`, `tipo_dac`, `monitor_pc1`, `resolucion_video`, `velocidad`) VALUES
(1, 'LAP001USAM', 'SIS', 'Intel', 'ASUS760', '', '', 'ASUS', '', '', '60HZ', ''),
(2, 'LAP--AerRC3XqdZ625378-40222H9uN', '', '1', '', '', '', '', '', '', 'HD', ''),
(3, 'PC--QRqtVyAnBL255606-2871fzqRN', 'dell', NULL, 'no tiene', '', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'PC001USAM', '', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'PC--CXhk174mMl722785-9441Md9UH', '', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'PC002USAM', '', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'LAB1-PC1', NULL, NULL, 'K-9976', NULL, 'GeForce® GTX 1050 Ti', 'DDR3', 'DAC', 'Si', '1024*1024', '3.5'),
(8, 'LAB1-PC2', NULL, NULL, NULL, NULL, 'GeForce® GTX 1050 Ti', 'DDR3', 'DAC', 'Si', '1024*1024', '3.5'),
(9, 'PC--nuaW0cPj5F147089-21917XalC', '', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'PC004USAM', '', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'LAB1-PC4', NULL, NULL, NULL, NULL, 'GeForce® GTX 1050 Ti', 'DDR3', 'DAC', 'Si', '1024*1024', '3.5'),
(12, 'LAB5-PC1', NULL, NULL, NULL, NULL, 'GeForce® GTX 1050 Ti', 'DDR3', 'DAC', 'Si', '1024*1024', '3.5'),
(13, 'LAP002USAM', '', 'Nvidea56-x', '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'PC003USAM', '', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'LAP005USAM', '', NULL, 'no tiene', '', NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'LAP0008USAM', '', NULL, 'no tiene', '', NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'LAP009USAM', '', NULL, 'no tiene', '', NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'LAP0019USAM', '', NULL, '1', '', NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'LAP0011USAM', '', NULL, 'no tiene', '', NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'LAP0012USAM', '', NULL, 'no tiene', '', NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'LAPDDE001USAMUSAM', '', NULL, 'no tiene', '', NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'LAP0014USAM', '', NULL, 'vga', '', NULL, NULL, NULL, NULL, NULL, NULL),
(23, 'LAP0044USAM', '', NULL, 'no tiene', '', NULL, NULL, NULL, NULL, NULL, NULL),
(24, 'LAP0067USAM', '', NULL, 'no tiene', '', NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'LAP0068USAM', '', NULL, 'no tiene', '', NULL, NULL, NULL, NULL, NULL, NULL),
(26, 'LAP0055USAM', '', NULL, 'vga', '', NULL, NULL, NULL, NULL, NULL, NULL),
(27, 'PC0054USAM', '', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(28, 'PC0041USAM', '', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(29, 'PC0036USAM', '', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(30, 'PC0099USAM', '', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(31, 'PC0088USAM', '', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacenamiento`
--

CREATE TABLE `almacenamiento` (
  `id_almacenamiento` int(11) NOT NULL,
  `pc_id` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `disco_fisico1` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `capacidad` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `marca_disco` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `dvd1` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `disco_logico` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `sistema_archivos` varchar(80) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `tamaño` varchar(80) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `espacio_libre` varchar(80) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `letra_unidad` varchar(10) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `almacenamiento`
--

INSERT INTO `almacenamiento` (`id_almacenamiento`, `pc_id`, `disco_fisico1`, `capacidad`, `marca_disco`, `dvd1`, `disco_logico`, `sistema_archivos`, `tamaño`, `espacio_libre`, `letra_unidad`) VALUES
(1, 'LAP001USAM', '1', '1 TB', 'WESTERN DIGITAL', 'LG 2', '', '', '', '', ''),
(2, 'LAP--AerRC3XqdZ625378-40222H9uN', '2', '2 TB', 'WESTERN DIGITAL', 'LG', NULL, NULL, NULL, NULL, NULL),
(3, 'PC--QRqtVyAnBL255606-2871fzqRN', '', '', 'WESTERN DIGITAL', 'si', NULL, NULL, NULL, NULL, NULL),
(4, 'PC001USAM', '1', '1 TB', 'HP', 'si', NULL, NULL, NULL, NULL, NULL),
(5, 'PC--CXhk174mMl722785-9441Md9UH', '1', '1 TB', 'HP', '1', NULL, NULL, NULL, NULL, NULL),
(6, 'PC002USAM', '1', '1 TB', 'HP', 'Unidad Optica HP Interna', NULL, NULL, NULL, NULL, NULL),
(7, 'LAB1-PC1', '1', '1TB', NULL, '1', 'C', 'NFFT', '1 TB', '90%', 'C'),
(8, 'LAB1-PC2', '1', '1TB', NULL, '1', 'C', 'NFFT', '1 TB', '90%', 'D'),
(9, 'PC--nuaW0cPj5F147089-21917XalC', '1', '1 TB', 'HP', '1', NULL, NULL, NULL, NULL, NULL),
(10, 'PC004USAM', '1', '1 TB', 'HP', '1', NULL, NULL, NULL, NULL, NULL),
(11, 'LAB1-PC4', '1', '1TB', NULL, '1', 'C', 'NFFT', '1 TB', '90%', 'D'),
(12, 'LAB5-PC1', '1', '1TB', NULL, '1', 'C', 'NFFT', '1 TB', '90%', 'D'),
(13, 'LAP002USAM', '1', '1 TB', 'WESTERN DIGITAL', 'LG', NULL, NULL, NULL, NULL, NULL),
(14, 'PC003USAM', '1', '1 TB', 'WESTERN DIGITAL', 'LG', NULL, NULL, NULL, NULL, NULL),
(15, 'LAP005USAM', '2', '1 TB', 'WESTERN DIGITAL', 'LG', NULL, NULL, NULL, NULL, NULL),
(16, 'LAP0008USAM', '1', '1 TB', 'sata', 'si', NULL, NULL, NULL, NULL, NULL),
(17, 'LAP009USAM', '1', '1 TB', 'WESTERN DIGITAL', 'LG', NULL, NULL, NULL, NULL, NULL),
(18, 'LAP0019USAM', '', '1 TB', 'WESTERN DIGITAL', 'LG', NULL, NULL, NULL, NULL, NULL),
(19, 'LAP0011USAM', '2', '67TB', 'WESTERN DIGITAL', 'LG', NULL, NULL, NULL, NULL, NULL),
(20, 'LAP0012USAM', '2', '8 TB', 'WESTERN DIGITAL', 'LG', NULL, NULL, NULL, NULL, NULL),
(21, 'LAPDDE001USAMUSAM', '2', '1 TB', 'WESTERN DIGITAL', 'LG', NULL, NULL, NULL, NULL, NULL),
(22, 'LAP0014USAM', '3', '67TB', 'WESTERN DIGITAL', 'LG', NULL, NULL, NULL, NULL, NULL),
(23, 'LAP0044USAM', '1', '1 TB', 'WESTERN DIGITAL', 'LG', NULL, NULL, NULL, NULL, NULL),
(24, 'LAP0067USAM', '1', '6 TB', 'WESTERN DIGITAL', 'LG', NULL, NULL, NULL, NULL, NULL),
(25, 'LAP0068USAM', '2', '1 TB', 'sata', 'LG', NULL, NULL, NULL, NULL, NULL),
(26, 'LAP0055USAM', '2', '1 TB', 'WESTERN DIGITAL', 'LG', NULL, NULL, NULL, NULL, NULL),
(27, 'PC0054USAM', '1', '1 TB', 'WESTERN DIGITAL', 'LG', NULL, NULL, NULL, NULL, NULL),
(28, 'PC0041USAM', '2', '1 TB', 'WESTERN DIGITAL', 'LG', NULL, NULL, NULL, NULL, NULL),
(29, 'PC0036USAM', '1', '1 TB', 'WESTERN DIGITAL', 'LG', NULL, NULL, NULL, NULL, NULL),
(30, 'PC0099USAM', '1', '1 TB', 'WESTERN DIGITAL', 'LG', NULL, NULL, NULL, NULL, NULL),
(31, 'PC0088USAM', '1', '1 TB', 'WESTERN DIGITAL', 'No hay', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id_compra` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `tipo_compra` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `tipo` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `detalle` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `rest` int(11) DEFAULT '0',
  `proveedor` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `n_factura` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_autorizacion` date DEFAULT NULL,
  `fecha_compra` date NOT NULL,
  `garantia` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `total` varchar(80) COLLATE utf8_spanish2_ci NOT NULL,
  `observaciones` varchar(80) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id_compra`, `tipo_compra`, `tipo`, `detalle`, `cantidad`, `rest`, `proveedor`, `n_factura`, `fecha_autorizacion`, `fecha_compra`, `garantia`, `total`, `observaciones`, `usuario_id`) VALUES
('COMPRA-9tYiRqUFWZ-9378724-6993', 'fisica', ' PC', 'no tiene detalle', 10, 6, 'dell', '5421-112', '2018-11-13', '2018-11-13', '1 año', '500.00', '', 1),
('COMPRA-E45HPcNl0F-2501693-1615', 'fisica', ' PC completa , Laptops', 'Productos varios', 11, 11, 'Intel', '11233-x-aas-xffds-00', '2019-01-04', '2019-01-04', '1 año', '5000', '', 1),
('COMPRA-l9KBfLuU6M-8651805-5221', 'fisica', ' PC completa', 'equipo nuevo completo', 10, 9, 'office depot', '123456789', '2018-12-07', '2017-12-07', '1 año', '5000', 'equipo nuevo', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra_unidad`
--

CREATE TABLE `compra_unidad` (
  `id` int(11) NOT NULL,
  `compra_id` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `unidad_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `compra_unidad`
--

INSERT INTO `compra_unidad` (`id`, `compra_id`, `unidad_id`, `cantidad`) VALUES
(2, 'COMPRA-l9KBfLuU6M-8651805-5221', 6, 2),
(3, 'COMPRA-l9KBfLuU6M-8651805-5221', 1, 2),
(4, 'COMPRA-l9KBfLuU6M-8651805-5221', 10, 2),
(5, 'COMPRA-l9KBfLuU6M-8651805-5221', 37, 4),
(6, 'COMPRA-9tYiRqUFWZ-9378724-6993', 2, 6),
(7, 'COMPRA-9tYiRqUFWZ-9378724-6993', 6, 2),
(8, 'COMPRA-l9KBfLuU6M-8651805-5221', 37, 2),
(9, 'COMPRA-l9KBfLuU6M-8651805-5221', 2, 4),
(10, 'COMPRA-l9KBfLuU6M-8651805-5221', 3, 1),
(11, 'COMPRA-l9KBfLuU6M-8651805-5221', 5, 1),
(12, 'COMPRA-l9KBfLuU6M-8651805-5221', 8, 1),
(13, 'COMPRA-E45HPcNl0F-2501693-1615', 6, 1),
(14, 'COMPRA-E45HPcNl0F-2501693-1615', 7, 1),
(15, 'COMPRA-E45HPcNl0F-2501693-1615', 9, 1),
(16, 'COMPRA-E45HPcNl0F-2501693-1615', 10, 3),
(17, 'COMPRA-9tYiRqUFWZ-9378724-6993', 7, 1),
(18, 'COMPRA-9tYiRqUFWZ-9378724-6993', 5, 1),
(19, 'COMPRA-9tYiRqUFWZ-9378724-6993', 3, 1),
(20, 'COMPRA-E45HPcNl0F-2501693-1615', 2, 3),
(21, 'COMPRA-E45HPcNl0F-2501693-1615', 3, 1),
(22, 'COMPRA-E45HPcNl0F-2501693-1615', 5, 1),
(23, 'COMPRA-l9KBfLuU6M-8651805-5221', 7, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descripcion_sistema`
--

CREATE TABLE `descripcion_sistema` (
  `id` int(11) NOT NULL,
  `pc_ids` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nombre` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `fabricante` varchar(200) DEFAULT NULL,
  `sistema_operativo` varchar(200) DEFAULT NULL,
  `nucleo` varchar(20) DEFAULT NULL,
  `paquete_servicio` varchar(200) DEFAULT NULL,
  `version` varchar(100) DEFAULT NULL,
  `usuario_registrado` varchar(200) DEFAULT NULL,
  `memoria_fisica` varchar(100) DEFAULT NULL,
  `dominio` varchar(100) DEFAULT NULL,
  `modelo` varchar(100) DEFAULT NULL,
  `serie_des` varchar(200) NOT NULL,
  `organizacion` varchar(200) DEFAULT NULL,
  `idioma` varchar(100) DEFAULT NULL,
  `zona_horaria` varchar(200) DEFAULT NULL,
  `usuario_sesion` varchar(200) DEFAULT NULL,
  `version_DirectX` varchar(50) DEFAULT NULL,
  `caja_sistema` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `descripcion_sistema`
--

INSERT INTO `descripcion_sistema` (`id`, `pc_ids`, `nombre`, `fabricante`, `sistema_operativo`, `nucleo`, `paquete_servicio`, `version`, `usuario_registrado`, `memoria_fisica`, `dominio`, `modelo`, `serie_des`, `organizacion`, `idioma`, `zona_horaria`, `usuario_sesion`, `version_DirectX`, `caja_sistema`) VALUES
(1, 'LAP001USAM', 'home', 'Intel', 'Windows 8 Pro', '64 bits', '', '6.9', 'admin', '4', 'Sin grupo', '', '12345FFDD', '', '', '', '', '', ''),
(2, 'LAP--AerRC3XqdZ625378-40222H9uN', 'home', 'Intel', 'Windows 10 Pro', '64 bits', NULL, NULL, 'admin 2', '8', 'Sin grupo', NULL, '00000', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'PC--QRqtVyAnBL255606-2871fzqRN', 'home', 'Intel', 'Windows 10 Pro', '64 bits', NULL, NULL, 'admin', '4', 'Sin grupo', NULL, '12345FFDD', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'PC001USAM', 'Equipo001', 'Intel', 'windows 10 Home', '64 bits', NULL, NULL, 'admin', '4', 'Sin grupo', NULL, '12345', NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'PC--CXhk174mMl722785-9441Md9UH', 'Equipo002', 'Intel', 'w7', '64 bits', NULL, NULL, 'admin', '4', 'Sin grupo', NULL, '444444444', NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'PC002USAM', 'Equipo03', 'Intel', 'w10', '64 bits', NULL, NULL, 'admin', '4', 'Sin grupo', NULL, '1111111111111', NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'LAB1-PC1', 'Equipo 1', 'dell', 'Windows 10', '64 bits', '2', '10', 'juan', '4 GB', 'WORKGROUP', '123456', '12345678910', 'windows', 'Español (México)', '(GMT -06:00) Hora estándar, América Central', 'juan', '12', 'Desktop'),
(8, 'LAB1-PC2', 'equipo2', 'Dell', 'Windows 10', '64 bits', '1', '2', 'Admin', '4 GB', 'WORKGROUP', 'L-01', 'D-00001', 'microsoft', 'Español (México)', '(GMT -06:00) Hora estándar, América Central', 'Equipo2', '12', 'Desktop'),
(9, 'PC--nuaW0cPj5F147089-21917XalC', 'Equipo10', 'Intel', 'windows 10 Home', '64 bits', NULL, NULL, 'admin', '4', 'Sin grupo', NULL, 'JUiz8pBLyeMjErfrj7oPdma7DLxwScm8', NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'PC004USAM', 'EQUIPO1', 'Intel', 'windows 10 Home', '64 bits', NULL, NULL, 'Admin', '4', 'Sin grupo', NULL, '444444444', NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'LAB1-PC4', 'Equipo', 'Dell', 'w10', '64 bits', '10.0', '10', 'Admin', '4 GB', 'WORKGROUP', '1245-98', '12345678910', 'microsoft', 'Español (México)', '(GMT -06:00) Hora estándar, América Central', 'admin', '12', 'Desktop'),
(12, 'LAB5-PC1', 'Equipo5', 'Dell', 'Windows 10', '64 bits', '10.0', '10', 'Admin', '4 GB', 'WORKGROUP', '123456', 'D-00001', 'microsoft', 'Español (México)', '(GMT -06:00) Hora estándar, América Central', 'admin', '12', 'Desktop'),
(13, 'LAP002USAM', 'ACADEMICA-01', 'Intel', 'windows 10', '64 bits', NULL, NULL, 'admin', '4', 'Sin grupo', NULL, '5435345-3', NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'PC003USAM', 'home', 'Intel', 'windows 10', '64 bits', NULL, NULL, 'admin', '4', 'Sin grupo', NULL, '234245565-664', NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'LAP005USAM', 'HOME-2', 'Intel', 'Windows 10 Pro', '64 bits', NULL, NULL, 'admin', '8', 'Sin grupo', NULL, '12345FFDD', NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'LAP0008USAM', 'HOME-3', 'Intel', 'Windows 10 Pro', '64 bits', NULL, NULL, 'admin', '4', 'Sin grupo', NULL, '87755000', NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'LAP009USAM', 'HOME-4', 'Intel', 'Windows 10 Pro', '64 bits', NULL, NULL, 'admin', '4', 'Sin grupo', NULL, '12345FFDD', NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'LAP0019USAM', 'Laptop064', 'Intel', 'Windows 10 Pro', '64 bits', NULL, NULL, 'admin', '4', 'Sin grupo', NULL, '12345FFDD', NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'LAP0011USAM', 'home-gerencia02', 'Intel', 'Windows 10 Pro', '64 bits', NULL, NULL, 'admin', '4', 'Sin grupo', NULL, '2300565-664', NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'LAP0012USAM', 'Laptop-home', 'Intel', 'windows 10', '64 bits', NULL, NULL, 'admin', '16', 'Sin grupo', NULL, '2132143-xe3', NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'LAPDDE001USAMUSAM', 'Laptop-AB', 'Intel', 'win 10', '64 bits', NULL, NULL, 'admin', '4', 'Sin grupo', NULL, '123245FFDD', NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'LAP0014USAM', 'Laptop-X', 'Intel', 'win 10', '64 bits', NULL, NULL, 'admin', '4', 'Sin grupo', NULL, '123245FFDD', NULL, NULL, NULL, NULL, NULL, NULL),
(23, 'LAP0044USAM', 'HOME-5', 'Intel', 'Windows 10 Pro', '64 bits', NULL, NULL, 'admin', '4', 'Sin grupo', NULL, '2300565-664', NULL, NULL, NULL, NULL, NULL, NULL),
(24, 'LAP0067USAM', 'HOME-9', 'Intel', 'Windows 10 Pro', '64 bits', NULL, NULL, 'admin', '4', 'Sin grupo', NULL, '12345FFDD', NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'LAP0068USAM', 'HOME-34', 'Intel', 'Windows 7 Pro', '64 bits', NULL, NULL, 'admin', '6', 'Sin grupo', NULL, '12345FFDD', NULL, NULL, NULL, NULL, NULL, NULL),
(26, 'LAP0055USAM', 'Laptop-home', 'Intel', 'Ubuntu 16.7', '64 bits', NULL, NULL, 'admin', '4', 'Sin grupo', NULL, '234245565-664', NULL, NULL, NULL, NULL, NULL, NULL),
(27, 'PC0054USAM', 'PC-Home', 'Intel', 'Ubuntu 16.7', '64 bits', NULL, NULL, 'admin', '4', 'Sin grupo', NULL, '11191-1', NULL, NULL, NULL, NULL, NULL, NULL),
(28, 'PC0041USAM', 'home', 'Intel', 'Windows 7 Pro', '64 bits', NULL, NULL, 'admin', '4', 'Sin grupo', NULL, '2300565-664', NULL, NULL, NULL, NULL, NULL, NULL),
(29, 'PC0036USAM', 'home-gerencia05', 'Intel', 'Ubuntu 16.7', '64 bits', NULL, NULL, 'admin', '4', 'Sin grupo', NULL, '2300565-664', NULL, NULL, NULL, NULL, NULL, NULL),
(30, 'PC0099USAM', 'Laptop-home 06', 'Intel', 'Windows 10 Pro', '64 bits', NULL, NULL, 'admin', '4', 'Sin grupo', NULL, '2300565-664', NULL, NULL, NULL, NULL, NULL, NULL),
(31, 'PC0088USAM', 'Home-pc088', 'Intel', 'Windows 8.1 Pro', '64 bits', NULL, NULL, 'admin', '4', 'Sin grupo', NULL, '2300565-664', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario_adm`
--

CREATE TABLE `inventario_adm` (
  `id_adm` int(11) NOT NULL,
  `identificador` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `encargado_puesto` text COLLATE utf8_spanish2_ci,
  `des_sistema_id` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `placa_base_id` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `adaptador_red_id` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `adaptador_video_id` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `almacenamiento_id` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `origen` int(11) DEFAULT NULL,
  `fecha_salida` date DEFAULT NULL,
  `destino` int(11) DEFAULT NULL,
  `compra_id` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `lugar_name` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `serial` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `inventario_adm`
--

INSERT INTO `inventario_adm` (`id_adm`, `identificador`, `encargado_puesto`, `des_sistema_id`, `placa_base_id`, `adaptador_red_id`, `adaptador_video_id`, `almacenamiento_id`, `fecha_ingreso`, `origen`, `fecha_salida`, `destino`, `compra_id`, `lugar_name`, `serial`) VALUES
(1, 'LAP001USAM', 'Karla Margarita', 'LAP001USAM', 'LAP001USAM', 'LAP001USAM', 'LAP001USAM', 'LAP001USAM', '2018-11-29', 1, NULL, 2, 'COMPRA-9tYiRqUFWZ-9378724-6993', 'Academica', '53x-cx2-11-0'),
(2, 'PC001USAM', 'Juan Perez', 'PC001USAM', 'PC001USAM', 'PC001USAM', 'PC001USAM', 'PC001USAM', '2018-12-07', 4, NULL, 6, 'COMPRA-l9KBfLuU6M-8651805-5221', 'RRHH', NULL),
(3, 'PC002USAM', 'Juan Perez', 'PC002USAM', 'PC002USAM', 'PC002USAM', 'PC002USAM', 'PC002USAM', '2018-12-07', 4, NULL, 10, 'COMPRA-l9KBfLuU6M-8651805-5221', 'Medicina', NULL),
(4, 'PC004USAM', '', 'PC004USAM', 'PC004USAM', 'PC004USAM', 'PC004USAM', 'PC004USAM', '2018-12-07', 4, NULL, 10, 'COMPRA-l9KBfLuU6M-8651805-5221', 'Medicina', NULL),
(5, 'LAP002USAM', 'Carlos Garcia', 'LAP002USAM', 'LAP002USAM', 'LAP002USAM', 'LAP002USAM', 'LAP002USAM', '2018-12-10', 4, NULL, 3, 'COMPRA-9tYiRqUFWZ-9378724-6993', 'Academica', '4566546456-lap'),
(6, 'PC003USAM', 'Mario Martinez', 'PC003USAM', 'PC003USAM', 'PC003USAM', 'PC003USAM', 'PC003USAM', '2018-12-11', 4, NULL, 2, 'COMPRA-9tYiRqUFWZ-9378724-6993', 'Academica', NULL),
(7, 'IMPR001USAM', 'Karla Gabriela', NULL, NULL, NULL, NULL, NULL, '2018-11-13', 4, NULL, 2, 'COMPRA-9tYiRqUFWZ-9378724-6993', 'Academica', '344-IMPR-XXX'),
(8, 'UPS002USAM', 'Mario Martinez', NULL, NULL, NULL, NULL, NULL, '2018-11-13', 4, NULL, 6, 'COMPRA-9tYiRqUFWZ-9378724-6993', 'RRHH', 'ups-xxx-000445'),
(9, 'IMPR002USAM', 'Mario Martinez', NULL, NULL, NULL, NULL, NULL, '2018-11-13', 4, NULL, 6, 'COMPRA-9tYiRqUFWZ-9378724-6993', 'RRHH', '4-xxx-0044-imp'),
(10, 'WEBCAM001USAM', 'Mario Martinez', NULL, NULL, NULL, NULL, NULL, '2018-11-13', 4, NULL, 2, 'COMPRA-9tYiRqUFWZ-9378724-6993', 'Academica', '423534-cap'),
(11, 'LAP005USAM', 'Mario Martinez', 'LAP005USAM', 'LAP005USAM', 'LAP005USAM', 'LAP005USAM', 'LAP005USAM', '2019-01-02', 4, NULL, 2, 'COMPRA-l9KBfLuU6M-8651805-5221', 'Academica', '655-0754-a-6776'),
(12, 'LAP0008USAM', 'Karla Margarita', 'LAP0008USAM', 'LAP0008USAM', 'LAP0008USAM', 'LAP0008USAM', 'LAP0008USAM', '2019-01-02', 4, NULL, 2, 'COMPRA-l9KBfLuU6M-8651805-5221', 'Academica', '400866546456-lap'),
(13, 'LAP009USAM', 'Mario Martinez', 'LAP009USAM', 'LAP009USAM', 'LAP009USAM', 'LAP009USAM', 'LAP009USAM', '2019-01-02', 4, NULL, 2, 'COMPRA-l9KBfLuU6M-8651805-5221', 'Academica', '609XX-5-0754-a-6776'),
(14, 'LAP0019USAM', 'Mario Martinez', 'LAP0019USAM', 'LAP0019USAM', 'LAP0019USAM', 'LAP0019USAM', 'LAP0019USAM', '2019-01-02', 4, NULL, 2, 'COMPRA-l9KBfLuU6M-8651805-5221', 'Academica', 'CCDH-XX-098'),
(15, 'LAP0011USAM', 'Mario Martinez', 'LAP0011USAM', 'LAP0011USAM', 'LAP0011USAM', 'LAP0011USAM', 'LAP0011USAM', '2019-01-09', 4, NULL, 3, 'COMPRA-l9KBfLuU6M-8651805-5221', 'Gerencia General', 'xx-x-a54-a-6776'),
(16, 'LAP0012USAM', 'Mario Martinez', 'LAP0012USAM', 'LAP0012USAM', 'LAP0012USAM', 'LAP0012USAM', 'LAP0012USAM', '2019-01-02', 4, NULL, 5, 'COMPRA-l9KBfLuU6M-8651805-5221', 'Contabilidad', '12-a-v-655-0754'),
(17, 'LAPDDE001USAMUSAM', 'Mario Martinez', 'LAPDDE001USAMUSAM', 'LAPDDE001USAMUSAM', 'LAPDDE001USAMUSAM', 'LAPDDE001USAMUSAM', 'LAPDDE001USAMUSAM', '2019-01-02', 4, NULL, 6, 'COMPRA-l9KBfLuU6M-8651805-5221', 'RRHH', '6577-abc-5-0754'),
(18, 'LAP0014USAM', 'Mario Martinez', 'LAP0014USAM', 'LAP0014USAM', 'LAP0014USAM', 'LAP0014USAM', 'LAP0014USAM', '2019-01-02', 4, NULL, 8, 'COMPRA-l9KBfLuU6M-8651805-5221', 'Biblioteca', '65ggg-vddxx5-0754'),
(19, 'LAP0044USAM', 'Mario Martinez', 'LAP0044USAM', 'LAP0044USAM', 'LAP0044USAM', 'LAP0044USAM', 'LAP0044USAM', '2019-01-04', 4, NULL, 6, 'COMPRA-E45HPcNl0F-2501693-1615', 'RRHH', '87777-x-00876-x1'),
(20, 'LAP0067USAM', 'Juan Garcia', 'LAP0067USAM', 'LAP0067USAM', 'LAP0067USAM', 'LAP0067USAM', 'LAP0067USAM', '2019-01-04', 4, NULL, 7, 'COMPRA-E45HPcNl0F-2501693-1615', 'Planificación', '655-0754-xxx-788t-t'),
(21, 'LAP0068USAM', 'Mario Galvez', 'LAP0068USAM', 'LAP0068USAM', 'LAP0068USAM', 'LAP0068USAM', 'LAP0068USAM', '2019-01-04', 4, NULL, 9, 'COMPRA-E45HPcNl0F-2501693-1615', 'ICTUSAM', 'c-000000-cx-x'),
(22, 'LAP0055USAM', 'Juan Garcia', 'LAP0055USAM', 'LAP0055USAM', 'LAP0055USAM', 'LAP0055USAM', 'LAP0055USAM', '2019-01-10', 4, NULL, 10, 'COMPRA-E45HPcNl0F-2501693-1615', 'Medicina', 'a-00000-x00001-1'),
(23, 'PC0054USAM', 'Mario Martinez', 'PC0054USAM', 'PC0054USAM', 'PC0054USAM', 'PC0054USAM', 'PC0054USAM', '2019-01-04', 4, NULL, 7, 'COMPRA-9tYiRqUFWZ-9378724-6993', 'Planificación', NULL),
(24, 'PC0041USAM', 'Mario Martinez', 'PC0041USAM', 'PC0041USAM', 'PC0041USAM', 'PC0041USAM', 'PC0041USAM', '2019-01-04', 4, NULL, 5, 'COMPRA-9tYiRqUFWZ-9378724-6993', 'Contabilidad', NULL),
(25, 'PC0036USAM', 'Mario Martinez', 'PC0036USAM', 'PC0036USAM', 'PC0036USAM', 'PC0036USAM', 'PC0036USAM', '2019-01-04', 4, NULL, 3, 'COMPRA-9tYiRqUFWZ-9378724-6993', 'Gerencia General', NULL),
(26, 'PC0099USAM', 'Mario Martinez', 'PC0099USAM', 'PC0099USAM', 'PC0099USAM', 'PC0099USAM', 'PC0099USAM', '2019-01-04', 4, NULL, 2, 'COMPRA-E45HPcNl0F-2501693-1615', 'Academica', NULL),
(27, 'PC0088USAM', 'Mario Martinez', 'PC0088USAM', 'PC0088USAM', 'PC0088USAM', 'PC0088USAM', 'PC0088USAM', '2019-01-04', 4, NULL, 2, 'COMPRA-E45HPcNl0F-2501693-1615', 'Academica', NULL),
(28, 'UPS0004USAM', 'Mario Martinez', NULL, NULL, NULL, NULL, NULL, '2019-01-04', 4, NULL, 10, 'COMPRA-E45HPcNl0F-2501693-1615', 'Medicina', 'ups-46566cccx-x21'),
(29, 'UPS0012USAM', 'Mario Martinez', NULL, NULL, NULL, NULL, NULL, '2019-01-04', 4, NULL, 3, 'COMPRA-E45HPcNl0F-2501693-1615', 'Gerencia General', '555435-11-ups-xx111'),
(30, 'UPS0033USAM', 'Mario Martinez', NULL, NULL, NULL, NULL, NULL, '2019-01-04', 4, NULL, 2, 'COMPRA-E45HPcNl0F-2501693-1615', 'Academica', '555435-11-ups-generico'),
(31, 'UPS0044USAM', 'Carlos Garcia', NULL, NULL, NULL, NULL, NULL, '2019-01-04', 4, NULL, 5, 'COMPRA-E45HPcNl0F-2501693-1615', 'Contabilidad', '111111-ups-334545-31'),
(32, 'UPS0055USAM', 'Mario Martinez', NULL, NULL, NULL, NULL, NULL, '2019-01-04', 4, NULL, 10, 'COMPRA-E45HPcNl0F-2501693-1615', 'Medicina', '555435-11111-xxsa'),
(33, 'UPS0066USAM', 'Mario Martinez', NULL, NULL, NULL, NULL, NULL, '2017-12-07', 4, NULL, 7, 'COMPRA-l9KBfLuU6M-8651805-5221', 'Planificación', 'xxxx-xx-ups-23456643'),
(34, 'UPS0076USAM', 'Dra. Marvin de Guevara', NULL, NULL, NULL, NULL, NULL, '2018-11-13', 4, NULL, 2, 'COMPRA-9tYiRqUFWZ-9378724-6993', 'Academica', '4340-xax-xx-22434'),
(35, 'UPS0046USAM', 'Mario Martinez', NULL, NULL, NULL, NULL, NULL, '2018-11-13', 4, NULL, 2, 'COMPRA-9tYiRqUFWZ-9378724-6993', 'Academica', '5345345-3453534534');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario_audiovisual`
--

CREATE TABLE `inventario_audiovisual` (
  `codigo_inventario` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `producto` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `discoDuro` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `capacidad_DiscoDuro` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ram` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `capacidad_ram` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `procesador` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `reloj` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `motherBoard` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `modelo_MotherBoard` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `Sistema_operativo` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `serial` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `tipo` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `equipo` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario_bodega`
--

CREATE TABLE `inventario_bodega` (
  `serial` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(80) COLLATE utf8_spanish2_ci NOT NULL,
  `marca` varchar(80) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `capacidad` varchar(80) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `tipo` varchar(80) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `velocidad` varchar(80) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `estatus` varchar(80) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `origen` int(11) DEFAULT NULL,
  `fecha_salida` date DEFAULT NULL,
  `destino` int(11) DEFAULT NULL,
  `compra_id` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `pc_servidor_id` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `pc_servidor_antiguo_id` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fecha_orden` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `inventario_bodega`
--

INSERT INTO `inventario_bodega` (`serial`, `nombre`, `marca`, `capacidad`, `tipo`, `velocidad`, `estatus`, `fecha_ingreso`, `origen`, `fecha_salida`, `destino`, `compra_id`, `pc_servidor_id`, `pc_servidor_antiguo_id`, `fecha_orden`) VALUES
('000122-x455-cxg55rewwrw', 'vga', 'dell', '', 'MONITOR', '', 'En uso', '2019-01-04', 4, NULL, 7, 'COMPRA-9tYiRqUFWZ-9378724-6993', 'PC0054USAM', NULL, '2019-01-04 15:06:20'),
('00284747587598-a', '', '', '', 'MOUSE', '', 'En uso', '2019-01-04', 4, NULL, 5, 'COMPRA-9tYiRqUFWZ-9378724-6993', 'PC0041USAM', NULL, '2019-01-04 15:17:12'),
('008111-34678-33221', '', '', '', 'MONITOR', '', 'En uso', '2019-01-04', 4, NULL, 2, 'COMPRA-E45HPcNl0F-2501693-1615', 'PC0099USAM', NULL, '2019-01-04 15:33:06'),
('1-440000ccxxx-x', '', '', '', 'MOUSE', '', 'En uso', '2018-11-29', 4, NULL, 1, 'COMPRA-9tYiRqUFWZ-9378724-6993', 'PC--QRqtVyAnBL255606-2871fzqRN', NULL, '2018-11-30 03:17:40'),
('1-aaaa-x-d-f-4-555ccxxx', 'vga', '', '', 'MONITOR', '', 'En uso', '2019-01-04', 4, NULL, 5, 'COMPRA-9tYiRqUFWZ-9378724-6993', 'PC0041USAM', NULL, '2019-01-04 15:17:12'),
('111111-ups-334545-31', 'Generico', 'DELL', '', 'UPS', 'Rapido', 'En uso', '2019-01-04', 4, NULL, 5, 'COMPRA-E45HPcNl0F-2501693-1615', 'PC0041USAM', NULL, '2019-01-04 15:45:41'),
('12-a-v-655-0754', '', 'latitude', NULL, 'LAPTOP', NULL, 'En uso', '2019-01-02', 4, NULL, 5, 'COMPRA-l9KBfLuU6M-8651805-5221', 'LAP0012USAM', NULL, '2019-01-02 14:39:54'),
('1213-56dsudssadd4544e4r421', '', '', '', 'TECLADO', '', 'En uso', '2019-01-04', 4, NULL, 2, 'COMPRA-E45HPcNl0F-2501693-1615', 'PC0088USAM', NULL, '2019-01-04 15:34:40'),
('12312c-c-r554-6666', 'usb', 'del', '', 'TECLADO', '', 'En uso', '2019-01-04', 4, NULL, 2, 'COMPRA-E45HPcNl0F-2501693-1615', 'PC0099USAM', NULL, '2019-01-04 15:33:06'),
('14523596130311432-x1', 'usb', '', '', 'TECLADO', '', 'En uso', '2018-12-11', 4, NULL, 2, 'COMPRA-9tYiRqUFWZ-9378724-6993', 'PC003USAM', NULL, '2018-12-11 17:06:48'),
('14A130311', 'usb', 'Dell', '', 'TECLADO', '', 'En uso', '2019-01-04', 4, NULL, 3, 'COMPRA-9tYiRqUFWZ-9378724-6993', 'PC0036USAM', NULL, '2019-01-04 15:30:56'),
('30493953749537-xx', 'vga', 'dell', '', 'MONITOR', '', 'En uso', '2018-12-11', 4, NULL, 2, 'COMPRA-9tYiRqUFWZ-9378724-6993', 'PC003USAM', NULL, '2018-12-11 17:06:48'),
('335-cxxx-35', '', '', '', 'MONITOR', '', 'En uso', '2018-11-29', 4, NULL, 1, 'COMPRA-9tYiRqUFWZ-9378724-6993', 'PC--QRqtVyAnBL255606-2871fzqRN', NULL, '2018-11-30 03:17:40'),
('344-IMPR-XXX', 'impresor', 'Dell', '', 'IMPRESORES-MATRICIALES', 'rapido', 'En uso', '2018-11-13', 4, NULL, 2, 'COMPRA-9tYiRqUFWZ-9378724-6993', 'PC003USAM', NULL, '2018-12-11 17:14:13'),
('4-xxx-0044-imp', 'multifuncional', 'dell', '', 'IMPRESORES-MULTIFUNCIONALES', '', 'En uso', '2018-11-13', 4, NULL, 6, 'COMPRA-9tYiRqUFWZ-9378724-6993', 'PC001USAM', NULL, '2018-12-11 17:15:54'),
('400866546456-lap', '', 'latitude', NULL, 'LAPTOP', NULL, 'En uso', '2019-01-02', 4, NULL, 2, 'COMPRA-l9KBfLuU6M-8651805-5221', 'LAP0008USAM', NULL, '2019-01-02 14:33:04'),
('401556397033-c', 'Caja', '', '1 tb', 'CPU', '', 'En uso', '2019-01-04', 4, NULL, 2, 'COMPRA-E45HPcNl0F-2501693-1615', 'PC0099USAM', NULL, '2019-01-04 15:33:06'),
('41-aaaaqqqaaaqq---xxxxxx', 'caja', '', '', 'CPU', '', 'En uso', '2019-01-04', 4, NULL, 7, 'COMPRA-9tYiRqUFWZ-9378724-6993', 'PC0054USAM', NULL, '2019-01-04 15:06:20'),
('4234-cxxxx-aaqHaga', '', '', '', 'MOUSE', '', 'En uso', '2019-01-04', 4, NULL, 2, 'COMPRA-E45HPcNl0F-2501693-1615', 'PC0088USAM', NULL, '2019-01-04 15:34:40'),
('423534-cap', 'HD Full 8K retina', 'webcam-Dell', '', 'WEBCAM', '', 'En uso', '2018-11-13', 4, NULL, 2, 'COMPRA-9tYiRqUFWZ-9378724-6993', 'PC003USAM', NULL, '2018-12-12 20:12:16'),
('4324234234234321-ups', 'Energetico', 'dell', '', 'UPS', '', 'En uso', '2018-11-13', 4, NULL, 37, 'COMPRA-9tYiRqUFWZ-9378724-6993', 'LAB1-PC1', NULL, '2018-12-14 14:28:27'),
('4340-xax-xx-22434', '', 'DELL', '', 'UPS', 'rapido', 'En uso', '2018-11-13', 4, NULL, 2, 'COMPRA-9tYiRqUFWZ-9378724-6993', 'PC0088USAM', NULL, '2019-01-04 16:25:49'),
('45554-c35788-2234', 'usb', '', '', 'TECLADO', '', 'En uso', '2019-01-04', 4, NULL, 7, 'COMPRA-9tYiRqUFWZ-9378724-6993', 'PC0054USAM', NULL, '2019-01-04 15:06:20'),
('4566546456-lap', '', 'Dell', NULL, 'LAPTOP', NULL, 'En uso', '2018-12-10', 4, NULL, 2, 'COMPRA-9tYiRqUFWZ-9378724-6993', 'LAP002USAM', NULL, '2018-12-10 20:47:02'),
('4747x-xxxx-xxx-zq1', 'usb', '', '', 'MOUSE', '', 'En uso', '2019-01-04', 4, NULL, 7, 'COMPRA-9tYiRqUFWZ-9378724-6993', 'PC0054USAM', NULL, '2019-01-04 15:06:20'),
('4774423-342-4-87-4-4', 'vga', '', '', 'MONITOR', '', 'En uso', '2019-01-04', 4, NULL, 2, 'COMPRA-E45HPcNl0F-2501693-1615', 'PC0088USAM', NULL, '2019-01-04 15:34:40'),
('5345345-3453534534', 'Generico', 'dell', '', 'UPS', 'Rapido', 'En uso', '2018-11-13', 4, NULL, 2, 'COMPRA-9tYiRqUFWZ-9378724-6993', 'PC0099USAM', NULL, '2019-01-04 16:26:42'),
('53x-cx2-11-0', 'HDMI ', 'DELL', 'HD', 'LAPTOP', '', 'En uso', '2018-11-13', 1, '2018-11-29', 2, 'COMPRA-9tYiRqUFWZ-9378724-6993', 'LAP001USAM', 'LAP--AerRC3XqdZ625378-40222H9uN', '2018-11-29 21:13:52'),
('555435-11-ups-generico', 'Generico', 'ups-system', 'no tiene', 'UPS', 'Rapido', 'En uso', '2019-01-04', 4, NULL, 2, 'COMPRA-E45HPcNl0F-2501693-1615', 'PC003USAM', NULL, '2019-01-04 15:44:30'),
('555435-11-ups-xx111', 'generico', 'webcam-Dell', '', 'UPS', 'rapido', 'En uso', '2019-01-04', 4, NULL, 3, 'COMPRA-E45HPcNl0F-2501693-1615', 'PC0036USAM', NULL, '2019-01-04 15:41:40'),
('555435-11111-xxsa', 'Energetico', 'ups-system', '', 'UPS', 'Rapido', 'En uso', '2019-01-04', 4, NULL, 10, 'COMPRA-E45HPcNl0F-2501693-1615', 'PC004USAM', NULL, '2019-01-04 15:48:39'),
('609XX-5-0754-a-6776', '', 'latitude', NULL, 'LAPTOP', NULL, 'En uso', '2019-01-02', 4, NULL, 2, 'COMPRA-l9KBfLuU6M-8651805-5221', 'LAP009USAM', NULL, '2019-01-02 14:35:27'),
('655-0754-a-6776', '', 'latitude', NULL, 'LAPTOP', NULL, 'En uso', '2019-01-02', 4, NULL, 2, 'COMPRA-l9KBfLuU6M-8651805-5221', 'LAP005USAM', NULL, '2019-01-02 14:32:06'),
('655-0754-xxx-788t-t', '', 'latitude', NULL, 'LAPTOP', NULL, 'En uso', '2019-01-04', 4, NULL, 7, 'COMPRA-E45HPcNl0F-2501693-1615', 'LAP0067USAM', NULL, '2019-01-04 14:42:21'),
('6577-abc-5-0754', '', 'Dell', NULL, 'LAPTOP', NULL, 'En uso', '2019-01-02', 4, NULL, 6, 'COMPRA-l9KBfLuU6M-8651805-5221', 'LAPDDE001USAMUSAM', NULL, '2019-01-02 14:41:00'),
('65ggg-vddxx5-0754', '', 'latitude', NULL, 'LAPTOP', NULL, 'En uso', '2019-01-02', 4, NULL, 8, 'COMPRA-l9KBfLuU6M-8651805-5221', 'LAP0014USAM', NULL, '2019-01-02 14:42:42'),
('77719287911113355', 'vga', '', '', 'MONITOR', '', 'En uso', '2019-01-04', 4, NULL, 3, 'COMPRA-9tYiRqUFWZ-9378724-6993', 'PC0036USAM', NULL, '2019-01-04 15:30:56'),
('788755r-4-444-c', '', '', '', 'MOUSE', '', 'En uso', '2019-01-04', 4, NULL, 3, 'COMPRA-9tYiRqUFWZ-9378724-6993', 'PC0036USAM', NULL, '2019-01-04 15:30:56'),
('87777-x-00876-x1', '', 'latitude', NULL, 'LAPTOP', NULL, 'En uso', '2019-01-04', 4, NULL, 6, 'COMPRA-E45HPcNl0F-2501693-1615', 'LAP0044USAM', NULL, '2019-01-04 14:39:51'),
('8877-211243-54cc', 'usb', '', '', 'MOUSE', '', 'En uso', '2018-12-11', 4, NULL, 2, 'COMPRA-9tYiRqUFWZ-9378724-6993', 'PC003USAM', NULL, '2018-12-11 17:06:48'),
('9765411-qw-wdccc-aaaxxxx', '', '', '', 'MOUSE', '', 'En uso', '2019-01-04', 4, NULL, 2, 'COMPRA-E45HPcNl0F-2501693-1615', 'PC0099USAM', NULL, '2019-01-04 15:33:06'),
('a-00000-x00001-1', '', 'Dell', NULL, 'LAPTOP', NULL, 'En uso', '2019-01-10', 4, NULL, 10, 'COMPRA-E45HPcNl0F-2501693-1615', 'LAP0055USAM', NULL, '2019-01-04 14:44:44'),
('c-000000-cx-x', '', 'latitude', NULL, 'LAPTOP', NULL, 'En uso', '2019-01-04', 4, NULL, 9, 'COMPRA-E45HPcNl0F-2501693-1615', 'LAP0068USAM', NULL, '2019-01-04 14:43:38'),
('c-x-1223dxxzd', '', '', '', 'CPU', '', 'En uso', '2018-11-29', 4, NULL, 1, 'COMPRA-9tYiRqUFWZ-9378724-6993', 'PC--QRqtVyAnBL255606-2871fzqRN', NULL, '2018-11-30 03:17:41'),
('CCDH-XX-098', '', 'latitude', NULL, 'LAPTOP', NULL, 'En uso', '2019-01-02', 4, NULL, 2, 'COMPRA-l9KBfLuU6M-8651805-5221', 'LAP0019USAM', NULL, '2019-01-02 14:36:14'),
('CPU_med04', 'Torre', 'HP', '', 'CPU', '', 'En uso', '2018-12-07', 4, NULL, 10, 'COMPRA-l9KBfLuU6M-8651805-5221', 'PC004USAM', NULL, '2018-12-07 19:41:14'),
('cpu-5565211-1', '', '', '', 'CPU', '', 'En uso', '2019-01-04', 4, NULL, 2, 'COMPRA-E45HPcNl0F-2501693-1615', 'PC0088USAM', NULL, '2019-01-04 15:34:40'),
('CPU001', 'Torre', 'HP', '', 'CPU', '3.5', 'En uso', '2018-12-07', 4, NULL, 6, 'COMPRA-l9KBfLuU6M-8651805-5221', 'PC001USAM', NULL, '2018-12-07 17:35:52'),
('CPU002', 'Torre', 'HP', '', 'CPU', '', 'En uso', '2018-12-07', 4, NULL, 1, 'COMPRA-l9KBfLuU6M-8651805-5221', 'PC--CXhk174mMl722785-9441Md9UH', NULL, '2018-12-07 17:38:19'),
('CPU10', 'Torre', 'HP', '', 'CPU', '', 'En uso', '2018-12-07', 4, NULL, 1, 'COMPRA-l9KBfLuU6M-8651805-5221', 'PC--nuaW0cPj5F147089-21917XalC', NULL, '2018-12-07 19:38:26'),
('cpu2', 'Torre', 'Dell', '', 'CPU', '', 'En uso', '2018-12-07', 4, NULL, 10, 'COMPRA-l9KBfLuU6M-8651805-5221', 'PC002USAM', NULL, '2018-12-07 17:40:32'),
('cpu4', 'CPU', 'Dell', '', 'CPU', '3.5', 'nuevo', '2018-12-07', 4, NULL, 37, 'COMPRA-l9KBfLuU6M-8651805-5221', 'LAB1-PC4', NULL, '2018-12-07 19:45:27'),
('cpu5', 'CPU', 'Dell', '', 'CPU', '3.5', 'nuevo', '2018-12-07', 4, NULL, 37, 'COMPRA-l9KBfLuU6M-8651805-5221', 'LAB5-PC1', NULL, '2018-12-07 19:48:47'),
('cpulab1-1', 'CPU', 'Dell', '', 'CPU', '', 'nuevo', '2018-12-07', 4, NULL, 37, 'COMPRA-l9KBfLuU6M-8651805-5221', 'LAB1-PC1', NULL, '2018-12-07 17:44:12'),
('cpulab1-2', 'CPU', '', '', 'CPU', '', 'nuevo', '2018-12-07', 4, NULL, 37, 'COMPRA-l9KBfLuU6M-8651805-5221', 'LAB1-PC2', NULL, '2018-12-07 17:47:43'),
('dd-xxxx342347', 'caja', '', '', 'CPU', '', 'En uso', '2018-12-11', 4, NULL, 2, 'COMPRA-9tYiRqUFWZ-9378724-6993', 'PC003USAM', NULL, '2018-12-11 17:06:48'),
('lap-000111', '', 'dell', '', 'LAPTOP', '', 'Disponible', '2018-11-13', 2, NULL, 1, 'COMPRA-9tYiRqUFWZ-9378724-6993', 'LAP--AerRC3XqdZ625378-40222H9uN', 'LAP001USAM', '2018-11-29 20:29:24'),
('monitor_med04', 'LED', 'HP', '', 'MONITOR', '', 'En uso', '2018-12-07', 4, NULL, 10, 'COMPRA-l9KBfLuU6M-8651805-5221', 'PC004USAM', NULL, '2018-12-07 19:41:14'),
('Monitor001', 'LED', 'HP', '', 'MONITOR', '', 'Disponible', '2018-12-07', 6, NULL, 1, 'COMPRA-l9KBfLuU6M-8651805-5221', NULL, 'PC001USAM', '2018-12-07 17:35:52'),
('monitor002', 'LED', 'HP', '', 'MONITOR', '', 'En uso', '2018-12-07', 4, NULL, 1, 'COMPRA-l9KBfLuU6M-8651805-5221', 'PC--CXhk174mMl722785-9441Md9UH', NULL, '2018-12-07 17:38:19'),
('monitor10', 'LED', 'HP', '', 'MONITOR', '', 'En uso', '2018-12-07', 4, NULL, 1, 'COMPRA-l9KBfLuU6M-8651805-5221', 'PC--nuaW0cPj5F147089-21917XalC', NULL, '2018-12-07 19:38:26'),
('Monitor2', 'VGA', 'HP', '', 'MONITOR', '', 'En uso', '2018-12-07', 1, '2018-12-07', 6, 'COMPRA-l9KBfLuU6M-8651805-5221', 'PC001USAM', NULL, '2018-12-07 17:40:32'),
('monitor4', 'MONITOR', 'Dell', '', 'MONITOR', '', 'En uso', '2018-12-07', 1, '2018-12-10', 6, 'COMPRA-l9KBfLuU6M-8651805-5221', 'PC001USAM', 'LAB1-PC4', '2018-12-07 19:45:27'),
('monitor5', 'MONITOR', 'Dell', '', 'MONITOR', '', 'nuevo', '2018-12-07', 4, NULL, 37, 'COMPRA-l9KBfLuU6M-8651805-5221', 'LAB5-PC1', NULL, '2018-12-07 19:48:47'),
('MONITORlab1-1', 'MONITOR', 'HP', '', 'MONITOR', '', 'En uso', '2018-12-07', 10, '2018-12-07', 37, 'COMPRA-l9KBfLuU6M-8651805-5221', 'LAB1-PC1', 'PC002USAM', '2018-12-07 17:44:12'),
('MONITORlab1-2', 'MONITOR', 'Dell', '', 'MONITOR', '', 'nuevo', '2018-12-07', 4, NULL, 37, 'COMPRA-l9KBfLuU6M-8651805-5221', 'LAB1-PC2', NULL, '2018-12-07 17:47:43'),
('Mouse_med04', 'USB', 'HP', '', 'MOUSE', '', 'En uso', '2018-12-07', 4, NULL, 10, 'COMPRA-l9KBfLuU6M-8651805-5221', 'PC004USAM', NULL, '2018-12-07 19:41:14'),
('Mouse001', 'USB', 'HP', '', 'MOUSE', '', 'En uso', '2018-12-07', 4, NULL, 6, 'COMPRA-l9KBfLuU6M-8651805-5221', 'PC001USAM', NULL, '2018-12-07 17:35:52'),
('Mouse002', 'USB', 'HP', '', 'MOUSE', '', 'En uso', '2018-12-07', 4, NULL, 1, 'COMPRA-l9KBfLuU6M-8651805-5221', 'PC--CXhk174mMl722785-9441Md9UH', NULL, '2018-12-07 17:38:19'),
('MOUSE10', 'USB', 'HP', '', 'MOUSE', '', 'En uso', '2018-12-07', 4, NULL, 1, 'COMPRA-l9KBfLuU6M-8651805-5221', 'PC--nuaW0cPj5F147089-21917XalC', NULL, '2018-12-07 19:38:26'),
('mouse2', 'USB', 'HP', '', 'MOUSE', '', 'En uso', '2018-12-07', 4, NULL, 10, 'COMPRA-l9KBfLuU6M-8651805-5221', 'PC002USAM', NULL, '2018-12-07 17:40:32'),
('mouse4', 'MOUSE', 'Dell', '', 'MOUSE', '', 'nuevo', '2018-12-07', 4, NULL, 37, 'COMPRA-l9KBfLuU6M-8651805-5221', 'LAB1-PC4', NULL, '2018-12-07 19:45:27'),
('Mouse5', 'MOUSE', 'Dell', '', 'MOUSE', '', 'nuevo', '2018-12-07', 4, NULL, 37, 'COMPRA-l9KBfLuU6M-8651805-5221', 'LAB5-PC1', NULL, '2018-12-07 19:48:47'),
('mouselab1-1', 'MOUSE', 'HP', '', 'MOUSE', '', 'nuevo', '2018-12-07', 4, NULL, 37, 'COMPRA-l9KBfLuU6M-8651805-5221', 'LAB1-PC1', NULL, '2018-12-07 17:44:12'),
('mouselab1-2', 'MOUSE', '', '', 'MOUSE', '', 'nuevo', '2018-12-07', 4, NULL, 37, 'COMPRA-l9KBfLuU6M-8651805-5221', 'LAB1-PC2', NULL, '2018-12-07 17:47:43'),
('teclado_med04', 'USB', 'HP', '', 'TECLADO', '', 'En uso', '2018-12-07', 4, NULL, 10, 'COMPRA-l9KBfLuU6M-8651805-5221', 'PC004USAM', NULL, '2018-12-07 19:41:14'),
('TECLADO001', 'USB', 'HP', '', 'TECLADO', '', 'En uso', '2018-12-07', 4, NULL, 6, 'COMPRA-l9KBfLuU6M-8651805-5221', 'PC001USAM', NULL, '2018-12-07 17:35:52'),
('teclado002', 'usb', 'HP', '', 'TECLADO', '', 'En uso', '2018-12-07', 4, NULL, 1, 'COMPRA-l9KBfLuU6M-8651805-5221', 'PC--CXhk174mMl722785-9441Md9UH', NULL, '2018-12-07 17:38:19'),
('Teclado10', 'USB', 'HP', '', 'TECLADO', '', 'En uso', '2018-12-07', 4, NULL, 1, 'COMPRA-l9KBfLuU6M-8651805-5221', 'PC--nuaW0cPj5F147089-21917XalC', NULL, '2018-12-07 19:38:26'),
('teclado2', 'USB', 'HP', '', 'TECLADO', '', 'En uso', '2018-12-07', 4, NULL, 10, 'COMPRA-l9KBfLuU6M-8651805-5221', 'PC002USAM', NULL, '2018-12-07 17:40:32'),
('teclado4', 'TECLADO', 'Dell', '', 'TECLADO', '', 'nuevo', '2018-12-07', 4, NULL, 37, 'COMPRA-l9KBfLuU6M-8651805-5221', 'LAB1-PC4', NULL, '2018-12-07 19:45:27'),
('teclado5', 'TECLADO', 'Dell', '', 'TECLADO', '', 'nuevo', '2018-12-07', 4, NULL, 37, 'COMPRA-l9KBfLuU6M-8651805-5221', 'LAB5-PC1', NULL, '2018-12-07 19:48:47'),
('tecladolab1-1', 'USB', 'Dell', '', 'TECLADO', '', 'En uso', '2018-12-07', 10, '0000-00-00', 37, 'COMPRA-l9KBfLuU6M-8651805-5221', 'LAB1-PC1', 'PC002USAM', '2018-12-07 17:44:12'),
('tecladolab1-2', 'TECLADO', 'HP', '', 'TECLADO', '', 'nuevo', '2018-12-07', 4, NULL, 37, 'COMPRA-l9KBfLuU6M-8651805-5221', 'LAB1-PC2', NULL, '2018-12-07 17:47:43'),
('ups-33343250', 'generico', 'ups-system', '', 'UPS', '', 'Disponible', '2018-12-07', 38, NULL, 1, NULL, NULL, NULL, '2018-12-07 20:45:01'),
('ups-46566cccx-x21', 'generico', 'DELL', '', 'UPS', 'rapido', 'En uso', '2019-01-04', 4, NULL, 10, 'COMPRA-E45HPcNl0F-2501693-1615', 'PC004USAM', NULL, '2019-01-04 15:40:18'),
('ups-xxx-000445', 'UPS-GENERICO', 'dell', '', 'UPS', '', 'En uso', '2018-11-13', 4, NULL, 6, 'COMPRA-9tYiRqUFWZ-9378724-6993', 'PC001USAM', NULL, '2018-12-11 17:14:54'),
('v--cc4357888-31', '', '', '', 'CPU', '', 'En uso', '2019-01-04', 4, NULL, 3, 'COMPRA-9tYiRqUFWZ-9378724-6993', 'PC0036USAM', NULL, '2019-01-04 15:30:56'),
('x----5521111121', '', '', '', 'TECLADO', '', 'En uso', '2019-01-04', 4, NULL, 5, 'COMPRA-9tYiRqUFWZ-9378724-6993', 'PC0041USAM', NULL, '2019-01-04 15:17:12'),
('x-45d-42304820342344', '', '', '', 'CPU', '', 'En uso', '2019-01-04', 4, NULL, 5, 'COMPRA-9tYiRqUFWZ-9378724-6993', 'PC0041USAM', NULL, '2019-01-04 15:17:12'),
('xcc-46878832', '', '', '', 'TECLADO', '', 'En uso', '2018-11-29', 4, NULL, 1, 'COMPRA-9tYiRqUFWZ-9378724-6993', 'PC--QRqtVyAnBL255606-2871fzqRN', NULL, '2018-11-30 03:17:40'),
('xx-x-a54-a-6776', '', 'latitude', NULL, 'LAPTOP', NULL, 'En uso', '2019-01-09', 4, NULL, 3, 'COMPRA-l9KBfLuU6M-8651805-5221', 'LAP0011USAM', NULL, '2019-01-02 14:37:23'),
('xxxx-xx-8655f-xcd', 'Energetico', 'dell', '', 'UPS', '', 'En uso', '2018-11-13', 4, NULL, 37, 'COMPRA-9tYiRqUFWZ-9378724-6993', 'LAB1-PC2', NULL, '2018-12-14 16:42:15'),
('xxxx-xx-ups-23456643', 'Generico', 'dell', '', 'UPS', 'rapido', 'En uso', '2017-12-07', 4, NULL, 7, 'COMPRA-l9KBfLuU6M-8651805-5221', 'PC0054USAM', NULL, '2019-01-04 16:21:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario_lab`
--

CREATE TABLE `inventario_lab` (
  `id_lab` int(11) NOT NULL,
  `identificador_lab` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion_sistema_id` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `placa_base_id` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `adaptador_red_id` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `adaptador_video_id` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `almacenamiento_id` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `origen` int(11) DEFAULT NULL,
  `fecha_salida` date DEFAULT NULL,
  `destino` int(11) DEFAULT NULL,
  `serial` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `lab` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `compra_id` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `inventario_lab`
--

INSERT INTO `inventario_lab` (`id_lab`, `identificador_lab`, `descripcion_sistema_id`, `placa_base_id`, `adaptador_red_id`, `adaptador_video_id`, `almacenamiento_id`, `fecha_ingreso`, `origen`, `fecha_salida`, `destino`, `serial`, `lab`, `compra_id`) VALUES
(1, 'LAB1-PC1', 'LAB1-PC1', 'LAB1-PC1', 'LAB1-PC1', 'LAB1-PC1', 'LAB1-PC1', '2018-12-07', 4, NULL, 37, NULL, 'lab-01', 'COMPRA-l9KBfLuU6M-8651805-5221'),
(2, 'LAB1-PC2', 'LAB1-PC2', 'LAB1-PC2', 'LAB1-PC2', 'LAB1-PC2', 'LAB1-PC2', '2018-12-07', 4, NULL, 37, NULL, 'lab-01', 'COMPRA-l9KBfLuU6M-8651805-5221'),
(3, 'LAB1-PC4', 'LAB1-PC4', 'LAB1-PC4', 'LAB1-PC4', 'LAB1-PC4', 'LAB1-PC4', '2018-12-07', 4, NULL, 37, NULL, 'lab-01', 'COMPRA-l9KBfLuU6M-8651805-5221'),
(4, 'LAB5-PC1', 'LAB5-PC1', 'LAB5-PC1', 'LAB5-PC1', 'LAB5-PC1', 'LAB5-PC1', '2018-12-07', 4, NULL, 37, NULL, 'lab-05', 'COMPRA-l9KBfLuU6M-8651805-5221'),
(5, 'UPS001LAB1', NULL, NULL, NULL, NULL, NULL, '2018-11-13', 4, NULL, 37, '4324234234234321-ups', '01', 'COMPRA-9tYiRqUFWZ-9378724-6993'),
(6, 'UPS003LAB1', NULL, NULL, NULL, NULL, NULL, '2018-11-13', 4, NULL, 37, 'xxxx-xx-8655f-xcd', '01', 'COMPRA-9tYiRqUFWZ-9378724-6993');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimiento`
--

CREATE TABLE `movimiento` (
  `id_cambio` int(11) NOT NULL,
  `token` text NOT NULL,
  `fecha_retiro` varchar(200) DEFAULT NULL,
  `fecha_cambio` varchar(200) DEFAULT NULL,
  `codigo_id` varchar(200) DEFAULT NULL,
  `unidad_pertenece_id` int(11) DEFAULT NULL,
  `unidad_traslado_id` int(11) DEFAULT NULL,
  `cambio` text,
  `descripcion_cambio` text,
  `origen_nuevoEquipo_id` int(11) DEFAULT NULL,
  `destino_nuevoEquipo_id` int(11) DEFAULT NULL,
  `descripcion_equipoRetirado` text,
  `descripcion_equipoNuevo` text,
  `encargado` varchar(250) DEFAULT NULL,
  `tecnico` varchar(250) DEFAULT NULL,
  `tipoHardSoft` varchar(100) DEFAULT NULL,
  `tipo_movimiento` varchar(100) DEFAULT NULL,
  `serial_nuevo` text,
  `laboratorio` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `movimiento`
--

INSERT INTO `movimiento` (`id_cambio`, `token`, `fecha_retiro`, `fecha_cambio`, `codigo_id`, `unidad_pertenece_id`, `unidad_traslado_id`, `cambio`, `descripcion_cambio`, `origen_nuevoEquipo_id`, `destino_nuevoEquipo_id`, `descripcion_equipoRetirado`, `descripcion_equipoNuevo`, `encargado`, `tecnico`, `tipoHardSoft`, `tipo_movimiento`, `serial_nuevo`, `laboratorio`) VALUES
(1, 'token--ZgyYXBDE0C517967-5166SRrL8', '2017-11-29', '2017-11-29', 'LAP001USAM', NULL, NULL, 'Asignación de laptop', 'Porque necesitamos una laptop nueva', 1, 2, NULL, 'intel core i5 9900K 5.8GHZ intel graphics 9900 HD 2 GB', 'Karla Margarita', 'Carlos Garcia', 'HARDWARE-EXTERNO', 'Asignacion-bodega', 'lap-000111', NULL),
(9, 'token--GAr9PWjLId533817-1563E4IWQ', '', '2015-12-07', 'PC002USAM', 10, 38, 'Prestamo de TECLADO del equipo LAB1-PC1 a el equipo PC002USAM', 'actualización', 37, 10, 'ninguna', 'teclado', 'Lic Claudia Martinez', 'Técnico', 'HARDWARE-EXTERNO', 'Prestamo', 'tecladolab1-1', 'LAB1'),
(10, 'token--e1GOLE4nMd869470-1058uhlap', '2018-12-07', '2018-11-07', 'PC002USAM', 10, 1, 'Prestamo de MONITOR del equipo LAB1-PC1 a el equipo PC002USAM', 'se arruino el monito', 37, 10, 'serial: Monitor2 marca: HP tipo: MONITOR', 'monitor', 'Juan Perez', 'Luigui', 'HARDWARE-EXTERNO', 'Prestamo', 'MONITORlab1-1', 'LAB1'),
(11, 'token--6CjSvaAN0w923047-2395Nigem', '2018-12-07', '2018-12-07', 'PC001USAM', 6, 1, 'Monitor mas grande', 'Necesidades de un monitor mas grande', 1, 6, 'Monitor de 15 pulgadas', 'monitor de 24 pulgadas', 'Karla Martinez', 'Kevin', 'HARDWARE-EXTERNO', 'Sustitucion-bodega', 'Monitor2', NULL),
(12, 'token--5eaI7JCVnq559054-355015T4Z', NULL, '2018-12-07', 'PC001USAM', NULL, NULL, 'Necesitamos un monitor extra', 'Necesidad de monitor', 1, 6, NULL, 'MOnitor de 24 pulgadas', 'Karla', 'Juan', 'HARDWARE-EXTERNO', 'Asignacion-bodega', 'Monitor001', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificacion`
--

CREATE TABLE `notificacion` (
  `id` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `titulo` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `mensaje` text COLLATE utf8_spanish2_ci NOT NULL,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificacion_usuario`
--

CREATE TABLE `notificacion_usuario` (
  `id` int(11) NOT NULL,
  `notificacion_id` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `estado` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `placa_base`
--

CREATE TABLE `placa_base` (
  `id` int(11) NOT NULL,
  `pc_id` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `procesador` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `velocidad_reloj` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fabricante_procesador` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `etiqueta_BIOS` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fabricante_BIOS` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `version_BIOS` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `num_serie_BIOS` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fecha_instalacion_BIOS` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fabricante_placa` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `modelo_placa` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `version_placa` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `marca_ram` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `ranura_memoria` text COLLATE utf8_spanish2_ci,
  `ranura_sistema_0` text COLLATE utf8_spanish2_ci,
  `ranura_sistema_1` text COLLATE utf8_spanish2_ci,
  `ranura_sistema_2` text COLLATE utf8_spanish2_ci,
  `ranura_sistema_3` text COLLATE utf8_spanish2_ci,
  `ranura_sistema_4` text COLLATE utf8_spanish2_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `placa_base`
--

INSERT INTO `placa_base` (`id`, `pc_id`, `procesador`, `velocidad_reloj`, `fabricante_procesador`, `etiqueta_BIOS`, `fabricante_BIOS`, `version_BIOS`, `num_serie_BIOS`, `fecha_instalacion_BIOS`, `fabricante_placa`, `modelo_placa`, `version_placa`, `marca_ram`, `ranura_memoria`, `ranura_sistema_0`, `ranura_sistema_1`, `ranura_sistema_2`, `ranura_sistema_3`, `ranura_sistema_4`) VALUES
(1, 'LAP001USAM', 'Core i9 9100K', '7-8 GHZ', 'Intel ', '', '', '', '', '', '', 'ASUS', '', 'KIN', '', '', '', '', '', ''),
(2, 'LAP--AerRC3XqdZ625378-40222H9uN', 'Core i3 7100', '6.7 GHZ', 'Intel', NULL, NULL, NULL, NULL, NULL, NULL, 'Sin grupo', NULL, 'Sin grupo', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'PC--QRqtVyAnBL255606-2871fzqRN', 'Core i3 7100', '6.7 GHZ', 'Intel', NULL, NULL, NULL, NULL, NULL, NULL, 'ASUS', NULL, 'ADATA', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'PC001USAM', 'Intel Quad-Core i3-8100', '3.4', 'Intel', NULL, NULL, NULL, NULL, NULL, NULL, 'HP', NULL, 'HiperX Fury', NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'PC--CXhk174mMl722785-9441Md9UH', 'i7', '3.6', 'Intel', NULL, NULL, NULL, NULL, NULL, NULL, 'Optiplex GX270', NULL, 'HiperX Fury', NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'PC002USAM', 'Intel Quad-Core i3-8100', '2.5', 'Intel', NULL, NULL, NULL, NULL, NULL, NULL, 'Optiplex GX270', NULL, 'HiperX Fury', NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'LAB1-PC1', 'Intel - Core 3', '3.5', 'Intel', 'BIO star', 'Dell', '2.5', 'Dell-12', '2018-12-10', 'Dell', 'D-14', '14', '', '', '', '', '', '', ''),
(8, 'LAB1-PC2', 'Intel - Core 3', '3.5', 'Intel', 'BIO star', 'Dell', '', '5555555', '2006-12-12', 'Dell', 'D-14', '14', 'Dell', '', '', '', '', '', ''),
(9, 'PC--nuaW0cPj5F147089-21917XalC', 'Intel Quad-Core i3-8100', '3.5', 'Intel', NULL, NULL, NULL, NULL, NULL, NULL, 'HP', NULL, 'HiperX Fury', NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'PC004USAM', 'Intel Quad-Core i3-8100', '3.5', 'Intel', NULL, NULL, NULL, NULL, NULL, NULL, 'HP', NULL, 'HiperX Fury', NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'LAB1-PC4', 'Intel - Core 3', '3.5', 'Intel', 'BIO star', 'Dell', '2.3', '98765432154', '2018-12-07', 'Dell', 'D-14', '14', 'Dell', '', '', '', '', '', ''),
(12, 'LAB5-PC1', 'Intel - Core 3', '3.5', 'Intel', 'BIO star', 'Dell', '2.5', 'Dell-12', '2018-12-07', 'Dell', 'D-14', '14', 'Dell', '', '', '', '', '', ''),
(13, 'LAP002USAM', 'Intel core i5 4400K', '3.2 GHZ', 'Intel', NULL, NULL, NULL, NULL, NULL, NULL, 'Sin grupo', NULL, 'Kin', NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'PC003USAM', 'intel core i5 9900K', '6.7 GHZ', 'Intel', NULL, NULL, NULL, NULL, NULL, NULL, 'ASUS xxx-x', NULL, 'ADATA', NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'LAP005USAM', 'Core i3 7100', '6.7 GHZ', 'Intel', NULL, NULL, NULL, NULL, NULL, NULL, 'Sin grupo', NULL, 'Sin grupo', NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'LAP0008USAM', 'intel core i5 9900K', '6.7 GHZ', 'Intel', NULL, NULL, NULL, NULL, NULL, NULL, 'Sin grupo', NULL, 'Sin grupo', NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'LAP009USAM', 'Core i3 7100', '6.7 GHZ', 'Intel', NULL, NULL, NULL, NULL, NULL, NULL, 'Sin grupo', NULL, 'Sin grupo', NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'LAP0019USAM', 'core i5', '6.7 GHZ', 'Intel', NULL, NULL, NULL, NULL, NULL, NULL, 'Sin grupo', NULL, 'Sin grupo', NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'LAP0011USAM', 'intel core i5 9900K', '6.7 GHZ', 'Intel', NULL, NULL, NULL, NULL, NULL, NULL, 'Sin grupo', NULL, 'Sin grupo', NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'LAP0012USAM', 'Core i12 9100K', '7.7 GHZ', 'Intel', NULL, NULL, NULL, NULL, NULL, NULL, 'Sin grupo', NULL, 'Sin grupo', NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'LAPDDE001USAMUSAM', 'Core i3 7100', '6.7 GHZ', 'Intel', NULL, NULL, NULL, NULL, NULL, NULL, 'Sin grupo', NULL, 'Sin grupo', NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'LAP0014USAM', 'core i5', '6.7 GHZ', 'Intel', NULL, NULL, NULL, NULL, NULL, NULL, 'Sin grupo', NULL, 'Sin grupo', NULL, NULL, NULL, NULL, NULL, NULL),
(23, 'LAP0044USAM', 'Core i3 7100', '6.7 GHZ', 'Intel', NULL, NULL, NULL, NULL, NULL, NULL, 'Sin grupo', NULL, 'Sin grupo', NULL, NULL, NULL, NULL, NULL, NULL),
(24, 'LAP0067USAM', 'Core i3 7100', '2.1 GHZ', 'Intel', NULL, NULL, NULL, NULL, NULL, NULL, 'Sin grupo', NULL, 'Sin grupo', NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'LAP0068USAM', 'Core i3 4100', '3.0 GHZ', 'Intel', NULL, NULL, NULL, NULL, NULL, NULL, 'Sin grupo', NULL, 'Sin grupo', NULL, NULL, NULL, NULL, NULL, NULL),
(26, 'LAP0055USAM', 'Core i3 7100', '9.6GHZ', 'Intel', NULL, NULL, NULL, NULL, NULL, NULL, 'Sin grupo', NULL, 'Sin grupo', NULL, NULL, NULL, NULL, NULL, NULL),
(27, 'PC0054USAM', 'Core i3 7100', '2.1 GHZ', 'Intel', NULL, NULL, NULL, NULL, NULL, NULL, 'ASUS', NULL, 'ADATA', NULL, NULL, NULL, NULL, NULL, NULL),
(28, 'PC0041USAM', 'Core i3 4100', '3.2 GHZ', 'Intel', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL),
(29, 'PC0036USAM', 'core i5', '2.1 GHZ', 'Intel', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 'ADATA', NULL, NULL, NULL, NULL, NULL, NULL),
(30, 'PC0099USAM', 'Intel dual core ', '2.1 GHZ', 'Intel', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 'ADATA', NULL, NULL, NULL, NULL, NULL, NULL),
(31, 'PC0088USAM', 'Core i3 7100', '2.1 GHZ', 'Intel', NULL, NULL, NULL, NULL, NULL, NULL, 'ASUS xxx-x', NULL, 'ADATA', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `software`
--

CREATE TABLE `software` (
  `id` int(11) NOT NULL,
  `pc_id` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `PC_lab_id` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nombre` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `empresa` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nom_carpeta` text COLLATE utf8_spanish2_ci,
  `version` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nom_archivo` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad`
--

CREATE TABLE `unidad` (
  `id_unidad` int(11) NOT NULL,
  `unidad` varchar(80) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `unidad`
--

INSERT INTO `unidad` (`id_unidad`, `unidad`) VALUES
(1, 'bodega de informatica'),
(2, 'Academica'),
(3, 'Gerencia General'),
(4, 'nuevo'),
(5, 'Contabilidad'),
(6, 'RRHH'),
(7, 'Planificación'),
(8, 'Biblioteca'),
(9, 'ICTUSAM'),
(10, 'Medicina'),
(11, 'Proyecto Social'),
(12, 'Extensión Cultural'),
(13, 'Colecturia'),
(14, 'Secretaria General'),
(15, 'Egresados y Graduados'),
(16, 'Ultrasonografia'),
(17, 'Rectoria y Vicerrectoria'),
(18, 'Decanato de Jurisprudencia'),
(19, 'Odontología'),
(20, 'Veterinaria'),
(21, 'Química y Farmacia'),
(22, 'Gestión Educativa'),
(23, 'Control de calidad'),
(24, 'Ciencias Empresariales'),
(25, 'Informática'),
(26, 'Relaciones Públicas'),
(27, 'Audiovisuales'),
(28, 'Fiscalia'),
(29, 'URNI'),
(30, 'Enfermeria'),
(31, 'CEFADE'),
(32, 'OFAL'),
(33, 'Almacen y Bodega'),
(34, 'Celula de Quimica'),
(35, 'Proyecto USAID'),
(36, 'Otros proyectos'),
(37, 'laboratorios'),
(38, 'sin origen');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `apellido` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `cargo` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `correo` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `password` varchar(80) COLLATE utf8_spanish2_ci NOT NULL,
  `rol` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `usuario`, `nombre`, `apellido`, `cargo`, `correo`, `password`, `rol`) VALUES
(1, 'fran001', 'Francisco', 'navas', 'administrador', 'navasfran98@gmail.com', 'e190d72eea11d9049870eaa2d41e410f', 'super usuario'),
(2, 'enrique001', 'Enrique', 'Quezada', 'administrador', 'enrique.qzada@gmail.com', 'e190d72eea11d9049870eaa2d41e410f', 'super usuario'),
(4, 'root', 'root', 'root', 'root', 'root@gmail.com', '63a9f0ea7bb98050796b649e85481845', 'root');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `adaptador_red`
--
ALTER TABLE `adaptador_red`
  ADD PRIMARY KEY (`id_red`),
  ADD UNIQUE KEY `pc_id_2` (`pc_id`),
  ADD KEY `pc_id` (`pc_id`);

--
-- Indices de la tabla `adaptador_video`
--
ALTER TABLE `adaptador_video`
  ADD PRIMARY KEY (`id_video`),
  ADD UNIQUE KEY `pc_id` (`pc_id`),
  ADD KEY `pc_id_2` (`pc_id`);

--
-- Indices de la tabla `almacenamiento`
--
ALTER TABLE `almacenamiento`
  ADD PRIMARY KEY (`id_almacenamiento`),
  ADD UNIQUE KEY `pc_id` (`pc_id`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id_compra`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `usuario_id_2` (`usuario_id`);

--
-- Indices de la tabla `compra_unidad`
--
ALTER TABLE `compra_unidad`
  ADD PRIMARY KEY (`id`),
  ADD KEY `compra_id` (`compra_id`),
  ADD KEY `unidad_id` (`unidad_id`);

--
-- Indices de la tabla `descripcion_sistema`
--
ALTER TABLE `descripcion_sistema`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pc_ids` (`pc_ids`);

--
-- Indices de la tabla `inventario_adm`
--
ALTER TABLE `inventario_adm`
  ADD PRIMARY KEY (`id_adm`),
  ADD UNIQUE KEY `identificador` (`identificador`),
  ADD KEY `origen` (`origen`),
  ADD KEY `destino` (`destino`),
  ADD KEY `compra_id` (`compra_id`),
  ADD KEY `placa_base_id` (`placa_base_id`),
  ADD KEY `adaptador_red_id` (`adaptador_red_id`),
  ADD KEY `almacenamiento_id` (`almacenamiento_id`),
  ADD KEY `adaptador_video_id` (`adaptador_video_id`),
  ADD KEY `des_sistema_id` (`des_sistema_id`);

--
-- Indices de la tabla `inventario_audiovisual`
--
ALTER TABLE `inventario_audiovisual`
  ADD PRIMARY KEY (`codigo_inventario`),
  ADD KEY `serial` (`serial`);

--
-- Indices de la tabla `inventario_bodega`
--
ALTER TABLE `inventario_bodega`
  ADD PRIMARY KEY (`serial`),
  ADD KEY `origen` (`origen`),
  ADD KEY `destino` (`destino`),
  ADD KEY `compra_id` (`compra_id`);

--
-- Indices de la tabla `inventario_lab`
--
ALTER TABLE `inventario_lab`
  ADD PRIMARY KEY (`id_lab`),
  ADD UNIQUE KEY `identificador` (`identificador_lab`),
  ADD KEY `descripcion_sistema_id` (`descripcion_sistema_id`),
  ADD KEY `placa_base_id` (`placa_base_id`),
  ADD KEY `adaptador_video_id` (`adaptador_video_id`),
  ADD KEY `almacenamiento_id` (`almacenamiento_id`),
  ADD KEY `compra_id` (`compra_id`),
  ADD KEY `adaptador_red_id` (`adaptador_red_id`);

--
-- Indices de la tabla `movimiento`
--
ALTER TABLE `movimiento`
  ADD PRIMARY KEY (`id_cambio`),
  ADD KEY `unidad_pertenece_id` (`unidad_pertenece_id`),
  ADD KEY `unidad_traslado_id` (`unidad_traslado_id`),
  ADD KEY `origen_nuevoEquipo_id` (`origen_nuevoEquipo_id`),
  ADD KEY `destino_nuevoEquipo_id` (`destino_nuevoEquipo_id`);

--
-- Indices de la tabla `notificacion`
--
ALTER TABLE `notificacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `notificacion_usuario`
--
ALTER TABLE `notificacion_usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estado` (`estado`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `notificacion_id` (`notificacion_id`);

--
-- Indices de la tabla `placa_base`
--
ALTER TABLE `placa_base`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pc_id_2` (`pc_id`),
  ADD KEY `pc_id` (`pc_id`);

--
-- Indices de la tabla `software`
--
ALTER TABLE `software`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pc_id` (`pc_id`),
  ADD KEY `pc_id_2` (`pc_id`),
  ADD KEY `PC_lab_id` (`PC_lab_id`);

--
-- Indices de la tabla `unidad`
--
ALTER TABLE `unidad`
  ADD PRIMARY KEY (`id_unidad`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `adaptador_red`
--
ALTER TABLE `adaptador_red`
  MODIFY `id_red` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `adaptador_video`
--
ALTER TABLE `adaptador_video`
  MODIFY `id_video` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `almacenamiento`
--
ALTER TABLE `almacenamiento`
  MODIFY `id_almacenamiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `compra_unidad`
--
ALTER TABLE `compra_unidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `descripcion_sistema`
--
ALTER TABLE `descripcion_sistema`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `inventario_adm`
--
ALTER TABLE `inventario_adm`
  MODIFY `id_adm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `inventario_lab`
--
ALTER TABLE `inventario_lab`
  MODIFY `id_lab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `movimiento`
--
ALTER TABLE `movimiento`
  MODIFY `id_cambio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `notificacion_usuario`
--
ALTER TABLE `notificacion_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `placa_base`
--
ALTER TABLE `placa_base`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `software`
--
ALTER TABLE `software`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `unidad`
--
ALTER TABLE `unidad`
  MODIFY `id_unidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `compra_unidad`
--
ALTER TABLE `compra_unidad`
  ADD CONSTRAINT `compra_unidad_ibfk_1` FOREIGN KEY (`unidad_id`) REFERENCES `unidad` (`id_unidad`),
  ADD CONSTRAINT `compra_unidad_ibfk_2` FOREIGN KEY (`compra_id`) REFERENCES `compras` (`id_compra`);

--
-- Filtros para la tabla `inventario_adm`
--
ALTER TABLE `inventario_adm`
  ADD CONSTRAINT `inventario_adm_ibfk_1` FOREIGN KEY (`origen`) REFERENCES `unidad` (`id_unidad`),
  ADD CONSTRAINT `inventario_adm_ibfk_12` FOREIGN KEY (`compra_id`) REFERENCES `compras` (`id_compra`),
  ADD CONSTRAINT `inventario_adm_ibfk_13` FOREIGN KEY (`almacenamiento_id`) REFERENCES `almacenamiento` (`pc_id`),
  ADD CONSTRAINT `inventario_adm_ibfk_15` FOREIGN KEY (`adaptador_red_id`) REFERENCES `adaptador_red` (`pc_id`),
  ADD CONSTRAINT `inventario_adm_ibfk_16` FOREIGN KEY (`adaptador_video_id`) REFERENCES `adaptador_video` (`pc_id`),
  ADD CONSTRAINT `inventario_adm_ibfk_17` FOREIGN KEY (`placa_base_id`) REFERENCES `placa_base` (`pc_id`),
  ADD CONSTRAINT `inventario_adm_ibfk_2` FOREIGN KEY (`destino`) REFERENCES `unidad` (`id_unidad`),
  ADD CONSTRAINT `inventario_adm_ibfk_AB` FOREIGN KEY (`des_sistema_id`) REFERENCES `descripcion_sistema` (`pc_ids`);

--
-- Filtros para la tabla `inventario_audiovisual`
--
ALTER TABLE `inventario_audiovisual`
  ADD CONSTRAINT `inventario_audiovisual_ibfk_1` FOREIGN KEY (`serial`) REFERENCES `inventario_bodega` (`serial`);

--
-- Filtros para la tabla `inventario_bodega`
--
ALTER TABLE `inventario_bodega`
  ADD CONSTRAINT `inventario_bodega_ibfk_1` FOREIGN KEY (`origen`) REFERENCES `unidad` (`id_unidad`),
  ADD CONSTRAINT `inventario_bodega_ibfk_2` FOREIGN KEY (`destino`) REFERENCES `unidad` (`id_unidad`),
  ADD CONSTRAINT `inventario_bodega_ibfk_3` FOREIGN KEY (`compra_id`) REFERENCES `compras` (`id_compra`);

--
-- Filtros para la tabla `inventario_lab`
--
ALTER TABLE `inventario_lab`
  ADD CONSTRAINT `inventario_lab_ibfk_10` FOREIGN KEY (`almacenamiento_id`) REFERENCES `almacenamiento` (`pc_id`),
  ADD CONSTRAINT `inventario_lab_ibfk_11` FOREIGN KEY (`placa_base_id`) REFERENCES `placa_base` (`pc_id`),
  ADD CONSTRAINT `inventario_lab_ibfk_12` FOREIGN KEY (`descripcion_sistema_id`) REFERENCES `descripcion_sistema` (`pc_ids`),
  ADD CONSTRAINT `inventario_lab_ibfk_13` FOREIGN KEY (`adaptador_video_id`) REFERENCES `adaptador_video` (`pc_id`),
  ADD CONSTRAINT `inventario_lab_ibfk_8` FOREIGN KEY (`compra_id`) REFERENCES `compras` (`id_compra`),
  ADD CONSTRAINT `inventario_lab_ibfk_9` FOREIGN KEY (`adaptador_red_id`) REFERENCES `adaptador_red` (`pc_id`);

--
-- Filtros para la tabla `movimiento`
--
ALTER TABLE `movimiento`
  ADD CONSTRAINT `movimiento_ibfk_1` FOREIGN KEY (`origen_nuevoEquipo_id`) REFERENCES `unidad` (`id_unidad`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `movimiento_ibfk_2` FOREIGN KEY (`unidad_pertenece_id`) REFERENCES `unidad` (`id_unidad`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `movimiento_ibfk_3` FOREIGN KEY (`unidad_traslado_id`) REFERENCES `unidad` (`id_unidad`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `movimiento_ibfk_4` FOREIGN KEY (`destino_nuevoEquipo_id`) REFERENCES `unidad` (`id_unidad`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `notificacion_usuario`
--
ALTER TABLE `notificacion_usuario`
  ADD CONSTRAINT `notificacion_usuario_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `notificacion_usuario_ibfk_2` FOREIGN KEY (`notificacion_id`) REFERENCES `notificacion` (`id`);

--
-- Filtros para la tabla `software`
--
ALTER TABLE `software`
  ADD CONSTRAINT `software_ibfk_1` FOREIGN KEY (`pc_id`) REFERENCES `inventario_adm` (`identificador`),
  ADD CONSTRAINT `software_ibfk_2` FOREIGN KEY (`PC_lab_id`) REFERENCES `inventario_lab` (`identificador_lab`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
