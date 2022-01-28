<?php
require_once '../../controller/usuarios_controller.php';
require_once '../../model/usuarios_model.php';
class eliminarusuario{
    public function ajaxEliminarusuarioPorID(){
        $id_usuario = $_POST["id_usuario"];
        $response = usuarioscontroller::ctrEliminarUsuario_x_ID($id_usuario);
        echo json_encode($response);
    }
}
if(isset($_POST["id_usuario"])){
    $id_usuario = new eliminarusuario();
    $id_usuario->id_usuario = $_POST["id_usuario"];
    $id_usuario->ajaxEliminarusuarioPorID();
}