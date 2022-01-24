<?php
require_once '../../controller/factura_compra_controller.php';
require_once '../../model/factura_compra_model.php';
class ActualizarEstadoAlmacenadoCompletoFacturaCompraajax
{
    public function ajaxActualizarEstadoAlmacenadoCompletoFacturaCompra()
    {
        $idfac = $this->idfac;
        $response = facturacompracontrolador::ctrActualizarestadoalmacenadocompletofactura($idfac);
        echo json_encode($response);
    }
}

if (isset($_POST["idfac"])) {
    $idfac = new ActualizarEstadoAlmacenadoCompletoFacturaCompraajax();
    $idfac->idfac  = $_POST["idfac"];
    $idfac->ajaxActualizarEstadoAlmacenadoCompletoFacturaCompra();
}
