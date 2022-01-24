<?php
require_once '../../controller/ventas_controller.php';
require_once '../../model/ventas_model.php';
class listarventasEfectuadasajax
{

    public function ajaxlistarVentasEfectuadas()
    {

        $response = ventascontrolador::ctrListarTablaventasEfectuadas();
        for ($i = 0; $i < count($response); $i++) {
            if ($response[$i]['tipo_compro'] == "Factura") {

                $response[$i]['tipo_compro'] = ' <div class="badge bg-pill bg-soft-info font-size-16">Factura</div>';
            }else{
                $response[$i]['tipo_compro'] = ' <div class="badge bg-pill bg-soft-info font-size-16">Boleta</div>';
            }
            $response[$i]['ver'] = '
                    <div ">
                    <button type="button" class="btn btn-info btn-sm m-0" data-bs-toggle="modal" data-bs-target="#mdldetalleventa" onclick="btnverdetalleventaEfectuada(' . $response[$i]['id_venta'] . ');btnMostrarMontoVEfectuada(' . $response[$i]['id_venta'] . ');"><i class="fas fa-search-dollar"></i></button>
                    </div>';

            $response[$i]['imprimir'] = '
                    <div ">
                    <a  href="' . $response[$i]['rutafact'] . '"  class="btn btn-danger btn-sm m-0" target="_blank">Imprimir<i class="fas fa-file-pdf"></i></a>
                    </div>';
        }

        echo json_encode($response);
    }
}
$resp = new listarventasEfectuadasajax();
$resp->ajaxlistarVentasEfectuadas();
