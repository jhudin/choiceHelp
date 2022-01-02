<?php
session_start();
include("con_db.php");
if (($_POST['nom_u']) <> null and $_POST['pais'] <> null and $_POST['nom_prog'] <> null and $_POST['rank'] <> null) {
    $nameini = mb_strtolower(trim($_POST['nombreanterior']), 'UTF-8');
    $nameu = mb_strtolower(trim($_POST['nom_u']), 'UTF-8');
    $pais = mb_strtolower(trim($_POST['pais']), 'UTF-8');
    $prog = mb_strtolower(trim($_POST['nom_prog']), 'UTF-8');
    $rank = mb_strtolower(trim($_POST['rank']), 'UTF-8');
    $logo = trim($_POST['link_logo']);
    $sql = "UPDATE universidades SET nombre='$nameu' , pais='$pais' , nom_programa='$prog' , ranking='$rank' , logo='$logo' WHERE nombre='$nameini'";
    if (mysqli_query($conex, $sql)) {
?>
        <span style='color: #3ba55d;'>Registro modificado con éxito</span>
<?php
    } else {
        echo "ERROR: No se ejecuto $sql. " . mysqli_error($link);
    }
}else{
?>
        <span style='color: #E61C22;'>Campos vacios llenar antes de actualizar</span>
<?php
}
mysqli_close($conex);
?>