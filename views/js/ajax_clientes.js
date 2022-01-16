$('form#frmRegistroCliente').submit(function (e) {
    e.preventDefault();
    var $form = $(this);
    datos = $form.serialize();
    $.ajax({
        url: "ajax/SeccionCliente/registrarcliente.php",
        type: "post",
        data: datos,
        dataType: 'json',
    }).done(function (respuesta) {
        $data = respuesta.response;
        if ($data == 'true') {
            Swal.fire(
                '¡Éxito!',
                'El cliente fue registrado.',
                'success'
            )
            tblCliente.ajax.reload();
            $('form#frmRegistroCliente')[0].reset();
            $("#mdlregistrocliente").modal("hide");
        } else if ($data == 'repeat') {
            Swal.fire(
                '¡Error!',
                'El documento del empleado ya se encuentra registrado.',
                'info'
            )

        }
    });
});

function btnEditarCliente(NIT) {
    $.ajax({
        url: "ajax/AjaxMostrar/mostrar_Ajax.php",
        type: "post",
        data: "NIT=" + NIT,
        dataType: 'json',
    }).done(function (respuesta) {
        $data = respuesta;
        $('#NITEditar').val($data['NIT']);
        $('#NombreCompletoEditar').val($data['NombreCompleto']);
        $('#ApellidoEditar').val($data['Apellido']);
        $('#DireccionEditar').val($data['Direccion']);
        $('#TelefonoEditar').val($data['Telefono']);
        $('#EmailEditar').val($data['Email']);
    });
}

$('form#frmActualizarCliente').submit(function (e) {
    e.preventDefault();
    var $form = $(this);
    datos = $form.serialize();
    $.ajax({
        url: "ajax/SeccionCliente/actualizarcliente.php",
        type: "post",
        data: datos,
        dataType: 'json',
    }).done(function (respuesta) {
        $data = respuesta.response;
        if ($data == 'true') {
            Swal.fire(
                '¡Éxito!',
                'Datos actualizados.',
                'success'
            )
            tblCliente.ajax.reload(null, false);
            $("#mdlactualizarcliente").modal("hide");
        } else if ($data == 'error') {
            Swal.fire(
                'Upps!',
                'Hubo un error al actualizar los datos.',
                'info'
            )
        }
    });
});


function btnEliminarCliente(NIT) {
    Swal.fire({
        title: '¿Estás seguro en eliminar?',
        text: "Se quitara de forma permanente al cliente!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar.',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "ajax/SeccionCliente/eliminarcliente.php",
                type: "post",
                data: "NIT=" + NIT,
                dataType: 'json',
            }).done(function (respuesta) {
                $data = respuesta;
                if ($data == 'ok') {
                    swal.fire('¡Éxito!', 'Se ha Eliminado el empleado.', 'success');
                    tblCliente.ajax.reload();

                } else {
                    if ($data == 'error') {
                        swal.fire('¡Error!', 'No Se ha Eliminado el empleado.', 'danger');

                    }
                }
            });
        } else {
            alertify.error('Canceló la operación');
        }
    })
}