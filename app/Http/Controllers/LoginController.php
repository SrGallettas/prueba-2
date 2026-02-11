<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Muestra el formulario
    public function loginForm()
    {
        // Devuelve la vista auth/login
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credenciales = $request->only('login', 'password');
        // True si marcaron la casilla
        $remember = $request->filled('recordar');

        // Intenta hacer login SIN remember
        if (Auth::attempt($credenciales)) {

            $user = Auth::user();
            $request->session()->put('id_usuario', $user->id);
            $request->session()->put('nombre', $user->login);
            $ruta = redirect()->intended('/blogs');

            // Si marcan recordar, volvemos a autenticar con remember
            if ($remember) {
                $ruta->withCookie("usuario", $user->name, 43200);
            }

            return $ruta;
            
        } else {
            // Si falla el login
            return back()
                ->withErrors(['login' => 'Credenciales incorrectas'])
                ->onlyInput('login');
        }
    }


    // Logout
    public function logout(Request $request)
    {
        // Cierra la sesion de usuario
        Auth::logout();
        // Redirige al formulario de login
        return redirect()->route('login');
    }
}
