<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\inventario;
use Illuminate\Http\Request;

class InventarioController extends Controller
{
   
    public function index(){
      $ingreso = inventario::all();
      return view('ingresus.index',compact('ingreso'));
    }



  }

   





        


