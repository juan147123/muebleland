<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="inicio" class="logo logo-light"><span class="logo-sm">
                        <img src="views/images/mueblelandinicio.png" alt="" height="22">
                    </span> <span class="logo-lg">
                        <img src="views/images/mueblelandinicio.png" alt="" height="20">
                    </span> </a>
            </div>
            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn"> <i class="fa fa-fw fa-bars"></i> </button>
            <!-- App Search-->
            <form class="app-search d-none d-lg-block">
                <div class="position-relative">
                    <input type="text" class="form-control" style="border:solid 1px; border-color:#C1C1C1 ;" id="inbusqueda" name="inbusqueda" placeholder="Search..."> <span class="fa fa-search"></span>
                </div>
            </form>
        </div>
        <div class="d-flex">
            <div class="dropdown d-inline-block d-lg-none ms-2">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="uil-search"></i> </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-search-dropdown">
                    <form class="p-3">
                        <div class="m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <img class="rounded-circle header-profile-user" src="views/images/logo-sm.png" alt="Header Avatar"> <span class="d-none d-xl-inline-block ms-1 fw-medium font-size-15"><?php echo ($_SESSION['descripcion']) ?></span> <i class="uil-angle-down d-none d-xl-inline-block font-size-15"></i> </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- <a class="dropdown-item" style="text-align:center;"> <span class="align-middle"><img src="views/images/logo-sm.png" alt="" height="22"></span></a> -->
                    <a class="dropdown-item d-block"> <span class="align-middle"><?php echo ($_SESSION['nombreempleado']) ?></span></a>
                    <a class="dropdown-item" href="salir"><span class="align-middle">Cerrar Sesión</span></a>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- ========== Left Sidebar Start ========== -->

<?php if ($_SESSION['descripcion'] == "administrador") { ?>
    <div class="vertical-menu">
        <!-- LOGO -->
        <div class="navbar-brand-box">
            <a href="inicio" class="logo logo-dark"> <span class="logo-sm">
                    <img src="views/images/logo-sm.png" alt="" height="22">
                </span> <span class="logo-lg">
                    <img src="views/images/mueblelandinicio.png" alt="" height="20">
                </span> </a>
            <a href="inicio" class="logo logo-light"> <span class="logo-sm">
                    <img src="views/images/logo-sm.png" alt="" height="22">
                </span> <span class="logo-lg">
                    <img src="views/images/logo-light.png" alt="" height="20">
                </span> </a>
        </div>
        <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn"> <i class="fa fa-fw fa-bars"></i> </button>
        <div data-simplebar class="sidebar-menu-scroll">
            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <!-- Left Menu Start -->
                <ul class="metismenu list-unstyled" id="side-menu">
                    <li>
                        <a href="inicio"> <i class="fas fa-home"></i> </span> <span>Inicio</span> </a>
                    </li>
                    <li>
                        <a href="empleados"> <i class="fas fa-users-cog"></i><span>Empleados</span> </a>
                    </li>
                    <li>
                        <a href="proveedor"> <i class="fas fa-parachute-box"></i><span>Proveedores</span> </a>
                    </li>
                    <li>
                        <a href="clientes"> <i class="fas fa-users"></i><span>Clientes</span> </a>
                    </li>
                    <li>
                        <a class="fa fa-warehouse"> <span>Almacén</span></a>

                        <ul class="sub-menu" aria-expanded="true">
                            <li><a href="colores">Colores</a></li>
                            <li><a href="marcas">Marcas</a></li>
                            <li><a href="categorias">Categorias</a></li>
                            <li><a href="productos">Productos</a></li>
                        </ul>

                    </li>
                    <li>
                        <a class="fas fa-cart-arrow-down"> <span>Salidas</span></a>
                        <ul class="sub-menu" aria-expanded="true">
                            <li><a href="ordenventa">Orden de venta</a></li>
                            <li><a href="venta">Ventas</a></li>
                        </ul>

                    </li>
                    <li>
                        <a class="fas fa-cart-arrow-down"> <span>Entradas</span></a>
                        <ul class="sub-menu" aria-expanded="true">
                            <li><a href="facturacompra">Factura de Compra</a></li>
                        </ul>

                    </li>
                    <li>
                        <a href="usuarios"> <i class="fas fa-user"></i><span>Usuarios</span> </a>
                    </li>

                </ul>
            </div>
            <!-- Sidebar -->
        </div>
    </div>
<?php } ?>

<?php if ($_SESSION['descripcion'] == "ventas") { ?>
    <div class="vertical-menu">
        <!-- LOGO -->
        <div class="navbar-brand-box">
            <a href="" class="logo logo-dark"> <span class="logo-sm">
                    <img src="views/images/logo-sm.png" alt="" height="22">
                </span> <span class="logo-lg">
                    <img src="views/images/mueblelandinicio.png" alt="" height="20">
                </span> </a>
            <a href="" class="logo logo-light"> <span class="logo-sm">
                    <img src="views/images/logo-sm.png" alt="" height="22">
                </span> <span class="logo-lg">
                    <img src="views/images/logo-light.png" alt="" height="20">
                </span> </a>
        </div>
        <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn"> <i class="fa fa-fw fa-bars"></i> </button>
        <div data-simplebar class="sidebar-menu-scroll">
            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <!-- Left Menu Start -->
                <ul class="metismenu list-unstyled" id="side-menu">


                    <li>
                        <a href="clientes"> <i class="fas fa-users"></i><span>Clientes</span> </a>
                    </li>
                    <li>
                        <a class="fa fa-warehouse"> <span>Almacén</span></a>

                        <ul class="sub-menu" aria-expanded="true">
                            <li><a href="productos">Productos</a></li>
                        </ul>

                    </li>
                    <li>
                        <a href="ordenventa"> <i class="fas fa-cash-register"></i><span>Orden de venta</span> </a>
                    </li>
                    <li>
                        <a href="venta"> <i class="fas fa-money-bill-wave"></i><span>Ventas efectuadas</span> </a>
                    </li>
                </ul>
            </div>
            <!-- Sidebar -->
        </div>
    </div>
<?php } ?>


<?php if ($_SESSION['descripcion'] == "almacen") { ?>
    <div class="vertical-menu">
        <!-- LOGO -->
        <div class="navbar-brand-box">
            <a href="" class="logo logo-dark"> <span class="logo-sm">
                    <img src="views/images/logo-sm.png" alt="" height="22">
                </span> <span class="logo-lg">
                    <img src="views/images/mueblelandinicio.png" alt="" height="20">
                </span> </a>
            <a href="" class="logo logo-light"> <span class="logo-sm">
                    <img src="views/images/logo-sm.png" alt="" height="22">
                </span> <span class="logo-lg">
                    <img src="views/images/logo-light.png" alt="" height="20">
                </span> </a>
        </div>
        <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn"> <i class="fa fa-fw fa-bars"></i> </button>
        <div data-simplebar class="sidebar-menu-scroll">
            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <!-- Left Menu Start -->
                <ul class="metismenu list-unstyled" id="side-menu">
                    <li><a class="fas fa-tint" href="colores"> Colores</a></li>
                    <li><a class="fab fa-maxcdn" href="marcas"> Marcas</a></li>
                    <li><a class="fas fa-dice-d6" href="categorias"> Categorias</a></li>
                    <li><a class="far fa-list-alt" href="productos"> Productos</a></li>
                    <li><a class="far fa-list-alt" href="facturacompra">Factura de Compra</a></li>
                </ul>
            </div>
            <!-- Sidebar -->
        </div>
    </div>
<?php } ?>