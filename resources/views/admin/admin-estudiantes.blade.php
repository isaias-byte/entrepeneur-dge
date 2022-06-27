@extends('layouts.ruang')

@section('sidebar')
    @include('sidebar-user')
@endsection

@section('user-nav')
    @include('nav-user')
@endsection

@section('content')
  {{-- <h1>Prueba admin Estudiantes</h1> --}}
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
          @foreach ($estudiantes as $estudiante)
            <tr>            
              <td>
                <a href="{{ route('estudiante.edit', $estudiante) }}">{{ $estudiante->nombre }}</a>
              </td>
              <td>{{ $estudiante->apellido_paterno }}</td>
              <td>{{ $estudiante->apellido_materno }}</td>
              <td>{{ $estudiante->fecha_nacimiento }}</td>
              <td>{{ $estudiante->sexo }}</td>
              <td>{{ $estudiante->codigo }}</td>
              <td>{{ $estudiante->nrc }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

@endsection


