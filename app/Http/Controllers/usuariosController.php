<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\users;
use Illuminate\Http\Request;

class usuariosController extends Controller
{
    public function index()
    {
        $usuario = users::paginate(10);
        
        return view('admins.index', compact('usuario'));
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
        'name' => 'required|min:5',
        'email' => 'required|email',
        'password' => 'required',
        'address' => 'required',
        'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validación de imagen
        'phone' => 'required',
    ];

    $messages = [
        'avatar.image' => 'El archivo debe ser una imagen.',
        'avatar.mimes' => 'El archivo debe ser de tipo jpeg, png, jpg, gif o svg.',
        'avatar.max' => 'El archivo no puede pesar más de 2MB.',
    ];

    $this->validate($request, $rules, $messages);

    // Manejo de la imagen de perfil
    $avatarPath = null;
    if ($request->hasFile('avatar')) {
        $avatar = $request->file('avatar');
        $avatarPath = $avatar->storeAs('public/avatars', $request->name . '.' . $avatar->getClientOriginalExtension());
    }

    // Crear el nuevo usuario con la foto
    User::create(
        $request->only('name', 'email', 'address', 'phone') + [
            'role' => 'admin',
            'password' => bcrypt($request->input('password')),
            'avatar' => $avatarPath, // Guardar la ruta de la imagen
        ]
    );

    $notification = 'El usuario se ha registrado correctamente.';
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
            'name' => 'required|min:5',
            'email' => 'required|email',
            'password' => 'required|min:7',
            'address' => 'required',
            'phone' => 'required',
            'role' => 'required',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validación de imagen
        ];
    
        $messages = [
            'avatar.image' => 'El archivo debe ser una imagen.',
            'avatar.mimes' => 'El archivo debe ser de tipo jpeg, png, jpg, gif o svg.',
            'avatar.max' => 'El archivo no puede pesar más de 2MB.',
        ];
    
        $this->validate($request, $rules, $messages);
    
        $user = User::findOrFail($id);
        $data = $request->only('name', 'email', 'address', 'phone', 'role');
        $password = $request->input('password');
    
        if ($password) {
            $data['password'] = bcrypt($password);
        }
    
        // Manejo de la imagen de perfil
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $avatarPath = $avatar->storeAs('public/avatars', $user->name . '.' . $avatar->getClientOriginalExtension());
            $data['avatar'] = $avatarPath;
        }
    
        // Actualizar el usuario
        $user->fill($data);
        $user->save();
    
        $notification = 'La información del usuario se actualizó correctamente.';
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
