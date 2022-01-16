<div id="contenidologin">
    <div class="form-container">
        <form id="formlogin" method="POST" class="form" action="ajax/seccionLoginAjax/login_ingreso.php">
            <div>
                <img src="views/images/logomuebleland1.jpg" class="circular--square">
            </div>

            <div class="form-title">
            </div>
            <hr>
            <div class="mb-3">
                <input type="text" class="form-control" name="usuario" id="usuario" aria-describedby="helpId" placeholder="Nombre de Usuario" maxlength="60" required>
            </div>
            <div class="mb-3 d-flex ">
                <input type="password" class="form-control pass" name="contrasena" id="contrasena" placeholder="Contraseña" minlength="4" required>
                <div class="rell" id="rell"><i class="fa fa-eye" id="showpass" type="button" aria-hidden="true" onclick="mostrarcontrasena()"></i>
                    <i class="fa fa-eye-slash" id="showpass2" type="button" aria-hidden="true" style="visibility:hidden" onclick="mostrarcontrasena2()"></i>
                </div>
            </div>
            <button class="btn" id="btnlogin" type="submit">INGRESAR</button>
        </form>
    </div>
</div>