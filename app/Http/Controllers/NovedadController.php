<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Novedad;

class NovedadController extends Controller
{
    public function index()
    {
        $novedades = Novedad::all();
        return response()->json(['novedades' => $novedades], 200);
    }
   
    public function store(Request $request)
    {
        $request->validate([
            'url' => 'required|string'
        ]);
        $novedad = Novedad::create([ 'url' => $request->url ]);        
        return response()->json(['message' => 'Novedad creada con éxito', 'novedad' => $novedad], 201);
    }

    public function show($id)
    {
        $novedad = Novedad::find($id);
        if (!$novedad) {
            return response()->json(['message' => 'Novedad no encontrada'], 404);
        }   
        return response()->json(['novedad' => $novedad], 200);
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'url' => 'required|string'
        ]);
        $novedad = Novedad::find($id); 
        if (!$novedad) {
            return response()->json(['message' => 'Novedad no encontrada'], 404);
        } 
        $novedad->update([ 'url' => $request->url ]);       
        return response()->json(['message' => 'Novedad actualizada con éxito', 'novedad' => $novedad], 200);
    }

    public function destroy($id)
    {
        $novedad = Novedad::find($id);
        if (!$novedad) {
            return response()->json(['message' => 'Novedad no encontrada'], 404);
        }  
        $novedad->delete();
        return response()->json(['message' => 'Novedad eliminada con éxito'], 200);
    }
}