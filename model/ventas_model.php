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
        $stmt = Conexion::conectar()->prepare("CALL 	SP_EliminarDetalleVentaxID($id_dventa);");
        $stmt->execute();
        if ($stmt = true) {
            return "ok";
        } else {
            return "error";
        }
    }
}
