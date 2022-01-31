<?php

require_once 'conexion.php';

class usuariomodelo{
    static public function mdlListarUsuario(){
        $sql = Conexion::conectar()->prepare("CALL SP_ListarUsuarios();");
        $sql->execute();
        $response = $sql->fetchAll();
        return $response;
    }
    static public function mdlListarCargos(){
        $sql = Conexion::conectar()->prepare("CALL SP_ListarCargos();");
        $sql->execute();
        $response = $sql->fetchAll();
        return $response;
    }

    public static function mdlRegistrarUsuario($datos)
    {

        $db = Conexion::conectar();

        $consulta = Conexion::conectar()->prepare("SELECT * FROM usuarios WHERE correo_usuario = ?");
         $consulta->execute([$datos['correo_usuario']]);
        $result = $consulta->fetch(PDO::FETCH_OBJ);
        if (!empty($result)) {
            return 'repeat';
        } 

        $stmt = $db->prepare("CALL SP_RegistrarUsuario(?,?,?,?);");
        $respuesta = $stmt->execute([$datos['id_empleado'],$datos['id_cargo'],$datos['correo_usuario'],$datos['contrasena']]);

        if ($respuesta == true) {
            return "ok";
        } else {
            return "error";
        }
        $respuesta->close();
        $respuesta = null;
    

    }

    static public function mdlEliminarUsuario_x_ID($id_usuario)
    {
        $stmt = Conexion::conectar()->prepare("CALL SP_EliminarUsuarioxID($id_usuario);");
        $stmt->execute();
        if ($stmt = true) {
            return "ok";
        } else {
            return "error";
        }
    }

}