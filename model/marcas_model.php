<?php

require_once 'conexion.php';

class marcasmodelo
{
    public static  function mdlListarTablaMarcas()
    {

        $stmt = Conexion::conectar()->prepare("CALL SP_ListarMarcas();");
        $stmt->execute();
        $respuesta = $stmt->fetchAll();
        return $respuesta;


    }

    public static function mdlRegistrarMarca($datos)
    {

        $db = Conexion::conectar();

        $consulta = Conexion::conectar()->prepare("SELECT * FROM marcas WHERE descripcion = ?");
         $consulta->execute([$datos['descripcion']]);
        $result = $consulta->fetch(PDO::FETCH_OBJ);
        if (!empty($result)) {

            return 'repeat';
        } 

        $stmt = $db->prepare("CALL SP_Registrarmarca(?);");
        $respuesta = $stmt->execute([$datos['descripcion']]);

        if ($respuesta == true) {
            return "ok";
        } else {
            return "error";
        }
        $respuesta->close();
        $respuesta = null;
    

    }

    static public function mdlMostrarMarca_x_ID($id_marca)
    {
        $stmt = Conexion::conectar()->prepare("  CALL SP_ListarMarcaxID($id_marca)");
        $stmt->execute();
        $respuesta = $stmt->fetch();
        return $respuesta;
    }
    static public function mdlActualizarMarca($datos)
    {
        $stmt = Conexion::conectar()->prepare("CALL SP_ActualizarMarca(?,?);");
        $stmt->execute([ $datos['descripcion'],$datos['id_marca']]);
        if ($stmt == true) {
            return "ok";
        } else {
            return "error";
        }
    }

    static public function mdlEliminarMarca_x_ID($id_marca)
    {
        $stmt = Conexion::conectar()->prepare("CALL SP_EliminarMarcaxID($id_marca);");
        $stmt->execute();
        if ($stmt = true) {
            return "ok";
        } else {
            return "error";
        }
    }

    

    


}