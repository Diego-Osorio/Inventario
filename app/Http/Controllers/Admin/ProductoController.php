<?php

namespace App\Http\Controllers\Admin;
use App\Exports\productosExport;
use App\Models\producto;
use App\Http\Controllers\Admin\detalle_ingreso;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ProductoController extends Controller
{
   
    public function index()
    {
   // $ingreso = inventario::all();
   return view('ingresus.index',compact('ingreso'));
}



}
