<?php
require_once '../../controller/factura_compra_controller.php';
require_once '../../model/factura_compra_model.php';

class ActualizarDetalleFacCom_x_IDajax
{
    public function ajaxActualizarDetalleFacCom_x_ID()
    {
            if ($_POST['precio_ventaEditardfc'] != null && $_POST['cantidadprodEditardfc'] != null && $_POST['idEditardfc'] != null) {

                $datos = array(
                    "precio_uni" => $_POST['precio_ventaEditardfc'],
                    "cantidad" => $_POST['cantidadprodEditardfc'],
                    "id" => $_POST['idEditardfc']

                );

                $respuesta = facturacompracontrolador::ctrActualizarDetalleFacCom_x_ID($datos);
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
            }
            echo json_encode($response);
    }
}

$resp = new ActualizarDetalleFacCom_x_IDajax();
$resp->ajaxActualizarDetalleFacCom_x_ID();
