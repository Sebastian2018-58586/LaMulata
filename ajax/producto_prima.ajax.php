<?php

require_once "../controladores/producto_materiap.controlador.php";
require_once "../modelos/producto_materiap.modelo.php";
// error_reporting(0);

class ajaxProducto_materiap{
	public $idpromat;
	public $idproducto;
	public $idmateriaprima;




	public function MostrarProducto_materiap()
	{

		$respuesta = ControladorProducto_materiap::ctrMostrarProducto_materiap();

		echo json_encode($respuesta);
	}

	

	public function registrarProducto_materiap()
	{
	
		$respuesta = ControladorProducto_materiap::ctrRegistrarProducto_materiap(
            $this->idpromat,
			$this->idproducto,
			$this->idmateriaprima
		
		);


		echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
	}



	public function eliminarProducto_materiap()
	{

		
		$respuesta = ControladorProducto_materiap::ctrEliminarProducto_materiap($this->idpromat);


		echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
	}

	
	public function actualizarProducto_materiap()
	{

		$respuesta = ControladorProducto_materiap::ctrActualizarProducto_materiap(
			$this->idpromat,
			$this->idproducto,
			$this->idmateriaprima,
			$this->cantidad
			
		);


		echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
	}

	public function get_materiap()
	{

		$respuesta = ControladorProducto_materiap::ctrGetProducto_materiap(
			$this->idmateriaprima
		);


		echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
	}
}

// Jmeter

if (!isset($_POST["accion"])) {
	$respuesta = new ajaxProducto_materiap();
	$respuesta->MostrarProducto_materiap();
} else {

	if ($_POST["accion"] == "registrar") {

		$insertar = new ajaxProducto_materiap();
		
		// $insertar->idpromat = $_POST["idpromat"];
		$insertar->idproducto = $_POST["idproducto"];
		
		$insertar->idmateriaprima = $_POST["data"];
		
		$insertar->registrarProducto_materiap();

	}


	if ($_POST["accion"] == "eliminar") {
		$eliminar = new ajaxProducto_materiap();

		
		$eliminar->idpromat = $_POST["idpromat"];

		$eliminar->eliminarProducto_materiap();

	}
	if ($_POST["accion"] === "actualizar") {

		$actualizar = new ajaxProducto_materiap();
		
		$actualizar->idpromat = $_POST["idpromat"];
		$actualizar->idproducto = $_POST["idproducto"];
		$actualizar->idmateriaprima = $_POST["idmateriaprima"];
		$actualizar->cantidad = $_POST["cantidad"];
				
		$actualizar->actualizarProducto_materiap();
	}
	if ($_POST["accion"] === "getMateriaPrima") {
		$getMateriaPrima = new ajaxProducto_materiap();
		$getMateriaPrima->idmateriaprima = $_POST["idmateriaprima"];
		$getMateriaPrima->get_materiap();
	}
}

