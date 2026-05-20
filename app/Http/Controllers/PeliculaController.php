<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelicula; 


class PeliculaController extends Controller
{
    public function index()
{
    $peliculas = Pelicula::whereHas('sesiones', function ($query) {$query->where('hora_inicio', '>=', now()); })->get(); 
    return view('cartelera', compact('peliculas')); 
}

    public function create()
    {
        return view('crear_pelicula');
    }

    // Esta función recibe los datos del formulario y los guarda en la base de datos
    public function store(Request $request)
    {
        $pelicula = new Pelicula();
        
        $pelicula->titulo = $request->titulo;
        $pelicula->sinopsis = $request->sinopsis;
        $pelicula->duracion = $request->duracion;
        $pelicula->foto_cartel = $request->foto_cartel;
        
        // La guardamos en la base de datos
        $pelicula->save();

        return redirect('/cartelera');
    }

    public function show($id)
    {
        $pelicula = Pelicula::findOrFail($id); 
        return view('detalle', compact('pelicula')); 
    }
}