<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta http-equiv="Content-Language" content="es"/>
        <meta name="description" content="" />
        <meta name="csrf-token" content="{{ csrf_token() }}"/>
        <title>@yield('title', 'Photo')</title>

        <!-- Favicon-->
        {{-- ICONO CHIQUITO DE LA VENTANA DE NAVEGACION, CAMBIAR A LOGO DE EMPRESA --}}
        <link rel="icon" type="image/x-icon" href="{{ asset('img/logos/1.png') }}" />

        <!-- Bootstrap Icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        
        <!-- SimpleLightbox plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
        
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />

        <link href="{{ asset('css/notification.css') }}" rel="stylesheet" />

    
    </head>
    <!-- Include Header -->
    @include('layout.header')

    <body>
        
        <!-- Main Content -->
        @yield('content')

        <!-- Include Footer -->
        @include('layout.footer')

       <!-- Bootstrap JS y Popper.js -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
        <!-- SimpleLightbox plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('js/scripts.js') }}"></script>

        {{-- contactomsg JS --}}
        <script src="{{ asset('js/contactomsg.js') }}"></script>

        <!-- Incluir archivo de notificacion para infcontacto -->
        <script src="{{ asset('js/clipboard.js') }}" defer></script>

        {{-- para el formulario de contacto --}}
        <script src="{{ asset('js/autoform.js') }}" defer></script>

        {{-- mensajes flotantes de botones de redes sociales --}}
        <script src="{{ asset('js/floatingmsg.js') }}" defer></script>

        {{-- efectos de la navbar --}}
        <script src="{{ asset('js/navbarEffects.js') }}" defer></script>

        {{-- footer date para el año --}}
        <script src="{{asset('js/footerdate.js')}}"></script>

        <!-- SB Forms JS (if used)-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>

    </body>
</html>
