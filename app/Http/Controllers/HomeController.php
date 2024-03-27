<?php

namespace App\Http\Controllers;

use App\Models\categoria;
use App\Models\ingreso;
use App\Models\inventario;
use App\Models\Bodegas;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categorias=Categoria::count();
        $usuarios=User::count();
        $ingresos =ingreso::count();
        $bodegas =bodegas::count();
        return view('home',['categorias'=>$categorias,'usuarios'=>$usuarios,'ingreso'=>$ingresos,'bodegas'=>$bodegas]);
    }
}
