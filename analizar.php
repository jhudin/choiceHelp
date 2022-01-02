<?php
include_once("bd/con_db.php");
session_start();
include_once("head.php");
include_once("nbars.php");
?>
<div class="container">
    <section class="full-width pageContent">
        <header>
             <h3 style="text-align: center; padding:40px 0;">ANALIZAR</h3>
            <p>Busque la universidad que desea analizar y seleccione el botton al lado derecho del registro</p>
        </header>
        <div class="full-width divider-menu-h"></div>
        <div class="mdl-grid">
            <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
                <table id="myTab" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nº</th>
                            <th>Nombre</th>
                            <th>Pais</th>
                            <th>Nombre del programa</th>
                            <th>Ranking</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * from universidades";
                        $result = mysqli_query($conex, $sql);
                        $vare = 0;
                        while ($mostrar = mysqli_fetch_array($result)) {
                        ?>
                            <tr>
                                <td><?php echo $vare = $vare + 1; ?></td>
                                <td><?php echo $mostrar['nombre'] ?></td>
                                <td><?php echo $mostrar['pais'] ?></td>
                                <td><?php echo $mostrar['nom_programa'] ?></td>
                                <td style="text-align: center !important;"><?php echo $mostrar['ranking'] ?></td>
                                <td style="text-align: center !important;color:green !important;">
                                <form action="analizado.php" method="POST">
                                <input class="universidad" name="universidad" style="width:0px !important; visibility:hidden">
                                    <button class="btn" type="submit">
                                        Analizar
                                    </button>
                                    </form>
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
</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.11.3/b-2.1.0/b-html5-2.1.0/b-print-2.1.0/fh-3.2.0/kt-2.6.4/r-2.2.9/rg-1.1.4/sp-1.4.0/sl-1.3.3/datatables.min.js"></script>

<script>
    $(document).ready(function() {
        var oTable = $('#myTab').DataTable();
        var row;
        $('#myTab tbody').on('click', 'tr', function() {
            var pos = oTable.row(this).index();
            row = oTable.row(pos).data();
            $('.universidad').val(row[1]);
        });

    });
</script>

</html>