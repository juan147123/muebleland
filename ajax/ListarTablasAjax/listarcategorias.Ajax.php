<?php
require_once '../../controller/categorias_controller.php';
require_once '../../model/categorias_model.php';
class listarcategoriasajax
{

    public function ajaxlistarCategorias()
    {

        $response = categoriascontrolador::ctrListarTablaCategorias();


        for ($i = 0; $i < count($response); $i++) {
           
            $response[$i]['acciones'] = '
                    <div ">
                    <button type="button" class="btn btn-primary btn-sm m-0" data-bs-toggle="modal" data-bs-target="#mdlActualizarCategoria" onclick="btnEditarCategoria('.$response[$i]['CodigoCat'].');"><i class="fa fa-pencil"></i></button>
                    <button type="button" data-toggle="modal" data-target="#eliminarModal" class="btn btn-danger btn-sm m-0" onclick="btnEliminarCategoria('.$response[$i]['CodigoCat'].');"><i class="fa fa-trash"></i></button>
                    </div>';
        }

        echo json_encode($response);
    }
}
$resp = new listarcategoriasajax();
$resp->ajaxlistarCategorias();