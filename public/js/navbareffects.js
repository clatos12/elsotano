// Script para cambiar el LOGO cuando bajamos 0.5 rem con la función scroll
window.addEventListener("scroll", function() {
    var logo = document.getElementById("logo");
    
    // Verificar si es un dispositivo móvil
    var isMobile = window.innerWidth <= 820;
    
    if (window.scrollY > 0.3) { // 8px o 0.5 REM
        logo.src = "/img/logos/1.png"; // Reemplazar con la ruta directa a tu logo
    } else {
        if (isMobile) {
            logo.src = "/img/logos/1.png"; // Logo para dispositivos móviles
        } else {
            logo.src = "/img/logos/2.png"; // Logo para escritorio
        }
    }
});

// Verificar si es un dispositivo móvil y establecer el logo por defecto al cargar la página
var isMobile = window.innerWidth <= 768;
var logo = document.getElementById("logo");
if (isMobile) {
    logo.src = "/img/logos/1.png"; // Logo para dispositivos móviles
} else {
    logo.src = "/img/logos/2.png"; // Logo para escritorio
}

// Script para cambiar el color de las LETRAS del header en el masthead y en normal
document.addEventListener('DOMContentLoaded', function() {
    const activeNavLinks = document.querySelectorAll('#mainNav .nav-link.active');
    
    // Función para verificar el scroll y aplicar las clases
    function handleScroll() {
        if (window.scrollY > 0.3) { // Desplazamiento de 0.5rem (~8px)
            activeNavLinks.forEach(link => {
                link.classList.remove('in-masthead');
            });
        } else {
            activeNavLinks.forEach(link => {
                link.classList.add('in-masthead');
            });
        }
    }

    // Ejecutar cuando la página se cargue por completo
    handleScroll();

    // Añadir evento de scroll para cambiar la clase cuando se haga scroll
    window.addEventListener('scroll', handleScroll);

    // Actualizar el color al hacer clic en otras secciones
    activeNavLinks.forEach(link => {
        link.addEventListener('click', function() {
            setTimeout(handleScroll, 10); // Verificar la posición después del click
        });
    });
});
