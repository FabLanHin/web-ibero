<div class="container">
  <header class="personal-header d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 border-bottom personal-header">
    <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-decoration-none nombre-header">
      APP TAREAS
    </a>

    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
      @guest

      @else
      <li><a href="{{ route('home') }}" class="nav-link px-2 link-secondary"><ion-icon name="home-outline"></ion-icon> Vista General</a></li>
      <li><a href="{{ route('proyectos.index') }}" class="nav-link px-2 link-dark"><ion-icon name="folder-open-outline"></ion-icon> Proyectos</a></li>
      <li><a href="{{ route('tareas.index') }}" class="nav-link px-2 link-dark"><ion-icon name="list-outline"></ion-icon> Tareas</a></li>
      @endguest
    </ul>

    <div class="col-md-3 text-end">
      @guest
        <a href="{{ route('login') }}" class="btn btn-outline-primary me-2"><ion-icon name="log-in-outline"></ion-icon> Iniciar Sesión</a>
        <a href="{{ route('register') }}" class="btn btn-outline-primary"><ion-icon name="add-circle-outline"></ion-icon> Registro</a>
      @else
      <div class="dropdown">
        <button class="btn btn-primary" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"><ion-icon name="people-circle-outline"></ion-icon>
          {{ Auth::user()->name }}
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
          <li>
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        Cerrar Sesión
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                      </form>
                  </li>
        </ul>
      </div>
      @endguest
    </div>
  </header>
</div>