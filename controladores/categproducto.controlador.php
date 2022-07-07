<?php

class ControladorCategproducto
{

    static public function ctrMostrarCategproducto()
    {

        $respuesta = ModeloCategproducto::mdlMostrarCategproducto();

        return $respuesta;
    }

    static public function ctrRegistrarCategproducto(
        $idrestaurante,
        $idcategoriap,
        $nombre
    ) {
        $respuesta = ModeloCategproducto::mdlRegistrarCategproducto(
            $idrestaurante,
            $idcategoriap,
            $nombre
        );

        return $respuesta;
    }

    static public function ctrEliminarCategproducto($idproducto)
    {

        $respuesta = ModeloCategproducto::mdlEliminarCategproducto($idproducto);

        return $respuesta;
    }

    static public function ctrActualizarCategproducto(
        $idrestaurante,
        $idcategoriap,
        $nombre
    ) {

        $respuesta = ModeloCategproducto::mdlActualizarCategproducto(
            $idrestaurante,
            $idcategoriap,
            $nombre
        );

        return $respuesta;
    }
}
