<?php
session_start();
include '../../controller/login_controller.php';
include '../../model/login_model.php';
require_once "../../extensiones/encriptacion.php";
class LoginAjax
{
    public function validar()
    {
        if (isset($_POST['usuario']) && isset($_POST['contrasena'])) {
            if ($_POST['usuario'] != null && $_POST['contrasena'] != null) {

                $usuario = $_POST['usuario'];
                $contrasena = $_POST['contrasena'];
                $resultadocontra = usuariocontrolador::ctrobtenercontrasena($usuario);
                $datoscontra = [];
                if (!empty($resultadocontra)) {
                    foreach ($resultadocontra as $row) {
                        array_push($datoscontra, $row);
                    }
                } else {
                    $response = array(
                        'response' => 'error'
                    );
                }
                if (!empty($datoscontra)) {
                    $datacontra = Encriptacion::decryption($datoscontra[0]);
                    if ($contrasena == $datacontra) {
                        $respuesta = usuariocontrolador::ctringresoempleado($usuario, $datoscontra[0]);
                        $datosbd = loginmodelo::obtenerdatos($usuario, $datoscontra[0]);
                        $informacion = [];
                        if (is_array($datosbd) || is_object($datosbd)) {
                            foreach ($datosbd as $datos) {
                                array_push($informacion, $datos);
                            }
                        }

                        if ($respuesta == "ok") {
                            $_SESSION['iniciarSesion'] = 'ok';
                            $_SESSION['nombreempleado'] = $informacion[0];
                            $_SESSION['descripcion'] = $informacion[1];

                            if ($informacion[1] == "administrador") {
                                $response = array(
                                    'response' => 'true'
                                );
                            } else if ($informacion[1] == "ventas") {
                                $response = array(
                                    'response' => 'ventas'
                                );
                            } else if ($informacion[1] == "almacen") {
                                $response = array(
                                    'response' => 'almacen'
                                );
                            }
                        } else {
                            $response = array(
                                'response' => 'error'
                            );
                        }
                    } else {
                        $response = array(
                            'response' => 'error'
                        );
                    }
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
