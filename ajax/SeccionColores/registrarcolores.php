<?php
require_once "../../controller/colores_controller.php";
require_once '../../model/colores_model.php';

class registrarcolorajax
{
    public function ajaxregistroColor()
    {
            if ($_POST['nombre_color'] != null) {

                $datos = array(
                    "nombre_color" => $_POST['nombre_color'],
                );

                $respuesta = colorcontrolador::ctrRegistrarColor($datos);
                if ($respuesta == "ok") {
                    $response = array(
                        'response' => 'true'
                    );
                } else {
                    if ($respuesta == "repeat") {
                        $response = array(
                            'response' => 'repeat'
                        );
                    }
                }
            }
            echo json_encode($response);
    }
}

$resp = new registrarcolorajax();
$resp->ajaxregistroColor();