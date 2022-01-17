<?php
require_once '../../controller/ventas_controller.php';
require_once '../../model/ventas_model.php';
class listarcodigoproductosajax
{

    public function ajaxlistarcodigoProductos()
    {

        $response = ventascontrolador::ctrMostrarcodigoProd();


        echo json_encode($response);
    }
}
$resp = new listarcodigoproductosajax();
$resp->ajaxlistarcodigoProductos();
