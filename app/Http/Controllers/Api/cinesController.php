<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cine;
use App\Models\Salas;



class cinesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes=Cine::all();
        return  response()->json(
            ['status'=>true,
            'Cines'=>$clientes]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cine=Cine::create($request->all());
        return response()->json([
            'status'=>true,
            'Message'=>'Cine Creado con exito!',
            'Cliente'=>$cine
        ],200);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
              // Buscar cliente por su ID
    $cine = Cine::find($id);

    // Verificar si el cliente existe
    if ($cine) {
        // Retornar el cliente como JSON con código HTTP 200
        return response()->json($cine, 200);
    } else {
        // Retornar un mensaje de error si no se encuentra el cliente con código HTTP 404
        return response()->json(['error' => 'cine no encontrado'], 404);
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
        $cine=Cine::find($request->id);
        if($cine){
            $cine->ciudad=$request->ciudad;
            $cine->pais=$request->pais;
            $cine->save();
            return response([
                'Message'=>'Actualizado Con exito',
                'Cliente'=>$cine,
                'status'=>200
            ]);
        }else{
            return response([
                'Message'=>'Error',
                'cine'=>null,
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

        $cine=Cine::find($id);
      
        if($cine){
            $cartelera=$cine->cine();
            $cartelera->delete();
            $sala=$cine->sala();
            $sala->delete();
            $cine->delete();
            return response([
                'Message'=>'Eliminado Con Exito!',
                'Cliente'=>'cine eliminado',
                'status'=>200
            ]);
        }else{
            return response([
                'Message'=>'No se pudo elimianar',
                'Cliente'=>$cine,
                'Status'=>404
            ]);
        }
    }

}