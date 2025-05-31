<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Panel Admin')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <nav class="main-header navbar navbar-expand navbar-dark navbar-primary">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button">
            <i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="{{ route('admin.dashboard') }}" class="nav-link">Inicio</a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
               class="nav-link">
              <i class="fas fa-sign-out-alt"></i> Salir
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                @csrf
            </form>
        </li>
      </ul>
    </nav>

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

    <div class="content-wrapper p-3">
        @yield('content')
    </div>

    <footer class="main-footer text-sm text-center">
      <strong>Proyecto Colegio &copy; 2024.</strong>
    </footer>

</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

</body>
</html>