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
    <h1>{{ $profesor->nombre_completo }}</h1>
    <div class="row">
        <div class="col-lg-6">
            <!-- Form Basic -->
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Materias</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('profesor.nrc', $profesor) }}" method="POST">
                        @csrf 
                        <div class="form-group">
                            {{-- <label for="nrc_id">Nombre de las materias</label> --}}
                            {{-- <select id="nrc_id" name="nrc_id[]" class="form-control" multiple=""> --}}
                            <label for="select2Multiple">Agregar Materias</label>
                            <select class="select2-multiple form-control" name="nrc_id[]" multiple="multiple" id="select2Multiple">
                                @foreach ($nrcs as $nrc)
                                    <option value="{{ $nrc->id }}" {{ array_search($nrc->id, $profesor->nrcs->pluck('id')->toArray()) !== false ? 'selected' : ''}}>{{ $nrc->materia }}</option>
                                    
                                
                                
                                {{-- <option value="Papua">Papua</option> --}}
                                @endforeach
                            </select>
                            @error('nrc_id')
                                <div class="text-danger"> {{ $message }} </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Actualizar Materias</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <!-- General Element -->
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Materias Seleccionadas</h6>
                </div>
                <div class="card-body">
                    <ul>
                        @foreach ($profesor->nrcs as $nrc)
                            <li>{{ $nrc->materia }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @include('scripts.script-admin')
@endsection