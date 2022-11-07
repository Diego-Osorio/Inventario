<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class categoriaController extends Controller
{
   
    public function index(){
        $categories = categoria::all();
        return view('categories.index',compact('categories'));
    }





}