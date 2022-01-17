<?php
require_once "../../controller/ventas_controller.php";
require_once '../../model/ventas_model.php';

class actualizarventa{
    public function ajaxactualizarVenta(){
        if ($_POST['idventaEdit'] != null && $_POST['id_clienteE']) {
            $datos = array(
                "id_cliente" => $_POST['id_clienteE'],
                "id_venta" => $_POST['idventaEdit']
            );
            $respuesta = ventascontrolador::ctrActualizarVenta($datos);
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
$resp = new actualizarventa();
$resp->ajaxactualizarVenta();