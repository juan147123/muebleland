<?php

class categoriascontrolador{

    static public function ctrListarTablaCategorias(){

        $respuesta = categoriasmodelo::mdlListarTablaCategorias();
        return $respuesta;
    }
    static public function ctrRegistrarCategoria($datos)
    {
        $respuesta = categoriasmodelo::mdlRegistrarCategoria($datos);
        return $respuesta;
    }
    static public function ctrMostrarCategoria_x_ID($CodigoCat)
    {
        $respuesta = categoriasmodelo::mdlMostrarCategoria_x_ID($CodigoCat);
        return $respuesta;
    }
    static public function ctrActualizarCategoria($datos){
        $respuesta = categoriasmodelo::mdlActualizarCategoria($datos);
        return $respuesta;
    }
    static public function ctrEliminarCategoria_x_ID($CodigoCat){
        $respuesta = categoriasmodelo::mdleliminarCategoria_x_ID($CodigoCat);
        return $respuesta;
        if ($respuesta == true) {
            return "ok";
        } else {
            return "error";
        }
    }
}