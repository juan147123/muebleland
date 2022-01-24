<?php
require_once '../../controller/factura_compra_controller.php';
require_once '../../model/factura_compra_model.php';
session_start();
class DetalleNotasEntradaAjax
{
    public function ajaxDetalleNotasEntrada()
    {
        if ($_POST['id_facturacompra'] != null && $_POST['id_producto'] != null) {
            $datos = array(
                "idfactura" => $_POST['id_facturacompra'],
                "idproducto" => $_POST['id_producto'],
                "cantidad" => $_POST['cantidad'],
                "precio_uni" => $_POST['precio_venta'],
                "total" => $_POST['precio_venta'] *  $_POST['cantidad']
            );

            $respuesta = facturacompracontrolador::ctrlRegisterDetailFacturaCompra($datos);
            if ($respuesta == "ok") {
                $response = array(
                    'response' => 'true'
                );
            } else {
                if ($respuesta == "repeat") {
                    $response = array(
                        'response' => 'repeat'
                    );
                }
            }
        }
        echo json_encode($response);
    }
}
$resp = new DetalleNotasEntradaAjax();
$resp->ajaxDetalleNotasEntrada();
