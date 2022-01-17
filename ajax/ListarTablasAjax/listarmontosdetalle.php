<?php
require_once '../../controller/ventas_controller.php';
require_once '../../model/ventas_model.php';
class listarmontoventasajax
{

    public function ajaxlistarmontoVentas()
    {
        $id_venta=$this->id_venta;

        $response = ventascontrolador::ctrMostrarDetalleVentas_x_ID($id_venta);


        echo json_encode($response);
    }
}
if (isset($_POST["id_venta"])) {
    $id_venta = new listarmontoventasajax();
    $id_venta->id_venta = $_POST["id_venta"];
    $id_venta->ajaxlistarmontoVentas();
}
