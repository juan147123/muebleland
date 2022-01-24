<section class="content container-fluid">
    <div class="box-header with-border">
        <h3 class="box-title">Facturas de Compra</h3>
    </div>
    </br>
    <div>


        <div>
            <button type="button" class="btn btn-success waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#mdlfacturacompra">
                <i class="fa fa-plus"></i> Registrar</button>
        </div>
        <br>
        <!--tabla-->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="ListarFacturaCompra" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Razón Social</th>
                                    <th>Tipo Comprobante</th>
                                    <th>Cod Comprobante</th>
                                    <th>Fecha Emisión</th>
                                    <th>Fecha Vencimiento</th>
                                    <th>Orden Compra</th>
                                    <th>Condición Pago</th>
                                    <th>Imagen</th>
                                    <th>Estado</th>
                                    <th>Detalle Factura</th>
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


<section>
    <div id="mdlfacturacompra" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Registrar Factura</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <form class="form" id="frmRegistroFacturaCompra" enctype="multipart/form-data" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 col-xs-12">
                                <div class="input-group mb-3">
                                    <select class="form-control" id="idprovfc" name="idprovfc" required>
                                        <option value="">Seleccione el Proveedor</option>
                                        <?php
                                        $respuesta = proveedorcontroller::ctrListarTablaProveedor();
                                        foreach ($respuesta as $key => $value) : ?>
                                            <option value="<?php echo $value['NITProveedor']; ?>">
                                                <?php echo $value["NombreProveedor"]; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="input-group mb-3">
                                    <select class="form-control" id="tipo_compfc" name="tipo_compfc" required>
                                        <option value="">Tipo de Comprobante</option>
                                        <option value="Factura">Factura</option>
                                        <option value="Boleta">Boleta</option>
                                    </select>
                                </div>
                                <div class="input-group">
                                    <label>Codigo de Comprobante:</label>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control AutofocusInput" id="codigofacfc" name="codigofacfc" placeholder="Codigo de Comprobante" aria-label="Username" aria-describedby="basic-addon1" required>
                                </div>
                                <div class="input-group">
                                    <label>Fecha de Emisión:</label>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="date" class="form-control AutofocusInput" id="fechaemisionfc" name="fechaemisionfc" aria-label="Username" aria-describedby="basic-addon1" required>
                                </div>
                                <div class="input-group">
                                    <label>Fecha de Vencimiento:</label>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="date" class="form-control AutofocusInput" id="fechavencimientofc" name="fechavencimientofc" aria-label="Username" aria-describedby="basic-addon1" required>
                                </div>
                                <div class="input-group">
                                    <label>Codigo de Orden Compra:</label>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control AutofocusInput" id="cod_orcomprafc" name="cod_orcomprafc" placeholder="Codigo de Orden Compra" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                                <div class="input-group">
                                    <label>Condición de pago:</label>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control AutofocusInput" id="condicion_pagofc" name="condicion_pagofc" placeholder="Condición de pago" aria-label="Username" aria-describedby="basic-addon1" required>
                                </div>
                                <div class="input-group">
                                    <label>Seleccione Imagen:</label>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="card border-primary">
                                        <div class="card-body">
                                            <label for="imagen" id="icon-image" class="btn btn-primary"><i class="fas fa-image"></i></label>
                                            <span id="icon-cerrar"></span>
                                            <input type="file" name="imagen" id="imagen" class="d-none" onchange="preview(event)">
                                            <img class="img-thumbnail" id="img-preview">
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
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</section>

<section>

    <div class="modal" aria-hidden="true" tabindex="-1" role="dialog" id="mdlimagen" style="overflow-y: scroll;">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <img class="modal-content" id="img01">
                </div>
                <div class="modal-footer">
                    <button id="btnocultarmodal" type="button" class="btn btn-info" data-dismiss="modal" onclick="ocultarimagenfact();">Cerrar Vista Previa</button>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div id="mdldetallefacturadocompraadd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Detalle de factura compra</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="">
                    </button>
                </div>
                <div class="modal-body">
                    <div>
                        <div>
                            <button type="button" class="btn btn-success waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#mdlAgregarProdDetalleFacturaCompra">
                                <i class="fa fa-plus"></i> Agregar Productos</button>
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <table id="tbldetallefacturadoCompraadd" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Producto</th>
                                                        <th>Color</th>
                                                        <th>Marca</th>
                                                        <th>Precio Venta</th>
                                                        <th>Cantidad</th>
                                                        <th>Total</th>
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
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="reset" class="btn btn-danger waves-effect" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light" onclick="btnActualizarEstadoFac();">Guardar</button>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</section>
<section>
    <div id="mdldetallefacturadocompra" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Detalle de factura compra</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="">
                    </button>
                </div>
                <div class="modal-body">
                    <div>
                        <div>
                            <input type="hidden" id="idfacturaalmacenado" name="idfacturaalmacenado">

                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <table id="tbldetallefacturadoCompra" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Producto</th>
                                                        <th>Color</th>
                                                        <th>Marca</th>
                                                        <th>Precio Venta</th>
                                                        <th>Cantidad</th>
                                                        <th>Total</th>
                                                        <th>Estado</th>
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
                    </div>
                </div>

                <div class="modal-footer">

                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</section>
<section>
    <!--MODAL AGREGAR PRODUCTOS A LA FACTURA -->
    <div id="mdlAgregarProdDetalleFacturaCompra" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Productos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form" id="frmRegistroDetalleTempFacturaCompra" method="post">
                        <div class="input-group mb-3">
                            <input type="hidden" id="id_facturacompra" name="id_facturacompra">
                            <select class="form-control listarmodalproductodetalle" id="id_producto" name="id_producto" required>
                                <option value="">Seleccione el Producto</option>
                                <?php
                                $respuesta = ventascontrolador::ctrMostrarcodigoProd();
                                foreach ($respuesta as $key => $value) : ?>
                                    <option value="<?php echo $value['id_prod']; ?>">
                                        <?php echo $value["CodigoProd"]; ?> - <?php echo $value["DescripcionProd"]; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="precio_venta" name="precio_venta" placeholder="Precio" min="0" pattern="[/^(?!0\.00)\d{1,3}(,\d{3})*(\.\d\d)?$/gm]+">
                        </div>
                        <div class="input-group mb-3">
                            <input type="number" class="form-control" id="cantidadprod" name="cantidad" placeholder="Cantidad" min="1" required>
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-danger waves-effect" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" value="Registrar" class="btn btn-primary"><i class="fa fa-floppy-o"></i> Agregar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <!--MODAL Actualizar PRODUCTOS de LA FACTURA -->
    <div id="mdlActualizarDetFacCom" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Actualizar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form" id="frmActualizarDetFacCom" method="post">
                        <div class="input-group mb-3">
                            <input type="hidden" id="idEditardfc" name="idEditardfc">
                            <input type="text" class="form-control" id="precio_ventaEditardfc" name="precio_ventaEditardfc" placeholder="Precio" min="0" pattern="[/^(?!0\.00)\d{1,3}(,\d{3})*(\.\d\d)?$/gm]+">
                        </div>
                        <div class="input-group mb-3">
                            <input type="number" class="form-control" id="cantidadprodEditardfc" name="cantidadprodEditardfc" placeholder="Cantidad" min="1" required>
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-danger waves-effect" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" value="Registrar" class="btn btn-primary"><i class="fa fa-floppy-o"></i> Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <!--MODAL Actualizar PRODUCTOS de LA FACTURA2 -->
    <div id="mdlActualizarDetFacCom2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Actualizar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form" id="frmActualizarDetFacCom2" method="post">
                        <div class="input-group mb-3">
                            <input type="hidden" id="idEditardfc2" name="idEditardfc2">
                            <input type="text" class="form-control" id="precio_ventaEditardfc2" name="precio_ventaEditardfc2" placeholder="Precio" min="0" pattern="[/^(?!0\.00)\d{1,3}(,\d{3})*(\.\d\d)?$/gm]+">
                        </div>
                        <div class="input-group mb-3">
                            <input type="number" class="form-control" id="cantidadprodEditardfc2" name="cantidadprodEditardfc2" placeholder="Cantidad" min="1" required>
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-danger waves-effect" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" value="Registrar" class="btn btn-primary"><i class="fa fa-floppy-o"></i> Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>