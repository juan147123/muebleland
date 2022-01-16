<?php
require_once '../../controller/marcas_controller.php';
require_once '../../model/marcas_model.php';
class eliminarmarca{
    public function ajaxEliminarmarcaPorID(){
        $id_marca = $_POST["id_marca"];
        $response = marcascontrolador::ctrEliminarMarca_x_ID($id_marca);
        echo json_encode($response);
    }
}
if(isset($_POST["id_marca"])){
    $id_marca = new eliminarmarca();
    $id_marca->id_marca = $_POST["id_marca"];
    $id_marca->ajaxEliminarmarcaPorID();
}