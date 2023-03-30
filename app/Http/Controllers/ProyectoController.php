<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use App\Models\Unidadmedida;
use App\Models\Responsable;
use App\Models\Corporacione;
use Illuminate\Http\Request;

/**
 * Class ProyectoController
 * @package App\Http\Controllers
 */
class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //  $proyectos = Proyecto::paginate();

        $proyectos = Proyecto::query()
        ->when(request('search'), function($query){
            return $query->where ('id', 'like', '%'.request('search').'%')
                         
                         ->orWhere('nombre', 'like', '%'.request('search').'%')

                         
                         ->orWhereHas('corporacione', function($q){
                          $q->where('nombre', 'like', '%'.request('search').'%');
                          })
                           ->orWhereHas('responsable', function($qa){
                             $qa->where('nombre', 'like', '%'.request('search').'%');
                         })
                         ->orWhereHas('unidadmedida', function($qa){
                            $qa->where('nombre', 'like', '%'.request('search').'%');
                         }) ;
         },
         function ($query) {
             $query->orderBy('id', 'DESC');
         })
        ->paginate(25)
        ->withQueryString();


        $unidades = Unidadmedida::pluck('nombre', 'id');

        return view('proyecto.index', compact('proyectos'))
            ->with('i', (request()->input('page', 1) - 1) * $proyectos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proyecto = new Proyecto();

        $unidades = Unidadmedida::pluck('nombre', 'id');
        $responsables = Responsable::pluck('nombre', 'id');
        $corporaciones = Corporacione::pluck('nombre', 'id');

        return view('proyecto.create', compact('proyecto', 'unidades', 'responsables', 'corporaciones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Proyecto::$rules);

        $proyecto = Proyecto::create($request->all());

        return redirect()->route('proyectos.index')
            ->with('success', 'registrar');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proyecto = Proyecto::find($id);

        return view('proyecto.show', compact('proyecto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proyecto = Proyecto::find($id);

        $unidades = Unidadmedida::pluck('nombre', 'id');
        $responsables = Responsable::pluck('nombre', 'id');
        $corporaciones = Corporacione::pluck('nombre', 'id');

        return view('proyecto.edit', compact('proyecto', 'unidades', 'responsables', 'corporaciones'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Proyecto $proyecto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proyecto $proyecto)
    {
        request()->validate(Proyecto::$rules);

        $proyecto->update($request->all());

        return redirect()->route('proyectos.index')
            ->with('success', 'editar');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $proyecto = Proyecto::find($id)->delete();

        return redirect()->route('proyectos.index')
            ->with('success', 'eliminar');
    }
}
