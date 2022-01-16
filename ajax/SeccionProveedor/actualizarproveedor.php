<?php

require_once '../../controller/proveedor_controller.php';
require_once '../../model/proveedor_model.php';

class actualizarproveedorajax
{
    public function ajaxactualizarproveedor()
    {
        if ($_POST['NITProveedorEditar'] != null && $_POST['NombreProveedorEditar'] != null && $_POST['DireccionEditar'] != null && $_POST['TelefonoEditar'] != null && $_POST['EstadoEditar'] != null) {
            $datos = array(
                "NombreProveedor" => $_POST['NombreProveedorEditar'],
                "Direccion" => $_POST['DireccionEditar'],
                "Telefono" => $_POST['TelefonoEditar'],
                "PaginaWeb" => $_POST['PaginaWebEditar'],
                "Estado" => $_POST['EstadoEditar'],
                "NITProveedor" => $_POST['NITProveedorEditar']
            );
            $respuesta = proveedorcontroller::ctrActualizarProveedor($datos);
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

$resp = new actualizarproveedorajax();
$resp->ajaxactualizarproveedor();
