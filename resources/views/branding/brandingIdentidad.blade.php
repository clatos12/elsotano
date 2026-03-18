@extends('layout.layout')

@section('title', 'Identidad Visual - AMDigital Works')

@section('content')
<body id="branding-identidad">

<header class="mastheadFotografia" style="background-color: #006976;">
    <div class="container px-4 px-lg-5 h-100">
        <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-8 align-self-end">
                <h1 class="text-white font-weight-bold">Identidad Visual</h1>
                <hr class="divider" />
            </div>
            <div class="col-lg-8 align-self-baseline">
                <p class="text-white-75 mb-5">
                    Construimos la identidad visual de tu empresa para que tu marca comunique profesionalismo,
                    consistencia y confianza. Desde diseño de logo hasta papelería empresarial, uniformes,
                    publicidad impresa y accesorios corporativos, creamos una línea visual coherente que da vida
                    a tu marca.
                </p>
            </div>
        </div>
    </div>
</header>

<section class="page-section2" id="models">
    <div class="container px-2 px-lg-2">
        <h2 class="text-center mt-0">Proyectos de Identidad Visual</h2>
    </div>
</section>

<div id="portfolio">
    <div class="container-fluid p-0">
        <div class="row g-0">
            @foreach ($productos as $producto)
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box"
                        href="{{ config('app.storage_url') . $producto->fotografia }}"
                        title="{{ $producto->titulo }}">
                        <img class="img-fluid2"
                            src="{{ config('app.storage_url') . $producto->fotografia }}"
                            alt="{{ $producto->titulo }}" loading="lazy"/>
                        <div class="portfolio-box-caption">
                            <div class="project-name">{{ $producto->titulo }}</div>
                            <div class="project-category text-white-50">{{ $producto->descripcion }}</div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>

<section class="page-section bg-dark text-white" id="contact">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-lg-8 col-xl-6 text-center">
                <h2 class="mt-0">Construyamos la imagen completa de tu marca</h2>
                <hr class="divider" />
            </div>
        </div>

        <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
            <div class="col-lg-6">
                <div class="container text-center">
                    <div class="d-grid mb-3">
                        <button class="btn btn-primary btn-xl"
                            onclick="window.open('https://api.whatsapp.com/send?phone={{ config('app.whatsapp_number') }}&text=Hola, estoy interesado en servicios de identidad visual')">
                            Via WhatsApp
                        </button>
                    </div>

                    <div class="d-grid">
                        <button class="btn btn-secondary btn-xl" onclick="storeMessage()">Contáctanos por correo</button>
                    </div>

                    <script>
                        function storeMessage() {
                            localStorage.setItem('asunto', 'Hola, estoy interesado en identidad visual');
                            window.location.href = '{{ url("/contacto/#contactForm") }}';
                        }
                    </script>
                </div>
            </div>
        </div>

    </div>
</section>

</body>
@endsection
