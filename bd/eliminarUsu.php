<?php
session_start();
include("con_db.php");
$usu = $_POST['usu'];
$consulta = "DELETE FROM usuarios where usuario='$usu'";
if (mysqli_query($conex, $consulta)) {
echo '
<script>
window.location="../usuario.php";
</script>
';
} else {
    echo "ERROR: No se pudo eliminar registro $consulta. " . mysqli_error($link);
}
mysqli_close($conex);
