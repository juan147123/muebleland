<?php
session_start();
include '../../controller/login_controller.php';
include '../../model/login_model.php';

class LoginAjax
{
    public function validar()
    {
        if (isset($_POST['usuario']) && isset($_POST['contrasena'])) {
            if ($_POST['usuario'] != null && $_POST['contrasena'] != null) {

                $usuario = $_POST['usuario'];
                $contrasena = $_POST['contrasena'];
                $respuesta = usuariocontrolador::ctringresoempleado($usuario, $contrasena);
                $datosbd = loginmodelo::obtenerdatos($usuario, $contrasena);
                $informacion = [];
                if (is_array($datosbd) || is_object($datosbd)) {
                    foreach ($datosbd as $datos) {
                        array_push($informacion, $datos);
                    }
                }

                if ($respuesta == "ok") {
                    $response = array(
                        'response' => 'true'
                    );
                    $_SESSION['iniciarSesion'] = 'ok';
                    $_SESSION['nombreempleado'] = $informacion[0];
                    $_SESSION['descripcion'] = $informacion[1];
                } else {
                    $response = array(
                        'response' => 'error'
                    );
                }
                echo json_encode($response);
            }
        }
    }
}

$obj = new LoginAjax();
$obj->validar();
