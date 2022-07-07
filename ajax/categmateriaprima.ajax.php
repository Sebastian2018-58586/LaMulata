

<?php

require_once "../controladores/categmateriaprima.controlador.php";
require_once "../modelos/categmateriaprima.modelo.php";
// error_reporting(0);

class ajaxCategmateriaprima
{
	public $idrestaurante;
	public $idcategoriam;
	public $nombre;




	public function MostrarCategmateriaprima()
	{

		$respuesta = ControladorCategmateriaprima::ctrMostrarCategmateriaprima();

		echo json_encode($respuesta);
	}

	

	public function registrarCategmateriaprima()
	{

		
		$respuesta = ControladorCategmateriaprima::ctrRegistrarCategmateriaprima(
            $this->idrestaurante,
			$this->idcategoriam,
			$this->nombre
		
		);


		echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
	}



	public function eliminarCategmateriaprima()
	{

		
		$respuesta = ControladorCategmateriaprima::ctrEliminarCategmateriaprima($this->idcategoriam);


		echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
	}

	
	public function actualizarCategmateriaprima()
	{

		
		$respuesta = ControladorCategmateriaprima::ctrActualizarCategmateriaprima(
			$this->idrestaurante,
			$this->idcategoriam,
			$this->nombre
			
		);


		echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
	}
}



if (!isset($_POST["accion"])) {
	$respuesta = new ajaxCategmateriaprima();
	$respuesta->MostrarCategmateriaprima();
} else {

	

	if ($_POST["accion"] == "registrar") {

		
		$insertar = new ajaxCategmateriaprima();

		
		$insertar->idrestaurante = $_POST["idrestaurante"];
	    $insertar->idcategoriam = $_POST["idcategoriam"];
		$insertar->nombre = $_POST["nombre"];
		




		$insertar->registrarCategmateriaprima();
	}


	if ($_POST["accion"] == "eliminar") {
		$eliminar = new ajaxCategmateriaprima();

		


		$eliminar->idcategoriam = $_POST["idcategoriam"];



		$eliminar->eliminarCategmateriaprima();
	}

	if ($_POST["accion"] == "actualizar") {
		$actualizar = new ajaxCategmateriaprima();
		

		$actualizar->idrestaurante = $_POST["idrestaurante"];
		$actualizar->idcategoriam = $_POST["idcategoriam"];
		$actualizar->nombre = $_POST["nombre"];
		

		
		$actualizar->actualizarCategmateriaprima();
	}
}

