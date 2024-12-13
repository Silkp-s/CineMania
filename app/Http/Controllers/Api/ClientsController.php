<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes=Client::all();
        return  response()->json(
            ['status'=>true,
            'clientes'=>$clientes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cliente=Client::create($request->all());
        return response()->json([
            'status'=>true,
            'Message'=>'Cliente Creado con exito!',
            'Cliente'=>$cliente
        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       // Buscar cliente por ID
    $client = Client::find($id);

    // Verificar si el cliente existe
    if ($client) {
        return response()->json($client, 200); // Retorna el cliente en formato JSON
    } else {
        return response()->json(['error' => 'Cliente no encontrado'], 404); // Retorna un error si no existe
    }
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
        $client=Client::find($id);
        if($client){
            $client->nombre=$request->nombre;
            $client->mail=$request->mail;
            $client->contraseña=$request->contraseña;
            $client->edad=$request->edad;
            $client->save();
            return response([
                'Message'=>'Actualizado Con exito',
                'Cliente'=>$client,
                'status'=>200
            ]);
        }else{
            return response([
                'Message'=>'Error',
                'Cliente'=>$client,
                'status'=>404
            ]);
        }
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        $cliente=Client::find($id);
        if($cliente){
            $cliente->reserva()->each(function($reserva){
                $reserva->delete();
            });
            
            $cliente->delete();
            return response([
                'Message'=>'Eliminado Con Exito!',
                'Cliente'=>'Cliente eliminado',
                'status'=>200
            ]);
        }else{
            return response([
                'Message'=>'No se pudo elimianar',
                'Cliente'=>$cliente,
                'Status'=>404
            ]);
        }
    }
}
