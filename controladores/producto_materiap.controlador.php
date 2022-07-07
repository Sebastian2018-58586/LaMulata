<?php

class ControladorProducto_materiap
{

    static public function ctrMostrarProducto_materiap()
    {

        $respuesta = ModeloProducto_materiap::mdlMostrarProducto_materiap();

        return $respuesta;
    }

    static public function ctrRegistrarProducto_materiap($idpromat = null,$idproducto,$idmateriaprima) {
        $respuesta = ModeloProducto_materiap::mdlRegistrarProducto_materiap($idpromat,
           $idproducto,
           $idmateriaprima
        );

        return $respuesta;
    }

    static public function ctrEliminarProducto_materiap($idpromat)
    {

        $respuesta = ModeloProducto_materiap::mdlEliminarProducto_materiap($idpromat);

        return $respuesta;
    }

    static public function ctrActualizarProducto_materiap(
        $idpromat,
        $idproducto,
        $idmateriaprima,
        $cantidad
    ) {

        $respuesta = ModeloProducto_materiap::mdlActualizarProducto_materiap(
            $idpromat,
            $idproducto,
            $idmateriaprima,
            $cantidad
        );

        return $respuesta;
    }

    static public function ctrGetProducto_materiap($idmateriaprima){
        $respuesta = ModeloProducto_materiap::mdlGetProducto_materiap(
            $idmateriaprima
        );

        return $respuesta;

    }
}
