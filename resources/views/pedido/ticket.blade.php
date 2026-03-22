<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ticket de Compra</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }

        h2 {
            text-align: center;
        }

        .info {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }

        .total {
            text-align: right;
            margin-top: 20px;
        }

        .btn-container {
    text-align: center;
    margin-top: 30px;
}

.btn-custom {
    display: inline-block;
    margin: 10px;
    padding: 12px 25px;
    font-size: 16px;
    font-weight: bold;
    border-radius: 8px;
    text-decoration: none;
    transition: all 0.3s ease;
    border: none;
    cursor: pointer;
}

/* Botón imprimir */
.btn-print {
    background: #28a745;
    color: white;
}

.btn-print:hover {
    background: #218838;
    transform: translateY(-2px);
}

/* Botón seguir comprando */
.btn-shop {
    background: #007bff;
    color: white;
}

.btn-shop:hover {
    background: #0056b3;
    transform: translateY(-2px);
}

/* Ocultar en impresión */
@media print {
    .btn-container {
        display: none;
    }
}
        

    </style>
</head>
<body>

<h2>🧾 Ticket de Compra</h2>

<div class="info">
    <p><strong>Cliente:</strong> {{ $pedido['cliente'] }}</p>
    <p><strong>Correo:</strong> {{ $pedido['correo'] }}</p>
    <p><strong>Dirección:</strong> {{ $pedido['direccion'] }}</p>
    <p><strong>Método de envío:</strong> {{ $pedido['envio'] }}</p>
    <p><strong>Método de pago:</strong> {{ $pedido['pago'] }}</p>
    <p><strong>Fecha:</strong> {{ date('d/m/Y H:i') }}</p>
</div>

<table>
    <thead>
        <tr>
            <th>Producto</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pedido['productos'] as $item)
            <tr>
                <td>{{ $item['titulo'] }}</td>
                <td>${{ number_format($item['precio'], 2) }}</td>
                <td>{{ $item['cantidad'] }}</td>
                <td>${{ number_format($item['precio'] * $item['cantidad'], 2) }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<h3 class="total">
    Total: ${{ number_format($pedido['total'], 2) }}
</h3>

<!-- BOTÓN PARA IMPRIMIR / GUARDAR PDF -->
<div class="btn-container">
    <button class="btn-custom btn-print" onclick="window.print()">
        🖨️ Descargar / Imprimir Ticket
    </button>

    <a href="/" class="btn-custom btn-shop">
        🛒 Seguir comprando
    </a>
</div>

</body>
</html>