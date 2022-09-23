<?php

namespace App\Http\Controllers;

use App\Models\Juez;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class JuezController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $juez = Auth::user()->juez;
        // dd($juez);
        return view('juez.juez-create', compact('juez'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => ['required', 'string', 'max:40'],
            'apellido_paterno' => ['required', 'string', 'max:40'],
            'apellido_materno' => ['max:40'],
            'telefono' => ['required', 'numeric'],
            'empresa' => ['required', 'string', 'max:40'],
            'puesto' => ['required', 'string', 'max:40'],
        ]);

        $request->merge([
            'apellido_materno' => $request->apellido_materno ?? '',
            'user_id' => Auth::id(),
        ]);

        Juez::create($request->all());
        
        return redirect()->route('juez.create')->with('info', 'Información registrada exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Juez  $juez
     * @return \Illuminate\Http\Response
     */
    public function show(Juez $juez)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Juez  $juez
     * @return \Illuminate\Http\Response
     */
    public function edit(Juez $juez)
    {
        if (Gate::allows('admin-only', auth()->user()))
        {
            // $profesores = Profesor::get();
            return view('juez.juez-create', compact('juez'));
        } else {
            abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Juez  $juez
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Juez $juez)
    {
        $request->validate([
            'nombre' => ['required', 'string', 'max:40'],
            'apellido_paterno' => ['required', 'string', 'max:40'],
            'apellido_materno' => ['max:40'],
            'telefono' => ['required', 'numeric'],
            'empresa' => ['required', 'string', 'max:40'],
            'puesto' => ['required', 'string', 'max:40'],
        ]);

        $request->merge([
            'apellido_materno' => $request->apellido_materno ?? '',
        ]);

        Juez::where('id', $juez->id)->update($request->except('_token', '_method'));
        if (auth()->user()->rol->id == 1) {
            return redirect()->route('juez.edit', $juez)->with('info', 'Información registrada exitosamente');
        } else {
            return redirect()->route('juez.create')->with('info', 'Información registrada exitosamente');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Juez  $juez
     * @return \Illuminate\Http\Response
     */
    public function destroy(Juez $juez)
    {
        $juez->delete();
        return redirect()->route('admin.jueces')->with('info', 'Embajador eliminado exitosamente');
    }
}
