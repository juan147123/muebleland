<?php
require_once '../../controller/factura_compra_controller.php';
require_once '../../model/factura_compra_model.php';
class eliminardetfacturacompraporidajax
{
    public function ajaxEliminardetfacturacompraxid()
    {
        $id = $this->id;
        $response = facturacompracontrolador::ctrEliminarDetalleFacturaCompra($id);
        echo json_encode($response);
    }
}

if (isset($_POST["id"])) {
    $id = new eliminardetfacturacompraporidajax();
    $id->id  = $_POST["id"];
    $id->ajaxEliminardetfacturacompraxid();
}
