<?php

namespace App\Http\Controllers\Admin;
use App\Models\producto;
use App\Http\Controllers\Admin\detalle_ingreso;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
   
    public function index()
    {
   // $ingreso = inventario::all();
   return view('ingresus.index',compact('ingreso'));
}


}
