<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Proyecto;
use App\Models\Actividade;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tipo = "INGRESO";
        //obtener la fecha
        $fecha = Carbon::now();
        $year = $fecha->year;
        $proyectos = Proyecto::whereYear('created_at', $year)->orderBy('costo', 'DESC')->get();
        //Obtener el total de proyectos
        $total_proyectos = count($proyectos);

        //Obtener la suma del estimado de ingresos en el year
        $proyectos_ingresos = Proyecto::where('tipo','INGRESO')->whereYear('created_at', $year)->get();
        $ingreso_estimado = $proyectos_ingresos->sum('costo');
        
        
        //Obtener lo que ha ingreso por concepto de actividades
        $actividades_ingresos = Actividade::query()
        ->where('id', '>', 0)
        ->WhereHas('proyecto', function($q){
            $tipo = "INGRESO";
            $fecha = Carbon::now();
            $year = $fecha->year;
         $q->where('tipo', 'like', '%'. $tipo . '%')
         ->whereYear('created_at', $year);
         })->get();

         $ingreso_actual_estimado = $actividades_ingresos->sum('costo');


        //Obtener el total de egresos en el year por conceptos de actividades
        $actividades_egresos = Actividade::query()
        ->where('id', '>', 0)
        ->WhereHas('proyecto', function($q){
            $tipo = "EGRESO";
            $fecha = Carbon::now();
            $year = $fecha->year;
         $q->where('tipo', 'like', '%'. $tipo . '%')
         ->whereYear('created_at', $year);
         })->get();

         $egreso_actual_estimado = $actividades_egresos->sum('costo');


        //Obtener la suma del estimado de egresos en el year
        $proyectos_egresos = Proyecto::where('tipo','EGRESO')->whereYear('created_at', $year)->get();
        $egreso_estimado = $proyectos_egresos->sum('costo');

        //Actividades realizadas en el year
        $actividades = Actividade::query()
        ->where('id', '>', 0)->orderBy('costo', 'DESC')
        ->WhereHas('proyecto', function($q){
            $fecha = Carbon::now();
            $year = $fecha->year;
         $q->whereYear('created_at', $year);
         })->get();


        return view('home', compact('actividades','total_proyectos' , 'ingreso_estimado', 'egreso_estimado', 'ingreso_actual_estimado', 'egreso_actual_estimado', 'proyectos'));
    }


}
