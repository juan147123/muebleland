<?php
require_once '../../controller/factura_compra_controller.php';
require_once '../../model/factura_compra_model.php';

class ActualizarDetalleFacCom_x_ID2ajax
{
    public function ajaxActualizarDetalleFacCom_x_ID2()
    {
            if ($_POST['precio_ventaEditardfc2'] != null && $_POST['cantidadprodEditardfc2'] != null && $_POST['idEditardfc2'] != null) {

                $datos = array(
                    "precio_uni" => $_POST['precio_ventaEditardfc2'],
                    "cantidad" => $_POST['cantidadprodEditardfc2'],
                    "id" => $_POST['idEditardfc2']

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

$resp = new ActualizarDetalleFacCom_x_ID2ajax();
$resp->ajaxActualizarDetalleFacCom_x_ID2();
