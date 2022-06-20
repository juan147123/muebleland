-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
-- 
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-06-2022 a las 03:13:31
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_muebleland`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ActualizarCategoria` (IN `descrip` TEXT CHARSET utf8, IN `cocat` INT)   UPDATE `categoria` SET  `Descripcion` = descrip WHERE `CodigoCat` = cocat$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_Actualizarcliente` ()   UPDATE `cliente` SET  `NombreCompleto` = nombre, `Direccion` = direccion, `Telefono` = telefono, `Email` = correo WHERE `cliente`.`NIT` = doc$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_Actualizarcolor` (IN `nombrecolor` VARCHAR(200) CHARSET utf8, IN `idcolor` INT)   UPDATE `colores` SET  `nombre_color` = nombrecolor WHERE `id_color` = idcolor$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ActualizarComprobante` (IN `tipcom` VARCHAR(30), IN `idvnt` INT)   UPDATE venta set tipo_compro = tipcom WHERE id_venta= idvnt$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_Actualizarempleado` (IN `nombre` VARCHAR(80) CHARSET utf8, IN `direccion` TEXT CHARSET utf8, IN `correo` VARCHAR(45) CHARSET utf8, IN `telefono` VARCHAR(9) CHARSET utf8, IN `tipo_documento` VARCHAR(30) CHARSET utf8, IN `nro_documento` VARCHAR(20) CHARSET utf8, IN `estado` VARCHAR(50) CHARSET utf8, IN `iniciolab` DATE, IN `ipocontrat` VARCHAR(100) CHARSET utf8, IN `id_emple` INT)   UPDATE `empleado` SET `nombres_trab` = nombre, `direccion_trab` = direccion, `correo_trab` = correo, `telefono_trab` = telefono, `tipo_documento` = tipo_documento, `numero_documento` = nro_documento, `estado` = estado, `inicio_lab` = iniciolab, `tipo_contrato` = ipocontrat WHERE `empleado`.`id_trabajador` = id_emple$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ActualizarEstadoCDventa` (IN `idvnt` INT)   UPDATE venta set estado = "con detalle" WHERE id_venta = idvnt$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ActualizarestadoSDventa` (IN `idvnt` INT)   UPDATE venta set estado='sin detalle' WHERE id_venta=idvnt$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ActualizarEstadoVendido` (IN `idvnt` INT)   UPDATE venta set estado = 'vendido' WHERE id_venta=idvnt$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ActualizarMarca` (IN `descrip` VARCHAR(200) CHARSET utf8, IN `idmarca` INT)   UPDATE `marcas` SET  `descripcion` = descrip WHERE `id_marca` = idmarca$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ActualizarProducto` (IN `descr` TEXT CHARSET utf8, IN `cocat` INT, IN `prCo` DECIMAL(10,2), IN `porce` INT, IN `prVen` DECIMAL(10,2), IN `modepr` VARCHAR(500), IN `idmarp` INT, IN `idcol` INT, IN `stockpr` INT, IN `imgpro` TEXT, IN `idprodu` INT)   UPDATE `producto` SET `DescripcionProd` = descr, `CodigoCat` = cocat, `PrecioCompra` = prCo, `porcentaje` = porce, `PrecioVenta` = prVen, `Modelo` = modepr, `idmarca` = idmarp,`idColor`=idcol, `Stock` = stockpr, `Imagen` = imgpro WHERE id_prod = idprodu$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_Actualizarproveedor` (IN `NombreProveedor` VARCHAR(60) CHARSET utf8, IN `Direccion` VARCHAR(100) CHARSET utf8, IN `Telefono` VARCHAR(10) CHARSET utf8, IN `PaginaWeb` VARCHAR(200) CHARSET utf8, IN `Estado` VARCHAR(20) CHARSET utf8, IN `NITProveedor` VARCHAR(11) CHARSET utf8)   UPDATE `proveedor` SET `NombreProveedor` = NombreProveedor, `Direccion` = Direccion, `Telefono` = Telefono, `PaginaWeb` = PaginaWeb, `Estado` = Estado WHERE `proveedor`.`NITProveedor` = NITProveedor$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ActualizarTipocomprovacio` (IN `idvnt` INT)   UPDATE venta set tipo_compro='' WHERE id_venta= idvnt$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ActualizarVenta` (IN `idclie` VARCHAR(30), IN `idventa` INT)   update venta set id_cliente = idclie where id_venta = idventa$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_BuscarClientexID` (IN `DOC` VARCHAR(80) CHARSET utf8)   SELECT * FROM `cliente` WHERE NIT = DOC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_BuscarContra` (IN `correo` VARCHAR(300) CHARSET utf8)   SELECT u.contrasena FROM `usuarios` u inner join empleado e on u.id_empleado=e.id_trabajador inner join cargos c on u.id_cargo=c.id_cargo WHERE u.correo_usuario = correo$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_BuscarEmpleadoxID` (IN `id_empleado` INT)   SELECT *  FROM empleado where id_trabajador=id_empleado$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_BuscarProveedorxID` (IN `idprov` VARCHAR(20) CHARSET utf8)   SELECT *  FROM proveedor where NITProveedor=idprov$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ContarClientes` ()   SELECT COUNT(NIT) as cantidadcli FROM cliente$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ContarEmpleados` ()   select COUNT(id_trabajador) as cantidadtrab from empleado$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ContarProveedores` ()   select COUNT(NITProveedor) as cantidadprov from proveedor$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ContarVentas` ()   SELECT COUNT(id_venta) as cantidadventas from venta WHERE estado='vendido'$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_Datosnubefactclientefacturacion` (IN `idvnt` INT)   SELECT c.NIT,c.NombreCompleto as razon_social,c.Direccion,c.Telefono,c.Email,v.fecha_registro,v.tipo_compro FROM cliente c inner join venta v on c.NIT=v.id_cliente WHERE v.id_venta=idvnt$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_EliminarCategoriaxID` (IN `codcat` INT)   DELETE from categoria where CodigoCat = codcat$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_EliminarClientexID` (IN `doc` VARCHAR(30))   DELETE from cliente where NIT = doc$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_EliminarColorxID` (IN `idcolor` INT)   DELETE from colores where id_color = idcolor$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_EliminarDetalleVentaxID` (IN `idvn` INT)   delete from detalle_venta WHERE id_dventa=idvn$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_EliminarEmpleadoxID` (IN `id_emple` INT)   DELETE from empleado where id_trabajador=id_emple$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_EliminarMarcaxID` (IN `idmarca` INT)   DELETE from marcas where id_marca = idmarca$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_EliminarProducto` (IN `idprodu` INT)   DELETE from producto WHERE id_prod = idprodu$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_EliminarProveedorxID` (IN `id_prov` VARCHAR(20) CHARSET utf8)   DELETE from proveedor where NITProveedor=id_prov$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_EliminarTodoDetalleVxID` (IN `idvnt` INT)   delete from detalle_venta WHERE id_venta = idvnt$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_EliminarUsuarioxID` (IN `idusuario` INT)   DELETE from usuarios where id_usuario = idusuario$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_EliminarVenta` (IN `idvnt` INT)   delete from venta WHERE id_venta = idvnt$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_Facturacionnubefact` (IN `idvnt` INT)   SELECT p.CodigoProd,p.DescripcionProd,dv.cantidad,p.PrecioVenta as valor_unitario,ROUND((p.PrecioVenta*0.18+p.PrecioVenta),2) AS precio_unitario, ROUND((p.PrecioVenta*dv.cantidad),2) as subtotal, ROUND((p.PrecioVenta*dv.cantidad)*0.18,2) as igv, ROUND(((p.PrecioVenta*0.18+p.PrecioVenta)*dv.cantidad),2) as total from producto p INNER JOIN detalle_venta dv on dv.id_prod=p.id_prod INNER JOIN venta v on v.id_venta=dv.id_venta WHERE v.id_venta=idvnt$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_GraficoClientesMes` ()   SELECT descripcion, IFNULL(T1.cantidad, 0) AS cantidad
FROM meses
LEFT JOIN
(SELECT MONTH(fecha_registro) AS Mes,
COUNT(MONTH(fecha_registro)) AS cantidad
 FROM cliente WHERE YEAR(fecha_registro)=YEAR(NOW())
GROUP BY (MONTH(fecha_registro))) T1 ON T1.mes = meses.mes$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_GraficoProductosVendidos` ()   SELECT  SUM(dv.cantidad) as Cantidad,p.DescripcionProd as nombre
FROM producto p 
INNER JOIN detalle_venta dv on p.id_prod = dv.id_prod 
INNER JOIN venta v ON  dv.id_venta = v.id_venta
WHERE  v.estado='vendido' AND YEAR(v.fecha_registro)=YEAR(NOW())
GROUP BY p.id_prod
ORDER BY Cantidad$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_GraficoVentasMes` ()   SELECT descripcion, IFNULL(T1.total, 0) AS cantidad
FROM meses
LEFT JOIN
(SELECT MONTH(ov.fecha_registro) as mes,ROUND(SUM((p.PrecioVenta*dv.cantidad)+((p.PrecioVenta*dv.cantidad)*0.18)),2) as total FROM venta ov INNER JOIN detalle_venta dv ON ov.id_venta = dv.id_venta INNER join producto p on dv.id_prod=p.id_prod
WHERE YEAR(ov.fecha_registro)=YEAR(NOW()) and ov.estado='vendido'
GROUP BY (MONTH(fecha_registro))) T1 ON T1.mes = meses.mes$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ListarCargos` ()   SELECT * from cargos$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ListarCategorias` ()   SELECT * FROM categoria$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ListarCategoriaxID` (IN `cat` INT)   SELECT * FROM categoria WHERE CodigoCat = cat$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ListarCliente` ()   select * from cliente$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ListarColores` ()   SELECT * FROM colores$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ListarColorxID` (IN `idcolor` INT)   SELECT * FROM colores WHERE id_color = idcolor$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ListardetalleVenta` (IN `idventa` INT)   select dv.id_dventa,p.DescripcionProd,p.PrecioVenta,dv.cantidad,(p.PrecioVenta*dv.cantidad) as monto from detalle_venta dv inner join producto p on p.id_prod = dv.id_prod where dv.id_venta=idventa$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ListarEmpleados` ()   SELECT * FROM empleado$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ListarMarcas` ()   SELECT * FROM marcas$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ListarMarcaxID` (IN `idmarca` INT)   SELECT * FROM marcas WHERE id_marca = idmarca$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ListarMontosDVenta` (IN `idvnt` INT)   SELECT sum(p.PrecioVenta*dv.cantidad) as subtotal,round(sum(p.PrecioVenta*dv.cantidad)*0.18,2) as igv,sum(p.PrecioVenta*dv.cantidad)+round(sum(p.PrecioVenta*dv.cantidad)*0.18,2) as total FROM detalle_venta dv inner join producto p on p.id_prod = dv.id_prod WHERE dv.id_venta = idvnt$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ListarProductos` ()   SELECT p.id_prod,p.CodigoProd,p.DescripcionProd,m.descripcion as desmar,p.Modelo,c.Descripcion as descat,cl.nombre_color,p.PrecioCompra,p.porcentaje,p.PrecioVenta,p.Imagen,p.Stock,p.Estado FROM producto p INNER JOIN categoria c on p.CodigoCat=c.CodigoCat INNER JOIN colores cl on p.idColor=cl.id_color INNER JOIN marcas m on p.idmarca=m.id_marca$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ListarProveedor` ()   SELECT * FROM proveedor$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ListarUsuarios` ()   SELECT u.id_usuario,e.nombres_trab,c.descripcion,u.correo_usuario,u.fecha_registro FROM `usuarios` u inner join empleado e on u.id_empleado=e.id_trabajador inner join cargos c on u.id_cargo=c.id_cargo$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_Listarventas` ()   SELECT v.id_venta,v.codigo,c.NombreCompleto as cliente,v.responsable,v.fecha_registro,v.estado FROM venta v inner join cliente c ON v.id_cliente=c.NIT WHERE v.estado="sin detalle" OR v.estado ="con detalle"$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ListarventasEfectuadas` ()   SELECT v.id_venta,v.codigo,c.NombreCompleto as cliente,v.responsable,v.fecha_registro,v.estado,v.tipo_compro,rn.rutafact FROM venta v inner join cliente c ON v.id_cliente=c.NIT INNER JOIN registronubefact rn on rn.id_venta=v.id_venta WHERE v.estado="vendido"$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_Login` (IN `usu` VARCHAR(300) CHARSET utf8, IN `contra` VARCHAR(500) CHARSET utf8)   SELECT e.nombres_trab FROM usuarios u inner join empleado e on u.id_empleado = e.id_trabajador inner join cargos c on u.id_cargo=c.id_cargo WHERE correo_usuario=usu and contrasena=contra$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_MostrarClienteVenta` (IN `IDVENT` INT)   SELECT v.id_venta,v.id_cliente,c.NombreCompleto as cliente,v.tipo_compro FROM venta v inner join cliente c ON v.id_cliente=c.NIT WHERE v.id_venta=IDVENT$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_MostrarCodigoProd` ()   select id_prod,CodigoProd, DescripcionProd from producto$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_MostrarProductoxId` (IN `idprod` INT)   select * from producto WHERE id_prod=idprod$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_obtenerdatos` (IN `usu` VARCHAR(300) CHARSET utf8, IN `contra` VARCHAR(500) CHARSET utf8)   SELECT e.nombres_trab,c.descripcion FROM usuarios u inner join empleado e on u.id_empleado = e.id_trabajador inner join cargos c on u.id_cargo=c.id_cargo WHERE correo_usuario=usu and contrasena=contra$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_Registrarcategoria` (IN `descrip` VARCHAR(200) CHARSET utf8)   INSERT INTO `categoria` (`Descripcion`) VALUES ( descrip)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_Registrarcliente` (IN `NIT` VARCHAR(30) CHARSET utf8, IN `NombreCompleto` VARCHAR(70) CHARSET utf8, IN `Direccion` VARCHAR(200) CHARSET utf8, IN `Telefono` VARCHAR(20) CHARSET utf8, IN `Email` VARCHAR(30) CHARSET utf8)   INSERT INTO `cliente` (`NIT`, `NombreCompleto`, `Direccion`, `Telefono`, `Email`) VALUES (NIT, NombreCompleto, Direccion, Telefono, Email)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_Registrarcolor` (IN `nombrecolor` VARCHAR(200) CHARSET utf8)   INSERT INTO `colores` (`nombre_color`) VALUES ( nombrecolor)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_RegistrarDetalleVenta` (IN `idvnt` INT, IN `idprod` INT, IN `canti` INT)   insert into detalle_venta (id_venta,id_prod,cantidad) VALUES (idvnt,idprod,canti)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_Registrarempleado` (IN `nombres` VARCHAR(80) CHARSET utf8, IN `direccion` TEXT CHARSET utf8, IN `correo` VARCHAR(45) CHARSET utf8, IN `telefono` VARCHAR(9) CHARSET utf8, IN `tipo_documento` VARCHAR(30) CHARSET utf8, IN `nro_documento` VARCHAR(20) CHARSET utf8, IN `estado` VARCHAR(50) CHARSET utf8, IN `iniciolab` DATE, IN `ipocontrat` VARCHAR(100) CHARSET utf8)   INSERT INTO `empleado` (`nombres_trab`, `direccion_trab`, `correo_trab`, `telefono_trab`, `tipo_documento`, `numero_documento`, `estado`, `inicio_lab`, `tipo_contrato`) VALUES (nombres, direccion, correo, telefono, tipo_documento, nro_documento, estado, iniciolab, ipocontrat)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_Registrarmarca` (IN `descrip` VARCHAR(200) CHARSET utf8)   INSERT INTO `marcas` (`descripcion`) VALUES ( descrip)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_RegistrarProductos` (IN `descripcion` TEXT CHARSET utf8, IN `codigocat` VARCHAR(200) CHARSET utf8, IN `precioC` DECIMAL(10,2), IN `porcenprod` INT, IN `precioV` DECIMAL(10,2), IN `model` VARCHAR(500), IN `idmar` INT, IN `idcol` INT, IN `stockpro` INT, IN `imagenprod` TEXT CHARSET utf8)   INSERT INTO `producto` ( `DescripcionProd`, `CodigoCat`, `PrecioCompra`, `porcentaje`, `PrecioVenta`, `Modelo`, `idmarca`, `idColor`, `Stock`, `Imagen`) VALUES (descripcion, codigocat, precioC, porcenprod, precioV, model, idmar, idcol, stockpro, imagenprod)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_Registrarproveedor` (IN `NITProveedor` VARCHAR(30) CHARSET utf8, IN `NombreProveedor` VARCHAR(30) CHARSET utf8, IN `Direccion` VARCHAR(200) CHARSET utf8, IN `Telefono` VARCHAR(20) CHARSET utf8, IN `PaginaWeb` VARCHAR(30) CHARSET utf8, IN `Estado` VARCHAR(20) CHARSET utf8)   INSERT INTO `proveedor` (`NITProveedor`, `NombreProveedor`, `Direccion`, `Telefono`, `PaginaWeb`,`Estado`) VALUES (NITProveedor, NombreProveedor, Direccion, Telefono, PaginaWeb,Estado)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_RegistrarUsuario` (IN `idemp` INT, IN `idcargo` INT, IN `correo` VARCHAR(300) CHARSET utf8, IN `contra` VARCHAR(300) CHARSET utf8)   INSERT INTO `usuarios` (`id_empleado`,`id_cargo`,`correo_usuario`, `contrasena`) VALUES (idemp,idcargo,correo, contra)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_RegistraRutaNubefact` (IN `idvnt` INT, IN `ruta` TEXT CHARSET utf8)   INSERT INTO registronubefact(id_venta,rutafact) values ( idvnt, ruta)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_RegistrarVentas` (IN `idcli` VARCHAR(30) CHARSET utf8, IN `respo` VARCHAR(200) CHARSET utf8)   INSERT INTO venta (id_cliente,responsable) values (idcli,respo)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ReingresarEmpleado` (IN `id_emple` INT)   UPDATE empleado SET estado='activo' WHERE id_trabajador =id_emple$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ValEliminarCategoriaxID` (IN `cocat` INT)   SELECT * FROM categoria c INNER JOIN producto p ON p.CodigoCat=c.CodigoCat WHERE c.CodigoCat=cocat$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ValEliminarColorxID` (IN `color` INT)   SELECT * FROM colores c INNER JOIN producto p ON p.idColor=c.id_color WHERE c.id_color=color$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_ValEliminarMarcaxID` (IN `idmar` INT)   SELECT * FROM marcas m INNER JOIN producto p ON p.idmarca=m.id_marca WHERE m.id_marca=idmar$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_VerificarExistenciaDetalleVenta` (IN `idvnt` INT, IN `idpro` INT)   SELECT * FROM `detalle_venta` WHERE id_venta=idvnt and id_prod=idpro$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargos`
--

CREATE TABLE `cargos` (
  `id_cargo` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cargos`
--

INSERT INTO `cargos` (`id_cargo`, `descripcion`) VALUES
(1, 'administrador'),
(2, 'ventas'),
(3, 'almacen');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `CodigoCat` int(11) NOT NULL,
  `Descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`CodigoCat`, `Descripcion`) VALUES
(1, 'muebles');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `NIT` varchar(30) NOT NULL,
  `NombreCompleto` varchar(70) NOT NULL,
  `Direccion` text NOT NULL,
  `Telefono` varchar(20) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `fecha_registro` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`NIT`, `NombreCompleto`, `Direccion`, `Telefono`, `Email`, `fecha_registro`) VALUES
('10345678919', 'juan carlos', 'ate', '944634347', 'jcmlmph@gmail.com', '2022-01-28 10:46:34'),
('20100070970', 'SUPERMERCADOS PERUANOS SOCIEDAD ANONIMA \'O \' S.P.S.A.', 'CAL. MORELLI NRO. 181 INT. P-2 - LIMA LIMA SAN BORJA', '965874584', 'angel@gmail.com', '2022-01-30 20:53:45'),
('48325484', 'jose', 'ate2', '965895844', 'jose@gmail.com', '2022-01-28 10:46:34'),
('85225834', 'jose diasaa', 'la molinaaa', '524415833', 'tensin@gmail.com', '2022-01-28 10:46:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colores`
--

CREATE TABLE `colores` (
  `id_color` int(11) NOT NULL,
  `nombre_color` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `colores`
--

INSERT INTO `colores` (`id_color`, `nombre_color`) VALUES
(1, 'azul');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_empresa`
--

CREATE TABLE `datos_empresa` (
  `ID_DE` int(11) NOT NULL,
  `razonsocial` varchar(200) NOT NULL,
  `ruc` varchar(11) NOT NULL,
  `telefono` varchar(11) NOT NULL,
  `correo` varchar(70) NOT NULL,
  `paginaweb` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_factura_compra`
--

CREATE TABLE `detalle_factura_compra` (
  `id` int(11) NOT NULL,
  `idfactura` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_uni` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `estado` varchar(30) NOT NULL DEFAULT 'pendiente',
  `fecha_almacenado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_factura_compra`
--

INSERT INTO `detalle_factura_compra` (`id`, `idfactura`, `idproducto`, `cantidad`, `precio_uni`, `total`, `estado`, `fecha_almacenado`) VALUES
(1, 9, 1, 2, '2.00', '4.00', 'almacenado', '2022-01-24 13:17:28'),
(2, 11, 2, 2, '63.00', '126.00', 'almacenado', '2022-01-24 13:20:44'),
(3, 12, 1, 1, '63.00', '63.00', 'almacenado', '2022-01-24 13:30:37'),
(4, 13, 1, 2, '42.00', '84.00', 'almacenado', '2022-01-24 13:32:34'),
(6, 14, 1, 1, '40.00', '40.00', 'almacenado', '2022-01-24 13:57:29'),
(8, 15, 1, 2, '20.00', '40.00', 'almacenado', '2022-01-24 14:30:19');

--
-- Disparadores `detalle_factura_compra`
--
DELIMITER $$
CREATE TRIGGER `tg_almacenarprodetallefaccompra` BEFORE UPDATE ON `detalle_factura_compra` FOR EACH ROW BEGIN
IF new.estado = 'almacenado'AND old.estado='pendiente' THEN BEGIN
UPDATE producto p INNER JOIN detalle_factura_compra d ON p.id_prod=new.idproducto INNER JOIN factura_compra fc ON fc.idfac=new.idfactura
SET p.Stock = p.Stock + d.cantidad
WHERE fc.idfac=d.idfactura;
END;
END IF;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `id_dventa` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `id_prod` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_venta`
--

INSERT INTO `detalle_venta` (`id_dventa`, `id_venta`, `id_prod`, `cantidad`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 1),
(3, 3, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id_trabajador` int(11) NOT NULL,
  `cod_trab` varchar(30) DEFAULT NULL,
  `nombres_trab` varchar(80) CHARACTER SET latin1 NOT NULL,
  `direccion_trab` text CHARACTER SET latin1 NOT NULL,
  `correo_trab` varchar(45) CHARACTER SET latin1 NOT NULL,
  `telefono_trab` varchar(12) CHARACTER SET latin1 DEFAULT NULL,
  `tipo_documento` varchar(30) CHARACTER SET utf8mb4 NOT NULL,
  `numero_documento` varchar(20) CHARACTER SET armscii8 NOT NULL,
  `fecha_registro` datetime NOT NULL DEFAULT current_timestamp(),
  `estado` varchar(50) NOT NULL,
  `inicio_lab` date NOT NULL,
  `tipo_contrato` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id_trabajador`, `cod_trab`, `nombres_trab`, `direccion_trab`, `correo_trab`, `telefono_trab`, `tipo_documento`, `numero_documento`, `fecha_registro`, `estado`, `inicio_lab`, `tipo_contrato`) VALUES
(7, 'TB00007', 'JUAN CARLOS MESTANZA LÓPEZ', 'ATE', 'jcml@gmail.com', '999999999', 'DNI', '48326459', '2021-12-30 19:32:00', 'activo', '2021-12-16', 'fijo'),
(8, 'TB00008', 'ALBERTO', 'ATE', 'jose@gmail.com', '999999998', 'DNI', '48326457', '2022-01-28 00:03:37', 'activo', '2022-01-19', 'fijo');

--
-- Disparadores `empleado`
--
DELIMITER $$
CREATE TRIGGER `tg_TRABAJADOR_insert` BEFORE INSERT ON `empleado` FOR EACH ROW BEGIN 
SET @idd:= (SELECT `AUTO_INCREMENT` FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA='bd_muebleland' AND TABLE_NAME = 'empleado');
SET NEW.cod_trab=CONCAT('TB', LPAD(@idd, 5, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura_compra`
--

CREATE TABLE `factura_compra` (
  `idfac` int(11) NOT NULL,
  `idprov` varchar(30) NOT NULL,
  `tipo_comp` varchar(20) NOT NULL,
  `codigofac` varchar(30) NOT NULL,
  `fechaemision` date NOT NULL,
  `fechavencimiento` date NOT NULL,
  `cod_orcompra` varchar(30) NOT NULL,
  `condicion_pago` varchar(60) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `estado_fac` varchar(20) NOT NULL DEFAULT 'Sin Productos',
  `estado_nocre` varchar(20) DEFAULT NULL,
  `estado_nodeb` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id_marca` int(11) NOT NULL,
  `descripcion` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id_marca`, `descripcion`) VALUES
(1, 'sillonesa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `meses`
--

CREATE TABLE `meses` (
  `id_mes` int(11) NOT NULL,
  `mes` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `meses`
--

INSERT INTO `meses` (`id_mes`, `mes`, `descripcion`) VALUES
(1, 1, 'Enero'),
(2, 2, 'Febrero'),
(3, 3, 'Marzo'),
(4, 4, 'Abril'),
(5, 5, 'Mayo'),
(6, 6, 'Junio'),
(7, 7, 'Julio'),
(8, 8, 'Agosto'),
(9, 9, 'Septiembre'),
(10, 10, 'Octubre'),
(11, 11, 'Noviembre'),
(12, 12, 'Diciembre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_prod` int(20) NOT NULL,
  `CodigoProd` varchar(30) DEFAULT NULL,
  `DescripcionProd` text NOT NULL,
  `CodigoCat` int(11) NOT NULL,
  `PrecioCompra` decimal(30,2) NOT NULL,
  `porcentaje` int(11) NOT NULL,
  `PrecioVenta` decimal(30,2) NOT NULL,
  `Modelo` varchar(30) NOT NULL,
  `idmarca` int(11) NOT NULL,
  `idColor` int(11) NOT NULL,
  `Stock` int(20) NOT NULL,
  `Imagen` varchar(150) NOT NULL,
  `Estado` varchar(15) NOT NULL DEFAULT 'Disponible'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_prod`, `CodigoProd`, `DescripcionProd`, `CodigoCat`, `PrecioCompra`, `porcentaje`, `PrecioVenta`, `Modelo`, `idmarca`, `idColor`, `Stock`, `Imagen`, `Estado`) VALUES
(1, 'P00001', 'Seccional Intercambiable Bombai', 1, '12.00', 2, '12.24', 'convertible cama', 1, 1, 196, 'Captura de pantalla 2021-12-27 184203.png', 'Disponible'),
(2, 'P00002', 'sillas', 1, '12.00', 12, '13.44', 'reclinable', 1, 1, 193, 'Captura de pantalla 2021-12-27 211904.png', 'Disponible');

--
-- Disparadores `producto`
--
DELIMITER $$
CREATE TRIGGER `TG_PRODUCTO` BEFORE INSERT ON `producto` FOR EACH ROW BEGIN 
SET @idd:= (SELECT `AUTO_INCREMENT` FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA='bd_muebleland' AND TABLE_NAME = 'producto');
SET NEW.CodigoProd=CONCAT('P', LPAD(@idd, 5, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `NITProveedor` varchar(30) NOT NULL,
  `NombreProveedor` varchar(30) NOT NULL,
  `Direccion` varchar(200) NOT NULL,
  `Telefono` varchar(20) NOT NULL,
  `PaginaWeb` varchar(30) NOT NULL,
  `Estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`NITProveedor`, `NombreProveedor`, `Direccion`, `Telefono`, `PaginaWeb`, `Estado`) VALUES
('54741214125', 'awd', 'awd', '965874584', '', 'ACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registronubefact`
--

CREATE TABLE `registronubefact` (
  `id` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `rutafact` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `registronubefact`
--

INSERT INTO `registronubefact` (`id`, `id_venta`, `rutafact`) VALUES
(1, 1, 'https://www.nubefact.com/cpe/92d5c815-5db8-45ac-a605-2d98bcd25ba1'),
(2, 2, 'https://www.nubefact.com/cpe/e16520a6-e929-44db-99aa-b2cb82eff940'),
(3, 3, 'https://www.nubefact.com/cpe/bf6623c7-aacf-4fd8-ad25-b122db30fe80');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `id_cargo` int(11) NOT NULL,
  `correo_usuario` varchar(300) NOT NULL,
  `contrasena` varchar(500) NOT NULL,
  `fecha_registro` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `id_empleado`, `id_cargo`, `correo_usuario`, `contrasena`, `fecha_registro`) VALUES
(7, 8, 2, 'A20100408@idat.edu.pe', 'WU53QUV4cHUvU0l3c3JHYVBTNmluZz09', '2022-01-28 12:07:53'),
(8, 7, 1, 'jcml@gmail.com', 'M0wyclVRTWVJNVVtU2dNWFEzT0ZpZz09', '2022-01-28 12:54:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id_venta` int(11) NOT NULL,
  `codigo` varchar(100) NOT NULL,
  `id_cliente` varchar(11) NOT NULL,
  `responsable` varchar(200) NOT NULL,
  `fecha_registro` datetime NOT NULL DEFAULT current_timestamp(),
  `tipo_compro` varchar(30) NOT NULL,
  `estado` varchar(100) NOT NULL DEFAULT 'sin detalle'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`id_venta`, `codigo`, `id_cliente`, `responsable`, `fecha_registro`, `tipo_compro`, `estado`) VALUES
(1, 'VT00001', '10345678919', 'JUAN CARLOS MESTANZA LÓPEZ', '2022-01-30 19:45:40', '', 'vendido'),
(2, 'VT00002', '20100070970', 'JUAN CARLOS MESTANZA LÓPEZ', '2022-01-30 21:03:38', '', 'vendido'),
(3, 'VT00003', '20100070970', 'JUAN CARLOS MESTANZA LÓPEZ', '2022-01-30 21:04:25', 'Factura', 'vendido'),
(4, 'VT00004', '10345678919', 'JUAN CARLOS MESTANZA LÓPEZ', '2022-04-23 17:57:44', '', 'sin detalle');

--
-- Disparadores `venta`
--
DELIMITER $$
CREATE TRIGGER `TG_DescuentoProd` BEFORE UPDATE ON `venta` FOR EACH ROW BEGIN
	IF new.estado = 'vendido' THEN BEGIN
UPDATE producto p INNER JOIN detalle_venta d ON p.id_prod=d.id_prod INNER JOIN venta o ON new.id_venta = d.id_venta 
SET p.Stock = p.Stock - d.cantidad
WHERE o.id_venta=d.id_venta;
END;
END IF;


END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TG_ventas` BEFORE INSERT ON `venta` FOR EACH ROW BEGIN 
SET @idd:= (SELECT `AUTO_INCREMENT` FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA='bd_muebleland' AND TABLE_NAME = 'venta');
SET NEW.codigo=CONCAT('VT', LPAD(@idd, 5, '0'));
END
$$
DELIMITER ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id_cargo`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`CodigoCat`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`NIT`);

--
-- Indices de la tabla `colores`
--
ALTER TABLE `colores`
  ADD PRIMARY KEY (`id_color`);

--
-- Indices de la tabla `datos_empresa`
--
ALTER TABLE `datos_empresa`
  ADD PRIMARY KEY (`ID_DE`);

--
-- Indices de la tabla `detalle_factura_compra`
--
ALTER TABLE `detalle_factura_compra`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD PRIMARY KEY (`id_dventa`),
  ADD KEY `id_venta` (`id_venta`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id_trabajador`);

--
-- Indices de la tabla `factura_compra`
--
ALTER TABLE `factura_compra`
  ADD PRIMARY KEY (`idfac`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indices de la tabla `meses`
--
ALTER TABLE `meses`
  ADD PRIMARY KEY (`id_mes`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_prod`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`NITProveedor`);

--
-- Indices de la tabla `registronubefact`
--
ALTER TABLE `registronubefact`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_empleado` (`id_empleado`,`id_cargo`),
  ADD KEY `id_cargo` (`id_cargo`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id_venta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id_cargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `CodigoCat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `colores`
--
ALTER TABLE `colores`
  MODIFY `id_color` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `datos_empresa`
--
ALTER TABLE `datos_empresa`
  MODIFY `ID_DE` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_factura_compra`
--
ALTER TABLE `detalle_factura_compra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  MODIFY `id_dventa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id_trabajador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `factura_compra`
--
ALTER TABLE `factura_compra`
  MODIFY `idfac` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `meses`
--
ALTER TABLE `meses`
  MODIFY `id_mes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_prod` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `registronubefact`
--
ALTER TABLE `registronubefact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD CONSTRAINT `detalle_venta_ibfk_1` FOREIGN KEY (`id_venta`) REFERENCES `venta` (`id_venta`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id_trabajador`),
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`id_cargo`) REFERENCES `cargos` (`id_cargo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
