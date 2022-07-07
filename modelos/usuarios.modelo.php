<?php

require_once "conexion.php";


//  idusuario,
//  nombre,
//  apellido,
//  direccion,
//  telefono,
//  correo,
//  contrasena

class ModeloUsuarios
{

    static public function mdlMostrarUsuarios()
    {

        $stmt = Conexion::conectar()->prepare("SELECT 
        idusuario,
        nombre,
        apellido,
        direccion,
        telefono,
        -- correo,
        contrasena, idrol FROM usuarios WHERE `idusuario` != 1234567890");



        $stmt->execute();

        return $stmt->fetchAll();

        $stmt = null;
    }


    static public function mdlRegistrarUsuarios(
        $idusuario,
        $nombre,
        $apellido,
        $direccion,
        $telefono,
        $contrasena,
        $idrol
    ) {

        $stmt = Conexion::conectar()->prepare("INSERT INTO usuarios(idusuario,
        nombre,
        apellido,
        direccion,
        telefono,
        contrasena,idrol) VALUES (:idusuario,:nombre,:apellido,:direccion,:telefono,:contrasena,:idrol)");

        // $password =$_POST['contrasena'];
  
        // $stmt->bindParam(":idrestaurante", $idrestaurante, PDO::PARAM_INT);
        $stmt->bindParam(":idusuario", $idusuario, PDO::PARAM_INT);
        $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
        $stmt->bindParam(":apellido", $apellido, PDO::PARAM_STR);
        $stmt->bindParam(":direccion", $direccion, PDO::PARAM_STR);
        $stmt->bindParam(":telefono", $telefono, PDO::PARAM_INT);
        $stmt->bindParam(":contrasena", $contrasena, PDO::PARAM_STR);
        $stmt->bindParam(":idrol", $idrol, PDO::PARAM_INT);



        if ($stmt->execute()) {
            return "El usuario se registró correctamente";
        } else {
            return "Error, no se pudo registrar el usuario";
        }
        $stmt = null;
    }

    static public function mdlEliminarUsuarios($idusuario)
    {

        $stmt = Conexion::conectar()->prepare("DELETE FROM usuarios WHERE idusuario= :idusuario");

        $stmt->bindParam(":idusuario", $idusuario, PDO::PARAM_INT);


        if ($stmt->execute()) {
            return "El usuario se eliminó correctamente";
        } else {
            return "Error, no se pudo eliminar el usuario";
        }

        $stmt = null;
    }



    static public function mdlActualizarUsuarios(
        $idusuario,
        $nombre,
        $apellido,
        $direccion,
        $telefono,
        $contrasena,
        $idrol) {


        $stmt = Conexion::conectar()->prepare("UPDATE usuarios
		                                     SET nombre = :nombre, 
                                             apellido = :apellido,
                                             direccion =:direccion,
                                             telefono = :telefono,
                                            --  correo = :correo,
                                             contrasena =:contrasena,
                                             idrol:idrol


		                                     WHERE idusuario = :idusuario");



        $stmt->bindParam(":idusuario", $idusuario, PDO::PARAM_INT);
        $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
        $stmt->bindParam(":apellido", $apellido, PDO::PARAM_STR);
        $stmt->bindParam(":direccion", $direccion, PDO::PARAM_STR);
        $stmt->bindParam(":telefono", $telefono, PDO::PARAM_INT);
        $stmt->bindParam(":contrasena", $contrasena, PDO::PARAM_STR);
        $stmt->bindParam(":idrol", $idrol, PDO::PARAM_INT);



        if ($stmt->execute()) {
            return "El usuario se actulizo correctamente";
        } else {
            return "Error, no se pudo actualizar el usuario";
        }





        // if ($stmt->execute()) {
        //     return "El usuario se actualizó correctamente";
        //     if ($stmt->execute()) {
        //         return "El usuario se actualizó correctamente";
        //     } else {
        //         "Error, no se pudo actualizar el usuario";
        //     }
        // }

        $stmt = null;
    }
}
