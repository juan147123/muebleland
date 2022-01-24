<?php
require_once '../../controller/factura_compra_controller.php';
require_once '../../model/factura_compra_model.php';

class EliminarimagenFacturaCAjax{
    public function ajaxEliminarimagenFacturaC(){
        $imagen = $this->imagen;
        $response = unlink("../../views/facturas/$imagen");
        echo json_encode($response);
    }
}

if(isset($_POST["imagen"])){
    $imagen = new EliminarimagenFacturaCAjax();
    $imagen->imagen = $_POST["imagen"];
    $imagen->ajaxEliminarimagenFacturaC();
}

?>