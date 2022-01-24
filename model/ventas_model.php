<?php

require_once 'conexion.php';

class ventasmodelo
{
    public static  function mdlListarTablaVenta()
    {

        $stmt = Conexion::conectar()->prepare("CALL SP_Listarventas();");
        $stmt->execute();
        $respuesta = $stmt->fetchAll();
        return $respuesta;
    }

    public static function mdlRegistrarVenta($datos)
    {

        $stmt = Conexion::conectar()->prepare("CALL SP_RegistrarVentas(?,?);");
        $respuesta = $stmt->execute([$datos['id_cliente'], $datos['responsable']]);

        if ($respuesta == true) {
            return "ok";
        } else {
            return "error";
        }
        $respuesta->close();
        $respuesta = null;
    }

    static public function mdlMostrarVenta_x_ID($id_venta)
    {
        $stmt = Conexion::conectar()->prepare("CALL SP_MostrarClienteVenta($id_venta)");
        $stmt->execute();
        $respuesta = $stmt->fetch();
        return $respuesta;
    }
    static public function mdlActualizarVenta($datos)
    {
        $stmt = Conexion::conectar()->prepare("CALL SP_ActualizarVenta(?,?);");
        $stmt->execute([$datos['id_cliente'], $datos['id_venta']]);
        if ($stmt == true) {
            return "ok";
        } else {
            return "error";
        }
    }

    static public function mdlEliminarVenta_x_ID($id_venta)
    {
        $stmt = Conexion::conectar()->prepare("CALL SP_EliminarVenta($id_venta);");
        $stmt->execute();
        if ($stmt = true) {
            return "ok";
        } else {
            return "error";
        }
    }
    /* Detalle venta */
    public static  function mdlMostrarCodigoprod()
    {

        $stmt = Conexion::conectar()->prepare("CALL SP_MostrarCodigoProd();");
        $stmt->execute();
        $respuesta = $stmt->fetchAll();
        return $respuesta;
    }

    public static  function mdlListarTablaDetalleVenta($id_venta)
    {

        $stmt = Conexion::conectar()->prepare("CALL SP_ListardetalleVenta($id_venta);");
        $stmt->execute();
        $respuesta = $stmt->fetchAll();
        return $respuesta;
    }

    public static function mdlRegistrarDetalleVenta($datos)
    {
        $stmt = Conexion::conectar()->prepare("CALL `SP_VerificarExistenciaDetalleVenta`(?, ?)");
        $stmt->execute([$datos['id_venta'], $datos['id_prod']]);
        $result = $stmt->fetch(PDO::FETCH_OBJ);

        if (!empty($result)) {
            return "existen";
        }

        $stmt = Conexion::conectar()->prepare("CALL SP_RegistrarDetalleVenta(?,?,?);");
        $respuesta = $stmt->execute([$datos['id_venta'], $datos['id_prod'], $datos['cantidad']]);

        if ($respuesta == true) {
            return "ok";
        } else {
            return "error";
        }
        $respuesta->close();
        $respuesta = null;
    }
    static public function mdlEliminarDetalleVenta_x_ID($id_dventa)
    {
        $stmt = Conexion::conectar()->prepare("CALL SP_EliminarDetalleVentaxID($id_dventa);");
        $stmt->execute();
        if ($stmt = true) {
            return "ok";
        } else {
            return "error";
        }
    }

    public static  function mdlListarMontosDetalleVenta($id_venta)
    {
        $stmt = Conexion::conectar()->prepare("CALL SP_ListarMontosDVenta($id_venta)");
        $stmt->execute();
        $respuesta = $stmt->fetch();
        return $respuesta;
    }

    static public function mdlEliminarTodoDetalleVenta_x_ID($id_dventa)
    {
        $stmt = Conexion::conectar()->prepare("CALL SP_ListardetalleVenta($id_dventa)");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_OBJ);

        if (!empty($result)) {
            $stmt = Conexion::conectar()->prepare("CALL SP_EliminarTodoDetalleVxID($id_dventa);");
            $stmt->execute();
            if ($stmt = true) {
                $stmt = Conexion::conectar()->prepare("CALL SP_ActualizarestadoSDventa($id_dventa)");
                $stmt->execute();
                $stmt1 = Conexion::conectar()->prepare("CALL SP_ActualizarTipocomprovacio($id_dventa)");
                $stmt1->execute();
                return "ok";
            } else {
                return "error";
            }
        } else {
            return "vacio";
        }
    }

    static public function mdlActualizarEstadoVentaConDetalle($id_venta)
    {
        $stmt = Conexion::conectar()->prepare("CALL SP_ListardetalleVenta($id_venta)");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_OBJ);

        if (!empty($result)) {

            $stmt = Conexion::conectar()->prepare("CALL SP_ActualizarEstadoCDventa($id_venta);");
            $stmt->execute();
            if ($stmt == true) {
                return "ok";
            } else {
                return "error";
            }
        } else {
            return "vacio";
        }
    }
    static public function mdlActualizarEstadoTipoCompro($datos)
    {
        $stmt = Conexion::conectar()->prepare("CALL SP_ActualizarComprobante(?,?);");
        $stmt->execute([$datos['tipo_compro'], $datos['id_venta']]);
        if ($stmt == true) {
            return "ok";
        } else {
            return "error";
        }
    }

    static public function mdlActualizarEstadoVentaVendido($id_venta)
    {
        $stmt = Conexion::conectar()->prepare("CALL SP_ActualizarEstadoVendido($id_venta);");
        $stmt->execute();
        if ($stmt == true) {
            return "ok";
        } else {
            return "error";
        }
    }

    public static  function mdlListarTablaVentaEfectuada()
    {

        $stmt = Conexion::conectar()->prepare("CALL SP_ListarventasEfectuadas();");
        $stmt->execute();
        $respuesta = $stmt->fetchAll();
        return $respuesta;
    }
    public static function mbslfacturacionnubefact($id_venta)
    {
        $stmt =  Conexion::conectar()->prepare("CALL SP_Facturacionnubefact($id_venta)");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function mdlfacturaciondatoscliente($id_venta)
    {
        $stmt =  Conexion::conectar()->prepare("CALL SP_Datosnubefactclientefacturacion($id_venta)");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function mdlActivateBillStateafterValidateResponse($id_venta, $urlpdf)
    {
        $insertar = Conexion::conectar()->prepare("CALL SP_RegistraRutaNubefact($id_venta,'$urlpdf')");
        $insertar->execute();
        if ($insertar == true) {
            return "ok";
        } else {
            return "error";
        }
    }
}
