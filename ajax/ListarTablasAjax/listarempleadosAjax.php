<?php
require_once '../../controller/empleado_controller.php';
require_once '../../model/empleado_model.php';
session_start();
class listarempleadosajax
{

    public function ajaxlistarEmpleados()
    {

        $response = empleadoscontroller::ctrListarEmpleados();


        for ($i = 0; $i < count($response); $i++) {
            if ($response[$i]["estado"] == 'activo') {
                $response[$i]["estado"] = ' <div class="badge bg-pill bg-soft-success font-size-12">Activo</div>';
                $response[$i]['acciones'] = '
                    <div ">
                    <button type="button" class="btn btn-primary btn-sm m-0" data-bs-toggle="modal" data-bs-target="#mdlActualizarEmpleado" onclick="btnEditarEmpleado(' . $response[$i]["id_trabajador"] . ');"><i class="fa fa-pencil"></i></button>
                    <button type="button" data-toggle="modal" data-target="#eliminarModal" class="btn btn-danger btn-sm m-0" onclick="btnEliminarEmpleado(' . $response[$i]["id_trabajador"] . ');"><i class="fa fa-trash"></i></button>
                    </div>';
            } else if ($response[$i]["estado"] == 'ausente') {
                $response[$i]["estado"] = ' <div class="badge bg-pill bg-soft-warning font-size-12">Ausente</div>';
                $response[$i]['acciones'] = '
                    <td>
                    <button type="button" class="btn btn-success btn-sm m-1" onclick="btnReingresarEmpleado(' . $response[$i]["id_trabajador"] . ');"><i class="fa fa-door-open"></i></button>
                    </td>';
            } else {
                $response[$i]["estado"] = ' <div class="badge bg-pill bg-soft-danger font-size-12">Inactivo</div>';
                $response[$i]['acciones'] = '
                    <td>
                    <button type="button" class="btn btn-success btn-sm m-1" onclick="btnReingresarEmpleado(' . $response[$i]["id_trabajador"] . ');"><i class="fa fa-door-open"></i></button>
                    </td>';
            }
        }

        echo json_encode($response);
    }
}
$resp = new listarempleadosajax();
$resp->ajaxlistarEmpleados();
