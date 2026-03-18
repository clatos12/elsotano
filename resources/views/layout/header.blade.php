<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
    <div class="container px-4 px-lg-5">

        <!-- LOGO -->
        <a class="navbar-brand" href="/">
            <img id="logo" src="{{ asset('img/logos/1.png') }}" alt="Librería Online" style="height: 50px;">
        </a>

        <button class="navbar-toggler navbar-toggler-right" type="button"
                data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- MENU -->
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto my-2 my-lg-0">

                <!-- Categorías -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ Request::is('categoria/*') ? 'active' : '' }}"
                       href="#" id="navbarDropdownCategorias" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        CATEGORÍAS
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownCategorias">
                        <li><a class="dropdown-item" href="/categoria/literatura">Literatura</a></li>
                        <li><a class="dropdown-item" href="/categoria/ciencia">Ciencia</a></li>
                        <li><a class="dropdown-item" href="/categoria/educacion">Educación</a></li>
                        <li><a class="dropdown-item" href="/categoria/autoayuda">Autoayuda</a></li>
                        <li><a class="dropdown-item" href="/categoria/infantil">Infantil </a></li>
                    </ul>
                </li>

                <!-- Novedades -->
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('novedades') ? 'active' : '' }}"
                       href="/novedades">
                        NOVEDADES
                    </a>
                </li>

                <!-- Más vendidos -->
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('mas-vendidos') ? 'active' : '' }}"
                       href="/mas-vendidos">
                        MÁS VENDIDOS
                    </a>
                </li>

                <!-- Ofertas -->
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('ofertas') ? 'active' : '' }}"
                       href="/ofertas">
                        OFERTAS
                    </a>
                </li>

                <!-- Contacto -->
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('contacto') ? 'active' : '' }}"
                       href="/contacto">
                        CONTACTO
                    </a>
                </li>
                

                <!-- Carrito -->
<li class="nav-item position-relative">
    <a class="nav-link" href="{{ route('carrito.ver') }}">
        <i class="bi bi-cart"></i>

        @if(session('carrito_count', 0) > 0)
            <span
                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                {{ session('carrito_count') }}
            </span>
        @endif
    </a>
</li>

                <!-- Login -->
               @guest
<li class="nav-item">
    <a class="nav-link {{ Request::is('login') ? 'active' : '' }}"
       href="{{ route('login') }}">
        LOGIN
    </a>
</li>
@endguest

@auth
<li class="nav-item">
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="nav-link btn btn-link">
            LOGOUT
        </button>
    </form>
</li>
@endauth



                

            </ul>
        </div>
    </div>
</nav>
