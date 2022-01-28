$(document).ready(function () {
    $('form#formlogin').submit((e) => {
        e.preventDefault();
        $form = $('#formlogin');
        dataform = $form.serialize();
        $.ajax({
            url: "ajax/seccionLoginAjax/login_ingreso.php",
            type: 'POST',
            data: dataform,
            dataType: 'json',
            success: function (res) {
                $response = res.response;
                console.log($response);
                if ($response == 'true') {
                    window.location = "inicio";
                } else if ($response == 'error') {
                    swal.fire('Upss!', 'El correo o la contraseña son incorrectos', 'info');
                }else if($response == 'ventas'){
                    window.location = "clientes";
                }else if($response == 'almacen'){
                    window.location = "productos";
                }
            }
        });
    });
});

/* funcion para mostrar las contraseñas */

function mostrarcontrasena(){
    var btnshowpass = document.getElementById("contrasena");

        btnshowpass.type="text";
        document.getElementById('showpass').style.visibility = 'hidden';
        document.getElementById('showpass2').style.visibility = 'visible';
    
}
function mostrarcontrasena2(){
    var btnshowpass = document.getElementById("contrasena");
        btnshowpass.type="password";
        document.getElementById('showpass').style.visibility = 'visible';
        document.getElementById('showpass2').style.visibility = 'hidden';
    
}