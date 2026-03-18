@extends('layout.layout')

@section('title', 'Ofertas - Librería Digital')

@section('content')
<body id="ofertas">

    <header class="mastheadFacebook" style="background-color: #28a745;">
        <div class="container px-4 px-lg-5 h-100 text-center">
            <h1 class="text-white font-weight-bold">Ofertas Especiales</h1>
            <hr class="divider" />
            <p class="text-white-75 mb-5">
                Aprovecha los mejores descuentos en libros seleccionados. ¡No te lo pierdas!
            </p>
        </div>
    </header>

    <section class="page-section2">
        <div class="container">
            <h2 class="text-center mt-0">Libros en oferta</h2>
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
                        <p class="text-muted">No hay ofertas disponibles.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

</body>
@endsection
