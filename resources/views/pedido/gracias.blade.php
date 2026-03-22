@extends('layout.layoutcorto')

@section('title', 'Gracias por tu compra')

@section('body-class', 'no-home')
<div class="container text-center mt-5">

    <h2 class="mb-3">🎉 ¡Gracias por tu compra!</h2>
    <p class="mb-4">Tu pedido se realizó correctamente.</p>

    <!-- BOTÓN VER TICKET -->
    <a href="{{ route('pedido.ticket') }}" class="btn btn-success mb-3">
        Ver / Descargar Ticket
    </a>

    <br>

    <!-- VOLVER A TIENDA -->
    <a href="/" class="btn btn-primary">
        Volver a la tienda
    </a>

</div>
