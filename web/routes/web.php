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
use Illuminate\Support\Facades\Auth;




    //=========================================================================
    //============================USERS========================================
    //=========================================================================

Route::get('/', function () {
    return view('welcome_users');
})->name('welcome');

Route::get('/adm', function () {
    return view('welcome');
})->name('adm.welcome');

Route::get('/profile', function(){
    dd(Auth::user());
});

Route::get('/logout', [LoginController::class, 'logout']);

Route::resource('animal', PetsController::class);

Route::name('evento.')->prefix('/evento')->group(function(){
    Route::get('/', [App\Http\Controllers\EventoController::class, 'index']);
    Route::get('/mostrar', [App\Http\Controllers\EventoController::class, 'show']);
    Route::post('/adicionar', [App\Http\Controllers\EventoController::class, 'store']);
    Route::post('/editar/{id}', [App\Http\Controllers\EventoController::class, 'edit']);
    Route::post('/atualizar/{evento}', [App\Http\Controllers\EventoController::class, 'update']);
    Route::post('/excluir/{id}', [App\Http\Controllers\EventoController::class, 'destroy']);
});




    //=========================================================================
    //============================ADMS=========================================
    //=========================================================================

Auth::routes();



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('cartao_de_vacinacao', CartaoDeVacinacaoController::class);

Route::resource('medicacao', MedicacaoController::class);

Route::resource('vacina', VacinaController::class);

Route::resource('veterinario', VeterinarioController::class);

Route::resource('veterinarios', VeterinarioUserController::class);



    //=========================================================================
    //=============================API=========================================
    //=========================================================================
/*Route::middleware('api')->name('auth.')->group(function(){
    Route::post('me', [AuthController::class, 'me'])->name('me');
    Route::post('login', [AuthController::class, 'login'])->name('logar');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('refresh', [AuthController::class, 'refresh'])->name('refresh');
});*/

//========================================================================
//============================LOGIN=======================================
//========================================================================

































/*//Rotas mobile
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


*/
