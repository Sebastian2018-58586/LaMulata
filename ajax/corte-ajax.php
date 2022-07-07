<?php 
$conexion = mysqli_connect("localhost","root","","lamulata1");

$nequi=$_REQUEST["nequi"];
$efectivo=$_REQUEST["efectivo"];
$tarjeta=$_REQUEST["tarjeta"];
$gastos=$_REQUEST["gastos"];
$otro=$_REQUEST["otro"];
$base=$_REQUEST["base"];
$total=$_REQUEST["total"];





$sql = "INSERT INTO cortes(nequi, efectivo , tarjeta, otro,gastos,base,fecha,total) VALUES ('$nequi', '$efectivo', '$tarjeta', '$otro' ,'$gastos','$base', now(), '$total')";
$conexion->query($sql);
include_once "../modelos/conexion.php";
$sentencia4 =  Conexion::conectar()->prepare("UPDATE base SET valor='$base', estado= 'desactivo' WHERE id= 1");
$sentencia4->execute();




?>
