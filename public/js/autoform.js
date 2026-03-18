// Script para el autocompletado del asunto por cada subcategoría
window.onload = function() {
    // Verifica si hay un mensaje en localStorage
    const message = localStorage.getItem('asunto');
    
    if (message) {
        // Si hay mensaje, se coloca en el textarea
        document.getElementById('asunto').value = message;
        // Opcional: Elimina el mensaje de localStorage después de usarlo
        localStorage.removeItem('asunto');
    }
}

// Script para el autoformato del asunto si es más grande de un renglón
const textarea = document.getElementById('asunto');

// Almacenar el valor inicial de la altura para resetear
const initialHeight = textarea.scrollHeight;

// Verificar si hay un valor almacenado en localStorage
const storedAsunto = localStorage.getItem('asunto');
if (storedAsunto) {
    textarea.value = storedAsunto;  // Asigna el valor almacenado al textarea
    adjustHeight();  // Ajusta la altura al contenido de inmediato
} else {
    textarea.style.height = `${initialHeight}px`;  // Asignar la altura inicial si no hay contenido
}

// Ajustar la altura a medida que el usuario escribe
textarea.addEventListener('input', function () {
    adjustHeight();  // Ajusta la altura cada vez que se escribe

    // Almacenar el valor en localStorage mientras se escribe
    localStorage.setItem('asunto', this.value);
});

// Función para ajustar la altura según el contenido
function adjustHeight() {
    // Si el campo está vacío, resetea la altura al valor inicial
    if (textarea.value.trim() === "") {
        textarea.style.height = `${initialHeight}px`;  // Vuelve a la altura inicial
    } else {
        // Resetea la altura antes de recalcular
        textarea.style.height = 'auto';
        if (textarea.scrollHeight > textarea.clientHeight) {
            textarea.style.height = `${textarea.scrollHeight}px`;  // Ajusta la altura al contenido
        }
    }
}

// Borrar el localStorage al enviar el formulario
const form = document.getElementById('contactForm'); // Asegúrate de que el ID del formulario sea el correcto
form.addEventListener('submit', function() {
    localStorage.removeItem('asunto');
});

// Limpiar localStorage si la página se recarga
window.addEventListener('beforeunload', function() {
    localStorage.removeItem('asunto');
});