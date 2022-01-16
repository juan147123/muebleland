<?php
require_once '../../controller/colores_controller.php';
require_once '../../model/colores_model.php';
class listarcoloresajax
{

    public function ajaxlistarColores()
    {

        $response = colorcontrolador::ctrListarTablaColor();


        for ($i = 0; $i < count($response); $i++) {
           
            $response[$i]['acciones'] = '
                    <div ">
                    <button type="button" class="btn btn-primary btn-sm m-0" data-bs-toggle="modal" data-bs-target="#mdlActualizarColor" onclick="btnEditarColor('.$response[$i]['id_color'].');"><i class="fa fa-pencil"></i></button>
                    <button type="button" data-toggle="modal" data-target="#eliminarModal" class="btn btn-danger btn-sm m-0" onclick="btnEliminarColor('.$response[$i]['id_color'].');"><i class="fa fa-trash"></i></button>
                    </div>';
        }

        echo json_encode($response);
    }
}
$resp = new listarcoloresajax();
$resp->ajaxlistarColores();