@extends('layouts.ruang')

@section('sidebar')
    @include('sidebar-user')
@endsection

@section('user-nav')
    @include('nav-user')
@endsection

@section('content')
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
                                src="{{ $profesor->user->profile_photo_path == null ? \App\Models\User::find($profesor->user->id)->profile_photo_url : asset($profesor->user->profile_photo_path) }}"
                                style="border-radius: 50%" width="110" height="110">
                            <div class="user-info text-center">
                                <h4>{{ $profesor->user->name }}</h4>
                                <p class="badge bg-primary text-uppercase text-white">{{ $profesor->user->rol->rol }}</p>
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
                            <div class="row d-flex mt-1">
                                <div class="col text-center">
                                    <a href="{{ route('profesorShow', $profesor) }}" class="btn btn-info btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-info-circle"></i>
                                        </span>
                                        <span class="text">Añadir NRC'S</span>
                                    </a>
                                </div>
                                <div class="col-sm-4 text-center"></div>
                            </div>
                        @else
                            <div class="row mt-1">
                                <div class="col-sm-8">
                                    <span class="fw-bolder me-25">Nombre: </span>
                                    <span>{{ $profesor->user->name }} {{ $profesor->user->apellido_paterno }}
                                        {{ $profesor->user->apellido_materno }}</span>
                                </div>
                                <div class="col-sm-4 text-center"></div>
                            </div>
                            <div class="row d-flex justify-content-center mt-1">
                                <div class="col-sm-8">
                                    <span class="fw-bolder me-25">Correo: </span>
                                    <span>{{ $profesor->user->email }}</span>
                                </div>
                                <div class="col-sm-4 text-center"></div>
                            </div>
                            <div class="row d-flex mt-1">
                                <div class="col text-center">
                                    <button type="button" class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#exampleModal" id="#myBtn">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                        <span class="text">Eliminar Profesor</span>
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
                    @if (isset($profesor->user_id))
                        <form action="{{ route('profesorUpdate', $profesor) }}" method="post">
                            @method('PATCH')
                        @else
                            <form action="{{ route('profesorStore') }}" method="post">
                    @endif
                    @csrf
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input wire:model=".institucion_origen" type="text" id="nombre" name="nombre"
                            class="form-control @error('nombre') is-invalid @enderror"
                            value="{{ old('nombre') ?? ($profesor->nombre ?? '') }}">
                        @error('nombre')
                            <div class="text-danger"> {{ $message }} </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="nombre">Apellido Paterno</label>
                        <input type="text" id="apellido_paterno" name="apellido_paterno"
                            class="form-control @error('apellido_paterno') is-invalid @enderror"
                            value="{{ old('apellido_paterno') ?? ($profesor->apellido_paterno ?? '') }}">
                        @error('apellido_paterno')
                            <div class="text-danger"> {{ $message }} </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="nombre">Apellido Materno</label>
                        <input type="text" id="apellido_materno" name="apellido_materno"
                            class="form-control @error('apellido_materno') is-invalid @enderror"
                            value="{{ old('apellido_materno') ?? ($profesor->apellido_materno ?? '') }}">
                        @error('apellido_materno')
                            <div class="text-danger"> {{ $message }} </div>
                        @enderror
                    </div>

                    <div class="form-group" id="simple-date1">
                        <label for="publication">Fecha de Nacimiento</label>
                        <div class="input-group date">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            </div>
                            <input type="text" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento"
                                value="{{ old('fecha_nacimiento') ?? ($profesor->fecha_nacimiento ?? '') }}"
                                placeholder="dd/mm/yyyy">
                        </div>
                        @error('fecha_nacimiento')
                            <div class="text-danger"> {{ $message }} </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="nombre">Sexo</label>
                        <select id="sexo" name="sexo" class="form-control mb-3 @error('sexo') is-invalid @enderror"
                            value="{{ old('sexo') ?? ($profesor->sexo ?? '') }}">
                            <option>Masculino</option>
                            <option>Femenino</option>
                        </select>
                        @error('sexo')
                            <div class="text-danger"> {{ $message }} </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="nombre">Código</label>
                        <input type="text" id="codigo" name="codigo"
                            class="form-control @error('codigo') is-invalid @enderror"
                            value="{{ old('codigo') ?? ($profesor->codigo ?? '') }}">
                        @error('codigo')
                            <div class="text-danger"> {{ $message }} </div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="nombre">Sexo</label>
                        <select id="sexo" name="sexo" class="form-control mb-3 @error('sexo') is-invalid @enderror"
                            value="{{ old('sexo') ?? ($estudiante->sexo ?? '') }}">
                            <option>Masculino</option>
                            <option>Femenino</option>
                        </select>

                        @error('sexo')
                            <div class="text-danger"> {{ $message }} </div>
                        @enderror
                    </div>

                    {{-- <div class="form-group">
                      <label for="nombre">Nrc</label>
                      <select id="nrc_id" name="nrc_id[]" multiple="" class="form-control mb-3 @error('nrc_id') is-invalid @enderror" value="{{ old('nrc_id') ?? ($profesor->nrc_id ?? '') }}">
                        @foreach ($nrcs as $nrc)
                            <option value="{{ $nrc->id }}" 
                              {{ array_search($nrc->id, $profesor->nrc->pluck('id')->toArray()) !== false ? 'selected' : ''}}>
                              {{ $nrc->materia }}</option>
                        @endforeach
                      </select>
                      @error('nrc_id')
                          <div class="text-danger"> {{ $message }} </div>
                      @enderror
                    </div> --}}

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
                  <form action="{{ route('profesorDestroy', $profesor) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Eliminar" class="btn btn-primary">
                    </form>
                </div>
              </div>
            </div>
          </div>
    </div>
@endsection
