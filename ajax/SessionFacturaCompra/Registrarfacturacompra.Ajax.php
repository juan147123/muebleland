<?php
require_once '../../controller/factura_compra_controller.php';
require_once '../../model/factura_compra_model.php';
class registrarfacturacompraajax
{
    public function ajaxregistrofacturacompra()
    {
        if (
            $_POST['tipo_compfc'] != null && $_POST['codigofacfc'] != null && $_POST['fechaemisionfc'] != null &&  $_POST['fechavencimientofc'] != null &&
            $_POST['condicion_pagofc'] != null
        ) {
            $uploads_dir = '../../views/facturas';
            $tmp_name = $_FILES["imagen"]["tmp_name"];
            $name = basename($_FILES["imagen"]["name"]);
            move_uploaded_file($tmp_name, "$uploads_dir/$name");
            $datos = array(
                "idprov" => $_POST['idprovfc'],
                "tipo_comp" => $_POST['tipo_compfc'],
                "codigofac" => $_POST['codigofacfc'],
                "fechaemision" => $_POST['fechaemisionfc'],
                "fechavencimiento" => $_POST['fechavencimientofc'],
                "cod_orcompra" => $_POST['cod_orcomprafc'],
                "condicion_pago" => $_POST['condicion_pagofc'],
                "imagen" => $name,
            );
            $respuesta = facturacompracontrolador::ctrRegistrarFacturaCompra($datos);
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

$resp = new registrarfacturacompraajax();
$resp->ajaxregistrofacturacompra();
