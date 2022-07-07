<?php
require 'db.php';
// $usuariou=$_POST['usuariou'];
// $contraseñau=$_POST['contraseñau'];
// // $rolu=$_POST['rolu'];

$usuario=$_POST['usuario'];
$contrasena=$_POST['contrasena'];

session_start();
// error_reporting(0);
// $conexion = mysqli_connect("localhost","root","","lamulata");

// $insertar = "INSERT INTO loginn VALUES ('$usuario','$contrasena')";
$insertar = "INSERT INTO `loginn` (`usuario`, `contrasena`) VALUES ('$usuario', '$contrasena')";
$query = mysqli_query($conexion,$insertar);

if($query){
  // echo "correcto";
  header("location:../HTML/login.html");
}else{

    if($usuario == " " || $usuario  == null){
        ?>
       <h1 class="bad">usuario vacio </h1>
     <?php
    }else{
          // echo "incorrecto";
?>
<h1 class="bad">ERROR DE AUTENTIFICACION VERIFIQUE LOS CAMPOS</h1>
  <?php
  include("registro.php");
  ?>
  <?php
      }
    }

