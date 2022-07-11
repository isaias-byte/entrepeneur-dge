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
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Añade tu Pitch (Video) y plan de negocios</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <h5>Pitch (Video)</h5>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input @error('pitch') is-invalid @enderror" id="pitch" name="pitch" accept="video/*">
                            <label class="custom-file-label" for="imagen2">Pitch (Video)</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <h5>Plan de Negocios</h5>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input @error('plan_negocios') is-invalid @enderror" id="plan_negocios" name="plan_negocios">
                            <label class="custom-file-label" for="imagen2">Plan de Negocios</label>
                        </div>
                    </div>
                </div>
                
            </div>
            
        </div>
    </div>
    
@endsection

@section('scripts')
    @include('scripts.script-form')
    <script>
        $('input[type="file"]').change(function(e){
            var fileName = e.target.files[0].name;
            $(e.target).siblings('.custom-file-label').text(fileName);
        });
    </script>
@endsection
