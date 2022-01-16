$('form#frmRegistroColor').submit(function (e) {
    e.preventDefault();
    var $form = $(this);
    datos = $form.serialize();
    $.ajax({
        url: "ajax/SeccionColores/registrarcolores.php",
        type: "post",
        data: datos,
        dataType: 'json',
    }).done(function (respuesta) {
        $data = respuesta.response;
        if ($data == 'true') {
            Swal.fire(
                '¡Éxito!',
                'El clolor fue registrado',
                'success'
            )
            tblColores.ajax.reload();
            $('form#frmRegistroColor')[0].reset();
            $("#mdlRegistrarColor").modal("hide");
        } else if ($data == 'repeat') {
            Swal.fire(
                '¡Error!',
                'El color ya se encuentra registrado',
                'info'
            )

        }
    });
});

function btnEditarColor(id_color) {
    $.ajax({
        url: "ajax/AjaxMostrar/mostrar_Ajax.php",
        type: "post",
        data: "id_color=" + id_color,
        dataType: 'json',
    }).done(function (respuesta) {
        $data = respuesta;
        $('#id_colorEditar').val($data['id_color']);
        $('#nombre_colorEditar').val($data['nombre_color']);
    });
}

$('form#frmActualizarColor').submit(function (e) {
    e.preventDefault();
    var $form = $(this);
    datos = $form.serialize();
    $.ajax({
        url: "ajax/SeccionColores/actualizarcolores.php",
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
            tblColores.ajax.reload(null, false);
            $("#mdlActualizarColor").modal("hide");
        } else if ($data == 'error') {
            Swal.fire(
                'Upps!',
                'Hubo un error al actualizar los datos.',
                'info'
            )
        }
    });
});

function btnEliminarColor(id_color) {
    Swal.fire({
        title: '¿Estás seguro en eliminar?',
        text: "Se quitara de forma permanente al color!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar.',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "ajax/SeccionColores/eliminarcolores.php",
                type: "post",
                data: "id_color=" + id_color,
                dataType: 'json',
            }).done(function (respuesta) {
                $data = respuesta;
                if ($data == 'ok') {
                    swal.fire('¡Éxito!', 'Se ha Eliminado el color..', 'success');
                    tblColores.ajax.reload();

                } else {
                    if ($data == 'error') {
                        swal.fire('¡Error!', 'No Se ha Eliminado el color.', 'danger');

                    }
                }
            });
        } else {
            alertify.error('Canceló la operación');
        }
    })
}
