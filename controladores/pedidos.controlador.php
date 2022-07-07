<?php
$conexion = mysqli_connect("localhost","root","","lamulata");
$consulta="SELECT*FROM productos";
$resultado=mysqli_query($conexion,$consulta);





?>