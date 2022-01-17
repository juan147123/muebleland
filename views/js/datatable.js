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
            { 'data': 'Apellido' },
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
            { 'data': 'responsable' },
            { 'data': 'responsable' },
            { 'data': 'acciones' }
        ],
        "order": [[1, 'asc']]
    });
    tblVentas.on('order.dt search.dt', function () {
        tblVentas.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();


});