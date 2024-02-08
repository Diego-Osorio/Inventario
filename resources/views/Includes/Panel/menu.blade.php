<h6 class="navbar-heading text-muted">Menu</h6>
<ul class="navbar-nav">
    @if(auth()->check() && auth()->user()->role == 'admin')
        <li class="nav-item dropdown">
            <a class="nav-link nav-link-icon" href="{{url('/home')}}" id="navbar-default_dropdown_1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-cubes text-blue"> </i>
                <span class="">Inventario</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
                <a class="dropdown-item" href="{{url('/ingreso')}}"> Ir al Inventario</a>
                <a class="dropdown-item" href="{{url('/ingreso/create')}}">listar Producto</a>
                <a class="dropdown-item" href="{{url('/salida')}}">Modificar Productos</a>
                <a class="dropdown-item" href="{{url('/salida')}}">Eliminar  Productos</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link nav-link-icon" href="#" id="navbar-default_dropdown_2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-angle-double-right"> </i>
                <span class="">Ingreso</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbar-default_dropdown_2">
                <a class="dropdown-item" href="{{url('/ingreso/create')}}">Registrar nuevo Ingreso</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link nav-link-icon" href="#" id="navbar-default_dropdown_3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-angle-double-left"> </i>
                <span class="">Salida</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbar-default_dropdown_3">
                <a class="dropdown-item" href="{{url('/salida')}}">Registrar nuevo Salida</a>
                <a class="dropdown-item" href="#">Anular salida</a>
            </div>
        </li>
    @endif

    <li class="nav-item dropdown">
        <a class="nav-link nav-link-icon" href="#" id="navbar-default_dropdown_4" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-sitemap text-orange"> </i>
            <span class="">Categoria/Marca</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbar-default_dropdown_4">
            <a class="dropdown-item" href="{{url('/categorias')}}">Categoria</a>
            <a class="dropdown-item" href="{{url('/marca')}}">Marca</a>
            <a class="dropdown-item" href="{{url('/bodegas')}}">bodegas</a>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link " href="/usuario">
            <i class="ni ni-single-02 text-yellow"></i> Usuarios
        </a>
        @if(auth()->check() && auth()->user()->role == 'usuario')
            <li class="nav-item">
                <a class="nav-link " href="{{url('categorias')}}">
                    <i class="fas fa-sitemap text-orange"></i> Categoria
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{url('/ingreso')}}">
                    <i class="fas fa-cubes text-blue"></i> Productos
                </a>
            </li>
        @endif

        <li class="nav-item">
            <a class="nav-link" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('formLogout').submit();">
                <i class="fas fa-sign-out-alt"></i> Cerrar sesión
            </a>
            <form action="{{ route('logout') }}" method="post" style="display: none;" id="formLogout">
                @csrf
            </form>
        </li>
    </li>

    @if(auth()->check() && auth()->user()->role =='admin')
        <!-- Divider -->
        <hr class="my-3">
        <!-- Heading -->
        <h6 class="navbar-heading text-muted">Reportes</h6>
        <!-- Navigation -->
        <ul class="navbar-nav mb-md-3">
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="ni ni-send text-dark"></i> Soporte
                </a>
            </li>
        </ul>
        <ul class="navbar-nav">
            <li class="nav-item active active-pro">
                <a class="nav-link" href="./examples/upgrade.html">
                    <i>Sistema de Inventario</i>
                </a>
            </li>
        </ul>
    @endif
</ul>
