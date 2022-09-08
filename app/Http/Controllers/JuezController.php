<?php

namespace App\Http\Controllers;

use App\Models\Juez;
use Illuminate\Http\Request;

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
        $profesores = Profesor::get();
        return view('juez.juez-create', compact('juez', 'profesores'));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Juez  $juez
     * @return \Illuminate\Http\Response
     */
    public function destroy(Juez $juez)
    {
        //
    }
}
