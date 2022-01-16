<section class="content container-fluid">
<div class="box-header with-border">
        <h3 class="box-title">Lista de Colores</h3>
    </div>
    </br>
    <div>


<div>
        <button type="button" class="btn btn-success waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#mdlRegistrarColor">
            <i class="fa fa-plus"></i> Registrar</button>
    </div>
    <br>
    <!--tabla-->
    <div class="box">
        <div class="container-fluid" style="margin-top: 5px">
            <div class="box-header with-border">
                <h3 class="box-title">Listado de Colores</h3>
            </div>
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table text-center table-bordered table-light" id="ListarColor" width="100%" cellspacing="0">
                        <thead class=" thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Color</th>
                                <th>Acciones</th>

                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="box-footer"></div>
        </div>
    </div>
</section>


<section>
    <div id="mdlRegistrarColor" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Registrar Color</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <form class="form" id="frmRegistroColor" method="post" action="ajax/SeccionColores/registrarcolores.php">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 col-xs-12">
                                <div class="input-group">
                                    <label>Nombre del color:</label>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control AutofocusInput" id="nombre_color" name="nombre_color" placeholder="Ingrese color" required>
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
    <div id="mdlActualizarColor" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Actualizar Color</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <form class="form" id="frmActualizarColor" method="post" action="ajax/SeccionColores/registrarcolores.php">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 col-xs-12">
                                <div class="input-group">
                                    <label>Nombre del color:</label>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control AutofocusInput" id="nombre_colorEditar" name="nombre_colorEditar" placeholder="Ingrese color" required>
                                    <input type="hidden" class="form-control AutofocusInput" id="id_colorEditar" name="id_colorEditar" placeholder="Ingrese id" required>
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


