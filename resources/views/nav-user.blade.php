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
            <img class="img-profile rounded-circle" src="{{auth()->user()->profile_photo_path == null ? \App\Models\User::find(auth()->user()->id)->profile_photo_url : asset(auth()->user()->profile_photo_path)}}" style="max-width: 60px">
            <div class="text-center">
                <h5 class="ml-2 d-none d-lg-inline text-white">{{auth()->user()->name}}</h4>
                <br>
                <span class="ml-2 d-none d-lg-inline text-white small">{{auth()->user()->rol->rol}}</span>
            </div>
        </a>
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-leabelledby="userDropdown">
            <div class="dropdown-item">
                <h6>Configuración de la Cuenta</h6>
            </div>
            <div class="dropdown-divider"></div>
            
                <a class="dropdown-item" href="{{ route('user.cuenta')}}">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Cuenta
            </a>
            
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal"
                    onclick="event.preventDefault(); this.closest('form').submit();">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Cerrar Sesión
                </a>
            </form>
        </div>
    </li>
</ul>
