<?php

require_once "conexion.php";

class ModeloProducto_materiap
{

	static public function mdlMostrarProducto_materiap()
	{
		session_start();
		$sql = " SELECT pmp.*, p.nombre as nombre_producto, mp.nombre as nombre_materia_prima, mp.cantidad, mp.cantidad_asoc FROM productomateriaprima as pmp INNER JOIN materiaprima as mp ON mp.idmateriaprima = pmp.idmateriaprima INNER JOIN productos as p ON p.idproducto = pmp.idproducto WHERE pmp.idrestaurante =" . $_SESSION['idRestaurante'];
		$stmt = Conexion::conectar()->prepare($sql);

		$stmt->execute();

		return $stmt->fetchAll();

		$stmt = null;
	}


	static public function mdlRegistrarProducto_materiap(
		$idpromat = null,
		$idproducto,
		$idmateriaprima

	) {

		$data = json_decode($idmateriaprima);
		session_start();
		$idrestaurante = $_SESSION['idRestaurante'];


		//	$arrayMateriaPrimas = explode(',', $idmateriaprima);
		$mensaje = "";
		foreach ($data as $key => $value) {

			
			$canp = $value->cantidad;
			$matprActualizar = Conexion::conectar()->prepare("UPDATE materiaprima SET cantidad_asoc =$canp WHERE idmateriaprima =$value->idmateriaprima");

			
			$matprActualizar->execute();

			// ----------------------------------
			// $ca = $canp - cantidad ;
			$matprActualizar1 = Conexion::conectar()->prepare("UPDATE materiaprima SET cantidad = cantidad -$canp WHERE idmateriaprima =$value->idmateriaprima");
			
			$matprActualizar1->execute();

			$stmt = Conexion::conectar()->prepare("INSERT INTO productomateriaprima(idrestaurante, idproducto, idmateriaprima) VALUES ($idrestaurante,$idproducto,$value->idmateriaprima)");
		

			if ($stmt->execute()) {
				$mensaje =  "La categoría se registró correctamente";
			} else {
				$mensaje = "Error, no se pudo registrar el producto: ";
			}
		}


		if ($mensaje) {
			return $mensaje;
		}
		$stmt = null;
	}

	static public function mdlEliminarProducto_materiap($idpromat)
	{

		$stmt = Conexion::conectar()->prepare("DELETE FROM productomateriaprima WHERE idpromat = :idpromat");

		$stmt->bindParam(":idpromat", $idpromat, PDO::PARAM_INT);


		if ($stmt->execute()) {
			return "La categoría se eliminó correctamente";
		} else {
			return "Error, no se pudo eliminar la categoria";
		}

		$stmt = null;
	}



	static public function mdlActualizarProducto_materiap(
		$idpromat,
		$idproducto,
		$idmateriaprima,
		$cantidad
	) {


		// $matpri = Conexion::conectar()->prepare("SELECT cantidad_asoc FROM materiaprima WHERE idmateriaprima = $idmateriaprima");
		// $matpri->execute();
		// $mat = $matpri->fetch();
		// $cant = $mat['cantidad_asoc'];
		//$cant_t = $cant - $cantidad;
		// $cantidad_pro = $cant_t;

		$matprActualizar = Conexion::conectar()->prepare("UPDATE materiaprima SET cantidad_asoc = $cantidad WHERE idmateriaprima =$idmateriaprima");
		$matprActualizar->execute();
		
		$stmt = Conexion::conectar()->prepare("UPDATE productomateriaprima SET idproducto = $idproducto, idmateriaprima = $idmateriaprima WHERE idpromat = $idpromat");

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

	static public function mdlGetProducto_materiap($idmateriaprima)
	{
		session_start();
		$idRestaurante = $_SESSION['idRestaurante'];
		$stmt = Conexion::conectar()->prepare("SELECT idmateriaprima,nombre, cantidad FROM materiaprima WHERE idmateriaprima = :idmateriaprima AND idrestaurante = :idrestaurante");

		$stmt->bindParam(":idmateriaprima", $idmateriaprima, PDO::PARAM_INT);
		$stmt->bindParam(":idrestaurante", $idRestaurante, PDO::PARAM_INT);

		if ($stmt->execute()) {

			return [
				'data' => $stmt->fetch(),
				'message' => "La materia prima, se cargo correctamente"
			];

			// return "La materia prima, se ha encontrado, será carga en el detalle";

		} else {
			return [
				'data' => '',
				'message' => "Error, la materia prima seleccionada no existe"
			];
		}
		$stmt = null;
	}
}
