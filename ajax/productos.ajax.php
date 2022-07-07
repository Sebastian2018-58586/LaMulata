<?php

require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";
// error_reporting(0);

class ajaxProductos
{
	public $idrestaurante;
	public $idproducto;
	public $nombre;
	public $idcategoriap;
	public $precio;
	public $imagen;



	// public $id;
	// public $categoria;
	// public $ruta;
	// public $estado;
	// public $fecha;
	// public $Id;
	// public $nombre;
	// public $nombreproducto;
	// public $producto;

	public function MostrarProductos()
	{

		$respuesta = ControladorProductos::ctrMostrarProductos();

		echo json_encode($respuesta);
	}

	// public function registrarCategorias(){

	// 	$respuesta = ControladorCategorias::ctrRegistrarCategorias($this->categoria, $this->ruta, $this->estado, $this->fecha);

	// 	echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
	// }

	public function registrarProductos()
	{

		// $respuesta = ControladorProductos::ctrRegistrarProductos($this->Id, $this->nombre);
		$respuesta = ControladorProductos::ctrRegistrarProductos(


			$this->idrestaurante,
		    $this->idproducto,
			$this->nombre,
			$this->idcategoriap,
			$this->precio,
			$this->imagen
		);


		echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
	}



	public function eliminarCategoria()
	{

		// $respuesta = ControladorProductos::ctrEliminarCategoria($this->Id);
		$respuesta = ControladorProductos::ctrEliminarCategoria($this->idproducto);


		echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
	}

	// public function actualizarCategoria()
	// {

	// 	$respuesta = ControladorCategorias::ctrActualizarCategoria($this->id, $this->producto, $this->nombreproducto, $this->estado, $this->fecha);

	// 	echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
	// }

	public function actualizarCategoria()
	{

		// $respuesta = ControladorProductos::ctrActualizarCategoria($this->Id, $this->nombre);
		$respuesta = ControladorProductos::ctrActualizarCategoria(
			$this->idrestaurante,
			$this->idproducto,
			$this->nombre,
			$this->idcategoriap,
			$this->precio,
			$this->imagen
		);


		echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
	}
}

// if(!isset($_POST["accion"])){
// 	$respuesta = new ajaxCategorias();
// 	$respuesta -> MostrarCategorias();
// }else{

// 	if($_POST["accion"] == "registrar"){
// 		$insertar = new ajaxCategorias();
// 		$insertar->categoria = $_POST["categoria"];
// 		$insertar->ruta = $_POST["ruta"];
// 		$insertar->estado = $_POST["estado"];
// 		$insertar->fecha = $_POST["fecha"];
// 		$insertar->registrarCategorias();
// 	}

// 	if($_POST["accion"] == "eliminar"){
// 		$eliminar = new ajaxCategorias();

// 		$eliminar->id = $_POST["id"];

// 		$eliminar->eliminarCategoria();
// 	}

// 	if($_POST["accion"] == "actualizar"){
// 		$actualizar = new ajaxCategorias();

// 		$actualizar->id = $_POST["id"];
// 		$actualizar->categoria = $_POST["categoria"];
// 		$actualizar->ruta = $_POST["ruta"];
// 		$actualizar->estado = $_POST["estado"];
// 		$actualizar->fecha = $_POST["fecha"];

// 		$actualizar->actualizarCategoria();
// 	}

// }


if (!isset($_POST["accion"])) {
	$respuesta = new ajaxProductos();
	$respuesta->MostrarProductos();
} else {

	// if (isset($apellido)) {

	// 	echo '<p>nombre :'.$apellido.'</p>';
	// 	}

	if ($_POST["accion"] == "registrar") {

		// if (isset($_POST["apellido"])) {
		// 	$insertar->apellido = $_POST["apellido"];
		// }
		$insertar = new ajaxProductos();

		// if (isset($_POST["apellido"])) {

		$insertar->idrestaurante = $_POST["idrestaurante"];
		$insertar->idproducto = $_POST["idproducto"];
		$insertar->nombre = $_POST["nombre"];
		$insertar->idcategoriap = $_POST["idcategoriap"];
		$insertar->precio = $_POST["precio"];
		$insertar->imagen = $_POST["imagen"];




		// $insertar->estado = $_POST["estado"];
		// $insertar->fecha = $_POST["fecha"];
		$insertar->registrarProductos();
	}


	if ($_POST["accion"] == "eliminar") {
		$eliminar = new ajaxProductos();

		// $eliminar->Id = $_POST["Id"];


		$eliminar->idproducto = $_POST["idproducto"];



		$eliminar->eliminarCategoria();
	}

	if ($_POST["accion"] == "actualizar") {
		$actualizar = new ajaxProductos();
		// $actualizar->Id = $_POST["Id"];
		// $actualizar->nombre = $_POST["nombre"];


		$actualizar->idrestaurante = $_POST["idrestaurante"];
		$actualizar->idproducto = $_POST["idproducto"];
		$actualizar->nombre = $_POST["nombre"];
		$actualizar->idcategoriap = $_POST["idcategoriap"];
		$actualizar->precio = $_POST["precio"];
		$actualizar->imagen = $_POST["imagen"];


		// $actualizar->nombreproducto = $_POST["nombreproducto"];
		// $actualizar->estado = $_POST["estado"];
		// $actualizar->fecha = $_POST["fecha"];

		$actualizar->actualizarCategoria();
	}
}


// if (!isset($_POST["categorias"])) {
// 	$respuesta = new ajaxCategorias();
// 	$respuesta->MostrarCategorias();
// } else {

// 	// if ($_POST["accion"] == "registrar") {
// 		$insertar = new ajaxCategorias();
// 		$insertar->Id = $_POST["Id"];
// 		$insertar->nombre = $_POST["nombre"];
// 		// $insertar->estado = $_POST["estado"];
// 		// $insertar->fecha = $_POST["fecha"];
// 		$insertar->registrarCategorias();
// 	// }
// }