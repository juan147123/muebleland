<?php
require_once "../../controller/ventas_controller.php";
require_once '../../model/ventas_model.php';

class registrarDetalleVentaajax
{
    public function ajaxregistroDetalleVenta()
    {
            if ($_POST['idventadet'] != null && $_POST['codigprodvnt'] != null && $_POST['cantidadvent'] != null) {

                $datos = array(
                    "id_venta" => $_POST['idventadet'],
                    "id_prod" => $_POST['codigprodvnt'],
                    "cantidad" => $_POST['cantidadvent']
                );

                $respuesta = ventascontrolador::ctrRegistrarDetalleVenta($datos);
                if ($respuesta == "ok") {
                    $response = array(
                        'response' => 'true'
                    );
                } else if($respuesta == "existen"){
                    $response = array(
                        'response' => 'existen'
                    );
                }else {
                    if ($respuesta == "error") {
                        $response = array(
                            'response' => 'error'
                        );
                    }
                }
            }
            echo json_encode($response);
    }
}

$resp = new registrarDetalleVentaajax();
$resp->ajaxregistroDetalleVenta();