<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\cinesController;    
use App\Http\Controllers\Api\CarteleraController;  
use App\Http\Controllers\Api\ClientsController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('cines', cinesController::class)->names('api.cines');
Route::apiResource('carteleras', CarteleraController::class)->names('api.carteleras');
Route::apiResource('clients',ClientsController::class)->names('api.clients');


