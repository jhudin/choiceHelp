<?php
session_start();
include("con_db.php");
if (($_POST['usuario']) <> null and $_POST['correo']) {

    $usuario = mb_strtolower(trim($_POST['usuario']), 'UTF-8');
    $correo = mb_strtolower(trim($_POST['correo']), 'UTF-8');
    $pss = trim($_POST['clave1']);
    $nombreinicio = trim($_POST['usuarioinicial']);
    $clave = hash('sha256', $pss);
    
    if($pss<>null){

        $sql = "UPDATE usuarios SET usuario='$usuario' , correo='$correo' , clave='$clave'  WHERE usuario='$nombreinicio'";
    }else{
        $sql = "UPDATE usuarios SET usuario='$usuario' , correo='$correo'  WHERE usuario='$nombreinicio'";
    }
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