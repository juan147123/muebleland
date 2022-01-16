<?php
require_once "../../controller/colores_controller.php";
require_once '../../model/colores_model.php';

class actualizarcolorajax
{
    public function ajaxactualizarColor()
    {
            if ($_POST['nombre_colorEditar'] != null) {

                $datos = array(
                    "nombre_color" => $_POST['nombre_colorEditar'],
                    "id_color" => $_POST['id_colorEditar']

                );

                $respuesta = colorcontrolador::ctrActualizarColor($datos);
                if ($respuesta == "ok") {
                    $response = array(
                        'response' => 'true'
                    );
                } else {
                    if ($respuesta == "error") {
                        $response = array(
                            'response' => 'error'
                        );
                    }
                }
            }
            echo json_encode($response);
    }
}

$resp = new actualizarcolorajax();
$resp->ajaxactualizarColor();