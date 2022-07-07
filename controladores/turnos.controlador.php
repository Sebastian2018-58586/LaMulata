<?php

class ControladorTurnos
{

    static public function ctrMostrarTurnos()
    {

        $respuesta = ModeloTurnos::mdlMostrarTurnos();

        return $respuesta;
    }




    static public function ctrRegistrarTurnos(
        $idrestaurante,
        $idturno,
        $fecha,
        $horaentrada,
        $horasalida,
        $idempleado
        
    ) {
        $respuesta = ModeloTurnos::mdlRegistrarTurnos(
            $idrestaurante,
            $idturno,
            $fecha,
            $horaentrada,
            $horasalida,
            $idempleado

        );

        return $respuesta;
    }

    static public function ctrEliminarTurnos($idproducto)
    {

        $respuesta = ModeloTurnos::mdlEliminarTurnos($idproducto);

        return $respuesta;
    }

    static public function ctrActualizarTurnos(
        $idrestaurante,
        $idturno,
        $fecha,
        $horaentrada,
        $horasalida,
        $idempleado

    ) {

        $respuesta = ModeloTurnos::mdlActualizarTurnos(
            $idrestaurante,
            $idturno,
            $fecha,
            $horaentrada,
            $horasalida,
            $idempleado
        );

        return $respuesta;
    }
}
