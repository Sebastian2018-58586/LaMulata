<?php

class ControladorRestaurante
{

    static public function ctrMostrarRestaurante()
    {

        $respuesta = ModeloRestaurante::mdlMostrarRestaurante();

        return $respuesta;
    }

    static public function ctrRegistrarRestaurante(
        $idrestaurante,
        $nombre
    ) {
        $respuesta = ModeloRestaurante::mdlRegistrarRestaurante(
            $idrestaurante,
            $nombre
        );

        return $respuesta;
    }

    static public function ctrEliminarRestaurante($idrestaurante)
    {

        $respuesta = ModeloRestaurante::mdlEliminarRestaurante($idrestaurante);

        return $respuesta;
    }

    static public function ctrActualizarRestaurante(
        $idrestaurante,
        $nombre
    ) {

        $respuesta = ModeloRestaurante::mdlActualizarRestaurante(
            $idrestaurante,
            $nombre
        );

        return $respuesta;
    }
}
