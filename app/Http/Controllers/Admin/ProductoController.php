<?php

namespace App\Http\Controllers\Admin;
use App\Models\producto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
   
    public function index()
    {
        $producto = Producto::ordenBy('created_at')->get();
   
        return view('productos.idex',compact('producto'));
    }
}