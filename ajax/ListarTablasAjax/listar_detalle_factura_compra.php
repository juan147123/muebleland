<?php
require_once '../../controller/factura_compra_controller.php';
require_once '../../model/factura_compra_model.php';

class listarDetalleFacturadoCompra
{
    public function ajaxlistarDetalleFacturaCompra()
    {
        $response = facturacompracontrolador::ctrlListarDetalleFacturaCompra($_POST['id']);
        for ($i = 0; $i < count($response); $i++) {
            if ($response[$i]['estado'] == 'pendiente') {

                $response[$i]['estado'] = '<div class="badge bg-pill bg-soft-info font-size-16">Pendiente</div>';
                $response[$i]['acciones'] = '
                    <td>
                    <button type="button" class="btn btn-primary btn-sm m-0" data-bs-toggle="modal" data-bs-target="#mdlActualizarDetFacCom" onclick="btnEditarDetFacCom('.$response[$i]['id'].');"><i class="fa fa-pencil"></i></button>
                    <button type="button" data-toggle="modal" data-target="#eliminarModal" class="btn btn-danger btn-sm m-0" onclick="btnEliminarDetFacturaCompra(' . $response[$i]["id"] . ');"><i class="fa fa-trash"></i></button>
                    </td>
                    ';
                    $response[$i]['acciones2'] = '
                    <td>
                    <button type="button" class="btn btn-primary btn-sm m-0" data-bs-toggle="modal" data-bs-target="#mdlActualizarDetFacCom2" onclick="btnEditarDetFacCom('.$response[$i]['id'].');"><i class="fa fa-pencil"></i></button>
                    <button type="button" class="btn btn-primary btn-sm m-0" data-toggle="modal" data-target="#" onclick="btnActualizarEstadoAlmacenadoDetalleFacturaCompra(' . $response[$i]["id"] . ');"><i class="fas fa-archive"></i></button>
                    </td>
                    ';
            } else if ($response[$i]['estado'] == 'almacenado'){
                $response[$i]['estado'] = '<div class="badge bg-pill bg-soft-success font-size-16">Almacenado</div>';
                $response[$i]['acciones2'] = '
                    <td>
                    <div class="badge bg-pill bg-soft-success font-size-16"><i class="fas fa-check"></i></div>
                    </td>
                    ';
            }
        }
        echo json_encode($response);
    }
}
$resp = new listarDetalleFacturadoCompra();
$resp->ajaxlistarDetalleFacturaCompra();
