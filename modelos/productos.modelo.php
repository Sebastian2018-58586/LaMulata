<?php

 require_once "conexion.php";

 
// session_start();
// $idcategoriap=$_SESSION['idcategoriap'];
// session_start();
// $_SESSION=$a;

// $conexion = mysqli_connect("localhost","root","","lamulata1");

// $consulta="SELECT nombre FROM usuarios WHERE idproducto = '$idproducto'";
// $resultado=mysqli_query($conexion,$consulta);
// $filas=mysqli_num_rows($resultado);



class ModeloProductos
{

	static public function mdlMostrarProductos()
	{
		session_start();
		// $stmt = Conexion::conectar()-> prepare("SELECT id,nombre,'X' as acciones FROM productos");
		// $stmt = Conexion::conectar()-> prepare("SELECT id,nombre FROM productos");

		// $stmt = Conexion::conectar()->prepare("SELECT idrestaurante,idproducto,nombre,idcategoriap,precio,imagen FROM productos ");
		// $stmt = Conexion::conectar()->prepare("SELECT idrestaurante,idproducto,nombre,idcategoriap,precio,imagen FROM productos WHERE idrestaurante ='1'");
		$stmt = Conexion::conectar()->prepare("SELECT idrestaurante,idproducto,nombre,idcategoriap,precio,imagen FROM productos WHERE idrestaurante=".$_SESSION['idRestaurante']);



		$stmt->execute();

		return $stmt->fetchAll();

		$stmt = null;
	}

	static public function mdlRegistrarProductos(
		$idrestaurante,
		$idproducto,
		$nombre,$idcategoriap,$precio,$imagen)
	{

		session_start();
		$id = $_SESSION['idRestaurante'];

		// $stmt = Conexion::conectar()->prepare("INSERT INTO productos(id,nombre) VALUES (:Id,:nombre)");
		$stmt = Conexion::conectar()->prepare("INSERT INTO productos(idrestaurante,idproducto,
		nombre,idcategoriap,precio,imagen) VALUES ($id,:idproducto,:nombre,:idcategoriap,:precio,:imagen)");

		// $stmt -> bindParam(":Id", $Id, PDO::PARAM_INT);
		// $stmt -> bindParam(":nombre", $nombre, PDO::PARAM_STR);
		// $stmt -> bindParam(":estado", $estado, PDO::PARAM_STR);
		// $stmt -> bindParam(":fecha", $fecha, PDO::PARAM_STR);

		// $stmt->bindParam(":idrestaurante", $idrestaurante, PDO::PARAM_INT);
		 $stmt->bindParam(":idproducto", $idproducto, PDO::PARAM_INT);

		$stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
		$stmt->bindParam(":idcategoriap", $idcategoriap, PDO::PARAM_INT);
		$stmt->bindParam(":precio", $precio, PDO::PARAM_INT);
		$stmt->bindParam(":imagen", $imagen, PDO::PARAM_LOB);

		if ($stmt->execute()) {
			return "El producto se registró correctamente";
		} else {
			return "Error, no se pudo registrar el producto:";
		}
		$stmt = null;
	}

	static public function mdlEliminarCategoria($idproducto)
	{

		// $stmt = Conexion::conectar()->prepare("DELETE FROM productos WHERE id = :Id");
		$stmt = Conexion::conectar()->prepare("DELETE FROM productos WHERE idproducto= :idproducto");


		// $stmt -> bindParam(":Id", $Id, PDO::PARAM_INT);

		$stmt->bindParam(":idproducto", $idproducto, PDO::PARAM_INT);


		if ($stmt->execute()) {
			return "El producto se eliminó correctamente";
		} else {
			return "Error, no se pudo eliminar el producto";
		}

		$stmt = null;
	}



	static public function mdlActualizarCategoria(
		$idrestaurante,
		$idproducto,
		$nombre,
		$idcategoriap,$precio,$imagen)
	{
		session_start();
		$id = $_SESSION['idRestaurante'];

		// $stmt = Conexion::conectar()->prepare("UPDATE productos
		// 									   SET nombre = :nombre, id = :Id
		// 									    --    id = :Id
		// 									    --    id = :Idi
		// 									   	--    ruta = :ruta,
		// 										--    estado = :estado,
		// 										--    fecha = :fecha

		// 									   WHERE id = :Id");

		$stmt = Conexion::conectar()->prepare("UPDATE productos
		                                     SET 
											 nombre = :nombre, 
											 idcategoriap = :idcategoriap,
		                                     precio = :precio,
											 imagen = :imagen

		                                     WHERE idproducto = :idproducto");


		// modificar todos los campos restantes 
	

		// $stmt->bindParam(":idrestaurante", $idrestaurante, PDO::PARAM_INT);
		$stmt->bindParam(":idproducto", $idproducto, PDO::PARAM_INT);
		$stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
		$stmt->bindParam(":idcategoriap", $idcategoriap, PDO::PARAM_INT);
		$stmt->bindParam(":precio", $precio, PDO::PARAM_INT);
		$stmt->bindParam(":imagen", $imagen, PDO::PARAM_LOB);

		// $stmt -> bindParam(":ruta", $ruta, PDO::PARAM_STR);
		// $stmt -> bindParam(":estado", $estado, PDO::PARAM_STR);
		// $stmt -> bindParam(":fecha", $fecha, PDO::PARAM_STR);


		


		if ($stmt->execute()) {
			return "El producto se actualizó correctamente";
			if ($stmt->execute()) {
				return "El producto se actualizó correctamente";
			} else {
				"Error, no se pudo actualizar el producto:";
			}
		}

		$stmt = null;
	}
}
