<?php

namespace App\Http\Controllers;

use App\Models\Reporte;
use App\Models\Seguimiento;
use Illuminate\Http\Request;

class ReporteBrigadistaController extends Controller
{
    public function index(){
        $listado_reportes = [];
        $listado_reportes['reportes'] = Reporte::with('seguimiento')->get();
        $listado_reportes['seguimientos_reporte'] = Seguimiento::where("estado", "!=", "Pendiente")->get();
        return view('brigadista.index')->with('reportes', $listado_reportes);
    }


    public function update(Request $request, $id){
        $reporte_estado = Reporte::find($id);
        $reporte_estado->setSeguimiento($request->input('estado'));
        $reporte_estado->save();
        return back();
    }
}
