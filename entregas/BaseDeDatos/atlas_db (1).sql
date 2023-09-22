-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-09-2023 a las 19:16:54
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `atlas_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacen`
--

CREATE TABLE `almacen` (
  `idAlmacen` int(11) NOT NULL,
  `rut` int(11) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `almacen`
--

INSERT INTO `almacen` (`idAlmacen`, `rut`, `nombre`) VALUES
(1, 73, 'Quick Carry Central Montevideo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacendireccion`
--

CREATE TABLE `almacendireccion` (
  `idAlmacen` int(11) NOT NULL,
  `calle` varchar(255) NOT NULL,
  `numeroPuerta` int(11) NOT NULL,
  `ciudad` varchar(255) NOT NULL,
  `rutaAcceso` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `almacendireccion`
--

INSERT INTO `almacendireccion` (`idAlmacen`, `calle`, `numeroPuerta`, `ciudad`, `rutaAcceso`) VALUES
(1, 'General Flores', 2073, 'Montevideo', 'General Flores');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `camioneros_coches`
--

CREATE TABLE `camioneros_coches` (
  `cedulaCamionero` int(11) NOT NULL,
  `patente` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `camioneros_coches`
--

INSERT INTO `camioneros_coches` (`cedulaCamionero`, `patente`) VALUES
(35896654, 'sac4573');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coches`
--

CREATE TABLE `coches` (
  `patente` varchar(10) NOT NULL,
  `tipoCoche` varchar(255) NOT NULL,
  `estadoActividad` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `coches`
--

INSERT INTO `coches` (`patente`, `tipoCoche`, `estadoActividad`) VALUES
('sac4573', 'camion', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hojaderuta`
--

CREATE TABLE `hojaderuta` (
  `idHojaDeRuta` int(11) NOT NULL,
  `idRutas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `hojaderuta`
--

INSERT INTO `hojaderuta` (`idHojaDeRuta`, `idRutas`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hojaderuta_camioneroscoches`
--

CREATE TABLE `hojaderuta_camioneroscoches` (
  `idHojaDeRuta` int(11) NOT NULL,
  `patente` varchar(10) DEFAULT NULL,
  `cedulaCamionero` int(11) DEFAULT NULL,
  `fechaArranque` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `hojaderuta_camioneroscoches`
--

INSERT INTO `hojaderuta_camioneroscoches` (`idHojaDeRuta`, `patente`, `cedulaCamionero`, `fechaArranque`) VALUES
(1, 'sac4573', 35896654, '2023-09-22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hojaderuta_movimietos`
--

CREATE TABLE `hojaderuta_movimietos` (
  `idMovimientos` int(11) NOT NULL,
  `idHojaDeRuta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `hojaderuta_movimietos`
--

INSERT INTO `hojaderuta_movimietos` (`idMovimientos`, `idHojaDeRuta`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lotes`
--

CREATE TABLE `lotes` (
  `idLotes` int(11) NOT NULL,
  `cedulaFuncionario` int(11) NOT NULL,
  `cantidadProductos` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `lotes`
--

INSERT INTO `lotes` (`idLotes`, `cedulaFuncionario`, `cantidadProductos`) VALUES
(1, 46665550, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lotes_movimientos`
--

CREATE TABLE `lotes_movimientos` (
  `idMovimientos` int(11) NOT NULL,
  `idLotes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `lotes_movimientos`
--

INSERT INTO `lotes_movimientos` (`idMovimientos`, `idLotes`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lote_remitosproductosalmacen`
--

CREATE TABLE `lote_remitosproductosalmacen` (
  `idRemitos` int(11) NOT NULL,
  `idLotes` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `lote_remitosproductosalmacen`
--

INSERT INTO `lote_remitosproductosalmacen` (`idRemitos`, `idLotes`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientos`
--

CREATE TABLE `movimientos` (
  `idMovimientos` int(11) NOT NULL,
  `idNodos` int(11) DEFAULT NULL,
  `idRutas` int(11) DEFAULT NULL,
  `estado` varchar(10) NOT NULL,
  `fechaEstimada` date DEFAULT NULL,
  `fechaLlegada` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `movimientos`
--

INSERT INTO `movimientos` (`idMovimientos`, `idNodos`, `idRutas`, `estado`, `fechaEstimada`, `fechaLlegada`) VALUES
(1, 1, 1, 'entregado', NULL, '2023-09-23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nododireccion`
--

CREATE TABLE `nododireccion` (
  `idNodos` int(11) NOT NULL,
  `calle` varchar(73) NOT NULL,
  `numeroPuerta` int(11) NOT NULL,
  `ciudad` varchar(73) NOT NULL,
  `rutaAcceso` varchar(73) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `nododireccion`
--

INSERT INTO `nododireccion` (`idNodos`, `calle`, `numeroPuerta`, `ciudad`, `rutaAcceso`) VALUES
(1, 'gianatassio', 1444, 'ciudad de la costa', 'gianatassio'),
(2, 'agraciada', 2333, 'pan de azucar', 'ruta 9'),
(3, 'coronel julio j martinez', 3444, 'Rocha', 'ruta 9');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nodos`
--

CREATE TABLE `nodos` (
  `idNodos` int(11) NOT NULL,
  `idRutas` int(11) DEFAULT NULL,
  `nombreNodo` varchar(73) DEFAULT NULL,
  `esFinal` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `nodos`
--

INSERT INTO `nodos` (`idNodos`, `idRutas`, `nombreNodo`, `esFinal`) VALUES
(1, 1, 'pinar', 0),
(2, 1, 'pan de azucar', 0),
(3, 1, 'rocha', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idProductos` int(11) NOT NULL,
  `nombreProducto` varchar(255) DEFAULT NULL,
  `pesoProducto` smallint(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idProductos`, `nombreProducto`, `pesoProducto`) VALUES
(1, 'paquete1', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_almacen`
--

CREATE TABLE `productos_almacen` (
  `idProductos` int(11) NOT NULL,
  `idAlmacen` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos_almacen`
--

INSERT INTO `productos_almacen` (`idProductos`, `idAlmacen`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `remitos`
--

CREATE TABLE `remitos` (
  `idRemitos` int(11) NOT NULL,
  `remitente` varchar(255) DEFAULT NULL,
  `destinatario` varchar(255) NOT NULL,
  `fechaEmision` timestamp NOT NULL DEFAULT current_timestamp(),
  `destino` varchar(73) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `remitos`
--

INSERT INTO `remitos` (`idRemitos`, `remitente`, `destinatario`, `fechaEmision`, `destino`) VALUES
(1, 'Pablo Gomez', 'Pedro Flores', '2023-09-22 16:49:37', 'Treinta y Tres');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `remitos_productosalmacen`
--

CREATE TABLE `remitos_productosalmacen` (
  `idRemitos` int(11) NOT NULL,
  `idProductos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `remitos_productosalmacen`
--

INSERT INTO `remitos_productosalmacen` (`idRemitos`, `idProductos`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rutas`
--

CREATE TABLE `rutas` (
  `idRutas` int(11) NOT NULL,
  `nombreRuta` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rutas`
--

INSERT INTO `rutas` (`idRutas`, `nombreRuta`) VALUES
(1, 'pinar-pandeazucar-rocha');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipocamionero`
--

CREATE TABLE `tipocamionero` (
  `cedulaCamionero` int(11) NOT NULL,
  `libreta` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipocamionero`
--

INSERT INTO `tipocamionero` (`cedulaCamionero`, `libreta`) VALUES
(35896654, '35896654');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipofuncionario`
--

CREATE TABLE `tipofuncionario` (
  `cedulaFuncionario` int(11) NOT NULL,
  `cargo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipofuncionario`
--

INSERT INTO `tipofuncionario` (`cedulaFuncionario`, `cargo`) VALUES
(46665550, 'Encargado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `cedulaUsuario` int(11) NOT NULL,
  `tipoUsuario` varchar(25) NOT NULL,
  `nombreUsuario` varchar(100) NOT NULL,
  `telefono` int(11) DEFAULT NULL,
  `mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`cedulaUsuario`, `tipoUsuario`, `nombreUsuario`, `telefono`, `mail`, `password`) VALUES
(12345678, 'funcionario', 'jose', 99123123, 'jose@gmail.com', 'josepassword'),
(35896654, 'camionero', 'Ricardo Rios', 99554888, 'rrios@gmail.com', 'riki'),
(46665550, 'funcionario', 'Alvaro Mares', 94555888, 'amares@gmail.com', 'alvarito'),
(55575630, 'gay', 'jose', NULL, 'jose@gmail.com', '$2y$10$chMFIF2GkZeJOzqMXlk41eoyJWs0LbN6mfBMiuve3XyzdlKmdMkRu'),
(55756503, 'admin', 'jose', NULL, 'diagogh@gmail.com', '$2y$10$qO4lV3ZYI69qgNUS1jB9YeFq2yjhJ3NUzUttf3tQ6ahTJeiZqlxYK'),
(55756504, 'gay', 'pepe', NULL, 'pepe@gmail.com', '$2y$10$xNBE0htl/XQMhLtv6V0jcO2aM0izD0v.3YdWGhuRxbYZ4UMGq377O');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `almacen`
--
ALTER TABLE `almacen`
  ADD PRIMARY KEY (`idAlmacen`);

--
-- Indices de la tabla `almacendireccion`
--
ALTER TABLE `almacendireccion`
  ADD PRIMARY KEY (`idAlmacen`);

--
-- Indices de la tabla `camioneros_coches`
--
ALTER TABLE `camioneros_coches`
  ADD PRIMARY KEY (`cedulaCamionero`,`patente`),
  ADD KEY `fk_patente` (`patente`);

--
-- Indices de la tabla `coches`
--
ALTER TABLE `coches`
  ADD PRIMARY KEY (`patente`);

--
-- Indices de la tabla `hojaderuta`
--
ALTER TABLE `hojaderuta`
  ADD PRIMARY KEY (`idHojaDeRuta`),
  ADD KEY `fk_idRuta` (`idRutas`);

--
-- Indices de la tabla `hojaderuta_camioneroscoches`
--
ALTER TABLE `hojaderuta_camioneroscoches`
  ADD PRIMARY KEY (`idHojaDeRuta`),
  ADD KEY `fk_cam` (`cedulaCamionero`),
  ADD KEY `fk_pate` (`patente`);

--
-- Indices de la tabla `hojaderuta_movimietos`
--
ALTER TABLE `hojaderuta_movimietos`
  ADD PRIMARY KEY (`idMovimientos`),
  ADD KEY `fk_HojaDeRuta` (`idHojaDeRuta`);

--
-- Indices de la tabla `lotes`
--
ALTER TABLE `lotes`
  ADD PRIMARY KEY (`idLotes`),
  ADD KEY `fk_funcionario` (`cedulaFuncionario`);

--
-- Indices de la tabla `lotes_movimientos`
--
ALTER TABLE `lotes_movimientos`
  ADD PRIMARY KEY (`idMovimientos`,`idLotes`),
  ADD KEY `fk_lo` (`idLotes`);

--
-- Indices de la tabla `lote_remitosproductosalmacen`
--
ALTER TABLE `lote_remitosproductosalmacen`
  ADD PRIMARY KEY (`idRemitos`),
  ADD KEY `fk_idLote` (`idLotes`);

--
-- Indices de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  ADD PRIMARY KEY (`idMovimientos`),
  ADD KEY `fk_n` (`idNodos`),
  ADD KEY `fk_r` (`idRutas`);

--
-- Indices de la tabla `nododireccion`
--
ALTER TABLE `nododireccion`
  ADD PRIMARY KEY (`idNodos`);

--
-- Indices de la tabla `nodos`
--
ALTER TABLE `nodos`
  ADD PRIMARY KEY (`idNodos`),
  ADD KEY `fk_idr` (`idRutas`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idProductos`);

--
-- Indices de la tabla `productos_almacen`
--
ALTER TABLE `productos_almacen`
  ADD PRIMARY KEY (`idProductos`),
  ADD KEY `fk_alma` (`idAlmacen`);

--
-- Indices de la tabla `remitos`
--
ALTER TABLE `remitos`
  ADD PRIMARY KEY (`idRemitos`);

--
-- Indices de la tabla `remitos_productosalmacen`
--
ALTER TABLE `remitos_productosalmacen`
  ADD PRIMARY KEY (`idRemitos`),
  ADD KEY `fk_idRemito` (`idRemitos`),
  ADD KEY `fk_producto` (`idProductos`);

--
-- Indices de la tabla `rutas`
--
ALTER TABLE `rutas`
  ADD PRIMARY KEY (`idRutas`);

--
-- Indices de la tabla `tipocamionero`
--
ALTER TABLE `tipocamionero`
  ADD PRIMARY KEY (`cedulaCamionero`),
  ADD UNIQUE KEY `libreta` (`libreta`);

--
-- Indices de la tabla `tipofuncionario`
--
ALTER TABLE `tipofuncionario`
  ADD PRIMARY KEY (`cedulaFuncionario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`cedulaUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `almacen`
--
ALTER TABLE `almacen`
  MODIFY `idAlmacen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `hojaderuta`
--
ALTER TABLE `hojaderuta`
  MODIFY `idHojaDeRuta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `lotes`
--
ALTER TABLE `lotes`
  MODIFY `idLotes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  MODIFY `idMovimientos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `nodos`
--
ALTER TABLE `nodos`
  MODIFY `idNodos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idProductos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `remitos`
--
ALTER TABLE `remitos`
  MODIFY `idRemitos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `rutas`
--
ALTER TABLE `rutas`
  MODIFY `idRutas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `almacendireccion`
--
ALTER TABLE `almacendireccion`
  ADD CONSTRAINT `fk_ida` FOREIGN KEY (`idAlmacen`) REFERENCES `almacen` (`idAlmacen`) ON DELETE NO ACTION;

--
-- Filtros para la tabla `camioneros_coches`
--
ALTER TABLE `camioneros_coches`
  ADD CONSTRAINT `fk_cicamionero` FOREIGN KEY (`cedulaCamionero`) REFERENCES `tipocamionero` (`cedulaCamionero`) ON DELETE NO ACTION,
  ADD CONSTRAINT `fk_patente` FOREIGN KEY (`patente`) REFERENCES `coches` (`patente`) ON DELETE NO ACTION;

--
-- Filtros para la tabla `hojaderuta`
--
ALTER TABLE `hojaderuta`
  ADD CONSTRAINT `fk_idru` FOREIGN KEY (`idRutas`) REFERENCES `rutas` (`idRutas`) ON DELETE NO ACTION;

--
-- Filtros para la tabla `hojaderuta_camioneroscoches`
--
ALTER TABLE `hojaderuta_camioneroscoches`
  ADD CONSTRAINT `fk_cam` FOREIGN KEY (`cedulaCamionero`) REFERENCES `camioneros_coches` (`cedulaCamionero`) ON DELETE NO ACTION,
  ADD CONSTRAINT `fk_idhdr` FOREIGN KEY (`idHojaDeRuta`) REFERENCES `hojaderuta` (`idHojaDeRuta`) ON DELETE NO ACTION,
  ADD CONSTRAINT `fk_pate` FOREIGN KEY (`patente`) REFERENCES `camioneros_coches` (`patente`) ON DELETE NO ACTION;

--
-- Filtros para la tabla `hojaderuta_movimietos`
--
ALTER TABLE `hojaderuta_movimietos`
  ADD CONSTRAINT `fk_hodr` FOREIGN KEY (`idHojaDeRuta`) REFERENCES `hojaderuta` (`idHojaDeRuta`) ON DELETE NO ACTION,
  ADD CONSTRAINT `fk_movim` FOREIGN KEY (`idMovimientos`) REFERENCES `movimientos` (`idMovimientos`) ON DELETE NO ACTION;

--
-- Filtros para la tabla `lotes`
--
ALTER TABLE `lotes`
  ADD CONSTRAINT `fk_cf` FOREIGN KEY (`cedulaFuncionario`) REFERENCES `tipofuncionario` (`cedulaFuncionario`) ON DELETE NO ACTION;

--
-- Filtros para la tabla `lotes_movimientos`
--
ALTER TABLE `lotes_movimientos`
  ADD CONSTRAINT `fk_lo` FOREIGN KEY (`idLotes`) REFERENCES `lotes` (`idLotes`) ON DELETE NO ACTION,
  ADD CONSTRAINT `fk_mov` FOREIGN KEY (`idMovimientos`) REFERENCES `movimientos` (`idMovimientos`) ON DELETE NO ACTION;

--
-- Filtros para la tabla `lote_remitosproductosalmacen`
--
ALTER TABLE `lote_remitosproductosalmacen`
  ADD CONSTRAINT `fk_lote` FOREIGN KEY (`idLotes`) REFERENCES `lotes` (`idLotes`) ON DELETE NO ACTION,
  ADD CONSTRAINT `fk_rem` FOREIGN KEY (`idRemitos`) REFERENCES `remitos_productosalmacen` (`idRemitos`) ON DELETE NO ACTION;

--
-- Filtros para la tabla `movimientos`
--
ALTER TABLE `movimientos`
  ADD CONSTRAINT `fk_n` FOREIGN KEY (`idNodos`) REFERENCES `nodos` (`idNodos`) ON DELETE NO ACTION,
  ADD CONSTRAINT `fk_r` FOREIGN KEY (`idRutas`) REFERENCES `rutas` (`idRutas`) ON DELETE NO ACTION;

--
-- Filtros para la tabla `nododireccion`
--
ALTER TABLE `nododireccion`
  ADD CONSTRAINT `fk_nn` FOREIGN KEY (`idNodos`) REFERENCES `nodos` (`idNodos`) ON DELETE NO ACTION;

--
-- Filtros para la tabla `nodos`
--
ALTER TABLE `nodos`
  ADD CONSTRAINT `fk_idr` FOREIGN KEY (`idRutas`) REFERENCES `rutas` (`idRutas`) ON DELETE NO ACTION;

--
-- Filtros para la tabla `productos_almacen`
--
ALTER TABLE `productos_almacen`
  ADD CONSTRAINT `fk_alma` FOREIGN KEY (`idAlmacen`) REFERENCES `almacen` (`idAlmacen`) ON DELETE NO ACTION,
  ADD CONSTRAINT `fk_prod` FOREIGN KEY (`idProductos`) REFERENCES `productos` (`idProductos`) ON DELETE NO ACTION;

--
-- Filtros para la tabla `remitos_productosalmacen`
--
ALTER TABLE `remitos_productosalmacen`
  ADD CONSTRAINT `fk_pro` FOREIGN KEY (`idProductos`) REFERENCES `productos_almacen` (`idProductos`) ON DELETE NO ACTION,
  ADD CONSTRAINT `fk_remi` FOREIGN KEY (`idRemitos`) REFERENCES `remitos` (`idRemitos`) ON DELETE NO ACTION;

--
-- Filtros para la tabla `tipocamionero`
--
ALTER TABLE `tipocamionero`
  ADD CONSTRAINT `fk_cic` FOREIGN KEY (`cedulaCamionero`) REFERENCES `usuarios` (`cedulaUsuario`) ON DELETE NO ACTION;

--
-- Filtros para la tabla `tipofuncionario`
--
ALTER TABLE `tipofuncionario`
  ADD CONSTRAINT `fk_cif` FOREIGN KEY (`cedulaFuncionario`) REFERENCES `usuarios` (`cedulaUsuario`) ON DELETE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
