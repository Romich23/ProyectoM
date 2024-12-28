<?php

namespace App\Http\Controllers;

use App\Models\Seguimiento;
use Illuminate\Http\Request;

class SeguimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $seguimientos = [];
        $seguimientos['seguimientos'] = Seguimiento::all();
        return view('seguimientos.create')->with('seguimientos', $seguimientos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $seguimiento = new Seguimiento();
        $seguimiento->setEstado($request->input('estado'));
        $seguimiento->save();
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Seguimiento $seguimiento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $seguimiento = [];
        $seguimiento['seguimiento'] = Seguimiento::find($id);
        return view('seguimientos.edit')->with('seguimiento', $seguimiento);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $seguimiento = Seguimiento::find($id);
        $seguimiento->setEstado($request->input('estado'));
        $seguimiento->save();
        return redirect()->route('seguimientos.create');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Seguimiento::destroy($id);
        return back();
    }
}
