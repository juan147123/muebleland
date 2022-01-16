<?php
require_once '../../controller/proveedor_controller.php';
require_once '../../model/proveedor_model.php';


class eliminarproveedorajax
{
    public function ajaxEliminarproveedor()
    {
        $NITProveedor = $this->NITProveedor;
        $respuesta = proveedorcontroller::ctrEliminarProveedor_x_ID($NITProveedor);
        echo json_encode($respuesta);
    }
}

if (isset($_POST["NITProveedor"])) {
    $NITProveedor = new eliminarproveedorajax();
    $NITProveedor->NITProveedor = $_POST["NITProveedor"];
    $NITProveedor->ajaxEliminarproveedor();
}
