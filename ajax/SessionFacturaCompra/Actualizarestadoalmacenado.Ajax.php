<?php
require_once '../../controller/factura_compra_controller.php';
require_once '../../model/factura_compra_model.php';
class ActualizarEstadoAlmacenadoDetalleFacturaCompraajax
{
    public function ajaxActualizarEstadoAlmacenadoDetalleFacturaCompra()
    {
        $id = $this->id;
        $response = facturacompracontrolador::ctrActualizarEstadoAlmacenadoDetalleFacturaCompra($id);
        echo json_encode($response);
    }
}

if (isset($_POST["id"])) {
    $id = new ActualizarEstadoAlmacenadoDetalleFacturaCompraajax();
    $id->id  = $_POST["id"];
    $id->ajaxActualizarEstadoAlmacenadoDetalleFacturaCompra();
}
