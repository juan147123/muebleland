$('form#frmRegistroDetalleTempFacturaCompra').submit(function (e) {
    e.preventDefault();
    var $form = $(this);
    datos = $form.serialize();
    $.ajax({
        url: "ajax/SessionFacturaCompra/DetalleFacturaCompra_Ajax.php",
        type: "post",
        data: datos,
        dataType: "json",
    }).done(function (respuesta) {
        $data = respuesta.response;
        if ($data == 'true') {
            $("#mdlAgregarProdDetalleFacturaCompra").modal("hide");
            swal.fire('¡Éxito!', 'Se ha registrado el producto.', 'success');
            tblDetalleFacturadoCompra.ajax.reload();
        } else {
            if ($data == 'repeat') {
                swal.fire('¡No se pudo registrar!', 'Error', 'error');
            }
        }
    });
});
$('form#frmActualizarDetFacCom').submit(function (e) {
    e.preventDefault();
    var $form = $(this);
    datos = $form.serialize();
    $.ajax({
        url: "ajax/SessionFacturaCompra/ActualizarDetFacCom.Ajax.php",
        type: "post",
        data: datos,
        dataType: "json",
    }).done(function (respuesta) {
        $data = respuesta.response;
        if ($data == 'true') {
            $("#mdlActualizarDetFacCom").modal("hide");
            swal.fire('¡Éxito!', 'Se ha actualizado el registro.', 'success');
            tblDetalleFacturadoCompra.ajax.reload();
            tblDetalleFacturadoCompra2.ajax.reload();
        } else {
            if ($data == 'repeat') {
                swal.fire('¡No se pudo actualizar!', 'Error', 'error');
            }
        }
    });
});
$('form#frmActualizarDetFacCom2').submit(function (e) {
    e.preventDefault();
    var $form = $(this);
    datos = $form.serialize();
    $.ajax({
        url: "ajax/SessionFacturaCompra/ActualizarDetFacCom2.Ajax.php",
        type: "post",
        data: datos,
        dataType: "json",
    }).done(function (respuesta) {
        $data = respuesta.response;
        if ($data == 'true') {
            $("#mdlActualizarDetFacCom2").modal("hide");
            swal.fire('¡Éxito!', 'Se ha actualizado el registro.', 'success');
            tblDetalleFacturadoCompra2.ajax.reload();
        } else {
            if ($data == 'repeat') {
                swal.fire('¡No se pudo actualizar!', 'Error', 'error');
            }
        }
    });
});
function btnActualizarEstadoAlmacenadoDetalleFacturaCompra(id) {
    $.ajax({
        url: "ajax/SessionFacturaCompra/Actualizarestadoalmacenado.Ajax.php",
        type: "post",
        data: "id=" + id,
        dataType: 'json',
    }).done(function (respuesta) {
        respuesta = 'ok';
        tblDetalleFacturadoCompra2.ajax.reload();
        btnVerificarestadoAlmacenado($('#idfacturaalmacenado').val());
    });
}
function btnEditarDetFacCom(id) {
    $.ajax({
        url: "ajax/SessionFacturaCompra/MostrarDetFacCompra.Ajax.php",
        type: "post",
        data: "id=" + id,
        dataType: 'json',
    }).done(function (respuesta) {
        $data = respuesta;
        $('#idEditardfc').val($data['id']);
        $('#precio_ventaEditardfc').val($data['precio_uni']);
        $('#cantidadprodEditardfc').val($data['cantidad']);

        $('#idEditardfc2').val($data['id']);
        $('#precio_ventaEditardfc2').val($data['precio_uni']);
        $('#cantidadprodEditardfc2').val($data['cantidad']);
    });
}

$('form#frmActualizarDetFacCom').submit(function (e) {
    e.preventDefault();
    var $form = $(this);
    datos = $form.serialize();
    $.ajax({
        url: "ajax/SessionFacturaCompra/ActualizarDetFacCom.Ajax.php",
        type: "post",
        data: datos,
        dataType: "json",
    }).done(function (respuesta) {
        $data = respuesta.response;
        if ($data == 'true') {
            sendMessage("rtcol");
            $("#mdlActualizarDetFacCom").modal("hide");
            swal.fire('¡Éxito!', 'Se ha actualizado el registro.', 'success');
            tblDetalleFacturadoCompra.ajax.reload();
            sendMessage("rctdfctc");
        } else {
            if ($data == 'repeat') {
                swal.fire('¡No se pudo actualizar!', 'Error', 'error');
            }
        }
    });
});

function btnEliminarDetFacturaCompra(id) {
    Swal.fire({
        title: '¿Estás seguro en eliminar?',
        text: "Se quitara de forma permanente!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar.',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "ajax/SessionFacturaCompra/EliminarDetalle.ajax.php",
                type: "post",
                data: "id=" + id,
                dataType: 'json',
            }).done(function (respuesta) {
                $data = respuesta;
                if ($data == 'ok') {
                    swal.fire('¡Éxito!', 'Se ha Eliminado el Producto.', 'success');
                    tblDetalleFacturadoCompra.ajax.reload();
                    sendMessage("rctfctcm");
                } else {
                    swal.fire('¡No se puede eliminar!', 'El factura ya se encuentra en uso por uno o más productos', 'error');

                }
            });

        } else {
            alertify.error('Canceló la operación');
        }
    })
}
