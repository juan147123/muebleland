<?php

require_once '../../controller/productos_controller.php';
require_once '../../model/productos_model.php';

class registroProductoajax
{
    public function ajaxregistroproducto()
    {
        if ($_POST['DescripcionProd'] != null && $_POST['CodigoCat'] != null && $_POST['PrecioCompra'] != null && $_POST['Porcentajegan'] != null && $_POST['PrecioVenta'] != null && $_POST['modeloprod'] != null && $_POST['idMarca'] != null && $_POST['idColor'] != null && $_POST['stockprod'] != null) {
            
            $uploads_dir = '../../views/productosimg';
            $tmp_name = $_FILES["imagenNE"]["tmp_name"];
            $name = basename($_FILES["imagenNE"]["name"]);

            if($tmp_name =="" && $name ==""){
                $name="default.png";
            }else{
                move_uploaded_file($tmp_name, "$uploads_dir/$name");
            }

            $datos = array(
                "DescripcionProd" => $_POST['DescripcionProd'],
                "CodigoCat" => $_POST['CodigoCat'],
                "PrecioCompra" => $_POST['PrecioCompra'],
                "porcentaje" => $_POST['Porcentajegan'],
                "PrecioVenta" => $_POST['PrecioVenta'],
                "Modelo" => $_POST['modeloprod'],
                "idmarca" => $_POST['idMarca'],
                "idColor" => $_POST['idColor'],
                "Stock" => $_POST['stockprod'],
                "Imagen"=>$name
            );
            $respuesta = productoscontroller::ctrRegistrarProductos($datos);
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
            echo json_encode($response);
        }
    }
}

$resp = new registroProductoajax();
$resp->ajaxregistroproducto();