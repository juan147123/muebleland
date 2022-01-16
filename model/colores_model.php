<?php

require_once 'conexion.php';

class colormodelo
{
    public static  function mdlListarTablaColor()
    {

        $stmt = Conexion::conectar()->prepare("CALL SP_ListarColores();");
        $stmt->execute();
        $respuesta = $stmt->fetchAll();
        return $respuesta;


    }
    public static function mdlRegistrarColor($datos)
    {

        $db = Conexion::conectar();

        $consulta = Conexion::conectar()->prepare("SELECT * FROM colores WHERE nombre_color = ?");
         $consulta->execute([$datos['nombre_color']]);
        $result = $consulta->fetch(PDO::FETCH_OBJ);
        if (!empty($result)) {

            return 'repeat';
        } 

        $stmt = $db->prepare("CALL SP_Registrarcolor(?);");
        $respuesta = $stmt->execute([$datos['nombre_color']]);

        if ($respuesta == true) {
            return "ok";
        } else {
            return "error";
        }
        $respuesta->close();
        $respuesta = null;
    

    }

    static public function mdlMostrarColor_x_ID($id_color)
    {
        $stmt = Conexion::conectar()->prepare("  CALL SP_ListarColorxID($id_color)");
        $stmt->execute();
        $respuesta = $stmt->fetch();
        return $respuesta;
    }
    static public function mdlActualizarColor($datos)
    {
        $stmt = Conexion::conectar()->prepare("CALL SP_Actualizarcolor(?,?);");
        $stmt->execute([ $datos['nombre_color'],$datos['id_color']]);
        if ($stmt == true) {
            return "ok";
        } else {
            return "error";
        }
    }

    static public function mdlEliminarColor_x_ID($id_color)
    {
        $stmt = Conexion::conectar()->prepare("CALL SP_EliminarColorxID($id_color);");
        $stmt->execute();
        if ($stmt = true) {
            return "ok";
        } else {
            return "error";
        }
    }

    


}