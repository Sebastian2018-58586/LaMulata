<?php

require_once "conexion.php";

class ModeloMateria
{

	
    static public function mdlMostrarMateria()
	{
		session_start();
		$stmt = Conexion::conectar()->prepare("SELECT 
        idrestaurante,
        idmateriaprima,
        idcategoriam,
        nombre,
        cantidad,
        descripcion FROM materiaprima WHERE idrestaurante=" .$_SESSION['idRestaurante']);

        // $sql = " SELECT pmp.*, p.nombre as nombre_categoria, mp.nombre as nombre_materia_prima 
		// FROM materiaprima as pmp INNER JOIN categoriamateriaprima 
		// as mp ON mp.idcategoriam = pmp.idcategoriam WHERE pmp.idrestaurante =" . $_SESSION['idRestaurante'];
	   
	 
	//    $stmt = Conexion::conectar()->prepare($sql);
    
		$stmt->execute();

		return $stmt->fetchAll();

		$stmt = null;
	}

	static public function mdlRegistrarMateria($idrestaurante,
	   $idmateriaprima,
       $idcategoriam,
       $nombre,
       $cantidad,
       $descripcion
	) {

		session_start();
		$id = $_SESSION['idRestaurante'];

		$stmt = Conexion::conectar()->prepare("INSERT INTO materiaprima(idrestaurante,
        idmateriaprima,
        idcategoriam,
        nombre,
        cantidad,
        descripcion) VALUES ($id,
        :idmateriaprima,
        :idcategoriam,
        :nombre,
        :cantidad,
        :descripcion)");

		


		// $stmt->bindParam(":idrestaurante", $idrestaurante, PDO::PARAM_INT);
	    $stmt->bindParam(":idmateriaprima", $idmateriaprima, PDO::PARAM_INT);
		$stmt->bindParam(":idcategoriam", $idcategoriam, PDO::PARAM_INT);
		$stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
		// $stmt->bindParam(":imagen", $imagen, PDO::PARAM_INT);
		$stmt->bindParam(":cantidad", $cantidad, PDO::PARAM_INT);
		$stmt->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);


		if ($stmt->execute()) {
			return "La materia prima se registró correctamente";
		} else {
			return "Error, no se pudo registrar la materia prima";
		}
		$stmt = null;
	}

	static public function mdlEliminarMateria($idmateriaprima)
	{

		$stmt = Conexion::conectar()->prepare("DELETE FROM materiaprima WHERE idmateriaprima= :idmateriaprima");

		$stmt->bindParam(":idmateriaprima", $idmateriaprima, PDO::PARAM_INT);


		if ($stmt->execute()) {
			return "La materia prima se eliminó correctamente";
		} else {
			return "Error, no se pudo eliminar la materia prima";
		}

		$stmt = null;
	}

	

	static public function mdlActualizarMateria(
	  $idrestaurante,
	  $idmateriaprima,
      $idcategoriam,
      $nombre,
      $cantidad,
      $descripcion)
	{
		session_start();
		$id = $_SESSION['idRestaurante'];


		$stmt = Conexion::conectar()->prepare("UPDATE materiaprima
		                                     SET idcategoriam = :idcategoriam,
												 nombre = :nombre,
												 cantidad = :cantidad,
												 descripcion = :descripcion


		                                     WHERE idmateriaprima = :idmateriaprima");


        // $stmt->bindParam(":idrestaurante", $idrestaurante, PDO::PARAM_INT);
		$stmt->bindParam(":idmateriaprima", $idmateriaprima, PDO::PARAM_INT);
		$stmt->bindParam(":idcategoriam", $idcategoriam, PDO::PARAM_INT);
		$stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
		// $stmt->bindParam(":imagen", $imagen, PDO::PARAM_INT);
		$stmt->bindParam(":cantidad", $cantidad, PDO::PARAM_INT);
		$stmt->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);



		if ($stmt->execute()) {
			return "La materia prima se actualizó correctamente";
		} else {
			"Error, no se pudo actualizar la materia prima";
		}

		$stmt = null;
	}
}
