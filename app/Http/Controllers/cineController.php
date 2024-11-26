<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cine;

class CineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cines = Cine::paginate(5);
        return view('cine.index',compact('cines')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cine.create');
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
            'ciudad' => 'required|string|max:255',
            'pais' => 'required|string|max:255'    
        ]);
        Cine::create([
            'ciudad' => $request->ciudad,
            'pais' => $request->pais,
        ]);
        // Redirige a la lista de clientes con un mensaje de éxito
        return redirect()->route('index.cines')->with('success', 'Cine creado con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cine = Cine::findOrFail($id);
        return view('cine.show', compact('cine')); // Pasa el cliente a la vista
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cine = Cine::findOrFail($id);
        return view('cine.edit', compact('cine'));
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
        $cine= Cine::findOrFail($id);
        // Actualiza el cliente en la base de datos
        $cine->update([
            'ciudad' => $request->ciudad,
            'pais' => $request->pais   
        ]);
        // Redirige a la lista de clientes con un mensaje de éxito
        return redirect()->route('index.cines')->with('success', 'Cine actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cine = Cine::findOrFail($id);
        $cine->delete(); // Elimina el cliente
        // Redirige a la lista de clientes con un mensaje de éxito
        return redirect()->route('index.cines')->with('success', 'Cine eliminado con éxito.');
    }
}
