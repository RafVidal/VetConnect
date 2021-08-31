<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Mobile\ClienteController;
use App\Http\Controllers\Mobile\VeterinarioController;
use App\Http\Controllers\Mobile\AnimalController;
use App\Http\Controllers\Mobile\AvaliacaoController;

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


//Rotas mobile
Route::prefix('app')->name('app.')->group(function (){
    //=========================================================================
    //==========================CLIENTES=======================================
    //=========================================================================
    Route::prefix('/cliente')->name('cliente.')->group(function () {
        //Route::get('/dados',                  [ClienteController::class, 'dados'])->name('clientes.dados');
        Route::post('/criar',                   [ClienteController::class, 'store'])->name('criar');
        Route::put('/{id}/atualizar',           [ClienteController::class, 'update'])->name('atualizar');
        Route::get('/{id}',                     [ClienteController::class, 'show'])->name('show');
    });

    //=========================================================================
    //=========================VETERINARIO=====================================
    //=========================================================================
    Route::prefix('/veterinario')->name('veterinario.')->group(function () {
        //Route::get('/dados',                    [VeterinarioController::class, 'dados'])->name('veterinarios.dados');
        //Route::post('/criar',                   [VeterinarioController::class, 'store'])->name('criar');
        //Route::put('/{id}/atualizar',           [VeterinarioController::class, 'update'])->name('atualizar');
        Route::get('/index',                      [VeterinarioController::class, 'index'])->name('index');

    });

    //=========================================================================
    //============================ANIMAL=======================================
    //=========================================================================
    Route::prefix('/animal')->name('animal.')->group(function () {
        //Route::get('/dados',                  [AnimalController::class, 'dados'])->name('animais.dados');
        Route::post('/criar',                   [AnimalController::class, 'store'])->name('criar');
        Route::put('/{id}/atualizar',           [AnimalController::class, 'update'])->name('atualizar');
        Route::get('/index',                    [AnimalController::class, 'index'])->name('index');
        Route::get('/especie',                  [AnimalController::class, 'especie'])->name('especie.index');
        Route::get('/{id}',                     [AnimalController::class, 'show'])->name('show');
        Route::delete('/{id}/destroy',          [AnimalController::class, 'destroy'])->name('destroy');
        Route::get('/{id}/medicacao',           [AnimalController::class, 'medicacao'])->name('medicacao.index');


    });


    //=========================================================================
    //===========================AVALIAÇÃO=====================================
    //=========================================================================
    Route::prefix('/avaliacao')->name('avaliacao.')->group(function () {
        //Route::get('/dados',                       [AnimalController::class, 'dados'])->name('animais.dados');
        Route::post('/criar',                        [AvaliacaoController::class, 'store'])->name('criar');
        Route::get('/{veterinario}/index',           [AvaliacaoController::class, 'index'])->name('index');
        Route::delete('/{id}/destroy',               [AvaliacaoController::class, 'destroy'])->name('destroy');
        Route::get('/{veterinario}/media',           [AvaliacaoController::class, 'media'])->name('media');

    });

    //Route::get('/csrf', function(){ return csrf_token(); })->name('csrf');
});
