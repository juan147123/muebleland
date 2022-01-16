<?php
require_once '../../controller/ventas_controller.php';
require_once '../../model/ventas_model.php';
class listarventasajax
{

    public function ajaxlistarMarcas()
    {

        $response = ventascontrolador::ctrListarTablaventas();


        for ($i = 0; $i < count($response); $i++) {
           
            $response[$i]['acciones'] = '
                    <div ">
                    <button type="button" class="btn btn-primary btn-sm m-0" data-bs-toggle="modal" data-bs-target="#mdlActualizarMarca" onclick="btnEditarMarca('.$response[$i]['id_venta'].');"><i class="fa fa-pencil"></i></button>
                    <button type="button" data-toggle="modal" data-target="#eliminarModal" class="btn btn-danger btn-sm m-0" onclick="btnEliminarMarca('.$response[$i]['id_venta'].');"><i class="fa fa-trash"></i></button>
                    </div>';
        }

        echo json_encode($response);
    }
}
$resp = new listarmarcasajax();
$resp->ajaxlistarMarcas();