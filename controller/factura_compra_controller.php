<?php

class facturacompracontrolador
{
    static public function ctrListarTablaFacturaCompra()
    {

        $respuesta = factura_compra_modelo::mdlListarTablaFacturaCompra();
        return $respuesta;
    }
    static public function ctrRegistrarFacturaCompra($datos)
    {
        $respuesta = factura_compra_modelo::mdlRegistrarFacturaCompra($datos);
        return $respuesta;
    }
    static public function ctrEliminarFacturaCompra_x_ID($idfac)
    {
        $respuesta = factura_compra_modelo::mdlEliminarFacturaCompra_x_ID($idfac);
        return $respuesta;
    }




    public static function ctrlRegisterDetailFacturaCompra($datos)
    {
        return factura_compra_modelo::mdlRegisterDetailFacturaCompra($datos);
    }

    public static function ctrlListarDetalleFacturaCompra($id)
    {
        return factura_compra_modelo::mdlListarDetalleFacturaCompra($id);
    }
    public static function ctrActualizarEstadoAlmacenadoDetalleFacturaCompra($id)
    {
        return factura_compra_modelo::mdlActualizarEstadoAlmacenadoDetalleFacturaCompra($id);
    }

    static public function ctrVerificarestadoalmacenado($idfac)
    {
        $respuesta = factura_compra_modelo::mdlVerificarestadoalmacenado($idfac);
        return $respuesta;
    }
    static public function ctrActualizarestadoalmacenadocompletofactura($idfac)
    {
        $respuesta = factura_compra_modelo::mdlActualizarestadoalmacenadocompletofactura($idfac);
        return $respuesta;
    }
    static public function ctrActualizarestadofacturaculminada($idfac)
    {
        $respuesta = factura_compra_modelo::mdlActualizarestadofacturaculminada($idfac);
        return $respuesta;
    }
    static public function ctrActualizarestadofacturado($idfac)
    {
        $respuesta = factura_compra_modelo::mdlActualizarestadofacturado($idfac);
        return $respuesta;
    }
    static public function ctrMostrarDetalleFacCom_x_ID($id)
    {
        $respuesta = factura_compra_modelo::mdlMostrarDetalleFacCom_x_ID($id);
        return $respuesta;
    }
    static public function ctrActualizarDetalleFacCom_x_ID($datos)
    {
        $respuesta = factura_compra_modelo::mdlActualizarDetalleFacCom_x_ID($datos);
        return $respuesta;
    }
    static public function ctrEliminarDetalleFacturaCompra($id)
    {
        $respuesta = factura_compra_modelo::mdlEliminarDetalleFacturaCompra($id);
        return $respuesta;
    }
}
