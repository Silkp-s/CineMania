<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelicula;
use App\Models\Sala;

class peliculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peliculas = Pelicula::paginate(5);
        return view('pelicula.index',compact('peliculas')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $salas=Sala::all();
        return view('pelicula.create',compact('salas'));
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
            'nombre' => 'required',
            'pg'   => 'required',
            'idioma'=>'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $imageData = null; // Variable para almacenar la imagen en base64

        if ($request->hasFile('image')) {
        // Procesar la imagen cargada por el usuario
            $image = $request->file('image');
            $imageData = base64_encode(file_get_contents($image->getRealPath()));
        } else {
        // Usar una imagen por defecto en escala de grises
        $defaultImagePath = public_path('images/default.png');
        $imageData = base64_encode(file_get_contents($defaultImagePath));
        }

        pelicula::create([
            'nombre' => $request->nombre,
            'sala_id' => $request->sala_id,
            'pg' => $request->pg,
            'idioma'=>$request->idioma,
            'image' => $imageData,
        ]);

       

        // Redirige a la lista de peliculas con un mensaje de éxito
        $news->save();
        return redirect()->route('index.peliculas')->with('success', 'Pelicula creado con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pelicula = Pelicula::findOrFail($id);
        
        return view('pelicula.show', compact('pelicula')); // Pasa el cliente a la vista
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $peliculas = Pelicula::findOrFail($id);
        $salas=Sala::all();
        return view('pelicula.edit', compact('peliculas','salas'));
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
        $pelicula= Pelicula::findOrFail($id);
        // Actualiza el cliente en la base de datos
        $pelicula->update([
            'nombre' => $request->nombre,
            'sala_id' => $request->sala_id,
            'pg' => $request->pg,
            'idioma'=>$request->idioma,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if ($request->has('remove_image') && $request->remove_image) {
            // Remover la imagen actual y asignar la imagen por defecto
            $defaultImagePath = public_path('images/default.png');
            if (file_exists($defaultImagePath)) {
                $news->image = base64_encode(file_get_contents($defaultImagePath));
            } else {
                $news->image = null; // Opción alternativa si no existe la imagen predeterminada
            }
        } elseif ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageData = base64_encode(file_get_contents($image->getRealPath()));
            $news->image = $imageData;
        }
        // Redirige a la lista de clientes con un mensaje de éxito
        return redirect()->route('index.peliculas')->with('success', 'Cine actualizado con éxito.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pelicula = Pelicula::findOrFail($id);
        $pelicula->delete(); // Elimina el cliente
        // Redirige a la lista de clientes con un mensaje de éxito
        return redirect()->route('index.peliculas')->with('success', 'Peliculas eliminado con éxito.');
    }
}