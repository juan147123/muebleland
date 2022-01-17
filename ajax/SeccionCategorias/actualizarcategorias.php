<?php
require_once '../../controller/categorias_controller.php';
require_once '../../model/categorias_model.php';

class actualizarcategoria{
    public function ajaxactualizarCategoria(){
        if ($_POST['CodigoCatEditar'] != null && $_POST['DescripcionEditar'] != null) {
            $datos = array(
                "Descripcion" => $_POST['DescripcionEditar'],
                "CodigoCat" => $_POST['CodigoCatEditar']
            );
            $respuesta = categoriascontrolador::ctrActualizarCategoria($datos);
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
$resp = new actualizarcategoria();
$resp->ajaxactualizarCategoria();