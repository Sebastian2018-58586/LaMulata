<?php

class PlantillaControlador{

    public function CargarPlantilla(){
        include "vistas/plantilla.php";
    }
    public function CargarPlantillaSede(){
        include "vistas/plantillaSede.php";
    }
    public function seleccionSede($sede){
        $_SESSION['idSede']= $sede;
    }

}