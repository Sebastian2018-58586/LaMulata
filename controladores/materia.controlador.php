<?php

class ControladorMateria
{

    static public function ctrMostrarMateria()
    {

        $respuesta = ModeloMateria::mdlMostrarMateria();

        return $respuesta;
    }




    static public function ctrRegistrarMateria(
        $idrestaurante,
        $idmateriaprima,
        $idcategoriam,
	    $nombre,
	    $cantidad,
	    $descripcion
    ) {
        $respuesta = ModeloMateria::mdlRegistrarMateria(
            $idrestaurante,
            $idmateriaprima,
	        $idcategoriam,
	        $nombre,
	        $cantidad,
	        $descripcion
        );

        return $respuesta;
    }

    static public function ctrEliminarMateria($idmateriaprima)
    {

        $respuesta = ModeloMateria::mdlEliminarMateria($idmateriaprima);

        return $respuesta;
    }

    static public function ctrActualizarMateria(
       $idrestaurante,
       $idmateriaprima,
       $idcategoriam,
       $nombre,
       $cantidad,
       $descripcion
    ) {

        $respuesta = ModeloMateria::mdlActualizarMateria(
           $idrestaurante,
           $idmateriaprima,
           $idcategoriam,
           $nombre,
           $cantidad,
           $descripcion
        );

        return $respuesta;
    }
}
