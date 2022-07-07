<?php 
include_once "../modelos/conexion.php";
$conexion = mysqli_connect("localhost","root","","lamulata1");
$detalle = ($_POST['detalle']);




$sql = "UPDATE pedidos SET estado='Despachado' WHERE id_pedido= " . $detalle;

$resultado=mysqli_query($conexion,$sql);

if($resultado){
    echo "true";

}














?>