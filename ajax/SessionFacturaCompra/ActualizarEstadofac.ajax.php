<?php
require_once '../../controller/factura_compra_controller.php';
require_once '../../model/factura_compra_model.php';
class ActualizarEstadofacturadoajax
{
    public function ajaxActualizarEstadofacturado()
    {
        $idfac = $this->idfac;
        $response = facturacompracontrolador::ctrActualizarestadofacturado($idfac);
        echo json_encode($response);
    }
}

if (isset($_POST["idfac"])) {
    $idfac = new ActualizarEstadofacturadoajax();
    $idfac->idfac  = $_POST["idfac"];
    $idfac->ajaxActualizarEstadofacturado();
}
