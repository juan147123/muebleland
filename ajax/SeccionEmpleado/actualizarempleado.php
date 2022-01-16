<?php
require_once "../../controller/empleado_controller.php";
require_once '../../model/empleado_model.php';

class actualizarempleado{
    public function ajaxactualizarEmpleado(){
        if ($_POST['nombres_trabEditar'] != null && $_POST['direccion_trabEditar'] != null && $_POST['correo_trabEditar'] != null && $_POST['telefono_trabEditar'] != null && $_POST['tipo_documentoEditar'] != null && $_POST['numero_documentoEditar'] != null  && $_POST['estadoEditar'] != null && $_POST['inicio_labEditar'] != null && $_POST['tipo_contratoSEditar'] != null) {
            $datos = array(
                "nombres_trab" => $_POST['nombres_trabEditar'],
                "direccion_trab" => $_POST['direccion_trabEditar'],
                "correo_trab" => $_POST['correo_trabEditar'],
                "telefono_trab" => $_POST['telefono_trabEditar'],
                "tipo_documento" => $_POST['tipo_documentoEditar'],
                "numero_documento" => $_POST['numero_documentoEditar'],
                "estado" => $_POST['estadoEditar'],
                "inicio_lab" => $_POST['inicio_labEditar'],
                "tipo_contrato" => $_POST['tipo_contratoSEditar'],
                "id_trabajador"=> $_POST['id_trabajadorEditar'],

            );
            $respuesta = empleadoscontroller::ctrActualizarEmpleado($datos);
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
$resp = new actualizarempleado();
$resp->ajaxactualizarEmpleado();