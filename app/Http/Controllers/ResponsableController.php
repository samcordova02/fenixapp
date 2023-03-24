<?php

namespace App\Http\Controllers;

use App\Models\Responsable;
use Illuminate\Http\Request;

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
        return view('responsable.create', compact('responsable'));
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

        $responsable = Responsable::create($request->all());

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

        return view('responsable.edit', compact('responsable'));
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

        $responsable->update($request->all());

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
