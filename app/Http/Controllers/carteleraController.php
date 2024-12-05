<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelicula;
use App\Models\Cartelera;
use App\Models\Sala;
use App\Models\Cine;  

class carteleraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {     
        $carteleras = Cartelera::with(['cine','peliculas'])->paginate(5);

        return view('cartelera.index', compact('carteleras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $peliculas = Pelicula::all();
        $cines=Cine::all();
        return view('cartelera.create', compact('peliculas','cines'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'cine_id'   => 'required',
        ]);
        $cartelera = Cartelera::create([
            'cine_id' => $request->cine_id,
        ]);
        $cartelera->peliculas()->sync($request->peliculas_id);
        return redirect()->route('index.carteleras')->with('success', 'Cartelera creada con éxito.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cartelera = Cartelera::with(['cine','peliculas'])->findOrFail($id);
        
        return view('cartelera.show', compact('cartelera'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cartelera=Cartelera::with(['cine','peliculas'])->findOrFail($id);
        $peliculas = Pelicula::all(); // Obtener todas las películas disponibles

        return view('cartelera.edit', compact('cartelera', 'peliculas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    $cartelera = Cartelera::findOrFail($id);

    $cartelera->peliculas()->sync($request->peliculas);
    return redirect()->route('index.carteleras')->with('success', 'Cartelera actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    $cartelera = Cartelera::with('peliculas')->findOrFail($id);
    $cartelera->peliculas()->detach();
    $cartelera->delete();
    return redirect()->route('index.carteleras')->with('success', 'Cartelera eliminada con éxito.');
    }
}
