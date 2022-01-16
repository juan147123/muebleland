<?php
require_once '../../controller/cliente_controller.php';
require_once '../../model/cliente_model.php';
class eliminarcliente{
    public function ajaxEliminarclientePorID(){
        $NIT = $_POST["NIT"];
        $response = clientecontroller::ctrEliminarCliente_x_ID($NIT);
        echo json_encode($response);
    }
}
if(isset($_POST["NIT"])){
    $NIT = new eliminarcliente();
    $NIT->id_trabajador = $_POST["NIT"];
    $NIT->ajaxEliminarclientePorID();
}