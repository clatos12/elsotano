@extends('layout.layout')

@section('title', 'Facebook & Meta Ads - AMDigital Works')

@section('content')
    <body id="marketing-FacebookAds">
        
        <header class="mastheadFacebook" style="background-color: #1877f2;">
            <div class="container px-4 px-lg-5 h-100">
                <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-8 align-self-end">
                        <h1 class="text-white font-weight-bold">Campañas de Facebook & Meta Ads</h1>
                        <hr class="divider" />
                    </div>
                    <div class="col-lg-8 align-self-baseline">
                        <p class="text-white-75 mb-5">
                            Diseñamos, optimizamos y gestionamos campañas efectivas en Facebook, Instagram y todo el 
                            ecosistema Meta. Creamos anuncios estratégicos, segmentación precisa y contenido visual 
                            persuasivo que impulsa resultados reales: más clientes, más ventas y más alcance para tu marca.
                        </p>
                    </div>
                </div>
            </div>
        </header>

        <section class="page-section2" id="models">
            <div class="container px-2 px-lg-2">
                <h2 class="text-center mt-0">Ejemplos de Anuncios y Creatividades</h2>
            </div>
        </section>

        <div id="portfolio">
            <div class="container-fluid p-0">
                <div class="row g-0">
                    @foreach ($productos as $producto)
                        <div class="col-lg-4 col-sm-6">
                            <a class="portfolio-box" href="{{ config('app.storage_url') . $producto->fotografia }}" title="{{ $producto->titulo }}">
                                <img class="img-fluid2" src="{{ config('app.storage_url') . $producto->fotografia }}" alt="{{ $producto->titulo }}" loading="lazy"/>
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
                        <h2 class="mt-0">Haz crecer tu marca con Meta Ads</h2>
                        <hr class="divider" />
                        <p>
                            Maximiza tu retorno de inversión con campañas profesionales diseñadas para convertir.
                        </p>
                    </div>
                </div>

                <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
                    <div class="col-lg-6">
                        <div class="container text-center">
                            
                            <div class="d-grid mb-3">
                                <button class="btn btn-primary btn-xl"
                                    onclick="window.open('https://api.whatsapp.com/send?phone={{ config('app.whatsapp_number') }}&text=Hola, estoy interesado en campañas de Facebook y Meta Ads')">
                                    Via WhatsApp
                                </button>
                            </div>

                            <div class="d-grid">
                                <button class="btn btn-secondary btn-xl" onclick="storeMessage()">Contáctanos por correo</button>
                            </div>

                            <script>
                                function storeMessage() {
                                    localStorage.setItem('message', 'Hola, estoy interesado en campañas de Facebook y Meta Ads');
                                    window.location.href = '{{ url("/contacto/#contact") }}';
                                }
                            </script>

                        </div>
                    </div>

                    <!-- mensaje personalizado para esta categoría -->
                    <script>
                        function storeMessage() {
                            localStorage.setItem('asunto', 'Hola, quiero información sobre campañas de Facebook y Meta Ads');
                            window.location.href = '{{ url("/contacto/#contactForm") }}';
                        }
                    </script>

                </div>
            </div>
        </section>

    </body>
@endsection
