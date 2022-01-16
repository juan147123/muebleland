<?php

class clientecontroller
{
    static public function ctrListarTablaCliente()
    {
        $respuesta = ClienteModelo::mdlListarTablaCliente();
        return $respuesta;
    }
    static public function ctrRegistrarCliente($datos)
    {
        $respuesta = ClienteModelo::mdlRegistrarCliente($datos);
        return $respuesta;
    }
    static public function ctrMostrarCliente_x_ID($NIT)
    {
        $respuesta = clientemodelo::mdlMostrarCliente_x_ID($NIT);
        return $respuesta;
    }
    static public function ctrActualizarCliente($datos){
        $respuesta = clientemodelo::mdlActualizarCliente($datos);
        return $respuesta;
    }
    static public function ctrEliminarCliente_x_ID($NIT){
        $respuesta = clientemodelo::mdleliminarCliente_x_ID($NIT);
        return $respuesta;
        if ($respuesta == true) {
            return "ok";
        } else {
            return "error";
        }
    }
}