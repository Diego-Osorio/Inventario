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
    $ingresos = DB::table('ingreso')
                   ->select('ingreso.id','ingreso.fecha','ingreso.tipodocumento','ingreso.ndocumento')->get();

				   $detalles = DB::table('detalle_ingreso')->select('detalle_ingreso.id','detalle_ingreso.id_ingreso',
				   'detalle_ingreso.id_producto', 'productos.nombre as producto', 'productos.marca_id','productos.categoria_id',
				   'marcas.nombre as marca','categorias.nombre as categoria', 'detalle_ingreso.cantidad')
				    ->join('marcas','marcas.id','=', 'productos.marca_id')
					->join('categorias','categorias.id','=','productos.categoria_id')
					->join('detalle_ingreso','detalle_ingreso.id_ingreso', '=','ingreso.id')
					->join('detalle_ingreso','detalle_ingreso.id_producto','=','productos.id')->get();

					dump($detalles);
                    //return view('ingresus.show', ['ingreso'=>$ingresos,'detalles'=>$detalles]);
    
}
}