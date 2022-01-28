<?php

require_once 'conexion.php';

class iniciomodelo{

    static public function mdlListartotalclientes(){
        $stmt = Conexion::conectar()->prepare("CALL SP_ContarClientes();");
        $stmt->execute();
        $respuesta = $stmt->fetch();
        return $respuesta;
    }
    static public function mdlListartotalEmpleados(){
        $stmt = Conexion::conectar()->prepare("CALL SP_ContarEmpleados();");
        $stmt->execute();
        $respuesta = $stmt->fetch();
        return $respuesta;
    }
    static public function mdlListartotalProveedores(){
        $stmt = Conexion::conectar()->prepare("CALL SP_ContarProveedores();");
        $stmt->execute();
        $respuesta = $stmt->fetch();
        return $respuesta;
    }
    static public function mdlListartotalVentas(){
        $stmt = Conexion::conectar()->prepare("CALL SP_ContarVentas();");
        $stmt->execute();
        $respuesta = $stmt->fetch();
        return $respuesta;
    }
    static public function mdlGraficosProductosVendidos(){
        $stmt = Conexion::conectar()->prepare("CALL SP_GraficoProductosVendidos();");
        $stmt->execute();
        $respuesta = $stmt->fetchAll();
        return $respuesta;
    }
    static public function mdlGraficosVentasPorMes(){
        $stmt = Conexion::conectar()->prepare("CALL SP_GraficoVentasMes();");
        $stmt->execute();
        $respuesta = $stmt->fetchAll();
        return $respuesta;
    }
    static public function mdlGraficosClientePorMes(){
        $stmt = Conexion::conectar()->prepare("CALL SP_GraficoClientesMes();");
        $stmt->execute();
        $respuesta = $stmt->fetchAll();
        return $respuesta;
    }

}