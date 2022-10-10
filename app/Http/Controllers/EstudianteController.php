<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class EstudianteController extends Controller
{

    public function estudianteproyecto() {
        $estudiantes = Estudiante::all();
        if (!isset(Auth::user()->estudiante) && Auth::user()->estudiante->embajador != '1') {
            abort(404);
        }

        return view('embajador.estudiante-proyecto', compact('estudiantes'));
    }

    public function guardarVideo(Request $request) {
        // dd($request);
        $estudiante = Auth::user()->estudiante;
        // dd($estudiante);
        $request->validate([
            'pitch' => ['required', 'mimetypes:video/avi,video/mpeg,video/mp4,video/flv'],
            'plan_negocios' => ['required'],
            'nombre_proyecto' => ['required', 'string'],
        ]);
        
        $pitch =  Auth::user()->id . "_" .  $request['pitch']->getClientOriginalName();
        $plan_negocios = Auth::user()->id . "_" .  $request['plan_negocios']->getClientOriginalName();
        $nombre_proyecto = $request['nombre_proyecto'];

        $request['pitch']->move(public_path("pitch"), $pitch);
        $request['plan_negocios']->move(public_path("plan de negocios"), $plan_negocios);
        

        $estudiante->pitch = $pitch;
        $estudiante->plan_negocios = $plan_negocios;
        $estudiante->nombre_proyecto = $nombre_proyecto;

        $estudiante->save();
        
        return redirect()->route('estudianteProyecto')->with('info', 'Información registrada exitosamente');
    }


    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('estudiante.estudiante-index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estudiante = Auth::user()->estudiante;
        return view('estudiante.estudiante-create', compact('estudiante'));
        
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
            'nrc' => ['required', 'string'],
        ]);

        $request->merge([
            'apellido_materno' => $request->apellido_materno ?? '',
            'user_id' => Auth::id(),
        ]);

        Estudiante::create($request->all());
        
        return redirect()->route('estudiante.create')->with('info', 'Información registrada exitosamente');
        // return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function show(Estudiante $estudiante)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function edit(Estudiante $estudiante)
    {
        if (Gate::allows('admin-only', auth()->user()))
        {
            return view('estudiante.estudiante-create', compact('estudiante'));
        } else {
            abort(403);
        }
        // return view('estudiante.estudiante-create', compact('estudiante'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estudiante $estudiante)
    {

        $request->validate([
            'nombre' => ['required', 'string', 'max:40'],
            'apellido_paterno' => ['required', 'string', 'max:40'],
            'apellido_materno' => ['max:40'],
            'fecha_nacimiento' => ['required'],
            'sexo' => ['required'],
            'codigo' => ['required', 'string'],
            'nrc' => ['required', 'string'],
        ]);

        $request->merge([
            'apellido_materno' => $request->apellido_materno ?? '',
        ]);

        Estudiante::where('id', $estudiante->id)->update($request->except('_token', '_method'));
        if (auth()->user()->rol->id == 1) {
            return redirect()->route('estudiante.edit', $estudiante)->with('info', 'Información registrada exitosamente');
        } else {
            return redirect()->route('estudiante.create')->with('info', 'Información registrada exitosamente');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estudiante $estudiante)
    {
        $estudiante->delete();
        return redirect()->route('admin.estudiantes');
    }

    
}
