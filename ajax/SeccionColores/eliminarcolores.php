<?php
require_once '../../controller/colores_controller.php';
require_once '../../model/colores_model.php';
class eliminarcolor{
    public function ajaxEliminarcolorPorID(){
        $id_color = $_POST["id_color"];
        $response = colorcontrolador::ctrEliminarColor_x_ID($id_color);
        echo json_encode($response);
    }
}
if(isset($_POST["id_color"])){
    $id_color = new eliminarcolor();
    $id_color->id_color = $_POST["id_color"];
    $id_color->ajaxEliminarcolorPorID();
}