function Editar(nombre, pais, nombre_prog, rank, logo,nombreinicial) {
    swal({
        title: '¿Quieres Modificar El Registro "'+nombre+'" ?',
        text: "Los Datos Del Registro se Cambiaran",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Si, Cambiar',
        closeOnConfirm: true
    },
        function (isConfirm) {
            if (isConfirm) {
                var parametros = { "nom_u": nombre, "pais": pais, "nom_prog": nombre_prog, "rank": rank, "link_logo": logo, "nombreanterior": nombreinicial };
                $.ajax({
                    data: parametros,
                    url: '../bd/editaru.php',
                    type: 'post',
                    success: function (response) {
                        $("#resultado").html(response);
                    }
                });
            }
        });

}

function Eliminar(nombre, pais, nombre_prog, rank, logo) {
    swal({
        title: '¿Quieres Elimiar El Registro "'+nombre+'" ?',
        text: "El Registro se eliminara para siempre",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Si, Eliminar',
        closeOnConfirm: true
    },
        function (isConfirm) {
            if (isConfirm) {
                var parametros = { "nom_u": nombre, "pais": pais, "nom_prog": nombre_prog, "rank": rank, "link_logo": nombre_prog };
                $.ajax({
                    data: parametros,
                    url: '../bd/eliminaru.php',
                    type: 'post',
                    success: function (response) {
                        $("#resultado").html(response);
                    }
                });
            }
        });

}

function EditarM(uni, asign, area, pais, creditos,uinicio,asiginicio) {
    swal({
        title: '¿Quieres Modificar El Registro "'+asign+'" ?',
        text: "Los Datos Del Registro se Cambiaran",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Si, Cambiar',
        closeOnConfirm: true
    },
        function (isConfirm) {
            if (isConfirm) {
                var parametros = { "uni": uni, "asign": asign, "area": area, "pais": pais, "creditos": creditos, "uinicio": uinicio, "asiginicio": asiginicio };
                $.ajax({
                    data: parametros,
                    url: '../bd/editarm.php',
                    type: 'post',
                    success: function (response) {
                        $("#resultado").html(response);
                    }
                });
            }
        });

}

function EliminarM(uni, asign) {
    swal({
        title: '¿Quieres Elimiar El Registro "'+asign+'" ?',
        text: "El Registro se eliminara para siempre",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Si, Eliminar',
        closeOnConfirm: true
    },
        function (isConfirm) {
            if (isConfirm) {
                var parametros = { "uni": uni, "asign": asign };
                $.ajax({
                    data: parametros,
                    url: '../bd/eliminarma.php',
                    type: 'post',
                    success: function (response) {
                        $("#resultado").html(response);
                    }
                });
            }
        });

}
