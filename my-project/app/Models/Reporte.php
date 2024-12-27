<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\HasOne;

use Illuminate\Database\Eloquent\Model;


class Reporte extends Model
{
    public function getId(){
        return $this->attributes['id'];
    }

    public function setId($id){
        $this->attributes['id'] = $id;
    }

    public function getName(){
        return $this->attributes['Nombre'];
    }

    public function setName($nombre){
        $this->attributes['Nombre'] = $nombre;
    }


    public function getDescription(){
        return $this->attributes['Descripción'];
    }

    public function setDescription($descripcion){
        $this->attributes['Descripción'] = $descripcion;
    }

    public function getFecha(){
        return $this->attributes['Fecha'];
    }

    public function setFecha($fecha){
        $this->attributes['Fecha'] = $fecha;
    }


    public function getNivelRiesgo(){
        return $this->attributes['NivelRiesgo'];
    }

    public function setNivelRiesgo($nivelriesgo){
        $this->attributes['NivelRiesgo'] = $nivelriesgo;
    }
    public function getImage()

    {

        return $this->attributes['imagen'];

    }

    public function setImage($imagen)

    {

        $this->attributes['imagen'] = $imagen;

    }

    /**
     * Relación uno a uno para obtener el seguimiento asociado con el reporte.
     */
    public function seguimiento(): HasOne
    {
        return $this->hasOne(Seguimiento::class);
    }

}
