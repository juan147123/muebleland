<?php
require_once '../../controller/cliente_controller.php';
require_once '../../model/cliente_model.php';

class actualizarcliente{
    public function ajaxactualizarCliente(){
        if ($_POST['NITEditar'] != null && $_POST['EmailEditar'] != null && $_POST['TelefonoEditar'] != null && $_POST['DireccionEditar'] != null && $_POST['NombreCompletoEditar'] != null ) {
            $datos = array(
                "NombreCompleto" => $_POST['NombreCompletoEditar'],
                "Direccion" => $_POST['DireccionEditar'],
                "Telefono" => $_POST['TelefonoEditar'],
                "Email" => $_POST['EmailEditar'],
                "NIT" => $_POST['NITEditar']
            );
            $respuesta = clientecontroller::ctrActualizarCliente($datos);
            if ($respuesta == "ok") {
                $response = array(
                    'response' => 'true'
                );
            }else if($respuesta == "error"){
                $response = array(
                    'response' => 'error'
                );
            }
            echo json_encode($response);
        }
    }
}
$resp = new actualizarcliente();
$resp->ajaxactualizarCliente();