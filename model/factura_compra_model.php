<?php

require_once 'conexion.php';

class factura_compra_modelo
{
    public static  function mdlListarTablaFacturaCompra()
    {

        $stmt = Conexion::conectar()->prepare("SELECT fc.*,p.NombreProveedor FROM factura_compra fc 
        INNER JOIN proveedor p ON fc.idprov=p.NITProveedor ORDER BY idfac DESC;");
        $stmt->execute();
        $respuesta = $stmt->fetchAll();
        return $respuesta;
    }
    public static function mdlRegistrarFacturaCompra($datos)
    {

        $db = Conexion::conectar();

        $stmt = $db->prepare("INSERT INTO factura_compra (idprov,tipo_comp,codigofac,fechaemision,fechavencimiento,cod_orcompra,condicion_pago,imagen) VALUES (?,?,?,?,?,?,?,?)");
        $respuesta = $stmt->execute([$datos['idprov'], $datos['tipo_comp'], $datos['codigofac'], $datos['fechaemision'], $datos['fechavencimiento'], $datos['cod_orcompra'], $datos['condicion_pago'], $datos['imagen']]);

        if ($respuesta == true) {
            return "ok";
        } else {
            return "error";
        }
        $respuesta->close();
        $respuesta = null;
    }
    static public function mdlEliminarFacturaCompra_x_ID($idfac)
    {
        $stmt = Conexion::conectar()->prepare("DELETE from factura_compra where idfac ='$idfac'");
        $respuesta = $stmt->execute();

        if ($respuesta == true) {
            return "ok";
        } else {
            return "error";
        }
        $respuesta->close();
        $respuesta = null;
    }



    public static function mdlRegisterDetailFacturaCompra($datos)
    {
        $db = Conexion::conectar();

        $stmt = $db->prepare("INSERT INTO detalle_factura_compra (idfactura,idproducto,cantidad,precio_uni,total) VALUES (?,?,?,?,?)");
        $respuesta = $stmt->execute([$datos['idfactura'], $datos['idproducto'], $datos['cantidad'], $datos['precio_uni'], $datos['total']]);

        if ($respuesta == true) {
            return "ok";
        } else {
            return "error";
        }
        $respuesta->close();
        $respuesta = null;
    }

    public static function mdlListarDetalleFacturaCompra($id)
    {
        $query =  Conexion::conectar()->prepare("SELECT * FROM detalle_factura_compra dfac 
        INNER JOIN producto p ON p.id_prod = dfac.idproducto
        INNER JOIN marcas mp ON mp.id_marca = p.idmarca
        INNER JOIN colores c ON c.id_color = p.idColor
        WHERE dfac.idfactura ='$id'");

        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    static public function mdlActualizarEstadoAlmacenadoDetalleFacturaCompra($id)
    {
        $stmt = Conexion::conectar()->prepare("UPDATE detalle_factura_compra SET estado='almacenado',fecha_almacenado=CURRENT_TIME where id='$id'");
        $respuesta = $stmt->execute();

        if ($respuesta == true) {
            return "ok";
        } else {
            return "error";
        }
        $respuesta->close();
        $respuesta = null;
    }

    static public function mdlVerificarestadoalmacenado($idfac)
    {
        $consulta = Conexion::conectar()->prepare("SELECT * FROM detalle_factura_compra WHERE estado = 'pendiente' AND idfactura='$idfac'");
        $consulta->execute();
        $result = $consulta->fetchAll();
        if (empty($result)) {
            return 'actualizar';
        }else{
            return 'noactualizar';
        }
    }
    static public function mdlActualizarestadoalmacenadocompletofactura($idfac)
    {
        $stmt = Conexion::conectar()->prepare("UPDATE factura_compra SET estado_fac='Almacenado Completo' WHERE idfac='$idfac';");
        $stmt->execute();
        if ($stmt == true) {
            return "ok";
        } else {
            return "error";
        }
    }
    static public function mdlActualizarestadofacturaculminada($idfac)
    {
        $stmt = Conexion::conectar()->prepare("UPDATE factura_compra SET estado_fac='Factura Culminada' WHERE idfac='$idfac';");
        $stmt->execute();
        if ($stmt == true) {
            return "ok";
        } else {
            return "error";
        }
    }
    static public function mdlActualizarestadofacturado($idfac)
    {
        $stmt = Conexion::conectar()->prepare("UPDATE factura_compra SET estado_fac='Facturado' WHERE idfac='$idfac';");
        $stmt->execute();
        if ($stmt == true) {
            return "ok";
        } else {
            return "error";
        }
    }
    static public function mdlMostrarDetalleFacCom_x_ID($id)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM detalle_factura_compra where id ='$id';");
        $stmt->execute();
        $response = $stmt->fetch();
        return $response;
    }

    static public function mdlActualizarDetalleFacCom_x_ID($datos)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE detalle_factura_compra SET precio_uni=?,cantidad=?,total=cantidad*precio_uni WHERE id = ?");
        $stmt->execute([$datos['precio_uni'],$datos['cantidad'],$datos['id']]);
        if ($stmt == true) {
            return "ok";
        } else {
            return "error";
        }
    }
    static public function mdlEliminarDetalleFacturaCompra($id)
    {
        $stmt = Conexion::conectar()->prepare("DELETE from detalle_factura_compra where id ='$id'");
        $respuesta = $stmt->execute();

        if ($respuesta == true) {
            return "ok";
        } else {
            return "error";
        }
        $respuesta->close();
        $respuesta = null;
    }

}
