<?php

namespace App\Http\Controllers;
use App\Models\Reporte;

use Illuminate\Http\Request;

//contralador para manejar las vistas relacionadas con la pagina principal 

class HomeController extends Controller
//Muestra la pagina de inicio con todos los reportes disponibles
{
    public function index(){
        $reportes = [];
        //Obtiene todos los reportes desde la base de datos
        $reportes['reportes'] = Reporte::all();
        //Retorna la vista  home.index con los reportes
        return view('home.index')->with('reportes', $reportes);
    }
}
