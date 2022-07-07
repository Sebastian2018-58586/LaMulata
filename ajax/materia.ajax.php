<?php

require_once "../controladores/materia.controlador.php";
require_once "../modelos/materia.modelo.php";
// error_reporting(0);

class ajaxMateria
{


    public $idrestaurante;
	public $idmateriaprima;
	public $idcategoriam;
	public $nombre;
	public $cantidad;
	public $descripcion;

    // public $cantidad;
	// public $descripcion;

    public function MostrarMateria()
    {

        $respuesta = ControladorMateria::ctrMostrarMateria();

        echo json_encode($respuesta);
    }


    public function registrarMateria()
    {


        $respuesta = ControladorMateria::ctrRegistrarMateria(
            $this->idrestaurante,
			$this->idmateriaprima,
			$this->idcategoriam,
			$this->nombre,
			$this->cantidad,
			$this->descripcion
        );


        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
    }



    public function eliminarMateria()
    {


        $respuesta = ControladorMateria::ctrEliminarMateria($this->idmateriaprima);


        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
    }



    public function actualizarMateria()
    {


        $respuesta = ControladorMateria::ctrActualizarMateria(
            $this->idrestaurante,
            $this->idmateriaprima,
			$this->idcategoriam,
			$this->nombre,
			$this->cantidad,
			$this->descripcion
        );


        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
    }
}



if (!isset($_POST["accion"])) {
    $respuesta = new ajaxMateria();
    $respuesta->MostrarMateria();
} else {


    if ($_POST["accion"] == "registrar") {


        $insertar = new ajaxMateria();
        $insertar->idrestaurante = $_POST["idrestaurante"];
		$insertar->idmateriaprima = $_POST["idmateriaprima"];
		$insertar->idcategoriam = $_POST["idcategoriam"];
		$insertar->nombre = $_POST["nombre"];
		// $insertar->imagen = $_POST["imagen"];
		$insertar->cantidad = $_POST["cantidad"];
        $insertar->descripcion = $_POST["descripcion"];

		// $insertar->descripcioncaducidad = $_POST["descripcioncaducidad"];



        $insertar->registrarMateria();
    }


    if ($_POST["accion"] == "eliminar") {
        $eliminar = new ajaxMateria();

        $eliminar->idmateriaprima = $_POST["idmateriaprima"];

        $eliminar->eliminarMateria();
    }

    if ($_POST["accion"] == "actualizar") {
        $actualizar = new ajaxMateria();



        $actualizar->idrestaurante = $_POST["idrestaurante"];
		$actualizar->idmateriaprima = $_POST["idmateriaprima"];
	    $actualizar->idcategoriam = $_POST["idcategoriam"];
		$actualizar->nombre = $_POST["nombre"];
		// $actualizar->imagen = $_POST["imagen"];
		$actualizar->cantidad = $_POST["cantidad"];
		$actualizar->descripcion= $_POST["descripcion"];

        // $actualizar->fechacaducidad = $_POST["fechacaducidad"];


        $actualizar->actualizarMateria();
    }
}
