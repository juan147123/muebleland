<?php
require_once '../../controller/cliente_controller.php';
require_once '../../model/cliente_model.php';
class listarclientesajax
{

    public function ajaxlistarCliente()
    {

        $response = clientecontroller::ctrListarTablaCliente();


        for ($i = 0; $i < count($response); $i++) {
           
            $response[$i]['acciones'] = '
                    <div ">
                    <button type="button" class="btn btn-primary btn-sm m-0" data-bs-toggle="modal" data-bs-target="#mdlactualizarcliente" onclick="btnEditarCliente(\'' . $response[$i]["NIT"] . '\');"><i class="fa fa-pencil"></i></button>
                    <button type="button" data-toggle="modal" data-target="#eliminarModal" class="btn btn-danger btn-sm m-0" onclick="btnEliminarCliente(\'' . $response[$i]["NIT"] . '\');"><i class="fa fa-trash"></i></button>
                    </div>';
        }

        echo json_encode($response);
    }
}
$resp = new listarclientesajax();
$resp->ajaxlistarCliente();
