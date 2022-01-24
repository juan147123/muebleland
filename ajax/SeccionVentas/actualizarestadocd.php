<?php
require_once "../../controller/ventas_controller.php";
require_once '../../model/ventas_model.php';

class actualizarEstadocdventa
{
    public function ajaxactualizarEstadocdVenta()
    {
        $id_dventa = $_POST["id_dventa"];
        $respuesta = ventascontrolador::ctrActualizarEstadoVentaCD($id_dventa);
        if ($respuesta == "ok") {
            $response = array(
                'response' => 'true'
            );
        } else if ($respuesta == "error") {
            $response = array(
                'response' => 'error'
            );
        }
        else if ($respuesta == "vacio") {
            $response = array(
                'response' => 'vacio'
            );
        }
        echo json_encode($response);
    }
}
if(isset($_POST["id_dventa"])){
    $id_dventa = new actualizarEstadocdventa();
    $id_dventa->id_dventa = $_POST["id_dventa"];
    $id_dventa->ajaxactualizarEstadocdVenta();
}
