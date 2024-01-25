<?php

namespace App\Http\Controllers\admin;
use App\Models\marca;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
class MarcaController extends Controller
{
    

    public function index(){
        $marcas = marca::all();
        return view('marca.index',compact('marcas'));
    }

    public function create(){
        return view('marca.create');
    }

    public function sendData(Request $request){

         $rules = [
            'name' => 'required|min:5'
            
         ];
         $messages = [
            'name.required' => 'El Nombre de la marca Es obligatorio ',
            'name.min' => 'El nombre de la marca Debe tener mas de 5 caracteres.',
            
         ];

       $this->validate($request, $rules, $messages);

       $marca = new marca();
       $marca->nombre =$request->input('name');
       $marca->descripcion =$request->input('description');
       $marca->save();
       $notification ='La marca se ha creado correctamente.';

       return Redirect('/marca')->with(compact('notification'));
       
    }
   
    public function edit(marca $marca){
      return view('marca.edit',compact('marca'));
    }

    public function update(Request $request,marca $marca){

      $rules = [
         'name' => 'required|min:5'
          
      ];
      $messages = [
         'name.required' => 'El Nombre de la marca Es obligatorio ',
         'name.required' => 'El Nombre debe Empezar con Mayuscula',
         'name.min' => 'El nombre de la marca Debe tener mas de 5 caracteres.',
         
      ];

    $this->validate($request, $rules, $messages);

    $marca->nombre =$request->input('name');
    $marca->descripcion =$request->input('description');
    $marca->save();
    $notification ='La marcas se ha actualizado correctamente.';

    return redirect('/marca')->with(compact('notification'));


   }


   public function destroy(marca $marca) {
      $deleteName = $marca->name;
      $marca->delete();
      $notification ='La marca ' .$deleteName .'  se ha eliminado correctamente.';
      return redirect('/marca')->with(compact('notification'));


   }




}



