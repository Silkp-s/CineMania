<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\cartelera;
class CarteleraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cartelera=cartelera::all();
        return  response()->json(
            ['status'=>true,
            'cartelera'=>$cartelera,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cartelera=cartelera::create($request->all());
        return response()->json([
            'status'=>true,
            'Message'=>'Creado con exito!',
            'cartelera'=>$cartelera,
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
        $cartelera = Cartelera::find($id);
        if ($cartelera) {
            return response()->json($cartelera,200);
        }else {
            return response()->json(['error' => 'cartelera no encontrada'], 404);
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
        $cartelera=Cartelera::find($id);
        if($cartelera){
            $cartelera->cine_id=$request->cine_id;
            $cartelera->save();
            return response([
                'Message'=>'Actualizado Con exito',
                'cartelera'=>cartelera,
                'status'=>200
            ]);
        }else{
            return response([
                'Message'=>'Error',
                'cartelera'=>null,
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
       $cartelera = Cartelera::find($id);

       if ($cartelera) {
        $cartelera->delete();
        return response([
            'Message'=>'Eliminado Con Exito!',
            'Cliente'=>'cine eliminado',
            'status'=>200
        ]);
       }else{
        return response([
            'Message' => 'No se pudo eliminar',
            'Status' => 404
        ]);
       }
    }
}
