<?php
session_start();
include_once("bd/con_db.php");
$sql = "SELECT nombre from universidades";
$result = mysqli_query($conex, $sql);
$filas = mysqli_num_rows($result);

$sql = "SELECT universidad from planestudio";
$result = mysqli_query($conex, $sql);
$Asig = mysqli_num_rows($result);

$sql = "SELECT DISTINCT pais from universidades";
$result = mysqli_query($conex, $sql);
$pais = mysqli_num_rows($result);
mysqli_close($conex);
include_once("head.php");
include_once("nbars.php");
?>
<!-- CONNTENIDO -->
<section class="full-width pageContent">
    <section class="full-width text-center" style="padding: 20px 0;">
    <div class="full-width header-well panel-tittle  text-center tittles" style="color: #6E7076;">
        <img src="logo/logo.png" style="width:150px;padding: -20px 0;">
    </div>
        <!-- Tiles -->
        <article class="full-width tile">
            <div class="tile-text">
                <span class="text-condensedLight">
                    <?php echo $filas; ?><br>
                    <small>UNIVERSIDADES</small>
                </span>

            </div>
        </article>
        <article class="full-width tile">
            <div class="tile-text">
                <span class="text-condensedLight">
                             <?php echo $Asig; ?>   <br>
                    <small>ASIGNATURAS</small>
                </span>

            </div>
        </article>
        <article class="full-width tile">
            <div class="tile-text">
                <span class="text-condensedLight">
                             <?php echo $pais; ?>   <br>
                    <small>PAISES</small>
                </span>

            </div>
        </article>
        <article class="full-width tile">
            <div class="tile-text">
                <span class="text-condensedLight">
                <br>
                    <a href="analizar.php" style="font-size:25px;text-decoration:none;">ANALIZAR</a>
                </span>
            </div>
            <i class="fas fa-chart-pie tile-icon"></i>
        </article>
    </section>
    <section class="full-width" style="margin: 30px 0;">
    </section>
</section>
</body>

</html>