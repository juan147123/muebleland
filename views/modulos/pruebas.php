<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            vista pruebas
            <small> CieloLuana</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Inicio</li>
        </ol>
    </section>
    <section class="content container-fluid">
    <div>
        <a data-toggle="modal" data-target="#mdlCategoria" class="btn btn-success btn-flat"><i class="fa fa-plus"></i>
            Nuevo Personal</a>
    </div>
    <br>
    </section>

     <!-- Agregar Categoria Modal -->
     <div class="modal fade" id="mdlCategoria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registro Personal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form class="form" id="frmCategoria">

                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-check"></i></span>
                            </div>
                            <select class="form-control lista" id="tipo_doc_PS" name="tipo_doc_PS" aria-label="Username"
                                aria-describedby="basic-addon1">
                                <option selected>Seleccione Tipo de Sub-Equipo</option>
                                <option value="1">RRHH Y GESTIÓN DE PERSONAS</option>
                                <option value="2">TEAM LEADER RRHH</option>
                                <option value="3">RECLUTAMIENTO</option>
                                <option value="3">INDUCCION Y ENTRENAMIENTO</option>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-check"></i></span>
                            </div>
                            <input type="text" class="form-control" id="nombrePS" name="nombrePS"
                                placeholder="Nombre completo" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-check"></i></span>
                            </div>
                            <input type="text" class="form-control" id="nombrePS" name="nombrePS"
                                placeholder="Nombre completo" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-check"></i></span>
                            </div>
                            <input type="text" class="form-control" id="nombrePS" name="nombrePS"
                                placeholder="Nombre completo" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close red"></i>
                            Cancelar</button>
                        <button type="submit" value="Registrar" class="btn btn-primary"><i class="fa fa-floppy-o"></i>
                            Registrar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>