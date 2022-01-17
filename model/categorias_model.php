<?php

require_once 'conexion.php';

class categoriasmodelo
{
    public static  function mdlListarTablaCategorias()
    {

        $stmt = Conexion::conectar()->prepare("CALL SP_ListarCategorias();");
        $stmt->execute();
        $respuesta = $stmt->fetchAll();
        return $respuesta;


    }

    public static function mdlRegistrarCategoria($datos)
    {

        $db = Conexion::conectar();

        $consulta = Conexion::conectar()->prepare("SELECT * FROM categoria WHERE Descripcion = ?");
         $consulta->execute([$datos['Descripcion']]);
        $result = $consulta->fetch(PDO::FETCH_OBJ);
        if (!empty($result)) {

            return 'repeat';
        } 

        $stmt = $db->prepare("CALL SP_Registrarcategoria(?);");
        $respuesta = $stmt->execute([$datos['Descripcion']]);

        if ($respuesta == true) {
            return "ok";
        } else {
            return "error";
        }
        $respuesta->close();
        $respuesta = null;
    

    }

    static public function mdlMostrarCategoria_x_ID($CodigoCat)
    {
        $stmt = Conexion::conectar()->prepare("  CALL SP_ListarCategoriaxID($CodigoCat)");
        $stmt->execute();
        $respuesta = $stmt->fetch();
        return $respuesta;
    }
    static public function mdlActualizarCategoria($datos)
    {
        $stmt = Conexion::conectar()->prepare("CALL SP_ActualizarCategoria(?,?);");
        $stmt->execute([ $datos['Descripcion'],$datos['CodigoCat']]);
        if ($stmt == true) {
            return "ok";
        } else {
            return "error";
        }
    }

    static public function mdlEliminarCategoria_x_ID($CodigoCat)
    {
        $stmt = Conexion::conectar()->prepare("CALL SP_ValEliminarCategoriaxID($CodigoCat);");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_OBJ);

        if(!empty($result)){
            return "existen";
        }
        $stmt = Conexion::conectar()->prepare("CALL SP_EliminarCategoriaxID($CodigoCat);");
        $stmt->execute();
        if ($stmt = true) {
            return "ok";
        } else {
            return "error";
        }
    }
    

    


}