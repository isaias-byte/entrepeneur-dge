<?php

namespace App\Http\Controllers;

use App\Models\Nrc;
use App\Models\Profesor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfesorController extends Controller
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
        $profesor = Auth::user()->profesor;
        // return $profesor;
        return view('profesor.profesor-create', compact('profesor'));
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
            'fecha_nacimiento' => ['required'],
            'sexo' => ['required'],
            'codigo' => ['required', 'string'],
        ]);

        $request->merge([
            'apellido_materno' => $request->apellido_materno ?? '',
            'user_id' => Auth::id(),
        ]);

        Profesor::create($request->all());
        
        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function show(Profesor $profesor)
    {
        $nrcs = Nrc::get();
        return view('profesor.profesor-show', compact('profesor', 'nrcs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function edit(Profesor $profesor)
    {
        return view('profesor.profesor-create', compact('profesor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profesor $profesor)
    {
        // dd($request, $profesor);
        $request->validate([
            'nombre' => ['required', 'string', 'max:40'],
            'apellido_paterno' => ['required', 'string', 'max:40'],
            'apellido_materno' => ['max:40'],
            'fecha_nacimiento' => ['required'],
            'sexo' => ['required'],
            'codigo' => ['required', 'string'],
        ]);

        $request->merge([
            'apellido_materno' => $request->apellido_materno ?? '',
        ]);

        Profesor::where('id', $profesor->id)->update($request->except('_token', '_method'));
        return redirect()->route('profesor.edit', $profesor);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profesor $profesor)
    {
        $profesor->delete();
        return redirect()->route('adminProfesores');
    }

    public function agregarNrc(Request $request, Profesor $profesor) {
        // dd($request->all(), $abogado);
        $request->validate([
            'nrc_id' => ['required'],
        ]);

        // return $request;
        // return $profesor->nrcs()->sync($request->nrc_id);
        $profesor->nrcs()->sync($request->nrc_id);

        return redirect()->route('profesor.show', $profesor);
    }
}
