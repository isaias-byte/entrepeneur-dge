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
    @if (session('info'))
        <div class="col-lg-4">
            <div class="alert alert-success" id="success-alert">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <strong>¡Éxito! </strong> {{ session('info') }}
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-lg-4">
            <!-- Form Basic -->
            <div class="card mb-4">
                <div class="card-body">
                    <div class="d-flex align-items-center flex-column">
                        @if (auth()->user()->rol->id != 1)
                            <img class="img-fluid mt-3 mb-2"
                                src="{{ auth()->user()->profile_photo_path == null ? \App\Models\User::find(auth()->user()->id)->profile_photo_url : asset(auth()->user()->profile_photo_path) }}"
                                style="border-radius: 50%" width="110" height="110">
                            <div class="user-info text-center">
                                <h4>{{ auth()->user()->name }}</h4>
                                <p class="badge bg-primary text-uppercase text-white">{{ auth()->user()->rol->rol }}</p>
                            </div>
                        @else
                            <img class="img-fluid mt-3 mb-2"
                                src="{{ $estudiante->user->profile_photo_path == null ? \App\Models\User::find($estudiante->user->id)->profile_photo_url : asset($estudiante->user->profile_photo_path) }}"
                                style="border-radius: 50%" width="110" height="110">
                            <div class="user-info text-center">
                                <h4>{{ $estudiante->user->name }}</h4>
                                <p class="badge bg-primary text-uppercase text-white">{{ $estudiante->user->rol->rol }}
                                </p>
                            </div>
                        @endif
                    </div>
                    <div class="info-container">
                        @if (auth()->user()->rol->id != 1)
                            <div class="row mt-1">
                                <div class="col-sm-8">
                                    <span class="fw-bolder me-25">Nombre: </span>
                                    <span>{{ auth()->user()->name }} {{ auth()->user()->apellido_paterno }}
                                        {{ auth()->user()->apellido_materno }}</span>
                                </div>
                                <div class="col-sm-4 text-center"></div>
                            </div>
                            <div class="row d-flex justify-content-center mt-1">
                                <div class="col-sm-8">
                                    <span class="fw-bolder me-25">Correo: </span>
                                    <span>{{ auth()->user()->email }}</span>
                                </div>
                                <div class="col-sm-4 text-center"></div>
                            </div>
                        @else
                            <div class="row mt-1">
                                <div class="col-sm-8">
                                    <span class="fw-bolder me-25">Nombre: </span>
                                    <span>{{ $estudiante->user->name }} {{ $estudiante->user->apellido_paterno }}
                                        {{ $estudiante->user->apellido_materno }}</span>
                                </div>
                                <div class="col-sm-4 text-center"></div>
                            </div>
                            <div class="row d-flex justify-content-center mt-1">
                                <div class="col-sm-8">
                                    <span class="fw-bolder me-25">Correo: </span>
                                    <span>{{ $estudiante->user->email }}</span>
                                </div>
                                <div class="col-sm-4 text-center"></div>
                            </div>
                            <div class="row d-flex mt-1">
                                <div class="col text-center">
                                    <button type="button" class="btn btn-danger btn-icon-split" data-toggle="modal"
                                        data-target="#exampleModal" id="#myBtn">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                        <span class="text">Eliminar Alumno</span>
                                    </button>
                                </div>
                                <div class="col-sm-4 text-center"></div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <!-- General Element -->
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Registro</h6>
                </div>
                <div class="card-body">
                    @if (isset($estudiante->user_id))
                        <form action="{{ route('estudiante.update', $estudiante) }}" method="post">
                            @method('PATCH')
                        @else
                            <form action="{{ route('estudiante.store') }}" method="post">
                    @endif
                    @csrf
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input wire:model=".institucion_origen" type="text" id="nombre" name="nombre"
                            class="form-control @error('nombre') is-invalid @enderror"
                            value="{{ old('nombre') ?? ($estudiante->nombre ?? '') }}">
                        @error('nombre')
                            <div class="text-danger"> {{ $message }} </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="apellido_paterno">Apellido Paterno</label>
                        <input type="text" id="apellido_paterno" name="apellido_paterno"
                            class="form-control @error('apellido_paterno') is-invalid @enderror"
                            value="{{ old('apellido_paterno') ?? ($estudiante->apellido_paterno ?? '') }}">
                        @error('apellido_paterno')
                            <div class="text-danger"> {{ $message }} </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="apellido_materno">Apellido Materno</label>
                        <input type="text" id="apellido_materno" name="apellido_materno"
                            class="form-control @error('apellido_materno') is-invalid @enderror"
                            value="{{ old('apellido_materno') ?? ($estudiante->apellido_materno ?? '') }}">
                        @error('apellido_materno')
                            <div class="text-danger"> {{ $message }} </div>
                        @enderror
                    </div>

                    <div class="form-group" id="simple-date1">
                        <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                        <div class="input-group date">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            </div>
                            <input type="text" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento"
                                value="{{ old('fecha_nacimiento') ?? ($estudiante->fecha_nacimiento ?? '') }}"
                                placeholder="dd/mm/yyyy">
                        </div>
                        @error('fecha_nacimiento')
                            <div class="text-danger"> {{ $message }} </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="sexo">Sexo</label>
                        <select id="sexo" name="sexo"
                            class="form-control mb-3 @error('sexo') is-invalid @enderror"
                            value="{{ old('sexo') ?? ($estudiante->sexo ?? '') }}">
                            <option>Masculino</option>
                            <option>Femenino</option>
                        </select>
                        @error('sexo')
                            <div class="text-danger"> {{ $message }} </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="codigo">Código</label>
                        <input type="text" id="codigo" name="codigo"
                            class="form-control @error('codigo') is-invalid @enderror"
                            value="{{ old('codigo') ?? ($estudiante->codigo ?? '') }}">
                        @error('codigo')
                            <div class="text-danger"> {{ $message }} </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="nrc">NRC</label>
                        <input type="text" id="nrc" name="nrc"
                            class="form-control @error('nrc') is-invalid @enderror"
                            value="{{ old('nrc') ?? ($estudiante->nrc ?? '') }}">
                        @error('nrc')
                            <div class="text-danger"> {{ $message }} </div>
                        @enderror
                    </div>

                    @if (auth()->user()->rol->id == 1) 
                        <div class="form-group">
                            <label for="embajador">Embajador</label>
                            <select id="embajador" name="embajador"
                                class="form-control mb-3 @error('embajador') is-invalid @enderror"
                                value="{{ old('embajador') ?? ($estudiante->embajador ?? '') }}">
                                <option value="0">Estudiante</option>
                                <option value="1">Embajador</option>
                            </select>
                            @error('embajador')
                                <div class="text-danger"> {{ $message }} </div>
                            @enderror
                        </div>
                    @endif

                    @if (auth()->user()->rol->id == 6 && auth()->user()->estudiante->embajador == '1')
                        <div class="form-group">
                            <label for="profesor_id">Profesor</label>
                            <select class="form-control" id="profesor_id" name="profesor_id" selected>
                                @foreach ($profesores as $profe)
                                        <option value="{{ $profe->id }}" aria-placeholder="Seleccione un profesor" selected>{{ $profe->getNombreCompletoAttribute() }}</option>
                            
                                    @endforeach
                            </select>
                        </div>
                    @endif

                    <button type="submit" class="btn btn-success btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-check"></i>
                        </span>
                        <span class="text">Guardar</span>
                    </button>

                    

                    </form>
                </div>
            </div>

        </div>
        @if (isset($estudiante->user_id))
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Eliminar Registro</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>¿Está seguro que desea eliminar este registro?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancelar</button>
                        <form action="{{ route('estudiante.destroy', $estudiante) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Eliminar" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
@endsection

@section('scripts')
    @include('scripts.script-form')
@endsection
