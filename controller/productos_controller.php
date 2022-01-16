<?php

class productoscontroller
{

    static public function ctrListarProductos()
    {
        $respuesta = productomodelo::mdlListarProducto();
        return $respuesta;
    }

    static public function ctrRegistrarProductos($datos)
    {
        $respuesta = productomodelo::mdlRegistrarProducto($datos);
        return $respuesta;
    }

    static public function ctrMostrarProductop_x_ID($id_prod)
    {
        $respuesta = productomodelo::mdlMostrarProducto_x_ID($id_prod);
        return $respuesta;
    }
    static public function ctrActualizarProducto($datos)
    {
        $respuesta = productomodelo::mdlActualizarProductos($datos);
        return $respuesta;
    }
    
    static public function ctrEliminarProducto_x_ID($id_prod)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM detalle_venta dv inner join producto p on dv.id_prod=p.id_prod  WHERE p.id_prod='$id_prod';");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_OBJ);

        if(!empty($result)){
            return "existen";
        }
        $respuesta = productomodelo::mdlEliminarProducto_x_ID($id_prod);
        return $respuesta;
        if ($respuesta == true) {
            return "ok";
        } else {
            return "error";
        }
        $respuesta->close();
        $respuesta = null;
    }

    /* Controlador listado categoria producto */
    static public function ctrListarCategoriaProductos()
    {
        $respuesta = productomodelo::mdlListarCategoriaProducto();
        return $respuesta;
    }
    static public function ctrListarColoresProductos()
    {
        $respuesta = productomodelo::mdlListarColorProducto();
        return $respuesta;
    }
    static public function ctrListarMarcasProductos()
    {
        $respuesta = productomodelo::mdlListarMarcasProducto();
        return $respuesta;
    }
}