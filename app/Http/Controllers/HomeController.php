<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Proyecto;
use App\Models\Actividade;
use App\Models\Corporacione;
use App\Models\Responsable;
use Carbon\Carbon;
use PhpParser\Node\Stmt\Foreach_;

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
        //Obtener el listado de 8 corporaciones
        $corporaciones = Corporacione::paginate(8);

        //Obtener el listado de 8 responsables
        $responsables = Responsable::paginate(8);
        
        //Crear la fecha actual
        $fecha_reciente = Carbon::now();
        $tipo = "INGRESO";
        //obtener la fecha
        $fecha = Carbon::now();
        $year = $fecha->year;
        $proyectos = Proyecto::whereYear('created_at', $year)->orderBy('costo', 'DESC')->get();
        //Proyectos 2
        $proyectos2 = Proyecto::whereYear('created_at', $year)->orderBy('costo', 'DESC')->paginate(10);
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
      /*  $actividades = Actividade::query()
        ->where('id', '>', 0)->orderBy('costo', 'DESC')
        ->WhereHas('proyecto', function($q){
            $fecha = Carbon::now();
            $year = $fecha->year;
         $q->whereYear('created_at', $year);
         })->get(); */

         //Activiades 2
         $actividades2 = Actividade::query()
        ->where('id', '>', 0)->orderBy('costo', 'DESC')
        ->WhereHas('proyecto', function($q){
            $fecha = Carbon::now();
            $year = $fecha->year;
         $q->whereYear('created_at', $year);
         })->paginate(10);

         $obj_carbon = new Carbon();

        $cad_ingreso_anual = $this->get_cad_ingreso_anual();
        $cad_egreso_anual = $this->get_cad_egreso_anual();

        // $cad_ingreso_anual = "15, 20, 12, 19";
        $cad_corporaciones = $this->get_lebel_corporaciones();
        //Ingresos que cada corporacion ha tenido
        $cad_ingresos_corporaciones = $this->get_ingresos_corporaciones();


        return view('home', compact('cad_ingresos_corporaciones', 'cad_corporaciones','cad_egreso_anual', 'cad_ingreso_anual', 'corporaciones', 'responsables', 'obj_carbon', 'fecha_reciente', 'actividades2','total_proyectos' , 'ingreso_estimado', 'egreso_estimado', 'ingreso_actual_estimado', 'egreso_actual_estimado', 'proyectos2'));
    }

    private function get_cad_ingreso_anual(){
        $cad_rs = '';
        //01
        $proyectos_ingresos = Actividade::query()
        ->where('id', '>', 0)->whereMonth('created_at', '01')
        ->WhereHas('proyecto', function($q){
            $tipo = "INGRESO";
            $fecha = Carbon::now();
            $year = $fecha->year;
         $q->where('tipo', 'like', '%'. $tipo . '%')->whereYear('created_at', $year)
         ;
         })->get();
        $egreso_estimado = $proyectos_ingresos->sum('costo');
        $cad_rs .= $egreso_estimado . ", "; 
        //02
        $proyectos_ingresos = Actividade::query()
        ->where('id', '>', 0)
        ->whereMonth('created_at', '02')
        ->WhereHas('proyecto', function($q){
            $tipo = "INGRESO";
            $fecha = Carbon::now();
            $year = $fecha->year;
         $q->where('tipo', 'like', '%'. $tipo . '%')->whereYear('created_at', $year);
         })->get();
         $egreso_estimado = $proyectos_ingresos->sum('costo');
        $cad_rs .= $egreso_estimado . ", ";
        //03
        $proyectos_ingresos = Actividade::query()
        ->where('id', '>', 0)
        ->whereMonth('created_at', '03')
        ->WhereHas('proyecto', function($q){
            $tipo = "INGRESO";
            $fecha = Carbon::now();
            $year = $fecha->year;
         $q->where('tipo', 'like', '%'. $tipo . '%')->whereYear('created_at', $year);
         })->get(); 
         $egreso_estimado = $proyectos_ingresos->sum('costo');
        $cad_rs .= $egreso_estimado . ", ";
        //04
        $proyectos_ingresos = Actividade::query()
        ->where('id', '>', 0)
        ->whereMonth('created_at', '04')
        ->WhereHas('proyecto', function($q){
            $tipo = "INGRESO";
            $fecha = Carbon::now();
            $year = $fecha->year;
         $q->where('tipo', 'like', '%'. $tipo . '%')->whereYear('created_at', $year);
         })->get(); 
         $egreso_estimado = $proyectos_ingresos->sum('costo');
        $cad_rs .= $egreso_estimado . ", ";
        //05
        $proyectos_ingresos = Actividade::query()
        ->where('id', '>', 0)->whereMonth('created_at', '05')
        ->WhereHas('proyecto', function($q){
            $tipo = "INGRESO";
            $fecha = Carbon::now();
            $year = $fecha->year;
         $q->where('tipo', 'like', '%'. $tipo . '%')->whereYear('created_at', $year)
         ;
         })->get();
         $egreso_estimado = $proyectos_ingresos->sum('costo');
        $cad_rs .= $egreso_estimado . ", ";
        //06
        $proyectos_ingresos = Actividade::query()
        ->where('id', '>', 0)
        ->whereMonth('created_at', '06')
        ->WhereHas('proyecto', function($q){
            $tipo = "INGRESO";
            $fecha = Carbon::now();
            $year = $fecha->year;
         $q->where('tipo', 'like', '%'. $tipo . '%')->whereYear('created_at', $year);
         })->get();
         $egreso_estimado = $proyectos_ingresos->sum('costo');
        $cad_rs .= $egreso_estimado . ", ";
        //07
        $proyectos_ingresos = Actividade::query()
        ->where('id', '>', 0)
        ->whereMonth('created_at', '07')
        ->WhereHas('proyecto', function($q){
            $tipo = "INGRESO";
            $fecha = Carbon::now();
            $year = $fecha->year;
         $q->where('tipo', 'like', '%'. $tipo . '%')->whereYear('created_at', $year);
         })->get();
         $egreso_estimado = $proyectos_ingresos->sum('costo');
        $cad_rs .= $egreso_estimado . ", ";
        //08
        $proyectos_ingresos = Actividade::query()
        ->where('id', '>', 0)
        ->whereMonth('created_at', '08')
        ->WhereHas('proyecto', function($q){
            $tipo = "INGRESO";
            $fecha = Carbon::now();
            $year = $fecha->year;
         $q->where('tipo', 'like', '%'. $tipo . '%')->whereYear('created_at', $year);
         })->get();
         $egreso_estimado = $proyectos_ingresos->sum('costo');
        $cad_rs .= $egreso_estimado . ", ";
        //09
        $proyectos_ingresos = Actividade::query()
        ->where('id', '>', 0)
        ->whereMonth('created_at', '09')
        ->WhereHas('proyecto', function($q){
            $tipo = "INGRESO";
            $fecha = Carbon::now();
            $year = $fecha->year;
         $q->where('tipo', 'like', '%'. $tipo . '%')->whereYear('created_at', $year);
         })->get();
         $egreso_estimado = $proyectos_ingresos->sum('costo');
        $cad_rs .= $egreso_estimado . ", ";
        //10
        $proyectos_ingresos = Actividade::query()
        ->where('id', '>', 0)
        ->whereMonth('created_at', '10')
        ->WhereHas('proyecto', function($q){
            $tipo = "INGRESO";
            $fecha = Carbon::now();
            $year = $fecha->year;
         $q->where('tipo', 'like', '%'. $tipo . '%')->whereYear('created_at', $year);
         })->get();
         $egreso_estimado = $proyectos_ingresos->sum('costo');
        $cad_rs .= $egreso_estimado . ", ";
        //11
        $proyectos_ingresos = Actividade::query()
        ->where('id', '>', 0)
        ->whereMonth('created_at', '11')
        ->WhereHas('proyecto', function($q){
            $tipo = "INGRESO";
            $fecha = Carbon::now();
            $year = $fecha->year;
         $q->where('tipo', 'like', '%'. $tipo . '%')->whereYear('created_at', $year);
         })->get();
         $egreso_estimado = $proyectos_ingresos->sum('costo');
        $cad_rs .= $egreso_estimado . ", ";
        //12
        $proyectos_ingresos = Actividade::query()
        ->where('id', '>', 0)
        ->whereMonth('created_at', '12')
        ->WhereHas('proyecto', function($q){
            $tipo = "INGRESO";
            $fecha = Carbon::now();
            $year = $fecha->year;
         $q->where('tipo', 'like', '%'. $tipo . '%')->whereYear('created_at', $year);
         })->get();
         $egreso_estimado = $proyectos_ingresos->sum('costo');
         $cad_rs .= $egreso_estimado;

        return $cad_rs;


    }

    private function get_cad_egreso_anual(){
        $cad_rs = '';
        //01
        $proyectos_ingresos = Actividade::query()
        ->where('id', '>', 0)
        ->whereMonth('created_at', '01')
        ->WhereHas('proyecto', function($q){
            $tipo = "EGRESO";
            $fecha = Carbon::now();
            $year = $fecha->year;
         $q->where('tipo', 'like', '%'. $tipo . '%')->whereYear('created_at', $year);
         })->get();
        $egreso_estimado = $proyectos_ingresos->sum('costo');
        $cad_rs .= $egreso_estimado . ", "; 
        //02
        $proyectos_ingresos = Actividade::query()
        ->where('id', '>', 0)
        ->whereMonth('created_at', '02')
        ->WhereHas('proyecto', function($q){
            $tipo = "EGRESO";
            $fecha = Carbon::now();
            $year = $fecha->year;
         $q->where('tipo', 'like', '%'. $tipo . '%')->whereYear('created_at', $year);
         })->get();
         $egreso_estimado = $proyectos_ingresos->sum('costo');
        $cad_rs .= $egreso_estimado . ", ";
        //03
        $proyectos_ingresos = Actividade::query()
        ->where('id', '>', 0)
        ->whereMonth('created_at', '03')
        ->WhereHas('proyecto', function($q){
            $tipo = "EGRESO";
            $fecha = Carbon::now();
            $year = $fecha->year;
         $q->where('tipo', 'like', '%'. $tipo . '%')->whereYear('created_at', $year);
         })->get(); 
         $egreso_estimado = $proyectos_ingresos->sum('costo');
        $cad_rs .= $egreso_estimado . ", ";
        //04
        $proyectos_ingresos = Actividade::query()
        ->where('id', '>', 0)
        ->whereMonth('created_at', '04')
        ->WhereHas('proyecto', function($q){
            $tipo = "EGRESO";
            $fecha = Carbon::now();
            $year = $fecha->year;
         $q->where('tipo', 'like', '%'. $tipo . '%')->whereYear('created_at', $year);
         })->get(); 
         $egreso_estimado = $proyectos_ingresos->sum('costo');
        $cad_rs .= $egreso_estimado . ", ";
        //05
        $proyectos_ingresos = Actividade::query()
        ->where('id', '>', 0)
        ->whereMonth('created_at', '05')
        ->WhereHas('proyecto', function($q){
            $tipo = "EGRESO";
            $fecha = Carbon::now();
            $year = $fecha->year;
         $q->where('tipo', 'like', '%'. $tipo . '%')->whereYear('created_at', $year);
         })->get();
         $egreso_estimado = $proyectos_ingresos->sum('costo');
        $cad_rs .= $egreso_estimado . ", ";
        //06
        $proyectos_ingresos = Actividade::query()
        ->where('id', '>', 0)
        ->whereMonth('created_at', '06')
        ->WhereHas('proyecto', function($q){
            $tipo = "EGRESO";
            $fecha = Carbon::now();
            $year = $fecha->year;
         $q->where('tipo', 'like', '%'. $tipo . '%')->whereYear('created_at', $year);
         })->get();
         $egreso_estimado = $proyectos_ingresos->sum('costo');
        $cad_rs .= $egreso_estimado . ", ";
        //07
        $proyectos_ingresos = Actividade::query()
        ->where('id', '>', 0)
        ->whereMonth('created_at', '07')
        ->WhereHas('proyecto', function($q){
            $tipo = "EGRESO";
            $fecha = Carbon::now();
            $year = $fecha->year;
         $q->where('tipo', 'like', '%'. $tipo . '%')->whereYear('created_at', $year);
         })->get();
         $egreso_estimado = $proyectos_ingresos->sum('costo');
        $cad_rs .= $egreso_estimado . ", ";
        //08
        $proyectos_ingresos = Actividade::query()
        ->where('id', '>', 0)
        ->whereMonth('created_at', '08')
        ->WhereHas('proyecto', function($q){
            $tipo = "EGRESO";
            $fecha = Carbon::now();
            $year = $fecha->year;
         $q->where('tipo', 'like', '%'. $tipo . '%')->whereYear('created_at', $year);
         })->get();
         $egreso_estimado = $proyectos_ingresos->sum('costo');
        $cad_rs .= $egreso_estimado . ", ";
        //09
        $proyectos_ingresos = Actividade::query()
        ->where('id', '>', 0)
        ->whereMonth('created_at', '09')
        ->WhereHas('proyecto', function($q){
            $tipo = "EGRESO";
            $fecha = Carbon::now();
            $year = $fecha->year;
         $q->where('tipo', 'like', '%'. $tipo . '%')->whereYear('created_at', $year);
         })->get();
         $egreso_estimado = $proyectos_ingresos->sum('costo');
        $cad_rs .= $egreso_estimado . ", ";
        //10
        $proyectos_ingresos = Actividade::query()
        ->where('id', '>', 0)
        ->whereMonth('created_at', '10')
        ->WhereHas('proyecto', function($q){
            $tipo = "EGRESO";
            $fecha = Carbon::now();
            $year = $fecha->year;
         $q->where('tipo', 'like', '%'. $tipo . '%')->whereYear('created_at', $year);
         })->get();
         $egreso_estimado = $proyectos_ingresos->sum('costo');
        $cad_rs .= $egreso_estimado . ", ";
        //11
        $proyectos_ingresos = Actividade::query()
        ->where('id', '>', 0)
        ->whereMonth('created_at', '11')
        ->WhereHas('proyecto', function($q){
            $tipo = "EGRESO";
            $fecha = Carbon::now();
            $year = $fecha->year;
         $q->where('tipo', 'like', '%'. $tipo . '%')->whereYear('created_at', $year);
         })->get();
         $egreso_estimado = $proyectos_ingresos->sum('costo');
        $cad_rs .= $egreso_estimado . ", ";
        //12
        $proyectos_ingresos = Actividade::query()
        ->where('id', '>', 0)
        ->whereMonth('created_at', '12')
        ->WhereHas('proyecto', function($q){
            $tipo = "EGRESO";
            $fecha = Carbon::now();
            $year = $fecha->year;
         $q->where('tipo', 'like', '%'. $tipo . '%')->whereYear('created_at', $year);
         })->get();
         $egreso_estimado = $proyectos_ingresos->sum('costo');
         $cad_rs .= $egreso_estimado;

        return $cad_rs;


    }

    private function get_lebel_corporaciones(){
        $cad_rs = '';

        $corporaciones = Corporacione::all();

        foreach($corporaciones as $corporacion)
        {
            $cad_rs .= substr($corporacion->nombre, 0, 12) . ",";
        }

        $cad_rs = substr($cad_rs, 0, (strlen($cad_rs) - 1));

        
        return $cad_rs;
    }

    private function get_ingresos_corporaciones(){
        $cad_rs = '';

        $corporaciones = Corporacione::all();
        $fecha = Carbon::now();
       $year = $fecha->year;

        foreach($corporaciones as $corporacion)
        {  //Obtener todos los proyectos que pertenecen a esta corporacion
            $proyectos = Proyecto::where('corporacion_id', $corporacion->id)->where('tipo', 'INGRESO')->whereYear('created_at', $year)->get();

            //cliclo recorrer los proyectos y tomar las actividades que cada proyecto haya realizado
            foreach($proyectos as $proyecto){
                $actividades = Actividade::where('proyecto_id', $proyecto->id)->get();
                $rs_act_ingresos = $actividades->sum('costo');
                $cad_rs .= $rs_act_ingresos . ",";
            }

        }

        $cad_rs = substr($cad_rs, 0, (strlen($cad_rs) - 1));

       // $cad_rs = '15,25,23,14';
        return $cad_rs;
    }


}
