<?php

require_once "../controladores/empleados.controlador.php";
require_once "../modelos/empleados.modelo.php";
// error_reporting(0);

class ajaxEmpleados
{


    // public $idrestaurante;
    public $idempleado;
    public $nombre;
    public $apellido;
    // public $correo;
    public $telefono;
    public $direccion;
    // public $idrol;
    public $cargo;

   




    public function MostrarEmpleados()
    {

        $respuesta = ControladorEmpleados::ctrMostrarEmpleados();

        echo json_encode($respuesta);
    }


    public function registrarEmpleados()
    {


        $respuesta = ControladorEmpleados::ctrRegistrarEmpleados(
            // $this->idrestaurante,
            $this->idempleado,
            $this->nombre,
            $this->apellido,
            // $this->correo,
            $this->telefono,
            $this->direccion,
            $this->cargo
        );


        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
    }



    public function eliminarEmpleados()
    {


        $respuesta = ControladorEmpleados::ctrEliminarEmpleados($this->idempleado);


        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
    }



    public function actualizarEmpleados()
    {


        $respuesta = ControladorEmpleados::ctrActualizarEmpleados(
            // $this->idrestaurante,
            $this->idempleado,
            $this->nombre,
            $this->apellido,
            // $this->correo,
            $this->telefono,
            $this->direccion,
            $this->cargo
          
        );


        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
    }
}



if (!isset($_POST["accion"])) {
    $respuesta = new ajaxEmpleados();
    $respuesta->MostrarEmpleados();
} else {


    if ($_POST["accion"] == "registrar") {

        $insertar = new ajaxEmpleados();
        // $insertar->idrestaurante = $_POST["idrestaurante"];
        $insertar->idempleado = $_POST["idempleado"];
        $insertar->nombre = $_POST["nombre"];
        $insertar->apellido = $_POST["apellido"];
        // $insertar->correo = $_POST["correo"];
        $insertar->telefono = $_POST["telefono"];
        $insertar->direccion = $_POST["direccion"];
        $insertar->cargo = $_POST["cargo"];



        $insertar->registrarEmpleados();
    }


    if ($_POST["accion"] == "eliminar") {
        $eliminar = new ajaxEmpleados();

        $eliminar->idempleado = $_POST["idempleado"];

        $eliminar->eliminarEmpleados();
    }

    if ($_POST["accion"] == "actualizar") {
        $actualizar = new ajaxEmpleados();


        // $actualizar->idrestaurante = $_POST["idrestaurante"];
        $actualizar->idempleado = $_POST["idempleado"];
        $actualizar->nombre = $_POST["nombre"];
        $actualizar->apellido = $_POST["apellido"];
        // $actualizar->correo = $_POST["correo"];
        $actualizar->telefono = $_POST["telefono"];
        $actualizar->direccion = $_POST["direccion"];
        $actualizar->cargo = $_POST["cargo"];

        $actualizar->actualizarEmpleados();
    }
}
