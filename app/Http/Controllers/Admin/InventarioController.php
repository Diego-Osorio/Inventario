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



    public function create(){
        return view('inventarius.create');
        
    }
    
    

    public function sendData(Request $request){

         $rules = [
            'name' => 'required|min:5'
            
         ];
         $messages = [
            'name.required' => 'El Nombre del Producto Es obligatorio ',
            'name.min' => 'El nombre del Producto a ingresar  debe tener mas de 5 caracteres.',
            
         ];

       $this->validate($request, $rules, $messages);

       $inventarios = new inventario();
       $inventarios->name =$request->input('name');
       $inventarios->descripcion =$request->input('description');
       $inventarios->save();
       $inventarios ='La Produco se ha creado correctamente.';

       return Redirect('/inventario')->with(compact('notification'));
       
    }
   

    public function update(Request $request,inventario $inventarios){

      $rules = [
         'name' => 'required|min:5'
      ];
      $messages = [
         'name.required' => 'El Nombre de la categoria Es obligatorio ',
         'name.min' => 'El nombre de la Categoria Debe tener mas de 5 caracteres.',
         
      ];

    $this->validate($request, $rules, $messages);

    $inventarios->name =$request->input('name');
    $inventarios->descripcion =$request->input('description');
    $inventarios->save();
    $notification ='El Producto  se ha actualizado correctamente en el inventario.';

    return redirect('/inventario')->with(compact('notification'));


   }


   public function destroy(inventario $inventarios) {
      $deleteName = $inventarios->name;
      $inventarios->delete();
      $notification ='El Producto ' .$deleteName .'  se ha eliminado correctamente del Inventario.';
      return redirect('/inventario')->with(compact('notification'));


   }




}

   





        


