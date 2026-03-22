<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function procesar(Request $request)
    {
        // =========================
        // VALIDACIÓN
        // =========================
        $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email',
            'direccion' => 'required|string|max:500',
            'envio' => 'required|string',
            'pago' => 'required|string',
        ]);

        // =========================
        // OBTENER CARRITO
        // =========================
        $carrito = session('carrito', []);

        if (empty($carrito)) {
            return redirect()->back()->with('error', 'El carrito está vacío');
        }

        // =========================
        // CALCULAR TOTAL
        // =========================
        $total = 0;

        foreach ($carrito as $item) {
            $total += $item['precio'] * $item['cantidad'];
        }

        // =========================
        // CREAR PEDIDO
        // =========================
        $pedido = [
            'cliente' => $request->nombre,
            'correo' => $request->correo,
            'direccion' => $request->direccion,
            'envio' => $request->envio,
            'pago' => $request->pago,
            'total' => $total,
            'productos' => $carrito
        ];

        // GUARDAR EN SESIÓN
        session()->put('ultimo_pedido', $pedido);

        // LIMPIAR CARRITO
        session()->forget(['carrito', 'carrito_count']);

        // REDIRIGIR
        return redirect()->route('pedido.gracias');
    }

    // ✅ ESTE VA FUERA DEL MÉTODO procesar
    public function ticket()
    {
        $pedido = session('ultimo_pedido');

        if (!$pedido) {
            return redirect('/');
        }

        return view('pedido.ticket', compact('pedido'));
    }
}