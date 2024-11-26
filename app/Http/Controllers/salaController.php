<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sala;
use App\Models\Cine;

class salaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salas = Sala::paginate(5);
        return view('sala.index',compact('salas')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cines=Cine::all();
        return view('sala.create',compact('cines'));
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
            'cine_id' => 'required|integer',
            'nsalas' => 'required|integer',
            'capacidad'=>'required|integer',

        
        ]);
        Sala::create([
            'cine_id' => $request->cine_id,
            'nsalas' => $request->nsalas,
            'capacidad'=>$request->capacidad
        ]);


        // Redirige a la lista de clientes con un mensaje de éxito
        return redirect()->route('index.salas')->with('success', 'Sala creado con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sala = Sala::findOrFail($id);
        return view('sala.show', compact('sala')); // Pasa el cliente a la vista
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cines=Cine::all();
        $sala = Sala::findOrFail($id);
        return view('sala.edit', compact('sala','cines'));
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
        $sala= Sala::findOrFail($id);
        // Actualiza el cliente en la base de datos
        $sala->update([
            'cine_id' => $request->cine_id,
            'nsalas' => $request->nsalas,
            'capacidad'=>$request->capacidad   
        ]);
        // Redirige a la lista de clientes con un mensaje de éxito
        return redirect()->route('index.salas')->with('success', 'Cine actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sala = Sala::findOrFail($id);
        $sala->delete(); // Elimina el cliente
        // Redirige a la lista de clientes con un mensaje de éxito
        return redirect()->route('index.salas')->with('success', 'Sala eliminado con éxito.');
    }
}
