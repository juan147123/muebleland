<section>
    <div class="box-header with-border">
        <h3 class="box-title">Lista de productos</h3>
    </div>
    </br>


    <div>
        <button type="button" class="btn btn-success waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#mdlregistroproductos" onclick="ListarCateprodProd();">
            <i class="fa fa-plus"></i> Registrar</button>
    </div>
    <br>

    <br>
    <!--tabla-->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="Listarproductos" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Código</th>
                                <th>Descripción</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Categoria</th>
                                <th>Color</th>
                                <th>Precio Compra</th>
                                <th>Precio Venta</th>
                                <th>Porcentaje Ganancia</th>
                                <th>Stock</th>
                                <th>Imagen</th>
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
</section>


<!-- formulario modal de registro -->
<section>
    <div id="mdlregistroproductos" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Registrar Productos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <form class="form" id="frmregistroproductos" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 col-xs-12">
                                <div class="input-group">
                                    <label>Descripción</label>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control " id="DescripcionProd" name="DescripcionProd" placeholder="Descripción del producto."  required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xs-6">
                                <div class="input-group">
                                    <label>Categoria:</label>
                                </div>
                                <div class="input-group mb-3">
                                    <select class="form-control listarmodal" id="CodigoCat" name="CodigoCat" required>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-6">
                                <div class="input-group">
                                    <label>Precio de compra:</label>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="PrecioCompra" name="PrecioCompra" placeholder="Ingrese el precio de compra." onkeyup="porcentajemult()" pattern="[/^(?!0\.00)\d{1,3}(,\d{3})*(\.\d\d)?$/gm]+"  required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xs-6">
                                <div class="input-group">
                                    <label>Porcentaje de ganancia:</label>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control" id="Porcentajegan" min="1" max="100" name="Porcentajegan" placeholder="Ingrese el porcentaje de venta." onkeyup="porcentajemult();" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-6">
                                <div class="input-group">
                                    <label>Precio de Venta:</label>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="PrecioVenta" name="PrecioVenta" placeholder="Ingrese el precio de venta"  required disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xs-6">
                                <div class="input-group">
                                    <label>Modelo:</label>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="modeloprod" name="modeloprod" placeholder="Ingrese el modelo del producto"  required>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-6">
                                <div class="input-group">
                                    <label>Marca:</label>
                                </div>
                                <div class="input-group mb-3">
                                    <select class="form-control listarmodal" id="idMarca" name="idMarca" required>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xs-6">
                                <div class="input-group">
                                    <label>Color:</label>
                                </div>
                                <div class="input-group mb-3">
                                    <select class="form-control listarmodal" id="idColor" name="idColor" required>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-6">
                                <div class="input-group">
                                    <label>Stock:</label>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control" id="stockprod" name="stockprod" min="1"  placeholder="Ingrese el stock del producto" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-xs-12">
                                <div class="input-group">
                                    <label>Imagen:</label>
                                </div>
                                <div class="card border-primary">
                                    <div class="card-body">
                                        <label for="imagenNE" id="icon-imageNE" class="btn btn-primary"><i class="fas fa-plus"></i></label>
                                        <span id="icon-cerrarNE"></span>
                                        <input type="file" name="imagenNE" id="imagenNE" class="d-none" onchange="previewNE(event)">
                                        <img class="img-thumbnail" id="img-previewNE">
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

<!-- formulario modal de Actualizar -->
<section>
    <div id="mdlactualizarproductos" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Actualizar Producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <form class="form" id="frmactualizarproductos" method="post" enctype="multipart/form-data" >
                <input type="hidden" class="form-control " id="idprodeditar" name="idprodeditar"  required>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 col-xs-12">
                                <div class="input-group">
                                    <label>Descripción</label>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control " id="DescripcionProdEditar" name="DescripcionProdEditar" placeholder="Descripción del producto."  required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xs-6">
                                <div class="input-group">
                                    <label>Categoria:</label>
                                </div>
                                <div class="input-group mb-3">
                                    <select class="form-control listarmodal" id="CodigoCatEditar" name="CodigoCatEditar" required>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-6">
                                <div class="input-group">
                                    <label>Precio de compra:</label>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="PrecioCompraEditar" name="PrecioCompraEditar" placeholder="Ingrese el precio de compra." onkeyup="porcentajemultEditar()" pattern="[/^(?!0\.00)\d{1,3}(,\d{3})*(\.\d\d)?$/gm]+"  required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xs-6">
                                <div class="input-group">
                                    <label>Porcentaje de ganancia:</label>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="PorcentajeganEditar" name="PorcentajeganEditar" placeholder="Ingrese el porcentaje de ganancia." onkeyup="porcentajemultEditar();"  required>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-6">
                                <div class="input-group">
                                    <label>Precio de Venta:</label>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="PrecioVentaEditar" name="PrecioVentaEditar" placeholder="Ingrese el precio de venta"  required disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xs-6">
                                <div class="input-group">
                                    <label>Modelo:</label>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="modeloprodEditar" name="modeloprodEditar" placeholder="Ingrese Número Documento"  required>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-6">
                                <div class="input-group">
                                    <label>Marca:</label>
                                </div>
                                <div class="input-group mb-3">
                                    <select class="form-control listarmodal" id="idMarcaEditar" name="idMarcaEditar" required>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xs-6">
                                <div class="input-group">
                                    <label>Color:</label>
                                </div>
                                <div class="input-group mb-3">
                                    <select class="form-control listarmodal" id="idColorEditar" name="idColorEditar" required>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-6">
                                <div class="input-group">
                                    <label>Stock:</label>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="stockprodEditar" name="stockprodEditar" placeholder="Ingrese el stock del producto" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-xs-12">
                                <div class="input-group">
                                    <label>Imagen:</label>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="hidden" class="form-control" id="imagenprodEditar" name="imagenprodEditar" placeholder="Tipo de contrato" required>
                                </div>
                                <div class="card border-primary">
                                    <div class="card-body">
                                        <label for="imagenPR" id="icon-imagePR" class="btn btn-primary"><i class="fas fa-plus"></i></label>
                                        <span id="icon-cerrarPR"></span>
                                        <input type="file" name="imagenPR" id="imagenPR" class="d-none" onchange="previewPR(event)">
                                        <img class="form-control" id="img-previewPR">
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