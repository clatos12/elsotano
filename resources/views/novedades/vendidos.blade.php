@extends('layout.layout')

@section('title', 'Más vendidos - Librería Digital')

@section('content')
<body id="vendidos">

    <header class="mastheadFacebook" style="background-color: #ffc107;">
        <div class="container px-4 px-lg-5 h-100 text-center">
            <h1 class="text-dark font-weight-bold">Libros Más Vendidos</h1>
            <hr class="divider" />
            <p class="text-dark-75 mb-5">
                Descubre los títulos que todos nuestros lectores están comprando.
            </p>
        </div>
    </header>

    <section class="page-section2">
        <div class="container">
            <h2 class="text-center mt-0">Top libros vendidos</h2>
        </div>
    </section>

    <div id="portfolio">
        <div class="container-fluid p-0">
            <div class="row g-0">
                @forelse ($productos as $producto)
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <div class="portfolio-box text-center p-3">
                            @if($producto->fotografia)
                                <img class="img-fluid2 rounded shadow"
                                     src="{{ config('app.storage_url') . $producto->fotografia }}"
                                     alt="{{ $producto->titulo }}"
                                     loading="lazy">
                            @else
                                <span class="text-muted">Sin imagen</span>
                            @endif

                            <div class="mt-3">
                                <h5>{{ $producto->titulo }}</h5>
                                <p class="text-muted">{{ $producto->descripcion }}</p>

                                <form action="{{ route('carrito.agregar', $producto->id) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-sm btn-primary">
                                        <i class="bi bi-cart-plus"></i> Agregar al carrito
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <p class="text-muted">No hay libros vendidos disponibles.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

</body>
@endsection
