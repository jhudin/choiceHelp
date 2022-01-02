<?php
session_start();
if (!($_SESSION['usuario'] == "administrador")) {
    echo '<script>
alert("Permisos requeridos");
window.location="index.php";
</script>';
    die();
}
include_once("head.php");
include_once("nbars.php");
include("bd/con_db.php");
?>
<!-- contenido -->
<section class="full-width pageContent" style="padding: 20px 0;">
    <h3 style="text-align: center; padding:40px 0;">USUARIOS</h3>
    <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
        <div class="mdl-tabs__tab-bar">
            <a href="#Tabnuevousuario" class="mdl-tabs__tab is-active">Nuevo</a>
            <a href="#tabListClient" class="mdl-tabs__tab">Lista</a>
        </div>
        <div class="mdl-tabs__panel is-active" id="Tabnuevousuario">
            <section>
                <div class="mdl-grid">
                    <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col-desktop mdl-cell--2-offset-desktop">
                        <div class="full-width panel mdl-shadow--2dp">
                            <div class="full-width panel-tittle bg-primarys text-center tittles">
                                Nuevo Usuario
                            </div>
                            <div class="full-width panel-content">
                                <form method="POST" id="formularioregistro">
                                    <h5 class="text-condensedLight">Información</h5>
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" id="grupo_usuario1">
                                        <input class="mdl-textfield__input" type="text" id="usuario1" name="usuario">
                                        <label class="mdl-textfield__label" for="usuario1">Usuario</label>
                                    </div>
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" id="grupo_correo1">
                                        <input class="mdl-textfield__input" id="correo1" type="email" name="correo">
                                        <label class="mdl-textfield__label" for="correo1">Email</label>
                                    </div>
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" id="grupo_passw2">
                                        <input class="mdl-textfield__input" type="password" id="passw2" name="password">
                                        <label class="mdl-textfield__label" for="passw2">Contraseña</label>
                                    </div>
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" id="grupo_passw22">
                                        <input class="mdl-textfield__input" type="password" id="passw22" name="password2">
                                        <label class="mdl-textfield__label" for="passw22">Confirmar Contraseña</label>
                                    </div>
                                    <p class="text-center">
                                        <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primarys" type="submit" id="register" value="Registrar" onclick="Registrar($('#usuario1').val(),$('#correo1').val(),$('#passw2').val(),$('#passw22').val(),$('#register').val());">
                                            <i class="far fa-save"></i>
                                        </button>
                                    <div class="mdl-tooltip" for="btn-addClient">Añadir Usuario</div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="mdl-tabs__panel" id="tabListClient">
            <section>
                <div class="mdl-grid">
                    <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col-desktop mdl-cell--2-offset-desktop">
                        <div class="full-width panel mdl-shadow--2dp">
                            <div class="full-width panel-tittle bg-success text-center tittles">
                                Lista Administradores
                            </div>
                            <div class="full-width panel-content">
                                <header>
                                    <h4 class="text-center text-light">UNIVERSIDADES</h4>
                                </header>
                                <div class="full-width divider-menu-h"></div>
                                <div class="mdl-grid">
                                    <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
                                        <table id="myTable" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Nº</th>
                                                    <th>Usuario</th>
                                                    <th>Correo</th>
                                                    <th>Opciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sql = "SELECT * from usuarios";
                                                $result = mysqli_query($conex, $sql);
                                                $vare = 0;
                                                while ($mostrar = mysqli_fetch_array($result)) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $vare = $vare + 1; ?></td>
                                                        <td><?php echo $mostrar['usuario'] ?></td>
                                                        <td><?php echo $mostrar['correo'] ?></td>
                                                        <td style="text-align: center !important;">
                                                            <button class="btn btn-abrir">
                                                                Opciones
                                                            </button>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                                mysqli_close($conex);
                                                ?>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </div>
        <input id="nombreinicio" style="visibility: hidden;">
        <div class="pop-up">
            <div class="pop-up-wrap">
                <div class="pop-up-title">
                </div>
                <div class="labels">
                    <div class="line"></div>
                    <i class="zmdi zmdi-close-circle" id="close"></i>
                    <div class="sub-content">
                        <form method="POST">
                            <h5 class="text-condensedLight">INFORMACIÓN DE UNIVERSIDAD</h5>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" type="text" id="usuario" name="nom_u" value="123" require>
                                <label class="mdl-textfield__label" for="usuario">Usuario</label>
                            </div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" type="text" id="correo" name="pais" value="123" require>
                                <label class="mdl-textfield__label" for="correo">Correo</label>
                            </div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" type="password" id="cl1" name="nom_prog" require>
                                <label class="mdl-textfield__label" for="cl1">Modificar contraseña</label>
                            </div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" type="password" id="cl2" name="rank" require>
                                <label class="mdl-textfield__label" for="cl2">Repetir contraseña</label>
                            </div>
                            <span id="resultado"></span>
                            <div class="col-sm-12 col-xs-12">
                                <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-warning" type="submit" id="btn-edita" name="enviar" value="Enviar" onclick="EditarU($('#usuario').val(),$('#correo').val(),$('#cl1').val(),$('#cl2').val(),$('#nombreinicio').val());">
                                    <i class="zmdi zmdi-edit"></i>
                                </button>
                                <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-danger" type="submit" id="btn-elim" name="enviar" value="Enviar" onclick="EliminarU($('#usuario').val());">
                                    <i class="zmdi zmdi-delete"></i>
                                </button>

                            </div>
                        </form>
                    </div>

                    <div class="line"></div>
                </div>
            </div>
        </div>


        </body>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.11.3/b-2.1.0/b-html5-2.1.0/b-print-2.1.0/fh-3.2.0/kt-2.6.4/r-2.2.9/rg-1.1.4/sp-1.4.0/sl-1.3.3/datatables.min.js"></script>

        <script>
            $(document).ready(function() {
                var oTable = $('#myTable').DataTable();

                $('#myTable tbody').on('click', 'tr', function() {
                    var pos = oTable.row(this).index();
                    var row = oTable.row(pos).data();
                    $('#nombreinicio').val(row[1]);
                    $('#usuario').val(row[1]);
                    $('#correo').val(row[2]);
                });
            });
        </script>
        <script>
            function EliminarU(nombre) {
                event.preventDefault();
                swal({
                        title: '¿Quieres Elimiar El Usuario "' + nombre + '" ?',
                        text: "El Usuario se eliminara",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Si, Eliminar',
                        closeOnConfirm: true
                    },
                    function(isConfirm) {
                        if (isConfirm) {
                            var parametros = {
                                "usu": nombre
                            };
                            $.ajax({
                                data: parametros,
                                url: '../bd/eliminarUsu.php',
                                type: 'post',
                                success: function(response) {
                                    $("#resultado").html(response);
                                }
                            });
                        }
                    });

            }
        </script>
        <script>
            function EditarU(usuario, correo, clave1, clave2, usuarioinicial) {
                event.preventDefault();
                if (clave1 == clave2) {
                    swal({
                            title: '¿Quieres Editar El Usuario "' + usuario + '" ?',
                            text: "El Usuario se editara",
                            type: 'warning',
                            showCancelButton: true,
                            confirmButtonText: 'Si, Editar',
                            closeOnConfirm: true
                        },
                        function(isConfirm) {
                            if (isConfirm) {
                                var parametros = {
                                    "usuario": usuario,
                                    "correo": correo,
                                    "clave1": clave1,
                                    "usuarioinicial": usuarioinicial
                                };
                                $.ajax({
                                    data: parametros,
                                    url: '../bd/editarUsu.php',
                                    type: 'post',
                                    success: function(response) {
                                        $("#resultado").html(response);
                                    }
                                });
                            }
                        });
                } else {
                    swal("Error...", "las contraseñas no coinciden", "error");
                }

            }
        </script>
        <script>
            function Registrar(usuario, correo, clave1, clave2, register) {
                event.preventDefault();
                const formulario = document.getElementById('formularioregistro');
                const inputs = document.querySelectorAll('#formularioregistro input');
                const expresiones = {
                    usuarioexp: /^[a-zA-Z0-9\_\-]{6,2000}$/, // Letras, numeros, guion y guion_bajo
                    passwordexp: /^.{6,2000}$/, // 6 a 12 digitos.
                    correoexp: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
                }

                if (expresiones.usuarioexp.test(usuario)) {
                    if (expresiones.correoexp.test(correo)){
                    if (expresiones.passwordexp.test(clave1)) {
                    if (clave1 == clave2) {
                        var parametros = {
                            "usuario": usuario,
                            "correo": correo,
                            "passw": clave1,
                            "register": register
                        };
                        $.ajax({
                            data: parametros,
                            url: 'bd/registrar.php',
                            type: 'post',
                            success: function(response) {
                                $("#resultado").html(response);
                            }
                        });
                    } else {
                        swal("Error...", "las contraseñas no coinciden", "error");
                    }
                }else{
                    swal("Error formato de contraseña", "la contraseña debe tener un minimo de 6 letras", "error");
                }
            }else {
                    swal("Error formato de correo", "example@example.com", "error");
                }
                } else {
                    swal("Error formato de usuario", "El usuario debe tener mas de 6 digitos", "error");
                }
            }
        </script>

        </html>