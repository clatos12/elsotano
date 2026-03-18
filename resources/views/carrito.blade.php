@extends('layout.layout')

@section('title', 'Carrito de Compras')

@section('content')
<body id="carrito">

<div class="container my-5">
    <h2 class="mb-4 text-center">Carrito de Compras</h2>

    @if(session('carrito') && count(session('carrito')) > 0)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp

                {{-- AQUÍ ESTÁ LA CORRECCIÓN CLAVE --}}
                @foreach(session('carrito') as $id => $item)
                    @php
                        $subtotal = $item['precio'] * $item['cantidad'];
                        $total += $subtotal;
                    @endphp
                    <tr>
                        <td>{{ $item['titulo'] }}</td>
                        <td>
                            @if(!empty($item['fotografia']))
                                <img
                                    src="{{ config('app.storage_url') . $item['fotografia'] }}"
                                    alt="{{ $item['titulo'] }}"
                                    width="80">
                            @else
                                <span class="text-muted">Sin imagen</span>
                            @endif
                        </td>
                        <td>${{ number_format($item['precio'], 2) }}</td>
                        <td>{{ $item['cantidad'] }}</td>
                        <td>${{ number_format($subtotal, 2) }}</td>
                        <td>
                            {{-- USAR $id, NO $item['id'] --}}
                            <form action="{{ route('carrito.eliminar', $id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

        <div class="text-end mb-3">
            <h4>Total: ${{ number_format($total, 2) }}</h4>
        </div>

        <div class="d-flex justify-content-between">
            <form action="{{ route('carrito.vaciar') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-warning">
                    Vaciar Carrito
                </button>
            </form>
            <a href="/" class="btn btn-primary">Seguir Comprando</a>
        </div>
    @else
        <div class="alert alert-info text-center">
            Tu carrito está vacío.
        </div>
        <div class="text-center mt-3">
            <a href="/" class="btn btn-primary">Ver productos</a>
        </div>
    @endif
</div>

</body>
@endsection
