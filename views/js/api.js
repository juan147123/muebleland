$(document).ready(function () {
    const btnruc = document.getElementById("enviarruc");
    btnruc.addEventListener("click", function () {
        const valorruc = document.getElementById("NITProveedor");
        if (valorruc.value.length == 11) {
            $.ajax({
                type: "POST",
                url: "extensiones/extencion_api.php",
                data: "ruc=" + valorruc.value,
                dataType: 'json',
            }).done(function (respuesta) {
                if (respuesta.respuesta == "error") {
                    swal.fire('Upss!', 'Hubo un error al consultar el ruc', 'info');
                } else if (respuesta.success == true) {
                    $("#NombreProveedor").val(respuesta.nombre_o_razon_social)
                    $("#Direccion").val(respuesta.direccion_completa)
                    $("#Estado").val(respuesta.estado_del_contribuyente)


                } else {
                    swal.fire('Upss!', 'Hubo un error al garrafal el ruc', 'danger');
                }
            });
        } else if (valorruc.value.length != 11) {
            swal.fire('Upss!', 'La longitud debe ser 11', 'info');
        }
        else {
            valorruc.setAttribute("required", "Rellene este campo");
        }
    });
});