

create Database farmacia;
use farmacia;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


--
-- Estructura de tabla para la tabla `acceso`
--

CREATE TABLE `acceso` (
  `idAcceso` int(11) NOT NULL,
  `idPadre` int(11) NOT NULL,
  `grupo` int(11) NOT NULL,
  `opcion` varchar(25) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `idIcono` int(11) DEFAULT NULL,
  `orden` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `acceso`
--

INSERT INTO `acceso` (`idAcceso`, `idPadre`, `grupo`, `opcion`, `url`, `idIcono`, `orden`) VALUES
(1, 0, 1, 'Inicio', 'Home/index', 1, 0),
(2, 0, 2, 'Mantenimientos', '', 14, 0),
(3, 0, 3, 'Ventas', '', 15, 0),
(4, 2, 2, 'Usuarios', 'Usuarios/index', 2, 0),
(5, 2, 2, 'Roles', 'Roles/index', 3, 1),
(6, 2, 2, 'Iconos', 'Iconos/index', 4, 3),
(7, 3, 3, 'Fechas entregas', 'Entregas/index', 13, 5),
(8, 2, 2, 'Accesos', 'Accesos/index', 16, 2),
(9, 16, 5, 'Categorias', 'Categorias/index', 6, 0),
(10, 16, 5, 'Medicamentos', 'Productos/index', 7, 1),
(11, 15, 4, 'Sucursales', 'Sucursales/index', 8, 7),
(12, 15, 4, 'Proveedores', 'Proveedores/index', 9, 8),
(13, 3, 3, 'Carriers', 'Carriers/index', 10, 9),
(14, 3, 3, 'Compras', 'Compras/index', 11, 10),
(15, 0, 4, 'Tiendas', ' ', 17, 3),
(16, 0, 5, 'Productos', ' ', 18, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carriers`
--

CREATE TABLE `carriers` (
  `idCarrier` int(11) NOT NULL,
  `carrier` varchar(30) DEFAULT NULL,
  `telefonoCarrier` varchar(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `carriers`
--

INSERT INTO `carriers` (`idCarrier`, `carrier`, `telefonoCarrier`) VALUES
(1, 'Flash Delivery', '2213-2776'),
(2, 'MotoPro', '2755-3333'),
(3, 'PharmEx', '2211-8888');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `idCategoria` int(11) NOT NULL,
  `categoria` varchar(30) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`idCategoria`, `categoria`, `descripcion`) VALUES
(1, 'Pastillas', 'Comprimido pequeño que se ingiere y que contiene medicamentos, vitaminas o minerales'),
(2, 'Jarabes', 'Medicina presentada en forma de líquido espeso, dulce y pegajoso'),
(3, 'Sueros', 'Forma farmacéutica líquida sin partículas en suspensión con administración vía oral'),
(4, 'Cremas', 'Preparado semisólido a base de agua utilizado para el tratamiento tópico'),
(5, 'Otros', 'Misceláneo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL,
  `nombreCliente` varchar(50) NOT NULL,
  `telefonoCliente` varchar(9) NOT NULL,
  `direccionCliente` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idCliente`, `nombreCliente`, `telefonoCliente`, `direccionCliente`) VALUES
(101, 'Carlos Rivas', '7596-8965', 'Colonia Las Luces, Soyapango'),
(102, 'Guadalupe Lopez', '7596-3596', 'Residencial Las Flores, Mejicanos'),
(103, 'Juan Valle', '7365-8541', 'Colonia Santa Clara, Santa Tecla'),
(104, 'Jose Vanegas', '7596-8965', 'Colonia Santa Cruz, San Salvador'),
(105, 'Rosita Mejia', '7365-2536', 'Colonia Vista Hermosa, Lourdes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `idCompra` int(11) NOT NULL,
  `fechaCompra` date DEFAULT NULL,
  `fechaEntrega` date DEFAULT NULL,
  `idProveedor` int(11) DEFAULT NULL,
  `idProducto` int(11) DEFAULT NULL,
  `cantidadCompra` int(11) DEFAULT NULL,
  `tipoCompra` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`idCompra`, `fechaCompra`, `fechaEntrega`, `idProveedor`, `idProducto`, `cantidadCompra`, `tipoCompra`) VALUES
(11, '2022-04-15', '2022-04-17', 1, 1, 100, 'Contado'),
(12, '2022-04-15', '2022-04-17', 1, 1, 120, 'Crédito'),
(13, '2022-04-15', '2022-04-17', 1, 2, 80, 'Contado'),
(14, '2022-04-25', '2022-04-26', 1, 2, 75, 'Contado'),
(15, '2022-04-25', '2022-04-26', 2, 4, 100, 'Crédito'),
(16, '2022-04-26', '2022-04-27', 2, 4, 100, 'Crédito'),
(17, '2022-05-20', '2022-05-22', 2, 5, 30, 'Contado'),
(18, '2022-05-20', '2022-05-22', 3, 5, 50, 'Contado'),
(19, '2022-05-31', '2022-06-02', 3, 10, 40, 'Contado'),
(20, '2022-05-31', '2022-06-02', 3, 10, 85, 'Crédito');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallecompra`
--

CREATE TABLE `detallecompra` (
  `numCompra` int(11) NOT NULL,
  `fechaCompra` date NOT NULL,
  `idProveedor` int(11) DEFAULT NULL,
  `codigoProducto` int(11) DEFAULT NULL,
  `cantidadCompra` int(11) NOT NULL,
  `tipoCompra` varchar(20) NOT NULL,
  `fechaEnvioCompra` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detallecompra`
--

INSERT INTO `detallecompra` (`numCompra`, `fechaCompra`, `idProveedor`, `codigoProducto`, `cantidadCompra`, `tipoCompra`, `fechaEnvioCompra`) VALUES
(50, '2021-09-15', 1, 1, 100, 'Contado', '2021-09-17'),
(51, '2021-09-15', 2, 2, 120, 'Crédito', '2021-09-17'),
(52, '2021-09-15', 2, 3, 80, 'Contado', '2021-09-17'),
(53, '2021-09-25', 3, 4, 75, 'Contado', '2021-09-26'),
(54, '2021-09-25', 1, 5, 100, 'Crédito', '2021-09-26'),
(55, '2021-09-26', 3, 6, 100, 'Crédito', '2021-09-27'),
(56, '2021-10-20', 2, 7, 30, 'Contado', '2021-10-22'),
(57, '2021-10-20', 3, 8, 50, 'Contado', '2021-10-22'),
(58, '2021-10-31', 2, 9, 40, 'Contado', '2021-11-02'),
(59, '2021-10-31', 2, 10, 85, 'Crédito', '2021-11-02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleventa`
--

CREATE TABLE `detalleventa` (
  `numVenta` int(11) NOT NULL,
  `idPedido` varchar(25) NOT NULL,
  `codigoProducto` int(11) DEFAULT NULL,
  `cantidadPedido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalleventa`
--

INSERT INTO `detalleventa` (`numVenta`, `idPedido`, `codigoProducto`, `cantidadPedido`) VALUES
(21, '11', 1, 3),
(22, '11', 5, 2),
(23, '11', 6, 4),
(24, '12', 1, 3),
(25, '12', 2, 3),
(26, '12', 9, 1),
(27, '13', 7, 4),
(28, '13', 8, 5),
(29, '14', 9, 5),
(30, '14', 10, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `icono`
--

CREATE TABLE `icono` (
  `idIcono` int(11) NOT NULL,
  `nombre` varchar(40) DEFAULT NULL,
  `icono` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `icono`
--

INSERT INTO `icono` (`idIcono`, `nombre`, `icono`) VALUES
(1, 'Casita size x2', 'fa fa-home fa-2x'),
(2, 'Usuarios size x2', 'fa fa-users fa-2x'),
(3, 'Usuarios size x2', 'fa fa-check-square-o fa-2x'),
(4, 'Usuarios size x2', 'fa fa-file-image-o fa-2x'),
(5, 'Usuario size x2', 'fa fa-user fa-2x'),
(6, 'Categorias size x2', 'fa fa-sitemap fa-2x'),
(7, 'Productos size x2', 'fa fa-medkit fa-2x'),
(8, 'Sucursales size x2', 'fa fa-university fa-2x'),
(9, 'Proveedores size x2', 'fa fa-id-card-o fa-2x'),
(10, 'Carriers size x2', 'fa fa-truck fa-2x'),
(11, 'Compras size x2', 'fa fa-suitcase fa-2x'),
(13, 'Calendario', 'fa fa-calendar fa-2x'),
(14, 'Mantenimientos', 'fa fa-cogs fa-2x'),
(15, 'Shopping Cart', 'fa fa-shopping-cart fa-2x'),
(16, 'Llave', 'fa fa-key fa-2x'),
(17, 'Canasta de compras', 'fa fa-shopping-basket fa-2x'),
(18, 'Bolsa de compras', 'fa fa-shopping-bag fa-2x');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `idPedido` varchar(25) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idCarrier` int(11) NOT NULL,
  `idSucursal` int(11) NOT NULL,
  `fechaPedido` datetime NOT NULL,
  `fechaEnvioVenta` datetime NOT NULL,
  `entregado` tinyint(4) NOT NULL DEFAULT 0,
  `costoEnvio` decimal(9,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`idPedido`, `idCliente`, `idCarrier`, `idSucursal`, `fechaPedido`, `fechaEnvioVenta`, `entregado`, `costoEnvio`) VALUES
('11', 101, 1, 1, '2022-06-14 14:30:00', '2022-06-15 09:30:00', 0, '3.00'),
('12', 102, 2, 5, '2022-06-20 08:30:00', '2022-06-21 14:45:00', 0, '4.00'),
('13', 103, 3, 4, '2022-06-01 10:25:00', '2022-06-03 10:20:00', 0, '3.00'),
('14', 102, 1, 4, '2022-06-06 17:30:00', '2022-06-08 07:10:00', 0, '4.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idProducto` int(11) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `producto` varchar(30) DEFAULT NULL,
  `precio` decimal(9,2) DEFAULT NULL,
  `descripcionProducto` varchar(100) DEFAULT NULL,
  `existencias` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idProducto`, `idCategoria`, `producto`, `precio`, `descripcionProducto`, `existencias`) VALUES
(1, 1, 'Acetaminofén MK', '1.75', 'Analgésico que reduce el dolor y la fiebre', 100),
(2, 1, 'Viro-Grip', '3.10', 'Alivia los síntomas del resfriado, catarro, gripe, rinitis alérgica y sinusitis', 120),
(3, 2, 'Abrilar', '12.79', 'Extracto de Hedera Hélix con acción mucolítica, expectorante, bronco-espasmolítica y antitusígena', 80),
(4, 2, 'Pepto-Bismol', '3.05', 'Trata la acidez y el malestar estomacal así como las náuseas ocasionales', 75),
(5, 3, 'Pedialyte', '2.99', 'Fórmula estéril de administración oral con glucosa, electrolitos y zinc para rehidratación', 100),
(6, 3, 'Oraldex', '2.29', 'Manejo de la deshidratación causada por fiebre, calor o deportes', 100),
(7, 4, 'Canesten Triple Acción', '12.29', 'Medicamento que se emplea para tratar las infecciones producidas por hongos', 30),
(8, 4, 'Neobacina', '5.49', 'Previene infecciones y acelera la cicatrización de lesiones en la piel', 50),
(9, 5, 'Gatorade Blueberry', '1.00', 'Bebida isotónica usada para rehidratar y recuperar carbohidratos y electrolitos', 40),
(10, 5, 'Asepxia Polvo Compacto', '11.49', 'Maquillaje antiacné presentación polvo compacto color natural mate', 85);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `idProveedor` int(11) NOT NULL,
  `proveedor` varchar(30) DEFAULT NULL,
  `telefonoProveedor` varchar(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`idProveedor`, `proveedor`, `telefonoProveedor`) VALUES
(1, 'Simple Salud', '2333-7711'),
(2, 'Club Pastilla', '2112-2112'),
(3, 'Todo-Farmacia', '2422-2222');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `idRol` int(11) NOT NULL,
  `rol` varchar(15) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`idRol`, `rol`, `descripcion`) VALUES
(1, 'Administrador', 'Acceso total'),
(2, 'Farmacista', 'Acceso limitado a la gestión de productos'),
(3, 'Cliente', 'Accede sólo a compras en linea'),
(5, 'Proveedor', 'Proveedor externo'),
(6, 'Repartidor', 'Accede sólo a compras en linea'),
(7, 'Bodeguero', 'Accede sólo a compras en linea');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol_acceso`
--

CREATE TABLE `rol_acceso` (
  `idRolAcceso` int(11) NOT NULL,
  `idRol` int(11) DEFAULT NULL,
  `idAcesso` int(11) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol_acceso`
--

INSERT INTO `rol_acceso` (`idRolAcceso`, `idRol`, `idAcesso`, `descripcion`) VALUES
(1, 1, 1, 'Necesario para regresar al inicio'),
(2, 1, 2, 'Admin necesita poder gestionar usuarios'),
(3, 1, 3, 'Admin necesita poder gestionar roles'),
(4, 1, 4, 'Admin necesita poder gestionar iconos'),
(5, 2, 1, 'Necesario para regresar al inicio'),
(6, 2, 4, 'Sólo de prueba porque este man no debe tocar los iconos'),
(7, 1, 9, 'Admin necesita poder gestionar categorias'),
(8, 1, 10, 'Admin necesita poder gestionar productos'),
(9, 1, 11, 'Admin necesita poder gestionar sucursales'),
(10, 1, 12, 'Admin necesita poder gestionar proveedores'),
(11, 1, 13, 'Admin necesita poder gestionar carriers'),
(12, 1, 14, 'Admin necesita poder gestionar compras'),
(13, 2, 14, 'Farmacista necesita poder gestionar compras'),
(14, 2, 15, 'Farmacista necesita poder gestionar tiendas'),
(15, 2, 16, 'Farmacista necesita poder gestionar productos'),
(16, 2, 1, 'Farmacista necesita poder ir a inicio'),
(17, 7, 9, 'Bodeguero necesita poder gestionar categorias'),
(18, 7, 16, 'Bodeguero necesita poder gestionar productos'),
(19, 7, 1, 'Bodeguero necesita poder ir a inicio'),
(20, 3, 1, 'Necesario para regresar al inicio'),
(21, 6, 1, 'Repartidor necesita poder ir a inicio'),
(22, 6, 3, 'Repartidor necesita poder gestionar ventas'),
(23, 6, 13, 'Repartidor necesita poder gestionar carriers'),
(24, 6, 14, 'Repartidor necesita poder gestionar compras'),
(33, 5, 3, ''),
(34, 5, 1, ''),
(35, 5, 2, ''),
(36, 1, 5, 'Para saber la entrega de productos'),
(37, 1, 7, 'Para saber la entrega de productos'),
(38, 1, 6, ''),
(41, 1, 8, 'Otorgar accesos a los roles'),
(42, NULL, NULL, NULL),
(43, 1, 15, 'Admin necesita gestionar la información de las tiendas'),
(44, 1, 16, 'Accesos a productos y categorías'),
(45, 6, 7, ''),
(46, 5, 13, ''),
(47, 5, 15, ''),
(48, 5, 11, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursales`
--

CREATE TABLE `sucursales` (
  `idSucursal` int(11) NOT NULL,
  `sucursal` varchar(30) DEFAULT NULL,
  `direccionSucursal` varchar(150) DEFAULT NULL,
  `telefonoSucursal` varchar(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sucursales`
--

INSERT INTO `sucursales` (`idSucursal`, `sucursal`, `direccionSucursal`, `telefonoSucursal`) VALUES
(1, 'La Gran Vía', 'Carr. Panamericana y C. Chiltiupan, Antiguo Cuscatlán, La Libertad', '2235-3535'),
(2, 'Metrocentro', 'Blvd. de Los Héroes, Col. Miramonte, San Salvador', '2504-5555'),
(3, 'Metrocentro Sonsonate', 'Cjón. El Guayabo, Sonsonate', '2211-1717'),
(4, 'Plaza Kristal', 'Av. Independencia Sur entre C. Arizona y 39 C. Pte., Santa Ana', '2244-2828'),
(5, 'El Encuentro', 'Carr. Panamericana, Ctn. El Sitio y C. Antigua a Quelapa, San Miguel', '2555-1010');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `apellido` varchar(20) DEFAULT NULL,
  `username` varchar(30) NOT NULL,
  `pass` varchar(400) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `direccion` varchar(150) DEFAULT NULL,
  `id_rol` int(11) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `isBlocked` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombre`, `apellido`, `username`, `pass`, `email`, `direccion`, `id_rol`, `telefono`, `isBlocked`) VALUES
(1, 'Rogelio', 'Mejía', 'rmejia', '7abc07c1f4cd4f24bf0621a86d501d2e293003d28e6bd58328295067af9ff5c8c52c9aeda0639e976f8dc90181083a45cc4c1dc61703d3202f2ca75fbd62c9d0ICL9aENHBNC1HnfKDtb09e1j64uxSYHEbBN16acX89Y=', 'rogelio.mejia21@itca.edu.sv', 'SS', 1, '7777-7777', 0),
(2, 'Juan', 'Perez', 'jperez', '7abc07c1f4cd4f24bf0621a86d501d2e293003d28e6bd58328295067af9ff5c8c52c9aeda0639e976f8dc90181083a45cc4c1dc61703d3202f2ca75fbd62c9d0ICL9aENHBNC1HnfKDtb09e1j64uxSYHEbBN16acX89Y=', 'juan.perez@itca.edu.sv', 'SS', 2, '7777-7778', 0),
(3, 'Jose', 'Cerrado', 'jose', '02b7164a0dc9302057212a2715049ae1b21854d325f8850c84edaf12bd5c82d3ae0417eec22181ad133761076c877a27cd0718032eede9de54518ed335a134dfQiO7zWKGBcLWN7k8VChcJqN/urLBx/4RFLwrgo3xlEY=', 'jose.cerrado@itca.edu.sv', 'SS', 3, '7777-7779', 1),
(4, 'Jong', 'Yang', 'jyang', '7abc07c1f4cd4f24bf0621a86d501d2e293003d28e6bd58328295067af9ff5c8c52c9aeda0639e976f8dc90181083a45cc4c1dc61703d3202f2ca75fbd62c9d0ICL9aENHBNC1HnfKDtb09e1j64uxSYHEbBN16acX89Y=', 'jong.yang@itca.edu.sv', 'SS', 1, '7766-7779', 0),
(5, 'Horacio', 'Sosa', 'hsosa', '7abc07c1f4cd4f24bf0621a86d501d2e293003d28e6bd58328295067af9ff5c8c52c9aeda0639e976f8dc90181083a45cc4c1dc61703d3202f2ca75fbd62c9d0ICL9aENHBNC1HnfKDtb09e1j64uxSYHEbBN16acX89Y=', 'horacio.sosa@itca.edu.sv', 'SS', 6, '7766-7779', 0),
(6, 'Maria', 'Paz', 'mpaz', '7abc07c1f4cd4f24bf0621a86d501d2e293003d28e6bd58328295067af9ff5c8c52c9aeda0639e976f8dc90181083a45cc4c1dc61703d3202f2ca75fbd62c9d0ICL9aENHBNC1HnfKDtb09e1j64uxSYHEbBN16acX89Y=', 'maria.paz@itca.edu.sv', 'SS', 5, '7766-7779', 0),
(7, 'Oswaldo', 'Rojas', 'orojas', '7abc07c1f4cd4f24bf0621a86d501d2e293003d28e6bd58328295067af9ff5c8c52c9aeda0639e976f8dc90181083a45cc4c1dc61703d3202f2ca75fbd62c9d0ICL9aENHBNC1HnfKDtb09e1j64uxSYHEbBN16acX89Y=', 'oswaldo.rojas@itca.edu.sv', 'SS', 7, '7766-7779', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acceso`
--
ALTER TABLE `acceso`
  ADD PRIMARY KEY (`idAcceso`),
  ADD KEY `fk_icono` (`idIcono`);

--
-- Indices de la tabla `carriers`
--
ALTER TABLE `carriers`
  ADD PRIMARY KEY (`idCarrier`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`idCompra`),
  ADD KEY `fk_proveedor` (`idProveedor`),
  ADD KEY `fk_producto` (`idProducto`);

--
-- Indices de la tabla `detallecompra`
--
ALTER TABLE `detallecompra`
  ADD PRIMARY KEY (`numCompra`),
  ADD KEY `FK_idProveedor` (`idProveedor`),
  ADD KEY `FK_codigoProducto2` (`codigoProducto`);

--
-- Indices de la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  ADD PRIMARY KEY (`numVenta`),
  ADD KEY `FK_idPedido` (`idPedido`),
  ADD KEY `FK_codigoProducto1` (`codigoProducto`);

--
-- Indices de la tabla `icono`
--
ALTER TABLE `icono`
  ADD PRIMARY KEY (`idIcono`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`idPedido`),
  ADD KEY `FK_idCliente` (`idCliente`),
  ADD KEY `FK_idCarrier` (`idCarrier`),
  ADD KEY `FK_idSucursal` (`idSucursal`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idProducto`),
  ADD KEY `fk_categoria` (`idCategoria`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`idProveedor`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `rol_acceso`
--
ALTER TABLE `rol_acceso`
  ADD PRIMARY KEY (`idRolAcceso`),
  ADD KEY `fk_roles` (`idRol`),
  ADD KEY `fk_accesos` (`idAcesso`);

--
-- Indices de la tabla `sucursales`
--
ALTER TABLE `sucursales`
  ADD PRIMARY KEY (`idSucursal`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `fk_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acceso`
--
ALTER TABLE `acceso`
  MODIFY `idAcceso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `carriers`
--
ALTER TABLE `carriers`
  MODIFY `idCarrier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `idCompra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `detallecompra`
--
ALTER TABLE `detallecompra`
  MODIFY `numCompra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT de la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  MODIFY `numVenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `icono`
--
ALTER TABLE `icono`
  MODIFY `idIcono` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `idProveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `idRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `rol_acceso`
--
ALTER TABLE `rol_acceso`
  MODIFY `idRolAcceso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `sucursales`
--
ALTER TABLE `sucursales`
  MODIFY `idSucursal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `acceso`
--
ALTER TABLE `acceso`
  ADD CONSTRAINT `fk_icono` FOREIGN KEY (`idIcono`) REFERENCES `icono` (`idIcono`);

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `fk_producto` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`idProducto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_proveedor` FOREIGN KEY (`idProveedor`) REFERENCES `proveedores` (`idProveedor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detallecompra`
--
ALTER TABLE `detallecompra`
  ADD CONSTRAINT `FK_codigoProducto2` FOREIGN KEY (`codigoProducto`) REFERENCES `productos` (`idProducto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_idProveedor` FOREIGN KEY (`idProveedor`) REFERENCES `proveedores` (`idProveedor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  ADD CONSTRAINT `FK_codigoProducto1` FOREIGN KEY (`codigoProducto`) REFERENCES `productos` (`idProducto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_idPedido` FOREIGN KEY (`idPedido`) REFERENCES `pedido` (`idPedido`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `FK_idCarrier` FOREIGN KEY (`idCarrier`) REFERENCES `carriers` (`idCarrier`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_idCliente` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_idSucursal` FOREIGN KEY (`idSucursal`) REFERENCES `sucursales` (`idSucursal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_categoria` FOREIGN KEY (`idCategoria`) REFERENCES `categorias` (`idCategoria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `rol_acceso`
--
ALTER TABLE `rol_acceso`
  ADD CONSTRAINT `fk_accesos` FOREIGN KEY (`idAcesso`) REFERENCES `acceso` (`idAcceso`),
  ADD CONSTRAINT `fk_roles` FOREIGN KEY (`idRol`) REFERENCES `roles` (`idRol`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_rol` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`idRol`);
COMMIT;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;

--Para Windows 10

/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
