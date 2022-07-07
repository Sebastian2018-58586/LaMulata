<?php

class ControladorProductos
{

	static public function ctrMostrarProductos()
	{

		$respuesta = ModeloProductos::mdlMostrarProductos();

		return $respuesta;
	}

	// static public function ctrRegistrarCategorias($categoria, $ruta, $estado, $fecha){

	// 	$respuesta = ModeloCategorias::mdlRegistrarCategorias($categoria, $ruta, $estado, $fecha);

	// 	return $respuesta;
	// }

	// static public function ctrRegistrarProductos($Id, $nombre)
	// {
		static public function ctrRegistrarProductos($idrestaurante,
		$idproducto,
		$nombre,$idcategoriap,$precio,$imagen)
	{
		$respuesta = ModeloProductos::mdlRegistrarProductos($idrestaurante,
		 $idproducto,
		$nombre,$idcategoriap,$precio,$imagen);

		return $respuesta;
	}

	static public function ctrEliminarCategoria($idproducto){

		$respuesta = ModeloProductos::mdlEliminarCategoria($idproducto);

		return $respuesta;
	}

	static public function ctrActualizarCategoria(
		$idrestaurante,
		$idproducto,$nombre,$idcategoriap,$precio,$imagen){

		$respuesta = ModeloProductos::mdlActualizarCategoria(
			$idrestaurante,
			$idproducto,$nombre,$idcategoriap,$precio,$imagen);

		return $respuesta;
	}

}
