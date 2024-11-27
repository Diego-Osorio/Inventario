<?php

namespace App\Http\Controllers\Admin;

use App\Models\Marca;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MarcaController extends Controller
{
    public function index()
    {
        $marcas = Marca::all();
        return view('marca.index', compact('marcas'));
    }

    public function create()
    {
        return view('marca.create');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|min:5|max:255',
            'descripcion' => 'nullable|string|max:500',
        ], [
            'nombre.required' => 'El campo "Nombre" es obligatorio.',
            'nombre.min' => 'El campo "Nombre" debe tener al menos 5 caracteres.',
        ]);
    
        Marca::create($data);
    
        return redirect()->route('marca.index')->with('success', 'Marca creada exitosamente.');
    }
    

    public function edit(Marca $marca)
    {
        return view('marca.edit', compact('marca'));
    }

    public function update(Request $request, Marca $marca)
    {
        $data = $request->validate([
            'nombre' => 'required|string|min:5|max:255',
            'descripcion' => 'nullable|string|max:500',
        ]);

        $marca->update($data);

        return redirect()->route('marca.index')->with('success', 'Marca actualizada exitosamente.');
    }

    public function destroy(Marca $marca)
    {
        $nombre = $marca->nombre;
        $marca->delete();

        return redirect()->route('marca.index')->with('success', "La marca '{$nombre}' se ha eliminado correctamente.");
    }
}
