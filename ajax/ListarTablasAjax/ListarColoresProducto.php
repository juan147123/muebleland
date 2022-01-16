<?php
require_once '../../controller/productos_controller.php';
require_once '../../model/productos_model.php';
class listarcoloresproductosajax
{

    public function ajaxlistarcoloresProductos()
    {

        $response = productoscontroller::ctrListarColoresProductos();


        echo json_encode($response);
    }
}
$resp = new listarcoloresproductosajax();
$resp->ajaxlistarcoloresProductos();
