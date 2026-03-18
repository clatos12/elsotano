@extends('layout.layout')

@section('title', 'Novedades - Librería Digital')

@section('content')
<body id="novedades">

    <!-- Header -->
    <header class="mastheadFacebook" style="background-color: #2d2d2d;">
        <div class="container px-4 px-lg-5 h-100">
            <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-8 align-self-end">
                    <h1 class="text-white font-weight-bold">Novedades</h1>
                    <hr class="divider" />
                </div>
                <div class="col-lg-8 align-self-baseline">
                    <p class="text-white-75 mb-5">
                        Descubre los libros más recientes que han llegado a nuestra librería.
                        Nuevos lanzamientos, ediciones especiales y títulos recomendados
                        para mantenerte siempre al día en tus lecturas.
                    </p>
                </div>
            </div>
        </div>
    </header>

    <!-- Sección título -->
    <section class="page-section2" id="models">
        <div class="container px-2 px-lg-2">
            <h2 class="text-center mt-0">Últimos libros agregados</h2>
            <p class="text-center text-muted">
                Explora nuestras novedades y encuentra tu próxima lectura favorita.
            </p>
        </div>
    </section>

    <!-- Catálogo de novedades -->
    <div id="portfolio">
        <div class="container-fluid p-0">
            <div class="row g-0">

                @forelse ($productos as $producto)
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
                            @else
                                <span class="text-muted">Sin imagen disponible</span>
                            @endif

                            <div class="portfolio-box-caption mt-3">
                                <h5 class="project-name">{{ $producto->titulo }}</h5>
                                <p class="project-category text-muted">
                                    {{ $producto->descripcion }}
                                    <p class="fw-bold text-whithe">
                                    ${{ number_format($producto->precio, 2) }}
                                </p>
                                </p>

                                <form action="{{ route('carrito.agregar', $producto->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-primary">
                                        <i class="bi bi-cart-plus"></i> Agregar al carrito
                                    </button>
                                </form>
                            </div>

                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <p class="text-muted">No hay novedades disponibles por el momento.</p>
                    </div>
                @endforelse

            </div>
        </div>
    </div>

    <!-- Llamado a la acción -->
    <section class="page-section bg-dark text-white">
        <div class="container px-4 px-lg-5 text-center">
            <h2 class="mb-4">¿Buscas un libro en especial?</h2>
            <p class="mb-4">
                Contáctanos y con gusto te ayudamos a encontrar el título ideal.
            </p>
            <a class="btn btn-light btn-xl" href="/contacto">
                Contáctanos
            </a>
        </div>
    </section>

</body>
@endsection
