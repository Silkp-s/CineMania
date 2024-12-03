<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\clientController;
use App\Http\Controllers\CineController;
use App\Http\Controllers\salaController;
use App\Http\Controllers\peliculaController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('layouts.dashboard');
})->name('dashboard');

//rutas clientes
Route::get('/clientes',[clientController::class,'index'])->name('index.clientes');
Route::get('/clientesnuevo',[clientController::class,'create'])->name('create.clientes');
Route::get('/clientesshow/{id}',[clientController::class,'show'])->name('show.clientes');
Route::get('/clienteseditar/{id}',[clientController::class,'edit'])->name('edit.clientes');
Route::put('/clientes/{id}',[clientController::class,'update'])->name('update.clientes');
Route::post('/clientesstore', [ClientController::class, 'store'])->name('store.clientes');
Route::delete('/clientes/{id}', [ClientController::class, 'destroy'])->name('destroy.clientes');
// rutas cine
Route::get('/cines',[CineController::class,'index'])->name('index.cines');
Route::get('/cinesnuevo',[CineController::class,'create'])->name('create.cines');
Route::get('/cinesshow/{id}',[CineController::class,'show'])->name('show.cines');
Route::get('/cineseditar/{id}',[CineController::class,'edit'])->name('edit.cines');
Route::put('/cines/{id}',[CineController::class,'update'])->name('update.cines');
Route::post('/cinesstore', [CineController::class, 'store'])->name('store.cines');
Route::delete('/cines/{id}', [CineController::class, 'destroy'])->name('destroy.cines');

// rutas salas
Route::get('/salas',[salaController::class,'index'])->name('index.salas');
Route::get('/salasnuevo',[salaController::class,'create'])->name('create.salas');
Route::get('/salasshow/{id}',[salaController::class,'show'])->name('show.salas');
Route::get('/salaseditar/{id}',[salaController::class,'edit'])->name('edit.salas');
Route::put('/salas/{id}',[salaController::class,'update'])->name('update.salas');
Route::post('/salasstore', [salaController::class, 'store'])->name('store.salas');
Route::delete('/salas/{id}', [salaController::class, 'destroy'])->name('destroy.salas');

// rutas peliculas
Route::get('/peliculas',[peliculaController::class,'index'])->name('index.peliculas');
Route::get('/peliculasnuevo',[peliculaController::class,'create'])->name('create.peliculas');
Route::get('/peliculasshow/{id}',[peliculaController::class,'show'])->name('show.peliculas');
Route::get('/peliculaseditar/{id}',[peliculaController::class,'edit'])->name('edit.peliculas');
Route::put('/peliculas/{id}',[peliculaController::class,'update'])->name('update.peliculas');
Route::post('/peliculasstore', [peliculaController::class, 'store'])->name('store.peliculas');
Route::delete('/peliculas/{id}', [peliculaController::class, 'destroy'])->name('destroy.peliculas');







