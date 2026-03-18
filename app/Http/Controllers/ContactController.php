<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;
use App\Models\Contact;

class ContactController extends Controller
{
    public function sendEmail(Request $request)
{
    // Validar los datos del formulario    
    $request->validate([
        'name' => [
            'required',
            'string',
            'max:255',
            'regex:/^[\pL\s]+$/u', // Permite solo letras con o sin acentos y espacios
        ],
        'email' => 'required|email',
        'phone' => 'required|string|max:15',
        'asunto' => [
            'required',
            'string',
            'regex:/^[\s\S]*$/', // Permite cualquier tipo de texto
        ],
        'message' => [
            'required',
            'string',
            'regex:/^[\s\S]*$/', // Permite cualquier tipo de texto
        ],
    ], [
        'name.regex' => 'El campo nombre solo puede contener letras y espacios.',
        'email.regex' => 'El campo email contiene caracteres inválidos.',
        'phone.regex' => 'El campo teléfono contiene caracteres inválidos.',
        'message.regex' => 'El campo mensaje contiene caracteres inválidos.'
    ]);

    // Obtener la dirección IP del cliente de manera confiable
    $clientIP = $request->header('X-Forwarded-For') ?? $request->ip();
    
    // Si hay múltiples IPs separadas por coma, tomar la primera
    if (strpos($clientIP, ',') !== false) {
        $clientIP = explode(',', $clientIP)[0];
    }

    // Usar la API para obtener la geolocalización (si la IP es válida y no es localhost)
    $city = '';
    $state = '';
    $country = '';
    if ($clientIP !== '127.0.0.1' && $clientIP !== '::1') {
        $apiKey = 'aebdbc738d32a286ef27afabb4c0d7e4'; // Sustituye con tu API key de ipapi o ipstack
        $response = Http::get("http://api.ipapi.com/{$clientIP}?access_key={$apiKey}");

        // Parsear la respuesta
        $locationData = $response->json();

        // Verificar si la respuesta tiene éxito y obtener los datos
        if (isset($locationData['city'])) {
            $city = $locationData['city'];
            $state = $locationData['region_name']; // Algunos servicios usan 'region_name' para estado
            $country = $locationData['country_name'];
        } else {
            // Si no se puede obtener la geolocalización, establecer valores por defecto
            $city = 'Sin datos';
            $state = 'Sin datos';
            $country = 'Sin datos';
        }
    }

    // Datos del formulario
    $data = [
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'asunto' => $request->asunto,
        'message' => $request->message,
        'city' => $city,
        'state' => $state,
        'country' => $country,
    ];

    // Guardar los datos en la base de datos
    Contact::create($data);

    // Enviar el correo con HTML
    Mail::send([], [], function ($message) use ($data) {
        $message->to('2123200414@soy.utj.edu.mx') // Dirección de correo del destinatario ventas@jbtechnipack.com
            ->subject('Nuevo mensaje desde "DEMA PHOTO" de ' . $data['name'])
            ->html('<h2><strong>Asunto:</strong> ' . $data['asunto'] . '</h2>
                   <h3>Detalles del mensaje:</h3>
                   <p><strong>Nombre:</strong> ' . $data['name'] . '</p>
                   <p><strong>Correo electrónico:</strong> ' . $data['email'] . '</p>
                   <p><strong>Número de teléfono:</strong> ' . $data['phone'] . '</p>
                   <p><strong>Ciudad:</strong> ' . $data['city'] . '</p>
                   <p><strong>Estado:</strong> ' . $data['state'] . '</p>
                   <p><strong>País:</strong> ' . $data['country'] . '</p>
                   <p><strong>Mensaje:</strong> ' . $data['message'] . '</p>', 'text/html');
    });

    // Redirigir al usuario con un mensaje de éxito
    return redirect()->route('contacto', ['#contactForm'])->with('success', 'Correo enviado, nos pondremos en contacto contigo');
}

}
