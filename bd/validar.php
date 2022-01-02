<?php
session_start();
include("con_db.php");

$usuario=$_POST['usuario'];
$pass=$_POST['clave'];
$clave=hash('sha256', $pass);
$consulta="SELECT*FROM usuarios where usuario='$usuario' and clave='$clave'";
$resultado=mysqli_query($conex,$consulta);
$filas=mysqli_num_rows($resultado);
if($filas){
$fila = mysqli_fetch_row($resultado);
$_SESSION['usuario']=$fila[4];
$_SESSION['correo']=$fila[2];
$_SESSION['nomusuario']=$fila[1];
    header("location:../index.php");
    exit;
}else{
echo '
<script>
alert("Validacion incorrecta");
window.location="../login.php";
</script>
';
exit;
}
mysqli_free_result($resultado);
mysqli_close($conex);