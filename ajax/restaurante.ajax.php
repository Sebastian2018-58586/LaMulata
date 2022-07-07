
<?php

require_once "../controladores/restaurante.controlador.php";
require_once "../modelos/restaurante.modelo.php";
// error_reporting(0);

class ajaxRestaurante
{
	public $idrestaurante;
	public $nombre;




	public function MostrarRestaurante()
	{

		$respuesta = ControladorRestaurante::ctrMostrarRestaurante();

		echo json_encode($respuesta);
	}

	

	public function registrarRestaurante()
	{

		
		$respuesta = ControladorRestaurante::ctrRegistrarRestaurante(
            $this->idrestaurante,
			$this->nombre
		
		);


		echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
	}



	public function eliminarRestaurante()
	{

		
		$respuesta = ControladorRestaurante::ctrEliminarRestaurante($this->idrestaurante);


		echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
	}

	
	public function actualizarRestaurante()
	{

		
		$respuesta = ControladorRestaurante::ctrActualizarRestaurante(
			$this->idrestaurante,
			$this->nombre
			
		);


		echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
	}
	public function seleccionSede($sede)
	{
		session_start();
		$_SESSION['idRestaurante'] = $sede;
	}
}



if (!isset($_POST["accion"])) {
	$respuesta = new ajaxRestaurante();
	$respuesta->MostrarRestaurante();
} else {

	

	if ($_POST["accion"] == "registrar") {

		
		$insertar = new ajaxRestaurante();

		
		$insertar->idrestaurante = $_POST["idrestaurante"];
		$insertar->nombre = $_POST["nombre"];
		




		$insertar->registrarRestaurante();
	}


	if ($_POST["accion"] == "eliminar") {
		$eliminar = new ajaxRestaurante();


		$eliminar->idrestaurante = $_POST["idrestaurante"];


		$eliminar->eliminarRestaurante();
	}

	if ($_POST["accion"] == "actualizar") {
		$actualizar = new ajaxRestaurante();
		
		$actualizar->idrestaurante = $_POST["idrestaurante"];
		$actualizar->nombre = $_POST["nombre"];
		
		$actualizar->actualizarRestaurante();
	}

	if ($_POST["accion"] == "cambiarRestaurante") {
		$actualizar = new ajaxRestaurante();
		
		$sede  = $_POST["idRestaurante"];
		
		$actualizar->seleccionSede($sede);
	}
}

