<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User; // Asegúrate de importar el modelo User si lo estás utilizando

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

    public function store(Request $request)
    {
        // Validación de datos
        $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|email',
            'password' => 'required|min:5',
            'address' => 'required',
            'phone' => 'required',
        ]);

        // Crear un nuevo usuario
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'role' => 'admin', // Asigna el rol de administrador
        ]);

        $notification = 'El usuario se ha registrado correctamente.';
        return redirect('/usuario')->with(compact('notification'));
    }

    public function edit($id)
    {
        $admin = User::findOrFail($id);
        return view('admins.edit', compact('admin'));
    }

    public function update(Request $request, $id)
    {
        // Validación de datos
        $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|email',
            'password' => 'required|min:5',
            'address' => 'required',
            'phone' => 'required',
            'role' => 'required',
        ]);

        $user = User::findOrFail($id);

        // Actualizar los datos del usuario
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'role' => $request->input('role'),
        ]);

        $notification = 'La información del usuario se actualizó correctamente.';
        return redirect('/usuario')->with(compact('notification'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $userName = $user->name;
        $user->delete();

        $notification = "El usuario $userName se eliminó correctamente.";

        return redirect('/usuario')->with(compact('notification'));
    }
}
