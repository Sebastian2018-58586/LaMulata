<?php

require_once "conexion.php";

class ModeloCategproducto
{

	static public function mdlMostrarCategproducto()
	{
		session_start();
		$sql ="SELECT idrestaurante, idcategoriap,nombre FROM categoriaproductos WHERE idrestaurante=" .$_SESSION['idRestaurante'];
		$stmt = Conexion::conectar()->prepare($sql);

		$stmt->execute();

		return $stmt->fetchAll();

		$stmt = null;
	}


	static public function mdlRegistrarCategproducto($idrestaurante,
       $idcategoriap,
       $nombre
       
	) {
		session_start();
		$id = $_SESSION['idRestaurante'];

		$stmt = Conexion::conectar()->prepare("INSERT INTO categoriaproductos(idrestaurante,
        idcategoriap,
        nombre) VALUES ($id,:idcategoriap,:nombre)");

		// $stmt->bindParam(":idrestaurante", $idrestaurante, PDO::PARAM_INT);
		$stmt->bindParam(":idcategoriap", $idcategoriap, PDO::PARAM_INT);
		$stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
		


		if ($stmt->execute()) {
			return "La categoría se registró correctamente";
		} else {
			return "Error, no se pudo registrar la categoria ";
		}
		$stmt = null;
	}

	static public function mdlEliminarCategproducto($idcategoriap)
	{

		$stmt = Conexion::conectar()->prepare("DELETE FROM categoriaproductos WHERE idcategoriap= :idcategoriap");

		$stmt->bindParam(":idcategoriap", $idcategoriap, PDO::PARAM_INT);


		if ($stmt->execute()) {
			return "La categoría se eliminó correctamente";
		} else {
			return "Error, no se pudo eliminar la categoria" ;
		}

		$stmt = null;
	}

	

	static public function mdlActualizarCategproducto(
        $idrestaurante,
        $idcategoriap,
        $nombre)
	{
		session_start();
		$id = $_SESSION['idRestaurante'];


		$stmt = Conexion::conectar()->prepare("UPDATE categoriaproductos
		                                     SET  nombre = :nombre


		                                     WHERE idcategoriap = :idcategoriap");


		
		// $stmt -> bindParam(":idrestaurante", $idrestaurante, PDO::PARAM_INT);
		$stmt -> bindParam(":idcategoriap", $idcategoriap, PDO::PARAM_INT);
		$stmt -> bindParam(":nombre", $nombre, PDO::PARAM_STR);
		


		

		if ($stmt->execute()) {
			return "La categoría  se actualizó correctamente";
			if ($stmt->execute()) {
				return "La categoría se actualizó correctamente";
			} else {
				"Error, no se pudo actualizar la categoría";
			}
		}

		$stmt = null;
	}
}
