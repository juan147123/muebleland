<?php

class usuariocontrolador{
    public static function ctringresoempleado($correo,$contrasena){
        $response = loginmodelo::mdlingresoempleado($correo,$contrasena);
        return $response;
    }
    public static function ctrobtenercontrasena($correo){
        $response = loginmodelo::obtenercontrasena($correo);
        return $response;
    }
}