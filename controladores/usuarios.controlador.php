<?php

class ControladorUsuarios
{

    static public function ctrMostrarUsuarios()
    {

        $respuesta = ModeloUsuarios::mdlMostrarUsuarios();

        return $respuesta;
    }

    //  $idusuario,
    //  $nombre,
    //  $apellido,
    //  $direccion,
    //  $telefono,
    //  $correo,
    //  $contrasena


    static public function ctrRegistrarUsuarios(
        $idusuario,
        $nombre,
        $apellido,
        $direccion,
        $telefono,
        $contrasena,
        $idrol
    ) {
        $respuesta = ModeloUsuarios::mdlRegistrarUsuarios(
            $idusuario,
            $nombre,
            $apellido,
            $direccion,
            $telefono,
            $contrasena,
            $idrol
        );

        return $respuesta;
    }

    static public function ctrEliminarUsuarios($idusuario)
    {

        $respuesta = ModeloUsuarios::mdlEliminarUsuarios($idusuario);

        return $respuesta;
    }

    static public function ctrActualizarUsuarios(
        $idusuario,
        $nombre,
        $apellido,
        $direccion,
        $telefono,
        $contrasena,
        $idrol
    ) {

        $respuesta = ModeloUsuarios::mdlActualizarUsuarios(
            $idusuario,
            $nombre,
            $apellido,
            $direccion,
            $telefono,
            $contrasena,
            $idrol
        );

        return $respuesta;
    }
}
