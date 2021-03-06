<?php
require_once '../../controller/productos_controller.php';
require_once '../../model/productos_model.php';
session_start();
class listarproductosajax
{

    public function ajaxlistarProductos()
    {
        if ($_SESSION['descripcion'] == "administrador") {

            $response = productoscontroller::ctrListarProductos();


            for ($i = 0; $i < count($response); $i++) {
                $imagen =  '\'' . $response[$i]["Imagen"] . '\'';
                $response[$i]['acciones'] = '
                        <div ">
                        <button type="button" class="btn btn-primary btn-sm m-0" data-bs-toggle="modal" data-bs-target="#mdlactualizarproductos" onclick="btnMostrarproducto(' . $response[$i]['id_prod'] . ');ListarCateProdEditar();"><i class="fa fa-pencil"></i></button>
                        <button type="button" data-toggle="modal" data-target="#eliminarModal" class="btn btn-danger btn-sm m-0" onclick="btnEliminarProducto(' . $response[$i]['id_prod'] . ');eliminarimagenPR(' . $imagen . ');"><i class="fa fa-trash"></i></button>
                        </div>';
            }
            echo json_encode($response);
        } else if ($_SESSION['descripcion'] == "ventas") {
            $response = productoscontroller::ctrListarProductos();
            for ($i = 0; $i < count($response); $i++) {
                $imagen =  '\'' . $response[$i]["Imagen"] . '\'';
                $response[$i]['acciones'] = '
                        <div ">
                        <button type="button" class="btn btn-dark btn-sm m-0" data-bs-toggle="modal" data-bs-target="#" onclick=""><i class="fas fa-lock"></i></button>
                        </div>';
            }
            echo json_encode($response);
        } if ($_SESSION['descripcion'] == "almacen") {

            $response = productoscontroller::ctrListarProductos();


            for ($i = 0; $i < count($response); $i++) {
                $imagen =  '\'' . $response[$i]["Imagen"] . '\'';
                $response[$i]['acciones'] = '
                        <div ">
                        <button type="button" class="btn btn-primary btn-sm m-0" data-bs-toggle="modal" data-bs-target="#mdlactualizarproductos" onclick="btnMostrarproducto(' . $response[$i]['id_prod'] . ');ListarCateProdEditar();"><i class="fa fa-pencil"></i></button>
                        <button type="button" data-toggle="modal" data-target="#eliminarModal" class="btn btn-danger btn-sm m-0" onclick="btnEliminarProducto(' . $response[$i]['id_prod'] . ');eliminarimagenPR(' . $imagen . ');"><i class="fa fa-trash"></i></button>
                        </div>';
            }
            echo json_encode($response);
        } 

    }
}
$resp = new listarproductosajax();
$resp->ajaxlistarProductos();
