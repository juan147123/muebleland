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
            );
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


$('#tipo_documentocli').on('change', function () {
    let dataenviada = $('#tipo_documentocli option:selected').val();
    document.getElementById("NombreCompleto").value = "";
    document.getElementById("Direccion").value = "";
    document.getElementById("NIT").value = "";
    $("#enviarruc").attr("hidden", true);
    $("#enviardni").attr("hidden", true);
    const btnenviardoctransporte = $("#enviarruc")
    const btnenviardoctransportedni = $("#enviardni")
    const valordoctransporte = document.getElementById("NIT");
    if (dataenviada == "ruc") {
        document.getElementById("NombreCompleto").value = "";
        document.getElementById("NIT").value = "";
        $("#enviarruc").attr("hidden", false);
        $("#enviardni").attr("hidden", true);

        btnenviardoctransporte.on("click", function () {
            $("#NombreCompleto").val(null);
            $("#Direccion").val(null);
            if (valordoctransporte.value.length == 11) {
                $.ajax({
                    type: "POST",
                    url: "extensiones/extencion_api.php",
                    data: "ruc=" + valordoctransporte.value,
                    dataType: 'json',
                }).done(function (respuesta) {
                    stop();
                    if (respuesta.respuesta == "error") {
                        swal.fire('Upss!', 'Hubo un error al consultar el ruc', 'info');
                    } else if (respuesta.success == true) {
                        $("#NombreCompleto").val(respuesta.nombre_o_razon_social)
                        $("#Direccion").val(respuesta.direccion_completa)

                    }
                    else {
                        swal.fire('Upss!', 'Hubo un error garrafal al buscar el ruc', 'danger');
                    }
                });
            }
            else if (valordoctransporte.value.length != 11) {
                swal.fire('Upss!', 'La longitud debe ser 11', 'info');
            } else {
                valordoctransporte.setAttribute("required", "Rellene este campo");
            }
        });
    } else if (dataenviada == "dni") {
        document.getElementById("NombreCompleto").value = "";
        document.getElementById("Direccion").value = "";
        document.getElementById("NIT").value = "";
        $("#enviarruc").attr("hidden", true);
        $("#enviardni").attr("hidden", false);
        btnenviardoctransportedni.on("click", function () {
            $("#NombreCompleto").val(null);
            $("#Direccion").val(null);
            if (valordoctransporte.value.length == 8) {
                $.ajax({
                    type: "POST",
                    url: "extensiones/extencion_api.php",
                    data: "dni=" + valordoctransporte.value,
                    dataType: 'json',
                }).done(function (respuesta) {
                    stop();
                    if (respuesta.respuesta == "error") {
                        swal.fire('Upss!', 'Hubo un error al consultar el DNI', 'info');
                    } else if (respuesta) {
                        $("#NombreCompleto").val(respuesta.nombre)
                    } else {
                        alert("error garrafal")
                    }
                });
            }
            else if (valordoctransporte.value.length != 8) {
                swal.fire('Upss!', 'La longitud debe ser 8', 'info');
            } else {
                valordoctransporte.setAttribute("required", "Rellene este campo");
            }
        });
    } else {
        document.getElementById("NombreCompleto").value = "";
        document.getElementById("NIT").value = "";
        $("#enviarruc").attr("hidden", true);
        $("#enviardni").attr("hidden", true);
    }
});

