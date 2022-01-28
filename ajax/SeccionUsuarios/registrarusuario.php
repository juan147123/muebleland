<?php
require_once "../../controller/usuarios_controller.php";
require_once '../../model/usuarios_model.php';
require_once "../../extensiones/encriptacion.php";

class registrarusuariosajax
{
    public function ajaxregistroUsuario()
    {
        if ($_POST['selectrab'] != null && $_POST['selectcargo'] != null && $_POST['email'] != null && $_POST['pass'] != null && $_POST['passconfirmar'] != null) {
            $contra = $_POST['pass'];
            $contra2 = $_POST['passconfirmar'];
            if ($contra != $contra2) {
                $response = array(
                    'response' => 'no coinciden'
                );
            }
            else{
                $datos = array(
                    "id_empleado" => $_POST['selectrab'],
                    "id_cargo" => $_POST['selectcargo'],
                    "correo_usuario" => $_POST['email'],
                    "contrasena" =>Encriptacion::encryption($_POST['pass']) 
                );
    
                $respuesta = usuarioscontroller::ctrRegistrarUsuario($datos);
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
            
        }
        echo json_encode($response);
    }
}

$resp = new registrarusuariosajax();
$resp->ajaxregistroUsuario();
