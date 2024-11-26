<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class clientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::paginate(5);
        return view('client.index',compact('clients')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.create'); // Retorna la vista de creación 
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
            'nombre' => 'required|string|max:255',
            'mail' => 'required|email|unique:clients,mail|max:255',
            'contraseña' => 'required|string|min:6',
            'edad' => 'required|integer|min:1|max:120',
        ]);
        Client::create([
            'nombre' => $request->nombre,
            'mail' => $request->mail,
            'contraseña' => bcrypt($request->contraseña),
            'edad' => $request->edad,
        ]);
        // Redirige a la lista de clientes con un mensaje de éxito
        return redirect()->route('index.clientes')->with('success', 'Cliente creado con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Client::findOrFail($id);
        return view('client.show', compact('client')); // Pasa el cliente a la vista
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::findOrFail($id);
        return view('client.edit', compact('client')); // Pasa el cliente a la vista de edición
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

        $client= Client::findOrFail($id);
        // Actualiza el cliente en la base de datos
        $client->update([
            'nombre' => $request->nombre,
            'mail' => $request->mail,
            'contraseña' => $request->contraseña ? bcrypt($request->contraseña) : $client->contraseña,
            'edad' => $request->edad,
        ]);
        // Redirige a la lista de clientes con un mensaje de éxito
        return redirect()->route('index.clientes')->with('success', 'Cliente actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $client->delete(); // Elimina el cliente
        // Redirige a la lista de clientes con un mensaje de éxito
        return redirect()->route('index.clientes')->with('success', 'Cliente eliminado con éxito.');
    }
}
