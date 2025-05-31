<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="{{ route('admin.dashboard') }}" class="brand-link">
    <i class="fas fa-school ml-3"></i>
    <span class="brand-text font-weight-light ml-2">Colegio "31 de octubre C"</span>
  </a>

  <div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="info">
        <a href="#" class="d-block">{{ auth()->user()->name }}</a>
        <small class="text-warning">Administrador</small>
      </div>
    </div>

    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
        <li class="nav-item">
          <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="nav-icon fas fa-home"></i>
            <p>Inicio</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.users.index') }}" class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-users"></i>
            <p>Usuarios</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.docentes.index') }}" class="nav-link {{ request()->routeIs('admin.docentes.*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-chalkboard-teacher"></i>
            <p>Docentes</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.estudiantes.index') }}" class="nav-link {{ request()->routeIs('admin.estudiantes.*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-user-graduate"></i>
            <p>Estudiantes</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.inventario.index') }}" class="nav-link {{ request()->routeIs('admin.inventario.*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-box"></i>
            <p>Inventario</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.atrasos.index') }}" class="nav-link {{ request()->routeIs('admin.atrasos.*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-clock"></i>
            <p>Atrasos</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.notas.index') }}" class="nav-link {{ request()->routeIs('admin.notas.*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-book"></i>
            <p>Ver Notas</p>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</aside>