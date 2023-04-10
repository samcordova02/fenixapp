<?php

namespace App\Http\Controllers;

use App\Models\Corporacione;
use App\Models\Gabinete;
use App\Models\Direccione;
use App\Models\Proyecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * Class CorporacioneController
 * @package App\Http\Controllers
 */
class CorporacioneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $corporaciones = Corporacione::paginate();

        $corporaciones = Corporacione::query()
        ->when(request('search'), function($query){
            return $query->where ('id', 'like', '%'.request('search').'%')
                         
                         ->orWhere('nombre', 'like', '%'.request('search').'%')
                         ->orWhere('rif', 'like', '%'.request('search').'%')
                         ->orWhere('telefono', 'like', '%'.request('search').'%')
                         ->orWhere('responsable', 'like', '%'.request('search').'%')
                         ->orWhere('correo', 'like', '%'.request('search').'%')

                         ->orWhereHas('gabinete', function($qa){
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

        return view('corporacione.index', compact('corporaciones'))
            ->with('i', (request()->input('page', 1) - 1) * $corporaciones->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $corporacione = new Corporacione();

        $gabinetes = Gabinete::pluck('nombre','id');
        $direcciones = Direccione::pluck('descripcion','id');
        return view('corporacione.create', compact('corporacione', 'gabinetes', 'direcciones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Corporacione::$rules);

       

        /**
         * Codigo para colocar la imagen aqui abajo.
         */
       
        $file = $request->file('imagen')->store('public/imagenes');
        $url = Storage::url($file);
        

       // $request->merge(['imagen' => 0]);

        /**
         * Fin de Codigo
         */

          //El valor de imagen que me guarda no es el correcto no funciona el merge para el tipo file en mi caso input imagen
          $corporacione = Corporacione::create($request->all());
          //luego de creado actualizar la imagen solamente
          $corporacione->imagen = $url;
          $corporacione->save();

        return redirect()->route('corporaciones.index')
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
        $corporacione = Corporacione::find($id);

        return view('corporacione.show', compact('corporacione'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $corporacione = Corporacione::find($id);
        $gabinetes = Gabinete::pluck('nombre','id');
        $direcciones = Direccione::pluck('descripcion','id');

        return view('corporacione.edit', compact('corporacione', 'gabinetes', 'direcciones'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Corporacione $corporacione
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Corporacione $corporacione)
    {
        request()->validate(Corporacione::$rules);

        $file = $request->file('imagen')->store('public/imagenes');
        $url = Storage::url($file);

        $corporacione->update($request->all());

        $corporacione->imagen = $url;
        $corporacione->save();

        return redirect()->route('corporaciones.index')
            ->with('success', 'editar');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        
        $proyecto = Proyecto::where('corporacion_id', $id)->exists();

        if($proyecto){
        return redirect()->route('corporaciones.index')
            ->with('success', 'error');
        }else {
            $corporacione = Corporacione::find($id)->delete();
            return redirect()->route('corporaciones.index')
            ->with('success', 'eliminar');
        }

    }
}
