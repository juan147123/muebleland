$('form#frmRegistroFacturaCompra').submit(function (e) {
    e.preventDefault();
    var $formr = document.getElementById('frmRegistroFacturaCompra');
    var datos = new FormData($formr);
    $.ajax({
        url: "ajax/SessionFacturaCompra/Registrarfacturacompra.Ajax.php",
        type: "post",
        data: datos,
        dataType: 'json',
        contentType: false,
        processData: false,
    }).done(function (respuesta) {
        $data = respuesta.response;
        if ($data == 'true') {
            e.preventDefault();
            e.stopPropagation();
            $('form#frmRegistroFacturaCompra')[0].reset(null, false);
            swal.fire('¡Se ha insertado!', 'Satisfactoriamente la factura', 'success');
            tblFacturaCompra.ajax.reload();
            sendMessage("rctfctcm");
            $("#mdlfacturacompra").modal("hide");
            /* deleteimg(); */
        } else if ($data == 'repeat') {
            swal.fire('Upss!', 'La factura ya se encuentra registrado', 'info');
        } else {
            if ($data == 'no iguales') {
                e.preventDefault();
                e.stopPropagation();
            }
        }
    });
});
function btnEliminarFacturaCompra(idfac) {
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
                url: "ajax/SessionFacturaCompra/Eliminarfacturacompra.Ajax.php",
                type: "post",
                data: "idfac=" + idfac,
                dataType: 'json',
            }).done(function (respuesta) {
                $data = respuesta;
                if ($data == 'ok') {
                    swal.fire('¡Éxito!', 'Se ha Eliminado la factura.', 'success');
                    tblFacturaCompra.ajax.reload();
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


function eliminarimagenFact(imagen) {
    $.ajax({
        url: "ajax/SessionFacturaCompra/EliminarImagenFacturaC.Ajax.php",
        type: "post",
        data: "imagen=" + imagen,
    })
}

function preview(e) {
    const url = e.target.files[0];
    const urlTmp = URL.createObjectURL(url);
    document.getElementById("img-preview").src = urlTmp;
    document.getElementById("icon-image").classList.add("d-none");
    document.getElementById("icon-cerrar").innerHTML = `
    <button class="btn btn-danger"onclick="deleteimg(event)"><i class="fas fa-times"></i></button> ${url['name']}`;

}
function deleteimg() {
    document.getElementById("icon-cerrar").innerHTML = '';
    document.getElementById("icon-image").classList.remove("d-none");
    document.getElementById("img-preview").src = '';
    document.getElementById("imagenfac").value = '';
}




function mostrar(imagen) {
    var modal = document.getElementById('mdlimagen');
    var modalImg = document.getElementById("img01");
    modal.style.display = "block";
    var ruta = "views/facturas/";
    modalImg.src = ruta + imagen;
}

function ocultarimagenfact() {
    var modal = document.getElementById('mdlimagen');
    modal.style.display = "none";
}


function btnVerificarestadoAlmacenado(idfac) {
    $.ajax({
        url: "ajax/SessionFacturaCompra/Verificarestadoalmacenado.Ajax.php",
        type: "post",
        data: "idfac=" + idfac,
        dataType: 'json',
    }).done(function (respuesta) {
        $data = respuesta.response;
        if ($data == 'actualizar') {
            btnActualizarEstadoAlmacenadoCompleto(idfac);
        } else {
            if ($data == 'noactualizar') {
            }
        }
    });
}
function btnActualizarEstadoFac() {
    idfac=$('#id_facturacompra').val()
    $.ajax({
        url: "ajax/SessionFacturaCompra/ActualizarEstadofac.ajax.php",
        type: "post",
        data: "idfac=" + idfac,
        dataType: 'json',
    }).done(function (respuesta) {
        $("#mdldetallefacturadocompraadd").modal("hide");
        swal.fire('¡Éxito!', 'Se han Registrado los productos a la factura', 'success');
        $data = respuesta;
        respuesta = 'ok';
        tblFacturaCompra.ajax.reload();
    });
}
function btnActualizarEstadoAlmacenadoCompleto(idfac) {
    $.ajax({
        url: "ajax/SessionFacturaCompra/Actualizarestadoalmacenadocompleto.Ajax.php",
        type: "post",
        data: "idfac=" + idfac,
        dataType: 'json',
    }).done(function (respuesta) {
        swal.fire('¡Éxito!', 'Se han almacenado todos los productos', 'success');
        $data = respuesta;
        respuesta = 'ok';
        tblFacturaCompra.ajax.reload();
    });
}
function btnMostraridfacturaalmacenado(idfac) {
    $('#id_facturacompra').val(idfac);
    $('#idfacturaalmacenado').val(idfac);
}
function btnActualizarestadofacturaculminada(idfac) {
    $.ajax({
        url: "ajax/SessionFacturaCompra/Actualizarestadofacturaculminada.Ajax.php",
        type: "post",
        data: "idfac=" + idfac,
        dataType: 'json',
    }).done(function (respuesta) {
        respuesta = 'ok';
        tblFacturaCompra.ajax.reload();
        sendMessage("rctfctcm");
    });
}
