$('form#frmRegistroEmpleado').submit(function (e) {
    e.preventDefault();
    var $form = $(this);
    datos = $form.serialize();
    $.ajax({
        url: "ajax/SeccionEmpleado/registrarempleado.php",
        type: "post",
        data: datos,
        dataType: 'json',
    }).done(function (respuesta) {
        $data = respuesta.response;
        if ($data == 'true') {
            Swal.fire(
                '¡Éxito!',
                'El empleado fue registrado.',
                'success'
            )
            tblEmpleado.ajax.reload(null, false);
            $('form#frmRegistroEmpleado')[0].reset();
            $("#mdlempleados").modal("hide");
        } else if ($data == 'repeat') {
            Swal.fire(
                '¡Error!',
                'El documento o correo del empleado ya se encuentra registrado.',
                'info'
            )

        }
    });
});


function btnEditarEmpleado(id_trabajador) {
    $.ajax({
        url: "ajax/AjaxMostrar/mostrar_Ajax.php",
        type: "post",
        data: "id_trabajador=" + id_trabajador,
        dataType: 'json',
    }).done(function (respuesta) {
        $data = respuesta;
        console.log($data);
        $('#id_trabajadorEditar').val($data['id_trabajador']);
        $('#nombres_trabEditar').val($data['nombres_trab']);
        $('#direccion_trabEditar').val($data['direccion_trab']);
        $('#correo_trabEditar').val($data['correo_trab']);
        $('#telefono_trabEditar').val($data['telefono_trab']);
        $('#tipo_documentoEditar').val($data['tipo_documento']);
        $('#numero_documentoEditar').val($data['numero_documento']);
        $('#estadoEditar').val($data['estado']);
        $('#inicio_labEditar').val($data['inicio_lab']);
        $('#tipo_contratoSEditar').val($data['tipo_contrato']);
    });
}

$('form#frmActualizarEmpleado').submit(function (e) {
    e.preventDefault();
    var $form = $(this);
    datos = $form.serialize();
    $.ajax({
        url: "ajax/SeccionEmpleado/actualizarempleado.php",
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
            tblEmpleado.ajax.reload(null, false);
            $("#mdlActualizarEmpleado").modal("hide");
        } else if ($data == 'error') {
            Swal.fire(
                'Upps!',
                'Hubo un error al actualizar los datos.',
                'info'
            )
        }
    });
});

function btnReingresarEmpleado(id_trabajador) {
    Swal.fire({
        title: '¿Estás seguro en reingresar al trabajador?',
        text: "Se reingresará al trabajador",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Reingresar.',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "ajax/SeccionEmpleado/reingresarempleado.php",
                type: "post",
                data: "id_trabajador=" + id_trabajador,
            }).done(function (respuesta) {
                if (respuesta = "ok") {
                    Swal.fire(
                        '¡Reingresado!',
                        'El Trabajador fue reingresado.',
                        'success'
                    )
                    tblEmpleado.ajax.reload();
                }
            })

        } else {
            alertify.error('Canceló la operación');
        }
    })
}


function btnEliminarEmpleado(id_trabajador) {
    Swal.fire({
        title: '¿Estás seguro en eliminar?',
        text: "Se quitara de forma permanente al empleado!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar.',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "ajax/SeccionEmpleado/eliminarempleado.php",
                type: "post",
                data: "id_trabajador=" + id_trabajador,
                dataType: 'json',
            }).done(function (respuesta) {
                $data = respuesta;
                if ($data == 'ok') {
                    swal.fire('¡Éxito!', 'Se ha Eliminado el empleado.', 'success');
                    tblEmpleado.ajax.reload();

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