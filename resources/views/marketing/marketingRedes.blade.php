@extends('layout.layout')

@section('title', 'Gestión de Redes Sociales - AMDigital Works')

@section('content')
    <body id="marketing-RedesSociales">
        
        <header class="mastheadFacebook" style="background-color: #E1306C;"> {{-- Color inspirado en Instagram --}}
            <div class="container px-4 px-lg-5 h-100">
                <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-8 align-self-end">
                        <h1 class="text-white font-weight-bold">Gestión Profesional de Redes Sociales</h1>
                        <hr class="divider" />
                    </div>
                    <div class="col-lg-8 align-self-baseline">
                        <p class="text-white-75 mb-5">
                            Administramos tus redes sociales de forma estratégica para potenciar tu marca. 
                            Creamos contenido atractivo, gestionamos tu comunidad, mejoramos tu alcance orgánico 
                            y diseñamos publicaciones que fortalecen tu presencia digital en Facebook, Instagram, TikTok y más.
                        </p>
                    </div>
                </div>
            </div>
        </header>

        <section class="page-section2" id="models">
            <div class="container px-2 px-lg-2">
                <h2 class="text-center mt-0">Publicaciones y Diseños de Ejemplo</h2>
            </div>
        </section>

        <div id="portfolio">
            <div class="container-fluid p-0">
                <div class="row g-0">
                    @foreach ($productos as $producto)
                        <div class="col-lg-4 col-sm-6">
                            <a class="portfolio-box" href="{{ config('app.storage_url') . $producto->fotografia }}" title="{{ $producto->titulo }}">
                                <img class="img-fluid2" 
                                     src="{{ config('app.storage_url') . $producto->fotografia }}" 
                                     alt="{{ $producto->titulo }}" 
                                     loading="lazy"/>
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
                        <h2 class="mt-0">Haz crecer tu comunidad digital</h2>
                        <hr class="divider" />
                        <p>
                            Con una gestión profesional de redes sociales, tu marca obtiene más visibilidad, interacción y clientes.
                        </p>
                    </div>
                </div>

                <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
                    <div class="col-lg-6">
                        <div class="container text-center">
                            
                            <div class="d-grid mb-3">
                                <button class="btn btn-primary btn-xl"
                                    onclick="window.open('https://api.whatsapp.com/send?phone={{ config('app.whatsapp_number') }}&text=Hola, estoy interesado en la gestión de redes sociales')">
                                    Via WhatsApp
                                </button>
                            </div>

                            <div class="d-grid">
                                <button class="btn btn-secondary btn-xl" onclick="storeMessage()">Contáctanos por correo</button>
                            </div>

                            <script>
                                function storeMessage() {
                                    localStorage.setItem('message', 'Hola, estoy interesado en la gestión de redes sociales');
                                    window.location.href = '{{ url("/contacto/#contact") }}';
                                }
                            </script>

                        </div>
                    </div>

                    <!-- mensaje personalizado para esta categoría -->
                    <script>
                        function storeMessage() {
                            localStorage.setItem('asunto', 'Hola, quiero información sobre Gestión de Redes Sociales');
                            window.location.href = '{{ url("/contacto/#contactForm") }}';
                        }
                    </script>

                </div>
            </div>
        </section>

    </body>
@endsection
