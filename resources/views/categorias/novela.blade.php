@extends('layout.layout')

@section('title', 'Novela')

@section('content')
<div class="container my-5">
    <h2 class="mb-4 text-center">Novela</h2>

    @if(isset($productos) && count($productos) > 0)
        <div class="row">
            @foreach($productos as $producto)
                <div class="col-md-3 mb-4">
                    <div class="card h-100">
                        @if(!empty($producto->fotografia))
                            <img 
                                src="{{ config('app.storage_url') . $producto->fotografia }}" 
                                class="card-img-top" 
                                alt="{{ $producto->titulo }}"
                                style="height: 250px; object-fit: cover;"
                            >
                        @else
                            <div class="text-center p-4 text-muted">
                                Sin imagen
                            </div>
                        @endif

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $producto->titulo }}</h5>
                            <p class="card-text fw-bold">
                                ${{ number_format($producto->precio, 2) }}
                            </p>

                            @auth
                                <form action="{{ route('carrito.agregar', $producto->id) }}" method="POST" class="mt-auto">
                                    @csrf
                                    <button type="submit" class="btn btn-primary w-100">
                                        Agregar al carrito
                                    </button>
                                </form>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-outline-secondary mt-auto w-100">
                                    Inicia sesión para comprar
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-info text-center">
            No hay novelas disponibles por el momento.
        </div>
    @endif
</div>
@endsection
