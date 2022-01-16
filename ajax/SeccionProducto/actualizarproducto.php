<?php

require_once '../../controller/productos_controller.php';
require_once '../../model/productos_model.php';

class actualizarprtoductoajax
{
    public function ajaxactualizarproducto()
    {
        if ($_POST['DescripcionProdEditar'] != null && $_POST['CodigoCatEditar'] != null && $_POST['PrecioCompraEditar'] != null && $_POST['PorcentajeganEditar'] != null && $_POST['PrecioVentaEditar'] != null && $_POST['modeloprodEditar'] != null && $_POST['idMarcaEditar'] != null && $_POST['idColorEditar'] != null && $_POST['stockprodEditar'] != null) {
            
            
            $uploads_dir = '../../views/productosimg';
            $tmp_namePR = $_FILES["imagenPR"]["tmp_name"];
            $namePR = basename($_FILES["imagenPR"]["name"]);

            if($tmp_namePR =="" && $namePR ==""){
                $name =$_POST['imagenprodEditar'];
            }else{
                $name=$namePR;
                $imag =$_POST['imagenprodEditar'];
                unlink("../../views/productosimg/$imag");
                move_uploaded_file($tmp_namePR, "$uploads_dir/$namePR");
            }

            
            
            $datos = array(
                "DescripcionProd" => $_POST['DescripcionProdEditar'],
                "CodigoCat" => $_POST['CodigoCatEditar'],
                "PrecioCompra" => $_POST['PrecioCompraEditar'],
                "porcentaje" => $_POST['PorcentajeganEditar'],
                "PrecioVenta" => $_POST['PrecioVentaEditar'],
                "Modelo" => $_POST['modeloprodEditar'],
                "idmarca" => $_POST['idMarcaEditar'],
                "idColor" => $_POST['idColorEditar'],
                "Stock" => $_POST['stockprodEditar'],
                "Imagen"=>$name,
                "id_prod"=>$_POST['idprodeditar'],
            );
            $respuesta = productoscontroller::ctrActualizarProducto($datos);
            if ($respuesta == "ok") {
                $response = array(
                    'response' => 'true'
                );
            } else {
                if ($respuesta == "error") {
                    $response = array(
                        'response' => 'error'
                    );
                }
            }
            echo json_encode($response);
        }
    }
}

$resp = new actualizarprtoductoajax();
$resp->ajaxactualizarproducto();
