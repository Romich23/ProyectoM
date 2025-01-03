<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Seguimiento extends Model
{
    //Método para obtener el valor del atributo 'id'
    public function getId(){
        return $this->attributes['id'];
    }
    //Método para establecer el valor del atributo id
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
    //se puede probar la relación seguimientos a reportes en tinker: Seguimiento::find(2)->reportes;
    //Reporte hacia segumiento (nota)
    public function reportes(){
        return $this->hasMany(Reporte::class);
    }
}
