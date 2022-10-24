<h6 class="navbar-heading text-muted">Menu</h6>
<ul class="navbar-nav">
            @if(auth()->user()->role =='admin')
          <li class="nav-item  active ">
            <a class="nav-link  active " href="{{url('/configuracion')}}">
              <i class="fa fa-cog text-danger"></i> Configuracion
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="{{url('/inventario')}}">
              <i class="fas fa-cubes text-blue"></i> Inventario
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="{{url('/categorias')}}">
              <i class="fas fa-sitemap text-orange"></i> Categorias
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="/usuario">
              <i class="ni ni-single-02 text-yellow"></i> Usuarios
            </a>

            @elseif(auth()->user()->role =='usuario')
           <li class="nav-item">
            <a class="nav-link " href="{{url('/categoria')}}">
              <i class="fas fa-sitemap text-orange"></i> Categorias
            </a>
            <li class="nav-item">
            <a class="nav-link " href="{{url('/producto')}}">
              <i class="fas fa-cubes text-blue"></i> Productos
            </a>
            
           

          </li>
          @endif
          
          <li class="nav-item">
            <a class="nav-link" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('formLogout').submit();">
                
         
            </a>
            <form action="{{ route('logout') }}" method="post" style="display: none;"id="formLogout">
        @csrf
        </form>
         
          </li>
        </ul>
        @if(auth()->user()->role =='admin')
        <!-- Divider -->
        <hr class="my-3">
        <!-- Heading -->
        <h6 class="navbar-heading text-muted">Reportes</h6>
        <!-- Navigation -->
        <ul class="navbar-nav mb-md-3">
          <li class="nav-item">
            <a class="nav-link" href="">
              <i class="ni ni-send text-dark"></i> Soporte
            </a>
          </li>
        </ul>
        <ul class="navbar-nav">
          <li class="nav-item active active-pro">
            <a class="nav-link" href="./examples/upgrade.html">
              <i>Gore Ñuble</i>
            </a>


            @endif