@extends('layout.layout')

@section('title', 'Contacto - Fotografía')

@section('content')
<body id="contacto">

    <!-- Masthead SE CAMBIE EL CLASS POR CADA VISTA DE CATEGORIA -->
    <header class="mastheadContacto" style="background-color: #a94919ff;">
        <div class="container px-4 px-lg-5 h-100">
            <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-8 align-self-end">
                    <h1 class="text-white font-weight-bold">¡Dinos Cómo Podemos Ayudarte!</h1>
                    <hr class="divider" />
                </div>
                <div class="col-lg-8 align-self-baseline">
                    <p class="text-white-75 mb-5">En nuestra librería nos apasiona acercarte al mundo de los libros con una atención cercana y dedicada. Cada lector es único, y nuestra prioridad es ayudarte a encontrar la lectura perfecta para ti.</p>
                </div>
            </div>
        </div>
    </header>

    @include('layout.contactform')

    @include('layout.infcontacto')



<!-- Ubicación -->
<div class="row gx-4 gx-lg-5 justify-content-center">
    <div class="col-lg-4 text-center mb-5 mb-lg-0">
        <div class="fs-6">Visítanos en:</div> <!-- Texto más grande -->
        <a href="https://maps.app.goo.gl/E4ZxVhyvwBD8im5a7" target="_blank" style="text-decoration: none; color: inherit;">
            <i class="bi-geo-alt fs-1 mb-3 text-muted"></i> <!-- Icono más grande (fs-1) -->
            <div class="fs-7"> Calle Lima 67, Col. Los Olivos, Tlaquepaque, Jalisco, México</div> <!-- Dirección más grande -->
        </a>
    </div>
</div>


</body>
@endsection
