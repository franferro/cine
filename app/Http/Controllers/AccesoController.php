<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AccesoController extends Controller
{
    public function mostrarLogin() 
    {
        return view('sesion_usuario.login');
    }

public function entrar(Request $request) 
{
    // Busca al usuario
    $usuario = DB::table('USUARIOS')->where('EMAIL', $request->email)->first();

    if ($usuario) {
        // Convierte el objeto a array para no tener problemas con mayusculas y minusculas
        $uArray = (array)$usuario;
        
        // Busca la contraseña probando ambas opciones
        $passBD = $uArray['PASSWORD'] ?? $uArray['password'] ?? null;

        if ($passBD && Hash::check($request->password, $passBD)) {
            Session::put('usuario_dni', $uArray['DNI'] ?? $uArray['dni']);
            Session::put('usuario_nombre', $uArray['USERNAME'] ?? $uArray['username']);
            
            return redirect('/sesiones');
        }
    }

    return back()->withErrors(['error' => 'Credenciales incorrectas']);
}

    public function mostrarRegistro() 
    {
        return view('sesion_usuario.registro');
    }

public function registrar(Request $request) 
    {
        $request->validate([
            'dni' => 'required|unique:USUARIOS,DNI',
            'email' => 'required|email|unique:USUARIOS,EMAIL',
            'username' => 'required',
            'password' => 'required'
        ], [
            'dni.unique' => 'Este DNI ya está registrado en el sistema.',
            'email.unique' => 'Este correo electrónico ya está en uso.'
        ]);

        DB::table('USUARIOS')->insert([
            'DNI' => $request->dni,
            'USERNAME' => $request->username,
            'EMAIL' => $request->email,
            'PASSWORD' => Hash::make($request->password)
        ]);

        Session::put('usuario_dni', $request->dni);
        Session::put('usuario_nombre', $request->username);

        return redirect('/sesiones');
    }

    public function salir() 
    {
        Session::forget(['usuario_dni', 'usuario_nombre']);
        return redirect('/login');
    }

    public function verPerfil()
    {
        $dniSesion = \Illuminate\Support\Facades\Session::get('usuario_dni');

        if (!$dniSesion) {
            return redirect('/login')->with('error', 'Debes iniciar sesión para ver tu perfil.');
        }

        $usuario = \Illuminate\Support\Facades\DB::table('USUARIOS')->where('DNI', $dniSesion)->first();
        return view('sesion_usuario.perfil', compact('usuario'));
    }
}