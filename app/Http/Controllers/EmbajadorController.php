<?php

namespace App\Http\Controllers;

use App\Models\Embajador;
use App\Models\Estudiante;
use App\Models\Profesor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class EmbajadorController extends Controller
{

    public function estudianteproyecto() {
        $estudiantes = Estudiante::all();
        return view('embajador.estudiante-proyecto', compact('estudiantes'));
    }

    public function guardarVideo(Request $request, Embajador $embajador) {
        // dd($request);
        if (Auth::user()->id == 5) {
            $request->validate([
                'pitch' => ['required', 'mimetypes:video/avi,video/mpeg,video/mp4,video/flv'],
                'plan_negocios' => ['required'],
            ]);
            
            $pitch =  Auth::user()->id . "_" .  $request['pitch']->getClientOriginalName();
            $plan_negocios = Auth::user()->id . "_" .  $request['plan_negocios']->getClientOriginalName();

            $request['pitch']->move(public_path("pitch"), $pitch);
            $request['plan_negocios']->move(public_path("plan de negocios"), $plan_negocios);

            
            $embajador->pitch = $pitch;
            $embajador->plan_negocios = $plan_negocios;
            $embajador->lider_proyecto = $request['lider_proyecto'];


            
            // dd($pitch, $plan_negocios);
            return redirect()->route('embajadorProyecto')->with('info', 'Información registrada exitosamente');
        } else {
            abort(403);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
