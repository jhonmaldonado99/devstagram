<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function index() {
        return view('auth.register');
    }

    public function store(Request $request) {

        // Reescribir campo
        $request->request->add(['username' => Str::slug($request->username)]);

        // Añadir validaciones
        $this->validate($request, [
            'name' => 'required|max:20',
            'username' => 'required|unique:users|min:3|max:20',
            'email' => 'required|unique:users|max:60|email',
            'password' => 'required|confirmed|min:6'
        ]);
        
        // Insertar en la base de datos
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Autenticar usuario
        // auth()->attempt([
        //     'email' => $request->email,
        //     'password' => $request->password
        // ]);

        // Otra forma de auténticar
        auth()->attempt($request->only('email', 'password'));


        // Redireccionar
        return redirect()->route('posts.index');
        
    }
}
