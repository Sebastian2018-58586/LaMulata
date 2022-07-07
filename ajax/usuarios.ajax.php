<?php

require_once "../controladores/usuarios.controlador.php";
require_once "../modelos/usuarios.modelo.php";
// error_reporting(0);

class ajaxUsuarios
{


    // public $idrestaurante;
    public $idusuario;
    public $nombre;
    public $apellido;
    public $direccion;
    public $telefono;
    public $contrasena;
    public $idrol;






    public function MostrarUsuarios()
    {

        $respuesta = ControladorUsuarios::ctrMostrarUsuarios();

        echo json_encode($respuesta);
    }


    public function registrarUsuarios()
    {


        $respuesta = ControladorUsuarios::ctrRegistrarUsuarios(
            // $this->idrestaurante,
            $this->idusuario,
            $this->nombre,
            $this->apellido,
            $this->direccion,
            $this->telefono,
            $this->contrasena,
            $this->idrol
        );


        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
    }



    public function eliminarUsuarios()
    {


        $respuesta = ControladorUsuarios::ctrEliminarUsuarios($this->idusuario);


        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
    }



    public function actualizarUsuarios()
    {


        $respuesta = ControladorUsuarios::ctrActualizarUsuarios(
            // $this->idrestaurante,
            $this->idusuario,
            $this->nombre,
            $this->apellido,
            $this->direccion,
            $this->telefono,
            $this->contrasena,
            $this->idrol
        );


        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
    }
}



if (!isset($_POST["accion"])) {
    $respuesta = new ajaxUsuarios();
    $respuesta->MostrarUsuarios();
} else {


    if ($_POST["accion"]== "registrar") {

        $insertar = new ajaxUsuarios();
        // $insertar->idrestaurante = $_POST["idrestaurante"];
        $insertar->idusuario = $_POST["idusuario"];
        $insertar->nombre = $_POST["nombre"];
        $insertar->apellido = $_POST["apellido"];
        $insertar->direccion = $_POST["direccion"];
        $insertar->telefono = $_POST["telefono"];
        $insertar->contrasena = $_POST["contrasena"];
        $insertar->idrol = $_POST["idrol"];


        

        $insertar->registrarUsuarios();
    }


    if ($_POST["accion"] == "eliminar") {
        $eliminar = new ajaxUsuarios();

        $eliminar->idusuario = $_POST["idusuario"];

        $eliminar->eliminarUsuarios();
    }

    if ($_POST["accion"] == "actualizar") {
        $actualizar = new ajaxUsuarios();


        // $actualizar->idrestaurante = $_POST["idrestaurante"];
        $actualizar->idusuario = $_POST["idusuario"];
        $actualizar->nombre = $_POST["nombre"];
        $actualizar->apellido = $_POST["apellido"];
        $actualizar->direccion = $_POST["direccion"];
        $actualizar->telefono = $_POST["telefono"];
        $actualizar->contrasena = $_POST["contrasena"];
        $actualizar->idrol = $_POST["idrol"];

        $actualizar->actualizarUsuarios();
    }
}