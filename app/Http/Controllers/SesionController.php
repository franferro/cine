<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sesion;
use App\Models\Pelicula;
use App\Models\Sala;

class SesionController extends Controller
{
    public function index()
    {
        $sesiones = Sesion::where('hora_inicio', '>=', now())->get();
        return view('sesiones_index', ['sesiones' => $sesiones]);
    }

    public function create()
    {
        return view('sesiones_crear');
    }

    public function store(Request $request)
    {
        $sesion = new Sesion();
        $sesion->ID_PELICULA = $request->id_pelicula;
        $sesion->ID_SALA = $request->id_sala;
        $sesion->HORA_INICIO = $request->hora_inicio;
        $sesion->save();

        return redirect('/sesiones');
    }
}