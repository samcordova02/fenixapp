<?php

namespace App\Http\Controllers;

use App\Models\Actividade;
use App\Models\Proyecto;
use App\Models\Responsable;
use App\Models\Direccione;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

/**
 * Class ActividadeController
 * @package App\Http\Controllers
 */
class ActividadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $actividades = Actividade::paginate();

        $actividades = Actividade::query()
        ->when(request('search'), function($query){
            return $query->where ('id', 'like', '%'.request('search').'%')
                         
                         ->orWhere('nombre', 'like', '%'.request('search').'%')
                         ->orWhere('costo', 'like', '%'.request('search').'%')
                         ->orWhere('status', 'like', '%'.request('search').'%')
                         ->orWhere('descripcion', 'like', '%'.request('search').'%')

                         
                         ->orWhereHas('proyecto', function($q){
                          $q->where('nombre', 'like', '%'.request('search').'%');
                          })
                           ->orWhereHas('responsable', function($qa){
                             $qa->where('nombre', 'like', '%'.request('search').'%');
                         })
                         ->orWhereHas('direccione', function($qa){
                            $qa->where('descripcion', 'like', '%'.request('search').'%');
                         }) ;
         },
         function ($query) {
             $query->orderBy('id', 'DESC');
         })
        ->paginate(25)
        ->withQueryString();


        return view('actividade.index', compact('actividades'))
            ->with('i', (request()->input('page', 1) - 1) * $actividades->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $actividade = new Actividade();
        $proyectos = Proyecto::pluck('nombre', 'id');
        $responsables = Responsable::pluck('nombre','id');
        $direcciones = Direccione::pluck('descripcion', 'id');
        return view('actividade.create', compact('actividade', 'proyectos', 'responsables', 'direcciones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Actividade::$rules);

        $actividade = Actividade::create($request->all());

        

        return redirect()->route('actividades.index')
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
        $actividade = Actividade::find($id);

        return view('actividade.show', compact('actividade'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $actividade = Actividade::find($id);
        $proyectos = Proyecto::pluck('nombre', 'id');
        $responsables = Responsable::pluck('nombre','id');
        $direcciones = Direccione::pluck('descripcion', 'id');

        return view('actividade.edit', compact('actividade', 'proyectos', 'responsables', 'direcciones'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Actividade $actividade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Actividade $actividade)
    {
        request()->validate(Actividade::$rules);

        $actividade->update($request->all());

        return redirect()->route('actividades.index')
            ->with('success', 'editar');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $actividade = Actividade::find($id)->delete();

        return redirect()->route('actividades.index')
            ->with('success', 'eliminar');
    }
}
