

    <!-- Contact -->
    <section class="page-section2" id="contact">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 col-xl-6 text-center">
                    <h2 class="mt-0"></h2>
                    <hr class="divider" />
                    <p class="text-muted mb-5">¿Listo para elegir el producto perfecto para tí? Contáctanos a través de WhatsApp o rellena el formulario, y te responderemos a la brevedad.</p>
                </div>
            </div>
            <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
                <div class="col-lg-6">
                    <!-- Botón "Via WhatsApp" -->
                    <div class="d-grid mb-3">
                        <button class="btn btn-primary btn-xl" onclick="window.open('https://api.whatsapp.com/send?phone={{ config('app.whatsapp_number') }}&text=Hola, necesito mas Información')">Via WhatsApp</button>
                    </div>

                    <!-- Formulario de contacto -->
                    <form id="contactForm" method="POST" action="{{ route('contact.send') }}">
                        @csrf
                        <!-- Nombre -->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="name" name="name" type="text" placeholder="Ingresa tu nombre..." required />
                            <label for="name">Nombre completo</label>
                        </div>
                        <!-- Correo electrónico -->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="email" name="email" type="email" placeholder="nombre@ejemplo.com" required />
                            <label for="email">Correo electrónico</label>
                        </div>
                        <!-- Teléfono -->
                        <div class="form-floating mb-3">
                            <input class="form-control" id="phone" name="phone" type="tel" placeholder="(123) 456-7890" required />
                            <label for="phone">Número de teléfono</label>
                        </div>
                        <!-- Asunto -->
                        <div class="form-floating mb-3">
                            <textarea class="form-control" id="asunto" name="asunto" placeholder="Escribe tu mensaje aquí..." required></textarea>
                            <label for="asunto">Asunto</label>
                        </div>
                        <!-- Mensaje -->
                        <div class="form-floating mb-3">
                            <textarea class="form-control" id="message" name="message" placeholder="Escribe tu mensaje aquí..." style="height: 10rem" required></textarea>
                            <label for="message">Mensaje</label>
                        </div>
                        <!-- Botón Enviar -->
                        <div class="d-grid">
                            <button class="btn btn-primary btn-xl" id="submitButton" type="submit">Enviar</button>
                        </div>
                    </form>

                    <!-- Mensaje de éxito al enviar -->
                    @if(session('success'))
                    <div class="alert alert-success mt-3" id="successmsg">
                        {{ session('success') }}
                    </div>
                    @endif
                </div>
            </div>
        </div>

    </section>