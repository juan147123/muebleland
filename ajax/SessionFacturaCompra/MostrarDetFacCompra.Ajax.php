<?php
require_once '../../controller/factura_compra_controller.php';
require_once '../../model/factura_compra_model.php';
class MostrarDetalleFacCom_x_IDajax
{
    public function ajaxMostrarDetalleFacCom_x_ID()
    {
        $id = $this->id;
        $response = facturacompracontrolador::ctrMostrarDetalleFacCom_x_ID($id);
        echo json_encode($response);
    }
}

if (isset($_POST["id"])) {
    $id = new MostrarDetalleFacCom_x_IDajax();
    $id->id  = $_POST["id"];
    $id->ajaxMostrarDetalleFacCom_x_ID();
}
