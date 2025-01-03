<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seguimiento;

class ApiSeguimientoController extends Controller
{
    /**
     * Muestra una lista de todos los seguimientos disponibles.
     */
    public function index()
    {
        return response()->json(Seguimiento::all(), 200);
    }

    /**
     * Almacena un nuevo seguimiento en la base de datos.
     */
    public function store(Request $request)
    {
        // Crea una nueva instancia del modelo Seguimiento.
        $seguimiento = new Seguimiento();
        // Asigna el estado enviado en la solicitud al nuevo seguimiento.
        $seguimiento->setEstado($request->estado);
        // Guarda el seguimiento en la base de datos.
        $seguimiento->save();
        // Retorna una respuesta JSON confirmando el guardado exitoso.
        return response()->json("Seguimiento guardado", 200);
    }

    /**
     * Muestra un seguimiento específico. (Método aún no implementado)
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $seguimiento = Seguimiento::find($id);
        $seguimiento->setEstado($request->estado);
        $seguimiento->save();
        return response()->json("Seguimiento actualizado", 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Seguimiento::destroy($id);
        return response()->json("Seguimiento eliminado", 200);
    }
}
