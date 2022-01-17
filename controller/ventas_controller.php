<?php

class ventascontrolador{

    static public function ctrListarTablaventas(){

        $respuesta = ventasmodelo::mdlListarTablaVenta();
        return $respuesta;
    }
    static public function ctrRegistrarVenta($datos)
    {
        $respuesta = ventasmodelo::mdlRegistrarVenta($datos);
        return $respuesta;
    }
    static public function ctrMostrarVentas_x_ID($id_venta)
    {
        $respuesta = ventasmodelo::mdlMostrarVenta_x_ID($id_venta);
        return $respuesta;
    }
    static public function ctrActualizarVenta($datos){
        $respuesta = ventasmodelo::mdlActualizarVenta($datos);
        return $respuesta;
    }
    static public function ctrEliminarVentas_x_ID($id_venta){
        $respuesta = ventasmodelo::mdlEliminarVenta_x_ID($id_venta);
        return $respuesta;
        if ($respuesta == true) {
            return "ok";
        } else {
            return "error";
        }
    }
    /* Detalle Venta */
    static public function ctrMostrarcodigoProd(){

        $respuesta = ventasmodelo::mdlMostrarCodigoprod();
        return $respuesta;
    }
    static public function ctrListarDetalleVenta($id_venta){
        $respuesta = ventasmodelo::mdlListarTablaDetalleVenta($id_venta);
        return $respuesta;
    }
    static public function ctrRegistrarDetalleVenta($datos)
    {
        $respuesta = ventasmodelo::mdlRegistrarDetalleVenta($datos);
        return $respuesta;
    }

    static public function ctrEliminarDetalleVentas_x_ID($id_dventa){
        $respuesta = ventasmodelo::mdlEliminarDetalleVenta_x_ID($id_dventa);
        return $respuesta;
        if ($respuesta == true) {
            return "ok";
        } else {
            return "error";
        }
    }
}