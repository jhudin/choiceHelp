<?php
session_start();
include("con_db.php");
$uni = $_POST['uni'];
$asign = $_POST['asign'];
$consulta = "DELETE FROM planestudio where universidad='$uni' and asignatura='$asign'";
if (mysqli_query($conex, $consulta)) {
echo '
<script>
alert("Registro eliminado correctamente");
window.location="../analizar.php";
</script>
';
} else {
    echo "ERROR: No se pudo eliminar registro $consulta. " . mysqli_error($link);
}
mysqli_close($conex);
