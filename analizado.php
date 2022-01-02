<?php
include_once("bd/con_db.php");
session_start();
include_once("head.php");
?>
<head>
<script src="https://cdn.plot.ly/plotly-2.6.3.min.js"></script>
</head>
<?php
include_once("nbars.php");
?>
<section class="full-width pageContent">
    <section class="full-width" style="padding: 40px 0; width:90%!important;margin-left:5% !important">
        <h3 class="text-center tittles">RESULTADOS</h3>
        <p>Tabla de informacion completa de la universidad seleccionada</p>
        <table id="TablaAnalisis" style="width:100%">
            <thead>
                <tr>
                    <th>Nº</th>
                    <th>Universidad</th>
                    <th>Asignatura</th>
                    <th>Area</th>
                    <th>Pais</th>
                    <th>Creditos</th>
                    <th>Semstre</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $univ = mb_strtolower(trim($_POST['universidad']), 'UTF-8');
                $sql = "SELECT * from planestudio WHERE universidad='$univ'";
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
                            <td><?php if ($mostrar['semestre'] == 0) {
                                echo "NaN";
                            } else {
                                echo $mostrar['semestre'];
                            } ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </section>
    <section class="full-width" style="padding: 40px 0; width:90%!important;margin-left:5% !important">
        <h3 class="text-center tittles">AREAS</h3>
        <p>Tabla de porcentaje de cada area en la universidad seleccionada</p>
        <table id="TablaAreas" style="width:100%">
            <thead>
                <tr>
                    <th>Universidad</th>
                    <th>Ciencias basicas</th>
                    <th>Formacion complementaria</th>
                    <th>Basicas de ingenieria</th>
                    <th>Ingenieria Aplicada</th>
                    <th>Tolal</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $univ = mb_strtolower(trim($_POST['universidad']), 'UTF-8');
                $sql = "SELECT * from planestudio WHERE universidad='$univ'";
                $result = mysqli_query($conex, $sql);
                $cantidadtotal = mysqli_num_rows($result);

                $sql = "SELECT * from planestudio WHERE universidad='$univ' AND area='ciencias basicas'";
                $result = mysqli_query($conex, $sql);
                $cantidadCB = mysqli_num_rows($result);

                $sql = "SELECT * from planestudio WHERE universidad='$univ' AND area='formación complementaria'";
                $result = mysqli_query($conex, $sql);
                $cantidadFC = mysqli_num_rows($result);

                $sql = "SELECT * from planestudio WHERE universidad='$univ' AND area='basicas de ingenieria'";
                $result = mysqli_query($conex, $sql);
                $cantidadBI = mysqli_num_rows($result);

                $sql = "SELECT * from planestudio WHERE universidad='$univ' AND area='ingenieria aplicada'";
                $result = mysqli_query($conex, $sql);
                $cantidadIA = mysqli_num_rows($result);

                $valoresNum = array();
                $valoresLet = array();
                $valoresNum[] = $cantidadCB;
                $valoresNum[] = $cantidadFC;
                $valoresNum[] = $cantidadBI;
                $valoresNum[] = $cantidadIA;

                $valoresLet[] = $univ;
                $datosnum = json_encode($valoresNum);
                $datoslet = json_encode($valoresLet);
                ?>
                <tr>
                    <td><?php echo $univ ?></td>
                    <td><?php echo bcdiv((($cantidadCB * 100) / $cantidadtotal), '1', 2) . "%" ?></td>
                    <td><?php echo bcdiv((($cantidadFC * 100) / $cantidadtotal), '1', 2) . "%" ?></td>
                    <td><?php echo bcdiv((($cantidadBI * 100) / $cantidadtotal), '1', 2) . "%" ?></td>
                    <td><?php echo bcdiv((($cantidadIA * 100) / $cantidadtotal), '1', 2) . "%" ?></td>
                    <td><?php echo "100 %" ?></td>
                </tr>

                <?php

                ?>
            </tbody>
        </table>
    </section>
    <section class="full-width" style="padding: 40px 0; width:90%!important;margin-left:5% !important">
        <h3 class="text-center tittles">AREAS TOTALES</h3>
        <p>Tabla de porcentaje de cada area en todas las universidades almacenadas en el sistema</p>
        <table id="TablaAreasGenerales" style="width:100%">
            <thead>
                <tr>
                    <th>Universidad</th>
                    <th>Ciencias basicas</th>
                    <th>Formacion complementaria</th>
                    <th>Basicas de Ingenieria</th>
                    <th>Ingenieria Aplicada</th>
                    <th>Tolal</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $renq = "SELECT * from universidades";
                $analiz = mysqli_query($conex, $renq);
                $mejoru = array();
                $almacen = 10000;
                if (!(isset($_GET['univer']))) {
                    while ($mostrar = mysqli_fetch_array($analiz)) {
                        if ($mostrar['ranking'] < $almacen) {
                            $mejoru[0] = $mostrar['nombre'];
                            $almacen = $mostrar['ranking'];
                        }
                    }
                } else {
                    $mejoru[0] = $_GET['univer'];
                }

                $sqli = "SELECT DISTINCT universidad from planestudio";
                $resultados = mysqli_query($conex, $sqli);
                while ($mostrar = mysqli_fetch_array($resultados)) {
                    $univ = $mostrar['universidad'];
                    $sql1 = "SELECT * from planestudio WHERE universidad='$univ'";
                    $result1 = mysqli_query($conex, $sql1);
                    $cantidadtotal = mysqli_num_rows($result1);

                    $sql2 = "SELECT * from planestudio WHERE universidad='$univ' AND area='ciencias basicas'";
                    $result2 = mysqli_query($conex, $sql2);
                    $cantidadCB = mysqli_num_rows($result2);

                    $sql3 = "SELECT * from planestudio WHERE universidad='$univ' AND area='formación complementaria'";
                    $result3 = mysqli_query($conex, $sql3);
                    $cantidadFC = mysqli_num_rows($result3);

                    $sql4 = "SELECT * from planestudio WHERE universidad='$univ' AND area='basicas de ingenieria'";
                    $result4 = mysqli_query($conex, $sql4);
                    $cantidadBI = mysqli_num_rows($result4);

                    $sql5 = "SELECT * from planestudio WHERE universidad='$univ' AND area='ingenieria aplicada'";
                    $result5 = mysqli_query($conex, $sql5);
                    $cantidadIA = mysqli_num_rows($result5);
                    if ($univ == $mejoru[0]) {
                        $valoresNum2 = array();
                        $valoresLet2 = array();
                        $valoresNum2[] = $cantidadCB;
                        $valoresNum2[] = $cantidadFC;
                        $valoresNum2[] = $cantidadBI;
                        $valoresNum2[] = $cantidadIA;

                        $valoresLet2[] = $mejoru[0];
                        $datosnum2 = json_encode($valoresNum2);
                        $datoslet2 = json_encode($mejoru);
                    }


                ?>
                    <tr>
                        <td><?php echo $univ ?></td>
                        <td><?php echo bcdiv((($cantidadCB * 100) / $cantidadtotal), '1', 2) . "%" ?></td>
                        <td><?php echo bcdiv((($cantidadFC * 100) / $cantidadtotal), '1', 2) . "%" ?></td>
                        <td><?php echo bcdiv((($cantidadBI * 100) / $cantidadtotal), '1', 2) . "%" ?></td>
                        <td><?php echo bcdiv((($cantidadIA * 100) / $cantidadtotal), '1', 2) . "%" ?></td>
                        <td><?php echo "100 %" ?></td>
                    </tr>

                <?php
                }
                ?>
            </tbody>
        </table>
    </section>
    <section class="full-width" style="padding: 40px 0; width:90%!important;margin-left:5% !important">
        <h4 class="text-center tittles">COMPARACION</h4>
        <p>Comparacion de areas de la universidad seleccionada y la mejor universidad almacenada en el sistema</p>
        <div class="container">
            <div id="grafica-pastel-primero"></div>
            <div id="grafica-pastel-segundo"></div>
        </div>

    </section>
</section>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.11.3/b-2.1.0/b-html5-2.1.0/b-print-2.1.0/r-2.2.9/datatables.min.js"></script>
<script>

    function GraficoPrim(json) {
        var parsed = JSON.parse(json);
        var arr = [];
        for (var x in parsed) {
            arr.push(parsed[x]);
        }
        return arr;
    }
</script>
<script>
    function GraficoSeg(json) {
        var parsed = JSON.parse(json);
        var arr = [];
        for (var x in parsed) {
            arr.push(parsed[x]);
        }
        return arr;
    }
</script>
<script>
    datosnum = GraficoPrim('<?php echo $datosnum ?>');
    datoslet = GraficoPrim('<?php echo $datoslet ?>');
    datoslet2 = GraficoPrim('<?php echo $datoslet2 ?>');
    datosnum2 = GraficoPrim('<?php echo $datosnum2 ?>');
    var data = [{
        values: datosnum,
        labels: ['Ciencias Basicas', 'Formacion Complementaria', 'Basicas Ingenieria', "Ingenieria Aplicada"],
        type: 'pie'
    }];

    var layout = {
        height: 360,
        width: 450,
        title: datoslet[0]
    };

    Plotly.newPlot('grafica-pastel-primero', data, layout);

    var data2 = [{
        values: datosnum2,
        labels: ['Ciencias Basicas', 'Formacion Complementaria', 'Basicas Ingenieria', "Ingenieria Aplicada"],
        type: 'pie'
    }];

    var layout2 = {
        height: 360,
        width: 450,
        title: datoslet2[0]
    };

    Plotly.newPlot('grafica-pastel-segundo', data2, layout2);
</script>