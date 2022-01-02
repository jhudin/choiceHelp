<?php
include("con_db.php");
  if (!(($_POST['nom_u'])==null)) {
    $nameu = mb_strtolower(trim($_POST['nom_u']),'UTF-8');
    $pais = mb_strtolower(trim($_POST['pais']),'UTF-8');
    $prog = mb_strtolower(trim($_POST['nom_prog']),'UTF-8');
    $rank = mb_strtolower(trim($_POST['rank']),'UTF-8');
    $logo = trim($_POST['link_logo']);
    
    $consulta = "SELECT*FROM universidades where nombre='$nameu'";
    $resultado = mysqli_query($conex, $consulta);
    $filas = mysqli_num_rows($resultado);
    if (!$filas) {
        $consulta = "INSERT INTO universidades(nombre, pais, nom_programa,ranking, logo) VALUES ('$nameu','$pais','$prog','$rank','$logo')";
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
    } else {
      ?>
      <span style='color: #E61C22;'>La Universidad ya se encuentra registrada</span>
  <?php
    }
  }else{
  ?>
      <span style='color: #E61C22;'>Campos vacios</span>
  <?php
  }
  mysqli_close($conex);
?>