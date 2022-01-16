<section>
    <div class="box-header with-border">
        <h3 class="box-title">Lista de Proveedores</h3>
    </div>
    </br>


    <div>
        <button type="button" class="btn btn-success waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#mdlproveedor">
            <i class="fa fa-plus"></i> Registrar</button>
    </div>
    <br>

    <br>
    <!--tabla-->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="Listarproveedores" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>RUC</th>
                                <th>Razón Social</th>
                                <th>Dirección</th>
                                <th>Teléfono</th>
                                <th>Pagina Web</th>
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

<!--modal de registro-->
<section>
    <div id="mdlproveedor" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Registrar Proveedor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <form class="form" id="frmRegistroProveedor" method="post" action="ajax/SeccionProveedor/registrarproveedor.php">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 col-xs-12">
                                <div class="input-group">
                                    <label>RUC:</label>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control AutofocusInput" id="NITProveedor" name="NITProveedor" placeholder="DOC Proveedor" pattern="[0-9]{11}" required>
                                    <button type="button" id="enviarruc" class="btn btn-success"><i class="fas fa-search"></i> Buscar</button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xs-6">
                                <div class="input-group">
                                    <label>Razón Social:</label>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="NombreProveedor" name="NombreProveedor" placeholder="Ingresar Razon social" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-6">
                                <div class="input-group">
                                    <label>Dirección:</label>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="Direccion" name="Direccion" placeholder="Ingresar Dirección" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xs-6">
                                <div class="input-group">
                                    <label>Teléfono:</label>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="Telefono" name="Telefono" placeholder="Ingresar Número de Telefono" pattern="[0-9]{9}" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-6">
                                <div class="input-group">
                                    <label>Pagina Web (Opcional):</label>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="PaginaWeb" name="PaginaWeb" placeholder="Ingresar Pagina Web">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xs-6">
                                <div class="input-group">
                                    <label>Estado:</label>
                                </div>
                                <div class="input-group mb-3">
                                    <select class="form-control" id="Estado" name="Estado" required>
                                        <option value="">Seleccione Estado</option>
                                        <option value="ACTIVO">ACTIVO</option>
                                        <option value="INACTIVO">INACTIVO</option>
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


<section>
    <div id="mdlActualizarProveedor" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Actualizar Proveedor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <form action="ajax/SeccionProveedor/actualizarproveedor.php" class="form" id="frmActualizarProveedor" method="post">
                    <div class="modal-body">
                        <div>
                            <input type="text" class="form-control" id="NITProveedorEditar" name="NITProveedorEditar" placeholder="ID" required>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xs-6">
                                <div class="input-group">
                                    <label>Razón Social:</label>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="NombreProveedorEditar" name="NombreProveedorEditar" placeholder="Ingresar Razon social" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-6">
                                <div class="input-group">
                                    <label>Dirección:</label>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="DireccionEditar" name="DireccionEditar" placeholder="Ingresar Dirección" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xs-6">
                                <div class="input-group">
                                    <label>Teléfono:</label>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="TelefonoEditar" name="TelefonoEditar" placeholder="Ingresar Número de Telefono" pattern="[0-9]{9}" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-6">
                                <div class="input-group">
                                    <label>Pagina Web (Opcional):</label>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="PaginaWebEditar" name="PaginaWebEditar" placeholder="Ingresar Pagina Web">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xs-6">
                                <div class="input-group">
                                    <label>Estado:</label>
                                </div>
                                <div class="input-group mb-3">
                                    <select class="form-control" id="EstadoEditar" name="EstadoEditar" required>
                                        <option value="">Seleccione Estado</option>
                                        <option value="ACTIVO">ACTIVO</option>
                                        <option value="INACTIVO">INACTIVO</option>
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