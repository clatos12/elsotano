document.addEventListener("DOMContentLoaded", function () {

    const logo = document.getElementById("logo");
    if (!logo) return;

    const activeNavLinks = document.querySelectorAll('#mainNav .nav-link.active');

    // Detectar si estamos en HOME
    const isHome = window.location.pathname === "/" || window.location.pathname === "/home";

    // Detectar dispositivo
    function isMobile() {
        return window.innerWidth <= 820;
    }

    // =========================
    // CAMBIO DE LOGO
    // =========================
    function updateLogo() {

        // Si NO es home → logo fijo
        if (!isHome) {
            logo.src = "/img/logos/1.png";
            return;
        }

        // Si es home → comportamiento con scroll
        if (window.scrollY > 0.3) {
            logo.src = "/img/logos/1.png";
        } else {
            logo.src = isMobile()
                ? "/img/logos/1.png"
                : "/img/logos/2.png";
        }
    }

    // =========================
    // CAMBIO DE COLOR NAVBAR
    // =========================
    function handleScroll() {

        // Si NO es home → quitar estilos de masthead
        if (!isHome) {
            activeNavLinks.forEach(link => {
                link.classList.remove('in-masthead');
            });
            return;
        }

        // Si es home → comportamiento con scroll
        if (window.scrollY > 0.3) {
            activeNavLinks.forEach(link => {
                link.classList.remove('in-masthead');
            });
        } else {
            activeNavLinks.forEach(link => {
                link.classList.add('in-masthead');
            });
        }
    }

    // =========================
    // INICIALIZACIÓN
    // =========================
    updateLogo();
    handleScroll();

    // Eventos
    window.addEventListener("scroll", function () {
        updateLogo();
        handleScroll();
    });

    window.addEventListener("resize", updateLogo);

    // Click en menú
    activeNavLinks.forEach(link => {
        link.addEventListener("click", function () {
            setTimeout(handleScroll, 10);
        });
    });

});