<section>
    <div class="box-header with-border">
        <h3 class="box-title">Lista de Clientes</h3>
    </div>
    </br>
    <div>
        <button type="button" class="btn btn-success waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#mdlregistrocliente">
            <i class="fa fa-plus"></i> Registrar</button>
    </div>
    <br>
    <br>
    <!--tabla-->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="Listarclientes" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Documento</th>
                                <th>Nombres</th>
                                <th>Dirección</th>
                                <th>Teléfono</th>
                                <th>Correo</th>
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
    <div id="mdlregistrocliente" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Registrar Cliente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <form class="form" id="frmRegistroCliente" method="post" action="ajax/SeccionCliente/registrarcliente.php">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 col-xs-6">
                                <div class="input-group">
                                    <label>TIPO DE DOCUMENTO</label>
                                </div>
                                <div class="input-group mb-3">
                                    <select class="form-select" id="tipo_documentocli" name="tipo_documentocli" required>
                                        <option value="">Seleccione</option>
                                        <option value="ruc">RUC</option>
                                        <option value="dni">DNI</option>
                                    </select>

                                </div>
                            </div>
                            <div class="col-md-6 col-xs-6">
                                <div class="input-group">
                                    <label>DOCUMENTO:</label>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control AutofocusInput" id="NIT" name="NIT" placeholder="N° de DOC." required>
                                    <button type="button" class="btn btn-success" id="enviarruc" hidden><i class="fas fa-search"></i></button>
                                    <button type="button" class="btn btn-success" id="enviardni" hidden><i class="fas fa-search"></i></button>

                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xs-6">
                                <div class="input-group">
                                    <label>RAZON SOCIAL / NOMBRE:</label>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="NombreCompleto" name="NombreCompleto" placeholder="RAZON SOCIAL / NOMBRE" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-6">
                                <div class="input-group">
                                    <label>DIRECCIÓN:</label>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="Direccion" name="Direccion" placeholder="Ingrese su dirección" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xs-6">
                                <div class="input-group">
                                    <label>CELULAR:</label>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="Telefono" name="Telefono" placeholder="Ingrese Su Número de celular" pattern="[0-9]{9}" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-6">
                                <div class="input-group">
                                    <label>CORREO:</label>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="email" class="form-control" id="Email" name="Email" placeholder="Ingrese su correo electrónico" pattern="^[^@]+@[^@]+\.[a-zA-Z]{2,}$" required>
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
    <div id="mdlactualizarcliente" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Actualizar Cliente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <form class="form" id="frmActualizarCliente" method="post" action="ajax/SeccionCliente/actualizarcliente.php">
                    <div class="modal-body">
                        <div class="row">
                            <div class="input-group">
                                <label>RAZON SOCIAL / NOMBRE:</label>
                            </div>
                            <div class="input-group mb-3">
                                <input type="hidden" class="form-control AutofocusInput" id="NITEditar" name="NITEditar" placeholder="Ingrese su N° de DOC." required>
                                <input type="text" class="form-control" id="NombreCompletoEditar" name="NombreCompletoEditar" placeholder="RAZON SOCIAL / NOMBRE" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xs-6">
                                <div class="input-group">
                                    <label>DIRECCIÓN:</label>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="DireccionEditar" name="DireccionEditar" placeholder="Ingrese su dirección" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-6">
                                <div class="input-group">
                                    <label>CELULAR:</label>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="TelefonoEditar" name="TelefonoEditar" placeholder="Ingrese Su Número de celular" pattern="[0-9]{9}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-6 col-xs-6">
                                <div class="input-group">
                                    <label>CORREO:</label>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="email" class="form-control" id="EmailEditar" name="EmailEditar" placeholder="Ingrese su correo electrónico" pattern="^[^@]+@[^@]+\.[a-zA-Z]{2,}$" required>
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