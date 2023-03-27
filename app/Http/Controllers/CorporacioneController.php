<?php

namespace App\Http\Controllers;

use App\Models\Corporacione;
use Illuminate\Http\Request;

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
        $corporaciones = Corporacione::paginate();

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
        return view('corporacione.create', compact('corporacione'));
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

        $corporacione = Corporacione::create($request->all());

        return redirect()->route('corporaciones.index')
            ->with('success', 'Corporacione created successfully.');
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

        return view('corporacione.edit', compact('corporacione'));
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

        $corporacione->update($request->all());

        return redirect()->route('corporaciones.index')
            ->with('success', 'Corporacione updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $corporacione = Corporacione::find($id)->delete();

        return redirect()->route('corporaciones.index')
            ->with('success', 'Corporacione deleted successfully');
    }
}
