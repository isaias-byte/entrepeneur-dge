<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use App\Models\Estudiante;
use App\Models\Profesor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AdministradorController extends Controller
{

    public function adminUsuarios() {
        if (Gate::allows('admin-only', auth()->user()))
        {
            $usuarios = User::all();
            return view('admin.admin-users', compact('usuarios'));
        } else {
            abort(403);
        }
    }

    public function adminEstudiantes() {
        if (Gate::allows('admin-only', auth()->user()))
        {
            $estudiantes = Estudiante::all();
            return view('admin.admin-estudiantes', compact('estudiantes'));
        } else {
            abort(403);
        }
        
    }

    public function adminProfesores() {
        if (Gate::allows('admin-only', auth()->user()))
        {
            $profesores = Profesor::with('nrcs')->get();
            return view('admin.admin-profesores', compact('profesores'));
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Administrador  $administrador
     * @return \Illuminate\Http\Response
     */
    public function show(Administrador $administrador)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Administrador  $administrador
     * @return \Illuminate\Http\Response
     */
    public function edit(Administrador $administrador)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Administrador  $administrador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Administrador $administrador)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Administrador  $administrador
     * @return \Illuminate\Http\Response
     */
    public function destroy(Administrador $administrador)
    {
        //
    }
}
