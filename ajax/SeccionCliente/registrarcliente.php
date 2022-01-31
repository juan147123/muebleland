<?php

require_once '../../controller/cliente_controller.php';
require_once '../../model/cliente_model.php';

class registroclienteajax
{
    public function ajaxregistrocliente()
    {
        if ($_POST['NIT'] != null && $_POST['NombreCompleto'] != null && $_POST['Direccion'] != null && $_POST['Telefono'] != null && $_POST['Email'] != null) {
            $datos = array(
                "NIT" => $_POST['NIT'],
                "NombreCompleto" => $_POST['NombreCompleto'],
                "Direccion" => $_POST['Direccion'],
                "Telefono" => $_POST['Telefono'],
                "Email" => $_POST['Email']
            );
            $respuesta = clientecontroller::ctrRegistrarCliente($datos);
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
            echo json_encode($response);
        }
    }
}

$resp = new registroclienteajax();
$resp->ajaxregistrocliente();