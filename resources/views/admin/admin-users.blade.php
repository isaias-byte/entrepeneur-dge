@extends('layouts.ruang')

@section('sidebar')
    @include('sidebar-user')
@endsection

@section('user-nav')
    @include('nav-user')
@endsection

@section('content')
<div class="card mb-4">
  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
    <h6 class="m-0 font-weight-bold text-primary">Usuarios</h6>
  </div>
  <div class="table-responsive p-3">
    <table class="table align-items-center table-flush" id="dataTable">
      <thead class="thead-light">
        <tr>
          <th>Nombre</th>
          <th>Apellido Paterno</th>
          <th>Apellido Materno</th>
          <th>Correo</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th>Nombre</th>
          <th>Apellido Paterno</th>
          <th>Apellido Materno</th>
          <th>Correo</th>
        </tr>
      </tfoot>
      <tbody>
        @foreach ($usuarios as $usuario)
          <tr>            
            {{-- <td>
              <a href="{{ route('estudiante.edit', $estudiante) }}">{{ $estudiante->nombre }}</a>
            </td> --}}
            <td>{{ $usuario->name }}</td>
            <td>{{ $usuario->apellido_paterno }}</td>
            <td>{{ $usuario->apellido_materno }}</td>
            <td>{{ $usuario->email }}</td>          
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection