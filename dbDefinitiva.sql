-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-11-2018 a las 18:41:07
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
(1, 'PC001USAM', NULL, NULL, '32424324-1', NULL, NULL, NULL, NULL, NULL, NULL, 'no hay'),
(2, 'PC002USAM', NULL, NULL, '32424324-1', NULL, NULL, NULL, NULL, NULL, NULL, 'no hay'),
(3, 'PC003USAM', NULL, NULL, '192.168.3.96', NULL, NULL, NULL, NULL, NULL, NULL, 'no hay'),
(4, 'PC004USAM', NULL, NULL, '192.168.3.96', NULL, NULL, NULL, NULL, NULL, NULL, 'NO'),
(5, 'PC005USAM', NULL, NULL, '32424324-1', NULL, NULL, NULL, NULL, NULL, NULL, 'no hay'),
(6, 'LAB1-PC1', 'no tiene adaptador:(', 'Ethernet', '12233.00000.1', 'no tiene subred', 'Gateway IP predeterminado', 'no existe servidor', 'DNS', 'DJCD', '12:300c:A', NULL);

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
(1, 'PC001USAM', 'dell', NULL, 'no tiene', 'GHCH2HA032676', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'PC002USAM', 'dell', NULL, '1', 'GHCH2HA032676', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'PC003USAM', '', NULL, 'no tiene', 'vga', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'PC004USAM', 'dell', NULL, 'no tiene', 'GHCH2HA032676', NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'PC005USAM', '', NULL, 'no tiene', 'vga', NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'LAB1-PC1', NULL, NULL, NULL, NULL, 'no tiene', '1', 'dafd', 'vga', '1', 'vga');

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
(1, 'PC001USAM', '1', '1 TB', 'WESTERN DIGITAL', 'si', NULL, NULL, NULL, NULL, NULL),
(2, 'PC002USAM', '2', '1 TB', 'WESTERN DIGITAL', 'si', NULL, NULL, NULL, NULL, NULL),
(3, 'PC003USAM', '1', '1 TB', 'WESTERN DIGITAL', 'si', NULL, NULL, NULL, NULL, NULL),
(4, 'PC004USAM', '1', '1 tb', 'WESTERN DIGITAL', 'LG', NULL, NULL, NULL, NULL, NULL),
(5, 'PC005USAM', '1', 'tb ', 'WESTERN DIGITAL', 'LG', NULL, NULL, NULL, NULL, NULL),
(6, 'LAB1-PC1', 'intel disk celeron', '500 gb', NULL, 'LG', 'nel', 'stfp', '400', '', 'c:');

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
('COMPRA-9tYiRqUFWZ-9378724-6993', 'fisica', ' PC', 'no tiene detalle', 10, 3, 'dell', '5421-112', '2018-11-13', '2018-11-13', '1 año', '500.00', '', 1);

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
(1, 'COMPRA-9tYiRqUFWZ-9378724-6993', 2, 2),
(2, 'COMPRA-9tYiRqUFWZ-9378724-6993', 3, 1);

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
(1, 'PC001USAM', 'academica-01', 'Intel', 'Windows 10 Pro', '64 bits', NULL, NULL, 'admin', '4', 'Sin grupo', NULL, '11191-1', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'PC002USAM', 'academica-02', 'Intel', 'Windows 10 Pro', '64 bits', NULL, NULL, 'admin', '4', 'Sin grupo', NULL, '11191-1', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'PC003USAM', 'home', 'Intel', 'Windows 10 Pro', '64 bits', NULL, NULL, 'admin', '4', 'Sin grupo', NULL, '11191-1', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'PC004USAM', 'acad01', 'Intel', 'Windows 10 Pro', '64 bits', NULL, NULL, 'admin', '4', 'Sin grupo', NULL, '12345FFDD', NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'PC005USAM', 'home-contabilidad', 'Intel', 'Windows 10 Pro', '64 bits', NULL, NULL, 'admin', '4', 'Sin grupo', NULL, 'fsdf55-111', NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'LAB1-PC1', 'lab1', 'dell', 'win 10', '64 bits', 'no tiene', '5.01', 'admin1', '4 GB', 'WORKGROUP', '5643-1', '222-222-222', 'sin organizacion', 'Español (México)', '(GMT -06:00) Hora estándar, América Central', 'ALUMNO', '12', 'Desktop');

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
(1, 'PC001USAM', 'Karla', 'PC001USAM', 'PC001USAM', 'PC001USAM', 'PC001USAM', 'PC001USAM', '2018-11-13', 4, NULL, 2, 'COMPRA-9tYiRqUFWZ-9378724-6993', 'Academica', NULL),
(2, 'PC002USAM', 'Karla', 'PC002USAM', 'PC002USAM', 'PC002USAM', 'PC002USAM', 'PC002USAM', '2018-11-13', 4, NULL, 2, 'COMPRA-9tYiRqUFWZ-9378724-6993', 'Academica', NULL),
(3, 'PC003USAM', 'karla', 'PC003USAM', 'PC003USAM', 'PC003USAM', 'PC003USAM', 'PC003USAM', '2018-11-14', 4, NULL, 3, 'COMPRA-9tYiRqUFWZ-9378724-6993', 'Gerencia General', NULL),
(4, 'PC004USAM', 'Karla', 'PC004USAM', 'PC004USAM', 'PC004USAM', 'PC004USAM', 'PC004USAM', '2018-11-14', 4, NULL, 2, NULL, 'Academica', NULL),
(5, 'PC005USAM', 'DEMBELE', 'PC005USAM', 'PC005USAM', 'PC005USAM', 'PC005USAM', 'PC005USAM', '2018-11-14', 4, NULL, 5, NULL, 'Contabilidad', NULL),
(6, 'APRADIO001USAM', 'dembele', NULL, NULL, NULL, NULL, NULL, '2018-11-14', 4, NULL, 2, NULL, 'Academica', '5662-11356546-5');

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
('0c-ddd', '', '', '', 'CPU', '', 'En uso', '2018-11-14', 4, NULL, 5, NULL, 'PC005USAM', NULL, '2018-11-14 15:21:54'),
('111-q1-1', 'vga', '', '', 'MONITOR', '', 'En uso', '2018-11-14', 4, NULL, 3, 'COMPRA-9tYiRqUFWZ-9378724-6993', 'PC003USAM', NULL, '2018-11-14 15:12:35'),
('22-6-8-93-3', 'usb', '', '', 'MOUSE', '', 'En uso', '2018-11-14', 38, NULL, 37, NULL, 'LAB1-PC1', NULL, '2018-11-14 15:44:12'),
('33000p5-5-5677', '', '', '', 'TECLADO', '', 'En uso', '2018-11-14', 4, NULL, 5, NULL, 'PC005USAM', NULL, '2018-11-14 15:21:54'),
('4-6-66-782-50', 'cpu', '', '', 'CPU', '', 'En uso', '2018-11-14', 38, NULL, 37, NULL, 'LAB1-PC1', NULL, '2018-11-14 15:44:12'),
('404433-a', 'vga', '', '', 'MONITOR', '', 'En uso', '2018-11-13', 4, NULL, 2, 'COMPRA-9tYiRqUFWZ-9378724-6993', 'PC001USAM', NULL, '2018-11-13 22:46:10'),
('4453112-565435', 'vga', '', '', 'MONITOR', '', 'En uso', '2018-11-14', 38, NULL, 37, NULL, 'LAB1-PC1', NULL, '2018-11-14 15:44:12'),
('44532-1', 'usb', 'dell', '', 'MOUSE', '', 'en uso', '2018-11-13', 1, '2018-11-14', 37, NULL, 'LAB1-PC1', NULL, '2018-11-13 22:41:58'),
('46555-ds-a', 'cpu', '', '', 'CPU', '', 'En uso', '2018-11-13', 4, NULL, 2, 'COMPRA-9tYiRqUFWZ-9378724-6993', 'PC002USAM', NULL, '2018-11-13 22:48:17'),
('5433-1d005-a', 'cpu', '', '', 'CPU', '', 'En uso', '2018-11-14', 4, NULL, 3, 'COMPRA-9tYiRqUFWZ-9378724-6993', 'PC003USAM', NULL, '2018-11-14 15:12:35'),
('5435345-7873-1', 'usb', '', '', 'TECLADO', '', 'En uso', '2018-11-14', 38, NULL, 37, NULL, 'LAB1-PC1', NULL, '2018-11-14 15:44:12'),
('5436346-31', '', 'DELL', '', 'MOUSE', '', 'en uso', '2018-11-14', 1, '2018-11-14', 37, NULL, 'LAB1-PC1', NULL, '2018-11-14 16:31:24'),
('5533-ab-6', 'usb', '', '', 'TECLADO', '', 'En uso', '2018-11-13', 4, NULL, 2, 'COMPRA-9tYiRqUFWZ-9378724-6993', 'PC002USAM', NULL, '2018-11-13 22:48:17'),
('5543-1ax', 'usb', '', '', 'TECLADO', '', 'En uso', '2018-11-13', 4, NULL, 2, 'COMPRA-9tYiRqUFWZ-9378724-6993', 'PC001USAM', NULL, '2018-11-13 22:46:10'),
('5641-aa000-0', '', '', '', 'TECLADO', '', 'En uso', '2018-11-14', 4, NULL, 2, NULL, 'PC004USAM', NULL, '2018-11-14 15:14:19'),
('56533-21389-t45', '', '', '', 'CPU', '', 'En uso', '2018-11-14', 4, NULL, 2, NULL, 'PC004USAM', NULL, '2018-11-14 15:14:19'),
('5662-11356546-5', '', 'no tienen ', '', 'ACCES POINT RADIO U MASFERRER', '', 'En uso', '2018-11-14', 4, NULL, 2, NULL, NULL, NULL, '2018-11-14 15:33:09'),
('6111145', 'LED', 'LG', '', 'MOUSE', '', 'en uso', '2018-11-14', 1, '2018-11-14', 2, NULL, 'PC004USAM', NULL, '2018-11-14 17:05:27'),
('643-1q-q', 'mouse', '', '', 'MOUSE', '', 'En uso', '2018-11-13', 4, NULL, 2, 'COMPRA-9tYiRqUFWZ-9378724-6993', 'PC002USAM', NULL, '2018-11-13 22:48:17'),
('662wdfy-55231-1', '', '', '', 'MOUSE', '', 'En uso', '2018-11-14', 4, NULL, 2, NULL, 'PC004USAM', NULL, '2018-11-14 15:14:19'),
('7072195781', 'vga', '', '', 'MONITOR', '', 'En uso', '2018-11-13', 4, NULL, 2, 'COMPRA-9tYiRqUFWZ-9378724-6993', 'PC002USAM', NULL, '2018-11-13 22:48:17'),
('74321-w', 'usb', '', '', 'TECLADO', '', 'En uso', '2018-11-14', 4, NULL, 3, 'COMPRA-9tYiRqUFWZ-9378724-6993', 'PC003USAM', NULL, '2018-11-14 15:12:35'),
('8743-11', '', '', '', 'MONITOR', '', 'En uso', '2018-11-14', 4, NULL, 5, NULL, 'PC005USAM', NULL, '2018-11-14 15:21:54'),
('9987-13sa', '', '', '', 'MONITOR', '', 'En uso', '2018-11-14', 4, NULL, 2, NULL, 'PC004USAM', NULL, '2018-11-14 15:14:19'),
('dsffdsf5555', '', '', '', 'MOUSE', '', 'Disponible', '2018-11-14', NULL, NULL, 1, NULL, NULL, NULL, '2018-11-14 17:24:11'),
('ffg-111cpu', 'cpu', '', '1 tb', 'CPU', '5.0 ghz', 'En uso', '2018-11-13', 4, NULL, 2, 'COMPRA-9tYiRqUFWZ-9378724-6993', 'PC001USAM', NULL, '2018-11-13 22:46:10'),
('mouse', 'usb', '', '', 'MOUSE', '', 'En uso', '2018-11-14', 4, NULL, 3, 'COMPRA-9tYiRqUFWZ-9378724-6993', 'PC003USAM', NULL, '2018-11-14 15:12:35'),
('tr-44554', 'usb', '', '', 'MOUSE', '', 'En uso', '2018-11-13', 4, NULL, 2, 'COMPRA-9tYiRqUFWZ-9378724-6993', 'PC001USAM', NULL, '2018-11-13 22:46:10'),
('vvvvd-xx000', '', '', '', 'MOUSE', '', 'En uso', '2018-11-14', 4, NULL, 5, NULL, 'PC005USAM', NULL, '2018-11-14 15:21:54');

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
(1, 'LAB1-PC1', 'LAB1-PC1', 'LAB1-PC1', 'LAB1-PC1', 'LAB1-PC1', 'LAB1-PC1', '2018-11-14', 38, NULL, 37, NULL, 'lab-01', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimiento`
--

CREATE TABLE `movimiento` (
  `id_cambio` int(11) NOT NULL,
  `fecha_retiro` varchar(200) DEFAULT NULL,
  `fecha_cambio` varchar(200) DEFAULT NULL,
  `unidad_pertenece_id` int(11) DEFAULT NULL,
  `unidad_traslado_id` int(11) DEFAULT NULL,
  `cambio` text,
  `descripcion_cambio` text,
  `origen_nuevoEquipo_id` int(11) DEFAULT NULL,
  `descripcion_equipoRetirado` text,
  `descripcion_equipoNuevo` text,
  `encargado` varchar(250) DEFAULT NULL,
  `tecnico` varchar(250) DEFAULT NULL,
  `tipoHardSoft` varchar(100) DEFAULT NULL,
  `tipo_movimiento` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'PC001USAM', 'core i5', '5.0', 'Intel', NULL, NULL, NULL, NULL, NULL, NULL, 'ASUS', NULL, 'ADATA', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'PC002USAM', 'core i5', '5', 'Intel', NULL, NULL, NULL, NULL, NULL, NULL, 'ASUS', NULL, 'ADATA', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'PC003USAM', 'core i5', '5', 'Intel', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 'ADATA', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'PC004USAM', 'Core i3 7100', '3.0', 'Intel', NULL, NULL, NULL, NULL, NULL, NULL, 'ASUS', NULL, 'ADATA', NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'PC005USAM', 'core i5', '5', 'Intel', NULL, NULL, NULL, NULL, NULL, NULL, 'ASUS', NULL, 'ADATA', NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'LAB1-PC1', 'intel core i5', '5.1', 'Intel', 'no tiene etiqueta', 'ASUS', 'no tiene version', 'no tiene numero de serie la bios', '2018-11-14', 'asus', '544-asus-4k', 'no tiene version la placa', 'KINSTONG', '', '', '', '', '', '');

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
  ADD KEY `origen_nuevoEquipo_id` (`origen_nuevoEquipo_id`);

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
  MODIFY `id_red` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `adaptador_video`
--
ALTER TABLE `adaptador_video`
  MODIFY `id_video` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `almacenamiento`
--
ALTER TABLE `almacenamiento`
  MODIFY `id_almacenamiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `compra_unidad`
--
ALTER TABLE `compra_unidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `descripcion_sistema`
--
ALTER TABLE `descripcion_sistema`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `inventario_adm`
--
ALTER TABLE `inventario_adm`
  MODIFY `id_adm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `inventario_lab`
--
ALTER TABLE `inventario_lab`
  MODIFY `id_lab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `movimiento`
--
ALTER TABLE `movimiento`
  MODIFY `id_cambio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `notificacion_usuario`
--
ALTER TABLE `notificacion_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `placa_base`
--
ALTER TABLE `placa_base`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
