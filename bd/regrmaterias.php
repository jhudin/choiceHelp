<?php
include("con_db.php");
if(isset($_POST['register'])){
  if (!(($_POST['asig'])==null)) {
    $asig = mb_strtolower(trim($_POST['asig']),'UTF-8');
    $area = mb_strtolower(trim($_POST['area']),'UTF-8');
    $pais = mb_strtolower(trim($_POST['pais']),'UTF-8');
    $cred = mb_strtolower(trim($_POST['cred']),'UTF-8');
    $uni = trim($_POST['uni']);
    $consulta = "INSERT INTO planestudio(universidad, asignatura, area,pais, creditos) VALUES ('$uni','$asig','$area','$pais','$cred')";
      $resultado = mysqli_query($conex, $consulta);
      if ($resultado) {
?>
        <span style='color: #3ba55d;'>Registro Completo</span>
      <?php
      } else {
      ?>
        <span style='color: #E61C22;'>ha ocurrido un error</span>
      <?php
      }    
  }else{
  ?>
      <span style='color: #E61C22;'>Campos vacios</span>
  <?php
  }
  }
  mysqli_close($conex);
?>