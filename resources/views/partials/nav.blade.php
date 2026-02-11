<nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href={{route("welcome")}}>BLOG PARTY</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href={{route("welcome")}}>Inicio</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href={{route("blogs.index")}}>Lista de Blogs</a>
        </li>

        <!-- Si el usuario no está logueado, saldrá el boton de iniciar sesion -->
        @guest
        <li class="nav-item">
          <a class="nav-link" href={{route("login")}}>Iniciar Sesión</a>
        </li>
        @endguest

        <!-- Estos botones solo aparecen si el usuario está logueado -->
        @auth
        <li class="nav-item">
          <a class="nav-link" href={{route("blogs.create")}}>Crear Blog</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href={{route("logout")}}>Logout</a>
        </li>
        @endauth

      </ul>
    </div>
  </div>
</nav>
