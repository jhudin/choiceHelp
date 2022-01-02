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
<section class="full-width pageContent">
    <section class="full-width text-center" style="padding: 20px 0;">
    <div class="full-width header-well panel-tittle  text-center tittles" style="color: #6E7076;">
        <h3>REGISTRO DE UNIVERSIDADES</h3>
    </div>
    </section>
    <div class="full-width divider-menu-h"></div>
    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col-desktop mdl-cell--2-offset-desktop">
            <div class="full-width panel mdl-shadow--2dp">
                <div class="full-width panel-tittle bg-primarys text-center tittles">
                    NUEVA UNIVERSIDAD
                </div>
                <div class="full-width panel-content">
                    <form method="POST">
                        <h5 class="text-condensedLight">INFORMACIÓN DE UNIVERSIDAD</h5>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="text" id="DNICompany" name="nom_u" require>
                            <label class="mdl-textfield__label" for="DNICompany">Nombre</label>
                        </div>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="text" id="DNICompany" name="pais" require>
                            <label class="mdl-textfield__label" for="DNICompany">Pais</label>
                        </div>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="text" id="DNICompany" name="nom_prog" require>
                            <label class="mdl-textfield__label" for="DNICompany">Nombre del Programa</label>
                        </div>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="number" id="DNICompany" name="rank">
                            <label class="mdl-textfield__label" for="DNICompany">Poscicion del ranking mundial</label>
                        </div>
                        <!--<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="url" id="DNICompany" name="link_logo">
                            <label class="mdl-textfield__label" for="DNICompany">Enlace de logo</label>
                        </div>-->
                        <?php
                        include("bd/registraru.php");
                        ?>
                        <p class="text-center">
                            <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primarys" id="btn-addCompany" type="submit" name="register" value="Registrar">
                                <i class="far fa-save"></i>
                                </button>
                        <div class="mdl-tooltip" for="btn-addCompany">Añadir Universidad</div>
                            </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
</body>

</html>