<div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0">Bienvenidos!</h6>
              </div>
              <a href="#" class="dropdown-item">
                <i class="ni ni-single-02"></i>
                <span>Mi Perfil</span>
              </a>
              <a href="#" class="dropdown-item">
                <i class="ni ni-settings-gear-65"></i>
                <span>Configuracion</span>
              </a>
              <a href="#" class="dropdown-item">
                <i class="ni ni-calendar-grid-58"></i>
                <span>Inventario</span>
              </a>
              <a href="#" class="dropdown-item">
                <i class="ni ni-support-16"></i>
                <span>Soporte</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('formLogout').submit();">
                <i class="ni ni-user-run"></i>
                <span>Cerrar Sesión</span>
               <form action="{{ route('logout') }}" method="post" style="display: none;"id="formLogout">
                 @csrf
             </form>

              </a>
        

</div>
