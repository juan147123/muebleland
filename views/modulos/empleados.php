<section>
    <div class="box-header with-border">
        <h3 class="box-title">Lista de empleados</h3>
    </div>
    </br>


    <div>
        <button type="button" class="btn btn-success waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#mdlempleados">
            <i class="fa fa-plus"></i> Registrar</button>
    </div>
    <br>

    <br>
    <!--tabla-->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="Listarempleados" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Código</th>
                                <th>Nombres y Apellidos</th>
                                <th>Dirección</th>
                                <th>Correo</th>
                                <th>Teléfono</th>
                                <th>Documento</th>
                                <th>N° Documento</th>
                                <th>Registrado</th>
                                <th>Inicio Laboral</th>
                                <th>Tipo Contrato</th>
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

<section>
    <div id="mdlempleados" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Registrar Empleado</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <form class="form" id="frmRegistroEmpleado" method="post" action="ajax/SeccionEmpleado/registrarempleado.php">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 col-xs-12">
                                <div class="input-group">
                                    <label>Nombres y Apellidos:</label>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control AutofocusInput" id="nombres_trab" name="nombres_trab" placeholder="Nombre completo" pattern="[a-zA-Z\sñÑáéíóúÁÉÍÓÚ]+" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xs-6">
                                <div class="input-group">
                                    <label>Dirección:</label>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="direccion_trab" name="direccion_trab" placeholder="Ingresar Dirección" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-6">
                                <div class="input-group">
                                    <label>Correo Electrónico:</label>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="email" class="form-control" id="correo_trab" name="correo_trab" placeholder="Ingrese Su Correo Electrónico" pattern="^[^@]+@[^@]+\.[a-zA-Z]{2,}$" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xs-6">
                                <div class="input-group">
                                    <label>Celular:</label>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="telefono_trab" name="telefono_trab" placeholder="Ingrese Su Número de celular" pattern="[0-9]{9}" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-6">
                                <div class="input-group">
                                    <label>Documento:</label>
                                </div>
                                <div class="input-group mb-3">
                                    <select class="form-control listarmodal" id="tipo_documentot" name="tipo_documento" required>
                                        <option value="">Seleccione Tipo de Documento</option>
                                        <option value="DNI">DNI</option>
                                        <option value="CARNET DE EXTRANJERIA">CARNET DE EXTRANJERIA</option>
                                        <option value="PASAPORTE">PASAPORTE</option>
                                        <option value="PARTIDA DE NACIMIENTO">PARTIDA DE NACIMIENTO</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xs-6">
                                <div class="input-group">
                                    <label>N° Documento:</label>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="numero_documento" name="numero_documento" placeholder="Ingrese Número Documento" pattern="[0-9]{8}" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-6">
                                <div class="input-group">
                                    <label>Inicio de Labores:</label>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="date" class="form-control" id="inicio_lab" name="inicio_lab" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-xs-12">
                                <div class="input-group">
                                    <label>Tipo de Contrato:</label>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="tipo_contrato" name="tipo_contrato" placeholder="Tipo de contrato" required>
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
    <div id="mdlActualizarEmpleado" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Actualizar Empleado</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <form action="ajax/SeccionEmpleado/actualizarempleado.php" class="form" id="frmActualizarEmpleado" method="post">
                    <div class="modal-body">
                        <div>
                            <input type="hidden" class="form-control" id="id_trabajadorEditar" name="id_trabajadorEditar" placeholder="Nombre completo" required>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group">
                                <label>Nombres:</label>
                            </div>
                            <input type="text" class="form-control AutofocusInput" id="nombres_trabEditar" name="nombres_trabEditar" placeholder="Nombre completo" pattern="[a-zA-Z\sñÑáéíóúÁÉÍÓÚ]+" required>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="input-group mb-3">
                                    <div class="input-group">
                                        <label>Dirección:</label>
                                    </div>

                                    <input type="text" class="form-control" id="direccion_trabEditar" name="direccion_trabEditar" placeholder="Ingresar Dirección" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group mb-3">
                                    <div class="input-group">
                                        <label>Correo:</label>
                                    </div>
                                    <input type="email" class="form-control" id="correo_trabEditar" name="correo_trabEditar" placeholder="Ingrese Su Correo Electrónico" pattern="^[^@]+@[^@]+\.[a-zA-Z]{2,}$" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col">
                                <div class="input-group mb-3">
                                    <div class="input-group">
                                        <label>Tipo de documento:</label>
                                    </div>
                                    <select class="form-control listarmodaltraA" id="tipo_documentoEditar" name="tipo_documentoEditar" required>
                                        <option value="">Seleccione Tipo de Documento</option>
                                        <option value="DNI">DNI</option>
                                        <option value="CARNET DE EXTRANJERIA">CARNET DE EXTRANJERIA</option>
                                        <option value="PASAPORTE">PASAPORTE</option>
                                        <option value="PARTIDA DE NACIMIENTO">PARTIDA DE NACIMIENTO</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group mb-3">
                                    <div class="input-group">
                                        <label>Número de documento:</label>
                                    </div>
                                    <input type="text" class="form-control" id="numero_documentoEditar" name="numero_documentoEditar" placeholder="Ingrese Número Documento" pattern="[0-9]{8}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="input-group mb-3">
                                    <div class="input-group">
                                        <label>Teléfono:</label>
                                    </div>
                                    <input type="text" class="form-control" id="telefono_trabEditar" name="telefono_trabEditar" placeholder="Ingrese Su Teléfono" pattern="[0-9]{9}" required>
                                </div>
                            </div>

                            <div class="col">
                                <div class="input-group mb-3">
                                    <div class="input-group">
                                        <label>Tipo de contrato:</label>
                                    </div>
                                    <input type="text" class="form-control" id="tipo_contratoSEditar" name="tipo_contratoSEditar" placeholder="Tipo de contrato" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="input-group mb-3">
                                    <div class="input-group">
                                        <label>Inicio de Labores:</label>
                                    </div>
                                    <input type="date" class="form-control" id="inicio_labEditar" name="inicio_labEditar" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group mb-3">
                                    <div class="input-group">
                                        <label>Cambiar estado:</label>
                                    </div>
                                    <select class="form-control listarmodaltraA" id="estadoEditar" name="estadoEditar" aria-label="Username" aria-describedby="basic-addon1" required>
                                        <option value="">Seleccione</option>
                                        <option value="activo">Activo</option>
                                        <option value="ausente">Ausente</option>
                                        <option value="inactivo">Inactivo</option>
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