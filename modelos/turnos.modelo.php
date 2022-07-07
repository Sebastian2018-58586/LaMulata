<?php

require_once "conexion.php";

class ModeloTurnos
{

	static public function mdlMostrarTurnos()
	{
		session_start();
		$stmt = Conexion::conectar()->prepare("SELECT 
        idrestaurante,
        idturno,
        fecha,
        horaentrada,
        horasalida,
        idempleado FROM turnos ");

		$stmt->execute();

		return $stmt->fetchAll();

		$stmt = null;
	}


	static public function mdlRegistrarTurnos($idrestaurante,
       $idturno,
       $fecha,
       $horaentrada,
       $horasalida,
       $idempleado
	) {

		$stmt = Conexion::conectar()->prepare("INSERT INTO turnos(idrestaurante,
        idturno,
        fecha,
        horaentrada,
        horasalida,
        idempleado) VALUES (:idrestaurante,:idturno,:fecha,:horaentrada,:horasalida,:idempleado)");

		$stmt->bindParam(":idrestaurante", $idrestaurante, PDO::PARAM_INT);
		$stmt->bindParam(":idturno", $idturno, PDO::PARAM_INT);
		$stmt->bindParam(":fecha", $fecha, PDO::PARAM_STR);
		$stmt->bindParam(":horaentrada", $horaentrada, PDO::PARAM_STR);
		// $stmt->bindParam(":correo", $correo, PDO::PARAM_STR);
		$stmt->bindParam(":horasalida", $horasalida, PDO::PARAM_STR);
        $stmt->bindParam(":idempleado", $idempleado, PDO::PARAM_STR);
		


		if ($stmt->execute()) {
			return "El empleado turno se se registró correctamente";
		} else {
			return "Error, no se pudo registrar el turno";
		}
		$stmt = null;
	}

	static public function mdlEliminarTurnos($idturno)
	{

		$stmt = Conexion::conectar()->prepare("DELETE FROM turnos WHERE idturno= :idturno");

		$stmt->bindParam(":idturno", $idturno, PDO::PARAM_INT);


		if ($stmt->execute()) {
			return "El turno se eliminó correctamente";
		} else {
			return "Error, no se pudo eliminar el turno";
		}

		$stmt = null;
	}

	

	static public function mdlActualizarTurnos(
        $idrestaurante,
        $idturno,
        $fecha,
        $horaentrada,
        $horasalida,
        $idempleado)
	{


		$stmt = Conexion::conectar()->prepare("UPDATE turnos
		                                     SET fecha = :fecha, 
                                             horaentrada = :horaentrada,
                                             horasalida = :horasalida,
												idrestaurante = :idrestaurante,
                                                idempleado =:idempleado


		                                     WHERE idturno = :idturno");


		
		$stmt -> bindParam(":idrestaurante", $idrestaurante, PDO::PARAM_INT);
		$stmt -> bindParam(":idturno", $idturno, PDO::PARAM_INT);
		$stmt -> bindParam(":fecha", $fecha, PDO::PARAM_STR);
		$stmt -> bindParam(":horaentrada", $horaentrada, PDO::PARAM_STR);
		$stmt -> bindParam(":horasalida", $horasalida, PDO::PARAM_STR);
        $stmt -> bindParam(":idempleado", $idempleado, PDO::PARAM_STR);
        $stmt -> bindParam(":idrol", $idrol, PDO::PARAM_INT);



		

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
