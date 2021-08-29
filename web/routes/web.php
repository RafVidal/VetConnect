<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Mobile\ClienteController;
use App\Http\Controllers\Mobile\VeterinarioController;
use App\Http\Controllers\Mobile\AnimalController;

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

//=========================================================================
//==========================CLIENTES=======================================
//=========================================================================
Route::prefix('cliente')->name('cliente.')->group(function () {
    //Route::get('/dados', [ClienteController::class, 'dados'])->name('clientes.dados');
	Route::post('/criar',               [ClienteController::class, 'store'])->name('criar');
    Route::put('/{id}/atualizar',    [ClienteController::class, 'update'])->name('atualizar');

});

Route::prefix('veterinario')->name('veterinario.')->group(function () {
    //Route::get('/dados', [VeterinarioController::class, 'dados'])->name('veterinarios.dados');
	Route::post('/criar',               [VeterinarioController::class, 'store'])->name('criar');
    Route::put('/{id}/atualizar',       [VeterinarioController::class, 'update'])->name('atualizar');

});

Route::prefix('animal')->name('animal.')->group(function () {
    //Route::get('/dados', [AnimalController::class, 'dados'])->name('animais.dados');
	Route::post('/criar',               [AnimalController::class, 'store'])->name('criar');
    Route::put('/{id}/atualizar',       [AnimalController::class, 'update'])->name('atualizar');

});


Route::get('/csrf', function(){ return csrf_token(); })->name('csrf');
