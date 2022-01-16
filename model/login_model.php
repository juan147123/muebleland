<?php
require_once 'conexion.php';

class loginmodelo{
    static public function mdlingresoempleado($correo,$contrasena){
        $stmt = Conexion::conectar()->prepare("CALL SP_Login ('$correo','$contrasena' )");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_OBJ);

        if(!empty($result)){
            return "ok";
        }
    }
    static public function obtenerdatos($correo,$contrasena){
        $stmt = Conexion::conectar()->prepare("CALL SP_obtenerdatos ('$correo','$contrasena')");
        $stmt->execute();
        return  $stmt->fetch(PDO::FETCH_OBJ);
    }
}