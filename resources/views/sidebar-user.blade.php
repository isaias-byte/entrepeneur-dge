<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('img/logo/logo_udg.png') }}">
        </div>
        <div class="sidebar-brand-text mx-3">DGE</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard') }}">
            {{-- <i class="fas fa-fw fa-tachometer-alt"></i> --}}
            <i class="fas fa-home"></i>
            <span>Inicio</span></a>
    </li>
    @if (auth()->user()->rol->id != 1)
        <hr class="sidebar-divider">
        @if (auth()->user()->rol->id == 6 && auth()->user()->estudiante->embajador == '1')            
            <li class="nav-item">
                <a class="nav-link" href="{{ route('embajadorProyecto') }}" aria-expanded="true">

                    <i class="fas fa-project-diagram"></i>
                    <span>Proyecto</span>
                </a>
            </li>
        @endif
        <li class="nav-item">
            <a class="nav-link" href="  
                @switch(auth()->user()->rol->id)
                    @case(2)
                        
                    @break

                    @case(3)
                        {{-- Juez --}}
                        {{ route('juez.create') }}
                    @break

                    @case(4)
                        {{-- Profesor --}}
                        {{ route('profesor.create') }}
                    @break

                    @case(5)
                        {{-- Embajador --}}
                        {{ route('embajador.create') }}
                    @break

                    @case(6)
                        {{-- Estudiante --}}
                        {{ route('estudiante.create') }}
                    @break
                    @default
                        #
                @endswitch
            " 
            aria-expanded="true">
                {{-- <i class="far fa-fw fa-window-maximize"></i> --}}
                <i class="far fa-user"></i>
                <span>Mi Perfil</span>
            </a>
        </li>
        
    @endif
    
    <hr class="sidebar-divider">
    {{-- <div class="sidebar-heading">
      Features
  </div> --}}
    <li class="nav-item">
        <a class="nav-link" href="#" data-target="#collapseBootstrap" aria-expanded="true"
            aria-controls="collapseBootstrap">
            <i class="far fa-fw fa-window-maximize"></i>
            <span>Material Disponible</span>
        </a>
        
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
    @if (auth()->user()->rol->id == 1)
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.proyectosanti') }}">
                <i class="fas fa-history"></i>
                <span>Plan de negocios históricos</span>
            </a>
        </li>
    @endif
    
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-target="#collapseTable" aria-expanded="true"
            aria-controls="collapseTable">
            <i class="far fa-file-alt"></i>
            <span>Formatos</span>
        </a>
    </li>
    @if (auth()->user()->rol->id == 1)
        
    <hr class="sidebar-divider">
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('admin.estudiantes') }}" data-target="#collapseTable" aria-expanded="true"
            aria-controls="collapseTable">
            
            <i class="fas fa-user-graduate"></i>
            <span>Alumnos</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('admin.profesores') }}" data-target="#collapseTable" aria-expanded="true"
            aria-controls="collapseTable">
            <i class="fas fa-chalkboard-teacher"></i>
            <span>Profesores</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('admin.embajadores') }}" data-target="#collapseTable" aria-expanded="true"
            aria-controls="collapseTable">
            <i class="fas fa-chalkboard-teacher"></i>
            <span>Embajadores</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('admin.jueces') }}" data-target="#collapseTable" aria-expanded="true"
            aria-controls="collapseTable">
            <i class="fas fa-chalkboard-teacher"></i>
            <span>Jueces</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePage" aria-expanded="true"
            aria-controls="collapsePage">
            <i class="fas fa-fw fa-columns"></i>
            <span>Administración</span>
        </a>
        <div id="collapsePage" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Administración</h6>
                <a class="collapse-item" href="{{ route('adminUsuarios') }}">Usuarios</a>
            </div>
        </div>
    </li>
  @endif
    <hr class="sidebar-divider">
    <div class="version" id="version-ruangadmin">Version 1.1</div>
</ul>
