<?php
require_once "../../controller/ventas_controller.php";
require_once '../../model/ventas_model.php';
class eliminarDetalleventa{
    public function ajaxEliminarDetalleventaPorID(){
        $id_dventa = $_POST["id_dventa"];
        $response = ventascontrolador::ctrEliminarDetalleVentas_x_ID($id_dventa);
        echo json_encode($response);
    }
}
if(isset($_POST["id_dventa"])){
    $id_dventa = new eliminarDetalleventa();
    $id_dventa->id_dventa = $_POST["id_dventa"];
    $id_dventa->ajaxEliminarDetalleventaPorID();
}