<?php

class colorcontrolador{

    static public function ctrListarTablaColor(){

        $respuesta = colormodelo::mdlListarTablaColor();
        return $respuesta;
    }
    static public function ctrRegistrarColor($datos)
    {
        $respuesta = colormodelo::mdlRegistrarColor($datos);
        return $respuesta;
    }
    static public function ctrMostrarColor_x_ID($id_color)
    {
        $respuesta = colormodelo::mdlMostrarColor_x_ID($id_color);
        return $respuesta;
    }
    static public function ctrActualizarColor($datos){
        $respuesta = colormodelo::mdlActualizarColor($datos);
        return $respuesta;
    }
    static public function ctrEliminarColor_x_ID($id_color){
        $respuesta = colormodelo::mdleliminarColor_x_ID($id_color);
        return $respuesta;
        if ($respuesta == true) {
            return "ok";
        } else {
            return "error";
        }
    }
}