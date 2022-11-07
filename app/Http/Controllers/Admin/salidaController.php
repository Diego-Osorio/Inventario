<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\salida;
class salidaController extends Controller
{
    
    public function create()
    {
        
        return view ('salidas.form');
    }

   
  
  public function update(Request $request,salida $ingreso){

    $rules = [
      'date' => 'required',
      'tipedocu'=>'required',
      'ndocu'=>'required|min:10',
        
    ];
    $messages = [
      'name.required' => '  la Fecha de salida  Es obligatorio ',
      'tipedocu.required' => 'Debe selecionar el Tipo de Documento ',
      'ndocu.required'=>'El Ingreso del numero el documento es obligatorio',
       'ndocu.min'=>'El n° de documento debe tener minimo 10 numeros '
    ];

  $this->validate($request, $rules, $messages);
  $salida = new salida();
  $salida ->date =$request->date('Fecha');
  $salida->tipedocu =$request->integer('tipodocumento');
  $salida->ndocu =$request->integer('ndocumento');
  $salida->descripcion =$request->input('description');
  $salida->save();
  $notification ='El Producto se ha guardado correctamente.';
  

  return redirect('/inventario')->with(compact('notification'));


 }


 public function destroy(salida $salida) {
    $deleteName = $salida->name;
    $salida->delete();
    $notification ='el Producto ' .$deleteName .'  se ha eliminado correctamente.';
    return redirect('/inventario')->with(compact('notification'));


 }
}