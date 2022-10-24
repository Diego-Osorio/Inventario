<h6 class="navbar-heading text-muted">Menu</h6>
<ul class="navbar-nav">
          <li class="nav-item  active ">
            <a class="nav-link  active " href="{{url('/configuracion')}}">
              <i class="fa fa-cog text-danger"></i> Configuracion
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="{{url('/productos')}}">
              <i class="fas fa-cubes text-blue"></i> Productos
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="{{url('/categorias')}}">
              <i class="fas fa-sitemap text-orange"></i> Categorias
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="/usuario">
              <i class="ni ni-single-02 text-yellow"></i> Usuario
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('formLogout').submit();">
                
              <i class="fas fa-sign-in-alt"></i> Cerrar Sesión
            </a>
            <form action="{{ route('logout') }}" method="post" style="display: none;"id="formLogout">
        @csrf
        </form>
         
          </li>
        </ul>
        <!-- Divider -->
        <hr class="my-3">
       