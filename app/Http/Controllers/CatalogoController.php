<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class CatalogoController extends Controller
{
    //novedades
    public function index()
    {
        // Obtener los últimos 6 productos disponibles de la categoría "Cajas de Cartón"
        $productos = Producto::where('estado', true) // Filtrar por estado (disponible)
                             ->orderBy('created_at', 'desc') // Ordenar por fecha de creación (últimos)
                             ->take(6) // Limitar a 6 productos
                             ->get();

        // Enviar productos a la vista
        return view('welcome', compact('productos'));
    }
    //miselaneos
    public function contenidoVideo()
    {
        // Obtener los últimos 6 productos disponibles de la categoría "miselaneos"
        $productos = Producto::where('categoria', 'contenidoVideo')
                             ->where('estado', true) // Filtrar por estado (disponible)
                             ->orderBy('created_at', 'desc') // Ordenar por fecha de creación (últimos)
                             ->take(6) // Limitar a 6 productos
                             ->get();

        // Enviar productos a la vista
        return view('contenido.contenidoVideo', compact('productos'));
    }
    
    public function contenidoFotografia()
    {
        // Obtener los últimos 6 productos disponibles de la categoría "miselaneos"
        $productos = Producto::where('categoria', 'contenidoFotografia')
                             ->where('estado', true) // Filtrar por estado (disponible)
                             ->orderBy('created_at', 'desc') // Ordenar por fecha de creación (últimos)
                             ->take(6) // Limitar a 6 productos
                             ->get();

        // Enviar productos a la vista
        return view('contenido.contenidoFotografia', compact('productos'));
    }
    //integraciones
    public function marketingFacebookAds()
    {
    // Obtener los últimos 6 productos disponibles de la categoría "contenidoFacebookAds"
        $productos = Producto::where('categoria', 'marketingFacebookAds')
                         ->where('estado', true) // Filtrar solo productos activos
                         ->orderBy('created_at', 'desc') // Últimos agregados
                         ->take(6) // Limitar a 6 elementos
                         ->get();

    // Enviar productos a la vista
        return view('marketing.marketingFacebook', compact('productos'));
    }

    public function marketingGestionRedes()
{
    // Obtener los últimos 6 productos de la categoría correspondiente
    $productos = Producto::where('categoria', 'gestionRedes')
                         ->where('estado', true)
                         ->orderBy('created_at', 'desc')
                         ->take(6)
                         ->get();

    return view('marketing.marketingRedes', compact('productos'));
}
public function novedades()
{
    // Obtener los últimos 6 productos marcados como novedades
    $productos = Producto::where('categoria', 'novedades')
                         ->where('estado', true)
                         ->orderBy('created_at', 'desc')
                         ->take(6)
                         ->get();

    return view('novedades.novedades', compact('productos'));
}
public function ofertas()
{
    $productos = Producto::where('estado', 1)
        ->where('categoria', 'ofertas')
        ->orderBy('created_at', 'desc')
        ->take(6)
        ->get();

    return view('novedades.ofertas', compact('productos'));
}

public function vendidos()
{
    $productos = Producto::where('estado', 1)
        ->where('categoria', 'vendidos')
        ->orderBy('created_at', 'desc')
        ->take(6)
        ->get();

    return view('novedades.vendidos', compact('productos'));
}
public function autoayuda()
{
    $productos = Producto::where('categoria', 'autoayuda')
        ->where('estado', true)
        ->orderBy('created_at', 'desc')
        ->get();

    return view('categorias.autoayuda', compact('productos'));
}
public function ciencia()
{
    $productos = Producto::where('categoria', 'ciencia')
        ->where('estado', true)
        ->orderBy('created_at', 'desc')
        ->get();

    return view('categorias.ciencia', compact('productos'));
}
public function educacion()
{
    $productos = Producto::where('categoria', 'educacion')
        ->where('estado', true)
        ->orderBy('created_at', 'desc')
        ->get();

    return view('categorias.educacion', compact('productos'));
}
public function infantil()
{
    $productos = Producto::where('categoria', 'infantil')
        ->where('estado', true)
        ->orderBy('created_at', 'desc')
        ->get();

    return view('categorias.infantil', compact('productos'));
}
public function literatura()
{
    $productos = Producto::where('categoria', 'literatura')
        ->where('estado', true)
        ->orderBy('created_at', 'desc')
        ->get();

    return view('categorias.literatura', compact('productos'));
}
public function novela()
{
    $productos = Producto::where('categoria', 'novela')
        ->where('estado', true)
        ->orderBy('created_at', 'desc')
        ->get();

    return view('categorias.novela', compact('productos'));
}
public function tecnologia()
{
    $productos = Producto::where('categoria', 'tecnologia')
        ->where('estado', true)
        ->orderBy('created_at', 'desc')
        ->get();

    return view('categorias.tecnologia', compact('productos'));
}


public function brandingIdentidad()
{
    // Obtener los últimos 6 productos de la categoría correspondiente
    $productos = Producto::where('categoria', 'brandingIdentidad')
                         ->where('estado', true)
                         ->orderBy('created_at', 'desc')
                         ->take(6)
                         ->get();

    return view('branding.brandingIdentidad', compact('productos'));
}

}
