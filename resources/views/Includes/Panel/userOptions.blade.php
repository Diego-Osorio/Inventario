<!-- Dropdown del menú -->
<div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
    <div class="dropdown-header noti-title">
        <h6 class="text-overflow m-0">¡Bienvenidos!</h6>
    </div>

    <a href="#" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('usersettings').submit();">
    <i class="ni ni-settings-gear-65"></i>
    <span>Configuración</span>
</a>

    <!-- Enlace para soporte -->
    <a href="#" class="dropdown-item">
        <i class="ni ni-support-16"></i>
        <span>Soporte</span>
    </a>

    <!-- Separador -->
    <div class="dropdown-divider"></div>

    <!-- Enlace para cerrar sesión -->
    <a href="#" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('formLogout').submit();">
        <i class="ni ni-user-run"></i>
        <span>Cerrar Sesión</span>
        <form action="{{ route('logout') }}" method="post" style="display: none;" id="formLogout">
            @csrf
        </form>
    </a>
</div>
