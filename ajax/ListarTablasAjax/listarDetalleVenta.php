<?php
require_once '../../controller/ventas_controller.php';
require_once '../../model/ventas_model.php';

class Listardetalleventa
{
    public function ajaxListarDetalleVenta()
    {
        $id_venta = $this->id_venta;
        $response = ventascontrolador::ctrListarDetalleVenta($id_venta);
        for ($i = 0; $i < count($response); $i++) {
            $response[$i]['acciones'] = '
            <div class="d-flex justify-content-center">
                <button type="button" data-toggle="modal" data-target="#eliminarModal" class="btn btn-danger btn-sm m-0" onclick="btnEliminarDetalleVenta(' . $response[$i]["id_dventa"] . ');"><i class="fa fa-trash"></i></button>
            </div>';
        }
        echo json_encode($response);
    }
}
if (isset($_POST["id_venta"])) {
    $id_venta = new Listardetalleventa();
    $id_venta->id_venta = $_POST["id_venta"];
    $id_venta->ajaxListarDetalleVenta();
}