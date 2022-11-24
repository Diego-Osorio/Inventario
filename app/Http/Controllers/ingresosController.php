<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\categoria;
use App\Models\detalle_ingreso;
use App\Models\inventario;
use App\Models\marca;
use App\Models\Producto;
use Illuminate\Http\Request;
use App\Models\ingreso;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Expr\AssignOp\Concat;

use Illuminate\Support\Facades\Validator;
class ingresosController extends Controller
{
    
    
    public function index(Request $request)
   {
        $ingresos = ingreso::all();
        $ingresos = ingreso::orderBy('id', 'desc')->paginate(6);
        
        return view('ingresus.index', compact('ingresos'));
    }


public function show ($id)
{
    $ingresos = ingreso::find($id);
    $producto = Producto::find($id);
      return view('ingresus.show', ['ingreso'=>$ingresos,'productos'=>$producto]);


    
}
}