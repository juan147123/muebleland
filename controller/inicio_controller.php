<?php

class iniciocontroller
{
    static public function ctrConteoClientes()
    {
        $respuesta = iniciomodelo::mdlListartotalclientes();
        return $respuesta;
    }
    static public function ctrConteoEmpleados()
    {
        $respuesta = iniciomodelo::mdlListartotalEmpleados();
        return $respuesta;
    }
    static public function ctrConteoProveedores()
    {
        $respuesta = iniciomodelo::mdlListartotalProveedores();
        return $respuesta;
    }
    static public function ctrConteoVentas()
    {
        $respuesta = iniciomodelo::mdlListartotalVentas();
        return $respuesta;
    }
    static public function ctrGraficosProductos()
    {
        $respuesta = iniciomodelo::mdlGraficosProductosVendidos();
        return $respuesta;
    }
    static public function ctrGraficosVentasPorMes()
    {
        $respuesta = iniciomodelo::mdlGraficosVentasPorMes();
        return $respuesta;
    }
    static public function ctrGraficosClientePorMes()
    {
        $respuesta = iniciomodelo::mdlGraficosClientePorMes();
        return $respuesta;
    }
}