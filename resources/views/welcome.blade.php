@extends('layouts.ruang')

@section('user-nav')
    <div class="text-white">
        <h5 class="text-left">División de Gestión Empresarial</h5>
        <h5 class="text-left">Emprendimiento DGE</h5>

    </div>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown no-arrow">
          <li class="nav-item dropdown no-arrow mx-1">
              <div class="nav-link">
                <button type="button" class="btn btn-success mb-1">Iniciar Sesión</button>
              </div>
          </li>
        <div class="topbar-divider d-none d-sm-block"></div>
        <li class="nav-item dropdown no-arrow">
            <div class="nav-link">
              <button type="button" class="btn btn-light mb-1">Registrarse</button>
            </div>
        </li>
    </ul>
@endsection

@section('content')

<div class="mx-auto" style="width: 1000px;">

  
  <h1 class="text-center">Emprendimiento DGE</h1>
  <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium facere itaque ea molestiae? Neque voluptatum eaque incidunt nobis eos blanditiis explicabo ad magnam provident suscipit. Accusantium magni expedita laboriosam odit.</p>
</div>
  
    <div class="mx-auto" style="width: 800px;">

    
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
          <div class="carousel-item active">
              <img class="d-block w-100" src="{{ asset('img/inicio-1.jpeg') }}" alt="Notaria11 y 108 Imagen 1">
          </div>
          <div class="carousel-item">
              <img class="d-block w-100" src="{{ asset('img/inicio-2.jpeg') }}" alt="Notaria11 y 108 Imagen 2">
          </div>
          <div class="carousel-item">
              <img class="d-block w-100" src="{{ asset('img/inicio-3.jpg') }}" alt="Notaria11 y 108 Imagen 3">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="{{ asset('img/inicio-4.jpg') }}" alt="Notaria11 y 108 Imagen 3">
          </div>
          
      </div>
      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
      </a>
  </div>
    {{-- <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/inicio">Home</a></li>
        <li class="breadcrumb-item">Pages</li>
        <li class="breadcrumb-item active" aria-current="page">Blank Page</li>
    </ol> --}}
@endsection
