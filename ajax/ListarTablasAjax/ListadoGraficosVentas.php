<?php
require_once '../../controller/inicio_controller.php';
require_once '../../model/inicio_model.php';
class listarGraficoventamesajax
{

    public function ajaxlistarGraficoventames()
    {

        $response = iniciocontroller::ctrGraficosVentasPorMes();



        echo json_encode($response);
    }
}
$resp = new listarGraficoventamesajax();
$resp->ajaxlistarGraficoventames();