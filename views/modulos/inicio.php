<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Dashboard</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="inicio">inicio</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body" style="background-image: radial-gradient(circle at -2.83% 54.62%, #9ab3d4 0, #2a7abd 50%, #0046a5 100%);">
                <div class="float-end mt-2">
                    <div id="growth-chart"></div>
                </div>
                <div>
                    <?php
                    $return = iniciocontroller::ctrConteoClientes();
                    ?>
                    <h4 style="color: white;" class="mb-1 mt-1 ">+<span data-plugin="counterup"><?php echo ($return[0]) ?></span></h4>
                    <a href="clientes" style="color: white;font-size:16px;" class="">Clientes Registrados</a>
                </div>

            </div>
        </div>
    </div>
    <!-- end col-->
    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body" style="background-image: linear-gradient(90deg, #a556b6 0, #914bb5 16.67%, #7940b4 33.33%, #5b36b2 50%, #2f2eb1 66.67%, #002aaf 83.33%, #0027ae 100%);">
                <div class="float-end mt-2">
                    <div id="orders-chart"> </div>
                </div>
                <div>
                    <?php
                    $return = iniciocontroller::ctrConteoEmpleados();
                    ?>
                    <h4 style="color: white;" class="mb-1 mt-1">+<span data-plugin="counterup"><?php echo ($return[0]) ?></span></h4>
                    <a href="empleados" style="color: white;font-size:16px;" class="">Empleados Registrados</a>
                </div>

            </div>
        </div>
    </div>
    <!-- end col-->
    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body" style="background-image: radial-gradient(circle at -20.71% 50%, #ff5080 0, #fe4489 7.14%, #f63892 14.29%, #ec2b9a 21.43%, #df1ea3 28.57%, #cf0fab 35.71%, #bb03b3 42.86%, #a302bb 50%, #850ec3 57.14%, #5e1cca 64.29%, #0027d1 71.43%, #0030d7 78.57%, #0037dc 85.71%, #003cdf 92.86%, #003fe0 100%);">
                <div class="float-end mt-2">
                    <div id="orders-chart"> </div>
                </div>
                <div>
                    <?php
                    $return = iniciocontroller::ctrConteoProveedores();
                    ?>
                    <h4 style="color: white;" class="mb-1 mt-1">+<span data-plugin="counterup"><?php echo ($return[0]) ?></span></h4>
                    <a href="proveedor" style="color: white;font-size:16px;" class="">Proveedores Registrados</a>
                </div>
            </div>
        </div>
    </div>
    <!-- end col-->
    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body" style="background-image: radial-gradient(circle at 11.56% 46.64%, #0fccff 0, #0171bb 50%, #002242 100%);">
                <div class="float-end mt-2">
                    <div id="orders-chart"> </div>
                </div>
                <div>
                    <?php
                    $return = iniciocontroller::ctrConteoVentas();
                    ?>
                    <h4 style="color: white;" class="mb-1 mt-1">+<span data-plugin="counterup"><?php echo ($return[0]) ?></span></h4>
                    <a href="venta" style="color: white;font-size:16px;" class="">Ventas Exitosas</a>
                </div>
            </div>
        </div>
    </div>
    <!-- end col-->
</div>

<!-- end row-->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0">Gráficos</h4>

        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Productos vendidos este año</h4>
                <canvas id="lineChart" height="150"></canvas>
            </div>
        </div>
    </div>
    <!-- end col -->
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Ingresos totales por mes</h4>
                <canvas id="bar" height="150"></canvas>
            </div>
        </div>
    </div>
    <!-- end col -->
</div>
<!-- end row -->
<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Clientes registrados por mes</h4>
                <canvas id="pie" height="150"></canvas>
            </div>
        </div>
    </div>
    <!-- end col -->
  <!--   <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Donut Chart</h4>
                <canvas id="doughnut" height="150"></canvas>
            </div>
        </div>
    </div> -->
    <!-- end col -->
</div>
<!-- end row -->
</div>
<!-- container-fluid -->
</div>
<!-- End Page-content -->