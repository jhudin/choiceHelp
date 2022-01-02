<?php
session_start();
include("con_db.php");
$nombre_u = $_POST['nom_u'];
$consulta = "DELETE FROM universidades where nombre='$nombre_u'";
if (mysqli_query($conex, $consulta)) {
?>
    <span style='color: #3ba55d;'>Registro eliminado con éxito</span>
<?php
} else {
    echo "ERROR: No se pudo eliminar registro $consulta. " . mysqli_error($link);
}
mysqli_close($conex);
