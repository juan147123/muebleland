<?php

class usuariocontrolador{
    public static function ctringresoempleado($correo,$contrasena){
        $response = loginmodelo::mdlingresoempleado($correo,$contrasena);
        return $response;
    }
}