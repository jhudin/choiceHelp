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
?>
<!-- contenido -->
<section class="full-width pageContent" style="padding: 20px 0;">
    <h3 style="text-align: center; padding:40px 0;">MATERIAS</h3>
    <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
        <div class="mdl-tabs__panel is-active" id="tabNewClient">
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col-desktop mdl-cell--2-offset-desktop">
                    <div class="full-width panel mdl-shadow--2dp">
                        <div class="full-width panel-tittle bg-primarys text-center tittles">
                            Nueva Materia
                        </div>
                        <div class="full-width panel-content">
                            <form method="POST">
                                <h5 class="text-condensedLight">Información</h5>
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <select class="chosen-select" name="uni" id="uni" data-placeholder="Seleccione opcion...">

                                        <?php
                                        include_once("bd/con_db.php");
                                        $sql = "SELECT * from universidades";
                                        $result = mysqli_query($conex, $sql);
                                        while ($mostrar = mysqli_fetch_array($result)) {
                                        ?>
                                            <option value="<?php echo $mostrar['nombre']; ?>"  > <?php echo $mostrar['nombre']; ?></option>
                                        <?php
                                        }
                                        mysqli_close($conex);
                                         ?>
                                    </select>
                                    
                                </div>
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input class="mdl-textfield__input" type="text" id="asig" name="asig" require>
                                    <label class="mdl-textfield__label" for="asig">Asignatura</label>
                                </div>
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input class="mdl-textfield__input" type="text" id="are" name="area" require>
                                    <label class="mdl-textfield__label" for="are">Area</label>
                                </div>
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input class="mdl-textfield__input" type="num" id="pa" name="pais" require>
                                    <label class="mdl-textfield__label" for="pa">Pais</label>
                                </div>
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input class="mdl-textfield__input" type="num" id="cre" name="cred" require>
                                    <label class="mdl-textfield__label" for="cre">Creditos</label>
                                </div>
                           
                                <?php
                                include("bd/regrmaterias.php");
                                ?>
                                <p class="text-center">
                                    <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primarys" type="submit" name="register" value="Registrar" id="btn-addClient">
                                        <i class="far fa-save"></i>
                                    </button>
                                <div class="mdl-tooltip" for="btn-addClient">Añadir Materia</div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</section>
</body>
<script>
$('.chosen-select').chosen();
        $('.chosen-select-deselect').chosen({ allow_single_deselect: true });
</script>

</html>