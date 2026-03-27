<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\Session;

class ProductoController extends Controller
{
    public function index(Request $request)
    {
        $productos = Producto::query();

        if ($request->filled('categoria')) {
            $productos->where('categoria', $request->categoria);
        }

        if ($request->filled('search')) {
            $productos->where('titulo', 'like', '%' . $request->search . '%');
        }

        $order = $request->get('order', 'desc');
        $productos = $productos->orderBy('created_at', $order)->paginate(10);

        if ($request->wantsJson()) {
            return response()->json($productos);
        }

        Session::put('page', 'productos.index');
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        Session::put('page', 'productos.create');
        return view('productos.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fotografia' => 'nullable|file|image|max:5120',
            'categoria' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
            'cantidad' => 'required|integer|min:0', // ✅ NUEVO
            'isbn' => 'nullable|string|max:20',     // ✅ NUEVO
            'estado' => 'required|boolean',
        ]);

        $fotografiaPath = $request->hasFile('fotografia')
            ? $request->file('fotografia')->store('fotografias', 'public')
            : null;

        $producto = Producto::create([
            'titulo' => $validated['titulo'],
            'descripcion' => $validated['descripcion'],
            'fotografia' => $fotografiaPath,
            'categoria' => $validated['categoria'],
            'precio' => $validated['precio'],
            'cantidad' => $validated['cantidad'], // ✅ NUEVO
            'isbn' => $validated['isbn'],         // ✅ NUEVO
            'estado' => $validated['estado'],
            'usuario_id' => auth()->id() ?? null,
        ]);

        if ($request->wantsJson()) {
            return response()->json([
                'message' => 'Producto creado correctamente',
                'producto' => $producto
            ], 201);
        }

        return redirect()->route('productos.index')
            ->with('success', 'Producto creado exitosamente');
    }

    public function show($id)
    {
        $producto = Producto::findOrFail($id);

        if (request()->wantsJson()) {
            return response()->json($producto);
        }

        return view('productos.show', compact('producto'));
    }

    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        return view('productos.edit', compact('producto'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fotografia' => 'nullable|image|max:5120',
            'categoria' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
            'cantidad' => 'required|integer|min:0', // ✅ NUEVO
            'isbn' => 'nullable|string|max:20',     // ✅ NUEVO
            'estado' => 'required|boolean',
        ]);

        $producto = Producto::findOrFail($id);

        if ($request->hasFile('fotografia')) {
            $producto->fotografia = $request->file('fotografia')->store('fotografias', 'public');
        }

        $producto->update($validated);

        return request()->wantsJson()
            ? response()->json([
                'message' => 'Producto actualizado',
                'producto' => $producto
            ])
            : redirect()->route('productos.index')
                ->with('success', 'Producto actualizado');
    }

    public function toggleEstado($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->estado = !$producto->estado;
        $producto->save();

        return request()->wantsJson()
            ? response()->json(['message' => 'Estado actualizado'])
            : back()->with('success', 'Estado actualizado');
    }

    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();

        return request()->wantsJson()
            ? response()->json(['message' => 'Producto eliminado'])
            : redirect()->route('productos.index')
                ->with('success', 'Producto eliminado');
    }

    public function imprimir($id)
    {
        $producto = Producto::findOrFail($id);
        return view('productos.imprimir', compact('producto'));
    }
}