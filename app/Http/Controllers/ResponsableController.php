<?php

namespace App\Http\Controllers;

use App\Models\Responsable;
use App\Models\Corporacione;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * Class ResponsableController
 * @package App\Http\Controllers
 */
class ResponsableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $responsables = Responsable::paginate();

        return view('responsable.index', compact('responsables'))
            ->with('i', (request()->input('page', 1) - 1) * $responsables->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $responsable = new Responsable();
        $corporaciones = Corporacione::pluck('nombre','id');
        return view('responsable.create', compact('corporaciones','responsable'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Responsable::$rules);
        $file = $request->file('imagen')->store('public/imagenes/responsable');
        $url = Storage::url($file);

        $responsable = Responsable::create($request->all());
        $responsable->imagen = $url;
        $responsable->save();

        return redirect()->route('responsables.index')
            ->with('success', 'Responsable created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $responsable = Responsable::find($id);

        return view('responsable.show', compact('responsable'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $responsable = Responsable::find($id);
        $corporaciones = Corporacione::pluck('nombre','id');

        return view('responsable.edit', compact('corporaciones','responsable'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Responsable $responsable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Responsable $responsable)
    {
        request()->validate(Responsable::$rules);
        $file = $request->file('imagen')->store('public/imagenes/responsable');
        $url = Storage::url($file);

        $responsable->update($request->all());
        $responsable->imagen = $url;
        $responsable->save();

        return redirect()->route('responsables.index')
            ->with('success', 'Responsable updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $responsable = Responsable::find($id)->delete();

        return redirect()->route('responsables.index')
            ->with('success', 'Responsable deleted successfully');
    }
}
