
<body>
    <!-- navBar -->
    <div class="full-width navBar">
        <div class="full-width navBar-options">
            <i class="zmdi zmdi-more-vert btn-menu" id="btn-menu"></i>
            <div class="mdl-tooltip" for="btn-menu">Menu</div>
        </div>
    </div>
    <!-- navLateral -->
    <section class="full-width navLateral">
        <div class="full-width navLateral-bg btn-menu"></div>
        <div class="full-width navLateral-body">
            <div class="full-width navLateral-body-logo text-center tittles">
                <i class="zmdi zmdi-close btn-menu"></i> Menu
            </div>
            <?php
            if (isset($_SESSION['usuario'])) {
            ?>
                <figure class="full-width" style="height: 77px;">
                    <div class="navLateral-body-cl">
                        <img src="assets/img/avatar-male2.png" alt="Avatar" class="img-responsive">
                    </div>
                    <figcaption class="navLateral-body-cr hide-on-tablet">

                        <span>
                            <?php echo $_SESSION['nomusuario']; ?><br>
                            <small><?php echo $_SESSION['correo']; ?></small>
                        </span>
                    <?php
                }
                    ?>
                    </figcaption>
                </figure>
                <div class="full-width tittles navLateral-body-tittle-menu">
                    <i class="zmdi zmdi-desktop-mac" style="font-size:20px !important;"></i><span class="hide-on-tablet">&nbsp; TABLERO</span>
                </div>
                <nav class="full-width">
                    <ul class="full-width list-unstyle menu-principal">
                        <li class="full-width">
                            <a href="index.php" class="full-width">
                                <div class="navLateral-body-cl">
                                    <i class="zmdi zmdi-view-dashboard"></i>
                                </div>
                                <div class="navLateral-body-cr hide-on-tablet">
                                    INICIO
                                </div>
                            </a>
                        </li>
                        <li class="full-width divider-menu-h"></li>
                        <li class="full-width">
                            <a href="#!" class="full-width btn-subMenu">
                                <div class="navLateral-body-cl">
                                    <i class="zmdi zmdi-book"></i>
                                </div>
                                <div class="navLateral-body-cr hide-on-tablet">
                                    UNIVERSIDADES
                                </div>
                                <span class="zmdi zmdi-chevron-left"></span>
                            </a>
                            <ul class="full-width menu-principal sub-menu-options">
                                <?php
                                if ($_SESSION['usuario'] == "administrador") {
                                ?>
                                    <li class="full-width">
                                        <a href="runiversidades.php" class="full-width">
                                            <div class="navLateral-body-cl">
                                                <i class="zmdi zmdi-file"></i>
                                            </div>
                                            <div class="navLateral-body-cr hide-on-tablet">
                                                REGISTRAR
                                            </div>
                                        </a>
                                    </li>
                                <?php
                                }
                                ?>
                                <li class="full-width">
                                    <a href="analizar.php" class="full-width">
                                        <div class="navLateral-body-cl">
                                            <i class="zmdi zmdi-check-square"></i>
                                        </div>
                                        <div class="navLateral-body-cr hide-on-tablet">
                                            ANALIZAR
                                        </div>
                                    </a>
                                </li>
                                <?php
                                if ($_SESSION['usuario'] == "administrador") {
                                ?>
                                    <li class="full-width">
                                        <a href="editaru.php" class="full-width">
                                            <div class="navLateral-body-cl">
                                                <i class="zmdi zmdi-edit"></i>
                                            </div>
                                            <div class="navLateral-body-cr hide-on-tablet">
                                                GESTIONAR
                                            </div>
                                        </a>
                                    </li>
                                <?php
                                }
                                ?>
                            </ul>
                        </li>
                        <?php
                        if ($_SESSION['usuario'] == "administrador") {
                        ?>
                        <li class="full-width divider-menu-h"></li>
                            <li class="full-width">
                                <a href="#!" class="full-width btn-subMenu">
                                    <div class="navLateral-body-cl">
                                        <i class="zmdi zmdi-bookmark"></i>
                                    </div>
                                    <div class="navLateral-body-cr hide-on-tablet">
                                        MATERIAS
                                    </div>
                                    <span class="zmdi zmdi-chevron-left"></span>
                                </a>
                                <ul class="full-width menu-principal sub-menu-options">
                                    <li class="full-width">
                                        <a href="rmaterias.php" class="full-width">
                                            <div class="navLateral-body-cl">
                                                <i class="zmdi zmdi-file"></i>
                                            </div>
                                            <div class="navLateral-body-cr hide-on-tablet">
                                                REGISTRAR
                                            </div>
                                        </a>
                                    </li>
                                    <li class="full-width">
                                        <a href="editarm.php" class="full-width">
                                            <div class="navLateral-body-cl">
                                                <i class="zmdi zmdi-edit"></i>
                                            </div>
                                            <div class="navLateral-body-cr hide-on-tablet">
                                                GESTIONAR
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="full-width divider-menu-h"></li>
                            <li class="full-width">
                                <a href="#!" class="full-width btn-subMenu">
                                    <div class="navLateral-body-cl">
                                        <i class="zmdi zmdi-account-circle"></i>
                                    </div>
                                    <div class="navLateral-body-cr hide-on-tablet">
                                        USUARIOS
                                    </div>
                                    <span class="zmdi zmdi-chevron-left"></span>
                                </a>
                                <ul class="full-width menu-principal sub-menu-options">
                                    <li class="full-width">
                                        <a href="usuario.php" class="full-width">
                                            <div class="navLateral-body-cl">
                                                <i class="zmdi zmdi-accounts"></i>
                                            </div>
                                            <div class="navLateral-body-cr hide-on-tablet">
                                                CUENTAS
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        <?php
                        }
                        ?>
                        <li class="full-width divider-menu-h"></li>
                        <li class="full-width">
                            <a href="#!" class="full-width btn-subMenu">
                                <div class="navLateral-body-cl">
                                    <i class="zmdi zmdi-account"></i>
                                </div>
                                <div class="navLateral-body-cr hide-on-tablet">
                                    SESION
                                </div>
                                <span class="zmdi zmdi-chevron-left"></span>
                            </a>
                            <?php
                            if (isset($_SESSION['usuario'])) {
                            ?>
                                <ul class="full-width menu-principal sub-menu-options">
                                    <li class="full-width">
                                        <a id="btn-exit" class="full-width btn-exit">
                                            <div class="navLateral-body-cl">
                                                <i class="zmdi zmdi-power mdc-text-green"></i>
                                            </div>
                                            <div class="navLateral-body-cr hide-on-tablet">
                                                CERRAR SESION
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            <?php
                            } else {
                            ?>
                                <ul class="full-width menu-principal sub-menu-options">
                                    <li class="full-width">
                                        <a id="btn-login" class="full-width btn-login">
                                            <div class="navLateral-body-cl">
                                                <i class="zmdi zmdi-power mdc-text-grey"></i>
                                            </div>
                                            <div class="navLateral-body-cr hide-on-tablet">
                                                INICIAR SESION
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            <?php
                            }
                            ?>
                        </li>

                    </ul>
                </nav>
        </div>
    </section>