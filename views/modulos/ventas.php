<section>
    <div class="box-header with-border">
        <h3 class="box-title">Generar venta</h3>
    </div>
    </br>


    <div>
        <button type="button" class="btn btn-success waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#mdlRegistrarVenta" onclick="ListarClientesVentas();">
            <i class="fa fa-plus"></i> Nueva Venta</button>
    </div>
    <br>

    <br>
    <!--tabla-->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="Listarventas" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Código</th>
                                <th>Cliente</th>
                                <th>Responsable</th>
                                <th>Emitido</th>
                                <th>Estado</th>
                                <th>Detalle</th>
                                <th>Acciones</th>
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


<!-- Registrar venta -->
<section>
    <div id="mdlRegistrarVenta" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Registrar Venta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <form class="form" id="frmRegistroVentas" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 col-xs-12">
                                <div class="input-group">
                                    <label>Seleccione el Cliente:</label>
                                </div>
                                <div class="input-group">
                                    <select class="form-control listarmodalVentaR" id="id_clienteVenta" name="id_clienteVenta" required>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-danger waves-effect" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Guardar</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</section>


<!-- Actualizar venta -->
<section>
    <div id="mdlActualizarVenta" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Actualizar Venta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <form class="form" id="frmActualizarVentas" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 col-xs-12">
                                <div class="input-group">
                                    <label>Seleccione el Cliente:</label>
                                </div>
                                <div class="input-group">
                                    <input type="hidden" id="idventaEdit" name="idventaEdit" />
                                    <select class="form-control listarmodalVentaRES" id="id_clienteE" name="id_clienteE" required>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-danger waves-effect" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Guardar</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</section>


<!-- Agregar detalle venta -->
<section>
    <div id="mdlAddDetalleVenta" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Actualizar Venta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <div>
                        <div class="col">
                            <form class="form" id="frmAddDetalleVenta" method="post">
                                <div class="row">
                                    <div class="col-md-3 col-xs-12">
                                        <div class="input-group">
                                            <label>Código del producto:</label>
                                        </div>
                                        <div class="input-group">
                                            <input type="hidden" id="idventadet" name="idventadet" />
                                            <select class="form-control " id="codigprodvnt" name="codigprodvnt" required>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="input-group">
                                            <label>Producto:</label>
                                        </div>
                                        <div class="input-group">
                                            <input type="text" class="form-control " id="descprovent" name="descprovent" placeholder="Descripción del producto." disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-xs-12">
                                        <div class="input-group">
                                            <label>Cantidad:</label>
                                        </div>
                                        <div class="input-group">
                                            <input type="number" class="form-control " id="cantidadvent" name="cantidadvent" min=1 value="0" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 20px;">
                                    <div class="col-md-3 col-xs-12">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light btn-sm">Agregar al carrito</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <table id="ListarDetalleventa" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Descripción</th>
                                                        <th>Precio</th>
                                                        <th>Cantidad</th>
                                                        <th>Monto</th>
                                                        <th>Acciones</th>
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

                                        <input type="text" class="form-control " id="subtotaldv" name="subtotaldv" value="0.0" disabled>
                                    </div>
                                    <div class="col-md-6 col-xs-6">

                                        <input type="text" class="form-control " id="igvdv" name="igvdv" value="0.0" disabled>
                                    </div>
                                    <div class="col-md-6 col-xs-6">

                                        <input type="text" class="form-control " id="totaldv" name="totaldv" value="0.0" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="reset" class="btn btn-danger waves-effect" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Guardar</button>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</section>