<?php

class proveedorcontroller
{

    static public function ctrRegistrarProveedor($datos)
    {
        $respuesta = proveedormodelo::mdlRegistrarProveedor($datos);
        return $respuesta;
    }

    static public function ctrListarTablaProveedor()
    {
        $respuesta = proveedormodelo::mdlListarTablaProveedor();
        return $respuesta;
    }
    static public function ctrMostrarProveedor_x_ID($NITProveedor)
    {
        $respuesta = proveedormodelo::mdlMostrarProveedor_x_ID($NITProveedor);
        return $respuesta;
    }
    static public function ctrActualizarProveedor($datos)
    {
        $respuesta = proveedormodelo::mdlActualizarProveedor($datos);
        return $respuesta;
    }

    static public function ctrEliminarProveedor_x_ID($NITProveedor)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * from proveedor p inner join factura_compra f on p.NITProveedor=f.idprov WHERE p.NITProveedor=$NITProveedor;");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_OBJ);

        if(!empty($result)){
            return "existen";
        }
        $respuesta = proveedormodelo::mdlEliminarProveedor_x_ID($NITProveedor);
        return $respuesta;
        if ($respuesta == true) {
            return "ok";
        } else {
            return "error";
        }
        $respuesta->close();
        $respuesta = null;
    }
}
