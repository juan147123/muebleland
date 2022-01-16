$('form#frmRegistroMarca').submit(function (e) {
    e.preventDefault();
    var $form = $(this);
    datos = $form.serialize();
    $.ajax({
        url: "ajax/SeccionMarcas/registrarmarcas.php",
        type: "post",
        data: datos,
        dataType: 'json',
    }).done(function (respuesta) {
        $data = respuesta.response;
        if ($data == 'true') {
            Swal.fire(
                '¡Éxito!',
                'La marca fue registrada',
                'success'
            )
            tblMarcas.ajax.reload();
            $('form#frmRegistroMarca')[0].reset();
            $("#mdlRegistrarMarca").modal("hide");
        } else if ($data == 'repeat') {
            Swal.fire(
                '¡Error!',
                'La marca ya se encuentra registrada',
                'info'
            )

        }
    });
});

function btnEditarMarca(id_marca) {
    $.ajax({
        url: "ajax/AjaxMostrar/mostrar_Ajax.php",
        type: "post",
        data: "id_marca=" + id_marca,
        dataType: 'json',
    }).done(function (respuesta) {
        $data = respuesta;
        $('#id_marcaEditar').val($data['id_marca']);
        $('#descripcionEditar').val($data['descripcion']);
    });
}

$('form#frmActualizarMarca').submit(function (e) {
    e.preventDefault();
    var $form = $(this);
    datos = $form.serialize();
    $.ajax({
        url: "ajax/SeccionMarcas/actualizarmarcas.php",
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
            tblMarcas.ajax.reload(null, false);
            $("#mdlActualizarMarca").modal("hide");
        } else if ($data == 'error') {
            Swal.fire(
                'Upps!',
                'Hubo un error al actualizar los datos.',
                'info'
            )
        }
    });
});

function btnEliminarMarca(id_marca) {
    Swal.fire({
        title: '¿Estás seguro en eliminar?',
        text: "Se quitara de forma permanente a la marca!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar.',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "ajax/SeccionMarcas/eliminarmarcas.php",
                type: "post",
                data: "id_marca=" + id_marca,
                dataType: 'json',
            }).done(function (respuesta) {
                $data = respuesta;
                if ($data == 'ok') {
                    swal.fire('¡Éxito!', 'Se ha Eliminado la marca.', 'success');
                    tblMarcas.ajax.reload();

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