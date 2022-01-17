$('form#frmRegistroCategoria').submit(function (e) {
    e.preventDefault();
    var $form = $(this);
    datos = $form.serialize();
    $.ajax({
        url: "ajax/SeccionCategorias/registrarcategorias.php",
        type: "post",
        data: datos,
        dataType: 'json',
    }).done(function (respuesta) {
        $data = respuesta.response;
        if ($data == 'true') {
            Swal.fire(
                '¡Éxito!',
                'La categoria fue registrada',
                'success'
            )
            tblCategorias.ajax.reload();
            $('form#frmRegistroCategoria')[0].reset();
            $("#mdlRegistrarCategoria").modal("hide");
        } else if ($data == 'repeat') {
            Swal.fire(
                '¡Error!',
                'La categoria ya se encuentra registrada',
                'info'
            )

        }
    });
});
function btnEditarCategoria(CodigoCat) {
    $.ajax({
        url: "ajax/AjaxMostrar/mostrar_Ajax.php",
        type: "post",
        data: "CodigoCat=" + CodigoCat,
        dataType: 'json',
    }).done(function (respuesta) {
        $data = respuesta;
        console.log($data);
        $('#CodigoCatEditar').val($data['CodigoCat']);
        $('#DescripcionEditar').val($data['Descripcion']);
    });
}

$('form#frmActualizarCategoria').submit(function (e) {
    e.preventDefault();
    var $form = $(this);
    datos = $form.serialize();
    $.ajax({
        url: "ajax/SeccionCategorias/actualizarcategorias.php",
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
            tblCategorias.ajax.reload(null, false);
            $("#mdlActualizarCategoria").modal("hide");
        } else if ($data == 'error') {
            Swal.fire(
                'Upps!',
                'Hubo un error al actualizar los datos.',
                'info'
            )
        }
    });
});

function btnEliminarCategoria(CodigoCat) {
    Swal.fire({
        title: '¿Estás seguro en eliminar?',
        text: "Se quitara de forma permanente a la categoria!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar.',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "ajax/SeccionCategorias/eliminarcategorias.php",
                type: "post",
                data: "CodigoCat=" + CodigoCat,
                dataType: 'json',
            }).done(function (respuesta) {
                $data = respuesta;
                if ($data == 'ok') {
                    swal.fire('¡Éxito!', 'Se ha Eliminado la categoria.', 'success');
                    tblCategorias.ajax.reload();

                }else if($data=='existen'){
                    swal.fire('¡Error!', 'Esta categoria ya cuenta con producto registrado.', 'warning');

                } else {
                    if ($data == 'error') {
                        swal.fire('¡Error!', 'No Se ha Eliminado la categoria', 'danger');

                    }
                }
            });
        } else {
            alertify.error('Canceló la operación');
        }
    })
}