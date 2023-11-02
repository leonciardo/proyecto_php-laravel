<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Método para mostrar el formulario de registro
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Método para registrar usuarios
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Verifica si es el primer usuario registrado
        $isFirstUser = User::count() === 0;

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $isFirstUser ? 1 : 2, // Asigna 1 si es el primer usuario, de lo contrario, asigna 2 u otro valor según tus roles
        ]);

        // Puedes redirigir al usuario a una página de inicio de sesión u otra vista después del registro.
        return redirect()->route('login')->with('success', 'Usuario registrado exitosamente');
    }
}
