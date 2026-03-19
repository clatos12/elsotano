@extends('layout.layout')

@section('title', 'Literatura')

@section('content')
<body id="literatura">

    <!-- HEADER -->
    <header class="mastheadLiteratura" >
        <div class="container px-4 px-lg-5 h-100">
            <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-8 align-self-end">
                    <h1 class="text-white font-weight-bold">Literatura</h1>
                    <hr class="divider" />
                </div>
                <div class="col-lg-8 align-self-baseline">
                    <p class="text-white-75 mb-5">
                        Descubre obras clásicas y contemporáneas que han marcado la historia de la literatura.
                    </p>
                </div>
            </div>
        </div>
    </header>

    <!-- SECCIÓN -->
    <section class="page-section2" id="models">
        <div class="container px-2 px-lg-2">
            <h2 class="text-center mt-0">Libros disponibles</h2>
        </div>
    </section>

    <!-- PORTFOLIO (PRODUCTOS) -->
    <div id="portfolio">
        <div class="container-fluid p-0">
            <div class="row g-0">
                @foreach ($productos as $producto)
                    <div class="col-lg-4 col-sm-6">
                        <div class="portfolio-box">

                            <!-- IMAGEN -->
                            <img class="img-fluid2"
                                src="{{ config('app.storage_url') . $producto->fotografia }}"
                                alt="{{ $producto->titulo }}"
                                loading="lazy"/>

                            <!-- INFO -->
                            <div class="portfolio-box-caption">
                                <div class="project-name">
                                    {{ $producto->titulo }}
                                </div>

                                <div class="project-category text-white-50">
                                    {{ Str::limit($producto->descripcion, 100) }}
                                </div>

                                <div class="text-white fw-bold mt-2">
                                    ${{ number_format($producto->precio, 2) }}
                                </div>

                                <!-- BOTÓN -->
                                @auth
                                    <form action="{{ route('carrito.agregar', $producto->id) }}" method="POST" class="mt-2">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-primary">
                                            Agregar al carrito
                                        </button>
                                    </form>
                                @else
                                    <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm mt-2">
                                        Inicia sesión para comprar
                                    </a>
                                @endauth
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- FOOTER SECCIÓN -->
    <section class="page-section bg-dark text-white">
        <div class="container px-4 px-lg-5 text-center">
            <h2 class="mt-0">Sumérgete en grandes historias</h2>
            <hr class="divider" />
            <p>
                La literatura abre puertas a nuevos mundos, ideas y emociones.
            </p>
        </div>
    </section>

</body>
@endsection
