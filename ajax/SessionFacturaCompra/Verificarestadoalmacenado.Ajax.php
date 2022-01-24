<?php
require_once '../../controller/factura_compra_controller.php';
require_once '../../model/factura_compra_model.php';
class VerificarEstadoAlmacenadoDetalleFacturaCompraajax
{
    public function ajaxVerificarEstadoAlmacenadoDetalleFacturaCompra()
    {
        $idfac = $this->idfac;
        $respuesta = facturacompracontrolador::ctrVerificarestadoalmacenado($idfac);
        if ($respuesta == "actualizar") {
            $response = array(
                'response' => 'actualizar'
            );
        } else {
            if ($respuesta == "noactualizar") {
                $response = array(
                    'response' => 'noactualizar'
                );
            }
        }
        echo json_encode($response);
    }
}

if (isset($_POST["idfac"])) {
    $idfac = new VerificarEstadoAlmacenadoDetalleFacturaCompraajax();
    $idfac->idfac  = $_POST["idfac"];
    $idfac->ajaxVerificarEstadoAlmacenadoDetalleFacturaCompra();
}
