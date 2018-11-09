-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-10-2018 a las 00:56:17
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
-- Base de datos: `usam-sistem-5`
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
(4, 'PC0001USAM-ruk4-5035-52', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, 'no hay'),
(5, 'PC0001USAM-Nuh2-1904-10', NULL, NULL, '1010.01001', NULL, NULL, NULL, NULL, NULL, NULL, 'si'),
(6, 'PC000453USAM-iJnv-8096-58', NULL, NULL, '1010.01001', NULL, NULL, NULL, NULL, NULL, NULL, 'si'),
(7, 'PC0001USAM-LVMN-9025-13', NULL, NULL, '201.150.84.58', NULL, NULL, NULL, NULL, NULL, NULL, 'no hay'),
(8, 'PC0002USAM-2vW7-9849-96', NULL, NULL, '201.150.84.59', NULL, NULL, NULL, NULL, NULL, NULL, 'no hay'),
(9, 'PC0004USAM-pnD2-6051-79', NULL, NULL, '201.150.84.51', NULL, NULL, NULL, NULL, NULL, NULL, 'no hay'),
(10, 'LAB1-PC1', 'Realtek PCIe GBE Family Controller', 'Ethernet', '192.168.203.2', '255.255.255.0', '192.168.203.1', 'No disponible', '8.8.8.8', 'No disponible', 'AC-9E-17-B4-45-3F', NULL),
(11, 'LAB1-PC2', 'Realtek PCIe GBE Family Controller', 'Ethernet', '192.168.200.38', '255.255.255.0', 'No disponible', '192.168.200.1', '8.8.8.8', 'No disponible', 'AC-9E-17-B4-45-3F', NULL),
(12, 'LAB1-PC3', 'Realtek PCIe GBE Family Controller', 'Ethernet', '192.168.200.38', '255.255.255.0', 'No disponible', 'No disponible', '8.8.8.8', 'No disponible', '38-60-77-6B-1C-6C', NULL),
(13, 'LAB1-PC4', 'Realtek PCIe GBE Family Controller', 'Ethernet', '192.168.200.38', '255.255.255.0', '192.168.203.1', 'No disponible', '8.8.8.8', 'No disponible', 'AC-9E-17-B4-45-3F', NULL),
(14, 'LAB2-PC1', 'Realtek PCIe GBE Family Controller', 'Ethernet', '192.168.203.2', '255.255.255.0', 'No disponible', 'No disponible', '8.8.8.8', 'No disponible', 'AC-9E-17-B4-45-3F', NULL),
(15, 'LAB3-PC1', 'Realtek PCIe GBE Family Controller', 'Ethernet', '192.168.200.38', '255.255.255.0', 'No disponible', 'No disponible', '8.8.8.8', 'No disponible', 'AC-9E-17-B4-45-3F', NULL),
(16, '', '', '', '', '', '', '', '', '', '', NULL),
(17, 'HW-PC1', 'Realtek PCIe GBE Family Controller', 'Ethernet', '192.168.200.38', '255.255.255.0', 'No disponible', 'No disponible', '8.8.8.8', '', 'AC-9E-17-B4-45-3F', NULL),
(18, 'RED-PC1', 'Realtek PCIe GBE Family Controller', 'Ethernet', '192.168.200.38', '255.255.255.0', 'No disponible', 'No disponible', '8.8.8.8', 'No disponible', 'AC-9E-17-B4-45-3F', NULL);

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
(1, 'PC0001USAM-LVMN-9025-13', 'no hay', 'vga', NULL, '823377-02712974', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'PC0002USAM-2vW7-9849-96', 'no hay', 'vga', NULL, '4423477-027134341', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'PC0004USAM-pnD2-6051-79', 'no hay', 'vga', NULL, '823377-00000', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'LAB1-PC1', NULL, NULL, NULL, NULL, 'Intel® HD graphics', '1795 Mb', 'Interna', 'HP LV1911 (Monitor PnP genérico)', '1366x768x32 bit', '60Hz'),
(5, 'LAB1-PC2', NULL, NULL, NULL, NULL, 'Intel® HD graphics', '1795 Mb', 'Internal', 'HP LV1911 (Monitor PnP genérico)', '1440 x 900 x 32 bit', '60 Hz'),
(6, 'LAB1-PC3', NULL, NULL, NULL, NULL, 'Intel® HD graphics', '1795 Mb', 'Internal', 'HP LV1911 (Monitor PnP genérico)', '1440 x 900 x 32 bit', '60 Hz'),
(7, 'LAB1-PC4', NULL, NULL, NULL, NULL, 'Intel® HD graphics', '1795 Mb', 'Internal', 'HP LV1911 (Monitor PnP genérico)', '1440 x 900 x 32 bit', '60 Hz'),
(8, 'LAB2-PC1', NULL, NULL, NULL, NULL, 'Intel® HD graphics', '1795 Mb', 'Internal', 'HP LV1911 (Monitor PnP genérico)', '1440 x 900 x 32 bit', '60 Hz'),
(9, 'LAB3-PC1', NULL, NULL, NULL, NULL, 'Intel® HD graphics', '1795 Mb', 'Internal', 'HP LV1911 (Monitor PnP genérico)', '1440 x 900 x 32 bit', '60 Hz'),
(10, '', NULL, NULL, NULL, NULL, '', '', '', '', '', ''),
(11, 'HW-PC1', NULL, NULL, NULL, NULL, 'Intel® HD graphics', '1795 Mb', 'Internal', 'HP LV1911 (Monitor PnP genérico)', '1440 x 900 x 32 bit', '60 Hz'),
(12, 'RED-PC1', NULL, NULL, NULL, NULL, 'Intel® HD graphics', '1795 Mb', 'Internal', 'HP LV1911 (Monitor PnP genérico)', '1440 x 900 x 32 bit', '60 Hz');

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
(1, 'PC0001USAM-LVMN-9025-13', '823377-02712974', '500', 'segate', 'si', NULL, NULL, NULL, NULL, NULL),
(2, 'PC0002USAM-2vW7-9849-96', '4423477-027134341', '500', 'segate', 'si', NULL, NULL, NULL, NULL, NULL),
(3, 'PC0004USAM-pnD2-6051-79', '823377-00000', '500', 'segate', 'si', NULL, NULL, NULL, NULL, NULL),
(4, 'LAB1-PC1', 'ST3750640NS ATA Device', '698.63 Gb', NULL, 'HL-DT-ST DVDRAM GH24NSB0 ATA ', 'C:', 'NTFS', '698.29 Gb', '89%', 'D:'),
(5, 'LAB1-PC2', 'ST500DM002-1BD142 ATA Device', '465.76 Gb', NULL, 'HL-DT-ST DVDRAM GH24NSB0 ATA', 'C:', 'NTFS', '465.66 Gb', '89%', 'D:'),
(6, 'LAB1-PC3', 'ST500DM002-1BD142 ATA Device', '465.76 Gb', NULL, 'HL-DT-ST DVDRAM GH24NSB0 ATA', 'C:', 'NTFS', '465.66 Gb', '89%', 'D:'),
(7, 'LAB1-PC4', 'ST500DM002-1BD142 ATA Device', '465.76 Gb', NULL, 'HL-DT-ST DVDRAM GH24NSB0 ATA', 'C:', 'NTFS', '465.66 Gb', '89%', 'D:'),
(8, 'LAB2-PC1', 'ST500DM002-1BD142 ATA Device', '465.76 Gb', NULL, 'HL-DT-ST DVDRAM GH24NSB0 ATA', 'C:', 'NTFS', '465.66 Gb', '89%', 'D:'),
(9, 'LAB3-PC1', 'ST500DM002-1BD142 ATA Device', '465.76 Gb', NULL, 'HL-DT-ST DVDRAM GH24NSB0 ATA', 'C:', 'NTFS', '465.66 Gb', '89%', 'D:'),
(10, '', '', '', NULL, '', '', '', '', '', ''),
(11, 'HW-PC1', 'ST500DM002-1BD142 ATA Device', '465.76 Gb', NULL, 'HL-DT-ST DVDRAM GH24NSB0 ATA', 'C:', 'NTFS', '465.66 Gb', '89%', 'D:'),
(12, 'RED-PC1', 'ST500DM002-1BD142 ATA Device', '465.76 Gb', NULL, 'HL-DT-ST DVDRAM GH24NSB0 ATA', 'C:', 'NTFS', '465.66 Gb', '89%', 'D:');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cambios`
--

CREATE TABLE `cambios` (
  `id_cambios` int(11) NOT NULL,
  `cambio` varchar(80) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `cambios`
--

INSERT INTO `cambios` (`id_cambios`, `cambio`) VALUES
(1, 'cambio de ups'),
(2, 'cambio de monitor'),
(3, 'cambio de mouse');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cambios_prestamos`
--

CREATE TABLE `cambios_prestamos` (
  `id_cambio` int(11) NOT NULL,
  `fecha_retiro` varchar(80) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fecha_cambio` varchar(80) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `codigo_inventario` varchar(80) COLLATE utf8_spanish2_ci NOT NULL,
  `unidad_pertenece` int(11) DEFAULT NULL,
  `unidad_traslado` int(11) DEFAULT NULL,
  `cambio_equipo` int(11) DEFAULT NULL,
  `descripcion_cambio` varchar(80) COLLATE utf8_spanish2_ci NOT NULL,
  `origen_equipo` varchar(80) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `caract_equipo_viejo` varchar(80) COLLATE utf8_spanish2_ci NOT NULL,
  `caract_equipo_nuevo` varchar(80) COLLATE utf8_spanish2_ci NOT NULL,
  `nom_encargado` varchar(80) COLLATE utf8_spanish2_ci NOT NULL,
  `nom_tecnico` varchar(80) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

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
('COMPRA-c25BPQ4EKf-4927797-1667', 'fisica', 'Laptop', ' laptops para bodega', 5, 5, 'lenovo', '3-802827462553-Q', '2018-09-21', '2018-09-21', '2 años', '1000', '', 1),
('COMPRA-EZQPxBmMDO-2369250-3565', 'fisica', 'PC', ' computadoras completas que posee mouse, teclado, monitor y un CPU', 3, 3, 'Lenovo', '454890292835-JK', '2018-09-04', '2018-09-04', '2 años', '1000', '', 1),
('COMPRA-HwJ4rcl2hY-4107705-9644', 'fisica', 'Periferico', ' perifericos para bodega', 4, 0, 'dell', ' 40674336822703-AQN', '2018-10-05', '2018-10-05', '1 año', '44.99', '', 1),
('COMPRA-jKzF8dIp3k-9353634-6082', 'fisica', 'Servidor', ' servidor para varias PC', 1, 1, 'server-PC', ' 60229292195289-server', '2018-09-20', '2018-09-20', '1 año', '600', '', 1),
('COMPRA-PtnIkH0esB-5209287-7054', 'fisica', 'PC', 'Compra', 1, 1, 'Dell', '22157123968936-AB', '2018-10-22', '2018-10-22', '1 año', '500', 'Una pc para laboratorio ', 1),
('COMPRA-tUuSa4fx3G-7003881-4869', 'fisica', 'PC', 'PC para laboratorios de red', 2, 2, 'dell', '92253037979825-ABF-01', '2018-10-04', '2018-10-04', '1 año', '1000', 'PC para laboratorios de red', 1),
('COMPRA-WG20bk9qVm-4619660-7862', 'fisica', 'PC', ' dos pc para bodega', 2, 0, 'dell', '55283983992412', '2018-10-12', '2018-10-12', '2 años', '500.88', '', 1),
('COMPRA-wTR2UE9mYO-1246907-8845', 'fisica', 'PC', ' PC para recursos humanos', 3, 3, 'dell', '20422538267448-91-1', '2018-09-04', '2018-09-04', '1 año', '600', '', 1),
('COMPRA-XJtqeW4EMP-5355722-4804', 'fisica', 'Periferico', ' no hay detalles', 6, 6, 'dell', 'A- 26707234866-3', '2018-09-21', '2018-09-21', '1 mes', '60', '', 1),
('COMPRA-xt7HGn1Tkg-3366628-5616', 'fisica', 'Disco duro externo', ' discos extraibles, todos con capacidad de 1 TB', 8, 8, 'SanDisk', '50557432062923-G', '2018-09-21', '2018-09-21', '1 año', '400', '', 1),
('COMPRA-y4EOUJe2Lz-5231367-1759', 'fisica', 'PC', ' Servidores Intel', 2, 2, 'Intel', '92574846022761-F', '2018-09-21', '2018-09-21', '2 años', '900', '', 1),
('COMPRA-zyXAa4t7ZF-4383885-1959', 'fisica', 'Disco duro externo', ' Discos duros externos', 3, 3, 'SanDisk', '387850057240-A', '2018-09-05', '2018-09-05', '1 año', '300', '', 1);

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
(1, 'COMPRA-XJtqeW4EMP-5355722-4804', 1, 6),
(2, 'COMPRA-c25BPQ4EKf-4927797-1667', 1, 5),
(3, 'COMPRA-zyXAa4t7ZF-4383885-1959', 1, 3),
(4, 'COMPRA-EZQPxBmMDO-2369250-3565', 1, 3),
(5, 'COMPRA-jKzF8dIp3k-9353634-6082', 1, 1),
(6, 'COMPRA-y4EOUJe2Lz-5231367-1759', 1, 2),
(7, 'COMPRA-xt7HGn1Tkg-3366628-5616', 2, 4),
(8, 'COMPRA-xt7HGn1Tkg-3366628-5616', 8, 4),
(9, 'COMPRA-wTR2UE9mYO-1246907-8845', 6, 3),
(11, 'COMPRA-PtnIkH0esB-5209287-7054', 25, 1),
(12, 'COMPRA-tUuSa4fx3G-7003881-4869', 25, 2),
(13, 'COMPRA-HwJ4rcl2hY-4107705-9644', 1, 4),
(14, 'COMPRA-WG20bk9qVm-4619660-7862', 1, 2);

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
  `serie` varchar(200) NOT NULL,
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

INSERT INTO `descripcion_sistema` (`id`, `pc_ids`, `nombre`, `fabricante`, `sistema_operativo`, `nucleo`, `paquete_servicio`, `version`, `usuario_registrado`, `memoria_fisica`, `dominio`, `modelo`, `serie`, `organizacion`, `idioma`, `zona_horaria`, `usuario_sesion`, `version_DirectX`, `caja_sistema`) VALUES
(1, 'PC0001USAM-LVMN-9025-13', '', 'Microsoft', 'windows 10', '64 bits', NULL, NULL, 'admin', '4', 'Sin grupo', NULL, '12495282138697-55645', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'PC0002USAM-2vW7-9849-96', '', 'Microsoft', 'windows 10', '64 bits', NULL, NULL, 'admin', '4', 'Sin grupo', NULL, '20422538267448-00000', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'PC0004USAM-pnD2-6051-79', '', 'Microsoft', 'windows 10', '64 bits', NULL, NULL, 'admin', '4', 'Sin grupo', NULL, '20123129226267-75454', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'LAB1-PC1', 'LAB1-PC1', 'System manufacturer', 'Windows 10 x64', '64bits', 'No disponible', '6.2.9200', 'Academia 01', '4096 Mb', 'WORKGROUP', 'System Product Name', '00328-20020-00000-AA258', 'No disponible', 'Español (México)', '(GMT -06:00) Hora estándar, América Central', 'Alumno 01', '12', 'Desktop'),
(5, 'LAB1-PC2', 'LAB1-PC2', 'INTEL', 'Windows 10 x64', '64bits', 'No disponible', '6.2.9200', 'Academia 02', '4 GB', 'WORKGROUP', 'No disponible', '00328-20020-00000-AA258', 'No disponible', 'Español (México)', '(GMT -06:00) Hora estándar, América Central', 'Alumno 02', '12', 'Desktop'),
(6, 'LAB1-PC3', 'LAB1-PC3', 'INTEL', 'Windows 10 x64', '64bits', 'No disponible', '6.2.9200', 'Academia 03', '4 GB', 'WORKGROUP', 'No disponible', '00330-80000-00000-AA524', 'No disponible', 'Español (México)', '(GMT -06:00) Hora estándar, América Central', 'Alumno 03', '12', 'Desktop'),
(7, 'LAB1-PC4', 'LAB1-PC4', 'System manufacturer', 'Windows 10 x64', '64bits', 'No disponible', '6.2.9200', 'Academia 04', '4 GB', 'WORKGROUP', 'System Product Name', '00328-20020-00000-AA817', 'No disponible', 'Español (México)', '(GMT -06:00) Hora estándar, América Central', 'Alumno 04', '12', 'Desktop'),
(8, 'LAB2-PC1', 'LAB2-PC1', 'System manufacturer', 'Windows 10 x64', '64bits', 'No disponible', '6.2.9200', 'Academia 01', '4 GB', 'WORKGROUP', 'System Product Name', '00328-20020-00000-AA258', 'No disponible', 'Español (México)', '(GMT -06:00) Hora estándar, América Central', 'Alumno 01', '12', 'Desktop'),
(9, 'LAB3-PC1', 'LAB3-PC1', 'System manufacturer', 'Windows 10 x64', '64bits', 'No disponible', '6.2.9200', 'Academia 01', '4 GB', 'WORKGROUP', 'System Product Name', '00328-20020-00000-AA258', 'No disponible', 'Español (México)', '(GMT -06:00) Hora estándar, América Central', 'Alumno 01', '12', 'Desktop'),
(10, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(11, 'HW-PC1', 'HW-PC1', 'System manufacturer', 'Windows 10 x64', '64bits', 'No disponible', '6.2.9200', 'Academia 01', '4 GB', 'WORKGROUP', 'System Product Name', '00328-20020-00000-AA258', 'No disponible', 'Español (México)', '(GMT -06:00) Hora estándar, América Central', 'Alumno 01', '12', 'Desktop'),
(12, 'RED-PC1', 'RED-PC1', 'System manufacturer', 'Windows 10 x64', '64bits', 'No disponible', '6.2.9200', 'Academia 01', '8 GB', 'WORKGROUP', 'System Product Name', '00328-20020-00000-AA258', 'No disponible', 'Español (México)', '(GMT -06:00) Hora estándar, América Central', 'Alumno 01', '12', 'Desktop');

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
(1, 'DDE0001USAM', 'Carlos Alborado', NULL, NULL, NULL, NULL, NULL, '2018-09-21', 4, '0000-00-00', 2, 'COMPRA-xt7HGn1Tkg-3366628-5616', 'Academica', '10143864932470'),
(2, 'DDE0002USAM', 'Carlos Alborado', NULL, NULL, NULL, NULL, NULL, '2018-09-21', 4, '0000-00-00', 2, 'COMPRA-xt7HGn1Tkg-3366628-5616', 'Academica', '65531042297370'),
(3, 'DDE0003USAM', 'Carlos Alborado', NULL, NULL, NULL, NULL, NULL, '2018-09-21', 4, '0000-00-00', 2, 'COMPRA-xt7HGn1Tkg-3366628-5616', 'Academica', '81988050783983'),
(5, 'DDE0005USAM', 'Carlos Alborado', NULL, NULL, NULL, NULL, NULL, '2018-09-21', 4, '0000-00-00', 8, 'COMPRA-xt7HGn1Tkg-3366628-5616', 'Biblioteca', '95700276833957'),
(6, 'DDE0006USAM', 'Carlos Alborado', NULL, NULL, NULL, NULL, NULL, '2018-09-21', 4, '0000-00-00', 8, 'COMPRA-xt7HGn1Tkg-3366628-5616', 'Biblioteca', '48181860391050'),
(7, 'DDE0007USAM', 'Carlos Alborado', NULL, NULL, NULL, NULL, NULL, '2018-09-21', 4, '0000-00-00', 8, 'COMPRA-xt7HGn1Tkg-3366628-5616', 'Biblioteca', '88580199698916'),
(8, 'DDE0008USAM', 'Carlos Alborado', NULL, NULL, NULL, NULL, NULL, '2018-09-21', 4, '0000-00-00', 8, 'COMPRA-xt7HGn1Tkg-3366628-5616', 'Biblioteca', '15659634107723'),
(9, 'PC0001USAM', 'Karla Margarita', 'PC0001USAM-LVMN-9025-13', 'PC0001USAM-LVMN-9025-13', 'PC0001USAM-LVMN-9025-13', 'PC0001USAM-LVMN-9025-13', 'PC0001USAM-LVMN-9025-13', '2018-09-04', 4, '0000-00-00', 6, 'COMPRA-wTR2UE9mYO-1246907-8845', 'RRHH ', NULL),
(10, 'PC0002USAM', 'Karla Margarita', 'PC0002USAM-2vW7-9849-96', 'PC0002USAM-2vW7-9849-96', 'PC0002USAM-2vW7-9849-96', 'PC0002USAM-2vW7-9849-96', 'PC0002USAM-2vW7-9849-96', '2018-09-04', 4, '0000-00-00', 6, 'COMPRA-wTR2UE9mYO-1246907-8845', 'RRHH ', NULL),
(11, 'PC0004USAM', 'Karla Margarita', 'PC0004USAM-pnD2-6051-79', 'PC0004USAM-pnD2-6051-79', 'PC0004USAM-pnD2-6051-79', 'PC0004USAM-pnD2-6051-79', 'PC0004USAM-pnD2-6051-79', '2018-09-04', 4, '0000-00-00', 6, 'COMPRA-wTR2UE9mYO-1246907-8845', 'RRHH ', NULL);

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
  `nombre` varchar(80) COLLATE utf8_spanish2_ci DEFAULT NULL,
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
(' 66429950115270', 'monitor', '', '', 'MONITOR', NULL, '', '2018-10-04', 4, '0000-00-00', 25, NULL, 'HW-PC1', NULL, '2018-10-04 17:10:14'),
(' 941666197263', 'monitor', '', '', 'MONITOR', NULL, '', '0000-00-00', 4, '0000-00-00', 25, NULL, 'LAB1-PC2', NULL, '2018-10-02 17:07:52'),
('10143864932470', 'disco externo Academica', 'Sandisk', '1 TB', 'DISCO DURO EXTERNO', '700RPM', 'nuevo', '2018-09-21', 4, '0000-00-00', 2, 'COMPRA-xt7HGn1Tkg-3366628-5616', NULL, NULL, '2018-09-21 19:30:22'),
('106093528773', 'CPU', '', '', 'CPU', NULL, '', '2018-10-02', 4, '0000-00-00', 25, NULL, 'LAB1-PC3', NULL, '2018-10-02 17:26:54'),
('10935941706411', 'monitor', 'intel', '', 'MONITOR', '', 'nuevo', '2018-09-21', 4, NULL, 1, 'COMPRA-y4EOUJe2Lz-5231367-1759', 'PJ4r5XsIlZ618117-8544hwVQo--PC', '', '2018-09-21 19:20:55'),
('11255164686590', 'teclado', '', '', 'TECLADO', '', 'nuevo', '2018-09-20', 4, '0000-00-00', 1, 'COMPRA-jKzF8dIp3k-9353634-6082', 'gP6b0dGs42926843-2407Jyigf--servidor', NULL, '2018-09-21 17:59:13'),
('113733631419', 'Dell Inspiron 15 5000-Intel i5-8250U ', 'Dell Inspiron', '500', 'LAPTOP', '', 'nuevo', '2018-09-21', 4, '0000-00-00', 1, 'COMPRA-c25BPQ4EKf-4927797-1667', NULL, NULL, '2018-09-21 17:46:08'),
('12688859133049-A', 'UPS', '', '', 'UPS', '', '', '2018-09-04', 4, '0000-00-00', 6, 'COMPRA-wTR2UE9mYO-1246907-8845', 'PC0001USAM', NULL, '2018-09-21 22:07:19'),
('14170578615739', 'teclado', '', '', 'TECLADO', NULL, '', '2018-10-04', 4, '0000-00-00', 25, NULL, 'LAB3-PC1', NULL, '2018-10-04 16:46:49'),
('146824207482-A', 'DISCO DURO EXTERNO', 'SanDisk', '1 TB', 'DISCO DURO EXTERNO', '', 'nuevo', '2018-09-05', 4, '0000-00-00', 1, 'COMPRA-zyXAa4t7ZF-4383885-1959', NULL, NULL, '2018-09-21 17:48:35'),
('15659634107723', 'disco externo Biblioteca', 'Sandisk', '1 TB', 'DISCO DURO EXTERNO', '700RPM', 'nuevo', '2018-09-21', 4, '0000-00-00', 8, 'COMPRA-xt7HGn1Tkg-3366628-5616', NULL, NULL, '2018-09-21 19:30:22'),
('1599009684286-mo', 'Monitor generico', 'lenovo', '', 'MONITOR', '', 'nuevo', '2018-09-04', 4, '0000-00-00', 1, 'COMPRA-EZQPxBmMDO-2369250-3565', 'hXeOWxtmyk874969-6715yNxXa--PC', NULL, '2018-09-21 17:56:25'),
('160385657427', 'Mouse', '', '', 'MOUSE', NULL, '', '0000-00-00', 4, '0000-00-00', 25, NULL, 'LAB1-PC2', NULL, '2018-10-02 17:07:52'),
('18043828746303', 'Teclado generico', 'intel', '', 'TECLADO', '', 'nuevo', '2018-09-21', 4, '0000-00-00', 1, 'COMPRA-y4EOUJe2Lz-5231367-1759', 'PJ4r5XsIlZ618117-8544hwVQo--PC', NULL, '2018-09-21 19:20:55'),
('18078802195377', 'UPS', 'intel', '', 'UPS', '', 'nuevo', '2018-09-21', 4, '0000-00-00', 1, 'COMPRA-y4EOUJe2Lz-5231367-1759', 'PJ4r5XsIlZ618117-8544hwVQo--PC', NULL, '2018-09-21 19:20:55'),
('22157123968936', 'monitor', '', '', 'MONITOR', NULL, '', '2018-10-04', 4, '0000-00-00', 25, NULL, 'LAB2-PC1', NULL, '2018-10-04 16:26:04'),
('22631207806989-Q', 'monitor', '', '', 'MONITOR', NULL, '', '2018-10-04', 4, '0000-00-00', 25, NULL, 'LAB3-PC1', NULL, '2018-10-04 16:46:49'),
('23384862942620', 'monitor', 'dell', '', 'MOUSE', '', 'nuevo', '2018-10-05', 4, '0000-00-00', 1, 'COMPRA-HwJ4rcl2hY-4107705-9644', NULL, NULL, '2018-10-05 22:13:26'),
('235848238458', 'monitor', 'dell', '', 'MONITOR', NULL, '', '2018-10-02', 4, '0000-00-00', 25, NULL, 'LAB1-PC1', NULL, '2018-10-02 14:49:40'),
('2461640390567-t', 'teclado generico', 'lenovo', '', 'TECLADO', '', 'nuevo', '2018-09-04', 4, '0000-00-00', 1, 'COMPRA-EZQPxBmMDO-2369250-3565', 'hXeOWxtmyk874969-6715yNxXa--PC', NULL, '2018-09-21 17:56:25'),
('27544326107017-cpu', 'Intel Core i3 ', 'intel', '', 'CPU', '', 'nuevo', '2018-09-04', 4, '0000-00-00', 1, 'COMPRA-EZQPxBmMDO-2369250-3565', 'hXeOWxtmyk874969-6715yNxXa--PC', NULL, '2018-09-21 17:56:25'),
('28873487575910', 'monitor', 'lenovo', '', 'MONITOR', '', 'nuevo', '2018-10-12', 4, '0000-00-00', 1, 'COMPRA-WG20bk9qVm-4619660-7862', 'tsAZ3kWB9u223841-7762W27og--PC', NULL, '2018-10-05 22:46:14'),
('29395690997', 'UPS', 'UP-ATA', '', 'UPS', '', 'nuevo', '2018-09-21', 4, '0000-00-00', 1, 'COMPRA-XJtqeW4EMP-5355722-4804', NULL, NULL, '2018-09-21 17:41:48'),
('29830640819854', 'MONITOR', 'dell', '', 'MONITOR', '', 'nuevo', '2018-10-04', 4, '0000-00-00', 1, NULL, NULL, NULL, '2018-10-04 20:43:03'),
('30177135369740', 'mouse', 'dell', '', 'MOUSE', '', 'nuevo', '2018-10-05', 4, '0000-00-00', 1, 'COMPRA-HwJ4rcl2hY-4107705-9644', NULL, NULL, '2018-10-05 22:13:26'),
('30775264082476-Q', 'MOUSE', '', '', 'MOUSE', '', '', '2018-09-04', 4, '0000-00-00', 6, 'COMPRA-wTR2UE9mYO-1246907-8845', 'PC0004USAM', NULL, '2018-09-21 22:07:21'),
('313741666543-M', 'monitor', '', '', 'MONITOR', NULL, '', '2018-10-02', 4, '0000-00-00', 25, NULL, 'LAB1-PC3', NULL, '2018-10-02 17:26:54'),
('32153532942756se', 'disco externo Academica', 'Sandisk', '1 TB', 'DISCO DURO EXTERNO', '700RPM', 'nuevo', '2018-09-21', 4, '0000-00-00', 2, 'COMPRA-xt7HGn1Tkg-3366628-5616', NULL, NULL, '2018-09-21 19:30:22'),
('33769777403212', 'UPS', '', '', 'UPS', '', 'nuevo', '2018-09-21', 4, '0000-00-00', 1, 'COMPRA-y4EOUJe2Lz-5231367-1759', 'PJ4r5XsIlZ618117-8544hwVQo--PC', NULL, '2018-09-21 19:20:55'),
('350872853863', 'Dell Inspiron 15 5000-Intel i5-8250U ', 'Dell Inspiron', '500 GB disco', 'LAPTOP', '', 'nuevo', '2018-09-21', 4, '0000-00-00', 1, 'COMPRA-c25BPQ4EKf-4927797-1667', NULL, NULL, '2018-09-21 17:46:08'),
('357060417951', 'teclado', '', '', 'TECLADO', NULL, '', '0000-00-00', 4, '0000-00-00', 25, NULL, 'LAB1-PC2', NULL, '2018-10-02 17:07:52'),
('37529504504054', 'Mouse', '', '', 'MOUSE', NULL, '', '2018-10-04', 4, '0000-00-00', 25, NULL, 'RED-PC1', NULL, '2018-10-04 17:17:06'),
('37872467171400-A', 'CPU', '', '', 'CPU', '', '', '2018-09-04', 4, '0000-00-00', 6, 'COMPRA-wTR2UE9mYO-1246907-8845', 'PC0001USAM', NULL, '2018-09-21 22:07:19'),
('38085856512188', 'teclado', '', '', 'TECLADO', NULL, '', '2018-10-04', 4, '0000-00-00', 25, NULL, 'LAB2-PC1', NULL, '2018-10-04 16:26:04'),
('38338539125', 'mouse generico', 'dell', '', 'MOUSE', '', 'En uso', '2018-09-21', 4, '2018-10-02', 25, 'COMPRA-XJtqeW4EMP-5355722-4804', 'LAB1-PC1', NULL, '2018-09-21 17:41:48'),
('38620509532', 'teclado generico', 'dell', '', 'MOUSE', '', 'En uso', '2018-09-21', 4, '2018-10-02', 25, 'COMPRA-XJtqeW4EMP-5355722-4804', 'LAB1-PC1', NULL, '2018-09-21 17:41:48'),
('409707861300-q', 'Mouse', '', '', 'MOUSE', NULL, '', '0000-00-00', 4, '0000-00-00', 25, NULL, 'LAB1-PC4', NULL, '2018-10-02 17:35:11'),
('41192455114796-B', 'CPU', '', '', 'CPU', '', '', '2018-09-04', 4, '0000-00-00', 6, 'COMPRA-wTR2UE9mYO-1246907-8845', 'PC0002USAM', NULL, '2018-09-21 22:07:20'),
('41291134087368', 'teclado generico', 'intel', '', 'TECLADO', '', 'nuevo', '2018-09-21', 4, '0000-00-00', 1, 'COMPRA-y4EOUJe2Lz-5231367-1759', 'PJ4r5XsIlZ618117-8544hwVQo--PC', NULL, '2018-09-21 19:20:55'),
('41479514134116', 'CPU generico', '', '', 'CPU', '', 'nuevo', '2018-09-20', 4, '0000-00-00', 1, 'COMPRA-jKzF8dIp3k-9353634-6082', 'gP6b0dGs42926843-2407Jyigf--servidor', NULL, '2018-09-21 17:59:13'),
('424924059444', 'Dell Inspiron 15 5000-Intel i5-8250U ', 'Dell Inspiron', '500 GB disco', 'LAPTOP', '', 'nuevo', '2018-09-21', 4, '0000-00-00', 1, 'COMPRA-c25BPQ4EKf-4927797-1667', NULL, NULL, '2018-09-21 17:46:09'),
('44242642503231', 'Mouse', '', '', 'MOUSE', NULL, '', '2018-10-04', 4, '0000-00-00', 25, NULL, 'HW-PC1', NULL, '2018-10-04 17:10:14'),
('446463217073', 'teclado', '', '', 'TECLADO', NULL, '', '2018-10-02', 4, '0000-00-00', 25, NULL, 'LAB1-PC3', NULL, '2018-10-02 17:26:54'),
('460819978033', 'CPU', '', '', 'CPU', NULL, '', '0000-00-00', 4, '0000-00-00', 25, NULL, 'LAB1-PC2', NULL, '2018-10-02 17:07:52'),
('46537029785103Q', 'Mouse', '', '', 'MOUSE', NULL, '', '2018-10-04', 4, '0000-00-00', 25, NULL, 'LAB3-PC1', NULL, '2018-10-04 16:46:49'),
('46712529822252-Q', 'UPS', '', '', 'UPS', '', '', '2018-09-04', 4, '0000-00-00', 6, 'COMPRA-wTR2UE9mYO-1246907-8845', 'PC0004USAM', NULL, '2018-09-21 22:07:21'),
('46727599059231-cpu', 'Intel Core i3 ', 'intel', '', 'CPU', '', 'nuevo', '2018-09-04', 4, '0000-00-00', 1, 'COMPRA-EZQPxBmMDO-2369250-3565', 'hXeOWxtmyk874969-6715yNxXa--PC', NULL, '2018-09-21 17:56:25'),
('48181860391050', 'disco externo Biblioteca', 'Sandisk', '1 TB', 'DISCO DURO EXTERNO', '700RPM', 'nuevo', '2018-09-21', 4, '0000-00-00', 8, 'COMPRA-xt7HGn1Tkg-3366628-5616', NULL, NULL, '2018-09-21 19:30:22'),
('50785506959072-B', 'MOUSE', '', '', 'MOUSE', '', '', '2018-09-04', 4, '0000-00-00', 6, 'COMPRA-wTR2UE9mYO-1246907-8845', 'PC0002USAM', NULL, '2018-09-21 22:07:20'),
('50846561747602', 'UPS', 'usp-company', '', 'UPS', '', 'nuevo', '2018-10-05', 4, '0000-00-00', 1, 'COMPRA-HwJ4rcl2hY-4107705-9644', NULL, NULL, '2018-10-05 22:13:26'),
('51051679490', 'teclado generico', 'dell', '', 'TECLADO', '', 'nuevo', '2018-09-21', 4, '0000-00-00', 1, 'COMPRA-XJtqeW4EMP-5355722-4804', NULL, NULL, '2018-09-21 17:41:48'),
('51114990017376-B', 'TECLADO', '', '', 'TECLADO', '', '', '2018-09-04', 4, '0000-00-00', 6, 'COMPRA-wTR2UE9mYO-1246907-8845', 'PC0002USAM', NULL, '2018-09-21 22:07:20'),
('52555434745735', 'mouse generico', 'intel', '', 'MOUSE', '', 'nuevo', '2018-09-21', 4, '0000-00-00', 1, 'COMPRA-y4EOUJe2Lz-5231367-1759', 'PJ4r5XsIlZ618117-8544hwVQo--PC', NULL, '2018-09-21 19:20:55'),
('5484349373261-t', 'teclado generico', '', '', 'TECLADO', '', 'nuevo', '2018-09-04', 4, '0000-00-00', 1, 'COMPRA-EZQPxBmMDO-2369250-3565', 'hXeOWxtmyk874969-6715yNxXa--PC', NULL, '2018-09-21 17:56:25'),
('55283983992412', 'CPU core 4', 'intel', '', 'CPU', '', 'nuevo', '2018-10-12', 4, '0000-00-00', 1, 'COMPRA-WG20bk9qVm-4619660-7862', 'tsAZ3kWB9u223841-7762W27og--PC', NULL, '2018-10-05 22:46:14'),
('56877632936', 'scanner', 'dell', '', 'SCANNER', '', 'nuevo', '2018-09-21', 4, '0000-00-00', 1, 'COMPRA-XJtqeW4EMP-5355722-4804', NULL, NULL, '2018-09-21 17:41:48'),
('57504043574444', 'teclado generico', 'lenovo', '', 'TECLADO', '', 'nuevo', '2018-10-12', 4, '0000-00-00', 1, 'COMPRA-WG20bk9qVm-4619660-7862', 'tsAZ3kWB9u223841-7762W27og--PC', NULL, '2018-10-05 22:46:14'),
('57648915718309', 'teclado generico', 'asus', '', 'TECLADO', '', 'nuevo', '2018-10-12', 4, '0000-00-00', 1, 'COMPRA-WG20bk9qVm-4619660-7862', 'tsAZ3kWB9u223841-7762W27og--PC', NULL, '2018-10-05 22:46:14'),
('5810099131892-t', 'teclado generico', '', '', 'TECLADO', '', 'nuevo', '2018-09-04', 4, '0000-00-00', 1, 'COMPRA-EZQPxBmMDO-2369250-3565', 'hXeOWxtmyk874969-6715yNxXa--PC', NULL, '2018-09-21 17:56:25'),
('60030381334945-A', 'MOUSE', '', '', 'MOUSE', '', '', '2018-09-04', 4, '0000-00-00', 6, 'COMPRA-wTR2UE9mYO-1246907-8845', 'PC0001USAM', NULL, '2018-09-21 22:07:19'),
('62249962519853', 'Mouse generico', '', '', 'MOUSE', '', 'nuevo', '2018-10-12', 4, '0000-00-00', 1, 'COMPRA-WG20bk9qVm-4619660-7862', 'tsAZ3kWB9u223841-7762W27og--PC', NULL, '2018-10-05 22:46:14'),
('65531042297370', 'disco externo Academica', 'Sandisk', '1 TB', 'DISCO DURO EXTERNO', '700RPM', 'nuevo', '2018-09-21', 4, '0000-00-00', 2, 'COMPRA-xt7HGn1Tkg-3366628-5616', NULL, NULL, '2018-09-21 19:30:22'),
('67084664762950', 'monitor ', '', '', 'MONITOR', '', 'nuevo', '2018-09-20', 4, '0000-00-00', 1, 'COMPRA-jKzF8dIp3k-9353634-6082', 'gP6b0dGs42926843-2407Jyigf--servidor', NULL, '2018-09-21 17:59:13'),
('67676072656176-Q', 'MONITOR', '', '', 'MONITOR', '', '', '2018-09-04', 4, '0000-00-00', 6, 'COMPRA-wTR2UE9mYO-1246907-8845', 'PC0004USAM', NULL, '2018-09-21 22:07:21'),
('688656238046-A', 'monitor', '', '', 'MONITOR', NULL, '', '0000-00-00', 4, '0000-00-00', 25, NULL, 'LAB1-PC4', NULL, '2018-10-02 17:35:11'),
('70041467649861', 'Mouse generico', 'intel', '', 'MOUSE', '', 'nuevo', '2018-09-21', 4, '0000-00-00', 1, 'COMPRA-y4EOUJe2Lz-5231367-1759', 'PJ4r5XsIlZ618117-8544hwVQo--PC', NULL, '2018-09-21 19:20:55'),
('70862941308877-Q', 'TECLADO', '', '', 'TECLADO', '', '', '2018-09-04', 4, '0000-00-00', 6, 'COMPRA-wTR2UE9mYO-1246907-8845', 'PC0004USAM', NULL, '2018-09-21 22:07:21'),
('76619689823127', 'teclado', 'dell', '', 'TECLADO', '', 'nuevo', '2018-10-05', 4, '0000-00-00', 1, 'COMPRA-HwJ4rcl2hY-4107705-9644', NULL, NULL, '2018-10-05 22:13:26'),
('770607691629', 'CPU', 'dell', '', 'CPU', NULL, '', '2018-10-02', 4, '0000-00-00', 25, NULL, 'LAB1-PC1', NULL, '2018-10-02 14:49:41'),
('774142321757-f', 'teclado', '', '', 'TECLADO', NULL, '', '0000-00-00', 4, '0000-00-00', 25, NULL, 'LAB1-PC4', NULL, '2018-10-02 17:35:11'),
('781069372966-B', 'DISCO DURO EXTERNO', 'SanDisk', '1 TB', 'DISCO DURO EXTERNO', '', 'nuevo', '2018-09-05', 4, '0000-00-00', 1, 'COMPRA-zyXAa4t7ZF-4383885-1959', NULL, NULL, '2018-09-21 17:48:35'),
('79747103624976-Q', 'CPU', '', '', 'CPU', '', '', '2018-09-04', 4, '0000-00-00', 6, 'COMPRA-wTR2UE9mYO-1246907-8845', 'PC0004USAM', NULL, '2018-09-21 22:07:21'),
('797652642754-7', 'CPU', '', '', 'CPU', NULL, '', '0000-00-00', 4, '0000-00-00', 25, NULL, 'LAB1-PC4', NULL, '2018-10-02 17:35:11'),
('79897818667813', 'CPU', '', '', 'CPU', NULL, '', '2018-10-04', 4, '0000-00-00', 25, NULL, 'RED-PC1', NULL, '2018-10-04 17:17:06'),
('80894630341789-C', 'UPS', '', '', 'UPS', '', '', '2018-09-04', 4, '0000-00-00', 6, 'COMPRA-wTR2UE9mYO-1246907-8845', 'PC0002USAM', NULL, '2018-09-21 22:07:20'),
('81695535858160', 'FAX', '', '', 'FAX', '', 'nuevo', '2018-09-20', 4, '0000-00-00', 1, 'COMPRA-jKzF8dIp3k-9353634-6082', 'gP6b0dGs42926843-2407Jyigf--servidor', NULL, '2018-09-21 17:59:13'),
('81988050783983', 'disco externo Academica', 'Sandisk', '1 TB', 'DISCO DURO EXTERNO', '700RPM', 'nuevo', '2018-09-21', 4, '0000-00-00', 2, 'COMPRA-xt7HGn1Tkg-3366628-5616', NULL, NULL, '2018-09-21 19:30:22'),
('8268963774665-m', 'mouse gammer', '', '', 'MOUSE', '', 'nuevo', '2018-09-04', 4, '0000-00-00', 1, 'COMPRA-EZQPxBmMDO-2369250-3565', 'hXeOWxtmyk874969-6715yNxXa--PC', NULL, '2018-09-21 17:56:25'),
('83380243703722', 'monitor', 'intel', '', 'MONITOR', '', 'nuevo', '2018-09-21', 4, '0000-00-00', 1, 'COMPRA-y4EOUJe2Lz-5231367-1759', 'PJ4r5XsIlZ618117-8544hwVQo--PC', NULL, '2018-09-21 19:20:55'),
('847102123078-C', 'DISCO DURO EXTERNO', 'SanDisk', '1 TB', 'DISCO DURO EXTERNO', '', 'nuevo', '2018-09-05', 4, '0000-00-00', 1, 'COMPRA-zyXAa4t7ZF-4383885-1959', NULL, NULL, '2018-09-21 17:48:35'),
('87213376872240-B', 'MONITOR', '', '', 'MONITOR', '', '', '2018-09-04', 4, '0000-00-00', 6, 'COMPRA-wTR2UE9mYO-1246907-8845', 'PC0002USAM', NULL, '2018-09-21 22:07:20'),
('88580199698916', 'disco externo Biblioteca', 'Sandisk', '1 TB', 'DISCO DURO EXTERNO', '700RPM', 'nuevo', '2018-09-21', 4, '0000-00-00', 8, 'COMPRA-xt7HGn1Tkg-3366628-5616', NULL, NULL, '2018-09-21 19:30:22'),
('8980339773464-m', 'Mouse generico', '', '', 'MOUSE', '', 'nuevo', '2018-09-04', 4, '0000-00-00', 1, 'COMPRA-EZQPxBmMDO-2369250-3565', 'hXeOWxtmyk874969-6715yNxXa--PC', NULL, '2018-09-21 17:56:25'),
('898670429502', 'Dell Inspiron 15 5000-Intel i5-8250U ', 'Dell Inspiron', '500 GB disco', 'LAPTOP', '', 'nuevo', '2018-09-21', 4, '0000-00-00', 1, 'COMPRA-c25BPQ4EKf-4927797-1667', NULL, NULL, '2018-09-21 17:46:08'),
('904585973172', 'Dell Inspiron 15 5000-Intel i5-8250U ', 'Dell Inspiron', '500 GB disco', 'LAPTOP', '', 'nuevo', '2018-09-21', 4, '0000-00-00', 1, 'COMPRA-c25BPQ4EKf-4927797-1667', NULL, NULL, '2018-09-21 17:46:09'),
('91114015332422', 'CPU generico', 'intel', '', 'CPU', '', 'nuevo', '2018-10-12', 4, '0000-00-00', 1, 'COMPRA-WG20bk9qVm-4619660-7862', 'tsAZ3kWB9u223841-7762W27og--PC', NULL, '2018-10-05 22:46:14'),
('91623570839873-mo', 'Monitor generico', 'lenovo', '', 'MONITOR', '', 'nuevo', '2018-09-04', 4, '0000-00-00', 1, 'COMPRA-EZQPxBmMDO-2369250-3565', 'hXeOWxtmyk874969-6715yNxXa--PC', NULL, '2018-09-21 17:56:25'),
('92052889824843-A', 'TECLADO', '', '', 'TECLADO', '', '', '2018-09-04', 4, '0000-00-00', 6, 'COMPRA-wTR2UE9mYO-1246907-8845', 'PC0001USAM', NULL, '2018-09-21 22:07:19'),
('92253037979825', 'CPU', '', '', 'CPU', NULL, '', '2018-10-04', 4, '0000-00-00', 25, NULL, 'HW-PC1', NULL, '2018-10-04 17:10:14'),
('93015670301391', 'CPU generico', 'intel', '', 'CPU', '', 'nuevo', '2018-09-21', 4, '0000-00-00', 1, 'COMPRA-y4EOUJe2Lz-5231367-1759', 'PJ4r5XsIlZ618117-8544hwVQo--PC', NULL, '2018-09-21 19:20:55'),
('93115106159820', 'monitor', '', '', 'MONITOR', NULL, '', '2018-10-04', 4, '0000-00-00', 25, NULL, 'RED-PC1', NULL, '2018-10-04 17:17:06'),
('93802636628969-cpu', 'Intel Core i3 ', 'intel', '', 'CPU', '', 'nuevo', '2018-09-04', 4, '0000-00-00', 1, 'COMPRA-EZQPxBmMDO-2369250-3565', 'hXeOWxtmyk874969-6715yNxXa--PC', NULL, '2018-09-21 17:56:25'),
('94826996810733', 'monitor', 'lenovo', '', 'MONITOR', '', 'nuevo', '2018-10-12', 4, '0000-00-00', 1, 'COMPRA-WG20bk9qVm-4619660-7862', 'tsAZ3kWB9u223841-7762W27og--PC', NULL, '2018-10-05 22:46:14'),
('9499492111614-mo', 'monitor generico', 'lenovo', '', 'MONITOR', '', 'nuevo', '2018-09-04', 4, '0000-00-00', 1, 'COMPRA-EZQPxBmMDO-2369250-3565', 'hXeOWxtmyk874969-6715yNxXa--PC', NULL, '2018-09-21 17:56:25'),
('95550064495763', 'CPU generico', 'intel', '', 'CPU', '', 'nuevo', '2018-09-21', 4, '0000-00-00', 1, 'COMPRA-y4EOUJe2Lz-5231367-1759', 'PJ4r5XsIlZ618117-8544hwVQo--PC', NULL, '2018-09-21 19:20:55'),
('95686657079494-A', 'MONITOR', '', '', 'MONITOR', '', '', '2018-09-04', 4, '0000-00-00', 6, 'COMPRA-wTR2UE9mYO-1246907-8845', 'PC0001USAM', NULL, '2018-09-21 22:07:19'),
('95700276833957', 'disco externo Biblioteca', 'Sandisk', '1 TB', 'DISCO DURO EXTERNO', '700RPM', 'nuevo', '2018-09-21', 4, '0000-00-00', 8, 'COMPRA-xt7HGn1Tkg-3366628-5616', NULL, NULL, '2018-09-21 19:30:22'),
('95751249239', 'mouse generico', 'dell', '', 'MOUSE', '', 'En uso', '2018-09-21', 4, '2018-10-02', 25, 'COMPRA-XJtqeW4EMP-5355722-4804', 'LAB1-PC3', NULL, '2018-09-21 17:41:48'),
('96117587317711', 'CPU', '', '', 'CPU', NULL, '', '2018-10-04', 4, '0000-00-00', 25, NULL, 'LAB3-PC1', NULL, '2018-10-04 16:46:49'),
('96305434233508', 'mouse', '', '', 'MOUSE', '', 'nuevo', '2018-09-20', 4, '0000-00-00', 1, 'COMPRA-jKzF8dIp3k-9353634-6082', 'gP6b0dGs42926843-2407Jyigf--servidor', NULL, '2018-09-21 17:59:13'),
('97451765816657', 'teclado', '', '', 'TECLADO', NULL, '', '2018-10-04', 4, '0000-00-00', 25, NULL, 'HW-PC1', NULL, '2018-10-04 17:10:14'),
('98271438120863', 'CPU', '', '', 'CPU', NULL, '', '2018-10-04', 4, '0000-00-00', 25, NULL, 'LAB2-PC1', NULL, '2018-10-04 16:26:05'),
('98420811975373', 'mouse gammer', '', '', 'MOUSE', '', 'nuevo', '2018-10-12', 4, '0000-00-00', 1, 'COMPRA-WG20bk9qVm-4619660-7862', 'tsAZ3kWB9u223841-7762W27og--PC', NULL, '2018-10-05 22:46:14'),
('98897569556719-m', 'mouse generico', '', '', 'MOUSE', '', 'nuevo', '2018-09-04', 4, '0000-00-00', 1, 'COMPRA-EZQPxBmMDO-2369250-3565', 'hXeOWxtmyk874969-6715yNxXa--PC', NULL, '2018-09-21 17:56:25'),
('99240279258227', 'Mouse', '', '', 'MOUSE', NULL, '', '2018-10-04', 4, '0000-00-00', 25, NULL, 'LAB2-PC1', NULL, '2018-10-04 16:26:04'),
('99344869568011', 'teclado', '', '', 'TECLADO', NULL, '', '2018-10-04', 4, '0000-00-00', 25, NULL, 'RED-PC1', NULL, '2018-10-04 17:17:06');

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
(1, 'LAB1-PC1', 'LAB1-PC1', 'LAB1-PC1', 'LAB1-PC1', 'LAB1-PC1', 'LAB1-PC1', '2018-10-02', 4, '0000-00-00', 25, NULL, 'lab-01', NULL),
(2, 'LAB1-PC2', 'LAB1-PC2', 'LAB1-PC2', 'LAB1-PC2', 'LAB1-PC2', 'LAB1-PC2', '0000-00-00', 4, '0000-00-00', 25, NULL, 'lab-01', NULL),
(3, 'LAB1-PC3', 'LAB1-PC3', 'LAB1-PC3', 'LAB1-PC3', 'LAB1-PC3', 'LAB1-PC3', '2018-10-02', 4, '0000-00-00', 25, NULL, 'lab-01', NULL),
(4, 'LAB1-PC4', 'LAB1-PC4', 'LAB1-PC4', 'LAB1-PC4', 'LAB1-PC4', 'LAB1-PC4', '0000-00-00', 4, '0000-00-00', 25, NULL, 'lab-01', NULL),
(5, 'LAB2-PC1', 'LAB2-PC1', 'LAB2-PC1', 'LAB2-PC1', 'LAB2-PC1', 'LAB2-PC1', '2018-10-04', 4, '0000-00-00', 25, NULL, 'lab-02', NULL),
(6, 'LAB3-PC1', 'LAB3-PC1', 'LAB3-PC1', 'LAB3-PC1', 'LAB3-PC1', 'LAB3-PC1', '2018-10-04', 4, '0000-00-00', 25, NULL, 'lab-03', 'COMPRA-PtnIkH0esB-5209287-7054'),
(8, 'HW-PC1', 'HW-PC1', 'HW-PC1', 'HW-PC1', 'HW-PC1', 'HW-PC1', '2018-10-04', 4, '0000-00-00', 25, NULL, 'lab-HW', NULL),
(9, 'RED-PC1', 'RED-PC1', 'RED-PC1', 'RED-PC1', 'RED-PC1', 'RED-PC1', '2018-10-04', 4, '0000-00-00', 25, NULL, 'lab-red', 'COMPRA-tUuSa4fx3G-7003881-4869');

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

--
-- Volcado de datos para la tabla `notificacion`
--

INSERT INTO `notificacion` (`id`, `titulo`, `mensaje`, `fecha`, `usuario_id`) VALUES
('d3zyKshMaj-233840-6844', 'Hola este mensaje es para probar mejoras', '<p><strong><span style=\"background-color:#2ecc71\">Mejoras en la recepcion de mensajes<img alt=\"surprise\" src=\"http://localhost/USAM-sistema-3.3.4/assets/ckeditor_4.10.1_full/ckeditor/plugins/smiley/images/omg_smile.png\" style=\"height:23px; width:23px\" title=\"surprise\" /></span></strong></p>\r\n', '2018-10-04 17:52:52', 1),
('Q02gYq86wV-616384-5525', 'fsdfds', '<p><strong>fdsfsdfsdfsd</strong></p>\r\n', '2018-09-22 17:55:42', 1),
('VNZ4sh05Lz-252563-4121', 'datos', '<p><strong>Hola <img alt=\"smiley\" src=\"http://localhost/USAM-sistema-2.9.1.4/assets/ckeditor_4.10.1_full/ckeditor/plugins/smiley/images/regular_smile.png\" style=\"height:68px; width:68px\" title=\"smiley\" /></strong></p>\r\n\r\n<p><strong><img alt=\"\" src=\"https://www.zamzar.com/images/filetypes/doc.png\" style=\"height:288px; width:288px\" /></strong></p>\r\n', '2018-09-22 17:57:49', 2);

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

--
-- Volcado de datos para la tabla `notificacion_usuario`
--

INSERT INTO `notificacion_usuario` (`id`, `notificacion_id`, `estado`, `usuario_id`) VALUES
(4, 'Q02gYq86wV-616384-5525', 'leido', 1),
(5, 'VNZ4sh05Lz-252563-4121', 'leido', 2),
(6, 'd3zyKshMaj-233840-6844', 'sin leer', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perifericos_adicionales`
--

CREATE TABLE `perifericos_adicionales` (
  `serie` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `tipo` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `marca` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `PC_id` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `PC_lab_id` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `Cod_elementoLAB` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `perifericos_adicionales`
--

INSERT INTO `perifericos_adicionales` (`serie`, `nombre`, `tipo`, `marca`, `PC_id`, `PC_lab_id`, `Cod_elementoLAB`) VALUES
(' 66429950115270', 'monitor', 'MONITOR', '', NULL, 'HW-PC1', NULL),
(' 941666197263', 'monitor', 'MONITOR', '', NULL, 'LAB1-PC2', NULL),
('106093528773', 'CPU', 'CPU', '', NULL, 'LAB1-PC3', NULL),
('12688859133049-A', '', 'UPS', '', 'PC0001USAM', NULL, NULL),
('14170578615739', 'teclado', 'TECLADO', '', NULL, 'LAB3-PC1', NULL),
('160385657427', 'Mouse', 'MOUSE', '', NULL, 'LAB1-PC2', NULL),
('22157123968936', 'monitor', 'MONITOR', '', NULL, 'LAB2-PC1', NULL),
('22631207806989-Q', 'monitor', 'MONITOR', '', NULL, 'LAB3-PC1', NULL),
('235848238458', 'monitor', 'MONITOR', 'dell', NULL, 'LAB1-PC1', NULL),
('30775264082476-Q', '', 'MOUSE', '', 'PC0004USAM', NULL, NULL),
('313741666543-M', 'monitor', 'MONITOR', '', NULL, 'LAB1-PC3', NULL),
('357060417951', 'teclado', 'TECLADO', '', NULL, 'LAB1-PC2', NULL),
('37529504504054', 'Mouse', 'MOUSE', '', NULL, 'RED-PC1', NULL),
('37872467171400-A', '', 'CPU', '', 'PC0001USAM', NULL, NULL),
('38085856512188', 'teclado', 'TECLADO', '', NULL, 'LAB2-PC1', NULL),
('38338539125', 'Mouse', 'MOUSE', '', NULL, 'LAB1-PC1', NULL),
('38620509532', 'teclado', 'TECLADO', '', NULL, 'LAB1-PC1', NULL),
('409707861300-q', 'Mouse', 'MOUSE', '', NULL, 'LAB1-PC4', NULL),
('41192455114796-B', '', 'CPU', '', 'PC0002USAM', NULL, NULL),
('44242642503231', 'Mouse', 'MOUSE', '', NULL, 'HW-PC1', NULL),
('446463217073', 'teclado', 'TECLADO', '', NULL, 'LAB1-PC3', NULL),
('460819978033', 'CPU', 'CPU', '', NULL, 'LAB1-PC2', NULL),
('46537029785103Q', 'Mouse', 'MOUSE', '', NULL, 'LAB3-PC1', NULL),
('46712529822252-Q', '', 'UPS', '', 'PC0004USAM', NULL, NULL),
('50785506959072-B', '', 'MOUSE', '', 'PC0002USAM', NULL, NULL),
('51114990017376-B', '', 'TECLADO', '', 'PC0002USAM', NULL, NULL),
('60030381334945-A', '', 'MOUSE', '', 'PC0001USAM', NULL, NULL),
('67676072656176-Q', '', 'MONITOR', '', 'PC0004USAM', NULL, NULL),
('688656238046-A', 'monitor', 'MONITOR', '', NULL, 'LAB1-PC4', NULL),
('70862941308877-Q', '', 'TECLADO', '', 'PC0004USAM', NULL, NULL),
('770607691629', 'CPU', 'CPU', 'dell', NULL, 'LAB1-PC1', NULL),
('774142321757-f', 'teclado', 'TECLADO', '', NULL, 'LAB1-PC4', NULL),
('79747103624976-Q', '', 'CPU', '', 'PC0004USAM', NULL, NULL),
('797652642754-7', 'CPU', 'CPU', '', NULL, 'LAB1-PC4', NULL),
('79897818667813', 'CPU', 'CPU', '', NULL, 'RED-PC1', NULL),
('80894630341789-C', '', 'UPS', '', 'PC0002USAM', NULL, NULL),
('87213376872240-B', '', 'MONITOR', '', 'PC0002USAM', NULL, NULL),
('92052889824843-A', '', 'TECLADO', '', 'PC0001USAM', NULL, NULL),
('92253037979825', 'CPU', 'CPU', '', NULL, 'HW-PC1', NULL),
('93115106159820', 'monitor', 'MONITOR', '', NULL, 'RED-PC1', NULL),
('95686657079494-A', '', 'MONITOR', '', 'PC0001USAM', NULL, NULL),
('95751249239', 'Mouse', 'MOUSE', '', NULL, 'LAB1-PC3', NULL),
('96117587317711', 'CPU', 'CPU', '', NULL, 'LAB3-PC1', NULL),
('97451765816657', 'teclado', 'TECLADO', '', NULL, 'HW-PC1', NULL),
('98271438120863', 'CPU', 'CPU', '', NULL, 'LAB2-PC1', NULL),
('99240279258227', 'Mouse', 'MOUSE', '', NULL, 'LAB2-PC1', NULL),
('99344869568011', 'teclado', 'TECLADO', '', NULL, 'RED-PC1', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perifericos_entrada_salida`
--

CREATE TABLE `perifericos_entrada_salida` (
  `serie` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `tipo` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `marca` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `PC_id` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `PC_lab_id` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `Cod_elementoLAB` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL
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
(1, 'PC0001USAM-LVMN-9025-13', 'Intel Core i5-7600K', '3.8', 'Intel', NULL, NULL, NULL, NULL, NULL, NULL, 'Asus Motherboard 1151', NULL, 'Kingston', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'PC0002USAM-2vW7-9849-96', 'Intel Core i5-7600K', '3.8', 'Intel', NULL, NULL, NULL, NULL, NULL, NULL, 'Asus Motherboard 1151', NULL, 'Kingston', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'PC0004USAM-pnD2-6051-79', 'Intel Core i5-7600K', '3.8', 'Intel', NULL, NULL, NULL, NULL, NULL, NULL, 'Asus Motherboard 1151', NULL, 'Kingston', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'LAB1-PC1', 'Intel® Core™ i5-3330 CPU @3,00GHz (x4)', '3000 MHz', 'Intel', 'Asset-1234567890', 'American Megatrends Inc.', '0507', 'System Serial Number', '2018-10-10', 'ASUSTeK COMPUTER INC.', 'H61M-C', 'Rev X.0x', 'KIN', 'ChannelA-DIMM0Capacidad:  4096', 'PCIEX16', 'PCIEX1_1', 'PCIEX1_2', '', ''),
(5, 'LAB1-PC2', 'Intel® Core™ i5-3330 CPU @3,00GHz (x4)', '3000 MHz', 'Intel', 'BIOSBi', 'American Megatrends Inc.', 'System Serial Number', '7', '2018-10-02', 'ASUSTeK COMPUTER INC.', 'H61M-C', 'Rev X.0x', 'KIN', 'DIMM1', 'PCIeX1', 'PCIeX1', 'PCIeX16', '', ''),
(6, 'LAB1-PC3', 'Intel® Core™ i5-3330 CPU @3,00GHz (x4)', '3000 MHz', 'Intel', '*****', 'American Megatrends Inc.', 'BEH6110H,86A,0109,2012,1221,1455 ', '*****', '2018-10-10', 'Intel Corporation', 'DH61WW', 'Rev X.0x', 'KIN', 'DIMM1', 'PCIeX1', 'PCIeX1', 'PCIeX16', 'PCI', 'PCIeX16'),
(7, 'LAB1-PC4', 'Intel® Core™ i5-6500 CPU @3,20GHz (x4)', '3000 MHz', 'Intel', '*****', 'American Megatrends Inc.', '3402', '*****', '2018-09-29', 'ASUSTeK COMPUTER INC.', 'H61M-C', 'H110M-R', 'KIN', 'DIMM1', 'PCIeX1', 'PCIeX1', '', '', ''),
(8, 'LAB2-PC1', 'Intel® Core™ i5-3330 CPU @3,00GHz (x4)', '3000 MHz', 'Intel', 'American Megatrends Inc.', 'American Megatrends Inc.', 'System Serial Number', 'System Serial Number', '2018-10-04', 'ASUSTeK COMPUTER INC.', 'H61M-C', 'Rev X.0x', 'KIN', 'A', 'B', '', '', '', ''),
(9, 'LAB3-PC1', 'Intel® Core™ i5-3330 CPU @3,00GHz (x4)', '3000 MHz', 'Intel', 'American Megatrends Inc.', 'American Megatrends Inc.', 'System Serial Number', 'System Serial Number', '2018-10-04', 'ASUSTeK COMPUTER INC.', 'H61M-C', 'Rev X.0x', 'KIN', 'AQ', 'SS', '', '', '', ''),
(10, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(11, 'HW-PC1', 'Intel® Core™ i5-3330 CPU @3,00GHz (x4)', '3000 MHz', 'Intel', 'American Megatrends Inc.', 'American Megatrends Inc.', 'System Serial Number', 'System Serial Number', '2018-10-04', 'ASUSTeK COMPUTER INC.', 'H61M-C', 'Rev X.0x', 'KIN', '1', '1', '', '', '', ''),
(12, 'RED-PC1', 'Intel® Core™ i5-3330 CPU @3,00GHz (x4)', '3000 MHz', 'Intel', 'American Megatrends Inc.', 'American Megatrends Inc.', 'System Serial Number', 'System Serial Number', '2018-10-15', 'ASUSTeK COMPUTER INC.', 'H61M-C', 'Rev X.0x', 'KIN', '1', '1', '1', '1', '', '');

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

--
-- Volcado de datos para la tabla `software`
--

INSERT INTO `software` (`id`, `pc_id`, `PC_lab_id`, `nombre`, `empresa`, `nom_carpeta`, `version`, `nom_archivo`) VALUES
(1, 'PC0001USAM', NULL, 'Microsft office', NULL, NULL, '2013', NULL),
(2, 'PC0001USAM', NULL, 'Winrar', NULL, NULL, '2.8', NULL),
(3, 'PC0001USAM', NULL, 'Panda Antivirus', NULL, NULL, NULL, NULL),
(4, 'PC0001USAM', NULL, 'Firefox', NULL, NULL, NULL, NULL),
(5, 'PC0002USAM', NULL, 'Microsft office', NULL, NULL, '2013', NULL),
(6, 'PC0002USAM', NULL, 'Firefox', NULL, NULL, NULL, NULL),
(7, 'PC0004USAM', NULL, 'Microsft office', NULL, NULL, '2016', NULL),
(8, 'PC0004USAM', NULL, 'Firefox', NULL, NULL, NULL, NULL),
(9, NULL, 'LAB1-PC1', 'AdobeReaderAcrobatDC', 'AdobeReaderAcrobatDC', 'Reader', '18.11.20055.290043', '  AcroRd32.exe'),
(10, NULL, 'LAB1-PC1', 'Aplicaciónde WindowsWordPad', 'MicrosoftCorporation', 'MicrosoftCorporation', '10.0.17134.1', 'wordpad.exe'),
(11, NULL, 'LAB1-PC1', 'Diagnosticsfor Internet utilityExplorer', 'MicrosoftCorporation', 'internet explorer', '11.00.17134.1', 'iediagcmd.exe'),
(12, NULL, 'LAB1-PC1', 'ExecuteUtility   Package', 'MicrosoftCorporation', 'ManagementStudio  ', '12.0.2000.8', 'DTExecUI.exe'),
(13, NULL, 'LAB1-PC1', 'F-SecureUserFramework(Corporate)InterfaceCommon', 'F-SecureCorporation', 'FSGUI', '14.60.119.0', 'fscuif.exe'),
(14, NULL, 'LAB1-PC1', 'F-SecureUI        Diagnostics  F-Secure', 'Corporation', 'FSGUI', '14.60.113.0', 'FsDiagUi.exe'),
(15, NULL, 'LAB1-PC1', 'Google Chrome', 'Google Inc.', 'Application', '67.0.3396.99', 'chrome.exe'),
(16, NULL, 'LAB1-PC1', 'ISDeploymentWizard', 'MicrosoftCorporation', 'Binn', '11.00.17134.1', 'ISDeploymentWizard.exe'),
(17, NULL, 'LAB1-PC1', 'Java(TM)Launcher Web Start', 'OracleCorporation', 'bin', '8.0.1620.12', 'javaws.exe'),
(18, NULL, 'LAB1-PC1', 'Microsoft Access', 'MicrosoftCorporation', 'Office16', '16.0.4711.1000', 'MSACCESS.EXE'),
(19, NULL, 'LAB1-PC1', 'MicrosoftServicesDeploymentAnalysisTool', 'MicrosoftCorporation', 'ManagementStudio ', ' 12.0.2000.8', 'Deployment.exe'),
(20, NULL, 'LAB1-PC1', 'Microsoft Excel', 'MicrosoftCorporation', 'Office16', '16.0.4717.1000', 'EXCEL.EXE'),
(21, NULL, 'LAB1-PC2', 'WinRAR archiver', 'Alexander Roshal', 'WinRAR', '5.21.0', 'WinRAR.exe'),
(22, NULL, 'LAB1-PC2', 'Windows Contacts', 'MicrosoftCorporation', 'Windows Mail', '10.0.17134.1', 'wab.exe'),
(23, NULL, 'LAB1-PC2', 'SQLManagementServer  Studio', 'MicrosoftCorporation', 'ManagementStudio ', ' 12.0.2000.8', 'Ssms.exe'),
(24, NULL, 'LAB1-PC2', 'SQLIntegrationDataServerProfileServicesViewer', 'MicrosoftCorporation', 'Binn', '12.0.2000.8', 'DataProfileViewer.exe'),
(25, NULL, 'LAB1-PC2', 'Office XML Handler', 'MicrosoftCorporation', 'OFFICE16', 'OFFICE16	16.0.4567.1000', 'MSOXMLED.EXE'),
(26, NULL, 'LAB1-PC2', 'MicrosoftStudio 2010Visual', 'MicrosoftCorporation', 'IDE', '10.0.40219.1', 'devenv.exe'),
(27, NULL, 'LAB1-PC2', 'Microsoft PowerPoint', 'MicrosoftCorporation', 'Office16', '16.0.4266.1001', 'POWERPNT.EXE'),
(28, NULL, 'LAB1-PC3', 'Microsoftfor BusinessOneDrive', 'MicrosoftCorporation', 'Office16', '16.0.4702.1000', 'GROOVE.EXE'),
(29, NULL, 'LAB1-PC3', 'Microsoft OneNote', 'MicrosoftCorporation', 'Office16', '16.0.4693.1000', 'ONENOTE.EXE'),
(30, NULL, 'LAB1-PC3', 'MicrosoftStudio 2010Visual', 'MicrosoftCorporation', 'IDE', '10.0.40219.1', 'devenv.exe'),
(31, NULL, 'LAB1-PC4', 'AdobeReaderAcrobatDC', 'AdobeIncorporatedSystems', 'Reader', '6.1.7600.16385', 'AcroRd32.exe'),
(32, NULL, 'LAB1-PC4', 'Microsoft OneNote', 'MicrosoftCorporation', 'accessories', '18.11.20055.290043', 'ONENOTE.EXE'),
(33, NULL, 'LAB1-PC4', 'MicrosoftStudio 2010Visual', 'MicrosoftCorporation', 'IDE', '1.8.4', 'devenv.exe'),
(34, NULL, 'LAB1-PC4', 'ExecuteUtility   Package', 'MicrosoftCorporation', 'Binn', '12.0.2000.8', 'DataProfileViewer.exe'),
(35, NULL, 'LAB1-PC4', 'F-SecureUserFramework(Corporate)InterfaceCommon', 'F-SecureCorporation', 'FSGUI', '14.60.119.0', 'fscuif.exe'),
(36, NULL, 'LAB1-PC4', 'F-SecureUI Diagnostics  F-Secure', 'Corporation', 'FSGUI', '10.0.40219.1', 'FsDiagUi.exe'),
(37, NULL, 'LAB1-PC4', 'Google Chrome', 'Google Inc.', 'Application', '16.0.4266.1001', 'chrome.exe'),
(38, NULL, 'LAB1-PC4', 'ISDeploymentWizard', 'MicrosoftCorporation', 'Binn', '11.00.17134.1', 'ISDeploymentWizard.exe'),
(39, NULL, 'LAB1-PC4', 'Java(TM)Launcher Web Start', 'OracleCorporation', 'bin', '8.0.1620.12', 'javaws.exe'),
(40, NULL, 'LAB1-PC4', 'Microsoft Access', 'MicrosoftCorporation', 'Office16', '16.0.4711.1000', 'MSACCESS.EXE'),
(41, NULL, 'LAB1-PC4', 'MicrosoftServicesDeploymentAnalysisTool', 'MicrosoftCorporation', 'ManagementStudio', '12.0.2000.8', 'Deployment.exe'),
(42, NULL, 'LAB2-PC1', 'AdobeReaderAcrobatDC', 'AdobeIncorporatedSystems', 'Reader', '6.1.7600.16385', 'AcroRd32.exe'),
(43, NULL, 'LAB2-PC1', 'Aplicaciónde WindowsWordPad', 'MicrosoftCorporation', 'accessories', '10.0.17134.1', 'wordpad.exe'),
(44, NULL, 'LAB2-PC1', 'Arduino IDE', 'MicrosoftCorporation', 'Arduino', '1.8.4', 'devenv.exe'),
(45, NULL, 'LAB3-PC1', 'AdobeReaderAcrobatDC', 'AdobeIncorporatedSystems', 'Reader', '6.1.7600.16385', 'AcroRd32.exe'),
(46, NULL, 'HW-PC1', 'WinRAR archiver', 'MicrosoftCorporation', 'WinRAR', '16.0.4702.1000', 'WinRAR.exe'),
(47, NULL, 'RED-PC1', 'AdobeReaderAcrobatDC', 'AdobeIncorporatedSystems', 'Reader', '6.1.7600.16385', 'AcroRd32.exe'),
(48, NULL, 'RED-PC1', 'Microsoft OneNote', 'MicrosoftCorporation', 'accessories', '10.0.17134.1', 'wordpad.exe');

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
(2, 'enrique001', 'enrique1', 'quezada', 'administrador', 'enrique.qzada@gmail.com', 'e190d72eea11d9049870eaa2d41e410f', 'super usuario'),
(4, 'root', 'root', 'root', 'root', 'root@gmail.com', '63a9f0ea7bb98050796b649e85481845', 'root'),
(5, 'sonia0001', 'Sonia ', 'De Orellana', 'Jefe de entorno virtuales', '1@gmail.com', '04dfd32e8b0aa9c67925755f6c919722', 'super usuario');

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
-- Indices de la tabla `cambios`
--
ALTER TABLE `cambios`
  ADD PRIMARY KEY (`id_cambios`);

--
-- Indices de la tabla `cambios_prestamos`
--
ALTER TABLE `cambios_prestamos`
  ADD PRIMARY KEY (`id_cambio`),
  ADD KEY `unidad_pertenece` (`unidad_pertenece`),
  ADD KEY `unidad_traslado` (`unidad_traslado`),
  ADD KEY `cambio_equipo` (`cambio_equipo`),
  ADD KEY `usuario_id` (`usuario_id`);

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
-- Indices de la tabla `perifericos_adicionales`
--
ALTER TABLE `perifericos_adicionales`
  ADD PRIMARY KEY (`serie`),
  ADD KEY `marca` (`marca`),
  ADD KEY `PC_id` (`PC_id`),
  ADD KEY `PC_lab_id` (`PC_lab_id`);

--
-- Indices de la tabla `perifericos_entrada_salida`
--
ALTER TABLE `perifericos_entrada_salida`
  ADD PRIMARY KEY (`serie`),
  ADD KEY `PC_id` (`PC_id`),
  ADD KEY `PC_lab_id` (`PC_lab_id`);

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
  MODIFY `id_red` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `adaptador_video`
--
ALTER TABLE `adaptador_video`
  MODIFY `id_video` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `almacenamiento`
--
ALTER TABLE `almacenamiento`
  MODIFY `id_almacenamiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `cambios`
--
ALTER TABLE `cambios`
  MODIFY `id_cambios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `cambios_prestamos`
--
ALTER TABLE `cambios_prestamos`
  MODIFY `id_cambio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `compra_unidad`
--
ALTER TABLE `compra_unidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `descripcion_sistema`
--
ALTER TABLE `descripcion_sistema`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `inventario_adm`
--
ALTER TABLE `inventario_adm`
  MODIFY `id_adm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `inventario_lab`
--
ALTER TABLE `inventario_lab`
  MODIFY `id_lab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `notificacion_usuario`
--
ALTER TABLE `notificacion_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `placa_base`
--
ALTER TABLE `placa_base`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `software`
--
ALTER TABLE `software`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `unidad`
--
ALTER TABLE `unidad`
  MODIFY `id_unidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cambios_prestamos`
--
ALTER TABLE `cambios_prestamos`
  ADD CONSTRAINT `cambios_prestamos_ibfk_1` FOREIGN KEY (`unidad_pertenece`) REFERENCES `unidad` (`id_unidad`),
  ADD CONSTRAINT `cambios_prestamos_ibfk_2` FOREIGN KEY (`unidad_traslado`) REFERENCES `unidad` (`id_unidad`),
  ADD CONSTRAINT `cambios_prestamos_ibfk_3` FOREIGN KEY (`cambio_equipo`) REFERENCES `cambios` (`id_cambios`),
  ADD CONSTRAINT `cambios_prestamos_ibfk_4` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id_usuario`);

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
-- Filtros para la tabla `perifericos_adicionales`
--
ALTER TABLE `perifericos_adicionales`
  ADD CONSTRAINT `perifericos_adicionales_ibfk_1` FOREIGN KEY (`PC_id`) REFERENCES `inventario_adm` (`identificador`),
  ADD CONSTRAINT `perifericos_adicionales_ibfk_2` FOREIGN KEY (`PC_lab_id`) REFERENCES `inventario_lab` (`identificador_lab`);

--
-- Filtros para la tabla `perifericos_entrada_salida`
--
ALTER TABLE `perifericos_entrada_salida`
  ADD CONSTRAINT `perifericos_entrada_salida_ibfk_1` FOREIGN KEY (`PC_id`) REFERENCES `inventario_adm` (`identificador`),
  ADD CONSTRAINT `perifericos_entrada_salida_ibfk_2` FOREIGN KEY (`PC_lab_id`) REFERENCES `inventario_lab` (`identificador_lab`);

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
