<?php
require_once '../../controller/inicio_controller.php';
require_once '../../model/inicio_model.php';
class listarGraficoclientemesajax
{

    public function ajaxlistarGraficoclientemes()
    {

        $response = iniciocontroller::ctrGraficosClientePorMes();



        echo json_encode($response);
    }
}
$resp = new listarGraficoclientemesajax();
$resp->ajaxlistarGraficoclientemes();