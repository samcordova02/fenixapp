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
        $proyectos = Proyecto::whereYear('fecha_fin', $year)->orderBy('costo', 'DESC')->get();
        //Proyectos 2
        $proyectos2 = Proyecto::whereYear('fecha_fin', $year)->orderBy('costo', 'DESC')->paginate(10);
        //Obtener el total de proyectos
        $total_proyectos = count($proyectos);

        //Obtener la suma del estimado de ingresos en el year
        $proyectos_ingresos = Proyecto::where('tipo','INGRESO')->whereYear('fecha_fin', $year)->get();
        $ingreso_estimado = $proyectos_ingresos->sum('costo');
        
        
        //Obtener lo que ha ingreso por concepto de actividades
        $actividades_ingresos = Actividade::query()
        ->where('id', '>', 0)
        ->WhereHas('proyecto', function($q){
            $tipo = "INGRESO";
            $fecha = Carbon::now();
            $year = $fecha->year;
         $q->where('tipo', 'like', '%'. $tipo . '%')
         ->whereYear('fecha_fin', $year);
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
         ->whereYear('fecha_fin', $year);
         })->get();

         $egreso_actual_estimado = $actividades_egresos->sum('costo');


        //Obtener la suma del estimado de egresos en el year
        $proyectos_egresos = Proyecto::where('tipo','EGRESO')->whereYear('fecha_fin', $year)->get();
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
         $q->whereYear('fecha_fin', $year);
         })->paginate(10);

         $obj_carbon = new Carbon();

        $cad_ingreso_anual = $this->get_cad_ingreso_anual();
        $cad_egreso_anual = $this->get_cad_egreso_anual();

        // $cad_ingreso_anual = "15, 20, 12, 19";
        $cad_corporaciones = $this->get_lebel_corporaciones();
        //Ingresos que cada corporacion ha tenido
        $cad_ingresos_corporaciones = $this->get_ingresos_corporaciones();

        //Cadena egresos corporaciones
        $cad_egresos_corporaciones = $this->get_cad_egreso_anual();

        //Obtener ultimas 9 actividades realizadas
        $ult_actividades = Actividade::where('id','>', 0)->orderBy('id', 'DESC')->paginate(9);

        //Obtener el monto de los proyectos ingreso
         $proyecto_ingresos = $this->get_proyecto_ingreso_corporacion();
        //Obtener el monto de los proyectos egresos
        $proyecto_egresos = $this->get_proyecto_egreso_corporacion();

        //Obtener cadena de a;os que han transcurrido
        $cad_year_transcurridos = $this->get_cad_year();

        //Obtener historico de year y sus costos de ingresos y egresos
        $datos_costos = $this->get_costo_por_year();


        return view('home', compact('datos_costos', 'cad_year_transcurridos','proyecto_ingresos','proyecto_egresos','ult_actividades','cad_egresos_corporaciones', 'cad_ingresos_corporaciones', 'cad_corporaciones','cad_egreso_anual', 'cad_ingreso_anual', 'corporaciones', 'responsables', 'obj_carbon', 'fecha_reciente', 'actividades2','total_proyectos' , 'ingreso_estimado', 'egreso_estimado', 'ingreso_actual_estimado', 'egreso_actual_estimado', 'proyectos2'));
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
         $q->where('tipo', 'like', '%'. $tipo . '%')->whereYear('fecha_fin', $year)
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
         $q->where('tipo', 'like', '%'. $tipo . '%')->whereYear('fecha_fin', $year);
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
         $q->where('tipo', 'like', '%'. $tipo . '%')->whereYear('fecha_fin', $year);
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
         $q->where('tipo', 'like', '%'. $tipo . '%')->whereYear('fecha_fin', $year);
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
         $q->where('tipo', 'like', '%'. $tipo . '%')->whereYear('fecha_fin', $year)
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
         $q->where('tipo', 'like', '%'. $tipo . '%')->whereYear('fecha_fin', $year);
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
         $q->where('tipo', 'like', '%'. $tipo . '%')->whereYear('fecha_fin', $year);
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
         $q->where('tipo', 'like', '%'. $tipo . '%')->whereYear('fecha_fin', $year);
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
         $q->where('tipo', 'like', '%'. $tipo . '%')->whereYear('fecha_fin', $year);
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
         $q->where('tipo', 'like', '%'. $tipo . '%')->whereYear('fecha_fin', $year);
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
         $q->where('tipo', 'like', '%'. $tipo . '%')->whereYear('fecha_fin', $year);
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
         $q->where('tipo', 'like', '%'. $tipo . '%')->whereYear('fecha_fin', $year);
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
         $q->where('tipo', 'like', '%'. $tipo . '%')->whereYear('fecha_fin', $year);
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
         $q->where('tipo', 'like', '%'. $tipo . '%')->whereYear('fecha_fin', $year);
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
         $q->where('tipo', 'like', '%'. $tipo . '%')->whereYear('fecha_fin', $year);
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
         $q->where('tipo', 'like', '%'. $tipo . '%')->whereYear('fecha_fin', $year);
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
         $q->where('tipo', 'like', '%'. $tipo . '%')->whereYear('fecha_fin', $year);
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
         $q->where('tipo', 'like', '%'. $tipo . '%')->whereYear('fecha_fin', $year);
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
         $q->where('tipo', 'like', '%'. $tipo . '%')->whereYear('fecha_fin', $year);
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
         $q->where('tipo', 'like', '%'. $tipo . '%')->whereYear('fecha_fin', $year);
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
         $q->where('tipo', 'like', '%'. $tipo . '%')->whereYear('fecha_fin', $year);
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
         $q->where('tipo', 'like', '%'. $tipo . '%')->whereYear('fecha_fin', $year);
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
         $q->where('tipo', 'like', '%'. $tipo . '%')->whereYear('fecha_fin', $year);
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
         $q->where('tipo', 'like', '%'. $tipo . '%')->whereYear('fecha_fin', $year);
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
            $proyectos = Proyecto::where('corporacion_id', $corporacion->id)->where('tipo', 'INGRESO')->whereYear('fecha_fin', $year)->get();

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

    private function get_proyecto_ingreso_corporacion(){
        $cad_rs = '';

        $corporaciones = Corporacione::all();
        $fecha = Carbon::now();
       $year = $fecha->year;

        foreach($corporaciones as $corporacion)
        {  //Obtener todos los proyectos que pertenecen a esta corporacion
            $proyectos = Proyecto::where('corporacion_id', $corporacion->id)->where('tipo', 'INGRESO')->whereYear('fecha_fin', $year)->get();

            $rs_proy_ingresos = $proyectos->sum('costo');
            $cad_rs .= $rs_proy_ingresos . ",";

        }

        $cad_rs = substr($cad_rs, 0, (strlen($cad_rs) - 1));

       // $cad_rs = '15,25,23,14';
        return $cad_rs;
    }

    private function get_proyecto_egreso_corporacion(){
        $cad_rs = '';

        $corporaciones = Corporacione::all();
        $fecha = Carbon::now();
        $year = $fecha->year;

        foreach($corporaciones as $corporacion)
        {  //Obtener todos los proyectos que pertenecen a esta corporacion
            $proyectos = Proyecto::where('corporacion_id', $corporacion->id)->where('tipo', 'EGRESO')->whereYear('fecha_fin', $year)->get();

            $rs_proy_ingresos = $proyectos->sum('costo');
            $cad_rs .= $rs_proy_ingresos . ",";

        }

        $cad_rs = substr($cad_rs, 0, (strlen($cad_rs) - 1));

       // $cad_rs = '15,25,23,14';
        return $cad_rs;
    }

    private function get_cad_year(){
        $cad = '';
        $year_inicio = 2010;
        $fecha = Carbon::now();
        $year_actual = $fecha->year;

        //validar que siempre solo muestro solo doce a;os por comodida de la grafica desde el actual hacia atras (minimo 2021) creacion de app.
        $constante = 11;
        $a = $year_actual -  $constante;
        if($a >= $year_inicio){
            $year_inicio = $a; 
        }
        
        //Crear una cadena desde el a;o de inicio hasta el a;o actual, y regresarlo
        for($i = $year_inicio; $i <= $year_actual; $i++)
        {
            $cad .= $i . ',';
        }

        $cad = substr($cad, 0, (strlen($cad) - 1));

        return $cad;
    }

    private function get_costo_por_year(){
        $cad_ingreso = '';
        $cad_egreso = '';
        $year_inicio = 2010;
        $fecha = Carbon::now();
        $year_actual = $fecha->year;

        //validar que siempre solo muestro solo doce a;os por comodida de la grafica desde el actual hacia atras (minimo 2021) creacion de app.
        $constante = 11;
        $a = $year_actual -  $constante;
        if($a >= $year_inicio){
            $year_inicio = $a; 
        }
        
        //Crear una cadena desde el a;o de inicio hasta el a;o actual, y regresarlo
        for($i = $year_inicio; $i <= $year_actual; $i++)
        {
           //Obtener Los Ingresos por proyectos
           $rs_ingresos = Proyecto::where('tipo', 'INGRESO')->whereYear('fecha_fin', $i)->get();
           $cad_ingreso .= $rs_ingresos->sum('costo') . ',';
           //Obtener Los Egresos por proyectos
           $rs_egresos = Proyecto::where('tipo', 'EGRESO')->whereYear('fecha_fin', $i)->get();
           $cad_egreso .= $rs_egresos->sum('costo') . ',';

        }

        $cad_ingreso = substr($cad_ingreso, 0, (strlen($cad_ingreso) - 1));
        $cad_egreso = substr($cad_egreso, 0, (strlen($cad_egreso) - 1));

        //Retornar array de datos
        $datos = [
            'ingresos' => $cad_ingreso,
            'egresos' => $cad_egreso 
        ];

        return $datos;
    }


}
