<?php
require_once '../../controller/empleado_controller.php';
require_once '../../controller/proveedor_controller.php';
require_once '../../controller/cliente_controller.php';
require_once '../../controller/productos_controller.php';
require_once '../../controller/colores_controller.php';
require_once '../../controller/marcas_controller.php';
require_once '../../controller/categorias_controller.php';


require_once '../../model/empleado_model.php';
require_once '../../model/proveedor_model.php';
require_once '../../model/cliente_model.php';
require_once '../../model/productos_model.php';
require_once '../../model/colores_model.php';
require_once '../../model/marcas_model.php';
require_once '../../model/categorias_model.php';


class mostrarporidajax
{
    public function ajaxMostrarTrabajadoresPorID()
    {
        $id_trabajador = $this->id_trabajador;
        $response = empleadoscontroller::ctrMostrarEmpleado_x_ID($id_trabajador);
        echo json_encode($response);
    }
    public function ajaxMostrarProveedorPorID()
    {
        $NITProveedor = $this->NITProveedor;
        $response = proveedorcontroller::ctrMostrarProveedor_x_ID($NITProveedor);
        echo json_encode($response);
    }
    public function ajaxMostrarClientesPorID()
    {
        $NIT = $this->NIT;
        $response = clientecontroller::ctrMostrarCliente_x_ID($NIT);
        echo json_encode($response);
    }
    public function ajaxMostrarProductosPorID()
    {
        $id_prod = $this->id_prod;
        $response = productoscontroller::ctrMostrarProductop_x_ID($id_prod);
        echo json_encode($response);
    }
    public function ajaxMostrarColoresPorID()
    {
        $id_color = $this->id_color;
        $response = colorcontrolador::ctrMostrarColor_x_ID($id_color);
        echo json_encode($response);
    }
    public function ajaxMostrarMarcasPorID()
    {
        $id_marca = $this->id_marca;
        $response = marcascontrolador::ctrMostrarMarca_x_ID($id_marca);
        echo json_encode($response);
    }
    public function ajaxMostrarCategoriasPorID()
    {
        $CodigoCat = $this->CodigoCat;
        $response = categoriascontrolador::ctrMostrarCategoria_x_ID($CodigoCat);
        echo json_encode($response);
    }
}

if (isset($_POST["id_trabajador"])) {
    $id_trabajador = new mostrarporidajax();
    $id_trabajador->id_trabajador = $_POST["id_trabajador"];
    $id_trabajador->ajaxMostrarTrabajadoresPorID();
}
if (isset($_POST["NITProveedor"])) {
    $NITProveedor = new mostrarporidajax();
    $NITProveedor->NITProveedor = $_POST["NITProveedor"];
    $NITProveedor->ajaxMostrarProveedorPorID();
}
if (isset($_POST["NIT"])) {
    $NIT = new mostrarporidajax();
    $NIT->NIT = $_POST["NIT"];
    $NIT->ajaxMostrarClientesPorID();
}
if (isset($_POST["id_prod"])) {
    $id_prod = new mostrarporidajax();
    $id_prod->id_prod = $_POST["id_prod"];
    $id_prod->ajaxMostrarProductosPorID();
}
if (isset($_POST["id_color"])) {
    $id_color = new mostrarporidajax();
    $id_color->id_color = $_POST["id_color"];
    $id_color->ajaxMostrarColoresPorID();
}
if (isset($_POST["id_marca"])) {
    $id_marca = new mostrarporidajax();
    $id_marca->id_marca = $_POST["id_marca"];
    $id_marca->ajaxMostrarMarcasPorID();
}
if (isset($_POST["CodigoCat"])) {
    $CodigoCat = new mostrarporidajax();
    $CodigoCat->CodigoCat = $_POST["CodigoCat"];
    $CodigoCat->ajaxMostrarCategoriasPorID();
}
