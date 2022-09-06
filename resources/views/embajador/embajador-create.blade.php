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
                                src="{{ $embajador->user->profile_photo_path == null ? \App\Models\User::find($embajador->user->id)->profile_photo_url : asset($embajador->user->profile_photo_path) }}"
                                style="border-radius: 50%" width="110" height="110">
                            <div class="user-info text-center">
                                <h4>{{ $embajador->user->name }}</h4>
                                <p class="badge bg-primary text-uppercase text-white">{{ $embajador->user->rol->rol }}
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
                                    <span>{{ $embajador->user->name }} {{ $embajador->user->apellido_paterno }}
                                        {{ $embajador->user->apellido_materno }}</span>
                                </div>
                                <div class="col-sm-4 text-center"></div>
                            </div>
                            <div class="row d-flex justify-content-center mt-1">
                                <div class="col-sm-8">
                                    <span class="fw-bolder me-25">Correo: </span>
                                    <span>{{ $embajador->user->email }}</span>
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
                                        <span class="text">Eliminar Embajador</span>
                                    </button>
                                </div>
                                {{-- <div class="col-sm-4 text-center"></div> --}}
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
                    @if (isset($embajador->user_id))
                    <form action="{{ route('embajador.update', $embajador) }}" method="post">
                            @method('PATCH')
                    @else
                        <form action="{{ route('embajador.store') }}" method="post">
                        @endif
                        @csrf
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input wire:model=".institucion_origen" type="text" id="nombre" name="nombre"
                                class="form-control @error('nombre') is-invalid @enderror"
                                value="{{ old('nombre') ?? ($embajador->nombre ?? '') }}">
                            @error('nombre')
                                <div class="text-danger"> {{ $message }} </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="nombre">Apellido Paterno</label>
                            <input type="text" id="apellido_paterno" name="apellido_paterno"
                                class="form-control @error('apellido_paterno') is-invalid @enderror"
                                value="{{ old('apellido_paterno') ?? ($embajador->apellido_paterno ?? '') }}">
                            @error('apellido_paterno')
                                <div class="text-danger"> {{ $message }} </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="nombre">Apellido Materno</label>
                            <input type="text" id="apellido_materno" name="apellido_materno"
                                class="form-control @error('apellido_materno') is-invalid @enderror"
                                value="{{ old('apellido_materno') ?? ($embajador->apellido_materno ?? '') }}">
                            @error('apellido_materno')
                                <div class="text-danger"> {{ $message }} </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="nombre">Teléfono</label>
                            <input type="text" id="telefono" name="telefono"
                                class="form-control @error('telefono') is-invalid @enderror"
                                value="{{ old('telefono') ?? ($embajador->telefono ?? '') }}">
                            @error('telefono')
                                <div class="text-danger"> {{ $message }} </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="profesor_id">Profesor</label>
                            <select class="form-control" id="profesor_id" name="profesor_id">
                                @foreach ($profesores as $profe)
                                        <option value="{{ $profe->id }}" aria-placeholder="Seleccione un profesor">{{ $profe->getNombreCompletoAttribute() }}</option>
                            
                                    @endforeach
                            </select>
                        </div>

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
        @if (isset($embajador->user_id))
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
                        <form action="{{ route('embajador.destroy', $embajador) }}" method="POST">
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
