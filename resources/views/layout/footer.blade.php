<!-- Footer -->
<footer class="bg-light py-5">
    <div class="container px-4 px-lg-5">
        <!-- Sección de idioma -->
        {{-- <div id="language">
            <h4 class="text-center">¿Cambiar Lenguaje?</h4>
            <div id="google_translate_element" class="d-flex justify-content-center mt-3"></div>
        </div> --}}
        <div class="small text-center text-muted mt-4">
            Copyright &copy; <span id="currentYear"></span> - Photo & develoment
        </div>
    </div>
</footer>
{{-- Script para manejar la barra de traducción --}}
{{-- <script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'es', // Idioma por defecto
            includedLanguages: 'en,es', // Idiomas disponibles
            layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
            autoDisplay: false,  // Desactivar la visualización automática del selector de idiomas
            callback: function() {
                var translateBanner = document.querySelector('.goog-te-banner-frame'); // Detectar la barra de traducción
                var body = document.body; // Obtener el body
                var navbar = document.getElementById('mainNav'); // Obtener el navbar

                // Verificamos si la barra de traducción está visible
                if (translateBanner) {
                    var bannerHeight = translateBanner.offsetHeight; // Obtener la altura de la barra de traducción

                    // Cambiar la clase 'translate-active' en el body
                    body.classList.add('translate-active');

                    // Eliminar la clase 'fixed-top' para que el navbar no se quede fijo en la parte superior
                    navbar.classList.remove('fixed-top');

                    // Cambiar la posición del navbar
                    navbar.style.position = 'relative'; // Cambiar la posición del navbar

                    // Establecer un z-index alto para que el navbar se mantenga encima de la barra de traducción
                    navbar.style.zIndex = '9999';

                    // Opcional: Ocultar la barra de traducción si es necesario
                    translateBanner.style.display = 'none'; // Desactiva la visibilidad de la barra
                }
            }
        }, 'google_translate_element');
    }
</script>

<script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script> --}}
