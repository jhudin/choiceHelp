<?php
session_start();
include("con_db.php");
if (($_POST['uni']) <> null) {
    $uinicio = mb_strtolower(trim($_POST['uinicio']), 'UTF-8');
    $asiginicio = mb_strtolower(trim($_POST['asiginicio']), 'UTF-8');
    $uni = mb_strtolower(trim($_POST['uni']), 'UTF-8');
    $asign = mb_strtolower(trim($_POST['asign']), 'UTF-8');
    $area = mb_strtolower(trim($_POST['area']), 'UTF-8');
    $pais = mb_strtolower(trim($_POST['pais']), 'UTF-8');
    $creditos = mb_strtolower(trim($_POST['creditos']), 'UTF-8');
    
    $sql = "UPDATE planestudio SET universidad='$uni' , asignatura='$asign' , area='$area' , pais='$pais' , creditos='$creditos' WHERE universidad='$uinicio' and asignatura='$asiginicio'";
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