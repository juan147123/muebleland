$('form#frmregistroproductos').submit(function (e) {
    e.preventDefault();
    $('#PrecioVenta').prop('disabled',false);
    var formregiNE = document.getElementById('frmregistroproductos');
    var datos = new FormData(formregiNE);
    $.ajax({
        url: "ajax/SeccionProducto/registrarproducto.php",
        type: "post",
        data: datos,
        dataType: 'json',
        contentType: false,
        processData: false,
    }).done(function (respuesta) {
        $data = respuesta.response;
        if ($data == 'true') {
            Swal.fire(
                '¡Éxito!',
                'El Producto fue registrado.',
                'success'
            )
            deleteimgNE();
            $('#PrecioVenta').prop('disabled',true);
            tblProductos.ajax.reload(null, false);
            $('form#frmregistroproductos')[0].reset();
            $("#mdlregistroproductos").modal("hide");
        }else if($data =='repeat'){
            Swal.fire(
                '¡Error!',
                'El producto ya se encuentra registrado.',
                'info'
            )

        }

    });
});




function btnMostrarproducto(id_prod) {
    $.ajax({
        url: "ajax/AjaxMostrar/mostrar_Ajax.php",
        type: "post",
        data: "id_prod=" + id_prod,
        dataType: 'json',
    }).done(function (respuesta) {
        $data = respuesta;
        $('#DescripcionProdEditar').val($data['DescripcionProd']);
        $('#CodigoCatEditar').val($data['CodigoCat']);
        $('#PrecioCompraEditar').val($data['PrecioCompra']);
        $('#PorcentajeganEditar').val($data['porcentaje']);
        $('#PrecioVentaEditar').val($data['PrecioVenta']);
        $('#modeloprodEditar').val($data['Modelo']);
        $('#idMarcaEditar').val($data['idmarca']);
        $('#idColorEditar').val($data['idColor']);
        $('#stockprodEditar').val($data['Stock']);
        $('#imagenprodEditar').val($data['Imagen']);
        $('#idprodeditar').val($data['id_prod']);
        document.getElementById("img-previewPR").src = "views/productosimg/"+$data['Imagen'];
    });
}





function btnEliminarProducto(id_prod) {
    Swal.fire({
        title: '¿Estás seguro en eliminar?',
        text: "Se quitara de forma permanente al producto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar.',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "ajax/SeccionProducto/eliminarproducto.php",
                type: "post",
                data: "id_prod=" + id_prod,
                dataType: 'json',
            }).done(function (respuesta) {
                $data = respuesta;
                if ($data == 'ok') {
                    swal.fire('¡Éxito!', 'Se ha Eliminado el producto.', 'success');
                    tblProductos.ajax.reload();

                } else {
                    if ($data == 'existen') {
                        swal.fire('¡Error!', 'El producto se encuentra en uso por unbo o mas registros', 'error');

                    }
                }
            });
        } else {
            alertify.error('Canceló la operación');
        }
    })
}



$('form#frmactualizarproductos').submit(function (e) {
    e.preventDefault();
    $('#PrecioVentaEditar').prop('disabled',false);
    var formregiPR = document.getElementById('frmactualizarproductos');
    var datos = new FormData(formregiPR);
    $.ajax({
        url: "ajax/SeccionProducto/actualizarproducto.php",
        type: "post",
        data: datos,
        dataType: 'json',
        contentType: false,
        processData: false,
    }).done(function (respuesta) {
        $data = respuesta.response;
        if ($data == 'true') {
            Swal.fire(
                '¡Éxito!',
                'Datos actualizados.',
                'success'
            )
            $('#PrecioVentaEditar').prop('disabled',true);
            tblProductos.ajax.reload(null, false);
            $("#mdlactualizarproductos").modal("hide");
        } else if ($data == 'error') {
            Swal.fire(
                'Upps!',
                'Hubo un error al actualizar los datos.',
                'info'
            )
        }

    });
});


function ListarCateProdEditar() {
    selectdesE = $('#CodigoCatEditar');
    selectdesE.html("");
    $.ajax({
        url: "ajax/ListarTablasAjax/listarCategoriaProducto.php",
        type: "post",
        data: "",
        dataType: "json",
        success: (e) => {
            selectdesE.append(`
               <option value="">Seleccione una categoria</option>
           `);
            for (let i = 0; i < e.length; i++) {
                selectdesE.append(`
                   <option value="${e[i].CodigoCat}">${e[i].Descripcion}</option>
               `);
            }
        }
    });

    selectcolE = $('#idColorEditar');
    selectcolE.html("");
    $.ajax({
        url: "ajax/ListarTablasAjax/ListarColoresProducto.php",
        type: "post",
        data: "",
        dataType: "json",
        success: (e) => {
            selectcolE.append(`
               <option value="">Seleccione un color</option>
           `);
            for (let i = 0; i < e.length; i++) {
                selectcolE.append(`
                   <option value="${e[i].id_color}">${e[i].nombre_color}</option>
               `);
            }
        }
    });

    selectmarE = $('#idMarcaEditar');
    selectmarE.html("");
    $.ajax({
        url: "ajax/ListarTablasAjax/listarMarcasProductos.php",
        type: "post",
        data: "",
        dataType: "json",
        success: (e) => {
            selectmarE.append(`
               <option value="">Seleccione un color</option>
           `);
            for (let i = 0; i < e.length; i++) {
                selectmarE.append(`
                   <option value="${e[i].id_marca}">${e[i].descripcion}</option>
               `);
            }
        }
    });
}
function ListarCateprodProd() {
    selectdes = $('#CodigoCat');
    selectdes.html("");
    $.ajax({
        url: "ajax/ListarTablasAjax/listarCategoriaProducto.php",
        type: "post",
        data: "",
        dataType: "json",
        success: (e) => {
            selectdes.append(`
               <option value="">Seleccione una categoria</option>
           `);
            for (let i = 0; i < e.length; i++) {
                selectdes.append(`
                   <option value="${e[i].CodigoCat}">${e[i].Descripcion}</option>
               `);
            }
        }
    });
    selectcol = $('#idColor');
    selectcol.html("");
    $.ajax({
        url: "ajax/ListarTablasAjax/ListarColoresProducto.php",
        type: "post",
        data: "",
        dataType: "json",
        success: (e) => {
            selectcol.append(`
               <option value="">Seleccione un color</option>
           `);
            for (let i = 0; i < e.length; i++) {
                selectcol.append(`
                   <option value="${e[i].id_color}">${e[i].nombre_color}</option>
               `);
            }
        }
    });

    selectmar = $('#idMarca');
    selectmar.html("");
    $.ajax({
        url: "ajax/ListarTablasAjax/listarMarcasProductos.php",
        type: "post",
        data: "",
        dataType: "json",
        success: (e) => {
            selectmar.append(`
               <option value="">Seleccione un color</option>
           `);
            for (let i = 0; i < e.length; i++) {
                selectmar.append(`
                   <option value="${e[i].id_marca}">${e[i].descripcion}</option>
               `);
            }
        }
    });
}

/* imagen*/
function previewNE(e) {
    const url = e.target.files[0];
    const urlTmp = URL.createObjectURL(url);
    document.getElementById("img-previewNE").src = urlTmp;
    document.getElementById("icon-imageNE").classList.add("d-none");
    document.getElementById("icon-cerrarNE").innerHTML = `
    <button class="btn btn-danger"onclick="deleteimgNE(event)"><i class="fas fa-times"></i></button> ${url['name']}`;

}
function deleteimgNE() {
    document.getElementById("icon-cerrarNE").innerHTML = '';
    document.getElementById("icon-imageNE").classList.remove("d-none");
    document.getElementById("img-previewNE").src = '';
    document.getElementById("imagenNE").value = '';
}

/* editarimagen */

function previewPR(e) {
    const url = e.target.files[0];
    const urlTmp = URL.createObjectURL(url);
    document.getElementById("img-previewPR").src = urlTmp;
    document.getElementById("icon-imagePR").classList.add("d-none");
    document.getElementById("icon-cerrarPR").innerHTML = `
    <button class="btn btn-danger"onclick="deleteimgPR(event)"><i class="fas fa-times"></i></button> ${url['name']}`;

}
function deleteimgPR() {
    document.getElementById("icon-cerrarPR").innerHTML = '';
    document.getElementById("icon-imagePR").classList.remove("d-none");
    document.getElementById("img-previewPR").src = '';
    document.getElementById("imagenPR").value = '';
}

/* ---- */

function eliminarimagenPR(imagen) {
    $.ajax({
        url: "ajax/SeccionProducto/EliminarimagenPR.php",
        type: "post",
        data: "imagen=" + imagen,
    })
}


/* SCRIPT PARA PORCENTAJE */
function porcentajemult() {
    var pc = document.getElementById('PrecioCompra').value;
    var porcentaje = document.getElementById('Porcentajegan').value;
    var porcentaje2 = porcentaje / 100;
    var regEx = new RegExp('^[a-zA-Z]+$');

    if (pc == "" || regEx.test(pc)) {
        document.getElementById('PrecioVenta').value = "";
    } else {
        var mul = pc * porcentaje2;
        var sum = parseFloat(mul) + parseFloat(pc);
        document.getElementById('PrecioVenta').value = sum.toFixed(2);
    }
}
/* SCRIPT PARA PORCENTAJE EN EDITAR */
function porcentajemultEditar() {
    var pc = document.getElementById('PrecioCompraEditar').value;
    var porcentaje = document.getElementById('PorcentajeganEditar').value;
    var porcentaje2 = porcentaje / 100;
    var regEx = new RegExp('^[a-zA-Z]+$');

    if (pc == "" || regEx.test(pc)) {
        document.getElementById('PrecioCompraEditar').value = "";
    } else {
        var mul = pc * porcentaje2;
        var sum = parseFloat(mul) + parseFloat(pc);
        document.getElementById('PrecioVentaEditar').value = sum.toFixed(2);
    }
}
