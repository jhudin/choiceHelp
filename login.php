<?php
session_start();
if (isset($_SESSION['usuario'])) {
  echo '<script>
window.location="index.php";
</script>';
  die();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/sweetalert2.css">
    <link rel="stylesheet" href="css/material.min.css">
    <link rel="stylesheet" href="css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="js/jquery-1.11.2.min.js"><\/script>')
    </script>
    <script src="js/material.min.js"></script>
    <script src="js/sweetalert2.min.js"></script>
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/main.js"></script>
</head>

<body class="cover">
    <div class="container-login">
        <p class="text-center" style="font-size: 80px;">
            <i class="zmdi zmdi-account-circle"></i>
        </p>
        <p class="text-center text-condensedLight">Iniciar como administrador</p>
        <form method="post" action="bd/validar.php">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="text" name="usuario">
                <label class="mdl-textfield__label" for="userName">Usuario</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="password" name="clave">
                <label class="mdl-textfield__label" for="pass">Contraseña</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            
            <input  class="btn-default" type="submit" value="Ingresar" style="color: #3F51B5; width:100%">
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <a class="btn btn-primary btn-lg" href="index.php" style="color: #3F51B5; text-decoration:none;">Ingresar al Sistema como visitante</a>
            </div>
        </form>
    </div>
</body>

</html>