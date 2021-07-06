<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin" class="brand-link">
      <img src="/dash/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">NutriWeb</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('/img/usuarios/'.Auth::user()->img_profile)}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}
            <br>
            {{ Auth::user()->email }}
          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          @if (Auth::user()->level == "paciente")
            <li class="nav-item">
              <a href="/admin/pacientes" class="nav-link">
                <i class="nav-icon fas fa-list"></i>
                <p>
                  Pacientes
                </p>
              </a>
            </li>

          @endif
          @if (Auth::user()->level == "admin")
            <li class="nav-item">
              <a href="/admin/pacientes" class="nav-link">
                <i class="nav-icon fas fa-list"></i>
                <p>
                  Pacientes
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/admin/usuarios" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Usuarios
                </p>
              </a>
            </li>
          @endif
          <li class="nav-item mt-3">
            <a class="nav-link"href="{{ route('logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
            </form>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>