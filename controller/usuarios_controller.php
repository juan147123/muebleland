<?php

class usuarioscontroller{

    static public function ctrListarUsuarios()
    {
        $response = usuariomodelo::mdlListarUsuario();
        return $response;
    }
    static public function ctrListarCargos()
    {
        $response = usuariomodelo::mdlListarCargos();
        return $response;
    }
    static public function ctrRegistrarUsuario($datos)
    {
        $respuesta = usuariomodelo::mdlRegistrarUsuario($datos);
        return $respuesta;
    }
    static public function ctrEliminarUsuario_x_ID($id_usuario){
        $respuesta = usuariomodelo::mdleliminarUsuario_x_ID($id_usuario);
        return $respuesta;
        if ($respuesta == true) {
            return "ok";
        } else {
            return "error";
        }
    }


}