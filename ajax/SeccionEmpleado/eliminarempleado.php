<?php
require_once "../../controller/empleado_controller.php";
require_once '../../model/empleado_model.php';
class eliminartrabajajador{
    public function ajaxEliminarTrabajadoresPorID(){
        $id_trabajador = $this->id_trabajador;
        $response = empleadoscontroller::ctrEliminarEmpleado_x_ID($id_trabajador);
        echo json_encode($response);
    }
}
if(isset($_POST["id_trabajador"])){
    $id_trabajador = new eliminartrabajajador();
    $id_trabajador->id_trabajador = $_POST["id_trabajador"];
    $id_trabajador->ajaxEliminarTrabajadoresPorID();
}