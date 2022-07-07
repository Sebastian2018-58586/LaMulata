<?php

require_once "../controladores/turnos.controlador.php";
require_once "../modelos/turnos.modelo.php";
// error_reporting(0);

class ajaxTurnos
{


    public $idrestaurante;
    public $idturno;
    public $fecha;
    public $horaentrada;
    public $horasalida;
    public $idempleado;
    // public $correo;
    // public $contrasena;
    // public $pass_cifrado;





    public function MostrarTurnos()
    {

        $respuesta = ControladorTurnos::ctrMostrarTurnos();

        echo json_encode($respuesta);
    }


    public function registrarTurnos()
    {


        $respuesta = ControladorTurnos::ctrRegistrarTurnos(
            $this->idrestaurante,
            $this->idturno,
            $this->fecha,
            $this->horaentrada,
            $this->horasalida,
            $this->idempleado
            
        );


        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
    }



    public function eliminarTurnos()
    {


        $respuesta = ControladorTurnos::ctrEliminarTurnos($this->idturno);


        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
    }



    public function actualizarTurnos()
    {


        $respuesta = ControladorTurnos::ctrActualizarTurnos(
            $this->idrestaurante,
            $this->idturno,
            $this->fecha,
            $this->horaentrada,
            $this->horasalida,
            $this->idempleado,
 
        );


        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
    }
}



if (!isset($_POST["accion"])) {
    $respuesta = new ajaxTurnos();
    $respuesta->MostrarTurnos();
} else {


    if ($_POST["accion"] == "registrar") {

      
        $insertar = new ajaxTurnos();
        $insertar->idrestaurante = $_POST["idrestaurante"];
        $insertar->idturno = $_POST["idturno"];
        $insertar->fecha = $_POST["fecha"];
        $insertar->horaentrada = $_POST["horaentrada"];
        $insertar->horasalida = $_POST["horasalida"];
        $insertar->idempleado = $_POST["idempleado"];
        // $insertar->correo = $_POST["correo"];
        // $insertar->contrasena  = $_POST["contrasena"];
        // $insertar->contrasena1  = $_POST["contrasena1"];

        // $passHash = password_hash($insertar->contrasena , PASSWORD_BCRYPT);
        // $insertar = password_hash($insertar->contrasena , PASSWORD_BCRYPT);
        // password_verify( $insertar->contrasena,$passHash);


        // if ($insertar->contrasena1 = $insertar->contrasena) {
        //     $insertar->registrarTurnos();
        //    }else {
        //     echo "verifique ";
        //    }


         $insertar->registrarTurnos();
    }


    if ($_POST["accion"] == "eliminar") {
        $eliminar = new ajaxTurnos();

        $eliminar->idturno = $_POST["idturno"];

        $eliminar->eliminarTurnos();
    }

    if ($_POST["accion"] == "actualizar") {
        $actualizar = new ajaxTurnos();


        $actualizar->idrestaurante = $_POST["idrestaurante"];
        $actualizar->idturno = $_POST["idturno"];
        $actualizar->fecha = $_POST["fecha"];
        $actualizar->horaentrada = $_POST["horaentrada"];
        $actualizar->horasalida = $_POST["horasalida"];
        $actualizar->idempleado = $_POST["idempleado"];
        // $actualizar->correo = $_POST["correo"];
        // $actualizar->contrasena = $_POST["contrasena"];

        $actualizar->actualizarTurnos();
    }
}
