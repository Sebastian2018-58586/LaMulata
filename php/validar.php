<?php
$idusuario=$_POST['idusuario'];
$contrasena=$_POST['contrasena'];
// $contrasena= password_hash($contrasena,PASSWORD_DEFAULT);
session_start();
$_SESSION['idusuario']=$idusuario;

// include('db.php');
$conexion = mysqli_connect("localhost","root","","lamulata1");

$consulta="SELECT*FROM usuarios where idusuario='$idusuario' and contrasena='$contrasena'";
$resultado=mysqli_query($conexion,$consulta);
$filas=mysqli_num_rows($resultado);


// if (password_verify($contrasena,$filas['contrasena'])) {

// }

// || (password_verify($contrasena,$filas['contrasena'

// preguntar si la variable filas, los datos son correctos 
if($filas){
  session_start();
  $_SESSION['idusuario']=$idusuario;

  //Consulta sql
  //$_SESSION['rol']= 'Resultado sql';

    header("location:../seleccionSede.php");
      // header("location:sedes.php");

}else{
    ?>
    <?php
    include("../HTML/login.html");
    ?>
    <!-- <br>
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
  </symbol>
  <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
  </symbol>
  <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </symbol>
</svg>

<div class="alert alert-danger d-flex align-items-center" role="alert">
  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
  <div>
  ERROR DE AUTENTIFICACION VERIFIQUE LOS CAMPOS
  </div>
</div> -->



<script>
  $( document ).ready(function() {
    $('#myModal').modal('toggle')
});
</script>

<div id="myModal"class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <h5 class="modal-title">Advertencia</h5> -->
        <FONT  COLOR="black">ERROR</FONT>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <FONT COLOR="BLACK">Acesso denegado, por favor verifique el usuario y contraseña nuevamente.</FONT>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Aceptar</button>
      </div>
    </div>
  </div>
</div>

    <?php
}


// mysqli_free_result($resultado);
// mysqli_close($conexion);

?>