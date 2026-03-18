<!-- Contenedor del mensaje flotante -->
<div id="whatsappMessage" class="whatsapp-message">
    <p>¿Dudas? ¡Contáctanos!</p>
</div>

<!-- Botón flotante para WhatsApp -->
<a href="https://api.whatsapp.com/send?phone={{ config('app.whatsapp_number') }}&text=Hola,%20Estoy%20interesado%20en%20trabajar%20con%20ustedes" class="btn-whatsapp" target="_blank">
    <img src="{{asset('/img/buttons/Whatsapp.webp')}}" alt="WhatsApp" class="whatsapp-icon" loading="lazy">
</a>

<!-- Contenedor del mensaje flotante para Facebook e Instagram-->
<div id="facebookMessage" class="facebook-message">
    <p>Síguenos en redes sociales</p>
</div>

<!-- Botón flotante para Facebook -->
<a href="https://www.facebook.com/JBTechnipack" class="btn-facebook" target="_blank">
    <img src="{{asset('/img/buttons/Facebook.webp')}}" alt="Facebook" class="facebook-icon" loading="lazy">
</a>

<!-- Botón flotante para Instagram -->
<a href="https://www.instagram.com/JBTechnipack" class="btn-instagram" target="_blank">
    <img src="{{asset('/img/buttons/Instagram.webp')}}" alt="Instagram" class="instagram-icon" loading="lazy">
</a>