<section class="content container-fluid">
<div class="box-header with-border">
        <h3 class="box-title">Lista de categorias</h3>
    </div>
    </br>




<div>
        <button type="button" class="btn btn-success waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#mdlRegistrarCategoria">
            <i class="fa fa-plus"></i> Registrar</button>
    </div>
    <br>
    <!--tabla-->
    <div class="box">
        <div class="container-fluid" style="margin-top: 5px">
            <div class="box-header with-border">
                <h3 class="box-title">Listado de Categorias</h3>
            </div>
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table text-center table-bordered table-light" id="ListarCategoria" width="100%" cellspacing="0">
                        <thead class=" thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Descripción</th>
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
    <div id="mdlRegistrarCategoria" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Registrar Categoria</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <form class="form" id="frmRegistroCategoria" method="post" action="ajax/SeccionCategorias/registrarcategorias.php">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 col-xs-12">
                                <div class="input-group">
                                    <label>Nombre de la categoria:</label>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control AutofocusInput" id="Descripcion" name="Descripcion" placeholder="Ingrese descripcion" required>
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
    <div id="mdlActualizarCategoria" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Actualizar Categoria</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <form class="form" id="frmActualizarCategoria" method="post" >
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 col-xs-12">
                                <div class="input-group">
                                    <label>Nombre de la Categoria:</label>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control AutofocusInput" id="DescripcionEditar" name="DescripcionEditar" placeholder="Ingrese descripcion" required>
                                    <input type="text" class="form-control AutofocusInput" id="CodigoCatEditar" name="CodigoCatEditar" placeholder="Ingrese id" required>
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