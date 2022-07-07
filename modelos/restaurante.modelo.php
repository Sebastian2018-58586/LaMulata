<?php

require_once "conexion.php";

class ModeloRestaurante
{

	static public function mdlMostrarRestaurante()
	{

		$stmt = Conexion::conectar()->prepare("SELECT 
        idrestaurante,
        nombre FROM restaurante");

		$stmt->execute();

		return $stmt->fetchAll();

		$stmt = null;
	}


	static public function mdlRegistrarRestaurante($idrestaurante,
       $nombre
       
	) {

		$stmt = Conexion::conectar()->prepare("INSERT INTO restaurante(idrestaurante,
        nombre) VALUES (:idrestaurante,:nombre)");

		$stmt->bindParam(":idrestaurante", $idrestaurante, PDO::PARAM_INT);
		$stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
		


		if ($stmt->execute()) {
			return "la sede se registró correctamente";
		} else {
			return "Error, no se pudo registrar la sede";
		}
		$stmt = null;
	}

	static public function mdlEliminarRestaurante($idrestaurante)
	{

		$stmt = Conexion::conectar()->prepare("DELETE FROM restaurante WHERE idrestaurante= :idrestaurante");

		$stmt->bindParam(":idrestaurante", $idrestaurante, PDO::PARAM_INT);


		if ($stmt->execute()) {
			return "La sede se eliminó correctamente";
		} else {
			return "Error, no se pudo eliminar la sede";
		}

		$stmt = null;
	}

	

	static public function mdlActualizarRestaurante(
        $idrestaurante,
        $nombre)
	{


		$stmt = Conexion::conectar()->prepare("UPDATE restaurante
		                                     SET  nombre = :nombre


		                                     WHERE idrestaurante = :idrestaurante");


		
		$stmt -> bindParam(":idrestaurante", $idrestaurante, PDO::PARAM_INT);
		$stmt -> bindParam(":nombre", $nombre, PDO::PARAM_STR);
		


		

		if ($stmt->execute()) {
			return "La sede se actualizó correctamente";
			if ($stmt->execute()) {
				return "La sede  se actualizó correctamente";
			} else {
				"Error, no se pudo actualizar la sede ";
			}
		}

		$stmt = null;
	}
}
