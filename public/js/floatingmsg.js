window.onload = function() {
    // Esperar 20 segundos para mostrar el mensaje flotante de WhatsApp
    setTimeout(function() {
      var whatsappMessage = document.getElementById("whatsappMessage");
      whatsappMessage.classList.add("show");  // Muestra el mensaje de WhatsApp
      
      // Después de 8 segundos, ocultar el mensaje de WhatsApp
      setTimeout(function() {
        whatsappMessage.classList.remove("show");
        whatsappMessage.classList.add("hide");  // Aplica la animación de ocultar
      }, 8000); // 8 segundos después
    }, 20000); // 20 segundos para que aparezca el mensaje de WhatsApp
  
    // Esperar 10 segundos para mostrar el mensaje flotante de Facebook
    setTimeout(function() {
      var facebookMessage = document.getElementById("facebookMessage");
      facebookMessage.classList.add("show");  // Muestra el mensaje de Facebook
      
      // Después de 8 segundos, ocultar el mensaje de Facebook
      setTimeout(function() {
        facebookMessage.classList.remove("show");
        facebookMessage.classList.add("hide");  // Aplica la animación de ocultar
      }, 8000); // 8 segundos después
    }, 10000); // 10 segundos para que aparezca el mensaje de Facebook
  };
  