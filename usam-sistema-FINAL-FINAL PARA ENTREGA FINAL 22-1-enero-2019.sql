-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-01-2019 a las 16:06:05
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `audiovisuales`
--

CREATE TABLE `audiovisuales` (
  `id` int(11) NOT NULL,
  `codigo` varchar(250) DEFAULT NULL,
  `marca` varchar(250) DEFAULT NULL,
  `serie` varchar(250) DEFAULT NULL,
  `tipo` varchar(250) DEFAULT NULL,
  `equipo` varchar(250) DEFAULT NULL,
  `periferico` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `audiovisuales`
--

INSERT INTO `audiovisuales` (`id`, `codigo`, `marca`, `serie`, `tipo`, `equipo`, `periferico`) VALUES
(1, 'TAUD001USAM', 'GENIUS', 'X72696601762', 'PS/2', 'EQ3', 'teclado'),
(5, 'MAUD006USAM', 'GENIUS', 'X72696601762', 'PS/22', 'EQ4', 'mouse'),
(6, 'TAUD002USAM', 'KLIP XTREME', 'KKS61614040100050', 'PS/2', 'EQ2', 'teclado'),
(7, 'TAUD003USAM', 'KLIP XTREME', 'KKS61614040100048', 'USB', 'EQ13', 'teclado'),
(8, 'TAUD004USAM', 'XTECH', 'INC701571K0012', 'PS/2', '***', 'teclado'),
(9, 'TAUD005USAM', 'GENIUS', 'ZM1A03018612', 'PS/2', 'EQ4-7', 'teclado'),
(10, 'TAUD006USAM', 'XTECH', 'CS7020NC45', 'PS/2', '***', 'teclado'),
(11, 'TAUD007USAM', 'GENIUS', 'WE9C91000333', 'PS/2', '***', 'teclado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `audiovisuales_cpu`
--

CREATE TABLE `audiovisuales_cpu` (
  `id` int(11) NOT NULL,
  `codigo` varchar(250) DEFAULT NULL,
  `disco` varchar(250) DEFAULT NULL,
  `capacidad_dd` varchar(250) DEFAULT NULL,
  `ram` varchar(250) DEFAULT NULL,
  `capacidad_ram` varchar(250) DEFAULT NULL,
  `procesador` varchar(250) DEFAULT NULL,
  `reloj` varchar(250) DEFAULT NULL,
  `motherboard` varchar(250) DEFAULT NULL,
  `modelo_mod` varchar(250) DEFAULT NULL,
  `equipo` varchar(250) DEFAULT NULL,
  `sistema_operativo` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `audiovisuales_cpu`
--

INSERT INTO `audiovisuales_cpu` (`id`, `codigo`, `disco`, `capacidad_dd`, `ram`, `capacidad_ram`, `procesador`, `reloj`, `motherboard`, `modelo_mod`, `equipo`, `sistema_operativo`) VALUES
(3, 'CPUAUD002USAM', 'SEAGATE1', '500 GB', 'KINGSTON/DDR3', '6.0 GB', 'PENTIUM G2030', '3.0 GHZ', 'ASUS', '***', 'EQ6', 'Lubuntu 18.4');

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
('COMPRA-8YN9yXV5Pp-1280232-8866', 'fisica', ' PC completa', 'No hay detalles relevantes', 12, 0, 'DATA & GRAPHICS, S.A DE CV', '3354-4sss-111x-x', '2019-01-11', '2019-01-11', '1 año', '5000.00', '', 1);

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `software`
--

CREATE TABLE `software` (
  `id` int(11) NOT NULL,
  `pc_id` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `PC_lab_id` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `bodega_id` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
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
-- Indices de la tabla `audiovisuales`
--
ALTER TABLE `audiovisuales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `audiovisuales_cpu`
--
ALTER TABLE `audiovisuales_cpu`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id_red` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `adaptador_video`
--
ALTER TABLE `adaptador_video`
  MODIFY `id_video` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `almacenamiento`
--
ALTER TABLE `almacenamiento`
  MODIFY `id_almacenamiento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `audiovisuales`
--
ALTER TABLE `audiovisuales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `audiovisuales_cpu`
--
ALTER TABLE `audiovisuales_cpu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `compra_unidad`
--
ALTER TABLE `compra_unidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `descripcion_sistema`
--
ALTER TABLE `descripcion_sistema`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inventario_adm`
--
ALTER TABLE `inventario_adm`
  MODIFY `id_adm` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inventario_lab`
--
ALTER TABLE `inventario_lab`
  MODIFY `id_lab` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
