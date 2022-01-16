<?php
require_once "../../controller/empleado_controller.php";
require_once '../../model/empleado_model.php';

class reingresarEmpleadoporidajax{
    public function ajaxReingresarEmpleadoPorID(){

        $id_trabajador = $this->id_trabajador;

        $response = empleadoscontroller::ctrReingresarEmpleado($id_trabajador);
        return $response;
    }
}

if(isset($_POST["id_trabajador"])){
    $id_trabajador = new reingresarEmpleadoporidajax();
    $id_trabajador->id_trabajador = $_POST["id_trabajador"];
    $id_trabajador->ajaxReingresarEmpleadoPorID();
}