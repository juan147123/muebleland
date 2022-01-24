<section>

    </br>


    <div>
        <div class="badge bg-pill bg-soft-success font-size-24">Lista de ventas efectuadas</div>
    </div>
    <br>

    <br>
    <!--tabla-->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="ListarventasEfectuadas" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Código</th>
                                <th>Cliente</th>
                                <th>Responsable</th>
                                <th>Emitido</th>
                                <th>Comprobante</th>
                                <th>Detalle</th>
                                <th>Comprobante</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
</section>



<!-- Agregar detalle venta -->
<section>
    <div id="mdldetalleventa" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Detalle de la venta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="">
                    </button>
                </div>
                <div class="modal-body">
                    <div>
                        <div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <table id="ListarDetalleventaEfectuada" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Descripción</th>
                                                        <th>Precio</th>
                                                        <th>Cantidad</th>
                                                        <th>Importe</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                        </div>
                        <div class="row d-flex justify-content-end contenedorvnt">
                            <div class="col-md-1 col-xs-1 datosvnt">
                                <div class="row preciosDVenta">
                                    <div class="col-md-3 col-xs-6">
                                        <label for="subtotaldv">Subtotal</label>
                                    </div>
                                    <div class="col-md-3 col-xs-6">
                                        <label for="igvdv">IGV</label>
                                    </div>
                                    <div class="col-md-3 col-xs-6">
                                        <label for="totaldv">Total</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 col-xs-4">
                                <div class="row preciosDVenta">
                                    <div class="col-md-6 col-xs-6">

                                        <input type="text" class="form-control " id="subtotaldvE" name="subtotaldvE" value="0.00" disabled>
                                    </div>
                                    <div class="col-md-6 col-xs-6">

                                        <input type="text" class="form-control " id="igvdvE" name="igvdvE" value="0.00" disabled>
                                    </div>
                                    <div class="col-md-6 col-xs-6">

                                        <input type="text" class="form-control " id="totaldvE" name="totaldvE" value="0.00" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</section>