<?php
require_once '../../controller/productos_controller.php';
require_once '../../model/productos_model.php';


class eliminarproductosajax
{
    public function ajaxEliminarproductos()
    {
        $id_prod = $this->id_prod;
        $respuesta = productoscontroller::ctrEliminarProducto_x_ID($id_prod);
        echo json_encode($respuesta);
    }
}

if (isset($_POST["id_prod"])) {
    $id_prod = new eliminarproductosajax();
    $id_prod->id_prod = $_POST["id_prod"];
    $id_prod->ajaxEliminarproductos();
}
