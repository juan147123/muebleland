<?php
require_once "../../controller/ventas_controller.php";
require_once '../../model/ventas_model.php';
session_start();
class registrarVentaajax
{
    public function ajaxregistroVenta()
    {
            if ($_POST['id_clienteVenta'] != null) {

                $datos = array(
                    "id_cliente" => $_POST['id_clienteVenta'],
                    "responsable" => $_SESSION['nombreempleado'],
                );

                $respuesta = ventascontrolador::ctrRegistrarVenta($datos);
                if ($respuesta == "ok") {
                    $response = array(
                        'response' => 'true'
                    );
                } else {
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

$resp = new registrarVentaajax();
$resp->ajaxregistroVenta();