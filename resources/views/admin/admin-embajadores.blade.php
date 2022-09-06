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
    {{-- <h1>Prueba admin Estudiantes</h1> --}}
    @if (session('info'))
        <div class="col-lg-4">
            <div class="alert alert-success" id="success-alert">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <strong>¡Éxito! </strong> {{ session('info') }}
            </div>
        </div>
    @endif
    <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Alumnos</h6>
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
                        <th>NRC Inscrito</th>
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
                        <th>NRC Inscrito</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($embajadores as $embajador)
                        <tr>
                            <td>
                                <a href="{{ route('embajador.edit', $embajador) }}">{{ $embajador->nombre }}</a>
                            </td>
                            <td>{{ $embajador->apellido_paterno }}</td>
                            <td>{{ $embajador->apellido_materno }}</td>
                            <td>{{ $embajador->fecha_nacimiento }}</td>
                            <td>{{ $embajador->sexo }}</td>
                            <td>{{ $embajador->codigo }}</td>
                            <td>{{ $embajador->nrc }}</td>
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
