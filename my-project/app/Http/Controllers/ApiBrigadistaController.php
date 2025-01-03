<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reporte;

class ApiBrigadistaController extends Controller
{
    //Actualiza el estado de seguimiento de un reporte.
    public function update(Request $request, $id){
        //Busca el reporte en la base de datos usando el id proporcionado
        $reporte_estado = Reporte::find($id);
        // Actualiza el campo 'estado' del reporte con el valor recibido en la solicitud.
        $reporte_estado->setSeguimiento($request->estado);
         // Guarda los cambios realizados en la base de datos.
        $reporte_estado->save();
        // Retorna una respuesta JSON indicando que el estado se actualizó exitosamente.
        return response()->json("Estado Actualizado");
    }
}
