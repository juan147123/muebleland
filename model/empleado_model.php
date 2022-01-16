<?php

require_once 'conexion.php';

class empleadomodelo{
    static public function mdlListarEmpleado(){
        $sql = Conexion::conectar()->prepare("CALL SP_ListarEmpleados();");
        $sql->execute();
        $response = $sql->fetchAll();
        return $response;
    }

    static public function mdlRegistrarEmpleado($datos)
    {   $consulta = Conexion::conectar()->prepare("SELECT * FROM empleado WHERE correo_trab = ? or numero_documento=?");
        $consulta->execute([$datos['correo_trab'], $datos['numero_documento']]);
        $result = $consulta->fetch(PDO::FETCH_OBJ);
        if (!empty($result)) {

            return 'repeat';
        }

        $stmt = Conexion::conectar()->prepare("CALL SP_Registrarempleado(?, ?, ?, ?, ?, ?, ?, ?, ?);");
        $respuesta = $stmt->execute([$datos['nombres_trab'], $datos['direccion_trab'], $datos['correo_trab'], $datos['telefono_trab'], $datos['tipo_documento'], $datos['numero_documento'], $datos['estado'], $datos['inicio_lab'], $datos['tipo_contrato']]);

        if ($respuesta == true) {
            return "ok";
        } else {
            return "error";
        }
        $respuesta->close();
        $respuesta = null;
    }

    static public function mdlMostrarEmpleado_x_ID( $id_trabajador)
    {
        $stmt = Conexion::conectar()->prepare(" CALL SP_BuscarEmpleadoxID($id_trabajador)");
        $stmt->execute();
        $respuesta = $stmt->fetch();
        return $respuesta;
    }
    static public function mdlActualizarEmpleado($datos)
    {
        $stmt = Conexion::conectar()->prepare("CALL SP_Actualizarempleado(?, ?, ?, ? , ?, ?, ?, ?, ?, ?);");
        $stmt->execute([$datos['nombres_trab'], $datos['direccion_trab'], $datos['correo_trab'], $datos['telefono_trab'], $datos['tipo_documento'], $datos['numero_documento'], $datos['estado'], $datos['inicio_lab'], $datos['tipo_contrato'], $datos['id_trabajador']]);
        if ($stmt == true) {
            return "ok";
        } else {
            return "error";
        }
    }
    static public function mdlReingresarEmpleado($id_trabajador)
    {
        $stmt = Conexion::conectar()->prepare(" CALL SP_ReingresarEmpleado ($id_trabajador);");
        $stmt->execute();
        if ($stmt = true) {
            return "ok";
        } else {
            return "error";
        }
    }
    static public function mdlEliminarEmpleado_x_ID($id_trabajador)
    {
        $stmt = Conexion::conectar()->prepare("CALL SP_EliminarEmpleadoxID($id_trabajador);");
        $stmt->execute();
        if ($stmt = true) {
            return "ok";
        } else {
            return "error";
        }
    }
}