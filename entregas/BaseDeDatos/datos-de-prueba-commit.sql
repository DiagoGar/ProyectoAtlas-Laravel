
START TRANSACTION
INSERT INTO `usuarios` (`cedulaUsuario`, `tipoUsuario`, `nombreUsuario`, `telefono`, `mail`, `password`) VALUES ('35896654', 'camionero', 'Ricardo Rios', '099554888', 'rrios@gmail.com', 'riki'), ('46665550', 'funcionario', 'Alvaro Mares', '094555888', 'amares@gmail.com', 'alvarito');
INSERT INTO `tipocamionero` (`cedulaCamionero`, `libreta`) VALUES ('35896654', '35896654');
INSERT INTO `tipofuncionario` (`cedulaFuncionario`, `cargo`) VALUES ('46665550', 'Encargado');
INSERT INTO `coches` (`patente`, `tipoCoche`, `estadoActividad`) VALUES ('sac4573', 'camion', '1');
INSERT INTO `camioneros_coches` (`cedulaCamionero`, `patente`) VALUES ('35896654', 'sac4573');
COMMIT;
START TRANSACTION
INSERT INTO `rutas` (`nombreRuta`) VALUES ('pinar-pandeazucar-rocha');
INSERT INTO `nodos` (`nombreNodo`, `esFinal`) VALUES ('1', 'pinar', '0'), ('1', 'pan de azucar', '0'), (NULL, '1', 'rocha', '1');
INSERT INTO `nododireccion` (`idNodos`, `calle`, `numeroPuerta`, `ciudad`, `rutaAcceso`) VALUES ('1', 'gianatassio', '1444', 'ciudad de la costa', 'gianatassio'), ('2', 'agraciada', '2333', 'pan de azucar', 'ruta 9'), ('3', 'coronel julio j martinez', '3444', 'Rocha', 'ruta 9');
COMMIT;
START TRANSACTION
INSERT INTO `almacen` (`rut`, `nombre`) VALUES ('73', 'Quick Carry Central Montevideo');
INSERT INTO `almacendireccion` (`idAlmacen`, `calle`, `numeroPuerta`, `ciudad`, `rutaAcceso`) VALUES ('1', 'General Flores', '2073', 'Montevideo', 'General Flores');
INSERT INTO `productos` (`nombreProducto`, `pesoProducto`) VALUES ('paquete1', '2');
INSERT INTO `productos_almacen` (`idProductos`, `idAlmacen`) VALUES ('1', '1');
INSERT INTO `remitos` (`remitente`, `destinatario`, `fechaEmision`, `destino`) VALUES ('Pablo Gomez', 'Pedro Flores', current_timestamp(), 'Treinta y Tres');
INSERT INTO `remitos_productosalmacen` (`idRemito`, `idProducto`) VALUES ('1', '1');
COMMIT;
START TRANSACTION
INSERT INTO `lotes` (`cedulaFuncionario`, `cantidadProductos`) VALUES ('46665550', '1');
INSERT INTO `lote_remitosproductosalmacen` (`idremito`, `idLote`) VALUES ('1', '1');
COMMIT;
START TRANSACTION
INSERT INTO `hojaderuta` (`idRutas`) VALUES ('1');
INSERT INTO `hojaderuta_camioneroscoches` (`idHojaDeRuta`, `patente`, `cedulaCamionero`, `fechaArranque`) VALUES ('1', 'sac4573', '35896654', '2023-09-22');
INSERT INTO `movimientos` (`idNodos`, `idRutas`, `estado`, `fechaEstimada`, `fechaLlegada`) VALUES ('1', '1', 'entregado', NULL, '2023-09-23');
INSERT INTO `hojaderuta_movimietos` (`idMovimientos`, `idHojaDeRuta`) VALUES ('1', '1');
INSERT INTO `lotes_movimientos` (`idMovimientos`, `idLotes`) VALUES ('1', '1');
COMMIT;

