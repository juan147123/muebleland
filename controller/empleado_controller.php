<?php

class empleadoscontroller{

    static public function ctrListarEmpleados()
    {
        $response = empleadomodelo::mdlListarEmpleado();
        return $response;
    }

    static public function ctrRegistrarEmpleado($datos)
    {
        $respuesta = empleadomodelo::mdlRegistrarEmpleado($datos);
        return $respuesta;
    }
    static public function ctrMostrarEmpleado_x_ID($id_trabajador)
    {
        $respuesta = empleadomodelo::mdlMostrarEmpleado_x_ID($id_trabajador);
        return $respuesta;
    }
    static public function ctrActualizarEmpleado($datos){
        $respuesta = empleadomodelo::mdlActualizarEmpleado($datos);
        return $respuesta;
    }
    static public function  ctrReingresarEmpleado($id_usuario)
    {
        $respuesta = empleadomodelo::mdlReingresarEmpleado($id_usuario);
        return $respuesta;
    }
    static public function ctrEliminarEmpleado_x_ID($id_trabajador){
        $respuesta = empleadomodelo::mdleliminarEmpleado_x_ID($id_trabajador);
        return $respuesta;
        if ($respuesta == true) {
            return "ok";
        } else {
            return "error";
        }
    }
}