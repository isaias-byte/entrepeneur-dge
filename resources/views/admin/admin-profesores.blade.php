@extends('layouts.ruang')

@section('css_files')
  @include('css_files.css-form')
@endsection

@section('sidebar')
    @include('sidebar-user')
@endsection

@section('user-nav')
    @include('nav-user')
@endsection

@section('content')
    <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Profesores</h6>
        </div>
        <div class="table-responsive p-3">
            <table class="table align-items-center table-flush" id="dataTable">
                <thead class="thead-light">
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Fecha de Nacimiento</th>
                        <th>Sexo</th>
                        <th>Código</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Fecha de Nacimiento</th>
                        <th>Sexo</th>
                        <th>Código</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($profesores as $profesor)
                        <tr>
                            <td>
                                <a href="{{ route('profesor.edit', $profesor) }}">{{ $profesor->nombre }}</a>
                            </td>
                            <td>{{ $profesor->apellido_paterno }}</td>
                            <td>{{ $profesor->apellido_materno }}</td>
                            <td>{{ $profesor->fecha_nacimiento }}</td>
                            <td>{{ $profesor->sexo }}</td>
                            <td>{{ $profesor->codigo }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
  @include('scripts.script-admin')
@endsection
