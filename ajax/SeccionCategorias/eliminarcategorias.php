<?php
require_once '../../controller/categorias_controller.php';
require_once '../../model/categorias_model.php';
class eliminarcategoria{
    public function ajaxEliminarcategoriaPorID(){
        $CodigoCat = $_POST["CodigoCat"];
        $response = categoriascontrolador::ctrEliminarCategoria_x_ID($CodigoCat);
        echo json_encode($response);
    }
}
if(isset($_POST["CodigoCat"])){
    $CodigoCat = new eliminarcategoria();
    $CodigoCat->CodigoCat = $_POST["CodigoCat"];
    $CodigoCat->ajaxEliminarcategoriaPorID();
}