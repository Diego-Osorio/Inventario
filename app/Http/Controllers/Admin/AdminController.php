<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\users;
use App\Http\Controllers\Controller;
use Symfony\Component\Mime\Email;

class AdminController extends Controller
{
    
    public function index()
    {
        $admins = User::paginate(10);
        
        return view('admins.index', compact('admins'));
    }

    
    public function create()
    {
        return view('admins.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name'=>'required|min:5',
            'email'=>'required|email',
            'password'=>'required',
            'address'=>'required',
            'phone' =>'required',
        ];
        $messages =[
            'name.required' => 'El nombre de usuario es Obligatorio',
            'name.min' => 'El nombre de usuario debe tener m as de 5 caracteres ',
            'email.required' => 'El Correo Electronico es Obligatorio',
            'email.email' => 'Ingresa una direccion de correo electronico  valido',
            'address.required' => 'La Direccion es obigatoria',
            'phone.required' => 'El número de teléfono es obligatorio',
            'password.required'=>'La contraseña es obligatoria ',
            'password.min'=> 'La contraseña debe tener minimo 5 ',

        ];
        $this->validate($request, $rules, $messages);

        User::create(
            $request->only('name','email','address','phone')
            + [
                'role'=> 'admin',
                'password'=> bcrypt($request->input('password'))
            ]
        );
        $notification ='El usuario se ha registrado correctamente.';
        return redirect('/usuario')->with(compact('notification'));
    }

   
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
      $admin = User::findOrFail($id);
      return view('admins.edit',compact('admin'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name'=>'required|min:5',
            'email'=>'required|email',
            'password'=>'required|min:7',
            'address'=>'required',
            'phone' =>'required',
        ];
        $messages =[
            'name.required' => 'El nombre de usuario es obligatorio',
            'name.min' => 'El nombre de usuario debe tener m as de 5 caracteres ',
            'email.required' => 'El Correo Electronico es obligatorio',
            'email.email' => 'Ingresa una direccion de correo electronico  valido',
            'address.required' => 'La Direccion es obigatoria',
            'phone.required' => 'El número de teléfono es obligatorio',
            
            'password.min'=> 'La contraseña debe tener minimo 7 caracteres.',

        ];
        $this->validate($request, $rules, $messages);
        $user = User::findOrFail($id);

        $data =   $request->only('name','email','address','phone');
        $password = $request->input('password');

        if($password)
           $data['password'] = bcrypt($password);

           $user->fill($data);
           $user->save();

        $notification ='La Informacion del usuario se actualizo correctamente.';
        return redirect('/usuario')->with(compact('notification'));
    }

   
    public function destroy($id)
    {
      $user = User::findOrFail($id);
      $userName = $user->name;
      $user->delete();

      $notification = "El Usuario $userName elimino correctamente ";



       return redirect('/usuario')->with(compact('notification'));
    }
	/**
	 */
	function __construct() {
	}
}
