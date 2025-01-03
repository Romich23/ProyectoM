<?php

namespace App\Http\Controllers;

use App\Models\Reporte;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\Storage;


//controlador para la gestion de reportes de emergencia

class ReporteController extends Controller
{
    /**
     * Muestra una lista de todos los recursos disponibles
     */
    public function index()
    {
        //obtiene todos los reportes desde la base de datos
        $reportes = [];
        $reportes['reportes'] = Reporte::all();
        //Retorna la vista con los datos de los recursos
        return view('home.index')->with('reportes', $reportes);
    }

    /**
     * Muestra el formulario parar crear un nuevo reporte
     */
    public function create()
    {
        //Prepara la lista de reportes
        $reportes = [];
        //Se recuperan los rgistros junto con la relación, para eso sirve with('seguimiento').
        $reportes['reportes'] = Reporte::with('seguimiento')->get();
        return view("reportes.create")->with('reportes', $reportes);
    }

    /**
     * //almacena un nuevo recurso en la base de datos
     */
    public function store(Request $request)
    {
        //Se crea un nuevo objeto del modelo reporte
        $reporte = new Reporte();

        $reporte->setName($request->input('nombre'));
        $reporte->setDescription($request->input('descripcion'));
        $reporte->setFecha($request->input('fecha'));
        $reporte->setNivelRiesgo($request->input('nivel-riesgo'));
        $reporte->setImage("game.png");
        $reporte->save();

        // si se abjunta una imagen se guarda en el almacenamiento publico
        //Fuente:El Libro
        if ($request->hasFile('imagen')) {
            $imageName = $reporte->getId().".".$request->file('imagen')->extension();
            Storage::disk('public')->put(
            $imageName,
            file_get_contents($request->file('imagen')->getRealPath())
            );
            $reporte->setImage($imageName);
            $reporte->save();
        }
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Reporte $reporte)
    {
        //
    }

    /**
     * Formulario para editar un recurso especifico
     */
    public function edit($id)
    {
        $reporte = [];
        $reporte['reporte'] = Reporte::findOrFail($id);
        return view('reportes.edit')->with('reporte',$reporte);
    }

    /**
     * //Actualiza un recurso existente de la base de datos
     */
    public function update(Request $request, $id)
    {
        $reporte = Reporte::findOrFail($id);
        $reporte->setName($request->input('nombre'));
        $reporte->setDescription($request->input('descripcion'));
        $reporte->setFecha($request->input('fecha'));
        $reporte->setNivelRiesgo($request->input('nivel-riesgo'));
        $reporte->setImage("game.png");
        $reporte->save();
        if ($request->hasFile('imagen')) {
            $imageName = $reporte->getId().".".$request->file('imagen')->extension();
            Storage::disk('public')->put(
            $imageName,
            file_get_contents($request->file('imagen')->getRealPath())
            );
            $reporte->setImage($imageName);
            $reporte->save();
        }
        return redirect()->route('reportes.create');
    }

    /**
     * //Elimina un recurso especifico de la base de datos
     */
    public function destroy($id)
    {
        //Se busca el registro con el id que llegó y usando el método estático destroy
        //que pertene al modelo Product borramos el registro
        //Busca y elimina el reporte con el ID espeficado
        Reporte::destroy($id);
        //regresa a la misma pagina
        return back();
    }
}
