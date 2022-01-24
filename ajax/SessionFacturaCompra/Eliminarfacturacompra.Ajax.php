<?php
require_once '../../controller/factura_compra_controller.php';
require_once '../../model/factura_compra_model.php';
class eliminarfacturacompraporidajax
{
    public function ajaxEliminarfacturacompraxid()
    {
        $idfac = $this->idfac;
        $response = facturacompracontrolador::ctrEliminarFacturaCompra_x_ID($idfac);
        echo json_encode($response);
    }
}

if (isset($_POST["idfac"])) {
    $idfac = new eliminarfacturacompraporidajax();
    $idfac->idfac  = $_POST["idfac"];
    $idfac->ajaxEliminarfacturacompraxid();
}
