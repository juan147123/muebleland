<?php
require_once '../../controller/usuarios_controller.php';
require_once '../../model/usuarios_model.php';
class listarusuariosajax
{

    public function ajaxlistarUsuarios()
    {

        $response = usuarioscontroller::ctrListarUsuarios();


        for ($i = 0; $i < count($response); $i++) {
           
            $response[$i]['acciones'] = '
                    <div ">
                    <button type="button" class="btn btn-primary btn-sm m-0" data-bs-toggle="modal" data-bs-target="#mdlActualizarMarca" onclick="btnEditarMarca();"><i class="fa fa-pencil"></i></button>
                    <button type="button" data-toggle="modal" data-target="#eliminarModal" class="btn btn-danger btn-sm m-0" onclick="btnEliminarUsuario('.$response[$i]['id_usuario'].');"><i class="fa fa-trash"></i></button>
                    </div>';
        }

        echo json_encode($response);
    }
}
$resp = new listarusuariosajax();
$resp->ajaxlistarUsuarios();