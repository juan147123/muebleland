<?php
require_once "../../controller/ventas_controller.php";
require_once '../../model/ventas_model.php';
class eliminarTodoDetalleventa{
    public function ajaxEliminarTodoDetalleventaPorID(){
        $id_dventa = $_POST["id_dventa"];
        $response = ventascontrolador::ctrEliminarTodoDetalleVentas_x_ID($id_dventa);
        echo json_encode($response);
    }
}
if(isset($_POST["id_dventa"])){
    $id_dventa = new eliminarTodoDetalleventa();
    $id_dventa->id_dventa = $_POST["id_dventa"];
    $id_dventa->ajaxEliminarTodoDetalleventaPorID();
}