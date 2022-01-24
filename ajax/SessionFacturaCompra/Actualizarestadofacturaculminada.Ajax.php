<?php
require_once '../../controller/factura_compra_controller.php';
require_once '../../model/factura_compra_model.php';
class cActualizarestadofacturaculminadaajax
{
    public function ajaxActualizarestadofacturaculminada()
    {
        $idfac = $this->idfac;
        $response = facturacompracontrolador::ctrActualizarestadofacturaculminada($idfac);
        echo json_encode($response);
    }
}

if (isset($_POST["idfac"])) {
    $idfac = new cActualizarestadofacturaculminadaajax();
    $idfac->idfac  = $_POST["idfac"];
    $idfac->ajaxActualizarestadofacturaculminada();
}
