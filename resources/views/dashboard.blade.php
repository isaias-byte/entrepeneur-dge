@extends('layouts.ruang')

@section('sidebar')
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
            <div class="sidebar-brand-icon">
                <img src="{{ asset('img/logo/logo_udg.png') }}">
            </div>
            <div class="sidebar-brand-text mx-3">DGE</div>
        </a>
        <hr class="sidebar-divider my-0">
        <li class="nav-item active">
            <a class="nav-link" href="#">
                {{-- <i class="fas fa-fw fa-tachometer-alt"></i> --}}
                <i class="fas fa-home"></i>
                <span>Inicio</span></a>
        </li>
        <hr class="sidebar-divider">
        <li class="nav-item">
            <a class="nav-link" href="#" 
                aria-expanded="true">
                {{-- <i class="far fa-fw fa-window-maximize"></i> --}}
                <i class="fas fa-project-diagram"></i>
                <span>Mi Proyecto</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('estudiante.create') }}" 
                aria-expanded="true">
                {{-- <i class="far fa-fw fa-window-maximize"></i> --}}
                <i class="far fa-user"></i>
                <span>Mi Perfil</span>
            </a>
        </li>
        <hr class="sidebar-divider">
        {{-- <div class="sidebar-heading">
            Features
        </div> --}}
        <li class="nav-item">
            <a class="nav-link" href="#" data-target="#collapseBootstrap"
                aria-expanded="true" aria-controls="collapseBootstrap">
                <i class="far fa-fw fa-window-maximize"></i>
                <span>Material Disponible</span>
            </a>
            {{-- <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Bootstrap UI</h6>
                    <a class="collapse-item" href="alerts.html">Alerts</a>
                    <a class="collapse-item" href="buttons.html">Buttons</a>
                    <a class="collapse-item" href="dropdowns.html">Dropdowns</a>
                    <a class="collapse-item" href="modals.html">Modals</a>
                    <a class="collapse-item" href="popovers.html">Popovers</a>
                    <a class="collapse-item" href="progress-bar.html">Progress Bars</a>
                </div>
            </div>
        </li> --}}
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-target="#collapseForm" aria-expanded="true"
                aria-controls="collapseForm">
                <i class="fab fa-fw fa-wpforms"></i>
                <span>Emprende CUCEA</span>
            </a>
            {{-- <div id="collapseForm" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Forms</h6>
                    <a class="collapse-item" href="form_basics.html">Form Basics</a>
                    <a class="collapse-item" href="form_advanceds.html">Form Advanceds</a>
                </div>
            </div> --}}
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-target="#collapseTable" aria-expanded="true"
                aria-controls="collapseTable">
                <i class="fas fa-fw fa-table"></i>
                <span>Proyectos Antiguos</span>
            </a>
            {{-- <div id="collapseTable" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Tables</h6>
                    <a class="collapse-item" href="simple-tables.html">Simple Tables</a>
                    <a class="collapse-item" href="datatables.html">DataTables</a>
                </div>
            </div> --}}
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fas fa-history"></i>
                <span>Plan de negocios históricos</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-target="#collapseTable" aria-expanded="true"
                aria-controls="collapseTable">
                <i class="far fa-file-alt"></i>
                <span>Formatos</span>
            </a>
        </li>
        <hr class="sidebar-divider">
        {{-- <div class="sidebar-heading">
            Examples
        </div> --}}
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePage" aria-expanded="true"
                aria-controls="collapsePage">
                <i class="fas fa-fw fa-columns"></i>
                <span>Administración</span>
            </a>
            <div id="collapsePage" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Administración</h6>
                    <a class="collapse-item" href="#">Alumnos</a>
                    <a class="collapse-item" href="#">Profesores</a>
                    <a class="collapse-item" href="#">Jueces</a>
                    <a class="collapse-item" href="#">Embajadores</a>
                    <a class="collapse-item" href="#">Administradores</a>
                </div>
            </div>
        </li>
        {{-- <li class="nav-item">
            <a class="nav-link" href="charts.html">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Charts</span>
            </a>
        </li> --}}
        <hr class="sidebar-divider">
        <div class="version" id="version-ruangadmin">Version 1.1</div>
    </ul>
@endsection



@section('user-nav')
    <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>
    <ul class="navbar-nav ml-auto">
    
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-1 small"
                            placeholder="What do you want to look for?" aria-label="Search" aria-describedby="basic-addon2"
                            style="border-color: #3f51b5;">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>
        <div class="topbar-divider d-none d-sm-block"></div>
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" src="img/boy.png" style="max-width: 60px">
                <span class="ml-2 d-none d-lg-inline text-white small">User Test</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-leabelledby="userDropdown">
                <div class="dropdown-item">
                    <h6>Configuración de la Cuenta</h6>
                </div>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Cuenta
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal" onclick="event.preventDefault(); this.closest('form').submit();">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Cerrar Sesión
                    </a>
                </form>
            </div>
        </li>
    </ul>
@endsection

@section('content')

@endsection


