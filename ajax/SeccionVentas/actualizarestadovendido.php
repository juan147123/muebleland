<?php
require_once "../../controller/ventas_controller.php";
require_once '../../model/ventas_model.php';

class actualizarEstadoVendido
{
    public function ajaxactualizarEstadoVendido()
    {
        $id_venta = $_POST["id_venta"];
        $respuesta = ventascontrolador::ctrActualizarEstadoVendido($id_venta);
        if ($respuesta == "ok") {
            $response = array(
                'response' => 'true'
            );
        } else if ($respuesta == "error") {
            $response = array(
                'response' => 'error'
            );
        }
        
        echo json_encode($response);
    }
}
if(isset($_POST["id_venta"])){
    $id_venta = new actualizarEstadoVendido();
    $id_venta->id_venta = $_POST["id_venta"];
    $id_venta->ajaxactualizarEstadoVendido();
}
