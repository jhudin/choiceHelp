<?php
include_once("bd/con_db.php");
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
?>
<section class="full-width pageContent">
<header>
          <h3 style="text-align: center; padding:40px 0;">MATERIAS</h3>
     </header>  
    <div class="full-width divider-menu-h"></div>
    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
            <table id="myTables" style="width:100%">
                <thead>
                    <tr>
                        <th>Nº</th>
                        <th>Universidad</th>
                        <th>Asignatura</th>
                        <th>Area</th>
                        <th>Pais</th>
                        <th>Creditos</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * from planestudio";
                    $result = mysqli_query($conex, $sql);
                    $vare = 0;
                    while ($mostrar = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <td><?php echo $vare = $vare + 1; ?></td>
                            <td><?php echo $mostrar['universidad'] ?></td>
                            <td><?php echo $mostrar['asignatura'] ?></td>
                            <td><?php echo $mostrar['area'] ?></td>
                            <td><?php echo $mostrar['pais'] ?></td>
                            <td><?php if ($mostrar['creditos'] == 0) {
                                                                            echo "NaN";
                                                                        } else {
                                                                            echo $mostrar['creditos'];
                                                                        } ?></td>
                            <td>
                                <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect btn-abrir">
                                    <i class="zmdi zmdi-edit"></i>
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
</section>
<input id="uinicio" style="visible:hidden">
<input id="asiginicio" style="visible:hidden">
<div class="pop-up">
    <div class="pop-up-wrap">
        <div class="pop-up-title">
        </div>
        <div class="labels">
            <div class="line"></div>
            <i class="zmdi zmdi-close-circle" id="close"></i>
            <div class="sub-content">
                <form method="POST" onsubmit="return false">
                    <h5 class="text-condensedLight">INFORMACIÓN DE MATERIA</h5>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="text" id="Uni" name="uni" value="123" require>
                        <label class="mdl-textfield__label" for="Uni">Universidad</label>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="text" id="asig" name="asig" value="123" require>
                        <label class="mdl-textfield__label" for="asig">Asignatura</label>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="text" id="area" name="area" value="123" require>
                        <label class="mdl-textfield__label" for="area">Area</label>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="text" id="pais" name="pais" value="123" require>
                        <label class="mdl-textfield__label" for="pais">Pais</label>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="text" id="creditos" name="cred" value="123" require>
                        <label class="mdl-textfield__label" for="creditos">Creditos</label>
                    </div>
                    <span id="resultado"></span>
                    <div class="col-sm-12 col-xs-12">
                        <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-warning" type="submit" id="btn-edita" name="enviar" value="Enviar" onclick="EditarM($('#Uni').val(),$('#asig').val(),$('#area').val(),$('#pais').val(),$('#creditos').val(),$('#uinicio').val(),$('#asiginicio').val());">
                            <i class="zmdi zmdi-edit"></i>
                        </button>
                        <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-danger" type="submit" id="btn-elim" name="enviar" value="Enviar" onclick="EliminarM($('#Uni').val(),$('#asig').val());">
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
        var oTable = $('#myTables').DataTable();

        $('#myTables tbody').on('click', 'tr', function() {
            var pos = oTable.row(this).index();
            var row = oTable.row(pos).data();
            $('#uinicio').val(row[1]);
            $('#asiginicio').val(row[2]);

            $('#Uni').val(row[1]);
            $('#asig').val(row[2]);
            $('#area').val(row[3]);
            $('#pais').val(row[4]);
            $('#creditos').val(row[5]);
        });
    });
</script>

</html>