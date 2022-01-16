<?php
require_once 'conexion.php';

class proveedormodelo
{
    static public function mdlRegistrarProveedor($datos)
    {
        $consulta = Conexion::conectar()->prepare("SELECT * FROM proveedor WHERE NITProveedor = ?");
        $consulta->execute([$datos['NITProveedor']]);
        $result = $consulta->fetch(PDO::FETCH_OBJ);
        if (!empty($result)) {

            return 'repeat';
        }

        $stmt = Conexion::conectar()->prepare("CALL SP_Registrarproveedor(?, ?, ?, ?, ?,?);");
        $respuesta = $stmt->execute([$datos['NITProveedor'], $datos['NombreProveedor'], $datos['Direccion'], $datos['Telefono'], $datos['PaginaWeb'], $datos['Estado']]);

        if ($respuesta == true) {
            return "ok";
        } else {
            return "error";
        }

        $respuesta->close();
        $respuesta = null;
    }

    static public function mdlListarTablaProveedor()
    {
        $stmt = Conexion::conectar()->prepare("CALL SP_ListarProveedor();");
        $stmt->execute();
        $respuesta = $stmt->fetchAll();
        return $respuesta;
    }

    static public function mdlMostrarProveedor_x_ID($NITProveedor)
    {
        $stmt = Conexion::conectar()->prepare("CALL SP_BuscarProveedorxID($NITProveedor)");
        $stmt->execute();
        $response = $stmt->fetch();
        return $response;
    }

    static public function mdlActualizarProveedor($datos)
    {
        $stmt = Conexion::conectar()->prepare("CALL SP_Actualizarproveedor(?, ?, ?, ? , ?,?);");
        $stmt->execute([ $datos['NombreProveedor'], $datos['Direccion'],  $datos['Telefono'], $datos['PaginaWeb'], $datos['Estado'],$datos['NITProveedor']]);
        if ($stmt == true) {
            return "ok";
        } else {
            return "error";
        }
    }

    static public function mdlEliminarProveedor_x_ID($NITProveedor)
    {
        $stmt = Conexion::conectar()->prepare("CALL SP_EliminarProveedorxID($NITProveedor);");
        $stmt->execute();

        if ($stmt = true) {
            return "ok";
        } else {
            return "error";
        }
    }
}
