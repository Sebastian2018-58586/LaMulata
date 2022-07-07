<?php

include_once "../modelos/conexion.php";
$base = $_REQUEST['base'];
$sentencia4 =  Conexion::conectar()->prepare("UPDATE base SET valor='$base', estado= 'activa' WHERE id= 1");
$sentencia4->execute();
