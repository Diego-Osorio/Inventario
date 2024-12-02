
<div class="text-center mb-4">
<div class="d-flex align-items-center">
    <!-- Imagen de usuario -->
    <span class="avatar avatar-sm rounded-circle">
        <img alt="Imagen de usuario" 
             src="{{ auth()->user()->profile_image ? asset('storage/' . auth()->user()->profile_image) : asset('img/theme/default-avatar.jpg') }}" 
             class="img-fluid" style="width: 40px; height: 40px;">
    </span>
    
    <!-- Información del usuario -->
    <div class="ms-3 text-start">
    <h6 class="mb-0">{{ auth()->user()->name }}</h6>
    <h5 class="text-muted mt-1 mb-0">{{ auth()->user()->role }}</h5>
</div>

</div>  
</div>

<h6 class="navbar-heading text-muted">Menú</h6>
<ul class="navbar-nav">

  <!-- Inventario -->
  @if(auth()->check() && auth()->user()->role == 'admin')
  <li class="nav-item dropdown">
    <a class="nav-link nav-link-icon" href="{{url('/home')}}" id="navbar-default_dropdown_1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-cubes text-blue"></i>
      <span class="">Inventario</span>
    </a>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
      <a class="dropdown-item" href="{{url('/ingreso')}}">Inventario</a>
      <a class="dropdown-item" href="{{url('/ingreso/create')}}"> Ingresar Productos</a>
      
    </div>
  </li>
  @endif

  <!-- Ingreso
  <li class="nav-item dropdown">
    <a class="nav-link nav-link-icon" href="#" id="navbar-default_dropdown_2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-angle-double-right"></i>
      <span class="">Ingreso</span>
    </a>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbar-default_dropdown_2">
      <a class="dropdown-item" href="{{url('/ingreso/create')}}">Registrar Nuevo Ingreso</a>
    </div>
  </li> -->

  <!-- Salida -->
  <!-- <li class="nav-item dropdown">
    <a class="nav-link nav-link-icon" href="#" id="navbar-default_dropdown_3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-angle-double-left"></i>
      <span class="">Salida</span>
    </a>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbar-default_dropdown_3">
      <a class="dropdown-item" href="{{url('/salida')}}">Registrar Nueva Salida</a>
      <a class="dropdown-item" href="#">Anular Salida</a>
    </div>
  </li> -->

  <!-- Categoría/Marca/Bodegas -->
  <li class="nav-item dropdown">
    <a class="nav-link nav-link-icon" href="#" id="navbar-default_dropdown_4" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-sitemap text-orange"></i>
      <span class="">Categoría/Marca/Bodegas</span>
    </a>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbar-default_dropdown_4">
      <a class="dropdown-item" href="{{url('/categorias')}}">Categoría</a>
      <a class="dropdown-item" href="{{url('/marca')}}">Marca</a>
      <a class="dropdown-item" href="{{url('/bodegas')}}">Bodegas</a>
    </div>
  </li>

  <!-- Usuarios -->
  <li class="nav-item">
    <a class="nav-link" href="/usuario">
      <i class="ni ni-single-02 text-yellow"></i> Usuarios
    </a>
  </li>

  <!-- Cerrar Sesión -->
 <!-- <li class="nav-item">
    <a class="nav-link" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('formLogout').submit();">
      <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
    </a>
    <form action="{{ route('logout') }}" method="post" style="display: none;" id="formLogout">
      @csrf
    </form>
  </li>

  <!-- Reportes -->
  @if(auth()->check() && auth()->user()->role =='admin')
  <li class="nav-item dropdown">
    <a class="nav-link nav-link-icon" href="#" id="navbar-default_dropdown_5" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="ni ni-single-copy-04"></i>
      <span class="">Reportes</span>
    </a>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbar-default_dropdown_5">
      <a class="dropdown-item" href="#">
        <i class="ni ni-send"></i> Soporte
      </a>
    </div>
  </li>
  @endif

</ul>
