<?php

namespace App\Http\Controllers;

use App\Models\Direccion;
use Illuminate\Http\Request;

/**
 * Class DireccionController
 * @package App\Http\Controllers
 */
class DireccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $direccions = Direccion::paginate();

        return view('direccion.index', compact('direccions'))
            ->with('i', (request()->input('page', 1) - 1) * $direccions->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $direccion = new Direccion();
        return view('direccion.create', compact('direccion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Direccion::$rules);

        $direccion = Direccion::create($request->all());

        return redirect()->route('direccions.index')
            ->with('success', 'Direccion created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $direccion = Direccion::find($id);

        return view('direccion.show', compact('direccion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $direccion = Direccion::find($id);

        return view('direccion.edit', compact('direccion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Direccion $direccion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Direccion $direccion)
    {
        request()->validate(Direccion::$rules);

        $direccion->update($request->all());

        return redirect()->route('direccions.index')
            ->with('success', 'Direccion updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $direccion = Direccion::find($id)->delete();

        return redirect()->route('direccions.index')
            ->with('success', 'Direccion deleted successfully');
    }
}
