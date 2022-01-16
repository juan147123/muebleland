<?php

require_once "../../controller/empleado_controller.php";
require_once '../../model/empleado_model.php';

class registroempleadoajax
{
    public function ajaxregistroempleadoes()
    {
        if (isset($_POST['correo_trab'],$_POST['numero_documento'])) {  
            if ($_POST['tipo_documento']!=null && $_POST['numero_documento']!=null && $_POST['nombres_trab']!=null && $_POST['direccion_trab'] != null && $_POST['correo_trab'] != null && $_POST['inicio_lab'] != null && $_POST['tipo_contrato'] != null) {
                if ($_POST['telefono_trab']== ""){ 
                $telefono="sin registro";
                }else{
                $telefono = $_POST['telefono_trab'];
                }

                $estado = 'activo';
                $datos = array(
                    "nombres_trab" => $_POST['nombres_trab'],
                    "direccion_trab" => $_POST['direccion_trab'],
                    "correo_trab" => $_POST['correo_trab'],
                    "telefono_trab" =>$telefono,
                    "tipo_documento" => $_POST['tipo_documento'],
                    "numero_documento" => $_POST['numero_documento'],
                    "estado" => $estado,
                    "inicio_lab" => $_POST['inicio_lab'],
                    "tipo_contrato" => $_POST['tipo_contrato'],
                    );
                $respuesta = empleadoscontroller::ctrRegistrarEmpleado($datos); 
                if ($respuesta == "ok") { 
                    $response = array( 
                        'response' => 'true'
                    );
                } else {
                    if ($respuesta == "repeat") {
                        $response = array(
                            'response' => 'repeat'
                        );
                    }
                }
            }
            echo json_encode($response); 
        }
    }
}

$resp = new registroempleadoajax();
$resp->ajaxregistroempleadoes();
