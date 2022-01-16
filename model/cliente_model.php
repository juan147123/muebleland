<?php
require_once 'conexion.php';

class ClienteModelo{
   
    static public function mdlListarTablaCliente()
    {
        $stmt = Conexion::conectar()->prepare("CALL SP_ListarCliente();");
        $stmt->execute();
        $respuesta = $stmt->fetchAll();
        return $respuesta;
    }

    static public function mdlRegistrarCliente($datos)
    {
        $consulta = Conexion::conectar()->prepare("SELECT * FROM cliente WHERE NIT = ?");
        $consulta->execute([$datos['NIT']]);
        $result = $consulta->fetch(PDO::FETCH_OBJ);
        if (!empty($result)) {

            return 'repeat';
        }

        $stmt = Conexion::conectar()->prepare("CALL SP_Registrarcliente (?, ?, ?, ?, ?, ?);");
        $respuesta = $stmt->execute([$datos['NIT'], $datos['NombreCompleto'], $datos['Apellido'], $datos['Direccion'], $datos['Telefono'], $datos['Email']]);

        if ($respuesta == true) {
            return "ok";
        } else {
            return "error";
        }

        $respuesta->close();
        $respuesta = null;
    }
    static public function mdlMostrarCliente_x_ID( $NIT)
    {
        $stmt = Conexion::conectar()->prepare(" CALL SP_BuscarClientexID($NIT)");
        $stmt->execute();
        $respuesta = $stmt->fetch();
        return $respuesta;
    }
    static public function mdlActualizarCliente($datos)
    {
        $stmt = Conexion::conectar()->prepare("CALL SP_Actualizarcliente(?, ?, ?, ? , ?, ?);");
        $stmt->execute([$datos['NombreCompleto'], $datos['Apellido'], $datos['Direccion'], $datos['Telefono'], $datos['Email'],$datos['NIT']]);
        if ($stmt == true) {
            return "ok";
        } else {
            return "error";
        }
    }
    static public function mdlEliminarCliente_x_ID($NIT)
    {
        $stmt = Conexion::conectar()->prepare("CALL SP_EliminarClientexID($NIT);");
        $stmt->execute();
        if ($stmt = true) {
            return "ok";
        } else {
            return "error";
        }
    }
}