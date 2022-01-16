$('form#frmRegistroProveedor').submit(function (e) {
    e.preventDefault();
    var $form = $(this);
    datos = $form.serialize();
    $.ajax({
        url: "ajax/SeccionProveedor/registrarproveedor.php",
        type: "post",
        data: datos,
        dataType: 'json',
    }).done(function (respuesta) {
        $data = respuesta.response;
        if ($data == 'true') {
            Swal.fire(
                '¡Éxito!',
                'El proveedor fue registrado.',
                'success'
            )
            tblProveedor.ajax.reload(null, false);
            $('form#frmRegistroProveedor')[0].reset();
            $("#mdlproveedor").modal("hide");
        } else if ($data == 'repeat') {
            Swal.fire(
                '¡Error!',
                'El proveedor ya se encuentra registrado.',
                'info'
            )

        }
    });
});


function btnEditarproveedor(NITProveedor) {
    $.ajax({
        url: "ajax/AjaxMostrar/mostrar_Ajax.php",
        type: "post",
        data: "NITProveedor=" + NITProveedor,
        dataType: 'json',
    }).done(function (respuesta) {
        $data = respuesta;
        $('#NITProveedorEditar').val($data['NITProveedor']);
        $('#NombreProveedorEditar').val($data['NombreProveedor']);
        $('#DireccionEditar').val($data['Direccion']);
        $('#TelefonoEditar').val($data['Telefono']);
        $('#PaginaWebEditar').val($data['PaginaWeb']);
        $('#EstadoEditar').val($data['Estado']);
        document.querySelector('#select2-EstadoEditar-container').innerHTML = $data['Estado'];
    });
}

$('form#frmActualizarProveedor').submit(function (e) {
    e.preventDefault();
    var $form = $(this);
    datos = $form.serialize();
    $.ajax({
        url: "ajax/SeccionProveedor/actualizarproveedor.php",
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
            tblProveedor.ajax.reload(null, false);
            $("#mdlActualizarProveedor").modal("hide");
        } else if ($data == 'error') {
            Swal.fire(
                'Upps!',
                'Hubo un error al actualizar los datos.',
                'info'
            )
        }
    });
});

function btnEliminarProveedor(NITProveedor) {
    Swal.fire({
        title: '¿Estás seguro en eliminar?',
        text: "Se quitara de forma permanente al proveedor!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar.',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "ajax/SeccionProveedor/eliminarproveedor.php",
                type: "post",
                data: "NITProveedor=" + NITProveedor,
                dataType: 'json',
            }).done(function (respuesta) {
                $data = respuesta;
                if ($data == 'ok') {
                    swal.fire('¡Éxito!', 'Se ha Eliminado el proveedor.', 'success');
                    tblProveedor.ajax.reload();

                } else {
                    if ($data == 'existen') {
                        swal.fire('¡Error!', 'El proveedor se encuentra en uso', 'error');

                    }
                }
            });
        } else {
            alertify.error('Canceló la operación');
        }
    })
}