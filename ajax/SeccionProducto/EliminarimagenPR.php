<?php

class EliminarimagenPRjax{
    public function ajaxEliminarimagenPR(){
        $imagen = $this->imagen;
        if($imagen!="default.png"){

            $response = unlink("../../views/productosimg/$imagen");
        }
        echo json_encode($response);
    }
}

if(isset($_POST["imagen"])){
    $imagen = new EliminarimagenPRjax();
    $imagen->imagen = $_POST["imagen"];
    $imagen->ajaxEliminarimagenPR();
}

?>