<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="Content-Language" content="es"/>
    <meta name="description" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    <title>@yield('title', 'Photo')</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('img/logos/1.png') }}" />

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,700" rel="stylesheet" />

    <!-- Plugins -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />

    <!-- Estilos -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/notification.css') }}" rel="stylesheet" />
</head>

<body class="@yield('body-class')" style="padding-top: 100px;">

    <!-- HEADER (YA CORRECTO) -->
    @include('layout.header')

    <!-- CONTENIDO -->
    <main>
        @yield('content')
    </main>

    <!-- FOOTER -->
    @include('layout.footer')

    <!-- ========================= -->
    <!-- SCRIPTS (ORDENADOS) -->
    <!-- ========================= -->

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Plugins -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>

    <!-- Axios -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <!-- Scripts base -->
    <script src="{{ asset('js/scripts.js') }}"></script>

    <!-- Scripts personalizados -->
    <script src="{{ asset('js/contactomsg.js') }}"></script>
    <script src="{{ asset('js/clipboard.js') }}" defer></script>
    <script src="{{ asset('js/autoform.js') }}" defer></script>
    <script src="{{ asset('js/floatingmsg.js') }}" defer></script>
    <script src="{{ asset('js/navbarEffects.js') }}" defer></script>
    <script src="{{ asset('js/footerdate.js') }}"></script>

    <!-- Forms -->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>

</body>
</html>