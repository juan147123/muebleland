<?php
require_once '../../controller/productos_controller.php';
require_once '../../model/productos_model.php';
class listarmarcasproductosajax
{

    public function ajaxlistarmarcasProductos()
    {

        $response = productoscontroller::ctrListarMarcasProductos();


        echo json_encode($response);
    }
}
$resp = new listarmarcasproductosajax();
$resp->ajaxlistarmarcasProductos();
