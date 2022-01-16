<?php
require_once "../controller/api.controller.php";

class consumoapi
{

    public function ajaxapi()
    {
        if (isset($_POST['ruc'])) {
            $rucaconsultar = $_POST['ruc'];
            $respuesta = ControladorApi::ctrConsultarRuc($rucaconsultar);
            if ($respuesta == 'error') {
                //Mostramos los errores si los hay
                $response = array(
                    "respuesta" => "error"
                );
                echo json_encode($response);
            } else {
                //Mostramos la respuesta
                echo json_encode($respuesta);
            }
        } else if (isset($_POST['dni'])) {
            $dniaconsultar = $_POST['dni'];
            $respuesta = ControladorApi::ctrConsultarDNI($dniaconsultar);
            if ($respuesta == 'error') {
                //Mostramos los errores si los hay
                $response = array(
                    "respuesta" => "error"
                );
                echo json_encode($response);
            } else {
                //Mostramos la respuesta
                echo json_encode($respuesta);
            }
        }
    }
}
$resp = new consumoapi();
$resp->ajaxapi();