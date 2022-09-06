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
    <div class="col-lg-12">
        @if (session('info'))            
            <div class="alert alert-success" id="success-alert">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <strong>¡Éxito! </strong> {{ session('info') }}
            </div>          
        @endif
        <!-- Four directions -->
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h4 class="m-0 font-weight-bold text-primary">Actualizar contraseña</h4>
            </div>

            @if ($errors->updatePassword->any())
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <h6><i class="fas fa-ban"></i><b> Verifique los datos del formulario </b></h6>
                    <p>
                        <ul>
                            @foreach ($errors->updatePassword->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </p>
                </div>
            @endif

            <div class="card-body">
                <p>Asegúrese que su cuenta esté usando una contraseña larga y aleatoria para mantenerse seguro.</p>
                <br>
                <form action="{{ route('user-password.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="current_password">Contraseña Actual</label>
                        <input type="password" class="form-control @error('current_password') is-invalid @enderror"
                            placeholder="Contraseña Actual" id="current_password" name="current_password">
                        @error('current_password')
                            <div class="text-danger"> {{ $message }} </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña Nueva</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            placeholder="Contraseña Nueva" id="password" name="password">
                        @error('password')
                            <div class="text-danger"> {{ $message }} </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Confirmar Nueva Contraseña</label>
                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                            id="password_confirmation" name="password_confirmation" placeholder="Confirmar contraseña">
                        @error('password_confirmation')
                            <div class="text-danger"> {{ $message }} </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-check"></i>
                            </span>
                            <span class="text">Guardar</span>
                        </button>
                        {{-- <button type="submit" class="btn btn-primary btn-block">Guardar</button> --}}
                    </div>

                </form>
            </div>
        </div>
        {{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
        </div> --}}
    </div>
@endsection

@section('scripts')
    @include('scripts.script-form')
@endsection