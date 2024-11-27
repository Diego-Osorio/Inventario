<?php

namespace App\Http\Controllers\Admin;
use App\Exports\productosExport;
use App\Http\Controllers\Controller;
use App\Models\categoria;
use App\Models\detalle_ingreso;
use App\Models\inventario;
use App\Models\marca;
use App\Models\Producto;
use App\Models\bodegas;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\ingreso;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Facades\Excel;
use PhpParser\Node\Expr\AssignOp\Concat;

class ingresoController extends Controller
{
 

  public function index(Request $request)
  {
      $textos = $request->input('textos'); // Use the correct input name from the form
  
      $ingresos = ingreso::where('tipodocumento', 'LIKE', '%' . $textos . '%')
          ->orWhere('ndocumento', 'LIKE', '%' . $textos . '%') // Assuming you want to search by 'ndocumento' as well
          ->latest('id')
          ->orderBy('fecha', 'asc')
          ->paginate(2);
  
      return view('ingresus.index', compact('ingresos', 'textos'));
  }
   
   
  public function create()
  {
        $categorias=categoria::orderBy('id')->get();
        $marcas=marca::orderBy('id')->get();  
        $bodegas = bodegas::orderBy('id')->get();
      return view('ingresus.create',['categorias'=>$categorias,'marcas'=>$marcas,'bodegas'=>$bodegas]);
  }
   
  public function sendData(Request $request)
  {
      $rules = [
          'fecha' => 'required',
          'ndocumento' => 'required',
          'tipodocumento' => 'required',
          'bodega_id' => 'required|integer',
      ];
  
      $messages = [
          'fecha.required' => 'El ingreso de la fecha es obligatorio',
          'ndocumento.required' => 'El ingreso del numero de documento es obligatorio',
          'tipodocumento.required' => 'Debe seleccionar el tipodocumento',
      ];
  
      $this->validate($request, $rules, $messages);
  
      try {
          DB::beginTransaction();
  
          $ingreso = new Ingreso();
          $ingreso->fecha = $request->fecha;
          $ingreso->ndocumento = $request->ndocumento;
          $ingreso->tipodocumento = $request->tipodocumento;
          $ingreso->ordencompra = $request->ordencompra;
          $ingreso->save();
  
          $productos = [];
  
          $cont = 0;
          while ($cont < count($request->producto)) {
              $producto = new Producto();
  
              $producto->nombre = $request->producto[$cont];
              $producto->codigo = $request->codigo[$cont];
              $producto->categoria_id =  $request->idcategoria[$cont];
              $producto->marcas_id = isset($request->marcas_id) ? $request->marcas_id : null;
              $producto->stock = $request->cantidad[$cont];
              $producto->descripcion = $request->descripcion[$cont] ?? "Default Description";
              $producto->bodega_id = $request->bodega_id;
              $producto->save();
              $productos[] = $producto;
  
              $detalleIngreso = new detalle_ingreso();
              $detalleIngreso->id_ingreso = $ingreso->id;
              $detalleIngreso->id_producto = $producto->id;
              $detalleIngreso->cantidad = $producto->stock;
              $detalleIngreso->save();
  
              $cont++;
          }
  
          DB::commit();
      } catch (\Exception $e) {
          DB::rollBack();
          throw $e;
      }
  
      $notification = 'El ingreso se ha registrado correctamente.';
      return redirect('/ingreso')->with(compact('notification'));
  }
  

  public function show($id)
{
    // Obtener información del ingreso específico
    $ingreso = DB::table('ingreso')
        ->select('ingreso.id', 'ingreso.fecha', 'ingreso.tipodocumento', 'ingreso.ndocumento', 'ingreso.ordencompra')
        ->where('ingreso.id', $id)
        ->first();

    // Verificar si el ingreso existe
    if (!$ingreso) {
        abort(404, 'Ingreso no encontrado');
    }

    $detalles = DB::table('detalle_ingreso')
        ->select('detalle_ingreso.id', 'detalle_ingreso.id_ingreso', 'detalle_ingreso.id_producto',
            'productos.nombre as producto', 'productos.marcas_id', 'productos.categoria_id',
            'marcas.nombre as marcas', 'categorias.nombre as categoria', 'detalle_ingreso.cantidad')
        ->join('marcas', 'marcas.id', '=', 'productos.marcas_id')
        ->join('categorias', 'categorias.id', '=', 'productos.categoria_id')
        ->where('detalle_ingreso.id_ingreso', $id)
        ->join('productos', 'detalle_ingreso.id_producto', '=', 'productos.id')
        ->get();
    // Obtener categorías, marcas y productos únicos
    $categorias = $detalles->pluck('categoria')->unique();
    $marcas = $detalles->pluck('marcas')->unique();
    $productos = $detalles->pluck('producto')->unique();

    return view('ingresus.show', compact('ingreso', 'detalles', 'categorias', 'marcas', 'productos'));
}

    
        public function export()
          {
   
          return Excel::download(new productosExport,'Productos-list.xlsx');

          }
          public function downloadPDF()
          {
              $productos = Producto::all();
              $pdf = PDF::loadView('exportProducto', ['productos' => $productos]);
          
              return $pdf->download('productos.pdf');
          }
        public function destroy($id)
        {

            $ingreso=ingreso::findOrFail($id);
            $ingresos=$ingreso->nombre;
            $ingreso->delete();
          

            $notification = "El Producto $ingresos se elimino correctamente ";
            return redirect('/ingreso')->with(compact('notification'));

           

        }
    
  
  public function __construct() {
  }
}