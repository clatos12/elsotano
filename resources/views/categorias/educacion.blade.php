@extends('layout.layout')

@section('title', 'Educación - Librería Digital')

@section('content')
<body id="educacion">

    <!-- Header -->
    <header class="mastheadEducacion" >
        <div class="container px-4 px-lg-5 h-100">
            <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-8 align-self-end">
                    <h1 class="text-white font-weight-bold">Libros de Educación</h1>
                    <hr class="divider" />
                </div>
                <div class="col-lg-8 align-self-baseline">
                    <p class="text-white-75 mb-5">
                        Material educativo diseñado para estudiantes, docentes y autodidactas.
                        Aprende, refuerza y domina nuevos conocimientos.
                    </p>
                </div>
            </div>
        </div>
    </header>

    <!-- Título -->
    <section class="page-section2">
        <div class="container px-4 px-lg-5">
            <h2 class="text-center mt-0">Catálogo Educativo</h2>
            <p class="text-center text-muted">
                Libros académicos, guías didácticas y recursos de aprendizaje.
            </p>
            <hr class="divider" />
        </div>
    </section>

    <!-- Catálogo -->
    <div id="portfolio">
        <div class="container-fluid p-0">
            <div class="row g-0">

                @forelse ($productos as $producto)
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <div class="portfolio-box position-relative text-center p-3">

                            @if(!empty($producto->fotografia))
                                <img class="img-fluid2 rounded shadow mb-2"
                                     src="{{ config('app.storage_url') . $producto->fotografia }}"
                                     alt="{{ $producto->titulo }}"
                                     loading="lazy">
                            @else
                                <span class="text-muted">Sin imagen disponible</span>
                            @endif

                            <div class="portfolio-box-caption">
                                <h5 class="project-name">{{ $producto->titulo }}</h5>
                                <p class="project-category text-muted">
                                    {{ $producto->descripcion }}
                                </p>
                                <p class="fw-bold text-whithe">
                                    ${{ number_format($producto->precio, 2) }}
                                </p>

                                {{-- Botón carrito --}}
                                @auth
                                    <form action="{{ route('carrito.agregar', $producto->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-primary">
                                            <i class="bi bi-cart-plus"></i> Agregar al carrito
                                        </button>
                                    </form>
                                @else
                                    <a href="{{ route('login') }}" class="btn btn-sm btn-outline-secondary">
                                        Inicia sesión para comprar
                                    </a>
                                @endauth
                            </div>

                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <p class="text-muted">No hay libros educativos disponibles.</p>
                    </div>
                @endforelse

            </div>
        </div>
    </div>

    <!-- CTA -->
    <section class="page-section bg-dark text-white">
        <div class="container px-4 px-lg-5 text-center">
            <h2 class="mb-4">Invierte en tu conocimiento</h2>
            <p class="mb-4">
                La educación es la base del crecimiento personal y profesional.
            </p>
            <a class="btn btn-light btn-xl" href="/contacto">
                Contáctanos
            </a>
        </div>
    </section>

</body>
@endsection
