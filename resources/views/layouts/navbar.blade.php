<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="/inicio"><img src="/imgs/icono-home.png" width="32" height="32"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <!--<a class="nav-link" href="/inicio"><span class="sr-only">(current)</span></a>-->
      </li>
      @if (Route::has('login'))
        @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Anuncios
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="/crear_anuncio">Crear nuevo anuncio</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="/tablon">Ver todos los anuncios</a>
            </div>
          </li>
        @else
          <!-- NULL -->
        @endauth
      @endif
      <!--<li class="nav-item">
        <a class="nav-link disabled" href="#">Próximamente...</a>
      </li>-->
    </ul>
    <ul class="navbar-nav navbar-right mr-sm-3">
        @if (Route::has('login'))
                @auth
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="right: 0; left: auto;">
                            <a class="dropdown-item" href="/perfil">Mi perfil</a>
                            <a class="dropdown-item" href="/mis_anuncios">Mis anuncios</a>
                        <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Salir') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                      </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Iniciar sesión</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Regístrate</a>
                </li>
                @endauth
            </div>
        @endif
    </ul>
  </div>
</nav>