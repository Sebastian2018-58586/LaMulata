<?php 
include_once "../modelos/conexion.php";
$conexion = mysqli_connect("localhost","root","","lamulata1");
$consulta="SELECT*FROM productos";
$resultado=mysqli_query($conexion,$consulta);

$data = json_decode($_POST['array2']);
$valor = ($_POST['valor']);
$mesa = ($_POST['mesa']);

var_dump($data);
var_dump($valor);
var_dump($mesa);

$sql = "INSERT INTO pedidos (precio, id_sede , estado, mesa,fecha) VALUES ('$valor', '1', 'Pendiente', '$mesa' , now())";
$conexion->query($sql);

$id_pedido =$conexion->insert_id;
echo  $conexion->insert_id;
echo  count($data);

for($i=0;$i< count($data); $i++ ){
  $id_producto= $data[$i]->id_p;
  $precio= $data[$i]->precio;
  $nombre = $data[$i]->nombre;
  $sql2 = "INSERT INTO detalle_pedido (id_pedido, id_producto , precio , nombre) VALUES ('$id_pedido', ' $id_producto', '$precio' ,'$nombre')";
  $conexion->query($sql2);

}


/* 
$query="SELECT*FROM productos";
if ($result = $conexion->query($query)) {

    /* fetch associative array */
  //  while ($row = $result->fetch_assoc()) {
    //    $field1name = $row["nombre"];
     //   $field2name = $row["precio"];
    //    var_dump( $row);
   //      echo '<b>'.$field1name.'</b><br />';
       /* echo '<b>'.$field2name.'</b><br />'; */
  
  //  }

    /* free result set */
  //  $result->free();
//}
