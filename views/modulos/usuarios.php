<section>
    <div class="box-header with-border">
        <h3 class="box-title">Lista de usuarios</h3>
    </div>
    </br>


    <div>
        <button type="button" class="btn btn-success waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#mdlRegistrarUsuario">
            <i class="fa fa-plus"></i> Registrar</button>
    </div>
    <br>

    <br>
    <!--tabla-->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="Listarusuarios" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombres y Apellidos</th>
                                <th>Descripción</th>
                                <th>Correo</th>
                                <th>Fecha</th>
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
    <div id="mdlRegistrarUsuario" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Registrar Marca</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <form class="form" id="formUsuarioReg" class="needs-validation" method="POST">
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <select id="selectrab" name="selectrab" class="form-control ">
                            <option value="">Seleccionar Trabajador</option>
                            <?php
                            $data = empleadoscontroller::ctrListarEmpleados();
                            foreach ($data as $res) {
                                echo "<option value='" . $res['id_trabajador'] . "'>" . $res['nombres_trab'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="selectcargo" class="form-label">Cargo trabajador</label>
                        <select id="selectcargo" name="selectcargo" class="form-control">
                            <option value="">Seleccionar tipo cargo</option>
                            <?php
                            $data = usuarioscontroller::ctrListarCargos();
                            foreach ($data as $res) {
                                echo "<option value='" . $res['id_cargo'] . "'>" . $res['descripcion'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-at"></i></span>
                        </div>
                        <input type="mail" class="form-control" id="email" value="" name="email" placeholder="Correo Electrónico" autocomplete="off" aria-label="Username" aria-describedby="basic-addon1" pattern="[a-zA-Z\sñÑáéíóúÁÉÍÓÚ@.0-9]+" disabled required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" class="form-control" id="pass" name="pass" minlength="8" autocomplete="off" placeholder="Contraseña" aria-label="Username" aria-describedby="basic-addon1" pattern="[a-zA-Z0-9\sñÑáéíóúÁÉÍÓÚ]+" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" class="form-control" id="passconfirmar" name="passconfirmar" minlength="8" autocomplete="off" placeholder="Contraseña" aria-label="Username" aria-describedby="basic-addon1" pattern="[a-zA-Z0-9\sñÑáéíóúÁÉÍÓÚ]+">
                    </div>
                    <div class="text-center" style="color:red;" id="valpassuser" hidden="true">
                        <strong>Las contraseñas deben ser iguales</strong>
                    </div>
                </div>

                <div class="modal-footer ">
                    <button type="button" onclick="btn_reset_usuario()" class="btn btn-danger" data-dismiss="modal">
                        <i class="fas fa-times-circle"></i>
                        Cancelar
                    </button>
                    <button type="submit" value="Registrar" class="btn btn-success">
                        <i class="fas fa-check"></i>
                        Registrar
                    </button>
                </div>
            </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</section>