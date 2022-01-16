<?php
require_once "../../controller/marcas_controller.php";
require_once '../../model/marcas_model.php';

class registrarmarcaajax
{
    public function ajaxregistroMarca()
    {
            if ($_POST['descripcion'] != null) {

                $datos = array(
                    "descripcion" => $_POST['descripcion'],
                );

                $respuesta = marcascontrolador::ctrRegistrarMarca($datos);
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

$resp = new registrarmarcaajax();
$resp->ajaxregistroMarca();