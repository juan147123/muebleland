<?php

require_once 'conexion.php';

class productomodelo
{
    static public function mdlListarProducto()
    {
        $sql = Conexion::conectar()->prepare("CALL SP_ListarProductos()");
        $sql->execute();
        $response = $sql->fetchAll();
        return $response;
    }

    static public function mdlRegistrarProducto($datos)
    {

        $consulta = Conexion::conectar()->prepare("SELECT * FROM producto WHERE DescripcionProd=? and CodigoCat=? and Modelo=? AND idmarca=? AND idColor=?;");
        $consulta->execute([$datos['DescripcionProd'], $datos['CodigoCat'], $datos['Modelo'], $datos['idmarca'], $datos['idColor']]);
        $result = $consulta->fetch(PDO::FETCH_OBJ);
        if (!empty($result)) {

            return 'repeat';
        }
        $sql = Conexion::conectar()->prepare("CALL SP_RegistrarProductos(?,?,?,?,?,?,?,?,?,?);");
        $respuesta = $sql->execute([$datos['DescripcionProd'], $datos['CodigoCat'], $datos['PrecioCompra'], $datos['porcentaje'], $datos['PrecioVenta'], $datos['Modelo'], $datos['idmarca'], $datos['idColor'], $datos['Stock'], $datos['Imagen']]);

        if ($respuesta == true) {
            return "ok";
        } else {
            return "error";
        }

        $respuesta->close();
        $respuesta = null;
    }

    static public function mdlMostrarProducto_x_ID($id_prod)
    {
        if (!empty($id_prod)) {
            $stmt = Conexion::conectar()->prepare("CALL SP_MostrarProductoxId($id_prod)");
            $stmt->execute();
            $response = $stmt->fetch();
            return $response;
        }else{
            return 'error';
        }
    }

    static public function mdlActualizarProductos($datos)
    {
        $stmt = Conexion::conectar()->prepare("CALL SP_ActualizarProducto(?,?,?,?,?,?,?,?,?,?,?);");
        $stmt->execute([$datos['DescripcionProd'], $datos['CodigoCat'], $datos['PrecioCompra'], $datos['porcentaje'], $datos['PrecioVenta'], $datos['Modelo'], $datos['idmarca'], $datos['idColor'], $datos['Stock'], $datos['Imagen'], $datos['id_prod']]);
        if ($stmt == true) {
            return "ok";
        } else {
            return "error";
        }
    }

    static public function mdlEliminarProducto_x_ID($id_prod)
    {
        $stmt = Conexion::conectar()->prepare("CALL SP_EliminarProducto($id_prod);");
        $stmt->execute();

        if ($stmt = true) {
            return "ok";
        } else {
            return "error";
        }
    }

    /* Listar selects para formulario productos */
    static public function mdlListarCategoriaProducto()
    {
        $sql = Conexion::conectar()->prepare("CALL SP_ListarCategorias()");
        $sql->execute();
        $response = $sql->fetchAll();
        return $response;
    }
    static public function mdlListarColorProducto()
    {
        $sql = Conexion::conectar()->prepare("SELECT * from colores");
        $sql->execute();
        $response = $sql->fetchAll();
        return $response;
    }
    static public function mdlListarMarcasProducto()
    {
        $sql = Conexion::conectar()->prepare("SELECT * from marcas");
        $sql->execute();
        $response = $sql->fetchAll();
        return $response;
    }
}
