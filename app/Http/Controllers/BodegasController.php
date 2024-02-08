<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\bodegas;
use Illuminate\Http\Request;

class BodegasController extends Controller
{
    public function index(Request $request)
    {
        $textos = $request->input('textos');
    
        $bodegas = bodegas::where('nombre', 'LIKE', '%' . $textos . '%')
            ->orWhere('direccion', 'LIKE', '%' . $textos . '%')
            // Add additional fields as needed for your search
            ->latest('id')
            ->paginate(10); // Adjust the pagination as per your requirements
    
        return view('bodegas.index', compact('bodegas', 'textos'));
    }

    public function create()
    {
        $bodegas = bodegas::all(); 
        return view('bodegas.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required',
            'direccion' => 'required',
        ]);
        

        bodegas::create([
            'nombre' => $request->nombre,
            'direccion' => $request->direccion,
            'estado' => true,
        ]);

        return redirect()->route('bodegas.index')
            ->with('success', 'Bodega creada correctamente.');
    }

    public function edit($id)
    {
        $bodega = bodegas::findOrFail($id);
        return view('bodegas.edit', compact('bodega'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|unique:bodegas,nombre,' . $id,
            'direccion' => 'required',
        ]);

        $bodega = bodegas::findOrFail($id);
        $bodega->update([
            'nombre' => $request->nombre,
            'direccion' => $request->direccion,
        ]);

        return redirect()->route('bodegas.index')
            ->with('success', 'Bodega actualizada correctamente.');
    }

    public function activate($id)
    {
        $bodega = bodegas::findOrFail($id);

        // Cambiar el estado de activo a inactivo o viceversa
        $bodega->update(['activo' => !$bodega->activo]);

        if ($bodega->activo) {
            return redirect()->route('bodegas.index')->with('success', 'Bodega activada con éxito');
        } else {
            return redirect()->route('bodegas.index')->with('error', 'Bodega desactivada');
        }
    }
}