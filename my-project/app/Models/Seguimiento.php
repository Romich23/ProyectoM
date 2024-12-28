<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seguimiento extends Model
{
    public function getId(){
        return $this->attributes['id'];
    }

    public function setId($id){
        $this->attributes['id'] = $id;
    }

    public function getEstado(){
        return $this->attributes['estado'];
    }

    public function setEstado($estado){
        $this->attributes['estado'] = $estado;
    }

   
    //Relación uno a muchos (Para eso se usa hasMany).
    //La relación va de seguimiento a reportes junto con su inversa.
    //La inversa se encuentra en el modelo reporte que va de reporte a seguimiento.
    public function reportes(){
        return $this->hasMany(Reporte::class);
    }
}
