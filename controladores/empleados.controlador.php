<?php

class ControladorEmpleados
{

    static public function ctrMostrarEmpleados()
    {

        $respuesta = ModeloEmpleados::mdlMostrarEmpleados();

        return $respuesta;
    }




    static public function ctrRegistrarEmpleados(
        $idempleado,
        $nombre,
        $apellido,
        $telefono,
        $direccion,
        $cargo
    ) {
        $respuesta = ModeloEmpleados::mdlRegistrarEmpleados(
            $idempleado,
            $nombre,
            $apellido,
            $telefono,
            $direccion,
            $cargo
        );

        return $respuesta;
    }

    static public function ctrEliminarEmpleados($idproducto)
    {

        $respuesta = ModeloEmpleados::mdlEliminarEmpleados($idproducto);

        return $respuesta;
    }

    static public function ctrActualizarEmpleados(
        $idempleado,
        $nombre,
        $apellido,
        $telefono,
        $direccion,
        $cargo
    ) {

        $respuesta = ModeloEmpleados::mdlActualizarEmpleados(
            $idempleado,
            $nombre,
            $apellido,
            $telefono,
            $direccion,
            $cargo
        );

        return $respuesta;
    }
}
