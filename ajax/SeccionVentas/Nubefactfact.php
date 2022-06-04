<?php
require_once "../../controller/ventas_controller.php";
require_once '../../model/ventas_model.php';

class controladornubefact
{
    public static function ejecutarfacturacion()
    {
        if (isset($_POST['idventanub']) && $_POST['idventanub'] != '') {
            $id_venta = $_POST['idventanub'];
            $productosvnt = ventascontrolador::ctrfacturacionNubefact($id_venta);
            $arrayproductos = [];
            if (count($productosvnt) > 0) {
                $cliente = ventascontrolador::ctrfacturacionNubefactdatoscliente($id_venta);
                $ruta = "aqui va tu ruta de nubefact";
                $token = "aqui va tu token de nubefact";
                $totaligv = 0;
                $totaltotal = 0;
                $totalgravado = 0;
                date_default_timezone_set('America/Lima');
                $fechaActual = date('d-m-Y');
                foreach ($productosvnt as $row) {

                    $prodformat = array(
                        "unidad_de_medida"          => "NIU",
                        "codigo"                    => strval($row['CodigoProd']),
                        "descripcion"               => strval($row['DescripcionProd']),
                        "cantidad"                  => strval($row['cantidad']),
                        "valor_unitario"            => strval($row['valor_unitario']),
                        "precio_unitario"           => strval($row['precio_unitario']),
                        "descuento"                 => "",
                        "subtotal"                  => strval($row['subtotal']),
                        "tipo_de_igv"               => "1",
                        "igv"                       => strval($row['igv']),
                        "total"                     => strval($row['total']),
                        "anticipo_regularizacion"   => "false",
                        "anticipo_documento_serie"  => "",
                        "anticipo_documento_numero" => ""
                    );
                    array_push($arrayproductos, $prodformat);
                    $totaligv += $row['igv'];
                    $totaltotal += $row['total'];
                    $totalgravado += $row['subtotal'];
                }
                /* quia de remsion */
                /* ------------asiganr valores---------- */
                $tipocomprob = 0;
                $serie = "";
                $tipodocumento = "";
                $formato = "";
                $valorcompro = $cliente[0]['tipo_compro'];
                $doccliente = strlen($cliente[0]['NIT']);


                if ($valorcompro == "Factura") {
                    $tipocomprob = 1;
                    $serie = "FFF1";
                    $formato = "A4";
                } else {
                    $tipocomprob = 2;
                    $serie = "BBB1";
                    $formato = "TICKET";
                }

                if ($doccliente == 11) {
                    $tipodocumento = "6";
                } else {
                    $tipodocumento = "1";
                }


                /* ------------------------------------- */

                /* valores para nubefact */
                $data = array(
                    "operacion"                => "generar_comprobante",
                    "tipo_de_comprobante"               => strval($tipocomprob),
                    "serie"                             => $serie,
                    "numero"                =>  strval($id_venta),
                    "sunat_transaction"            => "1",
                    "cliente_tipo_de_documento"        => strval($tipodocumento),
                    "cliente_numero_de_documento"    => strval($cliente[0]['NIT']),
                    "cliente_denominacion"              => strval($cliente[0]['razon_social']),
                    "cliente_direccion"                 => strval($cliente[0]['Direccion']),
                    "cliente_email"                     => strval($cliente[0]['Email']),
                    "cliente_email_1"                   => "",
                    "cliente_email_2"                   => "",
                    "fecha_de_emision"                  => $fechaActual,
                    "fecha_de_vencimiento"              => "",
                    "moneda"                            => "1",
                    "tipo_de_cambio"                    => "",
                    "porcentaje_de_igv"                 => "18.00",
                    "descuento_global"                  => "",
                    "descuento_global"                  => "",
                    "total_descuento"                   => "",
                    "total_anticipo"                    => "",
                    "total_gravada"                     => strval($totalgravado),
                    "total_inafecta"                    => "",
                    "total_exonerada"                   => "",
                    "total_igv"                         => strval($totaligv),
                    "total_gratuita"                    => "",
                    "total_otros_cargos"                => "",
                    "total"                             => strval($totaltotal),
                    "percepcion_tipo"                   => "",
                    "percepcion_base_imponible"         => "",
                    "total_percepcion"                  => "",
                    "total_incluido_percepcion"         => "",
                    "detraccion"                        => "false",
                    "observaciones"                     => "",
                    "documento_que_se_modifica_tipo"    => "",
                    "documento_que_se_modifica_serie"   => "",
                    "documento_que_se_modifica_numero"  => "",
                    "tipo_de_nota_de_credito"           => "",
                    "tipo_de_nota_de_debito"            => "",
                    "enviar_automaticamente_a_la_sunat" => "true",
                    "enviar_automaticamente_al_cliente" => "false",
                    "codigo_unico"                      => "",
                    "condiciones_de_pago"               => "",
                    "medio_de_pago"                     => "",
                    "placa_vehiculo"                    => "",
                    "orden_compra_servicio"             => "",
                    "tabla_personalizada_codigo"        => "",
                    "formato_de_pdf"                    => $formato,
                    "items" => $arrayproductos
                );
                $data_json = json_encode($data);

                //Invocamos el servicio de NUBEFACT
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $ruta);
                curl_setopt(
                    $ch,
                    CURLOPT_HTTPHEADER,
                    array(
                        'Authorization: Token token="' . $token . '"',
                        'Content-Type: application/json',
                    )
                );
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $respuesta  = curl_exec($ch);
                curl_close($ch);

                //#### OBSERVAR ###
                $leer_respuesta = json_decode($respuesta, true);
                if (isset($leer_respuesta['errors'])) {
                    //
                    //no hacemos nada, hubo error, dejamos que finalice
                } else {
                    $ruta = strval($leer_respuesta['enlace']);
                    $responseactivatebill = ventascontrolador::ctrActivateBillStateafterValidateResponse($id_venta, $ruta);
                    if ($responseactivatebill == 'error') {
                        // $leer_respuesta = array("errors" => "Ocurrió un error en la Base de Datos","codigo"=>"IEDB");          
                        //ANULANDO FACTURA ENVIADA A NUBEFACT
                        $data_setnull = array(
                            "operacion" => "generar_anulacion",
                            "tipo_de_comprobante" => "1",
                            "serie" => "FFF1",
                            "numero" => strval($id_venta),
                            "motivo" => "ERROR DEL SISTEMA",
                            "codigo_unico" => ""
                        );
                        $data_sendjson = json_encode($data_setnull);
                        curl_setopt($ch, CURLOPT_POST, 1);
                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_sendjson);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        $respuesta  = curl_exec($ch);
                        curl_close($ch);

                        //#### OBSERVAR ###
                        $leer_respuesta = json_decode($respuesta, true);
                        if (isset($leer_respuesta['errors'])) {
                            $leer_respuesta = array("errors" => "Error del sistema y del servicio. La factura fue emitida, pero no pudo ser anulada ante error inesperado del sistema. Anúlela manualmente desde su cuenta de nubefact o póngase en contacto con el equipo de soporte. Para consultas escribir a soporte@nubefact.com o al WhatsApp 924 353365", "codigo" => "TER!");
                        } else {
                            $leer_respuesta = array("errors" => "La factura no pudo ser actualizada en la base de datos por razones desconocidas. Como respuesta se realizó anulación de la misma.", "codigo" => "IEDB");
                        }
                    } else {
                        if ($leer_respuesta['aceptada_por_sunat'] != 1) {
                            $leer_respuesta = array(
                                "info" => "La factura fue enviada, pero sin ser aceptada por SUNAT. Revisar estado en Nubefact",
                                "codigo" => "NABE",
                                "enlace" => $leer_respuesta['enlace']
                            );
                        }
                    }
                }
            } else {
                $leer_respuesta = array("errors" => "Sin elementos", "codigo" => "NEF");
            }
        } else {
            $leer_respuesta = array("errors" => "No se detectó un identificador para la orden de venta.", "codigo" => "NOID");
        }
        echo json_encode($leer_respuesta);
    }
}
$objapi = new controladornubefact();
$objapi::ejecutarfacturacion();
