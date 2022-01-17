<?php
if (isset($_GET['ruta'])) {
    if ($_GET['ruta'] != "login" ){
        echo('
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>
                            document.write(new Date().getFullYear())
                        </script> © Muebleland Perú.
                    </div>
                    <!-- <div class="col-sm-6">
                        <div class="text-sm-end d-none d-sm-block"> Crafted with <i class="mdi mdi-heart text-danger"></i> by <a href="https://soengsouy.com/" target="_blank" class="text-reset">Soeng Souy</a> </div>
                    </div> -->
                </div>
            </div>
        </footer>
        ');
    }
}
?>


<div class="rightbar-overlay"></div>
<!-- JAVASCRIPT -->
<script src="views/libs/jquery/jquery.min.js"></script>
<script src="views/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="views/libs/metismenu/metisMenu.min.js"></script>
<script src="views/libs/simplebar/simplebar.min.js"></script>
<script src="views/libs/node-waves/waves.min.js"></script>
<script src="views/libs/waypoints/lib/jquery.waypoints.min.js"></script>
<script src="views/libs/jquery.counterup/jquery.counterup.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- Required datatable js -->
<script src="views/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="views/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="views/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="views/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="views/libs/jszip/jszip.min.js"></script>
<script src="views/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="views/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="views/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="views/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="views/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<!-- Responsive examples -->
<script src="views/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="views/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<!-- Datatable init js -->
<script src="views/js/pages/datatables.init.js"></script>

<!-- App js -->
<script type="text/javascript" src="views/js/api.js"></script>
<script src="views/js/app.js"></script>
<script src="views/js/datatable.js"></script>
<script src="views/js/ajax_empleados.js"></script>
<script src="views/js/ajax_proveedor.js"></script>
<script src="views/js/ajax_clientes.js"></script>
<script src="views/js/ajax_login.js"></script>
<script src="views/js/efectos.js"></script>
<script src="views/js/ajax_productos.js"></script>
<script src="views/js/ajax_colores.js"></script>
<script src="views/js/ajax_marcas.js"></script>
<<<<<<< HEAD
<script src="views/js/ajax_categorias.js"></script>

=======
<script src="views/js/ajax_ventas.js"></script>
<!-- registrar venta lista cliente -->
<script>
  $(document).ready(function() {
    $(".listarmodalVentaR").select2({
      dropdownParent: $("#mdlRegistrarVenta"),
      width:'100%'
    });
  });
</script>
<!--  -->
<!-- actualizar venta lista cliente -->
<script>
  $(document).ready(function() {
    $(".listarmodalVentaRES").select2({
      dropdownParent: $("#mdlActualizarVenta"),
      width:'100%'
    });
  });
</script>
<!--  -->
<!-- actualizar venta lista cliente -->
<script>
  $(document).ready(function() {
    $(".listardetallevent").select2({
      dropdownParent: $("#mdlAddDetalleVenta"),
      width:'100%',
      height:'100%'
    });
  });
</script>
<!--  -->
>>>>>>> 9b9813a30426c55bbef9b9eace8e1b20a843f418
</body>
</html>