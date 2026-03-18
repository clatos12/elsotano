<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;


class CarritoController extends Controller
{
    // Mostrar el carrito
    public function ver()
    {
        $carrito = session()->get('carrito', []);
        return view('carrito', compact('carrito'));
    }

    // Agregar producto
    public function agregar($id)
{
    if (!Auth::check()) {
        return redirect()->route('login')
            ->with('error', 'Debes iniciar sesión para agregar productos al carrito.');
    }

    $producto = Producto::findOrFail($id);
    $carrito = session()->get('carrito', []);

    if (isset($carrito[$id])) {
        $carrito[$id]['cantidad']++;
    } else {
        $carrito[$id] = [
            "id" => $producto->id,
            "titulo" => $producto->titulo,
            "precio" => $producto->precio,
            "cantidad" => 1,
            "fotografia" => $producto->fotografia,
        ];
    }

    session()->put('carrito', $carrito);
    session()->put('carrito_count', array_sum(array_column($carrito, 'cantidad')));

    return redirect()->back()->with('success', 'Producto añadido al carrito');
}

    // Eliminar producto
    public function eliminar($id)
    {
        $carrito = session()->get('carrito', []);

        if (isset($carrito[$id])) {
            unset($carrito[$id]);
            session()->put('carrito', $carrito);
        }

        session()->put('carrito_count', array_sum(array_column($carrito, 'cantidad')));

        return redirect()->back()->with('success', 'Producto eliminado.');
    }

    // Vaciar carrito
    public function vaciar()
    {
        session()->forget(['carrito', 'carrito_count']);
        return redirect()->back()->with('success', 'Carrito vaciado.');
    }
}
