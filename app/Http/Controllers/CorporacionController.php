<?php

namespace App\Http\Controllers;

use App\Models\Corporacion;
use Illuminate\Http\Request;

/**
 * Class CorporacionController
 * @package App\Http\Controllers
 */
class CorporacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $corporacions = Corporacion::paginate();

        return view('corporacion.index', compact('corporacions'))
            ->with('i', (request()->input('page', 1) - 1) * $corporacions->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $corporacion = new Corporacion();
        return view('corporacion.create', compact('corporacion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Corporacion::$rules);

        $corporacion = Corporacion::create($request->all());

        return redirect()->route('corporacions.index')
            ->with('success', 'Corporacion created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $corporacion = Corporacion::find($id);

        return view('corporacion.show', compact('corporacion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $corporacion = Corporacion::find($id);

        return view('corporacion.edit', compact('corporacion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Corporacion $corporacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Corporacion $corporacion)
    {
        request()->validate(Corporacion::$rules);

        $corporacion->update($request->all());

        return redirect()->route('corporacions.index')
            ->with('success', 'Corporacion updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $corporacion = Corporacion::find($id)->delete();

        return redirect()->route('corporacions.index')
            ->with('success', 'Corporacion deleted successfully');
    }
}
