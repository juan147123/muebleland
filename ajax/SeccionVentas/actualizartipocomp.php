<?php
require_once "../../controller/ventas_controller.php";
require_once '../../model/ventas_model.php';

class actualizartipoventa{
    public function ajaxactualizartipoVenta(){
        
        if ($_POST['idventadet'] != null && $_POST['tipocompro']) {  
            $datos = array(
                "tipo_compro" => $_POST['tipocompro'],
                "id_venta" => $_POST['idventadet']
            );
            $respuesta = ventascontrolador::ctrActualizarTipoCompro($datos);
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
$resp = new actualizartipoventa();
$resp->ajaxactualizartipoVenta();