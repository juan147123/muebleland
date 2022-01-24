<?php
require_once '../../controller/factura_compra_controller.php';
require_once '../../model/factura_compra_model.php';
session_start();
class listarfacturacompraajax
{

    public function ajaxlistarfacturacompra()
    {
        $response = facturacompracontrolador::ctrListarTablaFacturaCompra();

        for ($i = 0; $i < count($response); $i++) {
            $imagen =  '\'' . $response[$i]["imagen"] . '\'';
            if ($response[$i]['estado_fac'] == "Sin Productos") {
                $response[$i]["estado_fac"] = '
                <div class="badge bg-pill bg-soft-info font-size-16">Sin Productos</div>';
                $response[$i]['detalle_fac'] = '
                        <td>
                        <button type="button" class="btn btn-success btn-sm m-0" data-bs-toggle="modal" data-bs-target="#mdldetallefacturadocompraadd" onclick="btnverdetallefacturaCompra('.$response[$i]['idfac'].');"><i class="fas fa-plus"></i></button>
                        </td>';
            } else if ($response[$i]['estado_fac'] == "Facturado") {
                $response[$i]["estado_fac"] = '
                <div class="badge bg-pill bg-soft-success font-size-16">Facturado</div>';
                $response[$i]['detalle_fac'] = '
                    <td>
                    <button type="button" class="btn btn-success btn-sm m-0" data-bs-toggle="modal" data-bs-target="#mdldetallefacturadocompra" onclick="btnverdetallefacturaCompra2('.$response[$i]['idfac'].');"><i class="fas fa-boxes"></i></button>
                    </td>';
            } else if ($response[$i]['estado_fac'] == "Almacenado Completo") {
                $response[$i]["estado_fac"] = '
                    <div class="btn-group w-100">
                    <button class="btn btn-primary btn-sm m-0 dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Almacenado Completo</button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            <button class="dropdown-item" type="button" onclick="btnActualizarestadofacturaculminada(' . $response[$i]["idfac"] . ');">Culminar Factura</button>
                        </div>
                    </div>';
                $response[$i]['detalle_fac'] = '
                    <td>
                    <button type="button" class="btn btn-success btn-sm m-0" data-bs-toggle="modal" data-bs-target="#mdldetallefacturadocompra" onclick="btnverdetallefacturaCompra2('.$response[$i]['idfac'].');"><i class="fas fa-boxes"></i></button>
                    </td>';
            } else if ($response[$i]['estado_fac'] == "Factura Culminada") {
                $response[$i]["estado_fac"] = '
                        <span class="badge badge-info p-2">Factura Culminada</span>';
                $response[$i]['detalle_fac'] = '
                    <td>
                    <button class="dropdown-item" type="button" onclick="btnActualizarestadofacturaculminada(' . $response[$i]["idfac"] . ');">Culminar Factura</button>
                    </td>';
            }
            $response[$i]['acciones'] = '
                    <td>
                    <button type="button" data-toggle="modal" data-target="#eliminarModal" class="btn btn-danger btn-sm m-0" onclick="btnEliminarFacturaCompra(' . $response[$i]["idfac"] . ');eliminarimagenFact(' . $imagen . ');"><i class="fa fa-trash"></i></button>
                    </td>';
            $response[$i]['imagen'] = '
                    <td>
                    <button type="button" data-toggle="modal " data-target="#mdlimagen" class="btn btn-info btn-sm m-0" onclick="mostrar(' . $imagen . ');"><i class="fas fa-image"></i></button>
                    </td>';
            if ($response[$i]['cod_orcompra'] == "") {
                $response[$i]['cod_orcompra'] = '
                        <td>
                        Sin Orden de Compra
                        </td>';
            }
        }
        echo json_encode($response);
    }
}
$resp = new listarfacturacompraajax();
$resp->ajaxlistarfacturacompra();
