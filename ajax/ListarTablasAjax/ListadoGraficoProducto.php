<?php
require_once '../../controller/inicio_controller.php';
require_once '../../model/inicio_model.php';
class listarGraficoProdutoajax
{

    public function ajaxlistarGraficoproducto()
    {

        $response = iniciocontroller::ctrGraficosProductos();



        echo json_encode($response);
    }
}
$resp = new listarGraficoProdutoajax();
$resp->ajaxlistarGraficoproducto();