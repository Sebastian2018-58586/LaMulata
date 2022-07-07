<?php
require_once "../controladores/categproducto.controlador.php";
require_once "../modelos/categproducto.modelo.php";
// error_reporting(0);

class ajaxCategproducto
{
	public $idrestaurante;
	public $idcategoriap;
	public $nombre;





	public function MostrarCategproducto()
	{

		$respuesta = ControladorCategproducto::ctrMostrarCategproducto();

		echo json_encode($respuesta);
	}

	

	public function registrarCategproducto()
	{

		
		$respuesta = ControladorCategproducto::ctrRegistrarCategproducto(
            $this->idrestaurante,
			$this->idcategoriap,
			$this->nombre
		
		);


		echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
	}



	public function eliminarCategproducto()
	{

		
		$respuesta = ControladorCategproducto::ctrEliminarCategproducto($this->idcategoriap);


		echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
	}

	
	public function actualizarCategproducto()
	{

		
		$respuesta = ControladorCategproducto::ctrActualizarCategproducto(
			$this->idrestaurante,
			$this->idcategoriap,
			$this->nombre
			
		);


		echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
	}
}



if (!isset($_POST["accion"])) {
	$respuesta = new ajaxCategproducto();
	$respuesta->MostrarCategproducto();
} else {


	if ($_POST["accion"] == "registrar") {

		
		$insertar = new ajaxCategproducto();

		
		$insertar->idrestaurante = $_POST["idrestaurante"];
		$insertar->idcategoriap = $_POST["idcategoriap"];
		$insertar->nombre = $_POST["nombre"];
		




		$insertar->registrarCategproducto();
	}


	if ($_POST["accion"] == "eliminar") {
		$eliminar = new ajaxCategproducto();

		


		$eliminar->idcategoriap = $_POST["idcategoriap"];



		$eliminar->eliminarCategproducto();
	}

	if ($_POST["accion"] == "actualizar") {
		$actualizar = new ajaxCategproducto();
		

		$actualizar->idrestaurante = $_POST["idrestaurante"];
		$actualizar->idcategoriap = $_POST["idcategoriap"];
		$actualizar->nombre = $_POST["nombre"];
		

		
		$actualizar->actualizarCategproducto();
	}
}

