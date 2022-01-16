<?php
require_once '../../controller/marcas_controller.php';
require_once '../../model/marcas_model.php';

class actualizarmarca{
    public function ajaxactualizarMarca(){
        if ($_POST['id_marcaEditar'] != null && $_POST['descripcionEditar']) {
            $datos = array(
                "descripcion" => $_POST['descripcionEditar'],
                "id_marca" => $_POST['id_marcaEditar']
            );
            $respuesta = marcascontrolador::ctrActualizarMarca($datos);
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
$resp = new actualizarmarca();
$resp->ajaxactualizarMarca();