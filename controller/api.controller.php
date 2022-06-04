<?php
class ControladorApi
{
    static public function ctrConsultarRuc($ruc)
    {
        $ruta = "https://ruc.com.pe/api/v1/consultas";
        $token = "aqui va el token que te generan";
        $rucaconsultar = $ruc;
        $data = array(
            "token"    => $token,
            "ruc"   => $rucaconsultar
        );

        $data_json = json_encode($data);

        // Invocamos el servicio a ruc.com.pe
        // Ejemplo para JSON
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $ruta);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
            )
        );
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $respuesta  = curl_exec($ch);
        curl_close($ch);
        $leer_respuesta = json_decode($respuesta, true);
        if (isset($leer_respuesta['error'])) {
            //Mostramos los errores si los hay
            return 'error';
        } else {
            //Mostramos la respuesta
            return $leer_respuesta;
        }
    }

    static public function ctrConsultarDNI($dni)
    {
   
        $token = 'aqui va el token que te generan';
        $dniaconsultar = $dni;

        // Iniciar llamada a API
        $curl = curl_init();

        // Buscar dni
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.apis.net.pe/v1/dni?numero=' . $dniaconsultar,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 2,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Referer: https://apis.net.pe/consulta-dni-api',
                'Authorization: Bearer ' . $token
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        // Datos listos para usar
        $persona = json_decode($response,true);
        if (isset($persona)) {
            //Mostramos los errores si los hay
            return $persona;
            
        } else {
            //Mostramos la respuesta
            return 'error';
        }
    }
}