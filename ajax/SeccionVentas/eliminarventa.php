<?php
require_once "../../controller/ventas_controller.php";
require_once '../../model/ventas_model.php';
class eliminarventa{
    public function ajaxEliminarventaPorID(){
        $id_venta = $_POST["id_venta"];
        $response = ventascontrolador::ctrEliminarVentas_x_ID($id_venta);
        echo json_encode($response);
    }
}
if(isset($_POST["id_venta"])){
    $id_venta = new eliminarventa();
    $id_venta->id_venta = $_POST["id_venta"];
    $id_venta->ajaxEliminarventaPorID();
}