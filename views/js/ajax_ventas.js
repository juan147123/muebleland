function ListarClientesVentas() {
    selectvntcli = $('#id_clienteVenta');
    selectvntcli.html("");
    $.ajax({
        url: "ajax/ListarTablasAjax/listarclientes.Ajax.php",
        type: "post",
        data: "",
        dataType: "json",
        success: (e) => {
            selectvntcli.append(`
               <option value="">Seleccione un cliente</option>
           `);
            for (let i = 0; i < e.length; i++) {
                selectvntcli.append(`
                   <option value="${e[i].NIT}">${e[i].NIT} - ${e[i].NombreCompleto} </option>
               `);
            }
        }
    });
}
function ListarClientesVentasEditar() {
    selectvntcliE = $('#id_clienteE');
    selectvntcliE.html("");
    $.ajax({
        url: "ajax/ListarTablasAjax/listarclientes.Ajax.php",
        type: "post",
        data: "",
        dataType: "json",
        success: (e) => {
            selectvntcliE.append(`
               <option value="">Seleccione un cliente</option>
           `);
            for (let i = 0; i < e.length; i++) {
                selectvntcliE.append(`
                   <option value="${e[i].NIT}">${e[i].NIT} - ${e[i].NombreCompleto} ${e[i].Apellido} </option>
               `);
            }
        }
    });
}

$('form#frmRegistroVentas').submit(function (e) {
    e.preventDefault();
    var $form = $(this);
    datos = $form.serialize();
    $.ajax({
        url: "ajax/SeccionVentas/registrarventa.php",
        type: "post",
        data: datos,
        dataType: 'json',
    }).done(function (respuesta) {
        $data = respuesta.response;
        if ($data == 'true') {
            Swal.fire(
                '¡Éxito!',
                'La venta fue registrada',
                'success'
            )
            tblVentas.ajax.reload();
            $('form#frmRegistroVentas')[0].reset();
            $("#mdlRegistrarVenta").modal("hide");
        } else if ($data == 'error') {
            Swal.fire(
                '¡Error!',
                'Nose pudo registrar la venta',
                'info'
            )

        }
    });
});

function btnMostrarVenta(id_venta) {
    $.ajax({
        url: "ajax/AjaxMostrar/mostrar_Ajax.php",
        type: "post",
        data: "id_venta=" + id_venta,
        dataType: 'json',
    }).done(function (respuesta) {
        $data = respuesta;
        $('#idventaEdit').val($data['id_venta']);
        $('#id_clienteE').val($data['id_cliente']);
        document.querySelector('#select2-id_clienteE-container').innerHTML = $data['cliente'];
        $('#idventadet').val($data['id_venta']);
        var $idcli = new String($data['id_cliente']).length;
        var selector = document.getElementById("tipocompro");
        var tipocomp = $data['tipo_compro'];
        if ($idcli == 8) {
            selector.remove(Option[0]);
            selector.remove(Option[1]);
            selector.remove(Option[2]);
            selector.options[0] = new Option('Boleta', 'Boleta');
        } else {
            if (tipocomp == "") {

                selector.remove(Option[0]);
                selector.remove(Option[1]);
                selector.remove(Option[2]);
                selector.options[0] = new Option('Seleccione', '');
                selector.options[1] = new Option('Boleta', 'Boleta');
                selector.options[2] = new Option('Factura', 'Factura');
            } else {
                $('#tipocompro').val($data['tipo_compro']);
                document.querySelector('#select2-tipocompro-container').innerHTML = $data['tipo_compro'];
            }
        }

    });
}

$('form#frmActualizarVentas').submit(function (e) {
    e.preventDefault();
    var $form = $(this);
    datos = $form.serialize();
    $.ajax({
        url: "ajax/SeccionVentas/actualizarventa.php",
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
            tblVentas.ajax.reload(null, false);
            $("#mdlActualizarVenta").modal("hide");
        } else if ($data == 'error') {
            Swal.fire(
                'Upps!',
                'Hubo un error al actualizar los datos.',
                'info'
            )
        }
    });
});


function btnEliminarVenta(id_venta) {
    Swal.fire({
        title: '¿Está seguro de cancelar la venta?',
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
                url: "ajax/SeccionVentas/eliminarventa.php",
                type: "post",
                data: "id_venta=" + id_venta,
                dataType: 'json',
            }).done(function (respuesta) {
                $data = respuesta;
                if ($data == 'ok') {
                    swal.fire('¡Éxito!', 'Se ha Eliminado la venta.', 'success');
                    tblVentas.ajax.reload();

                } else {
                    if ($data == 'error') {
                        swal.fire('¡Error!', 'La venta contiene detalles', 'error');

                    }
                }
            });
        } else {
            alertify.error('Canceló la operación');
        }
    })
}

function ListarCodigosProd() {
    selectprodcod = $('#codigprodvnt');
    selectprodcod.html("");
    $.ajax({
        url: "ajax/ListarTablasAjax/listarCodigoproducto.php",
        type: "post",
        data: "",
        dataType: "json",
        success: (e) => {
            selectprodcod.append(`
               <option value="">Seleccione un codigo</option>
           `);
            for (let i = 0; i < e.length; i++) {
                selectprodcod.append(`
                   <option value="${e[i].id_prod}">${e[i].CodigoProd}</option>
               `);
            }
        }
    });
}

$('#codigprodvnt').on('change', function () {
    let data = $('#codigprodvnt').val();
    let datasend = 'id_prod=' + data;
    var inputcant = document.getElementById('cantidadvent');
    $.ajax({
        type: 'POST',
        url: 'ajax/AjaxMostrar/mostrar_Ajax.php',
        data: datasend,
        datatype: 'json',
    }).done(function (res) {
        $data = JSON.parse(res);

        if ($data == 'error') {
            var inputprod = document.getElementById('descprovent');
            inputprod.value = "";
            inputcant.value = 0;
        } else {
            $('#descprovent').val($data['DescripcionProd']);
            $('#cantidadvent').attr("max", $data['Stock']);
            inputcant.value = 0;
        }
    });
});

/* detalle venta */

function btnverdetalleventa(id_venta) {
    $('#ListarDetalleventa').DataTable().clear();
    $('#ListarDetalleventa').DataTable().destroy();
    tbldetalleventa = $('#ListarDetalleventa').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json'
        },
        ajax: {
            url: "ajax/ListarTablasAjax/listarDetalleVenta.php",
            type: "POST",
            data: {
                id_venta: id_venta,
            },
            dataSrc: ''
        },
        responsive: true,
        columnDefs: [
            { responsivePriority: 1, targets: 0 },
            { responsivePriority: 2, targets: -1 },
        ],
        columns: [
            {
                "orderable": false,
                "data": null,
                "defaultContent": ''
            },
            { "data": 'DescripcionProd' },
            { "data": 'PrecioVenta', render: $.fn.dataTable.render.number(',', '.', 2, 'S/ ') },
            { "data": 'cantidad' },
            { "data": 'monto', render: $.fn.dataTable.render.number(',', '.', 2, 'S/ ') },
            { "data": 'acciones' }

        ],


    });
    tbldetalleventa.on('order.dt search.dt', function () {
        tbldetalleventa.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();
}

$('form#frmAddDetalleVenta').submit(function (e) {
    e.preventDefault();
    var $form = $(this);
    datos = $form.serialize();
    $idvnt = document.getElementById('idventadet').value;
    $.ajax({
        url: "ajax/SeccionVentas/registrardetalleventa.php",
        type: "post",
        data: datos,
        dataType: 'json',
    }).done(function (respuesta) {
        $data = respuesta.response;
        if ($data == 'true') {
            tbldetalleventa.ajax.reload();
            btnMostrarMonto($idvnt);
            $("#codigprodvnt").val(null).trigger('change');
            document.querySelector('#descprovent').value = '';
            document.querySelector('#cantidadvent').value = 0;
        } else if ($data == 'error') {
            Swal.fire(
                '¡Error!',
                'Nose pudo agregar el producto',
                'info'
            );

        } else if ($data == 'existen') {
            swal.fire('Aviso', 'El producto ya se encuentra en el carrito.', 'info');
        }
    });
});

function btnEliminarDetalleVenta(id_dventa) {
    $idvnt = document.getElementById('idventadet').value;
    $.ajax({
        url: "ajax/SeccionVentas/eliminardetalleventa.php",
        type: "post",
        data: "id_dventa=" + id_dventa,
        dataType: 'json',
    }).done(function (respuesta) {
        $data = respuesta;
        if ($data == 'ok') {
            tbldetalleventa.ajax.reload();
            btnMostrarMonto($idvnt)

        } else {
            if ($data == 'error') {
                swal.fire('¡Error!', 'No se puede quitar el producto', 'error');

            }
        }
    });
}

function btnMostrarMonto(id_venta) {
    $.ajax({
        url: "ajax/ListarTablasAjax/listarmontosdetalle.php",
        type: "post",
        data: "id_venta=" + id_venta,
        dataType: 'json',
    }).done(function (respuesta) {
        $data = respuesta;
        if ($data['subtotal'] != null && $data['igv'] != null && $data['total'] != null) {

            $('#subtotaldv').val($data['subtotal']);
            $('#igvdv').val($data['igv']);
            $('#totaldv').val($data['total']);
        } else {
            $('#subtotaldv').val('0.00');
            $('#igvdv').val('0.00');
            $('#totaldv').val('0.00');
        }
    });
}

function eliminartododetalleventa() {
    Swal.fire({
        title: '¿Está seguro de cancelar la orden?',
        text: "Se quitaran los productos de forma permanente!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar.',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            $idvnt = document.getElementById('idventadet').value;
            $.ajax({
                url: "ajax/SeccionVentas/eliminartododetallevnt.php",
                type: "post",
                data: "id_dventa=" + $idvnt,
                dataType: 'json',
            }).done(function (respuesta) {
                $data = respuesta.response;
                if ($data == 'true') {
                    swal.fire('éxito', 'Se quitaron los productos del carrito.', 'success');
                    tbldetalleventa.ajax.reload();
                    tblVentas.ajax.reload();
                } else if ($data == 'vacio') {
                    swal.fire('éxito', 'El carrito no contenia productos.', 'success');
                } else {
                    if ($data == 'error') {
                        swal.fire('¡Error!', 'No se puede quitar el producto', 'error');

                    }
                }
            });
        } else {
            alertify.error('Canceló la operación');
        }
    })
}



function actualizarestadoventaCD() {

    $idvnt = document.getElementById('idventadet').value;

    Swal.fire({
        title: '¿Está seguro de agregar el detalle?',
        text: "los datos seran almacenados!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, generar.',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            $idvnt = document.getElementById('idventadet').value;
            $.ajax({
                url: "ajax/SeccionVentas/actualizarestadocd.php",
                type: "post",
                data: "id_dventa=" + $idvnt,
                dataType: 'json',
            }).done(function (respuesta) {
                $data = respuesta.response;
                if ($data == 'true') {
                    $("#mdlAddDetalleVenta").modal("hide");
                    swal.fire('¡Éxito!', 'Se agregaron productos a la orden de venta', 'success');
                    tblVentas.ajax.reload();
                } else if ($data == 'vacio') {
                    swal.fire('¡Upss!', 'Debe agregar productos a la orden de venta', 'info');
                } else {
                    if ($data == 'error') {
                        swal.fire('¡Error!', 'No se puede generar la orden de venta', 'error');

                    }
                }
            });

        } else {
            alertify.error('Canceló la operación');
        }
    })

}


function actualizartipocomproentaCD() {
    $idvnt = document.getElementById('idventadet').value;
    $selectcompro = document.getElementById('tipocompro').value;
    $.ajax({
        url: "ajax/SeccionVentas/actualizartipocomp.php",
        type: "post",
        data: {
            tipocompro: $selectcompro,
            idventadet: $idvnt
        },
    })
}


function actualizarestadovendido(idventa) {
    $.ajax({
        type: "POST",
        url: "ajax/SeccionVentas/Nubefactfact.php",
        data: "idventanub=" + idventa,
        dataType: 'json',
        success: (e) => {
            if (e.errors) {
                Swal.fire("Ocurrió un error!", e.errors + "\n <br> Código: " + e.codigo, "error");
            } else if (e.info) {                
                actualizarestadovendidoFACT(idventa);
            } else {
                actualizarestadovendidoFACT(idventa);

            }
        },
    })

} 
function actualizarestadovendidoFACT(idventa) {
    $.ajax({
        url: "ajax/SeccionVentas/actualizarestadovendido.php",
        type: "post",
        data: "id_venta=" + idventa,
        dataType: 'json',
    }).done(function (respuesta) {
        $data = respuesta.response;
        if ($data == 'true') {
            swal.fire('¡Éxito!', 'Se generó de venta', 'success');
            tblVentas.ajax.reload();
        }else {
            if ($data == 'error') {
                swal.fire('¡Error!', 'No se puedo generar la venta', 'error');
            }
        }
    });

} 

/* listar detalle de venta efectuada */

function btnverdetalleventaEfectuada(id_venta) {
    $('#ListarDetalleventaEfectuada').DataTable().clear();
    $('#ListarDetalleventaEfectuada').DataTable().destroy();
    tbldetalleventaEfectuada = $('#ListarDetalleventaEfectuada').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json'
        },
        ajax: {
            url: "ajax/ListarTablasAjax/listarDetalleVenta.php",
            type: "POST",
            data: {
                id_venta: id_venta,
            },
            dataSrc: ''
        },
        responsive: true,
        columnDefs: [
            { responsivePriority: 1, targets: 0 },
            { responsivePriority: 2, targets: -1 },
        ],
        columns: [
            {
                "orderable": false,
                "data": null,
                "defaultContent": ''
            },
            { "data": 'DescripcionProd' },
            { "data": 'PrecioVenta', render: $.fn.dataTable.render.number(',', '.', 2, 'S/ ') },
            { "data": 'cantidad' },
            { "data": 'monto', render: $.fn.dataTable.render.number(',', '.', 2, 'S/ ') }

        ],


    });
    tbldetalleventaEfectuada.on('order.dt search.dt', function () {
        tbldetalleventaEfectuada.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();
}


function btnMostrarMontoVEfectuada(id_venta) {
    $.ajax({
        url: "ajax/ListarTablasAjax/listarmontosdetalle.php",
        type: "post",
        data: "id_venta=" + id_venta,
        dataType: 'json',
    }).done(function (respuesta) {
        $data = respuesta;
        if ($data['subtotal'] != null && $data['igv'] != null && $data['total'] != null) {

            $('#subtotaldvE').val($data['subtotal']);
            $('#igvdvE').val($data['igv']);
            $('#totaldvE').val($data['total']);
        } else {
            $('#subtotaldvE').val('0.00');
            $('#igvdvE').val('0.00');
            $('#totaldvE').val('0.00');
        }
    });
}
