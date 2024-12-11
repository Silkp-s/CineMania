<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\cine;
class CineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(cine::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'ciudad' => 'required|string|max:255',
            'pais' => 'required|string|max:255'    
        ]);

        $cine= cine::create($validatedData);

        return response()->json($room, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(cine $room)
    {
        return response()->json($room, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cine $cine)
    {
        $validatedData = $request->validate([
            'ciudad' => 'required|string|max:255',
            'pais' => 'required|string|max:255'    
        ]);
        $cine->update($validatedData);

        return response()->json($cine, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(cine $cine)
    {
        $cine->delete();

        return response()->json(null, 204);
    }
}
