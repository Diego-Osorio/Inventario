<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categorias;
use App\Models\categoria;
use Illuminate\Support\Facades\Redirect;

class categoriasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $categories = categorias::all();
        return view('categories.index',compact('categories'));
    }

    public function create(){
        return view('categories.create');
    }

    public function sendData(Request $request){

         $rules = [
            'name' => 'required|min:5'
         ];
         $messages = [
            'name.required' => 'El Nombre de la categoria Es obligatorio ',
            'name.min' => 'El nombre de la Categoria Debe tener mas de 5 caracteres.'
         ];

       $this->validate($request, $rules, $messages);

       $categoria = new categorias();
       $categoria->name =$request->input('name');
       $categoria->descripcion =$request->input('description');
       $categoria->save();
       $notification ='La Categoria se ha creado correctamente.';

       return Redirect('/categorias')->with(compact('notification'));
       
    }
   
    public function edit(categoria $categoria){
      return view('categories.edit',compact('categoria'));
    }

    public function update(Request $request,categoria $categoria){

      $rules = [
         'name' => 'required|min:5'
      ];
      $messages = [
         'name.required' => 'El Nombre de la categoria Es obligatorio ',
         'name.min' => 'El nombre de la Categoria Debe tener mas de 5 caracteres.'
      ];

    $this->validate($request, $rules, $messages);

    $categoria->name =$request->input('name');
    $categoria->descripcion =$request->input('description');
    $categoria->save();
    $notification ='La Categoria se ha actualizado correctamente.';

    return redirect('/categorias')->with(compact('notification'));


   }


   public function destroy(categoria $categoria) {
      $deleteName = $categoria->name;
      $categoria->delete();
      $notification ='La Categoria ' .$deleteName .'  se ha eliminado correctamente.';
      return redirect('/categorias')->with(compact('notification'));


   }




}

