<?php
include("con_db.php");
if (isset($_POST['register'])) {
        $name = trim($_POST['usuario']);
        $email = trim($_POST['correo']);
        $pass = trim($_POST['passw']);
        $clave = hash('sha256', $pass);
        $tpusr = trim($_POST['tipousr']);
        if ($tpusr == null) {
            $tpusr = "administrador";
        }
        $consulta = "SELECT*FROM usuarios where usuario='$name'";
        $resultado = mysqli_query($conex, $consulta);
        $filas = mysqli_num_rows($resultado);
        if (!$filas) {
            $consulta = "INSERT INTO usuarios(usuario, correo, clave, tipousr) VALUES ('$name','$email','$clave','$tpusr')";
            $resultado = mysqli_query($conex, $consulta);
            if ($resultado) {
?>
                <script>
                    swal("Finalizado...", "El registro se ha realizado de manera exitosa", "success");
                </script>
            <?php
            } else {
            ?>
                <script>
                    swal("Error...", "error en la consulta", "error");
                </script>
            <?php
            }
        } else {
            ?>
            <script>
                swal("Error...", "Usuario existente", "error");
            </script>
<?php
        }

}

?>