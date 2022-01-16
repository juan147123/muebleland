<?php
require_once '../../controller/productos_controller.php';
require_once '../../model/productos_model.php';
class listarcategoriasproductosajax
{

    public function ajaxlistarcategoriasProductos()
    {

        $response = productoscontroller::ctrListarCategoriaProductos();


        echo json_encode($response);
    }
}
$resp = new listarcategoriasproductosajax();
$resp->ajaxlistarcategoriasProductos();
