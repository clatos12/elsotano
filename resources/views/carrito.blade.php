@extends('layout.layoutcorto')

@section('title', 'Carrito de Compras')

@section('body-class', 'no-home')

@section('content')

<div class="container my-5" style="margin-top: 100px;">
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

                @foreach(session('carrito') as $id => $item)
                    @php
                        $subtotal = $item['precio'] * $item['cantidad'];
                        $total += $subtotal;
                    @endphp
                    <tr>
                        <td>{{ $item['titulo'] }}</td>
                        <td>
                            @if(!empty($item['fotografia']))
                                <img src="{{ config('app.storage_url') . $item['fotografia'] }}"
                                     alt="{{ $item['titulo'] }}" width="80">
                            @else
                                <span class="text-muted">Sin imagen</span>
                            @endif
                        </td>
                        <td>${{ number_format($item['precio'], 2) }}</td>
                        <td>{{ $item['cantidad'] }}</td>
                        <td>${{ number_format($subtotal, 2) }}</td>
                        <td>
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

        <!-- TOTAL -->
        <div class="text-end mb-3">
            <h4>Total: ${{ number_format($total, 2) }}</h4>
        </div>

        <!-- BOTÓN PEDIDO -->
        <div class="text-end mb-4">
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalPago">
                Realizar pedido
            </button>
        </div>

        <!-- BOTONES -->
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

<!-- ========================= -->
<!-- MODAL -->
<!-- ========================= -->
<div class="modal fade" id="modalPago" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <form action="{{ route('pedido.procesar') }}" method="POST">
        @csrf

        <div class="modal-header">
          <h5 class="modal-title">Finalizar Pedido</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">

          <!-- CLIENTE -->
          <h5>Datos del cliente</h5>
          <div class="row">
              <div class="col-md-6 mb-3">
                  <label>Nombre</label>
                  <input type="text" name="nombre" class="form-control" required>
              </div>
              <div class="col-md-6 mb-3">
                  <label>Correo</label>
                  <input type="email" name="correo" class="form-control" required>
              </div>
          </div>

          <!-- DIRECCIÓN -->
          <h5>Dirección de envío</h5>
          <div class="mb-3">
              <input type="text" name="direccion" class="form-control" required>
          </div>

          <!-- ENVÍO -->
          <h5>Método de envío</h5>
          <div class="mb-3">
              <select name="envio" class="form-select" required id="metodoEnvio">
                  <option value="">Selecciona</option>
                  <option value="estandar">Envío estándar</option>
                  <option value="express">Envío express</option>
                  <option value="tienda">Recoger en tienda</option>
              </select>
          </div>

          <!-- PAGO -->
          <h5>Método de pago</h5>
          <div class="mb-3">
              <select name="pago" class="form-select" required id="metodoPago">
                  <option value="">Selecciona</option>
                  <option value="tarjeta">Tarjeta</option>
                  <option value="deposito">Depósito</option>
                  <option value="efectivo" disabled>Contra entrega</option>
              </select>
          </div>

          <!-- INFO DEPÓSITO -->
          <div id="infoDeposito" class="alert alert-info" style="display:none;">
              Banco: BBVA <br>
              Cuenta: 1234567890 <br>
              Referencia: Librería Online
          </div>

          <!-- TARJETA -->
          <div id="datosTarjeta" style="display:none;">
              <input type="text" class="form-control mb-2" placeholder="Número de tarjeta">
              <input type="text" class="form-control mb-2" placeholder="MM/AA">
              <input type="text" class="form-control" placeholder="CVV">
          </div>

        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-success">
              Confirmar Pedido
          </button>
        </div>

      </form>

    </div>
  </div>
</div>

<!-- ========================= -->
<!-- SCRIPT FUNCIONAL -->
<!-- ========================= -->
<script>
document.addEventListener("DOMContentLoaded", function() {

    const envio = document.getElementById('metodoEnvio');
    const pago = document.getElementById('metodoPago');
    const tarjeta = document.getElementById('datosTarjeta');
    const deposito = document.getElementById('infoDeposito');

    if (!envio || !pago) return;

    function actualizarEnvio() {
        const efectivo = pago.querySelector('option[value="efectivo"]');

        if (envio.value === 'tienda') {
            efectivo.disabled = false;
        } else {
            efectivo.disabled = true;
            if (pago.value === 'efectivo') {
                pago.value = "";
            }
        }
    }

    function actualizarPago() {
        tarjeta.style.display = (pago.value === 'tarjeta') ? 'block' : 'none';
        deposito.style.display = (pago.value === 'deposito') ? 'block' : 'none';
    }

    envio.addEventListener('change', actualizarEnvio);
    pago.addEventListener('change', actualizarPago);

});
</script>

@endsection