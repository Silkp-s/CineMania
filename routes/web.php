<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\clientController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/clientes',[clientController::class,'index'])->name('index.clientes');
Route::get('/clientesnuevo',[clientController::class,'create'])->name('create.clientes');
Route::get('/clientesshow/{id}',[clientController::class,'show'])->name('show.clientes');
Route::get('/clienteseditar',[clientController::class,'edit'])->name('edit.clientes');


//Route::resource('client', clientController::class);
/*   
    --para usar en href--
    client.index
    client.create
    client.show
    client.edit
*/

