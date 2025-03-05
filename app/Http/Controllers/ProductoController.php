<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Mostrar todos los productos.
     */
    public function index()
    {
        $productos = Producto::all();
        return response()->json([
            'productos' => $productos,
            'status' => 200
        ], 200);
    }

    /**
     * Guardar un nuevo producto.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|unique:productos,descripcion',
            'precio' => 'required|numeric|min:0',
            'imagen' => 'nullable|string',
        ]);

        $producto = Producto::create($request->all());

        return response()->json([
            'message' => 'Producto creado exitosamente',
            'producto' => $producto,
            'status' => 201
        ], 201);
    }

    /**
     * Mostrar un producto específico.
     */
    public function show($id)
    {
        $producto = Producto::find($id);

        if (!$producto) {
            return response()->json([
                'message' => 'Producto no encontrado',
                'status' => 404
            ], 404);
        }

        return response()->json([
            'producto' => $producto,
            'status' => 200
        ], 200);
    }

    /**
     * Actualizar un producto.
     */
    public function update(Request $request, $id)
{
    $producto = Producto::find($id);

    if (!$producto) {
        return response()->json([
            'message' => 'Producto no encontrado',
            'status' => 404
        ], 404);
    }

    $request->validate([
        'nombre' => 'sometimes|required|string|max:255',
        'descripcion' => 'sometimes|required|string|unique:productos,descripcion,' . $id,
        'precio' => 'sometimes|required|numeric|min:0',
        'imagen' => 'nullable|string',
    ]);

    $producto->update($request->all());

    return response()->json([
        'message' => 'Producto actualizado exitosamente',
        'producto' => $producto,
        'status' => 200
    ], 200);
}


    /**
     * Eliminar un producto.
     */
    public function destroy($id)
    {
        $producto = Producto::find($id);

        if (!$producto) {
            return response()->json([
                'message' => 'Producto no encontrado',
                'status' => 404
            ], 404);
        }

        $producto->delete();

        return response()->json([
            'message' => 'Producto eliminado exitosamente',
            'status' => 200
        ], 200);
    }
}
