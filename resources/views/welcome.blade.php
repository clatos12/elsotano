@extends('layout.layout')

@section('title', 'Inicio - Librería Online')

@section('content')

<!-- Masthead-->
<header class="masthead" id="inicio">
    <div class="container px-4 px-lg-5 h-100">
        <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-8 align-self-end">
                <h1 class="text-white font-weight-bold">
                    Descubre historias que transforman
                </h1>
                <hr class="divider" />
            </div>
            <div class="col-lg-8 align-self-baseline">
                <p class="text-white-75 mb-5">
                    En <strong>Librería Digital</strong> encontrarás libros para aprender, inspirarte
                    y disfrutar, con compra fácil y acceso inmediato a tus lecturas favoritas.
                </p>
                <a class="btn btn-primary btn-xl" href="#productospr">
                    Explorar catálogo
                </a>
            </div>
        </div>
    </div>
</header>

    <!-- About-->
    <section class="page-section bg-primary" id="about">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="text-white mt-0">
                        Una librería pensada para lectores
                    </h2>
                    <hr class="divider divider-light" />
                    <p class="text-white-75 mb-4">
                        Somos una librería enfocada en acercar el conocimiento y la lectura a todos,
                        ofreciendo títulos seleccionados, autores destacados y una experiencia
                        de compra sencilla y segura.
                    </p>
                    <a class="btn btn-light btn-xl" href="/nosotros">
                        Conoce nuestra historia
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Services / Beneficios -->
    <section class="page-section2" id="services">
        <div class="container px-4 px-lg-5">
            <h2 class="text-center mt-0">¿Por qué comprar con nosotros?</h2>
            <hr class="divider" />
            <div class="row gx-4 gx-lg-5">

                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2">
                            <i class="bi-book fs-1 text-primary"></i>
                        </div>
                        <h3 class="h4 mb-2">Amplio catálogo</h3>
                        <p class="text-muted mb-0">
                            Libros de distintos géneros, autores y temáticas.
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2">
                            <i class="bi-cart-check fs-1 text-primary"></i>
                        </div>
                        <h3 class="h4 mb-2">Compra fácil</h3>
                        <p class="text-muted mb-0">
                            Agrega libros a tu carrito y compra en pocos pasos.
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2">
                            <i class="bi-truck fs-1 text-primary"></i>
                        </div>
                        <h3 class="h4 mb-2">Entrega confiable</h3>
                        <p class="text-muted mb-0">
                            Envíos seguros y seguimiento de tu pedido.
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2">
                            <i class="bi-heart fs-1 text-primary"></i>
                        </div>
                        <h3 class="h4 mb-2">Pasión por la lectura</h3>
                        <p class="text-muted mb-0">
                            Recomendaciones pensadas para verdaderos lectores.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- División entre beneficios y catálogo --}}
    <h2 id="productospr" class="text-center mt-0"
        style="background-color: #2d2d2d; color: #ffffff; padding: 10px 0; margin-bottom: 0;">
        Catálogo de libros
    </h2>

    <!-- Catálogo -->
    <div id="portfolio">
        <div class="container-fluid p-0">
            <div class="row g-0">


                @foreach ($productos as $producto)
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <div class="portfolio-box position-relative text-center p-3">

                            @if(!empty($producto->fotografia))
                                <a href="{{ config('app.storage_url') . $producto->fotografia }}"
                                   title="{{ $producto->titulo }}">
                                    <img class="img-fluid2 rounded shadow"
                                         src="{{ config('app.storage_url') . $producto->fotografia }}"
                                         alt="{{ $producto->titulo }}"
                                         loading="lazy"/>
                                </a>
                            @elseif(!empty($producto->video))
                                <video class="img-fluid2 rounded shadow" width="100%" controls muted>
                                    <source src="{{ config('app.storage_url') . $producto->video }}" type="video/mp4">
                                    Tu navegador no soporta video.
                                </video>
                            @else
                                <span class="text-muted">Sin imagen disponible</span>
                            @endif

                            <div class="portfolio-box-caption mt-2">
                                <h5 class="project-name">{{ $producto->titulo }}</h5>
                                <p class="project-category text-muted">
                                    {{ $producto->descripcion }}
                                </p>

                                {{-- Botón carrito --}}
                                <form action="{{ route('carrito.agregar', $producto->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-primary">
                                        <i class="bi bi-cart-plus"></i> Agregar al carrito
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

    <!-- Contacto -->
    <section class="page-section bg-dark text-white">
        <div class="container px-4 px-lg-5 text-center">
            <h2 class="mb-4">¿Buscas una recomendación o un título especial?</h2>
            <a class="btn btn-light btn-xl" href="/contacto">
                Contáctanos
            </a>
        </div>
    </section>


@endsection
