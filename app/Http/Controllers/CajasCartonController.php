<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class CajasCartonController extends Controller
{
    public function index()
    {
        // Obtener los últimos 6 productos disponibles de la categoría "Cajas de Cartón"
        $productos = Producto::where('categoria', 'cajas_carton')
                             ->where('estado', true) // Filtrar por estado (disponible)
                             ->orderBy('created_at', 'desc') // Ordenar por fecha de creación (últimos)
                             ->take(6) // Limitar a 6 productos
                             ->get();

        // Enviar productos a la vista
        return view('cajas.cajasCarton', compact('productos'));
    }
}
