let rendersoles = $.fn.dataTable.render.number(',', '.', 2, 'S/ ');

$(document).ready(function () {
    tblEmpleado = $('#Listarempleados').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json'
        },
        ajax: {
            url: "ajax/ListarTablasAjax/listarempleadosAjax.php",
            dataSrc: ''
        },
        responsive: true,
        columnDefs: [
            { responsivePriority: 1, targets: 0 },
            { responsivePriority: 2, targets: -1 }
        ],
        columns: [
            {
                "orderable": false,
                "data": null,
                "defaultContent": ''
            },
            { 'data': 'cod_trab' },
            { 'data': 'nombres_trab' },
            { 'data': 'direccion_trab' },
            { 'data': 'correo_trab' },
            { 'data': 'telefono_trab' },
            { 'data': 'tipo_documento' },
            { 'data': 'numero_documento' },
            { 'data': 'fecha_registro' },
            { 'data': 'inicio_lab' },
            { 'data': 'tipo_contrato' },
            { 'data': 'estado' },
            { 'data': 'acciones' }
        ],
        "order": [[1, 'asc']]
    });
    tblEmpleado.on('order.dt search.dt', function () {
        tblEmpleado.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();


    tblProveedor = $('#Listarproveedores').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json'
        },
        ajax: {
            url: "ajax/ListarTablasAjax/listarproveedores.Ajax.php",
            dataSrc: ''
        },
        responsive: true,
        columnDefs: [
            { responsivePriority: 1, targets: -2 },
            { responsivePriority: 2, targets: -1 }
        ],
        columns: [
            {
                "orderable": false,
                "data": null,
                "defaultContent": ''
            },
            { 'data': 'NITProveedor' },
            { 'data': 'NombreProveedor' },
            { 'data': 'Direccion' },
            { 'data': 'Telefono' },
            { 'data': 'PaginaWeb' },
            { 'data': 'Estado' },
            { 'data': 'acciones' }
        ],
        "order": [[1, 'asc']]
    });
    tblProveedor.on('order.dt search.dt', function () {
        tblProveedor.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();



    tblCliente = $('#Listarclientes').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json'
        },
        ajax: {
            url: "ajax/ListarTablasAjax/listarclientes.Ajax.php",
            dataSrc: ''
        },
        responsive: true,
        columnDefs: [
            { responsivePriority: 1, targets: 0 },
            { responsivePriority: 2, targets: -1 }
        ],
        columns: [
            {
                "orderable": false,
                "data": null,
                "defaultContent": ''
            },
            { 'data': 'NIT' },
            { 'data': 'NombreCompleto' },
            { 'data': 'Direccion' },
            { 'data': 'Telefono' },
            { 'data': 'Email' },
            { 'data': 'acciones' }
        ],
        "order": [[1, 'asc']]
    });
    tblCliente.on('order.dt search.dt', function () {
        tblCliente.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();



    tblProductos = $('#Listarproductos').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json'
        },
        ajax: {
            url: "ajax/ListarTablasAjax/listarproductos.php",
            dataSrc: ''
        },
        responsive: true,
        columnDefs: [
            { responsivePriority: 1, targets: -3 },
            { responsivePriority: 2, targets: -2 },
            { responsivePriority: 3, targets: -1 }
        ],
        columns: [
            {
                "orderable": false,
                "data": null,
                "defaultContent": ''
            },
            { 'data': 'CodigoProd' },
            { 'data': 'DescripcionProd' },
            { 'data': 'desmar' },
            { 'data': 'Modelo' },
            { 'data': 'descat' },
            { 'data': 'nombre_color' },
            { 'data': 'PrecioCompra' , render: rendersoles },
            { 'data': 'PrecioVenta' , render: rendersoles },
            { 'data': 'porcentaje' },
            { 'data': 'Stock' },
            {
                'data': "Imagen",
                "render": function (data) {
                    return '<img src="views/productosimg/' + data + ' "  width="90" height="90" />';
                }
            },
            { 'data': 'Estado' },
            { 'data': 'acciones' }
        ],
        "order": [[1, 'asc']]
    });
    tblProductos.on('order.dt search.dt', function () {
        tblProductos.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();

    tblColores = $('#ListarColor').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json'
        },
        ajax: {
            url: "ajax/ListarTablasAjax/listarcolores.Ajax.php",
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
            { 'data': 'nombre_color' },
            { 'data': 'acciones' }
        ],
        "order": [[1, 'asc']]
    });
    tblColores.on('order.dt search.dt', function () {
        tblColores.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();

    tblMarcas = $('#ListarMarca').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json'
        },
        ajax: {
            url: "ajax/ListarTablasAjax/listarmarcas.Ajax.php",
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
            { 'data': 'descripcion' },
            { 'data': 'acciones' }
        ],
        "order": [[1, 'asc']]
    });
    tblMarcas.on('order.dt search.dt', function () {
        tblMarcas.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();

    tblCategorias = $('#ListarCategoria').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json'
        },
        ajax: {
            url: "ajax/ListarTablasAjax/listarcategorias.Ajax.php",
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
            { 'data': 'Descripcion' },
            { 'data': 'acciones' }
        ],
        "order": [[1, 'asc']]
    });
    tblCategorias.on('order.dt search.dt', function () {
        tblCategorias.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();


    tblVentas = $('#Listarventas').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json'
        },
        ajax: {
            url: "ajax/ListarTablasAjax/listarVenta_Ajax.php",
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
            { 'data': 'codigo' },
            { 'data': 'cliente' },
            { 'data': 'responsable' },
            { 'data': 'estado' },
            { 'data': 'detalle' },
            { 'data': 'acciones' }
        ],
        "order": [[1, 'asc']]
    });
    tblVentas.on('order.dt search.dt', function () {
        tblVentas.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();


    tblVentasEfectuadas = $('#ListarventasEfectuadas').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json'
        },
        ajax: {
            url: "ajax/ListarTablasAjax/listarventasefectuadas.php",
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
            { 'data': 'codigo' },
            { 'data': 'cliente' },
            { 'data': 'responsable' },
            { 'data': 'fecha_registro' },
            { 'data': 'tipo_compro' },
            { 'data': 'ver' },
            { 'data': 'imprimir' }
        ],
        "order": [[1, 'asc']]
    });
    tblVentasEfectuadas.on('order.dt search.dt', function () {
        tblVentasEfectuadas.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();
    tblFacturaCompra = $('#ListarFacturaCompra').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json'
        },
        ajax: {
            url: "ajax/ListarTablasAjax/listar_facturacompra.Ajax.php",
            dataSrc: ''
        },
        responsive: true,
        columnDefs: [
            { responsivePriority: 1, targets: 0 },
            { responsivePriority: 2, targets: -1 }
        ],
        columns: [
            {
                "orderable": false,
                "data": null,
                "defaultContent": ''
            },
            { 'data': 'NombreProveedor' },
            { 'data': 'tipo_comp' },
            { 'data': 'codigofac' },
            { 'data': 'fechaemision' },
            { 'data': 'fechavencimiento' },
            { 'data': 'cod_orcompra' },
            { 'data': 'condicion_pago' },
            { 'data': 'imagen' },
            { 'data': 'estado_fac' },
            { 'data': 'detalle_fac' },
            { 'data': 'acciones' }
        ],
        "order": false
    });
    tblFacturaCompra.on('order.dt search.dt', function () {
        tblFacturaCompra.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();

    tblUsuarios = $('#Listarusuarios').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json'
        },
        ajax: {
            url: "ajax/ListarTablasAjax/listarusuarios.Ajax.php",
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
            { 'data': 'nombres_trab' },
            { 'data': 'descripcion' },
            { 'data': 'correo_usuario' },
            { 'data': 'fecha_registro' },
            { 'data': 'acciones' }
        ],
        "order": [[1, 'asc']]
    });
    tblUsuarios.on('order.dt search.dt', function () {
        tblUsuarios.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();

});
function btnverdetallefacturaCompra(id) {
    btnMostraridfacturaalmacenado(id)
    $('#tbldetallefacturadoCompraadd').DataTable().clear();
    $('#tbldetallefacturadoCompraadd').DataTable().destroy();
    tblDetalleFacturadoCompra = $('#tbldetallefacturadoCompraadd').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json'
        },
        ajax: {
            url: "ajax/ListarTablasAjax/listar_detalle_factura_compra.php",
            type: "post",
            data: {
                id: id,
            },
            dataSrc: '',
            dataType: 'json',
        },
        responsive: true,
        columnDefs: [
            { responsivePriority: 1, targets: 0 },
            { responsivePriority: 2, targets: -1 }
        ],
        columns: [
            {
                "orderable": false,
                "data": null,
                "defaultContent": ''
            },
            { 'data': 'DescripcionProd' },
            { 'data': 'nombre_color' },
            { 'data': 'descripcion' },
            { 'data': 'precio_uni' },
            { 'data': 'cantidad' },
            { 'data': 'total', render: rendersoles },
            { 'data': 'acciones' }

        ],
        "order": [[1, 'asc']]
    });
    tblDetalleFacturadoCompra.on('order.dt search.dt', function () {
        tblDetalleFacturadoCompra.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();

}

function btnverdetallefacturaCompra2(id) {
    btnMostraridfacturaalmacenado(id)
    $('#tbldetallefacturadoCompra').DataTable().clear();
    $('#tbldetallefacturadoCompra').DataTable().destroy();
    tblDetalleFacturadoCompra2 = $('#tbldetallefacturadoCompra').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json'
        },
        ajax: {
            url: "ajax/ListarTablasAjax/listar_detalle_factura_compra.php",
            type: "post",
            data: {
                id: id,
            },
            dataSrc: '',
            dataType: 'json',
        },
        responsive: true,
        columnDefs: [
            { responsivePriority: 1, targets: 0 },
            { responsivePriority: 2, targets: -1 }
        ],
        columns: [
            {
                "orderable": false,
                "data": null,
                "defaultContent": ''
            },
            { 'data': 'DescripcionProd' },
            { 'data': 'nombre_color' },
            { 'data': 'descripcion' },
            { 'data': 'precio_uni' },
            { 'data': 'cantidad' },
            { 'data': 'total', render: rendersoles },
            { 'data': 'estado' },
            { 'data': 'acciones2' }

        ],
        "order": [[1, 'asc']]
    });
    tblDetalleFacturadoCompra2.on('order.dt search.dt', function () {
        tblDetalleFacturadoCompra2.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();

    

}