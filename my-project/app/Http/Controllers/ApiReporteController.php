<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reporte;


class ApiReporteController extends Controller
{
    /**
     * Muestra una lista de todos los recursos(Reporte) disponibles.
     */
    public function index()
    {
        //Obtine todos los reportes de la base de datos y los devuelve con  JSON  con codigo de estado 200
        $reportes = Reporte::all();
        return response()->json($reportes, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $reporte = new Reporte();

        $reporte->setName($request->Nombre);
        $reporte->setDescription($request->Descripción);
        $reporte->setFecha($request->Fecha);
        $reporte->setNivelRiesgo($request->NivelRiesgo);
        $reporte->setImage("game.png");
        $reporte->save();
        return response()->json("Reporte registrado", 200);
    }

    /**
     * Display the specified resource.
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
        // con el id se encuentra el registro en la tabla para actualizarlo
        $reporte= Reporte::findOrFail($id);

        $reporte->setName($request->Nombre);
        $reporte->setDescription($request->Descripción);
        $reporte->setFecha($request->Fecha);
        $reporte->setNivelRiesgo($request->NivelRiesgo);
        $reporte->setImage("game.png");
        $reporte->save();
        return response()->json("Reporte actualizado", 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //Se busca el registro con el id que llegó y usando el método estático destroy
        //que pertene al modelo Product borramos el registro
        //Busca y elimina el reporte con el ID espeficado
        Reporte::destroy($id);
        return response()->json("Reporte eliminado", 200);
    }
}
