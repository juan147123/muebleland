<?php
require_once '../../controller/proveedor_controller.php';
require_once '../../model/proveedor_model.php';
class listarproveedorajax
{

    public function ajaxlistarProveedor()
    {

        $response = proveedorcontroller::ctrListarTablaProveedor();


        for ($i = 0; $i < count($response); $i++) {
            if ($response[$i]["Estado"] == 'ACTIVO') {
                $response[$i]["Estado"] = ' <div class="badge bg-pill bg-soft-success font-size-12">ACTIVO</div>';
            } else if ($response[$i]["Estado"] == 'INACTIVO') {
                $response[$i]["Estado"] = ' <div class="badge bg-pill bg-soft-danger font-size-12">INACTIVO</div>';
            }
            $response[$i]['acciones'] = '
                    <div ">
                    <button type="button" class="btn btn-primary btn-sm m-0" data-bs-toggle="modal" data-bs-target="#mdlActualizarProveedor" onclick="btnEditarproveedor(\'' . $response[$i]["NITProveedor"] . '\');"><i class="fa fa-pencil"></i></button>
                    <button type="button" data-toggle="modal" data-target="#eliminarModal" class="btn btn-danger btn-sm m-0" onclick="btnEliminarProveedor(\'' . $response[$i]["NITProveedor"] . '\');"><i class="fa fa-trash"></i></button>
                    </div>';
        }

        echo json_encode($response);
    }
}
$resp = new listarproveedorajax();
$resp->ajaxlistarProveedor();
