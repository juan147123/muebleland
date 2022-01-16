<?php

require_once '../../controller/proveedor_controller.php';
require_once '../../model/proveedor_model.php';

class registroproveedorajax
{
    public function ajaxregistroproveedor()
    {
        if ($_POST['NITProveedor'] != null && $_POST['NombreProveedor'] != null && $_POST['Direccion'] != null && $_POST['Telefono'] != null && $_POST['Estado'] != null) {
            $datos = array(
                "NITProveedor" => $_POST['NITProveedor'],
                "NombreProveedor" => $_POST['NombreProveedor'],
                "Direccion" => $_POST['Direccion'],
                "Telefono" => $_POST['Telefono'],
                "PaginaWeb" => $_POST['PaginaWeb'],
                "Estado" => $_POST['Estado']
            );
            $respuesta = proveedorcontroller::ctrRegistrarProveedor($datos);
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

$resp = new registroproveedorajax();
$resp->ajaxregistroproveedor();