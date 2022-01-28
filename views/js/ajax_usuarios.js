$('#selectrab').on('change', function () {
    let data = $('#selectrab option:selected').val();
    let datasend = 'id_trabajador=' + data;

    $.ajax({
        url: "ajax/AjaxMostrar/mostrar_Ajax.php",
        type: 'post',
        data: datasend,
        dataType: 'json',
    }).done(function (respuesta) {
        $data = respuesta;
        $('#email').val($data['correo_trab']);
        

    });

});

$('form#formUsuarioReg').submit(function (e) {
    e.preventDefault();
    var $form = $(this);
    $('#email').prop('disabled',false);
    datos = $form.serialize();
    $.ajax({
        url: "ajax/SeccionUsuarios/registrarusuario.php",
        type: "post",
        data: datos,
        dataType: 'json',
    }).done(function (respuesta) {
        $data = respuesta.response;
        if ($data == 'true') {
            Swal.fire(
                '¡Éxito!',
                'El usuario fue registrado',
                'success'
            )
            $('#email').prop('disabled',true);
            tblUsuarios.ajax.reload();
            $('form#formUsuarioReg')[0].reset();
            $("#mdlRegistrarUsuario").modal("hide");
        } else if ($data == 'repeat') {
            Swal.fire(
                '¡Error!',
                'El usuario ya se encuentra registrado',
                'info'
            )

        }
        else if($data=='no coinciden'){
            Swal.fire(
                '¡Error!',
                'Las contraseñas deben coincidir',
                'info'
            )

        }
    });
});

function btnEliminarUsuario(id_usuario) {
    Swal.fire({
        title: '¿Estás seguro en eliminar?',
        text: "Se quitara de forma permanente al usuario!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar.',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "ajax/SeccionUsuarios/eliminarusuario.php",
                type: "post",
                data: "id_usuario=" + id_usuario,
                dataType: 'json',
            }).done(function (respuesta) {
                $data = respuesta;
                if ($data == 'ok') {
                    swal.fire('¡Éxito!', 'Se ha Eliminado el usuario.', 'success');
                    tblUsuarios.ajax.reload();

                }else if($data=='existen'){
                    swal.fire('¡Error!', 'Esta marca ya cuenta con producto registrado.', 'warning');

                } else {
                    if ($data == 'error') {
                        swal.fire('¡Error!', 'No Se ha Eliminado la marca', 'danger');

                    }
                }
            });
        } else {
            alertify.error('Canceló la operación');
        }
    })
}