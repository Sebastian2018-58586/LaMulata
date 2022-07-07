<?php

require_once "conexion.php";

class ModeloEmpleados
{

	static public function mdlMostrarEmpleados()
	{
		session_start();
		$stmt = Conexion::conectar()->prepare("SELECT
        idempleado,
        nombre,
        apellido,
        telefono,
        direccion,
        cargo FROM empleados ");

		$stmt->execute();

		return $stmt->fetchAll();

		$stmt = null;
	}


	static public function mdlRegistrarEmpleados(
       $idempleado,
       $nombre,
       $apellido,
       $telefono,
       $direccion,
       $cargo
	) {

		$stmt = Conexion::conectar()->prepare("INSERT INTO empleados(
        idempleado,
        nombre,
        apellido,
        telefono,
        direccion,
        cargo) VALUES (:idempleado,:nombre,:apellido,:telefono,:direccion,:cargo)");

		// $stmt->bindParam(":idrestaurante", $idrestaurante, PDO::PARAM_INT);
		$stmt->bindParam(":idempleado", $idempleado, PDO::PARAM_INT);
		$stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
		$stmt->bindParam(":apellido", $apellido, PDO::PARAM_STR);
		// $stmt->bindParam(":correo", $correo, PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $telefono, PDO::PARAM_INT);
        $stmt->bindParam(":direccion", $direccion, PDO::PARAM_STR);
		$stmt->bindParam(":cargo", $cargo, PDO::PARAM_STR);


		if ($stmt->execute()) {
			return "El empleado se registró correctamente";
		} else {
			return "Error, no se pudo registrar el empledo";
		}
		$stmt = null;
	}

	static public function mdlEliminarEmpleados($idempleado)
	{

		$stmt = Conexion::conectar()->prepare("DELETE FROM empleados WHERE idempleado= :idempleado");

		$stmt->bindParam(":idempleado", $idempleado, PDO::PARAM_INT);


		if ($stmt->execute()) {
			return "El empleado se eliminó correctamente";
		} else {
			return "Error, no se pudo eliminar el empleado";
		}

		$stmt = null;
	}

	

	static public function mdlActualizarEmpleados(
        $idempleado,
        $nombre,
        $apellido,
        $telefono,
        $direccion,
        $cargo)
	{


		$stmt = Conexion::conectar()->prepare("UPDATE empleados
		                                     SET nombre = :nombre, 
                                             apellido = :apellido,
                                             telefono = :telefono,
                                                direccion =:direccion,
                                                cargo =:cargo


		                                     WHERE idempleado = :idempleado");


		
		$stmt -> bindParam(":idempleado", $idempleado, PDO::PARAM_INT);
		$stmt -> bindParam(":nombre", $nombre, PDO::PARAM_STR);
		$stmt -> bindParam(":apellido", $apellido, PDO::PARAM_STR);
		$stmt -> bindParam(":telefono", $telefono, PDO::PARAM_INT);
        $stmt -> bindParam(":direccion", $direccion, PDO::PARAM_STR);
        $stmt -> bindParam(":cargo", $cargo, PDO::PARAM_STR);



		

		if ($stmt->execute()) {
			return "El empleado se actualizó correctamente";
			if ($stmt->execute()) {
				return "El empleado se actualizó correctamente";
			} else {
				"Error, no se pudo actualizar el empleado";
			}
		}

		$stmt = null;
	}
}
