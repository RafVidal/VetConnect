<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Mobile\ClienteController;
// use App\Http\Controllers\Mobile\VeterinarioController;
use App\Http\Controllers\Mobile\AnimalController;
use App\Http\Controllers\Mobile\AvaliacaoController;
use App\Http\Controllers\MedicacaoController;
use App\Http\Controllers\CartaoDeVacinacaoController;
use App\Http\Controllers\VacinaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VeterinarioController;
use App\Http\Controllers\VeterinarioUserController;
use App\Http\Controllers\PetsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdmAnimalController;
use Illuminate\Support\Facades\Auth;



Auth::routes();
Route::get('/logout', [LoginController::class, 'logout']);


    //=========================================================================
    //============================USERS========================================
    //=========================================================================

Route::name('cliente.')->prefix('/')->middleware('auth.cliente')->group(function(){
    Route::get('', function () {return view('welcome_users');})->name('welcome');
    
    Route::resource('animal', PetsController::class);
    
    Route::get('veterinarios', [App\Http\Controllers\HomeController::class, 'veterinario']);
    Route::get('veterinarios/show/{id}', [App\Http\Controllers\HomeController::class, 'show']);
    
    
    Route::name('evento.')->prefix('evento')->group(function(){
        Route::get('/', [App\Http\Controllers\EventoController::class, 'index']);
        Route::get('/mostrar', [App\Http\Controllers\EventoController::class, 'show']);
        Route::post('/adicionar', [App\Http\Controllers\EventoController::class, 'store']);
        Route::post('/editar/{id}', [App\Http\Controllers\EventoController::class, 'edit']);
        Route::post('/atualizar/{evento}', [App\Http\Controllers\EventoController::class, 'update']);
        Route::post('/excluir/{id}', [App\Http\Controllers\EventoController::class, 'destroy']);
    });

});

    //=========================================================================
    //============================ADMS=========================================
    //=========================================================================

Route::name('adm.')->prefix('/adm')->middleware('auth.adm')->group(function(){
    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');
    Route::resource('/veterinario', VeterinarioController::class);
});


    //=========================================================================
    //============================VET==========================================
    //=========================================================================
Route::name('vet.')->prefix('/vet')->middleware('auth.vet')->group(function(){
    Route::resource('/cartao_de_vacinacao', App\Http\Controllers\CartaoDeVacinacaoController::class);
    Route::resource('/medicacao', MedicacaoController::class);
    Route::resource('/vacina', VacinaController::class);
    Route::get('/', function () { return view('welcome_vet'); })->name('welcome');
    Route::get('/pets', [App\Http\Controllers\HomeController::class, 'animal']);
    Route::get('/pets/{id}', [App\Http\Controllers\HomeController::class, 'show2']);
});
