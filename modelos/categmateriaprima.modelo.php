<?php

require_once "conexion.php";


class ModeloCategmateriaprima
{

	static public function mdlMostrarCategmateriaprima()
	{
		
		session_start();
		$sql = "SELECT idrestaurante, idcategoriam, nombre FROM categoriamateriaprima WHERE idrestaurante =".$_SESSION['idRestaurante'];

		$stmt = Conexion::conectar()->prepare($sql);

		$stmt->execute();

		return $stmt->fetchAll();

		$stmt = null;
	}


	static public function mdlRegistrarCategmateriaprima($idrestaurante,
       $idcategoriam,
       $nombre
       
	) {

		session_start();
		$id = $_SESSION['idRestaurante'];

		$stmt = Conexion::conectar()->prepare("INSERT INTO categoriamateriaprima(
	     idrestaurante,idcategoriam,
         nombre) VALUES ($id,:idcategoriam,:nombre)");
		

		// $stmt->bindParam(":idrestaurante", $idrestaurante, PDO::PARAM_INT);
	    $stmt->bindParam(":idcategoriam", $idcategoriam, PDO::PARAM_INT);
		$stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);

		
		if ($stmt->execute()) {
			return "La categoría se registró correctamente";
		} else {
			return "Error, no se pudo registrar el producto ";
		}
		$stmt = null;
	}

	static public function mdlEliminarCategmateriaprima($idcategoriam)
	{

		$stmt = Conexion::conectar()->prepare("DELETE FROM categoriamateriaprima WHERE idcategoriam= :idcategoriam");

		$stmt->bindParam(":idcategoriam", $idcategoriam, PDO::PARAM_INT);


		if ($stmt->execute()) {
			return "La categoría se eliminó correctamente";
		} else {
			return "Error, no se pudo eliminar la categoria:";
		}

		$stmt = null;
	}

	

	static public function mdlActualizarCategmateriaprima(
        $idrestaurante,
		$idcategoriam,
        $nombre)
	{


		$stmt = Conexion::conectar()->prepare("UPDATE categoriamateriaprima
		                                     SET  nombre = :nombre
											     
												 
												 


		                                     WHERE idcategoriam = :idcategoriam ");


		
		// $stmt -> bindParam(":idrestaurante", $idrestaurante, PDO::PARAM_INT);
		$stmt -> bindParam(":idcategoriam", $idcategoriam, PDO::PARAM_INT);
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
