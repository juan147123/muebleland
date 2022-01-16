<?php

class ventascontrolador{

    static public function ctrListarTablaventas(){

        $respuesta = ventasmodelo::mdlListarTablaVenta();
        return $respuesta;
    }
    static public function ctrRegistrarMarca($datos)
    {
        $respuesta = marcasmodelo::mdlRegistrarMarca($datos);
        return $respuesta;
    }
    static public function ctrMostrarMarca_x_ID($id_marca)
    {
        $respuesta = marcasmodelo::mdlMostrarMarca_x_ID($id_marca);
        return $respuesta;
    }
    static public function ctrActualizarMarca($datos){
        $respuesta = marcasmodelo::mdlActualizarMarca($datos);
        return $respuesta;
    }
    static public function ctrEliminarMarca_x_ID($id_marca){
        $respuesta = marcasmodelo::mdleliminarMarca_x_ID($id_marca);
        return $respuesta;
        if ($respuesta == true) {
            return "ok";
        } else {
            return "error";
        }
    }
}