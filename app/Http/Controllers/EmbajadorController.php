<?php

namespace App\Http\Controllers;

use App\Models\Embajador;
use App\Models\Profesor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class EmbajadorController extends Controller
{

    public function estudianteproyecto() {
        return view('embajador.estudiante-proyecto');
    }

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
        $embajador = Auth::user()->embajador;
        $profesores = Profesor::get();
        return view('embajador.embajador-create', compact('embajador', 'profesores'));
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
            'profesor_id' => ['required']
        ]);

        $request->merge([
            'apellido_materno' => $request->apellido_materno ?? '',
            'user_id' => Auth::id(),
        ]);

        Embajador::create($request->all());
        
        return redirect()->route('embajador.create')->with('info', 'Información registrada exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Embajador  $embajador
     * @return \Illuminate\Http\Response
     */
    public function show(Embajador $embajador)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Embajador  $embajador
     * @return \Illuminate\Http\Response
     */
    public function edit(Embajador $embajador)
    {
        if (Gate::allows('admin-only', auth()->user()))
        {
            $profesores = Profesor::get();
            return view('embajador.embajador-create', compact('embajador', 'profesores'));
        } else {
            abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Embajador  $embajador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Embajador $embajador)
    {
        $request->validate([
            'nombre' => ['required', 'string', 'max:40'],
            'apellido_paterno' => ['required', 'string', 'max:40'],
            'apellido_materno' => ['max:40'],
            'telefono' => ['required', 'numeric'],
            'profesor_id' => ['required']
        ]);

        $request->merge([
            'apellido_materno' => $request->apellido_materno ?? '',
        ]);

        Embajador::where('id', $embajador->id)->update($request->except('_token', '_method'));
        if (auth()->user()->rol->id == 1) {
            return redirect()->route('embajador.edit', $embajador)->with('info', 'Información registrada exitosamente');
        } else {
            return redirect()->route('embajador.create')->with('info', 'Información registrada exitosamente');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Embajador  $embajador
     * @return \Illuminate\Http\Response
     */
    public function destroy(Embajador $embajador)
    {
        $embajador->delete();
        return redirect()->route('admin.embajadores')->with('info', 'Embajador eliminado exitosamente');
    }
}
