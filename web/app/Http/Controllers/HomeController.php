<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Veterinario;
use App\Models\CartaoDeVacinacao;
use App\Models\Animal;
use App\Models\Medicacao;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function veterinario(){

        $data = Veterinario::latest()->paginate(5);
        return view ('user_veterinario.index',compact('data'))
        ->with('i',(request()->input('page', 1) - 1) * 5);

    }

    public function show($id)
    {
        $veterinario= Veterinario::findorfail ($id);
        return view('user_veterinario.show', ['veterinario'=>$veterinario]);
    }

    public function animal(){

        $data = Animal::latest()->paginate(5);
        return view ('vet_animal.index',compact('data'))
        ->with('i',(request()->input('page', 1) - 1) * 5);

    }

    public function show2($id)
    {
        $animal = Animal::findorfail ($id);
        $cartao_de_vacinacao= CartaoDeVacinacao::all();
        $medicacao= Medicacao::all();
        return view('vet_animal.show',['cartao_de_vacinacao'=>$cartao_de_vacinacao,'medicacao'=>$medicacao,'animal'=>$animal]);
    }

    public function index()
    {
        return view('auth.login');
    }
}
