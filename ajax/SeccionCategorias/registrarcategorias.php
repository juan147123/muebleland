<?php
require_once "../../controller/categorias_controller.php";
require_once '../../model/categorias_model.php';

class registrarcategoriaajax
{
    public function ajaxregistroCategoria()
    {
            if ($_POST['Descripcion'] != null) {

                $datos = array(
                    "Descripcion" => $_POST['Descripcion'],
                );

                $respuesta = categoriascontrolador::ctrRegistrarCategoria($datos);
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

$resp = new registrarcategoriaajax();
$resp->ajaxregistroCategoria();