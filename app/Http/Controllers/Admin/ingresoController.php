<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\inventario;
use Illuminate\Http\Request;
use App\Models\ingreso;

class ingresoController extends Controller
{
  
   

    public function create()
    {
        
        return view ('ingresus.create');
    }

    public function sendData(Request $request){

        $rules = [
           'date' => 'required',
           'tipedocu'=>'required',
           'ndocu'=>'required|min:10',
        ];
        $messages = [
           'name.required' => 'El Ingreso de la Fecha  Es obligatorio ',
           'tipedocu.required' => 'Debe selecionar el Tipo de Documento ',
           'ndocu.required'=>'El Ingreso del numero el documento es obligatorio',
            'ndocu.min'=>'El ingreso de del n° de documento debe tener minimo 10 numeros '
           
        ];

      $this->validate($request, $rules, $messages);

      $ingreso = new ingreso();
      $ingreso ->date =$request->date('Fecha');
      $ingreso->tipedocu =$request->integer('tipodocumento');
      $ingreso->ndocu =$request->integer('ndocumento');
      $ingreso->descripcion =$request->input('description');
      $ingreso->save();
      $notification ='El Producto se ha ingresado correctamente.';

      return Redirect('/inventario')->with(compact('notification'));
      
   }
   
  
  public function update(Request $request,ingreso $ingreso){

    $rules = [
      'date' => 'required',
      'tipedocu'=>'required',
      'ndocu'=>'required|min:10',
        
    ];
    $messages = [
      'name.required' => 'El Ingreso de la Fecha  Es obligatorio ',
      'tipedocu.required' => 'Debe selecionar el Tipo de Documento ',
      'ndocu.required'=>'El Ingreso del numero el documento es obligatorio',
       'ndocu.min'=>'El ingreso de del n° de documento debe tener minimo 10 numeros '
    ];

  $this->validate($request, $rules, $messages);
  $ingreso = new ingreso();
  $ingreso ->date =$request->date('Fecha');
  $ingreso->tipedocu =$request->integer('tipodocumento');
  $ingreso->ndocu =$request->integer('ndocumento');
  $ingreso->descripcion =$request->input('description');
  $ingreso->save();
  $notification ='El Producto se ha guardado correctamente.';
  

  return redirect('/inventario')->with(compact('notification'));


 }


 public function destroy(ingreso $ingreso) {
    $deleteName = $ingreso->name;
    $ingreso->delete();
    $notification ='el Producto ' .$deleteName .'  se ha eliminado correctamente.';
    return redirect('/inventario')->with(compact('notification'));


 }
}