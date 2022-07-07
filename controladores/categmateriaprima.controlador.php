<?php

class ControladorCategmateriaprima
{

    static public function ctrMostrarCategmateriaprima()
    {

        $respuesta = ModeloCategmateriaprima::mdlMostrarCategmateriaprima();

        return $respuesta;
    }

    static public function ctrRegistrarCategmateriaprima(
        $idrestaurante,
        $idcategoriam,
        $nombre
    ) {
        $respuesta = ModeloCategmateriaprima::mdlRegistrarCategmateriaprima(
            $idrestaurante,
            $idcategoriam,
            $nombre
        );

        return $respuesta;
    }

    static public function ctrEliminarCategmateriaprima($idproducto)
    {

        $respuesta = ModeloCategmateriaprima::mdlEliminarCategmateriaprima($idproducto);

        return $respuesta;
    }

    static public function ctrActualizarCategmateriaprima(
        $idrestaurante,
        $idcategoriam,
        $nombre
    ) {

        $respuesta = ModeloCategmateriaprima::mdlActualizarCategmateriaprima(
            $idrestaurante,
            $idcategoriam,
            $nombre
        );

        return $respuesta;
    }
}
