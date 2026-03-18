function copyToClipboard(elementId) {
    // Verificar si es escritorio
    if (window.innerWidth > 768) {
        const element = document.getElementById(elementId);
        const textToCopy = element.textContent; // Obtener el texto dentro del <a>

        navigator.clipboard.writeText(textToCopy).then(function() {
            showNotification(textToCopy + " copiado al portapapeles.");
        }, function(err) {
            console.error("Error al copiar al portapapeles", err);
        });
    } else {
        // En móviles, seguir comportamiento por defecto
        const element = document.getElementById(elementId);
        if (elementId.startsWith('phone')) {
            window.location.href = `tel:${element.textContent}`; // Abrir el enlace de teléfono
        } else if (elementId.startsWith('email')) {
            window.location.href = `mailto:${element.textContent}`; // Abrir el enlace de correo
        }
    }
}

function showNotification(message) {
    const notification = document.getElementById("notification");
    const notificationText = document.getElementById("notification-text");
    notificationText.textContent = message;
    notification.classList.add("show");

    // Ocultar la notificación después de 3 segundos
    setTimeout(function() {
        notification.classList.remove("show");
    }, 3000);
}
