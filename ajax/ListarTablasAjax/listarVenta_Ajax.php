<?php
require_once '../../controller/ventas_controller.php';
require_once '../../model/ventas_model.php';
class listarventasajax
{

    public function ajaxlistarVentas()
    {

        $response = ventascontrolador::ctrListarTablaventas();
        for ($i = 0; $i < count($response); $i++) {
            $respuesta2 = ventascontrolador::ctrListarDetalleVenta($response[$i]['id_venta']);
            if($response[$i]['estado'] =='sin detalle'){
                $response[$i]['estado']=' <div class="badge bg-pill bg-soft-danger font-size-12">Sin Productos</div>';

            }else if($response[$i]['estado'] =='con detalle'){
                $response[$i]['estado']=' <div class="badge bg-pill bg-soft-info font-size-12">Con Productos</div>';
                $response[$i]['detalle'] = '
                <div>
                <button type="button" class="btn btn-success btn-sm m-0" data-bs-toggle="modal" data-bs-target="#mdlAddDetalleVenta" onclick="ListarCodigosProd();btnverdetalleventa('.$response[$i]['id_venta'].');btnMostrarMonto('.$response[$i]['id_venta'].');btnMostrarVenta('.$response[$i]['id_venta'].');"><i class="fas fa-cart-plus"></i></button>
                <button type="button" class="btn btn-success btn-sm m-0" data-bs-toggle="modal" data-bs-target="#" onclick="actualizarestadovendido('.$response[$i]['id_venta'].');"><i class="fas fa-cash-register"> vender</i></button>
                </div>';
            }
            if(empty($respuesta2)){
                $response[$i]['detalle'] = '
                        <div style="text-align:center">
                        <button type="button" class="btn btn-primary btn-sm m-0" data-bs-toggle="modal" data-bs-target="#mdlAddDetalleVenta" onclick="ListarCodigosProd();btnverdetalleventa('.$response[$i]['id_venta'].');btnMostrarMonto('.$response[$i]['id_venta'].');btnMostrarVenta('.$response[$i]['id_venta'].');"><i class="fas fa-cart-plus"></i></button>
                        </div>';
            }
            $response[$i]['acciones'] = '
                    <div ">
                    <button type="button" class="btn btn-primary btn-sm m-0" data-bs-toggle="modal" data-bs-target="#mdlActualizarVenta" onclick="ListarClientesVentasEditar();btnMostrarVenta('.$response[$i]['id_venta'].');"><i class="fa fa-pencil"></i></button>
                    <button type="button" data-toggle="modal" data-target="#eliminarModal" class="btn btn-danger btn-sm m-0" onclick="btnEliminarVenta('.$response[$i]['id_venta'].');"><i class="fas fa-window-close"></i></button>
                    </div>';
        }

        echo json_encode($response);
    }
}
$resp = new listarventasajax();
$resp->ajaxlistarVentas();