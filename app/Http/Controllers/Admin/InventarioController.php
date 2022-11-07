<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\inventario;
use Illuminate\Http\Request;

class InventarioController extends Controller
{
   
    public function index(){
      $producto = inventario::all();
      return view('inventarius.index',compact('producto'));
    }



  }

   





        


