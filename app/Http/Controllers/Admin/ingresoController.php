<?php

namespace App\Http\Controllers\Admin;
use App\Exports\productosExport;
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
use Maatwebsite\Excel\Facades\Excel;
use PhpParser\Node\Expr\AssignOp\Concat;

class ingresoController extends Controller
{
 

   public function index(Request $request)
   {
        $ingresos = ingreso::all();
        $ingresos = ingreso::orderBy('id', 'desc')->paginate(7);
        
        return view('ingresus.index', compact('ingresos'));
    }

   
   
  public function create()
  {
        $categorias=categoria::orderBy('id')->get();
        $marcas=marca::orderBy('id')->get();  
      return view('ingresus.create',['categorias'=>$categorias,'marcas'=>$marcas]);
  }
   


   public function sendData(Request $request)
   {
       $rules = [
           'fecha'=>'required',
           'ndocumento'=>'required',
           'tipodocumento'=>'required',

       ];
       $messages =[
           'fecha.required' => 'el Ingreso de la fecha es obligatorio',
           'ndocumento.required' => 'El ingreso del numero de documento es obligatorio',
           'tipodocumento.required' => 'debe selecionar el tipodocumento',
       
           

       ];
       $this->validate($request, $rules, $messages);
          try{
              DB::beginTransaction();
              $ingreso = new ingreso();
              $ingreso->fecha = $request->fecha;
              $ingreso->ndocumento = $request->ndocumento;
              $ingreso->tipodocumento = $request->tipodocumento;
              $ingreso->save();  
             
              $productos = []; 
               $cont = 0;
              while($cont <count($request->producto)){
                $producto= new Producto();
                $producto->nombre=$request->producto[$cont];
                $producto->categoria_id=$request->idcategoria[$cont];
                $producto->marca_id=$request->idmarca[$cont];
                $producto->codigo =$request->codigo[$cont];
                $producto->stock =$request->cantidad[$cont];
                $producto->save();
                $cont++;
                array_push($productos, $producto);
              

            }

           $cont = 0;

        
        
           foreach ( $productos as $producto){
            $detalle_ingresos = new detalle_ingreso();
            $detalle_ingresos->id_ingreso=$ingreso->id;
            $detalle_ingresos->id_producto=$producto->id;
            $detalle_ingresos->cantidad=$producto->stock;
            $detalle_ingresos->save();            
        
          }
           DB::commit();
          }catch(\Exception $e){
            DB::rollBack();
            throw $e;
          }
          
             $notification ='El ingreso se ha registrado correctamente.';
            return redirect('/ingreso')->with(compact('notification'));
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
    
        public function export()
          {
   
          return Excel::download(new productosExport,'Producto-list.xlsx');

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