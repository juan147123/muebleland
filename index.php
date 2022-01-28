<?php
/*-----------importante: se deben poner cada model y controller creados por modulo sino no funcionaran----------*/
require_once 'controller/plantilla.controller.php';
//aqui se implementan los controladores
require_once 'controller/empleado_controller.php';
require_once 'controller/proveedor_controller.php';
require_once 'controller/api.controller.php';
require_once 'controller/login_controller.php';
require_once 'controller/productos_controller.php';
require_once 'controller/colores_controller.php';
require_once 'controller/marcas_controller.php';
require_once 'controller/ventas_controller.php';
require_once 'controller/categorias_controller.php';
require_once 'controller/factura_compra_controller.php';
require_once 'controller/inicio_controller.php';
//aqui se implementan los modelos
require_once 'model/empleado_model.php';
require_once 'model/proveedor_model.php';
require_once 'model/cliente_model.php';
require_once 'model/login_model.php';
require_once 'model/productos_model.php';
require_once 'model/colores_model.php';
require_once 'model/marcas_model.php';
require_once 'model/ventas_model.php';
require_once 'model/categorias_model.php';
require_once 'model/factura_compra_model.php';
require_once 'model/inicio_model.php';

$plantilla = new ControllerPlantilla();
$plantilla->ctrPlantilla();